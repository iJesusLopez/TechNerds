<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
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
 * @version 3.3.2
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $post, $product;
$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
$image_title       = get_post_field( 'post_excerpt', $post_thumbnail_id );
$placeholder       = $product->get_image_id() ? 'with-images' : 'without-images';
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes', array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . $placeholder,
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
		'barberry-images'
	)
);
?>
<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>">

	<!-- begin product-images-inner -->
	<div class="product-images-inner">
		
	<div class="product_tool_buttons_placeholder">
		<?php do_action( 'product_tool_buttons' ); ?>
	</div>

	<!-- begin product-image-wrapper -->
	<div class="product-image-wrapper">
		<figure id="product-images" class="woocommerce-product-gallery__wrapper">

				<?php
				$attributes = array(
					'class' => 'single-product-img',
					'title'                   => get_post_field( 'post_title', $post_thumbnail_id ),
					'data-caption'            => get_post_field( 'post_excerpt', $post_thumbnail_id ),
					'data-src'                => $full_size_image[0],
					'data-large_image'        => $full_size_image[0],
					'data-flickity-lazyload'  => $full_size_image[0],
					'data-large_image_width'  => $full_size_image[1],
					'data-large_image_height' => $full_size_image[2],				
				);

				if ( has_post_thumbnail() ) {
					$html = '<div data-thumb="' . get_the_post_thumbnail_url( $post->ID, 'shop_thumbnail' ) . '" class="woocommerce-product-gallery__image product-gallery-cell">';
					$html .= get_the_post_thumbnail( $post->ID, 'shop_single', $attributes );
					$html .= '</div>';
				} else {
					$html = '<div class="woocommerce-product-gallery__image--placeholder product-gallery-cell">';
					$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src('woocommerce_single') ), esc_html__( 'Awaiting product image', 'barberry' ) );
					$html .= '</div>';
				}

				echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post->ID ) );

				do_action( 'woocommerce_product_thumbnails' );
				?>

		</figure>

		<!-- begin product-title-section-wrapper -->
		<div class="product-title-section-wrapper" >		

			<!-- begin product-title-section-right -->
			<div class="product-title-section-right">
				<div data-parallax='{"y" : 40, "smoothness": 20}'>
	            	<p class="carousel-status"></p>
					<?php barberry_share(); ?>
				</div>
			</div>
			<!-- end product-title-section-right -->

			
			
			<!-- begin product-title-section-wrapper-inner -->
			<div class="product-title-section-wrapper-inner" >

				<div data-parallax='{"y" : 40, "smoothness": 20}'>
				
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

				<!-- begin product_summary_middle -->
				<div class="product_summary_middle">
					<?php
						do_action( 'woocommerce_single_product_summary_single_rating' );
						do_action( 'woocommerce_single_product_summary_single_price' );
					?>
				</div>
				<!-- end product_summary_middle -->	

				</div>

			</div>
			<!-- end product-title-section-wrapper-inner -->



		</div>
		<!-- end product-title-section-wrapper -->

	</div>
	<!-- end product-image-wrapper -->

	</div>
	<!-- end product-images-inner -->			
	<?php do_action( 'barberry_after_single_product_image' ); ?>


</div>
