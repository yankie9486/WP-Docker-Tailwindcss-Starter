<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cunis
 */

$cunis_sidebar_display = get_post_meta( get_the_ID(), '_page_setting_sidebar_metafield', true );

get_header();
?>

	<div id="primary" class="container flex mt-16">
		<main id="main" class="site-main w-full <?php echo ( 'no-sidebar' !== $cunis_sidebar_display ) ? 'md:w-9/12' : ''; ?>">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
		<?php get_sidebar( 'blog' ); ?>
	</div><!-- #primary -->

<?php
get_footer();
