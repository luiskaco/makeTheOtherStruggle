# Instalación

Este ZIP fue generado por AI Rules Hub y es autocontenido: todo lo que hay acá adentro es para un solo agente. Cada sección de abajo corresponde a una carpeta del ZIP.

## Antigravity (Gemini)

**Paso 1 — Global (`~/.gemini/`)**

macOS / Linux:
```bash
mkdir -p ~/.gemini/antigravity/global_workflows
cp global/GEMINI.md ~/.gemini/GEMINI.md
cp global/antigravity/global_workflows/bug-fix.md global/antigravity/global_workflows/deploy-checklist.md global/antigravity/global_workflows/grill.md global/antigravity/global_workflows/new-feature.md global/antigravity/global_workflows/security-audit.md global/antigravity/global_workflows/session-close.md global/antigravity/global_workflows/tools-reference.md ~/.gemini/antigravity/global_workflows/
```

Windows (PowerShell):
```powershell
New-Item -ItemType Directory -Force -Path "$env:USERPROFILE\.gemini\antigravity\global_workflows"
Copy-Item "global/GEMINI.md" "$env:USERPROFILE\.gemini\GEMINI.md"
Copy-Item "global/antigravity/global_workflows/bug-fix.md","global/antigravity/global_workflows/deploy-checklist.md","global/antigravity/global_workflows/grill.md","global/antigravity/global_workflows/new-feature.md","global/antigravity/global_workflows/security-audit.md","global/antigravity/global_workflows/session-close.md","global/antigravity/global_workflows/tools-reference.md" "$env:USERPROFILE\.gemini\antigravity\global_workflows\"
```

**Paso 2 — Workspace (raíz del proyecto)**

```bash
cp AGENTS.md /ruta/a/tu-proyecto/
cp -r .agents/. /ruta/a/tu-proyecto/.agents/
```

`AGENTS.md` es el estándar abierto que leen Codex, Cursor, Copilot y el propio Antigravity: si otra IA continúa el proyecto, ahí encuentra las reglas y el mapa. Completá su sección **Proyecto** al arrancar.
