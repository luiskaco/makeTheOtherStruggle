<?php
/**
 * Template Part: Conoce tus Derechos
 *
 * @package LaOtraLucha
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!-- ======================================================================
         SECCIÓN 8: CONOCE TUS DERECHOS (Fiel a diseno/8.png con Recurso 8–12.svg)
         ====================================================================== -->
    <section id="conoce-tus-derechos" class="rights-guide" data-wp-part="section-rights" data-acf-group="group_rights">
      <div class="container">
        <div class="rights-guide__box reveal-on-scroll">
          <div class="rights-guide__intro">
            <p class="rights-guide__eyebrow" data-acf-field="rights_eyebrow">
              CONOCE TUS DERECHOS
            </p>
            <h2 class="rights-guide__title" data-acf-field="rights_heading">
              <span class="rights-guide__title-line">LA INFORMACIÓN</span>
              <span class="rights-guide__title-line">TAMBIÉN ES UNA</span>
              <span class="rights-guide__title-line">HERRAMIENTA DE</span>
              <span class="rights-guide__script-wrap">
                <span class="rights-guide__script">lucha</span>
                <svg class="rights-guide__stroke" aria-hidden="true">
                  <use href="#brush-stroke" />
                </svg>
              </span>
            </h2>
          </div>

          <div class="rights-cards" data-acf-field="rights_scenarios">
            <!-- Escenario 1: Recurso 10.svg -->
            <a href="#evidencia-a-la-accion" class="rights-card">
              <img src="<?php echo esc_url( LA_OTRA_LUCHA_URI . '/assets/svg/icon-cita.svg' ); ?>" alt="" class="rights-card__icon" width="70" height="62" aria-hidden="true" />
              <span class="rights-card__label">SI NO CONSIGO<br />UNA CITA</span>
            </a>

            <!-- Escenario 2: Recurso 8.svg -->
            <a href="#evidencia-a-la-accion" class="rights-card">
              <img src="<?php echo esc_url( LA_OTRA_LUCHA_URI . '/assets/svg/icon-diagnostico-demora.svg' ); ?>" alt="" class="rights-card__icon" width="63" height="62" aria-hidden="true" />
              <span class="rights-card__label">SI MI DIAGNÓSTICO<br />SE DEMORA</span>
            </a>

            <!-- Escenario 3: Recurso 9.svg -->
            <a href="#evidencia-a-la-accion" class="rights-card">
              <img src="<?php echo esc_url( LA_OTRA_LUCHA_URI . '/assets/svg/icon-medicamento.svg' ); ?>" alt="" class="rights-card__icon" width="74" height="62" aria-hidden="true" />
              <span class="rights-card__label">SI NO ENCUENTRO<br />EL MEDICAMENTO<br />INDICADO</span>
            </a>

            <!-- Escenario 4: Recurso 11.svg -->
            <a href="#evidencia-a-la-accion" class="rights-card">
              <img src="<?php echo esc_url( LA_OTRA_LUCHA_URI . '/assets/svg/icon-tratamiento.svg' ); ?>" alt="" class="rights-card__icon" width="62" height="62" aria-hidden="true" />
              <span class="rights-card__label">SI MI<br />TRATAMIENTO SE<br />INTERRUMPE</span>
            </a>

            <!-- Escenario 5: Recurso 12.svg -->
            <a href="#evidencia-a-la-accion" class="rights-card">
              <img src="<?php echo esc_url( LA_OTRA_LUCHA_URI . '/assets/svg/icon-derechos.svg' ); ?>" alt="" class="rights-card__icon" width="72" height="62" aria-hidden="true" />
              <span class="rights-card__label">SI CONSIDERO QUE<br />MIS DERECHOS HAN<br />SIDO VULNERADOS</span>
            </a>
          </div>
        </div>
      </div>
    </section>
