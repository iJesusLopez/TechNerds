<?php

// ============================================
// Panel
// ============================================

// no panel


// ============================================
// Sections
// ============================================

Kirki::add_section( 'global', array(
    'title'          => esc_attr__( 'Global', 'barberry' ),
    'priority'       => 25,
    'capability'     => 'edit_theme_options',
) );


// ============================================
// Controls
// ============================================

$sep_id  = 100;
$section = 'global';


Kirki::add_field( 'barberry', array(
    'type'        => 'slider',
    'settings'    => 'navigation_breakpoint',
    'label'       => esc_attr__( 'Navigation Mobile Breakpoint', 'barberry' ),
    'description' => esc_html__( "Define at what window size (in px) the header navigation menu will collapse into the mobile menu style - larger values are useful when you have navigations with many items which wouldn't fit on one line when viewed on small desktops/laptops.", 'barberry' ),
    'section'     => $section,
    'default'     => 1024,
    'priority'    => 10,
    'choices'     => 
        array 
        (
            'min'   => 768,
            'max'   => 1400,
            'step'  => 1
        ),
));

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
    'settings'    => 'page_loader',
    'label'       => esc_attr__( 'Page Loader', 'barberry' ),
    'section'     => $section,
    'default'     => false,
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
    'type'        => 'toggle',
    'settings'    => 'lazyload',
    'label'       => esc_attr__( 'Enable Lazy Load (Beta)', 'barberry' ),
    'section'     => $section,
    'default'     => false,
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
    'type'        => 'toggle',
    'settings'    => 'backtotop',
    'label'       => esc_attr__( 'Enable Back to Top button', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'backtotop_mobile',
    'label'       => esc_attr__( 'Hide Back to Top button on mobile', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
     'active_callback'    => array(
        array(
            'setting'  => 'backtotop',
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
    'type'        => 'text',
    'settings'    => 'google_map_api_key',
    'label'       => esc_attr__( 'Google map API key', 'barberry' ),
    'description'  => wp_kses( __( 'Obrain API key <a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">here</a> to use our Google Map VC element.', 'barberry' ), array(
    'a' => array(
      'target' => array(),
      'href' => array(),
    ),
    ) ),
    'section'     => $section,
    'default'     => '',
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
    'type'        => 'toggle',
    'settings'    => 'hide_acf',
    'label'       => esc_attr__( 'Hide ACF Menu', 'barberry' ),
    'description' => esc_attr__( 'Hide Advanced Custom Fields plugin Menu', 'barberry' ),
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
    'type'        => 'toggle',
    'settings'    => 'combined_js',
    'label'       => esc_attr__( 'Combine JS files', 'barberry' ),
    'description' => esc_attr__( 'Combine all third party libraries and theme functions into one JS file (barberry-plugins-ext.js)', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
) );





