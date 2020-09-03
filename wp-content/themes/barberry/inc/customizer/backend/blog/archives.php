<?php

$sep_id  = 9576;
$section = 'blog';

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'blog_breadcrumbs',
    'label'       => esc_attr__( 'Show Blog Breadcrumbs', 'barberry' ),
    'description' => esc_attr__( 'Displays a full chain of links to the current page.', 'barberry' ),
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
    'settings'    => 'blog_categories',
    'label'       => esc_attr__( 'Blog Categories', 'barberry' ),
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
    'settings'    => 'blog_posts_parallax',
    'label'       => esc_attr__( 'Enable Parallax for post images', 'barberry' ),
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
    'settings'    => 'blog_sidebar',
    'label'       => esc_attr__( 'Blog Sidebar', 'barberry' ),
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
    'active_callback'    => array(
        array(
            'setting'  => 'blog_sidebar',
            'operator' => '==',
            'value'    => true,     
        ),
    ),
) );
// ---------------------------------------------


Kirki::add_field( 'barberry', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'blog_pagination',
    'label'       => esc_attr__( 'Pagination', 'barberry' ),
    'section'     => $section,
    'default'     => 'default',
    'priority'    => 10,
    'choices'     => array(
        'default'           => esc_attr__( 'Classic', 'barberry' ),
        'load_more_button'  => esc_attr__( 'Load More', 'barberry' ),
        'infinite_scroll'   => esc_attr__( 'Infinite', 'barberry' ),
    ),
) );
