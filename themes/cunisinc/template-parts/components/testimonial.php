<?php
/**
 * Template part for display FAQ
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cunis
 */

?>

<div class=" glide-container mx-auto z-50">
	<div class="glide">
		<div class="glide__track" data-glide-el="track">
			<ul class="glide__slides ">
				<?php
					/**
					 * Setup query to show the ‘testimonial’ post type with ‘8’ posts.
					 * Output the title with an excerpt.
					 */
					$cunis_count = 0;
					$cunis_args  = array(
						'post_type'      => 'testimonial',
						'post_status'    => 'publish',
						'posts_per_page' => 5,
					);
					$cunis_loop  = new WP_Query( $cunis_args );

					while ( $cunis_loop->have_posts() ) :
						$cunis_loop->the_post();
						$cunis_title = get_post_meta( get_the_ID(), 'Title', true );
						?>
				<li class="glide__slide">
					<p class=" w-10/12 mx-auto text-center">
						<?php echo esc_html( the_content() ); ?>
					</p>
					<h3 class="text-center text-20"><?php echo esc_html( get_the_title() ); ?></h3>
					<h4 class="text-center text-20 my-0"><?php echo esc_html( $cunis_title ); ?></h4>
				</li>
						<?php
						$cunis_count++;
					endwhile;
					wp_reset_postdata();

					?>
			</ul>
		</div>

		<div class="glide__arrows" data-glide-el="controls">
			<button class="glide__arrow glide__arrow--left" data-glide-dir="<">
				<span class="sr-only"><?php echo esc_html__( 'previous', 'cunis' ); ?></span>
				<svg width="43" height="42" viewBox="0 0 43 42" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M26.75 33.25L14.5 21L26.75 8.75" stroke="#404040" stroke-width="2" stroke-linecap="round"
						stroke-linejoin="round" />
				</svg>
			</button>

			<button class="glide__arrow glide__arrow--right" data-glide-dir=">">
				<span class="sr-only"><?php echo esc_html__( 'next', 'cunis' ); ?></span>
				<svg width="43" height="42" viewBox="0 0 43 42" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M16.25 8.75L28.5 21L16.25 33.25" stroke="#404040" stroke-width="2" stroke-linecap="round"
						stroke-linejoin="round" />
				</svg>
			</button>
		</div>
	</div>
</div>
