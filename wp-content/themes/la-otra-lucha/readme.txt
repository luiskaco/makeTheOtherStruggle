=== La Otra Lucha ===
Contributors: Por un Perú Sin Cáncer
Tags: one-page, health, custom-colors, custom-menu, featured-images, responsive-layout, translation-ready, accessibility-ready
Requires at least: 6.0
Tested up to: 6.7
Requires PHP: 8.0
Stable tag: 1.8.7
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

== Description ==
Theme oficial para "La Otra Lucha", iniciativa institucional de "Por un Perú Sin Cáncer" dedicada a visibilizar y transformar la ruta de atención de las pacientes con cáncer de mama en el Perú. Inspirado en el caso de Karin Pardo, el Observatorio Oncológico y la Guía de Derechos de la Paciente Oncológica.

Desarrollado bajo los más altos estándares de rendimiento, accesibilidad WCAG AA, CSS puro modular con variables y Vanilla JavaScript (ES Modules).

== Installation ==
1. Subir o clonar la carpeta `la-otra-lucha` dentro de `/wp-content/themes/`.
2. Activar el tema desde el menú 'Apariencia' -> 'Temas' en el panel de administración de WordPress.
3. El tema aprovisiona automáticamente la página estática "La Otra Lucha" y la configura como portada en el hook `after_switch_theme`.

== Features ==
* 100% Responsive & Mobile-First.
* Suite de Favicons multirresolución e integración PWA (`site.webmanifest`).
* Optimización SEO para motores de búsqueda tradicionales y modelos de inteligencia artificial (`llms.txt`, `llms-full.txt`).
* Helper `lol_get_field()` con fallback nativo que garantiza funcionamiento idéntico con o sin Advanced Custom Fields (ACF).
* Plantillas completas de jerarquía WordPress: front-page.php, page.php, 404.php, single.php, archive.php, search.php e index.php.

== Frequently Asked Questions ==
= ¿Requiere Advanced Custom Fields (ACF)? =
No. El tema cuenta con fallbacks dinámicos para funcionar de inmediato sin requerir plugins adicionales obligatorios.

== Changelog ==

= 1.8.7 =
* Ocultada seccion de terapia y barrera del costo en la historia de Karin Pardo (/historia-de-karin/).
* Corregida transicion y visibilidad inicial above-the-fold sin requerir scroll.
* Cache-busting de estilos y ES Modules para refresco automatico en hosting y CDN.

= 1.8.6 =
* Implementación de dos botones CTA en sección de Resultados del Estudio: 'Consulta el estudio completo aquí' (enlace a Observatorio) y 'Descarga el resumen en PDF' (botón no enlazado con microinteracciones).
* Portabilidad y autonomía total de contenidos del tema: creación de fallback estático content-karin-story.php para garantizar que la historia completa de Karin Pardo y todas las secciones carguen out-of-the-box sin depender de base de datos externa.
* Normalización universal de URLs de YouTube en modal accesible y helper PHP.

= 1.8.5 =
* Incorporación de la plantilla de fallback estándar obligatoria index.php para resolver advertencias de WordPress.
* Integración del video oficial de YouTube (gmZVwGiNzJM) en el botón de reproducción del Hero con modal accesible.
* Actualización del testimonio de Karin Pardo (/historia-de-karin/) incorporando enlaces a fuentes periodísticas y eliminando titulares duplicados en el cuerpo.
* Ajuste en .gitignore para restringir el ignorado a /index.php en la raíz del CMS.

= 1.8.4 =
* Integración oficial de Google Tag Manager (GTM ID: GTM-N7PP8WWT) con script en <head> y contenedor alternativo <noscript> en <body>.
* Actualización de enlaces directos a la plataforma oficial del Observatorio Oncológico (https://observatoriodecancer.com/).

= 1.8.3 =
* Integración del snippet oficial de Google Tag (gtag.js / Google Analytics 4 ID: G-YMHXSQNHRP) en la cabecera del tema (header.php).
* Sincronización de analítica web para monitoreo y métricas de campaña.

= 1.4.0 =
* Actualización de indicadores estadísticos en "La Realidad del Cáncer de Mama" con datos de GLOBOCAN 2024 (7,797 casos nuevos en mujeres peruanas, 21 diagnósticos diarios, 18% casos menores de 40 años y 694,000 muertes mundiales).
* Ocultación de los 4 hitos y círculos del camino serpenteante en "Las 4 Luchas", manteniendo el trazo continuo y limpio.
* Depuración editorial de la sección Estudio del Observatorio y síntesis del recuadro explicativo de la ruta.
* Cache-busting dinámico para recursos SVG con fecha de modificación.

= 1.3.0 =
* Nueva sección: Estudio del Observatorio Oncológico sobre la Ruta de la Paciente con Cáncer de Mama (tarjeta interactiva con estadísticas 59,5% y 60,6%, botón CTA oficial hacia observatoriodecancer.com).

= 1.2.3 =
* Desacople sticky: la sección superior de logos (.site-header) fluye de forma natural y desaparece con el scroll, manteniendo exclusivamente la barra de navegación (.site-nav) fijada en sticky (top: 0) en desktop.

= 1.2.2 =
* Calibración responsiva de cabecera: logos a la izquierda en móvil y tablet (< 1100px) con botón hamburguesa a la derecha, y centrado simétrico en desktop (>= 1100px).

= 1.2.1 =
* Centrado de logos institucionales en la cabecera superior (.site-header__top) con alineación simétrica y soporte responsivo móvil.

= 1.2.0 =
* Actualización de titulares y copy biográfico en la sección testimonio de Karin Pardo con enfoque en la Ruta de la Paciente.
* Máscara CSS de desvanecimiento en fotografía para garantizar contraste óptimo y legibilidad del texto en desktop y móvil.
* Calibración de espaciados, alturas mínimas y jerarquía tipográfica responsiva.

= 1.1.0 =
* Implementación de suite de plantillas completas: page.php, 404.php, single.php, archive.php y search.php.
* Suite oficial de favicons, browserconfig y Web App Manifest.
* Integración con estándares de IA (llms.txt, robots.txt amigable con LLMs).

= 1.0.0 =
* Lanzamiento inicial con arquitectura modular de 8 template-parts, tipografía personalizada y diseño 1:1.
