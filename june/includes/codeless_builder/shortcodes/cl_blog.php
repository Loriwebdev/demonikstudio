<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );

extract( $atts );
                   
wp_reset_postdata();

// Element ID
$blog_id = 'cl_blog_' . str_replace( ".", '-', uniqid("", true) );


if( $carousel )
    wp_enqueue_style('owl-carousel', CODELESS_BASE_URL.'css/owl.carousel.min.css' );

/* Image Filters */
if( $image_filter != 'normal' )
    wp_enqueue_style('codeless-image-fitlers', CODELESS_BASE_URL.'css/codeless-image-filters.css' );

// Vars of portfolio
$categories = cl_atts_to_array($categories);

$posts_per_page_ = (int) $posts_per_page;
// Blog News Posts Per page
if( $blog_style == 'news' && $blog_news == 'grid_1' )
	$posts_per_page_ = 4;
if( $blog_style == 'news' && $blog_news == 'grid_2' )
	$posts_per_page_ = 5;
if( $blog_style == 'news' && $blog_news == 'grid_3' )
	$posts_per_page_ = 4;


// Build New Query
$new_query = array( 'orderby'   => $orderby, 
                    'order'     => $order,
                    'posts_per_page' => $posts_per_page
); 

if( ! empty( $categories ) && is_array( $categories ) && count( $categories ) > 0 && !empty($categories[0]) )
	$new_query['cat'] = $categories;

$paged_attr = 'paged';

if( is_front_page() )
	$paged_attr = 'page';

if( get_query_var( $paged_attr ) )
	$new_query['paged'] = get_query_var( $paged_attr );


/* Used for related posts */

if( isset( $related ) && (int) $related != 0 ){
	$tags = wp_get_post_tags($related);
	if ($tags){
		$first_tag = $tags[0]->term_id;
		$new_query = array( 
			'tag__in' => array($first_tag),
			'post__not_in' => array($related),
			'posts_per_page' => $posts_per_page,
			'ignore_sticky_posts'=>1
		);
	}
}
	

global $cl_from_element;

if( $blog_style == 'masonry' ){
	$blog_style = 'grid';
	$cl_from_element['blog_masonry'] = true;
}

// Live Filters

if( $blog_filters ){
	if( isset($_GET['blog_sort_by']) ){
		$blog_sort_by = $_GET['blog_sort_by'];

		if( $blog_sort_by == 'newest' || $blog_sort_by == '' ){
			$new_query['orderby'] = 'date';
			$new_query['order'] = 'DESC';
		}

		if( $blog_sort_by == 'oldest' ){
			$new_query['orderby'] = 'date';
			$new_query['order'] = 'ASC';
		}

		if( $blog_sort_by == 'comments' ){
			$new_query['orderby'] = 'comment_count';
			$new_query['order'] = 'DESC';
		}

		if( $blog_sort_by == 'reads' ){
			$new_query['orderby'] = 'meta_value_num';
			$new_query['meta_key'] = '_codeless_post_like';
			$new_query['order'] = 'DESC';
		}

		if( $blog_sort_by == 'popular' ){
			$new_query['orderby'] = 'meta_value_num';
			$new_query['meta_key'] = '_codeless_share_count';
			$new_query['order'] = 'DESC';

		}
		
	}

}

$cl_from_element['blog_style'] = $blog_style;
$cl_from_element['blog_grid_layout'] = $blog_grid_layout;
$cl_from_element['blog_pagination'] = $blog_pagination;
$cl_from_element['blog_distance'] = $distance;
$cl_from_element['blog_button_style'] = $blog_pagination;
$cl_from_element['blog_animation'] = $blog_pagination;
$cl_from_element['blog_excerpt_length'] = 29;
$cl_from_element['blog_animation'] = $blog_animation;
$cl_from_element['blog_news'] = $blog_news;
$cl_from_element['blog_image_filter'] = $image_filter;
$cl_from_element['blog_lazyload'] = $blog_image_lazyload;
$cl_from_element['blog_from_element'] = true;
$cl_from_element['blog_image_size'] = $image_size;
$cl_from_element['blog_related_posts'] = $related;

if( $blog_style == 'masonry' ){
	$cl_from_element['blog_entry_meta_author'] = false;
    $cl_from_element['blog_entry_meta_categories'] = false;
}


add_filter( 'excerpt_length', 'codeless_custom_excerpt_length', 999 );

$the_query = new WP_Query( $new_query );

						
// Display posts
if ( $the_query->have_posts() ) :
								
?>
<?php $extra_style = ' margin-left:-'.$distance.'px; margin-right:-'.$distance.'px; '; ?>

<div id="<?php echo esc_attr( $blog_id ) ?>" class="cl_blog cl-element <?php echo esc_attr( $this->generateClasses('.cl_blog') ) ?>" <?php $this->generateStyle('.cl_blog', $extra_style, true) ?>>

	
	<?php if( $blog_filters ): ?>	
		<div class="blog-filters">


			<?php if( $blog_style == 'grid' || $blog_style == 'masonry' ): ?>

				<div class="grid-options">
					<label><?php esc_attr_e('Show', 'june') ?></label>
					<div>
						<a class="<?php if( $blog_grid_layout == 2 ) echo 'active'; ?>" data-grid-cols="2" href="#">2</a>
						<a class="<?php if( $blog_grid_layout == 3 ) echo 'active'; ?>" data-grid-cols="3" href="#">3</a>
						<a class="<?php if( $blog_grid_layout == 4 ) echo 'active'; ?>" data-grid-cols="4" href="#">4</a>
					</div>
				</div>

			<?php endif; ?>


			<div class="title">
				<h2><?php echo esc_attr($blog_title); ?></h2>
			</div>

			<?php if( $blog_style == 'grid' || $blog_style == 'masonry' ): ?>
				
				<div class="sort-options">
					<div>
						<span><?php esc_attr_e('Sort by', 'june') ?></span>
						<select id="blog_sort_by" data-url="<?php echo get_permalink() ?>">
								
							<option <?php if( $blog_sort_by == 'newest' || $blog_sort_by == '' ) echo 'selected' ?> value="newest">Newest First</option>
							<option <?php if( $blog_sort_by == 'popular' ) echo 'selected' ?> value="popular">Popularity</option>
							<option <?php if( $blog_sort_by == 'reads' ) echo 'selected' ?> value="reads">Reads</option>
							<option <?php if( $blog_sort_by == 'oldest' ) echo 'selected' ?> value="oldest">Oldest First</option>
							<option <?php if( $blog_sort_by == 'comments' ) echo 'selected' ?> value="comments">Most Comments</option>

						</select>
					</div>
				</div>

			<?php endif; ?>

		</div> 

	<?php endif; ?>



	<div class="blog-entries <?php echo esc_attr( $this->generateClasses('.cl_blog > .blog-entries') ) ?> <?php echo esc_attr( codeless_extra_classes( 'blog_entries' ) ) ?>" <?php echo codeless_extra_attr( 'blog_entries' ) ?> <?php  $this->generateStyle('.cl_blog > .blog-entries', '', true) ?>>
		
	

	<?php
									
		// Loop counter
		$i = 0;
		codeless_loop_counter($i);						
		// Start loop
		while ( $the_query->have_posts() && $posts_per_page_ >= ( $i + 1 ) ) : $the_query->the_post();
			
			if( ! has_post_thumbnail() && ( $blog_style == 'media' || $blog_style == 'news' ) )
				continue;

			codeless_loop_counter(++$i);	
			/*
			 * Get Blog Template Style
			 * Codeless_blog_style returns the style selected
			 * from Theme Options or a custom filter
			 */
			get_template_part( 'template-parts/blog/style', codeless_blog_style() );
				
		// End loop
		endwhile; ?>
				
	</div><!-- #blog-entries -->
				
	<?php
		// Display post pagination (next/prev - 1,2,3,4..)
		if( $blog_pagination )
			codeless_blog_pagination( $the_query ) ; 
		wp_reset_postdata();
	?>
	</div><!-- .cl_blog -->
	<?php				
	else : ?>
				
		<div class="content-none"><?php esc_html_e( 'No Posts found.', 'june' ); ?></div>
				
	<?php endif; ?>
