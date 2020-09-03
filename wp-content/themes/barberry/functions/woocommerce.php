<?php 

if ( ! defined('BARBERRY_THEME_DIR')) exit('No direct script access allowed');

/**
 * Class for all WooCommerce template modification
 *
 * @version 1.0
 */
class Barberry_WooCommerce {


	/**
	 * Construction function
	 *
	 * @since  1.0
	 * @return Barberry_WooCommerce
	 */
	function __construct() {

		// Check if Woocomerce plugin is actived
		if ( ! in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
			return;
		}

		// Define all hook
		add_action( 'template_redirect', array( $this, 'hooks' ) );

		// Need an early hook to ajaxify update mini shop cart
		add_filter( 'woocommerce_add_to_cart_fragments', array( $this, 'add_to_cart_fragments' ) );

		add_action( 'wp_ajax_barberry_remove_mini_cart_item', array( $this, 'remove_mini_cart_item' ) );
		add_action( 'wp_ajax_nopriv_barberry_remove_mini_cart_item', array( $this, 'remove_mini_cart_item' ) );	

		add_action( 'wp_ajax_barberry_update_wishlist_count', array( $this, 'update_wishlist_count' ) );
		add_action( 'wp_ajax_nopriv_barberry_update_wishlist_count', array( $this, 'update_wishlist_count' ) );
		

		if ( class_exists( 'TA_WC_Variation_Swatches_Frontend' ) && is_admin() ) {
			add_action( 'init', array( 'TA_WC_Variation_Swatches_Frontend', 'instance' ) );
		}	

	}

	/**
	 * Hooks to WooCommerce actions, filters
	 *
	 * @since  1.0
	 * @return void
	 */
	function hooks() {

		add_action( 'woocommerce_before_shop_loop_item', array( $this, 'product_attribute' ), 10 );

		/*-----------------------------------------------------------------------------------*/
		/*	Result Count & Catalog Ordering
		/*-----------------------------------------------------------------------------------*/

		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20, 0 );
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30, 0 );
		add_action( 'barberry_woocommerce_result_count', 'woocommerce_result_count', 20 );
		add_action( 'barberry_woocommerce_catalog_ordering', 'woocommerce_catalog_ordering', 30, 0 );

 		

		// Add shop toolbar
		add_action( 'woocommerce_before_shop_loop', array( $this, 'barberry_shop_toolbar' ), 20 );

		// Add loading shop
		add_action( 'woocommerce_before_shop_loop', array( $this, 'shop_loading' ), 40 );

		// Add div before shop loop
		add_action( 'woocommerce_before_shop_loop', array( $this, 'before_shop_loop' ), 30 );

		// Add div after shop loop
		add_action( 'woocommerce_after_shop_loop', array( $this, 'after_shop_loop' ), 20 );	

		// Change shop columns
		// add_filter( 'loop_shop_columns', array( $this, 'shop_columns' ), 20 );	

		// Remove breadcrumb, use theme's instead
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );		

		// Remove product link
		remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );		

		remove_action( 'woocommerce_before_subcategory', 'woocommerce_template_loop_category_link_open', 10 );
		remove_action( 'woocommerce_after_subcategory', 'woocommerce_template_loop_category_link_close', 10 );		

		// Wrap product loop content
		add_action( 'woocommerce_before_shop_loop_item', array( $this, 'open_product_inner' ), 1 );
		add_action( 'woocommerce_after_shop_loop_item', array( $this, 'close_product_inner' ), 50 );	

		// Add product thumbnail
		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail' );
		add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'product_content_thumbnail' ) );		

		// Add product title link
		remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
		add_action( 'woocommerce_shop_loop_item_title', array( $this, 'products_title' ), 10 );

		// Don’t display prices with 0 decimals in WooCommerce
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
		add_action( 'title_loop_rating', 'woocommerce_template_loop_rating', 1 );

		// Remove Single Product Sale from the original place

		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
		add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_show_product_loop_sale_flash', 15 );

		// woocommerce_shop_loop_wishlist
		add_action( 'woocommerce_shop_loop_wishlist', 'add_wishlist_icon_in_product_card', 10);

		// woocommerce_shop_loop_compare
		add_action( 'woocommerce_shop_loop_compare', 'add_compare_icon_in_product_card', 10);				

		// woocommerce_shop_loop_quick_view
		add_action( 'woocommerce_shop_loop_quick_view', 'barberry_product_quick_view_button', 10 );

		// Change possition cross sell
		remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
		add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display' );	

		// Change columns and total of cross sell
		add_filter( 'woocommerce_cross_sells_columns', array( $this, 'cross_sells_columns' ) );
		add_filter( 'woocommerce_cross_sells_total', array( $this, 'cross_sells_numbers' ) );

		// Change possition of coupon input on checkout page
		remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
		add_action( 'woocommerce_checkout_links', 'woocommerce_checkout_coupon_form' );		

		// Change possition of login input on checkout page
		remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10 );
		add_action( 'woocommerce_checkout_links', 'woocommerce_checkout_login_form' );

		// Timer on the shop catalog
		add_action( 'woocommerce_before_shop_loop_item_title', 'barberry_shop_countdown', 15 );	

		// Timer on the single product page
		add_action( 'woocommerce_single_product_summary_single_countdown', 'barberry_single_product_countdown', 15 );	

        // Buy Now Button 
        add_action('woocommerce_after_add_to_cart_button', 'barberry_add_buy_now_btn');	

      	

		// Stock Progress Bar
        if ( intval( TDL_Opt::getOption('product_progess_stock') ) ) {
            add_filter('woocommerce_get_stock_html', 'barberry_single_stock', 10, 2);
        }				

		// Orders account
		add_action( 'woocommerce_account_dashboard', 'woocommerce_account_orders', 15 );

		// Product Thumbnails
		add_filter( 'barberry_after_single_product_image', array( $this, 'barberry_product_thumbnails' ) );


		// Change number of related products
		add_filter( 'woocommerce_output_related_products_args', array( $this, 'related_products' ) );

		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

		if ( intval( TDL_Opt::getOption('upsells_products') ) ) {
			add_action( 'woocommerce_after_single_product_summary_upsell_display', array( $this, 'upsell_products' ), 15 );
		}
		if ( intval( TDL_Opt::getOption('related_products') ) ) {
			add_action( 'woocommerce_after_single_product_summary_related_products', 'woocommerce_output_related_products', 20 );	
		}	
	
	

		/*-----------------------------------------------------------------------------------*/
		/*	Remove Woocommerce Styles
		/*-----------------------------------------------------------------------------------*/		

		add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

	}


	/*-----------------------------------------------------------------------------------*/
	/*	Shop loading
	/*-----------------------------------------------------------------------------------*/

	function shop_loading() {
		if ( ! barberry_is_shop_archive() ) {
			return;
		}
		echo '<div id="shop-loading" class="shop-loading"><div class="barberry-loader"></div></div>';
	}

	/*-----------------------------------------------------------------------------------*/
	/*	Before Shop Loop
	/*-----------------------------------------------------------------------------------*/

	function before_shop_loop() {
		if ( ! barberry_is_shop_archive() ) {
			return;
		}
		echo '<div id="shop-content" class="shop-content"><div class="shop-content-inner">';
	}


	/*-----------------------------------------------------------------------------------*/
	/*	After Shop Loop
	/*-----------------------------------------------------------------------------------*/

	function after_shop_loop() {
		if ( ! barberry_is_shop_archive() ) {
			return;
		}
		echo '</div></div>';
	}	

	/*-----------------------------------------------------------------------------------*/
	/*	Change the shop columns
	/*-----------------------------------------------------------------------------------*/
	
	function shop_columns( $columns ) {
		$columns = intval( TDL_Opt::getOption('product_columns') );


		return apply_filters( 'barberry_shop_columns', $columns );

	}

	/*-----------------------------------------------------------------------------------*/
	/*	Display a tool bar on top of product archive
	/*-----------------------------------------------------------------------------------*/	

	function barberry_shop_toolbar() {

		if ( ! barberry_is_shop_archive() ) {
			return;
		}

		$output = array();
		$shop_view = '';

		// Result Count

		$found = '';
		global $wp_query;

		$product_count = '<span>'.$wp_query->found_posts.'</span>';

		if ( $wp_query && isset( $product_count ) ) {
			$found = sprintf( _n('We\'ve got %s product for you', 'We\'ve got %s products for you', $wp_query->found_posts, 'barberry'), '<span>'.$wp_query->found_posts.'</span>' );
		}

		if ( $found ) {
			$found = sprintf( '<div class="product-found"><div>%s</div></div>', $found );
		}

		$output[] = $found;

		// Sidebar

		$sidebar = '';
		if ( 1==TDL_Opt::getOption('shop_sidebar') ) {
			$sidebar = sprintf( '<div class="barberry-show-sidebar-btn"><svg width="16" height="16"><g class="nc-icon-wrapper" fill="none" stroke-linecap="round" stroke-linejoin="round"><rect x=".5" y="1.5" width="15" height="13" rx="1" ry="1" data-cap="butt"/><path data-cap="butt" d="M8.5 1.5v13"/><path data-cap="butt" data-color="color-2" d="M11 8h2M11 5h2M11 11h2"/></g></svg></div>' );
		}

		// Filter

		$filters = '';
		if ( TDL_Opt::getOption('shop_filters') ) {
			$filters = sprintf( '<button class="button filter_switch" data-toggled="off"><span class="f-cross"><i class="f-plus"></i></span><span class="f-switchtext"><span class="f-switchword is-show">%s</span><span class="f-switchword is-close">%s</span></span></button>', esc_html__( 'Filters', 'barberry' ), esc_html__( 'Close', 'barberry' ) );
		}

		$sort_by = '';
			ob_start();
			woocommerce_catalog_ordering();
			$sort_by  = ob_get_clean();
	
		
			$output[] = sprintf( '<div class="woocommerce-archive-header-tools">%s %s %s</div>', $sidebar, $sort_by, $filters );

			

		if ( $output ) {
			?>

			<?php if ( woocommerce_product_loop() ) { ?>
				<!-- begin woocommerce-archive-header -->
				<header class="woocommerce-archive-header">
					<!-- begin woocommerce-archive-header-inside -->
					<div class="woocommerce-archive-header-inside">
						<?php echo implode( ' ', $output ); ?>
					</div><!-- end woocommerce-archive-header-inside -->	

					<?php $this->shop_filter_content(); ?>

					<?php $this->shop_active_filters(); ?>
		
				</header>
				<!-- end woocommerce-archive-header -->				
			<?php } ?>

			<?php
		}
	}


	//==============================================================================
	// Wrap product content. Open a Div
	//==============================================================================

	function open_product_inner() {
		echo '<div class="product-inner-wrapper">';
	}

	//==============================================================================
	// Wrap product content. Close a Div
	//==============================================================================

	function close_product_inner() {
		echo '</div>';
	}

	//==============================================================================
	// Active Filters
	//==============================================================================
	function shop_active_filters() {
		?>
		<div class="barberry-active-filters">
			<?php 

				do_action( 'barberry_before_active_filters_widgets' );

			?>			
		</div>

		<?php
	}

	//==============================================================================
	// Shop Filter Content
	//==============================================================================

	function shop_filter_content() {

		if ( ! TDL_Opt::getOption('shop_filters') ) {
			return;
		}

		$widgets = wp_get_sidebars_widgets();
		$shop_filters_area_widgets_counter = (count($widgets['shop-filters-area']) >= 5) ? 4 : count($widgets['shop-filters-area']);

		foreach( $widgets['shop-filters-area'] as $k ) {
			if(strpos($k, 'monster-') !== false) {
				$shop_filters_area_widgets_counter = 4;
			}
		} ?>

		<!-- begin site-shop-filters -->
		<div class="site-shop-filters">
			<!-- begin site-shop-filters-inside -->
			<div class="site-shop-filters-inside">

				<?php if (isset($widgets['shop-filters-area'])) : ?>

					<aside class="widget-area">
						<div class="grid-x small-up-1 medium-up-3 large-up-<?php echo esc_attr($shop_filters_area_widgets_counter); ?> shop-filters-area-content">
							<?php dynamic_sidebar( 'shop-filters-area' ); ?>
						</div>						
					</aside>

				<?php endif; ?>
				
			</div>
			<!-- end site-shop-filters-inside -->
		</div>
		<!-- end site-shop-filters -->

	<?php
	}


	//==============================================================================
	// Display upsell products
	//==============================================================================


	function upsell_products() {
		$upsell_numbers = intval( TDL_Opt::getOption('upsells_products_numbers') );
		$upsell_columns = intval( TDL_Opt::getOption('upsells_products_columns') );

		if ( $upsell_columns && $upsell_numbers ) {
			woocommerce_upsell_display( $upsell_numbers, $upsell_columns );
		}

	}


	//==============================================================================
	// Change related products args to display in correct grid
	//==============================================================================

	function related_products( $args ) {

		$args['posts_per_page'] = intval( TDL_Opt::getOption('related_products_numbers') );
		$args['columns'] = intval( TDL_Opt::getOption('related_products_columns') );

		return $args;
	}

	//==============================================================================
	// WooCommerce Loop Product Content Thumbs
	//==============================================================================

	function product_content_thumbnail() {
		global $product, $post, $woocommerce_loop;

		$attachment_ids  = $product->get_gallery_image_ids();
		$secondary_thumb = intval( TDL_Opt::getOption('disable_secondary_thumb') );		

		$css_image = 'loop-thumbnail';
		if ( count( $attachment_ids ) == 0 || $secondary_thumb ) {
			$css_image .= ' product-thumbnail-single';
		}

		printf( '<a class="%s" href ="%s">', esc_attr( $css_image ), esc_url( get_the_permalink() ) );		

		$image_size = 'shop_catalog';
		$image_size = apply_filters( 'single_product_archive_thumbnail_size', $image_size );

		if ( has_post_thumbnail() ) {
			$post_thumbnail_id = get_post_thumbnail_id( $post );
			echo barberry_get_image_html( $post_thumbnail_id, $image_size );

		} elseif( function_exists('wc_placeholder_img_src') ) {
			echo sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'barberry' ) );
        }

		if ( ! $secondary_thumb ) {
			if ( count( $attachment_ids ) > 0 && isset ( $attachment_ids[0] ) ) {
				echo barberry_get_image_html( $attachment_ids[0], $image_size, 'image-hover' );
			}
		}	

		echo '</a>';

		echo '<div class="footer-section">';
		echo '<div class="footer-section-inner">';

		do_action( 'woocommerce_shop_loop_quick_view' );

		if ( function_exists( 'woocommerce_template_loop_add_to_cart' ) ) {
			woocommerce_template_loop_add_to_cart();
		}

		do_action( 'woocommerce_shop_loop_wishlist' );
		do_action( 'woocommerce_shop_loop_compare' );


		echo '</div>';
		echo '</div>';	

	}


	//==============================================================================
	// Add product title link
	//==============================================================================

	function products_title() { ?>

		<?php
		echo '<h3 class="product-title">';
		echo do_action( 'title_loop_rating' );
		printf( '<a href="%s">%s</a>', esc_url( get_the_permalink() ), get_the_title() );
		echo '</h3>';
	}


	//==============================================================================
	// Ajaxify update cart viewer
	//==============================================================================


	function add_to_cart_fragments( $fragments ) {
		global $woocommerce;

		if ( empty( $woocommerce ) ) {
			return $fragments;
		}

		ob_start();
		?>


          <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="cart-contents">
              <div class="cart-desc">
                <span class="cart_total"><?php echo WC()->cart->get_cart_subtotal(); ?></span>
                <?php esc_html_e( 'Cart', 'barberry' ); ?>
              </div>
              <i class="cart-button-icon"></i>
              <span class="cart_items_number counter_number animated rubberBand"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></span>
          </a>


		<?php
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}


	//==============================================================================
	// Remove mini cart item
	//==============================================================================

	function remove_mini_cart_item() {
		global $woocommerce;
		$nonce       = isset( $_POST['nonce'] ) ? $_POST['nonce'] : '';
		$remove_item = isset( $_POST['item'] ) ? $_POST['item'] : '';
		$response    = 0;
		if ( wp_verify_nonce( $nonce, '_barberry_nonce' ) && ! empty( $remove_item ) ) {
			$woocommerce->cart->remove_cart_item( $remove_item );
			$response = 1;
		}
		// Send the comment data back to Javascript.
		wp_send_json_success( $response );
		die();
	}

	//==============================================================================
	// Change number of columns when display cross sells products
	//==============================================================================

	function cross_sells_columns( $cross_columns ) {
		return apply_filters( 'barberry_cross_sells_columns', 5 );
	}

	//==============================================================================
	// Change number of columns when display cross sells products
	//==============================================================================

	function cross_sells_numbers( $cross_numbers ) {
		return apply_filters( 'barberry_cross_sells_total', 5 );
	}

	//==============================================================================
	// Display product attribute
	//==============================================================================

	function product_attribute() {

		global $tdl_options;

		$default_attribute = sanitize_title( TDL_Opt::getOption('product_attribute') );

		if ( $default_attribute == '' || $default_attribute == 'none' ) {
			return;
		}

		$default_attribute = 'pa_' . $default_attribute;

		global $product;
		$attributes         = maybe_unserialize( get_post_meta( $product->get_id(), '_product_attributes', true ) );
		$product_attributes = maybe_unserialize( get_post_meta( $product->get_id(), 'attributes_extra', true ) );

		if ( $product_attributes == 'none' ) {
			return;
		}

		if ( $product_attributes == '' ) {
			$product_attributes = $default_attribute;
		}

		$variations = $this->get_variations( $product_attributes );

		if ( ! $attributes ) {
			return;
		}

		foreach ( $attributes as $attribute ) {


			if ( $product->get_type() == 'variable' ) {
				if ( ! $attribute['is_variation'] ) {
					continue;
				}
			}

			if ( sanitize_title( $attribute['name'] ) == $product_attributes ) {

				echo '<div class="attr-swatches">';
				if ( $attribute['is_taxonomy'] ) {
					$post_terms = wp_get_post_terms( $product->get_id(), $attribute['name'] );

					$attr_type = '';

					if ( function_exists( 'TA_WCVS' ) ) {
						$attr = TA_WCVS()->get_tax_attribute( $attribute['name'] );
						if ( $attr ) {
							$attr_type = $attr->attribute_type;
						}
					}
					$found = false;
					foreach ( $post_terms as $term ) {
						$css_class = '';
						if ( is_wp_error( $term ) ) {
							continue;
						}
						if ( $variations && isset( $variations[$term->slug] ) ) {
							$attachment_id = $variations[$term->slug];
							$attachment    = wp_get_attachment_image_src( $attachment_id, 'shop_catalog' );
							$image_srcset  = '';

								$image_srcset = wp_get_attachment_image_srcset( $attachment_id, 'shop_catalog' );


							if ( $attachment_id == get_post_thumbnail_id() && ! $found ) {
								$css_class .= ' selected';
								$found = true;
							}

							if ( $attachment ) {
								$css_class .= ' br-swatch-variation-image';
								$img_src = $attachment[0];
								echo wp_kses_post($this->swatch_html( $term, $attr_type, $img_src, $css_class, $image_srcset ));
							}

						}
					}
				}
				echo '</div>';
				break;
			}
		}

	}

	//==============================================================================
	// Print HTML of a single swatch
	//==============================================================================

	public function swatch_html( $term, $attr_type, $img_src, $css_class, $image_srcset ) {

		$html = '';
		$name = $term->name;

		switch ( $attr_type ) {
			case 'color':
				$color = get_term_meta( $term->term_id, 'color', true );
				list( $r, $g, $b ) = sscanf( $color, "#%02x%02x%02x" );
				$html = sprintf(
					'<span class="swatch swatch-color %s" data-src="%s" data-src-set="%s"><span class="sub-swatch"><span class="sub-swatch-bg" style="background-color:%s;color:%s;"></span><span class="tooltip">%s</span></span></span>',
					esc_attr( $css_class ),
					esc_url( $img_src ),
					esc_attr( $image_srcset ),
					esc_attr( $color ),
					"rgba($r,$g,$b,0.5)",
					esc_attr( $name )
				);
				break;

			case 'image':
				$image = get_term_meta( $term->term_id, 'image', true );
				if ( $image ) {
					$image = wp_get_attachment_image_src( $image );
					$image = $image ? $image[0] : WC()->plugin_url() . '/assets/images/placeholder.png';
					$html  = sprintf(
						'<span class="swatch swatch-image %s" data-src="%s" data-src-set="%s">
						<span class="sub-swatch">
						<span class="sub-swatch-bg"><img src="%s"></span>
						<span class="tooltip">%s</span>
						</span>
						</span>',
						esc_attr( $css_class ),
						esc_url( $img_src ),
						esc_attr( $image_srcset ),
						esc_url( $image ),
						esc_attr( $name )
					);
				}

				break;

			default:
				$label = get_term_meta( $term->term_id, 'label', true );
				$label = $label ? $label : $name;
				$html  = sprintf(
					'<span class="swatch swatch-label %s" data-src="%s" data-src-set="%s" title="%s"><span>%s</span></span>',
					esc_attr( $css_class ),
					esc_url( $img_src ),
					esc_attr( $image_srcset ),
					esc_attr( $name ),
					esc_html( $label )
				);
				break;


		}

		return $html;
	}



	//==============================================================================
	// Get variations
	//==============================================================================

	function get_variations( $default_attribute ) {
		global $product;

		$variations = array();
		if ( $product->get_type() == 'variable' ) {
			$args = array(
				'post_parent' => $product->get_id(),
				'post_type'   => 'product_variation',
				'orderby'     => 'menu_order',
				'order'       => 'ASC',
				'fields'      => 'ids',
				'post_status' => 'publish',
				'numberposts' => - 1
			);

			if ( 'yes' === get_option( 'woocommerce_hide_out_of_stock_items' ) ) {
				$args['meta_query'][] = array(
					'key'     => '_stock_status',
					'value'   => 'instock',
					'compare' => '=',
				);
			}

			$thumbnail_id = get_post_thumbnail_id();

			$posts = get_posts( $args );

			foreach ( $posts as $post_id ) {
				$attachment_id = get_post_thumbnail_id( $post_id );
				$attribute     = $this->get_variation_attributes( $post_id, 'attribute_' . $default_attribute );

				if ( ! $attachment_id ) {
					$attachment_id = $thumbnail_id;
				}

				if ( $attribute ) {
					$variations[$attribute[0]] = $attachment_id;
				}

			}

		}

		return $variations;
	}


	//==============================================================================
	// Ajaxify update count wishlist
	//==============================================================================

	function update_wishlist_count() {
		if ( ! function_exists( 'YITH_WCWL' ) ) {
			return;
		}

		wp_send_json( YITH_WCWL()->count_products() );

	}


	/*-----------------------------------------------------------------------------------*/
	/*	Get product thumbnails
	/*-----------------------------------------------------------------------------------*/

	function barberry_product_thumbnails() {

		global $post, $product, $woocommerce;
		$attachment_ids = $product->get_gallery_image_ids();
		$page_product_video = get_field('tdl_video_review');
		$numb = count($attachment_ids) + 1;

		$product_layout = 1;

		switch ( barberry_product_layout(get_the_ID()) ) {        
		    case "default":
		        $product_layout = 1;
		        break;
		    case "style_2":
		        $product_layout = 1;
		        break;
		    case "style_3":
		        $product_layout = 0;
		        break;
		    default:
		        $product_layout = 1;
		        break;
		}

		$thumb_position = 'bottom';

		switch ( barberry_product_thumbs(get_the_ID()) ) {        
		    case "bottom":
		        $thumb_position = 'bottom';
		        break;
		    case "left":
		        $thumb_position = 'left';
		        break;
		    case "right":
		        $thumb_position = 'right';;
		        break;
		    default:
		        $thumb_position = 'bottom';
		        break;
		}
		

		if ( $attachment_ids || $page_product_video ) {
		$loop    = 1;
		?>

		<?php if ( $numb > 1 ) { ?>

			<?php if ( $product_layout == 1 && TDL_Opt::getOption('product_sidebar') == 0 && $thumb_position != 'bottom' ) { ?>

				<!-- begin product-vr-thumbnails-wrapper -->
				<div class="product-vr-thumbnails-wrapper">
					<!-- begin product-thumbnails -->
					<div class="product-vr-thumbnails-container" data-thumb="<?php echo esc_attr($numb) ?>" data-parallax='{"y" : 30, "smoothness": 20}'>
						<!-- begin product-thumbnails -->
						<div class="product-vr-thumbnails">

		
							
						</div>
						<!-- end product-thumbnails -->		
					</div>
					<!-- end product-thumbnails-container -->				
				</div>
				<!-- end product-vr-thumbnails-wrapper -->	

			<?php } ?>




		<!-- begin product-thumbnails-wrapper -->
		<div class="product-thumbnails-wrapper">
			
		<!-- begin product-thumbnails -->
		<div class="product-thumbnails-container" data-thumb="<?php echo esc_attr($numb) ?>"  data-parallax='{"y" : 30, "smoothness": 20}'>
			<!-- begin product-thumbnails -->
			<div class="product-thumbnails">

		
				
			</div>
			<!-- end product-thumbnails -->		
		</div>
		<!-- end product-thumbnails-container -->	

		</div>
		<!-- end product-thumbnails-wrapper -->		

		<?php } ?>

		<?php
		}
	}




	//==============================================================================
	// Get variation attribute
	//==============================================================================

	public function get_variation_attributes( $child_id, $attribute ) {
		global $wpdb;

		$values = array_unique(
			$wpdb->get_col(
				$wpdb->prepare(
					"SELECT meta_value FROM {$wpdb->postmeta} WHERE meta_key = %s AND post_id IN (" . $child_id . ")",
					$attribute
				)
			)
		);

		return $values;
	}
}

/*-----------------------------------------------------------------------------------*/
/*	Check if WooCommerce is active
/*-----------------------------------------------------------------------------------*/

if( ! function_exists( 'barberry_woocommerce_installed' ) ) {
	function barberry_woocommerce_installed() {
	    return class_exists( 'WooCommerce' );
	}
}

/*-----------------------------------------------------------------------------------*/
/*	WooCommerce Wrap Oembed Stuff
/*-----------------------------------------------------------------------------------*/


add_filter('embed_oembed_html', 'barberry_embed_oembed_html', 99, 4);
function barberry_embed_oembed_html($html, $url, $attr, $post_id) {
    if ( strstr( $html,'youtube.com/embed/' ) || strstr( $html,'player.vimeo.com' ) ) {
        return '<div class="video-container responsive-embed widescreen">' . $html . '</div>';
    }

    return '<div class="video-container">' . $html . '</div>';
}


if ( barberry_woocommerce_installed() ) {


	//==============================================================================
	//  Compatible WooCommerce_Advanced_Free_Shipping
	//==============================================================================	

	add_action('barberry_subtotal_free_shipping', 'barberry_subtotal_free_shipping');

	if (!function_exists('barberry_subtotal_free_shipping')) :
	    function barberry_subtotal_free_shipping($return = false) {
	        $content = '';
	        
	        /**
	         * Check active plug-in WooCommerce || WooCommerce_Advanced_Free_Shipping
	         */
	        if (!BARBERRY_WOOCOMMERCE_IS_ACTIVE || !class_exists('WooCommerce_Advanced_Free_Shipping') || !function_exists('WAFS')) {
	            return $content;
	        }

	        /**
	         * Check setting plug-in
	         */
	        $wafs = WAFS();
	        if (!isset($wafs->was_method)) {
	            $wafs->wafs_free_shipping();
	        }
	        
	        $wafs_method = isset($wafs->was_method) ? $wafs->was_method : null;
	        if (!$wafs_method || $wafs_method->hide_shipping === 'no' || $wafs_method->enabled === 'no') {
	            return $content;
	        }

	        /**
	         * Check only 1 post wafs inputed
	         */
	        $wafs_posts = get_posts(array(
	            'posts_per_page'    => 2,
	            'post_status'       => 'publish',
	            'post_type'         => 'wafs'
	        ));
	        if (!$wafs_posts || count($wafs_posts) !== 1) {
	            return $content;
	        }

	        /**
	         * Check only 1 rule on 1 post inputed
	         */
	        $wafs_post = $wafs_posts[0];
	        $condition_groups = get_post_meta($wafs_post->ID, '_wafs_shipping_method_conditions', true);
	        if (!$condition_groups || count($condition_groups) !== 1) {
	            return;
	        }
	        $condition_group = $condition_groups[0];
	        if (!$condition_group || count($condition_group) !== 1) {
	            return $content;
	        }

	        /**
	         * Check rule is subtotal
	         */
	        $value = 0;
	        foreach ($condition_group as $condition) {
	            if ($condition['condition'] !== 'subtotal' || $condition['operator'] !== '>=' || !$condition['value']) {
	                return $content;
	            }

	            $value = $condition['value'];
	            break;
	        }

	        $subtotalCart = WC()->cart->subtotal;
	        $spend = 0;
	        
	        /**
	         * Check free shipping
	         */
	        if ($subtotalCart < $value) {
	            $spend = $value - $subtotalCart;
	            $per = intval(($subtotalCart/$value)*100);
	            
	            $content .= '<div class="barberry-total-condition-wrap">';
	            
	            $content .= '<div class="barberry-total-condition" data-per="' . $per . '">' .
	                '<span class="barberry-total-condition-hin"><span>' . $per . '%</span></span>' .
	                '<div class="barberry-subtotal-condition"></div>' .
	            '</div>';
	            
	            $allowed_html = array(
	                'strong' => array(),
	                'a' => array(
	                    'class' => array(),
	                    'href' => array(),
	                    'title' => array()
	                ),
	                'span' => array(
	                    'class' => array()
	                ),
	                'br' => array()
	            );
	            
	            $content .= '<div class="barberry-total-condition-desc">' .
	            sprintf(
	                wp_kses(__('Spend %s more to reach <strong>Free Shipping!</strong> <a class="hide-in-cart-sidebar backtoshoplink" href="%s" title="Continue Shopping">Continue Shopping</a> <span class="hide-in-cart-sidebar">to add more products to your cart and receive free shipping for order %s.</span>', 'barberry'), $allowed_html),
	                wc_price($spend),
	                esc_url(get_permalink(wc_get_page_id('shop'))),
	                wc_price($value)
	            ) . 
	            '</div>';
	            
	            $content .= '</div>';
	        }
	        /**
	         * Congratulations! You've got free shipping!
	         */
	        else {
	            $content .= '<div class="barberry-total-condition-wrap">';
	            $content .= '<div class="barberry-total-condition-desc">';
	            $content .= sprintf(
	                esc_html__("Congratulations! You get free shipping with your order greater %s.", 'barberry'),
	                wc_price($value)
	            );
	            $content .= '</div>';
	            $content .= '</div>';
	        }
	        
	        if (!$return) {
	            echo wp_kses_post($content);
	            
	            return;
	        }
	        
	        return $content;
	    }
	endif;


	//==============================================================================
	// Add Free_Shipping to Cart page
	//==============================================================================

	add_action('woocommerce_cart_contents', 'barberry_subtotal_free_shipping_in_cart');
	if (!function_exists('barberry_subtotal_free_shipping_in_cart')) :
	    function barberry_subtotal_free_shipping_in_cart() {
	        $content = barberry_subtotal_free_shipping(true);
	        
	        if ($content !== '') {
	            echo '<tr class="barberry-no-border"><td colspan="6" class="barberry-subtotal_free_shipping">' . $content . '</td></tr>';
	        }
	    }
	endif;



	//==============================================================================
	// My Account Wishlist Section Start
	//==============================================================================

	if( ! function_exists( 'barberry_my_account_wishlist_start' ) ) {
		function barberry_my_account_wishlist_start(){
			if ( !is_user_logged_in() || empty(TDL_Opt::getOption('my_account_wishlist')) ) return;
			?>
				<div class="woocommerce">

					<div class="grid-x account-cells">

						<div class="account-intro cell large-4">
							<!-- begin account-intro-wrapper -->
							<div class="account-intro-wrapper">

								<div class="account-nav-top">

									<div class="title-wrapper">

									<?php barberry_breadcrumbs(); ?>

									<?php
										$user = get_user_by( 'ID', get_current_user_id() );
										if ( $user ) {
									?>
										<div class="page-title-wrapper">
											<?php printf( '<h1 class="page-title">%s %s</h1>', esc_html__( 'Hi', 'barberry' ), $user->display_name ); ?>
										</div>

									<?php } ?>					

									</div>

									<?php do_action( 'woocommerce_account_navigation' ); ?>

				
								</div>

								<div class="account-nav-bottom">
									<a href="<?php echo esc_url( wc_get_account_endpoint_url( 'customer-logout' ) ); ?>"><?php echo esc_html__( 'Logout', 'woocommerce' ); ?></a>
								</div>	

							</div>
							<!-- end account-intro-wrapper -->
						</div>


			<?php
		}
		add_action( 'yith_wcwl_before_wishlist_form', 'barberry_my_account_wishlist_start', 10 );
	}

	//==============================================================================
	// My Account Wishlist Section 
	//==============================================================================

	if( ! function_exists( 'barberry_my_account_wishlist_add_nav' ) ) {
		function barberry_my_account_wishlist_add_nav(){
			if ( !is_user_logged_in() || empty(TDL_Opt::getOption('my_account_wishlist')) ) return;
			$sidebar_name = 'sidebar-my-account';
			?>
			<div class="account-content cell large-8">
				<div class="woocommerce-MyAccount-content">

				
				
			<?php
		}
		add_action( 'yith_wcwl_before_wishlist_form', 'barberry_my_account_wishlist_add_nav', 10 );
	}


	//==============================================================================
	// My Account Wishlist Section End
	//==============================================================================

	if( ! function_exists( 'barberry_my_account_wishlist_end' ) ) {
		function barberry_my_account_wishlist_end(){
			if ( !is_user_logged_in() || empty(TDL_Opt::getOption('my_account_wishlist')) ) return;
			?>

						</div><!-- .woocommerce-MyAccount-content -->
					</div><!-- .account-content -->
				</div><!-- .account-cells -->
			</div><!-- .woocommerce -->
			<?php
		}
		add_action( 'yith_wcwl_after_wishlist_form', 'barberry_my_account_wishlist_end', 10 );	
	}


	//==============================================================================
	//	Display no message on search
	//==============================================================================


	add_action('woocommerce_archive_description', 'custom_add_notice_search', 10, 1);

	function custom_add_notice_search($message) {
		
		if ( is_search() ) {
			return false;
		}
	}

	//==============================================================================
	//	Clear all filters button
	//==============================================================================

	if( ! function_exists( 'barberry_clear_filters_btn' ) ) {
		function barberry_clear_filters_btn() {
			$url = $_SERVER['REQUEST_URI'];
			$filters = array( 'filter_', 'min_price', 'max_price', 'product_visibility', 'stock', 'onsales' );
			$need_clear = false;
			
			foreach ( $filters as $filter )
				if ( strpos( $url, $filter ) ) $need_clear = true;	
				
			if ( $need_clear ) {
				$reset_url = strtok( $url, '?' );
				if ( isset( $_GET['post_type'] ) ) $reset_url = add_query_arg( 'post_type', wc_clean( wp_unslash( $_GET['post_type'] ) ), $reset_url );
				?>
				<div id="barberry-filters-wrapper"  class="barberry-filters-wrapper">
					<div class="barberry-clear-filters-wrapp">
						<a class="barberry-clear-filters" href="<?php echo esc_url( $reset_url ); ?>"><?php echo esc_html__( 'Clear filters', 'barberry' ); ?></a>
					</div>
					<?php the_widget( 'WC_Widget_Layered_Nav_Filters', array(), array() ); ?>
				</div>
				<?php
			}
		}
		add_action( 'barberry_before_active_filters_widgets', 'barberry_clear_filters_btn' );
	}	

	//==============================================================================
	//	Update Cart Items Number
	//==============================================================================

	if ( !function_exists( 'barberry_shopping_bag_items_number') ) :
	add_filter('woocommerce_add_to_cart_fragments', 'barberry_shopping_bag_items_number');
	function barberry_shopping_bag_items_number($fragments) {
		ob_start(); ?>
        
        <span class="header-cart-count-number"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></span>

		<?php
		$fragments['.header-cart-count-number'] = ob_get_clean();
		return $fragments;
	}
	endif;


	//==============================================================================
	//	Get Page URL
	//==============================================================================

	function barberry_get_page_base_url() {
		if ( defined( 'SHOP_IS_ON_FRONT' ) ) {
			$link = home_url();
		} elseif ( is_post_type_archive( 'product' ) || is_page( wc_get_page_id( 'shop' ) ) ) {
			$link = get_post_type_archive_link( 'product' );
		} elseif ( is_product_category() ) {
			$link = get_term_link( get_query_var( 'product_cat' ), 'product_cat' );
		} elseif ( is_product_tag() ) {
			$link = get_term_link( get_query_var( 'product_tag' ), 'product_tag' );
		} else {
			$queried_object = get_queried_object();
			$link           = get_term_link( $queried_object->slug, $queried_object->taxonomy );
		}

		return $link;
	}

	//==============================================================================
	//	Product Quick View
	//==============================================================================

	if ( !function_exists('barberry_product_quick_view_fn')):
	add_action( 'wp_ajax_barberry_product_quick_view', 'barberry_product_quick_view_fn');
	add_action( 'wp_ajax_nopriv_barberry_product_quick_view', 'barberry_product_quick_view_fn');
	function barberry_product_quick_view_fn() {		
		if (!isset( $_REQUEST['product_id'])) {
			die();
		}
		$product_id = intval($_REQUEST['product_id']);
		// wp_query for the product
		wp('p='.$product_id.'&post_type=product');
		ob_start();
		get_template_part( 'woocommerce/quick-view' );
		echo ob_get_clean();
		die();
	}	
	endif;


	if ( !function_exists('barberry_product_quick_view_button')):
	function barberry_product_quick_view_button() {
		global $product, $custom_shop_quick_view;

		if ( ! TDL_Opt::getOption('product_quick_view') ) {
			return;
		}

		echo '
			<a href="#" class="button barberry_product_quick_view_button" data-product_id="' . $product->get_id() . '" rel="nofollow">
				<span class="tooltip">' . esc_html__( 'Quick View', 'barberry') . '</span>
			</a>
		';
	}
	endif;

	//==============================================================================
	//	Quick View Go To Product Page
	//==============================================================================

	function barberry_quickview_go_to_product_page() {
		echo '<div class="go_to_product_page_wrapper"><a href="'. get_the_permalink() .'" class="go_to_product_page">' . esc_html__('Go to product page', 'barberry') . '</a></div>';
	}


	//==============================================================================
	// WPML Compatibility
	//==============================================================================

	if( ! function_exists( 'barberry_wpml_compatibility' ) ) {
		function barberry_wpml_compatibility( $ajax_actions ) {
		   $ajax_actions[] = 'barberry_product_quick_view';
		   return $ajax_actions;
		}
		add_filter( 'wcml_multi_currency_ajax_actions', 'barberry_wpml_compatibility', 10, 1 );
	}

	//==============================================================================
	// Shop Countdown
	//==============================================================================

	if( ! function_exists( 'barberry_shop_countdown' ) ) {
		function barberry_shop_countdown( $tabs ) {
			$timer = TDL_Opt::getOption('shop_countdown');
			if( $timer ) barberry_product_sale_countdown();
		}
	}

	//==============================================================================
	// Product Countdown
	//==============================================================================

	if( ! function_exists( 'barberry_single_product_countdown' ) ) {
		function barberry_single_product_countdown( $tabs ) {
			$timer = TDL_Opt::getOption('product_countdown');
			if( $timer ) barberry_product_sale_countdown();
		}
	}


	//==============================================================================
	// Buy Now Button
	//==============================================================================

	if( ! function_exists( 'barberry_add_buy_now_btn' ) ) {
		function barberry_add_buy_now_btn() {

			if (TDL_Opt::getOption('catalog_mode_button') || !TDL_Opt::getOption('product_buy_now')) {
			    return;
			}

			echo '<input type="hidden" name="barberry_buy_now" value="0" />';
			echo '<button class="barberry-buy-now button btn--secondary">' . esc_html__('Buy it now', 'barberry') . '</button>';
		}
	}	

	//==============================================================================
	// Filter redirect checkout buy now
	//==============================================================================

	add_filter('woocommerce_add_to_cart_redirect', 'barberry_buy_it_now'); 

	//==============================================================================
	// Redirect to Checkout page after click buy now
	//==============================================================================

	if( ! function_exists( 'barberry_buy_it_now' ) ) {
	    function barberry_buy_it_now($redirect_url) {
	        if (isset($_REQUEST['barberry_buy_now']) && $_REQUEST['barberry_buy_now'] === '1') {
	            $redirect_url = wc_get_checkout_url();
	        }

	        return $redirect_url;
	    }
	}


	if (isset($_REQUEST['barberry_buy_now']) && $_REQUEST['barberry_buy_now'] === '1') {
		add_filter( 'wc_add_to_cart_message_html', 'misha_remove_add_to_cart_message' );
	}

	function misha_remove_add_to_cart_message( $message ){
			return '';
	}


	//==============================================================================
	// Stock Progress Bar
	//==============================================================================



	if( ! function_exists( 'barberry_single_stock' ) ) {
		function barberry_single_stock($html, $product) {

			if ($html == '' || !$product) {
				return $html;
			}

			$productId = $product->get_id();
			$type = $product->get_type();
			$stock = get_post_meta($productId, '_stock', true);
			$avail = $product->get_availability();

			if (!$stock && $type == 'variation') {
				global $product;

				if ($product) {
					$productId = $product->get_id();
					$stock = get_post_meta($productId, '_stock', true);
				}
			}

			if (!$stock) {
				return $html;
			}

			$total_sales = get_post_meta($productId, 'total_sales', true);
			$stock_sold = $total_sales ? round($total_sales) : 0;
			$stock_available = $stock ? round($stock) : 0;
			$percentage = $stock_available > 0 ? round($stock_sold/($stock_available + $stock_sold) * 100) : 0;

			$new_html = '<div class="stock barberry-single-product-stock">';
			$new_html .= '<p class="' . $avail['class'] . '">' . sprintf( __( '%s in stock', 'woocommerce' ), $stock_available) . '</p>';
			$new_html .= '<span class="stock-sold">';
			$new_html .= sprintf(esc_html__('Hurry, only %s left in stock!', 'barberry'), '<span>' . $stock_available . '</span>');
			$new_html .= '</span>';
			$new_html .= '<div class="barberry-product-stock-progress">';
			$new_html .= '<span class="barberry-product-stock-progress-bar" style="width:' . $percentage . '%"></span>';
			$new_html .= '</div>';
			$new_html .= '</div>';

			return $new_html;

		}
	}

	//==============================================================================
	// Checkout coupon pop-up form
	//==============================================================================


	if ( !function_exists('checkout_coupon_form')):
	function checkout_coupon_form() {
		?>

		<div class="reveal" id="couponModal" data-reveal data-close-on-click="true" data-animation-in="fade-in" data-animation-out="fade-out">

			<h3 class="login-title"><?php esc_html_e( 'Coupon code', 'woocommerce' ); ?></h3>

			<form class="checkout_coupon woocommerce-form-coupon" method="post">

				<p><?php esc_html_e( 'If you have a coupon code, please apply it below.', 'woocommerce' ); ?></p>

				<div class="coupon">
					<input type="text" name="coupon_code" class="input-text" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" id="coupon_code" value="" />
					<button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_html_e( 'Apply coupon', 'woocommerce' ); ?></button>					
				</div>

				<div class="clear"></div>
			</form>

			<div class="close-icon" data-close aria-label="Close modal">
				<span class="close-icon_top"></span>
				<span class="close-icon_bottom"></span>
			</div>	

		</div>

		<?php
	}
	endif;


	//==============================================================================
	// Checkout login pop-up form
	//==============================================================================


	if ( !function_exists('checkout_login_form')):
	function checkout_login_form() {
		?>

		<div class="reveal" id="loginModal" data-reveal data-close-on-click="true" data-animation-in="fade-in" data-animation-out="fade-out">

			<h3 class="login-title"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></h3>

			<?php 

				woocommerce_login_form(
					array(
						'message'  => esc_html__( 'If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing section.', 'woocommerce' ),
						'redirect' => wc_get_checkout_url(),
						'hidden'   => true,
					)
				);

			 ?>				

			<div class="close-icon" data-close aria-label="Close modal">
				<span class="close-icon_top"></span>
				<span class="close-icon_bottom"></span>
			</div>			 

		</div>

		<?php
	}
	endif;

	//==============================================================================
	// Add Wishlist Icon in Product Card
	//==============================================================================
	
	function add_wishlist_icon_in_product_card() {
		if (class_exists('YITH_WCWL')) : 
			global $product;
		?>
		
			<a href="<?php echo YITH_WCWL()->is_product_in_wishlist($product->get_id())? esc_url(YITH_WCWL()->get_wishlist_url()) : esc_url(add_query_arg('add_to_wishlist', $product->get_id())); ?>" 
				data-product-id="<?php echo esc_attr($product->get_id()); ?>" 
				data-product-type="<?php echo esc_attr($product->get_type()); ?>" 
				data-wishlist-url="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>" 
				data-browse-wishlist-text="<?php echo esc_attr(get_option('yith_wcwl_browse_wishlist_text')); ?>" 
				class="button barberry_product_wishlist_button <?php echo YITH_WCWL()->is_product_in_wishlist($product->get_id())? 'clicked added' : 'add_to_wishlist'; ?>" rel="nofollow">
				<span class="tooltip">
					<?php echo YITH_WCWL()->is_product_in_wishlist($product->get_id())? esc_attr(get_option( 'yith_wcwl_browse_wishlist_text' )) : esc_attr(get_option('yith_wcwl_add_to_wishlist_text')); ?>
				</span>
			</a>			

		<?php
		endif;
	}

	//==============================================================================
	// Add Compare Icon in Product Card
	//==============================================================================

	function add_compare_icon_in_product_card() {
		if (class_exists('YITH_Woocompare')) : 
			global $product, $yith_woocompare;

			$productId = $product->get_id();
			$barberry_compare = (TDL_Opt::getOption('compare_extends')) ? true : false;

			if ( ! isset( $button_text ) || $button_text == 'default' ) {
				$button_text = get_option( 'yith_woocompare_button_text', __( 'Compare', 'yith-woocommerce-compare' ) );
				do_action ( 'wpml_register_single_string', 'Plugins', 'plugin_yit_compare_button_text', $button_text );
				$button_text = apply_filters( 'wpml_translate_single_string', $button_text, 'Plugins', 'plugin_yit_compare_button_text' );
			}

		?>

        <a href="javascript:void(0);" class="button compare-link barberry_product_compare_button<?php echo esc_attr($barberry_compare) ? ' barberry-compare' : ''; ?>" data-prod="<?php echo (int) $productId; ?>" data-tip="<?php esc_attr_e($button_text); ?>" title="<?php esc_attr_e($button_text); ?>">
			<span class="tooltip">
				<?php esc_attr_e($button_text); ?>
			</span>        	
		</a>	

        <?php if (!$barberry_compare) : ?>
            <div class="add-to-link woocommerce-compare-button hide">
                <?php echo do_shortcode('[yith_compare_button]'); ?>
            </div>
        <?php endif; ?>				

		<?php
		endif;
	}

	//==============================================================================
	// Add <sup> decimals to pricing
	//==============================================================================


	if( ! function_exists( 'barberry_add_sup_decimals_to_pricing' ) ) {

		function barberry_add_sup_decimals_to_pricing( $price ) {

			$price_exploded = explode(wc_get_price_decimal_separator(), $price);
			
			if ( TDL_Opt::getOption('shop_decimals') ) {
				$price = '<span class="amount">' . $price_exploded[0] . '<sup>' . wc_get_price_decimal_separator() . $price_exploded[1] . '</sup></span>';
			}
		
			return $price;

		}

	}
	
	
	add_filter( 'wc_price', 'barberry_add_sup_decimals_to_pricing' );


	//==============================================================================
	// Change the placeholder image
	//==============================================================================

	if( ! function_exists( 'barberry_woocommerce_placeholder_img_src' ) ) {
		function barberry_woocommerce_placeholder_img_src( $src ) {
			$src = ( BARBERRY_IMAGES . '/placeholder.jpg');
			return $src;
		}
	}
	add_filter('woocommerce_placeholder_img_src', 'barberry_woocommerce_placeholder_img_src');


	//==============================================================================
	// Product label
	//==============================================================================

	if( ! function_exists( 'barberry_product_label' ) ) {
		function barberry_product_label() {
			global $product;

			$output = array();

			$percentage_label = TDL_Opt::getOption('percentage_label');

			if ( $product->is_on_sale() ) {

				$percentage = '';

				if ( $product->get_type() == 'variable' && $percentage_label ) {

					$available_variations = $product->get_variation_prices();
					$max_percentage = 0;

					foreach( $available_variations['regular_price'] as $key => $regular_price ) {
						$sale_price = $available_variations['sale_price'][$key];

						if ( $sale_price < $regular_price ) {
							$percentage = round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );

							if ( $percentage > $max_percentage ) {
								$max_percentage = $percentage;
							}
						}
					}

					$percentage = $max_percentage;
				} elseif ( ( $product->get_type() == 'simple' || $product->get_type() == 'external' ) && $percentage_label ) {
					$percentage = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
				}

				if ( $percentage ) {
					$output[] = '<span class="onsale product-label">-' . $percentage . '%' . '</span>';
				}else{
					$output[] = '<span class="onsale product-label">' . esc_html__( 'Sale', 'barberry' ) . '</span>';
				}
			}

			if( !$product->is_in_stock() && !is_product() ){
				$output[] = '<span class="out-of-stock product-label">' . esc_html__( 'Sold out', 'barberry' ) . '</span>';
			}	

			if ( $product->is_featured() && TDL_Opt::getOption('hot_label') ) {
				$output[] = '<span class="featured product-label">' . esc_html__( 'Hot', 'barberry' ) . '</span>';
			}	

			if ( get_field('tdl_new_label') && TDL_Opt::getOption('new_label') ) {
				$output[] = '<span class="new product-label">' . esc_html__( 'New', 'barberry' ) . '</span>';
			}					
			
			if ( $output ) {
				echo '<div class="product-labels labels-' . TDL_Opt::getOption('label_shape') . '">' . implode( '', $output ) . '</div>';
			}		

		}
	}

	add_filter( 'woocommerce_sale_flash', 'barberry_product_label', 10 );

	//==============================================================================
	// WooCommerce Breadcrumb
	//==============================================================================

	if ( ! function_exists('barberry_custom_breadcrumb') ) :
	function barberry_custom_breadcrumb($defaults) {
		$defaults['delimiter'] = '<span class="delimiter">/</span>';
		return $defaults;
	}
	add_filter( 'woocommerce_breadcrumb_defaults', 'barberry_custom_breadcrumb' );
	endif;


	//==============================================================================
	// Sticky sidebar button (Shop archive)
	//==============================================================================

	if( ! function_exists( 'barberry_sticky_sidebar_button' ) ) {
		function barberry_sticky_sidebar_button() {

			if ( TDL_Opt::getOption('shop_sidebar') && TDL_Opt::getOption('sticky_filter_button') && barberry_is_shop_archive() ) {
				echo '<a href="#" class="barberry-sticky-sidebar-btn shop-sidebar-btn"><svg width="16" height="16"><g class="nc-icon-wrapper" fill="none" stroke-linecap="round" stroke-linejoin="round"><rect x=".5" y="1.5" width="15" height="13" rx="1" ry="1" data-cap="butt"/><path data-cap="butt" d="M8.5 1.5v13"/><path data-cap="butt" data-color="color-2" d="M11 8h2M11 5h2M11 11h2"/></g></svg></a>';
			}
		}
		add_action( 'wp_footer', 'barberry_sticky_sidebar_button', 200 );
	}

	//==============================================================================
	// Sticky sidebar button (Single product)
	//==============================================================================

	if( ! function_exists( 'barberry_product_sticky_sidebar_button' ) ) {
		function barberry_product_sticky_sidebar_button() {

			if ( TDL_Opt::getOption('product_sidebar') && 'default' == TDL_Opt::getOption('product_layout') && TDL_Opt::getOption('sticky_product_filter_button') && is_singular( "product" ) ) {
				echo '<a href="#" class="barberry-sticky-sidebar-btn shop-sidebar-btn barberry-sidebar-btn-shown"><svg width="16" height="16"><g class="nc-icon-wrapper" fill="none" stroke-linecap="round" stroke-linejoin="round"><rect x=".5" y="1.5" width="15" height="13" rx="1" ry="1" data-cap="butt"/><path data-cap="butt" d="M8.5 1.5v13"/><path data-cap="butt" data-color="color-2" d="M11 8h2M11 5h2M11 11h2"/></g></svg></a>';
			}
		}
		add_action( 'wp_footer', 'barberry_product_sticky_sidebar_button', 200 );
	}


	/*-----------------------------------------------------------------------------------*/
	/*	Determine is it product attribute archieve page
	/*-----------------------------------------------------------------------------------*/

	if( ! function_exists( 'barberry_is_product_attribute_archieve' ) ) {
		function barberry_is_product_attribute_archieve() {
		    $queried_object = get_queried_object();
		    if( $queried_object && property_exists( $queried_object, 'taxonomy' ) ) {
		        $taxonomy = $queried_object->taxonomy;
		        return substr($taxonomy, 0, 3) == 'pa_';
		    }
		    return false;
		}
	}

	/*-----------------------------------------------------------------------------------*/
	/*	Add photoswipe template to body
	/*-----------------------------------------------------------------------------------*/

	add_action( 'barberry_after_footer', 'barberry_photoswipe_template', 1000 );
	if( ! function_exists( 'barberry_photoswipe_template' ) ) {
		function barberry_photoswipe_template() {
			if( is_singular( 'product' ) )
				get_template_part('woocommerce/single-product/photoswipe');
		}
	}

	/*-----------------------------------------------------------------------------------*/
	/*	WooCommerce Post Count Filter
	/*-----------------------------------------------------------------------------------*/

	if ( ! function_exists('barberry_categories_postcount_filter') ) :
	function barberry_categories_postcount_filter($variable) {
		$variable = str_replace('(', '', $variable);
		$variable = str_replace(')', '', $variable);
		return $variable;
	}
	add_filter('wp_list_categories','barberry_categories_postcount_filter');
	endif;

	/*-----------------------------------------------------------------------------------*/
	/*	WooCommerce Layered Nav Filter
	/*-----------------------------------------------------------------------------------*/

	if ( ! function_exists('barberry_layered_nav_postcount_filter') ) :
	function barberry_layered_nav_postcount_filter($variable) {
		$variable = str_replace('(', '', $variable);
		$variable = str_replace(')', '', $variable);
		return $variable;
	}
	add_filter('woocommerce_layered_nav_count','barberry_layered_nav_postcount_filter');
	endif;


	/*-----------------------------------------------------------------------------------*/
	/*	Remove WooCommerce styles and scripts
	/*-----------------------------------------------------------------------------------*/

	function barberry_woo_remove_lightboxes() {
	         
	        // Styles
	        wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
	         
	        // Scripts
	        wp_dequeue_script( 'prettyPhoto' );
	        wp_dequeue_script( 'prettyPhoto-init' );
	        wp_dequeue_script( 'fancybox' );
	        wp_dequeue_script( 'enable-lightbox' );
	      
	}
	  
	add_action( 'wp_enqueue_scripts', 'barberry_woo_remove_lightboxes', 99 );

	/*-----------------------------------------------------------------------------------*/
	/*	Woocommerce Product Page Get Caption Text
	/*-----------------------------------------------------------------------------------*/
	function wp_get_attachment( $attachment_id ) {
	    $attachment = get_post( $attachment_id );
	    return array(
	        'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
	        'caption' => $attachment->post_excerpt,
	        'description' => $attachment->post_content,
	        'href' => get_permalink( $attachment->ID ),
	        'src' => $attachment->guid,
	        'title' => $attachment->post_title
	    );
	}



	/*-----------------------------------------------------------------------------------*/
	/*	Show Woocommerce Cart Widget Everywhere
	/*-----------------------------------------------------------------------------------*/

	if ( ! function_exists('barberry_woocommerce_widget_cart_everywhere') ) :
		function barberry_woocommerce_widget_cart_everywhere() { 
		    return false; 
		};
	add_filter( 'woocommerce_widget_cart_is_hidden', 'barberry_woocommerce_widget_cart_everywhere', 10, 1 );
	endif;


	/*-----------------------------------------------------------------------------------*/
	/*	WooCommerce Reviews Tab
	/*-----------------------------------------------------------------------------------*/

	if ( ! function_exists('barberry_rename_reviews_tab') ) :
		function barberry_rename_reviews_tab($tabs) {
			global $product, $post;
			$reviews_tab_title = esc_html__( 'Reviews', 'woocommerce' ) . '<sup>' . $product->get_review_count() . '</sup>';
			return $reviews_tab_title;
		}
		add_filter( 'woocommerce_product_reviews_tab_title', 'barberry_rename_reviews_tab', 98);
	endif;


	/*-----------------------------------------------------------------------------------*/
	/*	WooCommerce Product Layout
	/*-----------------------------------------------------------------------------------*/	

	function barberry_product_layout($page_id) {

		$custom_product_layout = (!empty(TDL_Opt::getOption('product_layout'))) ? TDL_Opt::getOption('product_layout') : "default"; 
		$page_product_layout = get_field('tdl_prod_layout' , $page_id);

		$product_layout = "default";


		// Product Layout from Customiser

		switch ($custom_product_layout)
		{        
		    case "default":
		        $product_layout = "default";
		        break;
		    case "style_2":
		        $product_layout = "style_2";
		        break;
		    case "style_3":
		        $product_layout = "style_3";
		        break;
			default:
			    $product_layout = "default";
			    break;
		}


		// Overwrite Global Product Layout from Product Page Options

		switch ( $page_product_layout ) {        
			case "inherit":
			    // do nothing
			    break;
			case "default":
			    $product_layout = "default";
			    break;
			case "style_2":
			    $product_layout = "style_2";
			    break;
			case "style_3":
			    $product_layout = "style_3";
			    break;
			default:
			    // do nothing
			    break;
		}

		return $product_layout;

	}

	/*-----------------------------------------------------------------------------------*/
	/*	WooCommerce Product Thumbnails Position
	/*-----------------------------------------------------------------------------------*/	

	function barberry_product_thumbs($page_id) {

		$custom_product_thumbs = (!empty(TDL_Opt::getOption('product_thumbs'))) ? TDL_Opt::getOption('product_thumbs') : "bottom"; 
		$page_product_thumbs = get_field('tdl_prod_thumb_position' , $page_id);

		$product_thumbs = "bottom";


		// Product Thumbnails Position from Customiser

		switch ($custom_product_thumbs)
		{        
		    case "default":
		        $product_thumbs = "bottom";
		        break;
		    case "left":
		        $product_thumbs = "left";
		        break;
		    case "right":
		        $product_thumbs = "right";
		        break;
			default:
			    $product_thumbs = "bottom";
			    break;
		}


		// Overwrite Global Product Thumbnails Position from Product Page Options

		switch ( $page_product_thumbs ) {        
			case "inherit":
			    // do nothing
			    break;
			case "bottom":
			    $product_thumbs = "bottom";
			    break;
			case "left":
			    $product_thumbs = "left";
			    break;
			case "right":
			    $product_thumbs = "right";
			    break;
			default:
			    // do nothing
			    break;
		}

		return $product_thumbs;

	}

	/*-----------------------------------------------------------------------------------*/
	/*	Product Desktop Header Transparent
	/*-----------------------------------------------------------------------------------*/	

	function barberry_product_header_transparent_desktop($page_id) {

		$custom_header_transparent = (!empty(TDL_Opt::getOption('product_header_transparent_desktop'))) ? TDL_Opt::getOption('product_header_transparent_desktop') : 0; 
		$product_header_transparent = get_field('tdl_product_header_transparent_desktop' , $page_id);

		$header_transparent = 0;


		// Product Desktop Transparent from Customiser

		switch ($custom_header_transparent)
		{        
		    case "overlap":
		        $header_transparent = 1;
		        break;
		    case "no_overlap":
		        $header_transparent = 0;
		        break;
			default:
			    $header_transparent = 0;
			    break;
		}


		// Overwrite Global Product Desktop Transparent from Product Page Options

		switch ( $product_header_transparent ) {        
			case "inherit":
			    // do nothing
			    break;
			case "overlap":
			    $header_transparent = 1;
			    break;
			case "no_overlap":
			    $header_transparent = 0;
			    break;			    
			default:
			    // do nothing
			    break;
		}

		return $header_transparent;

	}




	/*-----------------------------------------------------------------------------------*/
	/*	Product Mobile Header Transparent
	/*-----------------------------------------------------------------------------------*/	

	function barberry_product_header_transparent($page_id) {

		$custom_header_transparent = (!empty(TDL_Opt::getOption('product_header_transparent'))) ? TDL_Opt::getOption('product_header_transparent') : 0; 
		$product_header_transparent = get_field('tdl_product_header_transparent' , $page_id);

		$header_transparent = 0;


		// Product Mobile Transparent from Customiser

		switch ($custom_header_transparent)
		{        
		    case "overlap":
		        $header_transparent = 1;
		        break;
		    case "no_overlap":
		        $header_transparent = 0;
		        break;
			default:
			    $header_transparent = 0;
			    break;
		}


		// Overwrite Global Product Mobile Transparent from Product Page Options

		switch ( $product_header_transparent ) {        
			case "inherit":
			    // do nothing
			    break;
			case "overlap":
			    $header_transparent = 1;
			    break;
			case "no_overlap":
			    $header_transparent = 0;
			    break;			    
			default:
			    // do nothing
			    break;
		}

		return $header_transparent;

	}


	/*-----------------------------------------------------------------------------------*/
	/*	Single Product Video
	/*-----------------------------------------------------------------------------------*/

	if (!function_exists('barberry_single_product_video_button')):
	add_action('product_tool_buttons', 'barberry_single_product_video_button');
	function barberry_single_product_video_button() {
		if (!is_product()) return;
		global $post;

		$post_custom_values 	= get_post_custom( $post->ID );
		$page_product_youtube 	= get_field('tdl_video_review');

		if (!empty($page_product_youtube)):
		?>
		  
			<div class="single_product_video_trigger"><span class="tooltip"><?php esc_attr_e('Play Video', 'barberry'); ?></span></div>

		<?php endif;
	}
	endif;


	if (!function_exists('barberry_single_product_video')):
	add_action('wp_footer', 'barberry_single_product_video');
	function barberry_single_product_video() {
		if (!is_product()) return;
		global $post;


		$post_custom_values 	= get_post_custom( $post->ID );
		$page_product_youtube 	= get_field('tdl_video_review');
		$embed_code 			= wp_oembed_get( $page_product_youtube );

		if (!empty($embed_code)):
		?>

			<div class="single_video_overlay"></div>

			<div class="single_video_container">
				<div class="youtube-video">
					<?php echo wp_oembed_get( $page_product_youtube ); ?>
					<div class="close-icon" data-close aria-label="Close modal">
						<span class="close-icon_top"></span>
						<span class="close-icon_bottom"></span>
					</div>	
				</div>
			</div>

		<?php endif;
	}
	endif;

	/*-----------------------------------------------------------------------------------*/
	/*	WooCommerce Remove Tabs Titles
	/*-----------------------------------------------------------------------------------*/	

	function barberry_product_description_heading() {
	    echo "";
	}
	add_filter( 'woocommerce_product_description_heading', 'barberry_product_description_heading' );

	
	function barberry_product_additional_information_heading() {
	    echo "";
	}
	add_filter( 'woocommerce_product_additional_information_heading', 'barberry_product_additional_information_heading' );




	/*-----------------------------------------------------------------------------------*/
	/*	PRODUCT NAVIGATION
	/*-----------------------------------------------------------------------------------*/		

	if( ! function_exists( 'barberry_products_nav' ) ) {
		function barberry_products_nav() {
			global $post;

			if ( ! TDL_Opt::getOption('product_navigation') ) {
				return;
			}
					
		    $next = get_next_post(true,'','product_cat');
		    $prev = get_previous_post(true,'','product_cat');

		    $next = ( ! empty( $next ) ) ? wc_get_product( $next->ID ) : false;
		    $prev = ( ! empty( $prev ) ) ? wc_get_product( $prev->ID ) : false;
			?>
				<div class="products-nav">
					<?php if ( ! empty( $prev ) ): ?>

						<a href="<?php echo esc_url( $prev->get_permalink() ); ?>" class="prev-product">
							<?php if ( is_rtl() ): ?>
							<div class="prev-product__text">
								<p class="link"><?php esc_attr_e('Prev product', 'barberry'); ?></p>
							</div>								
							<div class="preview">
								<div class="intrinsic">
									<div class="image-center grid-x align-center">
										<div class="image">
											<?php echo wp_kses( $prev->get_image(), array( 'img' => array('class' => true,'width' => true,'height' => true,'src' => true,'alt' => true) ) ); ?>
										</div>
									</div>
								</div>
							</div>
							<?php else: ?>
							<div class="preview">
								<div class="intrinsic">
									<div class="image-center grid-x align-center">
										<div class="image">
										<?php echo wp_kses( $prev->get_image(), array( 'img' => array('class' => true,'width' => true,'height' => true,'src' => true,'alt' => true) ) ); ?>
										</div>
									</div>
								</div>
							</div>
							<div class="prev-product__text">
								<p class="link"><?php esc_attr_e('Prev product', 'barberry'); ?></p>
							</div>								
							<?php endif; ?>


						</a>

					<?php endif ?>

					<?php if ( ! empty( $next ) ): ?>

						<a href="<?php echo esc_url( $next->get_permalink() ); ?>" class="next-product">
							<?php if ( is_rtl() ): ?>								
							<div class="preview">
								<div class="intrinsic">
									<div class="image-center grid-x align-center">
										<div class="image">
										<?php echo wp_kses( $next->get_image(), array( 'img' => array('class' => true,'width' => true,'height' => true,'src' => true,'alt' => true) ) ); ?>
										</div>
									</div>
								</div>
							</div>	
							<div class="next-product__text">
								<p class="link"><?php esc_attr_e('Next product', 'barberry'); ?></p>
							</div>							
							<?php else: ?>
							<div class="next-product__text">
								<p class="link"><?php esc_attr_e('Next product', 'barberry'); ?></p>
							</div>								
							<div class="preview">
								<div class="intrinsic">
									<div class="image-center grid-x align-center">
										<div class="image">
										<?php echo wp_kses( $next->get_image(), array( 'img' => array('class' => true,'width' => true,'height' => true,'src' => true,'alt' => true) ) ); ?>
										</div>
									</div>
								</div>
							</div>									
							<?php endif; ?>
					
						</a>						

					<?php endif ?>
				</div>
			<?php
		}
	}

	/*-----------------------------------------------------------------------------------*/
	/*	Change number or products per row
	/*-----------------------------------------------------------------------------------*/

	if ( ! function_exists( 'barberry_loop_columns') ) {
		function barberry_loop_columns() {
			$columns = intval( TDL_Opt::getOption('product_columns') );
			return $columns;
		}

		add_filter( 'loop_shop_columns', 'barberry_loop_columns', 999 );
	}


	/*-----------------------------------------------------------------------------------*/
	/*	Fix for single product image sizes
	/*-----------------------------------------------------------------------------------*/

	if ( ! function_exists( 'barberry_single_product_image_sizes') ) {
		function barberry_single_product_image_sizes() {
			$sizes = wc_get_image_size( 'woocommerce_single' );
			if ( ! $sizes['height'] ) {
				$sizes['height'] = $sizes['width'];
			}

			return array( $sizes['width'], $sizes['height'] );
		}

		add_filter( 'woocommerce_gallery_thumbnail_size', 'barberry_single_product_image_sizes' );
	}

	/*-----------------------------------------------------------------------------------*/
	/*	Mini Cart Quantity
	/*-----------------------------------------------------------------------------------*/

	if ( ! function_exists( 'barberry_alter_quantity' ) ) {
	    function barberry_alter_quantity() {
	        $quantity = filter_var(filter_input(INPUT_POST, 'quantity'), FILTER_VALIDATE_INT);
	        $cart_item_key = filter_input(INPUT_POST, 'cart_item_key');

	        WC()->cart->set_quantity( $cart_item_key, $quantity, true );
	        
	        echo json_encode( WC()->cart->get_cart_item($cart_item_key) );
	        exit;
	    }

	    add_action("wp_ajax_nopriv_barberry_alter_quantity", "barberry_alter_quantity");
	    add_action("wp_ajax_barberry_alter_quantity", "barberry_alter_quantity");
	}

	/*-----------------------------------------------------------------------------------*/
	/*	Compare list in bot site
	/*-----------------------------------------------------------------------------------*/

	add_action('barberry_show_mini_compare', 'barberry_show_mini_compare');
	if (!function_exists('barberry_show_mini_compare')) :
	    function barberry_show_mini_compare() {
	        global $yith_woocompare;
	        
	        if ( ! TDL_Opt::getOption('compare_extends') ) {
	            echo '';
	            return;
	        }
	        
	        $barberry_compare = isset($yith_woocompare->obj) ? $yith_woocompare->obj : $yith_woocompare;
	        if (!$barberry_compare) {
	            echo '';
	            return;
	        }
	        
	        if (!TDL_Opt::getOption('compare_page') || !(int) TDL_Opt::getOption('compare_page')) {
	            $pages = get_pages(array(
	                'meta_key' => '_wp_page_template',
	                'meta_value' => 'page-view-compare.php'
	            ));
	            
	            // if ($pages) {
	            //     foreach ($pages as $page) {
	            //         TDL_Opt::getOption('compare_page') = (int) $page->ID;
	            //         break;
	            //     }
	            // }
	        }
	        
	        $view_href = TDL_Opt::getOption('compare_page') && (int) TDL_Opt::getOption('compare_page') ? get_permalink((int)TDL_Opt::getOption('compare_page')) : home_url('/');
	        
	        $barberry_compare_list = $barberry_compare->get_products_list();
	        $max_compare = TDL_Opt::getOption('max_compare') ? (int) TDL_Opt::getOption('max_compare') : 4;
	        
	        $file = BARBERRY_CHILD_PATH . '/inc/compare/barberry-mini-compare.php';
	        include is_file($file) ? $file : BARBERRY_THEME_PATH . '/inc/compare/barberry-mini-compare.php';
	    }
	endif;

	/*-----------------------------------------------------------------------------------*/
	/*	Default page compare
	/*-----------------------------------------------------------------------------------*/

	if (!function_exists('barberry_products_compare_content')) :
	    function barberry_products_compare_content($echo = false) {
	        global $yith_woocompare;

			if ( ! TDL_Opt::getOption('compare_extends') ) {
				return;
			}	        
	        	        
	        $barberry_compare = isset($yith_woocompare->obj) ? $yith_woocompare->obj : $yith_woocompare;
	        if (!$barberry_compare) {
	            return '';
	        }
	        
	        $file = BARBERRY_CHILD_PATH . '/inc/compare/barberry-view-compare.php';
	        if (!$echo) {
	            ob_start();
	            include is_file($file) ? $file : BARBERRY_THEME_PATH . '/inc/compare/barberry-view-compare.php';

	            return ob_get_clean();
	        } else {
	            include is_file($file) ? $file : BARBERRY_THEME_PATH . '/inc/compare/barberry-view-compare.php';
	        }
	    }
	endif;






	/*-----------------------------------------------------------------------------------*/
	/*	Display categories menu
	/*-----------------------------------------------------------------------------------*/

	if( ! function_exists( 'barberry_product_categories_nav' ) ) {
		function barberry_product_categories_nav() {
			global $wp_query, $post;

			$page_id = barberry_page_ID();

			if( barberry_is_shop_archive() ) {
				$page_id = wc_get_page_id('shop');
				$custom_title_color = get_field('tdl_page_title_color_scheme', $page_id);

				if ( is_product_category() ) {
					$page_id = get_queried_object();
					$custom_title_color = get_field('tdl_prodcat_title_color_scheme', $page_id);
				}
			}
			
	        $term           = get_queried_object();
	        $parent_id      = empty( $term->term_id ) ? 0 : $term->term_id;
	        $categories     = get_terms('product_cat', array('hide_empty' => 1, 'parent' => $parent_id));
	        
	        
	        if ($categories) :

			?>
				<div class="shop-categories-wrapper">
					<div class="shop-categories">
						<div class="barberry-show-categories"><a href="#"><span><?php echo esc_html__('All Categories', 'barberry') ?></span></a></div>

						<div class="barberry-categories">
							<ul class="list_shop_categories list-centered">
								<?php foreach($categories as $category) : 
									?>
					              <li class="category_item">
					              	<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>" class="category_item_link">

					              		<?php 
					              		$catalog_icon = get_field('tdl_prodcat_image_icon', 'product_cat_'.$category->term_id);

				              			if ($custom_title_color == 'light') {
				              				$catalog_icon_light = get_field('tdl_prodcat_image_icon_light', 'product_cat_'.$category->term_id);

				              				if ( !empty($catalog_icon_light) ) {
												$catalog_icon = $catalog_icon_light;
				              				} else {
				              					$catalog_icon = $catalog_icon;
				              				}
				              			} 
					              		?>

			                            <?php if( $catalog_icon ): ?>
			                            	<img src="<?php echo esc_url($catalog_icon['url']) ?>">
			                            <?php endif; ?>
					                	<span class="cat-item-title"><span><?php echo esc_html($category->name); ?></span><sup><?php echo esc_html($category->count); ?></sup></span>
					                </a> 
					              </li>				
								<?php endforeach; ?>
							</ul>								
						</div>

					</div>
				</div>

			<?php endif; ?>		

		<?php	

		}
	}



}



 ?>