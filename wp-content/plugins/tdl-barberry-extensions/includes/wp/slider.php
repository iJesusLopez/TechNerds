<?php

// [default_slider]

function barberry_slider($atts = array(), $content = null) {
	extract(shortcode_atts(array(
		'full_height' 		  	   	=> 'no',
		'custom_desktop_height' 	=> '800px',
		'custom_mobile_height' 	  	=> '600px',
		'slide_nav'		  		=> 'true',
		'slide_nav_color' 		=> '#000',
		'slide_autoplay'		=> 'false',
		'slide_autoplay_speed'	=> '5000',
		'slides'    => '',
		'el_class'   => '',
	), $atts));

	if ( ! $atts['slides'] ) {
		return '';
	}

	$id = uniqid( 'default-slider-' );
	$global_slider_styles = '';
	$mobile_slider_styles = '';

	$css_class = $el_class;


	if ( $full_height == 'no' && ( !empty($custom_desktop_height) || !empty($custom_mobile_height) ) ) {
		$extra_class = '';
	} else {
		$extra_class = 'full_height';
	}

	if ($full_height == 'no' && !empty($custom_desktop_height)) {
		$desktop_height = 'height:'.$custom_desktop_height.';';
	} else {
		$desktop_height = '';
	}	

	if ($full_height == 'no' && !empty($custom_mobile_height)) {
		$mobile_slider_styles = '@media all and (max-width: 768px){#'.$id.', #'.$id.' .barberry_slider-wrapper, #'.$id.' .bg-wrapper { height:'.$custom_mobile_height.'!important;}}';
	}

	$global_slider_styles .= '<style>'.esc_html($mobile_slider_styles).'
	#'.$id.' .flickity-button {color: '.$slide_nav_color.'}
	#'.$id.' .flickity-button .flickity-button-icon {fill: '.$slide_nav_color.'}
	#'.$id.' .bg-wrapper { '.$desktop_height.' } 
	#'.$id.' .barberry_slider-wrapper .flickity-page-dots .dot { background-color: '.$slide_nav_color.' }
	</style>';	


	$slides = (array) json_decode( urldecode( $atts['slides'] ), true );

	$output = array();

	foreach ( $slides as $slide ) {
		$image_src = '';

		if ( isset( $slide['bg_image'] ) && $slide['bg_image'] ) {
			$image = wp_get_attachment_image_src( $slide['bg_image'], 'full' );

			if ( $image ) {
				$image_src = sprintf( '<div class="bg-wrapper" data-flickity-bg-lazyload="%s"></div>', esc_url( $image[0] ) );
			}
		}

		if ( isset( $slide['bg_color'] ) && $slide['bg_color'] ) {
			$bg_color = sprintf( 'style="background:%s"', $slide['bg_color'] );
		}

		$content = '';

		if ( isset( $slide['description'] ) && $slide['description'] ) {
			$content .= sprintf( '<p class="slide-description" style="color:rgb(%s)">%s</p>', barberry_hex2rgb($slide['sub_text_color']), $slide['description'] );
		}	

		if ( isset( $slide['title'] ) && $slide['title'] ) {
			$content .= sprintf( '<h1 class="slide-title" style="color:%s">%s</h1>', $slide['text_color'], $slide['title'] );
		}



		$whole_link = '';

		if (isset($slide['link_whole_slide']) && !empty( $slide['button_url'] )) {
			if ( function_exists( 'vc_build_link' ) ) {
				$link = array_filter( vc_build_link( $slide['button_url'] ) );
			}

			$whole_link .= sprintf(
				'<a href="%s" class="fullslidelink" %s%s></a>',
				esc_url( $link['url'] ),
				! empty( $link['target'] ) ? ' target="' . esc_attr( $link['target'] ) . '"' : '',
				! empty( $link['rel'] ) ? ' rel="' . esc_attr( $link['rel'] ) . '"' : ''
			);
		}
	

		$link = '';
		if ( isset( $slide['button_url'] ) && $slide['button_url'] ) {
			if ( function_exists( 'vc_build_link' ) ) {
				$link = array_filter( vc_build_link( $slide['button_url'] ) );
			}

			$content .= sprintf(
				'<p class="slide-button"><a href="%s" style="border-color:rgb(%s); color:rgb(%s)" %s%s>%s</a></p>',
				esc_url( $link['url'] ),
				barberry_hex2rgb($slide['text_color']),
				barberry_hex2rgb($slide['text_color']),
				! empty( $link['target'] ) ? ' target="' . esc_attr( $link['target'] ) . '"' : '',
				! empty( $link['rel'] ) ? ' rel="' . esc_attr( $link['rel'] ) . '"' : '',
				esc_html( $link['title'] )
			);

		}		



		$output[] = sprintf(
			'<div class="carousel-cell %s"  %s>' .
			'<div class="cell-img">' .
			'%s' .
			'</div>'.
			'%s' .
			'<div class="slider-content">' .
			'<div class="slider-content-wrapper">' .
			'%s' .
			'</div>'.
			'</div>'.
			'</div>',
			esc_attr( $slide['text_align'] ),
			$bg_color,
			$image_src,
			$whole_link,
			$content
		);
	}

	return sprintf(
		'%s' .
		'<div class="shortcode_barberry_slider %s %s" id="%s" style="%s">' .
		'<div class="barberry_slider-wrapper" style="%s" data-autoplay="%s" data-autoplay-speed="%s">' .
		'%s' .
		'</div>'.
		'</div>',
		$global_slider_styles,
		esc_attr( $extra_class ),
		esc_attr( $css_class ),
		esc_attr( $id ),
		esc_attr( $desktop_height ),
		esc_attr( $desktop_height ),
		esc_attr( $slide_autoplay ),
		intval( $slide_autoplay_speed ),
		implode( ' ', $output )
	);

}

add_shortcode('default_slider', 'barberry_slider');

