<?php
/**
 * Template Part: Historia de Karin Pardo
 *
 * @package LaOtraLucha
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!-- ======================================================================
         SECCIÓN 2: KARIN PARDO (Fiel a diseno/2.png)
         ====================================================================== -->
    <section id="historia-karin" class="karin-story" data-wp-part="section-karin" data-acf-group="group_karin">
      <div class="container">
        <div class="karin-story__card">
          <div class="karin-story__media">
            <picture>
              <source srcset="<?php echo esc_url( LA_OTRA_LUCHA_URI . '/assets/img/foto-karin.webp' ); ?>" type="image/webp" />
              <img
                src="<?php echo esc_url( LA_OTRA_LUCHA_URI . '/assets/img/foto-karin.png' ); ?>"
                alt="Retrato de Karin Pardo rodeada por un lazo rosa en representación de las pacientes con cáncer de mama"
                class="karin-story__img"
                width="1800"
                height="683"
                loading="lazy"
                data-acf-field="karin_photo"
              />
            </picture>

            <h2 class="karin-story__quote" data-acf-field="karin_quote">
              <span class="karin-story__quote-line">“EL CÁNCER NO PUEDE ESPERAR.</span>
              <span class="karin-story__quote-line">
                LAS RESPUESTAS
                <span class="karin-story__script-wrap">
                  <span class="karin-story__quote-script">tampoco</span>
                  <svg class="karin-story__quote-stroke" aria-hidden="true">
                    <use href="#brush-stroke" />
                  </svg>
                </span><span class="karin-story__quote-end">”</span>
              </span>
            </h2>
          </div>

          <div class="karin-story__content reveal-on-scroll">
            <p class="karin-story__subtitle" data-acf-field="karin_subtitle">
              KARIN PARDO: EL ROSTRO DE LA OTRA LUCHA
            </p>

            <p class="karin-story__bio" data-acf-field="karin_bio">
              <strong>Karin Pardo</strong>, paciente con cáncer de mama, quien evidencia cómo las <strong>fallas de articulación del sistema de salud</strong> pueden convertirse en <strong>barreras para acceder a un tratamiento oncológico.</strong> Su solicitud para que pueda acceder a un tratamiento que le salvará la vida, <strong>viene siendo evaluada casi dos años</strong> y continúa atrapada en un ciclo de consultas y devoluciones entre instituciones. Karin <strong>no ha recibido un rechazo: ha recibido demoras</strong>, mientras su necesidad de tratamiento sigue esperando una respuesta. Su historia expone las brechas que la <strong>Ruta de la Paciente con Cáncer de Mama</strong> busca visibilizar para impulsar cambios concretos en el sistema.
            </p>

            <div class="karin-story__cta">
              <a href="#las-cuatro-luchas" class="btn btn--purple" data-acf-field="karin_cta">
                CONOCE LA HISTORIA DE KARIN
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
