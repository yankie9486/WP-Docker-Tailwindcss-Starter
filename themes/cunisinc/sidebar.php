<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cunis
 */

if ( ! is_active_sidebar( 'sidebar' ) ) {
	return;
}
$cunis_sidebar_display = get_post_meta( get_the_ID(), '_page_setting_sidebar_metafield', true );

if ( 'no-sidebar' !== $cunis_sidebar_display ) :
	?>

<aside class="widget-area hidden lg:flex lg:flex-col lg:w-3/12 <?php echo ( 'left-sidebar' === $cunis_sidebar_display ) ? 'order-first' : 'order-last'; ?>">
	<?php dynamic_sidebar( 'sidebar' ); ?>
</aside><!-- #secondary -->

<?php endif; ?>
