<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if( !class_exists('WooCommerce') )
	return;

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$sort = cl_atts_to_array($sort);

                   
wp_reset_query();

// Element ID
$element_id = uniqid();

// Set Query

// Set some global vars for use with codeless_get_from_element or directly from cl_get_option
global $cl_from_element;
$cl_from_element['shop_product_style'] = $product_style;
$cl_from_element['shop_columns'] = $columns;

$cl_from_element['shop_carousel'] = $carousel;
$cl_from_element['shop_carousel_nav'] = true;

/* Add Custom Styles */
wp_enqueue_style('codeless-woocommerce', CODELESS_BASE_URL.'css/codeless-woocommerce.css' );

if( $carousel )
    wp_enqueue_style('owl-carousel', CODELESS_BASE_URL.'css/owl.carousel.min.css' );

if( isset( $_GET['use_for_ajax'] ) ){
	$operation = $_GET['use_for_ajax'];

	echo '<div class="used_for_ajax">';

		echo '<div class="tab">';
	
	if( $operation == 'featured' )
		echo do_shortcode( '[featured_products per_page="'.(int) $per_page.'" columns="4"]' );
	else if( $operation == 'top_sellers' )
		echo do_shortcode( '[best_selling_products per_page="'.(int) $per_page.'" columns="4"]' );
	else if( $operation == 'recent' )
		echo do_shortcode( '[recent_products per_page="'.(int) $per_page.'" columns="4"]' );

		echo '</div>';

	echo '</div>';

	exit();
}                     

// Start displaying WooCommerce Element                            
?>
<div id="<?php echo esc_attr( $element_id ) ?>" class="cl_shop_tabbed <?php echo esc_attr( $this->generateClasses('.cl_shop_tabbed') ) ?> cl-element" <?php $this->generateStyle('.cl_shop_tabbed', '', true) ?> >
	

	<ul class="tabbed-tabs">
		<?php  $first_tab = 'featured'; if( isset($sort) && is_array( $sort ) ): 
			$i = 0;
		
			$map = array(
				'featured' => esc_html__( 'FEATURED', 'june'),
				'recent' => esc_html__( 'NEW ARRIVALS', 'june'),
				'top_sellers' => esc_html__( 'TOP SELLERS', 'june'),
			);
			foreach( $sort as $option ): $i = $i+1; $active = ''; if( $i == 1 ){ $active = 'active'; $first_tab = $option; } ?>

				<li class="<?php echo esc_attr( $active ) ?>"><a data-load="<?php echo esc_attr( $option ) ?>" href="#" class="h5"><?php echo esc_attr( $map[$option] ); ?></a></li>

		<?php
			endforeach;
		?>

		<?php else: ?>
			<li class="active"><a data-load="featured" href="#" class="h5"><?php esc_html_e( 'FEATURED', 'june' ) ?></a></li>
			<li><a data-load="recent" href="#" class="h5"><?php esc_html_e( 'NEW ARRIVALS', 'june' ) ?></a></li>
			<li><a data-load="top_sellers" href="#" class="h5"><?php esc_html_e( 'TOP SELLERS', 'june' ) ?></a></li>
		<?php endif; ?>
	</ul>

	<div class="shop_tabbed_content">
		<div class="tab">
			<?php 
				$actived_first_tab = 'featured_products';

				if( $first_tab == 'featured' )
					$actived_first_tab = 'featured_products';
				elseif( $first_tab == 'recent' )
					$actived_first_tab = 'recent_products';
				elseif( $first_tab == 'top_sellers' )
					$actived_first_tab = 'best_selling_products';

			?>
			<?php echo do_shortcode( '['.$actived_first_tab.' per_page="'.$per_page.'" columns="'.$columns.'"]' ); ?>
		</div>
	</div>

</div><!-- .cl_woocommerce -->