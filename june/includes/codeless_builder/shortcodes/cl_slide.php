<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$extra_style = '';

if( codeless_get_mod( 'cl_slider_centered_carousel', false ) ){
	$cl_slider_slide_max_width = codeless_get_mod( 'cl_slider_slide_max_width', 1300 );
	$extra_style .= 'style="width:'.$cl_slider_slide_max_width.'px"';
}

?>
<div class="swiper-slide cl-slide <?php echo esc_attr( $this->generateClasses('.cl-slide') ); ?>" <?php echo codeless_complex_esc( $extra_style ) ?>>
       <?php echo cl_remove_wpautop($content); ?>

       <?php if( $add_scroll_svg ): ?>

       		<?php codeless_get_extra_template( 'slider_scroll_svg' ) ?>

       <?php endif; ?>

</div>