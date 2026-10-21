<?php
/**
 * Template Part: Hero Principal
 *
 * @package LaOtraLucha
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!-- ======================================================================
         SECCIÓN 1: HERO PRINCIPAL (Fiel a diseno/1.png con hero-calado.png)
         ====================================================================== -->
    <section id="inicio" class="hero" data-wp-part="section-hero" data-acf-group="group_hero">
      <div class="container hero__grid">
        <div class="hero__media reveal-on-scroll">
          <div class="hero__media-wrap">
            <img
              src="<?php echo esc_url( LA_OTRA_LUCHA_URI . '/assets/img/hero-calado.png' ); ?>"
              alt="Cinco mujeres peruanas unidas representando la lucha por una atención oportuna contra el cáncer de mama"
              class="hero__img"
              width="1091"
              height="935"
              fetchpriority="high"
              data-acf-field="hero_image"
            />
            <?php
            $hero_video_raw = lol_get_field( 'hero_video_url', 'https://www.youtube.com/watch?v=gmZVwGiNzJM' );
            $hero_video_url = lol_get_youtube_embed_url( $hero_video_raw );
            ?>
            <button
              type="button"
              class="hero__play-btn"
              id="hero-play-btn"
              data-video-modal-trigger
              data-video-url="<?php echo esc_url( $hero_video_url ); ?>"
              aria-label="<?php esc_attr_e( 'Reproducir video de la campaña', 'la-otra-lucha' ); ?>"
              aria-haspopup="dialog"
              aria-controls="video-modal"
            >
              <span class="hero__play-pulse" aria-hidden="true"></span>
              <span class="hero__play-circle" aria-hidden="true">
                <svg class="hero__play-icon" viewBox="0 0 24 24" width="28" height="28" aria-hidden="true" fill="currentColor">
                  <path d="M8 5.14v14.72a1 1 0 0 0 1.5.86l12-7.36a1 1 0 0 0 0-1.72l-12-7.36A1 1 0 0 0 8 5.14z"/>
                </svg>
              </span>
            </button>
          </div>
        </div>

        <div class="hero__content reveal-on-scroll">
          <h1 class="hero__title" data-acf-field="hero_title">
            <span class="hero__title-line">EL CÁNCER YA ES UNA</span>
            <span class="hero__title-line"><span class="text-pink">LUCHA.</span> ACCEDER A UNA</span>
            <span class="hero__title-line"><span class="text-pink">ATENCIÓN OPORTUNA</span> ES</span>
            <span class="hero__script-wrap">
              <span class="hero__title-script">la otra lucha</span>
              <svg class="hero__title-stroke" aria-hidden="true">
                <use href="#brush-stroke" />
              </svg>
            </span>
          </h1>

          <div class="hero__actions">
            <a href="<?php echo esc_url( home_url( '/historia-de-karin/' ) ); ?>" class="btn btn--purple btn--hero" data-acf-field="hero_cta_primary">
              CONOCE LA<br />HISTORIA DE<br />KARIN
            </a>
            <a href="#conoce-tus-derechos" class="btn btn--purple btn--hero" data-acf-field="hero_cta_secondary">
              CONOCE TUS<br />DERECHOS
            </a>
          </div>
        </div>
      </div>
    </section>
