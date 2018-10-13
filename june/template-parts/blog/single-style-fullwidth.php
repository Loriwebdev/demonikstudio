<?php
/**
 * Template part for displaying post
 * Fullwidth Single Post
 * Switch styles at Theme Options (WP Customizer)
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package june
 * @subpackage Templates
 * @since 1.0.0
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( codeless_extra_classes( 'entry' ).' single-article' ); ?> <?php echo codeless_extra_attr( 'entry' ) ?>>
	
	<div class="entry-wrapper">

		<div class="entry-wrapper-content">

			<?php get_template_part( 'template-parts/blog/formats/content', get_post_format() ) ?>

		</div><!-- .entry-wrapper-content -->	

	
	</div><!-- .entry-wrapper -->

</article><!-- #post-## -->
