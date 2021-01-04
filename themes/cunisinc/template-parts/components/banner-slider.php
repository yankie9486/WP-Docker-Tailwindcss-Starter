<?php
/**
 * Template part for display Banner slider
 *
 * @package cunis
 */

?>

<div id="banner" class="glide z-10">
		<div class="glide__track h-auto max-w-screen" data-glide-el="track">
			<ul class="glide__slides h-auto">
				<li class="glide__slide">
					<img class="hidden md:flex" src="<?php echo esc_url( get_site_url() ) . '/wp-content/uploads/banner-1.jpg'; ?>" />
					<img class="md:hidden" src="<?php echo esc_url( get_site_url() ) . '/wp-content/uploads/banner-1-300x300-1.jpg'; ?>" />

						<div class="slide-info">
							<h1 class="text-white font-bold leading-tight capitalize m-0 md:text-4xl lg:text-5xl">
								<?php echo esc_html( __( 'Fast funds', 'HHC' ) ); ?><br>
								<?php echo esc_html( __( 'at fair rates', 'HHC' ) ); ?></h1>
							<?php echo do_shortcode( '[contact-form-7 id="166" title="Home Banner Form"]', true ); ?>
						</div>

				</li>
				<li class="glide__slide">
					<img class="hidden md:flex" src="<?php echo esc_url( get_site_url() ) . '/wp-content/uploads/banner-2.jpg'; ?>" />
					<img class="md:hidden" src="<?php echo esc_url( get_site_url() ) . '/wp-content/uploads/banner-2-300x300-1.jpg'; ?>" />

						<div class="slide-info">
							<h1 class="text-white font-bold leading-tight capitalize m-0">
								<?php echo esc_html( __( 'Fast funds', 'HHC' ) ); ?><br>
								<?php echo esc_html( __( 'at fair rates', 'HHC' ) ); ?></h1>
							<?php echo do_shortcode( '[contact-form-7 id="166" title="Home Banner Form"]', true ); ?>
						</div>

				</li>
				<li class="glide__slide">
					<img class="hidden md:flex" src="<?php echo esc_url( get_site_url() ) . '/wp-content/uploads/banner-3.jpg'; ?>" />
					<img class="md:hidden" src="<?php echo esc_url( get_site_url() ) . '/wp-content/uploads/banner-3-300x300-1.jpg'; ?>" />

						<div class="slide-info">
							<h1 class="text-white font-bold leading-tight capitalize m-0">
								<?php echo esc_html( __( 'Fast funds', 'HHC' ) ); ?><br>
								<?php echo esc_html( __( 'at fair rates', 'HHC' ) ); ?></h1>
							<?php echo do_shortcode( '[contact-form-7 id="166" title="Home Banner Form"]', true ); ?>
						</div>

				</li>
				
			</ul>

		</div>

	</div>