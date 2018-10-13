<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>

<div class="cl-element cl_mailchimp <?php echo esc_attr( $this->generateClasses('.cl_mailchimp') ) ?>" <?php $this->generateStyle('.cl_mailchimp', '', true) ?>>

<?php

if( function_exists( 'mc4wp_show_form' ) ) {
	mc4wp_show_form();
}

?>

</div>