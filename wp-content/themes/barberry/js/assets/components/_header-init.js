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