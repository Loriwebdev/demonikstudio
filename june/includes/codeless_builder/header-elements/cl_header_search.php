<?php

extract($element['params']);


global $cl_from_element;

$cl_from_element['cl_header_search_style'] = $style;
?>

<div class="search-element <?php echo esc_attr( $this->generateClasses('.search-element') ); ?>">
	<?php if( (int) $quick_search ): ?>
		<?php codeless_get_quick_searches(4); ?>
	<?php endif; ?>

	<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

		<div class="search-input">
			<input type="search" id="<?php echo esc_attr( $unique_id ); ?>" class="search-field input-search-field" <?php $this->generateStyle( '.search-element .input-search-field', true ); ?> placeholder="<?php echo esc_attr__( 'Search Your Style', 'june' ); ?>" autocomplete="off" value="<?php echo get_search_query(); ?>" name="s" />
			<i class="cl-icon-magnify"></i>

			<div class="ajax-results"></div>
		</div>

		<?php if( $style == 'with_categories' ): ?>
			<?php $cats = array(); $categories = get_terms( 'product_cat', array( 'parent' => 0)); 
			if( !empty( $categories ) ){
				foreach($categories as $cat){
					$cats[] = $cat->term_id;
				}
			}
			wp_dropdown_categories( apply_filters( 'codeless_header_search_categories_params', array(
				'name' => 'clcat',
				'taxonomy' => 'product_cat',
				'hide_if_empty' => '1',
				'show_option_none' => esc_html__( 'All Categories', 'june' ),
				'include' => trim(implode(',', $cats), ',' )
			) ) ); ?>
			<input type="hidden" id="search_with_categories" name="header_search" value="search_with_categories" />
			<input type="hidden" name="post_type" value="product" />
		<?php endif; ?>
	</form>

</div>