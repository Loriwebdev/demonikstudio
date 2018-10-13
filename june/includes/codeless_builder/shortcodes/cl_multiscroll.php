<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_style('multiscroll', CODELESS_BASE_URL . 'css/jquery.multiscroll.min.css');

$posts_array = get_posts(
    array(
        'posts_per_page' => -1,
        'post_type' => 'multiscroll',
        'tax_query' => array(
            array(
                'taxonomy' => 'multiscroll_slider',
                'field' => 'term_id',
                'terms' => $slider,
            )
        )
    )
);

// Load Custom Font
if( $text_font_family != 'theme_default' ){
	$custom_font_link = add_query_arg( array(
		'family' => str_replace( '%2B', '+', urlencode( implode( '|', array( $text_font_family ) ) ) )
	), 'https://fonts.googleapis.com/css' );

	wp_enqueue_style( 'cl_google_font_'.str_replace(" ", '_', $text_font_family), $custom_font_link );
}

$left_output = $right_output = '';

if( !empty( $posts_array ) ){
	foreach( $posts_array as $post ){
		$layout = get_post_meta( $post->ID, 'multiscroll_layout' , true);

		$content = apply_filters('the_content', $post->post_content);
		$content = str_replace(']]>', ']]&gt;', $content);

		if( $layout == 'left_right' ){
			$left_output .= '<div class="ms-section">';
				$left_output .= '<div class="content">' . $content . '</div>';
			$left_output .= '</div>';

			$right_output .= '<div class="ms-section" style="background-image:url('.get_the_post_thumbnail_url( $post->ID, 'full' ).');"></div>';
		}

		if( $layout == 'right_left' ){
			$right_output .= '<div class="ms-section">';
				$right_output .= '<div class="content">' . $content . '</div>';
			$right_output .= '</div>';

			$left_output .= '<div class="ms-section" style="background-image:url('.get_the_post_thumbnail_url( $post->ID, 'full' ).'); background-repeat:no-repeat; background-size:cover;"></div>';
		}
	}
}

?>

<div class="multiscroll" <?php $this->generateStyle('.multiscroll', '', true); ?> >

	<div class="ms-left">
		<?php echo codeless_complex_esc( $left_output ); ?>
	</div>
	<div class="ms-right">
		<?php echo codeless_complex_esc( $right_output ); ?>
	</div>

	<div class="slider-navigation" style="">
		<span class="up"><i class="cl-icon-chevron-up"></i></span>
		<span class="down"><i class="cl-icon-chevron-down"></i></span>
	</div>

</div>