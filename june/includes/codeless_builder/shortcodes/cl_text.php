<?php

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$output = '';
$text_id = 'cl_text_' . uniqid();

// Load Custom Font
if( $text_font_family != 'theme_default' && $custom_typography ){
	$custom_font_link = add_query_arg( array(
		'family' => str_replace( '%2B', '+', urlencode( implode( '|', array( $text_font_family ) ) ) )
	), 'https://fonts.googleapis.com/css' );

	wp_enqueue_style( 'cl_google_font_'.str_replace(" ", '_', $text_font_family), $custom_font_link );
}


?>

<div id="<?php echo esc_attr($text_id) ?>" class="cl-text cl-element <?php echo esc_attr( $this->generateClasses('.cl-text') ) ?>" <?php $this->generateStyle('.cl-text', '', true) ?>>

	<?php echo cl_remove_wpautop($content, true); ?>

</div>

<?php if( (int) $margin_paragraphs != 10 ):
	$this->addCustomCss( '#'.$text_id.' p{ margin-top:'.$margin_paragraphs.'; margin-bottom:'.$margin_paragraphs.'; }');
endif; ?>
