
	// =============================================================================
	// WooCommerce pretty notices
	// =============================================================================

	barberry.woocommerceNotices = function() {

        if ( barberry_scripts_vars.notifications_click == 0 ) {
            return;
        }        

        var notices = '.woocommerce-error, .woocommerce-info:not(.wc-amazon-payments-advanced-info), .woocommerce-message, div.wpcf7-response-output, #yith-wcwl-popup-message, .mc4wp-alert, .dokan-store-contact .alert-success, .yith_ywraq_add_item_product_message';

        $('body').on('click', notices, function(e) {
            e.preventDefault();
            var $msg = $(this);
            hideMessage( $msg );
        });

        var showAllMessages = function() {
            $notices.addClass('shown-notice');
        };

        var hideAllMessages = function() {
            hideMessage( $notices );
        };

        var hideMessage = function( $msg ) {
            $msg.removeClass('shown-notice').addClass('hidden-notice');
        };
  
	}
