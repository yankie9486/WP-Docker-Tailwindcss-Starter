<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package cunis
 */

namespace cunis;

/**
 * Enqueue scripts and styles
 */
add_action(
    'wp_enqueue_scripts',
    function () {
        $min_ext = (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) ? '' : '.min';


        // JS.
        wp_enqueue_script(
            'cunis_js',
            CUNIS_URL . "/assets/js/bundle{$min_ext}.js",
            array(),
            CUNIS_VERSION,
            true
        );

        // if ( is_front_page() ) {
        // 	wp_enqueue_script(
        // 		'glide_js',
        // 		CUNIS_URL . '/node_modules/@glidejs/glide/dist/glide.min.js',
        // 		array(),
        // 		CUNIS_VERSION,
        // 		true
        // 	);

        // 	wp_enqueue_script(
        // 		'slider_js',
        // 		CUNIS_URL . "/dist/js/slider{$min_ext}.js",
        // 		array('glide_js'),
        // 		CUNIS_VERSION,
        // 		true
        // 	);

        // 	wp_enqueue_style(
        // 		'glidejs_css',
        // 		CUNIS_URL . '/node_modules/@glidejs/glide/dist/css/glide.core.min.css',
        // 		array(),
        // 		CUNIS_VERSION,
        // 		''
        // 	);
        // }



        wp_enqueue_script(
            'cunis-skip-link-focus-fix',
            get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js',
            array(),
            '20151215',
            true
        );

        wp_script_add_data('cunis-skip-link-focus-fix', 'conditional', 'IE');

        // CSS.
        wp_enqueue_style(
            'cunis',
            CUNIS_URL . "/assets/css/bundle{$min_ext}.css",
            array(),
            CUNIS_VERSION,
            ''
        );
        // CSS.
        wp_enqueue_style(
            'google-fonts',
            "https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap",
            array(),
            CUNIS_VERSION,
            ''
        );

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }

        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
    }
);

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
