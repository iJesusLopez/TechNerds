<?php

$priority = 1;

$sep_id  = 59374;
$section = 'body';

$variant_body = array(
    '100',
    '400',
    '400italic',
    '700',
    '700italic',
);

$choices_body   = barberry_add_custom_choice();

$choices_body['variant']   = $variant_body;


Kirki::add_field( 'barberry', array(
    'type'        => 'typography',
    'settings'    => 'main_font',
    'label'       => esc_attr__( 'Body Font', 'barberry' ),
    'section'     => $section,
    'priority'    => $priority++,
    'choices'     => $choices_body,
    'default'     => array(
        'font-family'    => 'Roboto',
        'font-weight'    => '400',
        'font-size'      => '17px',
        'line-height'    => '1.8',
        'letter-spacing' => '0',
        'subsets'        => array( 'latin-ext' ),
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
    'type'        => 'typography',
    'settings'    => 'main_font_mobile',
    'label'       => esc_attr__( 'Body Font Mobile', 'barberry' ),
    'section'     => $section,
    'default'     => array(
         'font-size'      => '17px',
         'line-height'    => '1.8',
    ),

) );


/**
 * Force Load All Fonts Variations
 */
Kirki::add_field(
    'arts', [
        'type'        => 'switch',
        'settings'    => 'force_load_all_fonts_variations',
        'label'       => esc_html__( 'Force Load All Selected Fonts Variations', 'barberry' ),
        'description' => esc_html__( 'Please also note that this may significantly decrease site loading speed if your font contains a lot of weights & styles.', 'barberry' ),
        'section'     => $section,
        'default'     => false,
    ]
);

