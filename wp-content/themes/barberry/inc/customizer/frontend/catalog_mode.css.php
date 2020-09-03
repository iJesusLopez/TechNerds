<style>
/********************************************************************/
/* Catalog Mode *****************************************************/
/********************************************************************/

<?php if ( (!empty(TDL_Opt::getOption('catalog_mode'))) && (TDL_Opt::getOption('catalog_mode') == 1) ) : ?>
    header.site-header .header-wrapper .header-sections .tools a.header-cart {
        display: none !important;
    }

    <?php if ( (!empty(TDL_Opt::getOption('catalog_mode_button'))) && (TDL_Opt::getOption('catalog_mode_button') == 1) ) : ?>
        form.cart div.quantity,
        form.cart button.single_add_to_cart_button,
        .single-product .product_layout .product-info-cell .product_summary_bottom form.cart .single_variation_wrap,
        .add_to_cart_button,
        ul.products li.product .product-inner .product-image .footer-section .footer-section-inner .barberry_addtocart_button,
        .ajax_add_to_cart,
        .header-cart,
        body.woocommerce-wishlist .wishlist_table thead tr th.product-add-to-cart,
        body.woocommerce-wishlist .wishlist_table tbody tr td.product-add-to-cart {
            display: none !important;
        }
            <?php if ( (!empty(TDL_Opt::getOption('catalog_mode_variables'))) && (TDL_Opt::getOption('catalog_mode_variables') == 1) ) : ?>
                .single-product .product_layout .product-info-cell .product_summary_bottom form.cart table.variations {
                    display: none !important;
                }
            <?php endif; ?>
    <?php endif; ?>

    <?php if ( (!empty(TDL_Opt::getOption('catalog_mode_price'))) && (TDL_Opt::getOption('catalog_mode_price') == 1) ) : ?>
        .woocommerce-Price-amount,
        .product-details .price,
        .single-product .product_layout .product-info-cell .product_summary_middle .price,
        #barberry_woocommerce_quickview .nano-content .product-info-wrapper .product_summary_middle .price,
        .product_layout .product-title-section-wrapper .product-title-section-wrapper-inner .product_summary_middle .price,
        .offcanvas_search .search-results-wrapp .search-results-inner .autocomplete-suggestion .suggestion-inner-wrapper .suggestion-inner .suggestion-details-wrapper .price,
        .product-labels span.onsale,
        .product-labels span.out-of-stock {
            display: none !important;
        }
    <?php endif; ?>

<?php endif; ?>

</style>