<?php

//remove_theme_mods(); // DEBUG

function theme_customiser_styles() {
			
	ob_start();

	$path = get_template_directory() . '/inc/customizer/frontend/';

	include( $path . 'global.css.php');
	include( $path . 'header.css.php');
	include( $path . 'topbar.css.php');
	include( $path . 'fonts.css.php');	
	include( $path . 'elements.css.php');
	include( $path . 'product.css.php');
	include( $path . 'footer.css.php');
	include( $path . 'custom.css.php');
	include( $path . 'catalog_mode.css.php');

	$custom_code = str_replace(array("\r\n", "\r"), "\n", ob_get_clean());
	$lines = explode("\n", $custom_code);
	$new_lines = array();
	foreach ($lines as $i => $line) { if(!empty($line)) $new_lines[] = trim($line); }
	echo implode($new_lines);
}

add_action( 'wp_head', 'theme_customiser_styles', 99 );