<?php
/**
 * Plantilla de archivo de entradas (Archive Template)
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
      <?php
      the_archive_title( '<h1 class="page-article__title">', '</h1>' );
      the_archive_description( '<div class="page-article__archive-description">', '</div>' );
      ?>
      <div class="page-article__divider" aria-hidden="true"></div>
    </header>

    <?php if ( have_posts() ) : ?>
      <div class="archive-posts-list">
        <?php while ( have_posts() ) : the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class( 'archive-post-card' ); ?>>
            <header class="archive-post-card__header">
              <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" class="archive-post-card__date">
                <?php echo esc_html( get_the_date() ); ?>
              </time>
              <h2 class="archive-post-card__title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h2>
            </header>

            <div class="archive-post-card__excerpt">
              <?php the_excerpt(); ?>
            </div>

            <footer class="archive-post-card__footer">
              <a href="<?php the_permalink(); ?>" class="btn btn--outline-purple btn--sm">
                <?php esc_html_e( 'Leer más', 'la-otra-lucha' ); ?>
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
      <div class="no-posts-found">
        <p><?php esc_html_e( 'No se encontraron publicaciones en esta sección.', 'la-otra-lucha' ); ?></p>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--purple">
          <?php esc_html_e( 'Volver al inicio', 'la-otra-lucha' ); ?>
        </a>
      </div>
    <?php endif; ?>
  </div>
</div>

<?php
get_footer();
