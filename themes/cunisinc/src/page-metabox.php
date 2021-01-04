<?php
/**
 * Add Page Setting Meta Box
 *
 * @package Setting
 */

/**
 * Add meta box for page setting
 *
 * @return void
 */
function page_setting_add_meta_box() {
	add_meta_box(
		'page_setting_post_options_metabox',
		'Post Options',
		'page_setting_post_options_metabox_html',
		array( 'post', 'page', 'product' ),
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes', 'page_setting_add_meta_box' );


/**
 * Render Meta Box.
 *
 * @param WP_Post $post WP param from action hook.
 * @return void
 */
function page_setting_post_options_metabox_html( $post ) {
	$sidebar_options = array(
		'no-sidebar'    => 'No Sidebar',
		'right-sidebar' => 'Right Sidebar',
		'left-sidebar'  => 'Left Sidebar',
	);

	$title_options = array(
		'no-title'         => 'No Title',
		'title'            => 'Title',
		'breadcrumb'       => 'Breadcrumb',
		'title-breadcrumb' => 'Title & Breadcrumb',
	);
	$sidebar       = get_post_meta( $post->ID, '_page_setting_sidebar_metafield', true );
	$title         = get_post_meta( $post->ID, '_page_setting_title_metafield', true );
	wp_nonce_field( 'page_setting_update_post_metabox', 'page_setting_update_post_nonce' );
	?>
  <p>
	<label for="page_setting_sidebar_metafield"><?php esc_html_e( 'Sidebar Display', 'cunis' ); ?></label>
	<br />
	<select class="widefat" name="page_setting_sidebar_metafield">
	<?php
	foreach ( $sidebar_options as $option => $key ) {
		?>
		<option value="<?php echo esc_html( $option ); ?>" <?php echo ( $option === $sidebar ) ? 'selected' : ''; ?>><?php echo esc_html( $key ); ?></option>
		<?php
	}
	?>
	</select>
  </p>
  <p>
	<label for="page_setting_title_metafield"><?php esc_html_e( 'Title Display', 'cunis' ); ?></label>
	<br />
	<select class="widefat" name="page_setting_title_metafield">
		<?php
		foreach ( $title_options as $option => $key ) {
			?>
		<option value="<?php echo esc_html( $option ); ?>" <?php echo ( $option === $title ) ? 'selected' : ''; ?>><?php echo esc_html( $key ); ?></option>
			<?php
		}
		?>
	</select>
  </p>
	<?php
}

/**
 * Save Page Settings
 *
 * @param Intger  $post_id post id.
 * @param WP_Post $post post data.
 * @return void
 */
function page_setting_save_post_metabox( $post_id, $post ) {
	$edit_cap = get_post_type_object( $post->post_type )->cap->edit_post;
	if ( ! current_user_can( $edit_cap, $post_id ) ) {
		return;
	}
	if ( ! isset( $_POST['page_setting_update_post_nonce'] ) || ! wp_verify_nonce( $_POST['page_setting_update_post_nonce'], 'page_setting_update_post_metabox' ) ) {
		return;
	}
	if ( array_key_exists( 'page_setting_sidebar_metafield', $_POST ) ) {
		update_post_meta(
			$post_id,
			'_page_setting_sidebar_metafield',
			sanitize_text_field( wp_unslash( $_POST['page_setting_sidebar_metafield'] ) )
		);
	}
	if ( array_key_exists( 'page_setting_title_metafield', $_POST ) ) {
		update_post_meta(
			$post_id,
			'_page_setting_title_metafield',
			sanitize_text_field( wp_unslash( $_POST['page_setting_title_metafield'] ) )
		);
	}
}
add_action( 'save_post', 'page_setting_save_post_metabox', 10, 2 );
