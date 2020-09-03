
// =============================================================================
// Fixed Single form add to cart
// =============================================================================

barberry.stickyAddtocart = function() {

    if ( !barberry.$body.hasClass('single-product') ) {
        return;
    }	

    $(window).scroll(function(){
    	var scrollTop = $(this).scrollTop();
	    if ($('input[name="barberry_fixed_single_add_to_cart"]').length) {
	        if ($('.product-info-cell .single_add_to_cart_button').length) {
	            var addToCart = $('.product-info-cell .single_add_to_cart_button');
	            if ($(addToCart).length) {
	                var addToCartOffset = $(addToCart).offset();

	                if (scrollTop >= addToCartOffset.top) {
	                    if (!$('body').hasClass('barberry-has-cart-fixed')) {
	                        $('body').addClass('barberry-has-cart-fixed');
	                    }
	                } else {
	                    $('body').removeClass('barberry-has-cart-fixed');
	                }
	            }
	        }
	    }
    });

    if ( barberry.$body.hasClass('single-product') && $('input[name="barberry_fixed_single_add_to_cart"]').length ) {
        $('body[data-footer-reveal="1"] .site-footer-inner').css({'margin-bottom': 100 });
    }

	if (
	    $('input[name="barberry_fixed_single_add_to_cart"]').length
	) {
		// console.log('has');

		var _can_render = true;


		// Render in desktop

		if (_can_render && $('.barberry-add-to-cart-fixed').length <= 0) {

			$('body').append('<div class="barberry-add-to-cart-fixed"><div class="barberry-wrap-content-inner"><div class="barberry-wrap-content grid-container"><div class="barberry-wrap-content-sections grid-x align-middle"></div></div></div></div>');

			if (barberry_scripts_vars.sticky_addtocart_mob == '0') {
				$('.barberry-add-to-cart-fixed').addClass('not-show-mobile');
				$('body').addClass('stickycart-not-show-mobile');
			}

			var _addToCartWrap = $('.barberry-add-to-cart-fixed .barberry-wrap-content .barberry-wrap-content-sections');

			// Main Image clone

			$(_addToCartWrap).append('<div class="barberry-fixed-product-info cell shrink"></div>');

			var _src = $('.product-images-cell .product-image-wrapper .product-gallery-cell:eq(0)').attr('data-thumb');

	        if (_src !== '') {
	            $('.barberry-fixed-product-info').append('<div class="barberry-thumb-clone"><img src="' + _src + '" /></div>');
	        }

	        // Title clone

			if ($('.product-info-cell .product_summary_top .page-title-wrapper .product_title').length) {
			    var _title = $('.product-info-cell .product_summary_top .page-title-wrapper .product_title').html();

			    $('.barberry-fixed-product-info').append('<div class="barberry-title-clone"><h3>' + _title +'</h3></div>');
			}

			// Price clone

			if ($('.product-info-cell .product_summary_middle .price').length) {
			    var _price = $('.product-info-cell .product_summary_middle .price').html();
			    if ($('.barberry-title-clone').length) {
			        $('.barberry-title-clone').append('<span class="price">' + _price + '</span>');
			    }
			    else {
			        $('.barberry-fixed-product-info').append('<div class="barberry-title-clone"><span class="price">' + _price + '</span></div>');
			    }
			}


			// Variations clone

			if ($('.product-info-cell .variations_form').length) {
				$(_addToCartWrap).append('<div id="barberry-fixed-product-variations-wrap" class="barberry-fixed-product-variations-wrap cell auto"><div id="barberry-fixed-product-variations" class="barberry-fixed-product-variations"></div></div>');

				// Variations

	            var _k = 1,
	                _item = 1;	
	            
	            $('.product-info-cell .variations_form .variations tr').each(function() {
					var _this = $(this);
					var _classWrap = 'barberry-attr-wrap-' + _k.toString();
					var _type = $(_this).find('select').attr('data-attribute_name') || $(_this).find('select').attr('name');

					if ($(_this).find('.tawcvs-swatches').length) {
						$('.barberry-fixed-product-variations').append('<div class="barberry-attr-wrap-clone ' + _classWrap + ' tawcvs-swatches"></div>');

						$(_this).find('.swatch').each(function () {
	                        var _obj = $(this);
	                        var _classItem = 'swatch-' + _item.toString();
	                        var _classItemStyle = $(_obj).attr('style');
	                        var _classItemClone = 'swatch-clone-' + _item.toString();
	                        var _classItemClone_target = _classItemClone;

	                        if ($(_obj).hasClass('swatch-color')) {
	                            _classItemClone += ' barberry-attr-color-clone';
	                        }	

	                        if ($(_obj).hasClass('swatch-label')) {
	                            _classItemClone += ' barberry-attr-label-clone';
	                        }

	                        if ($(_obj).hasClass('swatch-image')) {
	                            _classItemClone += ' barberry-attr-image-clone';
	                        }

	                        var _selected = $(_obj).hasClass('selected') ? ' selected' : '';
	                        var _contentItem = $(_obj).html();	
	                        
	                        $(_obj).addClass(_classItem);
	                        $(_obj).attr('data-target', '.' + _classItemClone_target);

                        	$('.barberry-attr-wrap-clone.' + _classWrap).append('<span style=' + _classItemStyle + ' class="barberry-attr-clone' + _selected + ' ' + _classItemClone + ' barberry-' + _type + '" data-target=".' + _classItem + '">' + _contentItem + '</span>');

							_item++;
						});

					} else {

						$('.barberry-fixed-product-variations').append('<div class="barberry-attr-select_wrap-clone ' + _classWrap + '"></div>');

						var _obj = $(_this).find('select');

						var _label = $(_this).find('.label').length ? $(_this).find('.label').html() : '';

						var _classItem = 'barberry-attr-select-' + _item.toString();
						var _classItemClone = 'barberry-attr-select-clone-' + _item.toString();

						var _contentItem = $(_obj).html();

						$(_obj).addClass(_classItem).addClass('barberry-attr-select');
						$(_obj).attr('data-target', '.' + _classItemClone);

						$('.barberry-attr-select_wrap-clone.' + _classWrap).append(_label + '<select name="' + _type + '" class="barberry-attr-select-clone ' + _classItemClone + ' barberry-' + _type + '" data-target=".' + _classItem + '">' + _contentItem + '</select>');

						_item++;

					}

					_k++;

	            });    			

			}

			// Class wrap simple product

			else {
			    $(_addToCartWrap).addClass('barberry-fixed-single-simple');
			}

			// Add to cart button

			setTimeout(function() {
			    var _button_wrap = barberry_clone_add_to_cart($);

			    if ($('.product-info-cell .variations_form').length) {
			    	$(_addToCartWrap).append('<div class="barberry-fixed-product-btn cell shrink"></div>');
			    } else {
			    	$(_addToCartWrap).append('<div class="barberry-fixed-product-btn cell auto"></div>');
			    }
			    
			    $('.barberry-fixed-product-btn').html(_button_wrap);
			    var _val = $('.product-info-cell form.cart input[name="quantity"]').val();
			    $('.barberry-single-btn-clone input[name="quantity"]').val(_val);
			}, 250);


			// Change Ux

			$('body').on('click', '.tawcvs-swatches .swatch', function() {
				var _target = $(this).attr('data-target');

				if ($(_target).length) {
					var _wrap = $(_target).parents('.barberry-attr-wrap-clone');
	                $(_wrap).find('.barberry-attr-clone').removeClass('selected');
	                if ($(this).hasClass('selected')) {
	                    $(_target).addClass('selected');
	                }					
				}

                if ($('.barberry-fixed-product-btn').length) {
                    setTimeout(function() {
                        var _button_wrap = barberry_clone_add_to_cart($);
                        $('.barberry-fixed-product-btn').html(_button_wrap);
                        var _val = $('.product-info-cell form.cart input[name="quantity"]').val();
                        $('.barberry-single-btn-clone input[name="quantity"]').val(_val);
                    }, 250);
                }				

                setTimeout(function() {
                    if ($('.tawcvs-swatches .swatch').length) {
                        $('.tawcvs-swatches .swatch').each(function() {
                            var _this = $(this);
                            var _targetThis = $(_this).attr('data-target');

                            if ($(_targetThis).length) {
                                var _disable = $(_this).hasClass('barberry-disable') ? true : false;
                                if (_disable) {
                                    if (!$(_targetThis).hasClass('barberry-disable')) {
                                        $(_targetThis).addClass('barberry-disable');
                                    }
                                } else {
                                    $(_targetThis).removeClass('barberry-disable');
                                }
                            }
                        });
                    }
                }, 250);				

			});


			// Change Ux clone

			$('body').on('click', '.barberry-attr-clone', function() {
			    var _target = $(this).attr('data-target');
			    if ($(_target).length) {
			        $(_target).trigger('click');
			    }
			});

			// Change select

			$('body').on('change', '.barberry-attr-select', function() {
				var _this = $(this);
				var _target = $(_this).attr('data-target');
				var _value = $(_this).val();

				if ($(_target).length) {
	                setTimeout(function() {
	                    var _html = $(_this).html();
	                    $(_target).html(_html);
	                    $(_target).val(_value);
	                }, 100);

	                setTimeout(function() {
	                    var _button_wrap = barberry_clone_add_to_cart($);
	                    $('.barberry-fixed-product-btn').html(_button_wrap);
	                    var _val = $('.product_layout form.cart input[name="quantity"]').val();
	                    $('.barberry-single-btn-clone input[name="quantity"]').val(_val);

	                    if ($('.barberry-attr-ux').length) {
	                        $('.barberry-attr-ux').each(function() {
	                            var _this = $(this);
	                            var _targetThis = $(_this).attr('data-target');

	                            if ($(_targetThis).length) {
	                                var _disable = $(_this).hasClass('barberry-disable') ? true : false;
	                                if (_disable) {
	                                    if (!$(_targetThis).hasClass('barberry-disable')) {
	                                        $(_targetThis).addClass('barberry-disable');
	                                    }
	                                } else {
	                                    $(_targetThis).removeClass('barberry-disable');
	                                }
	                            }
	                        });
	                    }
	                }, 250);

				}				
			});

			// Change select clone

	        $('body').on('change', '.barberry-attr-select-clone', function() {
	            var _target = $(this).attr('data-target');
	            var _value = $(this).val();
	            if ($(_target).length) {
	                $(_target).val(_value).change();
	            }
	        });	
	        
			$('.barberry-attr-select-clone').select2({
				width: 'resolve',
				minimumResultsForSearch: -1,
				placeholder: barberry_scripts_vars.select_placeholder,
				allowClear: true,
			});		

			// Reset variations

			$('body').on('click', '.reset_variations', function() {
				$(_addToCartWrap).find('.selected').removeClass('selected');

	            setTimeout(function() {
	                var _button_wrap = barberry_clone_add_to_cart($);
	                $('.barberry-fixed-product-btn').html(_button_wrap);
	                var _val = $('.product-info-cell form.cart input[name="quantity"]').val();
	                $('.barberry-single-btn-clone input[name="quantity"]').val(_val);

	                if ($('.barberry-attr-ux').length) {
	                    $('.barberry-attr-ux').each(function() {
	                        var _this = $(this);
	                        var _targetThis = $(_this).attr('data-target');

	                        if ($(_targetThis).length) {
	                            var _disable = $(_this).hasClass('barberry-disable') ? true : false;
	                            if (_disable) {
	                                if (!$(_targetThis).hasClass('barberry-disable')) {
	                                    $(_targetThis).addClass('barberry-disable');
	                                }
	                            } else {
	                                $(_targetThis).removeClass('barberry-disable');
	                            }
	                        }
	                    });
	                }
	            }, 250);
			});


			// Plus, Minus button

			$('body').on('click', '.product-info-cell form.cart .quantity .plus-btn, .product-info-cell form.cart .quantity .minus-btn', function() {
			    if ($('.barberry-single-btn-clone input[name="quantity"]').length) {
			        var _val = $('.product-info-cell form.cart input[name="quantity"]').val();
			        $('.barberry-single-btn-clone input[name="quantity"]').val(_val);
			    }
			});



			// Plus clone button

			$('body').on('click', '.barberry-single-btn-clone .plus-btn', function() {
			    if ($('.product-info-cell form.cart .quantity .plus-btn').length) {
			        $('.product-info-cell form.cart .quantity .plus-btn').trigger('click');
			    }
			});

			// Minus clone button

			$('body').on('click', '.barberry-single-btn-clone .minus-btn', function() {
			    if ($('.product-info-cell form.cart .quantity .minus-btn').length) {
			        $('.product-info-cell form.cart .quantity .minus-btn').trigger('click');
			    }
			});

			// Quantity input

			$('body').on('keyup', '.product-info-cell form.cart input[name="quantity"]', function() {
				var _val = $(this).val();
				$('.barberry-single-btn-clone input[name="quantity"]').val(_val);
			});

			// Quantity input clone

			$('body').on('keyup', '.barberry-single-btn-clone input[name="quantity"]', function() {
				var _val = $(this).val();
				$('.product-info-cell form.cart input[name="quantity"]').val(_val);
			});



			// Add to cart click

			$('body').on('click', '.barberry-single-btn-clone .single_add_to_cart_button', function(e){

				    if ($('.product-info-cell form.cart .single_add_to_cart_button').length) {
				        $('.product-info-cell form.cart .single_add_to_cart_button').trigger('click');
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

			});

			$('body').on('click', '.woocommerce-variation-mob-btn-clone', function(e){
				$('html, body').animate({
				    scrollTop: $(".variations_form").offset().top
				}, 2000);				
			});

		}


	}

	// Clone add to cart button fixed

	function barberry_clone_add_to_cart($) {
		var _ressult = '';

		if ($('.product_layout').length) {
			var _wrap = $('.product_layout');

			// Variations
			if ($(_wrap).find('.single_variation_wrap').length) {
	            var _price = $(_wrap).find('.single_variation_wrap .woocommerce-variation .woocommerce-variation-price').length && $(_wrap).find('.single_variation_wrap .woocommerce-variation').css('display') !== 'none' ?
	                $(_wrap).find('.single_variation_wrap').find('.woocommerce-variation-price').html() : '';
	            var _addToCart = $(_wrap).find('.single_variation_wrap').find('.woocommerce-variation-add-to-cart').clone();
	            $(_addToCart).find('*').removeAttr('id');
	            if ($(_addToCart).find('.single_add_to_cart_button').length) {
	                $(_addToCart).find('.single_add_to_cart_button').removeAttr('style');
	            }
				if ($(_addToCart).find('.barberry-buy-now').length) {
					$(_addToCart).find('.barberry-buy-now').remove();
				}

	            var _btn = $(_addToCart).html();

	            var _mobBtn = $(_addToCart).find('.single_add_to_cart_button').clone().html();
	            
	            var _disable = $(_wrap).find('.single_variation_wrap').find('.woocommerce-variation-add-to-cart-disabled').length ? ' barberry-clone-disable' : '';

	            _ressult = '<div class="barberry-single-btn-clone single_variation_wrap-clone' + _disable + '">' + _price + '<div class="woocommerce-variation-add-to-cart-clone">' + _btn + '<div class="woocommerce-variation-mob-btn-clone button">' + _mobBtn + '</div></div></div>';

			}

			// Simple

			else if ($(_wrap).find('.cart').length) {
				var _addToCart = $(_wrap).find('.cart').clone();
				$(_addToCart).find('*').removeAttr('id');
				if ($(_addToCart).find('.single_add_to_cart_button').length) {
				    $(_addToCart).find('.single_add_to_cart_button').removeAttr('style');
				}
				if ($(_addToCart).find('.barberry-buy-now').length) {
					$(_addToCart).find('.barberry-buy-now').remove();
				}				
				var _btn = $(_addToCart).html();

				_ressult = '<div class="barberry-single-btn-clone">' + _btn + '</div>';
			}

		}

		return _ressult;
	}

				

  

}