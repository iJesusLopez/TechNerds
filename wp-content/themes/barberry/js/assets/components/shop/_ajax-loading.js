
	// =============================================================================
	// Ajax Loading
	// =============================================================================

	barberry.loadingAjax = function() {


	var listing_class 		= ".content-area .products";
	var item_class 			= ".content-area ul.products li";
	var pagination_class 	= "body.woocommerce-shop .woocommerce-pagination";
	var next_page_class 	= ".woocommerce-pagination a.next";
	var ajax_button_class 	= ".products_ajax_button";
	var ajax_loader_class 	= ".products_ajax_loader";

	var b_ajax_load_items = {
	    
	    init: function() {

	        if (barberry_scripts_vars.shop_pagination_type == 'load_more_button' || barberry_scripts_vars.shop_pagination_type == 'infinite_scroll') {
	        
		        $(document).ready(function() {
		            
		            if ($(pagination_class).length) {
		                
		                $(pagination_class).before('<div class="'+ajax_button_class.replace('.', '')+'" data-processing="0"><div class="loadmore"><span>'+barberry_scripts_vars.ajax_loading_locale+'</span><div class="container"><div class="dot"></div><div class="dot"></div><div class="dot"></div></div></div></div>');
		            }		            		            

		        });
		        
		        $('body').on('click', ajax_button_class, function(e) {

		        	e.preventDefault();

					if ( $(next_page_class).data('requestRunning') ) {
						return;
					}

					$(next_page_class).data('requestRunning', true);			        	
		            
		            if ($(next_page_class).length) {
		                
		                $(ajax_button_class).attr('data-processing', 1).addClass('loading');                
		                
		                var href = $(next_page_class).attr('href');


		                b_ajax_load_items.onstart();
		                
		                $.get(href, function(response) {
		                    
		                    $(pagination_class).html($(response).find(".woocommerce-pagination").html());

		                    $(response).find(item_class).each(function(i) {

		                    	$($(this)).addClass('new');

		                        $(listing_class).append($(this));

		                    	barberry.splitTextNew();
													barberry.animationNewProduct();
													
		                    	$($(this)).removeClass('new');
		                        
		                    });
	               
		                    $(ajax_button_class).attr('data-processing', 0).removeClass('loading');
		                    
		                    b_ajax_load_items.onfinish();

		                    if ($(next_page_class).length == 0) {
		                        $(ajax_button_class).addClass('disabled').show();
		                    } else {
		                    	$(ajax_button_class).show();
		                    }

		                });

		                

		            } else {
		                		                
		                $(ajax_button_class).addClass('disabled').show();

		            }

		        });

	        }
	        
	        if (barberry_scripts_vars.shop_pagination_type == 'infinite_scroll') {

		        var buffer_pixels = Math.abs(100);
		        
		        $(window).scroll(function() {
		           
		            if ($(listing_class).length) {
		                
		                var a = $(listing_class).offset().top + $(listing_class).outerHeight();
		                var b = a - $(window).scrollTop();
		                
		                if ((b - buffer_pixels) < $(window).height()) {
		                    if ($(ajax_button_class).attr('data-processing') == 0) {
		                        $(ajax_button_class).trigger('click');
		                    }
		                }

		            }

		        });

	        }

	    },

	    onstart: function() {
	    },

	    onfinish: function() {

				barberry.lazyLoad();
				barberry.countDownTimer();

	    },


	};

	b_ajax_load_items.init();
	b_ajax_load_items.onfinish();

	}



	// Pagination animations

	barberry.paginationHide = function() {
		var	tl = gsap.timeline(),
			pagination = $(".woocommerce-pagination, .products_ajax_button");
			tl.fromTo(pagination, {autoAlpha:1}, {ease: "power4.InOut",autoAlpha:0, duration: 1}, 0);
	}

	barberry.paginationShow = function() {
		var	tl = gsap.timeline(),
			pagination = $(".woocommerce-pagination, .products_ajax_button");
			tl.fromTo(pagination, {autoAlpha:0}, {ease: "power4.InOut",autoAlpha:1, duration: 1}, .5);
	}