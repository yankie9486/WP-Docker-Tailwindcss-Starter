<?php
/**
 * Template part for display slider
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cunis
 */

?>

<div class=" glide-container container -mb-12 px-0 shadow-moduleBig z-50">
	<div class="glide">
		<div class="glide__track" data-glide-el="track">
			<ul class="glide__slides ">


			<li class="glide__slide">
				<img src="<?php echo esc_url( get_home_url() .'/wp-content/uploads/2014/07/diagnostic-imaging-mri-ct-scan-radiography-imaging-center.jpg');?>" />
			</li>
			<li class="glide__slide">
				<img src="<?php echo esc_url( get_home_url() .'/wp-content/uploads/2014/07/ct-scan-diagnostic-imaging.jpg');?>" />
			</li>

			</ul>
		</div>

		<div class="glide__controls" data-glide-el="controls[nav]">
			<button class="glide__bullet" data-glide-dir="=0" ><span class="sr-only"><?php echo esc_html__( 'One', 'cunis' ); ?></span></button>
			<button class="glide__bullet" data-glide-dir="=1" ><span class="sr-only"><?php echo esc_html__( 'Two', 'cunis' ); ?></span></button>
		</div>	
	</div>
</div>
