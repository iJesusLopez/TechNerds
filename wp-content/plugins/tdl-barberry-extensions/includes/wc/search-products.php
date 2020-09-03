<?php

// [search_products]
function search_products_shortcode($params = array(), $content = null) {

	extract(shortcode_atts(array(
		'ids'     => ''
	), $params));

	if (class_exists('WooCommerce')) {

		$percentage_label = TDL_Opt::getOption('percentage_label');

		$output .= '<ul id="products-grid" class="products columns-6 product-grid-layout-1">';

		$ids = explode( ',', $params['ids']);

		foreach ( $ids as $product_id ) {
			$product = wc_get_product( $product_id ); 

			$output .= '<li class="product column">';
			$output .= '<div class="product-inner-wrapper">';


				$labels = array();

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
						$labels[] .= '<span class="onsale product-label">-' . $percentage . '%' . '</span>';
					}else{
						$labels[] .= '<span class="onsale product-label">' . esc_html__( 'Sale', 'barberry' ) . '</span>';
					}
				}

				if( !$product->is_in_stock() && !is_product() ){
					$labels[] = '<span class="out-of-stock product-label">' . esc_html__( 'Sold out', 'barberry' ) . '</span>';
				}	

				if ( $product->is_featured() && TDL_Opt::getOption('hot_label') ) {
					$labels[] = '<span class="featured product-label">' . esc_html__( 'Hot', 'barberry' ) . '</span>';
				}	

				if ( get_field('tdl_new_label') && TDL_Opt::getOption('new_label') ) {
					$labels[] = '<span class="new product-label">' . esc_html__( 'New', 'barberry' ) . '</span>';
				}						
				
			if ( $labels ) {
					$output .= '<div class="product-labels labels-' . TDL_Opt::getOption('label_shape') . '">' . implode( '', $labels ) . '</div>';
			}



			$output .= '<div class="product-inner">';

			$output .= '<div class="product-image">';

			$attachment_ids  = $product->get_gallery_image_ids();
			$secondary_thumb = intval( TDL_Opt::getOption('disable_secondary_thumb') );	
			$class = 'loop-thumbnail';
			if ( count( $attachment_ids ) == 0 || $secondary_thumb ) {
				$class .= ' product-thumbnail-single';
			}

			$output .= '<a class="' . $class . '" href="' . get_permalink( $product->get_id() ) . '">';

			$image_size = 'shop_catalog';
			$image_size = apply_filters( 'single_product_archive_thumbnail_size', $image_size );		

				if ( has_post_thumbnail( $product->get_id() ) ) { 	
					$output .= get_the_post_thumbnail( $product->get_id(), $image_size);
				} else {
					$output .= apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="Placeholder" />', wc_placeholder_img_src() ), $product->get_id() );
				}

				if ( ! $secondary_thumb ) {
					if ( count( $attachment_ids ) > 0 && isset ( $attachment_ids[0] ) ) {
						// $output .= get_the_post_thumbnail( $attachment_id, $image_size, array('class' => 'image-hover'));
					}

					if ( $attachment_ids ) {
						$loop = 0;
						foreach ( $attachment_ids as $attachment_id ) {
							$loop++;
							$css_class = 'image-hover';
							$product_thumbnail_second = wp_get_attachment_image_src($attachment_id, 'shop_catalog');

							$output .= sprintf(
								'<img src="%s" class="%s">',
			                    esc_url( $product_thumbnail_second[0] ),
			                    esc_attr( $css_class )

							);

							// $output .= sprintf('<img src="%s" class="%s">', esc_url( $product_thumbnail_second[0] ), esc_attr( $css_class ));

							if ($loop == 1) break;
						}
					}

				}				

			$output .= '</a></div>';

			$output .= '<div class="product-details-wrapper">';
			$output .= '<div class="product-details">';
			$output .= '<h2 class="product-title"><a class="product-title-link" href="' . get_permalink( $product->get_id() ) . '">' . $product->get_title() . '</a></h2>';
			if ( $price_html = $product->get_price_html() ) :
				$output .= '<span class="price">' . $price_html . '</span>';
			endif;		
			$output .= '</div>';
			$output .= '</div>';

			$output .= '</div>';
			$output .= '</div>';
			$output .= '</li>';

		}

		$output .= '</ul>';

		return $output;

	}
}

add_shortcode('search_products', 'search_products_shortcode');