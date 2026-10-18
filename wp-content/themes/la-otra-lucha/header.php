<?php
/**
 * Header Template
 *
 * @package LaOtraLucha
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="<?php echo esc_url( LA_OTRA_LUCHA_URI . '/assets/img/favicon.svg' ); ?>" type="image/svg+xml" />
  <link rel="icon" href="<?php echo esc_url( LA_OTRA_LUCHA_URI . '/assets/img/favicon-32x32.png' ); ?>" sizes="32x32" type="image/png" />
  <link rel="icon" href="<?php echo esc_url( LA_OTRA_LUCHA_URI . '/assets/img/favicon-16x16.png' ); ?>" sizes="16x16" type="image/png" />
  <link rel="icon" href="<?php echo esc_url( LA_OTRA_LUCHA_URI . '/assets/img/favicon-192x192.png' ); ?>" sizes="192x192" type="image/png" />
  <link rel="apple-touch-icon" href="<?php echo esc_url( LA_OTRA_LUCHA_URI . '/assets/img/apple-touch-icon.png' ); ?>" />
  <meta name="theme-color" content="#73589f" />
  <meta name="msapplication-TileColor" content="#73589f" />
  <meta name="msapplication-config" content="<?php echo esc_url( home_url( '/browserconfig.xml' ) ); ?>" />
  <link rel="manifest" href="<?php echo esc_url( home_url( '/site.webmanifest' ) ); ?>" />
  <link rel="author" href="<?php echo esc_url( home_url( '/humans.txt' ) ); ?>" />
  <link rel="alternate" type="text/plain" href="<?php echo esc_url( home_url( '/llms.txt' ) ); ?>" title="LLM Content Summary" />
  <link rel="alternate" type="text/plain" href="<?php echo esc_url( home_url( '/llms-full.txt' ) ); ?>" title="Full LLM Content" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

  

<?php
$is_front   = is_front_page();
$home_url   = home_url( '/' );
$logo_href  = $is_front ? '#inicio' : esc_url( $home_url );
$nav_prefix = $is_front ? '' : esc_url( $home_url );
?>
  <a href="#contenido-principal" class="skip-link"><?php esc_html_e( 'Saltar al contenido principal', 'la-otra-lucha' ); ?></a>

  <header class="site-header" data-wp-part="header">
    <div class="container site-header__top">
      <a href="<?php echo $logo_href; ?>" class="brand-logos" aria-label="Por un Perú Sin Cáncer — La Otra Lucha, ir al inicio">
        <img
          src="<?php echo esc_url( LA_OTRA_LUCHA_URI . '/assets/svg/logo-pupsc.svg' ); ?>"
          alt="Por un Perú Sin Cáncer"
          class="brand-logos__pupsc"
          width="185"
          height="64"
        />
        <img
          src="<?php echo esc_url( LA_OTRA_LUCHA_URI . '/assets/svg/logo-otra-lucha.svg' ); ?>"
          alt="La Otra Lucha"
          class="brand-logos__lucha"
          width="140"
          height="96"
        />
      </a>

      <button
        type="button"
        class="site-header__toggle"
        aria-controls="main-nav"
        aria-expanded="false"
        aria-label="Abrir menú de navegación"
      >
        <span class="site-header__toggle-bar" aria-hidden="true"></span>
        <span class="site-header__toggle-bar" aria-hidden="true"></span>
        <span class="site-header__toggle-bar" aria-hidden="true"></span>
      </button>
    </div>

    <nav id="main-nav" class="site-nav" aria-label="Navegación principal">
      <div class="container site-nav__inner">
        <ul class="site-nav__list">
          <li class="site-nav__item">
            <a href="<?php echo esc_url( $nav_prefix . '#historia-karin' ); ?>" class="site-nav__link">La historia de<br /><strong>KARIN PARDO</strong></a>
          </li>
          <li class="site-nav__item">
            <a href="<?php echo esc_url( $nav_prefix . '#realidad-cancer' ); ?>" class="site-nav__link">La realidad del<br />cáncer de mama</a>
          </li>
          <li class="site-nav__item">
            <a href="<?php echo esc_url( $nav_prefix . '#las-cuatro-luchas' ); ?>" class="site-nav__link">La ruta de<br />la paciente</a>
          </li>
          <li class="site-nav__item">
            <a href="<?php echo esc_url( $nav_prefix . '#la-investigacion' ); ?>" class="site-nav__link">La investigación</a>
          </li>
          <li class="site-nav__item">
            <a href="<?php echo esc_url( $nav_prefix . '#conoce-tus-derechos' ); ?>" class="site-nav__link">Conoce tus<br />derechos</a>
          </li>
          <li class="site-nav__item">
            <a href="<?php echo esc_url( $nav_prefix . '#evidencia-a-la-accion' ); ?>" class="site-nav__link">De la evidencia<br />a la acción</a>
          </li>
          <li class="site-nav__item">
            <a href="<?php echo esc_url( $nav_prefix . '#acompanamiento' ); ?>" class="site-nav__link">Acompañamiento<br />y bienestar</a>
          </li>
        </ul>

        <div class="site-nav__cta-wrap">
          <a href="<?php echo esc_url( $nav_prefix . '#conoce-tus-derechos' ); ?>" class="btn btn--purple btn--nav" data-acf-field="header_cta">
            INFÓRMATE Y EXIGE
          </a>
        </div>
      </div>
    </nav>
  </header>

  <main id="contenido-principal" class="page-ribbons-bg">
