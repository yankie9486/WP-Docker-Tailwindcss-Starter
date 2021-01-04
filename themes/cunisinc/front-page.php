<?php
/**
 * The front page template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cunis
 */

get_header();
?>

<!--- Start of banner -->
<div id="home-banner" class="w-full bg-gray-400 relative banner">
    <div class="container flex flex-col h-full justify-center items-center pt-0 md:pt-4 pb-8">
        <div
            class="w-full h-full lg:w-1/2 flex flex-col justify-start md:justify-center items-center px-4 mr-0 lg:-mr-8">
            <h2 class=" text-48 text-center mb-8 md:mb-16">
                <?php echo esc_html__('A CUT ABOVE THE COMPETION'); ?> <br>
                <?php echo esc_html__('FOR OVER 30 YEARS'); ?></h2>
            <a href="/contact-us"
                class="button button-primary"><?php echo esc_html__('Schedule Your Consulation Today'); ?></a>
        </div>

    </div>
</div>


<!--- End of banner -->

<div class="py-8">
    <div class="container">
        <h2 class="text-48 font-bold text-center text-gray-800">
            <?php echo esc_html__( 'SERVING THE FOLLOWING LOCATIONS', 'cunis' ); ?>
        </h2>
    </div>
</div>
<div class="bg-primary-500 py-8">
    <div class="container">
        <div class="w-10/12 mx-auto flex justify-between">
            <a href="/ft-lauderdale" class="button outline-light text-white text-20">
                <?php echo esc_html__("FORT LAUDERDALE",'cunis'); ?> </a>
            <a href="/orlando" class="button outline-light text-white text-20">
                <?php echo esc_html__("ORLANDO",'cunis'); ?>
            </a>
            <a href="/tampa" class="button outline-light text-white text-20"> <?php echo esc_html__("TAMPA",'cunis'); ?>
            </a>
            <a href="/jacksonville" class="button outline-light text-white text-20">
                <?php echo esc_html__("JACKSONVILLE",'cunis'); ?> </a>


        </div>
    </div>
</div>

<!--- Start of front page main-->
<div class="container">
    <main id="main">
        <article class="flex flex-col relative py-8 lg:pt-16 lg:pb-32">

            <div class="w-full flex flex-col md:flex-row justify-center items-center">
                <div class="w-full md:w-1/2 flex justify-center items-center mr-4">
                    <img src="<?php echo esc_url( get_home_url() .'/wp-content/uploads/speedy-con-truck.jpg'); ?>"
                        alt="Speedy Concrete Cutting employee with company truck" />
                </div>

                <div class="w-full md:w-1/2 flex flex-col items-center">
                    <h2 class="text-20 font-bold text-center">
                        <?php echo esc_html__( 'SELECTIVE CONCRETE DEMOLITION SERVICES', 'cunis' ); ?></h2>
                    <p class="my-4 md:mt-0">
                        <?php echo esc_html__( 'Speedy Concrete Cutting has been at the forefront of the concrete sawing and drilling industry since 1988. Consistently offering high quality, cost effective selective concrete demolition along with safe, reliable, quality workmanship and advanced technologies has led to us being the most respected privately owned firm in the industry.','cunis' ); ?>
                    </p>
                    <p class="my-4 md:mt-0">
                        <?php echo esc_html__( "We've excelled by implementing proven technologies and innovating practical solutions to complete even the most demanding projects.",'cunis' ); ?>
                    </p>
                    <p class="my-4 md:mt-0">
                        <?php echo esc_html__( 'With the largest fleet in Florida, Eastern US and the Caribbean, Speedy Concrete Cutting provides the response and capabilities necessary to meet the demands of the fast paced construction industry.','cunis' ); ?>
                    </p>
                </div>
            </div>
        </article>
    </main>
</div>
<!--- End of front page main -->

<?php require_once CUNIS_DIR .'/template-parts/components/cta.php';?>




<!--- Start of Our Work-->
<div class="w-full flex flex-col bg-gray-200">
    <div class="w-full py-8">
        <h2 class="text-center text-gray-800 text-48"><?php echo esc_html__('NOTABLE PROJECTS'); ?></h2>
    </div>
    <div class="">
        <div class="flex flex-col lg:container py-8">
            <?php require_once CUNIS_DIR .'/template-parts/components/projects.php';?>
        </div>

        <div class="text-center mt-4 mb-16">
            <a class="button button-primary"
                href="<?php echo esc_url( get_home_url() .'/our-work');?>"><?php echo esc_html__('View All Work' ,'cunis');?></a>
        </div>
    </div>
</div>
<!--- End of Our Work -->

<!--- Start of Our Services-->
<div class="w-full flex flex-col bg-gray-900">
    <div class="flex flex-col lg:container py-8">
        <h2 class="text-center text-white text-48 mt-0 mb-16"><?php echo esc_html__('Our Services'); ?></h2>
        <?php require_once CUNIS_DIR .'/template-parts/components/service.php';?>
    </div>
</div>
<!--- End of Our Services-->


<?php
get_footer();