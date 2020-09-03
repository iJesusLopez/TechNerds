
// =============================================================================
// Product Navigation
// =============================================================================

barberry.productNavigation = function() {

    var $trigger_top = $('.product-images-wrapper');
    var $trigger_bottom = $('.product_related_wrapper');
    var $product_nav = $('.products-nav');

    if ($product_nav.length <= 0 || $trigger_top.length <= 0 || $trigger_bottom.length <= 0) return;

    var productNavToggle = function () {
        var nav_Offset_Top = $trigger_top.offset().top / 3;
        var nav_Offset_Bottom = $trigger_bottom.offset().top - 400;
        var windowScroll = $(window).scrollTop();


        if (nav_Offset_Top < windowScroll) {
            $product_nav.addClass('visible');
        } else {
            $product_nav.removeClass('visible');
        }

        if (nav_Offset_Bottom < windowScroll) {
            $product_nav.removeClass('visible');
        }        
    }; 

    productNavToggle();

    $(window).scroll(productNavToggle);
    $(window).resize(productNavToggle);   

}