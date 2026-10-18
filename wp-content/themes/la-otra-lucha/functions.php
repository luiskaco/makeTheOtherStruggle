<?php
/**
 * La Otra Lucha — Theme Functions
 *
 * @package LaOtraLucha
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// =============================================================================
// 1. CONSTANTES DEL THEME
// =============================================================================

define( 'LA_OTRA_LUCHA_VERSION', '1.1.0' );
define( 'LA_OTRA_LUCHA_DIR', get_template_directory() );
define( 'LA_OTRA_LUCHA_URI', get_template_directory_uri() );

// =============================================================================
// 2. CONFIGURACIÓN Y SOPORTE DEL THEME (Theme Setup)
// =============================================================================

function la_otra_lucha_setup() {
    // Título dinámico gestionado por WordPress
    add_theme_support( 'title-tag' );

    // Imágenes destacadas
    add_theme_support( 'post-thumbnails' );

    // Marcado HTML5 semántico
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Soporte para logotipo personalizado
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 96,
            'width'       => 280,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );

    // Soporte para embeds responsivos
    add_theme_support( 'responsive-embeds' );

    // Registro de ubicaciones de menú
    register_nav_menus(
        array(
            'primary' => esc_html__( 'Navegación Principal (One-Page)', 'la-otra-lucha' ),
            'footer'  => esc_html__( 'Menú del Pie de Página', 'la-otra-lucha' ),
        )
    );

    // Carga de traducciones
    load_theme_textdomain( 'la-otra-lucha', LA_OTRA_LUCHA_DIR . '/languages' );
}
add_action( 'after_setup_theme', 'la_otra_lucha_setup' );

// =============================================================================
// 3. AUTO-CREACIÓN DE PÁGINA INICIAL AL ACTIVAR EL THEME (Self-Provisioning)
// =============================================================================

/**
 * Crea automáticamente la página "La Otra Lucha" y la asigna como página frontal
 * estática cuando el theme es activado o subido por primera vez.
 */
function la_otra_lucha_provision_front_page() {
    $page_slug  = 'la-otra-lucha';
    $page_title = 'La Otra Lucha';

    // Comprobar si ya existe una página con este slug
    $existing_page = get_page_by_path( $page_slug );

    if ( ! $existing_page ) {
        // Comprobar si existe por título
        $existing_page = get_page_by_title( $page_title );
    }

    if ( ! $existing_page ) {
        // Crear la página frontal
        $page_id = wp_insert_post(
            array(
                'post_title'     => $page_title,
                'post_name'      => $page_slug,
                'post_status'    => 'publish',
                'post_type'      => 'page',
                'post_content'   => '<!-- Landing One-Page oficial de La Otra Lucha -->',
                'comment_status' => 'closed',
                'ping_status'    => 'closed',
            )
        );

        if ( ! is_wp_error( $page_id ) && $page_id > 0 ) {
            // Asignar como portada estática
            update_option( 'show_on_front', 'page' );
            update_option( 'page_on_front', $page_id );
            update_option( 'la_otra_lucha_front_page_id', $page_id );
        }
    } else {
        // Si la página ya existía pero no estaba asignada como front-page, configurarla
        $current_front = get_option( 'page_on_front' );
        if ( empty( $current_front ) || 'page' !== get_option( 'show_on_front' ) ) {
            update_option( 'show_on_front', 'page' );
            update_option( 'page_on_front', $existing_page->ID );
        }
    }

    // Provisión de páginas legales (Términos y Privacidad)
    la_otra_lucha_provision_legal_pages();

    // Registrar versión instalada para migraciones futuras
    update_option( 'la_otra_lucha_theme_version', LA_OTRA_LUCHA_VERSION );

    // Refrescar reglas de reescritura
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'la_otra_lucha_provision_front_page' );

/**
 * Asegura la existencia de las páginas legales obligatorias (Términos y Condiciones y Políticas de Privacidad).
 */
function la_otra_lucha_provision_legal_pages() {
    $pages = array(
        'terminos-y-condiciones'  => 'Términos y Condiciones',
        'politicas-de-privacidad' => 'Políticas de Privacidad',
    );

    foreach ( $pages as $slug => $title ) {
        $page = get_page_by_path( $slug );
        if ( ! $page ) {
            $page = get_page_by_title( $title );
        }
        if ( ! $page ) {
            $page_id = wp_insert_post(
                array(
                    'post_title'     => $title,
                    'post_name'      => $slug,
                    'post_status'    => 'publish',
                    'post_type'      => 'page',
                    'comment_status' => 'closed',
                    'ping_status'    => 'closed',
                )
            );
            if ( 'politicas-de-privacidad' === $slug && ! is_wp_error( $page_id ) && $page_id > 0 ) {
                update_option( 'wp_page_for_privacy_policy', $page_id );
            }
        }
    }
}

// =============================================================================
// 4. ENCOLADO DE ESTILOS Y SCRIPTS (Assets Enqueue)
// =============================================================================

function la_otra_lucha_enqueue_assets() {
    // 4.1. Tipografías Google Fonts (Poppins, Oswald, Bebas Neue, Kaushan Script, Caveat)
    wp_enqueue_style(
        'la-otra-lucha-fonts',
        'https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Caveat:wght@700&family=Kaushan+Script&family=Oswald:wght@700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,600&display=swap',
        array(),
        null
    );

    // 4.2. Hojas de estilo modulares
    wp_enqueue_style(
        'la-otra-lucha-variables',
        LA_OTRA_LUCHA_URI . '/css/variables.css',
        array(),
        LA_OTRA_LUCHA_VERSION
    );

    wp_enqueue_style(
        'la-otra-lucha-reset',
        LA_OTRA_LUCHA_URI . '/css/reset.css',
        array( 'la-otra-lucha-variables' ),
        LA_OTRA_LUCHA_VERSION
    );

    wp_enqueue_style(
        'la-otra-lucha-layout',
        LA_OTRA_LUCHA_URI . '/css/layout.css',
        array( 'la-otra-lucha-reset' ),
        LA_OTRA_LUCHA_VERSION
    );

    wp_enqueue_style(
        'la-otra-lucha-components',
        LA_OTRA_LUCHA_URI . '/css/components.css',
        array( 'la-otra-lucha-layout' ),
        LA_OTRA_LUCHA_VERSION
    );

    wp_enqueue_style(
        'la-otra-lucha-sections',
        LA_OTRA_LUCHA_URI . '/css/sections.css',
        array( 'la-otra-lucha-components' ),
        LA_OTRA_LUCHA_VERSION
    );

    wp_enqueue_style(
        'la-otra-lucha-main',
        get_stylesheet_uri(),
        array( 'la-otra-lucha-sections' ),
        LA_OTRA_LUCHA_VERSION
    );

    // 4.3. JavaScript nativo (ES Modules)
    wp_enqueue_script(
        'la-otra-lucha-main-js',
        LA_OTRA_LUCHA_URI . '/js/main.js',
        array(),
        LA_OTRA_LUCHA_VERSION,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'la_otra_lucha_enqueue_assets' );

/**
 * Inyecta type="module" en el script principal para admitir ES Modules nativos.
 */
function la_otra_lucha_script_loader_tag( $tag, $handle, $src ) {
    if ( 'la-otra-lucha-main-js' === $handle ) {
        return '<script type="module" src="' . esc_url( $src ) . '" id="' . esc_attr( $handle ) . '-js"></script>' . "\n";
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'la_otra_lucha_script_loader_tag', 10, 3 );

// =============================================================================
// 5. HELPER PARA ADVANCED CUSTOM FIELDS (ACF) CON FALLBACK ESTÁTICO
// =============================================================================

/**
 * Obtiene un campo de ACF si está disponible, o retorna el contenido por defecto
 * garantizando que el theme funcione out-of-the-box sin dependencias duras.
 *
 * @param string $field_name Nombre del campo ACF.
 * @param mixed  $fallback   Valor de respaldo (string, array, etc.).
 * @param mixed  $post_id    ID de post opcional.
 * @return mixed
 */
function lol_get_field( $field_name, $fallback = '', $post_id = false ) {
    if ( function_exists( 'get_field' ) ) {
        $value = get_field( $field_name, $post_id );
        if ( ! empty( $value ) ) {
            return $value;
        }
    }
    return $fallback;
}

// =============================================================================
// 6. HARDENING DE SEGURIDAD (Reglas CMS WordPress)
// =============================================================================

// Ocultar versión de WordPress en meta tags y feeds
remove_action( 'wp_head', 'wp_generator' );

// Remover enlaces WLW Manifest y RSD innecesarios
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );

// Deshabilitar pingbacks y XML-RPC si no son requeridos
add_filter( 'xmlrpc_enabled', '__return_false' );
