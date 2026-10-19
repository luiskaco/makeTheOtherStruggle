<?php
/**
 * Generador de assets adicionales: favicon 192x192
 */

$srcPath = __DIR__ . '/../wp-content/themes/la-otra-lucha/assets/img/site-icon-512x512.png';
if (!file_exists($srcPath)) {
    echo "Source not found: $srcPath\n";
    exit(1);
}

$src = imagecreatefrompng($srcPath);
$dst = imagecreatetruecolor(192, 192);
imagealphablending($dst, false);
imagesavealpha($dst, true);
$transparent = imagecolorallocatealpha($dst, 0, 0, 0, 127);
imagefilledrectangle($dst, 0, 0, 192, 192, $transparent);
imagecopyresampled($dst, $src, 0, 0, 0, 0, 192, 192, imagesx($src), imagesy($src));

$themeOut = __DIR__ . '/../wp-content/themes/la-otra-lucha/assets/img/favicon-192x192.png';
$rootOut  = __DIR__ . '/../favicon-192x192.png';

imagepng($dst, $themeOut, 9);
copy($themeOut, $rootOut);

imagedestroy($src);
imagedestroy($dst);

echo "favicon-192x192.png generated successfully!\n";
