<?php
/*
 * This file belongs to the YIT Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

$columns = apply_filters( 'ywcars_my_refund_requests_columns', array(
	__( 'ID', 'barberry' ),
	__( 'Order', 'barberry' ),
	__( 'Product', 'barberry' ),
	__( 'Requested amount', 'barberry' ),
	__( 'Status', 'barberry' ),
	''
) );

?>

<?php if ( ! $request_ids ) : ?>
    <p><?php echo apply_filters( 'ywcars_no_requests_found', __( 'There are currently no refund requests, if you would like to request a refund, then please navigate to orders page and select which order or product you want to request a refund for.', 'barberry' ) ); ?></p>
<?php else : ?>
<div class="table-scroll">
    <table class="shop_table shop_table_responsive my_account_orders yith-refund-table">
    	<thead>
        <tr>
			<?php foreach ( $columns as $column ) : ?>
                <th><span><?php echo esc_attr($column); ?></span></th>
			<?php endforeach; ?>
        </tr>
    	</thead>
		<?php
		foreach ( $request_ids as $request_id ) {
			$request = new YITH_Refund_Request( $request_id );
			if ( ! ( $request instanceof YITH_Refund_Request && $request->exists() ) ) {
				continue;
			}
			if ( 'trash' == $request->status ) {
				continue;
			}
			$request_link = '<a href="' . esc_url( $request->get_view_request_url() ) . '">'
			                . '#' . $request_id . '</a>';
			$order = wc_get_order( $request->order_id );
			$order_link = '<a href="' . $order->get_view_order_url() . '">#' . $request->order_id . '</a>';
			if ( $request->whole_order ) {
				$product_link = '<b>' . __( 'Whole Order', 'barberry' ) . '</b>';
			} else {
				$product = wc_get_product( $request->product_id );
				if ( $product ) {
					$product_link = '<a href="' . $product->get_permalink() . '">' . $product->get_title() . '</a>';
				}
			}
			$button = '<a class="button" href="' . esc_url( $request->get_view_request_url() ) . '">'
			          . __( 'View', 'barberry' ) . '</a>';
			?>
            <tr>
                <td><?php echo wp_kses_post($request_link) ?></td>
                <td><?php echo wp_kses_post($order_link) ?></td>
                <td><?php echo wp_kses_post($product_link) ?></td>
                <td><?php echo wc_price( $request->refund_total ) ?></td>
                <td><?php echo 'ywcars-new' == $request->status ? __( 'Submitted', 'barberry' ) : ywcars_get_request_status_by_key( $request->status ) ?></td>
                <td><?php echo wp_kses_post($button) ?></td>
            </tr>
			<?php
		}
		?>
    </table>
</div>
<?php endif; ?>
<?php
