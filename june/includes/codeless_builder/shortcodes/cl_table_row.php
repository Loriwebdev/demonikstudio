<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>

<div class="cl-element cl_table_row">
	<span class="title"><?php echo cl_remove_wpautop($title) ?></span>
	<div class="text"><?php echo  cl_remove_wpautop($content) ?></div>
</div><!-- .cl_list_item -->