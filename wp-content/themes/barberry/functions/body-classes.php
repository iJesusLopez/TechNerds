<?php


// -----------------------------------------------------------------------------
// Body Class - No Animation
// -----------------------------------------------------------------------------


function barberry_no_offcanvas($classes) {
    $classes[] = 'no-offcanvas-animation';
    return $classes;
}

// -----------------------------------------------------------------------------
// Body Class - Load Transition
// -----------------------------------------------------------------------------

function barberry_load_transition($classes) {
    if ( 1 == TDL_Opt::getOption('load_animation') ) $classes[] = 'load-transition';
    return $classes;
}

// -----------------------------------------------------------------------------
// Body Class - Shop
// -----------------------------------------------------------------------------

function barberry_shop($classes) {

    if ( BARBERRY_WOOCOMMERCE_IS_ACTIVE ) {
        if ( is_shop() || is_product_category() || is_product_tag() || (is_tax() && is_woocommerce()) ) {
            $classes[] = 'woocommerce-shop';
        }
    }
    return $classes;
}

// -----------------------------------------------------------------------------
// Body Class - Catalog Mode
// -----------------------------------------------------------------------------

function barberry_catalog_mode($classes) {
    if ( 1 == TDL_Opt::getOption('catalog_mode') ) $classes[] = 'catalog-mode';
    return $classes;
}


// -----------------------------------------------------------------------------
// Body Class - Shop Sidebar
// -----------------------------------------------------------------------------

function barberry_shop_sidebar($classes) {
    if ( BARBERRY_WOOCOMMERCE_IS_ACTIVE ) {
        if ( is_shop() || is_product_category() || is_product_tag() || (is_tax() && is_woocommerce()) ) {
            if ( 1 == TDL_Opt::getOption('shop_sidebar') ) {
                $classes[] = 'shop-sidebar-active';
                $classes[] = 'shop-sidebar-' . TDL_Opt::getOption('shop_sidebar_position');
                if ( 1 == TDL_Opt::getOption('sticky_filter_button') ) {
					$classes[] = 'shop-sticky-sidebar';
                }
            }

        }
    }
    return $classes;
}

// -----------------------------------------------------------------------------
// Body Class - Product Sidebar
// -----------------------------------------------------------------------------

function barberry_product_sidebar($classes) {
    if ( BARBERRY_WOOCOMMERCE_IS_ACTIVE ) {
        if ( is_singular( "product" ) ) {
            if ( 1 == TDL_Opt::getOption('product_sidebar') && 'default' == TDL_Opt::getOption('product_layout')  ) {
                $classes[] = 'product-sidebar-active';
                $classes[] = 'product-sidebar-' . TDL_Opt::getOption('product_sidebar_position');
                if ( 1 == TDL_Opt::getOption('sticky_product_filter_button') ) {
					$classes[] = 'product-sticky-sidebar';
                }                
            }
        }
    }
    return $classes;
}

// -----------------------------------------------------------------------------
// Body Class - Shop Pagination
// -----------------------------------------------------------------------------

function barberry_wishlist($classes) {

    if ( BARBERRY_WOOCOMMERCE_IS_ACTIVE ) {
    	if ( BARBERRY_WISHLIST_IS_ACTIVE ) {

    		$wishlist_count = yith_wcwl_count_products();
    		if ( $wishlist_count !== 0 ) $classes[] = 'has-wishlist';	
    	}
    }
    return $classes;
}

// -----------------------------------------------------------------------------
// Body Class -  Notifications
// -----------------------------------------------------------------------------

function barberry_notification($classes) {

	if ( 1 == TDL_Opt::getOption('notification_mode') ) {
	    $classes[] = 'bb_custom_notif';
	} else {
		$classes[] = 'bb_classic_notif';
	}

	if ( 1 == TDL_Opt::getOption('notifications_click') ) {
	    $classes[] = 'notice_clickable';
	}

    return $classes;  
}

// -----------------------------------------------------------------------------
// Body Class - Shop Pagination
// -----------------------------------------------------------------------------

function barberry_shop_pagination($classes) {

    if ( BARBERRY_WOOCOMMERCE_IS_ACTIVE ) {
        if ( is_shop() || is_product_category() || is_product_tag() || (is_tax() && is_woocommerce()) ) {
            $classes[] = 'shop-pagination-' . TDL_Opt::getOption('shop_pagination');
        }
    }
    return $classes;
}

// -----------------------------------------------------------------------------
// Body Class - Blog Pagination
// -----------------------------------------------------------------------------
function barberry_blog_pagination($classes) {

    if ( is_home() || is_archive() || is_search() ) {
        $classes[] = 'blog-pagination-' . TDL_Opt::getOption('blog_pagination');
    }

    return $classes;
}

// -----------------------------------------------------------------------------
// Body Class - Tag Cloud Widget Style
// -----------------------------------------------------------------------------
function barberry_tag_cloud($classes) {

    $classes[] = 'tag-cloud-' . TDL_Opt::getOption('tag_cloud_style');

    return $classes;
}

// -----------------------------------------------------------------------------
// Body Class - Ajax Filter
// -----------------------------------------------------------------------------

function barberry_ajax_filter($classes) {
    if ( 1 == TDL_Opt::getOption('ajax_shop') ) $classes[] = 'catalog-ajax-filter';
    return $classes;
}

// -----------------------------------------------------------------------------
// Body Class - Blog Posts Parallax
// -----------------------------------------------------------------------------

function barberry_blog_parallax($classes) {
    if ( 1 == TDL_Opt::getOption('blog_posts_parallax') ) $classes[] = 'posts-has-parallax';
    return $classes;
}


// -----------------------------------------------------------------------------
// Body Class - Header Title section
// -----------------------------------------------------------------------------

function barberry_header_title($classes) {

	$page_id = barberry_page_ID();

	$default_header_overlap = TDL_Opt::getOption('header_transparent');
	$custom_header_overlap = get_field('tdl_header_overlap' , $page_id);

	$default_page_title = TDL_Opt::getOption('page-title');
	$custom_page_title = get_field('tdl_page_header_title' , $page_id);

	if( barberry_is_shop_archive() ) {
		$page_id = wc_get_page_id('shop');
		$default_page_title = TDL_Opt::getOption('shop-title');
		$custom_page_title = get_field('tdl_page_header_title' , $page_id);	
		$custom_header_overlap = get_field('tdl_header_overlap' , $page_id);

		if ( is_product_category() ) {
			$page_id = get_queried_object(); 
			$custom_header_overlap = get_field('tdl_prodcat_header_overlap' , $page_id);
		}			
	}

	$page_title = "default";
	$header_overlap = 1;

	// Header Overlap from Customiser
	
	switch ($default_header_overlap)
	{        
	    case 1:
	        $header_overlap = 1;
	        break;
	    case 0:
	        $header_overlap = 0;
	        break;
	    default:
	        $header_overlap = 1;
	        break;
	}

	// Overwrite Global Page Title from Product Page Options

	switch ( $custom_header_overlap ) {        
	    case 1:
	        $header_overlap = 1;
	        break;
	    default:
	        // do nothing
	        break;
	}


	// Page Title from Customiser
	
	switch ($default_page_title)
	{        
	    case "default":
	        $page_title = 1;
	        break;
	    case "disable":
	        $page_title = 0;
	        break;
	    default:
	        $page_title = 1;
	        break;
	}

	// Overwrite Global Page Title from Product Page Options

	switch ( $custom_page_title ) {        
	    case 1:
	        $page_title = 0;
	        break;
	    default:
	        // do nothing
	        break;
	}


	$classes[] .= ( $page_title  ) ? 'header-has-title' : 'header-has-no-title';
	$classes[] .= ( $header_overlap ) ? 'header-has-overlap' : 'header-has-no-overlap';

    return $classes;
}

// -----------------------------------------------------------------------------
// Body Class - Buy It Now
// -----------------------------------------------------------------------------

function barberry_buyitnow($classes) {
    if ( 1 == TDL_Opt::getOption('product_buy_now') ) $classes[] = 'buy_now_enable';
    return $classes;
}


// -----------------------------------------------------------------------------
// Print Body Classes
// -----------------------------------------------------------------------------
    
function barberry_customiser_body_classes() {    

    add_filter( 'body_class', 'barberry_load_transition' );
    add_filter( 'body_class', 'barberry_no_offcanvas' );
    add_filter( 'body_class', 'barberry_shop' );
    add_filter( 'body_class', 'barberry_catalog_mode' );
    add_filter( 'body_class', 'barberry_header_title' );
    add_filter( 'body_class', 'barberry_ajax_filter' );
    add_filter( 'body_class', 'barberry_shop_pagination' );
    add_filter( 'body_class', 'barberry_blog_pagination' );
    add_filter( 'body_class', 'barberry_blog_parallax' );
    add_filter( 'body_class', 'barberry_shop_sidebar' );
    add_filter( 'body_class', 'barberry_product_sidebar' );
    add_filter( 'body_class', 'barberry_wishlist' );
    add_filter( 'body_class', 'barberry_notification' );
    add_filter( 'body_class', 'barberry_tag_cloud' );
    add_filter( 'body_class', 'barberry_buyitnow' );
}

add_action( 'wp_head', 'barberry_customiser_body_classes', 100 );

// -----------------------------------------------------------------------------
// Header Classes
// -----------------------------------------------------------------------------

if ( ! function_exists( 'barberry_header_classes' ) ) {
	function barberry_header_classes(){

		global $wp_query, $post;
		$page_id = 0;
		$page_id = barberry_page_ID();

		if ( barberry_is_shop_archive() ) {
			$page_id = wc_get_page_id('shop');			
		}

		// Header data
		$header_menu_layout = '';

		$header_bg = TDL_Opt::getOption('header_background_color');
		$header_has_bg = TDL_Opt::getOption('header_background_color');
		$header_menu_layout = TDL_Opt::getOption('nav_center');
		$header_color_scheme = TDL_Opt::getOption('header_color_scheme');

		if( $page_id != 0 ) {
			
			if ( barberry_is_shop_archive() ) {
				if ( is_product_category() ) {
					$page_id = get_queried_object(); 
				}
			}

			$custom_header_color_scheme = get_field('tdl_header_color_scheme', $page_id);

			if ( barberry_is_shop_archive() ) {
				if ( is_product_category() ) {
					$custom_header_color_scheme = get_field('tdl_prodcat_header_color_scheme', $page_id);
				}
			}

			if( $custom_header_color_scheme != '' && $custom_header_color_scheme != 'default' ) {
				$header_color_scheme = $custom_header_color_scheme;
			}	
			
		} 

		$header_layout = TDL_Opt::getOption('header_layout');
		if (isset($_GET["header_layout"])) {
			$header_layout = $_GET["header_layout"];
		}
				

		// Header classes
		
		$header_class = 'site-header';
		$header_class .= ' header-' . $header_layout;
		$header_class .= ' header-color-' . $header_color_scheme;
		$header_class .= ( $header_has_bg ) ? ' header-has-bg' : ' header-has-no-bg';
		$header_class .= ( $header_menu_layout ) ? ' header-nav-center' : '';

		echo 'class="' . esc_attr( $header_class ) . '" ';
	}
}