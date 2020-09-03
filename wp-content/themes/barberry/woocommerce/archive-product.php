<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' ); 

$sidebar = ( (1==TDL_Opt::getOption('shop_sidebar')) );
if (isset($_GET["shop_sidebar"])) {
	$sidebar = $_GET["shop_sidebar"];
}
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>

	<!-- begin site-content -->
	<div id="content" class="site-content <?php echo esc_attr( $sidebar ) ? 'woocommerce-sidebar-active' : '' ?>" role="main">
		<!-- begin grid-container -->
		<div class="grid-container content-page-wrapper">

			<!-- begin grid-x -->
			<div class="grid-x grid-margin-x main-shop-container">
				<!-- begin cell -->

				<?php if ( $sidebar && TDL_Opt::getOption('shop_sidebar_position') == 'left') : ?>

					<div class="sidebar-container shop-sidebar-container small-12 large-3 cell">
						<div class="woocommerce-sidebar-inside">						
	                        <?php if ( is_active_sidebar( 'widgets-product-listing' ) ) { ?>
	                            <div id="secondary" class="widget-area" role="complementary">
	                                <?php dynamic_sidebar( 'widgets-product-listing' ); ?>
	                            </div>
	                        <?php } ?>
						</div>
					</div>

				<?php endif; ?>


				<div class="small-12 <?php echo esc_attr( $sidebar ) ? 'large-9' : 'large-12' ?> cell " id="content-section" >


					<?php do_action( 'woocommerce_before_shop_loop' ); ?>

					<?php

					if ( woocommerce_product_loop() ) {

						/**
						 * Hook: woocommerce_before_shop_loop.
						 *
						 * @hooked wc_print_notices - 10
						 * @hooked woocommerce_result_count - 20
						 * @hooked woocommerce_catalog_ordering - 30
						 */
						

						woocommerce_product_loop_start();

						if ( wc_get_loop_prop( 'total' ) ) {
							while ( have_posts() ) {
								the_post();

								/**
								 * Hook: woocommerce_shop_loop.
								 *
								 * @hooked WC_Structured_Data::generate_product_data() - 10
								 */
								do_action( 'woocommerce_shop_loop' );

								wc_get_template_part( 'content', 'product' );
							}
						}

						woocommerce_product_loop_end();

						/**
						 * Hook: woocommerce_after_shop_loop.
						 *
						 * @hooked woocommerce_pagination - 10
						 */
						do_action( 'woocommerce_after_shop_loop' );

					} else {
						/**
						 * Hook: woocommerce_no_products_found.
						 *
						 * @hooked wc_no_products_found - 10
						 */
						do_action( 'woocommerce_no_products_found' );
					}

					?>

				</div><!-- end cell large-12 -->

				<?php if ( $sidebar && TDL_Opt::getOption('shop_sidebar_position') == 'right') : ?>

					<div class="sidebar-container shop-sidebar-container small-12 large-3 cell">
						<div class="woocommerce-sidebar-inside">						
	                        <?php if ( is_active_sidebar( 'widgets-product-listing' ) ) { ?>
	                            <div id="secondary" class="widget-area" role="complementary">
	                                <?php dynamic_sidebar( 'widgets-product-listing' ); ?>
	                            </div>
	                        <?php } ?>
						</div>
					</div>

				<?php endif; ?>

				

			</div><!-- end grid-x -->


		</div><!-- end grid-container -->
	</div><!-- end site-content -->

	<div id="content-section-bottom"></div>
	<div class="prefooter"></div>

<?php 
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

 ?>
<?php get_footer( 'shop' ); ?>
