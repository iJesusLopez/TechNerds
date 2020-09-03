<?php

$sep_id  = 7300;
$section = 'shop_notifications';

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'notifications_click',
    'label'       => esc_attr__( 'Close woocommerce notices by click', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
) );

// Kirki::add_field( 'barberry', array(
//     'type'        => 'radio-buttonset',
//     'settings'    => 'notification_mode',
//     'label'       => esc_attr__( 'Notification Style', 'barberry' ),
//     'section'     => $section,
// 	'default'     => '1',
// 	'priority'    => 10,
// 	'choices'	  => 
// 		array(
// 			'1'		=> esc_attr__('Animated', 'barberry'),
// 			'0'		=> esc_attr__('Classic', 'barberry')
// 		)
// ) );

// Kirki::add_field( 'barberry', array(
// 	'type'        => 'radio-buttonset',
// 	'settings'    => 'notification_style',
// 	'label'       => esc_attr__( 'Animation', 'barberry' ),
// 	'section'     => $section,
// 	'default'     => '1',
// 	'priority'    => 10,
// 	'choices'	  => 
// 		array(
// 			'1'		=> esc_attr__('Slide Out', 'barberry'),
// 			'0'		=> esc_attr__('Always Visible', 'barberry')
// 		),
// 	'active_callback'    => array(
// 		array(
// 			'setting'  => 'notification_mode',
// 			'operator' => '==',
// 			'value'    => '1',
// 		),
// 	),
// ));

