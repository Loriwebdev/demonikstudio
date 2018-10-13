<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>

<div class="cl_chart <?php echo esc_attr( $this->generateClasses('.cl_chart') ) ?>" <?php $this->generateStyle('.cl_chart', '', true) ?>>
	<?php echo cl_remove_wpautop('[visualizer id="'. $charts .'" ]'); ?>
</div>