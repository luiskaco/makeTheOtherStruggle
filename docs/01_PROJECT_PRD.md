# 01 — Product Requirements Document (PRD)

## 1. Visión y Propósito del Producto

**La Otra Lucha** es la plataforma digital de sensibilización, información ciudadana e incidencia pública impulsada por **Por un Perú Sin Cáncer**. Su objetivo es visibilizar las barreras reales que enfrentan las mujeres con cáncer de mama en el Perú a lo largo de su ruta de atención médica —desde la detección de una señal de alerta hasta la continuidad del tratamiento— y acercarles herramientas de orientación legal (**Guía de Derechos**) y evidencia estadística (**Observatorio Oncológico**).

El producto se distribuye como un **Theme de WordPress clásico/híbrido modular y actualizable**, permitiendo su despliegue instantáneo con auto-provisión de página de inicio o su integración con campos avanzados mediante **Advanced Custom Fields (ACF)**.

---

## 2. Usuarios Objetivo

1. **Pacientes con cáncer de mama y sus familias:** Buscan orientación clara sobre qué hacer cuando no consiguen cita, su diagnóstico se demora, no hay medicamentos o su tratamiento se interrumpe.
2. **Ciudadanía, prensa y tomadores de decisión:** Buscan comprender con datos reales e historias humanas (como el testimonio de Karin Pardo) por qué el acceso oportuno a la salud oncológica es "la otra lucha".
3. **Administradores y editores web:** Gestionan el contenido desde el panel de WordPress mediante páginas estáticas o campos ACF personalizables sin romper la maquetación.

---

## 3. Requisitos Funcionales (`RF`)

| ID | Requisito | Criterio de Aceptación |
|---|---|---|
| **RF-01** | **Header y Navegación One-Page** | Logos de *Por un Perú Sin Cáncer* y *La Otra Lucha*, barra de navegación con enlaces a las 7 secciones y botón CTA `INFÓRMATE Y EXIGE`. En móvil colapsa en menú hamburguesa accesible (`aria-expanded`, cierre con `Escape` y scroll dinámico con compensación de `--header-height`). |
| **RF-02** | **Hero Principal ("El cáncer ya es una lucha")** | Fotografía grupal de mujeres calada (`hero-calado.png`), mensaje central con caligrafía `Blackrush` y pincelada `#brush-stroke`, con dos CTAs: `CONOCE LA HISTORIA DE KARIN` y `CONOCE TUS DERECHOS`. |
| **RF-03** | **Sección Testimonio: Karin Pardo** | Retrato recortado con cintas de campaña, cita central, reseña testimonial a los 26 años y botón `CONOCE LA HISTORIA DE KARIN`. |
| **RF-04** | **Sección La Realidad del Cáncer de Mama (Cifras)** | Bloque editorial con grilla de 4 indicadores clave (`7,797`, `40%`, `7,685`, `21,945`) con formato y etiquetas oficiales. |
| **RF-05** | **Sección Las 4 Luchas ("La otra lucha comienza...")** | Camino serpenteante de 4 hitos numerados, recuadro explicativo conectado (`Recurso 19.svg`) y franja morada de 4 pilares (*Cada etapa importa / demora / merece ser investigada / debe poder visibilizarse*). |
| **RF-06** | **Sección La Ruta de la Paciente (8 Dimensiones)** | Ruta gráfica de 8 hitos numerados interconectados (`Recurso 5.svg`) describiendo las dimensiones de investigación oncológica. |
| **RF-07** | **Banner de Cita: Observatorio Oncológico** | Franja morada con comillas decorativas, cita del Observatorio y CTA `CONOCE EL OBSERVATORIO ONCOLÓGICO`. |
| **RF-08** | **Sección Conoce tus Derechos (5 Situaciones)** | Contenedor principal con 5 tarjetas blancas con iconografía vectorial para situaciones críticas: sin cita, demora diagnóstica, falta de medicamento, interrupción de tratamiento y vulneración de derechos. |
| **RF-09** | **Sección Tripartita: Derechos, Evidencia y Acción** | Tres bloques tipo tarjeta: *Tus derechos importan* (rosa), *Del testimonio a la evidencia* (morado, sobre el Observatorio Oncológico) y *Del testimonio a la acción* (ancho completo), cada uno con su CTA. |
| **RF-10** | **Cierre de Campaña y Footer Institucional** | Logos institucionales, mapa de navegación, enlaces legales (*Términos y condiciones*, *Políticas de privacidad*, *Contacto*) y redes sociales oficiales (*Facebook, Instagram, LinkedIn*). Botón `#back-to-top`. |
| **RF-11** | **Theme de WordPress Instalable y Actualizable** | Paquete estándar de WordPress en `wp-content/themes/la-otra-lucha/` con encabezado completo en `style.css` (v1.0.0, Text Domain `la-otra-lucha`), listo para recibir updates vía Git, FTP o ZIP sin pérdida de configuración. |
| **RF-12** | **Auto-Aprovisionamiento de Página Frontal (Self-Provisioning)** | Al activar el theme en WordPress (`after_switch_theme`), se crea automáticamente la página "La Otra Lucha" (slug `la-otra-lucha`) si no existe, y se configura de forma desatendida como página de inicio estática (`show_on_front = page`, `page_on_front = ID`). |
| **RF-13** | **Miniatura Oficial del Theme (`screenshot.png`)** | Miniatura de 1200x900px visible en el selector de Temas de WordPress (`wp-admin/themes.php`), con la identidad visual oficial, fotografía del Hero, paleta de colores y resumen de funcionalidades. |
| **RF-14** | **Arquitectura Modular con `template-parts` y ACF Fallback** | `front-page.php` orquesta los 8 bloques en `template-parts/section-*.php`. Cada sección usa `lol_get_field()` para permitir edición en ACF manteniendo fallback estático automático si ACF no está instalado. |
| **RF-15** | **Carga Segura de Assets y Módulos ES** | Estilos encolados secuencialmente vía `wp_enqueue_scripts` (`variables.css`, `reset.css`, `layout.css`, `components.css`, `sections.css`, `style.css`) y `main.js` cargado con `type="module"` mediante `script_loader_tag`. |
| **RF-16** | **Suite Oficial de Favicons, PWA y Metadatos de Aplicación** | Isotipo vectorial del lazo dual (`favicon.svg`), binario multirresolución (`favicon.ico` en 16, 32 y 48px), PNGs de alta densidad (`16x16`, `32x32`, `48x48`, `apple-touch-icon.png` 180x180, `site-icon-512x512.png`), integración PWA (`site.webmanifest`, `manifest.json`), soporte para Windows (`browserconfig.xml`) y asignación de `site_icon` en `wp_options`. |
| **RF-17** | **SEO para Inteligencia Artificial y Sitemaps XML** | Exposición del contenido estructurado para modelos de lenguaje en `llms.txt` y `llms-full.txt`, sitemaps XML de Rank Math (`/sitemap.xml`, `/sitemap_index.xml`, `/page-sitemap.xml`) habilitados vía reescritura en `.htaccess`, directivas amigables para bots de IA en `robots.txt` y metadatos JSON-LD enriquecidos. |
| **RF-18** | **Jerarquía Completa de Plantillas de WordPress** | Plantillas específicas para todas las vistas estándar: `page.php` (páginas estáticas), `404.php` (error personalizado accesible con CTAs), `single.php` (entradas individuales con metadatos y comentarios), `archive.php` (listado de categorías/fechas con paginación) y `search.php` (resultados de búsqueda con formulario y estado vacío empático). |
| **RF-19** | **Páginas Legales Oficiales y Cumplimiento Normativo (Perú)** | Páginas estáticas `Términos y Condiciones` (`/terminos-y-condiciones/`) y `Políticas de Privacidad` (`/politicas-de-privacidad/`) enlazadas dinámicamente desde el pie de página. Contenido adaptado a la Ley N° 29733 (Protección de Datos Personales del Perú), D.S. 003-2013-JUS, procedimiento de ejercicio de Derechos ARCO, Ley N° 29571 (Código de Protección y Defensa del Consumidor) y descargo explícito de responsabilidad médica. Auto-aprovisionamiento desatendido en `after_switch_theme` y designación oficial de `wp_page_for_privacy_policy` en WordPress. |

---

## 4. Requisitos No Funcionales (`RNF`)

| ID | Requisito | Criterio de Aceptación |
|---|---|---|
| **RNF-01** | **Fidelidad Visual al Diseño** | Paleta cromática oficial (`#e46f94`, `#e77fa0`, `#73589f`, `#646160`, `#757372`, `#fdf8f3`, `#ffffff`) y recursos oficiales calados (`hero-calado.png`, `karin-calada.png`, `karin-cintas.png`). |
| **RNF-02** | **Resiliencia y Cero Dependencias Duras** | El theme funciona inmediatamente tras la activación sin requerir obligatoriamente plugins externos de terceros. |
| **RNF-03** | **Diseño Responsive Mobile-First** | Adaptación fluida desde `320px` hasta `1920px` usando CSS Grid, Flexbox y `clamp()`. Grillas móviles 2x2 y footer centrado en dispositivos móviles. |
| **RNF-04** | **Accesibilidad y SEO Técnico** | Jerarquía de encabezados válida (`<h1>` único), skip-links, foco accesible (`:focus-visible`), animaciones con escalonamiento respetando `prefers-reduced-motion` y hardening de seguridad CMS (`cms.md`). |
| **RNF-05** | **Codificación e Integridad UTF-8 Universal** | 100% de los archivos de código, texto y metadatos SEO en formato UTF-8 limpio sin BOM. Almacenamiento en base de datos en `utf8mb4` preservando caracteres especiales y tildes, con cabeceras HTTP `charset=utf-8` explícitas. |
| **RNF-06** | **Hardening de Seguridad de Servidor y CMS** | Bloqueo estricto en `.htaccess` contra lectura de archivos sensibles (`.git`, `.env`, `wp-config.php`, `readme.html`, `license.txt`), bloqueo de peticiones a `xmlrpc.php`, desactivación de navegación de directorios (`Options -Indexes`), cabeceras HTTP de protección (`X-Frame-Options: SAMEORIGIN`, `X-Content-Type-Options: nosniff`, `Referrer-Policy`) y constante `DISALLOW_FILE_EDIT = true` en `wp-config.php`. |
