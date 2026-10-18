<?php
/**
 * Plantilla de entrada individual (Single Post)
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
      <article id="post-<?php the_ID(); ?>" <?php post_class( 'page-article page-article--single' ); ?>>
        <header class="page-article__header">
          <div class="page-article__meta">
            <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" class="page-article__date">
              <?php echo esc_html( get_the_date() ); ?>
            </time>
            <?php
            $categories_list = get_the_category_list( ', ' );
            if ( $categories_list ) :
            ?>
              <span class="page-article__categories" aria-label="<?php esc_attr_e( 'Categorías', 'la-otra-lucha' ); ?>">
                &bull; <?php echo wp_kses_post( $categories_list ); ?>
              </span>
            <?php endif; ?>
          </div>

          <h1 class="page-article__title"><?php the_title(); ?></h1>
          <div class="page-article__divider" aria-hidden="true"></div>
        </header>

        <?php if ( has_post_thumbnail() ) : ?>
          <div class="page-article__featured-image">
            <?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
          </div>
        <?php endif; ?>

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

        <footer class="page-article__footer">
          <?php
          the_post_navigation(
              array(
                  'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Anterior:', 'la-otra-lucha' ) . '</span> <span class="nav-title">%title</span>',
                  'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Siguiente:', 'la-otra-lucha' ) . '</span> <span class="nav-title">%title</span>',
              )
          );
          ?>
        </footer>

        <?php
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
        ?>
      </article>
    <?php endwhile; ?>
  </div>
</div>

<?php
get_footer();
