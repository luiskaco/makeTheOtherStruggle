<?php
/**
 * Script de provisión de páginas legales: Términos y Condiciones & Políticas de Privacidad
 * Adaptado a la normativa peruana (Ley N° 29733, D.S. 003-2013-JUS y Ley N° 29571).
 */

require_once __DIR__ . '/../wp-load.php';

header( 'Content-Type: text/plain; charset=UTF-8' );

echo "=== PROVISIÓN DE PÁGINAS LEGALES (La Otra Lucha) ===" . PHP_EOL;

$legal_pages = array(
    'terminos-y-condiciones' => array(
        'title'   => 'Términos y Condiciones',
        'content' => <<<HTML
<h2>1. Información General y Objeto</h2>
<p>El presente documento establece los Términos y Condiciones de uso del sitio web oficial de <strong>La Otra Lucha</strong> (en adelante, "el Sitio"), una iniciativa de concientización ciudadana, investigación e incidencia pública promovida por la asociación civil <strong>Por un Perú Sin Cáncer</strong> (en adelante, "la Organización"), domiciliada en Lima, República del Perú, con correo electrónico de contacto oficial <a href="mailto:institucional@porunperusincancer.com">institucional@porunperusincancer.com</a>.</p>
<p>El Sitio tiene como propósito visibilizar las barreras de acceso, diagnóstico y tratamiento que enfrentan las pacientes con cáncer de mama en el sistema de salud peruano, difundir el caso testimonial de Karin Pardo, y poner a disposición ciudadana la <strong>Guía de Derechos</strong> y los hallazgos del <strong>Observatorio Oncológico</strong>.</p>

<h2>2. Descargo Fundamental de Responsabilidad Médica</h2>
<p><strong>IMPORTANTE:</strong> Todo el contenido publicado en este Sitio web —incluyendo infografías, cifras estadísticas, testimonios, artículos y la Guía de Derechos de la Paciente Oncológica— tiene una finalidad <strong>estrictamente orientativa, educativa e informativa</strong>.</p>
<p><strong>Bajo ninguna circunstancia la información contenida en esta plataforma constituye, sustituye ni debe interpretarse como diagnóstico médico, prescripción farmacológica, indicación quirúrgica o recomendación terapéutica personalizada.</strong></p>
<p>La información aquí expuesta no reemplaza la consulta, evaluación ni criterio clínico de un médico especialista u oncólogo colegiado. Si usted o un familiar experimenta cualquier señal de alerta, bulto, dolor, alteración física o duda relativa a su salud, le exhortamos a acudir de manera inmediata a un establecimiento de salud público o privado, posta médica, policlínico u hospital especializado.</p>

<h2>3. Aceptación y Condiciones de Uso</h2>
<p>El acceso y navegación por el Sitio son libres y gratuitos, atribuyendo la condición de usuario e implicando la aceptación plena y sin reservas de los presentes Términos y Condiciones. Si el usuario no estuviera conforme con las estipulaciones aquí descritas, deberá abstenerse de utilizar el Sitio.</p>
<p>El usuario se compromete a hacer un uso diligente, correcto y lícito de los contenidos y servicios, absteniéndose de:</p>
<ul>
  <li>Utilizar el Sitio con fines lesivos a la ley, la moral, el orden público o los derechos de terceros.</li>
  <li>Introducir virus, programas maliciosos (malware) o realizar actos dirigidos a sobrecargar, vulnerar o deteriorar los servidores y sistemas de seguridad de la plataforma.</li>
  <li>Alterar, descompilar, modificar o extraer indebidamente el código fuente, bases de datos o recursos gráficos del Sitio.</li>
</ul>

<h2>4. Propiedad Intelectual e Industrial</h2>
<p>Todos los elementos que integran este Sitio web —incluyendo de manera enunciativa mas no limitativa: diseños gráficos, maquetación, paleta cromática, tipografías, infografías de ruta (4 luchas y 8 dimensiones), textos editoriales, recursos vectoriales, fotografías, isotipos, el logotipo de <em>Por un Perú Sin Cáncer</em> y la identidad visual de <em>La Otra Lucha</em>— son propiedad exclusiva de la Organización o cuentan con las autorizaciones, cesiones y licencias correspondientes.</p>
<p>Se autoriza la reproducción parcial y la difusión ciudadana de los contenidos con fines no comerciales de sensibilización, información pública e investigación, siempre y cuando se reconozca de manera explícita y visible la autoría de la iniciativa y se cite la fuente original (<em>La Otra Lucha — Por un Perú Sin Cáncer</em>). Queda expresamente prohibida su comercialización, explotación lucrativa, reproducción total o alteración no autorizada.</p>

<h2>5. Enlaces a Sitios Web de Terceros</h2>
<p>Para facilitar información complementaria de utilidad a la paciente y a la ciudadanía, el Sitio incluye hipervínculos a plataformas externas, tales como el Observatorio Oncológico, instituciones oficiales del Estado Peruano (Ministerio de Salud - MINSA, EsSalud, Seguro Integral de Salud - SIS, Superintendencia Nacional de Salud - SuSalud) y redes sociales institucionales.</p>
<p>La Organización no asume responsabilidad alguna por el contenido, políticas de privacidad, funcionamiento técnico o eventuales daños derivados del acceso o uso de dichos portales externos, los cuales se rigen por sus propios términos legales.</p>

<h2>6. Exclusión de Garantías y Limitación de Responsabilidad</h2>
<p>La Organización despliega sus máximos esfuerzos para garantizar la exactitud, actualización y disponibilidad continua de la información provista en el Sitio. No obstante, no garantiza la ausencia absoluta de interrupciones temporales ocasionadas por mantenimiento técnico, fallas en proveedores de alojamiento o incidencias en las redes de telecomunicaciones ajenas a su control.</p>

<h2>7. Legislación Aplicable y Jurisdicción</h2>
<p>Los presentes Términos y Condiciones se rigen e interpretan conforme a las leyes de la <strong>República del Perú</strong>, en particular por el Código de Protección y Defensa del Consumidor (Ley N° 29571) y el Código Civil Peruano en lo que resulte aplicable.</p>
<p>Para la resolución de cualquier discrepancia, litigio o controversia que pudiera derivarse del uso del Sitio, las partes renuncian expresamente a cualquier otro fuero que pudiera corresponderles y se someten voluntariamente a la jurisdicción y competencia territorial de los Jueces y Tribunales del Distrito Judicial de <strong>Lima, Perú</strong>.</p>

<h2>8. Contacto</h2>
<p>Para formular consultas, sugerencias o comunicaciones relativas a estos Términos y Condiciones, puede dirigirse a: <a href="mailto:institucional@porunperusincancer.com">institucional@porunperusincancer.com</a>.</p>
<p><em>Última actualización y entrada en vigencia: 19 de octubre de 2026.</em></p>
HTML
    ),
    'politicas-de-privacidad' => array(
        'title'   => 'Políticas de Privacidad',
        'content' => <<<HTML
<h2>1. Compromiso y Responsable del Tratamiento de Datos</h2>
<p>La asociación civil <strong>Por un Perú Sin Cáncer</strong> (en adelante, "la Organización" o "el Responsable"), domiciliada en Lima, República del Perú, con correo electrónico oficial de contacto <a href="mailto:institucional@porunperusincancer.com">institucional@porunperusincancer.com</a>, asume el más firme compromiso con la protección, confidencialidad y tratamiento ético de los datos personales de los usuarios que navegan por la plataforma web de la campaña <strong>La Otra Lucha</strong>.</p>

<h2>2. Marco Legal Aplicable</h2>
<p>La presente Política de Privacidad ha sido elaborada en estricta conformidad con lo dispuesto en la <strong>Ley N° 29733 (Ley de Protección de Datos Personales del Perú)</strong>, su Reglamento aprobado mediante el <strong>Decreto Supremo N° 003-2013-JUS</strong>, y la Directiva de Seguridad de la Información emitida por la Autoridad Nacional de Protección de Datos Personales.</p>

<h2>3. Principios Rectores del Tratamiento</h2>
<p>En el tratamiento de la información personal de nuestros usuarios, la Organización aplica rigurosamente los principios establecidos en la ley peruana:</p>
<ul>
  <li><strong>Principio de Legalidad:</strong> El tratamiento se sustenta en bases legales legítimas y de conformidad con el ordenamiento jurídico.</li>
  <li><strong>Principio de Consentimiento:</strong> No se recopilan datos personales sin la manifestación libre, previa, expresa, informada e inequívoca del titular.</li>
  <li><strong>Principio de Finalidad:</strong> Los datos se recaban con fines explícitos, legítimos e informados, sin destinarse a propósitos incompatibles.</li>
  <li><strong>Principio de Proporcionalidad:</strong> Se recopila exclusivamente la información necesaria, relevante y no excesiva respecto a la finalidad comunicada.</li>
  <li><strong>Principio de Seguridad:</strong> Se adoptan medidas técnicas, legales y organizativas para evitar la adulteración, pérdida, consulta o tratamiento no autorizado.</li>
</ul>

<h2>4. Datos Personales que Recopilamos</h2>
<p>El acceso y lectura de los contenidos informativos de La Otra Lucha <strong>no requiere registro obligatorio previo</strong>. La Organización únicamente procesa:</p>
<ul>
  <li><strong>Datos técnicos y de navegación:</strong> Registros automáticos del servidor web que incluyen dirección IP (anonimizada), identificadores de dispositivo, navegador, sistema operativo, hora de consulta y secciones visualizadas, con fines estrictamente técnicos, analíticos y de seguridad informática.</li>
  <li><strong>Datos suministrados voluntariamente:</strong> Aquellos que el usuario decida enviar voluntariamente a través de correos electrónicos de contacto o formularios de adhesión ciudadana (nombres, apellidos, correo electrónico, número telefónico y mensaje de consulta).</li>
</ul>
<p><strong>Aclaración sobre Datos Sensibles de Salud:</strong> La plataforma no solicita, no almacena ni procesa historias clínicas, recetas ni datos médicos confidenciales del público en general. Los testimonios e historias de vida presentados en el Sitio (como el caso de Karin Pardo) han sido incorporados con la debida autorización y consentimiento informado de las pacientes o sus representantes.</p>

<h2>5. Finalidades del Tratamiento</h2>
<p>La información recopilada tiene como finalidades exclusivas:</p>
<ol>
  <li>Absolver consultas, inquietudes ciudadanas y brindar orientación general sobre la iniciativa y la Guía de Derechos.</li>
  <li>Coordinar acciones de sensibilización social, notas de prensa y difusión cívica de la campaña.</li>
  <li>Garantizar el correcto funcionamiento técnico, rendimiento y seguridad de la infraestructura digital.</li>
  <li>Elaborar mediciones estadísticas anónimas para evaluar el impacto ciudadano de la campaña.</li>
</ol>
<p>Bajo ningún concepto los datos personales recopilados serán utilizados con fines de prospección comercial lucrativa, publicidad de terceros ni venta de bases de datos.</p>

<h2>6. Transferencia y Destinatarios de los Datos</h2>
<p>Los datos personales no serán transferidos ni divulgados a terceros, salvo en los siguientes supuestos estrictos:</p>
<ul>
  <li><strong>Proveedores tecnológicos (Encargados del tratamiento):</strong> Entidades que prestan servicios de alojamiento en la nube (hosting), seguridad informática y analítica técnica, bajo estrictos acuerdos contractuales de confidencialidad y estándares internacionales de protección de datos.</li>
  <li><strong>Requerimiento legal vinculante:</strong> Cuando sea requerido por mandato de autoridad judicial, administrativa o fiscal peruana competente en ejercicio de sus funciones.</li>
</ul>

<h2>7. Plazo de Conservación de la Información</h2>
<p>Los datos personales recopilados serán conservados únicamente durante el tiempo estrictamente necesario para cumplir las finalidades informativas de la campaña para las que fueron recabados, o hasta que el usuario ejerza su derecho de cancelación o revocación del consentimiento, tras lo cual serán eliminados o anonimizados de forma segura.</p>

<h2>8. Ejercicio de los Derechos ARCO</h2>
<p>De conformidad con la Ley N° 29733, todo titular de datos personales tiene derecho a acceder a su información registrada, rectificarla si es inexacta o errónea, cancelarla cuando considere que no es necesaria, y oponerse a su tratamiento (Derechos ARCO).</p>
<p>Para ejercer cualquiera de estos derechos de forma gratuita, el titular deberá remitir una solicitud por correo electrónico a <a href="mailto:institucional@porunperusincancer.com">institucional@porunperusincancer.com</a> con el asunto <strong>"Ejercicio de Derechos ARCO - Datos Personales"</strong>, detallando:</p>
<ul>
  <li>Nombres, apellidos y copia legible de su Documento Nacional de Identidad (DNI), Carné de Extranjería o documento oficial de identidad del titular o representante legal.</li>
  <li>Petición concreta y fundamento de la solicitud (acceso, rectificación, cancelación u oposición).</li>
  <li>Correo electrónico u otro medio para notificar la respuesta.</li>
</ul>
<p><strong>Plazos legales de atención:</strong> De conformidad con el artículo 55 del D.S. N° 003-2013-JUS, las solicitudes de acceso serán atendidas en un plazo máximo de veinte (20) días hábiles, y las solicitudes de rectificación, cancelación u oposición en un plazo máximo de diez (10) días hábiles contados desde su recepción.</p>

<h2>9. Autoridad de Control</h2>
<p>Si el usuario considera que sus derechos de protección de datos no han sido debidamente atendidos por la Organización, tiene expedito su derecho a presentar una reclamación ante la <strong>Dirección General de Transparencia, Acceso a la Información Pública y Protección de Datos Personales</strong> del Ministerio de Justicia y Derechos Humanos (MINJUS), en su calidad de Autoridad Nacional de Protección de Datos Personales del Perú.</p>

<h2>10. Medidas de Seguridad</h2>
<p>La Organización implementa medidas de índole técnica, organizativa y legal orientadas a preservar la confidencialidad, integridad y disponibilidad de la información, previniendo accesos no autorizados mediante conexiones seguras HTTPS (TLS/SSL), cabeceras de seguridad HTTP y protección de archivos en el servidor.</p>

<h2>11. Modificaciones a la Política</h2>
<p>La Organización se reserva el derecho de actualizar periódicamente esta Política de Privacidad para adecuarla a modificaciones legislativas o mejoras técnicas. Cualquier cambio sustancial será debidamente publicado y fechado en esta misma página.</p>
<p><em>Última actualización y entrada en vigencia: 19 de octubre de 2026.</em></p>
HTML
    ),
);

foreach ( $legal_pages as $slug => $data ) {
    $existing = get_page_by_path( $slug );

    if ( ! $existing ) {
        $existing = get_page_by_title( $data['title'] );
    }

    if ( $existing ) {
        // Actualizar contenido para garantizar la versión legal completa oficial
        $update_res = wp_update_post(
            array(
                'ID'           => $existing->ID,
                'post_title'   => $data['title'],
                'post_name'    => $slug,
                'post_content' => $data['content'],
                'post_status'  => 'publish',
                'post_type'    => 'page',
            ),
            true
        );

        if ( is_wp_error( $update_res ) ) {
            echo "[ERROR actualizando $slug]: " . $update_res->get_error_message() . PHP_EOL;
        } else {
            echo "[OK actualizado]: {$data['title']} (ID: {$existing->ID}, Slug: $slug)" . PHP_EOL;
            if ( 'politicas-de-privacidad' === $slug ) {
                update_option( 'wp_page_for_privacy_policy', $existing->ID );
            }
        }
    } else {
        // Crear página
        $new_id = wp_insert_post(
            array(
                'post_title'     => $data['title'],
                'post_name'      => $slug,
                'post_content'   => $data['content'],
                'post_status'    => 'publish',
                'post_type'      => 'page',
                'comment_status' => 'closed',
                'ping_status'    => 'closed',
            ),
            true
        );

        if ( is_wp_error( $new_id ) ) {
            echo "[ERROR creando $slug]: " . $new_id->get_error_message() . PHP_EOL;
        } else {
            echo "[OK creada]: {$data['title']} (ID: $new_id, Slug: $slug)" . PHP_EOL;
            if ( 'politicas-de-privacidad' === $slug ) {
                update_option( 'wp_page_for_privacy_policy', $new_id );
            }
        }
    }
}

flush_rewrite_rules();

echo PHP_EOL . "Provisión de páginas legales finalizada exitosamente." . PHP_EOL;
