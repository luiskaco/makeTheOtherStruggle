<?php
/**
 * Template Part: Banner Cita Observatorio
 *
 * @package LaOtraLucha
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$observatory_cta_url = lol_get_field( 'observatory_cta_url', 'https://observatoriodecancer.com/' );
?>
<!-- ======================================================================
         SECCIÓN 7: BANNER CITA OBSERVATORIO (Fiel a diseno/7.png con Recurso 7, 20 y 21)
         ====================================================================== -->
    <section class="quote-banner" aria-label="Observatorio Oncológico" data-wp-part="section-quote-banner">
      <div class="container quote-showcase reveal-on-scroll">
        <div class="quote-showcase__row">
          <img
            src="<?php echo esc_url( LA_OTRA_LUCHA_URI . '/assets/svg/quote-open-pink.svg' ); ?>"
            alt=""
            class="quote-showcase__mark-img"
            width="95"
            height="91"
            aria-hidden="true"
          />

          <p class="quote-showcase__text" data-acf-field="observatory_quote">
            <em>ESCUCHAR A LAS PACIENTES</em> ES EL PRIMER<br />
            PASO PARA <strong>COMPRENDER</strong> QUÉ DEBE <strong>CAMBIAR</strong>
          </p>

          <img
            src="<?php echo esc_url( LA_OTRA_LUCHA_URI . '/assets/svg/quote-close-pink.svg' ); ?>"
            alt=""
            class="quote-showcase__mark-img"
            width="95"
            height="91"
            aria-hidden="true"
          />
        </div>

        <a href="<?php echo esc_url( $observatory_cta_url ); ?>" target="_blank" rel="noopener noreferrer" class="btn btn--pink" data-acf-field="observatory_cta">
          CONOCE EL OBSERVATORIO ONCOLÓGICO
        </a>
      </div>
    </section>
