<?php

// ============================================
// Panel
// ============================================

// no panel


// ============================================
// Sections
// ============================================

Kirki::add_section( 'offcanvas', array(
    'title'          => esc_attr__( 'Offcanvas', 'barberry' ),
    'priority'       => 60,
    'capability'     => 'edit_theme_options',
) );

// ============================================
// Controls
// ============================================

$sep_id  = 49536;
$section = 'offcanvas';

// ---------------------------------------------

Kirki::add_field( 'barberry', array(
    'type'        => 'multicheck',
    'settings'    => 'offcanvas_bottom',
    'label'       => esc_attr__( 'Off-canvas Bottom Section', 'barberry' ),
    'description' => esc_attr__( 'Select what you want to show in the bottom of off-canvas menu', 'barberry' ),
    'section'     => $section,
    'default'     => array('socials','contact'),
    'priority'    => 10,
    'choices'     => array(
        'socials' => esc_attr__( 'Social Media Icons', 'barberry' ),
        'contact' => esc_attr__( 'Contact Info', 'barberry' ),
        'wpml' => esc_attr__( 'WPML/Polylang language/currency switchers', 'barberry' ),
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'     => 'textarea',
    'settings' => 'offcanvas_contact',
    'label'       => esc_attr__( 'Contact Info', 'barberry' ),
    'section'  => $section,
    'default'  => __( '<a href="mailto:info@yourwebsite.com">info@yourwebsite.com</a><br>
<a href="tel:+12 (0) 12-345-678">+12 (0) 12-345-678</a><br>', 'barberry' ),
    'priority' => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'offcanvas_bottom',
            'operator' => 'contains',
            'value'    => 'contact',
        ),        
    ),
) );


Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'offcanvas_wpml_languages',
    'label'       => esc_attr__( 'WPML/Polylang Language Switcher', 'barberry' ),
    'description' => esc_attr__( 'Check this option to enable WPML Language Switcher in Secondary Header.', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
    'active_callback'    => array(

        array(
            'setting'  => 'offcanvas_bottom',
            'operator' => 'contains',
            'value'    => 'wpml',
        ),        
    ),
) );


Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'offcanvas_wpml_lang_intro',
    'label'       => esc_attr__( 'WPML/Polylang Languages Intro text', 'barberry' ),
    'description' => esc_attr__( 'Show/Hide language/currency switcher intro text: "I speak"', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'offcanvas_wpml_languages',
            'operator' => '==',
            'value'    => true,
        ),        
        array(
            'setting'  => 'offcanvas_bottom',
            'operator' => 'contains',
            'value'    => 'wpml',
        ),        
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'offcanvas_wpml_native',
    'label'       => esc_attr__( 'WPML/Polylang Language Switcher Native Names', 'barberry' ),
    'description' => esc_attr__( 'Check this option to display native language names inside switcher.', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'offcanvas_wpml_languages',
            'operator' => '==',
            'value'    => true,
        ),        
        array(
            'setting'  => 'offcanvas_bottom',
            'operator' => 'contains',
            'value'    => 'wpml',
        ),        
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'offcanvas_wpml_flags',
    'label'       => esc_attr__( 'WPML/Polylang Language Switcher Flags', 'barberry' ),
    'description' => esc_attr__( 'Check this option to display national flags in switcher.', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'offcanvas_wpml_languages',
            'operator' => '==',
            'value'    => true,
        ),        
        array(
            'setting'  => 'offcanvas_bottom',
            'operator' => 'contains',
            'value'    => 'wpml',
        ),        
    ),
) );



Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'offcanvas_wpml_currency',
    'label'       => esc_attr__( 'WPML/WooCommerce Multi Currency plugins Currency Switcher', 'barberry' ),
    'description' => esc_attr__( 'Check this option to enable WPML Currency Switcher in Secondary Header.', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'offcanvas_bottom',
            'operator' => 'contains',
            'value'    => 'wpml',
        ),        
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'offcanvas_wpml_cur_intro',
    'label'       => esc_attr__( 'WPML/WooCommerce Multi Currency Intro text', 'barberry' ),
    'description' => esc_attr__( 'Show/Hide language/currency switcher intro text: "and my currency is"', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'offcanvas_wpml_currency',
            'operator' => '==',
            'value'    => true,
        ),        
        array(
            'setting'  => 'offcanvas_bottom',
            'operator' => 'contains',
            'value'    => 'wpml',
        ),        
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'offcanvas_wpml_code',
    'label'       => esc_attr__( 'Switch Into Currency Code Format', 'barberry' ),
    'description' => esc_attr__( 'Check this option to change WPML Currency Switcher format into currency code, in example "($) USD"', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'offcanvas_wpml_currency',
            'operator' => '==',
            'value'    => true,
        ),        
        array(
            'setting'  => 'offcanvas_bottom',
            'operator' => 'contains',
            'value'    => 'wpml',
        ),        
    ),
) );



