<?php

// ============================================
// Panel
// ============================================

Kirki::add_panel( 'panel_header', array(
    'title'         => esc_attr__( 'Header', 'barberry' ),
    'priority'      => 30,
) );

// ============================================
// Sections
// ============================================

Kirki::add_section( 'header_layout', array(
    'title'          => esc_attr__( 'Header Layout', 'barberry' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_header',
) );

Kirki::add_section( 'header_style', array(
    'title'          => esc_attr__( 'Style & Color', 'barberry' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_header',
) );

Kirki::add_section( 'header_logo', array(
    'title'          => esc_attr__( 'Logo', 'barberry' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_header',
) );

Kirki::add_section( 'header_sticky', array(
    'title'          => esc_attr__( 'Sticky Header', 'barberry' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_header',
) );

Kirki::add_section( 'header_topbar', array(
    'title'          => esc_attr__( 'Top Bar', 'barberry' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_header',
) );

Kirki::add_section( 'header_elements', array(
    'title'          => esc_attr__( 'Header Elements', 'barberry' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_header',
) );

Kirki::add_section( 'page_title', array(
    'title'          => esc_attr__( 'Page Heading', 'barberry' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_header',
) );

Kirki::add_section( 'header_search', array(
    'title'          => esc_attr__( 'Search', 'barberry' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_header',
) );

// ============================================
// Controls
// ============================================

require_once( get_template_directory() . '/inc/customizer/backend/header/layout.php');
require_once( get_template_directory() . '/inc/customizer/backend/header/style.php');
require_once( get_template_directory() . '/inc/customizer/backend/header/logo.php');
require_once( get_template_directory() . '/inc/customizer/backend/header/sticky.php');
require_once( get_template_directory() . '/inc/customizer/backend/header/topbar.php');
require_once( get_template_directory() . '/inc/customizer/backend/header/elements.php');
require_once( get_template_directory() . '/inc/customizer/backend/header/title.php');
require_once( get_template_directory() . '/inc/customizer/backend/header/search.php');