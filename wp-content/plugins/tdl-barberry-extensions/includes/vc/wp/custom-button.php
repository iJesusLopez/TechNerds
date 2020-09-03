<?php 

/*
**	CUSTOM BUTTON
*/

vc_map( array(
	"name"			=> esc_html__('Barberry Button', 'barberry'),
	"description"	=> esc_html__('Display Barberry button', 'barberry'),
	"category" 		=> array( 'Content','Barberry' ),
	"base"			=> "tdl_custom_button",
	"class"			=> "",
	"icon"			=> get_template_directory_uri() . "/images/vc/custom-button.png",

	"params" => array(
	
 		array(
 			"type"			=> "textfield",
 			"holder"		=> "div",
 			"class" 		=> "hide_in_vc_editor",
 			"admin_label" 	=> true,
			"heading"		=> esc_html__('Title', 'barberry'),
			"param_name"	=> "title",
 			"value"			=> "",
 		),
		
 		array(
 			"type"			=> "textfield",
 			"holder"		=> "div",
 			"class" 		=> "hide_in_vc_editor",
 			"admin_label" 	=> true,
			"heading"		=> esc_html__('URL', 'barberry'),
			"param_name"	=> "url",
 			"value"			=> "",
 		),

  		array(
			'type' => 'checkbox',
			'param_name' => 'target',
			'heading' => esc_html__('Open in new window', 'barberry'),
			'std' => 'false'
		),

 		array(
			"type"			=> "colorpicker",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> esc_html__('Background color', 'barberry'),
			"param_name"	=> "bg_color",
			"value"			=> "#000",
		),

		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> esc_html__('Button Size', 'barberry'),
			"param_name"	=> "button_size",
			"std"			=> "normal",
			"value"			=> array(
				"Small"		=> "small",
				"Normal"	=> "normal",
				"Large"		=> "large"
			),
		),

		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> esc_html__('Alignment', 'barberry'),
			"param_name"	=> "button_align",
			"std"			=> "",
			"value"			=> array(
				"Inline"	=> "inline",
				"Left"		=> "left",
				"Right"		=> "right",
				"Center"	=> "center"
			),
		),
		
	)
) );