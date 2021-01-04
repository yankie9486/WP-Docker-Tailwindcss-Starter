<?php

if ( class_exists( 'WooCommerce' ) ) {


	/**
	 * Add checkbox field to the checkout
	 */
	add_action( 'woocommerce_before_order_notes', 'cunis_checkout_field' );

	function cunis_checkout_field( $checkout ) {

		echo '<div class="flex flex-wrap"><h3>' . __( 'CD Information: ' ) . '</h3>';

		woocommerce_form_field(
			'dob',
			array(
				'label'       => __( 'Date of Birth', 'woocommerce' ), // Add custom field label
				'placeholder' => _x( 'Date of Birth', 'placeholder', 'woocommerce' ), // Add custom field placeholder
				'required'    => true, // if field is required or not
				'class'       => array( 'w-full' ),
				'clear'       => false, // add clear or not
				'type'        => 'date', // add field type
			),
			$checkout->get_value( 'dob_checkbox' )
		);

		echo '<h4 class="w-full text-base font-bold font-sans">' . __( 'Select service image you need', 'woocommerce' ) . '</h4>';

		woocommerce_form_field(
			'mri_checkbox',
			array(
				'label'       => esc_html__( 'MRI', 'woocommerce' ),
				'placeholder' => 'MRI Service Image',
				'type'        => 'checkbox', // add field type
			),
			$checkout->get_value( 'mri_checkbox' )
		);

		woocommerce_form_field(
			'ct_checkbox',
			array(
				'label'       => esc_html__( 'CT', 'woocommerce' ),
				'placeholder' => 'CT Service Image',
				'type'        => 'checkbox', // add field type
			),
			$checkout->get_value( 'ct_checkbox' )
		);

		woocommerce_form_field(
			'mammography_checkbox',
			array(
				'label'       => esc_html__( 'Mammography', 'woocommerce' ),
				'placeholder' => 'Mammography Service Image',
				'type'        => 'checkbox', // add field type
			),
			$checkout->get_value( 'mammography_checkbox' )
		);

		woocommerce_form_field(
			'breast_biopsy_checkbox',
			array(
				'label'       => esc_html__( 'Breast Biopsy', 'woocommerce' ),
				'placeholder' => 'Breast Biopsy Service Image',
				'type'        => 'checkbox', // add field type
			),
			$checkout->get_value( 'breast_biopsy_checkbox' )
		);

		woocommerce_form_field(
			'ultrasonography_checkbox',
			array(
				'label'       => esc_html__( 'Ultrasonography', 'woocommerce' ),
				'placeholder' => 'Ultrasonography Service Image',
				'type'        => 'checkbox', // add field type
			),
			$checkout->get_value( 'ultrasonography_checkbox' )
		);

		woocommerce_form_field(
			'echocardiography_checkbox',
			array(
				'label'       => esc_html__( 'Echocardiography', 'woocommerce' ),
				'placeholder' => 'Echocardiography Service Image',
				'type'        => 'checkbox', // add field type
			),
			$checkout->get_value( 'echocardiography_checkbox' )
		);

		woocommerce_form_field(
			'xray_checkbox',
			array(
				'label'       => esc_html__( 'X-Ray', 'woocommerce' ),
				'placeholder' => 'X-Ray Service Image',
				'type'        => 'checkbox', // add field type
			),
			$checkout->get_value( 'xray_checkbox' )
		);

		woocommerce_form_field(
			'bone_density_checkbox',
			array(
				'label'       => esc_html__( 'Bone Density', 'woocommerce' ),
				'placeholder' => 'Bone Density Service Image',
				'type'        => 'checkbox', // add field type
			),
			$checkout->get_value( 'bone_density_checkbox' )
		);

		woocommerce_form_field(
			'nuclear_medicine_checkbox',
			array(
				'label'       => esc_html__( 'Nuclear Medicine', 'woocommerce' ),
				'placeholder' => 'Nuclear Medicine Service Image',
				'type'        => 'checkbox', // add field type
			),
			$checkout->get_value( 'nuclear_medicine_checkbox' )
		);

		echo '</div>';
	}

	add_filter( 'woocommerce_form_field', 'cunis_remove_checkout_optional_fields_label', 10, 4 );
	function cunis_remove_checkout_optional_fields_label( $field, $key, $args, $value ) {
		// Only on checkout page
		if ( is_checkout() && ! is_wc_endpoint_url() ) {
			$optional = '&nbsp;<span class="optional">(' . esc_html__( 'optional', 'woocommerce' ) . ')</span>';
			$field    = str_replace( $optional, '', $field );
		}
		return $field;
	}


	/**
	 * Process the checkout
	 */
	add_action( 'woocommerce_checkout_process', 'cunis_checkout_field_process' );
    /**
     * Vailds checkbox and dob
     *
     * @return void
     */
	function cunis_checkout_field_process() {
		global $woocommerce;
		$error = true;

		if ( isset( $_POST['nuclear_medicine_checkbox'] ) ) {
			$error = false;
		}

		if ( isset( $_POST['bone_density_checkbox'] ) ) {
			$error = false;
		}

		if ( isset( $_POST['xray_checkbox'] ) ) {
			$error = false;
		}

		if ( isset( $_POST['echocardiography_checkbox'] ) ) {
			$error = false;
		}

		if ( isset( $_POST['ultrasonography_checkbox'] ) ) {
			$error = false;
		}

		if ( isset( $_POST['breast_biopsy_checkbox'] ) ) {
			$error = false;
		}

		if ( isset( $_POST['mammography_checkbox'] ) ) {
			$error = false;
		}

		if ( isset( $_POST['ct_checkbox'] ) ) {
			$error = false;
		}

		if ( isset( $_POST['mri_checkbox'] ) ) {
			$error = false;
		}

		if ( $error ) {
			wc_add_notice( __( 'Please check one of the service image checkbox.', 'woocommerce' ), 'error' );
		}
	}


	/**
	 * Update the order meta with field value
	 */
	add_action( 'woocommerce_checkout_update_order_meta', 'cunis_checkout_field_update_order_meta' );

	function cunis_checkout_field_update_order_meta( $order_id ) {

		if ( isset( $_POST['nuclear_medicine_checkbox'] ) ) {
			update_post_meta( $order_id, 'nuclear_medicine_checkbox', esc_attr( $_POST['nuclear_medicine_checkbox'] ) );
		}

		if ( isset( $_POST['bone_density_checkbox'] ) ) {
			update_post_meta( $order_id, 'bone_density_checkbox', esc_attr( $_POST['bone_density_checkbox'] ) );
		}

		if ( isset( $_POST['xray_checkbox'] ) ) {
			update_post_meta( $order_id, 'xray_checkbox', esc_attr( $_POST['xray_checkbox'] ) );
		}

		if ( isset( $_POST['echocardiography_checkbox'] ) ) {
			update_post_meta( $order_id, 'echocardiography_checkbox', esc_attr( $_POST['echocardiography_checkbox'] ) );
		}

		if ( isset( $_POST['ultrasonography_checkbox'] ) ) {
			update_post_meta( $order_id, 'ultrasonography_checkbox', esc_attr( $_POST['ultrasonography_checkbox'] ) );
		}

		if ( isset( $_POST['breast_biopsy_checkbox'] ) ) {
			update_post_meta( $order_id, 'breast_biopsy_checkbox', esc_attr( $_POST['breast_biopsy_checkbox'] ) );
		}

		if ( isset( $_POST['mammography_checkbox'] ) ) {
			update_post_meta( $order_id, 'mammography_checkbox', esc_attr( $_POST['mammography_checkbox'] ) );
		}

		if ( isset( $_POST['ct_checkbox'] ) ) {
			update_post_meta( $order_id, 'ct_checkbox', esc_attr( $_POST['ct_checkbox'] ) );
		}

		if ( isset( $_POST['mri_checkbox'] ) ) {
			update_post_meta( $order_id, 'mri_checkbox', esc_attr( $_POST['mri_checkbox'] ) );
		}

		if ( isset( $_POST['dob'] ) ) {
			update_post_meta( $order_id, 'dob', esc_attr( $_POST['dob'] ) );
		}

	}

	add_action( 'add_meta_boxes', 'cunis_display_admin_order_meta_box' );
	function cunis_display_admin_order_meta_box() {
		add_meta_box(
			'woocommerce-cd-info-order',
			__( "CD's Information" ),
			'cunis_order_meta_box_cd_info',
			'shop_order',
			'normal',
			'default'
		);
	}

	function cunis_order_meta_box_cd_info() {
		global $woocommerce, $post;

		$post_id = $post->ID;
		$order   = new WC_Order( $post_id );
		$date    = ( null !== $order->get_meta( 'dob' ) ) ? $order->get_meta( 'dob' ) : '';
		echo '<p><strong>DOB</strong>: ' . $date . '</p>';
		$checkbox_keys   = array(
			'mri_checkbox',
			'ct_checkbox',
			'mammography_checkbox',
			'breast_biopsy_checkbox',
			'breast_biopsy_checkbox',
			'ultrasonography_checkbox',
			'echocardiography_checkbox',
			'xray_checkbox',
			'bone_density_checkbox',
			'nuclear_medicine_checkbox',
		);
		$checkbox_fields = array();
		foreach ( $checkbox_keys as $checkbox ) {
			if ( '1' === $order->get_meta( $checkbox ) ) {
				echo '<p><strong>Service</strong>: ' . $checkbox . '</p>';
			}
		}
	}
}


