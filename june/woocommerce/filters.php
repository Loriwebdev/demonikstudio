<?php
/**
 * Template part for displaying portfolio filter
 * Switch styles at Theme Options (WP Customizer)
 *
 *
 * @package june
 * @subpackage Templates
 * @since 1.0.0
 *
 */

?>

<?php 

	$extra_class = '';
	
?>
<div class="cl-filters <?php echo esc_attr( $extra_class ) ?> cl-filter-color-dark cl-shop-filter cl-filter-<?php echo esc_attr( codeless_get_mod( 'shop_filters' ) ) ?>">

<?php
	$categories = get_terms( 'product_cat' );
	$selected_category = codeless_get_mod( 'shop_selected_category', '' );
	
	if( !empty( $selected_category ) ){
		$IDbyNAME = get_term_by('slug', $selected_category, 'product_cat');
  		$product_cat_ID = $IDbyNAME->term_id;
		$args = array(
	       'hierarchical' => 1,
	       'show_option_none' => '',
	       'hide_empty' => 0,
	       'parent' => (int) $product_cat_ID,
	       'taxonomy' => 'product_cat'
	    );
	  $categories = get_categories($args);


	  echo '<h4>'. $IDbyNAME->name .'</h4>';

	}

?>	

	<div class="inner">

		
		<button data-filter="*" class="selected"><?php esc_html_e( 'All', 'june' ) ?></button>
		
		

		<?php foreach( $categories as $category ): ?>

	  	<button data-filter=".product_cat-<?php echo esc_attr( $category->slug ) ?>"><?php echo esc_attr( $category->name ) ?></button>

		<?php endforeach; ?>

	</div><!-- .inner -->

</div><!-- .cl-filters -->