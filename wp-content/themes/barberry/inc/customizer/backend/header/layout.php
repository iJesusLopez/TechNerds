<?php

$sep_id  = 8475;
$section = 'header_layout';

Kirki::add_field( 'barberry', array(
    'type'        => 'radio-image',
    'settings'    => 'header_layout',
    'label'       => esc_attr__( 'Header Layout', 'barberry' ),
    'section'     => $section,
    'default'     => 'left',
    'priority'    => 10,
    'choices'     => array(

        'default' => array(
            'alt' => esc_attr__( 'Default', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/header-layout-1.png',
        ),

        'offcanvas' => array(
            'alt' => esc_attr__( 'Offcanvas', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/header-layout-2.png',
        ),

        'left' => array(
            'alt' => esc_attr__( 'Left', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/header-layout-3.png',
        ),

    ),
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'nav_center',
    'label'       => esc_attr__( 'Center navigation', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
     'active_callback'    => array(
        array(
            'setting'  => 'header_layout',
            'operator' => '==',
            'value'    => 'left',     
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
    'type'        => 'slider',
    'settings'    => 'header_padding',
    'label'       => esc_attr__( 'Header Paddings (Top/Bottom)', 'barberry' ),
    'section'     => $section,
    'default'     => 40,
    'priority'    => 10,
    'choices'     => array(
        'min'  => 0,
        'max'  => 200,
        'step' => 1
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
    'type'        => 'slider',
    'settings'    => 'header_padding_mobile',
    'label'       => esc_attr__( 'Header Paddings (Top/Bottom) on mobile', 'barberry' ),
    'section'     => $section,
    'default'     => 20,
    'priority'    => 10,
    'choices'     => array(
        'min'  => 0,
        'max'  => 200,
        'step' => 1
    ),
) );