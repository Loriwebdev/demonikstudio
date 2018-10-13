<?php
/**
 * Template part for displaying post
 * Classic Single Post
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

	<header class="entry-header">
		
		<?php
						
			the_title( '<h1 class="entry-title">', '</h1>' );
						
		?>

		<div class="entry-meta-tools">
						
			
			<?php get_template_part( 'template-parts/blog/parts/entry', 'meta' ); ?>

			<?php 
			/**
			* Output Entry Tools
			* Only on Blog Page, not single post
			*/ 

			$entry_tools = codeless_get_post_entry_tools();
						
			if(  ! empty( $entry_tools ) ): ?>
						
				<?php get_template_part( 'template-parts/blog/parts/entry', 'tools' ); ?>
							
			<?php endif; ?>

		</div><!-- .entry-meta-tools -->
		
		<div class="entry-tag-list">
			<?php echo get_the_tag_list('','',''); ?>
		</div>		
					
	</header><!-- .entry-header -->

	<div class="entry-media-wrapper">
		<?php 
		
		$post_format = get_post_format() || '';
		
		/**
		 * Generate Post Thumbnail for Single Post and Blog Page
		 */ 
		
		if ( has_post_thumbnail() && $post_format != 'gallery' && ( ! is_single() || ( is_single() && codeless_get_post_style() == 'classic' ) ) ) :
			
			get_template_part( 'template-parts/blog/parts/entry', 'thumbnail' );
		
		endif; ?>
		
		
		<?php
		
		/**
		 * Generate Slider if needed
		 */ 
		if ( get_post_format() == 'gallery' && get_post_gallery() ):
		
			get_template_part( 'template-parts/blog/parts/entry', 'slider' );
		
		endif; ?>
		
		<?php
		
		/**
		 * Generate Video Output
		 */ 
		if ( get_post_format() == 'video' ):
		
			get_template_part( 'template-parts/blog/parts/entry', 'video' );
		
		endif; ?>
		
		<?php
		
		/**
		 * Generate Audio Output
		 */ 
		if ( get_post_format() == 'audio' ):
		
			get_template_part( 'template-parts/blog/parts/entry', 'audio' );
		
		endif; ?>

		

	</div><!-- .entry-media-wrapper -->
		
	
	<div class="entry-wrapper">

		<div class="entry-wrapper-content">

			<?php get_template_part( 'template-parts/blog/formats/content', get_post_format() ) ?>

		</div><!-- .entry-wrapper-content -->	

	
	</div><!-- .entry-wrapper -->

</article><!-- #post-## -->
