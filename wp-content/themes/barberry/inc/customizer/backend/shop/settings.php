<?php

$sep_id  = 7000;
$section = 'shop';

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'shop_filters',
    'label'       => esc_attr__( 'Shop filters', 'barberry' ),
    'description' => esc_attr__( 'Enable shop filters widget\'s area above the products', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
) );



Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'shop_filters_close',
    'label'       => esc_attr__( 'Stop close filter or sidebar after click', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'shop_filters',
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
    'settings'    => 'ajax_shop',
    'label'       => esc_attr__( 'AJAX shop', 'barberry' ),
    'description' => esc_attr__( 'Enable AJAX functionality for filters widgets on shop', 'barberry' ),
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
    'settings'    => 'add_to_cart_action',
    'label'       => esc_attr__( 'Action after add to cart', 'barberry' ),
    // 'description' => esc_html__('Choose between showing cart sidebar or No Action when you add to cart', 'barberry'),
    'section'     => $section,
    'default'     => 'sidebar',
    'priority'    => 10,
    'choices'     => array(
        'sidebar'   => esc_attr__( 'Show Off-Canvas Sidebar', 'barberry' ),
        'no_action' => esc_attr__( 'No Action', 'barberry' ),
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
    'settings'    => 'shop_decimals',
    'label'       => esc_attr__( 'Make small price decimals', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
) );

