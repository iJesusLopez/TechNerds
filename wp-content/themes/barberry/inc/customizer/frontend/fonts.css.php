<style>

	/* Main Font */
	
	body, p, a, .breadcrumbs-wrapper .breadcrumbs,
	ul.variation li .item-variation-name
	{ 
		font-family: 
		<?php echo "'" . TDL_Opt::getOption('main_font')['font-family'] . "'," ?>
		sans-serif;
		font-size: <?php echo TDL_Opt::getOption('main_font')['font-size'] ?>;
		line-height: <?php echo TDL_Opt::getOption('main_font')['line-height'] ?>;
		font-weight: <?php echo TDL_Opt::getOption('main_font')['font-weight'] ?>;
		letter-spacing: <?php echo TDL_Opt::getOption('main_font')['letter-spacing'] ?>;
	}

	@media screen and (max-width: 1024px) {
		body, p, a, .breadcrumbs-wrapper .breadcrumbs,
		ul.variation li .item-variation-name {
			font-size: <?php echo TDL_Opt::getOption('main_font_mobile')['font-size'] ?>;
			line-height: <?php echo TDL_Opt::getOption('main_font_mobile')['line-height'] ?>;
		}
	}

	/* Heading Font */

	h1, h1 a,
	h2, h2 a,
	h3, h3 a,
	h4, h4 a,
	h5, h5 a,
	h6, h6 a,
	header.site-header .header-wrapper .header-sections .site-branding .site-title a,
	body.woocommerce-checkout .checkout-cells .checkout-links a,
	fieldset legend, .fieldset legend,
	.widget .widget-title,
	.widget.woocommerce.widget_product_categories .product-categories:not(.children) > li a,
	.widget.woocommerce.widget_product_categories_with_icon .product-categories-with-icon > li a,
	.shortcode_barberry_slider .barberry_slider-wrapper .carousel-cell .slider-content .slider-content-wrapper .slide-title,
	.shortcode_barberry_collections_slider .barberry_slider_content .slider_content-wrapper .carousel-cell .slider-content .slide-title	{ 
		font-family: 
		<?php echo "'" . TDL_Opt::getOption('heading_font')['font-family'] . "'," ?>
		sans-serif;
		font-weight: <?php echo TDL_Opt::getOption('heading_font')['font-weight'] ?>;
		letter-spacing: <?php echo TDL_Opt::getOption('heading_font')['letter-spacing'] ?>;
	}

	.shortcode_barberry_slider .barberry_slider-wrapper .carousel-cell .slider-content .slider-content-wrapper .slide-button a,
	.shortcode_barberry_slider .barberry_slider-wrapper .carousel-cell .slider-content .slider-content-wrapper .slide-description { 
		font-family: 
		<?php echo "'" . TDL_Opt::getOption('heading_font')['font-family'] . "'," ?>
		sans-serif;
		font-weight: <?php echo TDL_Opt::getOption('heading_font')['font-weight'] ?>;
	}

	.page-header .title-section .title-section-wrapper .shop-categories-wrapper .shop-categories ul li a .cat-item-title span,
	.page-header .title-section .title-section-wrapper .shop-categories-wrapper .shop-categories .barberry-show-categories a span,
	.page-header .title-section .title-section-wrapper .blog-categories-wrapper .blog-categories .list_blog_categories li a,
	.single-product .woocommerce-tabs ul.tabs li a,
	.single-product .woocommerce-tabs #reviews #review_form_wrapper h3, .single-product .woocommerce-tabs #reviews #review_form_wrapper .comment-reply-title,
	body.single .single_navigation_container .nav-previous a .nav-previous-title + span, body.single .single_navigation_container .nav-previous a .nav-next-title + span, body.single .single_navigation_container .nav-next a .nav-previous-title + span, body.single .single_navigation_container .nav-next a .nav-next-title + span
	{ 
		font-family: 
		<?php echo "'" . TDL_Opt::getOption('heading_font')['font-family'] . "'," ?>
		sans-serif;
	}

	<?php	
		if (!empty(TDL_Opt::getOption('heading_font')['font-size'])):


		$headings_base_size = intval(TDL_Opt::getOption('heading_font')['font-size']);

		$h0_size = $headings_base_size * 3.157;
		$h1_size = $headings_base_size * 2.369;
		$h2_size = $headings_base_size * 1.777; 
		$h3_size = $headings_base_size * 1.333; 
		$h4_size = $headings_base_size * 1; 
		$h5_size = $headings_base_size * 0.75;
		$h6_size = $headings_base_size * 0.65;	

		$medium_base_size = $headings_base_size * 0.8;	
		$h0_size_medium = $medium_base_size * 3.157;
		$h1_size_medium = $medium_base_size * 2.369;
		$h2_size_medium = $medium_base_size * 1.777; 
		$h3_size_medium = $medium_base_size * 1.6; 
		$h4_size_medium = $medium_base_size * 1.4; 
		$h5_size_medium = $medium_base_size * 1; 
		$h6_size_medium = $medium_base_size * 0.95;
		
		$mobile_base_size = 16;	
		$h0_size_mobile = $mobile_base_size * 3.157;
		$h1_size_mobile = $mobile_base_size * 2.369;
		$h2_size_mobile = $mobile_base_size * 1.777; 
		$h3_size_mobile = $mobile_base_size * 1.6; 
		$h4_size_mobile = $mobile_base_size * 1.4; 
		$h5_size_mobile = $mobile_base_size * 1; 
		$h6_size_mobile = $mobile_base_size * 0.95;
	?>

		h1, h1 a, .woocommerce h1, .woocommerce-page h1 { font-size: <?php echo esc_attr($h1_size); ?>px; }
		h2, h2 a, .woocommerce h2, .woocommerce-page h2 { font-size: <?php echo esc_attr($h2_size); ?>px; }
		h3, h3 a, .woocommerce h3, .woocommerce-page h3 { font-size: <?php echo esc_attr($h3_size); ?>px; }
		h4, h4 a, .woocommerce h4, .woocommerce-page h4 { font-size: <?php echo esc_attr($h4_size); ?>px; }
		h5, h5 a, .woocommerce h5, .woocommerce-page h5 { font-size: <?php echo esc_attr($h5_size); ?>px; }
		h6, h6 a, .woocommerce h6, .woocommerce-page h6 { font-size: <?php echo esc_attr($h6_size); ?>px; }	

	@media screen and (max-width: 64em) {
		h1, h1 a, .woocommerce h1, .woocommerce-page h1 { font-size: <?php echo esc_attr($h1_size_medium); ?>px; }
		h2, h2 a, .woocommerce h2, .woocommerce-page h2 { font-size: <?php echo esc_attr($h2_size_medium); ?>px; }
		h3, h3 a, .woocommerce h3, .woocommerce-page h3 { font-size: <?php echo esc_attr($h3_size_medium); ?>px; }
		h4, h4 a, .woocommerce h4, .woocommerce-page h4 { font-size: <?php echo esc_attr($h4_size_medium); ?>px; }
		h5, h5 a, .woocommerce h5, .woocommerce-page h5 { font-size: <?php echo esc_attr($h5_size_medium); ?>px; }
		h6, h6 a, .woocommerce h6, .woocommerce-page h6 { font-size: <?php echo esc_attr($h6_size_medium); ?>px; }		
	}	

	@media screen and (max-width: 47.9375em) {
		h1, h1 a, .woocommerce h1, .woocommerce-page h1 { font-size: <?php echo esc_attr($h1_size_mobile); ?>px; }
		h2, h2 a, .woocommerce h2, .woocommerce-page h2 { font-size: <?php echo esc_attr($h2_size_mobile); ?>px; }
		h3, h3 a, .woocommerce h3, .woocommerce-page h3 { font-size: <?php echo esc_attr($h3_size_mobile); ?>px; }
		h4, h3 a, .woocommerce h4, .woocommerce-page h4 { font-size: <?php echo esc_attr($h4_size_mobile); ?>px; }
		h5, h5 a, .woocommerce h5, .woocommerce-page h5 { font-size: <?php echo esc_attr($h5_size_mobile); ?>px; }	
		h6, h6 a, .woocommerce h6, .woocommerce-page h6 { font-size: <?php echo esc_attr($h6_size_mobile); ?>px; }	
	}

	header.site-header .header-wrapper .header-sections .tools .header-expanded-view .header-account .my-account-form .is-dropdown-submenu .login-title {
		font-size: <?php echo esc_attr($h3_size); ?>px;
		font-weight: <?php echo TDL_Opt::getOption('page_header_font')['font-weight'] ?>;
	}

	<?php
		endif;
	?>

	/* Page Title Font */

	.page-header .title-section .title-section-wrapper .title-wrapper .page-title-wrapper .page-title,
	body.woocommerce-account .login-cells .login-content .login-content-inner #bb-login-wrap .title-wrapper .page-title-wrapper h1,
	body.woocommerce-account .login-cells .login-content .login-content-inner #bb-register-wrap .title-wrapper .page-title-wrapper h1,
	body.woocommerce-cart .cart-cells .cart-intro .title-wrapper .page-title-wrapper h1.page-title,
	body.woocommerce-cart .cart-cells .cart-items .title-wrapper .page-title-wrapper h1.page-title,
	body.woocommerce-account .account-nav-top .title-wrapper .page-title-wrapper h1,
	body.logged-in.woocommerce-wishlist  .account-nav-top .title-wrapper .page-title-wrapper h1,
	body.woocommerce-order-received .account-cells .account-intro .title-wrapper .page-title-wrapper h1,
	body.woocommerce-order-received .account-cells .account-content-failed h1,
	body.woocommerce-account .login-cells .login-content .login-content-inner .title-wrapper .page-title-wrapper h1,
	body.single .arthref .icon-container .share-title h1,
	.error404 .site-content .page-header .page-title-wrapper h1.page-title {
		font-family: 
		<?php echo "'" . TDL_Opt::getOption('page_header_font')['font-family'] . "'," ?>
		sans-serif;	
		font-weight: <?php echo TDL_Opt::getOption('page_header_font')['font-weight'] ?>;	
		letter-spacing: <?php echo TDL_Opt::getOption('page_header_font')['letter-spacing'] ?>;
		line-height: <?php echo TDL_Opt::getOption('page_header_font')['line-height'] ?>;
		text-transform: <?php echo TDL_Opt::getOption('page_header_font')['text-transform'] ?>;
	}


	<?php 
		if (!empty(TDL_Opt::getOption('page_header_font')['letter-spacing'] > 0)):
	 ?>

		.page-header .title-section .title-section-wrapper .title-wrapper .page-title-wrapper .page-title {
	    	margin-right: -<?php echo TDL_Opt::getOption('page_header_font')['letter-spacing'] ?>;
		}

	<?php
		endif;
	?>

	/* Cart Page Title Font */

	body.woocommerce-cart .cart-cells .cell.cart-intro .title-wrapper .page-title-wrapper h1.page-title {
		font-size: <?php echo TDL_Opt::getOption('cart_page_title_font')['font-size'] ?>;
		letter-spacing: <?php echo TDL_Opt::getOption('cart_page_title_font')['letter-spacing'] ?>;
		line-height: <?php echo TDL_Opt::getOption('cart_page_title_font')['line-height'] ?>;
		text-transform: <?php echo TDL_Opt::getOption('cart_page_title_font')['text-transform'] ?>;		
	}

	@media screen and (max-width: 80em) {
		body.woocommerce-cart .cart-cells .cell.cart-intro .title-wrapper .page-title-wrapper h1.page-title {
			font-size: <?php echo intval(TDL_Opt::getOption('cart_page_title_font')['font-size']) * 0.8 ?>px;		
		}		
	}


	@media screen and (max-width: 47.9375em) {
		body.woocommerce-cart .cart-cells .cell.cart-intro .title-wrapper .page-title-wrapper h1.page-title {
			font-size: <?php echo intval(TDL_Opt::getOption('cart_page_title_font')['font-size']) * 0.6 ?>px;		
		}		
	}

	/* My Account Title Font */

	body.woocommerce-account .account-nav-top .title-wrapper .page-title-wrapper h1,
	body.woocommerce-order-received .account-cells .account-intro .title-wrapper .page-title-wrapper h1 {
		font-size: <?php echo TDL_Opt::getOption('my_account_title_font')['font-size'] ?>;
		letter-spacing: <?php echo TDL_Opt::getOption('my_account_title_font')['letter-spacing'] ?>;
		line-height: <?php echo TDL_Opt::getOption('my_account_title_font')['line-height'] ?>;
		text-transform: <?php echo TDL_Opt::getOption('my_account_title_font')['text-transform'] ?>;		
	}



	@media screen and (max-width: 80em) {
		body.woocommerce-account .account-nav-top .title-wrapper .page-title-wrapper h1,
		body.woocommerce-order-received .account-cells .account-intro .title-wrapper .page-title-wrapper h1 {
			font-size: <?php echo intval(TDL_Opt::getOption('my_account_title_font')['font-size']) * 0.8 ?>px;		
		}		
	}


	@media screen and (max-width: 47.9375em) {
		body.woocommerce-account .account-nav-top .title-wrapper .page-title-wrapper h1,
		body.woocommerce-order-received .account-cells .account-intro .title-wrapper .page-title-wrapper h1 {
			font-size: <?php echo intval(TDL_Opt::getOption('my_account_title_font')['font-size']) * 0.6 ?>px;		
		}		
	}


	<?php 
		if (!empty(TDL_Opt::getOption('page_header_font')['font-size'])):

		$pageheading_base_size = intval(TDL_Opt::getOption('page_header_font')['font-size']);

		$pageheading_small_size = $pageheading_base_size * 0.8;
		$pageheading_large_size = $pageheading_base_size * 1.12;
		$pageheading_xlarge_size = $pageheading_base_size * 1.20;
	?>	

	.page-header .title-section .title-section-wrapper .title-wrapper .page-title-wrapper .page-title,
	body.woocommerce-account .login-cells .login-content .login-content-inner #bb-login-wrap .title-wrapper .page-title-wrapper h1,
	body.woocommerce-account .login-cells .login-content .login-content-inner #bb-register-wrap .title-wrapper .page-title-wrapper h1 {
		font-size: <?php echo esc_attr($pageheading_base_size) * 0.6; ?>px;
	}	
	.page-header.title-size-small .title-section .title-section-wrapper .title-wrapper .page-title-wrapper .page-title,
	body.woocommerce-account .login-cells .login-content .login-content-inner #bb-login-wrap .title-wrapper .page-title-wrapper h1,
	body.woocommerce-account .login-cells .login-content .login-content-inner #bb-register-wrap .title-wrapper .page-title-wrapper h1 {
		font-size: <?php echo esc_attr($pageheading_small_size) * 0.6; ?>px;
	}
	.page-header.title-size-large .title-section .title-section-wrapper .title-wrapper .page-title-wrapper .page-title,
	body.woocommerce-account .login-cells .login-content .login-content-inner #bb-login-wrap .title-wrapper .page-title-wrapper h1,
	body.woocommerce-account .login-cells .login-content .login-content-inner #bb-register-wrap .title-wrapper .page-title-wrapper h1 {
		font-size: <?php echo esc_attr($pageheading_large_size) * 0.6; ?>px;
	}
	.page-header.title-size-xlarge .title-section .title-section-wrapper .title-wrapper .page-title-wrapper .page-title,
	body.woocommerce-account .login-cells .login-content .login-content-inner #bb-login-wrap .title-wrapper .page-title-wrapper h1,
	body.woocommerce-account .login-cells .login-content .login-content-inner #bb-register-wrap .title-wrapper .page-title-wrapper h1 {
		font-size: <?php echo esc_attr($pageheading_xlarge_size) * 0.6; ?>px;
	}	

	@media only screen and (min-width: 768px) {
		.page-header .title-section .title-section-wrapper .title-wrapper .page-title-wrapper .page-title,
		body.woocommerce-account .login-cells .login-content .login-content-inner #bb-login-wrap .title-wrapper .page-title-wrapper h1,
		body.woocommerce-account .login-cells .login-content .login-content-inner #bb-register-wrap .title-wrapper .page-title-wrapper h1 {
			font-size: <?php echo esc_attr($pageheading_base_size) * 0.8; ?>px;
		}	
		.page-header.title-size-small .title-section .title-section-wrapper .title-wrapper .page-title-wrapper .page-title,
		body.woocommerce-account .login-cells .login-content .login-content-inner #bb-login-wrap .title-wrapper .page-title-wrapper h1,
		body.woocommerce-account .login-cells .login-content .login-content-inner #bb-register-wrap .title-wrapper .page-title-wrapper h1 {
			font-size: <?php echo esc_attr($pageheading_small_size) * 0.8; ?>px;
		}
		.page-header.title-size-large .title-section .title-section-wrapper .title-wrapper .page-title-wrapper .page-title,
		body.woocommerce-account .login-cells .login-content .login-content-inner #bb-login-wrap .title-wrapper .page-title-wrapper h1,
		body.woocommerce-account .login-cells .login-content .login-content-inner #bb-register-wrap .title-wrapper .page-title-wrapper h1 {
			font-size: <?php echo esc_attr($pageheading_large_size) * 0.8; ?>px;
		}
		.page-header.title-size-xlarge .title-section .title-section-wrapper .title-wrapper .page-title-wrapper .page-title,
		body.woocommerce-account .login-cells .login-content .login-content-inner #bb-login-wrap .title-wrapper .page-title-wrapper h1,
		body.woocommerce-account .login-cells .login-content .login-content-inner #bb-register-wrap .title-wrapper .page-title-wrapper h1 {
			font-size: <?php echo esc_attr($pageheading_xlarge_size) * 0.8; ?>px;
		}			
	}	

	@media only screen and (min-width: 1024px) {
		.page-header .title-section .title-section-wrapper .title-wrapper .page-title-wrapper .page-title,
		body.woocommerce-account .login-cells .login-content .login-content-inner #bb-login-wrap .title-wrapper .page-title-wrapper h1,
		body.woocommerce-account .login-cells .login-content .login-content-inner #bb-register-wrap .title-wrapper .page-title-wrapper h1 {
			font-size: <?php echo esc_attr($pageheading_base_size); ?>px;
		}	
		.page-header.title-size-small .title-section .title-section-wrapper .title-wrapper .page-title-wrapper .page-title,
		body.woocommerce-account .login-cells .login-content .login-content-inner #bb-login-wrap .title-wrapper .page-title-wrapper h1,
		body.woocommerce-account .login-cells .login-content .login-content-inner #bb-register-wrap .title-wrapper .page-title-wrapper h1 {
			font-size: <?php echo esc_attr($pageheading_small_size); ?>px;
		}
		.page-header.title-size-large .title-section .title-section-wrapper .title-wrapper .page-title-wrapper .page-title,
		body.woocommerce-account .login-cells .login-content .login-content-inner #bb-login-wrap .title-wrapper .page-title-wrapper h1,
		body.woocommerce-account .login-cells .login-content .login-content-inner #bb-register-wrap .title-wrapper .page-title-wrapper h1 {
			font-size: <?php echo esc_attr($pageheading_large_size); ?>px;
		}
		.page-header.title-size-xlarge .title-section .title-section-wrapper .title-wrapper .page-title-wrapper .page-title,
		body.woocommerce-account .login-cells .login-content .login-content-inner #bb-login-wrap .title-wrapper .page-title-wrapper h1,
		body.woocommerce-account .login-cells .login-content .login-content-inner #bb-register-wrap .title-wrapper .page-title-wrapper h1 {
			font-size: <?php echo esc_attr($pageheading_xlarge_size); ?>px;
		}
	}



	<?php
		endif;
	?>	

	/* Navigation Fonts */

	.navigation-foundation ul li a span,
	.navigation-foundation .menu-trigger .menu-title,
	header.site-header .header-wrapper .header-sections .tools .header-cart .header-cart-title,
	header.site-header .header-wrapper .header-sections .tools .header-expanded-view .header-account > a {
		font-family: 
		<?php echo "'" . TDL_Opt::getOption('page_header_nav_font')['font-family'] . "'," ?>
		sans-serif;
		font-size: <?php echo TDL_Opt::getOption('page_header_nav_font')['font-size']; ?>;
		font-weight: <?php echo TDL_Opt::getOption('page_header_nav_font')['font-weight'] ?>;
		letter-spacing: <?php echo TDL_Opt::getOption('page_header_nav_font')['letter-spacing'] ?>;
		text-transform: <?php echo TDL_Opt::getOption('page_header_nav_font')['text-transform'] ?>;
	}

	header.site-header .header-wrapper .header-sections .tools .header-cart .header-cart-count .header-cart-count-number {
		font-family: 
		<?php echo "'" . TDL_Opt::getOption('page_header_nav_font')['font-family'] . "'," ?>
		sans-serif;	
	}


	.navigation-foundation .menu .is-mega-menu .dropdown-submenu .mega-menu-content .menu-item-mega a.dropdown-toggle {
		font-family: 
		<?php echo "'" . TDL_Opt::getOption('page_header_nav_font')['font-family'] . "'," ?>
		sans-serif;
		font-size: <?php echo TDL_Opt::getOption('page_header_nav_font')['font-size']; ?>;
		font-weight: <?php echo TDL_Opt::getOption('page_header_nav_font')['font-weight'] ?>;
		letter-spacing: <?php echo TDL_Opt::getOption('page_header_nav_font')['letter-spacing'] ?>;
		text-transform: <?php echo TDL_Opt::getOption('page_header_nav_font')['text-transform'] ?>;
	}

	.navigation-foundation .dropdown .is-dropdown-submenu a span {
		font-family: 
		<?php echo "'" . TDL_Opt::getOption('page_header_nav_submenu_font')['font-family'] . "'," ?>
		sans-serif;
		font-size: <?php echo TDL_Opt::getOption('page_header_nav_submenu_font')['font-size']; ?>;
		font-weight: <?php echo TDL_Opt::getOption('page_header_nav_submenu_font')['font-weight'] ?>;
		letter-spacing: <?php echo TDL_Opt::getOption('page_header_nav_submenu_font')['letter-spacing'] ?>;
		text-transform: <?php echo TDL_Opt::getOption('page_header_nav_submenu_font')['text-transform'] ?>;
	}

	.header-mobiles-primary-menu ul .is-drilldown-submenu li a,
	.header-mobiles-account-menu ul .is-drilldown-submenu li a {
		font-family: 
		<?php echo "'" . TDL_Opt::getOption('page_header_nav_submenu_font')['font-family'] . "'," ?>
		sans-serif;
		font-weight: <?php echo TDL_Opt::getOption('page_header_nav_submenu_font')['font-weight'] ?>;
		letter-spacing: <?php echo TDL_Opt::getOption('page_header_nav_submenu_font')['letter-spacing'] ?>;
		text-transform: <?php echo TDL_Opt::getOption('page_header_nav_submenu_font')['text-transform'] ?>;		
	}

	.header-mobiles-primary-menu ul > li > a {
		font-family: 
		<?php echo "'" . TDL_Opt::getOption('page_header_nav_font_mob')['font-family'] . "'," ?>
		sans-serif;
		font-size: <?php echo TDL_Opt::getOption('page_header_nav_font_mob')['font-size']; ?>;
		font-weight: <?php echo TDL_Opt::getOption('page_header_nav_font_mob')['font-weight'] ?>;
		letter-spacing: <?php echo TDL_Opt::getOption('page_header_nav_font_mob')['letter-spacing'] ?>;
		text-transform: <?php echo TDL_Opt::getOption('page_header_nav_font_mob')['text-transform'] ?>;
	}

	/* Product Title Font */

	ul.products li.product .product-inner .product-details .product-title a,
	ul.products li.product-category .category_wrapper .category_details .category-title,
	.widget.woocommerce.widget_products li .product-title,
	.offcanvas_minicart .widget_shopping_cart .widget_shopping_cart_content .shopping-cart-widget-body .product_list_widget .woocommerce-mini-cart-item .mini-cart-content .mini-cart-title a,
	body.woocommerce-cart .cart-cells .cart-items .cart_item .product-content .product-content-name .product-name a,
	body.woocommerce-checkout #order_review table tbody .checkout-product-wrap .checkout-product-name,
	body.woocommerce-cart .cart-cells .cell.cart-empty .no-content h2.cart-empty-text {
		font-family: 
		<?php echo "'" . TDL_Opt::getOption('product_title_font')['font-family'] . "'," ?>
		sans-serif;	
		font-weight: <?php echo TDL_Opt::getOption('product_title_font')['font-weight'] ?>;
		letter-spacing: <?php echo TDL_Opt::getOption('product_title_font')['letter-spacing'] ?>;
		text-transform: <?php echo TDL_Opt::getOption('product_title_font')['text-transform'] ?>;
	}

	ul.products li.product .product-inner .product-details .price {
		font-family: 
		<?php echo "'" . TDL_Opt::getOption('product_title_font')['font-family'] . "'," ?>
		sans-serif;	
	}

	/* Single Product Title Font */

	.single-product .product_layout .product-info-cell .product_summary_top .page-title-wrapper h1,
	body:not(.single) .arthref .icon-container .share-title h1,
	.product_layout.product_layout_style_3 .product-title-section-wrapper .product-title-section-wrapper-inner .title-wrapper h1.product_title,
	#barberry_woocommerce_quickview .nano-content .product-info-wrapper .product_summary_top .title-wrapper .page-title-wrapper h1 {
		font-family: 
		<?php echo "'" . TDL_Opt::getOption('single_product_title_font')['font-family'] . "'," ?>
		sans-serif;	
		font-weight: <?php echo TDL_Opt::getOption('single_product_title_font')['font-weight'] ?>;
		letter-spacing: <?php echo TDL_Opt::getOption('single_product_title_font')['letter-spacing'] ?>;
		text-transform: <?php echo TDL_Opt::getOption('single_product_title_font')['text-transform'] ?>;
		line-height: <?php echo TDL_Opt::getOption('single_product_title_font')['line-height'] ?>;
	}

	<?php 
		if (!empty(TDL_Opt::getOption('single_product_title_font')['font-size'])):
		$product_heading_base_size = intval(TDL_Opt::getOption('single_product_title_font')['font-size']);
	?>	

	.single-product .product_layout .product-info-cell .product_summary_top .page-title-wrapper h1,
	.arthref .icon-container .share-title h1,
	.product_layout.product_layout_style_3 .product-title-section-wrapper .product-title-section-wrapper-inner .title-wrapper h1.product_title,
	#barberry_woocommerce_quickview .nano-content .product-info-wrapper .product_summary_top .title-wrapper .page-title-wrapper h1 {
		font-size: <?php echo esc_attr($product_heading_base_size); ?>px;
	}

	@media only screen and (max-width: 1280px) {
		.single-product .product_layout .product-info-cell .product_summary_top .page-title-wrapper h1,
		.arthref .icon-container .share-title h1,
		.product_layout.product_layout_style_3 .product-title-section-wrapper .product-title-section-wrapper-inner .title-wrapper h1.product_title,
		#barberry_woocommerce_quickview .nano-content .product-info-wrapper .product_summary_top .title-wrapper .page-title-wrapper h1 {
			font-size: <?php echo esc_attr($product_heading_base_size) * 0.9; ?>px;
		}	
	}	

	@media only screen and (max-width: 1024px) {
		.single-product .product_layout .product-info-cell .product_summary_top .page-title-wrapper h1,
		.arthref .icon-container .share-title h1,
		.product_layout.product_layout_style_3 .product-title-section-wrapper .product-title-section-wrapper-inner .title-wrapper h1.product_title,
		#barberry_woocommerce_quickview .nano-content .product-info-wrapper .product_summary_top .title-wrapper .page-title-wrapper h1 {
			font-size: <?php echo esc_attr($product_heading_base_size) * 0.8; ?>px;
		}	
	}

	@media only screen and (max-width: 768px) {
		.single-product .product_layout .product-info-cell .product_summary_top .page-title-wrapper h1,
		.arthref .icon-container .share-title h1,
		.product_layout.product_layout_style_3 .product-title-section-wrapper .product-title-section-wrapper-inner .title-wrapper h1.product_title,
		#barberry_woocommerce_quickview .nano-content .product-info-wrapper .product_summary_top .title-wrapper .page-title-wrapper h1 {
			font-size: <?php echo esc_attr($product_heading_base_size) * 0.6; ?>px;
		}				
	}	





	<?php
		endif;
	?>	

	/* Global */


</style>
