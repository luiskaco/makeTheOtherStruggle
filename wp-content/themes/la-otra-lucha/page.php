<?php
/**
 * Plantilla estándar para páginas (Page Template)
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
    <?php while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class( 'page-article' ); ?>>
        <header class="page-article__header">
          <h1 class="page-article__title"><?php the_title(); ?></h1>
          <div class="page-article__divider" aria-hidden="true"></div>
        </header>

        <div class="page-article__content entry-content">
          <?php
          the_content();

          wp_link_pages(
              array(
                  'before' => '<div class="page-links">' . esc_html__( 'Páginas:', 'la-otra-lucha' ),
                  'after'  => '</div>',
              )
          );
          ?>
        </div>
      </article>
    <?php endwhile; ?>
  </div>
</div>

<?php
get_footer();
