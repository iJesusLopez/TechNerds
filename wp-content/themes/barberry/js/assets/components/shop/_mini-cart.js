
	// =============================================================================
	// Mini Cart
	// =============================================================================

	barberry.miniCart = function() {

		$(document).ready(function($){

		    // synchronization from minicart quantity input to shop/single product page
		    var barberryChangeCartItemQuantity = function(qtyElement){

		        var matches = qtyElement.attr('name').match(/cart\[(\w+)\]/);
		        var cartItemKey = matches[1];

		        $('.woocommerce-mini-cart__total, .woocommerce-mini-cart').addClass('loading');

		        barberryMiniCartAjaxQuantityChange( cartItemKey, qtyElement.val() );
		    };

		    

		    var barberryMiniCartAjaxQuantityChange = function(cartItemKey, newQuantity) {
		    	$.ajax({

		            data: {
		                action: 'barberry_alter_quantity',
		                quantity: newQuantity,
		                cart_item_key: cartItemKey
		            },
		            type: 'post',
		            dataType: 'json',
		            url: barberry_scripts_vars.ajaxurl,
		            
		            beforeSend: function() {

		            },
		            success: function(resp) {

	                    // tell do WC reload widget contents
	                    $( document.body ).trigger( 'updated_wc_div' );

	                    // trigger for 3rd plugins event listeners
	                    $( document.body ).trigger( 'barberry_minicart_updated', [ resp.product_id ] );

	                    // trigger Added to cart
	                    $( document.body ).trigger( 'added_to_cart' );		                
		                
		                // find the <li> for the respective product on shop/category page
		                var productId = resp.product_id;
		                var liProduct = $('.post-' + productId + ',.elementor-page-' + productId);

		                // make it works with shortcodes, eg.: [add_to_cart id="XX"]
		                if ( !liProduct.length ) {
		                    liProduct = $('[data-product_id="'+productId+'"]').parent();
		                }

		                // update the quantity input to keep in sync with minicart
		                if ( liProduct.length ) {
		                    liProduct.find('.qty').val( newQuantity );
		                }

						$(document.body).on('wc_fragments_refreshed', function() {
							barberry.ShippingFreeNotification();
						});

		            }
		        });
		    };


			var barberryListenMiniCartQtyChange = function() {
				$(document.body).on('change', '.widget_shopping_cart_content .qty', function(){
					return barberryChangeCartItemQuantity( $(this) );
				});				
			};


			// init calls
			barberryListenMiniCartQtyChange();

		});



	}