# 09 — Estrategia de Pruebas y Trazabilidad (`TESTING`)

## 1. Cómo Ejecutar y Verificar el Proyecto (Fase 2 — WordPress Theme)

El proyecto se ejecuta en un servidor local con Laragon (Apache + MySQL 8.0 + PHP 8.3):

```powershell
# URL pública de la landing page
http://localhost/makeTheOtherStruggle/

# Panel de administración de WordPress
http://localhost/makeTheOtherStruggle/wp-admin/
```

### 1.1. Verificación de Sintaxis PHP de todo el Theme (PHP 8.3)
```powershell
python -c "
import glob, subprocess
php = r'D:\AppsInstaller\laragon\bin\php\php-8.3.33-Win32-vs16-x64\php.exe'
for f in glob.glob('wp-content/themes/la-otra-lucha/**/*.php', recursive=True) + glob.glob('wp-content/themes/la-otra-lucha/*.php'):
    res = subprocess.run([php, '-l', f], capture_output=True, text=True)
    assert res.returncode == 0, f'Error en {f}: {res.stderr}'
print('Todos los archivos PHP tienen sintaxis válida.')
"
```

### 1.2. Auditoría de Codificación UTF-8, BOM y Respuestas HTTP
```powershell
python scripts/check-utf8-seo.py
```

### 1.3. Generación y Regeneración de la Miniatura del Theme (`screenshot.png`)
```powershell
powershell -NoProfile -ExecutionPolicy Bypass -File scripts/generate-screenshot.ps1
```

---

## 2. Matriz de Trazabilidad (`Requisito → Verificación`)

| Requisito | Qué verifica | Método de Prueba | Estado |
|---|---|---|---|
| **RF-01** | Header, navegación smooth-scroll a las 8 secciones y menú hamburguesa en móvil (`< 1100px`) con cierre por `Escape` | Inspección DOM + prueba de viewport `375x812` y `1440x900` | ✅ Verificado |
| **RF-02** | Hero principal con foto grupal extraída (`hero-mujeres.jpg`), `<h1>` único y 2 botones CTA | Inspección visual y semántica | ✅ Verificado |
| **RF-03** | Sección Karin Pardo con retrato PNG recortado y titular rosa posicionado al lado derecho en móvil | Inspección visual con Chrome DevTools | ✅ Verificado |
| **RF-04** | Sección La Realidad del Cáncer de Mama con las 4 cifras exactas (`7,797`, `40%`, `7,685`, `21,945`) | Inspección de texto + animación JS | ✅ Verificado |
| **RF-05** | Ruta de 4 etapas + recuadro punteado + franja morada de 4 pilares | Prueba responsive Desktop (curva) vs Mobile (timeline vertical) | ✅ Verificado |
| **RF-06** | Ruta de 8 dimensiones ("¿Qué buscamos conocer?") en orden DOM `1..8` y disposición en curva en Desktop | Inspección de orden DOM y layout | ✅ Verificado |
| **RF-07** | Banner morado con comillas y CTA al Observatorio Oncológico | Inspección visual | ✅ Verificado |
| **RF-08** | Sección Conoce tus Derechos con las 5 tarjetas e iconografía SVG | Inspección visual y teclado | ✅ Verificado |
| **RF-09** | Tres tarjetas de cierre (Derechos importan, Del testimonio a la evidencia, Del testimonio a la acción) | Inspección visual | ✅ Verificado |
| **RF-10** | Franja final de cita y Footer institucional con enlaces y redes sociales | Inspección visual y enlaces | ✅ Verificado |
| **RF-11** | Theme WordPress instalable y actualizable (`style.css` v1.1.0, Text Domain `la-otra-lucha`) | Activación en WordPress 6.7.1 | ✅ Verificado |
| **RF-12** | Auto-Aprovisionamiento desatendido en `after_switch_theme` | Creación y asignación de `front-page` sin intervención manual | ✅ Verificado |
| **RF-13** | Miniatura oficial del theme `screenshot.png` (1200x900px, 32-bit PNG) | Verificado en `wp-admin/themes.php` | ✅ Verificado |
| **RF-14** | Modularidad con 8 `template-parts` y helper con fallback `lol_get_field()` | Renderizado idéntico sin ACF instalado | ✅ Verificado |
| **RF-15** | Carga de módulos ES nativos con filtro `script_loader_tag` (`type="module"`) | Inspección de Network en DevTools | ✅ Verificado |
| **RF-16** | Suite oficial de Favicons, PWA y mosaicos Windows (`favicon.svg`, `.ico`, `.png`, `site.webmanifest`) | Verificación de carga HTTP 200 y Chrome DevTools | ✅ Verificado |
| **RF-17** | SEO para IA (`llms.txt`, `llms-full.txt`), sitemaps XML y robots.txt | Pruebas HTTP de respuesta 200 y validación de endpoints | ✅ Verificado |
| **RF-18** | Jerarquía completa de plantillas (`page.php`, `404.php`, `single.php`, `archive.php`, `search.php`) | Renderizado verificado con capturas en Chrome DevTools | ✅ Verificado |
| **RF-19** | Páginas legales de Términos y Condiciones y Políticas de Privacidad adaptadas a la ley peruana | Inspección visual en Chrome DevTools, código HTTP 200 y validación de enlaces en el footer | ✅ Verificado |
| **RNF-04** | Accesibilidad WCAG AA y SEO Técnico con Rank Math en base de datos | Verificación contra `.agents/rules/seo.md` y `ui-ux.md` | ✅ Verificado |
| **RNF-05** | Codificación UTF-8 pura sin BOM en disco y base de datos, con cabeceras `charset=utf-8` | Comprobación a nivel de byte con `check-utf8-seo.py` | ✅ Verificado |
| **RNF-06** | Hardening de CMS y servidor (`DISALLOW_FILE_EDIT`, bloqueo de xmlrpc, wp-config, headers de seguridad) | Pruebas de código HTTP (403 Forbidden y headers de seguridad) | ✅ Verificado |
