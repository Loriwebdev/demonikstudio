<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$list_id = 'cl_pricelist_' . uniqid();

?>

<div id="<?php echo esc_attr( $list_id ) ?>" class="cl-element cl_pricelist <?php echo esc_attr( $this->generateClasses('.cl_pricelist') ) ?>" <?php $this->generateStyle('.cl_pricelist', '', true) ?>>

	<div class="header panel">
		<h4><?php echo cl_remove_wpautop( $title ) ?></h4>
	</div><!-- .header -->

	<div class="price panel">
		<div class="content">
			<span class="currency"><?php echo cl_remove_wpautop( $currency ) ?></span>
			<span class="integer-part"><?php echo cl_remove_wpautop( $price ) ?></span>
			<sup class="decimal-part"><?php echo cl_remove_wpautop( $price_decimal ) ?></sup>
			<span class="time"><?php echo cl_remove_wpautop( $time ) ?></span>
		</div>
	</div><!-- .price -->

	<ul class="list-wrapper">

		<?php echo cl_remove_wpautop($content); ?>

	</ul><!-- .list-wrapper -->

	<div class="footer panel">
		<a href="<?php echo esc_url( $link ) ?>" class="<?php echo codeless_button_classes(); ?>"><span><?php echo cl_remove_empty_p( cl_remove_wpautop($btn_title, true) ) ?></span></a>
	</div><!-- .footer -->

</div><!-- .cl_pricelist -->