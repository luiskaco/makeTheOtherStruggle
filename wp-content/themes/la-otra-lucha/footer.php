<?php
/**
 * Footer Template
 *
 * @package LaOtraLucha
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
  </main><!-- /#contenido-principal -->

  <!-- ========================================================================
       FOOTER INSTITUCIONAL (Fiel a index.html)
       ======================================================================== -->
  <footer class="site-footer" data-wp-part="footer">
    <div class="site-footer__quote-band">
      <div class="container quote-showcase">
        <div class="quote-showcase__row">
          <img
            src="<?php echo esc_url( LA_OTRA_LUCHA_URI . '/assets/svg/quote-open.svg' ); ?>"
            alt=""
            class="quote-showcase__mark-img"
            width="95"
            height="91"
            aria-hidden="true"
          />

          <p class="quote-showcase__text quote-showcase__text--bold" data-acf-field="footer_closing_quote">
            EL CÁNCER YA ES UNA LUCHA.<br />
            LA DESIGUALDAD NO DEBERÍA SER OTRA.
          </p>

          <img
            src="<?php echo esc_url( LA_OTRA_LUCHA_URI . '/assets/svg/quote-close.svg' ); ?>"
            alt=""
            class="quote-showcase__mark-img"
            width="95"
            height="91"
            aria-hidden="true"
          />
        </div>
      </div>
    </div>

<?php
$is_front          = is_front_page();
$home_url          = home_url( '/' );
$logo_footer_href  = $is_front ? '#inicio' : esc_url( $home_url );
$nav_footer_prefix = $is_front ? '' : esc_url( $home_url );
?>
    <div class="container site-footer__main">
      <!-- Columna 1: Logos Institucionales en blanco (Recurso 15.svg + Recurso 14.svg) -->
      <div class="site-footer__brands">
        <a href="<?php echo $logo_footer_href; ?>" class="brand-logos" aria-label="Por un Perú Sin Cáncer — La Otra Lucha, volver arriba">
          <img
            src="<?php echo esc_url( LA_OTRA_LUCHA_URI . '/assets/svg/logo-pupsc-white.svg' ); ?>"
            alt="Por un Perú Sin Cáncer"
            class="brand-logos__pupsc"
            width="185"
            height="64"
          />
          <img
            src="<?php echo esc_url( LA_OTRA_LUCHA_URI . '/assets/svg/logo-otra-lucha-white.svg' ); ?>"
            alt="La Otra Lucha"
            class="brand-logos__lucha"
            width="140"
            height="96"
          />
        </a>
      </div>

      <!-- Columna 2: Mapa de Secciones -->
      <nav class="site-footer__nav" aria-label="Enlaces de secciones en el pie de página">
        <ul class="site-footer__nav-list">
          <li><a href="<?php echo esc_url( $nav_footer_prefix . '#historia-karin' ); ?>" class="site-footer__nav-link">La historia de <strong>KARIN PARDO</strong></a></li>
          <li><a href="<?php echo esc_url( $nav_footer_prefix . '#realidad-cancer' ); ?>" class="site-footer__nav-link">La realidad del cáncer de mama</a></li>
          <li><a href="<?php echo esc_url( $nav_footer_prefix . '#las-cuatro-luchas' ); ?>" class="site-footer__nav-link">La ruta de la paciente</a></li>
          <li><a href="<?php echo esc_url( $nav_footer_prefix . '#la-investigacion' ); ?>" class="site-footer__nav-link">La investigación</a></li>
          <li><a href="<?php echo esc_url( $nav_footer_prefix . '#conoce-tus-derechos' ); ?>" class="site-footer__nav-link">Conoce tus derechos</a></li>
          <li><a href="<?php echo esc_url( $nav_footer_prefix . '#evidencia-a-la-accion' ); ?>" class="site-footer__nav-link">De la evidencia a la acción</a></li>
          <li><a href="<?php echo esc_url( $nav_footer_prefix . '#acompanamiento' ); ?>" class="site-footer__nav-link">Acompañamiento y bienestar</a></li>
        </ul>
      </nav>

      <!-- Columna 3: Enlaces Legales y Contacto (con línea divisoria derecha) -->
      <ul class="site-footer__legal" aria-label="Enlaces legales y de contacto">
        <li class="site-footer__legal-item">
          <a href="<?php echo esc_url( home_url( '/terminos-y-condiciones/' ) ); ?>" class="site-footer__nav-link">Términos y<br />condiciones</a>
        </li>
        <li class="site-footer__legal-item">
          <a href="<?php echo esc_url( home_url( '/politicas-de-privacidad/' ) ); ?>" class="site-footer__nav-link">Políticas de<br />privacidad</a>
        </li>
        <li class="site-footer__legal-item">
          <a href="mailto:contacto@porunperusincancer.com" class="site-footer__nav-link">Contacto</a>
        </li>
      </ul>

      <!-- Columna 4: Redes Sociales Oficiales (Recurso 18, 17, 16) -->
      <div class="site-footer__social">
        <p class="site-footer__social-title">Síguenos</p>
        <ul class="site-footer__social-list">
          <li>
            <a
              href="https://www.facebook.com/PorUnPeruSinCancer"
              target="_blank"
              rel="noopener noreferrer"
              class="site-footer__social-link"
              aria-label="Síguenos en Facebook"
            >
              <img src="<?php echo esc_url( LA_OTRA_LUCHA_URI . '/assets/svg/social-facebook.svg' ); ?>" alt="" class="site-footer__social-icon" width="52" height="52" aria-hidden="true" />
            </a>
          </li>
          <li>
            <a
              href="https://www.instagram.com/porunperusincancer"
              target="_blank"
              rel="noopener noreferrer"
              class="site-footer__social-link"
              aria-label="Síguenos en Instagram"
            >
              <img src="<?php echo esc_url( LA_OTRA_LUCHA_URI . '/assets/svg/social-instagram.svg' ); ?>" alt="" class="site-footer__social-icon" width="52" height="52" aria-hidden="true" />
            </a>
          </li>
          <li>
            <a
              href="https://www.linkedin.com/company/por-un-peru-sin-cancer"
              target="_blank"
              rel="noopener noreferrer"
              class="site-footer__social-link"
              aria-label="Síguenos en LinkedIn"
            >
              <img src="<?php echo esc_url( LA_OTRA_LUCHA_URI . '/assets/svg/social-linkedin.svg' ); ?>" alt="" class="site-footer__social-icon" width="52" height="52" aria-hidden="true" />
            </a>
          </li>
        </ul>
      </div>
    </div>
  </footer>

  <button
    type="button"
    id="back-to-top"
    class="back-to-top"
    aria-label="Volver al inicio de la página"
    title="Subir al inicio"
  >
    <svg class="back-to-top__icon" viewBox="0 0 24 24" width="24" height="24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round">
      <path d="M12 19V5" />
      <path d="M5 12l7-7 7 7" />
    </svg>
    <span class="back-to-top__label">SUBIR</span>
  </button>

  <?php wp_footer(); ?>
</body>
</html>
