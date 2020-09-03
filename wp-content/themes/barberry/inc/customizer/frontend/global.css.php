<style>

	/* Page Loader styles */

	<?php if ( TDL_Opt::getOption('page_loader') ) : ?>
		#bb-container {
			overflow-x: hidden;
			opacity: .2;
			-moz-transition: opacity 0.7s;
			-o-transition: opacity 0.7s;
			-webkit-transition: opacity 0.7s;
			transition: opacity 0.7s;
		}
		#bb-container.fade_in {
			opacity: 1;
		}
		#bb-container.fade_out {
			opacity: .2;
		}
	<?php endif; ?>


	/* Body Background */

	body,
	.offcanvas_main_content,
	.content-area,
	.blog-content-area,
	.product-content-area,
	.post-content-area,
	body.single .page-header,
	/*body.blog .page-header,*/
	.quantity input.custom-qty,
	[type='search'],
	body:not(.search-results) .blog-listing .blog-articles article:nth-child(4n+1).has-post-thumbnail .entry-content-wrap,
	.widget_tag_cloud .tagcloud .tag-cloud-link {
		background-color: <?php echo esc_html(TDL_Opt::getOption('bg_color')) ?>;		
	}

	/* Base Color Scheme */

	label,
	header.site-header .header-wrapper .header-sections .tools .header-cart .header-cart-title,
	header.site-header .header-wrapper .header-sections .tools .header-expanded-view .header-account > ul.my-account-icon > li > a:before,
	header.site-header .header-wrapper .header-sections .tools .header-expanded-view .header-wishlist sup,
	header.site-header .header-wrapper .header-sections .tools .header-expanded-view .header-compare sup,
	.search-form,
	.woocommerce-product-search,
	.searchform,
	.offcanvas_search .woocommerce-product-search input.search-field, .offcanvas_search .widget_search input.search-field,
	.offcanvas_search .woocommerce-product-search .search-clear, .offcanvas_search .widget_search .search-clear,
	.offcanvas_search .search-suggestions-wrapp .autocomplete-no-suggestion,
	header.site-header .header-wrapper .header-sections .tools .header-expanded-view .header-account .my-account-form .is-dropdown-submenu .login-title,
	header.site-header .header-wrapper .header-sections .tools .header-expanded-view .header-account .my-account-form .is-dropdown-submenu .login-title .create-account-link,
	header.site-header .header-wrapper .header-sections .tools .header-expanded-view .header-account .my-account-form .is-dropdown-submenu .login-form-footer .lost_password a,
	.navigation-foundation ul li a span,
	.dropdown.menu > li.is-dropdown-submenu-parent > a::after,
	.navigation-foundation ul.is-dropdown-submenu li.menu-item-has-children > a:after,
	.navigation-foundation .menu .is-mega-menu .dropdown-submenu .mega-menu-content .menu-item-mega a.dropdown-toggle,
	.menu-trigger .menu-title span,
	.header-mobiles-primary-menu ul > li > a,
	.header-mobiles-primary-menu ul > li > a, .header-mobiles-account-menu ul > li > a,
	.header-mobiles-account-menu .is-drilldown-submenu .is-active a,
	.offcanvas-contact-section,
	.offcanvas-contact-section a,
	.offcanvas_minicart .widget_shopping_cart .widget_shopping_cart_content .shopping-cart-widget-body .product_list_widget .woocommerce-mini-cart-item .remove,
	.offcanvas_minicart .widget_shopping_cart .widget_shopping_cart_content .shopping-cart-widget-body .product_list_widget .woocommerce-mini-cart-item .mini-cart-content .mini-cart-title a,
	.woocommerce .amount,
	.offcanvas_minicart .widget_shopping_cart .widget_shopping_cart_content .shopping-cart-widget-footer .total strong,
	.offcanvas_minicart .mini-cart-no-products h4,
	.breadcrumbs-wrapper .breadcrumbs a, .breadcrumbs-wrapper .breadcrumbs span,
	.page-header .title-section .title-section-wrapper .title-wrapper .page-title-wrapper .page-title,
	.page-header .title-section .title-section-wrapper .shop-categories-wrapper .shop-categories ul li a .cat-item-title sup,
	.page-header .title-section .title-section-wrapper .shop-categories-wrapper .blog-categories ul li a .cat-item-title sup,
	.page-header .title-section .title-section-wrapper .blog-categories-wrapper .shop-categories ul li a .cat-item-title sup,
	.page-header .title-section .title-section-wrapper .blog-categories-wrapper .blog-categories ul li a .cat-item-title sup,
	[type='text'], [type='password'], [type='date'], [type='datetime'], [type='datetime-local'], [type='month'], [type='week'], [type='email'], [type='number'], [type='search'], [type='tel'], [type='time'], [type='url'], [type='color'], textarea,
	.wpcf7-select,
	ul.products li.product .product-inner .product-details .product-title a,
	ul.products li.product .product-inner .product-details .product-title a:hover,
	ul.products li.product-category .category_wrapper .category_details .category-title div span,
	.widget.woocommerce.widget_products li > a,
	.widget.woocommerce.widget_recent_reviews li > a,
	.widget.woocommerce.widget_recently_viewed_products li > a,
	ul.products li.product-category .category_wrapper .category_details .more-products,
	body.woocommerce-shop header.woocommerce-archive-header .woocommerce-archive-header-inside .product-found,
	body.woocommerce-shop header.woocommerce-archive-header .woocommerce-archive-header-inside .woocommerce-archive-header-tools .filter_switch,
	.select2-container .select2-selection--single .select2-selection__rendered,
	.page-header .title-section .title-section-wrapper .shop-categories-wrapper .shop-categories .barberry-show-categories a:before,
	.page-header .title-section .title-section-wrapper .shop-categories-wrapper .blog-categories .barberry-show-categories a:before,
	.page-header .title-section .title-section-wrapper .blog-categories-wrapper .shop-categories .barberry-show-categories a:before,
	.page-header .title-section .title-section-wrapper .blog-categories-wrapper .blog-categories .barberry-show-categories a:before,
	ul.products li.product-category .category_wrapper .category_details .category-title,
	.widget.woocommerce.widget_product_categories .product-categories li > a,
	.widget.woocommerce.widget_product_categories ul li a:hover,
	.widget.woocommerce.widget_product_categories .product-categories li span.count,
	.widget.woocommerce.widget_product_categories_with_icon .product-categories-with-icon > li > a,
	.widget.woocommerce.widget_product_categories_with_icon .product-categories-with-icon > li > ul.children li a,
	.widget.woocommerce.widget_product_categories_with_icon .product-categories-with-icon > li .count,
	.widget.woocommerce.widget_product_categories_with_icon .product-categories-with-icon > li > ul.children li span.count,
	.widget.woocommerce.widget_product_categories_with_icon .product-categories-with-icon > .cat-parent .dropdown_icon:before,
	.widget .widget-title,
	.widget.woocommerce.widget_price_filter .price_slider_amount .price_label,
	.widget.woocommerce.widget_layered_nav ul li a,
	.widget.woocommerce.woocommerce-widget-layered-nav ul li a,
	.widget.woocommerce.barberry-price-filter-list ul li a
	.widget.woocommerce.widget_layered_nav ul li a:hover,
	.widget.woocommerce.woocommerce-widget-layered-nav ul li a:hover,
	.widget.woocommerce.barberry-price-filter-list ul li a:hover,		
	.widget.woocommerce.widget_layered_nav ul li a:hover > span,
	.widget.woocommerce.woocommerce-widget-layered-nav ul li a:hover > span,
	.widget.woocommerce.barberry-price-filter-list ul li a:hover > span,
	.widget.woocommerce.widget_layered_nav ul li span.count,
	.widget.woocommerce.woocommerce-widget-layered-nav ul li span.count,
	.widget.woocommerce.barberry-price-filter-list ul li span.count,
	body.woocommerce-shop .barberry-active-filters .barberry-filters-wrapper .barberry-clear-filters-wrapp a,
	body.woocommerce-shop .barberry-active-filters .barberry-filters-wrapper .barberry-clear-filters-wrapp a:before,
	body.woocommerce-shop .barberry-active-filters .barberry-filters-wrapper .widget_layered_nav_filters ul li a,
	body.woocommerce-shop .barberry-active-filters .barberry-filters-wrapper .widget_layered_nav_filters ul li a:before,
	.widget.woocommerce.widget_layered_nav ul li.chosen a:after,
	.widget.woocommerce.woocommerce-widget-layered-nav ul li.chosen a:after,
	.widget.woocommerce.barberry-price-filter-list ul li.chosen a:after,
	.widget.woocommerce.widget_layered_nav ul li.chosen a:hover:after,
	.widget.woocommerce.woocommerce-widget-layered-nav ul li.chosen a:hover:after,
	.widget.woocommerce.barberry-price-filter-list ul li.chosen a:hover:after,	
	.widget.woocommerce.widget_layered_nav ul li a:hover:before,
	.widget.woocommerce.woocommerce-widget-layered-nav ul li a:hover:before,
	.widget.woocommerce.barberry-price-filter-list ul li a:hover:before,	
	.widget.woocommerce.widget_product_tag_cloud .tagcloud .tag-cloud-link,
	.select2-results__option,
	.select2-container--default .select2-results__option--highlighted[aria-selected],
	.select2-container--default .select2-results__option--highlighted[data-selected],
	.shop-loading.show .barberry-loader:after,
	ul.products li.product .attr-swatches .swatch-label.selected,
	.products_ajax_button .loadmore span, .posts_ajax_button .loadmore span,
	.single-product .product_layout .product-info-cell .product_summary_top .page-title-wrapper h1,
	.arthref .icon-container .share-title h1,
	.product_layout.product_layout_style_3 .product-title-section-wrapper .product-title-section-wrapper-inner .title-wrapper h1.product_title,
	#barberry_woocommerce_quickview .nano-content .product-info-wrapper .product_summary_top .title-wrapper .page-title-wrapper h1,
	.box-share-master-container .social-sharing:after,
	.arthref .icon-container .share-title h4,
	.single-product .product_layout .product-info-cell .product_summary_middle .woocommerce-product-rating .woocommerce-review-link,
	.single-product .next-product .next-product__text p, .single-product .next-product .prev-product__text p, .single-product .prev-product .next-product__text p, .single-product .prev-product .prev-product__text p,
	.quantity .plus-btn .icon-bb-plus-24:before,
	.quantity .minus-btn .icon-bb-minus-24:before,
	.product_layout .product-images-inner .product_tool_buttons_placeholder .single_product_video_trigger:after,
	.single-product .product_summary_bottom_inner .yith-wcwl-add-to-wishlist .yith-wcwl-add-button.show .add_to_wishlist,
	#barberry_woocommerce_quickview .product_summary_bottom_inner .yith-wcwl-add-to-wishlist .yith-wcwl-add-button.show .add_to_wishlist,
	.sizeguide-link a,
	.single-product .product_summary_bottom_inner .compare-btn a.compare-link,
	.single-product .product_summary_bottom_inner .yith-wcwl-add-to-wishlist .yith-wcwl-add-button .add_to_wishlist,
	.barberry-add-to-cart-fixed .barberry-wrap-content-inner .barberry-wrap-content .barberry-wrap-content-sections .barberry-fixed-product-info .barberry-title-clone h3,
	.single-product .product_summary_bottom_inner .dokan-report-abuse-button, #barberry_woocommerce_quickview .product_summary_bottom_inner .dokan-report-abuse-button,
	.single-product .product_summary_bottom_inner .yith-wcwl-wishlistaddedbrowse.show a, .single-product .product_summary_bottom_inner .yith-wcwl-wishlistexistsbrowse.show a, #barberry_woocommerce_quickview .product_summary_bottom_inner .yith-wcwl-wishlistaddedbrowse.show a, #barberry_woocommerce_quickview .product_summary_bottom_inner .yith-wcwl-wishlistexistsbrowse.show a,
	#sizeGuideModal .barberry-sizeguide-title,
	#sizeGuideModal .barberry-sizeguide-table tr:first-child td,
	body:not(.is-mobile) .woocommerce-tabs ul.tabs li.active a,
	.single-product .woocommerce-tabs ul.tabs li.active a,
	.single-product .woocommerce-tabs #reviews #comments h2.woocommerce-Reviews-title,
	.single-product .woocommerce-tabs #reviews #comments .meta strong.woocommerce-review__author,
	.dokan-store #dokan-primary #reviews #comments .commentlist .review_comment_container .comment-text > p strong,
	.single-product .woocommerce-tabs #reviews #review_form_wrapper h3,
	.single-product .woocommerce-tabs #reviews #review_form_wrapper .comment-reply-title,
	.single-product .product_meta .product_meta_ins .cell > span,
	.single-product .product_related_wrapper .single_product_summary_upsell section > h2,
	.single-product .product_related_wrapper .single_product_summary_related section > h2,
	body.woocommerce-cart .cart-cells .cell.cart-intro .title-wrapper .page-title-wrapper h1.page-title,
	body.woocommerce-cart .cart-cells .cell.cart-intro .continue-shopping,
	body.woocommerce-cart .cart-totals h2,
	body.woocommerce-cart .cart-totals .shop_table tbody td,
	body.woocommerce-cart .cart-totals .shop_table tbody .order-total th,
	body.woocommerce-cart .cart-cells .cell.cart-items .cart-empty-section .cart-empty-text,
	body.woocommerce-checkout .checkout-cells-empty .checkout-empty-text,
	body.woocommerce-cart .cart-cells .cell.cart-intro .title-wrapper .term-description p,
	#barberry_woocommerce_quickview .nano-content .product-info-wrapper .product_summary_middle .go_to_product_page,
	#barberry_woocommerce_quickview .nano-content .product-info-wrapper .product_summary_bottom .product_summary_bottom_inner .product_meta .product_meta_ins .cell > span,
	.single-product form.variations_form table tbody tr td.value .reset_variations,
	#barberry_woocommerce_quickview form.variations_form table tbody tr td.value .reset_variations,
	body.woocommerce-cart .cart-cells .cart-items .cart_item .product-content .product-content-name .product-name a,
	body.woocommerce-cart .cart-cells .cart-items .cart_item .product-remove a,
	body.woocommerce-cart .actions .coupon:before,
	body.woocommerce-cart .actions .coupon:after,
	body.woocommerce-cart .actions .coupon.focus:after,
	body.woocommerce-cart .actions .coupon #coupon_code,
	body.woocommerce-checkout #couponModal .coupon:before,
	body.woocommerce-checkout #couponModal .coupon:after,
	body.woocommerce-checkout #couponModal .coupon.focus:after,
	body.woocommerce-checkout #couponModal .coupon #coupon_code,	
	body.woocommerce-checkout #giftModal .coupon:before,
	body.woocommerce-checkout #giftModal .coupon:after,
	body.woocommerce-checkout #giftModal .coupon.focus:after,
	body.woocommerce-checkout #giftModal .coupon #coupon_code,
	body.woocommerce-cart #giftModal .coupon:before,
	body.woocommerce-cart #giftModal .coupon:after,
	body.woocommerce-cart #giftModal .coupon.focus:after,
	body.woocommerce-cart #giftModal .coupon #coupon_code,
	body.woocommerce-cart #giftModal .coupon #giftcard_code,
	body.woocommerce-cart .cart-cells .cell.cart-items .checkout-gift-link a,		
	body.woocommerce-cart .cart-totals .shop_table tbody .cart-subtotal th,
	body.woocommerce-cart .cart-totals .shop_table tbody .cart-discount td .woocommerce-remove-coupon,
	body.woocommerce-cart .cart-totals .shop_table tbody th,
	body.woocommerce-cart .cart-totals .shop_table tbody td,
	body.woocommerce-cart .cart-totals .shop_table tbody .shipping .shipping-th-title,
	body.woocommerce-cart .cart-totals .shop_table tbody .shipping ul#shipping_method li label,
	body.woocommerce-cart .cart-totals .shop_table tbody .shipping .woocommerce-shipping-destination,
	body.woocommerce-cart .cart-totals .shop_table tbody .shipping-calc-wrap .shipping-calculator-button,
	body.woocommerce-cart .cart-totals .shop_table tbody .shipping-calc-wrap .shipping-calculator-button:after,
	body.woocommerce-cart .cart-cells .cell.cart-totals .continue-shopping,
	body.woocommerce-checkout .checkout-billing .backto-cart,
	body.woocommerce-checkout .checkout-billing .woocommerce-billing-fields h3,
	body.woocommerce-checkout .checkout-billing .checkout-links span,
	body.woocommerce-checkout .checkout-billing .checkout-links span a,
	body.woocommerce-checkout #loginModal .login-title,
	body.woocommerce-checkout #couponModal .login-title,
	body.woocommerce-checkout #giftModal .login-title,
	body.woocommerce-cart #giftModal .login-title,
	#head_loginModal .login-title, #loginModal .login-title, #couponModal .login-title, #giftModal .login-title,	
	.login .login-form-footer .lost_password a,
	.register .login-form-footer .lost_password a,
	body.woocommerce-checkout .checkout-order h3,
	.edit, .comment-edit-link,
	.edit:hover, .comment-edit-link:hover,
	body.woocommerce-checkout #order_review table tbody .checkout-product-wrap .checkout-product-name,
	body.woocommerce-checkout #order_review table tfoot th,
	body.woocommerce-checkout #order_review table tfoot .cart-discount td .woocommerce-remove-coupon,
	body.woocommerce-checkout #order_review table tfoot .shipping .shipping-th-title,
	body.woocommerce-checkout #order_review table tfoot .shipping ul#shipping_method li label,
	body.woocommerce-checkout #payment ul.payment_methods li label,
	body.woocommerce-checkout #payment ul.payment_methods li.payment_method_paypal .about_paypal,
	body.woocommerce-account .login-cells .login-content .login-content-inner #bb-login-wrap .title-wrapper .breadcrumbs-wrapper .breadcrumbs a,
	body.woocommerce-account .login-cells .login-content .login-content-inner #bb-register-wrap .title-wrapper .breadcrumbs-wrapper .breadcrumbs a, 
	body.woocommerce-account .login-cells .login-content .login-content-inner #bb-password-wrap .title-wrapper .breadcrumbs-wrapper .breadcrumbs a, 
	body.logged-in.woocommerce-wishlist .login-cells .login-content .login-content-inner #bb-login-wrap .title-wrapper .breadcrumbs-wrapper .breadcrumbs a,
	body.logged-in.woocommerce-wishlist .login-cells .login-content .login-content-inner #bb-register-wrap .title-wrapper .breadcrumbs-wrapper .breadcrumbs a,
	body.logged-in.woocommerce-wishlist .login-cells .login-content .login-content-inner #bb-password-wrap .title-wrapper .breadcrumbs-wrapper .breadcrumbs a,
	body.woocommerce-order-received .login-cells .login-content .login-content-inner #bb-login-wrap .title-wrapper .breadcrumbs-wrapper .breadcrumbs a,
	body.woocommerce-order-received .login-cells .login-content .login-content-inner #bb-register-wrap .title-wrapper .breadcrumbs-wrapper .breadcrumbs a,
	body.woocommerce-order-received .login-cells .login-content .login-content-inner #bb-password-wrap .title-wrapper .breadcrumbs-wrapper .breadcrumbs a,
	body.woocommerce-account .login-cells .login-content .login-content-inner #bb-login-wrap .title-wrapper .page-title-wrapper h1,
	body.woocommerce-account .login-cells .login-content .login-content-inner #bb-register-wrap .title-wrapper .page-title-wrapper h1,
	body.woocommerce-account .login-cells .login-content .login-content-inner #bb-password-wrap .title-wrapper .page-title-wrapper h1,
	body.logged-in.woocommerce-wishlist .login-cells .login-content .login-content-inner #bb-login-wrap .title-wrapper .page-title-wrapper h1,
	body.logged-in.woocommerce-wishlist .login-cells .login-content .login-content-inner #bb-register-wrap .title-wrapper .page-title-wrapper h1,
	body.logged-in.woocommerce-wishlist .login-cells .login-content .login-content-inner #bb-password-wrap .title-wrapper .page-title-wrapper h1,
	body.woocommerce-order-received .login-cells .login-content .login-content-inner #bb-login-wrap .title-wrapper .page-title-wrapper h1,
	body.woocommerce-order-received .login-cells .login-content .login-content-inner #bb-register-wrap .title-wrapper .page-title-wrapper h1,
	body.woocommerce-order-received .login-cells .login-content .login-content-inner #bb-password-wrap .title-wrapper .page-title-wrapper h1,
	.bb-login-form-divider span,
	.error404 .site-content .page-header .page-title-wrapper h1.page-title,
	.error404 .site-content,
	body.woocommerce-order-received .account-cells .account-intro .title-wrapper .page-title-wrapper h1,
	body.woocommerce-order-received .account-cells .account-intro .title-wrapper .page-title-wrapper ul.order_details li,
	.woocommerce-order-details-wrapper section h2,
	.woocommerce-order-details table.woocommerce-table--order-details thead tr th,
	.woocommerce-order-details table.woocommerce-table--order-details tbody tr td a,
	.woocommerce-order-details table.woocommerce-table--order-details tfoot th,
	.woocommerce-order-details table.woocommerce-table--order-details tfoot tr td .shipped_via,
	.woocommerce-order-details table.woocommerce-table--order-details tfoot tr td,
	table.my_account_tracking thead tr th,
	table.my_account_tracking tbody tr td,
	body.woocommerce-account .account-nav-top .title-wrapper .page-title-wrapper h1,
	body.logged-in.woocommerce-wishlist .account-nav-top .title-wrapper .page-title-wrapper h1,
	body.woocommerce-order-received .account-nav-top .title-wrapper .page-title-wrapper h1,
	body.woocommerce-account .account-cells .account-content .woocommerce-MyAccount-content .dashboard-sections .dashboard-intro,
	body.logged-in.woocommerce-wishlist .account-cells .account-content .woocommerce-MyAccount-content .dashboard-sections .dashboard-intro, 
	body.woocommerce-order-received .account-cells .account-content .woocommerce-MyAccount-content .dashboard-sections .dashboard-intro,
	body.woocommerce-account .account-nav-top .woocommerce-MyAccount-navigation ul li a,
	body.logged-in.woocommerce-wishlist .account-nav-top .woocommerce-MyAccount-navigation ul li a,
	body.woocommerce-order-received .account-nav-top .woocommerce-MyAccount-navigation ul li a,
	body.woocommerce-account .account-nav-bottom a,
	body.logged-in.woocommerce-wishlist .account-nav-bottom a,
	body.woocommerce-order-received .account-nav-bottom a,
	body.woocommerce-account table.woocommerce-orders-table thead tr th, body.woocommerce-account table.woocommerce-table--order-downloads thead tr th, body.woocommerce-account table.wishlist_table thead tr th, body.logged-in.woocommerce-wishlist table.woocommerce-orders-table thead tr th, body.logged-in.woocommerce-wishlist table.woocommerce-table--order-downloads thead tr th, body.logged-in.woocommerce-wishlist table.wishlist_table thead tr th, body.woocommerce-order-received table.woocommerce-orders-table thead tr th, body.woocommerce-order-received table.woocommerce-table--order-downloads thead tr th, body.woocommerce-order-received table.wishlist_table thead tr th,
	body.woocommerce-account table.woocommerce-orders-table tbody td,
	body.woocommerce-account table.woocommerce-orders-table tbody tr td a,
	body.woocommerce-account .account-cells .account-content .woocommerce-MyAccount-content h2,
	.woocommerce-MyAccount-content .order-info,
	.woocommerce-MyAccount-content p,
	.order-info mark,
	.woocommerce-MyAccount-content .order-info mark,
	body.woocommerce-account table.woocommerce-table--order-downloads tbody tr td,
	body.woocommerce-account table.woocommerce-table--order-downloads tbody tr td a,
	body.woocommerce-account .account-cells .account-content .woocommerce-MyAccount-content p,
	body.woocommerce-account .account-cells .account-content .woocommerce-MyAccount-content .edit-account p.woocommerce-form-row span em,
	body.woocommerce-account .account-cells .account-content .woocommerce-MyAccount-content .edit-account fieldset legend,
	body.logged-in.woocommerce-wishlist table.wishlist_table tfoot,
	.woocommerce .wishlist-title h2,
	body.woocommerce-wishlist table.wishlist_table tbody tr td.product-name a,
	body.logged-in.woocommerce-wishlist table.wishlist_table tbody tr td.product-remove a.remove:before,
	body.woocommerce-wishlist table.wishlist_table thead tr th span,
	body.woocommerce-wishlist table.wishlist_table tbody tr td.product-remove a.remove:before,
	.blog-listing .blog-articles .post .entry-title a,
	.blog-listing .blog-articles .type-page .entry-title a,
	.blog-content-area article .entry-meta .entry-date span,
	.single_related_posts article .entry-meta .entry-date span,
	.blog-listing .blog-articles .post .entry-content-readmore,
	.blog-listing .blog-articles .type-page .entry-content-readmore,
	.widget_recent_entries li a,
	.widget_recent_entries li:before,
	.widget_categories li a,
	.widget_archive ul li a:hover,
	.widget_tag_cloud .tagcloud .tag-cloud-link,
	.widget_recent_comments .recentcomments .comment-author-link + a,
	.widget_recent_comments .recentcomments,
	.widget_recent_comments .recentcomments .comment-author-link a,
	.widget_recent_comments .recentcomments:before,
	.widget_nav_menu ul li a,
	.widget_nav_menu ul li a:hover,
	.widget_meta ul li a,
	.widget_meta ul li a:hover,
	.widget_archive ul li a,
	body.single .page-header .barberry-entry-meta ul.entry-meta-list li,
	body.single .page-header .barberry-entry-meta ul.entry-meta-list li span,
	body.single .page-header .barberry-entry-meta ul.entry-meta-list li a,
	body.single .post footer.entry-meta .post_tags a,
	.related_post_container .single_related_posts .entry-title,
	.related_post_container .single_related_posts .related-post .related_post_content h2.related_post_title a,
	body.single .single_navigation_container .nav-previous a .nav-previous-title + span, body.single .single_navigation_container .nav-previous a .nav-next-title + span, body.single .single_navigation_container .nav-next a .nav-previous-title + span, body.single .single_navigation_container .nav-next a .nav-next-title + span,
	.comments-area .comments-title,
	.comments-area .comment-list .comment article.comment-body header.comment-meta .comment-author h3.comment-author-title,
	.comments-area .comment-list .comment article.comment-body header.comment-meta .comment-author h3.comment-author-title a,
	.comments-area .comment-list .comment article.comment-body .comment-content .comment-reply a,
	.comments-area .comment-respond .comment-reply-title,
	.comments-area .comment-list .comment article.comment-body + .comment-respond .comment-reply-title,
	.comments-area .comment-list .comment article.comment-body + .comment-respond .comment-reply-title small a,
	.product_layout.product_layout_style_3 .product-title-section-wrapper .product-title-section-right .carousel-status,
	.product_layout.product_layout_style_3 .product-title-section-wrapper .product-title-section-right .carousel-status span,
	body.woocommerce-checkout #order_review.checkout-form-pay table tbody tr td.product-name,
	body.woocommerce-checkout #order_review.checkout-form-pay table thead tr th,
	body.woocommerce-checkout #order_review.checkout-form-pay table tfoot tr td .shipped_via,
	body.woocommerce-checkout #order_review.checkout-form-pay table tfoot tr td,
	.single-product form.variations_form table tbody tr td.value .tawcvs-swatches span.swatch-label,
	#barberry_woocommerce_quickview form.variations_form table tbody tr td.value .tawcvs-swatches span.swatch-label,
	ul.products li.product .attr-swatches .swatch-label,
	header.site-header .header-wrapper .header-sections .tools .header-cart.show-cart-icon:before,
	.offcanvas_search .search-results-wrapp .search-results-inner .autocomplete-suggestion .suggestion-inner-wrapper .suggestion-inner .suggestion-details-wrapper h4.suggestion-title,
	.offcanvas_search .search-results-wrapp .search-results-inner .autocomplete-suggestion .suggestion-title.no-found-msg,
	body.woocommerce-account .account-nav-top .woocommerce-MyAccount-navigation ul li:after,
	body.logged-in.woocommerce-wishlist .account-nav-top .woocommerce-MyAccount-navigation ul li:after,
	body.woocommerce-order-received .account-nav-top .woocommerce-MyAccount-navigation ul li:after,
	body.woocommerce-wishlist .wishlist_table.mobile li .item-wrapper .item-details .product-name h3,
	body.woocommerce-wishlist .wishlist_table.mobile li .item-wrapper .item-details .item-details-table tbody tr td.label,
	body.woocommerce-wishlist .wishlist_table.mobile li .item-wrapper .item-details .additional-info-wrapper tbody tr td.label,
	body.woocommerce-wishlist #yith-wcwl-form .yith_wcwl_wishlist_footer .yith-wcwl-share .yith-wcwl-share-title,
	body.woocommerce-wishlist .wishlist_table.mobile li .item-wrapper .product-thumbnail .product-thumbnail-inner .product-remove a:before,
	body.woocommerce-wishlist #yith-wcwl-form .yith_wcwl_wishlist_footer .yith-wcwl-share .social-icons .yith-wcwl-after-share-section small,
	.barberry-compare-list-bottom .barberry-compare-list .compare_title_section .barberry-compare-label .barberry-block,
	.barberry-compare-list-bottom .barberry-compare-list .compare_button_section .barberry-compare-label .barberry-compare-clear-all,
	.barberry-compare-list-bottom .barberry-compare-list .compare_products_section .barberry-compare-wrap-item .barberry-compare-item-hover .barberry-compare-item-hover-wraper .product-title,
	.barberry-compare-list-bottom .barberry-compare-list .compare_products_section .barberry-compare-wrap-item .barberry-compare-item .barberry-remove-compare:before,
	.barberry-total-condition-wrap .barberry-total-condition-desc,
	.barberry-wrap-table-compare .barberry-table-compare thead th .compare-product-title,
	.barberry-total-condition-wrap .barberry-total-condition-desc .backtoshoplink,
	.shortcode_title,
	.empty-compare-section .woocommerce-compare__empty-message,
	body.woocommerce-cart .cart-cells .cell.cart-items .title-wrapper .page-title-wrapper h1.page-title,
	body.woocommerce-cart .cart-cells .cell.cart-items .title-wrapper .term-description p,
	body.woocommerce-account .account-cells .account-content .woocommerce-MyAccount-content .order-info mark, body.woocommerce-account .account-cells .account-content .woocommerce-MyAccount-content p:not(.woocommerce-customer-details--phone):not(.woocommerce-customer-details--email) mark,
	.woocommerce-order-details table.woocommerce-table--order-details tbody tr td .product-quantity,
	.mailchimp-newsletter label span,
	.wpcf7-radio .wpcf7-list-item,
.wpcf7-checkbox .wpcf7-list-item,
.order-info,
h3, h3 a, .woocommerce h3, .woocommerce-page h3 {
		color: <?php echo TDL_Opt::getOption('base_color_scheme') ?>;
	}


	input::-webkit-input-placeholder,
	textarea::-webkit-input-placeholder { /* Chrome/Opera/Safari */
	  color: <?php echo TDL_Opt::getOption('base_color_scheme') ?>;
	}
	input::-moz-placeholder,
	textarea::-moz-placeholder { /* Firefox 19+ */
	  color: <?php echo TDL_Opt::getOption('base_color_scheme') ?>;
	}
	input:-ms-input-placeholder,
	textarea:-ms-input-placeholder { /* IE 10+ */
	  color: <?php echo TDL_Opt::getOption('base_color_scheme') ?>;
	}
	input:-moz-placeholder,
	textarea:-moz-placeholder { /* Firefox 18- */
	  color: <?php echo TDL_Opt::getOption('base_color_scheme') ?>;
	}
	input::placeholder,
	textarea::placeholder { /* Firefox 18- */
	  color: <?php echo TDL_Opt::getOption('base_color_scheme') ?>;
	}

	body:not(.is-mobile) .woocommerce-tabs ul.tabs li a sup {
	    -webkit-text-fill-color: <?php echo TDL_Opt::getOption('base_color_light') ?>;
	}

	body:not(.is-mobile) .woocommerce-tabs ul.tabs li.active a,
	body:not(.is-mobile) .woocommerce-tabs ul.tabs li a:hover sup,
	body:not(.is-mobile) .woocommerce-tabs ul.tabs li.active a sup {
	    -webkit-text-fill-color: <?php echo TDL_Opt::getOption('base_color_scheme') ?>;
	}	



	.single-product form.variations_form table tbody tr td.value .select2 .select2-selection__placeholder,
	.barberry-attr-select_wrap-clone .select2 .select2-selection__placeholder,
	#barberry_woocommerce_quickview form.variations_form table tbody tr td.value .select2 .select2-selection__placeholder,
	.login .login-form-footer .lost_password a,
	.register .login-form-footer .lost_password a
	 {
		color: <?php echo TDL_Opt::getOption('base_color_scheme') ?> !important;
	}

	@media screen and (max-width: 64em) {
		body.woocommerce-shop header.woocommerce-archive-header .woocommerce-archive-header-inside .woocommerce-archive-header-tools .filter_switch:hover {
		    color: <?php echo TDL_Opt::getOption('base_color_scheme') ?>;
		}
	}


	.page-header .title-section .title-section-wrapper .shop-categories-wrapper .shop-categories ul li a .cat-item-title span,
	.page-header .title-section .title-section-wrapper .shop-categories-wrapper .blog-categories ul li a .cat-item-title span,
	.page-header .title-section .title-section-wrapper .blog-categories-wrapper .shop-categories ul li a .cat-item-title span,
	.page-header .title-section .title-section-wrapper .blog-categories-wrapper .blog-categories ul li a .cat-item-title span,
	.page-header .title-section .title-section-wrapper .shop-categories-wrapper .shop-categories .barberry-show-categories a span,
	.page-header .title-section .title-section-wrapper .shop-categories-wrapper .blog-categories .barberry-show-categories a span,
	.page-header .title-section .title-section-wrapper .blog-categories-wrapper .shop-categories .barberry-show-categories a span,
	.page-header .title-section .title-section-wrapper .blog-categories-wrapper .blog-categories .barberry-show-categories a span,
	.single-product .product_meta .product_meta_ins .cell > span a,
	#barberry_woocommerce_quickview .nano-content .product-info-wrapper .product_summary_bottom .product_summary_bottom_inner .product_meta .product_meta_ins .cell > span a,
	.woocommerce-terms-and-conditions-link,
	body.woocommerce-account .account-cells .account-content .woocommerce-MyAccount-content .dashboard-sections .dashboard-intro a, body.logged-in.woocommerce-wishlist .account-cells .account-content .woocommerce-MyAccount-content .dashboard-sections .dashboard-intro a, body.woocommerce-order-received .account-cells .account-content .woocommerce-MyAccount-content .dashboard-sections .dashboard-intro a,
	.page-header .title-section .title-section-wrapper .blog-categories-wrapper .blog-categories .list_blog_categories li.current-cat a,
	.page-header .title-section .title-section-wrapper .blog-categories-wrapper .blog-categories .list_blog_categories li a,
	body.single .page-header .barberry-entry-meta ul.entry-meta-list li a {
		color: <?php echo TDL_Opt::getOption('base_color_scheme') ?> !important;
		background-image: linear-gradient(to top, <?php echo TDL_Opt::getOption('base_color_scheme') ?> 0px, <?php echo TDL_Opt::getOption('base_color_scheme') ?> 0px), linear-gradient(to top, <?php echo TDL_Opt::getOption('base_color_ultra_light') ?> 0px, <?php echo TDL_Opt::getOption('base_color_ultra_light') ?> 0px)  !important;
	}

	body:not(.woocommerce-cart) #content .entry-content p a:not(.button),
	body.woocommerce-account .login-cells .login-content .login-content-inner #bb-register-wrap .woocommerce-privacy-policy-text a {
		color: <?php echo TDL_Opt::getOption('main_font_color') ?>;
		background-image: linear-gradient(to top, <?php echo TDL_Opt::getOption('main_font_color') ?> 0px, <?php echo TDL_Opt::getOption('main_font_color') ?> 0px), linear-gradient(to top, <?php echo TDL_Opt::getOption('main_font_color_ultra_light') ?> 0px, <?php echo TDL_Opt::getOption('main_font_color_ultra_light') ?> 0px);		
	}

	.page-header.color-scheme-light .title-section .title-section-wrapper .shop-categories-wrapper .shop-categories .barberry-show-categories a span {
	    color: #fff !important;
	    background-image: linear-gradient(to top, #fff 0px, #fff 0px), linear-gradient(to top, rgba(255, 255, 255, 0.1) 0px, rgba(255, 255, 255, 0.1) 0px) !important;
	}	

	body:not(.is-mobile) .woocommerce-tabs ul.tabs li a {
	    background-image: linear-gradient(to right, <?php echo TDL_Opt::getOption('base_color_scheme') ?>, <?php echo TDL_Opt::getOption('base_color_scheme') ?> 50%, <?php echo TDL_Opt::getOption('base_color_light') ?> 50%);
	}

	body.rtl:not(.is-mobile) .woocommerce-tabs ul.tabs li a {
	    background-image: linear-gradient(to left, <?php echo TDL_Opt::getOption('base_color_scheme') ?>, <?php echo TDL_Opt::getOption('base_color_scheme') ?> 50%, <?php echo TDL_Opt::getOption('base_color_light') ?> 50%);
	    background-position: 0%;
	}

	body.rtl:not(.is-mobile) .woocommerce-tabs ul.tabs li a:hover {
	    background-position: 100%;
	}

	[type='text'], [type='password'], [type='date'], [type='datetime'], [type='datetime-local'], [type='month'], [type='week'], [type='email'], [type='number'], [type='search'], [type='tel'], [type='time'], [type='url'], [type='color'], .wpcf7-select, textarea,
	div.wpforms-container .wpforms-form input[type=date], div.wpforms-container .wpforms-form input[type=datetime], div.wpforms-container .wpforms-form input[type=datetime-local], div.wpforms-container .wpforms-form input[type=email], div.wpforms-container .wpforms-form input[type=month], div.wpforms-container .wpforms-form input[type=number], div.wpforms-container .wpforms-form input[type=password], div.wpforms-container .wpforms-form input[type=range], div.wpforms-container .wpforms-form input[type=search], div.wpforms-container .wpforms-form input[type=tel], div.wpforms-container .wpforms-form input[type=text], div.wpforms-container .wpforms-form input[type=time], div.wpforms-container .wpforms-form input[type=url], div.wpforms-container .wpforms-form input[type=week], div.wpforms-container .wpforms-form select, div.wpforms-container .wpforms-form textarea,	
	.offcanvas_search .woocommerce-product-search input.search-field, .offcanvas_search .widget_search input.search-field,
	.search-form, .woocommerce-product-search, .searchform,
	.widget.woocommerce.widget_product_tag_cloud .tagcloud .tag-cloud-link,
	.select2,
	#sizeGuideModal .barberry-sizeguide-table tr,
	.single-product .product_meta .product_meta_ins,
	#barberry_woocommerce_quickview .nano-content .product-info-wrapper .product_summary_middle .go_to_product_page_wrapper,
	body.woocommerce-cart .cart-totals .shop_table tbody .shipping,
	body.woocommerce-checkout #order_review table tfoot .cart-discount,
	.widget_tag_cloud .tagcloud .tag-cloud-link,
	body.single .post footer.entry-meta .post_tags a,
	body.single .single_navigation_container,
	body.single .single_navigation_container .nav-next,
	body.single .single-comments-container,
	.single-product .product-type-grouped .group_table tr,
	#barberry_woocommerce_quickview .product-type-grouped .group_table tr,
	.barberry-wrap-table-compare .barberry-table-compare thead td, .barberry-wrap-table-compare .barberry-table-compare thead th, .barberry-wrap-table-compare .barberry-table-compare tbody td, .barberry-wrap-table-compare .barberry-table-compare tbody th {
		border-color: <?php echo TDL_Opt::getOption('base_color_ultra_light') ?>;
	}

	.empty-compare-section .barberry-empty-icon:before {
		color: <?php echo TDL_Opt::getOption('base_color_ultra_light') ?>;
	}

	body.woocommerce-checkout #order_review table tfoot .cart-subtotal {
		border-bottom-color: <?php echo TDL_Opt::getOption('base_color_ultra_light') ?>;
	}

	.widget.woocommerce.widget_layered_nav ul li a:before,
	.widget.woocommerce.woocommerce-widget-layered-nav ul li a:before,
	.widget.woocommerce.barberry-price-filter-list ul li a:before,
	ul.products li.product .attr-swatches .swatch-label,
	body.woocommerce-cart .actions .coupon #coupon_code,
	body.woocommerce-checkout #couponModal .coupon #coupon_code,
	body.woocommerce-checkout #giftModal .coupon #giftcard_code,
	body.woocommerce-cart #giftModal .coupon #giftcard_code {
		border-color: <?php echo TDL_Opt::getOption('base_color_light') ?>;
	}

	.progress-page {
	    box-shadow: inset 0 0 0 1px <?php echo TDL_Opt::getOption('base_color_light') ?>;
	}

	
	.widget.woocommerce.widget_product_tag_cloud .tagcloud .tag-cloud-link:before,
	.widget_tag_cloud .tagcloud .tag-cloud-link:before,
	.nano > .nano-pane,
	.bb-login-form-divider:before,
	.order-info mark,
	.woocommerce-MyAccount-content p mark,
	body.single .post footer.entry-meta .post_tags a:before,
	#barberry_woocommerce_quickview .product-type-grouped .group_table tr td.woocommerce-grouped-product-list-item__quantity a.button {
		background-color: <?php echo TDL_Opt::getOption('base_color_ultra_light') ?>;
	}

	body.woocommerce-shop header.woocommerce-archive-header .woocommerce-archive-header-inside .woocommerce-archive-header-tools .filter_switch,
	body.woocommerce-shop header.woocommerce-archive-header .woocommerce-archive-header-inside .woocommerce-archive-header-tools .filter_switch:hover,
	.quantity .plus-btn,
	.quantity .minus-btn,
	.single-post .related_post_container,
	.single-product .product-type-grouped .group_table tr td.woocommerce-grouped-product-list-item__quantity a.button,
	#sizeGuideModal .barberry-sizeguide-table tr:hover,
	.barberry-wrap-table-compare .barberry-table-compare tbody tr:hover:not(.remove-item),
	.barberry-wrap-table-compare .barberry-table-compare tbody tr:not(.remove-item) td.left-cell {
		background-color: <?php echo TDL_Opt::getOption('base_color_ultra_light_plus') ?>;
	}

/*	input::placeholder, textarea::placeholder,*/
	.offcanvas_minicart .widget_shopping_cart .widget_shopping_cart_content .shopping-cart-widget-body .product_list_widget .woocommerce-mini-cart-item .mini-cart-content .mini-cart-title .quantity,
	.offcanvas_minicart .widget_shopping_cart .widget_shopping_cart_content .shopping-cart-widget-body .product_list_widget .woocommerce-mini-cart-item .mini-cart-content .mini-cart-title .variation li,
	body.woocommerce-shop header.woocommerce-archive-header .woocommerce-archive-header-inside .woocommerce-archive-header-tools .woocommerce-ordering .select2-results__option,
	ul.products li.product .attr-swatches .swatch-label,
	.single-product .product_layout .product-info-cell .product_summary_middle .woocommerce-product-rating .woocommerce-review-link:hover,
	ul.variation .item-variation-name, ul.variation .item-variation-value,
	body.woocommerce-checkout #order_review table tbody .checkout-product-wrap .checkout-product-name .product-quantity,
	.woocommerce-order-details table.woocommerce-table--order-details tbody tr td .product-quantity,
	.woocommerce-order-details table.woocommerce-table--order-details tbody tr td ul.wc-item-meta li strong,
	.woocommerce-order-details table.woocommerce-table--order-details tbody tr td ul.wc-item-meta li p,
	.widget_recent_entries li .post-date,
	.widget_archive ul li a,
	body.single .single_navigation_container .nav-previous a .nav-previous-title, body.single .single_navigation_container .nav-previous a .nav-next-title, body.single .single_navigation_container .nav-next a .nav-previous-title, body.single .single_navigation_container .nav-next a .nav-next-title,
	.comments-area .comment-list .comment article.comment-body header.comment-meta .comment-metadata time,
	.comments-area .comment-respond .comment-form .comment-notes.
	 {
		color: <?php echo TDL_Opt::getOption('base_color_dark') ?>;
	}

	.single-product .woocommerce-tabs ul.tabs li a {
		color: <?php echo TDL_Opt::getOption('base_color_light') ?>;
	}

	header.site-header .header-wrapper .header-sections .tools .header-expanded-view svg,
	.page-header .title-section .title-section-wrapper .title-wrapper .page-title-wrapper .back-btn svg,
	.barberry-show-sidebar-btn, .barberry-sticky-sidebar-btn {
	    fill: <?php echo TDL_Opt::getOption('base_color_scheme') ?>;
	    stroke: <?php echo TDL_Opt::getOption('base_color_scheme') ?>;		
	}

	.progress-page svg.progress-circle path {
	    stroke: <?php echo TDL_Opt::getOption('base_color_scheme') ?>;		
	}

	.social-icons li a svg,
	.flickity-button-icon {
		fill: <?php echo TDL_Opt::getOption('base_color_scheme') ?>;
	}

	header.site-header .header-wrapper .header-sections .tools .header-cart .header-cart-count .header-cart-count-background,
	#header-loader .bar,
	.close-icon .close-icon_top,
	.close-button .close-icon_top,
	.close-icon .close-icon_bottom,
	.close-button .close-icon_bottom,
	.menu-trigger .nav_burger span,
	.menu-trigger .nav_burger span:before,
	.offcanvas_aside_content hr,
	.social-icons li a .s-circle_bg,
	.offcanvas_minicart .widget_shopping_cart .widget_shopping_cart_content .shopping-cart-widget-body .product_list_widget .woocommerce-mini-cart-item .remove:hover,
	.search-form:before, .woocommerce-product-search:before, .searchform:before,
	ul.products.product-grid-layout-2 li.product .product-inner .product-details .product-title a div span:after,
	ul.products.product-grid-layout-2 li.product-category .category_wrapper .category_details .category-title div span:after,
	body.woocommerce-shop header.woocommerce-archive-header .woocommerce-archive-header-inside .woocommerce-archive-header-tools .filter_switch:before,
	body.woocommerce-shop header.woocommerce-archive-header .woocommerce-archive-header-inside .woocommerce-archive-header-tools .filter_switch:hover:before,
	body.woocommerce-shop header.woocommerce-archive-header .woocommerce-archive-header-inside .woocommerce-archive-header-tools .filter_switch .f-plus:before,
	body.woocommerce-shop header.woocommerce-archive-header .woocommerce-archive-header-inside .woocommerce-archive-header-tools .filter_switch .f-plus:after,
	.progress-page .scrolltotop .arrow-top-line,
	.widget.woocommerce.widget_price_filter .ui-slider .ui-slider-range,
	.widget.woocommerce.widget_layered_nav ul li a:hover:after,
	.widget.woocommerce.woocommerce-widget-layered-nav ul li a:hover:after,
	.widget.woocommerce.barberry-price-filter-list ul li a:hover:after,
	body.tag-cloud-equal .widget.woocommerce.widget_product_tag_cloud .tagcloud .tag-cloud-link:hover,
	.box-share-master-container a:before,
	.nano > .nano-pane > .nano-slider,
	.quantity .plus-btn:after, .quantity .minus-btn:after,
	.product_layout .product-images-inner .product_tool_buttons_placeholder .single_product_video_trigger:before,
	body.woocommerce-cart .cart-cells .cart-items .cart_item .product-remove a:hover,
	body.woocommerce-cart .cart-totals .shop_table tbody .cart-discount td .woocommerce-remove-coupon:hover,
	body.woocommerce-checkout #order_review table tfoot .cart-discount td .woocommerce-remove-coupon:hover,
	.blog-listing .blog-articles .post .entry-content-readmore:before,
	.blog-listing .blog-articles .type-page .entry-content-readmore:before,
	body.tag-cloud-equal .widget_tag_cloud .tagcloud .tag-cloud-link:hover,
	.page-header .page-title-delimiter,
	body.single .post footer.entry-meta .post_tags a:hover,
	.single-product form.variations_form table tbody tr td.value .tawcvs-swatches span.swatch-label:hover,
	.single-product form.variations_form table tbody tr td.value .tawcvs-swatches span.swatch-label.selected,
	#barberry_woocommerce_quickview form.variations_form table tbody tr td.value .tawcvs-swatches span.swatch-label:hover,
	#barberry_woocommerce_quickview form.variations_form table tbody tr td.value .tawcvs-swatches span.swatch-label.selected,
	ul.products li.product .attr-swatches .swatch-label:hover,
	ul.products li.product .attr-swatches .swatch-label.selected,
	.widget.woocommerce.widget_layered_nav ul li.show-label.chosen,
	.widget.woocommerce.widget_layered_nav ul li.show-label:hover,
	.widget.woocommerce.woocommerce-widget-layered-nav ul li.show-label:hover,
	.widget.woocommerce.barberry-price-filter-list ul li.show-label:hover,
	.barberry-compare-list-bottom .barberry-compare-list .compare_products_section .barberry-compare-wrap-item .barberry-compare-item .barberry-remove-compare:hover {
		background-color: <?php echo TDL_Opt::getOption('base_color_scheme') ?>;
	}

	body.logged-in.woocommerce-wishlist table.wishlist_table tbody tr td.product-remove a.remove:hover,
	.woocommerce #content table.wishlist_table.cart a.remove:hover {
		background-color: <?php echo TDL_Opt::getOption('base_color_scheme') ?> !important;
	}

	body.woocommerce-cart .cart-cells .cell.cart-totals {
	    background-color: <?php echo TDL_Opt::getOption('cart_bgcolor') ?>;
	}

	body.woocommerce-checkout .checkout-wrapper:after {
		background-color: <?php echo TDL_Opt::getOption('checkout_bgcolor') ?>;
	}

	body.woocommerce-account .account-cells .account-intro,
	body.logged-in.woocommerce-wishlist .account-cells .account-intro,
	body.woocommerce-order-received .account-cells .account-intro {
		background-color: <?php echo TDL_Opt::getOption('myaccount_bgcolor') ?>;
	}

	@media screen and (max-width: 64em) {
		body.woocommerce-account .account-cells .account-intro,
		body.logged-in.woocommerce-wishlist .account-cells .account-intro,
		body.woocommerce-order-received .account-cells .account-intro {
			background-color: #fff;
		}		
	}

	@media screen and (max-width: 64em) {
		body.woocommerce-shop header.woocommerce-archive-header .woocommerce-archive-header-inside .woocommerce-archive-header-tools .filter_switch .f-plus:before, body.woocommerce-shop header.woocommerce-archive-header .woocommerce-archive-header-inside .woocommerce-archive-header-tools .filter_switch .f-plus:after {
			background-color: <?php echo TDL_Opt::getOption('base_color_scheme') ?> !important;
		}	
	}

	[type='text']:focus, [type='password']:focus, [type='date']:focus, [type='datetime']:focus, [type='datetime-local']:focus, [type='month']:focus, [type='week']:focus, [type='email']:focus, [type='number']:focus, [type='search']:focus, [type='tel']:focus, [type='time']:focus, [type='url']:focus, [type='color']:focus, textarea:focus, .wpcf7-select:focus,
	div.wpforms-container .wpforms-form input[type=date]:focus, div.wpforms-container .wpforms-form input[type=datetime]:focus, div.wpforms-container .wpforms-form input[type=datetime-local]:focus, div.wpforms-container .wpforms-form input[type=email]:focus, div.wpforms-container .wpforms-form input[type=month]:focus, div.wpforms-container .wpforms-form input[type=number]:focus, div.wpforms-container .wpforms-form input[type=password]:focus, div.wpforms-container .wpforms-form input[type=range]:focus, div.wpforms-container .wpforms-form input[type=search]:focus, div.wpforms-container .wpforms-form input[type=tel]:focus, div.wpforms-container .wpforms-form input[type=text]:focus, div.wpforms-container .wpforms-form input[type=time]:focus, div.wpforms-container .wpforms-form input[type=url]:focus, div.wpforms-container .wpforms-form input[type=week]:focus, div.wpforms-container .wpforms-form select:focus, div.wpforms-container .wpforms-form textarea:focus,

	.header-mobiles-primary-menu ul .is-drilldown-submenu .js-drilldown-back a, .header-mobiles-account-menu ul .is-drilldown-submenu .js-drilldown-back a,
	.offcanvas_minicart .widget_shopping_cart .widget_shopping_cart_content .shopping-cart-widget-body .product_list_widget .woocommerce-mini-cart-item .remove,
	body.woocommerce-shop header.woocommerce-archive-header .woocommerce-archive-header-inside .woocommerce-archive-header-tools .woocommerce-ordering .select2,
	body.woocommerce-shop header.woocommerce-archive-header .woocommerce-archive-header-inside .woocommerce-archive-header-tools .filter_switch,
	.select2-container--open .select2-dropdown--below,
	.select2-container--open .select2-dropdown--above,
	.widget.woocommerce.widget_price_filter .ui-slider .ui-slider-handle,
	body.woocommerce-shop .barberry-active-filters .barberry-filters-wrapper .barberry-clear-filters-wrapp a,
	body.tag-cloud-equal .widget.woocommerce.widget_product_tag_cloud .tagcloud .tag-cloud-link:hover,
	body.tag-cloud-equal .widget_tag_cloud .tagcloud .tag-cloud-link:hover,
	ul.products li.product .attr-swatches .swatch-label.selected,
	.products_ajax_button .loadmore .dot, .posts_ajax_button .loadmore .dot,
	.single-product form.variations_form table tbody tr td.value .select2,
	#barberry_woocommerce_quickview form.variations_form table tbody tr td.value .select2,
	.barberry-attr-select_wrap-clone .select2,
	#sizeGuideModal .barberry-sizeguide-title,
	#sizeGuideModal .barberry-sizeguide-table tr:first-child td,
	body.woocommerce-cart .cart-totals .shop_table tbody .order-total,
	body.woocommerce-cart .cart-cells .cart-items .cart_item .product-remove a,
	body.woocommerce-cart .actions .coupon #coupon_code:focus,
	body.woocommerce-cart .coupon #giftcard_code:focus,
	body.woocommerce-cart .actions,
	body.woocommerce-cart .cart-totals .shop_table tbody .cart-discount td .woocommerce-remove-coupon,
	body.woocommerce-checkout #loginModal .login-title,
	body.woocommerce-checkout #couponModal .login-title,
	body.woocommerce-checkout #couponModal .coupon:before,
	body.woocommerce-checkout #couponModal .coupon #coupon_code:focus,
	body.woocommerce-checkout #giftModal .coupon:before,
	body.woocommerce-checkout #giftModal .coupon #giftcard_code:focus,
	body.woocommerce-cart #giftModal .login-title,
	body.woocommerce-cart #giftModal .coupon:before,
	body.woocommerce-cart #giftModal .coupon #giftcard_code:focus,	
	body.woocommerce-checkout #order_review table tfoot .cart-discount td .woocommerce-remove-coupon,
	body.woocommerce-checkout #order_review table tfoot .order-total,
	.woocommerce-order-details table.woocommerce-table--order-details thead tr,
	body.woocommerce-checkout #order_review.checkout-form-pay table thead tr,
	body.woocommerce-checkout #order_review.checkout-form-pay table tfoot tr:first-child,
	body.woocommerce-checkout #order_review.checkout-form-pay table tfoot tr:last-child,
	body.woocommerce-account table.woocommerce-orders-table thead tr,
	body.woocommerce-account table.woocommerce-table--order-downloads thead tr,
	body.woocommerce-account table.wishlist_table thead tr,
	body.logged-in.woocommerce-wishlist table.woocommerce-orders-table thead tr,
	body.logged-in.woocommerce-wishlist table.wishlist_table thead tr,
	body.logged-in.woocommerce-wishlist table.wishlist_table tbody tr td.product-remove a.remove,
	body.woocommerce-wishlist table.wishlist_table thead tr,
	body.woocommerce-wishlist table.wishlist_table tbody tr td.product-remove a.remove,
	.blog-content-area article .entry-meta .entry-date, .single_related_posts article .entry-meta .entry-date,
	.blog-content-area article.has-post-thumbnail .entry-thumbnail .entry-meta .entry-date,
	.single_related_posts article.has-post-thumbnail .entry-thumbnail .entry-meta .entry-date,
	body.single .post footer.entry-meta .post_tags a:hover,
	table.my_account_tracking thead tr,
	.single-product form.variations_form table tbody tr td.value .tawcvs-swatches span.swatch-label,
	#barberry_woocommerce_quickview form.variations_form table tbody tr td.value .tawcvs-swatches span.swatch-label,
	.single-product form.variations_form table tbody tr td.value .tawcvs-swatches span.swatch-label:hover,
	.single-product form.variations_form table tbody tr td.value .tawcvs-swatches span.swatch-label.selected,
	#barberry_woocommerce_quickview form.variations_form table tbody tr td.value .tawcvs-swatches span.swatch-label:hover,
	#barberry_woocommerce_quickview form.variations_form table tbody tr td.value .tawcvs-swatches span.swatch-label.selected,
	.widget.woocommerce.widget_layered_nav ul li.show-label,
	.widget.woocommerce.woocommerce-widget-layered-nav ul li.show-label, .widget.woocommerce.barberry-price-filter-list ul li.show-label,
	ul.products li.product .attr-swatches .swatch-label,
	ul.products li.product .attr-swatches .swatch-label:hover,
	ul.products li.product .attr-swatches .swatch-label.selected,
	body.woocommerce-wishlist #yith-wcwl-form .yith_wcwl_wishlist_footer .yith-wcwl-share,
	body.woocommerce-wishlist .wishlist_table.mobile li .item-wrapper .product-thumbnail .product-thumbnail-inner .product-remove a,
	.barberry-compare-list-bottom .barberry-compare-list .compare_products_section .barberry-compare-wrap-item .barberry-compare-item .barberry-remove-compare {
		border-color: <?php echo TDL_Opt::getOption('base_color_scheme') ?>;
	}

	.select2.select2-container--open,
	.select2-dropdown .select2-search__field {
		border-color: <?php echo TDL_Opt::getOption('base_color_scheme') ?> !important;
	}

	.progress-page .scrolltotop .arrow-top {
	    border-bottom: 2px solid <?php echo TDL_Opt::getOption('base_color_scheme') ?>;
	    border-left: 2px solid <?php echo TDL_Opt::getOption('base_color_scheme') ?>;
	}

	@media screen and (max-width: 64em) {
		body.woocommerce-shop header.woocommerce-archive-header .woocommerce-archive-header-inside .woocommerce-archive-header-tools .woocommerce-ordering .select2,
		body.woocommerce-shop header.woocommerce-archive-header .woocommerce-archive-header-inside .woocommerce-archive-header-tools .filter_switch,
		body.woocommerce-shop header.woocommerce-archive-header .woocommerce-archive-header-inside .woocommerce-archive-header-tools .woocommerce-ordering .select2-dropdown,
		body.woocommerce-shop header.woocommerce-archive-header .woocommerce-archive-header-inside .woocommerce-archive-header-tools .barberry-show-sidebar-btn,
		body.woocommerce-shop .barberry-sticky-sidebar-btn,
		body.woocommerce-shop .site-shop-filters .site-shop-filters-inside .shop-filters-area-content .cell,
		.products_ajax_button.disabled .loadmore .dot, .posts_ajax_button.disabled .loadmore .dot {
			border-color: <?php echo TDL_Opt::getOption('base_color_ultra_light') ?>;
		}
	}

	.woocommerce-order-details table.woocommerce-table--order-details tfoot tr,
	.woocommerce-order-details table.woocommerce-table--order-details tbody tr,
	body.logged-in.woocommerce-wishlist table.wishlist_table tbody tr,
	body.woocommerce-wishlist .wishlist_table.mobile li .item-wrapper .item-details .item-details-table tbody tr,
	body.woocommerce-wishlist .wishlist_table.mobile li .item-wrapper .item-details .additional-info-wrapper tbody tr,
	body.woocommerce-checkout #order_review.checkout-form-pay table tfoot tr,
	body.woocommerce-checkout #order_review.checkout-form-pay table tfoot tr:first-child,
	body.woocommerce-checkout #order_review.checkout-form-pay table tbody tr,
	table.my_account_tracking tbody tr,
	.offcanvas_search .search-results-wrapp .search-results-inner .autocomplete-suggestion .suggestion-inner-wrapper .suggestion-inner .suggestion-details-wrapper h4.suggestion-title strong,
	body.woocommerce-account table.woocommerce-orders-table tbody tr, body.woocommerce-account table.woocommerce-table--order-downloads tbody tr, body.woocommerce-account table.wishlist_table tbody tr, body.woocommerce-account table.my_account_orders tbody tr, body.woocommerce-account table.shop_table tbody tr, body.logged-in.woocommerce-wishlist table.woocommerce-orders-table tbody tr, body.logged-in.woocommerce-wishlist table.woocommerce-table--order-downloads tbody tr, body.logged-in.woocommerce-wishlist table.wishlist_table tbody tr, body.logged-in.woocommerce-wishlist table.my_account_orders tbody tr, body.logged-in.woocommerce-wishlist table.shop_table tbody tr, body.woocommerce-order-received table.woocommerce-orders-table tbody tr, body.woocommerce-order-received table.woocommerce-table--order-downloads tbody tr, body.woocommerce-order-received table.wishlist_table tbody tr, body.woocommerce-order-received table.my_account_orders tbody tr, body.woocommerce-order-received table.shop_table tbody tr {
		border-bottom-color: <?php echo TDL_Opt::getOption('base_color_ultra_light') ?>;
	}

	body.woocommerce-checkout #order_review #payment ul.payment_methods {
		border-color: <?php echo TDL_Opt::getOption('base_color_light') ?>;
	}



	.search-preloader .preloader:after,
	.offcanvas_minicart .widget_shopping_cart .widget_shopping_cart_content .shopping-cart-widget-body .product_list_widget .woocommerce-mini-cart-item .mini-cart-thumbnail.removing-process:after,
	.single-product .product_summary_bottom_inner .yith-wcwl-add-to-wishlist .yith-wcwl-add-button.show.loading .add_to_wishlist:after, #barberry_woocommerce_quickview .product_summary_bottom_inner .yith-wcwl-add-to-wishlist .yith-wcwl-add-button.show.loading .add_to_wishlist:after,
	body.woocommerce-cart .cart-cells .cell.cart-items .woocommerce-cart-form.processing .blockUI:after,
	body.woocommerce-cart .cart-totals .cart_totals.calculated_shipping.processing .blockUI:after,
	body.woocommerce-cart .cart-totals .cart_totals.processing .blockUI:after,
	body.woocommerce-checkout #order_review table tfoot .cart-subtotal,
	body.woocommerce-checkout #order_review table .blockUI:after,
	.woocommerce-order-details table.woocommerce-table--order-details tfoot tr:first-child,
	.woocommerce-order-details table.woocommerce-table--order-details tfoot tr:last-child,
	body.logged-in.woocommerce-wishlist table.wishlist_table tfoot .yith-wcwl-share,
	.offcanvas_search .search-results-wrapp .barberry-search-loader:after,
	.barberry-compare-list-bottom .barberry-loader:after
	 {
		border-top-color: <?php echo TDL_Opt::getOption('base_color_scheme') ?>;
	}

	body.woocommerce-account table.woocommerce-orders-table thead tr, body.woocommerce-account table.woocommerce-table--order-downloads thead tr, body.woocommerce-account table.wishlist_table thead tr, body.woocommerce-account table.my_account_orders thead tr, body.woocommerce-account table.shop_table thead tr, body.logged-in.woocommerce-wishlist table.woocommerce-orders-table thead tr, body.logged-in.woocommerce-wishlist table.woocommerce-table--order-downloads thead tr, body.logged-in.woocommerce-wishlist table.wishlist_table thead tr, body.logged-in.woocommerce-wishlist table.my_account_orders thead tr, body.logged-in.woocommerce-wishlist table.shop_table thead tr, body.woocommerce-order-received table.woocommerce-orders-table thead tr, body.woocommerce-order-received table.woocommerce-table--order-downloads thead tr, body.woocommerce-order-received table.wishlist_table thead tr, body.woocommerce-order-received table.my_account_orders thead tr, body.woocommerce-order-received table.shop_table thead tr {
	border-bottom-color: <?php echo TDL_Opt::getOption('base_color_scheme') ?>;
}

	/* Accent Color Scheme */

	.woocommerce .amount,
	ul.products li.product .product-inner .product-details .price,
	ul.products li.product .product-inner .product-details .price del span,
	.widget.woocommerce.widget_products li,
	.widget.woocommerce.widget_recent_reviews li,
	.widget.woocommerce.widget_recently_viewed_products li,
	.widget.woocommerce.widget_products li del .amount span,
	.widget.woocommerce.widget_recent_reviews li del .amount span,
	.widget.woocommerce.widget_recently_viewed_products li del .amount span,
	.widget.woocommerce.widget_price_filter .price_slider_amount .price_label span,
	.single-product .product_layout .product-info-cell .product_summary_middle .price,
	#barberry_woocommerce_quickview .nano-content .product-info-wrapper .product_summary_middle .price,
	.single-product .product_layout .product-info-cell .product_summary_middle .price del span.amount,
	.barberry-add-to-cart-fixed .barberry-wrap-content-inner .barberry-wrap-content .barberry-wrap-content-sections .barberry-fixed-product-info .barberry-title-clone .price del span.amount,
	body.logged-in.woocommerce-wishlist table.wishlist_table tbody tr td.product-price del span,
	body.woocommerce-wishlist table.wishlist_table tbody tr td.product-price,
	.offcanvas_search .search-results-wrapp .search-results-inner .autocomplete-suggestion .suggestion-inner-wrapper .suggestion-inner .suggestion-details-wrapper .price {
		color: <?php echo TDL_Opt::getOption('accent_color_scheme') ?>;
	}

	/* Body Font Color */

	p,
	ul > li, 
	ol > li, 
	dl > li,
	table tbody td,
	table tbody td a,
	table tbody td a:hover,
	.topbar .topbar-sections .topbar-left .topbar-contact, .topbar .topbar-sections .topbar-right .topbar-contact,
	.topbar .topbar-sections .topbar-left .topbar-contact a, .topbar .topbar-sections .topbar-right .topbar-contact a,
	.addresses-grid .cell h3,
	.addresses-grid .cell address {
		color: <?php echo TDL_Opt::getOption('main_font_color') ?>;
	}

	.addresses-grid .cell address p {
		color: <?php echo TDL_Opt::getOption('main_font_color') ?> !important;
	}

	<?php if ( TDL_Opt::getOption('predictive_search') ) : ?>

		.offcanvas_search .woocommerce-product-search:after,
		.offcanvas_search .woocommerce-product-search [type=submit] {
			display: none;
		}

	<?php endif; ?>


	<?php if ( TDL_Opt::getOption('nav_diag_animation') ) : ?>

		.navigation-foundation ul.is-dropdown-submenu.js-dropdown-active:before  {
		    -webkit-animation: topCanvasNavOpen 0.5s forwards ease;
		    animation: topCanvasNavOpen 0.5s forwards ease;	
		    -webkit-clip-path: polygon(0 0, 100% 0, 100% 60%, 0 100%);
		    clip-path: polygon(0 0, 100% 0, 100% 60%, 0 100%);			
		}		
			
	<?php endif; ?>	

	/* Hide Back to top button for mobile */

	<?php if ( TDL_Opt::getOption('backtotop_mobile') ) : ?>
		@media screen and (max-width: 768px) {
			.progress-page {
				display:none !important;
			}		
		}			
	<?php endif; ?>

	/* Navigation Mobile Breakpoint */

	@media screen and (max-width: <?php echo intval(TDL_Opt::getOption('navigation_breakpoint')) ?>px) {
		.navigation-foundation ul,
		header.site-header.header-left .header-wrapper .header-sections .barberry-navigation {
		    display: none;
		}

		header.site-header.header-left .header-wrapper .header-sections .mobile-nav {
			display: inline-block;
		}

		header.site-header.header-left .header-wrapper .header-sections .site-branding {
			padding-right: 0;
		}

		header.site-header.header-left .header-wrapper .header-sections .tools {
			width: auto;
			flex: 1 1 0px;			
		}

		.menu-trigger {
			display: flex;
		}		
	}

	/* Blur pop-up styles */

	<?php if ( TDL_Opt::getOption('blur_background') ) : ?>
		.photoswipe-blur .topbar, .photoswipe-blur header.site-header, .photoswipe-blur .offcanvas_container, .photoswipe-blur .barberry-sticky-sidebar-btn, .photoswipe-blur .barberry-add-to-cart-fixed {
		-webkit-filter: blur(25px); -moz-filter: blur(25px);
    -o-filter: blur(25px); -ms-filter: blur(25px); 
    filter: blur(25px);  filter:progid:DXImageTransform.Microsoft.Blur(PixelRadius='1');
    -moz-transition: filter 0.4s ease;
    -o-transition: filter 0.4s ease;
    -webkit-transition: filter 0.4s ease;
    transition: filter 0.4s ease;	
		}
	<?php else: ?>

	body.photoswipe-blur {
		position: relative;
	}

	body.photoswipe-blur:before {
			content: "";
			position: absolute;
			width: 100%;
			height: 100%;
			left: 0;
			right: 0;
			top: 0;
			bottom: 0;
			background-color: rgba(255,255,255,0.8);
			z-index: 8;
			-moz-transition: background-color 0.4s ease;
			-o-transition: background-color 0.4s ease;
			-webkit-transition: background-color 0.4s ease;
			transition: background-color 0.4s ease;			
	}

	<?php endif; ?>


</style>