<?php

$sep_id  = 7655;
$section = 'header_topbar';

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'topbar_toggle',
    'label'       => esc_attr__( 'Top Bar', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'topbar_mobile',
    'label'       => esc_attr__( 'Show Top Bar on mobile', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'topbar_toggle',
            'operator' => '==',
            'value'    => true,
        ),       
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'multicheck',
    'settings'    => 'topbar_left',
    'label'       => esc_attr__( 'Left Side of Top Bar', 'barberry' ),
    'description' => esc_attr__( 'Select what you want to show in the left side of Header Top Bar', 'barberry' ),
    'section'     => $section,
    'default'     => array('contact'),
    'priority'    => 10,
    'choices'     => array(
        'socials' => esc_attr__( 'Social Media Icons', 'barberry' ),
        'contact' => esc_attr__( 'Contact Info', 'barberry' ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'topbar_toggle',
            'operator' => '==',
            'value'    => true,
        ),
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'     => 'textarea',
    'settings' => 'topbar_contact',
    'label'       => esc_attr__( 'Contact Info', 'barberry' ),
    'section'  => $section,
    'default'  => __( '<a href="tel:+12 (0) 12-345-678"><strong>Call</strong> +12 (0) 12-345-678</a>', 'barberry' ),
    'priority' => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'topbar_toggle',
            'operator' => '==',
            'value'    => true,
        ),
        array(
            'setting'  => 'topbar_left',
            'operator' => 'contains',
            'value'    => 'contact',
        ),        
    ),
) );





Kirki::add_field( 'barberry', array(
    'type'        => 'multicheck',
    'settings'    => 'topbar_right',
    'label'       => esc_attr__( 'Right Side of Top Bar', 'barberry' ),
    'description' => esc_attr__( 'Select what you want to show in the right side of Header Top Bar', 'barberry' ),
    'section'     => $section,
    'default'     => array('socials'),
    'priority'    => 10,
    'choices'     => array(
        'wpml' => esc_attr__( 'WPML/Polylang language/currency switchers', 'barberry' ),
        'socials' => esc_attr__( 'Social Media Icons', 'barberry' ),
        
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'topbar_toggle',
            'operator' => '==',
            'value'    => true,
        ),
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'topbar_wpml_languages',
    'label'       => esc_attr__( 'WPML/Polylang Language Switcher', 'barberry' ),
    'description' => esc_attr__( 'Check this option to enable WPML/Polylang Language Switcher in Secondary Header.', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'topbar_toggle',
            'operator' => '==',
            'value'    => true,
        ),
        array(
            'setting'  => 'topbar_right',
            'operator' => 'contains',
            'value'    => 'wpml',
        ),        
    ),
) );


Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'topbar_wpml_lang_intro',
    'label'       => esc_attr__( 'WPML/Polylang Languages Intro text', 'barberry' ),
    'description' => esc_attr__( 'Show/Hide language/currency switcher intro text: "I speak"', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'topbar_toggle',
            'operator' => '==',
            'value'    => true,
        ),
        array(
            'setting'  => 'topbar_wpml_languages',
            'operator' => '==',
            'value'    => true,
        ),        
        array(
            'setting'  => 'topbar_right',
            'operator' => 'contains',
            'value'    => 'wpml',
        ),        
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'topbar_wpml_native',
    'label'       => esc_attr__( 'WPML/Polylang Language Switcher Native Names', 'barberry' ),
    'description' => esc_attr__( 'Check this option to display native language names inside switcher.', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'topbar_toggle',
            'operator' => '==',
            'value'    => true,
        ),
        array(
            'setting'  => 'topbar_wpml_languages',
            'operator' => '==',
            'value'    => true,
        ),        
        array(
            'setting'  => 'topbar_right',
            'operator' => 'contains',
            'value'    => 'wpml',
        ),        
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'topbar_wpml_flags',
    'label'       => esc_attr__( 'WPML/Polylang Language Switcher Flags', 'barberry' ),
    'description' => esc_attr__( 'Check this option to display national flags in switcher.', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'topbar_toggle',
            'operator' => '==',
            'value'    => true,
        ),
        array(
            'setting'  => 'topbar_wpml_languages',
            'operator' => '==',
            'value'    => true,
        ),        
        array(
            'setting'  => 'topbar_right',
            'operator' => 'contains',
            'value'    => 'wpml',
        ),        
    ),
) );



Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'topbar_wpml_currency',
    'label'       => esc_attr__( 'WPML/WooCommerce Multi Currency plugins Currency Switcher', 'barberry' ),
    'description' => esc_attr__( 'Check this option to enable WPML Currency Switcher in Secondary Header.', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'topbar_toggle',
            'operator' => '==',
            'value'    => true,
        ),
        array(
            'setting'  => 'topbar_right',
            'operator' => 'contains',
            'value'    => 'wpml',
        ),        
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'topbar_wpml_cur_intro',
    'label'       => esc_attr__( 'WPML/WooCommerce Multi Currency Intro text', 'barberry' ),
    'description' => esc_attr__( 'Show/Hide language/currency switcher intro text: "and my currency is"', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'topbar_toggle',
            'operator' => '==',
            'value'    => true,
        ),
        array(
            'setting'  => 'topbar_wpml_currency',
            'operator' => '==',
            'value'    => true,
        ),        
        array(
            'setting'  => 'topbar_right',
            'operator' => 'contains',
            'value'    => 'wpml',
        ),        
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'topbar_wpml_code',
    'label'       => esc_attr__( 'Switch Into Currency Code Format', 'barberry' ),
    'description' => esc_attr__( 'Check this option to change WPML Currency Switcher format into currency code, in example "($) USD"', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'topbar_toggle',
            'operator' => '==',
            'value'    => true,
        ),
        array(
            'setting'  => 'topbar_wpml_currency',
            'operator' => '==',
            'value'    => true,
        ),        
        array(
            'setting'  => 'topbar_right',
            'operator' => 'contains',
            'value'    => 'wpml',
        ),        
    ),
) );


Kirki::add_field( 'barberry', array(
    'type'        => 'color',
    'settings'    => 'topbar_bg_color',
    'label'       => esc_attr__( 'Background Color', 'barberry' ),
    'section'     => $section,
    'default'     => '#ffffff',
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'topbar_toggle',
            'operator' => '==',
            'value'    => true,
        ),
    ),
) );


Kirki::add_field( 'barberry', array(
    'type'        => 'color',
    'settings'    => 'topbar_font_color',
    'label'       => esc_attr__( 'Text Color', 'barberry' ),
    'section'     => $section,
    'default'     => '#333333',
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'topbar_toggle',
            'operator' => '==',
            'value'    => true,
        ),
    ),
) );

