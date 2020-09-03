<?php

// @version 3.0.0

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $post, $product, $woocommerce, $wishlists;

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

add_action( 'woocommerce_before_main_content_breadcrumb', 'woocommerce_breadcrumb', 20, 0 );
add_action( 'woocommerce_single_product_summary_single_title', 'woocommerce_template_single_title', 5 );
add_action( 'woocommerce_single_product_summary_single_rating', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_single_product_summary_single_price', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary_single_excerpt', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary_single_add_to_cart', 'woocommerce_template_single_add_to_cart', 30 );
add_action( 'woocommerce_quickview_product_after_excerpt', 	'barberry_quickview_go_to_product_page');

add_action( 'woocommerce_single_product_summary_single_countdown', 'barberry_single_product_countdown', 15 );

// Stock Progress Bar
if ( intval( TDL_Opt::getOption('product_progess_stock') ) ) {
    add_filter('woocommerce_get_stock_html', 'barberry_single_stock', 10, 2);
}
	

?>
<?php while ( have_posts() ) : the_post(); ?>

<!-- begin close-button-wrapper -->
<div class="close-button-wrapper" data-close aria-label="Close reveal">
	<button class="close-button" >
		<span class="close-icon_top"></span>
		<span class="close-icon_bottom"></span>
	</button>	
</div>
<!-- end close-button-wrapper -->

<div class="grid-x">
	<div class="large-12 cell">
		
		<div class="site-content woocommerce">

			<?php

				if ( post_password_required() ) {
					echo get_the_password_form();
					return;
				}
			?>

			<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="grid-x">

					<div class="small-12 medium-5 large-6 cell gallery-cell">
						<div class="before-product-summary-wrapper">
					
							<?php				
								do_action( 'woocommerce_before_single_product_summary_product_images' );
								do_action( 'woocommerce_before_single_product_summary' );
							?>

						</div>
					</div>

					<div class="small-12 medium-7 large-6 cell summary-cell">
						<div class="summary entry-summary">
					       <div class="nano">
					        	<div class="nano-content">

					        		<div class="product-info-wrapper">
					        			<?php do_action( 'woocommerce_before_single_product' ); ?>

										<!-- begin product_summary_top -->
										<div class="product_summary_top">

											<!-- begin title-wrapper -->
											<div class="title-wrapper">
												<?php do_action('woocommerce_before_main_content_breadcrumb');?>							
												<!-- begin page-title-wrapper -->
												<div class="page-title-wrapper">
													<?php do_action( 'woocommerce_single_product_summary_single_title' ); ?>
												</div>
												<!-- end page-title-wrapper -->
											</div>
											<!-- end title-wrapper -->
											
										</div>
										<!-- end product_summary_top -->

										<!-- begin product_summary_middle -->
										<div class="product_summary_middle">
											<?php
												do_action( 'woocommerce_single_product_summary_single_rating' );
												do_action( 'woocommerce_single_product_summary_single_price' );
												do_action( 'woocommerce_single_product_summary_single_countdown' );
												do_action( 'woocommerce_single_product_summary_single_excerpt' );
												do_action( 'woocommerce_quickview_product_after_excerpt' );
											?>
										</div>
										<!-- end product_summary_middle -->	

										<!-- begin product_summary_middle -->
										<div class="product_summary_bottom">
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
						</div>
					</div>

			</div>

		</div>
		
	</div>
</div>
<?php endwhile; // end of the loop. ?>