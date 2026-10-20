/**
 * Punto de entrada principal — La Otra Lucha
 * Inicializa módulos de navegación e interactividad.
 */

import { initNavigation } from './modules/navigation.js?v=6';
import { initAnimations } from './modules/animations.js?v=6';
import { initVideoModal } from './modules/modal.js?v=6';

document.addEventListener('DOMContentLoaded', () => {
  initNavigation();
  initAnimations();
  initVideoModal();
});
