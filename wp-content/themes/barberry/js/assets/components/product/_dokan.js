
// =============================================================================
// Dokan More Products Tab
// =============================================================================

barberry.dokan_products_tab = function() {

    var md = new MobileDetect(window.navigator.userAgent);
    var ismobile = md.mobile();    

    if ( !barberry.$body.hasClass('single-product') ) {
        return;
    }

    $('.woocommerce-tabs .tabs li a').off('click').on('click',function(){
        if ($(this).attr('href')=='#tab-more_seller_product') {

            var tabContainers = document.querySelectorAll('.woocommerce-Tabs-panel--more_seller_product');

            for ( var i=0; i < tabContainers.length; i++ ) {
              var container = tabContainers[i];
              ShowProducts( container );
            }   

            function ShowProducts( container ) {

                var tab_products = container.querySelector('ul.products'),

                    product = tab_products.querySelectorAll('.product'),
                    quote = tab_products.querySelectorAll('.product-title a div span'),
                    elements = tab_products.querySelectorAll('.star-rating, .more-products'),
                    price = tab_products.querySelectorAll('.price'),                    

                    tl = gsap.timeline();  
                    tl.fromTo(product, {y:10, autoAlpha:0}, {ease: "power4.Out", y:0, autoAlpha:1, duration: 2},.4);

                if ( $('.woocommerce-Tabs-panel--more_seller_product .product-grid-layout-2').length > 0 ) {
                    if ( $(window).width() > 1024 ) {
                        if (!ismobile) {
                            tl.fromTo(quote, {ease: "power4.Out", x:30, y:100, skewX:60, autoAlpha:0}, {ease: "power4.Out", x:0, y:0, skewX:0,  autoAlpha:1, duration: 1}, 0);
                            if (elements !== null) {
                                tl.fromTo(elements, {y:10, autoAlpha:0}, {ease: "power4.Out", y:0, autoAlpha:1, duration: 2},.4);
                            }
                            if (price !== null) {
                                tl.fromTo(price, {y:10, autoAlpha:0}, {ease: "power4.Out", y:0, autoAlpha:1, duration: 2},.2);
                            }
                        }
                    } else {
                        tl.fromTo(product, {autoAlpha:0}, {autoAlpha:1, duration: 2},.4);
                        tl.fromTo(quote, {autoAlpha:0}, {autoAlpha:1, duration: 2},.4);
                        tl.fromTo(elements, {autoAlpha:0}, {autoAlpha:1, duration: 2},.4);
                        tl.fromTo(price, {autoAlpha:0}, {autoAlpha:1, duration: 2},.4);
                    }
                } 
            }          
        }
    });
}