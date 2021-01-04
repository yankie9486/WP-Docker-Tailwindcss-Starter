<?php
/**
 * Filters for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package cunis
 */

namespace cunis;

// Adapted from https://gist.github.com/toscho/1584783.
add_filter(
	'clean_url',
	function( $url ) {
		if ( false === strpos( $url, '.js' ) ) {
			return $url;
		}
		// Must be a ', not "!
		if ( strpos( $url, '#asyncload' ) === false ) {
			return $url;
		} else {
			return str_replace( '#asyncload', '', $url ) . "' async='async";
		}
	},
	11,
	1
);

// Remove p tags from the content.
remove_filter( 'the_content', 'wpautop' );
