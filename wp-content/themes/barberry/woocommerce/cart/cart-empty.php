<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

$page_id = barberry_page_ID();
$page_subtitle = get_field('tdl_subtitle', $page_id);


if ( wc_get_page_id( 'shop' ) > 0 ) : ?>


<!-- begin grid-x -->
<div class="grid-x cart-cells cart-cells-empty">
	
	<!-- begin cart-intro -->
	<div class="cart-intro cell large-3">
		<!-- begin page-title-wrapper -->
		<div class="title-wrapper">
			<!-- begin page-title-wrapper -->
			<div class="page-title-wrapper">
				<h1 class="page-title entry-title"><?php the_title();?></h1>
			</div>
			<!-- end .page-title-wrapper -->
			<?php if( $page_subtitle ): ?>
				<div class="term-description"><p><?php echo esc_attr( $page_subtitle ); ?></p></div>
			<?php endif; ?>	
		</div>
		<!-- end .title-wrapper -->	

		<a class="continue-shopping" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>"><?php esc_html_e( 'Continue shopping', 'woocommerce' ) ?></a>
	</div>
	<!-- end cart-intro -->	

	<!-- begin cart-items -->
	<div id="cart-items" class="cart-items cell medium-7 large-5">
		<?php do_action( 'woocommerce_before_cart' ); ?>
		<!-- begin page-title-wrapper -->
		<div class="title-wrapper">
			<!-- begin page-title-wrapper -->
			<div class="page-title-wrapper">
				<h1 class="page-title entry-title"><?php the_title();?> </h1>
			</div>
			<!-- end .page-title-wrapper -->
			<?php if( $page_subtitle ): ?>
				<div class="term-description"><p><?php echo esc_attr( $page_subtitle ); ?></p></div>
			<?php endif; ?>	
		</div>
		<!-- end .title-wrapper -->

		<div id="cart-form" class="woocommerce-cart-form cart-empty-section">
			<p class="cart-empty-text"><?php esc_html_e( 'Your cart is currently empty.', 'woocommerce' ) ?></p>
			
			<?php if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
				<p class="return-to-shop">
					<a class="button btn--border wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
						<?php esc_html_e( 'Return to shop', 'woocommerce' ); ?>
					</a>
				</p>
			<?php endif; ?>			
		</div>



		</form>

	</div>
	<!-- end cart-items -->

	<!-- begin cart-totals -->
	<div class="cart-totals cell medium-5 large-4" >

		<div class="cart-collaterals">

			<div class="cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">
				
				<h2><?php esc_html_e( 'Cart totals', 'woocommerce' ); ?></h2>

				<table cellspacing="0" class="shop_table shop_table_responsive">

					<tr class="cart-empty-tr">
						<td colspan="2"><?php esc_html_e( 'Your cart is currently empty.', 'woocommerce' ) ?></td>
					</tr>

					<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

					<tr class="order-total">
						<th><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
						<td data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>"><?php wc_cart_totals_order_total_html(); ?></td>
					</tr>

					<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

				</table>
			</div>							

		</div>			

	</div>
	<!-- end cart-totals -->

</div>
<!-- end grid-x -->





<?php do_action( 'woocommerce_after_cart' ); ?>


<?php endif; ?>
