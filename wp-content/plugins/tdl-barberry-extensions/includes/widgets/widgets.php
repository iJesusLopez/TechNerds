<?php


/**
 * Register widgets
 *
 * @since  1.0
 *
 * @return void
 */


function barberry_addons_register_widgets() {

	if ( class_exists( 'WC_Widget' ) ) {
    require_once BARBERRY_ADDONS_DIR . '/includes/widgets/widget-attributes-filter.php';
    require_once BARBERRY_ADDONS_DIR . '/includes/widgets/widget-product-categories.php';
    require_once BARBERRY_ADDONS_DIR . '/includes/widgets/widget-filter-price-list.php';

		register_widget( 'Barberry_Widget_Attributes_Filter' );
		register_widget( 'Barberry_Price_Filter_List_Widget' );
		register_widget( 'WC_Widget_Custom_Product_Categories' );
	}
}

add_action( 'widgets_init', 'barberry_addons_register_widgets' );