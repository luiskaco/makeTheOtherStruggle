<?php
/**
 * Plantilla de resultados de búsqueda (Search Results Template)
 *
 * @package LaOtraLucha
 * @version 1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<div class="page-standard-wrapper">
  <div class="container page-standard-container">
    <header class="page-article__header">
      <h1 class="page-article__title">
        <?php
        /* translators: %s: Search query string. */
        printf( esc_html__( 'Resultados para: %s', 'la-otra-lucha' ), '<span class="text-pink">"' . esc_html( get_search_query() ) . '"</span>' );
        ?>
      </h1>
      <div class="page-article__divider" aria-hidden="true"></div>
    </header>

    <?php if ( have_posts() ) : ?>
      <div class="search-results-list">
        <?php while ( have_posts() ) : the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class( 'search-result-card' ); ?>>
            <header class="search-result-card__header">
              <h2 class="search-result-card__title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h2>
            </header>

            <div class="search-result-card__excerpt">
              <?php the_excerpt(); ?>
            </div>

            <footer class="search-result-card__footer">
              <a href="<?php the_permalink(); ?>" class="btn btn--outline-purple btn--sm">
                <?php esc_html_e( 'Ver contenido', 'la-otra-lucha' ); ?>
              </a>
            </footer>
          </article>
        <?php endwhile; ?>
      </div>

      <?php
      the_posts_pagination(
          array(
              'prev_text' => '&larr; ' . esc_html__( 'Anteriores', 'la-otra-lucha' ),
              'next_text' => esc_html__( 'Siguientes', 'la-otra-lucha' ) . ' &rarr;',
          )
      );
      ?>

    <?php else : ?>
      <div class="no-search-results">
        <p class="no-search-results__msg">
          <?php esc_html_e( 'No encontramos resultados que coincidan con tu búsqueda. Intenta con otros términos relacionados con la salud, derechos o el caso de Karin Pardo.', 'la-otra-lucha' ); ?>
        </p>

        <div class="no-search-results__form">
          <?php get_search_form(); ?>
        </div>

        <div class="no-search-results__actions">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--purple">
            <?php esc_html_e( 'Volver al inicio', 'la-otra-lucha' ); ?>
          </a>
          <a href="<?php echo esc_url( home_url( '/#conoce-tus-derechos' ) ); ?>" class="btn btn--pink">
            <?php esc_html_e( 'Guía de Derechos', 'la-otra-lucha' ); ?>
          </a>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>

<?php
get_footer();
