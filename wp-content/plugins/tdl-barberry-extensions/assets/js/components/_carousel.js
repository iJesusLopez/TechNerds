// =============================================================================
// Product Carousel
// =============================================================================

barberryExt.lazyLoad = function() {

	$(".product_slider_wrapper img.lazy").lazyload({
		threshold : 200
	});

}


barberryExt.vcProductSlider = function() {

    var carouselContainers = document.querySelectorAll('.shortcode_products_slider');

    for ( var i=0; i < carouselContainers.length; i++ ) {
      var container = carouselContainers[i];
      initCarouselContainer( container );
    } 

    function initCarouselContainer( container ) {
        var carousel = container.querySelector('ul.products');

        var flkty = new Flickity( carousel, {
            // options
            lazyLoad: true,
            imagesLoaded: true,
            groupCells: false,
            cellAlign: 'left',
            contain: true,
            rightToLeft: (barberry_scripts_vars.rtl === 'true'),
            pageDots: true,
            arrowShape: { 
                x0: 10,
                x1: 60, y1: 50,
                x2: 60, y2: 40,
                x3: 20
            },            
        });  

        flkty.on( 'change', function( index ) {
          	barberryExt.lazyLoad();
            $("ul.products .product").addClass('active');
        });

    }    

}