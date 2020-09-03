
// =============================================================================
// AJAX Product Add to Cart
// =============================================================================

barberry.productAddToCartAjax = function() {


    barberry.$body.find('form.cart').on('click', '.barberry-buy-now', function(e) {
        e.preventDefault();

        if (!$(this).hasClass('barberry-waiting')) {
            $(this).addClass('barberry-waiting');
            
            var _form = $(this).parents('form.cart');
            if ($(_form).find('.single_add_to_cart_button.disabled').length) {
                $(_form).find('.single_add_to_cart_button.disabled').trigger('click');
                $(this).removeClass('barberry-waiting');
            } else {
                if ($(_form).find('input[name="barberry_buy_now"]').length) {
                    $(_form).find('input[name="barberry_buy_now"]').val('1');
                    $(_form).find('.single_add_to_cart_button').trigger('click');
                }
            }
        }
        
        return false;
    });

    if ( barberry_scripts_vars.product_add_to_cart_ajax == '0' ) {
        return;
    }

    if (barberry.$body.find('div.product').hasClass('product-type-external')) {
        return;
    }



    barberry.$body.find('form.cart').on('click', '.single_add_to_cart_button', function(e) {

        if ( $('input[name="barberry_buy_now"]').val() == 1 ) {
          console.log('buy it now');
          return;
        }

        e.preventDefault();

        if ( $(this).hasClass('disabled') ) {
            return;
        }

        var progressBtn = $(this),
            buyitnowBtn = $('.barberry-buy-now'); 

        if (!progressBtn.hasClass("active")) {
          progressBtn.addClass("active");
          buyitnowBtn.addClass("hide_btn");
          setTimeout(function() {
            progressBtn.addClass("check");
          }, 3000);
          setTimeout(function() {
            progressBtn.removeClass("active");
            buyitnowBtn.removeClass("hide_btn");
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

                if ( barberry_scripts_vars.add_to_cart_action == 'no_action' ) {
                  return;
                }

                $(document.body).on('wc_fragments_refreshed', function() {

                    $singleBtn.removeClass('loading');

                    barberry.ShippingFreeNotification();

                    setTimeout(function(){ 
                        // if ( barberry_scripts_vars.add_to_cart_action == 'no_action' ) {
                        //   return;
                        // }
                        window.offcanvas_right();
                    }, 200);

                });

            }
        });

    });

}