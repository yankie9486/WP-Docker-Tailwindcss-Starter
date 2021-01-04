<?php
/**
 * Breadcrumbs function.
 *
 * @package cunis
 */

/**
 * Display breadcrumbs
 *
 * @return void
 */
function cunis_get_breadcrumb() {
	?>
<ol class="breadcrumb flex flex-wrap items-center ml-0  mt-0" itemscope itemtype="http://schema.org/BreadcrumbList">
	<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<a itemprop="item" href="<?php echo esc_url_raw( home_url() ); ?>" rel="nofollow" itemprop="url">
			<span itemprop="name">
				<?php echo esc_html__( 'Home', 'cunis' ); ?>
			</span>
		</a>
	</li>
	<?php if ( is_home() ) : ?>
	<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<a itemprop="item" href="<?php echo esc_url_raw( home_url() . '/blog' ); ?>" rel="nofollow" itemprop="url">
			<span itemprop="name">
				<?php echo esc_html__( 'Blog', 'cunis' ); ?>
			</span>
		</a>
	</li>

		<?php
	endif;

	$category;
	if ( is_category() || is_single() ) {

		$category_link = get_category_link( get_the_ID() );

		$category = get_the_category( get_the_ID() );

		if ( get_the_category( get_the_ID() ) ) {
			$category_link = get_category_link( get_the_ID() );

			$category = get_the_category( get_the_ID() );

		} else {

			$category = get_categories(
				array(
					'taxonomy'     => 'product_cat',
					'orderby'      => 'name',
					'pad_counts'   => false,
					'hierarchical' => 1,
					'hide_empty'   => false,
				)
			)[0];

			$category_link = get_category_link( $category->term_id );

		}

		?>
	<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<a itemprop="item" href="<?php echo esc_url_raw( $category_link ); ?>" rel="nofollow" itemprop="url">
			<span itemprop="name">
				<?php echo esc_html( $category->name ); ?>
			</span>
		</a>
	</li>
		<?php
		if ( is_single() ) {
			?>
	<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<span itemprop="name">
			<?php esc_html( the_title() ); ?>
		</span>
	</li>
			<?php
		}
	} elseif ( is_page() ) {
		$parent_id = wp_get_post_parent_id( get_the_ID() );
		if ( ! empty( $parent_id ) ) {
			?>

	<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<a itemprop="item" href="<?php echo esc_url_raw( get_permalink( $parent_id ) ); ?>" rel="nofollow">
			<span itemprop="name">
				<?php echo esc_html( get_the_title( $parent_id ) ); ?>
			</span>
		</a>
	</li>

			<?php
		}
		?>
	<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<span itemprop="name">
			<?php echo esc_html( the_title() ); ?>
		</span>
	</li>
		<?php
	} elseif ( is_search() ) {
		?>
	<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<span itemprop="name">
			<?php
			esc_html_e( 'Search Results for... ', 'cunis' ); // phpcs.ignore.
				echo '"<em>';
				echo esc_html( the_search_query() );
				echo '</em>"';
			?>
		</span>
	</li>
		<?php
	}
	?>
</ol>
	<?php

}
