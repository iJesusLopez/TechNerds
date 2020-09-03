<?php

// [recent_products_listing]
function shortcode_recent_products_listing($atts, $content = null) {
	$randomid = rand();

	extract(shortcode_atts(array(
		'title' => '',
		'per_page'  => '12',
		'columns'  => '4',
		'layout'  => 'listing',
        'paginate' => 'none',
        'orderby' => 'date',
        'order' => 'desc',
        
	), $atts));


        if ( 'none' !== $paginate ) {
            $paginate_type = true;
        } 

	ob_start();



	?>

    <?php 
	/**
	* Check if WooCommerce is active
	**/
	if (class_exists('WooCommerce')) {
	?>

     <div class="woocommerce shortcode_products_listing">
         <div  class="products_listing_section" id="products-listing-<?php echo $randomid; ?>" data-paginate-id="<?php echo $randomid; ?>" data-paginate="<?php echo $paginate; ?>">

        <?php 
        echo do_shortcode('[recent_products paginate='.$paginate_type.' per_page="'.$per_page.'" columns="'.$columns.'" orderby="'.$orderby.'" order="'.$order.'"]'); 
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

add_shortcode("recent_products_listing", "shortcode_recent_products_listing");