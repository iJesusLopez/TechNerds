<?php 

/*
**	Collection Slider
*/

//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
	"name"			=> esc_html__('Slider', 'barberry'),
	"description"	=> esc_html__('Display Slider', 'barberry'),
	"base"			=> "default_slider",
	"category" 		=> array( 'Content','Barberry' ),
	"class"			=> "",
	"icon"			=> get_template_directory_uri() . "/images/vc/slider.png",
	"content_element" => true,
	"params" => array(
        // add params same as with any other content element
	
 		array(
			"type"			=> "dropdown",
 			"holder"		=> "div",
 			"class" 		=> "hide_in_vc_editor",
 			"admin_label" 	=> true,
			"heading"		=> esc_html__('Height', 'barberry'),
			"std"			=> "no",
			"param_name"	=> "full_height",
			"value"			=> array('Full Height' => 'yes', 'Custom Height' => 'no'),
 		),
		
 		array(
 			"type"			=> "textfield",
 			"holder"		=> "div",
 			"class" 		=> "hide_in_vc_editor",
 			"admin_label" 	=> false,
			"heading"		=> esc_html__('Custom Desktop Height', 'barberry'),
			"param_name"	=> "custom_desktop_height",
 			"value"			=> "800px",
			"dependency"	=> array(
				"element" 	=> "full_height",
				"value"		=> array('no'),
			),
 		),

 		array(
 			"type"			=> "textfield",
 			"holder"		=> "div",
 			"class" 		=> "hide_in_vc_editor",
 			"admin_label" 	=> false,
			"heading"		=> esc_html__('Custom Mobile Height', 'barberry'),
			"param_name"	=> "custom_mobile_height",
 			"value"			=> "600px",
			"dependency"	=> array(
				"element" 	=> "full_height",
				"value"		=> array('no'),
			),
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
			'type' => 'checkbox',
			'param_name' => 'slide_nav',
			'heading' => esc_html__('Slider Navigation', 'barberry'),
			'std' => 'true'
		),

		array(
			"type"			=> "colorpicker",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> esc_html__('Color Slide Navigation', 'barberry'),
			"param_name"	=> "slide_nav_color",
			"value"			=> "#000",
			"dependency"	=> array(
				"element" 	=> "slide_nav",
				"value"		=> 'true',
			),
		),

		array(
			'heading'    => esc_html__( 'Slides', 'barberry'),
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
					"heading"		=> esc_html__('Title', 'barberry'),
					"param_name"	=> "title",
					"value"			=> "",
				),

				array(
					"type"			=> "textfield",
					"holder"		=> "div",
					"class" 		=> "hide_in_vc_editor",
					"admin_label" 	=> false,
					"heading"		=> esc_html__('Subtitle', 'barberry'),
					"param_name"	=> "description",
					"value"			=> "",
				),

				array(
					"type"			=> "dropdown",
					"holder"		=> "div",
					"class" 		=> "hide_in_vc_editor",
					"admin_label" 	=> false,
					"heading"		=> esc_html__('Text Align', 'barberry'),
					"param_name"	=> "text_align",
					"value"			=> array(
						"Middle Left"	=> "middle_left",
						"Middle Center"	=> "middle_center",
						"Middle Right"	=> "middle_right",
						"Bottom Left"	=> "bottom_left",
						"Bottom Center"	=> "bottom_center",
						"Bottom Right"	=> "bottom_right",									
					),
					"std"			=> "middle_center",
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
					'type' => 'checkbox',
					'param_name' => 'link_whole_slide',
					'heading' => esc_html__( 'Link on whole slide?', 'barberry' ),
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