<?php

// ============================================
// Panel
// ============================================

Kirki::add_panel( 'panel_typography', array(
    'title'         => esc_attr__( 'Typography', 'barberry' ),
    'priority'      => 35,
) );


// ============================================
// Sections
// ============================================

Kirki::add_section( 'body', array(
    'title'          => esc_attr__( 'Body', 'barberry' ),
    'priority'       => 35,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_typography',
) );

Kirki::add_section( 'heading', array(
    'title'          => esc_attr__( 'Heading', 'barberry' ),
    'priority'       => 35,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_typography',
) );

Kirki::add_section( 'navigation', array(
    'title'          => esc_attr__( 'Navigation', 'barberry' ),
    'priority'       => 35,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_typography',
) );

Kirki::add_section( 'elements', array(
    'title'          => esc_attr__( 'Elements', 'barberry' ),
    'priority'       => 35,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_typography',
) );

// ============================================
// Controls
// ============================================

require_once( get_template_directory() . '/inc/customizer/backend/typography/body.php');
require_once( get_template_directory() . '/inc/customizer/backend/typography/heading.php');
require_once( get_template_directory() . '/inc/customizer/backend/typography/navigation.php');
require_once( get_template_directory() . '/inc/customizer/backend/typography/elements.php');
