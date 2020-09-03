<?php

$sep_id  = 8775;
$section = 'header_search';

// ---------------------------------------------
Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'predictive_search',
    'label'       => esc_attr__( 'Ajax Search', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'number',
    'settings'    => 'predictive_search_no',
    'label'       => esc_attr__( 'Max Number of products in results', 'barberry' ),
    'section'     => $section,
    'default'     => 8,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'predictive_search',
            'operator' => '==',
            'value'    => true,
        ),
    ),
));

Kirki::add_field( 'barberry', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'post_type',
    'label'       => esc_attr__( 'Post type', 'barberry' ),
    'section'     => $section,
    'default'     => 'product',
    'priority'    => 10,
    'choices'     => array(
        'product'   => esc_attr__( 'Product', 'barberry' ),
        'post' => esc_attr__( 'Post', 'barberry' ),
    ),
) );


Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'search_by_sku',
    'label'       => esc_attr__( 'Search by product SKU', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
) );


Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'typewriter_effect',
    'label'       => esc_attr__( 'Typewriter Effect', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'text',
    'settings'    => 'typewriter_text',
    'label'       => esc_attr__( 'Typewriter Text', 'barberry' ),
    'section'     => $section,
    'default'     => 'Chair, Lamp, anything',
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'typewriter_effect',
            'operator' => '==',
            'value'    => true,     
        ),
    ),   
) );