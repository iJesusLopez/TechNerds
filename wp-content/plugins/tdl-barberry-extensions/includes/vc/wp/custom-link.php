<?php 

/*
**	CUSTOM BUTTON
*/

vc_map( array(
	"name"			=> esc_html__('Simple Link', 'barberry'),
	"description"	=> esc_html__('Display Simple Link', 'barberry'),
	"category" 		=> array( 'Content','Barberry' ),
	"base"			=> "tdl_custom_link",
	"class"			=> "",
	"icon"			=> get_template_directory_uri() . "/images/vc/custom-link.png",

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
			"type"			=> "colorpicker",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> esc_html__('Color', 'barberry'),
			"param_name"	=> "color",
			"value"			=> "#000",
		),
	)
) );