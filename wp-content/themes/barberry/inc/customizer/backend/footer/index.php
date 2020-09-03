<?php

// ============================================
// Panel
// ============================================

// no panel


// ============================================
// Sections
// ============================================

Kirki::add_section( 'footer', array(
    'title'          => esc_attr__( 'Footer', 'barberry' ),
    'priority'       => 60,
    'capability'     => 'edit_theme_options',
) );

// ============================================
// Controls
// ============================================

$sep_id  = 48536;
$section = 'footer';

// ---------------------------------------------
Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'footer_reveal',
    'label'       => esc_attr__( 'Footer Reveal Effect', 'barberry' ),
    'description' => esc_attr__( "This to cause the footer to appear as though it's being reveal by the main content area when scrolling down to it", 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'footer_hover',
    'label'       => esc_attr__( 'Change footer background when footer is visible', 'barberry' ),
    // 'description' => esc_attr__( "This to cause the footer to appear as though it's being reveal by the main content area when scrolling down to it", 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'footer_reveal',
            'operator' => '!=',
            'value'    => '1',     
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
    'type'        => 'color',
    'settings'    => 'footer_background_color',
    'label'       => esc_attr__( 'Footer Background Color', 'barberry' ),
    'section'     => $section,
    'default'     => '#FFFFFF',
    'priority'    => 10,
) );


Kirki::add_field( 'barberry', array(
    'type'        => 'color',
    'settings'    => 'footer_font_color',
    'label'       => esc_attr__( 'Footer Font Color', 'barberry' ),
    'section'     => $section,
    'default'     => '#000000',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'color',
    'settings'    => 'footer_hover_background_color',
    'label'       => esc_attr__( 'Footer Hover Background Color', 'barberry' ),
    'section'     => $section,
    'default'     => '#111111',
    'priority'    => 10,
    'active_callback'    => array(
         array(
            'setting'  => 'footer_reveal',
            'operator' => '!=',
            'value'    => '1',     
        ),       
        array(
            'setting'  => 'footer_hover',
            'operator' => '!=',
            'value'    => '0',     
        ),
    ),    
) );


Kirki::add_field( 'barberry', array(
    'type'        => 'color',
    'settings'    => 'footer_hover_font_color',
    'label'       => esc_attr__( 'Footer Hover Font Color', 'barberry' ),
    'section'     => $section,
    'default'     => '#FFFFFF',
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'footer_reveal',
            'operator' => '!=',
            'value'    => '1',     
        ),
        array(
            'setting'  => 'footer_hover',
            'operator' => '!=',
            'value'    => '0',     
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
    'type'        => 'radio-image',
    'settings'    => 'footer_layout',
    'label'       => esc_attr__( 'Footer Layout', 'barberry' ),
    'section'     => $section,
    'default'     => '0',
    'priority'    => 10,
    'choices'     => array(

        '0' => array(
            'alt' => esc_attr__( 'Layout Off', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/footer/layout-off.png',
        ),

        '1' => array(
            'alt' => esc_attr__( 'Footer 1 column', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/footer/footer-widgets-1.png',
        ),

        '2' => array(
            'alt' => esc_attr__( 'Footer 2 column', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/footer/footer-widgets-2.png',
        ),

        '3' => array(
            'alt' => esc_attr__( 'Footer 3 column', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/footer/footer-widgets-3.png',
        ),

        '4' => array(
            'alt' => esc_attr__( 'Footer 4 column', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/footer/footer-widgets-4.png',
        ),

        '5' => array(
            'alt' => esc_attr__( 'Footer 5 column', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/footer/footer-widgets-5.png',
        ),

        '6' => array(
            'alt' => esc_attr__( 'Footer 1-1-1-2 columns', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/footer/footer-widgets-1-1-1-2.png',
        ),

        '7' => array(
            'alt' => esc_attr__( 'Footer 1-1-2 columns', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/footer/footer-widgets-1-1-2.png',
        ),

        '8' => array(
            'alt' => esc_attr__( 'Footer 1-2-1 columns', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/footer/footer-widgets-1-2-1.png',
        ),

        '9' => array(
            'alt' => esc_attr__( 'Footer 2-1-1 columns', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/footer/footer-widgets-2-1-1.png',
        ),
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'footer_1_align',
    'label'       => esc_attr__( 'Footer 1 Sidebar Content Align', 'barberry' ),
    'section'     => $section,
    'default'     => 'text-left',
    'priority'    => 10,
    'choices'     => array(
        'text-left'    => esc_attr__( 'Left', 'barberry' ),
        'text-center'    => esc_attr__( 'Center', 'barberry' ),
        'text-right'   => esc_attr__( 'Right', 'barberry' ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'footer_layout',
            'operator' => '!=',
            'value'    => '0',     
        ),
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'footer_2_align',
    'label'       => esc_attr__( 'Footer 2 Sidebar Content Align', 'barberry' ),
    'section'     => $section,
    'default'     => 'text-left',
    'priority'    => 10,
    'choices'     => array(
        'text-left'    => esc_attr__( 'Left', 'barberry' ),
        'text-center'    => esc_attr__( 'Center', 'barberry' ),
        'text-right'   => esc_attr__( 'Right', 'barberry' ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'footer_layout',
            'operator' => '!=',
            'value'    => '0',     
        ),
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'footer_3_align',
    'label'       => esc_attr__( 'Footer 3 Sidebar Content Align', 'barberry' ),
    'section'     => $section,
    'default'     => 'text-left',
    'priority'    => 10,
    'choices'     => array(
        'text-left'    => esc_attr__( 'Left', 'barberry' ),
        'text-center'    => esc_attr__( 'Center', 'barberry' ),
        'text-right'   => esc_attr__( 'Right', 'barberry' ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'footer_layout',
            'operator' => '!=',
            'value'    => '0',     
        ),
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'footer_4_align',
    'label'       => esc_attr__( 'Footer 4 Sidebar Content Align', 'barberry' ),
    'section'     => $section,
    'default'     => 'text-left',
    'priority'    => 10,
    'choices'     => array(
        'text-left'    => esc_attr__( 'Left', 'barberry' ),
        'text-center'    => esc_attr__( 'Center', 'barberry' ),
        'text-right'   => esc_attr__( 'Right', 'barberry' ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'footer_layout',
            'operator' => '!=',
            'value'    => '0',     
        ),
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'footer_5_align',
    'label'       => esc_attr__( 'Footer 5 Sidebar Content Align', 'barberry' ),
    'section'     => $section,
    'default'     => 'text-left',
    'priority'    => 10,
    'choices'     => array(
        'text-left'    => esc_attr__( 'Left', 'barberry' ),
        'text-center'    => esc_attr__( 'Center', 'barberry' ),
        'text-right'   => esc_attr__( 'Right', 'barberry' ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'footer_layout',
            'operator' => '!=',
            'value'    => '0',     
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
    'type'        => 'radio-image',
    'settings'    => 'footer_copy_section',
    'label'       => esc_attr__( 'Footnote / Copyright section Layout', 'barberry' ),
    'section'     => $section,
    'default'     => '1',
    'priority'    => 10,
    'choices'     => array(

        '0' => array(
            'alt' => esc_attr__( 'Layout Off', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/footer/layout-off.png',
        ),

        '1' => array(
            'alt' => esc_attr__( 'Footer 3 column', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/footer/footer-copy-1.png',
        ),

        '2' => array(
            'alt' => esc_attr__( 'Footer 1 column', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/footer/footer-copy-2.png',
        ),
    ),
) );

Kirki::add_field( 'barberry', array(
    'type'     => 'textarea',
    'settings' => 'footer_text',
    'label'    => esc_attr__( 'Footnote / Copyright Text', 'barberry' ),
    'section'  => $section,
    'default'  => esc_attr__( '© 2020 <strong>Barberry</strong>. All rights reserved', 'barberry' ),
    'priority' => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'footer_copy_section',
            'operator' => '!=',
            'value'    => '0',     
        ),
    ),
) );



Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'footer_social',
    'label'       => esc_attr__( 'Show Social Icons in footer', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'footer_copy_section',
            'operator' => '!=',
            'value'    => '0',     
        ),
    ),
) );


Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'footer_payment_options_on',
    'label'       => esc_attr__( 'Show Payment Icons in footer', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'footer_copy_section',
            'operator' => '!=',
            'value'    => '0',     
        ),
    ),
) );



Kirki::add_field( 'barberry', array(
    'type'        => 'repeater',
    'label'       => esc_attr__( 'Payment Options', 'barberry' ),
    'section'     => $section,
    'priority'    => 10,
    'row_label'     => array(
        'type'      => 'field',
        'value'     => esc_attr__('Payment Option', 'barberry' ),
        'field'     => 'payment_option_name',
    ),
    'button_label' => esc_attr__('Add New Payment Option', 'barberry' ),
    'settings'     => 'footer_payment_options',
    'default'      => array(
        array(
            'payment_option_name' => esc_attr__( 'Visa', 'barberry' ),
            'payment_option_image'  => get_template_directory_uri() . '/images/customizer/footer/payment-icon-visa.png',
        ),
        array(
            'payment_option_name' => esc_attr__( 'MasterCard', 'barberry' ),
            'payment_option_image'  => get_template_directory_uri() . '/images/customizer/footer/payment-icon-mastercard.png',
        ),
        array(
            'payment_option_name' => esc_attr__( 'Amex', 'barberry' ),
            'payment_option_image'  => get_template_directory_uri() . '/images/customizer/footer/payment-icon-amex.png',
        ),
        array(
            'payment_option_name' => esc_attr__( 'PayPal', 'barberry' ),
            'payment_option_image'  => get_template_directory_uri() . '/images/customizer/footer/payment-icon-paypal.png',
        ),
        array(
            'payment_option_name' => esc_attr__( 'Amazon', 'barberry' ),
            'payment_option_image'  => get_template_directory_uri() . '/images/customizer/footer/payment-icon-amazon.png',
        ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'footer_copy_section',
            'operator' => '!=',
            'value'    => '0',     
        ),        
        array(
            'setting'  => 'footer_payment_options_on',
            'operator' => '==',
            'value'    => true,     
        ),
    ),
    'fields' => array(
        'payment_option_name' => array(
            'type'        => 'text',
            'label'       => esc_attr__( 'Name', 'barberry' ),
            'default'     => '',
        ),
        'payment_option_image' => array(
            'type'        => 'image',
            'label'       => esc_attr__( 'Icon', 'barberry' ),
            'default'     => '',
        ),
    )
) );

