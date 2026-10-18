# 03 — Especificaciones Técnicas (`SYSTEM_SPEC`)

## 1. Stack Tecnológico de Producción (WordPress Theme)

| Capa | Implementación Oficial |
|---|---|
| **CMS Base** | WordPress 6.0+ (probado en 6.7.1) sobre PHP 8.3 (Laragon) + MySQL 8.0 |
| **Theme Type** | Theme Clásico / Híbrido Modular (`wp-content/themes/la-otra-lucha/`, v1.1.0) |
| **Jerarquía Templates**| `front-page.php`, `header.php`, `footer.php`, `page.php`, `404.php`, `single.php`, `archive.php`, `search.php`, `index.php` |
| **Componentes** | 8 `template-parts/section-*.php` + SVG `#brush-stroke` inline en header |
| **Estilos** | CSS3 Puro (Custom Properties, BEM, `clamp()`, Grid/Flexbox) sin dependencias |
| **Interactividad** | Vanilla JS con ES Modules nativos cargados con `type="module"` vía filtro `script_loader_tag` |
| **Gestión de Datos** | Auto-provisión de portada en `after_switch_theme` + Helper `lol_get_field()` compatible con ACF |
| **SEO & IA** | Rank Math SEO provisto en BD + `llms.txt`, `llms-full.txt`, sitemaps XML y JSON-LD |
| **PWA & Favicons** | Suite de favicons (`favicon.svg`, `.ico`, `.png` 16/32/48/180/192/512), `site.webmanifest`, `browserconfig.xml` |
| **Seguridad** | Hardening en `.htaccess` (headers de seguridad, bloqueo de archivos sensibles, `Options -Indexes`) y `wp-config.php` |

---

## 2. Convenciones y Funciones del Theme (`functions.php`)

### 2.1. Constantes Definidas
```php
define( 'LA_OTRA_LUCHA_VERSION', '1.1.0' );
define( 'LA_OTRA_LUCHA_DIR', get_template_directory() );
define( 'LA_OTRA_LUCHA_URI', get_template_directory_uri() );
```

### 2.2. Hooks y Filtros Implementados
- **`after_setup_theme` (`la_otra_lucha_setup`)**:
  - `title-tag`, `post-thumbnails`, `custom-logo`, `responsive-embeds`, `html5`.
  - Registro de menús: `'primary'` y `'footer'`.
  - Soporte de i18n: `load_theme_textdomain( 'la-otra-lucha', LA_OTRA_LUCHA_DIR . '/languages' )`.
- **`after_switch_theme` (`la_otra_lucha_provision_front_page`)**:
  - Busca la página con slug `la-otra-lucha`.
  - Si no existe, la crea con `wp_insert_post()`.
  - Configura `update_option('show_on_front', 'page')` y `update_option('page_on_front', $page_id)`.
  - Ejecuta `flush_rewrite_rules()`.
- **`wp_enqueue_scripts` (`la_otra_lucha_enqueue_assets`)**:
  - Encola Google Fonts (Poppins, Bebas Neue, Oswald, Kaushan Script, Caveat).
  - Encola secuencialmente: `variables.css`, `reset.css`, `layout.css`, `components.css`, `sections.css`, `style.css`.
  - Encola `js/main.js`.
- **`script_loader_tag` (`la_otra_lucha_script_loader_tag`)**:
  - Transforma la etiqueta `<script>` del handle `la-otra-lucha-main-js` a `<script type="module" ...>`.
- **Hardening CMS (`cms.md`)**:
  - `remove_action('wp_head', 'wp_generator')`.
  - `remove_action('wp_head', 'wlwmanifest_link')`.
  - `remove_action('wp_head', 'rsd_link')`.
  - `add_filter('xmlrpc_enabled', '__return_false')`.

### 2.3. Helper de Campos Personalizados con Fallback
```php
function lol_get_field( $field_name, $fallback = '', $post_id = false ) {
    if ( function_exists( 'get_field' ) ) {
        $value = get_field( $field_name, $post_id );
        if ( ! empty( $value ) ) {
            return $value;
        }
    }
    return $fallback;
}
```

---

## 3. Sistema de Diseño Oficial (Design Tokens en `css/variables.css`)

### 3.1. Paleta de Colores Oficial

| Nombre Oficial | Token CSS | Valor Hex | Uso en el diseño |
|---|---|---|---|
| **Blanco** | `--color-white` / `--color-bg-white` | `#ffffff` | Fondos principales, tarjetas de derechos y textos sobre bloques de color |
| **Gris** | `--color-heading` / `--color-text` | `#646160` | Titulares, textos descriptivos, bordes de cajas y trazos de la ruta |
| **Rosado** | `--color-primary` | `#e46f94` | Barra de navegación, acentos en titulares, números de ruta, contenedor de derechos, tarjeta ancha y footer |
| **Rosado suave** | `--color-primary-light` | `#e77fa0` | Tarjetas de indicadores (`7,797`, `40%`, `7,685`, `21,945`) y tarjeta *Tus derechos importan* |
| **Morado** | `--color-secondary` | `#73589f` | Logo *Por un Perú Sin Cáncer*, botones CTA, subtítulo `¿QUÉ BUSCAMOS CONOCER?`, franja de 4 pilares, banner de cita, íconos/textos de derechos y tarjeta de evidencia |

### 3.2. Jerarquía Tipográfica Oficial

| Elemento | Fuente y Peso | Token / Regla CSS |
|---|---|---|
| **Títulos principales y cifras** | `Veneer TwoRegular` / `Oswald` | `font-family: var(--font-display); font-weight: 400;` |
| **Palabras manuscritas de acento** | `Blackrush` / `Kaushan Script` | `font-family: var(--font-script); font-weight: 400;` |
| **Subtítulos** | `Poppins SemiBold` (`600`) | `font-family: var(--font-body); font-weight: var(--fw-semibold);` (`600`) |
| **Textos (cuerpo y cajas)** | `Poppins Light` (`300`) | `font-family: var(--font-body); font-weight: var(--fw-light);` (`300`) |
| **Palabras resaltadas en textos** | `Poppins Medium` (`500`) | `strong { font-weight: var(--fw-medium); }` (`500`) |
| **Textos en cursiva / énfasis** | `Poppins SemiBold Italic` (`600 italic`) | `em { font-weight: var(--fw-semibold); font-style: italic; }` |
