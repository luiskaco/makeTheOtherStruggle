/**
 * Punto de entrada principal — La Otra Lucha
 * Inicializa módulos de navegación e interactividad.
 */

import { initNavigation } from './modules/navigation.js?v=7';
import { initAnimations } from './modules/animations.js?v=7';
import { initVideoModal } from './modules/modal.js?v=7';

document.addEventListener('DOMContentLoaded', () => {
  initNavigation();
  initAnimations();
  initVideoModal();
});
