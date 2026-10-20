<?php
/**
 * Template Part: Las 4 Luchas y Franja de Pilares
 *
 * @package LaOtraLucha
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!-- ======================================================================
         SECCIÓN 4: LAS 4 LUCHAS (Fiel a diseno/4.png con Recurso 19.svg conectado a la caja)
         ====================================================================== -->
    <section id="las-cuatro-luchas" class="four-fights" data-wp-part="section-four-fights" data-acf-group="group_four_fights">
      <div class="container four-fights__layout">
        <!-- Columna Editorial Derecha (Título + Caja conectada al final del camino Recurso 19.svg) -->
        <div class="four-fights__editorial reveal-on-scroll">
          <h2 class="four-fights__title" data-acf-field="fights_heading">
            <span class="four-fights__title-line text-pink">LA OTRA LUCHA</span>
            <span class="four-fights__title-line">COMIENZA CUANDO EL</span>
            <span class="four-fights__title-line">CAMINO SE LLENA DE</span>
            <span class="four-fights__title-line text-pink">BARRERAS</span>
          </h2>

          <div class="outlined-callout four-fights__callout" data-acf-field="fights_box">
            <p>
              Una paciente <strong>necesita mucho más que un diagnóstico</strong><br />
              Después de <strong>detectar una señal de alerta, comienza una ruta</strong>
              que requiere <strong>atención, coordinación y continuidad.</strong> Sin
              embargo, en cada etapa pueden aparecer <strong>obstáculos</strong> que
              dificultan el acceso oportuno a los servicios de salud.
            </p>
          </div>
        </div>

        <!-- Gráfico Oficial Recurso 19.svg con los 4 pasos perfectamente anclados a sus 4 círculos -->
        <div class="road-four reveal-on-scroll">
          <img
            src="<?php echo esc_url( LA_OTRA_LUCHA_URI . '/assets/svg/road-4-luchas.svg?v=' . filemtime( get_template_directory() . '/assets/svg/road-4-luchas.svg' ) ); ?>"
            alt=""
            class="road-four__graphic"
            width="1059"
            height="618"
            aria-hidden="true"
          />

          <ol class="road-four__list" data-acf-field="fights_steps">
            <!-- Hito 1 oculto según solicitud:
            <li class="road-four__item road-four__item--1">
              <span class="road-four__num" aria-hidden="true">1</span>
              <span class="road-four__text">
                LA LUCHA POR
                <strong>CONSEGUIR<br />ATENCIÓN</strong>
                <svg class="road-four__stroke" aria-hidden="true">
                  <use href="#brush-stroke" />
                </svg>
              </span>
            </li>
            -->

            <li class="road-four__item road-four__item--2">
              <span class="road-four__num" aria-hidden="true">2</span>
              <span class="road-four__text">
                LA LUCHA POR
                <strong>CONFIRMAR EL<br />DIAGNÓSTICO</strong>
                <svg class="road-four__stroke" aria-hidden="true">
                  <use href="#brush-stroke" />
                </svg>
              </span>
            </li>

            <li class="road-four__item road-four__item--3">
              <span class="road-four__num" aria-hidden="true">3</span>
              <span class="road-four__text">
                LA LUCHA POR
                <strong>COMENZAR EL<br />TRATAMIENTO</strong>
                <svg class="road-four__stroke" aria-hidden="true">
                  <use href="#brush-stroke" />
                </svg>
              </span>
            </li>

            <li class="road-four__item road-four__item--4">
              <span class="road-four__num" aria-hidden="true">4</span>
              <span class="road-four__text">
                LA LUCHA POR
                <strong>CONTINUAR</strong>
                <svg class="road-four__stroke" aria-hidden="true">
                  <use href="#brush-stroke" />
                </svg>
              </span>
            </li>
          </ol>
        </div>
      </div>
    </section>

    <!-- SECCIÓN 5: FRANJA MORADA DE 4 PILARES (Oculta según requerimiento)
    <div class="pillars-bar" aria-label="Principios de la ruta de atención">
      <div class="container">
        <ul class="pillars-bar__list" data-acf-field="fights_pillars">
          <li class="pillars-bar__item">CADA ETAPA<br />IMPORTA</li>
          <li class="pillars-bar__item">CADA ETAPA<br />DEMORA</li>
          <li class="pillars-bar__item">CADA ETAPA MERECE<br />SER INVESTIGADA</li>
          <li class="pillars-bar__item">CADA BARRERA DEBE<br />PODER VISIBILIZARSE</li>
        </ul>
      </div>
    </div>
    -->

