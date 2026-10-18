# 10 — Manual Operativo (`RUNBOOK`)

## 1. Entornos del Proyecto

| Entorno | Host / URL | Configuración y Servicios |
|---|---|---|
| **Local (Laragon)** | `http://localhost/makeTheOtherStruggle/` | Apache/Nginx + MySQL 8.0 + PHP 8.3 |
| **Admin WordPress** | `http://localhost/makeTheOtherStruggle/wp-admin/` | Panel de control de temas, plugins y lectura |
| **Producción** | Hosting final de *Por un Perú Sin Cáncer* | WordPress 6.x gestionado con HTTPS, PHP 8.2+, WAF y Redis/Memcached |

---

## 2. Instalación y Activación del Theme

El tema reside en `wp-content/themes/la-otra-lucha/`.

### 2.1. Activación desde el Panel de WordPress
1. Ingresar a `wp-admin` > **Apariencia** > **Temas** (`wp-admin/themes.php`).
2. Localizar el tema **La Otra Lucha** (identificable por su miniatura oficial de 1200x900px con la fotografía del Hero y los pilares de campaña).
3. Hacer clic en **Activar**.

### 2.2. Comportamiento Automático de Despliegue (Self-Provisioning)
Al hacer clic en Activar, el hook `after_switch_theme` en `functions.php`:
1. Verifica si existe la página `la-otra-lucha`. Si no existe, la crea con estado `publish`.
2. Asigna automáticamente la lectura de WordPress:
   - `Ajustes` > `Lectura` > `Tu portada muestra: Una página estática`.
   - `Portada: La Otra Lucha`.
3. Refresca los permalinks (`flush_rewrite_rules()`).
4. **Resultado:** Al abrir la raíz del sitio (`http://localhost/makeTheOtherStruggle/`), la landing page One-Page está 100% operativa y renderizada de inmediato.

---

## 3. Procedimiento de Actualización del Theme (Theme Actualizable)

Cuando se requiera actualizar el código, estilos o módulos del theme:

1. **Vía Git:**
   ```bash
   git pull origin main
   ```
2. **Vía Subida de ZIP / FTP:**
   - Subir el nuevo directorio a `wp-content/themes/la-otra-lucha/`.
   - Si se usa la interfaz de WordPress ("Subir tema"), seleccionar "Reemplazar tema actual con el subido".
3. **Persistencia Garantizada:**
   - La página frontal estática en la base de datos se mantiene intacta.
   - Si se añade un nuevo template part o se editan estilos en `css/`, el cambio es inmediato.
   - Las versiones de cache en `LA_OTRA_LUCHA_VERSION` aseguran que los navegadores recarguen los nuevos estilos y scripts sin problemas de caché.

---

## 4. Gestión de Contenidos con Advanced Custom Fields (Opcional)

El theme está diseñado para funcionar con o sin ACF:
- **Sin ACF:** Muestra el contenido estático oficial de la maquetación.
- **Con ACF Pro:** 
  1. Instalar y activar **Advanced Custom Fields Pro**.
  2. Crear los grupos de campos definidos en `docs/04_DATA_MODEL.md` (`group_hero`, `group_karin`, `group_reality`, `group_four_fights`, etc.).
  3. Los template parts usan `lol_get_field('nombre_campo', 'fallback_estatico')`, tomando inmediatamente los nuevos valores ingresados en el editor sin romper la estructura.

---

## 5. Operaciones de Diagnóstico, Hardening y Mantenimiento

### 5.1. Chequeo de Integridad de Codificación UTF-8 y Cabeceras
Para verificar que los archivos de texto, manifiestos PWA, sitemaps y endpoints no tengan BOM ni caracteres corruptos:
```powershell
python scripts/check-utf8-seo.py
```

### 5.2. Hardening del Servidor Web (.htaccess en Apache)
El archivo `.htaccess` contiene directivas de endurecimiento que deben mantenerse en producción:
- `Options -Indexes`: Previene el listado público de directorios.
- `AddDefaultCharset UTF-8` y `AddCharset UTF-8`: Forzado de codificación estándar en respuestas HTTP.
- `<FilesMatch>`: Bloqueo de acceso directo a `.git`, `.env`, `wp-config.php`, `readme.html` y `license.txt`.
- `<Files "xmlrpc.php">`: Bloqueo de XML-RPC para mitigar ataques de fuerza bruta y DDoS.
- `mod_headers`: Inyección de `X-Frame-Options: SAMEORIGIN`, `X-Content-Type-Options: nosniff` y `Referrer-Policy: strict-origin-when-cross-origin`.

### 5.3. Regeneración de la Miniatura del Theme (`screenshot.png`)
Si se modifica la cabecera visual o los pilares y se desea actualizar la miniatura:
```powershell
powershell -NoProfile -ExecutionPolicy Bypass -File scripts/generate-screenshot.ps1
```

### 5.4. Sincronización de Metadatos SEO en Base de Datos (Rank Math)
Para volver a sembrar o restablecer los metadatos SEO en `wp_postmeta` y `wp_options`:
```powershell
php scripts/seed-rank-math-seo.php
```
