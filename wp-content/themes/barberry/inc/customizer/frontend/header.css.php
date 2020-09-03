<style>	

	<?php
		$page_id = barberry_page_ID(); 
		$header_padding = TDL_Opt::getOption('header_padding');
		$header_padding_mobile = TDL_Opt::getOption('header_padding_mobile');
		$sticky_header = TDL_Opt::getOption('sticky_header_padding');
		$header_logo_height = TDL_Opt::getOption('header_logo_height');
		$mobile_logo_height = TDL_Opt::getOption('header_mobile_logo_height');
		$sticky_logo_height = TDL_Opt::getOption('header_sticky_logo_height');

		$disable_bpadding = get_field('tdl_page_header_title_bpadding', $page_id);
		$disable_tpadding = get_field('tdl_page_content_tpadding', $page_id);

		$disable_page_bpadding = get_field('tdl_page_content_bpadding', $page_id);
		
		$page_title = get_field('tdl_page_header_title', $page_id);
		$top_padding = get_field('tdl_page_header_top_padding', $page_id);

		$header_height = ($header_padding * 2) + $header_logo_height;
		$mobile_header_height = ($header_padding_mobile * 2) + $mobile_logo_height;
	 ?>

	.header-wrapper {
		padding-top: <?php echo esc_html($header_padding . "px"); ?>;
		padding-bottom: <?php echo esc_html($header_padding . "px"); ?>;
	}

	@media screen and (max-width: 1024px) {
		.header-wrapper {
			padding-top: <?php echo esc_html($header_padding_mobile . "px"); ?>;
			padding-bottom: <?php echo esc_html($header_padding_mobile . "px"); ?>;
		}
	}

	.site-branding img {
		height: <?php echo esc_html($header_logo_height . "px"); ?>;
	}

	@media screen and (max-width: 1024px) {
		.site-branding img {
			height: <?php echo esc_html($mobile_logo_height . "px"); ?>;
		}		
	}

	<?php if( $disable_page_bpadding ): ?>
		.grid-container.content-page-wrapper {
		    padding-bottom: 0px;
		}				
	<?php endif; ?>

	<?php if( $disable_bpadding ): ?>
		.page-header.title-size-default .title-section .title-section-wrapper,
		.page-header.title-size-small .title-section .title-section-wrapper,
		.page-header.title-size-large .title-section .title-section-wrapper,
		.page-header.title-size-xlarge .title-section .title-section-wrapper {
		    padding-bottom: 0px;
		}				
	<?php endif; ?>

	<?php if( $disable_tpadding ): ?>
		body:not(.woocommerce-page) .content-area .grid-container, .blog-content-area .grid-container, .post-content-area .grid-container {
		    padding-top: 0px;
		}				
	<?php endif; ?>

	/* Page Top Padding */

	<?php if( $page_title && $top_padding ): ?>
		.header-has-overlap:not(.single) .offcanvas_main_content #primary {
			padding-top: <?php echo esc_html($header_height . "px"); ?>;
		}

		@media screen and (max-width: 1024px) {
			.header-has-overlap:not(.single) .offcanvas_main_content #primary {
				padding-top: <?php echo esc_html($mobile_header_height . "px"); ?>;
			}		
		}

		@media screen and (max-width: 768px) {
			.header-has-overlap:not(.single) .offcanvas_main_content #primary {
				padding-top: <?php echo esc_html($mobile_header_height . "px"); ?>;
			}		
		}	
		
	<?php endif; ?>



	/* Sticky Header */

	.site-header.header--clone .header-wrapper {
		padding-top: <?php echo esc_html($sticky_header . "px"); ?>;
		padding-bottom: <?php echo esc_html($sticky_header . "px"); ?>;
	}

	.site-header.header--clone .site-branding img {
		height: <?php echo esc_html($sticky_logo_height . "px"); ?>;
	}

	<?php if ( 0 == TDL_Opt::getOption('sticky_header_mobile') ) : ?>
		@media screen and (max-width: 1024px) {
			.site-header.header--clone	{
				display: none;
			}
		}
	<?php endif; ?>	

	/* Header Background */

	body.header-has-no-overlap header.site-header:not(.header--clone) .header-inner,
	body.header-has-no-title.woocommerce-shop:not(.archive) header.site-header:not(.header--clone) .header-inner {
		background-color: <?php echo esc_html(TDL_Opt::getOption('header_background_color')) ?>;
	}


	/* Page Title Section */

	body.header-has-no-overlap .page-header,
	.single.single-attachment .site-content {
		margin-top: <?php echo esc_html($header_height. "px"); ?>;
	}

	@media screen and (max-width: 1024px) {
		body.header-has-no-overlap .page-header,
		.single.single-attachment .site-content {
			margin-top: <?php echo esc_html($mobile_header_height . "px"); ?>;
		}
	}

	/* With Overlap */

	body.header-has-overlap .page-header .title-section .title-section-wrapper .title-wrapper {
		margin-top: <?php echo esc_html($header_height / 2 + 30 . "px"); ?>;
	}

	@media screen and (max-width: 1024px) {
		body.header-has-overlap .page-header .title-section .title-section-wrapper .title-wrapper {
			margin-top: <?php echo esc_html($mobile_header_height / 2 + 30 . "px"); ?>;
		}
	}

	/* Without Overlap and without Title section */

	body.header-has-no-title.header-has-no-overlap .content-page-wrapper {
		margin-top: <?php echo esc_html($header_height . "px"); ?>;
	}

	@media screen and (max-width: 1024px) {
		body.header-has-no-title.header-has-no-overlap .content-page-wrapper {
			margin-top: <?php echo esc_html($mobile_header_height . "px"); ?>;
		}
	}

	<?php if ( barberry_is_shop_archive() ) : ?>
		body.header-has-no-title:not(.tax-product_cat) .content-page-wrapper {
			margin-top: <?php echo esc_html($header_height . "px"); ?>;
		}
		@media screen and (max-width: 1024px) {
			body.header-has-no-title:not(.tax-product_cat) .content-page-wrapper {
				margin-top: <?php echo esc_html($mobile_header_height . "px"); ?>;
			}
		}	
		.header-has-no-title:not(.tax-product_cat) .content-area .site-content .content-page-wrapper {
		    padding-top: 30px;
		}	
		<?php if ( is_product_category() && TDL_Opt::getOption('shop-title') == 'disable' ) : ?>
			body.header-has-no-title .content-page-wrapper {
				margin-top: <?php echo esc_html($header_height . "px"); ?>;
			}
			@media screen and (max-width: 1024px) {
				body.header-has-no-title .content-page-wrapper {
					margin-top: <?php echo esc_html($mobile_header_height . "px"); ?>;
				}
			}	
			.header-has-no-title .content-area .site-content .content-page-wrapper {
			    padding-top: 30px;
			}						
		<?php endif; ?>		
	<?php endif; ?>	

	/* Dokan Header Padding */

	body.dokan-store .content-area,
	body.dokan-theme-barberry .vendor-wrapper,
	body.dokan-dashboard .content-page-wrapper.product-edit-wrapper {
		padding-top: <?php echo esc_html($header_height . "px"); ?>;
	}

	@media screen and (max-width: 1024px) {
		body.dokan-store .content-area,
		body.dokan-theme-barberry .vendor-wrapper,
		body.dokan-dashboard .content-page-wrapper.product-edit-wrapper {
			padding-top: <?php echo esc_html($mobile_header_height . "px"); ?>;
		}		
	}
	

	/* Cart Page Header Padding */

	body.woocommerce-cart .cart-cells .cell {
		padding-top: <?php echo esc_html($header_height + 50 . "px"); ?>;
	}

	@media screen and (max-width: 1280px) {
		body.woocommerce-cart .cart-cells .cell {
			padding-top: <?php echo esc_html($mobile_header_height + 50 . "px"); ?>;
		}		
	}

	@media screen and (max-width: 1024px) {
		body.woocommerce-cart .cart-cells .cell {
			padding-top: <?php echo esc_html($mobile_header_height + 10 . "px"); ?>;
		}		
	}

	@media screen and (max-width: 768px) {
		body.woocommerce-cart .cart-cells .cell {
			padding-top: inherit;
		}		
	}

	/* Checkout Page Header Padding */

	body.woocommerce-checkout:not(.woocommerce-order-pay):not(.woocommerce-order-received) .entry-content,
	body.woocommerce-checkout.header-has-no-title.header-has-overlap #order_review.checkout-form-pay  {
		padding-top: <?php echo esc_html($header_height . "px"); ?>;
	}

	@media screen and (max-width: 1280px) {
		body.woocommerce-checkout:not(.woocommerce-order-pay):not(.woocommerce-order-received) .entry-content,
		body.woocommerce-checkout.header-has-no-title.header-has-overlap #order_review.checkout-form-pay {
			padding-top: <?php echo esc_html($header_height + 20 . "px"); ?>;
		}		
	}

	@media screen and (max-width: 1024px) {
		body.woocommerce-checkout:not(.woocommerce-order-pay):not(.woocommerce-order-received) .entry-content,
		body.woocommerce-checkout.header-has-no-title.header-has-overlap #order_review.checkout-form-pay {
			padding-top: <?php echo esc_html($mobile_header_height + 20 . "px"); ?>;
		}		
	}


	/* Account Page Header Padding */

	body.woocommerce-account .account-cells .cell,
	body.logged-in.woocommerce-wishlist .account-cells .cell,
	body.woocommerce-order-received .account-cells .cell,
	body.woocommerce-account .login-cells .login-content {
		padding-top: <?php echo esc_html($header_height + 30 . "px"); ?>;
	}

	@media screen and (max-width: 1280px) {
		body.woocommerce-account .account-cells .cell,
		body.logged-in.woocommerce-wishlist .account-cells .cell,
		body.woocommerce-order-received .account-cells .cell,
		body.woocommerce-account .login-cells .login-content {
			padding-top: <?php echo esc_html($header_height + 30 . "px"); ?>;
		}		
	}

	@media screen and (max-width: 1024px) {
		body.woocommerce-account .account-cells .cell,
		body.logged-in.woocommerce-wishlist .account-cells .cell,
		body.woocommerce-order-received .account-cells .cell,
		body.woocommerce-account .login-cells .login-content {
			padding-top: <?php echo esc_html($mobile_header_height + 20 . "px"); ?>;
		}		
	}

	/* Product Page Header Padding */

	/* Default */

	body.single-product .product_layout_default .product-cells,
	body.single-product .product_layout_default .sidebar-container {
		padding-top: <?php echo esc_html($header_height + 20 . "px"); ?>;
	}

	@media screen and (max-width: 1280px) {
		body.single-product .product_layout_default .product-cells {
			padding-top: <?php echo esc_html($header_height + 20 . "px"); ?>;
		}		
	}

	@media screen and (max-width: 1024px) {
		body.single-product .product_layout_default .product-cells {
			padding-top: <?php echo esc_html($mobile_header_height + 20 . "px"); ?>;
		}		
	}

	@media screen and (max-width: 768px) {
		body.single-product .product_layout_default .product-cells {
			padding-top: <?php echo esc_html($mobile_header_height . "px"); ?>;
		}		
	}

	/* Style 2 */



	.single-product .product_layout.product_layout_style_2 .product-info-cell {
		padding-top: <?php echo esc_html($header_height + 40 . "px"); ?>;
	}

	.single-product .product_layout_style_2 .product-images-wrapper .product-labels {
	    top: <?php echo esc_html($header_height . "px"); ?>;
	}

	@media screen and (max-width: 1280px) {
		.single-product .product_layout.product_layout_style_2 .product-info-cell {
			padding-top: <?php echo esc_html($header_height . "px"); ?>;
		}		
	}

	@media screen and (max-width: 1024px) {
		.single-product .product_layout.product_layout_style_2 .product-info-cell {
			padding-top: <?php echo esc_html($mobile_header_height . "px"); ?>;
		}

		.single-product .product_layout_style_2 .product-images-wrapper .product-labels {
		    top: <?php echo esc_html($mobile_header_height . "px"); ?>;
		}		
	}

	@media screen and (max-width: 940px) {
		.single-product .product_layout.product_layout_style_2 .product-info-cell {
			padding-top: 0;
		}		
	}	


	/* Product Page header Transparent */

	<?php
	if ( barberry_woocommerce_installed() ) {

		switch ( barberry_product_header_transparent_desktop(get_the_ID()) )
		{        
		    case "no_overlap":
		    ?>

			body.single-product .product_layout_style_2 .product-cells,
			body.single-product .product_layout_style_3 .product-cells {
				padding-top: <?php echo esc_html($header_height . "px"); ?>;
			}

			@media screen and (max-width: 1280px) {
				body.single-product .product_layout_style_2 .product-cells,
				body.single-product .product_layout_style_3 .product-cells {
					padding-top: <?php echo esc_html($header_height . "px"); ?>;
				}		
			}

			@media screen and (max-width: 1024px) {
				body.single-product .product_layout_style_2 .product-cells,
				body.single-product .product_layout_style_3 .product-cells {
					padding-top: <?php echo esc_html($mobile_header_height . "px"); ?>;
				}		
			}


		    <?php
		        break;
		    case "overlap":
		    ?>




		    <?php
		    default:
		    ?>




		    <?php
		        break;
		}
	}	
	?>


	/* Product Page header Transparent */

	<?php
	if ( barberry_woocommerce_installed() ) {

		switch ( barberry_product_header_transparent(get_the_ID()) )
		{        
		    case "no_overlap":
		    ?>

				@media screen and (max-width: 940px) {
					body.single-product .product_layout_style_2 .product-cells,
					body.single-product .product_layout_style_3 .product-cells {
						padding-top: <?php echo esc_html($mobile_header_height . "px"); ?>;
					}

					body.single-product .product_layout_style_2 .product-images-wrapper .product-labels,
					body.single-product .product_layout_style_3 .product-images-wrapper .product-labels {
					    top: 30px;
					}							
				}

				@media screen and (max-width: 768px) {
					body.single-product .product_layout_default .product-cells {
						padding-top: <?php echo esc_html($mobile_header_height . "px"); ?>;
					}

					body.single-product .product_layout_style_2 .product-images-wrapper .product-labels,
					body.single-product .product_layout_style_3 .product-images-wrapper .product-labels {
					    top: 25px;
					}							
				}

		    <?php
		        break;
		    case "overlap":
		    ?>

		    	header.site-header:not(.header--clone) .header-inner {
				    background-color: transparent !important;
				}

				@media screen and (max-width: 768px) {
					body.single-product .product_layout_default .product-cells {
						padding-top: 0px;
					}	

					body.single-product .product_layout .product-images-wrapper .product-labels {
					    top: <?php echo esc_html($mobile_header_height + 10 . "px"); ?>;
					}						
				}

				@media screen and (max-width: 940px) {
					body.single-product .product_layout_style_2 .product-cells,
					body.single-product .product_layout_style_3 .product-cells {
						padding-top: 0px;
					}	

					body.single-product .product_layout_style_2 .product-images-wrapper .product-labels,
					body.single-product .product_layout_style_3 .product-images-wrapper .product-labels {
					    top: <?php echo esc_html($mobile_header_height + 10 . "px"); ?>;
					}									
				}
		    <?php
		    default:
		    ?>

		    	header.site-header:not(.header--clone) .header-inner {
				    background-color: transparent !important;
				}

				@media screen and (max-width: 768px) {
					body.single-product .product_layout_default .product-cells {
						padding-top: 0px;
					}

					body.single-product .product-images-wrapper .product-labels {
					    top: <?php echo esc_html($mobile_header_height . "px"); ?>;
					}		
				}

				@media screen and (max-width: 940px) {
					body.single-product .product_layout_style_2 .product-cells,
					body.single-product .product_layout_style_3 .product-cells {
						padding-top: 0px;
					}
				}
		    <?php
		        break;
		}
	}	
	?>

	/* Password Protected Page Header Padding */

	body.single-product .password-cells  {
		padding-top: <?php echo esc_html($header_height . "px"); ?>;
	}

	@media screen and (max-width: 1280px) {
		body.single-product .password-cells {
			padding-top: <?php echo esc_html($header_height + 20 . "px"); ?>;
		}		
	}

	@media screen and (max-width: 1024px) {
		body.single-product .password-cells {
			padding-top: <?php echo esc_html($mobile_header_height + 20 . "px"); ?>;
		}		
	}	

</style>