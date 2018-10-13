<?php

/**
 * Template Name: Side Navigation Template
 *
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package june WordPress Theme
 * @subpackage Templates
 * @version 1.0.0
 */ 

codeless_routing_template();

get_header(); ?>

	<section id="site_content" class="<?php echo esc_attr( codeless_extra_classes( 'site_content' ) ) ?>" <?php echo codeless_extra_attr( 'site_content' ) ?>>

		<?php codeless_hook_content_before(); ?>

		<div id="content" class="<?php echo esc_attr( codeless_extra_classes( 'content' ) ) ?>" <?php echo codeless_extra_attr( 'content' ) ?> >

			<?php
        
            /**
             * Functions hooked into codeless_hook_content_begin action
             *
             * @hooked codeless_add_page_header                     - 0
             */
            codeless_hook_content_begin(); ?>
			
			
			<div class="inner-content <?php echo esc_attr( codeless_extra_classes( 'inner_content' ) ) ?>">
				
				<div class="inner-content-row <?php echo esc_attr( codeless_extra_classes( 'inner_content_row' ) ) ?>">
					
					<?php codeless_hook_content_column_before() ?>
					
					<div class="content-col <?php echo esc_attr( codeless_extra_classes( 'content_col' ) ) ?>">
				
						<?php codeless_hook_content_column_begin() ?>
						
						<?php
						
						    codeless_execute_query();
							
                			while ( have_posts() ) : the_post();
                
                				get_template_part( 'template-parts/page/content', 'page' );
                
                				// If comments are open or we have at least one comment, load up the comment template.
                				if ( comments_open() || get_comments_number() ) :
                					comments_template();
                				endif;
                
                			endwhile; // End of the loop.
			             ?>
			             
			             

						<?php codeless_hook_content_column_end() ?>

					</div><!-- .content-col -->
					
					<div class="cl-sidenav col-sm-4 col-sm-pull-8">

						<ul class="side-nav">

	                               
	                        <?php 
	                            if($post->post_parent) {
	                                $children = wp_list_pages("title_li=&child_of=".codeless_get_post_top_ancestor_id()."&echo=0");
	                              
	                            }else{
	                                $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
	                            }
	                            if ($children) { 
	                        ?>
	                              
	                                  
	                                  <?php echo wp_kses_post( $children ); ?>

	                             

	                            <?php } ?>
	                    </ul>

					</div><!-- .cl-sidenav -->


					<?php

                    /**
                     * Functions hooked into codeless_hook_content_column_after action
                     *
                     */
                    codeless_hook_content_column_after() ?>
					
				</div><!-- .row -->
				
			</div><!-- .inner-content -->

			
			
			<?php codeless_hook_content_end(); ?>
			
		</div><!-- #content -->

		<?php codeless_hook_content_after(); ?>

	</section><!-- #site-content -->
	
<?php get_footer(); ?>