<?php
/**
 * Widgets for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package cunis
 */

namespace cunis;

/**
 * Register widget area.
 */
add_action(
	'widgets_init',
	function () {
		register_sidebar(
			array(
				'name'          => esc_html( 'Sidebar' ),
				'id'            => 'sidebar',
				'description'   => '',
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
	}
);
/**
 * Register widget area.
 */
add_action(
	'widgets_init',
	function () {
		register_sidebar(
			array(
				'name'          => esc_html( 'Blog Sidebar' ),
				'id'            => 'sidebar_blog',
				'description'   => '',
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
	}
);


/**
 * Call To Action.
 */
add_action(
	'widgets_init',
	function () {
		register_sidebar(
			array(
				'name'          => esc_html( 'Above Footer' ),
				'id'            => 'above_footer',
				'description'   => '',
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
	}
);



/**
 * Breadcrumb Widgets.
 */
add_action(
	'widgets_init',
	function () {
		register_sidebar(
			array(
				'name'          => esc_html( 'Breadcrumb' ),
				'id'            => 'breadcrumb',
				'description'   => '',
				'before_widget' => '<section id="%1$s" class="widget %2$s flex flex-col max-w-screen w-full">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
	}
);

/**
 * Register Footer 1 widget area.
 */
add_action(
	'widgets_init',
	function () {
		register_sidebar(
			array(
				'name'          => esc_html( 'Footer 1' ),
				'id'            => 'footer_1',
				'description'   => '',
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="text-24 font-bold text-gray-400 mt-0 text-center md:text-left md:text-20 lg:text-24">',
				'after_title'   => '</h3>',
			)
		);
	}
);
/**
 * Register Footer 2 widget area.
 */
add_action(
	'widgets_init',
	function () {
		register_sidebar(
			array(
				'name'          => esc_html( 'Footer 2' ),
				'id'            => 'footer_2',
				'description'   => '',
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="text-24 font-bold text-gray-400 mt-0 text-center md:text-left md:text-20 lg:text-24">',
				'after_title'   => '</h3>',
			)
		);
	}
);
/**
 * Register Footer 3 widget area.
 */
add_action(
	'widgets_init',
	function () {
		register_sidebar(
			array(
				'name'          => esc_html( 'Footer 3' ),
				'id'            => 'footer_3',
				'description'   => '',
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="text-24 font-bold text-gray-400 mt-0 text-center md:text-left md:text-20 lg:text-24">',
				'after_title'   => '</h3>',
			)
		);
	}
);
/**
 * Register Footer 4 widget area.
 */
// add_action(
// 	'widgets_init',
// 	function () {
// 		register_sidebar(
// 			array(
// 				'name'          => esc_html( 'Footer 4' ),
// 				'id'            => 'footer_4',
// 				'description'   => '',
// 				'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 				'after_widget'  => '</section>',
// 				'before_title'  => '<h3 class="widget-title">',
// 				'after_title'   => '</h3><div class="widget-title-hr"></div>',
// 			)
// 		);
// 	}
// );
