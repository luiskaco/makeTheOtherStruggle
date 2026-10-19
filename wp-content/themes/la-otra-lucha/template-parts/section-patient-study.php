<?php
/**
 * Template Part: Sección Estudio de la Paciente (Observatorio Oncológico)
 *
 * @package LaOtraLucha
 * @version 1.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$study_pill      = lol_get_field( 'study_pill', 'UN ESTUDIO PIONERO EN EL PERÚ' );
$study_title     = lol_get_field( 'study_title', "LA RUTA DE LA PACIENTE\nCON CÁNCER DE MAMA" );
$study_subtitle  = lol_get_field( 'study_subtitle', 'Un estudio de Por Un Perú Sin Cáncer, a través de su Observatorio Oncológico.' );
$study_desc      = lol_get_field( 'study_desc', 'Por primera vez, una investigación recoge las experiencias de las pacientes para identificar las barreras y los tiempos de espera que enfrentan en su recorrido por el sistema de salud.' );
$study_stat1_num = lol_get_field( 'study_stat1_num', '59,5%' );
$study_stat1_txt = lol_get_field( 'study_stat1_text', 'reportó dificultades para realizarse exámenes.' );
$study_stat2_num = lol_get_field( 'study_stat2_num', '60,6%' );
$study_stat2_txt = lol_get_field( 'study_stat2_text', 'reportó retrasos en el inicio del tratamiento.' );
$study_tagline   = lol_get_field( 'study_tagline', 'La ruta hacia el tratamiento también importa.' );
$study_cta_text  = lol_get_field( 'study_cta_text', 'CONOCE LOS RESULTADOS DEL ESTUDIO' );
$study_cta_url   = lol_get_field( 'study_cta_url', 'https://observatoriodecancer.com/resultado-la-ruta-del-paciente/' );
?>

<section id="estudio-observatorio" class="patient-study" data-wp-part="section-patient-study" data-acf-group="group_patient_study">
  <div class="container patient-study__container">
    <div class="patient-study__content">

      <!-- Título principal -->
      <h2 class="patient-study__title" data-acf-field="study_title">
        <?php echo nl2br( esc_html( $study_title ) ); ?>
      </h2>

      <!-- Subtítulo institucional -->
      <p class="patient-study__subtitle" data-acf-field="study_subtitle">
        <strong><?php echo esc_html( $study_subtitle ); ?></strong>
      </p>

      <!-- Descripción -->
      <p class="patient-study__desc" data-acf-field="study_desc">
        <?php echo esc_html( $study_desc ); ?>
      </p>

      <!-- Bloque de 2 Estadísticas con divisorio -->
      <div class="patient-study__stats">
        <!-- Stat 1: Exámenes -->
        <div class="patient-study__stat-item">
          <div class="patient-study__stat-icon-wrap" aria-hidden="true">
            <svg class="patient-study__stat-icon" viewBox="0 0 44 48" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect x="5" y="8" width="34" height="36" rx="6" stroke="#7d1538" stroke-width="2.6" fill="#ffffff" fill-opacity="0.6" />
              <path d="M15 8V5C15 3.89543 15.8954 3 17 3H27C28.1046 3 29 3.89543 29 5V8" stroke="#7d1538" stroke-width="2.6" stroke-linecap="round" />
              <!-- Cruz médica -->
              <path d="M22 17V27M17 22H27" stroke="#7d1538" stroke-width="2.6" stroke-linecap="round" />
              <!-- Líneas de reporte -->
              <path d="M14 33H30M14 38H24" stroke="#7d1538" stroke-width="2.2" stroke-linecap="round" />
            </svg>
          </div>
          <div class="patient-study__stat-data">
            <span class="patient-study__stat-num" data-count-target="59.5" data-count-decimals="1" data-count-comma="true" data-count-suffix="%" data-acf-field="study_stat1_num">
              <?php echo esc_html( $study_stat1_num ); ?>
            </span>
            <p class="patient-study__stat-txt" data-acf-field="study_stat1_text">
              <?php echo esc_html( $study_stat1_txt ); ?>
            </p>
          </div>
        </div>

        <!-- Divisorio vertical -->
        <div class="patient-study__stats-divider" aria-hidden="true"></div>

        <!-- Stat 2: Retrasos tratamiento -->
        <div class="patient-study__stat-item">
          <div class="patient-study__stat-icon-wrap" aria-hidden="true">
            <svg class="patient-study__stat-icon" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
              <!-- Anillas -->
              <path d="M14 3V8M34 3V8" stroke="#7d1538" stroke-width="2.6" stroke-linecap="round" />
              <!-- Cuerpo calendario -->
              <rect x="5" y="6" width="38" height="36" rx="6" stroke="#7d1538" stroke-width="2.6" fill="#ffffff" fill-opacity="0.6" />
              <path d="M5 15H43" stroke="#7d1538" stroke-width="2.4" />
              <!-- Círculo reloj en esquina inferior derecha -->
              <circle cx="33" cy="33" r="10" fill="#fae8ef" stroke="#7d1538" stroke-width="2.4" />
              <path d="M33 28V33L36.5 35" stroke="#7d1538" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
          <div class="patient-study__stat-data">
            <span class="patient-study__stat-num" data-count-target="60.6" data-count-decimals="1" data-count-comma="true" data-count-suffix="%" data-acf-field="study_stat2_num">
              <?php echo esc_html( $study_stat2_num ); ?>
            </span>
            <p class="patient-study__stat-txt" data-acf-field="study_stat2_text">
              <?php echo esc_html( $study_stat2_txt ); ?>
            </p>
          </div>
        </div>
      </div>

      <!-- Cita destacada inferior -->
      <p class="patient-study__tagline" data-acf-field="study_tagline">
        <?php echo esc_html( $study_tagline ); ?>
      </p>

      <!-- Botón CTA que redirige a la web del observatorio -->
      <div class="patient-study__cta-wrap">
        <a
          href="<?php echo esc_url( $study_cta_url ); ?>"
          target="_blank"
          rel="noopener noreferrer"
          class="btn patient-study__btn"
          data-acf-field="study_cta"
        >
          <span><?php echo esc_html( $study_cta_text ); ?></span>
          <svg class="patient-study__btn-arrow" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M5 12h14M12 5l7 7-7 7" />
          </svg>
        </a>
      </div>

    </div><!-- /.patient-study__content -->
  </div><!-- /.container -->
</section>
