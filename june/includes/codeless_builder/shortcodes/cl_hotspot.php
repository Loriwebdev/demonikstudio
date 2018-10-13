<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if( $text_font_family != 'theme_default' && $custom_typography ){
	$custom_font_link = add_query_arg( array(
		'family' => str_replace( '%2B', '+', urlencode( implode( '|', array( $text_font_family ) ) ) )
	), 'https://fonts.googleapis.com/css' );

	wp_enqueue_style( 'cl_google_font_'.str_replace(" ", '_', $text_font_family), $custom_font_link );
}

?>

<div class="cl_hotspot cl-element <?php echo esc_attr( $this->generateClasses('.cl_hotspot') ) ?>" <?php $this->generateStyle('.cl_hotspot', '', true) ?>>
	<div class="hotspot-icon">
		<div class="pulse"></div>
		<div class="dot2"></div>
		<div class="dot" <?php $this->generateStyle('.cl_hotspot .dot', '', true) ?>></div>
	</div>
	<div class="text <?php echo esc_attr( $this->generateClasses('.cl_hotspot .text') ) ?>" <?php $this->generateStyle('.cl_hotspot .text', '', true) ?> ><?php echo cl_remove_wpautop($content, true); ?></div>
</div>