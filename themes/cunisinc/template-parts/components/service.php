<?php
/**
 * Template part for display Service
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
                    $cunis_num_post = 9;
					$cunis_args  = array(
						'post_type'      => 'service',
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

        <div class="group flex flex-col justify-between relative mb-8 h-90 w-1/3 p-4 box-border mr-4 hover:bg-gray-900 hover:cursor-pointer"
            style="background-image:url(<?php echo $img_src[0]; ?>);">
            <div
                class="h-full w-full absolute left-0 top-0 transition-opacity duration-150 ease-in-out bg-gray-900 opacity-30 group-hover:opacity-50 z-10">
            </div>
            <div class="z-20">
                <h3 class="text-36 font-bold text-center">
                    <a href="<?php echo esc_url( the_permalink( get_the_ID() ) ); ?>"
                        class="transition-colors duration-150 ease-in-out text-white my-8 z-20 hover:text-primary-500"><?php echo get_the_title();?></a>
                </h3>
                <p
                    class="text-16 text-center m-0 text-gray-200 z-10 transition-colors duration-150 ease-in-out group-hover:text-gray-200">
                    <?php echo get_the_excerpt();?></p>
            </div>
            <div class="text-center z-20">
                <a href="<?php echo esc_url( the_permalink( get_the_ID() ) ); ?>"
                    class="button button-sm border-3 transition-colors duration-150 border-white text-white bg-transparent hover:border-primary-500 hover:text-gray-300">Read
                    more</a>
            </div>

        </div>


        <?php
				if($cunis_count == 2) {
					$cunis_count = 0;
				}else {
					$cunis_count++;
				}
					endwhile;
					wp_reset_postdata();

					?>
    </div>
</div>