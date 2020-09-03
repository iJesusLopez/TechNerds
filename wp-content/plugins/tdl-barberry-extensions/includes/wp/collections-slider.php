<?php

// [default_slider]

function barberry_collections_slider($atts = array(), $content = null) {
	extract(shortcode_atts(array(
		'full_height' 		  	   	=> 'no',
		'custom_desktop_height' 	=> '800px',
		'custom_tablet_height' 	  	=> '500px',
		'custom_mobile_height' 	  	=> '300px',
		'slide_nav_color' 		=> '#000',
		'slide_autoplay'		=> 'false',
		'slide_autoplay_speed'	=> '5000',
		'slides'    => '',
		'el_class'   => '',
	), $atts));

	if ( ! $atts['slides'] ) {
		return '';
	}

	$id = uniqid( 'collections-slider-' );
	$global_slider_styles = '';

	$css_class = $el_class;


	if (!empty($custom_desktop_height)) {
		$desktop_height = 'height:'.$custom_desktop_height.';';
	} else {
		$desktop_height = '';
	}	

	if (!empty($custom_mobile_height)) {
		$mobile_slider_styles = '@media all and (max-width: 768px){#'.$id.' { height:auto} #'.$id.' .barberry_slider_big, #'.$id.' .bg-wrapper  { height:'.$custom_mobile_height.'}}';
	}

	if (!empty($custom_tablet_height)) {
		$tablet_slider_styles = '@media all and (max-width: 1024px){#'.$id.', #'.$id.' .barberry_slider_big, #'.$id.' .bg-wrapper  { height:'.$custom_tablet_height.'}}';
	}

	$global_slider_styles .= '<style>
	#'.$id.', #'.$id.' .barberry_slider_big, #'.$id.' .bg-wrapper { '.$desktop_height.' } 
	#'.$id.' .barberry_slider_content .slider_content-wrapper .flickity-button, #'.$id.'  .barberry_slider_content .slider_content-wrapper .flickity-page-dots li { background-color: '.$slide_nav_color.' }
	'.esc_html($tablet_slider_styles).'
	'.esc_html($mobile_slider_styles).'
	</style>';	


	$slides = (array) json_decode( urldecode( $atts['slides'] ), true );

	$output_small = array();
	$output_big = array();

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

		if ( isset( $slide['subtitle'] ) && $slide['subtitle'] ) {
			$content .= sprintf( '<p class="slide-subtitle" style="color:rgb(%s)">%s</p>', barberry_hex2rgb($slide['sub_text_color']), $slide['subtitle'] );
		}	

		if ( isset( $slide['title'] ) && $slide['title'] ) {
			$content .= sprintf( '<h1 class="slide-title" style="color:%s">%s</h1>', $slide['text_color'], $slide['title'] );
		}

		if ( isset( $slide['description'] ) && $slide['description'] ) {
			$content .= sprintf( '<p class="slide-description" style="color:%s">%s</p>', $slide['text_color'], $slide['description'] );
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

		$output_small[] = sprintf(
			'<div class="carousel-cell" %s>' .
			'<div class="cell-img">' .
			'%s' .
			'</div>'.
			'</div>',
			$bg_color,
			$image_src
		);

		$output_content[] = sprintf(
			'<div class="carousel-cell">' .
			'<div class="slider-content">' .
			'%s' .
			'</div>'.
			'</div>',
			$content
		);

		$output_big[] = sprintf(
			'<div class="carousel-cell" %s>' .
			'<div class="cell-img">' .
			'%s' .
			'</div>'.
			'</div>',
			$bg_color,
			$image_src,
			$content
		);
	}

	return sprintf(
		'%s' .
		'<div class="shortcode_barberry_collections_slider %s" id="%s">' .
		'<div class="barberry_slider_small">%s</div>' .
		'<div class="barberry_slider_content"><div class="slider_content-wrapper">%s</div></div>' .
		'<div class="barberry_slider_big" data-autoplay="%s" data-autoplay-speed="%s">' .
		'%s' .
		'</div>'.
		'</div>',
		$global_slider_styles,
		esc_attr( $css_class ),
		esc_attr( $id ),
		implode( ' ', $output_small ),
		implode( ' ', $output_content ),
		esc_attr( $slide_autoplay ),
		intval( $slide_autoplay_speed ),
		implode( ' ', $output_big )
	);

}

add_shortcode('collections_slider', 'barberry_collections_slider');

