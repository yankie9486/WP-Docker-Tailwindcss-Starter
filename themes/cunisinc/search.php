<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package cunis
 */

get_header();
?>

	<div id="primary" class="container flex mt-16 mb-8">
		<main id="main" class="site-main w-full lg:mr-8 lg:w-9/12">

		<?php if ( have_posts() ) : ?>

			<header class="entry-header">
				<h1 class="entry-title mb-8">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'cunis' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
		<?php get_sidebar(); ?>
	</div><!-- #primary -->

	<!--- Start of Do you qualify Section -->
<div class="bg-blue-800 pt-8 pb-10">
	<div class="container flex flex-col">
		<div class="w-full flex pb-4">
			<h2 class="text-white text-30 font-bold text-center w-full mt-0 mb-4"><?php echo esc_html__( 'Do You Qualify for a Business Loan?', 'cunis' ); ?></h2>
		</div>
		<form class="w-full flex flex-col">		
			<div class="w-full flex flex-col md:flex-row">	
				<div class="w-full mb-4 md:w-4/12 md:mb-0 md:mr-4">
					<label for="requested-amount" class="hidden"><?php echo esc_html__( 'Requested Amount', 'cunis' ); ?></label>
					<select name="requested-amount" value="Requested Amount">
						<option>Requested Amount</option>
					</select>
				</div>
				<div class="w-full mb-4 md:w-4/12 md:mb-0 md:mr-4">
					<label for="time-in-business" class="hidden"><?php echo esc_html__( 'Time In Business', 'cunis' ); ?></label>
					<select name="time-in-business" value="Time In Business">
						<option>Time In Business</option>
					</select>
				</div>
				<div class="w-full mb-4 md:w-4/12 md:mb-0 md:mr-4">
					<label for="average-monthly-revenue" class="hidden"><?php echo esc_html__( 'Average Monthly Revenue', 'cunis' ); ?></label>
					<select name="average-monthly-revenue" value="Average Monthly Revenue">
						<option>Average Monthly Revenue</option>
					</select>
				</div>
			</div>
			<div class="w-full text-center pt-8">
				<button class="button button-md outline-light text-20">Apply now</button>
			</div>
		</form>
	</div>
</div>
<!--- End of Do you qualify Section -->


<?php

get_footer();
