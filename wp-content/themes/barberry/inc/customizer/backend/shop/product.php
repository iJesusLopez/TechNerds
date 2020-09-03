<?php

$sep_id  = 7300;
$section = 'shop_product';

Kirki::add_field( 'barberry', array(
    'type'        => 'radio-image',
    'settings'    => 'product_layout',
    'label'       => esc_attr__( 'Product Page Layout', 'barberry' ),
    'section'     => $section,
    'default'     => 'default',
    'priority'    => 10,
    'choices'     => array(
        'default' => array(
            'alt' => esc_attr__( 'Default', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/single-product-layout-1.png',
        ),
        'style_2'   => array(
            'alt' => esc_attr__( 'Style 2', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/single-product-layout-2.png',
        ),
        'style_3'   => array(
            'alt' => esc_attr__( 'Style 3', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/single-product-layout-3.png',
        ),               
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'radio-image',
    'settings'    => 'product_thumbs',
    'label'       => esc_attr__( 'Product Thumbnail Position', 'barberry' ),
    'section'     => $section,
    'default'     => 'bottom',
    'priority'    => 10,
    'choices'     => array(
        'bottom' => array(
            'alt' => esc_attr__( 'Bottom', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/single-product-thumb-bottom.png',
        ),
        'left'   => array(
            'alt' => esc_attr__( 'Left', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/single-product-thumb-left.png',
        ),
        'right'   => array(
            'alt' => esc_attr__( 'Right', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/single-product-thumb-right.png',
        ),               
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'product_layout',
            'operator' => '!=',
            'value'    => 'style_3',
        ), 
        array(
            'setting'  => 'product_sidebar',
            'operator' => '==',
            'value'    => false,     
        ),        
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'product_sidebar',
    'label'       => esc_attr__( 'Product Page Sidebar', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'product_layout',
            'operator' => '==',
            'value'    => 'default',
        ), 
     
    ),
) );


Kirki::add_field( 'barberry', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'product_sidebar_position',
    'label'       => esc_attr__( 'Sidebar Position', 'barberry' ),
    'section'     => $section,
    'default'     => 'right',
    'priority'    => 10,
    'choices'     => array(
        'left'    => esc_attr__( 'Left', 'barberry' ),
        'right'   => esc_attr__( 'Right', 'barberry' ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'product_layout',
            'operator' => '==',
            'value'    => 'default',
        ),         
        array(
            'setting'  => 'product_sidebar',
            'operator' => '==',
            'value'    => true,     
        ),
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'sticky_product_filter_button',
    'label'       => esc_attr__( 'Sticky off canvas sidebar button', 'barberry' ),
    'description' => esc_attr__( 'Display the sidebar button fixed on the screen for mobile and tablet devices.', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'product_layout',
            'operator' => '==',
            'value'    => 'default',
        ),         
        array(
            'setting'  => 'product_sidebar',
            'operator' => '==',
            'value'    => true,     
        ),
    ),
) );



Kirki::add_field( 'barberry', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'product_header_transparent_desktop',
    'label'       => esc_attr__( 'Header Above the Content on desktop', 'barberry' ),
    'section'     => $section,
    'default'     => 'overlap',
    'priority'    => 10,
    'choices'     => array(
        'overlap'    => esc_attr__( 'Overlap', 'barberry' ),
        'no_overlap'   => esc_attr__( 'No Overlap', 'barberry' ),
    ),
    'active_callback'    => array(

        array(
            'setting'  => 'product_layout',
            'operator' => '!=',
            'value'    => 'default',
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
    'type'        => 'radio-buttonset',
    'settings'    => 'product_header_transparent',
    'label'       => esc_attr__( 'Header Above the Content on mobile', 'barberry' ),
    'section'     => $section,
    'default'     => 'no_overlap',
    'priority'    => 10,
    'choices'     => array(
        'overlap'    => esc_attr__( 'Overlap', 'barberry' ),
        'no_overlap'   => esc_attr__( 'No Overlap', 'barberry' ),
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
    'settings'    => 'product_breadcrumbs',
    'label'       => esc_attr__( 'Show Breadcrumbs', 'barberry' ),
    'description' => esc_attr__( 'Show breadcrumbs for product page', 'barberry' ),
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
    'type'        => 'toggle',
    'settings'    => 'product_add_to_cart_ajax',
    'label'       => esc_attr__( 'AJAX add to cart button', 'barberry' ),
    'description' => esc_html__( 'Check this option to enable AJAX add to cart button in the product page.', 'barberry' ),
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
    'type'        => 'toggle',
    'settings'    => 'product_sticky_addtocart',
    'label'       => esc_attr__( 'Sticky Add To Cart', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'product_sticky_addtocart_mob',
    'label'       => esc_attr__( 'Sticky Add To Cart In Mobile', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'product_sticky_addtocart',
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
    'settings'    => 'product_buy_now',
    'label'       => esc_attr__( 'Buy It Now Button', 'barberry' ),
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
    'settings'    => 'product_share',
    'label'       => esc_attr__( 'Product Page Share', 'barberry' ),
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
    'settings'    => 'size_guides',
    'label'       => esc_attr__( 'Size guides', 'barberry' ),
    'description'  => wp_kses( __( 'Turn on the size guide feature on the website. Read more information about this function in <a href="https://temashdesign.ticksy.com/article/14193/" target="_blank">our documentation</a>.', 'barberry' ), array(
    'a' => array(
      'target' => array(),
      'href' => array(),
    ),
    ) ),    
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
    'settings'    => 'product_zoom',
    'label'       => esc_attr__( 'Product Zoom', 'barberry' ),
    'description' => esc_html__( 'Check this option to show a bigger size product image on mouseover', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'product_layout',
            'operator' => '==',
            'value'    => 'default',
        ),
    ),
) );


Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'product_images_lightbox',
    'label'       => esc_attr__( 'Product Images Gallery', 'barberry' ),
    'description' => esc_html__( 'Check this option to open product gallery images in a lightbox', 'barberry' ),    
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'product_lightbox_dominant',
    'label'       => esc_attr__( 'Product Gallery Lightbox Dominant Background', 'barberry' ),
    'description' => esc_html__( 'Enable / Disable dominant background color on Product Gallery Lightbox.', 'barberry' ),    
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'variation_gallery',
    'label'       => esc_attr__( 'Additional variations images', 'barberry' ),
    'description' => esc_html__( 'Add an ability to upload additional images for each variation in variable products.', 'barberry' ),    
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
    'type'        => 'toggle',
    'settings'    => 'product_navigation',
    'label'       => esc_attr__( 'Product Navigation', 'barberry' ),
    'description' => esc_html__( 'Check this option to show Prev/Next product Navigation', 'barberry' ),
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
    'type'        => 'toggle',
    'settings'    => 'product_countdown',
    'label'       => esc_attr__( 'Countdown timer', 'barberry' ),
    'description' => esc_html__( 'Show timer for products that have scheduled date for the sale price', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'sale_countdown_variable',
    'label'       => esc_attr__( 'Countdown for variable products', 'barberry' ),
    'description' => esc_html__( 'Sale end date will be based on the first variation date of the product.', 'barberry' ),
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
    'settings'    => 'product_progess_stock',
    'label'       => esc_attr__( 'Stock Progress Bar', 'barberry' ),
    'description' => esc_html__( 'Show the woocommerce product stock quantity in a horizontal progress bar', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
) );



Kirki::add_field( 'barberry', array(
	'type'        => 'custom',
	'settings'    => 'section_title_'. $sep_id++,
	'section'     => $section,
	'default'     => '<h1 style="padding-top: 10px; padding-bottom: 10px; margin-bottom: 20px; font-size:26px; border-bottom:4px solid #000">' . esc_html__( 'Related/Upsells Products', 'barberry' ) . '</h1>',
	'priority'    => 10,
));

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'upsells_products',
    'label'       => esc_attr__( 'Upsells Products', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
));

Kirki::add_field( 'barberry', array(
    'type'        => 'slider',
    'settings'    => 'upsells_products_columns',
    'label'       => esc_attr__( 'Upsells Products Columns', 'barberry' ),
    'section'     => $section,
    'default'     => 4,
    'priority'    => 10,
    'choices'     => 
        array 
        (
            'min'   => 4,
            'max'   => 5,
            'step'  => 1
        ),
    'active_callback'    => array(
        array(
            'setting'  => 'upsells_products',
            'operator' => '==',
            'value'    => true,
        ),
    ),
));

Kirki::add_field( 'barberry', array(
    'type'        => 'number',
    'settings'    => 'upsells_products_numbers',
    'label'       => esc_attr__( 'Upsells Products Numbers', 'barberry' ),
    'section'     => $section,
    'default'     => 6,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'upsells_products',
            'operator' => '==',
            'value'    => true,
        ),
    ),
));

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
	'type'        => 'custom',
	'settings'    => 'related_upsells_hr',
	'section'     => $section,
	'default'     => '<hr style="padding-top: 10px; padding-bottom: 10px;></hr>',
	'priority'    => 10,
));

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'related_products',
    'label'       => esc_attr__( 'Related Products', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
));

Kirki::add_field( 'barberry', array(
    'type'        => 'slider',
    'settings'    => 'related_products_columns',
    'label'       => esc_attr__( 'Related Products Columns', 'barberry' ),
    'section'     => $section,
    'default'     => 4,
    'priority'    => 10,
    'choices'     => 
        array 
        (
            'min'   => 4,
            'max'   => 5,
            'step'  => 1
        ),
    'active_callback'    => array(
        array(
            'setting'  => 'related_products',
            'operator' => '==',
            'value'    => true,
        ),
    ),
));

Kirki::add_field( 'barberry', array(
    'type'        => 'number',
    'settings'    => 'related_products_numbers',
    'label'       => esc_attr__( 'Related Products Numbers', 'barberry' ),
    'section'     => $section,
    'default'     => 6,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'related_products',
            'operator' => '==',
            'value'    => true,
        ),
    ),
));

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
    'settings'    => 'related_uppsells_scroll',
    'label'       => esc_attr__( 'Related/Upsells carousel continuous scroll', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
));

Kirki::add_field( 'barberry', array(
    'type'        => 'slider',
    'settings'    => 'related_uppsells_scroll_speed',
    'label'       => esc_attr__( 'Carousel continuous scroll speed', 'barberry' ),
    'section'     => $section,
    'default'     => 1,
    'priority'    => 10,
    'choices'     => 
        array 
        (
            'min'   => 0.5,
            'max'   => 3,
            'step'  => 0.5
        ),
    'active_callback'    => array(
        array(
            'setting'  => 'related_uppsells_scroll',
            'operator' => '==',
            'value'    => true,
        ),
    ),
));