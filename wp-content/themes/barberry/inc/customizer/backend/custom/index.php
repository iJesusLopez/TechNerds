<?php

// ============================================
// Panel
// ============================================

// no panel


// ============================================
// Sections
// ============================================

Kirki::add_section( 'custom_code', array(
    'title'          => esc_attr__( 'Custom Code', 'barberry' ),
    'priority'       => 90,
    'capability'     => 'edit_theme_options',
) );


// ============================================
// Controls
// ============================================

$sep_id  = 40000;
$section = 'custom_code';

Kirki::add_field( 'barberry', array(
	'type'        => 'code',
	'settings'    => 'custom_css',
	'label'       => esc_attr__( 'Custom CSS', 'barberry' ),
	'section'     => 'custom_code',
	'default'     => '',
	'priority'    => 10,
	'choices'     => array(
		'language' => 'css',
		'theme'    => 'monokai',
		'height'   => 150,
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
	'type'        => 'code',
	'settings'    => 'footer_js',
	'label'       => esc_attr__( 'Footer JavaScript Code', 'barberry' ),
	'section'     => 'custom_code',
	'default'     => '',
	'priority'    => 10,
	'choices'     => array(
		'language' => 'javascript',
		'theme'    => 'monokai',
		'height'   => 150,
	),
));


