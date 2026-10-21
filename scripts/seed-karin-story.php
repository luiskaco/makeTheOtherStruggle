<?php
/**
 * Script de provisión de la página: La Historia de Karin Pardo (/historia-de-karin/)
 * Formatea el testimonio íntegro de Karin Pardo para la campaña La Otra Lucha.
 */

require_once __DIR__ . '/../wp-load.php';

header( 'Content-Type: text/plain; charset=UTF-8' );

echo "=== PROVISIÓN DE LA HISTORIA DE KARIN PARDO ===" . PHP_EOL;

$page_slug  = 'historia-de-karin';
$page_title = 'La Historia de Karin Pardo';

$content = <<<HTML
<div class="karin-story-page">
  <div class="karin-story-page__hero-box">
    <div class="karin-story-page__badge">TESTIMONIO OFICIAL — LA OTRA LUCHA</div>
    <p class="karin-story-page__subheadline">Karin Pardo, 29 años, administradora y paciente con cáncer de mama HR+/HER2− de alto riesgo en Lima, Perú.</p>
  </div>

  <div class="karin-story-page__lead">
    <p>Me llamo <strong>Karin Pardo</strong>, tengo 29 años, soy administradora y vivo en Lima. En octubre, el mes del <strong>cáncer de mama</strong>, el mensaje que más se repite es la <strong>prevención</strong>, y está bien que así sea: detectar a tiempo salva vidas. Pero quiero contar lo que pasa después, cuando ya te diagnosticaron, ya te trataron y, aun así, sigues luchando.</p>
  </div>

  <div class="karin-story-page__grid">
    <div class="karin-milestone-card">
      <div class="karin-milestone-card__time">Agosto 2023 – Junio 2024</div>
      <h3 class="karin-milestone-card__title">Un año para un diagnóstico que exigía urgencia</h3>
      <p>En agosto de 2023 encontré un bulto en el seno izquierdo durante un chequeo ginecológico. Dos veces me dijeron que era <a href="https://www.infobae.com/peru/2026/08/05/cancer-de-mama-en-peru-el-pais-necesitaria-mas-de-tres-decadas-para-hacer-mamografias-a-todas-las-mujeres-que-las-requieren" target="_blank" rel="noopener noreferrer"><em>algo benigno</em></a>. Conseguir una <strong>ecografía</strong> me tomó cerca de un mes, y fue posible porque mi madre, que tiene más de 60 años, hizo la cola por mí. La <strong>biopsia</strong> que confirmó el cáncer llegó recién en junio de 2024, casi un año después. El diagnóstico: <strong>cáncer de mama en estadio III</strong>, subtipo HR+/HER2−, con alto riesgo de recaída.</p>
    </div>

    <div class="karin-milestone-card">
      <div class="karin-milestone-card__time">El Proceso de Tratamiento</div>
      <h3 class="karin-milestone-card__title">Mastectomía radical y menopausia antes de los 30</h3>
      <p>Desde entonces pasé por <strong>quimioterapia</strong>, una <a href="https://www.infobae.com/peru/2026/10/06/sofia-bogani-actriz-de-asi-es-la-vida-habla-de-su-diagnostico-de-cancer-de-mama-cuando-me-entere-senti-confusion" target="_blank" rel="noopener noreferrer"><strong><em>mastectomía radical</em></strong></a> con extracción de ganglios, la extirpación de trompas y ovarios, que me llevó a una menopausia quirúrgica definitiva antes de cumplir 30, y <strong>radioterapia</strong>, que tuve que pagar de forma particular porque en mi centro de salud no había citas disponibles.</p>
    </div>
  </div>

  <blockquote class="karin-story-page__quote">
    <p>“Muchos creen que ahí termina la historia. No es así. Para pacientes como yo, la lucha continúa después de la quimio y la radio.”</p>
  </blockquote>

  <div class="karin-stat-highlight">
    <div class="karin-stat-highlight__num">57%</div>
    <div class="karin-stat-highlight__text">
      <strong>Probabilidad de que la enfermedad regrese</strong> en casos de alto riesgo como el mío, muchas veces convertida en <a href="https://www.infobae.com/teleshow/2026/07/25/el-conmovedor-relato-de-la-la-influencer-caro-trippar-tengo-cancer-ese-es-mi-diagnostico" target="_blank" rel="noopener noreferrer"><strong><em>metástasis</em></strong></a>. Vivir con esa cifra no es sobrevivir tranquila: es contar los días, hacerse cada control con miedo y postergar planes sin saber si habrá tiempo para cumplirlos.
    </div>
  </div>

  <div class="karin-story-page__section">
    <h3>La terapia que reduce el riesgo y la barrera del costo</h3>
    <p>Mi médico me explicó el riesgo de recaída, me comentó que existe una terapia que sumada al tratamiento hormonal, reduce significativamente este riesgo. Tiene respaldo científico internacional, ha sido evaluada por agencias como <strong>NICE</strong> en el Reino Unido y <strong>CADTH</strong> en Canadá, y forma parte de los sistemas públicos de salud de <strong>Colombia, México, Brasil, Argentina, Uruguay y Costa Rica</strong>.</p>
    <p>En el Perú, solo el Hospital Militar la cubre. En el sector privado lo cubre y el precio es aproximadamente de <strong>14 mil soles al mes</strong>, durante dos años. Para la mayoría de familias peruanas, es <a href="https://www.infobae.com/mexico/2026/10/08/mexico-suma-mas-de-20-mil-casos-de-cancer-de-mama-en-2026-pacientes-viven-entre-depresion-e-incertidumbre-por-abasto-de-medicinas" target="_blank" rel="noopener noreferrer"><em>simplemente inalcanzable</em></a>.</p>
  </div>

  <div class="karin-inequality-banner">
    <h3>Una desigualdad que no es médica: es del sistema</h3>
    <p>Y aquí está lo que más me duele. Si mi tumor hubiera sido <strong>HER2 positivo</strong> o <strong>triple negativo</strong>, el sistema público me ofrecería un tratamiento para prevenir la recaída. Pero como mi cáncer es <strong>HR+/HER2−</strong>, el subtipo más frecuente (alrededor del 61% de los casos), no tengo alternativa.</p>
    <p>Mi riesgo es igual de alto; lo único que cambia es la etiqueta. Hoy, en el Perú, la posibilidad de prevenir una recaída no depende de cuánto riesgo enfrentas, sino del subtipo que te tocó. Eso no es una decisión médica. <strong>Es una desigualdad.</strong></p>
  </div>

  <div class="karin-story-page__section">
    <h3>El reloj sigue corriendo: un año en trámites ante RENETSA</h3>
    <p>En octubre de 2025, mi hospital envió a la <strong>Red Nacional de Evaluación de Tecnologías Sanitarias (RENETSA)</strong> la solicitud formal, la llamada <strong>pregunta PICO</strong>, para que esta terapia sea evaluada en pacientes con mi perfil. Ha pasado un año. En ese tiempo, la solicitud ha ido y vuelto por observaciones administrativas, y la respuesta ha sido remitirse a una evaluación anterior, hecha para un perfil clínico distinto al mío. Mientras tanto, el reloj sigue corriendo.</p>
    <p>Hoy recibo el tratamiento gracias a una <strong>donación</strong>, y sé que es temporal. Sé también que muchas mujeres en hospitales públicos de Lima y de regiones no tienen ni eso: sus médicos han presentado solicitudes similares que siguen sin respuesta. No soy un caso aislado. En el Perú, cada día unas <strong>21 mujeres</strong> reciben un diagnóstico de cáncer de mama y <strong>cinco</strong> pierden la vida. Una parte de ellas comparte mi subtipo y mi riesgo, y también espera.</p>
  </div>

  <div class="karin-petition-box">
    <h3>El pedido concreto a las autoridades de salud</h3>
    <p>Por eso, en este mes en que todos nos vestimos de rosa, pido algo concreto:</p>
    <ul>
      <li><strong>A las autoridades del Instituto Nacional de Salud (INS) y de RENETSA:</strong> que fijen una fecha para evaluar esta terapia en pacientes con cáncer de mama temprano HR+/HER2− de alto riesgo, considerando nuestro perfil clínico real y no uno que ya fue evaluado.</li>
      <li><strong>Al Ministerio de Salud (MINSA):</strong> que impulse esa evaluación con la urgencia que exige una enfermedad en la que el tiempo lo es todo.</li>
    </ul>
  </div>

  <div class="karin-story-page__section">
    <p>Gracias a los médicos que no se rinden y continúan impulsando este proceso. Para mí, y para muchas mujeres que vivimos con este subtipo de cáncer de mama, esta lucha significa mucho más que acceder a un tratamiento: significa tener la oportunidad de reducir el riesgo de una recaída y mirar el futuro con esperanza. No pido que se apruebe nada sin sustento técnico; la evidencia existe e incluye años de seguimiento. <strong>Pido que se evalúe. No pido que me regalen nada.</strong></p>
  </div>

  <div class="karin-closing-callout">
    <p class="karin-closing-callout__quote">“Detrás de cada expediente en espera hay una mujer con planes, con familia y con ganas de vivir. Yo quiero llegar a los 30, a los 40 y a mucho más. Que mi futuro no lo decida un subtipo ni una bandeja de trámite.”</p>
    <span class="karin-closing-callout__author">— Karin Pardo</span>
  </div>
</div>
HTML;

$existing_page = get_page_by_path( $page_slug );
if ( ! $existing_page ) {
    $existing_page = get_page_by_title( $page_title );
}

if ( $existing_page ) {
    wp_update_post(
        array(
            'ID'           => $existing_page->ID,
            'post_title'   => $page_title,
            'post_content' => $content,
            'post_status'  => 'publish',
        )
    );
    echo "Página '{$page_title}' actualizada con éxito (ID: {$existing_page->ID})." . PHP_EOL;
} else {
    $page_id = wp_insert_post(
        array(
            'post_title'     => $page_title,
            'post_name'      => $page_slug,
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'post_content'   => $content,
            'comment_status' => 'closed',
            'ping_status'    => 'closed',
        )
    );
    if ( is_wp_error( $page_id ) ) {
        echo "Error al crear la página: " . $page_id->get_error_message() . PHP_EOL;
    } else {
        echo "Página '{$page_title}' creada con éxito (ID: {$page_id})." . PHP_EOL;
    }
}

// Configurar metadatos SEO en Rank Math si existe
if ( isset( $existing_page->ID ) || isset( $page_id ) ) {
    $target_id = $existing_page ? $existing_page->ID : $page_id;
    update_post_meta( $target_id, 'rank_math_title', 'La Historia de Karin Pardo | La Otra Lucha' );
    update_post_meta( $target_id, 'rank_math_description', 'Conoce el testimonio de Karin Pardo, paciente con cáncer de mama HR+/HER2− de alto riesgo en Perú: 57% de riesgo de recaída, barreras de acceso y solicitud de evaluación ante RENETSA y el MINSA.' );
    update_post_meta( $target_id, 'rank_math_robots', array( 'index', 'follow' ) );
    echo "Metadatos SEO de Rank Math configurados para la página (ID: {$target_id})." . PHP_EOL;
}
