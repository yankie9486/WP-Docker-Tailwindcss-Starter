<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cunis
 */

?>

</div><!-- #content -->
<div id="cta" class="w-full py-0 md:py-16  flex justify-center items-center h-90 md:h-75 relative bg-cover">
    <div class="absolute w-full h-full top-0 left-0 bg-gray-900 opacity-75"></div>
    <div class="container flex flex-col lg:flex-row">
        <div class="w-full lg:w-9/12 flex justify-center items-center z-30">
            <h2 class="text-primary-100 text-48 text-center lg:text-left mt-0 md:mt-4">
                <?php echo esc_html__( 'Measure, Cut, Build!', 'cunis' ); ?><br>
                <?php echo esc_html__( 'We’re Ready When You Are', 'cunis' ); ?>
            </h2>
        </div>
        <div class="w-full lg:w-3/12 text-center flex justify-center items-center mb-3 md:mb-0 z-30">
            <a class="button button-primary"
                href="<?php echo esc_url( get_home_url() . '/contact-us' ); ?>"><?php echo esc_html__( 'Schedule Your Consultation Today', 'cunis' ); ?></a>
        </div>
    </div>
</div>

<footer id="colophon"
    class="flex flex-col md:flex-col justify-between col-span-1 w-full text-12 site-footer pt-16 lg:pt-16"
    itemscope="itemscope" itemtype="https://schema.org/WPFooter">
    <div class="container flex flex-col items-stretch md:flex-row pb-16">
        <div class="w-full lg:w-3/12 mb-4 lg:mb-0">
            <?php dynamic_sidebar( 'footer_1' ); ?>
        </div>
        <div class="w-full lg:w-4/12 mb-4 lg:mb-0">
            <?php dynamic_sidebar( 'footer_2' ); ?>
        </div>
        <div class="w-full lg:w-4/12 mb-4 lg:mb-0">
            <?php dynamic_sidebar( 'footer_3' ); ?>
        </div>
    </div>
    <div class="text-center py-2 site-info bg-primary-500 text-primary-100 text-16">
        <div class="container">


            <div class="flex flex-col w-full lg:flex-row ite">
                <div class="mb-2 lg:mb-0 flex justify-center items-center lg:w-6/12  lg:justify-start">
                    <?php
						/* translators:*/
						printf( esc_html__( 'Copyright %1$s &copy; All rights reserved. %2$s.', 'cunis' ), esc_html( gmdate( 'Y' ) ), esc_html__( 'Speedy Concrete Cutting, Inc', 'cunis' ) );
					?>
                </div>
                <div class="w-full lg:w-6/12 flex justify-center items-center lg:justify-end">
                    <?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'menu_class'     => 'footer-menu capitalize',
							'container'      => false,
						)
					);
					?>



                </div>
            </div>
        </div>
    </div><!-- .site-info -->
</footer><!-- #colophon -->
<button class="to-top">
    <span class="sr-only">Scroll to Top</span>
    <svg width="20" height="20" viewBox="0 0 43 42" class="fill-current transform rotate-90" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <path d="M26.75 33.25L14.5 21L26.75 8.75" stroke="#404040" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" />
    </svg>
</button>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>