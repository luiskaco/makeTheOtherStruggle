# 06 — Backlog Activo y Estado de Traspaso

## Estado de traspaso

- **Dónde quedó:** Desacoplada la fijación sticky de la cabecera: la sección de logos (`.site-header`) ahora tiene flujo natural y desaparece con el scroll, mientras que únicamente la barra rosa de navegación (`.site-nav`) se mantiene fija (`position: sticky; top: 0; z-index: 100`) en pantallas desktop. Se actualizó `body` con `overflow-x: clip`, se recalibraron los offsets de scroll y scroll-spy en `navigation.js`, y se verificó con Chrome DevTools. Versión 1.2.3 sincronizada.
- **Próximo paso:** Continuar según indicaciones del usuario (el backlog P-01 para exportar campos ACF a `acf-json/` permanece pendiente según lo solicitado).
- **Bloqueos:** Ninguno.

---

## Tareas — Fase 1: Maquetación Estática Base (HTML + CSS + JS) y Documentación

- [x] **T-01:** Ejecutar descubrimiento `/grill` para definir alcance One-Page, estrategia de fuentes y arquitectura destino en WordPress (PHP `template-parts` + ACF).
- [x] **T-02:** Crear documentación completa del proyecto en `/docs` (`01_PROJECT_PRD.md` a `10_RUNBOOK.md` + `CONTEXT.md`) y completar la sección **Proyecto** en `AGENTS.md`.
- [x] **T-03:** Extraer recursos fotográficos en alta resolución (`1920px` y `1983px` + máscara de recorte) e información cromática/vectorial directamente desde `diseno/LANDING.pdf`.
- [x] **T-04:** Construir sistema de tokens CSS (`css/variables.css`), reset (`css/reset.css`), layout (`css/layout.css`) y componentes BEM (`css/components.css`, `css/sections.css`) con diseño mobile-first, `clamp()` y `text-wrap: balance/pretty`.
- [x] **T-05:** Maquetar en `index.html` las 10 secciones de **La Otra Lucha** estructuradas con comentarios de bloque equivalentes a `template-parts` de WordPress y atributos `data-acf-field` de referencia.
- [x] **T-06:** Implementar módulos JavaScript nativos (ES Modules en `js/`) para navegación móvil accesible (`aria-expanded`, foco, tecla `Escape`), scroll suave, scroll-spy de sección activa y contadores/animaciones de entrada con `IntersectionObserver` respetando `prefers-reduced-motion`.
- [x] **T-07:** Verificar responsividad (móvil 375px, tablet 768px, desktop 1440px/1920px), SEO técnico (`seo.md`) y accesibilidad (`ui-ux.md`).
- [x] **T-08:** Ajuste de fidelidad visual 1:1 contra `diseno/1.png`–`10.png`: contenedor principal a `1200px` y extracción de fuentes incrustadas del PDF (`Blackrush.ttf` y `Veneer-Two.otf`).
- [x] **T-09:** Aplicar paleta oficial confirmada (`#ffffff`, `#646160`, `#e46f94`, `#e77fa0`, `#73589f`) y jerarquía exacta de pesos tipográficos (`Poppins Light 300`, `Medium 500`, `SemiBold 600` y `SemiBold Italic 600i`).
- [x] **T-10:** Integrar paquete oficial de recursos (`RECURSOS/SVG`, `PNG`, `WEBP`, `Blackrush.ttf` completo e imágenes caladas separadas `hero-calado.png`, `karin-calada.png` y `karin-cintas.png`) y ajustar conexiones geométricas de rutas (`Recurso 19.svg` con el recuadro de las 4 luchas, `Recurso 5.svg` con los 8 nodos de la ruta de la paciente, Hero a 4 líneas exactas).
- [x] **T-11:** Calibrar escala tipográfica de las 7 palabras en `Blackrush`, extraer el vector pincelado original (`#brush-stroke` desde `logo-otra-lucha.svg`), anclar los subrayados con `position: absolute` en títulos y nodos de ruta (`1–4` y `1–8`), y dar encuadre + `padding` vertical simétrico en las secciones 4 y 6.
- [x] **T-12:** Refinar diseño móvil en grillas de 2 columnas (`2x2`), centrar el pie de página en móvil, ordenar el flujo de scroll y scroll-spy de las 7 opciones del menú con compensación dinámica de `--header-height`, implementar el botón flotante de volver arriba (`#back-to-top`) y aplicar animaciones de scroll escalonadas a todos los elementos del landing.

---

## Tareas — Fase 2: Theme de WordPress Actualizable y Modular (`wp-content/themes/la-otra-lucha/`)

- [x] **T-13:** Crear estructura del theme clásico/híbrido `wp-content/themes/la-otra-lucha/` (`style.css` v1.0.0, `functions.php` modular, `header.php`, `footer.php`, `front-page.php`, `index.php`).
- [x] **T-14:** Dividir el marcado HTML en 8 `template-parts/section-*.php` con sustitución dinámica de rutas de assets (`LA_OTRA_LUCHA_URI`), funciones de escape y preservación de accesibilidad.
- [x] **T-15:** Implementar auto-aprovisionamiento de página frontal (Self-Provisioning) en `functions.php` mediante el hook `after_switch_theme` para crear la página "La Otra Lucha" y configurarla como portada automáticamente al activar el theme.
- [x] **T-16:** Diseñar y generar la miniatura oficial del tema (`screenshot.png`, 1200x900px) con la identidad gráfica oficial para el panel de administración de WordPress.
- [x] **T-17:** Implementar helper `lol_get_field()` con fallback dinámico para resiliencia out-of-the-box con o sin ACF Pro.
- [x] **T-18:** Validar sintaxis PHP de todos los archivos del theme con PHP 8.3 (`php -l`) y sincronizar documentación del proyecto (`01_PROJECT_PRD.md` a `10_RUNBOOK.md` y `AGENTS.md`).
- [x] **T-19:** Ajuste de layout responsivo en sección Karin Pardo: titular rosa posicionado al lado derecho de la figura sobre fondo rosado en pantallas móviles (< 62rem) y verificado visualmente en navegador con Chrome DevTools.
- [x] **T-20:** Provisión de metadatos SEO en base de datos para Rank Math (`scripts/seed-rank-math-seo.php`): configuración de `wp_postmeta` (post ID 7), `wp_options` (`rank-math-options-titles`), creación de attachment Open Graph (1200x630px), bypass de registro para activación pública en el frontend (`rank_math_registration_skip = 1` y `blog_public = 1`), y verificación de etiquetas en vivo con Chrome DevTools.
- [x] **T-21:** Diseño y generación del paquete oficial de Favicons del sitio: isotipo vectorial `favicon.svg` con el lazo dual (rosado cáncer de mama y morado salud/derechos con cruce tridimensional), renderizado PNG multirresolución (`16x16`, `32x32`, `48x48`, `apple-touch-icon.png` `180x180`, `site-icon-512x512.png` y binario `favicon.ico`), integración en `header.php` y provisión de `site_icon` en `wp_options` de WordPress (Attachment ID 10) validado con Chrome DevTools.
- [x] **T-22:** Implementación de SEO para Inteligencia Artificial y Mapa del Sitio: creación del estándar `llms.txt` y `llms-full.txt` en la raíz para modelos de lenguaje (GPT, Claude, Perplexity), reescritura en `.htaccess` para el subdirectorio `/makeTheOtherStruggle/`, activación de sitemaps XML de Rank Math (`/sitemap.xml`, `/sitemap_index.xml`, `/page-sitemap.xml`), configuración de directivas en `robots.txt` y meta tags `<link rel="alternate" type="text/plain">` en `header.php`.
- [x] **T-23:** Creación de archivos estándar de producción web y WordPress: plantillas completas de jerarquía (`page.php`, `404.php`, `single.php`, `archive.php`, `search.php`), documentación oficial del tema (`readme.txt`), catálogo de traducción Gettext (`languages/la-otra-lucha.pot`), metadatos PWA y mosaicos (`site.webmanifest`, `manifest.json`, `browserconfig.xml`), estándares institucionales (`.well-known/security.txt`, `humans.txt`), y hardening de seguridad en `.htaccess` y `wp-config.php` (`DISALLOW_FILE_EDIT`, bloqueo de `xmlrpc.php`, `wp-config.php`, `.git` y headers `X-Frame-Options: SAMEORIGIN`, `X-Content-Type-Options: nosniff`).
- [x] **T-24:** Auditoría y certificación de codificación UTF-8 en archivos y metadatos SEO (`scripts/check-utf8-seo.py`): validación de integridad UTF-8 sin BOM en `llms.txt`, `llms-full.txt`, `robots.txt`, `humans.txt`, `site.webmanifest`, `manifest.json` y `header.php`; verificación de almacenamiento sin mojibake en MySQL (`wp_postmeta` de Rank Math en `utf8mb4`); y refuerzo de directivas `AddDefaultCharset UTF-8` y `AddCharset UTF-8` en `.htaccess` para entrega HTTP consistente.
- [x] **T-25:** Creación y provisión de las páginas legales del footer: 'Términos y Condiciones' y 'Políticas de Privacidad' conforme a la Ley N° 29733 (Perú) y lineamientos de prelaunch-compliance-audit, auto-provisión en WordPress, actualización de enlaces dinámicos en `footer.php` y verificación de renderizado en Chrome DevTools.
- [x] **T-26:** Implementación de navegación de retorno bidireccional desde páginas internas (`page.php`, `terminos-y-condiciones`, `politicas-de-privacidad`): lógica dinámica con `is_front_page()` en `header.php` y `footer.php` para apuntar el logo a `home_url('/')` y las opciones del menú/CTA a sus anclas absolutas, adición de componentes de miga de pan (`.btn-back-home`) y botón al pie del artículo en `page.php`, con estilos en `css/sections.css` y validación en Chrome DevTools.
- [x] **T-27:** Actualización del titular de testimonio en la sección Karin Pardo (`section-karin.php`): sustitución del copy por 'EL CÁNCER NO PUEDE ESPERAR. LAS RESPUESTAS TAMPOCO', aplicando el estilo script de caligrafía (`Blackrush`) y vector de pincelada (`#brush-stroke`) a la palabra 'tampoco', con calibración tipográfica y responsiva.
- [x] **T-28:** Actualización del texto biográfico en la sección Karin Pardo (`section-karin.php`): integración del copy extendido sobre barreras burocráticas y demoras en el sistema de salud, con calibración tipográfica y verificación responsiva.
- [x] **T-29:** Lanzamiento y sincronización de versión 1.2.0 del theme: actualización de metadatos en `style.css`, constante `LA_OTRA_LUCHA_VERSION` en `functions.php`, `readme.txt` (Stable tag y changelog), catálogo Gettext `.pot`, `AGENTS.md` y `docs/08_CHANGELOG.md`.
- [x] **T-30:** Implementación de suite de seguridad y hardening integral para WordPress conforme a `.agents/rules/cms.md` y `security.md`: claves/salts únicos en `wp-config.php`, headers de protección y bloqueo de inyecciones/enumeración en `.htaccess`, y supresión de fingerprinting/REST API users en `functions.php`.
- [x] **T-31:** Centrado de logos institucionales en la cabecera superior (`.site-header__top`): alineación horizontal en el centro de la pantalla tanto en desktop como en móvil mediante flexbox y posicionamiento flotante del botón hamburguesa, garantizando espaciado y balance visual simétrico.
- [x] **T-32:** Ajuste responsivo de alineación de logos en cabecera superior (`.site-header__top`): alineación a la izquierda (`space-between` con el botón menú) en móvil y tablet (< 1100px / 68.75rem), manteniendo el centrado simétrico exclusivamente en pantallas desktop (>= 1100px).
- [x] **T-33:** Desacople de fijación sticky entre cabecera de logos y barra de navegación: convertir la sección de logos (`.site-header`) en flujo estático natural para que suba y desaparezca al hacer scroll, manteniendo únicamente el menú rosa (`.site-nav`) fijado en sticky (`top: 0`) en desktop, adaptando `overflow-x: clip` en `body` y recalibrando compensaciones de scroll suave y scroll-spy en `navigation.js`.

---

## Backlog Pendiente (Por solicitud de usuario)

- [ ] **P-01:** Exportación y sincronización de grupos de campos ACF en formato JSON (`acf-json/`) para facilitar la edición de textos desde el panel de WordPress.
