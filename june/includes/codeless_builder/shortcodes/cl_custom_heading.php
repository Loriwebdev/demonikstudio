<?php

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$heading_id = 'cl_custom_heading_' . str_replace( ".", '-', uniqid("", true) );


// Load Custom Font
if( $text_font_family != 'theme_default' && $text_font_family != 'Helvetica Black'  && $typography == 'custom_font' ){
	$custom_font_link = add_query_arg( array(
		'family' => str_replace( '%2B', '+', urlencode( implode( '|', array( $text_font_family.':100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i' ) ) ) )
	), 'https://fonts.googleapis.com/css' );

	wp_enqueue_style( 'cl_google_font_'.str_replace(" ", '_', $text_font_family), $custom_font_link );
}

if( $text_font_family == 'Helvetica Black' ){
	wp_enqueue_style( 'cl_helvetica_black', get_template_directory_uri() . '/css/helvetica-black.css');
}

$output = '';

?>

<div class="cl-element wrapper-heading <?php echo esc_attr( $this->generateClasses('.wrapper-heading') ) ?>" <?php $this->generateStyle('.wrapper-heading', '', true) ?>>

	<?php if( $heading_with_icon ): ?>
	<i class="<?php echo esc_attr( $this->generateClasses('.wrapper-heading i') ) ?>" <?php $this->generateStyle('.wrapper-heading i') ?>></i>
	<?php endif; ?>

	<<?php echo esc_attr( $tag ) ?> id="<?php echo esc_attr( $heading_id ) ?>" class="cl-custom-heading cl-element <?php echo esc_attr( $this->generateClasses('.cl-custom-heading') ) ?>" <?php $this->generateStyle('.cl-custom-heading', '', true) ?>>

	<?php echo cl_remove_empty_p( cl_remove_wpautop($content, true) ) ?>
	</<?php echo esc_attr( $tag ) ?>>

	<?php if( $parallel_divider ): ?>
	<div class="divider"></div>
	<?php endif; ?>

</div>

<?php
/* Add Custom Typography for responsive */

if( ($custom_responsive_992_bool || $custom_responsive_768_bool) ): ?>

	<style type="text/css">

		<?php if( $custom_responsive_992_bool ): ?>
			@media (max-width:992px){ #<?php echo esc_attr( $heading_id ) ?>{ font-size:<?php echo wp_kses_post( $custom_responsive_992_size ) ?> !important; line-height:<?php echo wp_kses_post( $custom_responsive_992_line_height ) ?> !important; } }
		<?php endif; ?>

		<?php if( $custom_responsive_768_bool ): ?>
			@media (max-width:767px){ #<?php echo esc_attr( $heading_id ) ?>{ font-size:<?php echo wp_kses_post($custom_responsive_768_size) ?> !important; line-height:<?php echo esc_attr( $custom_responsive_768_line_height ) ?> !important; } }
		<?php endif; ?>
	</style>

<?php endif; ?>