<?php
/**
 * Script de provisión de metadatos SEO en Rank Math vía WordPress / Base de Datos
 * Proyecto: La Otra Lucha (Por un Perú Sin Cáncer)
 *
 * Ejecutar con PHP CLI de Laragon:
 * & "D:\AppsInstaller\laragon\bin\php\php-8.3.33-Win32-vs16-x64\php.exe" -d extension_dir="D:\AppsInstaller\laragon\bin\php\php-8.3.33-Win32-vs16-x64\ext" -d extension=pdo_mysql -d extension=mysqli scripts/seed-rank-math-seo.php
 */

declare(strict_types=1);

require_once __DIR__ . '/../wp-load.php';
require_once ABSPATH . 'wp-admin/includes/image.php';

echo "=== Seeding SEO Rank Math para 'La Otra Lucha' ===" . PHP_EOL;

// 1. Obtener la página frontal
$frontPageId = (int) get_option( 'page_on_front' );
if ( ! $frontPageId ) {
    $page = get_page_by_path( 'la-otra-lucha' );
    if ( ! $page ) {
        $page = get_page_by_title( 'La Otra Lucha' );
    }
    if ( $page ) {
        $frontPageId = $page->ID;
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $frontPageId );
    }
}

if ( ! $frontPageId ) {
    fwrite( STDERR, "Error: No se encontró la página frontal en WordPress." . PHP_EOL );
    exit( 1 );
}

echo "Página frontal detectada: ID {$frontPageId}" . PHP_EOL;

// 2. Gestionar la imagen Open Graph oficial (1200x630px)
$themeDir = get_stylesheet_directory();
$ogImagePath = $themeDir . '/assets/img/og-la-otra-lucha.jpg';
$siteUrl = home_url();
$ogImageUrl = get_stylesheet_directory_uri() . '/assets/img/og-la-otra-lucha.jpg';

$attachmentId = 0;
// Buscar si ya existe el attachment en BD
$existingAttachment = get_posts([
    'post_type'      => 'attachment',
    'meta_key'       => '_lol_og_image',
    'meta_value'     => '1',
    'posts_per_page' => 1,
    'post_status'    => 'inherit',
]);

if ( ! empty( $existingAttachment ) ) {
    $attachmentId = $existingAttachment[0]->ID;
    echo "Attachment Open Graph existente encontrado: ID {$attachmentId}" . PHP_EOL;
} else if ( file_exists( $ogImagePath ) ) {
    // Registrar el archivo en wp_posts como attachment
    $attachment = [
        'guid'           => $ogImageUrl,
        'post_mime_type' => 'image/jpeg',
        'post_title'     => 'La Otra Lucha — Open Graph (Por un Perú Sin Cáncer)',
        'post_content'   => '',
        'post_status'    => 'inherit',
    ];

    $attachmentId = wp_insert_attachment( $attachment, $ogImagePath, $frontPageId );
    if ( ! is_wp_error( $attachmentId ) && $attachmentId > 0 ) {
        $metadata = [
            'width'      => 1200,
            'height'     => 630,
            'file'       => 'themes/la-otra-lucha/assets/img/og-la-otra-lucha.jpg',
            'sizes'      => [],
            'image_meta' => [],
        ];
        wp_update_attachment_metadata( $attachmentId, $metadata );
        update_post_meta( $attachmentId, '_wp_attached_file', 'themes/la-otra-lucha/assets/img/og-la-otra-lucha.jpg' );
        update_post_meta( $attachmentId, '_wp_attachment_image_alt', 'La Otra Lucha — Por un Perú Sin Cáncer' );
        update_post_meta( $attachmentId, '_lol_og_image', '1' );
        echo "Attachment Open Graph creado exitosamente: ID {$attachmentId}" . PHP_EOL;
    }
}

// Asignar imagen destacada a la portada si no tenía
if ( $attachmentId > 0 ) {
    set_post_thumbnail( $frontPageId, $attachmentId );
}

// 3. Definir parámetros SEO conformes a .agents/rules/seo.md
$seoTitle     = 'La Otra Lucha | Atención del Cáncer de Mama en Perú'; // 51 caracteres (rango 50-60)
$seoDesc      = 'Conoce La Otra Lucha: la ruta de atención del cáncer de mama en el Perú, el caso de Karin Pardo, el Observatorio Oncológico y la Guía de Derechos de la paciente.'; // 160 caracteres (rango 120-160)
$focusKw      = 'la otra lucha, cáncer de mama perú, ruta de atención oncológica';
$ogTitle      = 'La Otra Lucha | Por un Perú Sin Cáncer';
$ogDesc       = 'El cáncer ya es una lucha. Acceder a una atención oportuna es la otra lucha. Conoce la ruta de la paciente, la historia de Karin Pardo y la Guía de Derechos.';

$postMetas = [
    'rank_math_title'                => $seoTitle,
    'rank_math_description'          => $seoDesc,
    'rank_math_focus_keyword'        => $focusKw,
    'rank_math_canonical_url'        => "{$siteUrl}/",
    'rank_math_robots'               => ['index'],
    'rank_math_advanced_robots'      => [
        'max-snippet'       => '-1',
        'max-video-preview' => '-1',
        'max-image-preview' => 'large',
    ],
    'rank_math_facebook_title'       => $ogTitle,
    'rank_math_facebook_description' => $ogDesc,
    'rank_math_facebook_image'       => $ogImageUrl,
    'rank_math_facebook_image_id'    => (string) $attachmentId,
    'rank_math_twitter_title'        => $ogTitle,
    'rank_math_twitter_description'  => $ogDesc,
    'rank_math_twitter_image'        => $ogImageUrl,
    'rank_math_twitter_image_id'     => (string) $attachmentId,
    'rank_math_twitter_card_type'    => 'summary_large_image',
    'rank_math_rich_snippet'         => 'article',
    'rank_math_snippet_article_type' => 'Article',
    'rank_math_snippet_name'         => 'La Otra Lucha',
    'rank_math_snippet_desc'         => 'Iniciativa ciudadana para visibilizar las barreras de atención del cáncer de mama en el Perú impulsada por Por un Perú Sin Cáncer.',
    'rank_math_seo_score'            => '85',
];

foreach ( $postMetas as $metaKey => $metaValue ) {
    update_post_meta( $frontPageId, $metaKey, $metaValue );
}
echo "Metadatos SEO del post ID {$frontPageId} actualizados en wp_postmeta." . PHP_EOL;

// 4. Configurar opciones generales de WordPress y Rank Math
update_option( 'blogname', 'La Otra Lucha' );
update_option( 'blogdescription', 'Por un Perú Sin Cáncer — Atención oportuna del cáncer de mama' );
update_option( 'blog_public', '1' );
update_option( 'rank_math_registration_skip', '1' );

// 5. Opciones globales de títulos de Rank Math (rank-math-options-titles)
$titlesOptions = get_option( 'rank-math-options-titles' );
if ( is_array( $titlesOptions ) ) {
    $titlesOptions['homepage_title']                = $seoTitle;
    $titlesOptions['homepage_description']          = $seoDesc;
    $titlesOptions['homepage_facebook_title']       = $ogTitle;
    $titlesOptions['homepage_facebook_description'] = $ogDesc;
    $titlesOptions['homepage_facebook_image']       = $ogImageUrl;
    if ( $attachmentId > 0 ) {
        $titlesOptions['homepage_facebook_image_id'] = $attachmentId;
    }
    $titlesOptions['homepage_custom_robots']        = 'off';
    $titlesOptions['knowledgegraph_name']           = 'Por un Perú Sin Cáncer';
    $titlesOptions['website_name']                  = 'La Otra Lucha';
    $titlesOptions['knowledgegraph_type']           = 'organization';

    update_option( 'rank-math-options-titles', $titlesOptions );
    echo "Opciones globales 'rank-math-options-titles' actualizadas en wp_options." . PHP_EOL;
}

echo "=== Seeding SEO Rank Math completado con éxito ===" . PHP_EOL;
