<?php

$sep_id  = 59378;
$section = 'elements';

$single_button_font   = barberry_add_custom_choice();

Kirki::add_field( 'barberry', array(
    'type'        => 'typography',
    'settings'    => 'button_font',
    'label'       => esc_attr__( 'Button Style', 'barberry' ),
    'section'     => $section,
    'choices'     => $single_button_font,
    'default'     => array(
        'font-family'       => 'Josefin Sans',
        'font-weight'    => '500',
        'font-size'      => '16px',
        'letter-spacing' => '0',
        'text-transform' => 'none',
    ),
) );



