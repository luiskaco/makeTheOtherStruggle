# La Otra Lucha — Theme Oficial de WordPress

> **Iniciativa nacional por la salud oncológica en el Perú**  
> Impulsada por **Por un Perú Sin Cáncer** para visibilizar las barreras en la ruta de atención médica de pacientes con cáncer de mama, el testimonio de Karin Pardo, la Guía de Derechos y el Observatorio Oncológico.

---

## 🌟 Características Principales

- **One-Page Clásico/Híbrido Modular:** Orquestado en `front-page.php` mediante 8 componentes independientes en `template-parts/section-*.php`.
- **Auto-Aprovisionamiento Integral (Self-Provisioning):** Al activar el tema (`after_switch_theme`), se crean automáticamente la página estática "La Otra Lucha" fijada como portada (`page_on_front`) y las páginas legales institucionales ("Términos y Condiciones" y "Políticas de Privacidad") fijando `wp_page_for_privacy_policy` de forma desatendida.
- **Páginas Legales y Navegación de Retorno:** Plantilla `page.php` con migas de pan y botones de retorno bidireccional, enlaces inteligentes en header/footer y textos adaptados a la Ley N° 29733 (Protección de Datos Personales de Perú) y Ley N° 29571.
- **SEO para IA y Motores de Búsqueda:** Compatibilidad con estándares `llms.txt` y `llms-full.txt`, sitemaps XML, Open Graph dinámico y suite vectorial de Favicons y PWA.
- **Theme Actualizable y Resiliente:** Preparado para recibir actualizaciones in-place sin perder configuraciones ni la portada asignada.
- **Resiliencia ACF + Fallback Dinámico:** Funciona out-of-the-box sin requerir plugins externos mediante el helper `lol_get_field()`. Si se instala **Advanced Custom Fields (ACF)**, los campos se sincronizan de inmediato.
- **Miniatura Oficial de Alta Definición:** Incluye `screenshot.png` (1200x900px, PNG 32-bit) para visualización en el gestor de temas de WordPress.
- **Jerarquía Completa de Plantillas:** Suite estándar con `page.php`, `404.php`, `single.php`, `archive.php`, `search.php` e `index.php`.
- **Arquitectura de Frontend:** CSS puro modular con variables personalizadas, BEM, `clamp()` fluido, tipografías oficiales (`Blackrush`, `Veneer Two`, `Poppins`) y JavaScript nativo en ES Modules (`type="module"`).
- **Accesibilidad y Rendimiento:** Marcado semántico HTML5, navegación por teclado con `:focus-visible`, animaciones de scroll escalonadas respetando `prefers-reduced-motion` y hardening de seguridad CMS (`cms.md`).

---

## 📁 Estructura del Repositorio

```text
makeTheOtherStruggle/
├── wp-content/
│   └── themes/
│       └── la-otra-lucha/                  # Theme oficial de WordPress (v1.1.0)
│           ├── style.css                   # Metadatos del theme
│           ├── screenshot.png              # Miniatura oficial en 1200x900px
│           ├── functions.php               # Enqueue, auto-provisión de página y helpers
│           ├── front-page.php              # Orquestador de template-parts
│           ├── page.php                    # Plantilla estándar con retorno al inicio
│           ├── 404.php                     # Error 404 accesible y empático
│           ├── single.php, archive.php     # Entradas y listados
│           ├── header.php                  # Cabecera accesible con navegación inteligente
│           ├── footer.php                  # Pie de página con enlaces legales canónicos
│           ├── template-parts/             # 8 componentes de sección PHP
│           ├── assets/                     # Fuentes, imágenes caladas y SVGs
│           ├── css/                        # Estilos modulares (variables, layout, etc.)
│           ├── js/                         # JavaScript nativo (main.js + modules)
│           └── languages/                  # Catálogo de internacionalización .pot
├── llms.txt, llms-full.txt                 # SEO e información para Inteligencia Artificial
├── docs/                                   # Documentación estándar completa (01 a 10)
│   ├── 01_PROJECT_PRD.md                   # Requisitos de producto (RF/RNF)
│   ├── 02_SDD.md                           # Diseño del sistema y diagramas
│   ├── 03_SYSTEM_SPEC.md                   # Especificaciones técnicas y hooks
│   ├── 04_DATA_MODEL.md                    # Mapeo de campos ACF y fallbacks
│   ├── 05_ARCHITECTURE.md                  # Arquitectura del theme y ciclo de vida
│   ├── 06_TASKS.md                         # Backlog activo y estado de traspaso
│   ├── 07_DECISIONS.md                     # Registro de decisiones arquitectónicas (ADRs)
│   ├── 08_CHANGELOG.md                     # Historial de versiones (Keep a Changelog)
│   ├── 09_TESTING.md                       # Matriz de verificación y trazabilidad
│   ├── 10_RUNBOOK.md                       # Manual de despliegue y actualización
│   └── CONTEXT.md                          # Glosario del dominio oncológico
├── scripts/                                # Scripts de utilidad y generación
├── .agents/                                # Reglas, convenciones y skills de IA
└── AGENTS.md                               # Memoria del proyecto para agentes
```

---

## 🚀 Instalación y Puesta en Marcha

### 1. Entorno Local (Laragon / Apache / Nginx)
1. Clonar el repositorio dentro del directorio web de Laragon (`www/makeTheOtherStruggle`):
   ```bash
   git clone https://github.com/luiskaco/makeTheOtherStruggle.git
   ```
2. Instalar WordPress si no está instalado previamente.
3. Ingresar al panel de administración: `http://localhost/makeTheOtherStruggle/wp-admin/`.

### 2. Activación del Theme
1. Ir a **Apariencia** > **Temas** (`wp-admin/themes.php`).
2. Localizar **La Otra Lucha** y hacer clic en **Activar**.
3. El tema configurará automáticamente la página frontal estática y la web quedará visible de inmediato en `http://localhost/makeTheOtherStruggle/`.

---

## 🛠️ Requisitos del Sistema

- **WordPress:** 6.0 o superior (probado hasta 6.7).
- **PHP:** 8.0, 8.1, 8.2 o 8.3+.
- **Servidor:** Apache con `mod_rewrite` o Nginx.
- **Plugins recomendados (opcionales):** Advanced Custom Fields PRO (para edición de copys desde el panel).

---

## 📄 Licencia

Desarrollado para la campaña **La Otra Lucha** — *Por un Perú Sin Cáncer*. Todos los derechos reservados.
