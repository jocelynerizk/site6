<?php
/**
 * Additional features to allow styling of the templates
 *
 * @package Construction Hub
 * @subpackage construction_hub
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function construction_hub_body_classes( $construction_hub_classes ) {
	// Add class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$construction_hub_classes[] = 'group-blog';
	}

	// Add class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$construction_hub_classes[] = 'hfeed';
	}

	// Add class if we're viewing the Customizer for easier styling of theme options.
	if ( is_customize_preview() ) {
		$construction_hub_classes[] = 'construction-hub-customizer';
	}

	// Add a class if there is a custom header.
	if ( has_header_image() ) {
		$construction_hub_classes[] = 'has-header-image';
	}

	// Add class if sidebar is used.
	if ( is_active_sidebar( 'sidebar-1' ) && ! is_page() ) {
		$construction_hub_classes[] = 'has-sidebar';
	}

	return $construction_hub_classes;
}
add_filter( 'body_class', 'construction_hub_body_classes' );
