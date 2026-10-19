<?php
/**
 * Generador de Favicons multirresolución y .ico
 * Proyecto: La Otra Lucha
 */

declare(strict_types=1);

$raw = file_get_contents('php://input');
if (!$raw) {
    http_response_code(400);
    echo json_encode(['error' => 'No data received']);
    exit;
}

$data = json_decode($raw, true);
$base64 = $data['base64'] ?? '';
if (str_starts_with($base64, 'data:image/png;base64,')) {
    $base64 = substr($base64, strlen('data:image/png;base64,'));
}

$png512 = base64_decode($base64);
if (!$png512) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid base64']);
    exit;
}

$themeImgDir = dirname(__DIR__) . '/wp-content/themes/la-otra-lucha/assets/img';
$themeSvgDir = dirname(__DIR__) . '/wp-content/themes/la-otra-lucha/assets/svg';
$rootDir     = dirname(__DIR__);

if (!is_dir($themeImgDir)) {
    mkdir($themeImgDir, 0755, true);
}

// 1. Guardar PNG 512x512
$path512 = "{$themeImgDir}/site-icon-512x512.png";
file_put_contents($path512, $png512);

// 2. Cargar en GD
$srcImg = imagecreatefromstring($png512);
if (!$srcImg) {
    http_response_code(500);
    echo json_encode(['error' => 'GD failed to create image from string']);
    exit;
}

// Helper para reescalar
function resizePng($src, int $w, int $h, string $destPath) {
    $dst = imagecreatetruecolor($w, $h);
    imagealphablending($dst, false);
    imagesavealpha($dst, true);
    $transparent = imagecolorallocatealpha($dst, 0, 0, 0, 127);
    imagefilledrectangle($dst, 0, 0, $w, $h, $transparent);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, imagesx($src), imagesy($src));
    imagepng($dst, $destPath, 9);
    imagedestroy($dst);
}

// 3. Generar 180x180, 48x48, 32x32, 16x16
$path180 = "{$themeImgDir}/apple-touch-icon.png";
$path48  = "{$themeImgDir}/favicon-48x48.png";
$path32  = "{$themeImgDir}/favicon-32x32.png";
$path16  = "{$themeImgDir}/favicon-16x16.png";

resizePng($srcImg, 180, 180, $path180);
resizePng($srcImg, 48, 48, $path48);
resizePng($srcImg, 32, 32, $path32);
resizePng($srcImg, 16, 16, $path16);

// Copiar apple-touch-icon a la raíz también para compatibilidad iOS
copy($path180, "{$rootDir}/apple-touch-icon.png");

// 4. Generar favicon.ico estándar con frames de 16x16, 32x32 y 48x48
function buildIco(array $pngPaths): string {
    $images = [];
    foreach ($pngPaths as $p) {
        $data = file_get_contents($p);
        $size = getimagesizefromstring($data);
        $images[] = [
            'width'  => $size[0] >= 256 ? 0 : $size[0],
            'height' => $size[1] >= 256 ? 0 : $size[1],
            'size'   => strlen($data),
            'data'   => $data,
        ];
    }

    $numImages = count($images);
    // Header ICO: 2 bytes reservados (0), 2 bytes tipo (1 = ICO), 2 bytes conteo de imágenes
    $ico = pack('vvv', 0, 1, $numImages);
    $offset = 6 + ($numImages * 16);

    foreach ($images as $img) {
        $ico .= pack('CCCCvvVV',
            $img['width'],
            $img['height'],
            0, // palette
            0, // reserved
            1, // color planes
            32, // bits per pixel
            $img['size'],
            $offset
        );
        $offset += $img['size'];
    }

    foreach ($images as $img) {
        $ico .= $img['data'];
    }

    return $ico;
}

$icoData = buildIco([$path16, $path32, $path48]);
$themeIcoPath = "{$themeImgDir}/favicon.ico";
$rootIcoPath  = "{$rootDir}/favicon.ico";

file_put_contents($themeIcoPath, $icoData);
file_put_contents($rootIcoPath, $icoData);

// Copiar favicon.svg a themeImgDir y rootDir
$themeSvgPath = "{$themeSvgDir}/favicon.svg";
if (file_exists($themeSvgPath)) {
    copy($themeSvgPath, "{$themeImgDir}/favicon.svg");
    copy($themeSvgPath, "{$rootDir}/favicon.svg");
}

imagedestroy($srcImg);

// 5. Configurar en WordPress (Site Icon en wp_options si está disponible)
$wpConfigPath = dirname(__DIR__) . '/wp-load.php';
$wpResult = 'not loaded';
if (file_exists($wpConfigPath)) {
    require_once $wpConfigPath;
    require_once ABSPATH . 'wp-admin/includes/image.php';
    
    // Buscar si ya existe el attachment site-icon
    $existing = get_posts([
        'post_type'      => 'attachment',
        'meta_key'       => '_lol_site_icon',
        'meta_value'     => '1',
        'posts_per_page' => 1,
        'post_status'    => 'inherit',
    ]);
    
    $attachmentId = 0;
    if (!empty($existing)) {
        $attachmentId = $existing[0]->ID;
    } else {
        $attachment = [
            'guid'           => get_stylesheet_directory_uri() . '/assets/img/site-icon-512x512.png',
            'post_mime_type' => 'image/png',
            'post_title'     => 'La Otra Lucha — Site Icon',
            'post_content'   => '',
            'post_status'    => 'inherit',
        ];
        $attachmentId = wp_insert_attachment($attachment, $path512);
        if (!is_wp_error($attachmentId) && $attachmentId > 0) {
            update_post_meta($attachmentId, '_wp_attached_file', 'themes/la-otra-lucha/assets/img/site-icon-512x512.png');
            update_post_meta($attachmentId, '_lol_site_icon', '1');
            $meta = [
                'width'  => 512,
                'height' => 512,
                'file'   => 'themes/la-otra-lucha/assets/img/site-icon-512x512.png',
                'sizes'  => [],
            ];
            wp_update_attachment_metadata($attachmentId, $meta);
        }
    }

    if ($attachmentId > 0) {
        update_option('site_icon', $attachmentId);
        $wpResult = "site_icon set to attachment ID {$attachmentId}";
    }
}

echo json_encode([
    'success' => true,
    'files'   => [
        '512'  => $path512,
        '180'  => $path180,
        '48'   => $path48,
        '32'   => $path32,
        '16'   => $path16,
        'ico'  => $themeIcoPath,
        'svg'  => "{$themeImgDir}/favicon.svg",
    ],
    'wp' => $wpResult,
]);
