<?php
/**
 * Plantilla de error 404 (Página no encontrada)
 *
 * @package LaOtraLucha
 * @version 1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<section class="section error-404 not-found" aria-labelledby="error-title">
  <div class="container error-404__container">
    <div class="error-404__badge" aria-hidden="true">404</div>

    <h1 id="error-title" class="error-404__title">
      <?php esc_html_e( 'Página no encontrada', 'la-otra-lucha' ); ?>
    </h1>

    <p class="error-404__description">
      <?php esc_html_e( 'Lo sentimos, el enlace que buscas no existe o ha sido trasladado. En la lucha contra el cáncer de mama, cada paso y cada minuto cuentan.', 'la-otra-lucha' ); ?>
    </p>

    <div class="error-404__actions">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--purple">
        <?php esc_html_e( 'Volver al inicio', 'la-otra-lucha' ); ?>
      </a>
      <a href="<?php echo esc_url( home_url( '/#conoce-tus-derechos' ) ); ?>" class="btn btn--pink">
        <?php esc_html_e( 'Conoce tus derechos', 'la-otra-lucha' ); ?>
      </a>
    </div>
  </div>
</section>

<?php
get_footer();
