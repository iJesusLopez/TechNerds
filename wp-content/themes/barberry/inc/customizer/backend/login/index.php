<?php

// ============================================
// Panel
// ============================================

// no panel


// ============================================
// Sections
// ============================================

Kirki::add_section( 'login', array(
    'title'          => esc_attr__( 'Login / Register', 'barberry' ),
    'priority'       => 90,
    'capability'     => 'edit_theme_options',
) );

// ============================================
// Controls
// ============================================

$sep_id  = 48538;
$section = 'login';

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'my_account_wishlist',
    'label'       => esc_attr__( 'Wishlist on my account page', 'barberry' ),
    'description' => esc_attr__( 'Add wishlist item to default WooCommerce account navigation.', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
) );

