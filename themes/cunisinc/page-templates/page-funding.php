<?php
/**
 * Template Name: Funding Page
 *
 * @package cunis
 * @subpackage HighlandHillCap
 */

get_header();
?>

<div id="primary" class="container flex mt-16 mb-8">
	<main id="main"
		class="site-main w-full lg:mr-8 <?php echo ( 'no-sidebar' !== $sidebar_display ) ? 'lg:w-9/12' : ''; ?>">
		<div class="flex flex-col justify-between items-start cursor-pointer select-none">
			<?php
					/**
					 * Setup query to show the ‘faq’ post type with ‘8’ posts.
					 * Output the title with an excerpt.
					 */
					$cunis_args = array(
						'post_parent'    => get_the_ID(),
						'post_type'      => 'page',
						'post_status'    => 'publish',
						'posts_per_page' => -1,
					);
					$cunis_loop = new WP_Query( $cunis_args );

					while ( $cunis_loop->have_posts() ) :
						$cunis_loop->the_post();
						?>
			<a href="<?php echo esc_url( get_permalink() ); ?>"
				class="w-full flex justify-between  text-gray-700 text-left py-4 px-6 relative hover:text-primary-100 hover:bg-gray-300 border-b"
				role="tab"><?php echo esc_html( the_title() ); ?>
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="fill-current">
					<path d="M8.122 24l-4.122-4 8-8-8-8 4.122-4 11.878 12z" /></svg>
			</a>

						<?php
					endwhile;
					wp_reset_postdata();

					?>
		</div>
	</main><!-- #main -->

	<?php get_sidebar(); ?>
</div><!-- #primary -->

<!--- Start of Do you qualify Section -->
<div class="bg-blue-800 pt-8 pb-10">
	<div class="container flex flex-col">
		<div class="w-full flex pb-4">
			<h2 class="text-white text-30 font-bold text-center w-full mt-0 mb-4">
				<?php echo esc_html__( 'Do You Qualify for a Business Loan?', 'cunis' ); ?></h2>
		</div>
		<?php echo do_shortcode( '[contact-form-7 id="167" title="Do You Qualify for a Business Loan"]' ); ?>
	</div>
</div>
<!--- End of Do you qualify Section -->

<?php get_footer(); ?>
