<?php

// [social-media]

vc_map(array(

   "name"						=> esc_html__('Social Media Profiles', 'barberry'),
   "category" 					=> array( 'Content','Barberry' ),
   "description"				=> esc_html__('Links to your social media profiles', 'barberry'),
   "base"						=> "social-media",
   "class"						=> "",
   "icon"						=> get_template_directory_uri() . "/images/vc/social-profiles.png",
   
   "params" 	=> array(

		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> esc_html__('Align', 'barberry'),
			"param_name"	=> "items_align",
			"value"			=> array(
				"Left"		=> "left",
				"Center"	=> "center",
				"Right"		=> "right"
			)
		),


		array(
			"type"			=> "colorpicker",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> esc_html__('Color', 'barberry'),
			"param_name"	=> "color",
		),

		array(
			"type"			=> "colorpicker",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> esc_html__('Hover Color', 'barberry'),
			"param_name"	=> "color_hover",
		),		
		
   )
   
));