<?php

$path = get_template_directory() . '/inc/customizer/backend/';

if ( BARBERRY_KIRKI_IS_ACTIVE ) {

	require_once( $path . 'index.php' );

    require_once( $path . 'go-to-page.php');
    require_once( $path . 'global/index.php');
    require_once( $path . 'style/index.php');
    require_once( $path . 'custom/index.php');
	require_once( $path . 'header/index.php');
	require_once( $path . 'offcanvas/index.php');
	require_once( $path . 'typography/index.php');
	require_once( $path . 'blog/index.php');
	require_once( $path . 'footer/index.php');
	require_once( $path . 'login/index.php');
	require_once( $path . 'social/index.php');

	if (BARBERRY_WOOCOMMERCE_IS_ACTIVE) {
		require_once( $path . 'shop/index.php');
	}
}

