<?php

	// Kill theme modifications
	// remove_theme_mods();

	class TDL_Opt {

		/**
		 * Cache each request to prevent duplicate queries
		 *
		 * @var array
		 */
		protected static $cached = [];

		/**
		 *  We don't need a constructor
		 */
		private function __construct() {}

		/**
		 * Default values for theme options
		 *
		 * @return array
		 */
		private static function theme_defaults() {
			return [	
				// Global
				'bg_color' 								=> '#ffffff',
				'base_color_scheme' 					=> '#000000',
				'accent_color_scheme' 					=> '#000000',
				'main_font_color' 						=> '#1c1c1c',
				'bg_button_color' 						=> '#000000',
				'cart_bgcolor' 							=> '#f4f4f4',
				'checkout_bgcolor' 						=> '#f4f4f4',
				'myaccount_bgcolor' 					=> '#f4f4f4',
				'tag_cloud_style' 						=> 'equal',
				'page_loader' 							=> 0,
				'load_animation' 						=> 1,
				'nav_diag_animation' 					=> 1,
				'blur_background' 					=> 1,
				'lazyload' 								=> 0,
				'backtotop' 							=> 1,
				'backtotop_mobile' 						=> 0,
				'google_map_api_key' 					=> '',
				'hide_acf' 								=> 1,
				'combined_js' 							=> 0,
				'navigation_breakpoint' 				=> 1024,


				// Fonts
				'main_font' 							=> array('font-family' => 'Roboto', 'font-weight' => '400', 'font-size' => '17px', 'line-height' => '1.8', 'letter-spacing' => '0', 'subsets' => array('latin-ext')),
				'main_font_mobile' 						=> array('font-size' => '17px', 'line-height' => '1.8'),
				'heading_font' 							=> array('font-family' => 'Josefin Sans', 'font-weight' => '600', 'font-size' => '24px', 'letter-spacing' => '0'),
				'page_header_font' 						=> array('font-family' => 'Josefin Sans', 'font-weight' => '700', 'font-size' => '60px', 'line-height'    => '1.3', 'text-transform' => 'none', 'letter-spacing' => '0'),
				'product_title_font' 					=> array('font-family' => 'Josefin Sans', 'font-weight' => '600', 'text-transform' => 'none', 'letter-spacing' => '0'),
				'single_product_title_font' 			=> array('font-family' => 'Josefin Sans', 'font-weight' => '700', 'font-size' => '62px', 'line-height'    => '1.1', 'text-transform' => 'none', 'letter-spacing' => '0'),
				'cart_page_title_font' 			=> array('font-size' => '90px', 'line-height'    => '1.2', 'text-transform' => 'none', 'letter-spacing' => '-2px'),				
				'my_account_title_font' 			=> array('font-size' => '70px', 'line-height'    => '1.2', 'text-transform' => 'none', 'letter-spacing' => '-2px'),
				'page_header_nav_font' 					=> array('font-family' => 'Roboto', 'font-weight' => '400', 'font-size' => '17px', 'letter-spacing' => '0', 'text-transform' => 'none'),
				'page_header_nav_submenu_font' 			=> array('font-family' => 'Roboto', 'font-weight' => '400', 'font-size' => '14px', 'letter-spacing' => '0', 'text-transform' => 'none'),	
				'page_header_nav_font_mob' 				=> array('font-family' => 'Roboto', 'font-weight' => '600', 'font-size' => '26px', 'letter-spacing' => '0', 'text-transform' => 'none'),
				'button_font' 			=> array('font-family' => 'Josefin Sans', 'font-weight' => '500', 'font-size' => '12px',  'letter-spacing' => '-1', 'text-transform' => 'uppercase'),								

				// Header
				'header_transparent' 					=> 1,
				'header_background_color' 				=> '#ffffff',
				'header_color_scheme' 				    => 'default',
				'header_layout' 						=> 'left',
				'nav_center'                     		=> 0,
				'header_padding' 						=> '40',
				'header_padding_mobile' 				=> '20',
				'sticky_header'                  		=> 1,
				'sticky_header_mobile'                  => 1,
				'sticky_header_padding' 				=> '15',
				'predictive_search'                     => 1,
				'predictive_search_no'                  => 8,
				'post_type' 							=> 'product',
				'search_by_sku'                     	=> 0,
				'typewriter_effect'                     => 0,
				'typewriter_text' 						=> 'Chair, Lamp, anything',

				'topbar_toggle' 						=> 0,
				'topbar_contact' 						=> '<a href="tel:+12 (0) 12-345-678"><strong>Call</strong> +12 (0) 12-345-678</a>',
				'topbar_left'            				=> array('contact'),
				'topbar_mobile' 						=> 0,
				'topbar_right'            				=> array('socials'),

				'topbar_wpml_languages' 				=> 1,
				'topbar_wpml_lang_intro' 				=> 1,
				'topbar_wpml_native' 					=> 1,
				'topbar_wpml_flags' 					=> 0,
				'topbar_wpml_currency' 					=> 1,
				'topbar_wpml_cur_intro' 				=> 1,
				'topbar_wpml_code' 						=> 1,
				'topbar_bg_color'            			=> '#FFFFFF',
				'topbar_font_color'            			=> '#333333',

				// Header Elements
				'header_search' 						=> 1,
				'header_wishlist' 						=> 1,
				'header_compare' 						=> 1,
				'header_account' 						=> 1,
				'header_account_icon' 					=> 0,
				'header_account_dropdown' 				=> 0,
				'header_account_with_username' 			=> 0,

				'my_account_wishlist' 					=> 1,
				'header_cart_icon' 						=> 0,
				'header_cart_link'            			=> 'sidebar',

				// Offcanvas
				'offcanvas_bottom' 						=> array('socials','contact'),
				'offcanvas_contact' 					=> '<a href="mailto:info@yourwebsite.com">info@yourwebsite.com</a><br>
<a href="tel:+12 (0) 12-345-678">+12 (0) 12-345-678</a><br>',
				'offcanvas_wpml_languages' 				=> 1,
				'offcanvas_wpml_lang_intro' 			=> 1,
				'offcanvas_wpml_native' 				=> 1,
				'offcanvas_wpml_flags' 					=> 0,
				'offcanvas_wpml_currency' 				=> 1,
				'offcanvas_wpml_cur_intro' 				=> 1,
				'offcanvas_wpml_code' 					=> 1,


				// Page Title
				'breadcrumbs'                  			=> 1,
				'page-title'                  			=> 'default',
				'page-title-background' 				=> array('background-color' => '#f7f7f7', 'background-image' => '', 'background-repeat' => 'repeat', 'background-position' => 'center center', 'background-size' => 'cover', 'background-attachment' => 'scroll'),
				'page-title-color' 						=> 'default',
				'page-title-size' 						=> 'default',

				// Logo
				'header_logo'                			=> get_template_directory_uri() . '/images/barberry-logo.svg',
				'header_logo_light'                		=> get_template_directory_uri() . '/images/barberry-logo-light.svg',
				'header_logo_sticky'                	=> get_template_directory_uri() . '/images/barberry-logo.svg',
				'header_logo_height' 					=> '45',
				'header_sticky_logo_height' 			=> '35',
				'header_mobile_logo_height' 			=> '35',

				// Blog
				'blog_breadcrumbs'                  	=> 1,
				'blog_post_breadcrumbs'                 => 1,
				'blog_categories'						=> 0,
				'blog_sidebar'                      	=> 1,
				'blog_single_share'                     => 0,
				'blog_posts_parallax'					=> 0,
				'blog_pagination' 						=> 'default',
				'blog_single_sidebar'               	=> 0,
				'blog_single_featured'              	=> 1,
				'blog_single_related'					=> 1,				

				// Shop
				'catalog_mode' 							=> 0,
				'catalog_mode_button'               	=> 0,
				'catalog_mode_variables'               	=> 0,
				'catalog_mode_price'                	=> 0,				
				'shop_filters'                  		=> 0,
				'shop_filters_close'                  	=> 0,
				'ajax_shop'                  			=> 1,
				'add_to_cart_action'					=> 'sidebar',
				'product_columns'                  		=> '4',
				'products_per_page'                     => '12',
				'shop_sidebar'                  		=> 0,
				'shop_sidebar_position'					=> 'left',
				'shop-title'                  			=> 'default',
				'shop_breadcrumbs'                  	=> 1,
				'shop_categories'                  		=> 1,
				'shop_pagination'						=> 'infinite_scroll',
				'category_grid_layout'                  => '1',
				'product_grid_layout'                   => '1',
				'sticky_sidebar'                  		=> 0,
				'sticky_filter_button'                  => 1,
				'disable_secondary_thumb'               => 0,
				'product_quick_view'                  	=> 0,
				'product_quick_view_mobile'             => 0,
				'product_attribute'						=> 'none',
				'shop_addtocart'  	                	=> 0,
				'shop_countdown'  	                	=> 0,
				'label_shape'							=> 'bordered',
				'percentage_label'                  	=> 1,
				'new_label'                  			=> 1,
				'hot_label'                  			=> 0,
				'shop_decimals'                  		=> 0,

				'notifications_click' 					=> 1,
				'notification_mode'                  	=> '0',
				'notification_style'                  	=> '1',

				// Product
				'product_layout'                  		=> 'default',
				'product_thumbs'                  		=> 'bottom',
				'product_sidebar'                  		=> 0,
				'product_sidebar_position'				=> 'right',
				'sticky_product_filter_button'          => 1,
				'product_share'                  		=> 0,
				'size_guides'                  		    => 0,
				'product_zoom'                  		=> 1,
				'product_zoom_mobile'                  	=> 0,
				'product_images_lightbox'               => 1,
				'product_lightbox_dominant'             => 0,
				'variation_gallery'             		=> 1,
				'product_header_transparent_desktop'    => 'overlap',
				'product_header_transparent'            => 'no_overlap',
				'product_breadcrumbs'                  	=> 1,
				'upsells_products'             					=> 1,
				'upsells_products_columns'             	=> 4,
				'upsells_products_numbers'             	=> 6,				
				'related_products'             					=> 1,
				'related_products_columns'             	=> 4,
				'related_products_numbers'             	=> 6,
				'related_uppsells_scroll'             	=> 0,
				'related_uppsells_scroll_speed'             	=> 1,
				'product_navigation'             				=> 1,
				'product_add_to_cart_ajax'             	=> 1,
				'product_sticky_addtocart'             	=> 1,
				'product_sticky_addtocart_mob'          => 1,
				'product_buy_now'             			=> 0,
				'product_countdown'             		=> 0,
				'sale_countdown_variable'             	=> 0,
				'product_progess_stock'             	=> 0,

				'compare_extends'             			=> 0,
				'max_compare'                  			=> '4',

				// Social
				'facebook_link'                  		=> '#',
				'twitter_link'                  		=> '#',
				'pinterest_link'                  		=> '#',
				'googleplus_link'                  		=> '#',
				'social_sharing'            			=> array('facebook', 'twitter', 'google', 'pinterest'),

				// Footer
				'footer_reveal'                  		=> 0,
				'footer_hover'                  		=> 0,
				'footer_layout'                  		=> '0',
				'footer_1_align'                  		=> 'text-left',
				'footer_2_align'                  		=> 'text-left',
				'footer_3_align'                  		=> 'text-left',
				'footer_4_align'                  		=> 'text-left',
				'footer_5_align'                  		=> 'text-left',
				'footer_background_color'               => '#FFFFFF',
				'footer_font_color'               		=> '#000000',
				'footer_hover_background_color'         => '#111111',
				'footer_hover_font_color'               => '#FFFFFF',	
				'footer_copy_section'                  	=> '1',			
				'footer_text'               			=> '© 2020 <strong>Barberry</strong>. All rights reserved',
				'footer_social'             			=> 0,
				'footer_credit_card_icons' 				=> get_template_directory_uri() . '/images/customizer/footer/credit-card-icons.png',
				'footer_payment_options_on'             => 0,
				'footer_payment_options'				=> array(
														array(
												            'payment_option_name' => esc_attr__( 'Visa', 'barberry' ),
												            'payment_option_image'  => get_template_directory_uri() . '/images/customizer/footer/payment-icon-visa.png',
												        ),
												        array(
												            'payment_option_name' => esc_attr__( 'MasterCard', 'barberry' ),
												            'payment_option_image'  => get_template_directory_uri() . '/images/customizer/footer/payment-icon-mastercard.png',
												        ),
												        array(
												            'payment_option_name' => esc_attr__( 'Amex', 'barberry' ),
												            'payment_option_image'  => get_template_directory_uri() . '/images/customizer/footer/payment-icon-amex.png',
												        ),
												        array(
												            'payment_option_name' => esc_attr__( 'PayPal', 'barberry' ),
												            'payment_option_image'  => get_template_directory_uri() . '/images/customizer/footer/payment-icon-paypal.png',
												        ),
												        array(
												            'payment_option_name' => esc_attr__( 'Amazon', 'barberry' ),
												            'payment_option_image'  => get_template_directory_uri() . '/images/customizer/footer/payment-icon-amazon.png',
												        ),
													),				



			];
		} 

		/**
		 * Switch case for options that need post processing
		 *
		 * @param  [string] $key   [name of option]
		 * @param  [string] $value [value]
		 *
		 * @return [string]        [processed value]
		 */
		private static function processOption($key, $value) {
				$opacity_dark           = .75;
			    $opacity_medium         = .5;
			    $opacity_light          = .2;
			    $opacity_ultra_light    = .1;
			    $opacity_ultra_light_plus    = .05;
				switch ($key) {	

				// Top Bar		

				case 'topbar_dark_gray':
					return "rgba(" . barberry_hex2rgb(self::getOption('topbar_font_color')) 	. "," . $opacity_dark . ")";
					break;
				case 'topbar_medium_gray':
					return "rgba(" . barberry_hex2rgb(self::getOption('topbar_font_color')) 	. "," . $opacity_medium . ")";
					break;
				case 'topbar_light_gray':
					return "rgba(" . barberry_hex2rgb(self::getOption('topbar_font_color')) 	. "," . $opacity_light . ")";
					break;
				case 'topbar_ultra_light_gray':
					return "rgba(" . barberry_hex2rgb(self::getOption('topbar_font_color')) 	. "," . $opacity_ultra_light . ")";
					break;

				// Footer

				case 'footer_dark_gray':
					return "rgba(" . barberry_hex2rgb(self::getOption('footer_font_color')) 	. "," . $opacity_dark . ")";
					break;
				case 'footer_medium_gray':
					return "rgba(" . barberry_hex2rgb(self::getOption('footer_font_color')) 	. "," . $opacity_medium . ")";
					break;
				case 'footer_light_gray':
					return "rgba(" . barberry_hex2rgb(self::getOption('footer_font_color')) 	. "," . $opacity_light . ")";
					break;
				case 'footer_ultra_light_gray':
					return "rgba(" . barberry_hex2rgb(self::getOption('footer_font_color')) 	. "," . $opacity_ultra_light . ")";
					break;

				case 'footer_hover_dark_gray':
					return "rgba(" . barberry_hex2rgb(self::getOption('footer_hover_font_color')) 	. "," . $opacity_dark . ")";
					break;
				case 'footer_hover_medium_gray':
					return "rgba(" . barberry_hex2rgb(self::getOption('footer_hover_font_color')) 	. "," . $opacity_medium . ")";
					break;
				case 'footer_hover_light_gray':
					return "rgba(" . barberry_hex2rgb(self::getOption('footer_hover_font_color')) 	. "," . $opacity_light . ")";
					break;
				case 'footer_hover_ultra_light_gray':
					return "rgba(" . barberry_hex2rgb(self::getOption('footer_hover_font_color')) 	. "," . $opacity_ultra_light . ")";
					break;

				// Base Color

				case 'base_color_dark':
					return "rgba(" . barberry_hex2rgb(self::getOption('base_color_scheme')) 	. "," . $opacity_dark . ")";
					break;

				case 'base_color_medium':
					return "rgba(" . barberry_hex2rgb(self::getOption('base_color_scheme')) 	. "," . $opacity_medium . ")";
					break;

				case 'base_color_light':
					return "rgba(" . barberry_hex2rgb(self::getOption('base_color_scheme')) 	. "," . $opacity_light . ")";
					break;

				case 'base_color_ultra_light':
					return "rgba(" . barberry_hex2rgb(self::getOption('base_color_scheme')) 	. "," . $opacity_ultra_light . ")";
					break;	

					case 'main_font_color_ultra_light':
						return "rgba(" . barberry_hex2rgb(self::getOption('main_font_color')) 	. "," . $opacity_ultra_light . ")";
						break;

				case 'base_color_ultra_light_plus':
					return "rgba(" . barberry_hex2rgb(self::getOption('base_color_scheme')) 	. "," . $opacity_ultra_light_plus . ")";
					break;																			

				// Buttons

				case 'button_border_opacity':
					return "rgba(" . barberry_hex2rgb(self::getOption('bg_button_color')) 	. "," . $opacity_ultra_light . ")";
					break;

				case 'button_color_opacity':
					return "rgba(" . barberry_hex2rgb(self::getOption('bg_button_color')) 	. "," . $opacity_medium . ")";
					break;

				case 'button_color_opacity_light':
					return "rgba(" . barberry_hex2rgb(self::getOption('bg_button_color')) 	. "," . $opacity_light . ")";
					break;

				case 'button_color_opacity_light_plus':
					return "rgba(" . barberry_hex2rgb(self::getOption('bg_button_color')) 	. "," . $opacity_ultra_light_plus . ")";
					break;					

				}

				return $value;
		}



		/**
		 * Return the theme option from cache; if it isn't cached fetch it and cache it
		 *
		 * @param  string $option_name 
		 * @param  string $default     
		 *
		 * @return string
		 */
		public static function getOption( $option_name, $default= '' ) {
			/* Return cached if possible */
			if ( array_key_exists($option_name, self::$cached) && empty($default) )
				return self::$cached[$option_name];
			/* If no default is given, fetch from theme defaults variable */
			if (empty($default)) {
				$default = array_key_exists($option_name, self::theme_defaults())? self::theme_defaults()[$option_name] : '';
			}

			$opt= get_theme_mod($option_name, $default);
			// echo '<br/>I did a database query<br/>';
			
			/* Cache the result */
			self::$cached[$option_name]= $opt;

			/* Process the variable */
			if ( $opt !== self::processOption($option_name, $opt) ) {
				self::$cached[$option_name]= self::processOption($option_name, $opt);
			}
			

			return self::$cached[$option_name];
		}
	}





?>