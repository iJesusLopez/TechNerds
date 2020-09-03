<?php 

/*
**	CUSTOM BUTTON
*/

vc_map( array(
	"name"			=> esc_html__('Google Map', 'barberry'),
	"description"	=> esc_html__('Display Google Map', 'barberry'),
	"category" 		=> array( 'Content','Barberry' ),
	"base"			=> "google_map",
	"class"			=> "",
	"icon"			=> get_template_directory_uri() . "/images/vc/google-maps.png",

	"params" => array(

		    array(
		      "type" => "textfield",
		      "heading" => esc_html__('Map height', 'barberry'),
		      "param_name" => "size",
		      "admin_label" 	=> true,
		      "class" 		=> "hide_in_vc_editor",
		      "description" => __('Enter map height in pixels. Example: 400px. <span>As of June 2016, a Google map API key is needed to allow this element to display. Please enter key here <strong>Appearance > Customize > Global > Google map API key</strong>.</span>', 'barberry'),
		      "value" 		=> "400px"
		    ),
		
		    array(
		      "type" => "textfield",
		      "heading" => esc_html__('Latitude', 'barberry'),
		      "param_name" => "map_center_lat",
		      "admin_label" 	=> true,
		      "class" 		=> "hide_in_vc_editor",
		      "description" => __('Please enter the latitude for the maps center point. You can use <a href="http://universimmedia.pagesperso-orange.fr/geo/loc.htm" target="_blank">this service</a> to get coordinates of your location', 'barberry'),
		      "value" 		=> "40.2846472"
		    ),
		    array(
		      "type" => "textfield",
		      "heading" => esc_html__('Longitude', 'barberry'),
		      "param_name" => "map_center_lng",
		      "admin_label" 	=> true,
		      "class" 		=> "hide_in_vc_editor",
		      "description" => esc_html__('Please enter the longitude for the maps center point.', 'barberry'),
		      "value" 		=> "-75.6968276"
		    ),
		    
		  	array(
		      "type" => "dropdown",
		      "heading" => esc_html__('Map Zoom', 'barberry'),
		      "description" => esc_html__('Zoom level when focus the marker. 1-20', 'barberry'),
		      "param_name" => "zoom",
		      "class" 		=> "hide_in_vc_editor",
		      "admin_label" 	=> true,
		      'save_always' => true,
		      "value" => array(__("14 - Default", "js_composer") => 14, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20)		
		    ),
		    array(
		      "type" => 'checkbox',
		      "heading" => esc_html__('Enable Zoom In/Out', 'barberry'),
		      "param_name" => "enable_zoom",
		      "class" 		=> "hide_in_vc_editor",
		      "description" => esc_html__('Do you want users to be able to zoom in/out on the map?', 'barberry'),
		      "value" => Array(__("Yes, please", "js_composer") => true),
		    ),

		    array(
			  "type" => "dropdown",
			  "heading" => esc_html__('Marker Style', 'barberry'),
			  "param_name" => "marker_style",
			  "value" => array(
			     "Default Google Style" => "default",
				 "Marker Animated" => "barberry",
			   ),
			  'save_always' => true,
			  "description" => __('Please select the marker style you would like <br/> <b>Default Google Style</b> <i> - Will display the Google standard map marker and also allow you to optionally override it with an image</i> <br/> <b>Marker Animated</b> <i>- Will use a custom CSS based marker (the modern option).</i>', 'barberry'),
			),	

		    array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => esc_html__('Marker Color', 'barberry'),
				"param_name" => "barberry_marker_color",
				"admin_label" 	=> true,
				"class" 		=> "hide_in_vc_editor",
				"value" => "#a8e8e2",
				"dependency" => Array('element' => "marker_style", 'value' => 'barberry'),
				"description" => esc_html__('Please select the color for your marker.', 'barberry'),
			),							    

		    array(
		      "type" => "attach_image",
		      "heading" => esc_html__('Marker Image', 'barberry'),
		      "param_name" => "marker_image",
		      "dependency" => Array('element' => "marker_style", 'value' => 'default'),
		      "value" => "",
		      "description" => esc_html__('Select image from media library.', 'barberry'),
		    ),

		    array(
		      "type" => 'checkbox',
		      "heading" => esc_html__('Marker Animation', 'barberry'),
		      "param_name" => "marker_animation",
		      "dependency" => Array('element' => "marker_style", 'value' => 'default'),
		      "description" => esc_html__('This will cause your markers to do a quick bounce as they load in.', 'barberry'),
		      "value" => Array(__("Yes, please", "js_composer") => true),
		    ),		    

		    array(
		      "type" => 'checkbox',
		      "heading" => esc_html__('Greyscale Color', 'barberry'),
		      "param_name" => "map_greyscale",
		      "description" => esc_html__('Toggle a greyscale color scheme (will also unlock further custom options)', 'barberry'),
		      "value" => Array(__("Yes, please", "js_composer") => true),
		    ),

		    array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => esc_html__('Map Extra Color', 'barberry'),
				"param_name" => "map_color",
				"admin_label" 	=> true,
				"class" 		=> "hide_in_vc_editor",
				"value" => "#a8e8e2",
				"dependency" => Array('element' => "map_greyscale", 'not_empty' => true),
				"description" => esc_html__('Use this to define a main color that will be used in combination with the greyscale option for your map', 'barberry'),
			),

			array(
		      "type" => 'checkbox',
		      "heading" => esc_html__('Ultra Flat Map', 'barberry'),
		      "param_name" => "ultra_flat",
		      "class" 		=> "hide_in_vc_editor",
		      "dependency" => Array('element' => "map_greyscale", 'not_empty' => true),
		      "description" => esc_html__('This removes street/landmark text & some extra details for a clean look', 'barberry'),
		      "value" => Array(__("Yes, please", "js_composer") => true),
		    ),		    

		    array(
		      "type" => 'checkbox',
		      "heading" => esc_html__('Dark Color Scheme', 'barberry'),
		      "param_name" => "dark_color_scheme",
		      "class" 		=> "hide_in_vc_editor",
		      "dependency" => Array('element' => "map_greyscale", 'not_empty' => true),
		      "description" => esc_html__('Enable this option for a dark colored map (This will override the extra color choice)', 'barberry'),
		      "value" => Array(__("Yes, please", "js_composer") => true),
		    ),
			
		    array(
		      "type" => "textarea",
		      "heading" => esc_html__('Map Marker Locations', 'barberry'),
		      "param_name" => "map_markers",
		      "class" 		=> "hide_in_vc_editor",
		      "description" => __('Please enter the the list of locations you would like with a latitude|longitude|description format. <br/> Divide values with linebreaks (Enter). Example: <br/> 40.692784|-73.978763|Our Location <br/> 39.946814|-75.143038|Our Location #2', 'barberry'),
		    ),


	)
) );