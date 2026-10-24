/**
 * Módulo de Animaciones:
 * - Revelación progresiva y escalonada de bloques al hacer scroll (Reveal on Scroll)
 * - Conteo animado de indicadores estadísticos (GLOBOCAN, Estudio Observatorio, Karin)
 * - Microinteracciones y transiciones fluidas en tarjetas e interactivos
 * - Respeta estrictamente prefers-reduced-motion: reduce
 */

function formatStatNumber(value, useComma, decimals = 0) {
  if (decimals > 0) {
    const fixed = value.toFixed(decimals);
    return useComma ? fixed.replace('.', ',') : fixed;
  }
  const rounded = Math.round(value);
  if (!useComma) {
    return String(rounded);
  }
  return rounded.toLocaleString('en-US');
}

function animateCounter(element) {
  const target = Number(element.dataset.countTarget || 0);
  const suffix = element.dataset.countSuffix || '';
  const useComma = element.dataset.countComma === 'true';
  const decimals = Number(element.dataset.countDecimals || 0);
  const durationMs = 1400;
  const startTime = performance.now();

  const step = (now) => {
    const elapsed = now - startTime;
    const progress = Math.min(elapsed / durationMs, 1);
    // Ease-out cubic para desaceleración natural
    const eased = 1 - Math.pow(1 - progress, 3);
    const currentValue = target * eased;
    element.textContent = `${formatStatNumber(currentValue, useComma, decimals)}${suffix}`;

    if (progress < 1) {
      requestAnimationFrame(step);
    } else {
      element.textContent = `${formatStatNumber(target, useComma, decimals)}${suffix}`;
    }
  };

  requestAnimationFrame(step);
}

export function initAnimations() {
  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // Auto-activación de conteo para la estadística del 57% en la historia de Karin si está presente
  const karinStatNum = document.querySelector('.karin-stat-highlight__num');
  if (karinStatNum && !karinStatNum.dataset.countTarget) {
    karinStatNum.dataset.countTarget = '57';
    karinStatNum.dataset.countSuffix = '%';
  }

  // Grupos con retraso escalonado (stagger) entre sus ítems hijos
  const staggeredGroups = [
    // 1. Hero
    { selector: '.hero__title-line, .hero__script-wrap, .hero__actions .btn', stepMs: 90 },
    // 2. Karin Story
    { selector: '.karin-story__quote, .karin-story__subtitle, .karin-story__bio, .karin-story__cta', stepMs: 90 },
    // 3. Realidad del Cáncer
    { selector: '.cancer-reality__eyebrow, .cancer-reality__title, .cancer-reality__cta', stepMs: 90 },
    { selector: '.stats-grid .stat-card', stepMs: 110, variant: 'reveal-on-scroll--scale' },
    // 4. Las Cuatro Luchas
    { selector: '.four-fights__title, .four-fights__callout', stepMs: 110 },
    { selector: '.road-four__item', stepMs: 110 },
    { selector: '.pillars-bar__item', stepMs: 95 },
    // 5. La Ruta de la Paciente (Incluye logo del Observatorio)
    { selector: '.patient-route__logo, .patient-route__title, .patient-route__subtitle, .patient-route__header .outlined-callout', stepMs: 95 },
    { selector: '.road-eight__item', stepMs: 75 },
    // 6. Estudio del Observatorio (Resultados)
    { selector: '.patient-study__title, .patient-study__tagline, .patient-study__cta-wrap', stepMs: 95 },
    { selector: '.patient-study__stat-item', stepMs: 120, variant: 'reveal-on-scroll--scale' },
    // 7. Cita del Observatorio (Comillas, texto y botón en rosa)
    { selector: '.quote-banner .quote-showcase__mark-img, .quote-banner .quote-showcase__text, .quote-banner .btn', stepMs: 95 },
    // 8. Conoce tus Derechos
    { selector: '.rights-guide__eyebrow, .rights-guide__title', stepMs: 90 },
    { selector: '.rights-cards .rights-card', stepMs: 95, variant: 'reveal-on-scroll--scale' },
    // 9. Acción Trío
    { selector: '.action-trio .action-card', stepMs: 120, variant: 'reveal-on-scroll--scale' },
    // 10. Footer Institucional
    { selector: '.site-footer__quote-band .quote-showcase', stepMs: 0 },
    { selector: '.site-footer__brands, .site-footer__nav, .site-footer__legal, .site-footer__social', stepMs: 95 },
    // 11. Página dedicada: Historia de Karin
    { selector: '.karin-story-page__lead, .karin-milestone-card, .karin-stat-highlight, .karin-inequality-banner, .karin-petition-box, .karin-closing-callout, .karin-article__footer-nav', stepMs: 90 },
    // 12. Páginas Legales y estándar
    { selector: '.page-standard__breadcrumb, .page-article__footer-nav', stepMs: 85 },
  ];

  staggeredGroups.forEach(({ selector, stepMs, variant }) => {
    const items = document.querySelectorAll(selector);
    items.forEach((item, index) => {
      item.classList.add('reveal-on-scroll');
      if (variant) {
        item.classList.add(variant);
      }
      if (stepMs > 0) {
        item.style.setProperty('--reveal-delay', `${index * stepMs}ms`);
      }
    });
  });

  // Elementos individuales y contenedores clave
  const standaloneSelectors = [
    { selector: '.hero__media', variant: 'reveal-on-scroll--left' },
    { selector: '.hero__content', variant: 'reveal-on-scroll--right' },
    { selector: '.karin-story__media', variant: 'reveal-on-scroll--left' },
    { selector: '.road-four__graphic', variant: 'reveal-on-scroll--scale' },
    { selector: '.road-eight__graphic', variant: 'reveal-on-scroll--scale' },
    { selector: '.rights-guide__box', variant: 'reveal-on-scroll--scale' },
    { selector: '.patient-study__container', variant: 'reveal-on-scroll' },
    { selector: '.quote-banner .quote-showcase', variant: 'reveal-on-scroll' },
  ];

  standaloneSelectors.forEach(({ selector, variant }) => {
    document.querySelectorAll(selector).forEach((el) => {
      el.classList.add('reveal-on-scroll');
      if (variant) {
        el.classList.add(variant);
      }
    });
  });

  const revealElements = document.querySelectorAll('.reveal-on-scroll');
  const statCounters = document.querySelectorAll('[data-count-target]');

  if (prefersReducedMotion || !('IntersectionObserver' in window)) {
    revealElements.forEach((el) => el.classList.add('reveal-on-scroll--visible'));
    return;
  }

  const revealObserver = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting || entry.intersectionRatio > 0) {
          entry.target.classList.add('reveal-on-scroll--visible');
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.02, rootMargin: '0px 0px 50px 0px' }
  );

  revealElements.forEach((el) => revealObserver.observe(el));

  const counterObserver = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          animateCounter(entry.target);
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.15 }
  );

  statCounters.forEach((counter) => counterObserver.observe(counter));
}
