<?php

$sep_id  = 7300;
$section = 'shop_compare';

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'compare_extends',
    'label'       => esc_attr__( 'Extends Yith Compare Plugin', 'barberry' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
) );


Kirki::add_field( 'barberry', array(
    'type'        => 'select',
    'settings'    => 'compare_page',
    'label'       => esc_attr__( 'Page view compare products', 'barberry' ),
    'section'     => $section,
    'priority'    => 10,
    "choices"     => get_pages_temp_compare(),
    'active_callback'    => array(
        array(
            'setting'  => 'compare_extends',
            'operator' => '!=',
            'value'    => '0',     
        ),
    ),    
) );


Kirki::add_field( 'barberry', array(
    'type'        => 'slider',
    'settings'    => 'max_compare',
    'label'       => esc_attr__( 'Max products for compare', 'barberry' ),
    'section'     => $section,
    'default'     => 4,
    'priority'    => 10,
    'choices'     => 
        array 
        (
            'min'   => 2,
            'max'   => 4,
            'step'  => 1
        ),
    'active_callback'    => array(
        array(
            'setting'  => 'compare_extends',
            'operator' => '!=',
            'value'    => '0',     
        ),
    ),
));



function get_pages_temp_compare() {
    $pages = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'page-view-compare.php'
    ));
    
    $pages_compare = array('' => esc_html__('Select page view compare', 'barberry'));
    if ($pages) {
        foreach ($pages as $page) {
            $pages_compare[$page->ID . '-page'] = $page->post_title;
        }
    }
    
    return $pages_compare;
}