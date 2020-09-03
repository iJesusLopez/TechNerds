
	// =============================================================================
	// Yith Wishlist Counter
	// =============================================================================

	barberry.ajaxWishlist = function() {

		barberry.$body.on('added_to_wishlist removed_from_wishlist', function() {
			var that = this;

			$.ajax({
				url     : barberry_scripts_vars.ajaxurl,
				dataType: 'json',
				method  : 'post',
				data    : {
					action: 'barberry_update_wishlist_count'
				},
				success : function(data) {
					
					if ( data >= 0 ) {
						$('body').addClass('has-wishlist');	
					} 

					$('.site-header').find('.header-wishlist .wishlist_items_number').html(data);
					
					if ( data == 0 ) {
						$('body').removeClass('has-wishlist');
					}

				}
			});
		});	

	}
