
// =============================================================================
// Product Tabs
// =============================================================================

barberry.productTabs = function() {

    $('.product_meta_ins:not(:has(span))').hide();






    // $('.woocommerce-tabs .tabs li a').off('click').on('click',function(){
    //     if ($(this).attr('href')=='#tab-more_seller_product') {
    //             console.log('vendor enable');
    //             $( '.woocommerce-Tabs-panel--more_seller_product ul li.product, .woocommerce-Tabs-panel--more_seller_product ul li.product .attr-swatches, .woocommerce-Tabs-panel--more_seller_product ul.products.product-grid-layout-2 li.product .product-inner .product-details .product-title a div span' ).css( "opacity", 1 );
    //     }

    // });

    // $('.woocommerce-tabs').off('click').on('click',function(){
    //     $('.tabs li a').each(function(){
    //         if ($(this).attr('href')=='#tab-more_seller_product') {
    //             console.log('vendor enable');
    //         }
    //     });        
    // });

    $('.woocommerce-review-link').off('click').on('click',function(){
    
        $('.tabs li a').each(function(){
            if ($(this).attr('href')=='#tab-reviews') {
                $(this).trigger('click');
            }
        });
        
        var tab_reviews_topPos = $('.woocommerce-tabs').offset().top;
        
        $('html, body').animate({
            scrollTop: tab_reviews_topPos
        }, 500);
        
        return false;
    });

    $( '.wc-tabs-wrapper, .woocommerce-tabs' ).off('click').on('click', '.wc-tabs li a, ul.tabs li a', function() {

        if ($(this).parent('li').hasClass('active'))
        {

            return false;
        }
        else 
        {
            var $tab          = $( this );
            var $tabs_wrapper = $tab.closest( '.wc-tabs-wrapper, .woocommerce-tabs' );
            var $tabs         = $tabs_wrapper.find( '.wc-tabs, ul.tabs' );

            $tabs.find( 'li' ).removeClass( 'active' );
            $(this).parent('li').addClass( 'active' );

            $tabs_wrapper.find( '.wc-tab:visible').fadeOut(300, function(){
                $tabs_wrapper.find( $tab.attr( 'href' ) ).fadeIn(300);
                // barberry.animationProduct();
            });

            return false;
        }
    });


    // Single Product Tab Reviews

    $(".woocommerce-tabs #reviews .comment-text > p.meta").contents().filter(function(){
        return (this.nodeType == 3);
    }).remove();

    $("#reviews #comments .comment_container").each(function(){
        $(this).find(".star-rating").detach().insertAfter($(this).find(".meta"));
    });

    if ( ($('ol.commentlist').length < 1) && ($('body.woocommerce').length > 1)  )
    {
        $('#comments').hide();
    }  




     

}