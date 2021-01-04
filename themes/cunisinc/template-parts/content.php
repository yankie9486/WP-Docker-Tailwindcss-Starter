<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cunis
 */
echo 'blank content';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-16 pb-16 border-b' ); ?>>
	<header class="entry-header">
		<?php
		if ( ! is_singular() ) :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		cunis_post_thumbnail();

		if ( 'post' === get_post_type() ) :
			?>
		<div class="entry-meta flex py-2 border-b-2 border-gray-200">
			<?php
				cunis_posted_by();
				cunis_posted_on();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		if ( is_singular() ) :
			the_content(
				sprintf(
					wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'cunis' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
		else :

			the_excerpt();
			?>
			<div class="text-right">
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="button button-primary"><?php echo esc_html( __( 'Read More', 'cunis' ) ); ?></a>
		</div>

			<?php

		endif;
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php cunis_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
