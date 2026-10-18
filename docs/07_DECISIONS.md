# 07 — Registro de Decisiones de Arquitectura (`ADR`)

## ADR-001: Estrategia de Dos Fases (HTML/CSS/JS Puro → WordPress Classic/Hybrid + ACF)

- **Fecha:** 2026-10-17
- **Estado:** Aceptada
- **Contexto:** Se requiere construir la landing page de *La Otra Lucha* a partir de `diseno/LANDING.pdf` sin disponer aún de los archivos editables ni fuentes comerciales licenciadas, con el objetivo posterior de administrarla en WordPress.
- **Alternativas evaluadas:**
  1. Construir directamente un Block Theme FSE en WordPress desde el día 1.
  2. Construir primero en HTML5 + CSS BEM + JS (ES Modules) desacoplado en secciones equivalentes a `template-parts`, y migrar en Fase 2 a un Theme Clásico/Híbrido PHP con ACF.
  3. Usar un Page Builder (Elementor / Divi).
- **Decisión:** Alternativa 2 (Fase 1 en HTML/CSS/JS puro estructurado para migrar a PHP `template-parts` + ACF en Fase 2).
- **Consecuencias:** Permite validar diseño, responsividad y animaciones de inmediato sin levantar base de datos, y garantiza código limpio sin el sobrepeso de un Page Builder al pasar a WordPress.

---

## ADR-002: Extracción Directa de Recursos Binarios del PDF + Equivalencia Tipográfica por Tokens

- **Fecha:** 2026-10-17
- **Estado:** Aceptada
- **Contexto:** El cliente entregó únicamente `diseno/LANDING.pdf` sin carpeta de fotos recortadas ni archivos de fuentes. Al inspeccionar el binario del PDF se detectaron las fuentes `Poppins` (libre), `Veneer` / `Veneer Two` (comercial) y `Blackrush` (comercial), así como 3 objetos de imagen `DCTDecode` (`1920x1080` con máscara `SMask` y `1983x793`).
- **Alternativas evaluadas:**
  1. Usar imágenes placeholder genéricas hasta recibir el paquete de diseño.
  2. Extraer programáticamente los streams JPEG y la máscara alfa (`SMask`) directamente desde los objetos `76`, `77` y `78` del PDF para obtener las fotos originales en alta resolución, reconstruir los vectores en SVG limpio y definir variables CSS `--font-display` y `--font-script` con equivalentes libres de Google Fonts (`Oswald`/`Bebas Neue` y `Kaushan Script`/`Caveat`) junto a `Poppins`.
- **Decisión:** Alternativa 2.
- **Consecuencias:** La maqueta luce con las fotografías reales del diseño desde la primera entrega y cambiar a las fuentes comerciales definitivas tomará solo agregar las reglas `@font-face` en `css/variables.css`.

---

## ADR-003: Rutas Serpenteantes Responsivas (SVG en Desktop + Timeline Vertical en Mobile)

- **Fecha:** 2026-10-17
- **Estado:** Aceptada
- **Contexto:** El PDF de escritorio (`1920px`) presenta dos infografías de ruta con curvas en forma de "S" (4 etapas y 8 dimensiones) donde el orden visual en zig-zag difiere del flujo lineal en pantallas estrechas.
- **Decisión:** Mantener en el DOM el orden semántico estricto (`1 → 2 → 3 → 4` y `1 → 2 → ... → 8`) por accesibilidad (`ui-ux.md`) y SEO (`seo.md`). En móvil/tablet se presenta como línea de tiempo vertical continua; en desktop (`>= 1024px`) se posicionan los ítems sobre el trazado curvo mediante CSS Grid áreas/coordenadas y SVG decorativo (`aria-hidden="true"`).

---

## ADR-004: Auto-Aprovisionamiento Desatendido (Self-Provisioning) en `after_switch_theme`

- **Fecha:** 2026-10-18
- **Estado:** Aceptada
- **Contexto:** Se requería que al instalar o activar el theme en cualquier entorno de WordPress, la página de inicio funcionara inmediatamente sin obligar al usuario a crear páginas manualmente y asignarlas en Ajustes > Lectura.
- **Decisión:** Implementar en `functions.php` una rutina en el hook `after_switch_theme` que consulta `get_page_by_path('la-otra-lucha')`. Si no existe, la crea con `wp_insert_post()`, le asigna `show_on_front = page` y `page_on_front = $page_id`, refrescando los permalinks con `flush_rewrite_rules()`.
- **Consecuencias:** Despliegue en 1 clic ("cero configuración post-activación") con persistencia garantizada.

---

## ADR-005: Estrategia Dual de SEO (Rank Math en BD para Motores Tradicionales + `llms.txt` para IA)

- **Fecha:** 2026-10-18
- **Estado:** Aceptada
- **Contexto:** La campaña requiere máxima visibilidad tanto en buscadores convencionales (Google, Bing) como en modelos de lenguaje generativo (ChatGPT, Claude, Perplexity, Gemini, SearchGPT) sin introducir penalizaciones ni sobrecarga al servidor.
- **Decisión:** 
  1. Para motores tradicionales: Carga directa en base de datos (`wp_postmeta` de post ID 7 y `wp_options`) de metadatos Rank Math con Schema JSON-LD y Open Graph oficial.
  2. Para modelos de IA: Exposición en la raíz de `llms.txt` (resumen conciso) y `llms-full.txt` (documentación exhaustiva de la ruta y derechos), vinculados mediante `<link rel="alternate" type="text/plain">` y autorizados explícitamente en `robots.txt`.
- **Consecuencias:** Cobertura de indexación omnicanal preparada para la nueva era de búsqueda asistida por IA.

---

## ADR-006: Codificación UTF-8 Estricta sin BOM y Hardening de Cabeceras HTTP

- **Fecha:** 2026-10-18
- **Estado:** Aceptada
- **Contexto:** En servidores Apache bajo Windows (Laragon), los archivos de texto y XML corren riesgo de servirse sin declaración de juego de caracteres o con BOM, provocando errores en parsers XML de sitemaps o mojibake en rastreadores internacionales.
- **Decisión:**
  1. Mantener todos los archivos en disco como UTF-8 puro sin Byte Order Mark (`\xef\xbb\xbf`).
  2. Configurar en `.htaccess` directivas `AddDefaultCharset UTF-8` y `AddCharset UTF-8` para extensiones `.txt`, `.html`, `.xml`, `.json` y `.webmanifest`.
  3. Almacenamiento en MySQL bajo cotejamiento `utf8mb4`.
- **Consecuencias:** Cero mojibake garantizado y compatibilidad universal con bots y navegadores modernos.
