<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
                   
wp_reset_postdata();

if( get_post_type() != 'portfolio' )
	return;

?>

<?php if( $style == 'simple' ): ?>

<div class="portfolio-navigation simple" <?php $this->generateStyle('.portfolio-navigation', '', true) ?>>

	<?php if( is_object( get_previous_post() ) || is_object( get_next_post() ) ): ?>

        <?php $show_left = ''; if( !is_object( get_previous_post() ) ) $show_left = 'hide_link'; ?>


            <a class="cl-icon-arrow-left portfolio_single_left <?php echo esc_attr( $show_left ) ?>" href="<?php echo get_permalink(get_previous_post()->ID); ?>">
                                
                <span><?php esc_attr_e('Previous Project', 'june' ) ?></span>

            </a>                    


        	<a class="cl-icon-apps main_portfolio" href="<?php echo get_permalink( codeless_get_mod( 'portfolio_main_page', 0 ) ); ?>"></a>


        <?php $show_right = ''; if( !is_object( get_next_post() ) ) $show_right = 'hide_link'; ?>

            <a class="cl-icon-arrow-right portfolio_single_right <?php echo esc_attr( $show_right ) ?>" href="<?php echo get_permalink(get_next_post()->ID); ?>">
                                
                <span><?php esc_attr_e('Next Project', 'june' ) ?></span>

            </a>  

    <?php endif; ?>

</div><!-- .portfolio-navigation -->

<?php endif; ?>


<?php if( $style == 'modern' ): ?>

	<div class="portfolio-navigation modern light-text" <?php $this->generateStyle('.portfolio-navigation', '', true) ?>>

		<?php if( is_object( get_previous_post() ) || is_object( get_next_post() ) ): ?>

        <?php $show_left = ''; if( !is_object( get_previous_post() ) ) $show_left = 'hide_link'; ?>

        	<div class="single-link left <?php echo esc_attr( $show_left ) ?>" style="background:url('<?php echo get_the_post_thumbnail_url( get_previous_post()->ID ); ?>') no-repeat center;">

	            <a class="cl-icon-arrow-left portfolio_single_left <?php echo esc_attr( $show_left ) ?>" href="<?php echo get_permalink(get_previous_post()->ID); ?>">
	                                
	                <span><?php esc_attr_e('Previous Project', 'june' ) ?></span>

	            </a>

	            <h4><?php echo get_the_title(get_previous_post()->ID); ?></h4>                    


        		<a class="cl-icon-apps main_portfolio" href="<?php echo get_permalink( codeless_get_mod( 'portfolio_main_page', 0 ) ); ?>">
        			<span><?php esc_attr_e('All Projects', 'june' ) ?></span>
        		</a>

        	</div>


        <?php $show_right = ''; if( !is_object( get_next_post() ) ) $show_right = 'hide_link'; ?>

            <div class="single-link right <?php echo esc_attr( $show_right ) ?>" style="background:url('<?php echo get_the_post_thumbnail_url( get_next_post()->ID ); ?>') no-repeat center;">

	            <a class="cl-icon-arrow-right portfolio_single_right <?php echo esc_attr( $show_right) ?>" href="<?php echo get_permalink(get_next_post()->ID); ?>">
	                                
	                <span><?php esc_attr_e('Next Project', 'june' ) ?></span>

	            </a>

	            <h4><?php echo get_the_title(get_next_post()->ID); ?></h4>                    


				<a class="cl-icon-apps main_portfolio" href="<?php echo get_permalink( codeless_get_mod( 'portfolio_main_page', 0 ) ); ?>">
        			<span><?php esc_attr_e('All Projects', 'june' ) ?></span>
        		</a>

        	</div>  

    <?php endif; ?>

	</div>

<?php endif; ?>

