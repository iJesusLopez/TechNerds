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
