<?php
/**
 * Portfolio Single Item Template
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

        <?php 

        /**
         * Functions hooked into codeless_hook_content_before action for single portfolio
         *
         * @hooked codeless_single_portfolio_navigation                     - 0   
         */
        codeless_hook_content_before(); ?>


        <div id="content" class="<?php echo esc_attr( codeless_extra_classes( 'content' ) ) ?>" <?php echo codeless_extra_attr( 'content' ) ?> >

            <?php
        
            /**
             * Functions hooked into codeless_hook_content_begin action
             *
             * @hooked codeless_add_page_header                     - 0
             * @hooked codeless_add_post_header                     - 10
             * @hooked codeless_layout_modern                       - 20
             * @hooked codeless_blog_filterable                     - 30
             */
            codeless_hook_content_begin(); ?>
            
            
            <?php 

            /**
             * Check if its neccesary to add Inner Content Container or not
             * If page is generated from Codeless Builder or Visual Composer, its not neccesary
             * If a custom page layout is set and is different from fullwidth, add the necessary html
             */
            
            if( codeless_is_inner_content() ): ?>
            
            <div class="inner-content <?php echo esc_attr( codeless_extra_classes( 'inner_content' ) ) ?>">
                
                <div class="inner-content-row <?php echo esc_attr( codeless_extra_classes( 'inner_content_row' ) ) ?>">
                    
                    <?php codeless_hook_content_column_before() ?>
                    
                    <div class="content-col <?php echo esc_attr( codeless_extra_classes( 'content_col' ) ) ?>">
                
                        <?php codeless_hook_content_column_begin() ?>

            <?php endif; ?>
                    
                        
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
                         
                         
                    
            <?php if( codeless_is_inner_content()  ): ?>

                        <?php codeless_hook_content_column_end() ?>

                    </div><!-- .content-col -->
                    
                    <?php
        
                    /**
                     * Functions hooked into codeless_hook_content_column_after action
                     *
                     * @hooked codeless_get_sidebar                     - 0
                     */
                    codeless_hook_content_column_after() ?>
                    
                </div><!-- .row -->
                
            </div><!-- .inner-content -->
            
            <?php endif; ?>

            
            
            <?php codeless_hook_content_end(); ?>
            
        </div><!-- #content -->

        <?php codeless_hook_content_after(); ?>

    </section><!-- #site-content -->
    
<?php get_footer(); ?>