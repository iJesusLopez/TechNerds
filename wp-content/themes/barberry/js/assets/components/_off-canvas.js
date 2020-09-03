
  // =============================================================================
  // Off Canvas Navigation
  // =============================================================================

  barberry.offCanvas = function() {


	window.offcanvas_open = false;
	window.offcanvas_from_left = false;
	window.offcanvas_from_right = false;
	window.offcanvas_from_top = false;
	window.offcanvas_from_bottom = false;

	window.offcanvas_close = function() {		
		
		window.offcanvas_open = false;
		window.offcanvas_from_left = false;
		window.offcanvas_from_right = false;
		window.offcanvas_from_top = false;	
		window.offcanvas_from_bottom = false;		
        
		$("body").removeClass("offcanvas_open offcanvas_left offcanvas_right offcanvas_top lock-scroll");

		$(".offcanvas_main_content").one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function() {   
            setTimeout(function(){ 
            	$(window).trigger('resize');
            }, 600);
        });

        $('.offcanvas_shop_sidebar').removeClass('show');
        $('.barberry-ajax-search .search-field').val("");

	}



	window.offcanvas_left = function() {			
		
		if (window.offcanvas_open == true) window.offcanvas_close();
		window.offcanvas_open = true;
		window.offcanvas_from_left = true;		
		
		$("body").removeClass("no-offcanvas-animation").addClass("offcanvas_open offcanvas_left lock-scroll");

		$(".nano").nanoScroller({ iOSNativeScrolling: true });		

	}


	window.offcanvas_right = function() {

		if ( barberry_scripts_vars.header_cart_link == 'without' || isCart() || isCheckout() ) return false;

		if (window.offcanvas_open == true) window.offcanvas_close();	
		window.offcanvas_open = true;
		window.offcanvas_from_right = true;		
		
		$("body").removeClass("no-offcanvas-animation").addClass("offcanvas_open offcanvas_right lock-scroll");

		$(".nano").nanoScroller({ iOSNativeScrolling: true });	

	}


	window.offcanvas_top = function() {	

		if (window.offcanvas_open == true) {	
			window.offcanvas_close();
			window.offcanvas_open = false;
			window.offcanvas_from_top = false;			
		} else {
			window.offcanvas_open = true;
			window.offcanvas_from_top = true;		
			
			$("body").removeClass("no-offcanvas-animation").addClass("offcanvas_open offcanvas_top lock-scroll");
			$(".nano").nanoScroller({ iOSNativeScrolling: true });			
		}				
	}

	window.offcanvas_bottom = function() {	

		if (window.offcanvas_open == true) {	
			window.offcanvas_close();
			window.offcanvas_open = false;
			window.offcanvas_from_bottom = false;			
		} else {
			window.offcanvas_open = true;
			window.offcanvas_from_bottom = true;		
			
			$("body").removeClass("no-offcanvas-animation").addClass("offcanvas_open offcanvas_bottom lock-scroll");	
		}				
	}


	$('.barberry-sizeguide-btn').on('click', function(){
		$(".nano").nanoScroller({ iOSNativeScrolling: true });
	});
	
	// Overlay Close Offcanvas
	$('.offcanvas_overlay').on('click', function(){
		window.offcanvas_close();
		$(".search-wrap").removeClass("active");
	});


	$('.close-icon').on('click', function(e){
		window.offcanvas_close();	
	});


	$('.menu-trigger').on('click', function(e){
		e.preventDefault();
		window.offcanvas_close();

		$('.offcanvas_sidebars').hide();
		$('.offcanvas_mainmenu').show();

        setTimeout(function(){ 
        	window.offcanvas_left();
        }, 200);

	});

	// Header Cart Button

    if ( barberry_scripts_vars.header_cart_link == 'sidebar' ) {

		$('.header-cart').on('click', function(e){

			if ( ! isCart() && ! isCheckout() ) e.preventDefault();

			window.offcanvas_close();

	        setTimeout(function(){ 
	        	window.offcanvas_right();
	        	barberry.ShippingFreeNotification();
	        }, 200);

		});

    }


	var isCart = function() {
	    return $('body').hasClass('woocommerce-cart');
	};

	var isCheckout = function() {
	    return $('body').hasClass('woocommerce-checkout');
	}; 

	// Sidebar Button

	$('.barberry-show-sidebar-btn, .shop-sidebar-btn').on('click', function(e){
		e.preventDefault();
		$('.offcanvas_mainmenu').hide();
        $('.offcanvas_sidebars').show();
        setTimeout(function(){ 
        	window.offcanvas_left();
        }, 100);
	});

  }

