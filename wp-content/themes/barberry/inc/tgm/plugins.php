<?php


function barberry_theme_register_required_plugins() {

  $plugins = array(
        'woocommerce' => array(
        'name'               => 'WooCommerce',
        'slug'               => 'woocommerce',
        'required'           => false,
        'description'        => 'The eCommerce engine',
        'demo_required'      => true
        ),
        'js_composer' => array(
          'name'               => 'WPBakery Page Builder',
          'slug'               => 'js_composer',
          'source'             => 'https://barberry.temashdesign.com/plugins/2.5/js_composer.zip',
          'required'           => true,
          'external_url'       => '',
          'description'        => '#1 WordPress Page Builder Plugin',
          'demo_required'      => true,
          'version'            => '6.3.0'
        ),
        'revslider' => array(
          'name'               => 'Slider Revolution',
          'slug'               => 'revslider',
          'source'             => 'https://barberry.temashdesign.com/plugins/2.5/revslider.zip',
          'required'           => false,
          'external_url'       => '',
          'description'        => 'Slider Revolution - Premium responsive slider',
          'demo_required'      => true,
          'version'            => '6.2.22'
        ),  

        'advanced-custom-fields-pro'=> array(
          'name'               => 'Advanced Custom Fields PRO',
          'slug'               => 'advanced-custom-fields-pro',
          'source'             => 'https://barberry.temashdesign.com/plugins/2.5/advanced-custom-fields-pro.zip',
          'required'           => true,
          'external_url'       => '',
          'description'        => 'Customize WordPress with powerful, professional and intuitive fields.',
          'demo_required'      => true,
          'version'            => '5.9.0'          
        ), 

        'yith-woocommerce-wishlist'=> array(
          'name'               => 'YITH WooCommerce Wishlist',
          'slug'               => 'yith-woocommerce-wishlist',
          'required'           => false,
          'description'        => 'YITH WooCommerce Wishlist gives your users the possibility to create, fill, manage and share their wishlists allowing you to analyze their interests and needs to improve your marketing strategies.',
          'demo_required'      => false
        ), 
        'contact-form-7'=> array(
          'name'               => 'Contact Form 7',
          'slug'               => 'contact-form-7',
          'required'           => false,
          'description'        => 'Just another contact form plugin. Simple but flexible.',
          'demo_required'      => false
        ), 
        'variation-swatches-for-woocommerce'=> array(
          'name'               => 'WooCommerce Variation Swatches',
          'slug'               => 'variation-swatches-for-woocommerce',
          'required'           => false,
          'description'        => 'An extension of WooCommerce to make variable products be more beauty and friendly with users.',
          'demo_required'      => false
        ),         
        'one-click-demo-import'=> array(
          'name'               => 'One Click Demo Import',
          'slug'               => 'one-click-demo-import',
          'required'           => false,
          'description'        => 'Import your demo content, widgets and theme settings with one click.',
          'demo_required'      => true
        ),
        'envato-market'        => array(
          'name'               => 'Envato Market',
          'slug'               => 'envato-market',
          'required'           => false,
          'demo_required'      => false,
          'source'             => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
          'description'        => 'Automatically update your Envato theme',
          'demo_required'      => true
        ),
        'tdl-barberry-extensions' => array(
          'name'               => 'Barberry Theme Extensions',
          'slug'               => 'tdl-barberry-extensions',
          'source'             => 'https://barberry.temashdesign.com/plugins/2.4/tdl-barberry-extensions.zip',
          'required'           => true,
          'external_url'       => '',
          'description'        => 'Extends the functionality of Barberry with theme specific shortcodes and page builder elements.',
          'demo_required'      => true,
          'version'            => '1.8'
        ),
        'safe-svg'=> array(
          'name'               => 'Safe SVG',
          'slug'               => 'safe-svg',
          'required'           => false,
          'description'        => 'Allows SVG uploads into WordPress and sanitizes the SVG before saving it',
          'demo_required'      => true
        ),
      );

  $config = array(
    'id'               => 'barberry',
    'default_path'      => '',
    'parent_slug'       => 'themes.php',
    'menu'              => 'tgmpa-install-plugins',
    'has_notices'       => false,
    'is_automatic'      => true,
  );

  tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'barberry_theme_register_required_plugins' );


