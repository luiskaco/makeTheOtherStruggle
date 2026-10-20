<?php
/**
 * Template Part: Ruta de la Paciente (8 Dimensiones)
 *
 * @package LaOtraLucha
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$route_logo = lol_get_field( 'route_logo', LA_OTRA_LUCHA_URI . '/assets/img/logo-observatorio-oncologico.png' );
$route_logo_url = is_array( $route_logo ) ? ( $route_logo['url'] ?? '' ) : $route_logo;
if ( ! $route_logo_url ) {
    $route_logo_url = LA_OTRA_LUCHA_URI . '/assets/img/logo-observatorio-oncologico.png';
}
?>
<!-- ======================================================================
         SECCIÓN 6: LA RUTA DE LA PACIENTE — 8 DIMENSIONES (Fiel a diseno/6.png con Recurso 5.svg)
         ====================================================================== -->
    <section id="la-investigacion" class="patient-route" data-wp-part="section-patient-route" data-acf-group="group_patient_route">
      <div class="container patient-route__layout">
        <div class="patient-route__header reveal-on-scroll">
          <img
            src="<?php echo esc_url( $route_logo_url ); ?>"
            alt="<?php esc_attr_e( 'Observatorio de Cáncer', 'la-otra-lucha' ); ?>"
            class="patient-route__logo"
            width="200"
            height="56"
            loading="lazy"
            decoding="async"
          />
          <h2 class="patient-route__title" data-acf-field="route_heading">
            <span class="patient-route__title-line">LA RUTA DE LA</span>
            <span class="patient-route__title-line"><span class="text-pink">PACIENTE</span> CON</span>
            <span class="patient-route__title-line">CÁNCER DE MAMA</span>
          </h2>
          <p class="patient-route__subtitle" data-acf-field="route_subheading">
            ¿QUÉ BUSCAMOS CONOCER?
          </p>

          <div class="outlined-callout" data-acf-field="route_intro_box">
            <p>
              Por primera vez, una investigación recoge las experiencias de las pacientes para identificar las barreras y los tiempos de espera que enfrentan en su recorrido por el sistema de salud.
            </p>
          </div>
        </div>

        <div class="road-eight reveal-on-scroll">
          <!-- Gráfico Oficial Recurso 5.svg de borde derecho a borde izquierdo con sus 8 círculos -->
          <img
            src="<?php echo esc_url( LA_OTRA_LUCHA_URI . '/assets/svg/road-8-ruta.svg' ); ?>"
            alt=""
            class="road-eight__graphic"
            width="1987"
            height="913"
            aria-hidden="true"
          />

          <ol class="road-eight__list" data-acf-field="route_items">
            <li class="road-eight__item road-eight__item--1">
              <span class="road-eight__num" aria-hidden="true">1</span>
              <span class="road-eight__text">
                LOS TIEMPOS DE<br />
                <em>ESPERA</em> PARA<br />
                <strong>CONSULTAS Y<br />EXÁMENES</strong>
                <svg class="road-eight__stroke" aria-hidden="true">
                  <use href="#brush-stroke" />
                </svg>
              </span>
            </li>

            <li class="road-eight__item road-eight__item--2">
              <span class="road-eight__num" aria-hidden="true">2</span>
              <span class="road-eight__text">
                EL TIEMPO QUE<br />
                <em>TRANSCURRE</em> HASTA<br />
                <strong>LA CONFIRMACIÓN<br />DEL DIAGNÓSTICO</strong>
                <svg class="road-eight__stroke" aria-hidden="true">
                  <use href="#brush-stroke" />
                </svg>
              </span>
            </li>

            <li class="road-eight__item road-eight__item--3">
              <span class="road-eight__num" aria-hidden="true">3</span>
              <span class="road-eight__text">
                LAS DIFICULTADES<br />
                PARA <em>ACCEDER</em> A<br />
                <strong>ESPECIALISTAS Y<br />PROCEDIMIENTOS</strong>
                <svg class="road-eight__stroke" aria-hidden="true">
                  <use href="#brush-stroke" />
                </svg>
              </span>
            </li>

            <li class="road-eight__item road-eight__item--4">
              <span class="road-eight__num" aria-hidden="true">4</span>
              <span class="road-eight__text">
                EL <em>TIEMPO DE<br />ESPERA</em> PARA<br />
                COMENZAR EL PRIMER<br />
                <strong>TRATAMIENTO</strong>
                <svg class="road-eight__stroke" aria-hidden="true">
                  <use href="#brush-stroke" />
                </svg>
              </span>
            </li>

            <li class="road-eight__item road-eight__item--5">
              <span class="road-eight__num" aria-hidden="true">5</span>
              <span class="road-eight__text">
                LAS <em>BARRERAS<br />ECONÓMICAS Y<br />GEOGRÁFICAS</em> PARA<br />
                <strong>RECIBIR ATENCIÓN</strong>
                <svg class="road-eight__stroke" aria-hidden="true">
                  <use href="#brush-stroke" />
                </svg>
              </span>
            </li>

            <li class="road-eight__item road-eight__item--6">
              <span class="road-eight__num" aria-hidden="true">6</span>
              <span class="road-eight__text">
                LOS PROBLEMAS DE<br />
                <em>DISPONIBILIDAD</em> DE<br />
                <strong>MEDICAMENTOS</strong>
                <svg class="road-eight__stroke" aria-hidden="true">
                  <use href="#brush-stroke" />
                </svg>
              </span>
            </li>

            <li class="road-eight__item road-eight__item--7">
              <span class="road-eight__num" aria-hidden="true">7</span>
              <span class="road-eight__text">
                LAS <em>INTERRUPCIONES</em><br />
                QUE PUEDEN AFECTAR<br />
                <strong>LA CONTINUIDAD DEL<br />TRATAMIENTO</strong>
                <svg class="road-eight__stroke" aria-hidden="true">
                  <use href="#brush-stroke" />
                </svg>
              </span>
            </li>

            <li class="road-eight__item road-eight__item--8">
              <span class="road-eight__num" aria-hidden="true">8</span>
              <span class="road-eight__text">
                LA <em>INFORMACIÓN<br />QUE RECIBEN</em> LAS<br />
                PACIENTES DURANTE<br />
                SU <strong>RECORRIDO</strong>
                <svg class="road-eight__stroke" aria-hidden="true">
                  <use href="#brush-stroke" />
                </svg>
              </span>
            </li>
          </ol>
        </div>
      </div>
    </section>
