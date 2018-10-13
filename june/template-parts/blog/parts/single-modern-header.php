<?php
/**
 * Template part for displaying header single blog modern
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

<article class="post single-modern-header light-text" style="background-color:#262a2c; background-image: url(<?php echo get_the_post_thumbnail_url(); ?>); background-position: center; background-size:cover; background-repeat:no-repeat; ">

		<div class="entry-wrapper">
	
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

		</div><!-- .entry-wrapper -->

</article><!-- #post-## -->
