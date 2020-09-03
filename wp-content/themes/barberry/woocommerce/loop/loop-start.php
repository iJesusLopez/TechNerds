<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ( wc_get_loop_prop( 'columns' ) != "" ) ) {
	$products_per_column = wc_get_loop_prop( 'columns' );

	if (isset($_GET["products_per_row"])) {
		$products_per_column = $_GET["products_per_row"];
	}	
}

$category_layout = 'category-grid-layout-' . TDL_Opt::getOption('category_grid_layout');
$product_layout = 'product-grid-layout-' . TDL_Opt::getOption('product_grid_layout');

if (isset($_GET["products_layout"])) {
	$product_layout = $_GET["products_layout"];
}


?>
<div class="grid-container">
	<div class="grid-x grid-margin-x">
		<div class="cell large-12">
			<ul class="products columns-<?php echo esc_attr( $products_per_column ); ?> <?php echo esc_attr($category_layout); ?> <?php echo esc_attr($product_layout); ?> ">
