<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<li <?php wc_product_cat_class( '', $category ); ?>>

	<!-- begin category_wrapper -->
	<div class="category_wrapper">

		<?php do_action( 'woocommerce_before_subcategory', $category ); ?>
		
		<!-- begin category_image -->
		<div class="category_image">
			<a href="<?php echo esc_url( get_term_link( $category->slug, 'product_cat' ) ); ?>" class="category-image">
				<?php do_action( 'woocommerce_before_subcategory_title', $category ); ?>	
			</a>
		</div>
		<!-- end category_image -->

		<!-- begin category_details -->
			<div class="category_details">

			<a href="<?php echo esc_url( get_term_link( $category->slug, 'product_cat' ) ); ?>">

				<?php 
				$category_counts = sprintf(
					_n( '%d product', '%d products', absint( $category->count ), 'woocommerce' ),
					absint( $category->count )
				);

				?>

				<div class="more-products"><?php echo esc_html( $category_counts ); ?></div>

				<h2 class="category-title">
					<?php
						echo esc_html( $category->name );
					?>				
				</h2>


			</a>			

			<?php 

			/**
			 * woocommerce_after_subcategory_title hook.
			 */
			do_action( 'woocommerce_after_subcategory_title', $category );

			?>
			
		</div>
		<!-- end category_details -->	

		<?php do_action( 'woocommerce_after_subcategory', $category ); ?>

	</div>
	<!-- end category_wrapper -->

</li>
