<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$button_id = 'cl_btn_div' . str_replace( ".", '-', uniqid("", true) );



?>


<?php

if( $overwrite_style == 1 ){

	$extra_classes = 'cl-btn';

}else{
	$extra_classes = codeless_button_classes();
}

?>

<div class="cl-btn-div cl-element <?php echo esc_attr( $button_id ).' '.esc_attr( $this->generateClasses('.cl-btn-div') ) ?>" <?php  $this->generateStyle('.cl-btn-div', '', true) ?>>
	<a href="<?php echo esc_url( $link ) ?>" class="<?php echo esc_attr( $this->generateClasses('.cl-btn') ); ?> 
	<?php echo esc_attr( $extra_classes ); ?>" <?php $this->generateStyle('.cl-btn', '', true) ?> target="<?php echo esc_attr( $target ) ?>" > <span><?php echo cl_remove_empty_p( cl_remove_wpautop($btn_title, true) ) ?></span></a>
</div>


