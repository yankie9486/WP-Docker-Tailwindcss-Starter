<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package cunis
 */

if ( ! function_exists( 'cunis_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function cunis_posted_on() {

		$time_string = '<time class="entry-date published updated text-11 md:text-12" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published text-11 md:text-12 " datetime="%1$s">%2$s</time><span class="text-11 md:text-12 text-gray-600"> modified on</span> <time class="updated text-11 md:text-12" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'cunis' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on flex items-center mr-4">
<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="16px" height="16px" viewBox="0 0 600.112 600.111" class="mr-2" style="enable-background:new 0 0 600.112 600.111;"
	 xml:space="preserve">
<g>
	<g>
		<g>
			<path d="M537.423,52.563h-59.836V21.92c0-11.83-9.591-21.42-21.42-21.42c-11.83,0-21.42,9.59-21.42,21.42v30.642H165.364V21.92
				c0-11.83-9.59-21.42-21.42-21.42c-11.83,0-21.42,9.59-21.42,21.42v30.642H62.687c-32.058,0-58.14,26.082-58.14,58.14v430.77
				c0,32.059,26.082,58.139,58.14,58.139h474.736c32.059,0,58.141-26.08,58.141-58.139v-430.77
				C595.564,78.645,569.482,52.563,537.423,52.563z M47.387,110.703c0-8.451,6.85-15.3,15.3-15.3h59.837v24.443
				c0,11.83,9.59,21.42,21.42,21.42s21.42-9.59,21.42-21.42V95.403h269.383v24.443c0,11.83,9.59,21.42,21.42,21.42
				c11.829,0,21.42-9.59,21.42-21.42V95.403h59.836c8.45,0,15.3,6.85,15.3,15.3v53.856H47.387V110.703z M552.723,541.473
				c0,8.449-6.85,15.301-15.3,15.301H62.687c-8.45,0-15.3-6.852-15.3-15.301V207.399h505.336V541.473z"/>
			<path d="M537.423,600.111H62.687c-32.334,0-58.64-26.306-58.64-58.639v-430.77c0-32.334,26.306-58.64,58.64-58.64h59.336V21.92
				c0-12.087,9.833-21.92,21.92-21.92c12.086,0,21.92,9.833,21.92,21.92v30.142h268.384V21.92c0-12.087,9.833-21.92,21.92-21.92
				s21.92,9.833,21.92,21.92v30.143h59.336c32.335,0,58.641,26.306,58.641,58.64v430.77
				C596.064,573.806,569.758,600.111,537.423,600.111z M62.687,53.062c-31.783,0-57.64,25.857-57.64,57.64v430.77
				c0,31.782,25.857,57.639,57.64,57.639h474.736c31.783,0,57.641-25.856,57.641-57.639v-430.77c0-31.783-25.857-57.64-57.641-57.64
				h-60.336V21.92c0-11.536-9.385-20.92-20.92-20.92s-20.92,9.385-20.92,20.92v31.142H164.864V21.92
				c0-11.536-9.385-20.92-20.92-20.92c-11.536,0-20.92,9.385-20.92,20.92v31.142H62.687z M537.423,557.273H62.687
				c-8.712,0-15.8-7.088-15.8-15.801V206.899h506.336v334.574C553.223,550.186,546.135,557.273,537.423,557.273z M47.887,207.899
				v333.574c0,8.161,6.639,14.801,14.8,14.801h474.736c8.16,0,14.8-6.64,14.8-14.801V207.899H47.887z M553.223,165.059H46.887
				v-54.356c0-8.712,7.088-15.8,15.8-15.8h60.337v24.943c0,11.535,9.385,20.92,20.92,20.92s20.92-9.385,20.92-20.92V94.903h270.383
				v24.943c0,11.535,9.385,20.92,20.92,20.92s20.92-9.385,20.92-20.92V94.903h60.336c8.712,0,15.8,7.088,15.8,15.8V165.059z
				 M47.887,164.059h504.336v-53.356c0-8.161-6.64-14.8-14.8-14.8h-59.336v23.943c0,12.087-9.833,21.92-21.92,21.92
				s-21.92-9.833-21.92-21.92V95.903H165.864v23.943c0,12.087-9.833,21.92-21.92,21.92s-21.92-9.833-21.92-21.92V95.903H62.687
				c-8.161,0-14.8,6.639-14.8,14.8V164.059z"/>
		</g>
	</g>
</g>
</svg>' . $posted_on . '</span>'; // phpcs:ignore: XSS OK.

	}
endif;

if ( ! function_exists( 'cunis_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function cunis_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'cunis' ),
			'<span class="author vcard text-11 md:text-12"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="flex items-center mr-4"> <svg version="1.1" id="Capa_1" class="mr-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px"
	 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
	<g>
		<path d="M437.02,330.98c-27.883-27.882-61.071-48.523-97.281-61.018C378.521,243.251,404,198.548,404,148
			C404,66.393,337.607,0,256,0S108,66.393,108,148c0,50.548,25.479,95.251,64.262,121.962
			c-36.21,12.495-69.398,33.136-97.281,61.018C26.629,379.333,0,443.62,0,512h40c0-119.103,96.897-216,216-216s216,96.897,216,216
			h40C512,443.62,485.371,379.333,437.02,330.98z M256,256c-59.551,0-108-48.448-108-108S196.449,40,256,40
			c59.551,0,108,48.448,108,108S315.551,256,256,256z"/>
	</g>
</g>
</svg>
 ' . $byline . '</span>'; // phpcs:ignore: XSS OK.

	}
endif;

if ( ! function_exists( 'cunis_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function cunis_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'cunis' ) );
			echo '<div class="w-full mb-4">';
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="mr-4">' . esc_html__( 'Categories %1$s', 'cunis' ) . '</span>', $categories_list ); // phpcs:ignore: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'cunis' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'cunis' ) . '</span>', $tags_list ); // phpcs:ignore: XSS OK.
			}
		}
		echo '</div>';
		echo '<div class="w-full">';
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="mr-4">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'cunis' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'cunis' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
		echo '</div>';
	}
endif;

if ( ! function_exists( 'cunis_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function cunis_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail(
				'post-thumbnail',
				array(
					'alt' => the_title_attribute(
						array(
							'echo' => false,
						)
					),
				)
			);
			?>
		</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'cunis_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function cunis_body_open() {
		do_action( 'cunis_body_open' );
	}
endif;

if ( ! function_exists( 'cunis_number_posts_nav' ) ) :

	/**
	 * Display Pagination
	 *
	 * @return void
	 */
	function cunis_number_posts_nav() {

		if ( is_singular() ) {
			return;
		}

		global $wp_query;

		/** Stop execution if there's only 1 page */
		if ( $wp_query->max_num_pages <= 1 ) {
			return;
		}

		$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
		$max   = intval( $wp_query->max_num_pages );

		/** Add current page to the array */
		if ( $paged >= 1 ) {
			$links[] = $paged;
		}

		/** Add the pages around the current page to the array */
		if ( $paged >= 3 ) {
			$links[] = $paged - 1;
			$links[] = $paged - 2;
		}

		if ( ( $paged + 2 ) <= $max ) {
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}

		echo '<div class="pagination"><ul>' . "\n";

		/** Previous Post Link */
		if ( get_previous_posts_link() ) {
			printf(
				'<li>%s</li>' . "\n",
				get_previous_posts_link(
					'<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="fill-current ml-1 transform rotate-180"><path d="M8.122 24l-4.122-4 8-8-8-8 4.122-4 11.878 12z"/></svg>
			'
				)
			);
		}

		/** Link to first page, plus ellipses if necessary */
		if ( ! in_array( 1, $links ) ) {
			$class = 1 == $paged ? ' class="active"' : '';

			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

			if ( ! in_array( 2, $links ) ) {
				echo '<li>…</li>';
			}
		}

		/** Link to current page, plus 2 pages in either direction if necessary */
		sort( $links );
		foreach ( (array) $links as $link ) {
			$class = $paged == $link ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
		}

		/** Link to last page, plus ellipses if necessary */
		if ( ! in_array( $max, $links ) ) {
			if ( ! in_array( $max - 1, $links ) ) {
				echo '<li>…</li>' . "\n";
			}

			$class = $paged == $max ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
		}

		/** Next Post Link */
		if ( get_next_posts_link() ) {
			printf(
				'<li>%s</li>' . "\n",
				get_next_posts_link(
					'<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="fill-current ml-1"><path d="M8.122 24l-4.122-4 8-8-8-8 4.122-4 11.878 12z"/></svg>
			'
				)
			);
		}
		echo '</ul></div>' . "\n";

	}

endif;
