<?php

$sep_id  = 7654;
$section = 'header_sticky';

// ---------------------------------------------
Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'sticky_header',
    'label'       => esc_attr__( 'Sticky Header', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
) );


// ---------------------------------------------
Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'sticky_header_mobile',
    'label'       => esc_attr__( 'Sticky Header on Tablet/Mobile devices', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
	'active_callback'    => array(
		array(
		    'setting'  => 'sticky_header',
		    'operator' => '==',
		    'value'    => true,
		),
	),   
) );


Kirki::add_field( 'barberry', array(
    'type'        => 'slider',
    'settings'    => 'sticky_header_padding',
    'label'       => esc_attr__( 'Sticky Header Paddings (Top/Bottom)', 'barberry' ),
    'section'     => $section,
    'default'     => 15,
    'priority'    => 10,
    'choices'     => array(
        'min'  => 0,
        'max'  => 100,
        'step' => 1
    ),
	'active_callback'    => array(
		array(
		    'setting'  => 'sticky_header',
		    'operator' => '==',
		    'value'    => true,
		),
	),
) );