<?php 

/*
**	Collection Slider
*/

//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
	"name"			=> esc_html__('Collections Slider', 'barberry'),
	"description"	=> esc_html__('Display Collections Slider', 'barberry'),
	"base"			=> "collections_slider",
	"category" 		=> array( 'Content','Barberry' ),
	"class"			=> "",
	"icon"			=> get_template_directory_uri() . "/images/vc/col-slider.png",
	"content_element" => true,
	"params" => array(
        // add params same as with any other content element
	
		
 		array(
 			"type"			=> "textfield",
 			"holder"		=> "div",
 			"class" 		=> "hide_in_vc_editor",
 			"admin_label" 	=> false,
			"heading"		=> esc_html__('Custom Desktop Height', 'barberry'),
			"param_name"	=> "custom_desktop_height",
 			"value"			=> "800px",
 		),

 		array(
 			"type"			=> "textfield",
 			"holder"		=> "div",
 			"class" 		=> "hide_in_vc_editor",
 			"admin_label" 	=> false,
			"heading"		=> esc_html__('Custom Tablet Height', 'barberry'),
			"param_name"	=> "custom_tablet_height",
 			"value"			=> "500px",
 		),

 		array(
 			"type"			=> "textfield",
 			"holder"		=> "div",
 			"class" 		=> "hide_in_vc_editor",
 			"admin_label" 	=> false,
			"heading"		=> esc_html__('Custom Mobile Height', 'barberry'),
			"param_name"	=> "custom_mobile_height",
 			"value"			=> "300px",
 		),

 		array(
			'type' => 'checkbox',
			'param_name' => 'slide_autoplay',
			'heading' => esc_html__('Slider AutoPlay', 'barberry'),
			'std' => 'false'
		),

		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> esc_html__('AutoPlay Speed (milliseconds)', 'barberry'),
			"param_name"	=> "slide_autoplay_speed",
			"value"			=> "5000",
			"dependency"	=> array(
				"element" 	=> "slide_autoplay",
				"value"		=> 'true',
			),
		),


		array(
			"type"			=> "colorpicker",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> esc_html__('Color Slide Navigation', 'barberry'),
			"param_name"	=> "slide_nav_color",
			"value"			=> "#000",
		),

		array(
			'heading'    => esc_html__( 'Slides', 'barberry' ),
			'type'       => 'param_group',
			'value'      => '',
			'param_name' => 'slides',
			"admin_label" 	=> false,
			'params'     => array(

		        array(
					"type"			=> "textfield",
					"holder"		=> "div",
					"class" 		=> "hide_in_vc_editor",
					"admin_label" 	=> false,
					"heading"		=> esc_html__( 'Title', 'barberry'),
					"param_name"	=> "title",
					"value"			=> "",
				),

				array(
					"type"			=> "textfield",
					"holder"		=> "div",
					"class" 		=> "hide_in_vc_editor",
					"admin_label" 	=> false,
					"heading"		=> esc_html__('Subtitle', 'barberry'),
					"param_name"	=> "subtitle",
					"value"			=> "",
				),

				array(
					"type"			=> "textarea",
					"holder"		=> "div",
					"class" 		=> "hide_in_vc_editor",
					"admin_label" 	=> false,
					"heading"		=> esc_html__('Description', 'barberry'),
					"param_name"	=> "description",
					"value"			=> "",
				),				


				array(
					"type"			=> "colorpicker",
					"holder"		=> "div",
					"class" 		=> "hide_in_vc_editor",
					"admin_label" 	=> false,
					"heading"		=> esc_html__('Title Text Color', 'barberry'),
					"param_name"	=> "text_color",
					"value"			=> "#000000",
				),

				array(
					"type"			=> "colorpicker",
					"holder"		=> "div",
					"class" 		=> "hide_in_vc_editor",
					"admin_label" 	=> false,
					"heading"		=> esc_html__('Subtitle Text Color', 'barberry'),
					"param_name"	=> "sub_text_color",
					"value"			=> "#000000",
				),

				array(
					'type'       => 'vc_link',
					'heading'    => esc_html__( 'Button URL', 'barberry' ),
					"admin_label" 	=> false,
					'param_name' => 'button_url',
					'value'      => '',
				),	
				
				array(
					"type"			=> "colorpicker",
					"holder"		=> "div",
					"class" 		=> "hide_in_vc_editor",
					"admin_label" 	=> false,
					"heading"		=> esc_html__('Slide Background Color', 'barberry'),
					"param_name"	=> "bg_color",
					"value"			=> "#eeeeee",
				),
				
				array(
					"type"			=> "attach_image",
					"holder"		=> "div",
					"class" 		=> "hide_in_vc_editor",
					"admin_label" 	=> false,
					"heading"		=> esc_html__('Background Image', 'barberry'),
					"param_name"	=> "bg_image",
					"value"			=> "",
				),

			),
		),

		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'barberry' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'barberry' ),
		),

    ),
    // "js_view" => 'VcColumnView'
));


//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
// if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
//     class WPBakeryShortCode_Slider extends WPBakeryShortCodesContainer {
//     }
// }
// if ( class_exists( 'WPBakeryShortCode' ) ) {
//     class WPBakeryShortCode_Image_Slide extends WPBakeryShortCode {
//     }
// }