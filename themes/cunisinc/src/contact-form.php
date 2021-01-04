<?php
/**
 * Add custom button to contact form 7
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cunis
 */

add_action( 'wpcf7_init', 'cunis_add_form_banner_button' );

/**
 * Add Button to to contact form init
 *
 * @return void
 */
function cunis_add_form_banner_button() {
	wpcf7_add_form_tag( 'banner_button', 'cunis_banner_button_form_tag_handler' ); // "clock" is the type of the form-tag
}

/**
 * Add Banner Button
 *
 * @param array $tag array of html elements.
 * @return html button.
 */
function cunis_banner_button_form_tag_handler( $tag ) {
	return '<button type="submit" class="flex items-center text-white border-none font-bold text-18 transition-all duration-100 hover:text-primary-100 focus:text-primary-100" >' . __( "Let's get started", 'cunis' ) . '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="fill-current ml-1"><path d="M8.122 24l-4.122-4 8-8-8-8 4.122-4 11.878 12z"/></svg></button>';
}
