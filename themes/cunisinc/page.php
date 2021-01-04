<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cunis
 */

$cunis_sidebar_display = get_post_meta( get_the_ID(), '_page_setting_sidebar_metafield', true );

get_header();
?>

<div id="primary" class="container flex mt-16 mb-8">
	<main id="main"
		class="site-main w-full lg:mr-8 <?php echo ( 'no-sidebar' !== $cunis_sidebar_display ) ? 'lg:w-9/12' : ''; ?>">

		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'page' );
				/**
				 * Functions hooked in to storefront_page_after action
				 *
				 * @hooked storefront_display_comments - 10
				 */
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

	<?php get_sidebar(); ?>
</div><!-- #primary -->

<?php
if ( is_active_sidebar( 'above_footer' ) ) :
	?>
	<?php dynamic_sidebar( 'above_footer' ); ?>

<?php endif; ?>

<?php get_footer(); ?>
