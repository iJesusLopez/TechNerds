<?php

$sep_id  = 8478;
$section = 'header_style';

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'header_transparent',
    'label'       => esc_attr__( 'Header Above the Content', 'barberry' ),
    'description' => esc_attr__( 'Overlap page content with this header (header is transparent).', 'barberry' ),
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

Kirki::add_field( 'theme_config_id', array(
	'type'        => 'color',
	'settings'    => 'header_background_color',
	'label'       => esc_attr__( 'Header Background Color', 'barberry' ),
	'section'     => $section,
	'default'     => '#ffffff',
    'choices'     => array(
        'alpha' => true,
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
    'settings'    => 'header_color_scheme',
    'label'       => esc_attr__( 'Header Elements Color Scheme', 'barberry' ),
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