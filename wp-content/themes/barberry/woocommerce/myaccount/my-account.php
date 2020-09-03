<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
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

?>

<!-- begin grid-x -->
<div class="grid-x account-cells">

	<!-- begin account-intro -->
	<div class="account-intro cell large-4">

		<!-- begin account-intro-wrapper -->
		<div class="account-intro-wrapper">

			<div class="account-nav-top">

				<div class="title-wrapper">

				<?php barberry_breadcrumbs(); ?>

				<?php
					$user = get_user_by( 'ID', get_current_user_id() );
					if ( $user ) {
				?>
					<div class="page-title-wrapper">
						<?php printf( '<h1 class="page-title">%s %s</h1>', esc_html__( 'Hi', 'barberry' ), $user->display_name ); ?>
					</div>

				<?php } ?>					

				</div>

				<?php /**
				 * My Account navigation.
				 * @since 2.6.0
				 */
				do_action( 'woocommerce_account_navigation' ); ?>				
			</div>

			<div class="account-nav-bottom">
				<a href="<?php echo esc_url( wc_get_account_endpoint_url( 'customer-logout' ) ); ?>"><?php echo esc_html__( 'Logout', 'woocommerce' ); ?></a>
			</div>	

		</div>
		<!-- end account-intro-wrapper -->


	</div>
	<!-- end account-intro -->

	<!-- begin account-content -->
	<div class="account-content cell large-8">

		<div class="woocommerce-MyAccount-content">

			<?php wc_print_notices(); ?>
			<?php
				/**
				 * My Account content.
				 * @since 2.6.0
				 */
				do_action( 'woocommerce_account_content' );
			?>
		</div>	
	

	</div>
	<!-- end account-content -->



</div>
<!-- end grid-x -->
