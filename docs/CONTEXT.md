# Glosario del Dominio (`CONTEXT.md`)

Vocabulario compartido del proyecto **La Otra Lucha** (mantenido según la skill `domain-modeling`).

---

## 1. La Otra Lucha
- **Qué es:** Concepto central de la campaña e investigación de *Por un Perú Sin Cáncer*. Se refiere al conjunto de obstáculos administrativos, geográficos, económicos y de suministro que enfrenta una paciente con cáncer de mama en el Perú para acceder a una atención oportuna (adicional a la lucha biológica contra la enfermedad).
- **Qué NO es:** No es el tratamiento médico en sí mismo, sino la lucha contra las barreras del sistema de salud.
- **Nombre en código:** `campaign` / `la-otra-lucha`.

## 2. Ruta de la Paciente (`Patient Route`)
- **Qué es:** El recorrido secuencial que transita una mujer desde que detecta una señal de alerta en la mama hasta la continuidad de su tratamiento oncológico. En la web se expresa en dos niveles: las **4 Luchas Macro** (Conseguir atención, Confirmar diagnóstico, Comenzar tratamiento, Continuar) y las **8 Dimensiones de Investigación** (tiempos de espera, acceso a especialistas, disponibilidad de medicamentos, interrupciones, etc.).
- **Qué NO es:** No es un protocolo clínico médico para oncólogos, sino el mapa de experiencia y tiempos reales vividos por la paciente.
- **Nombre en código:** `.four-fights` (4 etapas macro) y `.patient-route` (8 dimensiones).

## 3. Barrera de Atención (`Care Barrier`)
- **Qué es:** Cualquier demora, interrupción, falta de insumo/medicamento, dificultad geográfica/económica o falta de información que impide que la paciente avance oportunamente de una etapa a la siguiente en su Ruta de Atención.
- **Qué NO es:** No es una complicación médica inherente a la patología.
- **Nombre en código:** `barrier` / `.fights-pillars`.

## 4. Guía de Derechos (`Rights Guide`)
- **Qué es:** Herramienta informativa basada en la normativa peruana vigente y fuentes oficiales que orienta a la paciente sobre su derecho, el sustento legal, los pasos a seguir y los canales de reclamo ante 5 escenarios críticos (*Si no consigo una cita*, *Si mi diagnóstico se demora*, *Si no encuentro el medicamento indicado*, *Si mi tratamiento se interrumpe*, *Si considero que mis derechos han sido vulnerados*).
- **Qué NO es:** No constituye asesoría ni patrocinio judicial individualizado.
- **Nombre en código:** `.rights-guide` / `rights_scenarios`.

## 5. Observatorio Oncológico (`Oncology Observatory`)
- **Qué es:** Plataforma digital lanzada en enero de 2026 por *Por un Perú Sin Cáncer* que reúne, organiza y visibiliza evidencia y datos estadísticos sobre la situación del cáncer en el Perú.
- **Qué NO es:** No es esta misma landing page, sino la plataforma externa de datos a la que enlazan los CTAs de evidencia.
- **Nombre en código:** `observatory` / `.quote-banner`.

## 6. Telemamografía (`Telemammography`)
- **Qué es:** Servicio de diagnóstico por imágenes mamográficas leídas a distancia para facilitar la detección oportuna en distintas regiones del país (indicador destacado en la sección de cifras: `7,685 telemamografías procesadas`).
- **Nombre en código:** `stat-telemammography`.
