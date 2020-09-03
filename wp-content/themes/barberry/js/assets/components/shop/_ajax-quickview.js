// =============================================================================
// Quick View Init
// =============================================================================

barberry.quickView = function() {

    if ( barberry_scripts_vars.product_quick_view == '0' ) {
      return;
    }

	function product_quick_view_ajax(id) {
		
		$.ajax({
			
			url: barberry_scripts_vars.ajaxurl,
			
			data: {
				"action" : "barberry_product_quick_view",
				'product_id' : id
			},

			success: function(results) {				
				$(".barberry_qv_content").empty().html(results);
				$("body").removeClass("progress");


	            setTimeout(function() { 
   	        	 	$(document.body).trigger('opened_product_quickview');
		        	$('#barberry_woocommerce_quickview').addClass('open');
	            }, 500); 

	            setTimeout(function() { 
		        	$("body").addClass('photoswipe-blur');
	            }, 700); 
				
	            $("#barberry_woocommerce_quickview button.single_add_to_cart_button.progress-btn").on("click", function(e) {
					e.preventDefault();

			        if ( $(this).hasClass('disabled') ) {
			            return;
			        }		
			        			
			        var progressBtn = $(this);

			        if (!progressBtn.hasClass("active")) {
			          progressBtn.addClass("active");
			          setTimeout(function() {
			            progressBtn.addClass("check");
			          }, 3000);
			          setTimeout(function() {
			            progressBtn.removeClass("active");
			            progressBtn.removeClass("check");
			          }, 5000);
			        }

			        setTimeout(function() {
			            $('.header-cart').addClass('animated'); 
			        }, 1000);
			        
			        setTimeout(function() { 
			            $('.header-cart').removeClass('animated');  
			        }, 2000);


			        var $cartForm = $(this).closest('form.cart'),
			            $singleBtn = $(this);
			            $singleBtn.addClass('loading');

			        if ( !$singleBtn.hasClass('loading') ) {
			            return;
			        }

			        var formdata = $cartForm.serializeArray(),
			            currentURL = window.location.href,
			            valueID = $singleBtn.attr('value');

			        if(typeof valueID !== "undefined" && valueID !== false) {
			            var cartid = {
			                name : 'add-to-cart',
			                value: valueID
			            };
			            formdata.push(cartid);
			        }

			         $.ajax({
			            url    : window.location.href,
			            method : 'post',
			            data   : formdata,
			            error  : function() {
			                window.location = currentURL;
			            },
			            success: function(response) {
			                if ( !response ) {
			                    window.location = currentURL;
			                }

			                if ( typeof wc_add_to_cart_params !== 'undefined' ) {
			                    if ( wc_add_to_cart_params.cart_redirect_after_add === 'yes' ) {
			                        window.location = wc_add_to_cart_params.cart_url;
			                        return;
			                    }
			                }

			                $(document.body).trigger('updated_wc_div');
			                $(document.body).on('wc_fragments_refreshed', function() {

			                    $singleBtn.removeClass('loading');

			                    barberry.ShippingFreeNotification();

			                    setTimeout(function(){ 
			                    	close_quickview_modal();
			                        if ( barberry_scripts_vars.add_to_cart_action == 'no_action' ) {
			                          return;
			                        }			                    	
			                        window.offcanvas_right();
			                    }, 300);

			                });

			            }
			        });                   		        

	            });

				var carouselContainers = document.querySelectorAll('#barberry_woocommerce_quickview .woocommerce-product-gallery');

				for ( var i=0; i < carouselContainers.length; i++ ) {
				  var container = carouselContainers[i];
				  initCarouselContainer( container );
				}	
				
				function initCarouselContainer( container ) {
					var carousel = container.querySelector('#product-images');
					var cells = carousel.querySelectorAll('.product-gallery-cell');


					$(document).on('found_variation', 'form.variations_form', function(event, variation) {
						event.preventDefault();
						flkty.selectCell( 0 );
					}).on('reset_image', function() {
						flkty.selectCell( 0 );
					});


					var flkty = new Flickity( carousel, {
					    // options
					    imagesLoaded: true,
					    percentPosition: true,
					    cellAlign: 'left',
					    contain: true,
					    lazyLoad: true,
					    wrapAround: true,
					    pageDots: cells.length > 1 ? true : false,
					    prevNextButtons: cells.length > 1 ? true : false,
					    dragThreshold: 15,
					    adaptiveHeight: true,
						arrowShape: { 
							x0: 10,
							x1: 60, y1: 50,
							x2: 60, y2: 40,
							x3: 20
						},
						on: {
							ready: function() {
							  var	tl = gsap.timeline(),
									gallery = $("#barberry_woocommerce_quickview #product-images, #barberry_woocommerce_quickview .flickity-slider"),
									single_gallery = $("#barberry_woocommerce_quickview #product-images"),
									breadcrumbs = $("#barberry_woocommerce_quickview .breadcrumbs");

								tl.fromTo(gallery, {autoAlpha:0}, {ease: "power4.InOut", autoAlpha:1, duration: 1}, 0);
								tl.fromTo(single_gallery, {scale: 1.15, autoAlpha:0}, {ease: "power4.InOut",scale: 1, autoAlpha:1, duration: 2}, .3);
								tl.fromTo(breadcrumbs, {y:40, autoAlpha:0}, {ease: "power4.InOut",y:0, autoAlpha:1, duration: 1.2}, 1);

								if ( barberry_scripts_vars.load_animation == '1' ) {
									barberry.productInfoAnimation();
								}
							}
						}	
																	
					} );

				}			

				if ( typeof $.fn.select2 === 'function' ) {
					$('#barberry_woocommerce_quickview .variations_form select').select2({
						minimumResultsForSearch: -1,
						placeholder: barberry_scripts_vars.select_placeholder,
						dropdownParent: $('#barberry_woocommerce_quickview .variations_form'),
						allowClear: true,
					});
				}				


				var form_variation = $("#barberry_woocommerce_quickview").find('.variations_form');
				var form_variation_select = $("#barberry_woocommerce_quickview").find('.variations_form .variations select');
            	
            	form_variation.wc_variation_form();
            	form_variation_select.change();

                 /*plugin: watches variation*/
                if (typeof $.fn.tawcvs_variation_swatches_form !== 'undefined') {
                    form_variation.tawcvs_variation_swatches_form();
                }   


	            setTimeout(function() { 
	            	if ( $(window).width() > 1024 ) {
	            		$("#barberry_woocommerce_quickview .nano").nanoScroller({ iOSNativeScrolling: true });
	            	}

		        	$( '#barberry_woocommerce_quickview .barberry_qv_content' ).addClass('maybe_scroll');
	            }, 1200);

	           
			},


		});
	}

	function close_quickview_modal() {
		$("body").removeClass('photoswipe-blur');
		$('#barberry_woocommerce_quickview').removeClass('open');
        $('#barberry_woocommerce_quickview .barberryd_qv_content').removeClass('maybe_scroll');
        $('#barberry_woocommerce_quickview .barberry_qv_content').empty();
        $(document.body).trigger('closed_product_quickview');

	}

    $('.offcanvas_main_content').on('click', '.barberry_product_quick_view_button', function(e) {
    	e.preventDefault();
        close_quickview_modal();
        var product_id  = $(this).data('product_id');
        
		product_quick_view_ajax(product_id);

    });	

    $('#barberry_woocommerce_quickview').on('click', function(e) {
    	var containers = [
			".barberry_qv_content"
		];

		var container = $(containers.join(", "));
	    
	    if (!container.is(e.target) && container.has(e.target).length === 0) {
	        close_quickview_modal();
	    }
    });

    $('#barberry_woocommerce_quickview').on('click', '.close-button-wrapper', function(e) {
    	close_quickview_modal();
    });

}
