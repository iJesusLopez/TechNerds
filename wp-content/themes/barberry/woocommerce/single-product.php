<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//woocommerce_before_main_content
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

//woocommerce_after_main_content
//nothing changed

//woocommerce_after_single_product_summary
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );


get_header('shop');

?>

<div id="primary" class="product-content-area">

	<?php if ( !post_password_required() ) : ?>
        
    <div id="content" class="site-content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

            <?php wc_get_template_part( 'content', 'single-product' ); ?>

        <?php endwhile; // end of the loop. ?>
    
    </div>  

	<?php else: ?>

	<!-- begin grid-container -->
	<div class="grid-container">
		<!-- begin password-cells -->
		<div class="grid-x align-center password-cells">
			<!-- begin cell -->
			<div class="cell medium-8 large-6">
				<?php echo get_the_password_form(); ?>
			</div>
			<!-- end cell -->
		</div>
		<!-- end grid-x -->			
	</div>
	<!-- end grid-container -->

	<?php endif; ?>

	<div class="prefooter"></div>

</div>

<?php get_footer('shop'); ?>