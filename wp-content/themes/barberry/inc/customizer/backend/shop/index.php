<?php

// ============================================
// Panel
// ============================================

Kirki::add_panel( 'woocommerce', array(
    'title'         => esc_attr__( 'WooCommerce', 'barberry' ),
    'priority'      => 70,
) );

// ============================================
// Sections
// ============================================

Kirki::add_section( 'shop', array(
    'title'          => esc_attr__( 'Shop Settings', 'barberry' ),
    'priority'       => 50,
    'capability'     => 'edit_theme_options',
    'panel'          => 'woocommerce',
) );


Kirki::add_section( 'shop_catalog', array(
    'title'          => esc_attr__( 'Shop Catalog', 'barberry' ),
    'priority'       => 50,
    'capability'     => 'edit_theme_options',
    'panel'          => 'woocommerce',
) );

Kirki::add_section( 'shop_product', array(
    'title'          => esc_attr__( 'Product Page', 'barberry' ),
    'priority'       => 50,
    'capability'     => 'edit_theme_options',
    'panel'          => 'woocommerce',
) );

Kirki::add_section( 'shop_catalog_mode', array(
    'title'          => esc_attr__( 'Catalog Mode', 'barberry' ),
    'priority'       => 50,
    'capability'     => 'edit_theme_options',
    'panel'          => 'woocommerce'
) );

Kirki::add_section( 'shop_notifications', array(
    'title'          => esc_attr__( 'Shop Notifications', 'barberry' ),
    'priority'       => 50,
    'capability'     => 'edit_theme_options',
    'panel'          => 'woocommerce'
) );

if ( class_exists( 'YITH_Woocompare' ) ) {
    Kirki::add_section( 'shop_compare', array(
        'title'          => esc_attr__( 'Compare Settings', 'barberry' ),
        'priority'       => 50,
        'capability'     => 'edit_theme_options',
        'panel'          => 'woocommerce'
    ) );   
    
    require_once( get_template_directory() . '/inc/customizer/backend/shop/compare.php'); 
}



// ============================================
// Controls
// ============================================

require_once( get_template_directory() . '/inc/customizer/backend/shop/settings.php');
require_once( get_template_directory() . '/inc/customizer/backend/shop/catalog.php');
require_once( get_template_directory() . '/inc/customizer/backend/shop/product.php');
require_once( get_template_directory() . '/inc/customizer/backend/shop/catalog_mode.php');
require_once( get_template_directory() . '/inc/customizer/backend/shop/notifications.php');
