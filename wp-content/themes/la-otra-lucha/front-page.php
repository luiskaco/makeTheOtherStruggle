<?php
/**
 * Front Page Template (One-Page)
 *
 * @package LaOtraLucha
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

// Secciones modulares de La Otra Lucha
get_template_part( 'template-parts/section', 'hero' );
get_template_part( 'template-parts/section', 'karin' );
get_template_part( 'template-parts/section', 'reality' );
get_template_part( 'template-parts/section', 'four-fights' );
get_template_part( 'template-parts/section', 'patient-route' );
get_template_part( 'template-parts/section', 'quote-banner' );
get_template_part( 'template-parts/section', 'patient-study' );
get_template_part( 'template-parts/section', 'rights' );
get_template_part( 'template-parts/section', 'action-trio' );

get_footer();
