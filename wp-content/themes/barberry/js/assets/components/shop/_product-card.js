
	// =============================================================================
	// Shop Archive Buttons Click States
	// =============================================================================

	barberry.productCard = function() {

		// Product tooltip fix

		$("ul.products li.product .product-inner").hover(
			function() {
				setTimeout(function() {
			  		$(this).addClass("phover");
				}.bind(this), 200)
			},
			function() {
				setTimeout(function() {
			  		$(this).removeClass("phover");
				}.bind(this), 200)
			}
		);

		// Wishlist

		$(document).on('click', '.footer-section-inner .add_to_wishlist',  function(e) {
			var this_button = $(this);
			this_button.addClass('clicked');
			this_button.parents('.footer-section-inner').addClass('adding');
			setTimeout(function() { 
	        	this_button.addClass('loading');
	        }, 0);
			barberry.$body.on('added_to_wishlist', function() {
				$('.header-wishlist').addClass('animated');
				this_button.removeClass('loading');
				this_button.parents('.footer-section-inner').removeClass('adding');
				setTimeout(function() { 
		        	$('.header-wishlist').removeClass('animated');	
	            }, 2000); 
				this_button.removeClass('add_to_wishlist').addClass('added');
				this_button.attr("href", this_button.data("wishlist-url"));
				this_button.children('.tooltip').text(this_button.data("browse-wishlist-text"));
			});
		});

		// Compare

		// $(document).on('click', '.footer-section-inner .barberry_product_compare_button',  function(e) {
		// 	var this_button = $(this);
		// 	this_button.addClass('clicked');
		// 	this_button.parents('.footer-section-inner').addClass('adding');
		// 	setTimeout(function() { 
	 //        	this_button.addClass('loading');
	 //        }, 0);
		// 	barberry.$body.on('added_to_compare', function() {
		// 		$('.header-wishlist').addClass('animated');
		// 		this_button.removeClass('loading');
		// 		this_button.parents('.footer-section-inner').removeClass('adding');
		// 		setTimeout(function() { 
		//         	$('.header-compare').removeClass('animated');	
	 //            }, 2000); 
		// 		this_button.removeClass('add_to_compare').addClass('added');

		// 	});

		// });


		// Quick View

		$(document).on('click', '.footer-section .barberry_product_quick_view_button',  function() {
			var this_button = $(this);
			this_button.addClass('clicked');
			this_button.parents('.product-inner').addClass('adding');
			setTimeout(function() { 
		    	this_button.addClass('loading');
		    }, 200);

		    $(document.body).on('opened_product_quickview', function() {
				this_button.parents('.product-inner').removeClass('adding');
				this_button.removeClass('loading').removeClass('clicked');
			});
		});


		// Add to Cart

		$(document).on('click', '.footer-section  .ajax_add_to_cart, .footer-section  .add_to_cart_button', function() {		
			var this_button = $(this);		
			this_button.addClass('clicked');
			this_button.parents('.product-inner').addClass('adding');
			setTimeout(function() { 
	        	this_button.addClass('loading');
	        }, 200);

	       
			barberry.$body.on('wc_cart_button_updated', function() {
				this_button.removeClass('loading').removeClass('clicked');
				this_button.parents('.product-inner').removeClass('adding');
				$('.header-cart').addClass('animated');	
				setTimeout(function() { 
		        	$('.header-cart').removeClass('animated');	
	            }, 2000); 	

	            
				
				if (this_button.siblings('.added_to_cart').length ) {
					var new_href = this_button.siblings('.added_to_cart').attr("href");
					var new_text = this_button.siblings('.added_to_cart').text();

					if ( barberry_scripts_vars.shop_addtocart == 0 ) {
						this_button.siblings('.added_to_cart').remove();
						this_button.attr("href", new_href);
						this_button.text(new_text);
						this_button.children('.tooltip').text(new_text);
						this_button.removeClass().addClass('button added wc-forward');
					}
					

					// Open minicart ================	
					window.offcanvas_close();



			        setTimeout(function(){ 
                        if ( barberry_scripts_vars.add_to_cart_action == 'no_action' ) {
                          return;
                        }		
                        barberry.ShippingFreeNotification();	        	
			        	window.offcanvas_right();

			        }, 200);	



				}			
			});		
		});	
	}