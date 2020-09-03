<?php

$sep_id  = 8477;
$section = 'header_elements';

// ---------------------------------------------
Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'header_search',
    'label'       => esc_attr__( 'Search', 'barberry' ),
    'description' => esc_html__('Search settings you will find in Customize -> Header -> Search section', 'barberry'),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
) );



Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'header_wishlist',
    'label'       => esc_attr__( 'Wishlist', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'header_compare',
    'label'       => esc_attr__( 'Compare', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'header_account',
    'label'       => esc_attr__( 'My Account', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'header_account_icon',
    'label'       => esc_attr__( 'Icon instead "My Account" text', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'header_account',
            'operator' => '==',
            'value'    => true,
        ),
    ),
) );



Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'header_account_dropdown',
    'label'       => esc_attr__( 'Show Login form', 'barberry' ),
    'description' => esc_html__('Display login form modal window on click when user is not logged in.', 'barberry'),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
	'active_callback'    => array(
		array(
		    'setting'  => 'header_account',
		    'operator' => '==',
		    'value'    => true,
		),
	),
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'header_account_with_username',
    'label'       => esc_attr__( 'With username', 'barberry' ),
    'description' => esc_html__('Display username when user is logged in.', 'barberry'),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
	'active_callback'    => array(
		array(
		    'setting'  => 'header_account',
		    'operator' => '==',
		    'value'    => true,
		),
	),
) );



Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'header_cart_icon',
    'label'       => esc_attr__( 'Header Cart Icon instead "Cart" text', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'header_cart_link',
    'label'       => esc_attr__( 'Header Cart', 'barberry' ),
    'description' => esc_html__('Choose between showing cart sidebar or redirect to cart page when you click on header cart', 'barberry'),
    'section'     => $section,
    'default'     => 'sidebar',
    'priority'    => 10,
    'choices'     => array(
        'sidebar'   => esc_attr__( 'Show Hidden Off-Canvas Sidebar', 'barberry' ),
        'without' => esc_attr__( 'Without', 'barberry' ),
    ),
) );