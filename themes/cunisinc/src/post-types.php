<?php
/**
 * This file adds functions and actions for classes.
 *
 * @package cunis
 */

if ( ! function_exists( 'cunis_service_post_type' ) ) :

	/**
	 * FAQ Post Type
	 *
	 * @return void
	 */
	function cunis_service_post_type() {

		$labels = array(
			'name'                  => _x( 'service', 'Post Type General Name', 'cunis' ),
			'singular_name'         => _x( 'service', 'Post Type Singular Name', 'cunis' ),
			'menu_name'             => __( 'Service\'s', 'cunis' ),
			'name_admin_bar'        => __( 'Service\'s', 'cunis' ),
			'archives'              => __( 'Service\'s Archives', 'cunis' ),
			'attributes'            => __( 'Service Attributes', 'cunis' ),
			'parent_item_colon'     => __( 'Parent Service:', 'cunis' ),
			'all_items'             => __( 'All Items', 'cunis' ),
			'add_new_item'          => __( 'Add New Item', 'cunis' ),
			'add_new'               => __( 'Add New', 'cunis' ),
			'new_item'              => __( 'New Service', 'cunis' ),
			'edit_item'             => __( 'Edit Service', 'cunis' ),
			'update_item'           => __( 'Update Service', 'cunis' ),
			'view_item'             => __( 'View Service', 'cunis' ),
			'view_items'            => __( 'View Service', 'cunis' ),
			'search_items'          => __( 'Search Service', 'cunis' ),
			'not_found'             => __( 'Not found', 'cunis' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'cunis' ),
			'featured_image'        => __( 'Featured Image', 'cunis' ),
			'set_featured_image'    => __( 'Set featured image', 'cunis' ),
			'remove_featured_image' => __( 'Remove featured image', 'cunis' ),
			'use_featured_image'    => __( 'Use as featured image', 'cunis' ),
			'insert_into_item'      => __( 'Insert into Service', 'cunis' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'cunis' ),
			'items_list'            => __( 'Service list', 'cunis' ),
			'items_list_navigation' => __( 'Service list navigation', 'cunis' ),
			'filter_items_list'     => __( 'Filter Service list', 'cunis' ),
		);
		$args   = array(
			'label'                 => __( 'service', 'cunis' ),
			'description'           => __( 'Service', 'cunis' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'custom-fields','thumbnail', 'page-attributes', 'excerpt' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'          => false,
		);
		register_post_type( 'service', $args );

	}
	add_action( 'init', 'cunis_service_post_type', 0 );

endif;


/**
 * Add order column to admin listing screen for platform
 *
 * @param array $servicecolumns array of columns.
 * @return array new Order column.
 */
function cunis_add_service_column( $columns ) {
	$columns['menu_order'] = 'Order';
	return $columns;
}
add_filter( 'manage_service_posts_columns', 'cunis_add_service_column' );


/**
 * Add menu order to post column
 *
 * @param array $name order menu column.
 * @return void
 */
function cunis_show_service_order_column( $name ) {
	global $post;
	switch ( $name ) {
		case 'menu_order':
			$order = $post->menu_order;
			echo esc_html( $order );
			break;
		default:
			break;
	}
}
add_action( 'manage_service_posts_custom_column', 'cunis_show_service_order_column', 10, 2 );

/**
 * service admin sort by menu order
 *
 * @param array $columns the columnss to sort by.
 * @return array new array returned.
 */
function cunis_order_column_register_sortable( $columns ) {
	$columns['menu_order'] = 'menu_order';
	return $columns;
}

add_filter( 'manage_edit-service_sortable_columns', 'cunis_order_column_register_sortable' );


if ( ! function_exists( 'cunis_project_post_type' ) ) :

	/**
	 * FAQ Post Type
	 *
	 * @return void
	 */
	function cunis_project_post_type() {

		$labels = array(
			'name'                  => _x( 'projects', 'Post Type General Name', 'cunis' ),
			'singular_name'         => _x( 'project', 'Post Type Singular Name', 'cunis' ),
			'menu_name'             => __( 'Project\'s', 'cunis' ),
			'name_admin_bar'        => __( 'Project\'s', 'cunis' ),
			'archives'              => __( 'Project\'s Archives', 'cunis' ),
			'attributes'            => __( 'Projects Attributes', 'cunis' ),
			'parent_item_colon'     => __( 'Parent Projects:', 'cunis' ),
			'all_items'             => __( 'All Items', 'cunis' ),
			'add_new_item'          => __( 'Add New Item', 'cunis' ),
			'add_new'               => __( 'Add New', 'cunis' ),
			'new_item'              => __( 'New Project', 'cunis' ),
			'edit_item'             => __( 'Edit Project', 'cunis' ),
			'update_item'           => __( 'Update Project', 'cunis' ),
			'view_item'             => __( 'View Project', 'cunis' ),
			'view_items'            => __( 'View Project', 'cunis' ),
			'search_items'          => __( 'Search Project', 'cunis' ),
			'not_found'             => __( 'Not found', 'cunis' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'cunis' ),
			'featured_image'        => __( 'Featured Image', 'cunis' ),
			'set_featured_image'    => __( 'Set featured image', 'cunis' ),
			'remove_featured_image' => __( 'Remove featured image', 'cunis' ),
			'use_featured_image'    => __( 'Use as featured image', 'cunis' ),
			'insert_into_item'      => __( 'Insert into Project', 'cunis' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'cunis' ),
			'items_list'            => __( 'Project list', 'cunis' ),
			'items_list_navigation' => __( 'Project list navigation', 'cunis' ),
			'filter_items_list'     => __( 'Filter Project list', 'cunis' ),
		);
		$args   = array(
			'label'                 => __( 'projects', 'cunis' ),
			'description'           => __( 'projects', 'cunis' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'custom-fields','thumbnail', 'page-attributes', 'excerpt' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'          => false,
		);
		register_post_type( 'projects', $args );

	}
	add_action( 'init', 'cunis_project_post_type', 0 );

endif;


if ( ! function_exists( 'cunis_testimonial_post_type' ) ) :

	/**
	 * testimonial Post Type
	 *
	 * @return void
	 */
	function cunis_testimonial_post_type() {

		$labels = array(
			'name'                  => _x( 'testimonial', 'Post Type General Name', 'cunis' ),
			'singular_name'         => _x( 'testimonial', 'Post Type Singular Name', 'cunis' ),
			'menu_name'             => __( 'Testimonial\'s', 'cunis' ),
			'name_admin_bar'        => __( 'Testimonial\'s', 'cunis' ),
			'archives'              => __( 'Testimonial\'s Archives', 'cunis' ),
			'attributes'            => __( 'Testimonial Attributes', 'cunis' ),
			'parent_item_colon'     => __( 'Parent Testimonial:', 'cunis' ),
			'all_items'             => __( 'All Items', 'cunis' ),
			'add_new_item'          => __( 'Add New Item', 'cunis' ),
			'add_new'               => __( 'Add New', 'cunis' ),
			'new_item'              => __( 'New Testimonial', 'cunis' ),
			'edit_item'             => __( 'Edit Testimonial', 'cunis' ),
			'update_item'           => __( 'Update Testimonial', 'cunis' ),
			'view_item'             => __( 'View Testimonial', 'cunis' ),
			'view_items'            => __( 'View Testimonial', 'cunis' ),
			'search_items'          => __( 'Search Testimonial', 'cunis' ),
			'not_found'             => __( 'Not found', 'cunis' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'cunis' ),
			'featured_image'        => __( 'Featured Image', 'cunis' ),
			'set_featured_image'    => __( 'Set featured image', 'cunis' ),
			'remove_featured_image' => __( 'Remove featured image', 'cunis' ),
			'use_featured_image'    => __( 'Use as featured image', 'cunis' ),
			'insert_into_item'      => __( 'Insert into Testimonial', 'cunis' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'cunis' ),
			'items_list'            => __( 'Testimonial list', 'cunis' ),
			'items_list_navigation' => __( 'Testimonial list navigation', 'cunis' ),
			'filter_items_list'     => __( 'Filter Testimonial list', 'cunis' ),
		);
		$args   = array(
			'label'                 => __( 'testimonial', 'cunis' ),
			'description'           => __( 'frequently Asked Questions', 'cunis' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'custom-fields' ),
			'hierarchical'          => false,
			'public'                => false,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'          => false,
		);
		register_post_type( 'testimonial', $args );

	}
	// add_action( 'init', 'cunis_testimonial_post_type', 0 );

endif;


if ( ! function_exists( 'cunis_team_member_post_type' ) ) :

	/**
	 * testimonial Post Type
	 *
	 * @return void
	 */
	function cunis_team_member_post_type() {

		$labels = array(
			'name'                  => _x( 'Team Member', 'Post Type General Name', 'cunis' ),
			'singular_name'         => _x( 'team_member', 'Post Type Singular Name', 'cunis' ),
			'menu_name'             => __( 'Team Member\'s', 'cunis' ),
			'name_admin_bar'        => __( 'Team Member\'s', 'cunis' ),
			'archives'              => __( 'Team Member\'s Archives', 'cunis' ),
			'attributes'            => __( 'Team Member Attributes', 'cunis' ),
			'parent_item_colon'     => __( 'Parent team_member:', 'cunis' ),
			'all_items'             => __( 'All Team Members', 'cunis' ),
			'add_new_item'          => __( 'Add New Team Member', 'cunis' ),
			'add_new'               => __( 'Add New Team Member', 'cunis' ),
			'new_item'              => __( 'New Team Member', 'cunis' ),
			'edit_item'             => __( 'Edit Team Member', 'cunis' ),
			'update_item'           => __( 'Update Team Member', 'cunis' ),
			'view_item'             => __( 'View Team Member', 'cunis' ),
			'view_items'            => __( 'View Team Member', 'cunis' ),
			'search_items'          => __( 'Search Team Member', 'cunis' ),
			'not_found'             => __( 'Not found', 'cunis' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'cunis' ),
			'featured_image'        => __( 'Featured Image', 'cunis' ),
			'set_featured_image'    => __( 'Set featured image', 'cunis' ),
			'remove_featured_image' => __( 'Remove featured image', 'cunis' ),
			'use_featured_image'    => __( 'Use as featured image', 'cunis' ),
			'insert_into_item'      => __( 'Insert into Team Member', 'cunis' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'cunis' ),
			'items_list'            => __( 'Team Member list', 'cunis' ),
			'items_list_navigation' => __( 'Team Member list navigation', 'cunis' ),
			'filter_items_list'     => __( 'Filter Team Member list', 'cunis' ),
		);
		$args   = array(
			'label'                 => __( 'team_member', 'cunis' ),
			'description'           => __( 'Team Member', 'cunis' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'custom-fields','thumbnail', 'page-attributes' ),
			'hierarchical'          => false,
			'public'                => false,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'          => false,
			'show_admin_column' => true,
			'taxonomies'        => array('location'),
		);

		register_post_type( 'team_member', $args );

	}
	add_action( 'init', 'cunis_team_member_post_type', 0 );

endif;

function cunis_location_cat() {
	register_taxonomy('location','team_member',
			array(
				'label'        => __( 'Location', 'cunis' ),
				'public'       => true,
				'rewrite'      => false,
				'hierarchical' => true,
				'labels'  => array(
					'name'                       => _x( 'Locations', 'Locations', 'cunis' ),
					'singular_name'              => _x( 'Location', 'Location', 'cunis' ),
					'search_items'               => __( 'Search Locations', 'cunis' ),
					'popular_items'              => __( 'Popular Locations', 'cunis' ),
					'all_items'                  => __( 'All Locations', 'cunis' ),
					'parent_item'                => null,
					'parent_item_colon'          => null,
					'edit_item'                  => __( 'Edit Location', 'cunis' ),
					'update_item'                => __( 'Update Location', 'cunis' ),
					'add_new_item'               => __( 'Add New Location', 'cunis' ),
					'new_item_name'              => __( 'New Location Name', 'cunis' ),
					'separate_items_with_commas' => __( 'Separate Location with commas', 'cunis' ),
					'add_or_remove_items'        => __( 'Add or remove Locations', 'cunis' ),
					'choose_from_most_used'      => __( 'Choose from the most used Locations', 'cunis' ),
					'not_found'                  => __( 'No Locations found.', 'cunis' ),
					'menu_name'                  => __( 'Locations', 'cunis' ),
				)
			)
		);
}
add_action( 'init', 'cunis_location_cat', 0 );