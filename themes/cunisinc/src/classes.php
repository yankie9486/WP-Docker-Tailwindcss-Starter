<?php
/**
 * This file adds functions and actions for classes.
 *
 * @package cunis
 */

namespace cunis;

add_filter(
	'body_class',
	function ( $classes ) {
		if ( is_singular( array( 'post', 'page' ) ) ) {
			$classes[] = 'singular';
		}

		if ( is_front_page() ) {
			$classes[] = 'front-page';
		}

		// Adds a class of no-sidebar when there is no sidebar present.
		if ( ! is_active_sidebar( 'sidebar-1' ) ) {
			$classes[] = 'no-sidebar';
		}

		return $classes;
	}
);
