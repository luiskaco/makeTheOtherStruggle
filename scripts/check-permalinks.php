<?php
require_once __DIR__ . '/../wp-load.php';

header( 'Content-Type: text/plain; charset=UTF-8' );

echo "=== DIAGNÓSTICO DE PERMALINKS ===" . PHP_EOL;

$current_structure = get_option( 'permalink_structure' );
echo "Estructura actual: '" . $current_structure . "'" . PHP_EOL;

echo "Actualizando a /%postname%/..." . PHP_EOL;
global $wp_rewrite;
$wp_rewrite->set_permalink_structure( '/%postname%/' );
update_option( 'permalink_structure', '/%postname%/' );
$wp_rewrite->flush_rules( true );
echo "Reglas de reescritura regeneradas con éxito." . PHP_EOL;

echo "URL Términos: " . get_permalink( 11 ) . PHP_EOL;
echo "URL Privacidad: " . get_permalink( 12 ) . PHP_EOL;
