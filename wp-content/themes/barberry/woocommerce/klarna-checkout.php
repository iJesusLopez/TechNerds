<?php
/**
 * Klarna Checkout page
 *
 * Overrides /checkout/form-checkout.php.
 *
 * @package klarna-checkout-for-woocommerce
 */


// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}
?>

<!-- begin checkout-wrapper -->
<div class="checkout-wrapper">

	<form name="checkout" class="checkout woocommerce-checkout">

	<!-- begin grid-x checkout-cells -->
	<div class="grid-x checkout-cells">

			<!-- begin checkout-billing -->
			<div class="checkout-billing cell medium-7 large-8">

				<a class="backto-cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>"><?php esc_html_e( 'Back to Cart', 'barberry' ) ?></a>

				<!-- begin checkout-links -->
				<div class="checkout-links">
					<?php do_action( 'woocommerce_checkout_links' ); ?>
					<?php do_action( 'woocommerce_before_checkout_form', $checkout ); ?>
				</div>
				<!-- end checkout-links -->


				<div class="woocommerce-billing-fields">
					<h3><?php echo __( 'Checkout', 'woocommerce' ) ?></h3>
				</div>

				<div id="kco-iframe">
					<?php do_action( 'kco_wc_before_snippet' ); ?>
					<?php kco_wc_show_snippet(); ?>
					<?php do_action( 'kco_wc_after_snippet' ); ?>
				</div>				

			</div>
			<!-- end checkout-billing -->

			<!-- begin checkout-order -->
			<div class="checkout-order cell medium-5 large-4">

				<h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
				<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="edit"><?php esc_html_e( 'Edit', 'woocommerce' ); ?></a>

				<div id="kco-order-review">
					<?php do_action( 'kco_wc_before_order_review' ); ?>
					<?php woocommerce_order_review(); ?>
					<?php do_action( 'kco_wc_after_order_review' ); ?>
				</div>
				
			</div>
			<!-- end checkout-order -->

	</div>
	<!-- end grid-x checkout-cells -->

	</form>

	<?php checkout_coupon_form(); ?>
	<?php checkout_login_form(); ?>

</div>
<!-- end checkout-wrapper -->



<?php do_action( 'kco_wc_after_checkout_form' ); ?>
