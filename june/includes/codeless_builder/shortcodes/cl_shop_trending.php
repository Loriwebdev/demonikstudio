<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if( !class_exists('WooCommerce') )
	return;

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
                   
wp_reset_query();

// Element ID
$element_id = uniqid();
global $cl_from_element;
$cl_from_element['shop_columns'] = $columns;
$cl_from_element['shop_carousel'] = true;
$cl_from_element['shop_carousel_nav'] = true;

/* Add Custom Styles */
wp_enqueue_style('codeless-woocommerce', CODELESS_BASE_URL.'css/codeless-woocommerce.css' );
wp_enqueue_style('owl-carousel', CODELESS_BASE_URL.'css/owl.carousel.min.css' );

                     

// Start displaying WooCommerce Element                            
?>
<div id="<?php echo esc_attr( $element_id ) ?>" class="cl_shop_trending <?php echo esc_attr( $this->generateClasses('.cl_shop_trending') ) ?> cl-element" <?php $this->generateStyle('.cl_shop_trending', '', true) ?> >

	<?php 
		$ids = '';
		$categories = cl_atts_to_array( $categories );
		if( is_array( $categories ) )
			$ids = implode( ',', $categories );
		echo do_shortcode( '[product_categories ids="'.$ids.'"]' ); 
		
	?>

</div><!-- .cl_woocommerce -->




