    // =============================================================================
    // Init Shipping free notification
    // =============================================================================


    barberry.ShippingFreeNotification = function() {

        if ($('.barberry-total-condition').length) {
            $('.barberry-total-condition').each(function() {
                if (!$(this).hasClass('barberry-active')) {
                    $(this).addClass('barberry-active');
                    var _per = $(this).attr('data-per');
                    $(this).find('.barberry-total-condition-hin, .barberry-subtotal-condition').css({'width': _per + '%'});
                }
            });
        }
    }

    barberry.ShippingFreeNotification();

    $('body').on('updated_wc_div', function() {
        /**
         * notification free shipping
         */
        barberry.ShippingFreeNotification();
        
    });


    $('body').on('removed_from_cart', function() {
        
        /**
         * notification free shipping
         */
        barberry.ShippingFreeNotification();
        
    });

