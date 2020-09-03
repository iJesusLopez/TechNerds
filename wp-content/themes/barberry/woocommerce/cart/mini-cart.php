<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

$items_to_show = 30;

do_action( 'woocommerce_before_mini_cart' ); ?>

<div class="shopping-cart-widget-body nano">
	<div class="nano-content">

		<?php if ( ! WC()->cart->is_empty() ) : ?>
			
			<ul class="cart_list product_list_widget woocommerce-mini-cart <?php echo esc_attr( $args['list_class'] ); ?>">

				<?php
					do_action( 'woocommerce_before_mini_cart_contents' );

					$_i = 0;
					foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
						$_i++;
						if( $_i > $items_to_show ) break;
						
						$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

						if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
							$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
							$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
							$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
							$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
							?>
							<li class="woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">

								<div class="mini-cart-thumbnail">
								<?php
									echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
										'<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">&times;</a>',
										esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
										esc_html__( 'Remove this item', 'woocommerce' ),
										esc_attr( $product_id ),
										esc_attr( $cart_item_key ),
										esc_attr( $_product->get_sku() )
									), $cart_item_key );
								?>
								
									<?php if ( empty( $product_permalink ) ) : ?>
										<?php echo wp_kses( $thumbnail, array( 'img' => array('class' => true,'width' => true,'height' => true,'src' => true,'alt' => true) ) ); ?>
									<?php else : ?>
										<a href="<?php echo esc_url( $product_permalink ); ?>" class="cart-item-image">
										<?php echo wp_kses( $thumbnail, array( 'img' => array('class' => true,'width' => true,'height' => true,'src' => true,'alt' => true) ) ); ?>
										</a>
									<?php endif; ?>
								</div>
								
								<div class="mini-cart-content">

									<div class="mini-cart-title">

										<a href="<?php echo esc_url( $product_permalink ); ?>">
											<?php echo esc_attr($product_name); ?>
										</a>

										<?php 
											echo wc_get_formatted_cart_item_data( $cart_item );
										?>

										<div class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
											<?php
											if ( $_product->is_sold_individually() ) {
												$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
											} else {
												$product_quantity = woocommerce_quantity_input(
													array(
														'input_name'   => "cart[{$cart_item_key}][qty]",
														'input_value'  => $cart_item['quantity'],
														'max_value'    => $_product->get_max_purchase_quantity(),
														'min_value'    => '0',
														'product_name' => $_product->get_name(),
													),
													$_product,
													false
												);
											}

											echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
											?>												
										</div>
			
									</div>

								<?php
									echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
								?>
								</div>

							</li>
							<?php
						}
					}

					do_action( 'woocommerce_mini_cart_contents' );

				?>
			</ul><!-- end product list -->
			
		<?php else : ?>

			<!-- begin mini-cart-no-products -->
			<div class="mini-cart-no-products">
				<h4 class="woocommerce-mini-cart__empty-message empty"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></h4>
				<?php if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
					<p class="return-to-shop">
						<a class="button wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
							<?php esc_html_e( 'Return to shop', 'woocommerce' ); ?>
						</a>
					</p>
				<?php endif; ?>				
			</div>
			<!-- end mini-cart-no-products -->



		<?php endif; ?>

	</div>
</div>

<div class="shopping-cart-widget-footer">
	<?php if ( ! WC()->cart->is_empty() ) : ?>

		<hr class="cart-horizontal-rule">

		<p class="woocommerce-mini-cart__total total">
			<?php
			/**
			 * Woocommerce_widget_shopping_cart_total hook.
			 *
			 * @hooked woocommerce_widget_shopping_cart_subtotal - 10
			 */
			do_action( 'woocommerce_widget_shopping_cart_total' );
			?>
		</p>

		<?php do_action('barberry_subtotal_free_shipping'); ?>

		<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

		<p class="woocommerce-mini-cart__buttons buttons">
			

			<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="button wc-forward cart-but"><span><?php esc_html_e( 'View cart', 'woocommerce' ); ?></span></a><a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="button btn-blk checkout wc-forward"><span><?php esc_html_e( 'Checkout', 'woocommerce' ); ?></span></a>

		</p>

	<?php endif; ?>

	<?php do_action( 'woocommerce_after_mini_cart' ); ?>
</div>
