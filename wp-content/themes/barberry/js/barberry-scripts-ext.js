jQuery(function($) {

	"use strict";

	var barberry = barberry || {};
	barberry.init = function() {
		barberry.$body = $(document.body),
			barberry.$window = $(window),
			barberry.$header = $('.site-header'),
			barberry.ajaxXHR = null;

			this.globalDebounce();
			this.mobileDetect();
			this.mobileCategories();
			this.pageLoader();
			this.stickyHeader();
			this.foundationInit();
			this.lazyLoad();
			this.navigationInit();
			this.offCanvas();	
			this.postGallery();	
			this.parallaxInit();
			this.bgParallaxInit();
			this.select2();

		    if ( barberry_scripts_vars.load_animation == '1' ) {
				this.pageHeaderAnimation();
				this.productInfoAnimation();
				this.postsInview();	
		    }

			this.backtoTop();
			this.shareInit();
			this.searchInit();	
			
			this.splitText();
			this.dokan_products_tab();
			this.singleProductSlider();
			this.animationProduct();
			this.filterAjax();
			this.loadingAjax();
			this.loadingPostsAjax();
			this.quickView();			
			this.ajaxWishlist();
			this.filterToggle();
			this.filters_scroll();
			this.productCard();
			this.productSwatches();
			this.productQuantity();
			this.miniCart();
			this.countDownTimer();
			this.widgetProductCategories();
			this.stickyShopSidebar();
			this.stickySidebarBtn();
			this.removeFromCart();
			this.couponFocus();
			this.woocommerceNotices();
			this.ShippingFreeNotification();
			this.shopLogin();
			this.stickyAddtocart();
			this.productGallery();
			this.productVideo();
			this.productInview();
			this.productTabs();
			this.productNavigation();
			this.productAddToCartAjax();
			this.productWishlist();
			this.productCompare();

			this.footerInit();
			$(document).trigger( 'barberry.scripts_loaded' );
			
		};



	// =============================================================================
	// Scripts
	// =============================================================================	

	
	// @codekit-prepend  "components/_header-init.js";
	
	// @codekit-append  "components/_globals.js";
	// @codekit-append  "components/_mobile-check.js";
	// @codekit-append  "components/_mobile-categories.js";
	// @codekit-append  "components/_page-loader.js";
	// @codekit-append  "components/_sticky-header.js";
	// @codekit-append  "components/_foundation.js";
	// @codekit-append  "components/_lazyload.js";
	// @codekit-append  "components/_navigation.js";
	// @codekit-append  "components/_footer.js";
	// @codekit-append  "components/_off-canvas.js";
	// @codekit-append  "components/_parallax.js";
	// @codekit-append  "components/_select2.js";
	// @codekit-append  "components/_page_header-animation.js";
	// @codekit-append  "components/_backtotop.js";
	// @codekit-append  "components/_share.js";
	// @codekit-append  "components/_search.js";

	// @codekit-append  "components/blog/_posts_inview.js";
	// @codekit-append  "components/_bgparallax.js";
	// @codekit-append  "components/blog/_ajax_load_posts.js";
	// @codekit-append  "components/blog/_wp_gallery.js";

	// @codekit-append  "components/shop/_free-shipping.js";
	// @codekit-append  "components/shop/_product-animation.js";
	// @codekit-append  "components/shop/_product-card.js";
	// @codekit-append  "components/shop/_product-quantity.js";
	// @codekit-append  "components/shop/_swatches.js";
	// @codekit-append  "components/shop/_ajax-loading.js";
	// @codekit-append  "components/shop/_ajax-filter.js";
	// @codekit-append  "components/shop/_ajax-quickview.js";
	// @codekit-append  "components/shop/_price-slider.js";
	// @codekit-append  "components/shop/_ajax-wishlist.js";
	// @codekit-append  "components/shop/_filter-toggle.js";
	// @codekit-append  "components/shop/_widget_product-categories.js";
	// @codekit-append  "components/shop/_sticky-sidebar.js";
	// @codekit-append  "components/shop/_remove-from-cart.js";
	// @codekit-append  "components/shop/_coupon-focus.js";
	// @codekit-append  "components/shop/_notices.js";
	// @codekit-append  "components/shop/_shop-login.js";
	// @codekit-append  "components/shop/_countdown.js";
	// @codekit-append  "components/shop/_mini-cart.js";

	// @codekit-append  "components/product/_gallery.js";
	// @codekit-append  "components/product/_video.js";
	// @codekit-append  "components/product/_inview-sections.js";
	// @codekit-append  "components/product/_tabs.js";
	// @codekit-append  "components/product/_navigation.js";
	// @codekit-append  "components/product/_slider.js";
	// @codekit-append  "components/product/_dokan.js";
	// @codekit-append  "components/product/_addtocart.js";
	// @codekit-append  "components/product/_sticky-addtocart.js";
	// @codekit-append  "components/product/_wishlist.js";

	// @codekit-append  "components/_footer-init.js";





  // =============================================================================
  // Global Debounce
  // =============================================================================

  barberry.globalDebounce = function() {

	//===============================================================
	// Scroll Detection
	//===============================================================

	window.scroll_position = $(window).scrollTop();
	window.scroll_direction = 'fixed';

	function scroll_detection() {
		var scroll = $(window).scrollTop();
	    if (scroll > window.scroll_position) {
	        window.scroll_direction = 'down';
	    } else {
	        window.scroll_direction = 'up';
	    }
	    window.scroll_position = scroll;
	}

	$(window).scroll(function() {        
        scroll_detection();
    });

	gsap.config({
	  nullTargetWarn: false,
	});


  }


  

	// =============================================================================
	// Mobile Detect
	// =============================================================================

	barberry.mobileDetect = function() {

		var md = new MobileDetect(window.navigator.userAgent);
		var ismobile = md.mobile();

		if (ismobile) {

			$('body').addClass('is-mobile');
		}

	}


	// =============================================================================
	// Mobile Categories
	// =============================================================================

	barberry.mobileCategories = function() {

		if( $(window).width() > 1024 ) return;

		var categories = $('.barberry-categories'),
		    subCategories = categories.find('li > ul'),
		    button = $('.barberry-show-categories'),
		    time = 200;

		$('body').on('click', '.barberry-show-categories', function(e) {
		    e.preventDefault();

		    if( isOpened() ) {
		        closeCats();
		    } else {
		            openCats();
		    }
		});

		$('body').on('click', '.list_shop_categories a, .list_blog_categories a', function(e) {
		    closeCats();
		    categories.stop().attr('style', '');
		});

		var isOpened = function() {
		    return $('.barberry-categories').hasClass('categories-opened');
		};

		var openCats = function() {


		    var tl = gsap.timeline(),
		        categories = $(".barberry-categories"),
		        categories_items = $(".barberry-categories li");

		        tl.fromTo(categories, {"max-height":0,autoAlpha: 0}, {"max-height":1000,autoAlpha: 1,ease: "power4.In", duration: 1}, 0);
		        
		        setTimeout(function() {
		            $('.barberry-categories').addClass('categories-opened');
		            $('.barberry-show-categories').addClass('button-open');
		        }, 100);
 
		};

		var closeCats = function() {


		    var tl = gsap.timeline(),
		        categories = $(".barberry-categories"),
		        categories_items = $(".barberry-categories li");

		        tl.fromTo(categories, {"max-height":1000,autoAlpha: 1}, {autoAlpha: 0, "max-height":0,ease: "power3.InOut", duration: 0.3}, 0);		        

		        setTimeout(function() {
			        $('.barberry-show-categories').removeClass('button-open');
			        $('.barberry-categories').removeClass('categories-opened');
		        }, 100);
		       
		};

	}


  // =============================================================================
  // Page Loader
  // =============================================================================

  barberry.pageLoader = function() {

    if ( barberry_scripts_vars.page_loader == '0' ) {
      return;
    }

	$(window).on('pagehide', function (e) {

		if ( e.persisted) {
		    $('#bb-container').addClass('fade_out').removeClass('fade_in');
		    $('#header-loader-under-bar').removeClass('hidden');
		}
	})

	$(window).load(function(e) {
	    $('#bb-container').addClass('fade_in').removeClass('fade_out');
	    $('#header-loader-under-bar').addClass('hidden');
	    NProgress.done();
	})

  }


  // =============================================================================
  // Sticky Header
  // =============================================================================

  barberry.stickyHeader = function() {

    if ( barberry_scripts_vars.sticky_header == '0' ) {
      return;
    }

    // Options
    var options = {
        offset: 300,
        throttle: 50,
        classes: {
            clone:   'header--clone',
            stick:   'header--stick',
            unstick: 'header--unstick'
        },
    }

    // Create a new instance of Headhesive.js and pass in some options
    var header = new Headhesive('.site-header', options);

    

  }





  // =============================================================================
  // Foundation init
  // =============================================================================

  barberry.foundationInit = function() {
 	
	$(document).foundation();

  }


  // =============================================================================
  // Lazy Load
  // =============================================================================

  barberry.lazyLoad = function() {

	$("img.lazy").lazyload({
    	threshold : 200
	});

  }



  // =============================================================================
  // Navigation Init
  // =============================================================================

  barberry.navigationInit = function() {

    var overlay_triggers_list = [
        
        ".barberry-navigation .navigation-foundation > ul > .is-dropdown-submenu-parent",
        ".my-account-has-drop:not(.my-account-form)",

    ];

    var overlay_triggers = overlay_triggers_list.join(", ");

    $(overlay_triggers)

    .mouseenter(function(e) {
        $('.site-header').attr('data-sticky', 'visible');
        $('.navigation_overlay').addClass('visible').trigger("show.br.overlay_content");

    })

    .mouseleave(function(e) {
        $('.navigation_overlay').removeClass('visible').trigger("hide.br.overlay_content");
        $('.site-header').removeAttr('data-sticky', 'visible');
    });


    // Header Overlay

    var overlay_triggers_list = [
      
      ".topbar .navigation-foundation > ul"

    ];

    var overlay_triggers = overlay_triggers_list.join(", ");

    $(overlay_triggers)

    .mouseenter(function(e) {
      $('.topbar_overlay').addClass('visible');
    })

    .mouseleave(function(e) {
      $('.topbar_overlay').removeClass('visible');
    });

    // Megamenu Dropdown Offset

    var mainMenu = $('.navigation-foundation').find('ul.dropdown'),
        lis = mainMenu.find(' > li.is-mega-menu');

    mainMenu.on('hover', ' > li.is-mega-menu', function (e) {
      setOffset($(this));
    });

    var setOffset = function (li) {

      var dropdown = li.find(' > .dropdown-submenu'),
          styleID = 'arrow-offset',
          siteWrapper = $('.bb-container');

      dropdown.attr('style', '');

      var dropdownWidth = dropdown.outerWidth(),
        dropdownOffset = dropdown.offset(),
        screenWidth = $(window).width(),
        bodyRight = siteWrapper.outerWidth() + siteWrapper.offset().left,
        viewportWidth = screenWidth,
        extraSpace = 0;

        if (!dropdownWidth || !dropdownOffset) return;

      var dropdownOffsetRight = screenWidth - dropdownOffset.left - dropdownWidth;

        if ($('body').hasClass('rtl') && dropdownOffsetRight + dropdownWidth >= viewportWidth && (li.hasClass('is-mega-menu'))) {

          var toLeft = dropdownOffsetRight + dropdownWidth - viewportWidth;

          dropdown.css({
            right: - toLeft - extraSpace
          });

        } else if (dropdownOffset.left + dropdownWidth >= viewportWidth && (li.hasClass('is-mega-menu'))) {
          // If right point is not in the viewport
          var toRight = dropdownOffset.left + dropdownWidth - viewportWidth;

          dropdown.css({
            left: - toRight - extraSpace
          });
        }

    };

    lis.each(function () {
      setOffset($(this));
      $(this).addClass('with-offsets');
    });    

  }




  // =============================================================================
  // Footer Init
  // =============================================================================

  barberry.footerInit = function() {

    if ( barberry_scripts_vars.footer_hover == '1' ) {
		window.sr = ScrollReveal();

		function addAminationClass (el) {
			setTimeout(function() {
	    		$('#site-footer, .progress-page').addClass('is-animating');
	    	}, 300);
		}

		function removeAminationClass (el) {
	    	$('#site-footer, .progress-page').removeClass('is-animating');
		}	

		sr.reveal('#site-footer .site-footer-inner', { delay: 1000, opacity:1, reset: true, mobile: true, beforeReveal: addAminationClass, afterReset: removeAminationClass });
    } else {
		window.sr = ScrollReveal();

		function addAminationClass (el) {
			setTimeout(function() {
	    		$('.progress-page').addClass('is-animating');
	    	}, 300);
		}

		function removeAminationClass (el) {
	    	$('.progress-page').removeClass('is-animating');
		}

		if( $(window).width() > 1024 ) {
			sr.reveal('.prefooter', { delay: 1000, opacity:1, reset: true, mobile: true, beforeReveal: addAminationClass, afterReset: removeAminationClass });
		} else {
			sr.reveal('#site-footer .site-footer-inner', { delay: 1000, opacity:1, reset: true, mobile: true, beforeReveal: addAminationClass, afterReset: removeAminationClass });			
		}	


    }





	function footerRevealCalcs() {
		var $headerNavSpace = $('.page-header').outerHeight();

		if($(window).height() - $('#wpadminbar').height() - $headerNavSpace - $('#site-footer').height()  > 0) {

			$('body[data-footer-reveal="1"] #primary').css({'margin-bottom': $('#site-footer').height()-1 });
			//let even non reveal footer have min height set when using material ocm
			$('#primary').css({'min-height': $(window).height() - $('#wpadminbar').height() - $headerNavSpace - $('#site-footer').height() -1 });
		} else {
			$('#primary').css({'margin-bottom': $('#site-footer').height()-1 });
		}		
	}

	if ($('body[data-footer-reveal="1"]').length > 0) {
		footerRevealCalcs();
		$(window).resize(function() {
			footerRevealCalcs();
		});		
	}

  }





  // =============================================================================
  // Off Canvas Navigation
  // =============================================================================

  barberry.offCanvas = function() {


	window.offcanvas_open = false;
	window.offcanvas_from_left = false;
	window.offcanvas_from_right = false;
	window.offcanvas_from_top = false;
	window.offcanvas_from_bottom = false;

	window.offcanvas_close = function() {		
		
		window.offcanvas_open = false;
		window.offcanvas_from_left = false;
		window.offcanvas_from_right = false;
		window.offcanvas_from_top = false;	
		window.offcanvas_from_bottom = false;		
        
		$("body").removeClass("offcanvas_open offcanvas_left offcanvas_right offcanvas_top lock-scroll");

		$(".offcanvas_main_content").one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function() {   
            setTimeout(function(){ 
            	$(window).trigger('resize');
            }, 600);
        });

        $('.offcanvas_shop_sidebar').removeClass('show');
        $('.barberry-ajax-search .search-field').val("");

	}



	window.offcanvas_left = function() {			
		
		if (window.offcanvas_open == true) window.offcanvas_close();
		window.offcanvas_open = true;
		window.offcanvas_from_left = true;		
		
		$("body").removeClass("no-offcanvas-animation").addClass("offcanvas_open offcanvas_left lock-scroll");

		$(".nano").nanoScroller({ iOSNativeScrolling: true });		

	}


	window.offcanvas_right = function() {

		if ( barberry_scripts_vars.header_cart_link == 'without' || isCart() || isCheckout() ) return false;

		if (window.offcanvas_open == true) window.offcanvas_close();	
		window.offcanvas_open = true;
		window.offcanvas_from_right = true;		
		
		$("body").removeClass("no-offcanvas-animation").addClass("offcanvas_open offcanvas_right lock-scroll");

		$(".nano").nanoScroller({ iOSNativeScrolling: true });	

	}


	window.offcanvas_top = function() {	

		if (window.offcanvas_open == true) {	
			window.offcanvas_close();
			window.offcanvas_open = false;
			window.offcanvas_from_top = false;			
		} else {
			window.offcanvas_open = true;
			window.offcanvas_from_top = true;		
			
			$("body").removeClass("no-offcanvas-animation").addClass("offcanvas_open offcanvas_top lock-scroll");
			$(".nano").nanoScroller({ iOSNativeScrolling: true });			
		}				
	}

	window.offcanvas_bottom = function() {	

		if (window.offcanvas_open == true) {	
			window.offcanvas_close();
			window.offcanvas_open = false;
			window.offcanvas_from_bottom = false;			
		} else {
			window.offcanvas_open = true;
			window.offcanvas_from_bottom = true;		
			
			$("body").removeClass("no-offcanvas-animation").addClass("offcanvas_open offcanvas_bottom lock-scroll");	
		}				
	}


	$('.barberry-sizeguide-btn').on('click', function(){
		$(".nano").nanoScroller({ iOSNativeScrolling: true });
	});
	
	// Overlay Close Offcanvas
	$('.offcanvas_overlay').on('click', function(){
		window.offcanvas_close();
		$(".search-wrap").removeClass("active");
	});


	$('.close-icon').on('click', function(e){
		window.offcanvas_close();	
	});


	$('.menu-trigger').on('click', function(e){
		e.preventDefault();
		window.offcanvas_close();

		$('.offcanvas_sidebars').hide();
		$('.offcanvas_mainmenu').show();

        setTimeout(function(){ 
        	window.offcanvas_left();
        }, 200);

	});

	// Header Cart Button

    if ( barberry_scripts_vars.header_cart_link == 'sidebar' ) {

		$('.header-cart').on('click', function(e){

			if ( ! isCart() && ! isCheckout() ) e.preventDefault();

			window.offcanvas_close();

	        setTimeout(function(){ 
	        	window.offcanvas_right();
	        	barberry.ShippingFreeNotification();
	        }, 200);

		});

    }


	var isCart = function() {
	    return $('body').hasClass('woocommerce-cart');
	};

	var isCheckout = function() {
	    return $('body').hasClass('woocommerce-checkout');
	}; 

	// Sidebar Button

	$('.barberry-show-sidebar-btn, .shop-sidebar-btn').on('click', function(e){
		e.preventDefault();
		$('.offcanvas_mainmenu').hide();
        $('.offcanvas_sidebars').show();
        setTimeout(function(){ 
        	window.offcanvas_left();
        }, 100);
	});

  }




  // =============================================================================
  // Parallax Init
  // =============================================================================

  barberry.parallaxInit = function() {

	var md = new MobileDetect(window.navigator.userAgent);
	var ismobile = md.mobile();

    if (!ismobile) {

        ParallaxScroll.init();

    }

	var rellax = new Rellax('.rellax', {});
  }






  // =============================================================================
  // Select 2
  // =============================================================================

  barberry.select2 = function() {

	// =============================================================================
	// Shop Archive Orderby Select Options
	// =============================================================================
		
	if ( typeof $.fn.select2 === 'function' ) {

		var $layerednav = $(".woocommerce-widget-layered-nav-dropdown select, .widget_product_categories select, .wpcf7-select");

		$layerednav.select2({
			minimumResultsForSearch: 0,
			allowClear: false,
		});				

		var $orderby = $(".woocommerce-ordering .orderby");

		$orderby.select2({
			minimumResultsForSearch: -1,
			dropdownParent: $('.woocommerce-ordering'),
			allowClear: false,
		});	

		$('.variations_form select').select2({
			minimumResultsForSearch: -1,
			placeholder: barberry_scripts_vars.select_placeholder,
			allowClear: true,
		});				

	}


  }


  // =============================================================================
  // Page Header Animation
  // =============================================================================

  barberry.pageHeaderAnimation = function() {

	$('.page-header-bg').imagesLoaded( { background: true }, function() {
	  $('.page-header-bg-wrapper').addClass('bg-loaded');

		var	tl = gsap.timeline(),
			header = $(".header-sections"),
			topbar = $(".topbar"),
		  	page_title = $(".page-title"),
		  	subtitle = $(".term-description"),
		  	breadcrumbs = $(".breadcrumbs"),
		  	categories_bg = $(".shop-categories, .blog-categories, body.single .page-header .barberry-entry-meta ul.entry-meta-list"),
		  	delimiter = $(".page-title-delimiter"),
		  	arrow_back = $(".back-btn svg"),
		  	content = $(".content-area, .blog-content-area, .post-content-area"),
		  	pagination = $(".woocommerce-pagination, .products_ajax_button"),
		  	footer = $("#site-footer"),

	      	easing = BezierEasing(.1,.68,.32,1);

	      	tl.fromTo(header, {autoAlpha: 0}, {ease: "power4.inOut", autoAlpha: 1, duration: 1}, .2);
	      	tl.fromTo(topbar, {autoAlpha: 0}, {ease: "power4.inOut", autoAlpha: 1, duration: 1}, .2);
	      	tl.fromTo(page_title, {y:100, autoAlpha:0}, {ease: "power4.inOut", y:0, autoAlpha:1, duration: 1.2}, .3);
			tl.fromTo(subtitle, {scale: 1.4, autoAlpha:0}, {ease: "power4.inOut", scale: 1, autoAlpha:1, duration: 1.4}, .2);
			tl.fromTo(arrow_back, {x:20, autoAlpha:0}, {ease: "power4.inOut",x:0, autoAlpha:1, duration: 1}, .5);

			if ( barberry.$body.hasClass('woocommerce-shop') ) {
				tl.fromTo(breadcrumbs, {y:40, autoAlpha:0}, {ease: "power4.inOut",y:0, autoAlpha:1, duration: 1.2}, .25);
			} else if ( barberry.$body.hasClass('single-product') ) {
				tl.fromTo(breadcrumbs, {y:40, autoAlpha:0}, {ease: "power4.inOut",y:0, autoAlpha:1, duration: 1.2}, .6);
			} else {
				tl.fromTo(breadcrumbs, {y:40, autoAlpha:0}, {ease: "power4.inOut",y:0, autoAlpha:1, duration: 1.2}, .25);
			}

			tl.fromTo(categories_bg, {y:-40, autoAlpha:0}, {ease: "power4.inOut",y:0, autoAlpha:1, duration: 1.4}, .25);
			tl.fromTo(delimiter, {autoAlpha:0, width:0}, {autoAlpha:1, width:70, duration: 1}, .8);
			tl.fromTo(content, {autoAlpha:0}, {autoAlpha:1, duration: 1}, .8);
			tl.fromTo(pagination, {autoAlpha:0}, {autoAlpha:1, duration: 1}, .8);
			tl.fromTo(footer, {autoAlpha:0}, {autoAlpha:1, duration: 1}, 1.5);
	});	

	barberry.productInfoAnimation = function() {

		var	tl = gsap.timeline(),
			product_title = $(".product_title"),
			gallery = $(".product_layout #product-images .flickity-slider"),
			single_gallery = $(".product_layout #product-images"),			
			single_gallery_th = $(".single-product .product-thumbnails, .single-product .product-vr-thumbnails"),
		  	product_gallery_labels = $(".single-product .product-images-wrapper .product-labels"),
		  	product_sidebar = $("body.single-product .product_layout_default .sidebar-container"),		  	
		  	product_share = $(".single-product .box-share-master-container"),
		  	product_tool_buttons = $(".single-product .product_layout .product-images-inner .product_tool_buttons_placeholder, .product_layout.product_layout_style_3 .product-title-section-wrapper .product-title-section-right"),
		  	product_nav = $(".single-product .products-nav, .single-product .woocommerce-message"),

		  	product_summary_middle = $(".single-product .product_layout.product_layout_default .product-info-cell .product_summary_middle, .single-product .product_layout.product_layout_style_2 .product-info-cell .product_summary_middle, .product_layout.product_layout_style_3 .product-title-section-wrapper .product-title-section-wrapper-inner .product_summary_middle, .product_layout.product_layout_style_3 .product-info-cell, #barberry_woocommerce_quickview .product_summary_middle"),
		  	product_summary_bottom = $(".single-product .product_layout.product_layout_default .product-info-cell .product_summary_bottom, .single-product .product_layout.product_layout_style_2 .product-info-cell .product_summary_bottom, #barberry_woocommerce_quickview .product_summary_bottom");

		  	tl.fromTo(product_title, {y:100, autoAlpha:0}, {ease: "power4.inOut", y:0, autoAlpha:1, duration: 1.6}, .8);
			tl.fromTo(gallery, {autoAlpha:0}, {ease: "power4.inOut", autoAlpha:1, duration: 1}, 0);
			tl.fromTo(single_gallery, {scale: 1.1, autoAlpha:0}, {ease: "power4.inOut",scale: 1, autoAlpha:1, duration: 2}, .3);
    		tl.fromTo(single_gallery_th, {y:20, autoAlpha:0}, {ease: "power4.inOut",y:0, autoAlpha:1, onStart:thShadow, duration: 1.4 }, 1);
			function thShadow () {
				setTimeout(function() {
					$('.single-product .product-thumbnails-container, .single-product .product-vr-thumbnails-container').addClass('shadow');
				}, 600);
	    	};

            tl.fromTo(product_summary_middle, {y:40, autoAlpha:0}, {ease: "power4.inOut",y:0, autoAlpha:1, duration: 2 }, .8);
            tl.fromTo(product_summary_bottom, {y:40, autoAlpha:0}, {ease: "power4.inOut",y:0, autoAlpha:1, duration: 2 }, 1);

            tl.fromTo(product_gallery_labels, {autoAlpha:0}, {ease: "power4.inOut",autoAlpha:1, duration: 2 }, .7);
            tl.fromTo(product_share, {autoAlpha:0}, {ease: "power4.inOut",autoAlpha:1, duration: 2 }, .7);
            tl.fromTo(product_tool_buttons, {autoAlpha:0}, {ease: "power4.inOut",autoAlpha:1, duration: 2 }, .7);
            tl.fromTo(product_nav, {autoAlpha:0}, {ease: "power4.inOut",autoAlpha:1, duration: 2 }, .7);
            tl.fromTo(product_sidebar, {autoAlpha:0}, {ease: "power4.inOut",autoAlpha:1, duration: 2 }, .7);

	}
  }


  // =============================================================================
  // Back to Top
  // =============================================================================

  barberry.backtoTop = function() {

    if ( barberry_scripts_vars.backtotop == '0' ) {
      return;
    }

	$('.scrolltotop').on('click', function() {
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});

	if( $('.offcanvas_container').length > 0 ){
		$(window).scroll(function() {    
			var scroll = $(window).scrollTop();
		
			if (scroll >= 300) {					
				$(".progress-page").addClass('is-active');					
			} else {								
				$(".progress-page").removeClass('is-active');
			}
		});
	}
	
	var lastScroll = 0;

	$(window).scroll(function(){
		var scroll = $(window).scrollTop();
		if (scroll > lastScroll) {
			$(".progress-page").addClass("is-visible");
		} else if (scroll < lastScroll) {
			$(".progress-page").removeClass("is-visible");
		}
		lastScroll = scroll;
	});  	

	var progressPath = document.querySelector('.progress-page path');
	var pathLength = progressPath.getTotalLength();
	progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
	progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
	progressPath.style.strokeDashoffset = pathLength;
	progressPath.getBoundingClientRect();
	progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';		
	var updateProgress = function () {
		var scroll = $(window).scrollTop();
		var height = $(document).height() - $(window).height();
		var progress = pathLength - (scroll * pathLength / height);
		progressPath.style.strokeDashoffset = progress;
	}
	updateProgress();
	$(window).scroll(updateProgress);

  }


  // =============================================================================
  // Share Init
  // =============================================================================

  barberry.shareInit = function() {

    if ( barberry_scripts_vars.product_share == '0' && barberry_scripts_vars.blog_single_share == '0' ) {
      return;
    }   
    
    var $share_elements = $('.box-share-master-container, .post-share-container').attr("data-share-elem");

    $('.social-sharing').socialShare({
        social: $share_elements,
        animation:'launchpadReverse',
        blur:true
    }); 

  }


// =============================================================================
// Search Init
// =============================================================================

barberry.searchInit = function() {

  $(".header-search").on("click", function() {

    $('form.barberry-ajax-search').find('[type="text"]').devbridgeAutocomplete('hide');

    window.offcanvas_top();

    var tl = gsap.timeline(),
        search_header = $(".search-header");
        tl.fromTo(search_header, 1, {opacity:0}, {ease: Power4.easeIn, opacity:1}, 0);

      $(".offcanvas_aside .woocommerce-product-search .search-field, .offcanvas_aside .widget_search .search-field").focus();


      $(".offcanvas_aside .woocommerce-product-search .search_label").on("click", function() {
        $(".offcanvas_aside .woocommerce-product-search .search_label").fadeOut(200),
        $(".offcanvas_aside .woocommerce-product-search .search-field").focus()
      });

      $(":text").on("input", function() {
        $(".offcanvas_aside .woocommerce-product-search .search_label").fadeOut(200),
        $(".offcanvas_aside .woocommerce-product-search .search-field").focus()
      });


      if (typeof ($.fn.devbridgeAutocomplete) == 'undefined') return;

      var escapeRegExChars = function (value) {
        return value.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
      };


      $('form.barberry-ajax-search').each(function () {
          var $this = $(this),
            number = parseInt($this.data('count')),
            thumbnail = parseInt($this.data('thumbnail')),
            $results = $this.parent().find('.search-results-wrapp'),
            postType = $this.data('post_type'),
            url = barberry_scripts_vars.ajaxurl + '?action=barberry_ajax_search',
            price = parseInt($this.data('price'));  

          if (number > 0) url += '&number=' + number;
          url += '&post_type=' + postType;

          $results.on('click', '.view-all-results', function () {
            $this.submit();
          });



          $this.find('[type="text"]').devbridgeAutocomplete({
            minChars: 3,
            // showNoSuggestionNotice: true,
            // autoSelectFirst: false,
            // triggerSelectOnValidInput: false,
            serviceUrl: url,
            appendTo: $results,

            onSelect: function (suggestion) {
              if (suggestion.permalink.length > 0)
                window.location.href = suggestion.permalink;
            },
            onSearchStart: function (query) {
              $this.addClass('search-loading');
            },

            onSearchComplete: function (query, suggestions) {
              $this.removeClass('search-loading');
            },

            beforeRender: function (container) {

              // $('.search-results').addClass("products columns-6 product-grid-layout-1");
              // $('.autocomplete-suggestion').addClass("column product");

              if (container[0].childElementCount > 2)
                jQuery(container).append('<div class="view-all-results"><div class="view-all-button button btn--border"><span>' + barberry_scripts_vars.all_results + '</span></div></div>');

            },


            formatResult: function (suggestion, currentValue) {
              if (currentValue == '&') currentValue = "&#038;";
              var pattern = '(' + escapeRegExChars(currentValue) + ')',
                returnValue = '';

              returnValue += '<div class="suggestion-inner-wrapper"><div class="suggestion-inner">';

              if (thumbnail && suggestion.thumbnail) {
                returnValue += ' <div class="suggestion-image">' + suggestion.thumbnail + '</div>';
              }

              returnValue += '<div class="suggestion-details-wrapper">';

              returnValue += '<h4 class="suggestion-title result-title">' + suggestion.value
                .replace(new RegExp(pattern, 'gi'), '<strong>$1<\/strong>')
                // .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/&lt;(\/?strong)&gt;/g, '<$1>') + '</h4>';

              if (suggestion.no_found) returnValue = '<div class="suggestion-title no-found-msg">' + suggestion.value + '</div>';

              if (price && suggestion.price) {
                returnValue += ' <div class="suggestion-price price">' + suggestion.price + '</div>';
              }

              returnValue += '</div>';

              returnValue += '</div></div>';

              return returnValue;
            }           


          });


        $(".offcanvas_aside .woocommerce-product-search .search-clear").on("click", function() {
          $('.search-field').val(""),
          $(".search-field").focus(),
          $this.find('[type="text"]').devbridgeAutocomplete('hide');
        }); 


      });



  });



  var md = new MobileDetect(window.navigator.userAgent);
  var ismobile = md.mobile();

  if (!ismobile && barberry_scripts_vars.typewriter_effect === '1') {
      var typedtext = '^800 ' + barberry_scripts_vars.typewriter_text,
          typedtext_2 = barberry_scripts_vars.typewriter_text_2;

      $(document).one('click', '.header-search', function() {
        var typed = new Typed('.offcanvas_aside .woocommerce-product-search .search_label-text', {
            strings: [typedtext, typedtext_2],
            typeSpeed: 30,
            backSpeed: 20,
        }); 
      });
  }




}



// =============================================================================
// Posts  InView Animations
// =============================================================================

barberry.postsInview = function() {

	window.sr = ScrollReveal();

    sr.reveal('.blog-articles article', {
        opacity: 0,
        duration: 1600,
        mobile: true,
        viewFactor: 0,
    }); 

}

barberry.postsNewInview = function() {

    window.sr = ScrollReveal();

    sr.reveal('.blog-articles article.new', {
        opacity: 0,
        duration: 1600,
        mobile: true,
        viewFactor: 0,
    }); 

}


  // =============================================================================
  // Background Parallax Init
  // =============================================================================

  barberry.bgParallaxInit = function() {

    function ExtraScrollAnimator(options) {
        var self = this
          , $window = $(window)
          , scrollTop = $window.scrollTop()
          , isActive = !0
          , wWidth = $window.width()
          , wHeight = $window.height()
          , isMin = null
          , isMax = null
          , isInside = null
          , isPaused = !1;
        self.init = function(_options) {
            self.options = $.extend({
                target: null,
                tween: null,
                ease: Linear.easeNone,
                min: 0,
                max: 1,
                minSize: 0,
                speed: 0.3,
                defaultProgress: 1,
                debug: !1,
                onMin: null,
                onMax: null,
                onOutside: null,
                onInside: null,
                onUpdate: null
            }, _options);
            if (self.options.target === null || self.options.target.length < 1) {
                console.warn("Extra Scroll Animator: no target specified");
                return !1
            }
            if (self.options.tween === null) {
                console.warn("Extra Scroll Animator: no tween specified");
                return !1
            }
            self.allowScrollUpdate = !0;
            self.update();
            self.repaint()
        }
        ;
        self.updatePosition = function(fast) {
            if (!isActive) {
                return
            }
            var time = (fast === undefined || !fast) ? self.options.speed : 0, coords = self.options.target.data('coords'), percent;
            if (!coords) {
                return
            }
            percent = 1 - (scrollTop - coords.max) / (coords.min - coords.max);
            if (percent <= 0 && isMin !== !0) {
                isMin = !0;
                if (isFunction(self.options.onMin)) {
                    self.options.onMin()
                }
                self.options.target.trigger("extra:scrollanimator:min")
            } else if (percent > 0 && isMin !== !1) {
                isMin = !1
            }
            if (percent >= 1 && isMax !== !0) {
                isMax = !0;
                if (isFunction(self.options.onMax)) {
                    self.options.onMax()
                }
                self.options.target.trigger("extra:scrollanimator:max")
            } else if (percent <= 1 && isMax !== !1) {
                isMax = !1
            }
            if ((isMin === !0 || isMax === !0) && isInside !== !1) {
                isInside = !1;
                if (isFunction(self.options.onOutside)) {
                    self.options.onOutside()
                }
                self.options.target.trigger("extra:scrollanimator:outside")
            } else if (percent <= 1 && percent >= 0 && isInside !== !0) {
                isInside = !0;
                if (isFunction(self.options.onInside)) {
                    self.options.onInside()
                }
                self.options.target.trigger("extra:scrollanimator:inside")
            }
            if (isInside === !1) {
                if (isMax) {
                    percent = 1
                } else {
                    percent = 0
                }
            }
            percent = Math.max(0, Math.min(percent));
            debug(percent);
            TweenMax.to(self.options.tween, time, {
                progress: percent,
                ease: self.options.ease
            })
        }
        ;
        self.update = function() {
            wWidth = $window.width();
            wHeight = $window.height();
            var coords = {}
              , offsetTop = self.options.target.offset().top
              , height = self.options.target.height()
              , min = self.options.min
              , max = self.options.max;
            coords.min = offsetTop - wHeight + (wHeight * min);
            coords.max = (offsetTop - wHeight + height) + (wHeight * max);
            self.options.target.data("coords", coords);
            self.options.tween.paused(!0);
            self.options.tween.progress(self.options.defaultProgress);
            if (wWidth < self.options.minSize) {
                $window.off('scroll', scrollHandler)
            } else {
                $window.on('scroll', scrollHandler);
                self.updatePosition(!0)
            }
            if (isFunction(self.options.onUpdate)) {
                self.options.onUpdate(coords)
            }
            self.options.target.trigger("extra:scrollanimator:update", [coords])
        }
        ;
        $window.on('extra:resize', self.update);
        $window.on('extra:scrollanimator:resize', self.update);
        $window.on('extra:scrollanimator:tick', self.updatePosition);
        function scrollHandler(event) {
            scrollTop = $window.scrollTop();
            self.allowScrollUpdate = !0
        }
        self.repaint = function() {
            if (!isActive) {
                return
            }
            if (!self.allowScrollUpdate) {
                window.requestAnimationFrame(self.repaint);
                return
            }
            self.updatePosition();
            self.allowScrollUpdate = !1;
            window.requestAnimationFrame(self.repaint)
        }
        ;
        self.init(options);
        self.updateTween = function(tween) {
            if (self.options.tween) {
                self.options.tween.kill()
            }
            self.options.tween = tween;
            self.options.tween.paused(!0);
            self.options.tween.progress(self.options.defaultProgress);
            self.allowScrollUpdate = !0;
            self.update()
        }
        ;
        self.pause = function() {
            if (!isPaused) {
                $window.off('scroll', scrollHandler);
                $window.off('extra:resize', self.update);
                isActive = !1;
                isPaused = !0
            }
        }
        ;
        self.resume = function() {
            if (isPaused) {
                if (wWidth < self.options.minSize) {
                    $window.off('scroll', scrollHandler)
                } else {
                    $window.on('scroll', scrollHandler)
                }
                $window.on('extra:resize', self.update);
                isActive = !0;
                isPaused = !1;
                self.repaint()
            }
        }
        ;
        self.destroy = function() {
            isActive = !1;
            $window.off('scroll', scrollHandler);
            $window.off('extra:resize', self.update);
            $window.off('extra:scrollanimator:tick', self.updatePosition);
            if (self.options.tween) {
                self.options.tween.paused(!0);
                self.options.tween.progress(self.options.defaultProgress);
                self.options.tween.kill()
            }
            self.allowScrollUpdate = !1
        }
        ;
        function debug(string) {
            if (self.options.debug === !0) {
                console.log(string)
            }
        }
        function isFunction(functionToCheck) {
            var getType = {};
            return functionToCheck && getType.toString.call(functionToCheck) === '[object Function]'
        }
    }

window.initPrllx = function($container) {

        // const TLPrllxs = []
        var $container = $('.site-content');
        var $sections = $container.find('.entry-thumbnail');
        $sections.each(function() {
            var $section = $(this),


            $inner = $section.children(),
            $separator = $section.find('.prllx'),
            tween,
            height = $inner.width(),
            scrollAnimator;
            // console.log(height);
            tween = gsap.timeline({
                // onUpdate: function() {}
            });

            tween.set($separator, {
                y: -1 * $separator.attr('data-prllx')
            }).to($separator, 1, {
                y:$separator.attr('data-prllx'), overwrite:"all", ease: "Power0.easeNone"
            }, '0');


            scrollAnimator = new ExtraScrollAnimator({
                target: $section,
                tween: tween,
                defaultProgress: 0,
                speed: 0,
                min: -0.2,
                max:1.3,
            });
            
            $section.on("extra:scrollanimator:update", function(event) {

                event.stopPropagation()
            })
        })
    }

    var md = new MobileDetect(window.navigator.userAgent);
    var ismobile = md.mobile();

    $(window).on("load", function() {
          initPrllx();
    })

  }


  // =============================================================================
  // Ajax Posts Loading
  // =============================================================================

  barberry.loadingPostsAjax = function() {

	var listing_class 		= ".blog-articles";
	var item_class 			= ".blog-articles article";
	var pagination_class 	= ".posts-navigation";
	var next_page_class 	= ".posts-navigation a.next";
	var ajax_button_class 	= ".posts_ajax_button";
	var ajax_loader_class 	= ".posts_ajax_loader";
	
	var ajax_load_items = {
	    
	    init: function() {

	        if (barberry_scripts_vars.blog_pagination_type == 'load_more_button' || barberry_scripts_vars.blog_pagination_type == 'infinite_scroll') {
	        
		        $(document).ready(function() {
		            
		            if ($(pagination_class).length) {
		                
		                $(pagination_class).before('<div class="pagination-container"><div class="'+ajax_button_class.replace('.', '')+'" data-processing="0"><div class="loadmore"><span>'+barberry_scripts_vars.ajax_loading_locale+'</span><div class="container"><div class="dot"></div><div class="dot"></div><div class="dot"></div></div></div></div>');

		            }		            		            

		        });
		        
		        $('body').on('click', ajax_button_class, function(e) {

		        	e.preventDefault();
		            
		            if ($(next_page_class).length) {
		                
		                $(ajax_button_class).attr('data-processing', 1).addClass('loading');  	                
		                
		                var href = $(next_page_class).attr('href');


		                ajax_load_items.onstart();		            
		                
		                $.get(href, function(response) {
		                    
		                    $(pagination_class).html($(response).find(pagination_class).html());

		                    $(response).find(item_class).each(function() {

		                    	$($(this)).addClass('new');
		                    	$('.blog-articles > article:last').after($(this));	

		                    	if ( barberry_scripts_vars.blog_posts_parallax == '1' ) {
		                    		window.initPrllx();
		                    	}

		                    	if ( barberry_scripts_vars.load_animation == '1' ) {
		                    		barberry.postsNewInview();
		                    	}
		                    	
		                    	
  
		                        $($(this)).removeClass('new');                        

		                    });

		                    $(ajax_button_class).attr('data-processing', 0).removeClass('loading');
		                    
		                    ajax_load_items.onfinish();

		                    if ($(next_page_class).length == 0) {
		                        $(ajax_button_class).addClass('disabled').show();
		                    } else {
		                    	$(ajax_button_class).show();
		                    }

		                });

		            } else {
		                		                
		                $(ajax_button_class).addClass('disabled').show();

		            }

		        });

	        }
	        
	        if (barberry_scripts_vars.blog_pagination_type == 'infinite_scroll') {

		        var buffer_pixels = Math.abs(0);
		        
		        $(window).scroll(function() {
		           
		            if ($(listing_class).length) {
		                
		                var a = $(listing_class).offset().top + $(listing_class).outerHeight();
		                var b = a - $(window).scrollTop();
		                
		                if ((b - buffer_pixels) < $(window).height()) {
		                    if ($(ajax_button_class).attr('data-processing') == 0) {
		                        $(ajax_button_class).trigger('click');
		                    }
		                }

		            }

		        });
	        }
	    },

	    onstart: function() {
	    },

	    onfinish: function() {
	    },

	};

	ajax_load_items.init();

  }


// =============================================================================
// Wordpress Gallery
// =============================================================================

barberry.postGallery = function() {

	$('.reveal').on('click', '.next', function(){
		var next = $(this).parent('.reveal').next('.reveal').attr('id');
		if (next) {
			next = '#' + next;
			$(next).foundation('open');
		}
	});

	$('.reveal').on('click', '.prev', function(){
		var prev = $(this).parent('.reveal').prev('.reveal').attr('id');
		if (prev) {
			prev = '#' + prev;
			$(prev).foundation('open');
		}
	});

	if ($('.reveal.blog-gallery').length) {
		$('.reveal.blog-gallery:first').find('.blog-gallery-btn.prev').hide();
		$('.reveal.blog-gallery:last').find('.blog-gallery-btn.next').hide();
	}

}

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



  barberry.splitText = function() {

    var md = new MobileDetect(window.navigator.userAgent);
    var ismobile = md.mobile();

    if ( $(window).width() > 1024 ) {
        if (!ismobile) {
            if ( $('.product-grid-layout-2').length > 0 && $('.product-grid-layout-2 .product').length > 0 ) {
                
                if ( $('.product-grid-layout-2 .product .product-title').length > 0 ) {
                    var $quote = $(".product-grid-layout-2 .product-title a");
                    mySplitText = new SplitText($quote, {type:"lines"}),
                    splitTextTimeline = gsap.timeline();
                    $(".product-grid-layout-2 .product-title a div").wrapInner( "<span></span>");                     
                }
               
            }  

            if ( $('.category-grid-layout-2').length > 0 && $('.category-grid-layout-2 .product-category').length > 0 ) {
                var $quote = $(".category-grid-layout-2 .category-title"),
                mySplitText = new SplitText($quote, {type:"lines"}),
                splitTextTimeline = gsap.timeline();
                $(".category-grid-layout-2 .category-title div").wrapInner( "<span></span>");                
            }                     
        }
    }
  }

  barberry.splitTextNew = function() {

    var md = new MobileDetect(window.navigator.userAgent);
    var ismobile = md.mobile();

    if ( $(window).width() > 1024 ) {
        if (!ismobile) {
            if ( $('.product-grid-layout-2').length > 0 ) {
                var $quote = $(".product-grid-layout-2 .product.new .product-title a"),
                mySplitText = new SplitText($quote, {type:"lines"}),
                splitTextTimeline = gsap.timeline();
                $(".product-grid-layout-2 .product.new .product-title a div").wrapInner( "<span></span>");                
            }                      
        }
    }
  }


  // =============================================================================
  // Product Animation
  // =============================================================================

  barberry.animationProduct = function() {

    var md = new MobileDetect(window.navigator.userAgent);
    var ismobile = md.mobile();

	window.sr = ScrollReveal();

    sr.reveal('ul.products .product', { 
        opacity: 0,
        viewFactor: 0.2,
        afterReveal: revealProductElements,
        beforeReveal: function (domEl) {
            domEl.classList.add('active');
            var product_img = domEl.querySelector('.product-inner .loop-thumbnail img, .category_wrapper .category_image img');
            if (product_img !== null) {
                domEl.visuelRevealTL = gsap.timeline(),
                domEl.visuelRevealTL.fromTo(product_img, {scale:1.1}, {ease: "power4.Out", scale:1, duration: 2},0); 
            }
        } 
    }, 150);


    function revealProductElements (domEl) {
        domEl.classList.add('active');
        var quote = domEl.querySelectorAll('.product-title a div span, .category-title div span'),
            elements = domEl.querySelector('.star-rating, .more-products'),
            price = domEl.querySelector('.price');

        domEl.visuelRevealTL = gsap.timeline();

        if ( $(window).width() > 1024 ) {
            if (!ismobile) {
                if ( $('.product-grid-layout-2').length > 0 ) {
                    domEl.visuelRevealTL.fromTo(quote, {ease: "power4.Out", x:30, y:100, skewX:60, autoAlpha:0}, {ease: "power4.Out", x:0, y:0, skewX:0,  autoAlpha:1, duration: 1}, 0);
                    if (elements !== null) {
                        domEl.visuelRevealTL.fromTo(elements, {y:10, autoAlpha:0}, {ease: "power4.Out", y:0, autoAlpha:1, duration: 2},.4);
                    }
                    if (price !== null) {
                        domEl.visuelRevealTL.fromTo(price, {y:10}, {ease: "power4.Out", y:0, autoAlpha:1, duration: 2},.2);
                    }
                }
                if ( $('.category-grid-layout-2').length > 0 && $('.category-grid-layout-2 .product-category').length > 0 ) {
                    domEl.visuelRevealTL.fromTo(quote, {ease: "power4.Out", x:30, y:100, skewX:60, autoAlpha:0}, {ease: "power4.Out", x:0, y:0, skewX:0,  autoAlpha:1, duration: 1}, 0);
                    if (elements !== null) {
                        domEl.visuelRevealTL.fromTo(elements, {y:10, autoAlpha:0}, {ease: "power4.Out", y:0, autoAlpha:1, duration: 2},.4);
                    }
                    if (price !== null) {
                        domEl.visuelRevealTL.fromTo(price, {y:10}, {ease: "power4.Out", y:0, autoAlpha:1, duration: 2},.2);
                    }
                }                
            }
        }
    }

  }

  // Ajax filter product animation


  barberry.animationNewProduct = function() {

    var md = new MobileDetect(window.navigator.userAgent);
    var ismobile = md.mobile();

    window.sr = ScrollReveal();

    sr.reveal('ul.products .product.new', { 
        opacity: 0,
        viewFactor: 0.2,
        afterReveal: revealProductElements,
        beforeReveal: function (domEl) {
            domEl.classList.add('active');
            var product_img = domEl.querySelector('.product-inner .loop-thumbnail img, .category_wrapper .category_image img');
            if (product_img !== null) {
                domEl.visuelRevealTL = gsap.timeline(),
                domEl.visuelRevealTL.fromTo(product_img, {scale:1.1}, {ease: "power4.Out", scale:1, duration: 2},0); 
            }
        } 
    }, 150);


    function revealProductElements (domEl) {
        domEl.classList.add('active');
        var quote = domEl.querySelectorAll('.product-title a div span, .category-title div span'),
            elements = domEl.querySelector('.star-rating, .more-products'),
            price = domEl.querySelector('.price');

        domEl.visuelRevealTL = gsap.timeline();

        if ( $(window).width() > 1024 ) {
            if (!ismobile) {
                if ( $('.product-grid-layout-2').length > 0 || $('.category-grid-layout-2').length > 0 ) {
                    domEl.visuelRevealTL.fromTo(quote, {ease: "power4.Out", x:30, y:100, skewX:60, autoAlpha:0}, {ease: "power4.Out", x:0, y:0, skewX:0,  autoAlpha:1, duration: 1}, 0);
                    if (elements !== null) {
                        domEl.visuelRevealTL.fromTo(elements, {y:10, autoAlpha:0}, {ease: "power4.Out", y:0, autoAlpha:1, duration: 2},.4);
                    }
                    if (price !== null) {
                        domEl.visuelRevealTL.fromTo(price, {y:10}, {ease: "power4.Out", y:0, autoAlpha:1, duration: 2},.2);
                    }
                }
            }
        }
    }

  }


	// =============================================================================
	// Shop Archive Buttons Click States
	// =============================================================================

	barberry.productCard = function() {

		// Product tooltip fix

		$("ul.products li.product .product-inner").hover(
			function() {
				setTimeout(function() {
			  		$(this).addClass("phover");
				}.bind(this), 200)
			},
			function() {
				setTimeout(function() {
			  		$(this).removeClass("phover");
				}.bind(this), 200)
			}
		);

		// Wishlist

		$(document).on('click', '.footer-section-inner .add_to_wishlist',  function(e) {
			var this_button = $(this);
			this_button.addClass('clicked');
			this_button.parents('.footer-section-inner').addClass('adding');
			setTimeout(function() { 
	        	this_button.addClass('loading');
	        }, 0);
			barberry.$body.on('added_to_wishlist', function() {
				$('.header-wishlist').addClass('animated');
				this_button.removeClass('loading');
				this_button.parents('.footer-section-inner').removeClass('adding');
				setTimeout(function() { 
		        	$('.header-wishlist').removeClass('animated');	
	            }, 2000); 
				this_button.removeClass('add_to_wishlist').addClass('added');
				this_button.attr("href", this_button.data("wishlist-url"));
				this_button.children('.tooltip').text(this_button.data("browse-wishlist-text"));
			});
		});

		// Compare

		// $(document).on('click', '.footer-section-inner .barberry_product_compare_button',  function(e) {
		// 	var this_button = $(this);
		// 	this_button.addClass('clicked');
		// 	this_button.parents('.footer-section-inner').addClass('adding');
		// 	setTimeout(function() { 
	 //        	this_button.addClass('loading');
	 //        }, 0);
		// 	barberry.$body.on('added_to_compare', function() {
		// 		$('.header-wishlist').addClass('animated');
		// 		this_button.removeClass('loading');
		// 		this_button.parents('.footer-section-inner').removeClass('adding');
		// 		setTimeout(function() { 
		//         	$('.header-compare').removeClass('animated');	
	 //            }, 2000); 
		// 		this_button.removeClass('add_to_compare').addClass('added');

		// 	});

		// });


		// Quick View

		$(document).on('click', '.footer-section .barberry_product_quick_view_button',  function() {
			var this_button = $(this);
			this_button.addClass('clicked');
			this_button.parents('.product-inner').addClass('adding');
			setTimeout(function() { 
		    	this_button.addClass('loading');
		    }, 200);

		    $(document.body).on('opened_product_quickview', function() {
				this_button.parents('.product-inner').removeClass('adding');
				this_button.removeClass('loading').removeClass('clicked');
			});
		});


		// Add to Cart

		$(document).on('click', '.footer-section  .ajax_add_to_cart, .footer-section  .add_to_cart_button', function() {		
			var this_button = $(this);		
			this_button.addClass('clicked');
			this_button.parents('.product-inner').addClass('adding');
			setTimeout(function() { 
	        	this_button.addClass('loading');
	        }, 200);

	       
			barberry.$body.on('wc_cart_button_updated', function() {
				this_button.removeClass('loading').removeClass('clicked');
				this_button.parents('.product-inner').removeClass('adding');
				$('.header-cart').addClass('animated');	
				setTimeout(function() { 
		        	$('.header-cart').removeClass('animated');	
	            }, 2000); 	

	            
				
				if (this_button.siblings('.added_to_cart').length ) {
					var new_href = this_button.siblings('.added_to_cart').attr("href");
					var new_text = this_button.siblings('.added_to_cart').text();

					if ( barberry_scripts_vars.shop_addtocart == 0 ) {
						this_button.siblings('.added_to_cart').remove();
						this_button.attr("href", new_href);
						this_button.text(new_text);
						this_button.children('.tooltip').text(new_text);
						this_button.removeClass().addClass('button added wc-forward');
					}
					

					// Open minicart ================	
					window.offcanvas_close();



			        setTimeout(function(){ 
                        if ( barberry_scripts_vars.add_to_cart_action == 'no_action' ) {
                          return;
                        }		
                        barberry.ShippingFreeNotification();	        	
			        	window.offcanvas_right();

			        }, 200);	



				}			
			});		
		});	
	}


	// =============================================================================
	// Product Quantity
	// =============================================================================

	barberry.productQuantity = function() {

		$('body').on('click', '.plus-btn, .minus-btn', function(e) {
			e.preventDefault();
		    // Get values
		    var $qty = $(this).parents('.quantity').find('.qty'),
		        button_add = $(this).parent().parent().find('.single_add_to_cart_button'),
		        currentVal = parseFloat($qty.val()),
		        max = parseFloat($qty.attr('max')),
		        min = parseFloat($qty.attr('min')),
		        step = $qty.attr('step');
		        
		    // Format values
		    currentVal = !currentVal ? 0 : currentVal;
		    max = !max ? '' : max;
		    min = !min ? 1 : min;
		    if (step === 'any' || step === '' || typeof step === 'undefined' || parseFloat(step) === 'NaN') step = 1;
		    // Change the value
		    if ($(this).is('.plus-btn')) {
		        if (max && (max == currentVal || currentVal > max)) {
		            $qty.val(max);
		            if (button_add.length){
		                button_add.attr('data-quantity', max);
		            }
		        } else {
		            $qty.val(currentVal + parseFloat(step));
		            if (button_add.length){
		                button_add.attr('data-quantity', currentVal + parseFloat(step));
		            }
		        }
		    } else {
		        if (min && (min == currentVal || currentVal < min)) {
		            $qty.val(min);
		            if (button_add.length){
		                button_add.attr('data-quantity', min);
		            }
		        } else if (currentVal > 0) {
		            $qty.val(currentVal - parseFloat(step));
		            if (button_add.length){
		                button_add.attr('data-quantity', currentVal - parseFloat(step));
		            }
		        }
		    }
		    // Trigger change event
		    $qty.trigger('change');
		});

	}


	// =============================================================================
	// Attribute Swatches
	// =============================================================================

	barberry.productSwatches = function() {

		$('body').on('tawcvs_initialized', function () {
			$('.variations_form').unbind('tawcvs_no_matching_variations');
			$('.variations_form').on('tawcvs_no_matching_variations', function (event, $el) {
				event.preventDefault();
				$el.addClass('selected');

				$('.variations_form').find('.woocommerce-variation.single_variation').show();
				if (typeof wc_add_to_cart_variation_params !== 'undefined') {
					$('.variations_form').find('.single_variation').slideDown(200).html('<p>' + wc_add_to_cart_variation_params.i18n_no_matching_variations_text + '</p>');
				}
			});
		});


		$('body').on('click', '.br-swatch-variation-image', function (e) {
			e.preventDefault();
			$(this).siblings('.br-swatch-variation-image').removeClass('selected');
			$(this).addClass('selected');
			var imgSrc = $(this).data('src'),
				imgSrcSet = $(this).data('src-set'),
				$mainImages = $(this).parents('li.product').find('.product-image > a'),
				$image = $mainImages.find('img').first(),
				imgWidth = $image.first().width(),
				imgHeight = $image.first().height();

			$mainImages.addClass('image-loading');
			$mainImages.css({
				width  : imgWidth,
				height : imgHeight,
				display: 'block'
			});

			$image.attr('src', imgSrc);

			if (imgSrcSet) {
				$image.attr('srcset', imgSrcSet);
			}

			$image.load(function () {
				$mainImages.removeClass('image-loading');
				$mainImages.removeAttr('style');
			});
		});

	}


	// =============================================================================
	// Ajax Loading
	// =============================================================================

	barberry.loadingAjax = function() {


	var listing_class 		= ".content-area .products";
	var item_class 			= ".content-area ul.products li";
	var pagination_class 	= "body.woocommerce-shop .woocommerce-pagination";
	var next_page_class 	= ".woocommerce-pagination a.next";
	var ajax_button_class 	= ".products_ajax_button";
	var ajax_loader_class 	= ".products_ajax_loader";

	var b_ajax_load_items = {
	    
	    init: function() {

	        if (barberry_scripts_vars.shop_pagination_type == 'load_more_button' || barberry_scripts_vars.shop_pagination_type == 'infinite_scroll') {
	        
		        $(document).ready(function() {
		            
		            if ($(pagination_class).length) {
		                
		                $(pagination_class).before('<div class="'+ajax_button_class.replace('.', '')+'" data-processing="0"><div class="loadmore"><span>'+barberry_scripts_vars.ajax_loading_locale+'</span><div class="container"><div class="dot"></div><div class="dot"></div><div class="dot"></div></div></div></div>');
		            }		            		            

		        });
		        
		        $('body').on('click', ajax_button_class, function(e) {

		        	e.preventDefault();

					if ( $(next_page_class).data('requestRunning') ) {
						return;
					}

					$(next_page_class).data('requestRunning', true);			        	
		            
		            if ($(next_page_class).length) {
		                
		                $(ajax_button_class).attr('data-processing', 1).addClass('loading');                
		                
		                var href = $(next_page_class).attr('href');


		                b_ajax_load_items.onstart();
		                
		                $.get(href, function(response) {
		                    
		                    $(pagination_class).html($(response).find(".woocommerce-pagination").html());

		                    $(response).find(item_class).each(function(i) {

		                    	$($(this)).addClass('new');

		                        $(listing_class).append($(this));

		                    	barberry.splitTextNew();
													barberry.animationNewProduct();
													
		                    	$($(this)).removeClass('new');
		                        
		                    });
	               
		                    $(ajax_button_class).attr('data-processing', 0).removeClass('loading');
		                    
		                    b_ajax_load_items.onfinish();

		                    if ($(next_page_class).length == 0) {
		                        $(ajax_button_class).addClass('disabled').show();
		                    } else {
		                    	$(ajax_button_class).show();
		                    }

		                });

		                

		            } else {
		                		                
		                $(ajax_button_class).addClass('disabled').show();

		            }

		        });

	        }
	        
	        if (barberry_scripts_vars.shop_pagination_type == 'infinite_scroll') {

		        var buffer_pixels = Math.abs(100);
		        
		        $(window).scroll(function() {
		           
		            if ($(listing_class).length) {
		                
		                var a = $(listing_class).offset().top + $(listing_class).outerHeight();
		                var b = a - $(window).scrollTop();
		                
		                if ((b - buffer_pixels) < $(window).height()) {
		                    if ($(ajax_button_class).attr('data-processing') == 0) {
		                        $(ajax_button_class).trigger('click');
		                    }
		                }

		            }

		        });

	        }

	    },

	    onstart: function() {
	    },

	    onfinish: function() {

				barberry.lazyLoad();
				barberry.countDownTimer();

	    },


	};

	b_ajax_load_items.init();
	b_ajax_load_items.onfinish();

	}



	// Pagination animations

	barberry.paginationHide = function() {
		var	tl = gsap.timeline(),
			pagination = $(".woocommerce-pagination, .products_ajax_button");
			tl.fromTo(pagination, {autoAlpha:1}, {ease: "power4.InOut",autoAlpha:0, duration: 1}, 0);
	}

	barberry.paginationShow = function() {
		var	tl = gsap.timeline(),
			pagination = $(".woocommerce-pagination, .products_ajax_button");
			tl.fromTo(pagination, {autoAlpha:0}, {ease: "power4.InOut",autoAlpha:1, duration: 1}, .5);
	}


	// =============================================================================
	// Ajax Filter
	// =============================================================================

	barberry.filterAjax = function() {

		if ( !barberry.$body.hasClass('catalog-ajax-filter') ) {
			return;
		}

		barberry.$body.on('price_slider_change', function(event, ui) {
			var form = $('.price_slider').closest('form').get(0),
				$form = $(form),
				url = $form.attr('action') + '?' + $form.serialize();

			$(document.body).trigger('barberry_catalog_filter_ajax', url, $(this));
		});

		barberry.$body.on('click', '.barberry-clear-filters', function(e) {
			e.preventDefault();
			var url = $(this).attr('href');
			$(document.body).trigger('barberry_catalog_filter_ajax', url, $(this));
		});

		function barberryUpdateUrlParameters(currentParams, newParams) {
		    if (currentParams.trim() === '') {
		        return "?" + newParams;
		    }
		    var newParamsObj = {};
		    newParams.split('&').forEach(function(x) {
		        var arr = x.split('=');
		        arr[1] && (newParamsObj[arr[0]] = arr[1]);
		    });
		    for (var prop in newParamsObj) {
		        var i = currentParams.indexOf('#');
		        var hash = i === -1 ? '' : uri.substr(i);
		        currentParams = i === -1 ? currentParams : currentParams.substr(0, i);
		        var re = new RegExp("([?&])" + prop + "=.*?(&|$)","i");
		        var separator = "&";
		        if (currentParams.match(re)) {
		            currentParams = currentParams.replace(re, '$1' + prop + "=" + newParamsObj[prop] + '$2');
		        } else {
		            currentParams = currentParams + separator + prop + "=" + newParamsObj[prop];
		        }
		        currentParams + hash;
		    }
		    return currentParams;
		}



        var woocommerceOrderingForm = $(document.body).find('form.woocommerce-ordering');
        if (woocommerceOrderingForm.length) {
            woocommerceOrderingForm.on('submit', function(e) {
                e.preventDefault();
            });
            $(document.body).on('change', 'form.woocommerce-ordering select.orderby', function(e) {
                e.preventDefault();
                var currentUrlParams = window.location.search;
                var url = window.location.href.replace(window.location.search, '') + barberryUpdateUrlParameters(currentUrlParams, woocommerceOrderingForm.serialize());
                $(document.body).trigger('barberry_catalog_filter_ajax', [url, woocommerceOrderingForm]);
                
            });
        }



		barberry.$body.find('.site-shop-filters, .barberry-active-filters, .woocommerce-sidebar-inside .widget-area').on('click', 'a', function(e) {
			var $widget = $(this).closest('.widget');
			if ( 
				$widget.hasClass('widget_layered_nav_filters') ||
				$widget.hasClass('widget_layered_nav') ||
				$widget.hasClass('product-sort-by') ||
				$widget.hasClass('widget_price_filter') ||
				$widget.hasClass('barberry-price-filter-list') ) {
				e.preventDefault();
				$(this).closest('li').addClass('chosen');
				var url = $(this).attr('href');
				$(document.body).trigger('barberry_catalog_filter_ajax', url, $(this));
			}			


			if ( $widget.hasClass('product-sort-by') ) {
				$(this).addClass('active');
			}
		});	

		$(document.body).on('barberry_catalog_filter_ajax', function(e, url, element) {

			var $container = $('.shop-content-inner'),
				$container_nav = $('.woocommerce-sidebar-inside .widget-area'),
				$shopTopbar = $('.site-shop-filters'),
				$active_filters = $('.barberry-active-filters'),
				$categories_drop = $('.widget_product_categories select'),
				$ordering = $('.woocommerce-archive-header .woocommerce-ordering'),
				$found = $('.woocommerce-archive-header .product-found'),
				$filter = $('.woocommerce-archive-header .filter_switch');

				// if ( barberry_scripts_vars.shop_filters_close == '0' ) {
				// 	window.offcanvas_close();
				// 	window.filters_button_off();
				// } else {
				// 	$('.offcanvas_shop_sidebar').addClass('show');
				// }	

			if ($('.barberry-active-filters').children().length > 0) {
				$(this).addClass('with-active-filters');
			}	

			if ( $('.woocommerce-archive-header').length > 0 ) {
				if (Foundation.MediaQuery.atLeast('large')) {
					var position = $('.woocommerce-archive-header').offset().top -110;
				} else {
					var position = $('.woocommerce-archive-header').offset().top -60;
				}

				if ($('.shop-content .shop-content-inner .grid-container').children().length > 0) {

					if ( barberry_scripts_vars.shop_filters_close == '0' ) {
						window.offcanvas_close();
						window.filters_button_off();
					} else {
						$('.offcanvas_shop_sidebar').addClass('show');
					}	

					$('html, body').stop().animate({
							scrollTop: position
						},
						1200
					);
				} else {
					window.filters_button_on();
				}
				

			}


			$('#shop-loading').addClass('show');
			$('ul.products').addClass('show');
			barberry.paginationHide();

			if ( '?' == url.slice(-1) ) {
				url = url.slice(0, -1);
			}

			url = url.replace(/%2C/g, ',');

			history.pushState({
            	page: url
        	}, "", url);


			$(document.body).trigger('barberry_ajax_filter_before_send_request', [url, element]);

			if ( barberry.ajaxXHR ) {
				barberry.ajaxXHR.abort();
			}

			barberry.ajaxXHR = $.get(url, function(res) {

				$container.replaceWith($(res).find('.shop-content-inner'));
				$container_nav.html($(res).find('.woocommerce-sidebar-inside .widget-area').html());
				$shopTopbar.html($(res).find('.site-shop-filters').html());
				$categories_drop.html($(res).find('.widget_product_categories select').html());
				$ordering.html($(res).find('.woocommerce-archive-header .woocommerce-ordering').html());
				$found.html($(res).find('.woocommerce-archive-header .product-found').html());
				$filter.html($(res).find('.woocommerce-archive-header .filter_switch').html());
				$active_filters.html($(res).find('.barberry-active-filters').html());

				barberry.priceSlider();
				barberry.lazyLoad();
				barberry.widgetProductCategories();
				barberry.select2();
				barberry.splitText();
				barberry.animationProduct();
				barberry.loadingAjax();
				barberry.filters_scroll();
				barberry.countDownTimer();
				
				$('#shop-loading').removeClass('show');
				$('ul.products').removeClass('show');	
				barberry.paginationShow();

				$(document.body).trigger('barberry_ajax_filter_request_success', [res, url]);

			}, 'html');


		});

	}

// =============================================================================
// Quick View Init
// =============================================================================

barberry.quickView = function() {

    if ( barberry_scripts_vars.product_quick_view == '0' ) {
      return;
    }

	function product_quick_view_ajax(id) {
		
		$.ajax({
			
			url: barberry_scripts_vars.ajaxurl,
			
			data: {
				"action" : "barberry_product_quick_view",
				'product_id' : id
			},

			success: function(results) {				
				$(".barberry_qv_content").empty().html(results);
				$("body").removeClass("progress");


	            setTimeout(function() { 
   	        	 	$(document.body).trigger('opened_product_quickview');
		        	$('#barberry_woocommerce_quickview').addClass('open');
	            }, 500); 

	            setTimeout(function() { 
		        	$("body").addClass('photoswipe-blur');
	            }, 700); 
				
	            $("#barberry_woocommerce_quickview button.single_add_to_cart_button.progress-btn").on("click", function(e) {
					e.preventDefault();

			        if ( $(this).hasClass('disabled') ) {
			            return;
			        }		
			        			
			        var progressBtn = $(this);

			        if (!progressBtn.hasClass("active")) {
			          progressBtn.addClass("active");
			          setTimeout(function() {
			            progressBtn.addClass("check");
			          }, 3000);
			          setTimeout(function() {
			            progressBtn.removeClass("active");
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
			                $(document.body).on('wc_fragments_refreshed', function() {

			                    $singleBtn.removeClass('loading');

			                    barberry.ShippingFreeNotification();

			                    setTimeout(function(){ 
			                    	close_quickview_modal();
			                        if ( barberry_scripts_vars.add_to_cart_action == 'no_action' ) {
			                          return;
			                        }			                    	
			                        window.offcanvas_right();
			                    }, 300);

			                });

			            }
			        });                   		        

	            });

				var carouselContainers = document.querySelectorAll('#barberry_woocommerce_quickview .woocommerce-product-gallery');

				for ( var i=0; i < carouselContainers.length; i++ ) {
				  var container = carouselContainers[i];
				  initCarouselContainer( container );
				}	
				
				function initCarouselContainer( container ) {
					var carousel = container.querySelector('#product-images');
					var cells = carousel.querySelectorAll('.product-gallery-cell');


					$(document).on('found_variation', 'form.variations_form', function(event, variation) {
						event.preventDefault();
						flkty.selectCell( 0 );
					}).on('reset_image', function() {
						flkty.selectCell( 0 );
					});


					var flkty = new Flickity( carousel, {
					    // options
					    imagesLoaded: true,
					    percentPosition: true,
					    cellAlign: 'left',
					    contain: true,
					    lazyLoad: true,
					    wrapAround: true,
					    pageDots: cells.length > 1 ? true : false,
					    prevNextButtons: cells.length > 1 ? true : false,
					    dragThreshold: 15,
					    adaptiveHeight: true,
						arrowShape: { 
							x0: 10,
							x1: 60, y1: 50,
							x2: 60, y2: 40,
							x3: 20
						},
						on: {
							ready: function() {
							  var	tl = gsap.timeline(),
									gallery = $("#barberry_woocommerce_quickview #product-images, #barberry_woocommerce_quickview .flickity-slider"),
									single_gallery = $("#barberry_woocommerce_quickview #product-images"),
									breadcrumbs = $("#barberry_woocommerce_quickview .breadcrumbs");

								tl.fromTo(gallery, {autoAlpha:0}, {ease: "power4.InOut", autoAlpha:1, duration: 1}, 0);
								tl.fromTo(single_gallery, {scale: 1.15, autoAlpha:0}, {ease: "power4.InOut",scale: 1, autoAlpha:1, duration: 2}, .3);
								tl.fromTo(breadcrumbs, {y:40, autoAlpha:0}, {ease: "power4.InOut",y:0, autoAlpha:1, duration: 1.2}, 1);

								if ( barberry_scripts_vars.load_animation == '1' ) {
									barberry.productInfoAnimation();
								}
							}
						}	
																	
					} );

				}			

				if ( typeof $.fn.select2 === 'function' ) {
					$('#barberry_woocommerce_quickview .variations_form select').select2({
						minimumResultsForSearch: -1,
						placeholder: barberry_scripts_vars.select_placeholder,
						dropdownParent: $('#barberry_woocommerce_quickview .variations_form'),
						allowClear: true,
					});
				}				


				var form_variation = $("#barberry_woocommerce_quickview").find('.variations_form');
				var form_variation_select = $("#barberry_woocommerce_quickview").find('.variations_form .variations select');
            	
            	form_variation.wc_variation_form();
            	form_variation_select.change();

                 /*plugin: watches variation*/
                if (typeof $.fn.tawcvs_variation_swatches_form !== 'undefined') {
                    form_variation.tawcvs_variation_swatches_form();
                }   


	            setTimeout(function() { 
	            	if ( $(window).width() > 1024 ) {
	            		$("#barberry_woocommerce_quickview .nano").nanoScroller({ iOSNativeScrolling: true });
	            	}

		        	$( '#barberry_woocommerce_quickview .barberry_qv_content' ).addClass('maybe_scroll');
	            }, 1200);

	           
			},


		});
	}

	function close_quickview_modal() {
		$("body").removeClass('photoswipe-blur');
		$('#barberry_woocommerce_quickview').removeClass('open');
        $('#barberry_woocommerce_quickview .barberryd_qv_content').removeClass('maybe_scroll');
        $('#barberry_woocommerce_quickview .barberry_qv_content').empty();
        $(document.body).trigger('closed_product_quickview');

	}

    $('.offcanvas_main_content').on('click', '.barberry_product_quick_view_button', function(e) {
    	e.preventDefault();
        close_quickview_modal();
        var product_id  = $(this).data('product_id');
        
		product_quick_view_ajax(product_id);

    });	

    $('#barberry_woocommerce_quickview').on('click', function(e) {
    	var containers = [
			".barberry_qv_content"
		];

		var container = $(containers.join(", "));
	    
	    if (!container.is(e.target) && container.has(e.target).length === 0) {
	        close_quickview_modal();
	    }
    });

    $('#barberry_woocommerce_quickview').on('click', '.close-button-wrapper', function(e) {
    	close_quickview_modal();
    });

}



	// =============================================================================
	// Get Price Slider JS
	// =============================================================================

	barberry.priceSlider = function() {

		// woocommerce_price_slider_params is required to continue, ensure the object exists
		if ( typeof woocommerce_price_slider_params === 'undefined' ) {
			return false;
		}

		// if ( $('.sidebar-container').find('.widget_price_filter').length <= 0 && $('#shop-topbar').find('.widget_price_filter').length <= 0 ) {
		// 	return false;
		// }

		// Get markup ready for slider
		$('input#min_price, input#max_price').hide();
		$('.price_slider, .price_label').show();

		// Price slider uses jquery ui
		var min_price = $('.price_slider_amount #min_price').data('min'),
			max_price = $('.price_slider_amount #max_price').data('max'),
			current_min_price = parseInt(min_price, 10),
			current_max_price = parseInt(max_price, 10);

		if ( $('.price_slider_amount #min_price').val() != '' ) {
			current_min_price = parseInt($('.price_slider_amount #min_price').val(), 10);
		}
		if ( $('.price_slider_amount #max_price').val() != '' ) {
			current_max_price = parseInt($('.price_slider_amount #max_price').val(), 10);
		}

		$(document.body).bind('price_slider_create price_slider_slide', function(event, min, max) {
			if ( woocommerce_price_slider_params.currency_pos === 'left' ) {

				$('.price_slider_amount span.from').html(woocommerce_price_slider_params.currency_symbol + min);
				$('.price_slider_amount span.to').html(woocommerce_price_slider_params.currency_symbol + max);

			} else if ( woocommerce_price_slider_params.currency_pos === 'left_space' ) {

				$('.price_slider_amount span.from').html(woocommerce_price_slider_params.currency_symbol + ' ' + min);
				$('.price_slider_amount span.to').html(woocommerce_price_slider_params.currency_symbol + ' ' + max);

			} else if ( woocommerce_price_slider_params.currency_pos === 'right' ) {

				$('.price_slider_amount span.from').html(min + woocommerce_price_slider_params.currency_symbol);
				$('.price_slider_amount span.to').html(max + woocommerce_price_slider_params.currency_symbol);

			} else if ( woocommerce_price_slider_params.currency_pos === 'right_space' ) {

				$('.price_slider_amount span.from').html(min + ' ' + woocommerce_price_slider_params.currency_symbol);
				$('.price_slider_amount span.to').html(max + ' ' + woocommerce_price_slider_params.currency_symbol);

			}

			$(document.body).trigger('price_slider_updated', [min, max]);
		});
		if ( typeof $.fn.slider !== 'undefined' ) {
			$('.price_slider').slider({
				range  : true,
				animate: true,
				min    : min_price,
				max    : max_price,
				values : [current_min_price, current_max_price],
				create : function() {

					$('.price_slider_amount #min_price').val(current_min_price);
					$('.price_slider_amount #max_price').val(current_max_price);

					$(document.body).trigger('price_slider_create', [current_min_price, current_max_price]);
				},
				slide  : function(event, ui) {

					$('input#min_price').val(ui.values[0]);
					$('input#max_price').val(ui.values[1]);

					$(document.body).trigger('price_slider_slide', [ui.values[0], ui.values[1]]);
				},
				change : function(event, ui) {

					$(document.body).trigger('price_slider_change', [ui.values[0], ui.values[1]]);
				}
			});
		}

	}


	// =============================================================================
	// Yith Wishlist Counter
	// =============================================================================

	barberry.ajaxWishlist = function() {

		barberry.$body.on('added_to_wishlist removed_from_wishlist', function() {
			var that = this;

			$.ajax({
				url     : barberry_scripts_vars.ajaxurl,
				dataType: 'json',
				method  : 'post',
				data    : {
					action: 'barberry_update_wishlist_count'
				},
				success : function(data) {
					
					if ( data >= 0 ) {
						$('body').addClass('has-wishlist');	
					} 

					$('.site-header').find('.header-wishlist .wishlist_items_number').html(data);
					
					if ( data == 0 ) {
						$('body').removeClass('has-wishlist');
					}

				}
			});
		});	

	}



	// =============================================================================
	// Filter Toggle
	// =============================================================================

	barberry.filterToggle = function() {

		window.filters_button_off = function() {

			var trigger = $( '.woocommerce-archive-header .filter_switch' );
			var target  = $( '.woocommerce-archive-header .site-shop-filters' );

			trigger.removeClass('active');
			trigger.attr('data-toggled','off');
			target.slideUp(300).removeClass( "on-screen" );

			if ($('.woocommerce-archive-header .shop-filters-area-content').children().length > 0) {
				trigger.removeClass('with-filters');
			}
			
		}

		window.filters_button_on = function() {
			var trigger = $( '.woocommerce-archive-header .filter_switch' );
			var target  = $( '.woocommerce-archive-header .site-shop-filters' );

			trigger.addClass('active');
			trigger.attr('data-toggled','on');
			target.slideDown(300).addClass( "on-screen" );		
		}

		window.filters_button_on_off = function() {
			$('.woocommerce-archive-header .filter_switch').removeClass('with-filters');

			if (Foundation.MediaQuery.atLeast('large')) {

				if ($('.woocommerce-archive-header .shop-filters-area-content').children().length > 0) {
					$('.woocommerce-archive-header .filter_switch').addClass('with-filters');
				}

			} else {

				if ( ( $('.woocommerce-archive-header .shop-widget-area').length > 0 ) || ( $('.woocommerce-archive-header .shop-filters-area-content').children().length > 0 ) ) {
					$('.woocommerce-archive-header .filter_switch').addClass('with-filters');
				}

			}			
		}


		window.filters_button_on_off();

		if ( $('.woocommerce-archive-header') ) {

			var trigger = $( '.woocommerce-archive-header .filter_switch' );
			var target  = $( '.woocommerce-archive-header .site-shop-filters' );

			trigger.unbind('click').bind('click', trigger, function(){
			    if (!$(this).attr('data-toggled') || $(this).attr('data-toggled') == 'off'){
					$(this).attr('data-toggled','on');
					$(this).addClass('active');
					target.slideDown(300).addClass( "on-screen" );			           
			    }
			    else if ($(this).attr('data-toggled') == 'on'){
					$(this).attr('data-toggled','off');
					$(this).removeClass('active');
					target.slideUp(300).removeClass( "on-screen" );			           
			    }
			});

		}

			

		$(window).resize(function() {
			window.filters_button_on_off();
		});

	}


	// =============================================================================
	// Filters Scroll
	// =============================================================================

	barberry.filters_scroll = function() {

		var woocommerce_filter = $('.woocommerce-shop .site-shop-filters .widget-area .widget_layered_nav ul');

		if ( woocommerce_filter.length ) {

			woocommerce_filter.each(function() {

				var max_filters 			= 5;
				var filter_length 			= $(this).find('li').length;

				if ( filter_length > max_filters ) {
					$(this).addClass('add_scroll');
				} 
				
			});
		}

		var productVrThumbnails = $('.product-vr-thumbnails-container');


		if ( productVrThumbnails.length ) {
			// var thumb_length 			= productVrThumbnails.children().size();
			// var thumb_length = $('.product-thumbnails-container').attr( "data-thumb" );

			productVrThumbnails.each(function() {

				var max_products 			= 4;
				var thumb_length 			= productVrThumbnails.attr( "data-thumb" );

				if ( thumb_length > max_products ) {
					$(this).addClass('add_scroll');
				} 
				
			});
		}	

        var BarberryActiveFilters = function () {
        	if (!$('#barberry-filters-wrapper').length) {return;}
        	var active_filter = document.getElementById("barberry-filters-wrapper").scrollWidth;
        	$(".barberry-active-filters").removeClass('add_scroll');
			if (active_filter > $(window).outerWidth() ) {
			    $(".barberry-active-filters").addClass('add_scroll');
			}		
        };

        BarberryActiveFilters();
        $(window).resize(BarberryActiveFilters);


        var BarberryStickyVariables = function () {
        	if (!$('.barberry-fixed-product-variations-wrap').length) {return;}
        	var qty_variations_wrap = $(".barberry-fixed-product-variations-wrap").innerWidth(),
        		qty_variations = document.getElementById("barberry-fixed-product-variations").scrollWidth;

        	$(".barberry-fixed-product-variations-wrap").removeClass('add_scroll');
			if (qty_variations > qty_variations_wrap ) {
			    $(".barberry-fixed-product-variations-wrap").addClass('add_scroll');
			}		
        };

        BarberryStickyVariables();
        $(window).resize(BarberryStickyVariables);


	}



	// =============================================================================
	// Widget Product Categories
	// =============================================================================

	barberry.widgetProductCategories = function() {

		$('.product-categories-with-icon').on('click', '.cat-parent .dropdown_icon', function() {
			$(this).parent().toggleClass('active-item');
			$(this).siblings("ul.children").slideToggle('300', function() {
			});
		});

		// If there is more than 8 categories than add scroll class
		// If the user is inside the category, keep the widget category open
		
		$('.product-categories-with-icon .cat-item').each(function() {

			var max_subcategory_nr 		= 8
			var subcategory_nr 			= $(this).find("ul.children").find('li').length;

			if ( subcategory_nr > max_subcategory_nr ) {
				$(this).find("ul.children").addClass('add_scroll');
			} 

			if ( $(this).hasClass('current-cat') ) {
				$(this).addClass('active-item');
				$(this).find("ul.children").show();
			}

			if ( $(this).hasClass('current-cat-parent') ) {
				$(this).addClass('active-item');
				$(this).find("ul.children").show();
			}

			if ( $(this).hasClass('cat-parent') ) {
				if ( ! $(this).find('img').length ) {
					$(this).addClass('no-icon');
				}
			}
			
		});

	}


	// =============================================================================
	// Sticky Sidebar
	// =============================================================================

	barberry.stickyShopSidebar = function() {

        if ( barberry_scripts_vars.shop_sticky_sidebar == '0' || $("body").hasClass("single-product")) {
            return;
        }

        var $headerHeight = 40;

        if ($(".header--clone").length > 0) {
            $headerHeight = 100;
        }

        $('.shop-sidebar-container').stickySidebar({
            topSpacing: $headerHeight,
            bottomSpacing: 40,
            resizeSensor: true,
            minWidth: 1024,
            containerSelector: '.main-shop-container',
            innerWrapperSelector: '.woocommerce-sidebar-inside'
        });

	}

    // =============================================================================
    // Sticky Sidebar
    // =============================================================================

    barberry.stickySidebarBtn = function() {


        var $trigger = $('.barberry-show-sidebar-btn');
        var $stickyBtn = $('.shop-sidebar-btn');

        if ($stickyBtn.length <= 0 || $trigger.length <= 0 || $(window).width() >= 1024) return;

        var stickySidebarBtnToggle = function () {
            var btnOffset = $trigger.offset().top + $trigger.outerHeight();
            var windowScroll = $(window).scrollTop();

            if (btnOffset < windowScroll) {
                $stickyBtn.addClass('barberry-sidebar-btn-shown');
            } else {
                $stickyBtn.removeClass('barberry-sidebar-btn-shown');
            }
        };

        stickySidebarBtnToggle();

        $(window).scroll(stickySidebarBtnToggle);
        $(window).resize(stickySidebarBtnToggle);

    }


	// =============================================================================
	// Sticky Sidebar
	// =============================================================================

	barberry.removeFromCart = function() {

        $( document ).on('click', '.widget_shopping_cart .remove', function(e) {
            e.preventDefault();
            $(this).parent().addClass('removing-process');
            barberry.ShippingFreeNotification();

        });

	}



	// =============================================================================
	// Cart & Checkout Form Submit Arrow at Focus
	// =============================================================================

	barberry.couponFocus = function() {

		$(document).on('focus', '.woocommerce-cart #content .cart .actions .coupon #coupon_code', function() {
			$('.woocommerce-cart #content .cart .actions .coupon').addClass('focus');
		});

		$(document).on('focusout', '.woocommerce-cart #content .cart .actions .coupon #coupon_code', function() {
			$('.woocommerce-cart #content .cart .actions .coupon').removeClass('focus');
		});

		$(document).on('focus', 'body.woocommerce-checkout #couponModal .coupon #coupon_code', function() {
			$('body.woocommerce-checkout #couponModal .coupon').addClass('focus');
		});

		$(document).on('focusout', 'body.woocommerce-checkout #couponModal .coupon #coupon_code', function() {
			$('body.woocommerce-checkout #couponModal .coupon').removeClass('focus');
		});

		// Checkout Gift Card

		$(document).on('focus', '.woocommerce-cart .coupon #giftcard_code', function() {
			$('.woocommerce-cart .coupon').addClass('focus');
		});

		$(document).on('focusout', '.woocommerce-cart .coupon #giftcard_code', function() {
			$('.woocommerce-cart .coupon').removeClass('focus');
		});

		$(document).on('focus', 'body.woocommerce-checkout #giftModal .coupon #giftcard_code', function() {
			$('body.woocommerce-checkout #giftModal .coupon').addClass('focus');
		});

		$(document).on('focusout', 'body.woocommerce-checkout #giftModal .coupon #giftcard_code', function() {
			$('body.woocommerce-checkout #giftModal .coupon').removeClass('focus');
		});
	}


	// =============================================================================
	// WooCommerce pretty notices
	// =============================================================================

	barberry.woocommerceNotices = function() {

        if ( barberry_scripts_vars.notifications_click == 0 ) {
            return;
        }        

        var notices = '.woocommerce-error, .woocommerce-info:not(.wc-amazon-payments-advanced-info), .woocommerce-message, div.wpcf7-response-output, #yith-wcwl-popup-message, .mc4wp-alert, .dokan-store-contact .alert-success, .yith_ywraq_add_item_product_message';

        $('body').on('click', notices, function(e) {
            e.preventDefault();
            var $msg = $(this);
            hideMessage( $msg );
        });

        var showAllMessages = function() {
            $notices.addClass('shown-notice');
        };

        var hideAllMessages = function() {
            hideMessage( $notices );
        };

        var hideMessage = function( $msg ) {
            $msg.removeClass('shown-notice').addClass('hidden-notice');
        };
  
	}



	// =============================================================================
	// Shop Login/Register
	// =============================================================================

	barberry.shopLogin = function() {

        var animTimeout = 350;

        /* Show register form */
        function showRegisterForm() {
            // Form wrapper elements
            var $loginWrap = $('#bb-login-wrap'),
                $registerWrap = $('#bb-register-wrap');
            
            // Login/register form
            $loginWrap.removeClass('fade-in');
            setTimeout(function() {
                $registerWrap.addClass('inline fade-in slide-up');
                $loginWrap.removeClass('inline slide-up');
            }, animTimeout);
        }; 

        /* Show login form */
        function showLoginForm() {
            // Form wrapper elements
            var $loginWrap = $('#bb-login-wrap'),
                $registerWrap = $('#bb-register-wrap');
            
            // Login/register form
            $registerWrap.removeClass('fade-in');
            setTimeout(function() {
                $loginWrap.addClass('inline fade-in slide-up');
                $registerWrap.removeClass('inline slide-up');
            }, animTimeout);
        }; 

        /* Bind: Show register form button */
        $('#bb-show-register-button').bind('click', function(e) {
            e.preventDefault();
            $('html, body').animate({scrollTop : 0},animTimeout);
            showRegisterForm();
        });
        
        /* Bind: Show login form button */
        $('#bb-show-login-button').bind('click', function(e) {
            e.preventDefault();
            $('html, body').animate({scrollTop : 0},animTimeout);
            showLoginForm();
        });
        
        // Show register form if "#register" is added to URL
        if (window.location.hash && window.location.hash == '#register') {
            showRegisterForm();
        }              

	}


	// =============================================================================
	// WooCommerce CountDown Timer
	// =============================================================================

	barberry.countDownTimer = function() {

        $( '.barberry-timer' ).each(function(){
            var time = moment.tz( $(this).data('end-date'), $(this).data('timezone') );
            $( this ).countdown( time.toDate(), function( event ) {
                $( this ).html( event.strftime(''
                    + '<span class="countdown-days">%-D <span>' + barberry_scripts_vars.countdown_days + '</span></span> '
                    + '<span class="countdown-hours">%H <span>' + barberry_scripts_vars.countdown_hours + '</span></span> '
                    + '<span class="countdown-min">%M <span>' + barberry_scripts_vars.countdown_mins + '</span></span> '
                    + '<span class="countdown-sec">%S <span>' + barberry_scripts_vars.countdown_sec + '</span></span>'));
            });
        });
  
	}


	// =============================================================================
	// Mini Cart
	// =============================================================================

	barberry.miniCart = function() {

		$(document).ready(function($){

		    // synchronization from minicart quantity input to shop/single product page
		    var barberryChangeCartItemQuantity = function(qtyElement){

		        var matches = qtyElement.attr('name').match(/cart\[(\w+)\]/);
		        var cartItemKey = matches[1];

		        $('.woocommerce-mini-cart__total, .woocommerce-mini-cart').addClass('loading');

		        barberryMiniCartAjaxQuantityChange( cartItemKey, qtyElement.val() );
		    };

		    

		    var barberryMiniCartAjaxQuantityChange = function(cartItemKey, newQuantity) {
		    	$.ajax({

		            data: {
		                action: 'barberry_alter_quantity',
		                quantity: newQuantity,
		                cart_item_key: cartItemKey
		            },
		            type: 'post',
		            dataType: 'json',
		            url: barberry_scripts_vars.ajaxurl,
		            
		            beforeSend: function() {

		            },
		            success: function(resp) {

	                    // tell do WC reload widget contents
	                    $( document.body ).trigger( 'updated_wc_div' );

	                    // trigger for 3rd plugins event listeners
	                    $( document.body ).trigger( 'barberry_minicart_updated', [ resp.product_id ] );

	                    // trigger Added to cart
	                    $( document.body ).trigger( 'added_to_cart' );		                
		                
		                // find the <li> for the respective product on shop/category page
		                var productId = resp.product_id;
		                var liProduct = $('.post-' + productId + ',.elementor-page-' + productId);

		                // make it works with shortcodes, eg.: [add_to_cart id="XX"]
		                if ( !liProduct.length ) {
		                    liProduct = $('[data-product_id="'+productId+'"]').parent();
		                }

		                // update the quantity input to keep in sync with minicart
		                if ( liProduct.length ) {
		                    liProduct.find('.qty').val( newQuantity );
		                }

						$(document.body).on('wc_fragments_refreshed', function() {
							barberry.ShippingFreeNotification();
						});

		            }
		        });
		    };


			var barberryListenMiniCartQtyChange = function() {
				$(document.body).on('change', '.widget_shopping_cart_content .qty', function(){
					return barberryChangeCartItemQuantity( $(this) );
				});				
			};


			// init calls
			barberryListenMiniCartQtyChange();

		});



	}

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


// =============================================================================
// Product Lightbox Video
// =============================================================================

barberry.productVideo = function() {

    if ( !barberry.$body.hasClass('single-product') || !$('.single_product_video_trigger')[0] ) {
        return;
    }	

	$('.single_product_video_trigger').on('click', function() {
		
		$('.single_video_container').removeClass('stuck').addClass('active');
		$('.single_video_overlay').addClass('active');
		$("body").addClass('photoswipe-blur');

		setTimeout(function() {				
			$('.single_video_container iframe')[0].contentWindow.postMessage('{"event":"command","func":"","args":""}', '*');
		}, 500);

	});

	$('.close-icon').on('click', function() {
		
		$('.single_video_container').removeClass('active');
		$('.single_video_overlay').removeClass('active');	
		$("body").removeClass('photoswipe-blur');		
		
		setTimeout(function() {				
			$('.single_video_container iframe')[0].contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
		}, 500);

	});

	$('.single_video_overlay').on('click', function() {
		$('.close-icon').trigger('click');
	});

	var video_debounce = function() {
		
		if ($('.single_video_container').hasClass('active')) {

			if (window.scroll_position > 0) {

				$('.single_video_container').addClass('stuck');
				$('.single_video_overlay').removeClass('active');
				$("body").removeClass('photoswipe-blur');


			} else {

				$('.single_video_container').removeClass('stuck');
				$('.single_video_overlay').addClass('active');
				
				$("body").addClass('photoswipe-blur');
				
			}

		}

	}

	$(window).scroll(function() {
		video_debounce();
	});

}


// =============================================================================
// Product Section InView Animations
// =============================================================================

barberry.productInview = function() {

    if ( barberry_scripts_vars.load_animation == '0' ) {
      return;
    }

	window.sr = ScrollReveal();

    sr.reveal('.single-product .single-bottom-inview', {
        mobile: false,
        beforeReveal: function (domEl) {
            domEl.visuelRevealTL = gsap.timeline(),
            domEl.visuelRevealTL.fromTo(domEl, {y:40, autoAlpha:0}, {ease: "power4.InOut",y:0, autoAlpha:1, duration: 2},0); 
        } 
    }); 

}


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


// =============================================================================
// Fixed Single form add to cart
// =============================================================================

barberry.stickyAddtocart = function() {

    if ( !barberry.$body.hasClass('single-product') ) {
        return;
    }	

    $(window).scroll(function(){
    	var scrollTop = $(this).scrollTop();
	    if ($('input[name="barberry_fixed_single_add_to_cart"]').length) {
	        if ($('.product-info-cell .single_add_to_cart_button').length) {
	            var addToCart = $('.product-info-cell .single_add_to_cart_button');
	            if ($(addToCart).length) {
	                var addToCartOffset = $(addToCart).offset();

	                if (scrollTop >= addToCartOffset.top) {
	                    if (!$('body').hasClass('barberry-has-cart-fixed')) {
	                        $('body').addClass('barberry-has-cart-fixed');
	                    }
	                } else {
	                    $('body').removeClass('barberry-has-cart-fixed');
	                }
	            }
	        }
	    }
    });

    if ( barberry.$body.hasClass('single-product') && $('input[name="barberry_fixed_single_add_to_cart"]').length ) {
        $('body[data-footer-reveal="1"] .site-footer-inner').css({'margin-bottom': 100 });
    }

	if (
	    $('input[name="barberry_fixed_single_add_to_cart"]').length
	) {
		// console.log('has');

		var _can_render = true;


		// Render in desktop

		if (_can_render && $('.barberry-add-to-cart-fixed').length <= 0) {

			$('body').append('<div class="barberry-add-to-cart-fixed"><div class="barberry-wrap-content-inner"><div class="barberry-wrap-content grid-container"><div class="barberry-wrap-content-sections grid-x align-middle"></div></div></div></div>');

			if (barberry_scripts_vars.sticky_addtocart_mob == '0') {
				$('.barberry-add-to-cart-fixed').addClass('not-show-mobile');
				$('body').addClass('stickycart-not-show-mobile');
			}

			var _addToCartWrap = $('.barberry-add-to-cart-fixed .barberry-wrap-content .barberry-wrap-content-sections');

			// Main Image clone

			$(_addToCartWrap).append('<div class="barberry-fixed-product-info cell shrink"></div>');

			var _src = $('.product-images-cell .product-image-wrapper .product-gallery-cell:eq(0)').attr('data-thumb');

	        if (_src !== '') {
	            $('.barberry-fixed-product-info').append('<div class="barberry-thumb-clone"><img src="' + _src + '" /></div>');
	        }

	        // Title clone

			if ($('.product-info-cell .product_summary_top .page-title-wrapper .product_title').length) {
			    var _title = $('.product-info-cell .product_summary_top .page-title-wrapper .product_title').html();

			    $('.barberry-fixed-product-info').append('<div class="barberry-title-clone"><h3>' + _title +'</h3></div>');
			}

			// Price clone

			if ($('.product-info-cell .product_summary_middle .price').length) {
			    var _price = $('.product-info-cell .product_summary_middle .price').html();
			    if ($('.barberry-title-clone').length) {
			        $('.barberry-title-clone').append('<span class="price">' + _price + '</span>');
			    }
			    else {
			        $('.barberry-fixed-product-info').append('<div class="barberry-title-clone"><span class="price">' + _price + '</span></div>');
			    }
			}


			// Variations clone

			if ($('.product-info-cell .variations_form').length) {
				$(_addToCartWrap).append('<div id="barberry-fixed-product-variations-wrap" class="barberry-fixed-product-variations-wrap cell auto"><div id="barberry-fixed-product-variations" class="barberry-fixed-product-variations"></div></div>');

				// Variations

	            var _k = 1,
	                _item = 1;	
	            
	            $('.product-info-cell .variations_form .variations tr').each(function() {
					var _this = $(this);
					var _classWrap = 'barberry-attr-wrap-' + _k.toString();
					var _type = $(_this).find('select').attr('data-attribute_name') || $(_this).find('select').attr('name');

					if ($(_this).find('.tawcvs-swatches').length) {
						$('.barberry-fixed-product-variations').append('<div class="barberry-attr-wrap-clone ' + _classWrap + ' tawcvs-swatches"></div>');

						$(_this).find('.swatch').each(function () {
	                        var _obj = $(this);
	                        var _classItem = 'swatch-' + _item.toString();
	                        var _classItemStyle = $(_obj).attr('style');
	                        var _classItemClone = 'swatch-clone-' + _item.toString();
	                        var _classItemClone_target = _classItemClone;

	                        if ($(_obj).hasClass('swatch-color')) {
	                            _classItemClone += ' barberry-attr-color-clone';
	                        }	

	                        if ($(_obj).hasClass('swatch-label')) {
	                            _classItemClone += ' barberry-attr-label-clone';
	                        }

	                        if ($(_obj).hasClass('swatch-image')) {
	                            _classItemClone += ' barberry-attr-image-clone';
	                        }

	                        var _selected = $(_obj).hasClass('selected') ? ' selected' : '';
	                        var _contentItem = $(_obj).html();	
	                        
	                        $(_obj).addClass(_classItem);
	                        $(_obj).attr('data-target', '.' + _classItemClone_target);

                        	$('.barberry-attr-wrap-clone.' + _classWrap).append('<span style=' + _classItemStyle + ' class="barberry-attr-clone' + _selected + ' ' + _classItemClone + ' barberry-' + _type + '" data-target=".' + _classItem + '">' + _contentItem + '</span>');

							_item++;
						});

					} else {

						$('.barberry-fixed-product-variations').append('<div class="barberry-attr-select_wrap-clone ' + _classWrap + '"></div>');

						var _obj = $(_this).find('select');

						var _label = $(_this).find('.label').length ? $(_this).find('.label').html() : '';

						var _classItem = 'barberry-attr-select-' + _item.toString();
						var _classItemClone = 'barberry-attr-select-clone-' + _item.toString();

						var _contentItem = $(_obj).html();

						$(_obj).addClass(_classItem).addClass('barberry-attr-select');
						$(_obj).attr('data-target', '.' + _classItemClone);

						$('.barberry-attr-select_wrap-clone.' + _classWrap).append(_label + '<select name="' + _type + '" class="barberry-attr-select-clone ' + _classItemClone + ' barberry-' + _type + '" data-target=".' + _classItem + '">' + _contentItem + '</select>');

						_item++;

					}

					_k++;

	            });    			

			}

			// Class wrap simple product

			else {
			    $(_addToCartWrap).addClass('barberry-fixed-single-simple');
			}

			// Add to cart button

			setTimeout(function() {
			    var _button_wrap = barberry_clone_add_to_cart($);

			    if ($('.product-info-cell .variations_form').length) {
			    	$(_addToCartWrap).append('<div class="barberry-fixed-product-btn cell shrink"></div>');
			    } else {
			    	$(_addToCartWrap).append('<div class="barberry-fixed-product-btn cell auto"></div>');
			    }
			    
			    $('.barberry-fixed-product-btn').html(_button_wrap);
			    var _val = $('.product-info-cell form.cart input[name="quantity"]').val();
			    $('.barberry-single-btn-clone input[name="quantity"]').val(_val);
			}, 250);


			// Change Ux

			$('body').on('click', '.tawcvs-swatches .swatch', function() {
				var _target = $(this).attr('data-target');

				if ($(_target).length) {
					var _wrap = $(_target).parents('.barberry-attr-wrap-clone');
	                $(_wrap).find('.barberry-attr-clone').removeClass('selected');
	                if ($(this).hasClass('selected')) {
	                    $(_target).addClass('selected');
	                }					
				}

                if ($('.barberry-fixed-product-btn').length) {
                    setTimeout(function() {
                        var _button_wrap = barberry_clone_add_to_cart($);
                        $('.barberry-fixed-product-btn').html(_button_wrap);
                        var _val = $('.product-info-cell form.cart input[name="quantity"]').val();
                        $('.barberry-single-btn-clone input[name="quantity"]').val(_val);
                    }, 250);
                }				

                setTimeout(function() {
                    if ($('.tawcvs-swatches .swatch').length) {
                        $('.tawcvs-swatches .swatch').each(function() {
                            var _this = $(this);
                            var _targetThis = $(_this).attr('data-target');

                            if ($(_targetThis).length) {
                                var _disable = $(_this).hasClass('barberry-disable') ? true : false;
                                if (_disable) {
                                    if (!$(_targetThis).hasClass('barberry-disable')) {
                                        $(_targetThis).addClass('barberry-disable');
                                    }
                                } else {
                                    $(_targetThis).removeClass('barberry-disable');
                                }
                            }
                        });
                    }
                }, 250);				

			});


			// Change Ux clone

			$('body').on('click', '.barberry-attr-clone', function() {
			    var _target = $(this).attr('data-target');
			    if ($(_target).length) {
			        $(_target).trigger('click');
			    }
			});

			// Change select

			$('body').on('change', '.barberry-attr-select', function() {
				var _this = $(this);
				var _target = $(_this).attr('data-target');
				var _value = $(_this).val();

				if ($(_target).length) {
	                setTimeout(function() {
	                    var _html = $(_this).html();
	                    $(_target).html(_html);
	                    $(_target).val(_value);
	                }, 100);

	                setTimeout(function() {
	                    var _button_wrap = barberry_clone_add_to_cart($);
	                    $('.barberry-fixed-product-btn').html(_button_wrap);
	                    var _val = $('.product_layout form.cart input[name="quantity"]').val();
	                    $('.barberry-single-btn-clone input[name="quantity"]').val(_val);

	                    if ($('.barberry-attr-ux').length) {
	                        $('.barberry-attr-ux').each(function() {
	                            var _this = $(this);
	                            var _targetThis = $(_this).attr('data-target');

	                            if ($(_targetThis).length) {
	                                var _disable = $(_this).hasClass('barberry-disable') ? true : false;
	                                if (_disable) {
	                                    if (!$(_targetThis).hasClass('barberry-disable')) {
	                                        $(_targetThis).addClass('barberry-disable');
	                                    }
	                                } else {
	                                    $(_targetThis).removeClass('barberry-disable');
	                                }
	                            }
	                        });
	                    }
	                }, 250);

				}				
			});

			// Change select clone

	        $('body').on('change', '.barberry-attr-select-clone', function() {
	            var _target = $(this).attr('data-target');
	            var _value = $(this).val();
	            if ($(_target).length) {
	                $(_target).val(_value).change();
	            }
	        });	
	        
			$('.barberry-attr-select-clone').select2({
				width: 'resolve',
				minimumResultsForSearch: -1,
				placeholder: barberry_scripts_vars.select_placeholder,
				allowClear: true,
			});		

			// Reset variations

			$('body').on('click', '.reset_variations', function() {
				$(_addToCartWrap).find('.selected').removeClass('selected');

	            setTimeout(function() {
	                var _button_wrap = barberry_clone_add_to_cart($);
	                $('.barberry-fixed-product-btn').html(_button_wrap);
	                var _val = $('.product-info-cell form.cart input[name="quantity"]').val();
	                $('.barberry-single-btn-clone input[name="quantity"]').val(_val);

	                if ($('.barberry-attr-ux').length) {
	                    $('.barberry-attr-ux').each(function() {
	                        var _this = $(this);
	                        var _targetThis = $(_this).attr('data-target');

	                        if ($(_targetThis).length) {
	                            var _disable = $(_this).hasClass('barberry-disable') ? true : false;
	                            if (_disable) {
	                                if (!$(_targetThis).hasClass('barberry-disable')) {
	                                    $(_targetThis).addClass('barberry-disable');
	                                }
	                            } else {
	                                $(_targetThis).removeClass('barberry-disable');
	                            }
	                        }
	                    });
	                }
	            }, 250);
			});


			// Plus, Minus button

			$('body').on('click', '.product-info-cell form.cart .quantity .plus-btn, .product-info-cell form.cart .quantity .minus-btn', function() {
			    if ($('.barberry-single-btn-clone input[name="quantity"]').length) {
			        var _val = $('.product-info-cell form.cart input[name="quantity"]').val();
			        $('.barberry-single-btn-clone input[name="quantity"]').val(_val);
			    }
			});



			// Plus clone button

			$('body').on('click', '.barberry-single-btn-clone .plus-btn', function() {
			    if ($('.product-info-cell form.cart .quantity .plus-btn').length) {
			        $('.product-info-cell form.cart .quantity .plus-btn').trigger('click');
			    }
			});

			// Minus clone button

			$('body').on('click', '.barberry-single-btn-clone .minus-btn', function() {
			    if ($('.product-info-cell form.cart .quantity .minus-btn').length) {
			        $('.product-info-cell form.cart .quantity .minus-btn').trigger('click');
			    }
			});

			// Quantity input

			$('body').on('keyup', '.product-info-cell form.cart input[name="quantity"]', function() {
				var _val = $(this).val();
				$('.barberry-single-btn-clone input[name="quantity"]').val(_val);
			});

			// Quantity input clone

			$('body').on('keyup', '.barberry-single-btn-clone input[name="quantity"]', function() {
				var _val = $(this).val();
				$('.product-info-cell form.cart input[name="quantity"]').val(_val);
			});



			// Add to cart click

			$('body').on('click', '.barberry-single-btn-clone .single_add_to_cart_button', function(e){

				    if ($('.product-info-cell form.cart .single_add_to_cart_button').length) {
				        $('.product-info-cell form.cart .single_add_to_cart_button').trigger('click');
				    }

					var progressBtn = $(this);

			        if (!progressBtn.hasClass("active")) {
			          progressBtn.addClass("active");
			          setTimeout(function() {
			            progressBtn.addClass("check");
			          }, 3000);
			          setTimeout(function() {
			            progressBtn.removeClass("active");
			            progressBtn.removeClass("check");
			          }, 5000);
			        }

			});

			$('body').on('click', '.woocommerce-variation-mob-btn-clone', function(e){
				$('html, body').animate({
				    scrollTop: $(".variations_form").offset().top
				}, 2000);				
			});

		}


	}

	// Clone add to cart button fixed

	function barberry_clone_add_to_cart($) {
		var _ressult = '';

		if ($('.product_layout').length) {
			var _wrap = $('.product_layout');

			// Variations
			if ($(_wrap).find('.single_variation_wrap').length) {
	            var _price = $(_wrap).find('.single_variation_wrap .woocommerce-variation .woocommerce-variation-price').length && $(_wrap).find('.single_variation_wrap .woocommerce-variation').css('display') !== 'none' ?
	                $(_wrap).find('.single_variation_wrap').find('.woocommerce-variation-price').html() : '';
	            var _addToCart = $(_wrap).find('.single_variation_wrap').find('.woocommerce-variation-add-to-cart').clone();
	            $(_addToCart).find('*').removeAttr('id');
	            if ($(_addToCart).find('.single_add_to_cart_button').length) {
	                $(_addToCart).find('.single_add_to_cart_button').removeAttr('style');
	            }
				if ($(_addToCart).find('.barberry-buy-now').length) {
					$(_addToCart).find('.barberry-buy-now').remove();
				}

	            var _btn = $(_addToCart).html();

	            var _mobBtn = $(_addToCart).find('.single_add_to_cart_button').clone().html();
	            
	            var _disable = $(_wrap).find('.single_variation_wrap').find('.woocommerce-variation-add-to-cart-disabled').length ? ' barberry-clone-disable' : '';

	            _ressult = '<div class="barberry-single-btn-clone single_variation_wrap-clone' + _disable + '">' + _price + '<div class="woocommerce-variation-add-to-cart-clone">' + _btn + '<div class="woocommerce-variation-mob-btn-clone button">' + _mobBtn + '</div></div></div>';

			}

			// Simple

			else if ($(_wrap).find('.cart').length) {
				var _addToCart = $(_wrap).find('.cart').clone();
				$(_addToCart).find('*').removeAttr('id');
				if ($(_addToCart).find('.single_add_to_cart_button').length) {
				    $(_addToCart).find('.single_add_to_cart_button').removeAttr('style');
				}
				if ($(_addToCart).find('.barberry-buy-now').length) {
					$(_addToCart).find('.barberry-buy-now').remove();
				}				
				var _btn = $(_addToCart).html();

				_ressult = '<div class="barberry-single-btn-clone">' + _btn + '</div>';
			}

		}

		return _ressult;
	}

				

  

}


// =============================================================================
// Product Page Wishlist Button
// =============================================================================

barberry.productWishlist = function() {

	$(document).on('click', '.product_summary_bottom_inner .add_to_wishlist',  function(e) {
		var this_button = $(this);
		this_button.parents('.yith-wcwl-add-button').addClass('loading');
	});   
}

// =============================================================================
// Product Page Compare Button
// =============================================================================



barberry.productCompare = function() {

	initCompareIcons($);


    /**
     * init Compare icons
     */

	$(document).on('click', '.compare-btn .compare-link',  function(e) {
		// var this_button = $(this);
		// this_button.addClass('loading');
		var _this = $(this);
		// _this.addClass('loading');

		if (!$(_this).hasClass('barberry-compare')) {
		    var $button = $(_this).parents('.compare-btn');
		    $button.find('.compare-button .compare').trigger('click');
		} else {
		    var _id = $(_this).attr('data-prod');
		    if (_id) {
		        add_compare_product(_id, $);
		    }
		}

		return false;
	}); 
	

	$('body').on('click', '.footer-section-inner .barberry_product_compare_button', function(){
	    var _this = $(this);
	    if (!$(_this).hasClass('barberry-compare')) {
	        var $button = $(_this).parents('.footer-section-inner');
	        $button.find('.compare-button .compare').trigger('click');
	    } else {
	        var _id = $(_this).attr('data-prod');
	        if (_id) {
	            add_compare_product(_id, $);
	        }
	    }

	    
	    return false;
	});

	/**
	 * Remove item from Compare
	 */
	$('body').on('click', '.barberry-remove-compare', function(){
	    var _id = $(this).attr('data-prod');
	    if (_id) {
	        remove_compare_product(_id, $);
	    }
	    
	    return false;
	});


	/**
	 * Remove All items from Compare
	 */
	$('body').on('click', '.barberry-compare-clear-all', function(){
	    removeAll_compare_product($);
	    
	    return false;
	});

	/**
	 * Show Compare
	 */
	$('body').on('click', '.barberry-show-compare', function(){
	    loadCompare($);
	    
	    if (!$(this).hasClass('barberry-showed')) {
	        showCompare($);
	    } else {
	        hideCompare($);
	    }
	    
	    return false;
	});

	$('body').on('click', '.barberry-show-compare-mob', function(){
	    loadCompare($);

	    window.offcanvas_close();

		setTimeout(function () {
		    showCompare($);
		}, 300);
	    
	    
	    return false;
	});
	/**
	 * Load Compare
	 * 
	 * @param {type} $
	 * @returns {undefined}
	 */
	var _compare_init = false;
	function loadCompare($) {
	    if ($('#barberry-compare-sidebar-content').length && !_compare_init) {
	        _compare_init = true;
	        
	        if (
	            typeof wc_add_to_cart_params !== 'undefined' &&
	            typeof wc_add_to_cart_params.wc_ajax_url !== 'undefined'
	        ) {
	            var _urlAjax = wc_add_to_cart_params.wc_ajax_url.toString().replace('%%endpoint%%', 'barberry_load_compare');

	            var _compare_table = $('.barberry-wrap-table-compare').length ? true : false;
	            $.ajax({
	                url: _urlAjax,
	                type: 'post',
	                dataType: 'json',
	                cache: false,
	                data: {
	                    compare_table: _compare_table
	                },
	                beforeSend: function () {
	                    
	                },
	                success: function (res) {
	                    if (typeof res.success !== 'undefined' && res.success === '1') {
	                        $('#barberry-compare-sidebar-content').replaceWith(res.content);
	                    }

	                    $('.barberry-compare-list-bottom').find('.barberry-loader').remove();
	                },
	                error: function () {

	                }
	            });
	        }
	    }
	}


	// Add Compare Product

	function add_compare_product(_id, $) {
	    var _urlAjax = null;
	    if (
	        typeof wc_add_to_cart_params !== 'undefined' &&
	        typeof wc_add_to_cart_params.wc_ajax_url !== 'undefined'
	    ) {
	        _urlAjax = wc_add_to_cart_params.wc_ajax_url.toString().replace('%%endpoint%%', 'barberry_add_compare_product');
	        
	        var _compare_table = $('.barberry-wrap-table-compare').length ? true : false;

	        $.ajax({
	            url: _urlAjax,
	            type: 'post',
	            dataType: 'json',
	            cache: false,
	            data: {
	                pid: _id,
	                compare_table: _compare_table
	            },
	            beforeSend: function () {
	                showCompare($);
	                
	                if ($('.barberry-compare-list-bottom').find('.barberry-loader').length <= 0) {
	                    $('.barberry-compare-list-bottom').append('<div class="barberry-loader"></div>');
	                }
	            },
	            success: function (res) {
	            	
	                if (typeof res.result_compare !== 'undefined' && res.result_compare === 'success') {
	                    if ($('#barberry-compare-sidebar-content').length) {
	                        if (res.mini_compare === 'no-change') {
	                            loadCompare($);
	                        } else {
	                            $('#barberry-compare-sidebar-content').replaceWith(res.mini_compare);
	                        }
	                    } else {
	                        if (res.mini_compare !== 'no-change' && $('.barberry-compare-list').length) {
	                            $('.barberry-compare-list').replaceWith(res.mini_compare);
	                        }
	                    }
	                    
	                    if (res.mini_compare !== 'no-change') {
	                        if ($('.compare_items_number').length) {
	                            
	                            $('.compare_items_number').html(convert_count_items($, res.count_compare));
	                            if (res.count_compare === 0) {
	                                if (!$('.compare-number').hasClass('barberry-product-empty')) {
	                                    $('.compare-number').addClass('barberry-product-empty');
	                                }
	                            } else {
	                                if ($('.compare_items_number').hasClass('barberry-product-empty')) {
	                                    $('.compare_items_number').removeClass('barberry-product-empty');
	                                }
	                            }
	                        }

	                        $('.barberry-compare-success span').html(res.mess_compare);
	                        $('.barberry-compare-success').fadeIn(200);

	                        if (_compare_table) {
	                            $('.barberry-wrap-table-compare').replaceWith(res.result_table);
	                        }
	                        
	                    } else {
	                        $('.barberry-compare-exists span').html(res.mess_compare);
	                        $('.barberry-compare-exists').fadeIn(200);
	                    }

	                    if (!$('.barberry-compare[data-prod="' + _id + '"]').hasClass('added')) {
	                        $('.barberry-compare[data-prod="' + _id + '"]').addClass('added');
	                    }

	                    if (!$('.barberry-compare[data-prod="' + _id + '"]').hasClass('barberry-added')) {
	                        $('.barberry-compare[data-prod="' + _id + '"]').addClass('barberry-added');
	                    }

	                    setTimeout(function () {
	                        $('.barberry-compare-success').fadeOut(200);
	                        $('.barberry-compare-exists').fadeOut(200);
	                    }, 2000);
	                }

	                $('.barberry-compare-list-bottom').find('.barberry-loader').remove();
	            },
	            error: function () {

	            }
	        });
	    }
	}

	/**
	 * Remove Compare
	 * 
	 * @param {type} _id
	 * @param {type} $
	 * @returns {undefined}
	 */
	function remove_compare_product(_id, $) {
	    var _urlAjax = null;
	    if (
	        typeof wc_add_to_cart_params !== 'undefined' &&
	        typeof wc_add_to_cart_params.wc_ajax_url !== 'undefined'
	    ) {
	        _urlAjax = wc_add_to_cart_params.wc_ajax_url.toString().replace('%%endpoint%%', 'barberry_remove_compare_product');
	        
	        var _compare_table = $('.barberry-wrap-table-compare').length ? true : false;

	        $.ajax({
	            url: _urlAjax,
	            type: 'post',
	            dataType: 'json',
	            cache: false,
	            data: {
	                pid: _id,
	                compare_table: _compare_table
	            },
	            beforeSend: function () {
	                if ($('.barberry-compare-list-bottom').find('.barberry-loader').length <= 0) {
	                    $('.barberry-compare-list-bottom').append('<div class="barberry-loader"></div>');
	                }
	                
	                if ($('table.barberry-table-compare tr.remove-item td.barberry-compare-view-product_' + _id).length) {
	                    $('table.barberry-table-compare').css('opacity', '0.3').prepend('<div class="barberry-loader"></div>');
	                }
	            },
	            success: function (res) {
	                if (typeof res.result_compare !== 'undefined' && res.result_compare === 'success') {
	                    if (res.mini_compare !== 'no-change' && $('#barberry-compare-sidebar-content').length) {
	                        $('#barberry-compare-sidebar-content').replaceWith(res.mini_compare);
	                    } else {
	                        if (res.mini_compare !== 'no-change' && $('.barberry-compare-list').length) {
	                            $('.barberry-compare-list').replaceWith(res.mini_compare);
	                        }
	                    }
	                    
	                    if (res.mini_compare !== 'no-change' && $('.barberry-compare-list').length) {
	                        $('.barberry-compare[data-prod="' + _id + '"]').removeClass('added');
	                        $('.barberry-compare[data-prod="' + _id + '"]').removeClass('barberry-added');
	                        if ($('compare_items_number').length) {
	                            
	                            $('compare_items_number').html(convert_count_items($, res.count_compare));
	                            if (res.count_compare === 0) {
	                                if (!$('compare_items_number').hasClass('barberry-product-empty')) {
	                                    $('compare_items_number').addClass('barberry-product-empty');
	                                }
	                            } else {
	                                if ($('compare_items_number').hasClass('barberry-product-empty')) {
	                                    $('compare_items_number').removeClass('barberry-product-empty');
	                                }
	                            }
	                        }

	                        $('.barberry-compare-success span').html(res.mess_compare);
	                        $('.barberry-compare-success').fadeIn(200);

	                        if (_compare_table) {
	                            $('.barberry-wrap-table-compare').replaceWith(res.result_table);
	                        }
	                    } else {
	                        $('.barberry-compare-exists').html(res.mess_compare);
	                        $('.barberry-compare-exists').fadeIn(200);
	                    }

	                    setTimeout(function () {
	                        $('.barberry-compare-success').fadeOut(200);
	                        $('.barberry-compare-exists').fadeOut(200);
	                        if (res.count_compare === 0) {
	                            $('.barberry-close-mini-compare').trigger('click');
	                        }
	                    }, 2000);
	                }

	                $('table.barberry-table-compare').find('.barberry-loader').remove();
	                $('.barberry-compare-list-bottom').find('.barberry-loader').remove();
	                compare_tabs();
	            },
	            error: function() {

	            }
	        });
	    }
	}

	/**
	 * Remove All Compare
	 * 
	 * @param {type} $
	 * @returns {undefined}
	 */
	function removeAll_compare_product($) {
	    var _urlAjax = null;
	    if (
	        typeof wc_add_to_cart_params !== 'undefined' &&
	        typeof wc_add_to_cart_params.wc_ajax_url !== 'undefined'
	    ) {
	        _urlAjax = wc_add_to_cart_params.wc_ajax_url.toString().replace('%%endpoint%%', 'barberry_remove_all_compare');
	        
	        var _compare_table = $('.barberry-wrap-table-compare').length ? true : false;
	        $.ajax({
	            url: _urlAjax,
	            type: 'post',
	            dataType: 'json',
	            cache: false,
	            data: {
	                compare_table: _compare_table
	            },
	            beforeSend: function () {
	                if ($('.barberry-compare-list-bottom').find('.barberry-loader').length <= 0) {
	                    $('.barberry-compare-list-bottom').append('<div class="barberry-loader"></div>');
	                }
	            },
	            success: function (res) {
	                if (res.result_compare === 'success') {
	                    if (res.mini_compare !== 'no-change' && $('.barberry-compare-list').length) {
	                        $('.barberry-compare-list').replaceWith(res.mini_compare);
	                        
	                        $('.barberry-compare').removeClass('added');
	                        $('.barberry-compare').removeClass('barberry-added');
	                        
	                        if ($('compare_items_number').length) {
	                            $('compare_items_number').html('0');
	                            if (!$('compare_items_number').hasClass('barberry-product-empty')) {
	                                $('compare_items_number').addClass('barberry-product-empty');
	                            }
	                        }

	                        $('.barberry-compare-success span').html(res.mess_compare);
	                        $('.barberry-compare-success').fadeIn(200);

	                        if (_compare_table) {
	                            $('.barberry-wrap-table-compare').replaceWith(res.result_table);
	                        }
	                    } else {
	                        $('.barberry-compare-exists span').html(res.mess_compare);
	                        $('.barberry-compare-exists').fadeIn(200);
	                    }

	                    setTimeout(function () {
	                        $('.barberry-compare-success').fadeOut(200);
	                        $('.barberry-compare-exists').fadeOut(200);
	                        $('.barberry-close-mini-compare').trigger('click');
	                    }, 1000);
	                }

	                $('.barberry-compare-list-bottom').find('.barberry-loader').remove();
	            },
	            error: function() {

	            }
	        });
	    }
	}

	/**
	 * Show compare
	 * 
	 * @param {type} $
	 * @returns {undefined}
	 */
	function showCompare($) {
	    if ($('.barberry-compare-list-bottom').length) {
	        // $('.transparent-window').show();
	        $("body").removeClass("no-offcanvas-animation").addClass("offcanvas_bottom lock-scroll");
	        
	        if ($('.barberry-show-compare').length && !$('.barberry-show-compare').hasClass('barberry-showed')) {
	            $('.barberry-show-compare').addClass('barberry-showed');
	        }
	        
	        if (!$('.barberry-compare-list-bottom').hasClass('barberry-active')) {
	            $('.barberry-compare-list-bottom').addClass('barberry-active');
	        }

		    var tl = gsap.timeline(),
		        compare_list = $(".barberry-compare-list");
		        tl.fromTo(compare_list, 1, {opacity:0}, {ease: Power4.easeIn, opacity:1}, 0);

	    }
	}

	/**
	 * Hide compare
	 * 
	 * @param {type} $
	 * @returns {undefined}
	 */
	function hideCompare($) {
	    if ($('.barberry-compare-list-bottom').length) {
	        // $('.transparent-window').fadeOut(550);
	        $("body").removeClass("offcanvas_bottom lock-scroll");
	        
	        if ($('.barberry-show-compare').length && $('.barberry-show-compare').hasClass('barberry-showed')) {
	            $('.barberry-show-compare').removeClass('barberry-showed');
	        }
	        
	        $('.barberry-compare-list-bottom').removeClass('barberry-active');
	    }
	}


	$('body').on('click', '.transparent-window, .barberry-close-mini-compare', function(){
	    
	    /**
	     * Hide compare product
	     */
	    hideCompare($);

	    // $('.transparent-window').fadeOut(1000);
	});


	// init Compare icons

	function initCompareIcons($, _init) {
		var init = typeof _init !== 'undefined' ? _init : true;
		var _comparetArr = get_compare_ids($);	

	    if (init && $('.compare_items_number').length) {
	        var _slCompare = _comparetArr.length;
	        $('.compare_items_number').html(convert_count_items($, _slCompare));
	        $('.compare_items_number').removeClass('hide');
	        
	        if (_slCompare <= 0) {
	            if (!$('.compare_items_number').hasClass('barberry-product-empty')) {
	                $('.compare_items_number').addClass('barberry-product-empty');
	            }
	        } else {
	            $('.compare_items_number').removeClass('barberry-product-empty');
	        }
	    }

		if (_comparetArr.length && $('.compare-link').length) {
		    $('.compare-link').each(function() {
		        var _this = $(this);
		        var _prod = $(_this).attr('data-prod');

		        if (_comparetArr.indexOf(_prod) !== -1) {
		            if (!$(_this).hasClass('added')) {
		                $(_this).addClass('added');
		            }
		            if (!$(_this).hasClass('barberry-added')) {
		                $(_this).addClass('barberry-added');
		            }
		        } else {
		            $(_this).removeClass('added');
		            $(_this).removeClass('barberry-added');
		        }
		    });
		}	    
	}




	/**
	 * 
	 * @param {type} $
	 * @returns {undefined}get Compare ids
	 */
	function get_compare_ids($) {
	    if ($('input[name="barberry_woocompare_cookie_name"]').length) {
	        var _cookie_compare = $('input[name="barberry_woocompare_cookie_name"]').val();
	        var _pids = $.cookie(_cookie_compare);
	        if (_pids) {
	            _pids = _pids.replace('[','').replace(']','').split(",").map(String);
	            
	            if (_pids.length === 1 && !_pids[0]) {
	                return [];
	            }
	        }
	        
	        return typeof _pids !== 'undefined' && _pids.length ? _pids : [];
	    } else {
	        return [];
	    }
	}


	/**
	 * Convert Count Items
	 * 
	 * @param {type} number
	 * @returns {String}
	 */
	function convert_count_items($, number) {
	    var _number = parseInt(number);
	    if ($('input[name="barberry_less_total_items"]').length && $('input[name="barberry_less_total_items"]').val() === '1') {
	        return _number > 9 ? '9+' : _number.toString();
	    } else {
	        return _number.toString();
	    }
	}

	/**
	 * Mobile Campare Table Tabs
	 */

	 function compare_tabs() {
		$( ".barberry-wrap-table-compare ul li:first-child" ).addClass('active');
		$('.barberry-wrap-table-compare tbody td:not(:empty)').siblings('td:nth-child(2)').addClass('default');

		$( ".barberry-wrap-table-compare ul" ).on( "click", "li", function() {
		  var pos = $(this).index()+2;
		  $("tr").find('td:not(:eq(0))').hide();
		  $('td:nth-child('+pos+')').css('display','table-cell');
		  $("tr").find('th:not(:eq(0))').hide();
		  $('li').removeClass('active');
		  $(this).addClass('active');
		});
	 }

	 compare_tabs();




}

	/**
	 * Document ready
	 */
	$(function() {
		barberry.init();
	});


});