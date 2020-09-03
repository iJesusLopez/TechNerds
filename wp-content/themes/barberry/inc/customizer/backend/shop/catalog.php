<?php

$sep_id  = 7100;
$section = 'shop_catalog';

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'shop_sidebar',
    'label'       => esc_attr__( 'Shop Sidebar', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
) );


Kirki::add_field( 'barberry', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'shop_sidebar_position',
    'label'       => esc_attr__( 'Sidebar Position', 'barberry' ),
    'section'     => $section,
    'default'     => 'left',
    'priority'    => 10,
    'choices'     => array(
        'left'    => esc_attr__( 'Left', 'barberry' ),
        'right'   => esc_attr__( 'Right', 'barberry' ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'shop_sidebar',
            'operator' => '==',
            'value'    => true,     
        ),
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'sticky_sidebar',
    'label'       => esc_attr__( 'Sticky Sidebar', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'shop_sidebar',
            'operator' => '==',
            'value'    => true,     
        ),
    ),
) );


Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'sticky_filter_button',
    'label'       => esc_attr__( 'Sticky off-canvas sidebar button', 'barberry' ),
    'description' => esc_attr__( 'Display the sidebar button fixed on the screen for mobile and tablet devices.', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'shop_sidebar',
            'operator' => '==',
            'value'    => true,     
        ),
    ),
) );

// ---------------------------------------------
Kirki::add_field( '', array(
    'type'        => 'custom',
    'label'       => '',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
    'default'     => '<hr>',
    'priority'    => 10,
) );
// ---------------------------------------------


Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'shop_breadcrumbs',
    'label'       => esc_attr__( 'Show Breadcrumbs', 'barberry' ),
    'description' => esc_attr__( 'Show breadcrumbs for shop page, product categories or tags', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
) );

// ---------------------------------------------
Kirki::add_field( '', array(
    'type'        => 'custom',
    'label'       => '',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
    'default'     => '<hr>',
    'priority'    => 10,
) );
// ---------------------------------------------

Kirki::add_field( 'barberry', array(
    'type'        => 'radio-image',
    'settings'    => 'shop-title',
    'label'       => esc_attr__( 'Shop Title', 'barberry' ),
    'description' => esc_attr__( 'Show title section for shop page, product categories or tags', 'barberry' ),
    'section'     => $section,
    'default'     => 'default',
    'priority'    => 10,
    'choices'     => array(
        'default' => array(
            'alt' => esc_attr__( 'Default', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/page-title-1.png',
        ),
        'disable'   => array(
            'alt' => esc_attr__( 'Disable', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/page-title-2.png',
        ),        
    ),
) );

// ---------------------------------------------
Kirki::add_field( '', array(
    'type'        => 'custom',
    'label'       => '',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
    'default'     => '<hr>',
    'priority'    => 10,
) );
// ---------------------------------------------

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'shop_categories',
    'label'       => esc_attr__( 'Categories in page heading', 'barberry' ),
    'description' => esc_attr__( 'This categories menu is generated automatically based on all categories in the shop. You are not able to manage this menu as other WordPress menus', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
) );



// ---------------------------------------------
Kirki::add_field( '', array(
    'type'        => 'custom',
    'label'       => '',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
    'default'     => '<hr>',
    'priority'    => 10,
) );
// ---------------------------------------------


Kirki::add_field( 'barberry', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'shop_pagination',
    'label'       => esc_attr__( 'Pagination', 'barberry' ),
    'section'     => $section,
    'default'     => 'infinite_scroll',
    'priority'    => 10,
    'choices'     => array(
        'default'           => esc_attr__( 'Classic', 'barberry' ),
        'load_more_button'  => esc_attr__( 'Load More', 'barberry' ),
        'infinite_scroll'   => esc_attr__( 'Infinite', 'barberry' ),
    ),
) );


Kirki::add_field( 'barberry', array(
    'type'        => 'number',
    'settings'    => 'products_per_page',
    'label'       => esc_html__( 'Product Numbers Per Page', 'barberry' ),
    'section'     => $section,
    'default'     => 12,
    'priority'    => 10,
    'description' => esc_html__( 'Specify how many products you want to show on catalog page', 'barberry' ),
) );

// ---------------------------------------------
Kirki::add_field( '', array(
    'type'        => 'custom',
    'label'       => '',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
    'default'     => '<hr>',
    'priority'    => 10,
) );
// ---------------------------------------------

Kirki::add_field( 'barberry', array(
    'type'            => 'select',
    'settings'        => 'product_columns',
    'label'           => esc_html__( 'Product Columns Per Page', 'barberry' ),
    'section'           => $section,
    'default'         => '4',
    'priority'        => 10,
    'choices'         => array(
        '2' => esc_html__( '2 Columns', 'barberry' ),
        '3' => esc_html__( '3 Columns', 'barberry' ),
        '4' => esc_html__( '4 Columns', 'barberry' ),
        '5' => esc_html__( '5 Columns', 'barberry' ),
        
        
    ),
    'description'     => esc_html__( 'Specify how many product columns you want to show on catalog page', 'barberry' ),
) );



// ---------------------------------------------
Kirki::add_field( '', array(
    'type'        => 'custom',
    'label'       => '',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
    'default'     => '<hr>',
    'priority'    => 10,
) );
// ---------------------------------------------

Kirki::add_field( 'barberry', array(
    'type'        => 'radio-image',
    'settings'    => 'category_grid_layout',
    'label'       => esc_attr__( 'Category Grid Layout', 'barberry' ),
    'section'     => $section,
    'default'     => '1',
    'priority'    => 10,
    'choices'     => array(
        '1' => array(
            'alt' => esc_attr__( 'Layout 1', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/category-layout-1.png',
        ),
        '2'   => array(
            'alt' => esc_attr__( 'Layout 2', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/category-layout-2.png',
        ),        
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'radio-image',
    'settings'    => 'product_grid_layout',
    'label'       => esc_attr__( 'Product Grid Layout', 'barberry' ),
    'section'     => $section,
    'default'     => '1',
    'priority'    => 10,
    'choices'     => array(
        '1' => array(
            'alt' => esc_attr__( 'Layout 1', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/product-layout-1.png',
        ),
        '2'   => array(
            'alt' => esc_attr__( 'Layout 2', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/product-layout-2.png',
        ),        
    ),
) );


// ---------------------------------------------
Kirki::add_field( '', array(
    'type'        => 'custom',
    'label'       => '',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
    'default'     => '<hr>',
    'priority'    => 10,
) );
// ---------------------------------------------

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'disable_secondary_thumb',
    'label'       => esc_attr__( 'Disable Second Image on Hover', 'barberry' ),
    'description' => esc_attr__( 'Check this option to disable secondary product thumbnail when hover over the main product image', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
) );

// ---------------------------------------------
Kirki::add_field( '', array(
    'type'        => 'custom',
    'label'       => '',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
    'default'     => '<hr>',
    'priority'    => 10,
) );
// ---------------------------------------------

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'product_quick_view',
    'label'       => esc_attr__( 'Quick View', 'barberry' ),
    'description' => esc_attr__( 'Check this option to enable the quick view in every product', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'product_quick_view_mobile',
    'label'       => esc_attr__( 'Hide Quick View for mobile', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'product_quick_view',
            'operator' => '==',
            'value'    => true,     
        ),
    ),
) );

// ---------------------------------------------
Kirki::add_field( '', array(
    'type'        => 'custom',
    'label'       => '',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
    'default'     => '<hr>',
    'priority'    => 10,
) );
// ---------------------------------------------

Kirki::add_field( 'barberry', array(
    'type'            => 'select',
    'settings'        => 'product_attribute',
    'label'           => esc_html__( 'Product Attribute', 'barberry' ),
    'section'         => $section,
    'default'         => 'none',
    'priority'        => 10,
    'choices'         => barberry_product_attributes(),
    'description'     => esc_html__( 'Show product attribute for each item listed under the item name', 'barberry' ),
) );

// ---------------------------------------------
Kirki::add_field( '', array(
    'type'        => 'custom',
    'label'       => '',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
    'default'     => '<hr>',
    'priority'    => 10,
) );
// ---------------------------------------------

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'shop_addtocart',
    'label'       => esc_attr__( 'Leave "Add to Cart" button after adding to the cart', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
) );

// ---------------------------------------------
Kirki::add_field( '', array(
    'type'        => 'custom',
    'label'       => '',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
    'default'     => '<hr>',
    'priority'    => 10,
) );
// ---------------------------------------------

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'shop_countdown',
    'label'       => esc_attr__( 'Countdown timer', 'barberry' ),
    'description' => esc_html__( 'Show timer for products that have scheduled date for the sale price', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
) );

// ---------------------------------------------
Kirki::add_field( '', array(
    'type'        => 'custom',
    'label'       => '',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
    'default'     => '<hr>',
    'priority'    => 10,
) );
// ---------------------------------------------

Kirki::add_field( 'barberry', array(
    'type'        => 'radio-image',
    'settings'    => 'label_shape',
    'label'       => esc_attr__( 'Product labels', 'barberry' ),
    'section'     => $section,
    'default'     => 'bordered',
    'priority'    => 10,
    'choices'     => array(
        'bordered' => array(
            'alt' => esc_attr__( 'Bordered', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/label-1.png',
        ),
        'solid'   => array(
            'alt' => esc_attr__( 'Solid', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/label-2.png',
        ),        
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'percentage_label',
    'label'       => esc_attr__( 'Shop sale label in percentage', 'barberry' ),
    'description' => esc_attr__( 'Works with Simple, Variable and External products only.', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'new_label',
    'label'       => esc_attr__( '"New" label on products', 'barberry' ),
    'description' => esc_attr__( 'This label is displayed for products if you enabled this option for particular items.', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'hot_label',
    'label'       => esc_attr__( '"Hot" label on products', 'barberry' ),
    'description' => esc_attr__( 'Your products marked as "Featured" will have a badge with "Hot" label.', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
) );


