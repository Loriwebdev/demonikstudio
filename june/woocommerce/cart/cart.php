<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

do_action( 'woocommerce_before_cart' ); 

?>



<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' ); ?>

	<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
		<thead>
			<tr>
				
				<th class="product-thumbnail"><?php esc_html_e( 'Item Info', 'june' ); ?></th>
				<th class="product-price"><?php esc_html_e( 'Price', 'june' ); ?></th>
				<th class="product-quantity"><?php esc_html_e( 'Quantity', 'june' ); ?></th>
				<th class="product-remove"><?php esc_html_e( 'Edit', 'june' ); ?></th>
				<th class="product-subtotal"><?php esc_html_e( 'Subtotal', 'june' ); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php do_action( 'woocommerce_before_cart_contents' ); ?>

			<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

						

						<td class="product-thumbnail">
							<?php
								$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

								if ( ! $product_permalink ) {
									echo codeless_complex_esc( $thumbnail );
								} else {
									printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
								}
							?>

							<div class="product-data">
							<?php
								if ( ! $product_permalink ) {
									echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;';
								} else {
									echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
								}

								?>

								<div class="data">
									<?php $meta = wc_get_formatted_cart_item_data( $cart_item );
									$shipped = get_post_meta( $product_id , '_product_attributes' );

									if( is_array( $shipped ) && isset( $shipped[0] ) ){

										$shipped = $shipped[0];
										if( isset( $shipped['sold-shipped-by'] ) )
											$shipped = $shipped['sold-shipped-by'];
										else if( isset( $shipped['sold-by'] ) )
											$shipped = $shipped['sold-by'];
									}

									

									if( $meta != '' ): ?>

									<div class="meta">
										<?php echo codeless_complex_esc( $meta ); ?>

									</div>

									<?php endif;

									// Backorder notification.
									if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) )		
										echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'june' ) . '</p>';


									?>



									

									<?php if( $_product->is_in_stock() ): ?>
										<div class="cl-info instock"><span class="in-stock"><i class="cl-icon_other-ok-circled"></i><?php esc_attr_e( 'In Stock', 'june' ); ?></span></div>
									<?php endif; ?>
								</div>

								<?php if( is_array($shipped) ): ?>

								<div class="data-extra">

								<?php	foreach( $shipped as $key => $data ):
											if( isset($data['is_visible']) && $data['is_visible'] && isset($data['is_variation']) && ! $data['is_variation'] )
											echo '<div class="sold-shipped-by"><span class="name">'. $data['name'] . ': </span><span>'.$data['value'].'</span></div>';
										endforeach; 
								?>

								</div>

								<?php endif; ?>


								<div class="wishlist add_to_wishlist_button">
									<a href="<?php echo esc_url( add_query_arg( array( 'add_to_wishlist' => $product_id, 'move_to_wishlist' => $cart_item_key) ) ) ?> " data-product-id="<?php echo esc_attr( $product_id ) ?>" data-product-type="<?php echo esc_attr( $_product->get_type() )  ?>" class="cl-action"><?php esc_html_e('Move to Wishlist', 'june') ?><i class="cl-icon-heart-outline"></i></a>
								</div>

							</div>

						</td>

						<td class="product-price" data-title="<?php esc_html_e( 'Price', 'june' ); ?>">
							<span class="price">
							<?php
								echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
							?>
							</span>
							<?php
							
								if( $_product->get_sale_price() )
									echo '<span class="off">'. codeless_woo_percent_off( $_product ) . '</span>';
							?>

						</td>

						<td class="product-quantity" data-title="<?php esc_html_e( 'Quantity', 'june' ); ?>">
							<?php
								if ( $_product->is_sold_individually() ) {
									$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
								} else {
									$product_quantity = woocommerce_quantity_input( array(
										'input_name'  => "cart[{$cart_item_key}][qty]",
										'input_value' => $cart_item['quantity'],
										'max_value'   => $_product->get_max_purchase_quantity(),
										'min_value'   => '0',
									), $_product, false );
								}

								echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
							?>
						</td>

						<td class="product-edit" data-title="<?php esc_html_e( 'Edit', 'june' ); ?>">
							<div class="submit_div">
								<input type="submit" class="update_item_submit button <?php echo codeless_button_classes(array('btn-square-forced')) ?>" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'june' ); ?>" />
								<i class="cl-icon-autorenew"></i>
							</div>

							<?php

								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
									'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="cl-icon-delete"></i></a>',
									esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
									__( 'Remove this item', 'june' ),
									esc_attr( $product_id ),
									esc_attr( $_product->get_sku() )
								), $cart_item_key );
							?>
						</td>

						<td class="product-subtotal" data-title="<?php esc_html_e( 'Total', 'june' ); ?>">
							<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
							?>
						</td>
					</tr>
					<?php
				}
			}
			?>

			<?php do_action( 'woocommerce_cart_contents' ); ?>

			<tr>
				<td colspan="6" class="actions">

					<?php if ( wc_coupons_enabled() ) { ?>
						<div class="coupon">
							<label for="coupon_code"><i class="cl-icon-tag-text-outline"></i><?php esc_html_e( 'Got a Coupon? Apply Here!', 'june' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'june' ); ?>" /> <input type="submit" class="button <?php echo codeless_button_classes() ?>" name="apply_coupon" value="<?php esc_attr_e( 'Apply', 'june' ); ?>" />
							<?php do_action( 'woocommerce_cart_coupon' ); ?>
						</div>
					<?php } ?>

					

					<?php do_action( 'woocommerce_cart_actions' ); ?>

					<?php wp_nonce_field( 'woocommerce-cart' ); ?>

					<div class="cart-collaterals">
						<?php
							/**
							 * woocommerce_cart_collaterals hook.
							 *
							 * @hooked woocommerce_cross_sell_display
							 * @hooked woocommerce_cart_totals - 10
							 */
						 	do_action( 'woocommerce_cart_collaterals' );
						?>
					</div>
				</td>

			</tr>

			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
		</tbody>
	</table>
	<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>



<?php do_action( 'woocommerce_after_cart' ); ?>