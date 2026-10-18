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
          <img
            src="<?php echo esc_url( LA_OTRA_LUCHA_URI . '/assets/img/hero-calado.png' ); ?>"
            alt="Cinco mujeres peruanas unidas representando la lucha por una atención oportuna contra el cáncer de mama"
            class="hero__img"
            width="1091"
            height="935"
            fetchpriority="high"
            data-acf-field="hero_image"
          />
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
            <a href="#historia-karin" class="btn btn--purple btn--hero" data-acf-field="hero_cta_primary">
              CONOCE LA<br />HISTORIA DE<br />KARIN
            </a>
            <a href="#conoce-tus-derechos" class="btn btn--purple btn--hero" data-acf-field="hero_cta_secondary">
              CONOCE TUS<br />DERECHOS
            </a>
          </div>
        </div>
      </div>
    </section>
