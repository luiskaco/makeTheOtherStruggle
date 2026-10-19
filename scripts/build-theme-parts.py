import os
import re

source_html = r'D:\LabIA\makeOtraLucha\index.html'
theme_dir = r'wp-content\themes\la-otra-lucha'
parts_dir = os.path.join(theme_dir, 'template-parts')
os.makedirs(parts_dir, exist_ok=True)

with open(source_html, 'r', encoding='utf-8') as f:
    html = f.read()

def replace_assets(content):
    # Reemplazar srcset="assets/xxx"
    content = re.sub(
        r'srcset=["\']assets/([^"\']+)["\']',
        r'srcset="<?php echo esc_url( LA_OTRA_LUCHA_URI . \'/assets/\1\' ); ?>"',
        content
    )
    # Reemplazar src="assets/xxx"
    content = re.sub(
        r'src=["\']assets/([^"\']+)["\']',
        r'src="<?php echo esc_url( LA_OTRA_LUCHA_URI . \'/assets/\1\' ); ?>"',
        content
    )
    # Reemplazar href="assets/xxx"
    content = re.sub(
        r'href=["\']assets/([^"\']+)["\']',
        r'href="<?php echo esc_url( LA_OTRA_LUCHA_URI . \'/assets/\1\' ); ?>"',
        content
    )
    # Limpiar barras invertidas que python o regex hayan escapado
    content = content.replace(r"\'", "'")
    return content

# Obtener posiciones de los comentarios
matches = list(re.finditer(r'<!-- =+\s*\n\s*(SECCI[^\n]+)', html))
pos = {}
for m in matches:
    title = m.group(1)
    if 'SECCI' in title and '1:' in title: pos[1] = m.start()
    elif 'SECCI' in title and '2:' in title: pos[2] = m.start()
    elif 'SECCI' in title and '3:' in title: pos[3] = m.start()
    elif 'SECCI' in title and '4:' in title: pos[4] = m.start()
    elif 'SECCI' in title and '5:' in title: pos[5] = m.start()
    elif 'SECCI' in title and '6:' in title: pos[6] = m.start()
    elif 'SECCI' in title and '7:' in title: pos[7] = m.start()
    elif 'SECCI' in title and '8:' in title: pos[8] = m.start()
    elif 'SECCI' in title and '9:' in title: pos[9] = m.start()
    elif 'SECCI' in title and '10:' in title: pos[10] = m.start()

pos_main_end = html.find('</main>')

sections_map = [
    ('section-hero.php', 'Hero Principal', pos[1], pos[2]),
    ('section-karin.php', 'Historia de Karin Pardo', pos[2], pos[3]),
    ('section-reality.php', 'La Realidad del Cáncer de Mama', pos[3], pos[4]),
    ('section-four-fights.php', 'Las 4 Luchas y Franja de Pilares', pos[4], pos[6]), # Incluye Sección 4 + Sección 5
    ('section-patient-route.php', 'Ruta de la Paciente (8 Dimensiones)', pos[6], pos[7]),
    ('section-quote-banner.php', 'Banner Cita Observatorio', pos[7], pos[8]),
    ('section-rights.php', 'Conoce tus Derechos', pos[8], pos[9]),
    ('section-action-trio.php', 'Evidencia, Derechos y Acción', pos[9], pos_main_end),
]

for filename, title, start_idx, end_idx in sections_map:
    raw_chunk = html[start_idx:end_idx].strip()
    converted_chunk = replace_assets(raw_chunk)

    php_header = f"""<?php
/**
 * Template Part: {title}
 *
 * @package LaOtraLucha
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {{
    exit;
}}
?>
"""
    full_code = php_header + converted_chunk + '\n'
    out_path = os.path.join(parts_dir, filename)
    with open(out_path, 'w', encoding='utf-8') as out:
        out.write(full_code)
    print(f'Generado: {filename} ({len(full_code)} bytes, de {start_idx} a {end_idx})')

# Extraer Footer EXACTO
footer_start = html.find('<footer class="site-footer"')
footer_end = html.find('</footer>') + len('</footer>')
raw_footer = html[footer_start:footer_end].strip()
converted_footer = replace_assets(raw_footer)

btn_start = html.find('<button\n    type="button"\n    id="back-to-top"')
if btn_start == -1:
    btn_start = html.find('<button')
btn_end = html.find('</button>', btn_start) + len('</button>')
raw_btn = html[btn_start:btn_end].strip()

footer_php = f"""<?php
/**
 * Footer Template
 *
 * @package LaOtraLucha
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {{
    exit;
}}
?>
  </main><!-- /#contenido-principal -->

  <!-- ========================================================================
       FOOTER INSTITUCIONAL (Fiel a index.html)
       ======================================================================== -->
  {converted_footer}

  {raw_btn}

  <?php wp_footer(); ?>
</body>
</html>
"""
with open(os.path.join(theme_dir, 'footer.php'), 'w', encoding='utf-8') as out:
    out.write(footer_php)
print(f'Generado: footer.php ({len(footer_php)} bytes)')

# Extraer Header EXACTO
defs_start = html.find('<svg xmlns="http://www.w3.org/2000/svg" style="display: none;"')
defs_end = html.find('</svg>', defs_start) + len('</svg>')
raw_defs = html[defs_start:defs_end].strip()

header_start = html.find('<header class="site-header"')
header_end = html.find('</header>') + len('</header>')
raw_header = html[header_start:header_end].strip()
converted_header = replace_assets(raw_header)

header_php = f"""<?php
/**
 * Header Template
 *
 * @package LaOtraLucha
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {{
    exit;
}}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

  {raw_defs}

  <a href="#contenido-principal" class="skip-link"><?php esc_html_e( 'Saltar al contenido principal', 'la-otra-lucha' ); ?></a>

  {converted_header}

  <main id="contenido-principal" class="page-ribbons-bg">
"""
with open(os.path.join(theme_dir, 'header.php'), 'w', encoding='utf-8') as out:
    out.write(header_php)
print(f'Generado: header.php ({len(header_php)} bytes)')
