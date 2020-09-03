<?php

$sep_id  = 7653;
$section = 'header_logo';

Kirki::add_field( 'barberry', array(
    'type'        => 'image',
    'settings'    => 'header_logo',
    'label'       => esc_attr__( 'Logo', 'barberry' ),
    'section'     => $section,
    'default'     => get_template_directory_uri() . '/images/barberry-logo.svg',
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
    'type'        => 'image',
    'settings'    => 'header_logo_light',
    'label'       => esc_attr__( 'Logo Light', 'barberry' ),
    'description' => esc_attr__( 'Logo for a Tansparent Background', 'barberry' ),
    'section'     => $section,
    'default'     => get_template_directory_uri() . '/images/barberry-logo-light.svg',
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
    'type'        => 'slider',
    'settings'    => 'header_logo_height',
    'label'       => esc_attr__( 'Max Logo Height', 'barberry' ),
    'section'     => $section,
    'default'     => 45,
    'priority'    => 10,
    'choices'     => array(
        'min'  => 25,
        'max'  => 400,
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
    'type'        => 'image',
    'settings'    => 'header_logo_sticky',
    'label'       => esc_attr__( 'Sticky Logo', 'barberry' ),
    'section'     => $section,
    'default'     => get_template_directory_uri() . '/images/barberry-logo.svg',
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
    'type'        => 'slider',
    'settings'    => 'header_sticky_logo_height',
    'label'       => esc_attr__( 'Max Sticky Logo Height', 'barberry' ),
    'section'     => $section,
    'default'     => 35,
    'priority'    => 10,
    'choices'     => array(
        'min'  => 15,
        'max'  => 300,
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
    'settings'    => 'header_mobile_logo_height',
    'label'       => esc_attr__( 'Max Mobile Logo Height', 'barberry' ),
    'section'     => $section,
    'default'     => 35,
    'priority'    => 10,
    'choices'     => array(
        'min'  => 15,
        'max'  => 300,
        'step' => 1
    ),
) );