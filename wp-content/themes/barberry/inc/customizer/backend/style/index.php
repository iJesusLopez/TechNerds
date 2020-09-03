<?php

// ============================================
// Panel
// ============================================

// no panel


// ============================================
// Sections
// ============================================

Kirki::add_section( 'style', array(
    'title'          => esc_attr__( 'Style', 'barberry' ),
    'priority'       => 25,
    'capability'     => 'edit_theme_options',
) );


// ============================================
// Controls
// ============================================

$sep_id  = 301;
$section = 'style';

Kirki::add_field( 'barberry', array(
	'type'        => 'custom',
	'settings'    => 'section_title_'. $sep_id++,
	'section'     => $section,
	'default'     => '<h1 style="padding-top: 10px; padding-bottom: 10px; margin-bottom: 20px; font-size:26px; border-bottom:4px solid #000">' . esc_html__( 'Color/Background color settings', 'barberry' ) . '</h1>',
	'priority'    => 10,
));


Kirki::add_field( 'barberry', array(
    'type'        => 'color',
    'settings'    => 'bg_color',
    'label'       => esc_attr__( 'Content Background', 'barberry' ),
    'section'     => $section,
    'default'     => '#FFFFFF',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'color',
    'settings'    => 'base_color_scheme',
    'label'       => esc_attr__( 'Base Color', 'barberry' ),
    'section'     => $section,
    'default'     => '#000000',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'color',
    'settings'    => 'accent_color_scheme',
    'label'       => esc_attr__( 'Accent Color', 'barberry' ),
    'section'     => $section,
    'default'     => '#000000',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'color',
    'settings'    => 'main_font_color',
    'label'       => esc_attr__( 'Body Font Color', 'barberry' ),
    'section'     => $section,
    'default'     => '#1c1c1c',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'color',
    'settings'    => 'bg_button_color',
    'label'       => esc_attr__( 'Button Color', 'barberry' ),
    'section'     => $section,
    'default'     => '#000000',
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
    'type'        => 'color',
    'settings'    => 'cart_bgcolor',
    'label'       => esc_attr__( 'Cart Totals Background Color', 'barberry' ),
    'section'     => $section,
    'default'     => '#f4f4f4',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'color',
    'settings'    => 'checkout_bgcolor',
    'label'       => esc_attr__( 'Checkout Total Background Color', 'barberry' ),
    'section'     => $section,
    'default'     => '#f4f4f4',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'color',
    'settings'    => 'myaccount_bgcolor',
    'label'       => esc_attr__( 'My Account Left Navigation Background Color', 'barberry' ),
    'section'     => $section,
    'default'     => '#f4f4f4',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
	'type'        => 'custom',
	'settings'    => 'section_title_'. $sep_id++,
	'section'     => $section,
	'default'     => '<h1 style="padding-top: 10px; padding-bottom: 10px; margin-bottom: 20px; font-size:26px; border-bottom:4px solid #000">' . esc_html__( 'Animations settings', 'barberry' ) . '</h1>',
	'priority'    => 10,
));



Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'load_animation',
    'label'       => esc_attr__( 'Loading Transition Animation', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'nav_diag_animation',
    'label'       => esc_attr__( 'Diagonal Navigation Animation', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'blur_background',
    'label'       => esc_attr__( 'Activate blur background in pop-up windows (Quick View, Share)', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
) );


Kirki::add_field( 'barberry', array(
	'type'        => 'custom',
	'settings'    => 'section_title_'. $sep_id++,
	'section'     => $section,
	'default'     => '<h1 style="padding-top: 10px; padding-bottom: 10px; margin-bottom: 20px; font-size:26px; border-bottom:4px solid #000">' . esc_html__( 'Layout Styles', 'barberry' ) . '</h1>',
	'priority'    => 10,
));


Kirki::add_field( 'barberry', array(
    'type'        => 'radio-image',
    'settings'    => 'tag_cloud_style',
    'label'       => esc_attr__( 'Tag Cloud widget layout', 'barberry' ),
    'section'     => $section,
    'default'     => 'equal',
    'priority'    => 10,
    'choices'     => array(

        'default' => array(
            'alt' => esc_attr__( 'Default', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/tag-cloud-default.png',
        ),

        'equal' => array(
            'alt' => esc_attr__( 'Equal', 'barberry' ),
            'src' => get_template_directory_uri() . '/images/customizer/tag-cloud-equal.png',
        ),

    ),
) );





