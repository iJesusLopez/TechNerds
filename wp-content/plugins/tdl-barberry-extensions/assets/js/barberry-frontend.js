jQuery(function($) {

	"use strict";

	var barberryExt = barberryExt || {};
	barberryExt.init = function() {
		barberryExt.$body = $(document.body),
			barberryExt.$window = $(window),
			barberryExt.$header = $('.site-header'),

			this.sliderInit();
			this.CollectionsSliderInit();
			this.vcProductSlider();
			// this.loadingAjaxExt();
			
		};



	// =============================================================================
	// Scripts
	// =============================================================================	

	
	// @codekit-prepend  "_header-init.js";

	// @codekit-append  "_slider.js";
	// @codekit-append  "_collections_slider.js";
	// @codekit-append  "_carousel.js";


	// @codekit-append  "_footer-init.js";




// =============================================================================
// Slider Init
// =============================================================================

barberryExt.sliderInit = function() {

  // First we get the viewport height and we multiple it by 1% to get a value for a vh unit
  var vh = window.innerHeight * 0.01;
  // Then we set the value in the --vh custom property to the root of the document
  document.documentElement.style.setProperty('--vh', vh + 'px');

  window.addEventListener('resize', function() {
    var vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', vh + 'px');
  }, true);

  var carouselContainers = document.querySelectorAll('.shortcode_barberry_slider');

  for ( var i=0; i < carouselContainers.length; i++ ) {
    var container = carouselContainers[i];
    initCarouselContainer( container );
  }


  function initCarouselContainer( container ) {

    var carousel = container.querySelector('.barberry_slider-wrapper'),
        slider_autoplay = carousel.getAttribute("data-autoplay"),
        slider_autoplay_speed = carousel.getAttribute("data-autoplay-speed"),
        slides = carousel.querySelectorAll('.bg-wrapper');

        var flkty = new Flickity( carousel, {
          bgLazyLoad: 1,
          imagesLoaded: true,
          accessibility: true,
          prevNextButtons: true,
          pageDots: true,
          contain: true,
          wrapAround: true,     
          setGallerySize: false,
          autoPlay: slider_autoplay ? parseInt(slider_autoplay_speed) : false,
          arrowShape: {
            x0: 10,
            x1: 60,
            y1: 50,
            x2: 60,
            y2: 45,
            x3: 15
          },
          on: {
            ready: function() {
                var tl = gsap.timeline(),
                    slider_wrapper = carousel.querySelector('.flickity-slider'),
                    slider_content = carousel.querySelectorAll('.slider-content-wrapper'),
                    slider_arrows = carousel.querySelectorAll('.flickity-button svg'),
                    slider_dots = carousel.querySelector('.flickity-page-dots');

                tl.fromTo(slider_wrapper, {scale:1.2}, {ease: "power4.InOut", scale:1, duration: 2}, 0);
                tl.fromTo(slider_content, {autoAlpha:0}, {ease: "power4.InOut", autoAlpha:1, duration: 2.4}, 1); 
                tl.fromTo([slider_arrows,slider_dots], {autoAlpha:0}, {ease: "power4.InOut", autoAlpha:1, duration: 2}, 1.3);                       
            }
          }      
        });

        flkty.on('scroll', function () {

          flkty.slides.forEach(function (slide, i) {
            var image = slides[i],    
                x = 0;

            if (image) {
               if( 0 === i ) {
                x = Math.abs( flkty.x ) > flkty.slidesWidth ? ( flkty.slidesWidth + flkty.x + flkty.slides[flkty.slides.length - 1 ].outerWidth + slide.target ) : ( slide.target + flkty.x );
              } else if( i === flkty.slides.length - 1 ) {
                x = Math.abs( flkty.x ) + flkty.slides[i].outerWidth < flkty.slidesWidth ? ( slide.target - flkty.slidesWidth + flkty.x - flkty.slides[i].outerWidth ) : ( slide.target + flkty.x );
              } else {
                x = slide.target + flkty.x;
              }

              var md = new MobileDetect(window.navigator.userAgent);
              var ismobile = md.mobile();

              if (!ismobile) {
                image.style.transform = 'translateX(' + x * ( -1 / 2 ) + 'px)';
              }              
            }

       
            
          });

        }); 


    
  }  




}


// =============================================================================
// Slider Init
// =============================================================================

barberryExt.CollectionsSliderInit = function() {

  "use strict";

  // First we get the viewport height and we multiple it by 1% to get a value for a vh unit
  var vh = window.innerHeight * 0.01;
  // Then we set the value in the --vh custom property to the root of the document
  document.documentElement.style.setProperty('--vh', vh + 'px');

  window.addEventListener('resize', function() {
    var vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', vh + 'px');
  }, true);

  var carouselContainers = document.querySelectorAll('.shortcode_barberry_collections_slider');

  Flickity.createMethods.push('_createPrevNextCells');

  Flickity.prototype._createPrevNextCells = function() {
    this.on( 'select', this.setPrevNextCells );
  };

  Flickity.prototype.setPrevNextCells = function() {
    // remove classes
    changeSlideClasses( this.previousSlide, 'remove', 'is-previous' );
    changeSlideClasses( this.nextSlide, 'remove', 'is-next' );
    // set slides
    var previousI = fizzyUIUtils.modulo( this.selectedIndex - 1, this.slides.length );
    var nextI = fizzyUIUtils.modulo( this.selectedIndex + 1, this.slides.length );
    this.previousSlide = this.slides[ previousI ];
    this.nextSlide = this.slides[ nextI ];
    // add classes
    changeSlideClasses( this.previousSlide, 'add', 'is-previous' );
    changeSlideClasses( this.nextSlide, 'add', 'is-next' );
  };

  function changeSlideClasses( slide, method, className ) {
    if ( !slide ) {
      return;
    }
    slide.getCellElements().forEach( function( cellElem ) {
      cellElem.classList[ method ]( className );
    });
  }

  for ( var i=0; i < carouselContainers.length; i++ ) {
    var container = carouselContainers[i];
    initCarouselContainer( container );
  }



  function initCarouselContainer( container ) {

    var carousel = container.querySelector('.barberry_slider_big'),
        carousel_small = container.querySelector('.barberry_slider_small'),
        carousel_content = container.querySelector('.barberry_slider_content .slider_content-wrapper'),
        carousel_content_next = container.querySelector('.barberry_slider_content .flickity-prev-next-button.next'),
        initialIndex = Math.floor( carousel_small.querySelectorAll(".carousel-cell").length) - 1,
        slider_autoplay = carousel.getAttribute("data-autoplay"),
        slider_autoplay_speed = carousel.getAttribute("data-autoplay-speed"),
        slides = carousel.querySelectorAll('.bg-wrapper'),
        slides_sm = carousel_small.querySelectorAll('.bg-wrapper');

        if (barberryExt.$body.hasClass('rtl')) {
          initialIndex = 1;
        } 

        var flkty_cn = new Flickity( carousel_content, {

          prevNextButtons: true,
          pageDots: true,
          // contain: true,
          wrapAround: true, 
          // autoPlay: true,
          autoPlay: slider_autoplay ? parseInt(slider_autoplay_speed) : false,  
          draggable: false,  
          setGallerySize: false,
          sync: carousel,
          arrowShape: 'M3.1,28.9 28.6,3.4 32.9,7.7 14.7,25.9 68.1,25.9 68.1,32 14.7,32 32.9,50.2 28.6,54.5 z',
          on: {
            ready: function() {

            }
          }           
        });



        $('.barberry_slider_content .flickity-prev-next-button.next').on('click', function () {
          flkty_sm.next( );
        });        
        $('.barberry_slider_content .flickity-prev-next-button.previous').on('click', function () {
          flkty_sm.previous( );
        }); 

        var flkty_sm = new Flickity( carousel_small, {
          bgLazyLoad: 1,
          imagesLoaded: true,
          prevNextButtons: false,
          pageDots: false,   
          wrapAround: true, 
          autoPlay: slider_autoplay ? parseInt(slider_autoplay_speed) : false,  
          draggable: false,  
          setGallerySize: false,
          initialIndex: initialIndex,
          on: {
            ready: function() {

                var tl = gsap.timeline(),
                    slider_wrapper = carousel_small.querySelector('.flickity-slider');

                    tl.fromTo(slider_wrapper, {scale:1.2}, {ease: "power4.InOut", scale:1, duration: 2}, 0);
            }
          }           
        });
    


        flkty_sm.on('scroll', function () {

          flkty_sm.slides.forEach(function (slide, i) {
            var image = slides_sm[i],    
                x = 0;

            if (image) {
               if( 0 === i ) {
                x = Math.abs( flkty_sm.x ) > flkty_sm.slidesWidth ? ( flkty_sm.slidesWidth + flkty_sm.x + flkty_sm.slides[flkty_sm.slides.length - 1 ].outerWidth + slide.target ) : ( slide.target + flkty_sm.x );
              } else if( i === flkty.slides.length - 1 ) {
                x = Math.abs( flkty_sm.x ) + flkty_sm.slides[i].outerWidth < flkty_sm.slidesWidth ? ( slide.target - flkty_sm.slidesWidth + flkty_sm.x - flkty_sm.slides[i].outerWidth ) : ( slide.target + flkty_sm.x );
              } else {
                x = slide.target + flkty_sm.x;
              }

              var md = new MobileDetect(window.navigator.userAgent);
              var ismobile = md.mobile();

              if (!ismobile) {
                image.style.transform = 'translateX(' + x * ( -1 / 2 ) + 'px)';
              }              
            }
          });

        });

        var flkty = new Flickity( carousel, {
          bgLazyLoad: 1,
          imagesLoaded: true,
          accessibility: false,
          prevNextButtons: false,
          pageDots: false,
          contain: true,
          wrapAround: true,     
          setGallerySize: false,
          sync: carousel_content,
          arrowShape: {
            x0: 10,
            x1: 60,
            y1: 50,
            x2: 60,
            y2: 45,
            x3: 15
          },
          on: {
            ready: function() {

                var tl = gsap.timeline(),
                    slider_wrapper = carousel.querySelector('.flickity-slider'),
                    slider_content = carousel.querySelectorAll('.slider-content-wrapper'),
                    slider_arrows = carousel.querySelectorAll('.flickity-button svg'),
                    slider_dots = carousel.querySelector('.flickity-page-dots');

                tl.fromTo(slider_wrapper, {scale:1.2}, {ease: "power4.InOut", scale:1, duration: 2}, 0);
                tl.fromTo(slider_content, {autoAlpha:0}, {ease: "power4.InOut", autoAlpha:1, duration: 2.4}, 1); 
                tl.fromTo([slider_arrows,slider_dots], {autoAlpha:0}, {ease: "power4.InOut", autoAlpha:1, duration: 2}, 1.3); 

            }
          }      
        });

        // Determine which direction is swiped
        function getSwipeDirection(moveVector) {

            var swipeDirection = null;

            if (moveVector.x > 0) {
                swipeDirection = 'right';
            } else {
                swipeDirection = 'left';
            }

            return swipeDirection;
        }

      var  current_index = null,
           swipe_direction = null;

      // Detect swipe direction
      flkty.on( 'dragMove', function( event, pointer, moveVector ) {

          current_index = flkty.selectedIndex;
          swipe_direction = getSwipeDirection(moveVector);

          if (slider_autoplay) {
            flkty_sm.stopPlayer()
          }

      });


      // Do stuff based on a successful swipe and it's direction
      flkty.on( 'dragEnd', function( touchend ) {
          if (flkty.selectedIndex !== current_index) {

              if (swipe_direction === 'left') {
                  flkty_sm.next( );
              } else {
                  flkty_sm.previous();
              }

          } else {

          }
      });


      container.addEventListener( 'mouseenter', function() {
        flkty.stopPlayer();
        flkty_sm.stopPlayer();
        flkty_cn.stopPlayer();
      });


      flkty.on('scroll', function () {

        flkty.slides.forEach(function (slide, i) {
          var image = slides[i],    
              x = 0;

          if (image) {
             if( 0 === i ) {
              x = Math.abs( flkty.x ) > flkty.slidesWidth ? ( flkty.slidesWidth + flkty.x + flkty.slides[flkty.slides.length - 1 ].outerWidth + slide.target ) : ( slide.target + flkty.x );
            } else if( i === flkty.slides.length - 1 ) {
              x = Math.abs( flkty.x ) + flkty.slides[i].outerWidth < flkty.slidesWidth ? ( slide.target - flkty.slidesWidth + flkty.x - flkty.slides[i].outerWidth ) : ( slide.target + flkty.x );
            } else {
              x = slide.target + flkty.x;
            }

            var md = new MobileDetect(window.navigator.userAgent);
            var ismobile = md.mobile();

            if (!ismobile) {
              image.style.transform = 'translateX(' + x * ( -1 / 2 ) + 'px)';
            }              
          }
        });

      }); 

  }  

}


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

	/**
	 * Document ready
	 */
	$(function() {
		barberryExt.init();
	});


});