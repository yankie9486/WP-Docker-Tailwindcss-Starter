<?php
/**
 * Template part for display Project
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cunis
 */

?>


<div class="container">
    <div class="w-full flex justify-start items-center flex-wrap -m-4">
        <?php
					/**
					 * Setup query to show the ‘faq’ post type with ‘8’ posts.
					 * Output the title with an excerpt.
					 */
					$cunis_count = 0;
                    $cunis_num_post = 2;
					$cunis_args  = array(
						'post_type'      => 'projects',
						'post_status'    => 'publish',
						'posts_per_page' => $cunis_num_post,
						'orderby'        => 'menu_order',
						'order'          => 'ASC',
					);
					$cunis_loop  = new WP_Query( $cunis_args );

					while ( $cunis_loop->have_posts() ) :
						$cunis_loop->the_post();
						?>

        <?php
			$alt = get_post_meta( get_post_thumbnail_id(get_the_ID(  ) ) , '_wp_attachment_image_alt', TRUE);
			$img_src = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID(  )), 'full' );
		?>

        <div
            class="flex flex-row flex-wrap w-full items-center mb-8 box-border <?php echo ($cunis_count % 2 != 0)? 'justify-end' :''; ?> ">
            <img src="<?php echo $img_src[0];?>" alt="<?php echo $alt; ?>"
                class="w-1/3 <?php echo ($cunis_count % 2 != 0)? 'ml-4' :'mr-4'; ?> <?php echo ($cunis_count % 2 != 0)? 'order-last' :''; ?>" />
            <div class="z-20 w-5/12">
                <h3 class="text-24 font-bold m-0 <?php echo ($cunis_count % 2 != 0)? 'text-right' :''; ?>">
                    <a href="<?php echo esc_url( the_permalink( get_the_ID() ) ); ?>"
                        class="transition-colors duration-150 ease-in-out text-gray-800 my-8 z-20 hover:text-primary-600"><?php echo get_the_title();?></a>
                </h3>
                <p
                    class="text-16 <?php echo ($cunis_count % 2 != 0)? 'text-right' :'text-left'; ?> mb-4 text-gray-700 z-10 transition-colors duration-150 ease-in-out">
                    <?php echo get_the_excerpt();?></p>

                <div class="<?php echo ($cunis_count % 2 != 0)? 'text-right' :'text-left'; ?> z-20">
                    <a href="<?php echo esc_url( the_permalink( get_the_ID() ) ); ?>"
                        class="button button-sm border-3 transition-colors duration-150 border-primary-600 text-gray-700 bg-transparent hover:border-primary-700 hover:text-gray-800">Read
                        more</a>
                </div>
            </div>


        </div>


        <?php
					$cunis_count++;

					endwhile;
					wp_reset_postdata();

					?>
    </div>
</div>