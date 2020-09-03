<?php

$sep_id  = 8500;
$section = 'page_title';

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'breadcrumbs',
    'label'       => esc_attr__( 'Show Breadcrumbs', 'barberry' ),
    'description' => esc_attr__( 'Displays a full chain of links to the current page.', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'radio-image',
    'settings'    => 'page-title',
    'label'       => esc_attr__( 'Page Title', 'barberry' ),
    'description' => esc_attr__( 'Select page title section or disable it completely on all pages.', 'barberry' ),
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
    'type'        => 'background',
    'settings'    => 'page-title-background',
    'label'       => esc_attr__( 'Pages Heading Background', 'barberry' ),
    'description' => esc_attr__( 'Set background image or color, that will be used as a default for all page titles, shop page and blog.', 'barberry' ),
    'section'     => $section,
    'default'     => array(
        'background-color'      => '#f7f7f7',
        'background-image'      => '',
        'background-repeat'     => 'repeat',
        'background-position'   => 'center center',
        'background-size'       => 'cover',
        'background-attachment' => 'scroll',
    ),
    'output'  => array(
        array(
            'element' => '.page-header-bg',
        ),
    ),    
) );

// Kirki::add_field( 'barberry', array(
//     'type'        => 'switch',
//     'settings'    => 'page-title-overflow',
//     'label'       => esc_attr__( 'Disable Hidden Overflow', 'barberry' ),
//     'section'     => $section,
//     'default'     => false,
//     'priority'    => 10,
// ) );

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
    'settings'    => 'page-title-color',
    'label'       => esc_attr__( 'Page Title Color Scheme', 'barberry' ),
    'description' => esc_html__('You can set different colors depending on it\'s background. May be light or dark', 'barberry'),
    'section'     => $section,
    'default'     => 'default',
    'priority'    => 10,
    'choices'     => array(
        'default'   => esc_attr__( 'Default', 'barberry' ),
        'light' => esc_attr__( 'Light', 'barberry' ),
        'dark'  => esc_attr__( 'Dark', 'barberry' ),
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
    'settings'    => 'page-title-size',
    'label'       => esc_attr__( 'Page Title Section Size', 'barberry' ),
    'description' => esc_html__('You can set different sizes for your pages title section', 'barberry'),
    'section'     => $section,
    'default'     => 'default',
    'priority'    => 10,
    'choices'     => array(
        'default'   => esc_attr__( 'Default', 'barberry' ),
        'small' => esc_attr__( 'Small', 'barberry' ),
        'large'  => esc_attr__( 'Large', 'barberry' ),
        'xlarge'  => esc_attr__( 'XLarge', 'barberry' ),
    ),
) );