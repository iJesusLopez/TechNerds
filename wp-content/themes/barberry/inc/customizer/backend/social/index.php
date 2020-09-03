<?php

// ============================================
// Panel
// ============================================

// no panel


// ============================================
// Sections
// ============================================

Kirki::add_section( 'social', array(
    'title'          => esc_attr__( 'Social Media', 'barberry' ),
    'priority'       => 80,
    'capability'     => 'edit_theme_options',
) );

// ============================================
// Controls
// ============================================

$sep_id  = 30200;
$section = 'social';

// ---------------------------------------------
Kirki::add_field( 'barberry', array(
    'type'        => 'custom',
    'settings'    => 'social_network_info',
    'label'       => esc_attr__( 'Social Networks profiles', 'barberry' ),
    'section'     => $section,
    'priority'    => 10,
) );
// ---------------------------------------------

Kirki::add_field( 'barberry', array(
    'type'        => 'text',
    'settings'    => 'facebook_link',
    'label'       => esc_attr__( 'Facebook', 'barberry' ),
    'section'     => $section,
    'default'     => '#',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'text',
    'settings'    => 'twitter_link',
    'label'       => esc_attr__( 'Twitter', 'barberry' ),
    'section'     => $section,
    'default'     => '#',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'text',
    'settings'    => 'pinterest_link',
    'label'       => esc_attr__( 'Pinterest', 'barberry' ),
    'section'     => $section,
    'default'     => '#',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'text',
    'settings'    => 'googleplus_link',
    'label'       => esc_attr__( 'Google+', 'barberry' ),
    'section'     => $section,
    'default'     => '#',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'text',
    'settings'    => 'telegram_link',
    'label'       => esc_attr__( 'Telegram', 'barberry' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'text',
    'settings'    => 'vkontakte_link',
    'label'       => esc_attr__( 'VKontakte', 'barberry' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'text',
    'settings'    => 'blogger_link',
    'label'       => esc_attr__( 'Blogger', 'barberry' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'text',
    'settings'    => 'linkedin_link',
    'label'       => esc_attr__( 'LinkedIn', 'barberry' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );


Kirki::add_field( 'barberry', array(
    'type'        => 'text',
    'settings'    => 'rss_link',
    'label'       => esc_attr__( 'RSS', 'barberry' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'text',
    'settings'    => 'tumblr_link',
    'label'       => esc_attr__( 'Tumblr', 'barberry' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'text',
    'settings'    => 'instagram_link',
    'label'       => esc_attr__( 'Instagram', 'barberry' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'text',
    'settings'    => 'youtube_link',
    'label'       => esc_attr__( 'Youtube', 'barberry' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'text',
    'settings'    => 'vimeo_link',
    'label'       => esc_attr__( 'Vimeo', 'barberry' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'text',
    'settings'    => 'behance_link',
    'label'       => esc_attr__( 'Behance', 'barberry' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'text',
    'settings'    => 'dribbble_link',
    'label'       => esc_attr__( 'Dribbble', 'barberry' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'text',
    'settings'    => 'flickr_link',
    'label'       => esc_attr__( 'Flickr', 'barberry' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'text',
    'settings'    => 'git_link',
    'label'       => esc_attr__( 'Git', 'barberry' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'text',
    'settings'    => 'skype_link',
    'label'       => esc_attr__( 'Skype', 'barberry' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'text',
    'settings'    => 'weibo_link',
    'label'       => esc_attr__( 'Weibo', 'barberry' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'text',
    'settings'    => 'envato_link',
    'label'       => esc_attr__( 'Envato', 'barberry' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'text',
    'settings'    => 'apple_link',
    'label'       => esc_attr__( 'Apple', 'barberry' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'text',
    'settings'    => 'soundcloud_link',
    'label'       => esc_attr__( 'Soundcloud', 'barberry' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'text',
    'settings'    => 'whatsapp_link',
    'label'       => esc_attr__( 'WhatsApp', 'barberry' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'text',
    'settings'    => 'viber_link',
    'label'       => esc_attr__( 'Viber', 'barberry' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'text',
    'settings'    => 'spotify_link',
    'label'       => esc_attr__( 'Spotify', 'barberry' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'barberry', array(
    'type'        => 'text',
    'settings'    => 'discord_link',
    'label'       => esc_attr__( 'Discord', 'barberry' ),
    'section'     => $section,
    'default'     => '',
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

// ---------------------------------------------
Kirki::add_field( 'barberry', array(
    'type'        => 'custom',
    'settings'    => 'social_sharing_title',
    'label'       => esc_attr__( 'Social Network for Sharing', 'barberry' ),
    'section'     => $section,
    'priority'    => 10,
) );
// ---------------------------------------------

Kirki::add_field( 'barberry', array(
    'type'        => 'multicheck',
    'settings'    => 'social_sharing',
    'label'       => esc_attr__( 'Select Social Networks for Share', 'barberry' ),
    'section'     => $section,
    'default'     => array('facebook', 'twitter', 'google', 'pinterest'),
    'priority'    => 10,
    'choices'     => array(
        'facebook' => esc_attr__( 'Facebook', 'barberry' ),
        'twitter' => esc_attr__( 'Twitter', 'barberry' ),
        'google' => esc_attr__( 'Google+', 'barberry' ),
        'pinterest' => esc_attr__( 'Pinterest', 'barberry' ),
        'linkedin' => esc_attr__( 'LinkedIn', 'barberry' ),
        'vkontakte' => esc_attr__( 'Vkontakte', 'barberry' ),
        'telegram' => esc_attr__( 'Telegram', 'barberry' ),
        'whatsapp' => esc_attr__( 'WhatsApp', 'barberry' ),
        'viber' => esc_attr__( 'Viber', 'barberry' ),
        'blogger' => esc_attr__( 'Blogger', 'barberry' ),
    ),
) );