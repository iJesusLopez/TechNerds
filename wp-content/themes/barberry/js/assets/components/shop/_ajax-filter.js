
	// =============================================================================
	// Ajax Filter
	// =============================================================================

	barberry.filterAjax = function() {

		if ( !barberry.$body.hasClass('catalog-ajax-filter') ) {
			return;
		}

		barberry.$body.on('price_slider_change', function(event, ui) {
			var form = $('.price_slider').closest('form').get(0),
				$form = $(form),
				url = $form.attr('action') + '?' + $form.serialize();

			$(document.body).trigger('barberry_catalog_filter_ajax', url, $(this));
		});

		barberry.$body.on('click', '.barberry-clear-filters', function(e) {
			e.preventDefault();
			var url = $(this).attr('href');
			$(document.body).trigger('barberry_catalog_filter_ajax', url, $(this));
		});

		function barberryUpdateUrlParameters(currentParams, newParams) {
		    if (currentParams.trim() === '') {
		        return "?" + newParams;
		    }
		    var newParamsObj = {};
		    newParams.split('&').forEach(function(x) {
		        var arr = x.split('=');
		        arr[1] && (newParamsObj[arr[0]] = arr[1]);
		    });
		    for (var prop in newParamsObj) {
		        var i = currentParams.indexOf('#');
		        var hash = i === -1 ? '' : uri.substr(i);
		        currentParams = i === -1 ? currentParams : currentParams.substr(0, i);
		        var re = new RegExp("([?&])" + prop + "=.*?(&|$)","i");
		        var separator = "&";
		        if (currentParams.match(re)) {
		            currentParams = currentParams.replace(re, '$1' + prop + "=" + newParamsObj[prop] + '$2');
		        } else {
		            currentParams = currentParams + separator + prop + "=" + newParamsObj[prop];
		        }
		        currentParams + hash;
		    }
		    return currentParams;
		}



        var woocommerceOrderingForm = $(document.body).find('form.woocommerce-ordering');
        if (woocommerceOrderingForm.length) {
            woocommerceOrderingForm.on('submit', function(e) {
                e.preventDefault();
            });
            $(document.body).on('change', 'form.woocommerce-ordering select.orderby', function(e) {
                e.preventDefault();
                var currentUrlParams = window.location.search;
                var url = window.location.href.replace(window.location.search, '') + barberryUpdateUrlParameters(currentUrlParams, woocommerceOrderingForm.serialize());
                $(document.body).trigger('barberry_catalog_filter_ajax', [url, woocommerceOrderingForm]);
                
            });
        }



		barberry.$body.find('.site-shop-filters, .barberry-active-filters, .woocommerce-sidebar-inside .widget-area').on('click', 'a', function(e) {
			var $widget = $(this).closest('.widget');
			if ( 
				$widget.hasClass('widget_layered_nav_filters') ||
				$widget.hasClass('widget_layered_nav') ||
				$widget.hasClass('product-sort-by') ||
				$widget.hasClass('widget_price_filter') ||
				$widget.hasClass('barberry-price-filter-list') ) {
				e.preventDefault();
				$(this).closest('li').addClass('chosen');
				var url = $(this).attr('href');
				$(document.body).trigger('barberry_catalog_filter_ajax', url, $(this));
			}			


			if ( $widget.hasClass('product-sort-by') ) {
				$(this).addClass('active');
			}
		});	

		$(document.body).on('barberry_catalog_filter_ajax', function(e, url, element) {

			var $container = $('.shop-content-inner'),
				$container_nav = $('.woocommerce-sidebar-inside .widget-area'),
				$shopTopbar = $('.site-shop-filters'),
				$active_filters = $('.barberry-active-filters'),
				$categories_drop = $('.widget_product_categories select'),
				$ordering = $('.woocommerce-archive-header .woocommerce-ordering'),
				$found = $('.woocommerce-archive-header .product-found'),
				$filter = $('.woocommerce-archive-header .filter_switch');

				// if ( barberry_scripts_vars.shop_filters_close == '0' ) {
				// 	window.offcanvas_close();
				// 	window.filters_button_off();
				// } else {
				// 	$('.offcanvas_shop_sidebar').addClass('show');
				// }	

			if ($('.barberry-active-filters').children().length > 0) {
				$(this).addClass('with-active-filters');
			}	

			if ( $('.woocommerce-archive-header').length > 0 ) {
				if (Foundation.MediaQuery.atLeast('large')) {
					var position = $('.woocommerce-archive-header').offset().top -110;
				} else {
					var position = $('.woocommerce-archive-header').offset().top -60;
				}

				if ($('.shop-content .shop-content-inner .grid-container').children().length > 0) {

					if ( barberry_scripts_vars.shop_filters_close == '0' ) {
						window.offcanvas_close();
						window.filters_button_off();
					} else {
						$('.offcanvas_shop_sidebar').addClass('show');
					}	

					$('html, body').stop().animate({
							scrollTop: position
						},
						1200
					);
				} else {
					window.filters_button_on();
				}
				

			}


			$('#shop-loading').addClass('show');
			$('ul.products').addClass('show');
			barberry.paginationHide();

			if ( '?' == url.slice(-1) ) {
				url = url.slice(0, -1);
			}

			url = url.replace(/%2C/g, ',');

			history.pushState({
            	page: url
        	}, "", url);


			$(document.body).trigger('barberry_ajax_filter_before_send_request', [url, element]);

			if ( barberry.ajaxXHR ) {
				barberry.ajaxXHR.abort();
			}

			barberry.ajaxXHR = $.get(url, function(res) {

				$container.replaceWith($(res).find('.shop-content-inner'));
				$container_nav.html($(res).find('.woocommerce-sidebar-inside .widget-area').html());
				$shopTopbar.html($(res).find('.site-shop-filters').html());
				$categories_drop.html($(res).find('.widget_product_categories select').html());
				$ordering.html($(res).find('.woocommerce-archive-header .woocommerce-ordering').html());
				$found.html($(res).find('.woocommerce-archive-header .product-found').html());
				$filter.html($(res).find('.woocommerce-archive-header .filter_switch').html());
				$active_filters.html($(res).find('.barberry-active-filters').html());

				barberry.priceSlider();
				barberry.lazyLoad();
				barberry.widgetProductCategories();
				barberry.select2();
				barberry.splitText();
				barberry.animationProduct();
				barberry.loadingAjax();
				barberry.filters_scroll();
				barberry.countDownTimer();
				
				$('#shop-loading').removeClass('show');
				$('ul.products').removeClass('show');	
				barberry.paginationShow();

				$(document.body).trigger('barberry_ajax_filter_request_success', [res, url]);

			}, 'html');


		});

	}