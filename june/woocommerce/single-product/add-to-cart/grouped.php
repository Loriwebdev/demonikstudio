<?php
/**
 * Grouped product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/grouped.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.4.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product, $post;

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="cart" method="post" enctype='multipart/form-data'>
	<table cellspacing="0" class="group_table">
		<tbody>
			<?php
				$quantites_required = false;
				$previous_post      = $post;

				foreach ( $grouped_products as $grouped_product ) {
					$post_object        = get_post( $grouped_product->get_id() );
					$quantites_required = $quantites_required || ( $grouped_product->is_purchasable() && ! $grouped_product->has_options() );

					setup_postdata( $post =& $post_object );
					?>
					<tr id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php $img = get_the_post_thumbnail_url( $grouped_product->get_id(), $image_size ); ?>

						<?php if( $img !== false ): ?>
							<td class="thumb">
								<?php

								// Added Codeless
								$image_size = apply_filters( 'single_product_archive_thumbnail_size', 'thumbnail' );
	  							echo '<img src="' . get_the_post_thumbnail_url( $grouped_product->get_id(), $image_size ) . '" />';

	  							?>
							</td>
						<?php endif; ?>
						
						<td class="label">
							<label for="product-<?php echo esc_attr( $grouped_product->get_id() ); ?>">
								<?php if( $grouped_product->is_visible() ){ ?>

									<?php echo '<a href="' . esc_url( apply_filters( 'woocommerce_grouped_product_list_link', get_permalink( $grouped_product->get_id() ), $grouped_product->get_id() ) ) . '">' . $grouped_product->get_name() . '</a>' ?>
									
								<?php }else{ ?>

									<?php echo wp_kses_post( $grouped_product->get_name() ); ?>

								<?php } ?>
							</label>

							<div class="price">
							<?php
								echo codeless_complex_esc( $grouped_product->get_price_html() );
								echo wc_get_stock_html( $grouped_product );
							?>
							</div>
						</td>

						<td class="button_cart">

							<?php
								$quick_view = '';

					            if( codeless_get_mod( 'shop_quick_view', true ) )
					                $quick_view = 'cl-quick-view';
				            ?>

							<a href="<?php echo esc_url( get_permalink( $grouped_product->get_id() ) ); ?>" class="button product_type_variable add_to_cart_button <?php echo esc_attr($quick_view); ?>" data-id="<?php echo esc_attr( $grouped_product->get_id() ) ?>"><?php esc_html_e('Select Options', 'june'); ?></a>

							
						</td>						
					</tr>
					<?php
				}
				// Return data to original post.
				setup_postdata( $post =& $previous_post );
			?>
		</tbody>
	</table>

	<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" />

	<?php if ( $quantites_required ) : ?>

		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<button type="submit" class="single_add_to_cart_button button alt <?php echo codeless_button_classes() ?>"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	<?php endif; ?>
</form>

<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
