
// =============================================================================
// Product Page Wishlist Button
// =============================================================================

barberry.productWishlist = function() {

	$(document).on('click', '.product_summary_bottom_inner .add_to_wishlist',  function(e) {
		var this_button = $(this);
		this_button.parents('.yith-wcwl-add-button').addClass('loading');
	});   
}

// =============================================================================
// Product Page Compare Button
// =============================================================================



barberry.productCompare = function() {

	initCompareIcons($);


    /**
     * init Compare icons
     */

	$(document).on('click', '.compare-btn .compare-link',  function(e) {
		// var this_button = $(this);
		// this_button.addClass('loading');
		var _this = $(this);
		// _this.addClass('loading');

		if (!$(_this).hasClass('barberry-compare')) {
		    var $button = $(_this).parents('.compare-btn');
		    $button.find('.compare-button .compare').trigger('click');
		} else {
		    var _id = $(_this).attr('data-prod');
		    if (_id) {
		        add_compare_product(_id, $);
		    }
		}

		return false;
	}); 
	

	$('body').on('click', '.footer-section-inner .barberry_product_compare_button', function(){
	    var _this = $(this);
	    if (!$(_this).hasClass('barberry-compare')) {
	        var $button = $(_this).parents('.footer-section-inner');
	        $button.find('.compare-button .compare').trigger('click');
	    } else {
	        var _id = $(_this).attr('data-prod');
	        if (_id) {
	            add_compare_product(_id, $);
	        }
	    }

	    
	    return false;
	});

	/**
	 * Remove item from Compare
	 */
	$('body').on('click', '.barberry-remove-compare', function(){
	    var _id = $(this).attr('data-prod');
	    if (_id) {
	        remove_compare_product(_id, $);
	    }
	    
	    return false;
	});


	/**
	 * Remove All items from Compare
	 */
	$('body').on('click', '.barberry-compare-clear-all', function(){
	    removeAll_compare_product($);
	    
	    return false;
	});

	/**
	 * Show Compare
	 */
	$('body').on('click', '.barberry-show-compare', function(){
	    loadCompare($);
	    
	    if (!$(this).hasClass('barberry-showed')) {
	        showCompare($);
	    } else {
	        hideCompare($);
	    }
	    
	    return false;
	});

	$('body').on('click', '.barberry-show-compare-mob', function(){
	    loadCompare($);

	    window.offcanvas_close();

		setTimeout(function () {
		    showCompare($);
		}, 300);
	    
	    
	    return false;
	});
	/**
	 * Load Compare
	 * 
	 * @param {type} $
	 * @returns {undefined}
	 */
	var _compare_init = false;
	function loadCompare($) {
	    if ($('#barberry-compare-sidebar-content').length && !_compare_init) {
	        _compare_init = true;
	        
	        if (
	            typeof wc_add_to_cart_params !== 'undefined' &&
	            typeof wc_add_to_cart_params.wc_ajax_url !== 'undefined'
	        ) {
	            var _urlAjax = wc_add_to_cart_params.wc_ajax_url.toString().replace('%%endpoint%%', 'barberry_load_compare');

	            var _compare_table = $('.barberry-wrap-table-compare').length ? true : false;
	            $.ajax({
	                url: _urlAjax,
	                type: 'post',
	                dataType: 'json',
	                cache: false,
	                data: {
	                    compare_table: _compare_table
	                },
	                beforeSend: function () {
	                    
	                },
	                success: function (res) {
	                    if (typeof res.success !== 'undefined' && res.success === '1') {
	                        $('#barberry-compare-sidebar-content').replaceWith(res.content);
	                    }

	                    $('.barberry-compare-list-bottom').find('.barberry-loader').remove();
	                },
	                error: function () {

	                }
	            });
	        }
	    }
	}


	// Add Compare Product

	function add_compare_product(_id, $) {
	    var _urlAjax = null;
	    if (
	        typeof wc_add_to_cart_params !== 'undefined' &&
	        typeof wc_add_to_cart_params.wc_ajax_url !== 'undefined'
	    ) {
	        _urlAjax = wc_add_to_cart_params.wc_ajax_url.toString().replace('%%endpoint%%', 'barberry_add_compare_product');
	        
	        var _compare_table = $('.barberry-wrap-table-compare').length ? true : false;

	        $.ajax({
	            url: _urlAjax,
	            type: 'post',
	            dataType: 'json',
	            cache: false,
	            data: {
	                pid: _id,
	                compare_table: _compare_table
	            },
	            beforeSend: function () {
	                showCompare($);
	                
	                if ($('.barberry-compare-list-bottom').find('.barberry-loader').length <= 0) {
	                    $('.barberry-compare-list-bottom').append('<div class="barberry-loader"></div>');
	                }
	            },
	            success: function (res) {
	            	
	                if (typeof res.result_compare !== 'undefined' && res.result_compare === 'success') {
	                    if ($('#barberry-compare-sidebar-content').length) {
	                        if (res.mini_compare === 'no-change') {
	                            loadCompare($);
	                        } else {
	                            $('#barberry-compare-sidebar-content').replaceWith(res.mini_compare);
	                        }
	                    } else {
	                        if (res.mini_compare !== 'no-change' && $('.barberry-compare-list').length) {
	                            $('.barberry-compare-list').replaceWith(res.mini_compare);
	                        }
	                    }
	                    
	                    if (res.mini_compare !== 'no-change') {
	                        if ($('.compare_items_number').length) {
	                            
	                            $('.compare_items_number').html(convert_count_items($, res.count_compare));
	                            if (res.count_compare === 0) {
	                                if (!$('.compare-number').hasClass('barberry-product-empty')) {
	                                    $('.compare-number').addClass('barberry-product-empty');
	                                }
	                            } else {
	                                if ($('.compare_items_number').hasClass('barberry-product-empty')) {
	                                    $('.compare_items_number').removeClass('barberry-product-empty');
	                                }
	                            }
	                        }

	                        $('.barberry-compare-success span').html(res.mess_compare);
	                        $('.barberry-compare-success').fadeIn(200);

	                        if (_compare_table) {
	                            $('.barberry-wrap-table-compare').replaceWith(res.result_table);
	                        }
	                        
	                    } else {
	                        $('.barberry-compare-exists span').html(res.mess_compare);
	                        $('.barberry-compare-exists').fadeIn(200);
	                    }

	                    if (!$('.barberry-compare[data-prod="' + _id + '"]').hasClass('added')) {
	                        $('.barberry-compare[data-prod="' + _id + '"]').addClass('added');
	                    }

	                    if (!$('.barberry-compare[data-prod="' + _id + '"]').hasClass('barberry-added')) {
	                        $('.barberry-compare[data-prod="' + _id + '"]').addClass('barberry-added');
	                    }

	                    setTimeout(function () {
	                        $('.barberry-compare-success').fadeOut(200);
	                        $('.barberry-compare-exists').fadeOut(200);
	                    }, 2000);
	                }

	                $('.barberry-compare-list-bottom').find('.barberry-loader').remove();
	            },
	            error: function () {

	            }
	        });
	    }
	}

	/**
	 * Remove Compare
	 * 
	 * @param {type} _id
	 * @param {type} $
	 * @returns {undefined}
	 */
	function remove_compare_product(_id, $) {
	    var _urlAjax = null;
	    if (
	        typeof wc_add_to_cart_params !== 'undefined' &&
	        typeof wc_add_to_cart_params.wc_ajax_url !== 'undefined'
	    ) {
	        _urlAjax = wc_add_to_cart_params.wc_ajax_url.toString().replace('%%endpoint%%', 'barberry_remove_compare_product');
	        
	        var _compare_table = $('.barberry-wrap-table-compare').length ? true : false;

	        $.ajax({
	            url: _urlAjax,
	            type: 'post',
	            dataType: 'json',
	            cache: false,
	            data: {
	                pid: _id,
	                compare_table: _compare_table
	            },
	            beforeSend: function () {
	                if ($('.barberry-compare-list-bottom').find('.barberry-loader').length <= 0) {
	                    $('.barberry-compare-list-bottom').append('<div class="barberry-loader"></div>');
	                }
	                
	                if ($('table.barberry-table-compare tr.remove-item td.barberry-compare-view-product_' + _id).length) {
	                    $('table.barberry-table-compare').css('opacity', '0.3').prepend('<div class="barberry-loader"></div>');
	                }
	            },
	            success: function (res) {
	                if (typeof res.result_compare !== 'undefined' && res.result_compare === 'success') {
	                    if (res.mini_compare !== 'no-change' && $('#barberry-compare-sidebar-content').length) {
	                        $('#barberry-compare-sidebar-content').replaceWith(res.mini_compare);
	                    } else {
	                        if (res.mini_compare !== 'no-change' && $('.barberry-compare-list').length) {
	                            $('.barberry-compare-list').replaceWith(res.mini_compare);
	                        }
	                    }
	                    
	                    if (res.mini_compare !== 'no-change' && $('.barberry-compare-list').length) {
	                        $('.barberry-compare[data-prod="' + _id + '"]').removeClass('added');
	                        $('.barberry-compare[data-prod="' + _id + '"]').removeClass('barberry-added');
	                        if ($('compare_items_number').length) {
	                            
	                            $('compare_items_number').html(convert_count_items($, res.count_compare));
	                            if (res.count_compare === 0) {
	                                if (!$('compare_items_number').hasClass('barberry-product-empty')) {
	                                    $('compare_items_number').addClass('barberry-product-empty');
	                                }
	                            } else {
	                                if ($('compare_items_number').hasClass('barberry-product-empty')) {
	                                    $('compare_items_number').removeClass('barberry-product-empty');
	                                }
	                            }
	                        }

	                        $('.barberry-compare-success span').html(res.mess_compare);
	                        $('.barberry-compare-success').fadeIn(200);

	                        if (_compare_table) {
	                            $('.barberry-wrap-table-compare').replaceWith(res.result_table);
	                        }
	                    } else {
	                        $('.barberry-compare-exists').html(res.mess_compare);
	                        $('.barberry-compare-exists').fadeIn(200);
	                    }

	                    setTimeout(function () {
	                        $('.barberry-compare-success').fadeOut(200);
	                        $('.barberry-compare-exists').fadeOut(200);
	                        if (res.count_compare === 0) {
	                            $('.barberry-close-mini-compare').trigger('click');
	                        }
	                    }, 2000);
	                }

	                $('table.barberry-table-compare').find('.barberry-loader').remove();
	                $('.barberry-compare-list-bottom').find('.barberry-loader').remove();
	                compare_tabs();
	            },
	            error: function() {

	            }
	        });
	    }
	}

	/**
	 * Remove All Compare
	 * 
	 * @param {type} $
	 * @returns {undefined}
	 */
	function removeAll_compare_product($) {
	    var _urlAjax = null;
	    if (
	        typeof wc_add_to_cart_params !== 'undefined' &&
	        typeof wc_add_to_cart_params.wc_ajax_url !== 'undefined'
	    ) {
	        _urlAjax = wc_add_to_cart_params.wc_ajax_url.toString().replace('%%endpoint%%', 'barberry_remove_all_compare');
	        
	        var _compare_table = $('.barberry-wrap-table-compare').length ? true : false;
	        $.ajax({
	            url: _urlAjax,
	            type: 'post',
	            dataType: 'json',
	            cache: false,
	            data: {
	                compare_table: _compare_table
	            },
	            beforeSend: function () {
	                if ($('.barberry-compare-list-bottom').find('.barberry-loader').length <= 0) {
	                    $('.barberry-compare-list-bottom').append('<div class="barberry-loader"></div>');
	                }
	            },
	            success: function (res) {
	                if (res.result_compare === 'success') {
	                    if (res.mini_compare !== 'no-change' && $('.barberry-compare-list').length) {
	                        $('.barberry-compare-list').replaceWith(res.mini_compare);
	                        
	                        $('.barberry-compare').removeClass('added');
	                        $('.barberry-compare').removeClass('barberry-added');
	                        
	                        if ($('compare_items_number').length) {
	                            $('compare_items_number').html('0');
	                            if (!$('compare_items_number').hasClass('barberry-product-empty')) {
	                                $('compare_items_number').addClass('barberry-product-empty');
	                            }
	                        }

	                        $('.barberry-compare-success span').html(res.mess_compare);
	                        $('.barberry-compare-success').fadeIn(200);

	                        if (_compare_table) {
	                            $('.barberry-wrap-table-compare').replaceWith(res.result_table);
	                        }
	                    } else {
	                        $('.barberry-compare-exists span').html(res.mess_compare);
	                        $('.barberry-compare-exists').fadeIn(200);
	                    }

	                    setTimeout(function () {
	                        $('.barberry-compare-success').fadeOut(200);
	                        $('.barberry-compare-exists').fadeOut(200);
	                        $('.barberry-close-mini-compare').trigger('click');
	                    }, 1000);
	                }

	                $('.barberry-compare-list-bottom').find('.barberry-loader').remove();
	            },
	            error: function() {

	            }
	        });
	    }
	}

	/**
	 * Show compare
	 * 
	 * @param {type} $
	 * @returns {undefined}
	 */
	function showCompare($) {
	    if ($('.barberry-compare-list-bottom').length) {
	        // $('.transparent-window').show();
	        $("body").removeClass("no-offcanvas-animation").addClass("offcanvas_bottom lock-scroll");
	        
	        if ($('.barberry-show-compare').length && !$('.barberry-show-compare').hasClass('barberry-showed')) {
	            $('.barberry-show-compare').addClass('barberry-showed');
	        }
	        
	        if (!$('.barberry-compare-list-bottom').hasClass('barberry-active')) {
	            $('.barberry-compare-list-bottom').addClass('barberry-active');
	        }

		    var tl = gsap.timeline(),
		        compare_list = $(".barberry-compare-list");
		        tl.fromTo(compare_list, 1, {opacity:0}, {ease: Power4.easeIn, opacity:1}, 0);

	    }
	}

	/**
	 * Hide compare
	 * 
	 * @param {type} $
	 * @returns {undefined}
	 */
	function hideCompare($) {
	    if ($('.barberry-compare-list-bottom').length) {
	        // $('.transparent-window').fadeOut(550);
	        $("body").removeClass("offcanvas_bottom lock-scroll");
	        
	        if ($('.barberry-show-compare').length && $('.barberry-show-compare').hasClass('barberry-showed')) {
	            $('.barberry-show-compare').removeClass('barberry-showed');
	        }
	        
	        $('.barberry-compare-list-bottom').removeClass('barberry-active');
	    }
	}


	$('body').on('click', '.transparent-window, .barberry-close-mini-compare', function(){
	    
	    /**
	     * Hide compare product
	     */
	    hideCompare($);

	    // $('.transparent-window').fadeOut(1000);
	});


	// init Compare icons

	function initCompareIcons($, _init) {
		var init = typeof _init !== 'undefined' ? _init : true;
		var _comparetArr = get_compare_ids($);	

	    if (init && $('.compare_items_number').length) {
	        var _slCompare = _comparetArr.length;
	        $('.compare_items_number').html(convert_count_items($, _slCompare));
	        $('.compare_items_number').removeClass('hide');
	        
	        if (_slCompare <= 0) {
	            if (!$('.compare_items_number').hasClass('barberry-product-empty')) {
	                $('.compare_items_number').addClass('barberry-product-empty');
	            }
	        } else {
	            $('.compare_items_number').removeClass('barberry-product-empty');
	        }
	    }

		if (_comparetArr.length && $('.compare-link').length) {
		    $('.compare-link').each(function() {
		        var _this = $(this);
		        var _prod = $(_this).attr('data-prod');

		        if (_comparetArr.indexOf(_prod) !== -1) {
		            if (!$(_this).hasClass('added')) {
		                $(_this).addClass('added');
		            }
		            if (!$(_this).hasClass('barberry-added')) {
		                $(_this).addClass('barberry-added');
		            }
		        } else {
		            $(_this).removeClass('added');
		            $(_this).removeClass('barberry-added');
		        }
		    });
		}	    
	}




	/**
	 * 
	 * @param {type} $
	 * @returns {undefined}get Compare ids
	 */
	function get_compare_ids($) {
	    if ($('input[name="barberry_woocompare_cookie_name"]').length) {
	        var _cookie_compare = $('input[name="barberry_woocompare_cookie_name"]').val();
	        var _pids = $.cookie(_cookie_compare);
	        if (_pids) {
	            _pids = _pids.replace('[','').replace(']','').split(",").map(String);
	            
	            if (_pids.length === 1 && !_pids[0]) {
	                return [];
	            }
	        }
	        
	        return typeof _pids !== 'undefined' && _pids.length ? _pids : [];
	    } else {
	        return [];
	    }
	}


	/**
	 * Convert Count Items
	 * 
	 * @param {type} number
	 * @returns {String}
	 */
	function convert_count_items($, number) {
	    var _number = parseInt(number);
	    if ($('input[name="barberry_less_total_items"]').length && $('input[name="barberry_less_total_items"]').val() === '1') {
	        return _number > 9 ? '9+' : _number.toString();
	    } else {
	        return _number.toString();
	    }
	}

	/**
	 * Mobile Campare Table Tabs
	 */

	 function compare_tabs() {
		$( ".barberry-wrap-table-compare ul li:first-child" ).addClass('active');
		$('.barberry-wrap-table-compare tbody td:not(:empty)').siblings('td:nth-child(2)').addClass('default');

		$( ".barberry-wrap-table-compare ul" ).on( "click", "li", function() {
		  var pos = $(this).index()+2;
		  $("tr").find('td:not(:eq(0))').hide();
		  $('td:nth-child('+pos+')').css('display','table-cell');
		  $("tr").find('th:not(:eq(0))').hide();
		  $('li').removeClass('active');
		  $(this).addClass('active');
		});
	 }

	 compare_tabs();




}