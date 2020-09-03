<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>

<!-- begin grid-x -->
<div class="grid-x account-cells">

	<?php if ( $order ) :

		do_action( 'woocommerce_before_thankyou', $order->get_id() ); ?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>
			<div class="account-content-failed cell medium-offset-2 large-offset-2 medium-8 large-8">

				<i class="alert-icon"></i>

				<h1 class="page-title woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></h1>

				<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
					<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ) ?></a>
					<?php if ( is_user_logged_in() ) : ?>
						<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button btn--secondary pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
					<?php endif; ?>
				</p>				
				
			</div>
		<?php else : ?>

	<!-- begin account-intro -->
	<div class="account-intro cell large-4">
		<div class="account-intro-inner">
			<div class="title-wrapper">
				<div class="page-title-wrapper">
					
					<h1 class="page-title woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html_e( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); ?></h1>

					<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

						<li class="woocommerce-order-overview__order order">
							<?php esc_html_e( 'Order number:', 'woocommerce' ); ?>
							<strong><?php echo esc_attr($order->get_order_number()); ?></strong>
						</li>

						<li class="woocommerce-order-overview__date date">
							<?php esc_html_e( 'Date:', 'woocommerce' ); ?>
							<strong><?php echo wc_format_datetime( $order->get_date_created() ); ?></strong>
						</li>

						<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
							<li class="woocommerce-order-overview__email email">
								<?php esc_html_e( 'Email:', 'woocommerce' ); ?>
								<strong><?php echo esc_attr($order->get_billing_email()); ?></strong>
							</li>
						<?php endif; ?>

						<li class="woocommerce-order-overview__total total">
							<?php esc_html_e( 'Total:', 'woocommerce' ); ?>
							<strong><?php echo wp_kses_post($order->get_formatted_order_total()); ?></strong>
						</li>

						<?php if ( $order->get_payment_method_title() ) : ?>
							<li class="woocommerce-order-overview__payment-method method">
								<?php esc_html_e( 'Payment method:', 'woocommerce' ); ?>
								<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
							</li>
						<?php endif; ?>

					</ul>	

				</div>			
			</div>
		</div>
	</div>
	<!-- end account-intro -->

	<!-- begin account-content -->
	<div class="account-content cell large-8">
		<div class="woocommerce-MyAccount-content">

			<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
			<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>		

		</div>
	</div>
	<!-- end account-content -->	

	<?php endif; ?>	

<?php else : ?>
	<h1 class="page-title woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html_e( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></h1>
<?php endif; ?>

</div>
<!-- end grid-x -->
