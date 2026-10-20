/**
 * Módulo de Modal de Video Accesible — La Otra Lucha
 * Conforme a WAI-ARIA (role="dialog", focus trap, Escape, scroll lock).
 */

export function initVideoModal() {
  const modal = document.getElementById('video-modal');
  if (!modal) return;

  const iframe = document.getElementById('modal-video-iframe');
  const triggers = document.querySelectorAll('[data-video-modal-trigger]');
  const closeElements = modal.querySelectorAll('[data-modal-close]');
  let lastActiveElement = null;

  function openModal(videoUrl) {
    lastActiveElement = document.activeElement;

    if (iframe && videoUrl) {
      // Garantizar autoplay seguro en iframe
      const parsedUrl = new URL(videoUrl, window.location.href);
      parsedUrl.searchParams.set('autoplay', '1');
      parsedUrl.searchParams.set('rel', '0');
      iframe.src = parsedUrl.toString();
    }

    modal.classList.add('is-open');
    modal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';

    // Foco en el botón de cerrar
    const closeBtn = modal.querySelector('.modal__close');
    if (closeBtn) {
      setTimeout(() => closeBtn.focus(), 50);
    }

    document.addEventListener('keydown', handleKeyDown);
  }

  function closeModal() {
    modal.classList.remove('is-open');
    modal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';

    // Detener la reproducción limpiando src del iframe
    if (iframe) {
      iframe.src = 'about:blank';
    }

    document.removeEventListener('keydown', handleKeyDown);

    // Devolver foco al elemento detonador
    if (lastActiveElement && typeof lastActiveElement.focus === 'function') {
      lastActiveElement.focus();
    }
  }

  function handleKeyDown(event) {
    if (event.key === 'Escape') {
      closeModal();
      return;
    }

    // Focus trap dentro del modal
    if (event.key === 'Tab') {
      const focusableElements = modal.querySelectorAll(
        'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"]), iframe'
      );
      if (focusableElements.length === 0) return;

      const firstElement = focusableElements[0];
      const lastElement = focusableElements[focusableElements.length - 1];

      if (event.shiftKey) {
        if (document.activeElement === firstElement) {
          event.preventDefault();
          lastElement.focus();
        }
      } else {
        if (document.activeElement === lastElement) {
          event.preventDefault();
          firstElement.focus();
        }
      }
    }
  }

  // Event Listeners para detonadores
  triggers.forEach((trigger) => {
    trigger.addEventListener('click', (e) => {
      e.preventDefault();
      const videoUrl = trigger.getAttribute('data-video-url') || iframe?.getAttribute('data-src');
      openModal(videoUrl);
    });
  });

  // Event Listeners para cerrar
  closeElements.forEach((el) => {
    el.addEventListener('click', (e) => {
      e.preventDefault();
      closeModal();
    });
  });
}
