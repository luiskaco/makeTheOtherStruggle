=== La Otra Lucha ===
Contributors: Por un Perú Sin Cáncer
Tags: one-page, health, custom-colors, custom-menu, featured-images, responsive-layout, translation-ready, accessibility-ready
Requires at least: 6.0
Tested up to: 6.7
Requires PHP: 8.0
Stable tag: 1.1.0
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
= 1.1.0 =
* Implementación de suite de plantillas completas: page.php, 404.php, single.php, archive.php y search.php.
* Suite oficial de favicons, browserconfig y Web App Manifest.
* Integración con estándares de IA (llms.txt, robots.txt amigable con LLMs).

= 1.0.0 =
* Lanzamiento inicial con arquitectura modular de 8 template-parts, tipografía personalizada y diseño 1:1.
