<?php
/**
 * Template Name: Fullwidth Page
 *
 * @package cunis
 * @subpackage HighlandHillCap
 */

get_header();
?>

<main id="main">
	<?php
	while ( have_posts() ) :
		the_post();


		the_content();

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
			endif;

		endwhile; // End of the loop.
	?>


</main><!-- #main -->

<?php
if ( is_active_sidebar( 'above_footer' ) ) :
	?>
	<?php dynamic_sidebar( 'above_footer' ); ?>

<?php endif; ?>

<?php
get_footer();
