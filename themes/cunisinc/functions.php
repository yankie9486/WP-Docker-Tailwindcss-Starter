<?php
/**
 * Cunis functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cunis
 */

namespace cunis;

define( 'CUNIS_VERSION', wp_get_theme()->version );
define( 'CUNIS_DIR', __DIR__ );
define( 'CUNIS_URL', get_template_directory_uri() );
define( 'CUNIS_BASE_URL', get_home_url());

require_once CUNIS_DIR . '/vendor/autoload.php';

\A7\autoload( __DIR__ . '/src' );
