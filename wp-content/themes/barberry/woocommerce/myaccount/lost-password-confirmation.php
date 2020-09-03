<?php
/**
 * Lost password confirmation text.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/lost-password-confirmation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.9.0
 */

defined( 'ABSPATH' ) || exit;

?>

<!-- begin grid-x -->
<div class="grid-x login-cells">

	<!-- begin login-content -->
	<div id="customer_login" class="login-content">

		<!-- begin login-content-inner -->
		<div class="login-content-inner">

			<div id="bb-password-wrap" class="inline">

				<div class="title-wrapper">
					<?php barberry_breadcrumbs(); ?>
					<div class="page-title-wrapper">
						<h1 class="page-title"><?php esc_html_e( 'My account', 'woocommerce' ); ?></h1>
					</div>					
				</div>	

				<?php wc_print_notice( esc_html__( 'Password reset email has been sent.', 'woocommerce' ) );?>								

				<?php do_action( 'woocommerce_before_lost_password_confirmation_message' ); ?>

				<p><?php echo esc_html( apply_filters( 'woocommerce_lost_password_confirmation_message', esc_html__( 'A password reset email has been sent to the email address on file for your account, but may take several minutes to show up in your inbox. Please wait at least 10 minutes before attempting another reset.', 'woocommerce' ) ) ); ?></p>

				<?php do_action( 'woocommerce_after_lost_password_confirmation_message' ); ?>

			</div>		

		</div>
		<!-- end login-content-inner -->				

	</div>
	<!-- end login-content -->

</div>
<!-- end grid-x -->
