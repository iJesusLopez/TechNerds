<?php
/**
 * Template for the account tab HTML
 *
 * @author		Neil Pie
 * @package		WooCommerce_Waitlist/Templates
 * @version		1.7.2
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
// wc_print_notices();
?>
<h2 class="my_account_titles"><?php echo apply_filters( 'wcwl_shortcode_title', $title ); ?> </h2>
<div class="waitlist-user-waitlist-wrapper">
	<?php if ( is_array( $products ) && ! empty( $products ) ) { ?>
		<p><?php echo apply_filters( 'wcwl_shortcode_intro_text', __( 'You are currently on the waitlist for the following products.', 'barberry' ) ); ?></p>

		<table class="shop_table cart wishlist_table waitlist-products">
			<thead>
				<tr>
					<th class="waitlist-thumbnail"></th>
					<th class="product-name">
						 <span class="nobr"><?php echo apply_filters( 'yith_wcwl_wishlist_view_name_heading', __( 'Product Name', 'barberry' ) ) ?></span>
					</th>
					<th class="waitlist-remove"></th>

				</tr>
			</thead>
			<tbody>
				<?php foreach ( $products as $product ) { ?>
					<tr class="waitlist-single-product">
						<td class="product-thumbnail waitlist-thumbnail">
							<a href="<?php echo esc_attr($product->get_permalink()); ?>">
								<?php echo apply_filters( 'wcwl_shortcode_thumbnail', $product->get_image(), $product ); ?>
							</a>
						</td>
						<td class="product-name">
							<?php $title = apply_filters( 'wcwl_shortcode_product_title', esc_html( $product->get_name() ), $product ); ?>
							<a href="<?php echo esc_attr($product->get_permalink()); ?>">
								<?php echo esc_attr($title); ?>
							</a>
						</td>
						<td class="product-add-to-cart waitlist-remove">
							<a href="#" rel="nofollow" class="button wcwl_remove_product" data-nonce="<?php echo wp_create_nonce( 'wcwl-ajax-remove-user-nonce' ); ?>" data-product-id="<?php echo esc_attr($product->get_id()); ?>" data-url="<?php echo Pie_WCWL_Frontend_User_Waitlist::get_remove_link( $product ); ?>"><?php echo apply_filters( 'wcwl_shortcode_remove_text', __( 'Remove me from this waitlist', 'barberry' ) ); ?></a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>

	<?php } else { ?>

		<table class="shop_table cart wishlist_table waitlist-products waitlist-no-products">
			<thead>
				<tr>
					<th class="product-name">
						 <span class="nobr"><?php echo apply_filters( 'yith_wcwl_wishlist_view_name_heading', __( 'Product Name', 'barberry' ) ) ?></span>
					</th>

				</tr>
			</thead>
			<tbody>
					<tr class="waitlist-single-product">
						<td class="product-thumbnail waitlist-thumbnail">
							<?php echo apply_filters( 'wcwl_shortcode_no_waitlists_text', __( 'You have not yet joined the waitlist for any products.', 'barberry' ) ); ?>
							<?php echo apply_filters( 'wcwl_shortcode_visit_shop_text', sprintf( __( '%sVisit shop now!%s', 'barberry' ), '<a href="' . wc_get_page_permalink( 'shop' ) . '" class="go-shop-link">', '</a>' ) ); ?>
						</td>
					</tr>

			</tbody>
		</table>




		<hr>
	<?php } ?>
</div>

<?php if ( is_array( $archives ) && ! empty( $archives ) ) { ?>
	<div class="waitlist-user-waitlist-archive-wrapper">
		<p><?php echo apply_filters( 'wcwl_shortcode_archive_intro_text', __( 'Your email address is also stored on an archived waitlist for the following products:', 'barberry' ) ); ?></p>
		<ul class="waitlist-archives">
			<?php foreach ( $archives as $archive ) { ?>
				<?php $product = wc_get_product( $archive->post_id ); ?>
				<li><?php echo apply_filters( 'wcwl_shortcode_archive_product_title', $product->get_name(), $product ); ?></li>
			<?php } ?>
		</ul>
		<p>
			<a href="#" rel="nofollow" id="wcwl_remove_archives" data-nonce="<?php echo wp_create_nonce( 'wcwl-ajax-remove-user-archive-nonce' ); ?>" data-url="<?php echo Pie_WCWL_Frontend_User_Waitlist::get_unarchive_link(); ?>">
				<?php echo apply_filters( 'wcwl_shortcode_archive_remove_text', __( 'Remove my email from all waitlist archives', 'barberry' ) ); ?>
			</a>
		</p>
	</div>
<?php } ?>