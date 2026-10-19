import os
import glob
import urllib.request
import urllib.error

seo_files = [
    'llms.txt',
    'llms-full.txt',
    'robots.txt',
    'humans.txt',
    'site.webmanifest',
    'manifest.json',
    'browserconfig.xml',
    '.well-known/security.txt',
    'wp-content/themes/la-otra-lucha/header.php'
]

# Tokens comunes de doble codificación UTF-8 (mojibake)
mojibake_tokens = ['\xc3\xa1', '\xc3\xa9', '\xc3\xad', '\xc3\xb3', '\xc3\xba', '\xc3\xb1']
# Si se leyó como latin1 e interpretó como utf-8:
# Ejemplos: "Ã¡", "Ã©", "Ã­", "Ã³", "Ãº", "Ã±", "Ã", "Ã‰", "Ã", "Ã“", "Ãš", "Ã‘"
mojibake_strings = ['Ã¡', 'Ã©', 'Ã­', 'Ã³', 'Ãº', 'Ã±', 'Ã‰', 'Ã“', 'Ãš', 'Ã‘', 'â€™', 'â€œ', 'â€\x9d', 'â€”', 'â€“']

print("=== 1. VERIFICACIÓN DE ARCHIVOS EN DISCO ===")
for file_path in seo_files:
    if not os.path.exists(file_path):
        print(f"[MISSING] {file_path}")
        continue
    with open(file_path, 'rb') as f:
        raw = f.read()

    has_bom = raw.startswith(b'\xef\xbb\xbf')
    try:
        decoded = raw.decode('utf-8')
        is_utf8 = True
    except UnicodeDecodeError as e:
        is_utf8 = False
        decoded = raw.decode('latin1')

    found_mojibake = [s for s in mojibake_strings if s in decoded]

    # Contar caracteres españoles representativos
    spanish_chars = [c for c in decoded if c in 'áéíóúñÁÉÍÓÚÑ¿¡']

    print(f"File: {file_path}")
    print(f"  Tamaño: {len(raw)} bytes")
    print(f"  UTF-8 válido: {is_utf8}")
    print(f"  BOM UTF-8: {'SÍ (atención)' if has_bom else 'NO (limpio)'}")
    print(f"  Caracteres acentuados válidos: {len(spanish_chars)} detectados")
    print(f"  Mojibake / Corrupción detectada: {found_mojibake if found_mojibake else 'Ninguna (Limpio)'}")

print("\n=== 2. VERIFICACIÓN DE ENDPOINTS HTTP Y CABECERAS ===")
endpoints = [
    'http://localhost/makeTheOtherStruggle/',
    'http://localhost/makeTheOtherStruggle/llms.txt',
    'http://localhost/makeTheOtherStruggle/llms-full.txt',
    'http://localhost/makeTheOtherStruggle/robots.txt',
    'http://localhost/makeTheOtherStruggle/humans.txt',
    'http://localhost/makeTheOtherStruggle/site.webmanifest',
    'http://localhost/makeTheOtherStruggle/sitemap.xml',
    'http://localhost/makeTheOtherStruggle/page-sitemap.xml',
]

for url in endpoints:
    try:
        req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})
        with urllib.request.urlopen(req) as resp:
            content_type = resp.headers.get('Content-Type', '')
            raw_body = resp.read()
            is_utf8 = True
            try:
                body_decoded = raw_body.decode('utf-8')
            except UnicodeDecodeError:
                is_utf8 = False
                body_decoded = raw_body.decode('latin1')
            
            bom_http = raw_body.startswith(b'\xef\xbb\xbf')
            mojibake = [s for s in mojibake_strings if s in body_decoded]
            print(f"Endpoint: {url}")
            print(f"  Status: {resp.status} | Content-Type: {content_type}")
            print(f"  UTF-8: {is_utf8} | BOM: {bom_http} | Mojibake: {mojibake if mojibake else 'Ninguna'}")
    except Exception as e:
        print(f"Endpoint: {url} -> ERROR: {e}")

print("\n=== 3. VERIFICACIÓN DE SEO EN BASE DE DATOS MYSQL (utf8mb4) ===")
try:
    import subprocess
    php_code = """
    require_once 'wp-load.php';
    global $wpdb;
    $meta = $wpdb->get_results("SELECT meta_key, meta_value FROM wp_postmeta WHERE post_id = 7 AND meta_key LIKE 'rank_math%'");
    foreach ($meta as $m) {
        $val = $m->meta_value;
        $is_utf8 = mb_check_encoding($val, 'UTF-8');
        echo $m->meta_key . ' => [UTF-8: ' . ($is_utf8 ? 'OK' : 'FAIL') . '] ' . mb_substr($val, 0, 70) . PHP_EOL;
    }
    """
    php_path = r'D:\AppsInstaller\laragon\bin\php\php-8.3.33-Win32-vs16-x64\php.exe'
    php_ini = r'D:\AppsInstaller\laragon\bin\php\php-8.3.33-Win32-vs16-x64\php.ini'
    res = subprocess.run([php_path, '-c', php_ini, '-r', php_code], capture_output=True, text=True, cwd=r'D:\AppsInstaller\laragon\www\makeTheOtherStruggle')
    if res.stdout:
        print(res.stdout.strip())
    if res.stderr:
        print("STDERR:", res.stderr.strip())
except Exception as e:
    print(f"Error comprobando BD: {e}")

