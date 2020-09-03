
	// =============================================================================
	// Sticky Sidebar
	// =============================================================================

	barberry.removeFromCart = function() {

        $( document ).on('click', '.widget_shopping_cart .remove', function(e) {
            e.preventDefault();
            $(this).parent().addClass('removing-process');
            barberry.ShippingFreeNotification();

        });

	}
