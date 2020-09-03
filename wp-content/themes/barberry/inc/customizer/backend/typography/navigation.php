<?php

$sep_id  = 59400;
$section = 'navigation';

$page_header_nav_font   = barberry_add_custom_choice();
$page_header_nav_submenu_font   = barberry_add_custom_choice();
$page_header_nav_font_mob   = barberry_add_custom_choice();

Kirki::add_field( 'barberry', array(
    'type'        => 'typography',
    'settings'    => 'page_header_nav_font',
    'label'       => esc_attr__( 'Header Navigation Font', 'barberry' ),
    'section'     => $section,
    'choices'     => $page_header_nav_font,
    'default'     => array(
        'font-family'    => 'Roboto',
        'font-weight'    => '400',
        'font-size'      => '17px',
        'letter-spacing' => '0',
        'text-transform' => 'none',
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'typography',
    'settings'    => 'page_header_nav_submenu_font',
    'label'       => esc_attr__( 'Header Navigation Submenu Font', 'barberry' ),
    'section'     => $section,
    'choices'     => $page_header_nav_submenu_font,
    'default'     => array(
        'font-family'    => 'Roboto',
        'font-weight'    => '400',
        'font-size'      => '14px',
        'letter-spacing' => '0',
        'text-transform' => 'none',
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'typography',
    'settings'    => 'page_header_nav_font_mob',
    'label'       => esc_attr__( 'Header Navigation Font for tablet/mobile (Off-canvas)', 'barberry' ),
    'section'     => $section,
    'choices'     => $page_header_nav_font_mob,
    'default'     => array(
        'font-family'    => 'Roboto',
        'font-weight'    => '600',
        'font-size'      => '26px',
        'letter-spacing' => '0',
        'text-transform' => 'none',
    ),
) );