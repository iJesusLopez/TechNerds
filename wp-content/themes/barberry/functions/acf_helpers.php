<?php

/**
 * ACF Helper Functions
 */

if ( ! function_exists( 'barberry_have_rows' ) ) {
	function barberry_have_rows( $args, $options = '' ) {

		if ( function_exists( 'have_rows' ) ) {
			return have_rows( $args, $options );
		} else {
			return false;
		}

	}
}

if ( ! function_exists( 'barberry_get_field' ) ) {
	function barberry_get_field( $args, $options = '' ) {

		if ( function_exists( 'get_field' ) ) {
			return get_field( $args, $options );
		} else {
			return false;
		}

	}
}
