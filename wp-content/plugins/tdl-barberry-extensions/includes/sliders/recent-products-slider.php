<?php

// [recent_products_slider]
function shortcode_recent_products_slider($atts, $content = null) {
	$sliderrandomid = rand();

	extract(shortcode_atts(array(
		'title' => '',
		'per_page'  => '12',
		'columns'  => '4',
		'layout'  => 'listing',
        'navigation'  => 'yes',
        'pagination'  => 'yes',
        'orderby' => 'date',
        'order' => 'desc'
	), $atts));
	ob_start();

    $id = uniqid( 'products-slider-' );
	?>

    <?php 
	/**
	* Check if WooCommerce is active
	**/
	if (class_exists('WooCommerce')) {
	?>

    <style>
        #<?php echo esc_attr( $id ); ?> .product_slider_wrapper[data-navigation="no"] .flickity-prev-next-button { display:none }
        #<?php echo esc_attr( $id ); ?> .product_slider_wrapper[data-pagination="no"] .flickity-page-dots { display:none }
    </style>

     <div class="woocommerce shortcode_products_slider" id="<?php echo esc_attr( $id ); ?>">
         <div id="products-carousel" class="product_slider_wrapper" data-navigation="<?php echo esc_attr( $navigation ); ?>" data-pagination="<?php echo esc_attr( $pagination ); ?>">

    		<?php 
        		if ($title != '') {
        			echo '<h2 class="carousel-title">' . $title . '</h2>';
        		}
    		?>	

            <?php
    
            $args = array(
                'post_type' => 'product',
                'post_status' => 'publish',
                'ignore_sticky_posts'   => 1,
                'posts_per_page' => $per_page,
                'orderby' => $orderby,
                'order' => $order
            );
            
            $products = new WP_Query( $args );

            $product_layout = 'product-grid-layout-' . TDL_Opt::getOption('product_grid_layout');
            
            if ( $products->have_posts() ) : ?>


                <ul id="products" class="product-carousel products columns-<?php echo $columns; ?> <?php echo esc_attr($product_layout); ?>"> 

                    <?php while ( $products->have_posts() ) : $products->the_post(); ?>

                        <?php

                            wc_get_template_part( 'content', 'product' ); ?>

                    <?php endwhile; // end of the loop. ?>

                </ul>


                
            <?php
                endif;
            ?>
        </div>
    </div>
    
    <?php } ?>


	<?php
    wp_reset_query();
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

add_shortcode("recent_products_slider", "shortcode_recent_products_slider");