<?php

$sep_id  = 7200;
$section = 'shop_catalog_mode';

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'catalog_mode',
    'label'       => esc_attr__( 'Catalog Mode', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
) );



Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'catalog_mode_button',
    'label'       => esc_attr__( 'Hide Add to Cart Button', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'catalog_mode',
            'operator' => '!=',
            'value'    => '0',     
        ),
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'catalog_mode_variables',
    'label'       => esc_attr__( 'Hide variable selections on variable products.', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'catalog_mode_button',
            'operator' => '!=',
            'value'    => '0',     
        ),
    ),
) );


Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'catalog_mode_price',
    'label'       => esc_attr__( 'Hide Product Price', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
    'active_callback' => array(
        array(
            'setting'  => 'catalog_mode',
            'operator' => '==',
            'value'    => true,     
        ),
    ),
) );
