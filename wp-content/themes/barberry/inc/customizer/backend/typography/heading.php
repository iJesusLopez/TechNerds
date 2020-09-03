<?php

$sep_id  = 59375;
$section = 'heading';

$choices_heading_font   = barberry_add_custom_choice();
$choices_page_header_font   = barberry_add_custom_choice();
$product_title_font   = barberry_add_custom_choice();
$single_product_title_font   = barberry_add_custom_choice();

Kirki::add_field( 'barberry', array(
    'type'        => 'typography',
    'settings'    => 'heading_font',
    'label'       => esc_attr__( 'Heading Font', 'barberry' ),
    'section'     => $section,
    'choices'     => $choices_heading_font,
    'default'     => array(
        'font-family'    => 'Josefin Sans',
        'font-weight'    => '600',
        'font-size'      => '24px',
        'letter-spacing' => '-1',
    ),
) );


Kirki::add_field( 'barberry', array(
    'type'        => 'typography',
    'settings'    => 'page_header_font',
    'label'       => esc_attr__( 'Page Header Font', 'barberry' ),
    'section'     => $section,
    'choices'     => $choices_page_header_font,
    'default'     => array(
        'font-family'    => 'Josefin Sans',
        'font-weight'    => '700',
        'font-size'      => '60px',
        'line-height'    => '1.3',
        'text-transform' => 'none',
        'letter-spacing' => '-2.5',
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'typography',
    'settings'    => 'product_title_font',
    'label'       => esc_attr__( 'Product Title Font on catalog page', 'barberry' ),
    'description' => esc_attr__( 'Select font for product title on shop (archive) page', 'barberry' ),
    'section'     => $section,
    'choices'     => $product_title_font,
    'default'     => array(
        'font-family'    => 'Josefin Sans',
        'font-weight'    => '600',
        'text-transform' => 'none',
        'letter-spacing' => '-0.5',
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'typography',
    'settings'    => 'single_product_title_font',
    'label'       => esc_attr__( 'Product Title Font on product page', 'barberry' ),
    'description' => esc_attr__( 'Select font for product title on product page', 'barberry' ),
    'section'     => $section,
    'choices'     => $single_product_title_font,
    'default'     => array(
        'font-family'    => 'Josefin Sans',
        'font-weight'    => '700',
        'font-size'      => '62px',
        'line-height'    => '1.1',
        'text-transform' => 'none',
        'letter-spacing' => '-2',
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'typography',
    'settings'    => 'cart_page_title_font',
    'label'       => esc_attr__( 'Cart page Title Font size', 'barberry' ),
    'description' => esc_attr__( 'Select font size for Cart page title', 'barberry' ),
    'section'     => $section,
    'default'     => array(
        'font-size'      => '90px',
        'line-height'    => '1.2',
        'text-transform' => 'none',
        'letter-spacing' => '-2',
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'typography',
    'settings'    => 'my_account_title_font',
    'label'       => esc_attr__( 'My Account Title Font size', 'barberry' ),
    'description' => esc_attr__( 'Select font size for my account title', 'barberry' ),
    'section'     => $section,
    'default'     => array(
        'font-size'      => '70px',
        'line-height'    => '1.2',
        'text-transform' => 'none',
        'letter-spacing' => '-2',
    ),
) );





