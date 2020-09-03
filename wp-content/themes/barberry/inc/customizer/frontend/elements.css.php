<style>

	/* Button Font */

	button[type="submit"],
	button.submit,
	button.btn--primary,
	button.button,
	.button[type="submit"],
	.button.submit,
	.button.btn--primary,
	.button.button,
	a[type="submit"],
	a.submit,
	a.btn--primary,
	a.button,
	input[type="submit"],
	input.submit,
	input.btn--primary,
	input.button {
		font-family: 
		<?php echo "'" . TDL_Opt::getOption('button_font')['font-family'] . "'," ?>
		sans-serif;		
        font-weight: <?php echo TDL_Opt::getOption('button_font')['font-weight'] ?>;
        letter-spacing: <?php echo TDL_Opt::getOption('button_font')['letter-spacing'] ?>;  
        text-transform: <?php echo TDL_Opt::getOption('button_font')['text-transform'] ?>;
	    border: 2px solid <?php echo esc_html(TDL_Opt::getOption('bg_button_color')) ?>;
	    background-color: <?php echo esc_html(TDL_Opt::getOption('bg_button_color')) ?>;         
	}


	body:not(.is-mobile) button[type="submit"]:hover, body:not(.is-mobile) button.submit:hover, body:not(.is-mobile) button.btn--primary:hover, body:not(.is-mobile) button.button:hover, body:not(.is-mobile) .button[type="submit"]:hover, body:not(.is-mobile) .button.submit:hover, body:not(.is-mobile) .button.btn--primary:hover, body:not(.is-mobile) .button.button:hover, body:not(.is-mobile) a[type="submit"]:hover, body:not(.is-mobile) a.submit:hover, body:not(.is-mobile) a.btn--primary:hover, body:not(.is-mobile) a.button:hover, body:not(.is-mobile) input[type="submit"]:hover, input[type="submit"]:not(.dokan-btn):hover, body:not(.is-mobile) input.submit:hover, body:not(.is-mobile) input.btn--primary:hover, body:not(.is-mobile) input.button:hover,
	ul.products li.product .product-inner .product-image .footer-section .footer-section-inner .button,
	ul.products li.product .product-inner .product-image .footer-section .footer-section-inner .button:after,
	.offcanvas_minicart .widget_shopping_cart .widget_shopping_cart_content .shopping-cart-widget-footer .buttons a.cart-but,
	.offcanvas_search .search-results-wrapp .search-results-inner .view-all-results .button,
	body.woocommerce-cart .actions button.button,
	body.woocommerce-wishlist table.wishlist_table tbody tr td.product-add-to-cart a,
	body.woocommerce-wishlist .wishlist_table.mobile li .item-wrapper .item-details .additional-info-wrapper .product-add-to-cart a,
	.login .button.btn--border, .register .button.btn--border,
	.offcanvas_minicart .mini-cart-no-products .return-to-shop .button,
	.single-product .product_layout .product-info-cell .product_summary_bottom button.button.disabled,
	body.woocommerce-cart .cart-cells .cart-empty-section .button,
	#barberry_woocommerce_quickview .nano-content .product-info-wrapper .product_summary_bottom button.button.disabled,
	body.woocommerce-cart .actions button.button.button.disabled:hover, body.woocommerce-cart .actions button.button.button[disabled]:hover,
	body.logged-in.woocommerce-wishlist table.wishlist_table tbody tr td.product-add-to-cart a,
	.single-product .woocommerce-variation-add-to-cart.woocommerce-variation-add-to-cart-disabled .barberry-buy-now,
	#barberry_woocommerce_quickview .woocommerce-variation-add-to-cart.woocommerce-variation-add-to-cart-disabled .barberry-buy-now	 {
		color: <?php echo esc_html(TDL_Opt::getOption('bg_button_color')) ?>;
	}

button[type="submit"].btn--border, button[type="submit"].disabled, button.submit.btn--border, button.submit.disabled, button.btn--primary.btn--border, button.btn--primary.disabled, button.button.btn--border, button.button.disabled, .button[type="submit"].btn--border, .button[type="submit"].disabled, .button.submit.btn--border, .button.submit.disabled, .button.btn--primary.btn--border, .button.btn--primary.disabled, .button.button.btn--border, .button.button.disabled, a[type="submit"].btn--border, a[type="submit"].disabled, a.submit.btn--border, a.submit.disabled, a.btn--primary.btn--border, a.btn--primary.disabled, a.button.btn--border, a.button.disabled, input[type="submit"].btn--border, input[type="submit"].disabled, input.submit.btn--border, input.submit.disabled, input.btn--primary.btn--border, input.btn--primary.disabled, input.button.btn--border, input.button.disabled, div.wpforms-container .wpforms-form button[type=submit][type="submit"].btn--border, div.wpforms-container .wpforms-form button[type=submit][type="submit"].disabled, div.wpforms-container .wpforms-form button[type=submit].submit.btn--border, div.wpforms-container .wpforms-form button[type=submit].submit.disabled, div.wpforms-container .wpforms-form button[type=submit].btn--primary.btn--border, div.wpforms-container .wpforms-form button[type=submit].btn--primary.disabled, div.wpforms-container .wpforms-form button[type=submit].button.btn--border, div.wpforms-container .wpforms-form button[type=submit].button.disabled {
	color: <?php echo esc_html(TDL_Opt::getOption('bg_button_color')) ?>;
}
	

	body.is-mobile ul.products li.product .product-inner .product-image .footer-section .footer-section-inner .button:hover:after,
	.single-product .product_layout .product-info-cell .product_summary_bottom .barberry-buy-now {
		color: <?php echo esc_html(TDL_Opt::getOption('bg_button_color')) ?> !important;
	}

	.ajax_add_to_cart.progress-btn .progress,
	ul.products li.product .product-inner .product-image .footer-section .footer-section-inner .button:before,
	ul.products li.product .product-inner .product-image .footer-section .footer-section-inner .button:hover:before,
	ul.products li.product .product-inner .product-image .footer-section .footer-section-inner .barberry_product_quick_view_button:hover,
	ul.products li.product .product-inner .product-image .footer-section .footer-section-inner .barberry_product_wishlist_button:hover,
	ul.products li.product .product-inner .product-image .footer-section .footer-section-inner .barberry_product_compare_button:hover,
	body.woocommerce-account .waitlist-single-product td.product-add-to-cart a:before,
	body.woocommerce-account .waitlist-single-product td.product-add-to-cart a:hover:before,

	body.woocommerce-wishlist table.wishlist_table tbody tr td.product-add-to-cart a:before,
	body.woocommerce-wishlist table.wishlist_table tbody tr td.product-add-to-cart a:hover:before,

	body.woocommerce-account table.woocommerce-orders-table tbody tr td.product-add-to-cart a:before,
	body.woocommerce-account table.woocommerce-table--order-downloads tbody tr td.product-add-to-cart a:before,
	body.woocommerce-account table.wishlist_table tbody tr td.product-add-to-cart a:before, body.logged-in.woocommerce-wishlist table.woocommerce-orders-table tbody tr td.product-add-to-cart a:before, body.logged-in.woocommerce-wishlist table.woocommerce-table--order-downloads tbody tr td.product-add-to-cart a:before, body.logged-in.woocommerce-wishlist table.wishlist_table tbody tr td.product-add-to-cart a:before, body.woocommerce-order-received table.woocommerce-orders-table tbody tr td.product-add-to-cart a:before, body.woocommerce-order-received table.woocommerce-table--order-downloads tbody tr td.product-add-to-cart a:before, body.woocommerce-order-received table.wishlist_table tbody tr td.product-add-to-cart a:before,
	.single_add_to_cart_button.progress-btn .progress	 {
		background: <?php echo esc_html(TDL_Opt::getOption('bg_button_color')) ?>;
	}



	.offcanvas_minicart .widget_shopping_cart .widget_shopping_cart_content .shopping-cart-widget-footer .buttons a.cart-but,
	.offcanvas_search .search-results-wrapp .search-results-inner .view-all-results .button,
	body.woocommerce-cart .actions button.button,
	.login .button.btn--border, .register .button.btn--border,
	.offcanvas_minicart .mini-cart-no-products .return-to-shop .button,
	body.woocommerce-cart .cart-cells .cart-empty-section .button,
	#barberry_woocommerce_quickview .nano-content .product-info-wrapper .product_summary_bottom button.button.disabled,
	.barberry-sidebar-return-shop,
	a.button.btn--border {
		border-color:  <?php echo esc_html(TDL_Opt::getOption('button_border_opacity')) ?>;
	}

button[type="submit"].btn--border, button[type="submit"].disabled, button.submit.btn--border, button.submit.disabled, button.btn--primary.btn--border, button.btn--primary.disabled, button.button.btn--border, button.button.disabled, .button[type="submit"].btn--border, .button[type="submit"].disabled, .button.submit.btn--border, .button.submit.disabled, .button.btn--primary.btn--border, .button.btn--primary.disabled, .button.button.btn--border, .button.button.disabled, a[type="submit"].btn--border, a[type="submit"].disabled, a.submit.btn--border, a.submit.disabled, a.btn--primary.btn--border, a.btn--primary.disabled, a.button.btn--border, a.button.disabled, input[type="submit"].btn--border, input[type="submit"].disabled, input.submit.btn--border, input.submit.disabled, input.btn--primary.btn--border, input.btn--primary.disabled, input.button.btn--border, input.button.disabled, div.wpforms-container .wpforms-form button[type=submit][type="submit"].btn--border, div.wpforms-container .wpforms-form button[type=submit][type="submit"].disabled, div.wpforms-container .wpforms-form button[type=submit].submit.btn--border, div.wpforms-container .wpforms-form button[type=submit].submit.disabled, div.wpforms-container .wpforms-form button[type=submit].btn--primary.btn--border, div.wpforms-container .wpforms-form button[type=submit].btn--primary.disabled, div.wpforms-container .wpforms-form button[type=submit].button.btn--border, div.wpforms-container .wpforms-form button[type=submit].button.disabled {
	border-color:  <?php echo esc_html(TDL_Opt::getOption('button_border_opacity')) ?>;
}


	.single-product .product_layout .product-info-cell .product_summary_bottom button.button.disabled,
	.single-product .woocommerce-variation-add-to-cart.woocommerce-variation-add-to-cart-disabled .barberry-buy-now,
	#barberry_woocommerce_quickview .woocommerce-variation-add-to-cart.woocommerce-variation-add-to-cart-disabled .barberry-buy-now {
		border-color:  <?php echo esc_html(TDL_Opt::getOption('button_color_opacity')) ?>;
	}

	@media screen and (max-width: 64em) {
		ul.products li.product .product-inner .product-image .footer-section .footer-section-inner .button {
			border-color:  <?php echo esc_html(TDL_Opt::getOption('button_color_opacity_light_plus')) ?>;
		}

		.footer-section-inner .barberry_product_quick_view_button .tooltip:after {
			border-color:  <?php echo esc_html(TDL_Opt::getOption('button_color_opacity_light')) ?>;
		}
	}

	.offcanvas_minicart .widget_shopping_cart .widget_shopping_cart_content .shopping-cart-widget-footer .buttons a.cart-but:hover,
	.offcanvas_search .search-results-wrapp .search-results-inner .view-all-results .button:hover,
	body.woocommerce-cart .actions button.button:hover,
	.login .button.btn--border:hover, .register .button.btn--border:hover,
	.offcanvas_minicart .mini-cart-no-products .return-to-shop .button:hover {
	    color: <?php echo esc_html(TDL_Opt::getOption('button_color_opacity')) ?>;
	}	

	<?php	
		if (!empty(TDL_Opt::getOption('button_font')['font-size'])):

		$button_font_size = intval(TDL_Opt::getOption('button_font')['font-size']);

		$space_xxxs = 0.25 * $button_font_size;
		$space_xxs = 0.375 * $button_font_size;
		$space_xs = 0.5 * $button_font_size;
		$space_sm = 0.75 * $button_font_size;
		$space_md = 1.5 * $button_font_size;
		$space_df = 1.9 * $button_font_size;
		$space_lg = 2.6 * $button_font_size;
		$space_xl = 3.35 * $button_font_size;
		$space_xxl = 5.25 * $button_font_size;
		$space_xxxl = 8.5 * $button_font_size;

		$btn_sm = 0.8 * $button_font_size;
		$btn_df = 1 * $button_font_size;
		$btn_lg = 1.2 * $button_font_size;		

	?>

	button[type="submit"],
	button.submit,
	button.btn--primary,
	button.button,
	.button[type="submit"],
	.button.submit,
	.button.btn--primary,
	.button.button,
	a[type="submit"],
	a.submit,
	a.btn--primary,
	a.button,
	input[type="submit"],
	input.submit,
	input.btn--primary,
	input.button {	
        font-size: <?php echo esc_attr($btn_df); ?>px;
        padding: <?php echo esc_attr($space_df); ?>px <?php echo esc_attr($space_lg); ?>px <?php echo esc_attr($space_df * 0.9); ?>px; 
	}



	.barberry-button-container .b-button_small {
		font-size: <?php echo esc_attr($btn_sm); ?>px;
		padding: <?php echo esc_attr($space_md); ?>px <?php echo esc_attr($space_df); ?>px <?php echo esc_attr($space_md * 0.9); ?>px;
		
	}

	.barberry-button-container .b-button_large {
		font-size: <?php echo esc_attr($btn_lg); ?>px;
		padding: <?php echo esc_attr($space_lg); ?>px <?php echo esc_attr($space_xxl); ?>px <?php echo esc_attr($space_lg * 0.9); ?>px;
		
	}
	<?php
		endif;
	?>

	<?php if ( TDL_Opt::getOption('product_quick_view_mobile') ) : ?>
		@media screen and (max-width: 64em) {
			ul.products li.product .product-inner .product-image .footer-section .footer-section-inner .barberry_product_quick_view_button {
				display:none;
			}		
		}			
	<?php endif; ?>	

	/* Dokan Button Font */


	.vendor-wrapper .dokan-btn {
        font-weight: <?php echo TDL_Opt::getOption('button_font')['font-weight'] ?> !important;
        letter-spacing: <?php echo TDL_Opt::getOption('button_font')['letter-spacing'] ?> !important;  
        text-transform: <?php echo TDL_Opt::getOption('button_font')['text-transform'] ?> !important;		
	    border: 2px solid <?php echo esc_html(TDL_Opt::getOption('bg_button_color')) ?> !important;
	    background-color: <?php echo esc_html(TDL_Opt::getOption('bg_button_color')) ?> !important; 		
	}

	.vendor-wrapper .dokan-btn {
		color: #fff !important;
	}

	.vendor-wrapper .dokan-btn:hover {
		color: <?php echo esc_html(TDL_Opt::getOption('bg_button_color')) ?> !important;
		background-color: #fff !important;
	}	

	.vendor-wrapper .dokan-btn {
        font-size: <?php echo esc_attr($btn_df); ?>px !important;
        padding: <?php echo esc_attr($space_df); ?>px <?php echo esc_attr($space_lg); ?>px <?php echo esc_attr($space_df * 0.9); ?>px !important; 		
	}

</style>