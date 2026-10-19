/**
 * Módulo de Navegación:
 * - Sincronización dinámica de `--header-height` según el alto real del header fijo
 * - Menú móvil accesible (aria-expanded, cierre con Escape y al navegar)
 * - Scroll suave coherente y Scroll-spy ordenado para las 7 opciones del menú
 * - Botón flotante "Volver arriba" (#back-to-top) al bajar el scroll
 */

export function initNavigation() {
  const header = document.querySelector('.site-header');
  const toggleBtn = document.querySelector('.site-header__toggle');
  const navContainer = document.querySelector('#main-nav');
  const navLinks = Array.from(document.querySelectorAll('.site-nav__link'));
  const backToTopBtn = document.querySelector('#back-to-top');

  // 1. Sincronizar dinámicamente `--header-height` según la barra de navegación fija en desktop
  const syncHeaderHeight = () => {
    const isDesktop = window.innerWidth >= 1100;
    const offset = isDesktop && navContainer && navContainer.offsetHeight ? navContainer.offsetHeight + 12 : 0;
    document.documentElement.style.setProperty('--header-height', `${offset}px`);
  };

  syncHeaderHeight();
  window.addEventListener('resize', syncHeaderHeight, { passive: true });
  if (navContainer && 'ResizeObserver' in window) {
    const navObserver = new ResizeObserver(syncHeaderHeight);
    navObserver.observe(navContainer);
  }

  // 2. Menú móvil accesible
  const closeMenu = () => {
    if (!toggleBtn || !navContainer) return;
    toggleBtn.setAttribute('aria-expanded', 'false');
    toggleBtn.setAttribute('aria-label', 'Abrir menú de navegación');
    navContainer.classList.remove('site-nav--open');
  };

  if (toggleBtn && navContainer) {
    const toggleMenu = () => {
      const isExpanded = toggleBtn.getAttribute('aria-expanded') === 'true';
      if (isExpanded) {
        closeMenu();
      } else {
        toggleBtn.setAttribute('aria-expanded', 'true');
        toggleBtn.setAttribute('aria-label', 'Cerrar menú de navegación');
        navContainer.classList.add('site-nav--open');
      }
    };

    toggleBtn.addEventListener('click', toggleMenu);

    document.addEventListener('keydown', (event) => {
      if (event.key === 'Escape' && toggleBtn.getAttribute('aria-expanded') === 'true') {
        closeMenu();
        toggleBtn.focus();
      }
    });
  }

  // 3. Scroll suave con compensación exacta de header fijo en enlaces internos
  const anchorLinks = document.querySelectorAll(
    '.site-nav__link[href^="#"], .site-footer__nav-link[href^="#"], .btn[href^="#"], .brand-logos[href^="#"]'
  );

  anchorLinks.forEach((link) => {
    link.addEventListener('click', (event) => {
      const href = link.getAttribute('href');
      if (!href || href === '#' || link.hasAttribute('data-placeholder-link')) return;

      const targetEl = document.querySelector(href);
      if (!targetEl) return;

      event.preventDefault();

      if (window.innerWidth < 1120) {
        closeMenu();
      }

      if (href === '#inicio') {
        window.scrollTo({ top: 0, behavior: 'smooth' });
        history.replaceState(null, '', '#inicio');
        return;
      }

      const isDesktop = window.innerWidth >= 1100;
      const navOffset = isDesktop && navContainer ? navContainer.offsetHeight + 10 : 16;
      const targetTop = Math.max(
        0,
        targetEl.getBoundingClientRect().top + window.scrollY - navOffset
      );

      window.scrollTo({ top: targetTop, behavior: 'smooth' });
      history.replaceState(null, '', href);
    });
  });

  // 4. Lista ordenada de destinos del menú principal para Scroll-Spy coherente (1 → 7)
  const navTargets = navLinks
    .map((link) => {
      const href = link.getAttribute('href');
      if (!href || !href.startsWith('#')) return null;
      const element = document.querySelector(href);
      return element ? { id: href.slice(1), link, element } : null;
    })
    .filter(Boolean);

  const updateScrollState = () => {
    const scrollY = window.scrollY;

    // Mostrar/ocultar botón flotante de volver arriba
    if (backToTopBtn) {
      if (scrollY > 180) {
        backToTopBtn.classList.add('back-to-top--visible');
      } else {
        backToTopBtn.classList.remove('back-to-top--visible');
      }
    }

    if (!navTargets.length) return;

    const isDesktop = window.innerWidth >= 1100;
    const navOffset = isDesktop && navContainer ? navContainer.offsetHeight + 24 : 32;
    const probeLine = scrollY + navOffset;

    let activeItem = null;
    for (const item of navTargets) {
      const itemTop = item.element.getBoundingClientRect().top + scrollY;
      if (probeLine >= itemTop) {
        activeItem = item;
      } else {
        break;
      }
    }

    // Si el usuario llegó al final de la página, activar el último ítem del menú
    const isAtBottom =
      window.innerHeight + scrollY >= document.documentElement.scrollHeight - 24;
    if (isAtBottom && navTargets.length > 0) {
      activeItem = navTargets[navTargets.length - 1];
    }

    navLinks.forEach((link) => {
      if (activeItem && link === activeItem.link) {
        link.classList.add('site-nav__link--active');
      } else {
        link.classList.remove('site-nav__link--active');
      }
    });
  };

  let isTicking = false;
  window.addEventListener(
    'scroll',
    () => {
      if (!isTicking) {
        window.requestAnimationFrame(() => {
          updateScrollState();
          isTicking = false;
        });
        isTicking = true;
      }
    },
    { passive: true }
  );

  updateScrollState();

  // 5. Evento del botón flotante "Volver arriba"
  if (backToTopBtn) {
    backToTopBtn.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
      if (window.location.hash) {
        history.replaceState(null, '', window.location.pathname + window.location.search);
      }
    });
  }
}

