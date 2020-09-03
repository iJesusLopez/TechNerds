
	// =============================================================================
	// Filter Toggle
	// =============================================================================

	barberry.filterToggle = function() {

		window.filters_button_off = function() {

			var trigger = $( '.woocommerce-archive-header .filter_switch' );
			var target  = $( '.woocommerce-archive-header .site-shop-filters' );

			trigger.removeClass('active');
			trigger.attr('data-toggled','off');
			target.slideUp(300).removeClass( "on-screen" );

			if ($('.woocommerce-archive-header .shop-filters-area-content').children().length > 0) {
				trigger.removeClass('with-filters');
			}
			
		}

		window.filters_button_on = function() {
			var trigger = $( '.woocommerce-archive-header .filter_switch' );
			var target  = $( '.woocommerce-archive-header .site-shop-filters' );

			trigger.addClass('active');
			trigger.attr('data-toggled','on');
			target.slideDown(300).addClass( "on-screen" );		
		}

		window.filters_button_on_off = function() {
			$('.woocommerce-archive-header .filter_switch').removeClass('with-filters');

			if (Foundation.MediaQuery.atLeast('large')) {

				if ($('.woocommerce-archive-header .shop-filters-area-content').children().length > 0) {
					$('.woocommerce-archive-header .filter_switch').addClass('with-filters');
				}

			} else {

				if ( ( $('.woocommerce-archive-header .shop-widget-area').length > 0 ) || ( $('.woocommerce-archive-header .shop-filters-area-content').children().length > 0 ) ) {
					$('.woocommerce-archive-header .filter_switch').addClass('with-filters');
				}

			}			
		}


		window.filters_button_on_off();

		if ( $('.woocommerce-archive-header') ) {

			var trigger = $( '.woocommerce-archive-header .filter_switch' );
			var target  = $( '.woocommerce-archive-header .site-shop-filters' );

			trigger.unbind('click').bind('click', trigger, function(){
			    if (!$(this).attr('data-toggled') || $(this).attr('data-toggled') == 'off'){
					$(this).attr('data-toggled','on');
					$(this).addClass('active');
					target.slideDown(300).addClass( "on-screen" );			           
			    }
			    else if ($(this).attr('data-toggled') == 'on'){
					$(this).attr('data-toggled','off');
					$(this).removeClass('active');
					target.slideUp(300).removeClass( "on-screen" );			           
			    }
			});

		}

			

		$(window).resize(function() {
			window.filters_button_on_off();
		});

	}


	// =============================================================================
	// Filters Scroll
	// =============================================================================

	barberry.filters_scroll = function() {

		var woocommerce_filter = $('.woocommerce-shop .site-shop-filters .widget-area .widget_layered_nav ul');

		if ( woocommerce_filter.length ) {

			woocommerce_filter.each(function() {

				var max_filters 			= 5;
				var filter_length 			= $(this).find('li').length;

				if ( filter_length > max_filters ) {
					$(this).addClass('add_scroll');
				} 
				
			});
		}

		var productVrThumbnails = $('.product-vr-thumbnails-container');


		if ( productVrThumbnails.length ) {
			// var thumb_length 			= productVrThumbnails.children().size();
			// var thumb_length = $('.product-thumbnails-container').attr( "data-thumb" );

			productVrThumbnails.each(function() {

				var max_products 			= 4;
				var thumb_length 			= productVrThumbnails.attr( "data-thumb" );

				if ( thumb_length > max_products ) {
					$(this).addClass('add_scroll');
				} 
				
			});
		}	

        var BarberryActiveFilters = function () {
        	if (!$('#barberry-filters-wrapper').length) {return;}
        	var active_filter = document.getElementById("barberry-filters-wrapper").scrollWidth;
        	$(".barberry-active-filters").removeClass('add_scroll');
			if (active_filter > $(window).outerWidth() ) {
			    $(".barberry-active-filters").addClass('add_scroll');
			}		
        };

        BarberryActiveFilters();
        $(window).resize(BarberryActiveFilters);


        var BarberryStickyVariables = function () {
        	if (!$('.barberry-fixed-product-variations-wrap').length) {return;}
        	var qty_variations_wrap = $(".barberry-fixed-product-variations-wrap").innerWidth(),
        		qty_variations = document.getElementById("barberry-fixed-product-variations").scrollWidth;

        	$(".barberry-fixed-product-variations-wrap").removeClass('add_scroll');
			if (qty_variations > qty_variations_wrap ) {
			    $(".barberry-fixed-product-variations-wrap").addClass('add_scroll');
			}		
        };

        BarberryStickyVariables();
        $(window).resize(BarberryStickyVariables);


	}
