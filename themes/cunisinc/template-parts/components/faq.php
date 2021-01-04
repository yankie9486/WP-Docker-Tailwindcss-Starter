<?php
/**
 * Template part for display FAQ
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cunis
 */

?>


<div class=" max-w-4xl mr-auto ml-auto" role="tablist" aria-label="FAQ">
				<?php
					/**
					 * Setup query to show the ‘faq’ post type with ‘8’ posts.
					 * Output the title with an excerpt.
					 */
					$cunis_count = 0;
					$cunis_args  = array(
						'post_type'      => 'faq',
						'post_status'    => 'publish',
						'posts_per_page' => 5,
					);
					$cunis_loop  = new WP_Query( $cunis_args );

					while ( $cunis_loop->have_posts() ) :
						$cunis_loop->the_post();
						?>

				<div class="tab flex flex-col border-b justify-between items-center cursor-pointer select-none">
					<input id="question-<?php echo esc_html( $cunis_count ); ?>" class="absolute opacity-0 focus:outline-none" type="radio"
						name="faq-questions" value="" role="tab" />
					<label for="question-<?php echo esc_html( $cunis_count ); ?>"
						class="w-full text-gray-700 text-left py-4 px-6 relative" aria-describedby="tab-single-<?php echo esc_html( $cunis_count ); ?>"> 
						<?php echo esc_html( get_the_title() ); ?></label>

					<div id="tab-single-<?php echo esc_html( $cunis_count ); ?>" class="tab-content overflow-hidden bg-gray-100">
						<p class="pl-6 pr-4 py-2 m-0 text-gray-700 font-normal">
							<?php echo esc_html( the_content() ); ?>
						</p>
					</div>
				</div>
						<?php
						$cunis_count++;
					endwhile;
					wp_reset_postdata();

					?>
</div>
