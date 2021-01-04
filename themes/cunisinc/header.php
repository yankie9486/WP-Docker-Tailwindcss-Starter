<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cunis
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="https://schema.org/WebPage" dir="ltr">
    <?php cunis_body_open(); ?>
    <div id="page" class="grid grid-rows-layout site min-h-screen w-full max-w overflow-auto relative">
    <a class="skip-link text-gray-600 border-none" href="#main" tabindex="0"><?php echo esc_html__( 'Skip to Content', 'cunis' ); ?></a>
        <header id="header" class="flex flex-col items-end col-span-1 site-header" itemscope="itemscope"
            itemtype="https://schema.org/WPHeader">
			<div class="flex flex-col justify-start items-end relative bg-primary-500 bg-opacity-1 w-full">
                <div class="container" itemscope
                    itemtype="http://schema.org/LocalBusiness">
                    <a href="tel:5615886559" class="flex items-center header-contact-num flex-shrink mt-0 focus:border-primary-100 focus:border rounded-4">
                        <span class="text-primary-100 text-18 font-bold"
                            itemprop="telephone"><?php echo esc_html( __( '(561) 588-6559', 'cunis' ) ); ?></span>
                    </a>
                </div>
            </div>

            <div class="flex lg:flex-row justify-between container w-full relative mb-4">
                <div class="w-full lg:w-2/12 flex justify-start  md:justify-center items-center lg:justify-start order-1">

                    <?php 
						if(get_theme_mod( 'custom_logo' )):
							echo get_custom_logo(); 	
						else:
							echo '<img src="https://via.placeholder.com/150x75.jpg?text=logo" />'; 
						endif;?>
                </div>

                <div class="w-full lg:w-10/12 flex justify-center items-center order-4 lg:order-2 lg:pt-4 ">
                    <nav id="site-navigation" class="main-menu container order-2">
                        <button id="menu-toggle" class="hamburger hamburger--collapse z-50 lg:hidden"
                            aria-controls="primary-menu" aria-expanded="false" type="button" aria-label="Main Menu">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                        <?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
							'menu_class'     => 'main-menu__list',
							'container'      => false,
						)
					);
					?>
                        <script>
                        var supportsTouch = (typeof Touch == "object");
                        if (supportsTouch) {
                            document.addEventListener("touchstart", function() {}, false);
                        }
                        </script>

                    </nav>
                    <!-- #site-navigation -->
                </div>

            </div>

        </header>
        <!-- #masthead -->
        <?php
			$cunis_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
		?>
        <?php
		$cunis_title_option = get_post_meta( get_the_ID(), '_page_setting_title_metafield', true );
		if ( ! is_front_page() ) :
			if ( 'no-title' !== $cunis_title_option && ! is_404() ) :
				if ( 'title' === $cunis_title_option || 'title-breadcrumb' === $cunis_title_option ) :
					?>
        <div class="w-full flex flex-col py-4 items-center justify-center  bg-cover bg-no-repeat relative z-0 h-50"
            style="background-image:url(<?php echo esc_url( $cunis_url ); ?>);">
            <div class="h-full w-full absolute left-0 top-0 bg-primary-500 opacity-0 z-10"></div>
            <div class="container flex flex-col justify-center items-center z-20">


                <h1 class="text-gray-700 my-0 text-36">
                    <?php echo esc_html( get_the_title( get_the_ID() ) ); ?>
                </h1>


                <!-- Breadcrumbs -->
                <?php

					if ( ! empty( $cunis_title_option ) &&
					( 'title-breadcrumb' === $cunis_title_option ||
					'breadcrumb' === $cunis_title_option ) ) :
						if ( is_active_sidebar( 'breadcrumb' ) ) :
							?>
                <div class="flex flex-col">
                    <?php dynamic_sidebar( 'breadcrumb' ); ?>
                </div>
                <?php
									endif;
						cunis_get_breadcrumb();
	endif;
					?>
            </div>
        </div>
        <?php
				endif;
			endif;
	endif;
		?>

        <!-- Main -->
        <div id="content" class="col-span-1 site-content">