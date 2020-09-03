  // =============================================================================
  // Single Product Gallery
  // =============================================================================

  barberry.productGallery = function() {

    if ( !$('#product-images').length ) {
        return;
    }


	var $product_layout = 'product_layout_default';

    if ( $('.product_layout').hasClass('product_layout_style_2') ) {
        $product_layout = 'product_layout_style_2';
    } else if ( $('.product_layout').hasClass('product_layout_style_3') ) {
    	$product_layout = 'product_layout_style_3';
    } else {
    	$product_layout = 'product_layout_default';
    }

    var $product_thumbs = 'thumbs-bottom';

    if ( $('.product-images-cell').hasClass('thumbs-left') ) {
        $product_thumbs = 'thumbs-left';
    } else if ( $('.product-images-cell').hasClass('thumbs-right') ) {
    	$product_thumbs = 'thumbs-right';
    } else {
    	$product_thumbs = 'thumbs-bottom';
    }

  	var md = new MobileDetect(window.navigator.userAgent);
	var ismobile = md.mobile();

	var carouselContainers = document.querySelectorAll('.woocommerce-product-gallery');

	for ( var i=0; i < carouselContainers.length; i++ ) {
	  var container = carouselContainers[i];
	  initCarouselContainer( container );
	}	

	$('.product-thumbnails-container, .product-vr-thumbnails-container').css('opacity', '1');

	function initCarouselContainer( container ) {

	var carousel = container.querySelector('.woocommerce-product-gallery__wrapper'),
	  	thumb_carousel = container.querySelector('.product-thumbnails'),
	  	images = $('#product-images'),
		cells = carousel.querySelectorAll('.product-gallery-cell');

	var	$wrapAround = false,
		$lazyload = true,
		$cellAlign = 'left';

	if ( $product_layout == 'product_layout_style_3' ) {
		$wrapAround = true;
		$lazyload = false;
		$cellAlign = 'center';
	}

	var flkty,
		flkty_th;	

	function init_flkty_th() {

		var $thumbs = $('.product-thumbnails, .product-vr-thumbnails');

		function initThumbnailsMarkup() {
			var markup = '';

			$('.woocommerce-product-gallery__image').each(function () {
				var image = $(this).data('thumb'),
					alt = $(this).find('img').attr('alt'),
					title = $(this).find('img').attr('title');

				markup += '<div class="woocommerce-product-thumb__image"><img alt="' + alt + '" title="' + title + '" src="' + image + '" /></div>';
			});

			$thumbs.empty();
			$thumbs.append(markup);		

		}

		initThumbnailsMarkup();

			if ( thumb_carousel ) {

				flkty_th = new Flickity( thumb_carousel, {
					imagesLoaded: true,
					asNavFor: '.woocommerce-product-gallery__wrapper',
					contain: true,
					freeScroll: false,
					prevNextButtons: false,
					pageDots: false,
					percentPosition: true, 
					rightToLeft: (barberry_scripts_vars.rtl === 'true'),	        
				} );

				if ( $product_thumbs != 'thumbs-bottom' ) {
					
					var $carouselNav = $('.product-vr-thumbnails');
					var $carouselNavCells = $carouselNav.find('.woocommerce-product-thumb__image');

					$carouselNav.on( 'click', '.woocommerce-product-thumb__image', function( event ) {
					  var index = $( event.currentTarget ).index();
					  flkty.selectCell(index);
					});

					function thumb_height() {
						var navTop  = $carouselNav.position().top,
							navCellHeight = $carouselNavCells.height(),
							navHeight = $carouselNav.height();	

						$carouselNav.find('.is-nav-selected').removeClass('is-nav-selected');
						  var $selected = $carouselNavCells.eq( flkty.selectedIndex )
						    .addClass('is-nav-selected');		

						// scroll nav
						var scrollY = $selected.position().top +
						$carouselNav.scrollTop() - ( navHeight + navCellHeight ) / 2;
						$carouselNav.stop(true, false).animate({
							scrollTop: scrollY
						});
					}					

					flkty.on( 'select', thumb_height );


				}
			}
	}		

	function init_flkty() {

		  function updateStatus() {
		    var slideNumber = flkty.selectedIndex + 1;
		    carouselStatus.innerHTML = '<span>' + slideNumber + '</span>' + '/' + '<span>' + flkty.slides.length + '</span>';
		  }

		  flkty = new Flickity( carousel, {
		    // options
		    imagesLoaded: true,
		    cellAlign: $cellAlign,
		    contain: true,
		    lazyLoad: $lazyload,
		    wrapAround: $wrapAround,
		    pageDots: false,
		    prevNextButtons: cells.length > 1 ? true : false,
		    // prevNextButtons: false,	    
		    dragThreshold: 15,
		    adaptiveHeight: true,
		    rightToLeft: (barberry_scripts_vars.rtl === 'true'),
			arrowShape: { 
				x0: 10,
				x1: 60, y1: 50,
				x2: 60, y2: 40,
				x3: 20
			},
			on: {
				ready: function() {
				  // var	tl = gsap.timeline(),
						// gallery = $("#product-images, #product-images .flickity-slider");

					// tl.fromTo(gallery, .5, {opacity:0}, {ease: Power4.easeInOut, opacity:1}, .1);

					if ( barberry_scripts_vars.product_images_lightbox == '1' ) {
						images.addClass('photoswipe-enabled');
					}

					if ( $product_layout == 'product_layout_default' ) {
						if ( barberry_scripts_vars.product_zoom === '1' && !ismobile ) {
							images.find('.woocommerce-product-gallery__image').each(function() {
								images.addClass('zoom-enabled');
								$(this).zoom({
									url  : $(this).attr('src'),
									touch: false
								});
							});
						}	
					}					

			
				}
			}		        
		  } );

		var lastposition;

		flkty.on( 'pointerDown', function( event, pointer ) {  
		  lastposition = pointer.pageY;  
		});


		flkty.on('staticClick', function(event, pointer, cellElement, cellIndex) {

			// dismiss if it is scrolling down
			if ( lastposition !== pointer.pageY ) { return; } 

		    if (!cellElement) {
		      console.log('nocell');
		      return;
		    }

			var $images = $('#product-images');	

			if ( !$images.length ) {
				return;
			}

			var $links = $images.find('.woocommerce-product-gallery__image img.single-product-img');
			

			var openPhotoSwipe = function(galleryElement) {

				var items = [];
				$links.each(function() {
					var $a = $(this);
					items.push({
						src: $a.attr('data-src'),
						w  : $a.attr('data-large_image_width'),
						h  : $a.attr('data-large_image_height')
					});

				});		

				var index = $links.index($(this)),
					options = {
						index: cellIndex,
						closeOnScroll: false,
						bgOpacity: .6,
						tapToClose: true,
						tapToToggleControls: false,        
					};

				var lightBox = new PhotoSwipe(document.getElementById('pswp'), window.PhotoSwipeUI_Default, items, options);
				lightBox.init();


			    // Image loaded
			    lightBox.listen('imageLoadComplete', function(index, item) { 
			      var item1 = item.src;
			      var curimg = lightBox.currItem;

			      var image = new Image;

			      image.onload = function () {

			        if (barberry_scripts_vars.product_lightbox_dominant == '1') {

						var colorThief = new ColorThief();
						var color = colorThief.getColor(image);		        	
						
						setTimeout(function() {
							$(".pswp__bg").css("backgroundColor", 'rgb(' + color + ')');
						}, 100);


						$(".pswp__item").fadeTo( 1000, 1 );
						$("body").addClass('photoswipe-blur');
		            
			           
			        } else {
			          $(".pswp__bg").css("backgroundColor", 'rgba(0,0,0,.9)');
						$(".pswp__item").fadeTo( 1000, 1 );
						$("body").addClass('photoswipe-blur');		          
			        } 
			      };  

			      image.src = curimg.src;  
			    });		

				// Image changed
			    lightBox.listen('afterChange', function() { 
			      var curimg = lightBox.currItem;

			      var image = new Image;

			      image.onload = function () {


			        if (barberry_scripts_vars.product_lightbox_dominant == '1') {
				        var colorThief = new ColorThief();
				        var color = colorThief.getColor(image);		        	
			           setTimeout(function() {
			            $(".pswp__bg").css("backgroundColor", 'rgb(' + color + ')');
			           }, 100)
			        } else {
			          $(".pswp__bg").css("backgroundColor", 'rgba(0,0,0,.9)');
			        } 

			      }; 

			      image.src = curimg.src; 
			    });

			    // Image Close
			    lightBox.listen('close', function(index, item) { 
			      // $(".pswp__bg").fadeOut( "slow", 0 ); 
			      $(".pswp__item").fadeOut( "slow", 0 ); 
			      $("body").removeClass('photoswipe-blur');
			    });

			}

			if ( cellIndex == flkty.selectedIndex ) {
				if ( barberry_scripts_vars.product_images_lightbox == '1' ) {
					openPhotoSwipe();
				}
			}

			if ( typeof cellIndex == 'number' ) {
				flkty.selectCell(cellIndex);
				return;
			} 	


	  });

		if ( $product_layout == 'product_layout_style_3' ) {

		  flkty.on( 'staticClick', function( event, pointer, cellElement, cellIndex ) {
		    if ( typeof cellIndex == 'number' ) {
		      flkty.selectCell(cellIndex);
		    }    
		  });

		  var carouselStatus = container.querySelector('.carousel-status');


		  updateStatus();
		  
		  flkty.on( 'select', updateStatus );

		} 

	}


	init_flkty();
	init_flkty_th();

	function variation_anim() {
		var	tl = gsap.timeline(),
		gallery = $(".single-product #product-images"),
		gallery_th = $(".product-thumbnails-container, .product-vr-thumbnails-container");

		tl.fromTo(gallery, {autoAlpha:0}, {ease: "power4.InOut", autoAlpha:1, duration: 1}, 0);
		tl.fromTo(gallery_th, {autoAlpha:0}, {ease: "power4.InOut", autoAlpha:1, duration: 1}, 0);
	}

	function slider_height_update() {
		var setHeight = $("#product-images .flickity-viewport").height();
		// console.log(setHeight);
		$(".product-image-wrapper").height(setHeight);
	}

	// $(window).resize(function() {
	// 	console.log('resize'); 
	// 	$(".product-image-wrapper").removeAttr("style");
	// 	slider_height_update();
	// });

	var $variation_forms = $('.variations_form');

	$variation_forms.each(function () {
		var $variation_form = $(this);


		if (barberry_scripts_vars.variation_gallery === '1' && barberry_variation_gallery_data) {

			$(document).on('found_variation', 'form.variations_form', function(event, variation)  {
				event.preventDefault();
				slider_height_update();
				variation_anim();
				flkty.destroy();
				if ($('.product-thumbnails-wrapper').length) {
					flkty_th.destroy();
				}
				replaceMainGallery(variation.variation_id, $variation_form);			
				init_flkty();
				init_flkty_th();
				flkty.selectCell( 0 );

			}).on('click', '.reset_variations', function (event) {

				event.preventDefault();
				variation_anim();
				flkty.destroy();
				if ($('.product-thumbnails-wrapper').length) {
					flkty_th.destroy();	
				}
				replaceMainGallery('default', $variation_form);		
				init_flkty();
				init_flkty_th();	
				flkty.selectCell( 0 );	
				
			})


		} else {

			$(document).on('found_variation', 'form.variations_form', function(event, variation) {
				event.preventDefault();
				flkty.selectCell( 0 );

				if ( $product_layout == 'product_layout_default' ) {
					if ( barberry_scripts_vars.product_zoom === '1' && !ismobile ) {
						images.find('.woocommerce-product-gallery__image').each(function() {
							$(this).zoom({
								url  : $(this).attr('src'),
								touch: false
							});
						});
					}
				}

			}).on('click', '.reset_variations', function (event) {
				event.preventDefault();
				flkty.selectCell( 0 );
				if ( $product_layout == 'product_layout_default' ) {
					if ( barberry_scripts_vars.product_zoom === '1' && !ismobile ) {
						images.find('.woocommerce-product-gallery__image').each(function() {
							$(this).zoom({
								url  : $(this).attr('src'),
								touch: false
							});

						});
					}
				}
			});	

		}

	});



	var isVariationGallery = function (key) {
		return typeof barberry_variation_gallery_data !== 'undefined' && barberry_variation_gallery_data && barberry_variation_gallery_data[key];
	};

	var replaceMainGallery = function (key, $variationForm) {
		if (!isVariationGallery(key)) {
			return false;
		}
		// $('.product-thumbnails-container').data('thumb','1000');

		var $imagesNum = $('.product-thumbnails-container').attr( "data-thumb" );

		var imagesData = barberry_variation_gallery_data[key];
		var $mainGallery = $('.woocommerce-product-gallery__wrapper');
		$mainGallery.empty();
		// $imagesNum.empty();

		for (var index = 0; index < imagesData.length; index++) {
			$mainGallery.append(
				'<div data-thumb="' + imagesData[index].data_thumb + '" class="woocommerce-product-gallery__image product-gallery-cell">\
							' + imagesData[index].image + '\
				</div>'
			);

			$imagesNum = index;

		}

		$('.product-thumbnails-container').attr('data-thumb', $imagesNum+1);
	

		return true;
	} 

	// Sticky Add to Cart

	$(".variations_form").on('change', 'select', function() {

		if ($('.barberry-thumb-clone img').length) {
			var temp_var = $('.product_layout #product-images .woocommerce-product-gallery__image:first-child').attr('data-thumb');
			$('.barberry-thumb-clone img').attr('src', temp_var);			
		}

	});

 
	}


  }