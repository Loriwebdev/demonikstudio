<?php
/**
 * Template part for displaying posts
 * News Style
 * Switch styles at Theme Options (WP Customizer)
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package june
 * @subpackage Templates
 * @since 1.0.0
 *
 */

codeless_hook_news_grid_item_before();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( codeless_extra_classes( 'entry' ) ); ?> <?php echo codeless_extra_attr( 'entry' ) ?>>
	
	<div class="grid-holder">

        <div class="grid-holder-inner">
	 
        	<?php 
        	
        	$post_format = get_post_format() || '';
        	
        	/**
        	 * Generate Post Thumbnail for Single Post and Blog Page
        	 */ 
        		
        	?>

            <div class="entry-media">
                <div class="overlay"></div>
                <div class="post-thumbnail">
    
                    <?php the_post_thumbnail( codeless_get_post_thumbnail_size() ); ?>

                </div><!-- .post-thumbnail --> 

            </div><!-- .entry-media -->

            <div class="content">

                <header class="entry-header animate_on_visible bottom-t-top" data-delay="100" data-speed="400">
                        
                    <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

                </header><!-- .entry-header -->
                
                <div class="animated-content animate_on_visible bottom-t-top"  data-delay="300" data-speed="400">
                    <?php get_template_part( 'template-parts/blog/formats/content', get_post_format() ) ?>
                </div>

                <div class="entry-button animate_on_visible bottom-t-top"  data-delay="500" data-speed="400">
                        <?php get_template_part( 'template-parts/blog/parts/entry', 'readmore' ); ?>
                </div>

            </div><!-- .content -->

            <a href="<?php echo get_permalink() ?>" class="entry-link"></a>

        </div><!-- .grid-holder-inner -->

    </div><!-- .grid-holder -->
    
</article><!-- #post-## -->

<?php codeless_hook_news_grid_item_after() ?>