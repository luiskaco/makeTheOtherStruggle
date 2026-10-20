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

        <a href="#evidencia-a-la-accion" class="btn btn--pink" data-acf-field="observatory_cta">
          CONOCE EL OBSERVATORIO ONCOLÓGICO
        </a>
      </div>
    </section>
