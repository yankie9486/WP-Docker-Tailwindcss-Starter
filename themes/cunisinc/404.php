<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package cunis
 */

get_header();
?>

	<div id="primary" class="container flex mt-16 mb-8">
		<main id="main" class="site-main w-full">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="text-center"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'cunis' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p class="text-center"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try the to search for it below?', 'cunis' ); ?></p>

					<?php
					get_search_form();
					?>

<p class="text-center"><?php echo sprintf( '%s <a href="%s">%s</a> %s <a href="%s">contact us</a>', esc_html__( 'Or you can return to our', 'cunis' ), esc_url( home_url() ), esc_html__( 'homepage', 'cunis' ), esc_html__( ', or ', 'cunis' ), esc_url( get_permalink( 26 ) ), esc_html__( 'contact us', 'cunis' ) ); ?></p>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
