
// =============================================================================
// Single Product Sliders
// =============================================================================

barberry.singleProductSlider = function() {

    (function() {
        var touchingCarousel = false,
          touchStartCoords;

        document.body.addEventListener('touchstart', function(e) {
          if (e.target.closest('.flickity-slider')) {
            touchingCarousel = true;
          } else {
            touchingCarousel = false;
            return;
          }

          touchStartCoords = {
            x: e.touches[0].pageX,
            y: e.touches[0].pageY
          }
        });

        document.body.addEventListener('touchmove', function(e) {
          if (!(touchingCarousel && e.cancelable)) {
            return;
          }

          var moveVector = {
            x: e.touches[0].pageX - touchStartCoords.x,
            y: e.touches[0].pageY - touchStartCoords.y
          };

          if (Math.abs(moveVector.x) > 7)
            e.preventDefault()

        }, {passive: false});
      })();

    

    if ( !barberry.$body.hasClass('single-product') ) {
        return;
    }

    var carouselContainers = document.querySelectorAll('.product_related_wrapper');

    for ( var i=0; i < carouselContainers.length; i++ ) {
      var container = carouselContainers[i];
      initCarouselContainer( container );
    }   

    function initCarouselContainer( container ) {
        var related_carousel = container.querySelector('.related ul.products'),
            uppsell_carousel = container.querySelector('.upsells ul.products'),
            carousel_scroll_speed = $(".product_related_wrapper").attr('data-rel-scroll-speed');

        if ( $('.single-product .related').length > 0 ) {

            var related_col = barberry_scripts_vars.related_products_columns,
                related_no = parseInt($(".related").attr('data-related-no'));

                if (related_no > related_col) {

                  $('.product_related_wrapper .single_product_summary_related').addClass('related_has_slider');

                  if ( barberry_scripts_vars.related_uppsells_scroll ) {

                    let tickerSpeed = carousel_scroll_speed;
                    let isPaused = false;
  
                      const update = () => {
                        if (isPaused) return;
                        if (flkty_rel.slides) {
                          flkty_rel.x = (flkty_rel.x - tickerSpeed) % flkty_rel.slideableWidth;
                          flkty_rel.selectedIndex = flkty_rel.dragEndRestingSelect();
                          flkty_rel.updateSelectedSlide();
                          flkty_rel.settle(flkty_rel.x);
                          var related_carousel_cells = related_carousel.querySelectorAll('.product');
  
                          for (var i = 0; i < related_carousel_cells.length; ++i) {
                            related_carousel_cells[i].classList.add('active');
                          }
  
                        }
                        window.requestAnimationFrame(update);
                        barberry.lazyLoad();
                      };
                      
                      const pause = () => {
                        isPaused = true;
                      };
                      
                      const play = () => {
                        if (isPaused) {
                          isPaused = false;
                          window.requestAnimationFrame(update);
                        }
                      };
  
                      var flkty_rel = new Flickity( related_carousel, {
                          // options
                          lazyLoad: true,
                          imagesLoaded: true,
                          rightToLeft: (barberry_scripts_vars.rtl === 'true'),
                          arrowShape: { 
                              x0: 10,
                              x1: 60, y1: 50,
                              x2: 60, y2: 40,
                              x3: 20
                          },
                          autoPlay: false,
                          prevNextButtons: true,
                          pageDots: false,
                          draggable: true,
                          wrapAround: true,
                          selectedAttraction: 0.015,
                          friction: 0.25,                        
                      }); 
                      
                      flkty_rel.x = 0;
  
                      related_carousel.addEventListener('mouseenter', pause, false);
                      related_carousel.addEventListener('focusin', pause, false);
                      related_carousel.addEventListener('mouseleave', play, false);
                      related_carousel.addEventListener('focusout', play, false);
  
                      flkty_rel.on('dragStart', () => {
                        isPaused = true;
                      });
  
                      update();

                  } else {

                    var flkty_rel = new Flickity( related_carousel, {
                        // options
                        lazyLoad: true,
                        imagesLoaded: true,
                        cellAlign: 'left',
                        contain: true,
                        groupCells: false,
                        pageDots: true,
                        rightToLeft: (barberry_scripts_vars.rtl === 'true'),
                        arrowShape: { 
                            x0: 10,
                            x1: 60, y1: 50,
                            x2: 60, y2: 40,
                            x3: 20
                        }, 
                    });                    


                    flkty_rel.on( 'change', function( index ) {
                        barberry.lazyLoad();
                        $("ul.products .product").addClass('active');                      
                    });

                  }
                }


        }

        if ( $('.single-product .upsells').length > 0 ) {

            var upsells_col = barberry_scripts_vars.upsells_products_columns,
                upsells_no = parseInt($(".upsells").attr('data-upsells-no'));

            if (upsells_no > upsells_col) {

                $('.product_related_wrapper .single_product_summary_upsell').addClass('upselles_has_slider');

                if ( barberry_scripts_vars.related_uppsells_scroll ) {

                  let tickerSpeed = carousel_scroll_speed;
                  let isPaused = false;
                  console.log(tickerSpeed);

                    const update = () => {
                      if (isPaused) return;
                      if (flkty_upp.slides) {
                        flkty_upp.x = (flkty_upp.x - tickerSpeed) % flkty_upp.slideableWidth;
                        flkty_upp.selectedIndex = flkty_upp.dragEndRestingSelect();
                        flkty_upp.updateSelectedSlide();
                        flkty_upp.settle(flkty_upp.x);
                        var upsell_carousel_cells = uppsell_carousel.querySelectorAll('.product');

                        for (var i = 0; i < upsell_carousel_cells.length; ++i) {
                          upsell_carousel_cells[i].classList.add('active');
                        }

                      }
                      window.requestAnimationFrame(update);
                      barberry.lazyLoad();
                    };
                    
                    const pause = () => {
                      isPaused = true;
                    };
                    
                    const play = () => {
                      if (isPaused) {
                        isPaused = false;
                        window.requestAnimationFrame(update);
                      }
                    };

                    var flkty_upp = new Flickity( uppsell_carousel, {
                        // options
                        lazyLoad: true,
                        imagesLoaded: true,
                        rightToLeft: (barberry_scripts_vars.rtl === 'true'),
                        arrowShape: { 
                            x0: 10,
                            x1: 60, y1: 50,
                            x2: 60, y2: 40,
                            x3: 20
                        },
                        autoPlay: false,
                        prevNextButtons: true,
                        pageDots: false,
                        draggable: true,
                        wrapAround: true,
                        selectedAttraction: 0.015,
                        friction: 0.25,                        
                    }); 
                    
                    flkty_upp.x = 0;

                    uppsell_carousel.addEventListener('mouseenter', pause, false);
                    uppsell_carousel.addEventListener('focusin', pause, false);
                    uppsell_carousel.addEventListener('mouseleave', play, false);
                    uppsell_carousel.addEventListener('focusout', play, false);

                    flkty_upp.on('dragStart', () => {
                      isPaused = true;
                    });

                    update();

                } else {

                  var flkty_upp = new Flickity( uppsell_carousel, {
                      // options
                      lazyLoad: true,
                      imagesLoaded: true,
                      cellAlign: 'left',
                      contain: true,
                      groupCells: false,
                      pageDots: true,
                      rightToLeft: (barberry_scripts_vars.rtl === 'true'),
                      arrowShape: { 
                          x0: 10,
                          x1: 60, y1: 50,
                          x2: 60, y2: 40,
                          x3: 20
                      },
              
                  }); 

                  flkty_upp.on( 'change', function( index ) {
                      barberry.lazyLoad();
                      $("ul.products .product").addClass('active');                    
                  });

                }



            }            
        } 
    }
}


