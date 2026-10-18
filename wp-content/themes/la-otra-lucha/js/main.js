/**
 * Punto de entrada principal — La Otra Lucha
 * Inicializa módulos de navegación e interactividad.
 */

import { initNavigation } from './modules/navigation.js?v=5';
import { initAnimations } from './modules/animations.js?v=5';

document.addEventListener('DOMContentLoaded', () => {
  initNavigation();
  initAnimations();
});
