<?php
/**
 * Add theme setup.
 *
 * @package Setup.
 */

namespace cunis;

/**
 * Set up theme defaults and registers support for various WordPress features.
 *
 * @author Cunis Inc
 * @since 1.0.0
 */
add_action(
	'after_setup_theme',
	function () {
		load_theme_textdomain( 'cunis', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'top-nav'       => __( 'Top Nav', 'cunis' ),
				'top-nav-right' => __( 'Top Nav Right', 'cunis' ),
				'primary'       => __( 'Primary Menu', 'cunis' ),
				'footer'        => __( 'Footer Menu', 'cunis' ),
			)
		);

		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_theme_support( 'editor-styles' );

		if ( class_exists( 'WooCommerce' ) ) {
			add_theme_support( 'woocommerce' );
		}

	}
);

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
add_action(
	'after_setup_theme',
	function () {
		// This variable is intended to be overruled from themes.
		// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
		$GLOBALS['content_width'] = apply_filters( 'cunis_content_width', 640 );
	},
	0
);

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
add_action(
	'wp_head',
	function () {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}
);

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses cunis_header_style()
 */
add_action(
	'after_setup_theme',
	function () {
		add_theme_support(
			'custom-header',
			apply_filters(
				'cunis_custom_header_args',
				array(
					'default-image'          => '',
					'default-text-color'     => '000000',
					'width'                  => 400,
					'height'                 => 250,
					'flex-height'            => true,
					'wp-head-callback'       => function () {
						$header_text_color = get_header_textcolor();

						/*
						* If no custom options for text are set, let's bail.
						* get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
						*/
						if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
							return;
						}

						// If we get this far, we have custom styles. Let's do this.
						?>
			<style type="text/css">
						<?php
						// Has the text been hidden?
						if ( ! display_header_text() ) :
							?>
				.site-title,
				.site-description {
					position: absolute;
					clip: rect(1px, 1px, 1px, 1px);
				}
							<?php
							// If the user has set a custom color for the text use that.
					else :
						?>
				.site-title a,
				.site-description {
						color: #<?php echo esc_attr( $header_text_color ); ?>;
				}
				<?php endif; ?>
			</style>
						<?php
					},
				)
			)
		);
	}
);
