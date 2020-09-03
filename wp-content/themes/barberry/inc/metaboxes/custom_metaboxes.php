<?php




if(function_exists("register_field_group")) {

	/* Woo Categories / Tags Settings */

	register_field_group(array (
		'id' => 'acf_products-categories',
		'title' => 'Products categories',
		'fields' => array (


			array (
				'key' => 'field_prodcat_img_header',
				'label' => esc_html__('Image for category heading', 'barberry'),
				'name' => 'tdl_prodcat_image_header',
				'type' => 'image',
				'instructions' => esc_html__('Specify the image you want to display at the top of current category page.', 'barberry'),
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),

			array (
				'key' => 'field_prodcat_img_icon',
				'label' => esc_html__('Image (icon) for categories navigation on the shop page', 'barberry'),
				'name' => 'tdl_prodcat_image_icon',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),

			array (
				'key' => 'field_prodcat_img_icon_light',
				'label' => esc_html__('Image (icon) for categories navigation on the shop page (Light Page Title Color Scheme)', 'barberry'),
				'name' => 'tdl_prodcat_image_icon_light',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),			
	
			array (
				'key' => 'field_prodcat_header_overlap',
				'label' => esc_html__('Header Above the Content', 'barberry'),
				'name' => 'tdl_prodcat_header_overlap',
				'type' => 'true_false',
				'instructions' => esc_html__('Overlap page content with this header (header is transparent)', 'barberry'),
				'message' => esc_html__('Header above the content', 'barberry'),
				'default_value' => 0,
			),
								
			array (
				'key' => 'field_prodcat_header_color_scheme',
				'label' => esc_html__('Header Elements Color Scheme', 'barberry'),
				'name' => 'tdl_prodcat_header_color_scheme',
				'type' => 'select',
				'instructions' => esc_html__('You can set different colors depending on it\'s background. May be light or dark', 'barberry'),
				'choices' => array (
					'default' => esc_html__('Inherit', 'barberry'),
					'light' => esc_html__('Light', 'barberry'),
					'dark' => esc_html__('Dark', 'barberry'),
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,

			),

			array (
				'key' => 'field_prodcat_title_color_scheme',
				'label' => esc_html__('Page Title Color Scheme', 'barberry'),
				'name' => 'tdl_prodcat_title_color_scheme',
				'type' => 'select',
				'instructions' => esc_html__('You can set different colors depending on it\'s background. May be light or dark', 'barberry'),
				'choices' => array (
					'default' => esc_html__('Inherit', 'barberry'),
					'light' => esc_html__('Light', 'barberry'),
					'dark' => esc_html__('Dark', 'barberry'),
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,				
			),

			array (
				'key' => 'field_prodcat_title_size',
				'label' => esc_html__('Page Title Section Size', 'barberry'),
				'name' => 'tdl_prodcat_title_size',
				'type' => 'select',
				'instructions' => esc_html__('You can set different sizes for your pages title section', 'barberry'),
				'choices' => array (
					'default' => esc_html__('Default', 'barberry'),
					'small' => esc_html__('Small', 'barberry'),
					'large' => esc_html__('Large', 'barberry'),
					'xlarge' => esc_html__('XLarge', 'barberry'),
				),
				'default_value' => 'default',
				'allow_null' => 0,
				'multiple' => 0,				
			),	
			

			array (
				'key' => 'field_prodcat_title_bg_color',
				'label' => 'Background Color for Page Title Section',
				'name' => 'tdl_prodcat_title_bg_color',
				'type' => 'color_picker',
				'instructions' => 'Specify the background color for page title section',
				'default_value' => '',
			),	

		),
		'location' => array (
			array (
				array (
					'param' => 'ef_taxonomy',
					'operator' => '==',
					'value' => 'product_cat',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

	/* Attributes */



	/* Product */
	register_field_group(array (
		'id' => 'acf_sidebar',
		'title' => esc_html__('Product Settings', 'barberry'),
		'fields' => array (

			array (
				'key' => 'field_product_header_transparent_desktop',
				'label' => esc_html__('Header Above the Content on desktop', 'barberry'),
				'name' => 'tdl_product_header_transparent_desktop',
				'type' => 'select',
				'instructions' => esc_html__('Overlap page content with this header (header is transparent) on desktop. Only for Style 2 & Style 3 product layouts.', 'barberry'),
				'choices' => array (
					'inherit' => esc_html__('Inherit', 'barberry'),
					'overlap' => esc_html__('Overlap Header', 'barberry'),
					'no_overlap' => esc_html__('No Overlap Header', 'barberry'),
				),
				'default_value' => 'inherit',
				'allow_null' => 0,
				'multiple' => 0,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_prod_layout',
							'operator' => '!=',
							'value' => 'inherit'
						),
						array (
							'field' => 'field_prod_layout',
							'operator' => '!=',
							'value' => 'default'
						)												
					),
					'allorany' => 'all',
				),				
			),

			array (
				'key' => 'field_product_header_transparent',
				'label' => esc_html__('Header Above the Content on mobile', 'barberry'),
				'name' => 'tdl_product_header_transparent',
				'type' => 'select',
				'instructions' => esc_html__('Overlap page content with this header (header is transparent) on mobile.', 'barberry'),
				'choices' => array (
					'inherit' => esc_html__('Inherit', 'barberry'),
					'overlap' => esc_html__('Overlap Header', 'barberry'),
					'no_overlap' => esc_html__('No Overlap Header', 'barberry'),
				),
				'default_value' => 'inherit',
				'allow_null' => 0,
				'multiple' => 0,
			),	

			array (
				'key' => 'field_new_label',
				'label' => esc_html__('Add "New" label', 'barberry'),
				'name' => 'tdl_new_label',
				'type' => 'true_false',
				'instructions' => esc_html__('You can add "New" label to this product', 'barberry'),
				'message' => esc_html__('Add "New" label', 'barberry'),
				'default_value' => 0,
			),			

			array (
				'key' => 'field_prod_layout',
				'label' => esc_html__('Product layout', 'barberry'),
				'name' => 'tdl_prod_layout',
				'type' => 'select',
				'instructions' => esc_html__('Select product page layout.', 'barberry'),
				'choices' => array (
					'inherit' => esc_html__('Inherit', 'barberry'),
					'default' => esc_html__('Default', 'barberry'),
					'style_2' => esc_html__('Style 2', 'barberry'),
					'style_3' => esc_html__('Style 3', 'barberry'),
				),
				'default_value' => 'inherit',
				'allow_null' => 0,
				'multiple' => 0,
			),

			array (
				'key' => 'field_prod_thumb_position',
				'label' => esc_html__('Product Thumbnails Position', 'barberry'),
				'name' => 'tdl_prod_thumb_position',
				'type' => 'select',
				'instructions' => esc_html__('Select product thumbnail position.', 'barberry'),
				'choices' => array (
					'inherit' => esc_html__('Inherit', 'barberry'),
					'bottom' => esc_html__('Bottom', 'barberry'),
					'left' => esc_html__('Left', 'barberry'),
					'right' => esc_html__('Right', 'barberry'),
				),
				'default_value' => 'inherit',
				'allow_null' => 0,
				'multiple' => 0,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_prod_layout',
							'operator' => '!=',
							'value' => 'style_3'
						),												
					),
					'allorany' => 'all',
				),				
			),

			array (
				'key' => 'field_product_no_overlap',
				'name' => 'tdl_product_no_overlap',
				'type' => 'true_false',
				'message' => esc_html__('No Overlap Header', 'barberry'),
				'default_value' => 0,


				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_prod_layout',
							'operator' => '!=',
							'value' => 'inherit'
						),
						array (
							'field' => 'field_prod_layout',
							'operator' => '!=',
							'value' => 'default'
						)												
					),
					'allorany' => 'all',
				),							
			),


			array (
				'key' => 'field_full_description',
				'name' => 'tdl_full_description',
				'type' => 'true_false',
				'message' => esc_html__('Fullscreen Description', 'barberry'),
				'default_value' => 0,
			),

			array (
				'key' => 'field_product_video',
				'label' => esc_html__('Video Embed Code', 'barberry'),
				'name' => 'tdl_video_review',
				'type' => 'text',
				'instructions' => esc_html__('Enter the direct URL to a YouTube video page.', 'barberry'),
			),			


		),
		'location' => array (

			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'product',
					'order_no' => 0,
					'group_no' => 6,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));


	/* Page Settings */
	register_field_group(array (
		'id' => 'acf_page-settings',
		'title' => 'Page Settings',
		'fields' => array (

			array (
				'key' => 'field_page_header_title',
				'label' => esc_html__('Hide Page Title', 'barberry'),
				'name' => 'tdl_page_header_title',
				'type' => 'true_false',
				'instructions' => esc_html__('Check this if you want to show/hide page title area.', 'barberry'),
				'message' => esc_html__('Hide Page Title', 'barberry'),
				'default_value' => 0,
			),

			array (
				'key' => 'field_page_header_top_padding',
				'label' => esc_html__('Header Top Padding', 'barberry'),
				'name' => 'tdl_page_header_top_padding',
				'type' => 'true_false',
				'instructions' => esc_html__('Check this if you want to add header top padding when title section is disabled.', 'barberry'),
				'message' => esc_html__('Header Top Padding', 'barberry'),
				'default_value' => 0,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_page_header_title',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),				
			),
						

			array (
				'key' => 'field_page_header_title_padding',
				// 'label' => esc_html__('Disable Page Title Bottom Padding', 'barberry'),
				'name' => 'tdl_page_header_title_bpadding',
				'type' => 'true_false',
				'instructions' => esc_html__('Check this if you want to disable bottom padding in Page Title.', 'barberry'),
				'message' => esc_html__('Disable Page Title Bottom Padding', 'barberry'),
				'default_value' => 0,	
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_page_header_title',
							'operator' => '!=',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),							
			),	



			array (
				'key' => 'field_header_overlap',
				'label' => esc_html__('Header Above the Content', 'barberry'),
				'name' => 'tdl_header_overlap',
				'type' => 'true_false',
				'instructions' => esc_html__('Overlap page content with this header (header is transparent)', 'barberry'),
				'message' => esc_html__('Header above the content', 'barberry'),
				'default_value' => 0,
			),			

			array (
				'key' => 'field_subtitle',
				'label' => esc_html__('Page SubTitle', 'barberry'),
				'name' => 'tdl_subtitle',
				'type' => 'text',
				'instructions' => esc_html__('Enter page subtitle.', 'barberry'),
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_page_header_title',
							'operator' => '!=',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
			),

			array (
				'key' => 'field_page_content_tpadding',
				'name' => 'tdl_page_content_tpadding',
				'type' => 'true_false',
				'instructions' => esc_html__('Check this if you want to disable top padding of page content.', 'barberry'),
				'message' => esc_html__('Disable Page Content Top Padding', 'barberry'),
				'default_value' => 0,								
			),			

			array (
				'key' => 'field_page_content_bpadding',
				'name' => 'tdl_page_content_bpadding',
				'type' => 'true_false',
				'instructions' => esc_html__('Check this if you want to disable content bottom padding ', 'barberry'),
				'message' => esc_html__('Disable Content Bottom Padding', 'barberry'),
				'default_value' => 0,
			),

			array (
				'key' => 'field_page_topbar',
				'name' => 'tdl_page_topbar',
				'type' => 'true_false',
				'message' => esc_html__('Hide Header Top Bar', 'barberry'),
				'default_value' => 0,
			),

			array (
				'key' => 'field_page_footer',
				'name' => 'tdl_page_footer',
				'type' => 'true_false',
				'message' => esc_html__('Hide Page Footer', 'barberry'),
				'default_value' => 0,
			),			

			array (
				'key' => 'field_header_color_scheme',
				'label' => esc_html__('Header Elements Color Scheme', 'barberry'),
				'name' => 'tdl_header_color_scheme',
				'type' => 'select',
				'instructions' => esc_html__('You can set different colors depending on it\'s background. May be light or dark', 'barberry'),
				'choices' => array (
					'default' => esc_html__('Inherit', 'barberry'),
					'light' => esc_html__('Light', 'barberry'),
					'dark' => esc_html__('Dark', 'barberry'),
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,

			),

			array (
				'key' => 'field_page_title_color_scheme',
				'label' => esc_html__('Page Title Color Scheme', 'barberry'),
				'name' => 'tdl_page_title_color_scheme',
				'type' => 'select',
				'instructions' => esc_html__('You can set different colors depending on it\'s background. May be light or dark', 'barberry'),
				'choices' => array (
					'default' => esc_html__('Inherit', 'barberry'),
					'light' => esc_html__('Light', 'barberry'),
					'dark' => esc_html__('Dark', 'barberry'),
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_page_header_title',
							'operator' => '!=',
							'value' => 1,
						),
					),
					'allorany' => 'all',
				),				
			),

			array (
				'key' => 'field_page_title_size',
				'label' => esc_html__('Page Title Section Size', 'barberry'),
				'name' => 'tdl_page_title_size',
				'type' => 'select',
				'instructions' => esc_html__('You can set different sizes for your pages title section', 'barberry'),
				'choices' => array (
					'default' => esc_html__('Default', 'barberry'),
					'small' => esc_html__('Small', 'barberry'),
					'large' => esc_html__('Large', 'barberry'),
					'xlarge' => esc_html__('XLarge', 'barberry'),
				),
				'default_value' => 'default',
				'allow_null' => 0,
				'multiple' => 0,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_page_header_title',
							'operator' => '!=',
							'value' => 1,
						),
					),
					'allorany' => 'all',
				),				
			),	

			array (
				'key' => 'field_page_title_image',
				'label' => esc_html__('Background Image for Page Title Section', 'barberry'),
				'name' => 'tdl_page_title_image',
				'type' => 'image',
				// 'instructions' => esc_html__('Specify the image you want to display at the top of current category page.', 'barberry'),
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_page_header_title',
							'operator' => '!=',
							'value' => 1,
						),
					),
					'allorany' => 'all',
				),				
			),
				

			array (
				'key' => 'field_page_title_bg_color',
				'label' => 'Background Color for Page Title Section',
				'name' => 'tdl_page_title_bg_color',
				'type' => 'color_picker',
				'instructions' => 'Specify the background color for page title section',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_page_header_title',
							'operator' => '!=',
							'value' => 1,
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
			),								
	

		),

		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'default',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-boxed.php',
					'order_no' => 0,
					'group_no' => 2,
				),
			),	
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-left-sidebar.php',
					'order_no' => 0,
					'group_no' => 3,
				),
			),	
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-right-sidebar.php',
					'order_no' => 0,
					'group_no' => 3,
				),
			),			
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-full-width.php',
					'order_no' => 0,
					'group_no' => 4,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-narrow.php',
					'order_no' => 0,
					'group_no' => 5,
				),
			),				
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-view-compare.php',
					'order_no' => 0,
					'group_no' => 5,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

}





/**
 * ACF Fields
 */
if ( function_exists( 'acf_add_local_field_group' ) ) {
	// custom fonts fields
	acf_add_local_field_group(
		array(
			'key'                   => 'group_5da01c79399ce',
			'title'                 => esc_html__( 'Custom Fonts', 'barberry' ),
			'fields'                => array(
				array(
					'key'               => 'field_5da01caa50c9a',
					'label'             => '',
					'name'              => 'custom_fonts',
					'type'              => 'repeater',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'collapsed'         => 'field_5da01cfa50c9b',
					'min'               => 0,
					'max'               => 0,
					'layout'            => 'block',
					'button_label'      => esc_html__( 'Add Custom Font', 'barberry' ),
					'sub_fields'        => array(
						array(
							'key'               => 'field_5da01cfa50c9b',
							'label'             => esc_html__( 'Font Family Name', 'barberry' ),
							'name'              => 'font_name',
							'type'              => 'text',
							'instructions'      => '',
							'required'          => 1,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '',
								'class' => '',
								'id'    => '',
							),
							'default_value'     => '',
							'placeholder'       => '',
							'prepend'           => '',
							'append'            => '',
							'maxlength'         => '',
						),
						array(
							'key'               => 'field_5da3c469ba39d',
							'label'             => esc_html__( 'Font Display', 'barberry' ),
							'name'              => 'font_display',
							'type'              => 'select',
							'instructions'      => sprintf(
								'<a href="https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display" target="_blank">%1s</a> %2s',
								esc_html__( 'More information', 'barberry' ),
								esc_html__( 'related to "font-display" descriptor.', 'barberry' )
							),
							'required'          => 1,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '',
								'class' => '',
								'id'    => '',
							),
							'choices'           => array(
								'auto'     => 'auto',
								'block'    => 'block',
								'swap'     => 'swap',
								'fallback' => 'fallback',
								'optional' => 'optional',
							),
							'default_value'     => array(
								0 => 'auto',
							),
							'allow_null'        => 0,
							'multiple'          => 0,
							'ui'                => 0,
							'return_format'     => 'value',
							'ajax'              => 0,
							'placeholder'       => '',
						),
						array(
							'key'               => 'field_5da01d3550c9c',
							'label'             => esc_html__( 'Font Files', 'barberry' ),
							'name'              => 'font_files',
							'type'              => 'repeater',
							'instructions'      => '',
							'required'          => 1,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '',
								'class' => '',
								'id'    => '',
							),
							'collapsed'         => 'field_5da01e9550c9e',
							'min'               => 0,
							'max'               => 0,
							'layout'            => 'block',
							'button_label'      => esc_html__( 'Add Font File', 'barberry' ),
							'sub_fields'        => array(
								array(
									'key'               => 'field_5da01d7250c9d',
									'label'             => 'Font File',
									'name'              => 'font_file',
									'type'              => 'file',
									'instructions'      => esc_html__( 'Upload .woff or .woff2 font file', 'barberry' ),
									'required'          => 1,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'return_format'     => 'array',
									'library'           => 'all',
									'min_size'          => '',
									'max_size'          => '',
									'mime_types'        => 'woff, woff2',
								),
								array(
									'key'               => 'field_5da01e9550c9e',
									'label'             => esc_html__( 'Font Weight', 'barberry' ),
									'name'              => 'font_weight',
									'type'              => 'select',
									'instructions'      => esc_html__( 'Select a font weight of the uploaded font file', 'barberry' ),
									'required'          => 1,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'choices'           => array(
										100         => esc_html__( '100 (Thin)', 'barberry' ),
										'100italic' => esc_html__( '100i (Thin Italic)', 'barberry' ),
										200         => esc_html__( ' 200 (Ultra Light)', 'barberry' ),
										'200italic' => esc_html__( '200i (Ultra Light Italic)', 'barberry' ),
										300         => esc_html__( ' 300 (Light)', 'barberry' ),
										'300italic' => esc_html__( '300i (Light Italic)', 'barberry' ),
										400         => esc_html__( '400 (Regular)', 'barberry' ),
										'400italic' => esc_html__( '400i (Regular Italic)', 'barberry' ),
										500         => esc_html__( '500 (Medium)', 'barberry' ),
										'500italic' => esc_html__( '500i (Medium Italic)', 'barberry' ),
										600         => esc_html__( '600 (Semi Bold)', 'barberry' ),
										'600italic' => esc_html__( '600i (Semi Bold Italic)', 'barberry' ),
										700         => esc_html__( '700 (Bold)', 'barberry' ),
										'700italic' => esc_html__( '700i (Bold Italic)', 'barberry' ),
										800         => esc_html__( '800 (Extra Bold)', 'barberry' ),
										'800italic' => esc_html__( '800i (Extra Bold Italic)', 'barberry' ),
										900         => esc_html__( '900 (Black)', 'barberry' ),
										'900italic' => esc_html__( '900i (Black Italic)', 'barberry' ),
									),
									'default_value'     => array(),
									'allow_null'        => 0,
									'multiple'          => 0,
									'ui'                => 0,
									'return_format'     => 'value',
									'ajax'              => 0,
									'placeholder'       => '',
								),
							),
						),
					),
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'options_page',
						'operator' => '==',
						'value'    => 'custom-fonts-settings',
					),
				),
			),
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
			'active'                => true,
			'description'           => '',
		)
	);
}


/**
 * Custom Fonts Admin Page
 */
if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page(
		array(
			'page_title'      => 'Custom Fonts',
			'menu_title'      => 'Custom Fonts',
			'menu_slug'       => 'custom-fonts-settings',
			'capability'      => 'customize',
			'icon_url'        => 'dashicons-editor-textcolor',
			'update_button'   => esc_html__( 'Save Changes', 'barberry' ),
			'updated_message' => sprintf(
				'%1s <a href="%2s" target="_blank">%3s</a>',
				esc_html__( 'Fonts are saved and ready to use from', 'barberry' ),
				admin_url( 'customize.php' ),
				esc_html__( 'WordPress Customizer.', 'barberry' )
			),
		)
	);

}
