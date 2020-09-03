
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