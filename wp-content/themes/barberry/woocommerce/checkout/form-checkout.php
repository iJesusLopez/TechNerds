<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<!-- begin checkout-wrapper -->
<div class="checkout-wrapper">

	<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

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

				<?php if ( $checkout->get_checkout_fields() ) : ?>

					<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

					<div class="col2-set" id="customer_details">
						<div class="col-1">
							<?php do_action( 'woocommerce_checkout_billing' ); ?>
						</div>

						<div class="col-2">
							<?php do_action( 'woocommerce_checkout_shipping' ); ?>
						</div>
					</div>

					<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

				<?php endif; ?>	

			</div>
			<!-- end checkout-billing -->

			<!-- begin checkout-order -->
			<div class="checkout-order cell medium-5 large-4">

				<h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
				<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="edit"><?php esc_html_e( 'Edit', 'woocommerce' ); ?></a>

				<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

				<div id="order_review" class="woocommerce-checkout-review-order">
					<?php do_action( 'woocommerce_checkout_order_review' ); ?>
				</div>

				<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>			
				
			</div>
			<!-- end checkout-order -->

			

		</div>
		<!-- end grid-x checkout-cells -->

	</form>

	<?php checkout_coupon_form(); ?>
	<?php checkout_login_form(); ?>


</div>
<!-- end checkout-wrapper -->

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>


