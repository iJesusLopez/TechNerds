<?php

$sep_id  = 365434;
$section = 'blog_single';

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'blog_post_breadcrumbs',
    'label'       => esc_attr__( 'Show Blog post Breadcrumbs', 'barberry' ),
    'description' => esc_attr__( 'Displays a full chain of links to the current post.', 'barberry' ),
    'section'     => $section,
    'default'     => true,
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
    'type'        => 'toggle',
    'settings'    => 'blog_single_sidebar',
    'label'       => esc_attr__( 'Blog Sidebar', 'barberry' ),
    'section'     => $section,
    'default'     => false,
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
    'active_callback'    => array(
        array(
            'setting'  => 'blog_single_sidebar',
            'operator' => '==',
            'value'    => true,     
        ),
    ),
) );
// ---------------------------------------------


Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'blog_single_share',
    'label'       => esc_attr__( 'Blog Post Share', 'barberry' ),
    'section'     => $section,
    'default'     => false,
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
    'type'        => 'toggle',
    'settings'    => 'blog_single_featured',
    'label'       => esc_attr__( 'Display Featured Image', 'barberry' ),
    'section'     => $section,
    'default'     => true,
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
    'type'        => 'toggle',
    'settings'    => 'blog_single_related',
    'label'       => esc_attr__( 'Display Related Posts', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
) );
