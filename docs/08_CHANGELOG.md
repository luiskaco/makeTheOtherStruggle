# 08 — Historial de Versiones (`CHANGELOG`)

Todos los cambios notables en este proyecto se documentan en este archivo siguiendo [Keep a Changelog](https://keepachangelog.com/es-ES/1.0.0/) y [Semantic Versioning](https://semver.org/lang/es/).

## [1.8.6] — 2026-10-21

### Added & Theme Portability
- **Autonomía y Portabilidad Total del Tema (`page-historia-de-karin.php`, `template-parts/content-karin-story.php`):**
  - Creación de template part estático autónomo `template-parts/content-karin-story.php` con el contenido íntegro y actualizado de la biografía de Karin Pardo.
  - Implementación de condicional en `page-historia-de-karin.php` (`if ( ! empty( $story_content ) ) the_content(); else get_template_part(...)`) para que al subir únicamente la carpeta del tema a cualquier servidor o hosting limpio sin migración de base de datos, el 100% de la historia se muestre de inmediato sin depender de la base de datos local.

### UI & Dual CTAs
- **Par de Botones CTA en Resultados del Estudio (`section-patient-study.php`, `css/sections.css`):**
  - Sustitución del botón único por dos botones de llamado a la acción independientes y responsivos (`.patient-study__cta-wrap`).
  - **Botón 1 (Estudio Completo):** `.patient-study__btn--primary` con fondo morado sólido (`--color-secondary`), texto `CONSULTA EL ESTUDIO COMPLETO AQUÍ` y flecha derecha `→`, enlazado a la ruta del paciente en el Observatorio Oncológico.
  - **Botón 2 (Resumen Descargable):** `.patient-study__btn--outline` implementado como elemento nativo `<button type="button">` sin hipervinculación a ninguna parte, con borde morado de 2px, fondo blanco, texto `DESCARGA EL RESUMEN EN PDF`, ícono de hoja PDF a la izquierda y flecha de descarga inferior `⤓`.
  - Microinteracciones dinámicas en hover (`translateY(-2px)`, desplazamiento de flechas e iluminación cromática).

## [1.8.5] — 2026-10-21

### Added & WordPress Theme Standards
- **Plantilla Estándar Obligatoria (`index.php`):**
  - Implementación del archivo `index.php` en el theme `wp-content/themes/la-otra-lucha/` para cumplir con las directrices de temas de WordPress y resolver el estado de plantilla faltante.
  - Ajuste en `.gitignore` para delimitar la exclusión a `/index.php` en la raíz del CMS.
  - Corrección del error de WordPress reportando `Errors: NONE`.

### Changed & Video Integration
- **Integración y Normalización Universal del Video de Campaña (`section-hero.php`, `footer.php`, `functions.php`, `modal.js`):**
  - Actualización del video ID en el botón de reproducción del Hero a `gmZVwGiNzJM` usando dominio seguro `youtube-nocookie.com`.
  - Creación del helper `lol_get_youtube_embed_url()` en `functions.php` para normalizar automáticamente URLs de YouTube (`watch?v=`, `youtu.be/`, `shorts/`, `embed/`) tanto en PHP como en el modal JavaScript (`modal.js`), previniendo bloqueos de `X-Frame-Options`.
  - Integración fluida con el modal interactivo accesible (`#video-modal`).

### Content & Testimony
- **Actualización de la Historia de Karin Pardo (`scripts/seed-karin-story.php`, `css/sections.css`, `docs/2026_LOL_Hoja_de_Vida_Karin_Pardo.md`):**
  - Sincronización del texto oficial desde la hoja de vida con enlaces contextuales a fuentes periodísticas de Infobae (`target="_blank"`, `rel="noopener noreferrer"`).
  - Estilización BEM de enlaces editoriales con subrayado y microinteracciones hover (`.karin-story-page a` y `.karin-stat-highlight__link`).
  - Eliminación de encabezados redundantes dentro del cuerpo de la página `/historia-de-karin/` y respaldo del documento fuente en `docs/`.

## [1.8.4] — 2026-10-20

### Added & Analytics
- **Integración Oficial de Google Tag Manager (`header.php`):**
  - Inserción del script de contenedor Google Tag Manager con ID `GTM-N7PP8WWT` en la cabecera `<head>`.
  - Inserción del snippet alternativo `<noscript>` con iframe de seguimiento inmediatamente tras la apertura del tag `<body>`.
  - Coexistencia fluida con el flujo previo de GA4 (`G-YMHXSQNHRP`).
  - Verificado en tiempo de ejecución en Chrome DevTools (`hasGtmScript: true`, `hasGtmObject: true`, dataLayer inicializado y noscript presente).

### Changed & Media
- **Nuevo Video Oficial de la Campaña (`section-hero.php`, `footer.php`, Base de Datos):**
  - Actualización del video de YouTube a `https://youtu.be/gmZVwGiNzJM` (`gmZVwGiNzJM`) con modo de privacidad mejorada (`youtube-nocookie.com/embed/gmZVwGiNzJM?autoplay=1&rel=0`).
  - Sincronización en el atributo `data-video-url` del botón de Play en el Hero y en el `data-src` del iframe en el modal accesible (`#video-modal`).
  - Actualización de metadato `hero_video_url` en la base de datos de WordPress para la página frontal (ID 7).
  - Verificado de extremo a extremo en navegador real (apertura, foco, inserción dinámica de `src` con autoplay y cierre limpio).

### Updated & Content
- **Historia de Karin Pardo (`/historia-de-karin/`):**
  - Actualización integral del testimonio en `scripts/seed-karin-story.php` e inyección en base de datos (página ID 17).
  - Incorporación de referencias y enlaces oficiales a reportajes de Infobae ("algo benigno", "mastectomía radical", "metástasis" y "simplemente inalcanzable").
  - Estilización BEM de enlaces editoriales y hover en `.karin-story-page a` y `.karin-stat-highlight__link` (`css/sections.css`).
  - Respaldo de la hoja de vida oficial en `docs/2026_LOL_Hoja_de_Vida_Karin_Pardo.md`.
  - Verificado visual y funcionalmente en navegador.

## [1.8.3] — 2026-10-20

### Added & Analytics
- **Integración Oficial de Google Tag / GA4 (`header.php`):**
  - Inserción del script asíncrono `gtag.js` con identificador de flujo de Google Analytics 4 `G-YMHXSQNHRP`.
  - Inicialización estándar de `window.dataLayer` y configuración inicial `gtag('config', 'G-YMHXSQNHRP')`.
  - Verificado en tiempo de ejecución en Chrome DevTools (`hasGtag: true`, eventos en `dataLayer`).

### Changed & Links
- **Enlaces Directos al Observatorio Oncológico (`section-quote-banner.php`, `section-action-trio.php`):**
  - Botón 'CONOCE EL OBSERVATORIO ONCOLÓGICO' actualizado para apuntar a `https://observatoriodecancer.com/` con `target="_blank"` y `rel="noopener noreferrer"`.
  - Botón 'VISITA EL OBSERVATORIO ONCOLÓGICO' en la tarjeta de Evidencia actualizado a `https://observatoriodecancer.com/` con `target="_blank"` y `rel="noopener noreferrer"`.
  - Conexión con `lol_get_field()` para permitir sobreescritura dinámica desde ACF.

## [1.8.2] — 2026-10-20

### Enhanced & Animations
- **Auditoría y Optimización Integral de Animaciones (`animations.js`, `css/sections.css`):**
  - Inclusión del logo oficial del Observatorio (`.patient-route__logo`) en la secuencia escalonada de la sección Ruta de la Paciente.
  - Activación de animaciones de escala y retraso progresivo para las tarjetas de estadísticas del Observatorio (`.patient-study__stat-item`).
  - Animación secuencial en la cita del Observatorio (`.quote-banner`): comillas, texto central y botón rosa en cascada armónica.
  - Soporte de conteo dinámico para el indicador 57% en la plantilla dedicada de Karin Pardo (`.karin-stat-highlight__num`) y revelación progresiva de sus bloques.
  - Microinteracciones de elevación al hover (`translateY`) en tarjetas de acción y estadísticas del estudio.
  - Calibración de umbrales del `IntersectionObserver` (`threshold: 0.08` y margen inferior adaptativo) para un disparo fluido e inmediato en scroll móvil y desktop.

## [1.8.1] — 2026-10-20

### Changed & Colors
- **Cita del Observatorio sin Fondo y con Elementos en Rosa Oficial (`section-quote-banner.php`, `css/sections.css`, SVG):**
  - Eliminación de cualquier fondo de bloque o textura en la sección (`background: transparent`), integrándola de forma limpia al lienzo editorial de la página.
  - Tipografía de cita ("ESCUCHAR A LAS PACIENTES ES EL PRIMER PASO PARA COMPRENDER QUÉ DEBE CAMBIAR") adaptada al color rosa oficial de campaña (`--color-primary` / `#e46f94`).
  - Creación de versiones vectoriales de comillas en rosa institucional (`quote-open-pink.svg` y `quote-close-pink.svg`).
  - Botón CTA configurado con fondo rosa de campaña y texto en blanco (`.btn--pink`).

## [1.8.0] — 2026-10-20

### Security & Hardening
- **Desactivación Total del Sistema de Comentarios (`functions.php`, `.htaccess`, Base de Datos):**
  - Desactivación de soporte de comentarios y trackbacks en todos los tipos de contenido (`post`, `page`).
  - Filtros globales `comments_open` y `pings_open` forzados a `false` en todo el frontend.
  - Bloqueo en servidor (`.htaccess`) de solicitudes directas y POST a `wp-comments-post.php` retornando `403 Forbidden`.
  - Eliminación de accesos en el panel admin: ítem de menú `edit-comments.php` retirado, redirección de acceso directo a `/wp-admin/`, y nodo de comentarios suprimido de la barra superior.
  - Supresión y bloqueo de endpoints REST API `/wp/v2/comments` (responde `404 Not Found`) y feeds RSS/Atom de comentarios (responde `403 Forbidden`).
  - Silenciamiento preventivo de `comments_template()` mediante fallback a `template-parts/empty.php`.
  - Purga completa de comentarios residuales en base de datos (`wp_comments` y `wp_commentmeta`), actualización de todas las publicaciones a `comment_status='closed'` y `ping_status='closed'`, y configuración de opciones de discusión a cerrado por defecto.
- **Suite de Hardening de WordPress y Reglas CMS (`wp-config.php`, `functions.php`):**
  - Activación de `DISALLOW_FILE_EDIT = true` en `wp-config.php` para bloquear la edición de código de plugins y temas desde el panel de control.
  - Regeneración de claves y sales criptográficas con entropía independiente de 256 bits para `AUTH_KEY`, `SECURE_AUTH_KEY`, `LOGGED_IN_KEY`, `NONCE_KEY`, etc.
  - Bloqueo de Application Passwords (`wp_is_application_passwords_available = false`) para prevenir la generación de tokens de API no autorizados.
  - Supresión de cabeceras informativas `X-Powered-By` y enlaces oEmbed de descubrimiento (`wp_oembed_add_discovery_links`, `wp_oembed_add_host_js`).
  - Bloqueo y redirección 301 de consultas de enumeración de autor (`is_author()`).

## [1.7.8] — 2026-10-20

### Changed & Colors
- **Estilización en Rosa Oficial y Reubicación de la Sección de Cita (`section-quote-banner.php`, `front-page.php` y `css/sections.css`):**
  - Posicionamiento inmediato debajo de los Resultados del Estudio (`section-patient-study.php`) y antes de la Guía de Derechos.
  - Aplicación del fondo rosa oficial de campaña (`--color-primary` / `#e46f94`) con patrón de lazos vectoriales `bg-quote-banner.svg`.
  - Tipografía ("ESCUCHAR A LAS PACIENTES ES EL PRIMER PASO PARA COMPRENDER QUÉ DEBE CAMBIAR") y comillas vectoriales ajustadas a blanco puro (`#ffffff`) para máximo contraste.
  - Botón CTA configurado en blanco sólido con texto en morado institucional (`.btn.btn--white`), logrando un contraste nítido y accesible.

## [1.7.6] — 2026-10-20

### Changed & Layout
- **Reubicación de Banner Cita Observatorio (`front-page.php`):**
  - Desplazamiento de `section-quote-banner.php` (banner morado "ESCUCHAR A LAS PACIENTES ES EL PRIMER PASO PARA COMPRENDER QUÉ DEBE CAMBIAR") hacia el final de la portada, ubicándolo inmediatamente encima de la franja rosada del footer ("EL CÁNCER YA ES UNA LUCHA. LA DESIGUALDAD NO DEBERÍA SER OTRA.").

## [1.7.5] — 2026-10-20

### Changed & Colors
- **Adaptación Cromática Integral de 'Resultados del Estudio' (`section-patient-study.php` y `css/sections.css`):**
  - Titular "RESULTADOS DEL ESTUDIO" alineado al color gris carbón oficial (`--color-heading` / `#646160`) y tipografía de display `Veneer TwoRegular`.
  - Cifras estadísticas (59,5% y 60,6%) e íconos adaptados al rosa de campaña oficial (`--color-primary` / `#e46f94`), armonizando con los nodos de la ruta.
  - Textos descriptivos en gris de lectura oficial (`--color-text`).
  - Botón CTA "ENCUENTRA EL INFORME COMPLETO AQUÍ" transformado a morado institucional (`--color-secondary` / `#73589f`) con hover oficial, alineado con los botones de acción del resto del sitio.

## [1.7.4] — 2026-10-20

### Changed & Layout
- **Centrado de Titular y Bloque Editorial en 'Las Cuatro Luchas' (`css/sections.css`):**
  - Sustitución de `margin-left: auto` por `margin-inline: auto` en `.four-fights__editorial`, centrando perfectamente el titular "LA OTRA LUCHA COMIENZA CUANDO EL CAMINO SE LLENA DE BARRERAS" y su recuadro informativo.
  - Recalibración del anclaje geométrico de la ruta ilustrada (`.road-four` a `calc(50% + 16.7rem)`) para conectar suavemente con la caja centrada.

## [1.7.3] — 2026-10-20

### Reverted & Changed
- **Reversión de Fondo Gris en 'Las Cuatro Luchas' (`css/sections.css`):**
  - Eliminación del fondo gris carbón y tipografía blanca en `.four-fights__callout`.
  - Restauración de la apariencia blanca institucional original (`.outlined-callout`), con borde gris fino y texto oscuro.

## [1.7.2] — 2026-10-20

### Added & Changed
- **Titular de Sección Estudio del Observatorio (`section-patient-study.php` y `css/sections.css`):**
  - Incorporación del titular "RESULTADOS DEL ESTUDIO" directamente sobre la tarjeta con las estadísticas 59,5% y 60,6%.
  - Estilos tipográficos en color guinda oficial (`#7d1538`), mayúsculas y espaciado armónico que contextualizan el hallazgo del estudio.
  - Sincronización del valor por defecto en `docs/04_DATA_MODEL.md`.

## [1.7.1] — 2026-10-20

### Changed
- **Caja de Texto en Las Cuatro Luchas (`css/sections.css`):**
  - Aplicación de fondo gris carbón oficial (`--color-heading` / `#646160`) a `.four-fights__callout`, igualando el color del titular principal.
  - Tipografía interior ajustada a blanco de alto contraste (`#ffffff`), con palabras clave en negrita definida y sombra sutil de profundidad.

## [1.7.0] — 2026-10-20

### Added
- **Logo del Observatorio de Cáncer en la Ruta de la Paciente (`section-patient-route.php`):**
  - Incorporación del imagotipo oficial `logo-observatorio-oncologico.png` directamente encima del titular "LA RUTA DE LA PACIENTE CON CÁNCER DE MAMA".
  - Calibración de escala contenida y elegante (`.patient-route__logo`, max-width ~160-185px) para asegurar una presencia equilibrada, sin saturar el diseño ni restarle protagonismo al titular.
  - Soporte de sobrescritura vía ACF con fallback dinámico (`lol_get_field('route_logo')`).

### Changed
- **Reordenamiento de Secciones en Portada (`front-page.php`):**
  - Reposicionamiento de la sección de Estudio del Observatorio (`section-patient-study.php`) para anteceder al banner morado de citas (`section-quote-banner.php`).
- **Botón CTA de la Sección Estudio del Observatorio (`section-patient-study.php`):**
  - Actualización del texto del botón a "ENCUENTRA EL INFORME COMPLETO AQUÍ", en mayúsculas, alineado con el nuevo enlace hacia el informe oficial.
  - Sincronización del modelo de datos en `docs/04_DATA_MODEL.md`.

## [1.6.3] — 2026-10-20

### Fixed & Changed
- **Contraste y Colores Internos en la Página de Karin (`css/sections.css`):**
  - Corrección de color para textos `<strong>` en la tarjeta morada de estadística del 57% (`.karin-stat-highlight`): sustituido el tono oscuro heredado por blanco luminoso con sombra sutil para contraste nítido y accesible.
  - Calibración de color del número destacado a rosa pastel luminoso (`#ffd4e0`), eliminando el tono apagado previo.
  - Refinamiento de jerarquía de color en tarjetas de hitos, bloque de petitorio formal y citas.

## [1.6.2] — 2026-10-20

### Changed
- **Página de Karin Pardo (`css/sections.css`):**
  - Desencapsulación del bloque inicial de testimonio: eliminación de la caja contenedora (`.karin-story-page__hero-box`), fondo degradado y borde izquierdo para lograr una lectura limpia y editorial integrada directamente en la página.

## [1.6.1] — 2026-10-20

### Changed
- **Cabecera de la Página de Karin Pardo (`page-historia-de-karin.php`):**
  - Calibración de espaciado vertical: compactación de márgenes en título, subtítulo y primer bloque de testimonio (`.karin-story-page__hero-box`).
  - Eliminación de la línea divisoria morada estándar (`.page-article__divider`) para evitar separación artificial excesiva.
  - Ajuste de jerarquía y escala en la palabra script "tampoco": uso de `.karin-story__quote-script` y trazo de brocha vector (`#brush-stroke`), escalado a 2.25em para óptima legibilidad e impacto visual.

## [1.6.0] — 2026-10-20

### Added
- **Página Especial 'La Historia de Karin Pardo' (`/historia-de-karin/`):**
  - Plantilla personalizada `page-historia-de-karin.php` con encuadre fotográfico de Karin Pardo, subtítulo en script (`#brush-stroke`), miga de pan bidireccional y botones inferiores de retorno.
  - Testimonio íntegro formateado con tarjetas de hitos temporales (Agosto 2023 - Junio 2024, Proceso de tratamiento), bloque de métrica destacada (57% de riesgo de recaída), llamado de atención sobre desigualdad en subtipo HR+/HER2− y petitorio formal ante RENETSA, INS y el MINSA.
  - Script de provisión `scripts/seed-karin-story.php` e integración en el hook de setup en `functions.php` con metadatos SEO en Rank Math.
  - Conexión directa desde el botón CTA del Hero y el botón de la sección Karin en la portada.
  - Compatibilidad de reescritura en `.htaccess` y `wp-config.php` para funcionamiento simultáneo en Virtual Host (`maketheotherstruggle.test`) y subdirectorio (`localhost/makeTheOtherStruggle`).

## [1.5.0] — 2026-10-20

### Added
- **Botón de Play interactivo en el Hero (`section-hero.php`):**
  - Botón circular posicionado exactamente en el centro del grupo de las 5 mujeres sobre la figura central en el Hero.
  - Efecto de pulso concéntrico animado (`hero-play-pulse`), anillo con degradado de campaña, microinteracción al hover (escala + sombra profunda) y soporte para `prefers-reduced-motion`.
  - Atributos de accesibilidad completos: `aria-haspopup="dialog"`, `aria-controls="video-modal"`, `aria-label`.
- **Modal de Video Accesible WAI-ARIA (`footer.php` & `js/modules/modal.js`):**
  - Módulo nativo ES Modules para gestión de apertura, cierre, atrape de foco (`focus trap`), soporte para tecla `Escape` y bloqueo de scroll de fondo (`body overflow: hidden`).
  - Overlay con desenfoque de fondo (`backdrop-filter: blur(8px)`), ventana flotante con ratio 16:9 y botón de cierre táctil accesible.
  - Detención automática de reproducción y audio de video al cerrar el modal mediante limpieza del frame.
  - Integración con helper `lol_get_field('hero_video_url')` para permitir configuración desde ACF o valor por defecto.
  - Utilidades estándar `.sr-only` y `.screen-reader-text` en `css/components.css`.

## [1.4.0] — 2026-10-19

### Changed
- **Actualización de Indicadores de Cáncer de Mama (GLOBOCAN 2024):**
  - Renovación de las 4 tarjetas de estadísticas en `section-reality.php`:
    - `7,797` — Casos nuevos en mujeres peruanas (`(GLOBOCAN 2024)`).
    - `21` — Mujeres son diagnosticadas cada día (`(GLOBOCAN 2024)`).
    - `18%` — De los casos detectados al año corresponde a mujeres menores de 40 años (`(GLOBOCAN 2024)`).
    - `694,000` — Muertes en el mundo (`(GLOBOCAN 2024)`).
  - Estilos tipográficos `.stat-card__source` en `css/sections.css` y animación de contadores numéricos calibrada en `animations.js`.
- **Depuración y simplificación editorial de secciones:**
  - Ocultada la franja morada de 4 pilares (`.pillars-bar`) en `section-four-fights.php` (*Cada etapa importa / demora...*).
  - Ocultados los 4 hitos completos (números 1, 2, 3 y 4 con textos en `section-four-fights.php` y los 4 círculos grises en `road-4-luchas.svg`) con tag de restauración previo `checkpoint-antes-eliminar-hito1`.
  - Cache-busting dinámico (`?v=timestamp`) en `section-four-fights.php` para recarga limpia de recursos SVG.
  - Removido el titular y subtítulo duplicados en `section-patient-study.php` para presentar de forma directa el bloque de estadísticas del Observatorio Oncológico.
  - Actualizado el texto introductorio en el recuadro (`.outlined-callout`) de `section-patient-route.php`.

## [1.3.0] — 2026-10-19

### Added
- **Sección 'La Ruta de la Paciente con Cáncer de Mama - Estudio del Observatorio' (`section-patient-study.php`):**
  - Integración fluida y editorial con la interfaz sin contenedor encajonado ni bordes rígidos, eliminando la burbuja superior para armonizar la lectura con el resto de la página.
  - Fondo degradado suave rosado con formas de cinta fluidas difuminadas en los extremos.
  - Grilla de 2 estadísticas clave con iconografía SVG personalizada, separador vertical y conteo numérico animado fluido (`59,5%` y `60,6%`) con soporte para decimales en `animations.js`.
  - Cita de reflexión `"La ruta hacia el tratamiento también importa."` y botón CTA guinda interactivo con enlace externo seguro a `https://observatoriodecancer.com/resultado-la-ruta-del-paciente/`.
  - Integración de animaciones de entrada progresiva (`reveal-on-scroll`) para todos los elementos del bloque.
  - Soporte para campos de Advanced Custom Fields (ACF) mediante el helper resiliente `lol_get_field()`.

### Changed
- **Páginas Legales y Divulgación de Seguridad:** Actualización del correo institucional de contacto general y ejercicio de Derechos ARCO (acceso, rectificación, cancelación y oposición de datos personales según Ley N° 29733) a `institucional@porunperusincancer.com` en 'Términos y Condiciones', 'Políticas de Privacidad', el script de provisión `scripts/seed-legal-pages.php` y el estándar RFC 9116 `.well-known/security.txt`.

## [1.2.3] — 2026-10-19

### Changed
- **Desacople Sticky de Cabecera y Navegación:** La sección de logos institucionales (`.site-header`) pasa a flujo estático natural para desplazarse y ocultarse con el scroll, manteniendo únicamente la barra de navegación rosa (`.site-nav`) fijada en la parte superior (`position: sticky; top: 0; z-index: 100`) en pantallas desktop, reduciendo el área ocupada y mejorando la superficie de lectura del contenido.
- **Soporte y Compensación de Scroll:** Actualización de `body` a `overflow-x: clip` en `reset.css` para compatibilidad de fijación sticky y recalibración de offsets dinámicos de anclas y scroll-spy en `navigation.js`.

## [1.2.2] — 2026-10-19

### Changed
- **Alineación Responsiva de Logos en Cabecera:** En móvil y tablet (< 1100px / 68.75rem), los logos institucionales se mantienen alineados a la izquierda (`justify-content: space-between`) junto al botón de menú hamburguesa a la derecha, mientras que en pantallas desktop (>= 1100px) se mantienen centrados simétricamente en el medio de la pantalla.

## [1.2.1] — 2026-10-19

### Changed
- **Centrado de Logos Institucionales en Cabecera:** Alineación simétrica al centro de la pantalla para el bloque de marcas (`.brand-logos`) dentro de `.site-header__top` mediante flexbox y posicionamiento flotante relativo para el menú hamburguesa móvil, garantizando distribución visual armónica y preservando accesibilidad táctil.

## [1.2.0] — 2026-10-19

### Changed
- **Titulares y Copy Testimonial de Karin Pardo:** Actualización del copy de cabecera a `"EL CÁNCER NO PUEDE ESPERAR. LAS RESPUESTAS TAMPOCO"` (con estilo manuscrito y trazo de pincelada en la palabra `tampoco`) e integración del testimonio extendido sobre barreras burocráticas del sistema de salud y la Ruta de la Paciente con Cáncer de Mama.
- **Calibración de Legibilidad y Máscara de Contraste:** Incorporación de máscara de desvanecimiento CSS (`mask-image`) en la fotografía de Karin para difuminar suavemente el lazo rosado antes de la columna de texto, garantizando 100% de contraste sobre el fondo rosa pálido, elevación de altura mínima de tarjeta a `33rem` y ajuste de espaciado vertical (`9.75rem`) e interlineado (`1.62` a `54ch`).
- **Suite Integral de Seguridad y Hardening WordPress:**
  - Generación de 8 claves criptográficas únicas y salts de 64 caracteres en `wp-config.php` (reemplazando cadenas duplicadas).
  - Supresión de visualización de errores y stack traces (`WP_DEBUG_DISPLAY = false`, `display_errors = 0`) y limitación de revisiones de post a 5.
  - Refuerzo en `.htaccess` con directivas contra inyecciones maliciosas (`base64_encode`, `eval`, `GLOBALS`, `_REQUEST`), bloqueo de escaneo de autores (`?author=N`), bloqueo de ejecución directa en `wp-includes/`, protección de archivos de sistema/backups y cabeceras `Permissions-Policy` y `X-XSS-Protection`.
  - Supresión de fingerprinting en `functions.php`: eliminación de números de versión de WordPress en URLs de assets, bloqueo de pingbacks (`X-Pingback`), ofuscación de mensajes de error en el login y desactivación de endpoints públicos de usuarios en la REST API (`/wp/v2/users`).

## [1.1.0] — 2026-10-18

### Added
- **Provisión de SEO Técnico Rank Math vía Base de Datos (`scripts/seed-rank-math-seo.php`):** Carga desatendida de metadatos SEO en `wp_postmeta` (post ID 7) y `wp_options` (`rank-math-options-titles`):
  - Title tag optimizado a 51 caracteres (`La Otra Lucha | Atención del Cáncer de Mama en Perú`).
  - Meta description optimizada a 161 caracteres.
  - Focus keyword primaria y secundarias (`la otra lucha, cáncer de mama perú, ruta de atención oncológica`).
  - Open Graph y Twitter Cards (`summary_large_image`) con imagen oficial de 1200x630px registrada como attachment en medios (`og-la-otra-lucha.jpg`, ID 9).
  - Schema JSON-LD completo (`Organization`, `WebSite`, `WebPage`, `Article`, `Person`).
  - Activación pública del frontend mediante `rank_math_registration_skip = 1` y `blog_public = 1`.
- **Paquete Oficial de Favicons Multirresolución:**
  - Isotipo vectorial `favicon.svg` con el lazo dual bicoloreado (rosado y morado con cruce 3D) sobre contenedor squircle institucional.
  - Exportación de formatos PNG de alta definición (`favicon-16x16.png`, `favicon-32x32.png`, `favicon-48x48.png`, `apple-touch-icon.png` 180x180 y `site-icon-512x512.png`).
  - Generación de contenedor binario `favicon.ico` (frames 16, 32 y 48) ubicado tanto en `assets/img/` como en la raíz pública del sitio.
  - Enlazado de etiquetas en `header.php` y provisión de `site_icon` en `wp_options` de WordPress (Attachment ID 10).
- **Archivos Estándar de Producción y Jerarquía WordPress:**
  - Creación de plantillas completas de WordPress: `page.php` (páginas estándar), `404.php` (error personalizado accesible), `single.php` (entradas individuales con metadatos), `archive.php` (archivos de categorías/fechas con paginación) y `search.php` (resultados de búsqueda con estado vacío y formulario amigable).
  - Integración de metadatos de aplicación: `site.webmanifest` y `manifest.json` (PWA con colores oficiales `#73589f`), `browserconfig.xml` (mosaicos de Windows) y enlaces en `header.php`.
  - Estándares institucionales y de seguridad: `.well-known/security.txt` (RFC 9116) y `humans.txt` (créditos a Por un Perú Sin Cáncer).
  - Documentación del tema `readme.txt` y catálogo de internacionalización `languages/la-otra-lucha.pot`.
  - Hardening del CMS en `.htaccess` (headers `X-Frame-Options: SAMEORIGIN`, `X-Content-Type-Options: nosniff`, `Referrer-Policy`, `Options -Indexes`, bloqueo de `xmlrpc.php`, `wp-config.php`, `.git`) y `DISALLOW_FILE_EDIT = true` en `wp-config.php`.
- **Auditoría y Certificación de Codificación UTF-8:**
  - Comprobación a nivel de byte de todos los recursos SEO (`llms.txt`, `llms-full.txt`, `robots.txt`, `humans.txt`, `site.webmanifest`, `manifest.json`, `browserconfig.xml`, `.well-known/security.txt` y `header.php`): 100% UTF-8 válido, sin Byte Order Mark (BOM) y sin patrones de mojibake.
  - Validación de metadatos SEO en base de datos MySQL (tablas `wp_postmeta` y `wp_options` en `utf8mb4`): caracteres acentuados (`á`, `é`, `í`, `ó`, `ú`, `ñ`) preservados correctamente.
  - Refuerzo en `.htaccess` mediante `AddDefaultCharset UTF-8` y `AddCharset UTF-8` para forzar cabeceras HTTP `Content-Type: text/plain; charset=utf-8` y `application/manifest+json; charset=utf-8`.
- **Páginas Legales Oficiales y Auto-Provisión (`terminos-y-condiciones` & `politicas-de-privacidad`):**
  - Redacción rigurosa de 'Políticas de Privacidad' bajo la Ley N° 29733 (Protección de Datos Personales de Perú), D.S. 003-2013-JUS, derechos ARCO (acceso, rectificación, cancelación, oposición con plazos de ley), autoridad de control (MINJUS-ANPDP) y correo `contacto@porunperusincancer.com`.
  - Redacción rigurosa de 'Términos y Condiciones' bajo la Ley N° 29571 (Código del Consumidor), descargo estricto de responsabilidad médica (información no diagnóstica ni terapéutica que no reemplaza a un oncólogo colegiado), propiedad intelectual y fuero judicial de Lima, Perú.
  - Creación desatendida en base de datos (`scripts/seed-legal-pages.php`) e integración permanente en `functions.php` (`la_otra_lucha_provision_legal_pages` en el hook `after_switch_theme`).
  - Configuración automática de `wp_page_for_privacy_policy` en `wp_options`.
  - Actualización de enlaces del pie de página (`footer.php`) con URLs canónicas limpias (`/terminos-y-condiciones/` y `/politicas-de-privacidad/`).
  - Calibración de `permalink_structure` a `/%postname%/` con regeneración de reglas de reescritura de Apache.
  - Renderizado editorial y maquetación responsive verificados con Chrome DevTools.


### Changed
- **Titular de Testimonio en Sección Karin Pardo:** Actualización del copy de la cita destacada a `"EL CÁNCER NO PUEDE ESPERAR. LAS RESPUESTAS TAMPOCO"`, aplicando la fuente caligráfica script (`Blackrush`) y el vector de subrayado pincelado (`#brush-stroke`) a la palabra `tampoco`, manteniendo balance tipográfico tanto en desktop como en dispositivos móviles.
- **Navegación de Retorno Bidireccional:** Integración de enlaces dinámicos en el header y footer para permitir retornar a la portada desde páginas interiores (`terminos-y-condiciones`, `politicas-de-privacidad`, `404.php`, etc.), botones de miga de pan superior (`.btn-back-home`) y botón al pie del artículo en `page.php` con micro-animaciones hover.
- **Layout Responsivo Sección Karin Pardo:** Posicionado del titular rosa `.karin-story__quote` al costado derecho de la imagen de Karin en pantallas móviles (`< 62rem`), manteniendo la foto en tamaño completo sobre el fondo rosado y el texto biográfico fluyendo debajo con legibilidad óptima.

## [1.0.0] — 2026-10-18

### Added
- **Theme Oficial de WordPress (`wp-content/themes/la-otra-lucha/`):** Paquete completo clásico/híbrido modular y actualizable con metadatos oficiales en `style.css` (v1.0.0, Text Domain `la-otra-lucha`).
- **Auto-Aprovisionamiento de Página Frontal (Self-Provisioning):** En el hook `after_switch_theme`, el tema crea automáticamente la página estática "La Otra Lucha" y la asigna como portada (`show_on_front = page`, `page_on_front = $page_id`), refrescando los permalinks de forma desatendida.
- **Miniatura Oficial del Theme (`screenshot.png`):** Generada en alta resolución (1200x900px, PNG de 32-bit) con la identidad visual oficial, fotografía calada del Hero, paleta de colores y resumen de funcionalidades para el panel de Temas de WordPress.
- **Arquitectura Modular `template-parts/`:** División de las secciones en 8 componentes PHP independientes (`section-hero.php`, `section-karin.php`, `section-reality.php`, `section-four-fights.php`, `section-patient-route.php`, `section-quote-banner.php`, `section-rights.php` y `section-action-trio.php`) orquestados desde `front-page.php`.
- **Helper con Fallback Dinámico (`lol_get_field()`):** Permite personalización mediante Advanced Custom Fields (ACF) si el plugin está activo, preservando el 100% de los datos y fidelidad visual de la maquetación estática por defecto si ACF no está instalado.
- **Carga de ES Modules en WordPress:** Encolado secuencial de hojas CSS y filtro `script_loader_tag` para servir `js/main.js` nativamente como `type="module"`.
- **Hardening CMS:** Supresión de `wp_generator`, enlaces WLW/RSD y desactivación de XML-RPC conforme a `.agents/rules/cms.md`.

## [0.3.0] — 2026-10-18

### Added
- Integración del paquete oficial de recursos (`RECURSOS/SVG`, `PNG`, `WEBP`), fuentes completas (`Blackrush.ttf` y familia `Poppins-*.ttf`) e imágenes caladas por capas (`hero-calado.png`, `karin-calada.png` y `karin-cintas.png`).
- Botón flotante de volver arriba (`#back-to-top` en `index.html`, `css/components.css` y `js/modules/navigation.js`) que aparece al descender el scroll y retorna suavemente al inicio.
- Animación de entrada al hacer scroll (`.reveal-on-scroll` con variantes `--left`, `--right`, `--scale` y retrasos escalonados `--reveal-delay`) aplicada a los 69 elementos de las 10 secciones del landing en `js/modules/animations.js` y `css/components.css`.

### Changed
- Orden vertical coherente (`1 → 7`) en las opciones del menú principal (`#main-nav`) y del pie de página (`.site-footer__nav`), con compensación dinámica de `--header-height` según el alto real del header fijo y scroll-spy unificado para las 7 secciones.
- Diseño móvil refinado con grillas `2x2` (`.stats-grid`, `.pillars-bar__list`, `.road-four__list`, `.road-eight__list`, `.rights-cards`) y pie de página centrado.
- Conexión geométrica y encuadre dentro del contenedor de `1200px` en **Las 4 luchas** (`Recurso 19.svg` unido al borde inferior izquierdo de `.four-fights__callout`, pasos `1–4` encuadrados sin desborde lateral y `padding` vertical simétrico).
- Conexión geométrica y encuadre dentro del contenedor de `1200px` en **La ruta de la paciente** (`Recurso 5.svg` con los pasos `1–8` encuadrados y `padding` superior/inferior de `~85–90px` respecto a las franjas moradas).
- Escala proporcional (`2.22em–2.85em`) para las 7 palabras en fuente `Blackrush` y extracción del vector pincelado original (`#brush-stroke` desde `logo-otra-lucha.svg`) posicionado con `position: absolute` en títulos y nodos de ruta para evitar inflación de ancho.
- Reemplazo de logos, íconos de derechos (`Recurso 8` a `12`), comillas texturizadas (`quote-open.svg` y `quote-close.svg` sin duplicados en `bg-footer-ribbons.svg`), redes sociales (`Recurso 16` a `18`) y fondos de cintas (`bg-quote-banner.svg`, `bg-footer-ribbons.svg`).

## [0.2.1] — 2026-10-18

### Changed
- Aplicada la paleta de colores oficial confirmada por Diseño en `css/variables.css`: Blanco (`#ffffff`), Gris (`#646160`), Rosado (`#e46f94`), Rosado suave (`#e77fa0`) y Morado (`#73589f`).
- Aplicada la jerarquía tipográfica oficial del diseñador en `css/variables.css`, `css/reset.css`, `css/components.css` y `css/sections.css`:
  - **Títulos:** `Veneer TwoRegular` y `Blackrush`.
  - **Subtítulos:** `Poppins SemiBold` (`600`).
  - **Textos:** `Poppins Light` (`300`), palabras resaltadas (`<strong>`) en `Poppins Medium` (`500`) y cursivas (`<em>`) en `Poppins SemiBold Italic` (`600 italic`).

## [0.2.0] — 2026-10-17

### Added
- Extracción directa desde `diseno/LANDING.pdf` de las fuentes originales `Blackrush.ttf` (`Obj 39`) y `Veneer-Two.otf` (`Obj 31` empaquetado con `fontTools`) en `scripts/extract-pdf-assets.py` y carga mediante `@font-face` en `css/variables.css`.

### Changed
- Ajuste del contenedor principal a `1200px` (`--container-max: 1200px`) y fidelidad visual 1:1 en las 10 secciones contra `diseno/1.png`–`10.png`.

## [0.1.0] — 2026-10-17

### Added
- Documentación fundacional completa del proyecto en `/docs` (`01_PROJECT_PRD.md` a `10_RUNBOOK.md` y glosario `CONTEXT.md`) y configuración de proyecto en `AGENTS.md`.
- Script reproducible `scripts/extract-pdf-assets.py` para extraer las fotografías originales en alta resolución (`hero-mujeres.png` y `karin-pardo.jpg`) directamente desde `diseno/LANDING.pdf`.
- Maquetación completa One-Page en `index.html`, estilos BEM en `css/` y módulos ES6 en `js/`.
