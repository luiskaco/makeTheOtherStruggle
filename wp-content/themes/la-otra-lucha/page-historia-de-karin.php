<?php
/**
 * Plantilla de página dedicada: La Historia de Karin Pardo
 *
 * @package LaOtraLucha
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<div class="page-standard-wrapper karin-page-wrapper">
  <div class="container page-standard-container">
    <nav class="page-standard__breadcrumb" aria-label="<?php esc_attr_e( 'Miga de pan', 'la-otra-lucha' ); ?>">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-back-home">
        <svg class="btn-back-home__icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <line x1="19" y1="12" x2="5" y2="12"></line>
          <polyline points="12 19 5 12 12 5"></polyline>
        </svg>
        <span><?php esc_html_e( 'Volver a la página principal', 'la-otra-lucha' ); ?></span>
      </a>
    </nav>

    <?php while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class( 'page-article karin-article' ); ?>>
        <header class="page-article__header karin-article__header">

          <h1 class="page-article__title karin-article__title"><?php the_title(); ?></h1>
          <p class="karin-article__tagline">
            EL CÁNCER NO PUEDE ESPERAR. LAS RESPUESTAS
            <span class="karin-story__script-wrap">
              <span class="karin-story__quote-script">tampoco</span>
              <svg class="karin-story__quote-stroke" aria-hidden="true">
                <use href="#brush-stroke" />
              </svg>
            </span>
          </p>
        </header>

        <div class="page-article__content entry-content">
          <?php the_content(); ?>
        </div>

        <footer class="page-article__footer-nav karin-article__footer-nav">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--purple">
            <svg class="btn-back-home__icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <line x1="19" y1="12" x2="5" y2="12"></line>
              <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
            <span><?php esc_html_e( 'Volver a la portada', 'la-otra-lucha' ); ?></span>
          </a>

          <a href="<?php echo esc_url( home_url( '/#conoce-tus-derechos' ) ); ?>" class="btn btn--white" style="border: 2px solid var(--color-secondary);">
            <span><?php esc_html_e( 'Conoce tus derechos oncológicos', 'la-otra-lucha' ); ?></span>
          </a>
        </footer>
      </article>
    <?php endwhile; ?>
  </div>
</div>

<?php
get_footer();
