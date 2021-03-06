<?php
 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	
    global $post, $product;

    //woocommerce_before_single_product
	//nothing changed
	
	//woocommerce_before_single_product_summary
	// remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
	// remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
	
	// add_action( 'woocommerce_before_single_product_summary_sale_flash', 'woocommerce_show_product_sale_flash', 10 );
	// add_action( 'woocommerce_before_single_product_summary_product_images', 'woocommerce_show_product_images', 20 );

	//woocommerce_single_product_summary
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
	
	add_action( 'woocommerce_single_product_summary_single_title', 'woocommerce_template_single_title', 5 );
	add_action( 'woocommerce_single_product_summary_single_rating', 'woocommerce_template_single_rating', 10 );
	add_action( 'woocommerce_single_product_summary_single_price', 'woocommerce_template_single_price', 10 );
	add_action( 'woocommerce_single_product_summary_single_excerpt', 'woocommerce_template_single_excerpt', 20 );
	add_action( 'woocommerce_single_product_summary_single_add_to_cart', 'woocommerce_template_single_add_to_cart', 30 );
	add_action( 'woocommerce_single_product_summary_single_meta', 'woocommerce_template_single_meta', 40 );
	add_action( 'woocommerce_single_product_summary_single_sharing', 'woocommerce_template_single_sharing', 50 );

	//woocommerce_after_single_product_summary
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
	
	add_action( 'woocommerce_after_single_product_summary_data_tabs', 'woocommerce_output_product_data_tabs', 10 );

	//woocommerce_after_single_product
	//nothing changed

	//custom actions
	add_action( 'woocommerce_before_main_content_breadcrumb', 'woocommerce_breadcrumb', 20, 0 );	

?>

<div class="product_layout product_layout_style_3">

	<?php barberry_products_nav(); ?>

	<!-- begin product -->
	<div  id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

		<!-- begin product-cells -->
		<div class="grid-x product-cells align-center">
			<!-- begin cell -->
			<div class="cell large-12">
				
				<!-- begin grid-x -->
				<div class="grid-x align-center">

					
					
					<!-- begin product-images-cell -->
					<div class="product-images-cell cell large-12">

						<div class="product-images-wrapper">

							<?php				
								do_action( 'woocommerce_before_single_product_summary_product_images' );
								do_action( 'woocommerce_before_single_product_summary' );
							?>
									
						</div>
						
					</div>
					<!-- end product-images-cell -->

					<!-- begin product-info-cell -->
					<div class="product-info-cell cell large-12 xlarge-8">

						<?php do_action( 'woocommerce_before_single_product' ); ?>

						<div class="product-info-wrapper">

							<!-- begin product_summary_top -->
							<div class="product_summary_top">

								<!-- begin title-wrapper -->
								<div class="title-wrapper">
									<?php barberry_share(); ?>
									<?php 
									if ( TDL_Opt::getOption('product_breadcrumbs') ) {
										do_action('woocommerce_before_main_content_breadcrumb');
									}
									?>								
									<!-- begin page-title-wrapper -->
									<div class="page-title-wrapper">
										<?php do_action( 'woocommerce_single_product_summary_single_title' ); ?>
									</div>
									<!-- end page-title-wrapper -->
								</div>
								<!-- end title-wrapper -->
								
							</div>
							<!-- end product_summary_top -->

							<div class="grid-x">
								
							<!-- begin product_summary_middle -->
							<div class="product_summary_middle cell medium-6 large-6">
								<?php
									do_action( 'woocommerce_single_product_summary_single_rating' );
									do_action( 'woocommerce_single_product_summary_single_price' );
									do_action( 'woocommerce_single_product_summary_single_countdown' );
									do_action( 'woocommerce_single_product_summary_single_excerpt' );
								?>
							</div>
							<!-- end product_summary_middle -->	

							<!-- begin product_summary_middle -->
							<div class="product_summary_bottom  cell medium-6 large-6">
								<?php
								do_action( 'woocommerce_single_product_summary_single_add_to_cart' );			
								?>	
								<div class="product_summary_bottom_inner">
									<?php do_action( 'woocommerce_single_product_summary' ); ?>	
								</div>												
							</div>
							<!-- end product_summary_middle -->
							</div>
						

						</div>
						
					</div>
					<!-- end product-info-cell -->

				</div>
				<!-- end grid-x -->

			</div>
			<!-- end cell -->
		</div>
		<!-- end product-cells -->	

		<!-- begin single-bottom-inview -->
		<div class="single-bottom-inview">

			<!-- begin product-tabs-cells -->
			<div class="grid-x align-center product-tabs-cells">
				<!-- begin cell -->
				<div class="cell large-12">
					<?php do_action( 'woocommerce_after_single_product_summary_data_tabs' ); ?>
				</div>
				<!-- end cell -->
			</div>
			<!-- end product-tabs-cells -->


			<?php do_action( 'woocommerce_single_product_summary_single_meta' ); ?>


			<!-- begin align-center -->
			<div class="grid-x align-center">
				<!-- begin cell -->
				<div class="cell large-9">
					<?php
						do_action( 'woocommerce_single_product_summary_single_sharing' );
						do_action( 'woocommerce_after_single_product_summary' ); 
					?>
				</div>
				<!-- end cell -->
			</div>
			<!-- end align-center -->

			<?php 
			do_action( 'woocommerce_after_single_product' ); 

			$rel_scroll = (!empty(TDL_Opt::getOption('related_uppsells_scroll'))) ? TDL_Opt::getOption('related_uppsells_scroll') : 0;
			$rel_scroll_speed = (!empty(TDL_Opt::getOption('related_uppsells_scroll_speed'))) ? TDL_Opt::getOption('related_uppsells_scroll_speed') : 1;
			?>

		    <!-- begin grid-container -->
		    <div class="grid-container product_related_wrapper " data-rel-scroll="<?php echo esc_attr($rel_scroll); ?>" data-rel-scroll-speed="<?php echo esc_attr($rel_scroll_speed); ?>">
				<!-- begin single_product_summary_upsell -->
				<div class="single_product_summary_upsell product_carousel">
					<!-- begin grid-x -->
					<div class="grid-x">
						<!-- begin cell -->
						<div class="cell large-12">
							<?php do_action( 'woocommerce_after_single_product_summary_upsell_display' ); ?>
						</div>
						<!-- end cell -->
					</div>
					<!-- end grid-x -->
				</div>
				<!-- end single_product_summary_upsell -->

				<!-- begin single_product_summary_related -->
				<div class="single_product_summary_related product_carousel">
					<!-- begin grid-x -->
					<div class="grid-x">
						<!-- begin cell -->
						<div class="cell large-12">		
							<?php do_action( 'woocommerce_after_single_product_summary_related_products' ); ?>
						</div>
						<!-- end cell -->
					</div>
					<!-- end grid-x -->
				</div>
				<!-- end single_product_summary_related -->    	
		    </div>
		    <!-- end grid-container -->		
		
		</div>
		<!-- end single-bottom-inview -->


	</div>
	<!-- end product -->
	


</div>