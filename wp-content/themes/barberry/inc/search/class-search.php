<?php if ( ! defined( 'BARBERRY_THEME_DIR' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * ------------------------------------------------------------------------------------------------
 * Search form
 * ------------------------------------------------------------------------------------------------
 */

if( ! function_exists( 'barberry_search_form' ) ) {
	function barberry_search_form( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'ajax' => false,
			'post_type' => false,
			'show_categories' => false,
			'type' => 'form',
			'thumbnail' => true,
			'price' => true,
			'count' => 20,
			'icon_type' => '',
			'search_style' => '',
			'custom_icon' => '',
			'el_classes' => '',
		) ); 

		extract( $args ); 

		$class = '';
		$data  = '';

		$ajax_args = array(
			'thumbnail' => $thumbnail,
			'price' => $price,
			'post_type' => $post_type,
			'count' => $count
		);

		if( $ajax ) {
			$class .= ' barberry-ajax-search';
			foreach ($ajax_args as $key => $value) {
				$data .= ' data-' . $key . '="' . $value . '"';
			}
		}

		switch ( $post_type ) {
			case 'product':
				$placeholder = esc_attr_x( 'Search for products', 'submit button', 'barberry' );
				$description = esc_html__( 'Start typing to see products you are looking for.', 'barberry' );
			break;

			case 'portfolio':
				$placeholder = esc_attr_x( 'Search for projects', 'submit button', 'barberry' );
				$description = esc_html__( 'Start typing to see projects you are looking for.', 'barberry' );
			break;
		
			default:
				$placeholder = esc_attr_x( 'Search for posts', 'submit button', 'barberry' );
				$description = esc_html__( 'Start typing to see posts you are looking for.', 'barberry' );
			break;
		}

		if ( $el_classes ) {
			$class .= ' ' . $el_classes;
		}		

		?>

		<div class="widget_product_search">
			<div class="search-wrapp">
				<form class="woocommerce-product-search search-form <?php echo esc_attr( $class ); ?>" role="search" method="get" action="<?php echo esc_url( home_url( '/'  ) ) ?>" <?php echo ! empty( $data ) ? $data : ''; ?>>
					<div>
						<input type="text"
			                   value="<?php echo get_search_query(); ?>"
			                   name="s"
			                   id="search-input"
			                   class="search-field search-input"
			                   placeholder="<?php echo esc_attr_e( 'Start typing...', 'barberry' ); ?>"
			                   autocomplete="on">

						<input type="hidden" name="post_type" value="<?php echo esc_attr( $post_type ); ?>">
						
						<?php if ( TDL_Opt::getOption('predictive_search') ):  ?>
						<a role="button" tabindex="0" class="search-clear"><?php echo esc_html__( 'Clear', 'barberry' );  ?></a>
						<?php endif; ?>	

						<div class="search_label">
							<div class="search_label-text"></div>
						</div>

						<input type="submit" value="<?php echo esc_attr_e( 'Search', 'woocommerce' );  ?>" />
			            <?php if ( defined( 'ICL_LANGUAGE_CODE' ) ): // WPML compatible ?>
			              <input type="hidden" name="lang" value="<?php echo( ICL_LANGUAGE_CODE ); ?>" />
			            <?php endif; ?>						

					</div>
				</form>
				<div class="search-results-wrapp"><div class="barberry-search-loader"></div></div>
			</div>
		</div>

		<?php
	}
}

/**
 * ------------------------------------------------------------------------------------------------
 * Ajax search
 * ------------------------------------------------------------------------------------------------
 */

 if ( ! function_exists( 'barberry_init_search_by_sku' ) ) {
	function barberry_init_search_by_sku() {
		if ( apply_filters( 'barberry_search_by_sku', TDL_Opt::getOption('search_by_sku') ) && barberry_woocommerce_installed() ) {
			add_filter( 'posts_search', 'barberry_product_search_sku', 9 );
		}
	}

	add_action( 'init', 'barberry_init_search_by_sku', 10 );
}


if ( ! function_exists( 'barberry_ajax_suggestions' ) ) {
	function barberry_ajax_suggestions() {

		$allowed_types = array( 'post', 'product' );
		$post_type = 'product';

		if ( apply_filters( 'barberry_search_by_sku', TDL_Opt::getOption('search_by_sku') ) && barberry_woocommerce_installed() ) {
			add_filter( 'posts_search', 'barberry_product_ajax_search_sku', 10 );
		}
		
		$query_args = array(
			'posts_per_page' => 5,
			'post_status'    => 'publish',
			'post_type'      => $post_type,
			'no_found_rows'  => 1,
		);

		if ( ! empty( $_REQUEST['post_type'] ) && in_array( $_REQUEST['post_type'], $allowed_types ) ) {
			$post_type = strip_tags( $_REQUEST['post_type'] );
			$query_args['post_type'] = $post_type;
		}

		if ( $post_type == 'product' && barberry_woocommerce_installed() ) {
			
			$product_visibility_term_ids = wc_get_product_visibility_term_ids();
			$query_args['tax_query'][] = array(
				'taxonomy' => 'product_visibility',
				'field'    => 'term_taxonomy_id',
				'terms'    => $product_visibility_term_ids['exclude-from-search'],
				'operator' => 'NOT IN',
			);

			if ( ! empty( $_REQUEST['product_cat'] ) ) {
				$query_args['product_cat'] = strip_tags( $_REQUEST['product_cat'] );
			}
		}

		if ( 'yes' === get_option( 'woocommerce_hide_out_of_stock_items' ) && $post_type == 'product' ) {
			$query_args['meta_query'][] = array( 'key' => '_stock_status', 'value' => 'outofstock', 'compare' => 'NOT IN' );
		}

		if ( ! empty( $_REQUEST['query'] ) ) {
			$query_args['s'] = sanitize_text_field( $_REQUEST['query'] );
		}

		if ( ! empty( $_REQUEST['number'] ) ) {
			$query_args['posts_per_page'] = (int) $_REQUEST['number'];
		}

		$results = new WP_Query( apply_filters( 'barberry_ajax_search_args', $query_args ) );

		$suggestions = array();

		if ( $results->have_posts() ) {

			if ( $post_type == 'product' && barberry_woocommerce_installed() ) {
				$factory = new WC_Product_Factory();
			}

			while ( $results->have_posts() ) {
				$results->the_post();

				if ( $post_type == 'product' && barberry_woocommerce_installed() ) {
					$product = $factory->get_product( get_the_ID() );
					
					if ( TDL_Opt::getOption('shop_decimals') ) {
						add_filter( 'wc_price', 'barberry_add_sup_decimals_to_pricing' );
					}

					$suggestions[] = array(
						'value' => get_the_title(),
						'permalink' => get_the_permalink(),
						'price' => $product->get_price_html(),
						'thumbnail' => $product->get_image(),
					);

					

				} else {
					$suggestions[] = array(
						'value' => get_the_title(),
						'permalink' => get_the_permalink(),
						'thumbnail' => get_the_post_thumbnail( null, 'medium', '' ),
					);
				}
			}

			wp_reset_postdata();

		} else {
			$suggestions[] = array(
				'value' => ( $post_type == 'product' ) ? esc_html__( 'No products found', 'barberry' ) : esc_html__( 'No posts found', 'barberry' ),
				'no_found' => true,
				'permalink' => ''
			);
		}

		echo json_encode( array(
			'suggestions' => $suggestions
		) );

		die();
	}

	add_action( 'wp_ajax_barberry_ajax_search', 'barberry_ajax_suggestions', 10 );
	add_action( 'wp_ajax_nopriv_barberry_ajax_search', 'barberry_ajax_suggestions', 10 );
}


if ( ! function_exists( 'barberry_product_search_sku' ) ) {
	function barberry_product_search_sku( $where, $class = false ) {
		global $pagenow, $wpdb, $wp;

		$type = array('product', 'jam');
		
		if ( ( is_admin() ) //if ((is_admin() && 'edit.php' != $pagenow) 
				|| !is_search()  
				|| !isset( $wp->query_vars['s'] ) 
				//post_types can also be arrays..
				|| (isset( $wp->query_vars['post_type'] ) && 'product' != $wp->query_vars['post_type'] )
				|| (isset( $wp->query_vars['post_type'] ) && is_array( $wp->query_vars['post_type'] ) && !in_array( 'product', $wp->query_vars['post_type'] ) ) 
				) {
			return $where;
		}

		$s = $wp->query_vars['s'];

		return barberry_sku_search_query( $where, $s );
	}
}

if ( ! function_exists( 'barberry_product_ajax_search_sku' ) ) {
	function barberry_product_ajax_search_sku( $where ) {
		if ( ! empty( $_REQUEST['query'] ) ) {
			$s = sanitize_text_field( $_REQUEST['query'] );
			return barberry_sku_search_query( $where, $s );
		}

		return $where;
	}
}


if ( ! function_exists( 'barberry_sku_search_query' ) ) {
	function barberry_sku_search_query( $where, $s ) {
		global $wpdb;

		$search_ids = array();
		$terms = explode( ',', $s );

		foreach ( $terms as $term ) {
			//Include the search by id if admin area.
			if ( is_admin() && is_numeric( $term ) ) {
				$search_ids[] = $term;
			}
			// search for variations with a matching sku and return the parent.

			$sku_to_parent_id = $wpdb->get_col( $wpdb->prepare( "SELECT p.post_parent as post_id FROM {$wpdb->posts} as p join {$wpdb->postmeta} pm on p.ID = pm.post_id and pm.meta_key='_sku' and pm.meta_value LIKE '%%%s%%' where p.post_parent <> 0 group by p.post_parent", wc_clean( $term ) ) );

			//Search for a regular product that matches the sku.
			$sku_to_id = $wpdb->get_col( $wpdb->prepare( "SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key='_sku' AND meta_value LIKE '%%%s%%';", wc_clean( $term ) ) );

			$search_ids = array_merge( $search_ids, $sku_to_id, $sku_to_parent_id );
		}

		$search_ids = array_filter( array_map( 'absint', $search_ids ) );

		if ( sizeof( $search_ids ) > 0 ) {
			$where = str_replace( ')))', ") OR ({$wpdb->posts}.ID IN (" . implode( ',', $search_ids ) . "))))", $where );
		}
		
		#remove_filters_for_anonymous_class('posts_search', 'WC_Admin_Post_Types', 'product_search', 10);
		return $where;
	}
}