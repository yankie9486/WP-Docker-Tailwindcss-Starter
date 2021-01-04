<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cunis
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php 
$cunis_title_option = get_post_meta( get_the_ID(), '_page_setting_title_metafield', true );
			if ( ! is_front_page() ) :
				if ( 'no-title' !== $cunis_title_option && ! is_404() ) :
					?>
    <!-- Breadcrumbs -->
	<?php
	
	$cunis_sidebar_display = get_post_meta( get_the_ID(), '_page_setting_sidebar_metafield', true );
	var_dump($cunis_sidebar_display);

if ( ! empty( $cunis_title_option ) &&
( 'title-breadcrumb' === $cunis_title_option ||
'breadcrumb' === $cunis_title_option ) ) {
	if ( is_active_sidebar( 'breadcrumb' ) ):?>
    <div class="flex flex-col">
        <?php dynamic_sidebar( 'breadcrumb' ); ?>
    </div>
    <?php endif; 
	cunis_get_breadcrumb();
}

?>
    <?php
					if ( 'title' === $cunis_title_option || 'title-breadcrumb' === $cunis_title_option ) :
						?>
    <h1 class="mt-0 text-36">
        <?php echo esc_html( get_the_title( get_the_ID() ) ); ?>
    </h1>
    <?php
					endif;
				endif;
			endif;

			?>

    

    <div class="entry-content">
        <?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cunis' ),
				'after'  => '</div>',
			)
		);
		?>
    </div><!-- .entry-content -->

    <?php
	if ( get_edit_post_link() ) :
		?>
    <footer class="entry-footer">
        <?php
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
		?>
    </footer><!-- .entry-footer -->
    <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->