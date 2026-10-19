import glob
import re

source_html = r'D:\LabIA\makeOtraLucha\index.html'

with open(source_html, 'r', encoding='utf-8') as f:
    orig = f.read()

# Ver todos los comentarios de sección en index.html
comments = re.findall(r'<!-- =+\s*(SECCI[^\n]+)\s*=+', orig)
print("Comentarios en index.html:")
for c in comments:
    print(" -", c)

print("\nBuscando 'assets/' sin PHP en template-parts y header/footer:")
php_files = glob.glob(r'wp-content/themes/la-otra-lucha/**/*.php', recursive=True)
for f in php_files:
    with open(f, 'r', encoding='utf-8') as fp:
        c = fp.read()
    raw_assets = re.findall(r'(\b(?:src|href|srcset|data-[a-z\-]+)=["\']assets/[^"\']+["\'])', c)
    if raw_assets:
        print(f"\n{f}:")
        for a in raw_assets:
            print("   ->", a)
