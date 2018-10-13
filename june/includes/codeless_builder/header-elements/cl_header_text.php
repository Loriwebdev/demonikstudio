<?php

extract($element['params']);


$output = '';


$output = '';
$text_id = 'cl_text_' . uniqid();


if( (int) $margin_paragraphs != 10 ){

	$custom_css = '#'.$text_id.' p{ margin-top: '.$margin_paragraphs.'; margin-bottom:'.$margin_paragraphs.'; }';
	$this->addCustomCss($custom_css);
}


// Load Custom Font
if( $text_font_family != 'theme_default' && $custom_typography ){
	$custom_font_link = add_query_arg( array(
		'family' => str_replace( '%2B', '+', urlencode( implode( '|', array( $text_font_family ) ) ) )
	), 'https://fonts.googleapis.com/css' );

	wp_enqueue_style( 'cl_google_font_'.$text_font_family, $custom_font_link );
}

?>


<div id="<?php echo esc_attr( $text_id ) ?>" class="cl-text <?php echo esc_attr( $this->generateClasses('.cl-text') ) ?>" <?php $this->generateStyle('.cl-text', true ) ?>>
	<?php if( isset($link) && !empty( $link ) ): ?>
	<a href="<?php echo esc_url($link) ?>">
	<?php endif; ?>
		<?php echo cl_remove_wpautop($content, true); ?>

	<?php if( isset($link) && !empty( $link ) ): ?>
	</a>
	<?php endif; ?>
</div>