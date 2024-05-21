<?php

add_action( 'pxl_post_metabox_register', 'digicove_page_options_register' );
function digicove_page_options_register( $metabox ) {

	$panels = [
		'post' => [
			'opt_name'            => 'post_option',
			'display_name'        => esc_html__( 'Post Settings', 'digicove' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'Post Header', 'digicove' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						digicove_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)
				],
				'post_title' => [
					'title'  => esc_html__( 'Post Title', 'digicove' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						digicove_post_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'post_title_post_on',
								'title'    => esc_html__('Title On/Off', 'digicove'),
								'subtitle' => esc_html__('Show Title post.', 'digicove'),
								'type'     => 'switch',
								'default'  => true
							),
						),
						array(
							array(
								'id'             => 'pagetitle_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-page-title-default' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'digicove' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 
						)
					)
				],
				'post_settings' => [
					'title'  => esc_html__( 'Post Settings', 'digicove' ),
					'icon'   => 'el el-refresh',
					'fields' => array_merge(
						digicove_sidebar_pos_opts(['prefix' => 'post_', 'default' => true, 'default_value' => '-1']),
						array(
							array(
								'id'       => 'post_title_on',
								'title'    => esc_html__('Title On/Off', 'digicove'),
								'subtitle' => esc_html__('Show Title image on single post.', 'digicove'),
								'type'     => 'switch',
								'default'  => true
							),
						),
						array(
							array(
								'id'       => 'post_feature_image_on',
								'title'    => esc_html__('Feature Image', 'digicove'),
								'subtitle' => esc_html__('Show feature image on single post.', 'digicove'),
								'type'     => 'switch',
								'default'  => true,
							),
						),						
						array(
							array(
								'id'           => 'align_content_post',
								'type'         => 'button_set',
								'title'        => esc_html__( 'Align Content', 'digicove' ),
								'options'      => array(
									'content-left'  => esc_html__(' Left (Default)', 'digicove'),
									'content-center' => esc_html__('Center', 'digicove'),
									'content-right'  => esc_html__('Right', 'digicove')
								),
								'default'      => 'content-left',
								'force_output' => true
							),
						),
						array(
							array(
								'id'             => 'post_content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'digicove' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 
						),
					)
				],
			]
		],
		'page' => [
			'opt_name'            => 'pxl_page_options',
			'display_name'        => esc_html__( 'Page Settings', 'digicove' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'Header', 'digicove' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id'       => 'disable_header',
								'title'    => esc_html__('Disable', 'digicove'),
								'type'     => 'switch',
								'default'  => '0',
							),
						),
						digicove_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array (
							array(
								'id'    => 'sticky_style',
								'type'  => 'select',
								'title' => esc_html__('Style', 'digicove'),
								'options' => [
									'default'            => esc_html__('Default', 'digicove'), 
									'style2'        => esc_html__('Style2', 'digicove'), 
								],
								'default' => 'default',							
							),
							array(
								'id'       => 'sticky_scroll',
								'type'     => 'button_set',
								'title'    => esc_html__('Sticky Scroll', 'digicove'),
								'options'  => array(
									'pxl-sticky-stt' => esc_html__('Scroll To Top', 'digicove'),
									'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'digicove'),
								),
								'default'  => 'pxl-sticky-stb',
							),
						),
						array(
							array(
								'id'       => 'p_menu',
								'type'     => 'select',
								'title'    => esc_html__( 'Menu', 'digicove' ),
								'options'  => digicove_get_nav_menu_slug(),
								'default' => '',
							),
						)
					)

				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'digicove' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						digicove_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'post_title_on',
								'title'    => esc_html__('Title On/Off', 'digicove'),
								'subtitle' => esc_html__('Show Title post.', 'digicove'),
								'type'     => 'switch',
								'default'  => true
							),
						),
					)
				],
				'content' => [
					'title'  => esc_html__( 'Content', 'digicove' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						digicove_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id'             => 'page_content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'digicove' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 
						),
						array(
							array(
								'id'       => 'digicove_grid_lines',
								'title'    => esc_html__('Grid Line', 'digicove'),
								'subtitle' => esc_html__('Show Grid Line Page.', 'digicove'),
								'type'     => 'switch',
								'default'  => false
							),
						),
						array(
							array(
								'id'       => 'line-background',
								'type'     => 'background',
								'title'    => esc_html__('Line Background', 'digicove'),
								'subtitle' => esc_html__('Line background with image, color, etc.', 'digicove'),
								'desc'     => esc_html__('This is the description field, again good for additional info.', 'digicove'),
								'output'   => array('#pxl-main .pxl-lines .line'),	
								'default'  => array(
									'background-color' => '',
								)
							),
						),						
					)
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'digicove' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						array(
							array(
								'id'       => 'disable_footer',
								'title'    => esc_html__('Disable', 'digicove'),
								'type'     => 'switch',
								'default'  => '0',
							),
						),
						digicove_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)
				],
				'colors' => [
					'title'  => esc_html__( 'Colors', 'digicove' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						array(
							array(
								'id'          => 'primary_color',
								'type'        => 'color',
								'title'       => esc_html__('Primary Color', 'digicove'),
								'transparent' => false,
								'default'     => ''
							),
						),
						array(
							array(
								'id'       => 'opt-background',
								'type'     => 'background',
								'title'    => esc_html__('Body Background', 'digicove'),
								'subtitle' => esc_html__('Body background with image, color, etc.', 'digicove'),
								'desc'     => esc_html__('This is the description field, again good for additional info.', 'digicove'),
								'output'   => array('body'),
								'default'  => array(
									'background-color' => '',
								)
							),
						)
					)
				],
				'cursor' => [
					'title'  => esc_html__( 'Cursor', 'digicove' ),
					'icon'   => 'el el-website',
					'fields' => array(
						array(
							'id'       => 'enable_cursor',
							'type'     => 'button_set',
							'title'    => esc_html__('Enable Cursor', 'digicove'),
							'subtitle' => esc_html__('Inherit for extend theme option', 'digicove'),
							'options'  => [
								'-1' => esc_html__('Inherit','digicove'),
								'1'  => esc_html__('Yes','digicove'),
								'0'  => esc_html__('No','digicove'),
							],
							'default'  => '-1',
						),
						array(
							'id'    => 'cursor_style',
							'type'  => 'select',
							'title' => esc_html__('Style', 'digicove'),
							'options' => [
								'df'            => esc_html__('Inherit', 'digicove'), 
								'outline'        => esc_html__('Outline', 'digicove'), 
							],
							'default' => 'df',
							'required' => [ 'enable_cursor', '!=', '0']
						),		
						array(
							'id'          => 'cursor_circle_bg',
							'type'        => 'color_rgba',
							'title'       => esc_html__('Cursor Circle Background', 'digicove'),
							'default'   => array(
								'rgba'     => '',
								'alpha'     => 1
							),
						), 
						array(
							'id'          => 'cursor_follower_circle_bg',
							'type'        => 'color_rgba',
							'title'       => esc_html__('Cursor Follower Circle Background', 'digicove'),
							'default'   => array(
								'rgba'     => '',
								'alpha'     => 1
							),
						), 
						array(
							'id'          => 'cursor_follower_active_bg',
							'type'        => 'color_rgba',
							'title'       => esc_html__('Active Background', 'digicove'),
							'default'   => array(
								'rgba'     => '',
								'alpha'     => 1
							),
						), 
						array(
							'id'          => 'cursor_active_text_color',
							'type'        => 'color',
							'title'       => esc_html__('Active Text Color', 'digicove'),
							'default'   => '',
							'transparent' => false,
						), 				
					)
				],
			]
		],
		'case' => [
			'opt_name'            => 'pxl_case_options',
			'display_name'        => esc_html__( 'Case Options', 'digicove' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'case_header' => [
					'title'  => esc_html__( 'General', 'digicove' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						digicove_sidebar_pos_opts(['prefix' => 'case_', 'default' => false, 'default_value' => '0']),	
						digicove_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						digicove_post_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'case_feature_image_on',
								'title'    => esc_html__('Feature Image', 'digicove'),
								'subtitle' => esc_html__('Show feature image on single service.', 'digicove'),
								'type'     => 'switch',
								'default'  => true,
							)
						),
						array(
							array(
								'id'       => 'case_title',
								'title'    => esc_html__('Show Title', 'digicove'),
								'subtitle' => esc_html__('Show title on single service.', 'digicove'),
								'type'     => 'switch',
								'default'  => true,
							)
						),
					)
				],
				'case_content' => [
					'title'  => esc_html__( 'Content', 'digicove' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(						
						array(
							array(
								'id'             => 'case_content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'digicove' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 
							array(
								'id'=> 'case_client',
								'type' => 'text',
								'title' => esc_html__('Case Client', 'digicove'),									
								'default' => '',
							),
							array(
								'id'=> 'case_year',
								'type' => 'text',
								'title' => esc_html__('Case Year', 'digicove'),									
								'default' => '',
							),
							array(
								'id'       => 'case_navigation',
								'title'    => esc_html__('Navigation', 'digicove'),								
								'type'     => 'switch',
								'default'  => false,
							),
							array(
								'id'       => 'case_social_share',
								'title'    => esc_html__('Social', 'digicove'),
								'subtitle' => esc_html__('Display the Social Share for case post.', 'digicove'),
								'type'     => 'switch',
								'default'  => false,
							),
							array(
								'id'       => 'social_facebook',
								'title'    => esc_html__('Facebook', 'digicove'),
								'type'     => 'switch',
								'default'  => true,
								'indent' => true,
								'required' => array( 0 => 'case_social_share', 1 => 'equals', 2 => '1' ),
							),
							array(
								'id'       => 'social_twitter',
								'title'    => esc_html__('Twitter', 'digicove'),
								'type'     => 'switch',
								'default'  => true,
								'indent' => true,
								'required' => array( 0 => 'case_social_share', 1 => 'equals', 2 => '1' ),
							),
							array(
								'id'       => 'social_pinterest',
								'title'    => esc_html__('Pinterest', 'digicove'),
								'type'     => 'switch',
								'default'  => true,
								'indent' => true,
								'required' => array( 0 => 'case_social_share', 1 => 'equals', 2 => '1' ),
							),
							array(
								'id'       => 'social_google',
								'title'    => esc_html__('Google', 'digicove'),
								'type'     => 'switch',
								'default'  => true,
								'indent' => true,
								'required' => array( 0 => 'case_social_share', 1 => 'equals', 2 => '1' ),
							),
							array(
								'id'       => 'social_linkedin',
								'title'    => esc_html__('LinkedIn', 'digicove'),
								'type'     => 'switch',
								'default'  => true,
								'indent' => true,
								'required' => array( 0 => 'case_social_share', 1 => 'equals', 2 => '1' ),
							),
						)
					)
				],
				'case_footer' => [
					'title'  => esc_html__( 'Footer', 'digicove' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						digicove_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)
				],
			]
		],
		'service' => [
			'opt_name'            => 'pxl_service_options',
			'display_name'        => esc_html__( 'Service Settings', 'digicove' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'digicove' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						digicove_sidebar_pos_opts(['prefix' => 'service_', 'default' => false, 'default_value' => '0']),	
						array(
							array(
								'id'       => 'service_icon_type',
								'type'     => 'button_set',
								'title'    => esc_html__('Icon Type', 'digicove'),
								'options'  => array(
									'icon'  => esc_html__('Icon', 'digicove'),
									'image'  => esc_html__('Image', 'digicove'),
								),
								'default'  => 'icon'
							),
							array(
								'id'       => 'service_icon_font',
								'type'     => 'pxl_iconpicker',
								'title'    => esc_html__('Icon', 'digicove'),
								'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'icon' ),
								'force_output' => true
							),
							array(
								'id'       => 'service_icon_img',
								'type'     => 'media',
								'title'    => esc_html__('Icon Image', 'digicove'),
								'default' => '',
								'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'image' ),
								'force_output' => true
							),
						),
						array(
							array(
								'id'=> 'service_subtitle',
								'type' => 'text',
								'title' => esc_html__('Sub Title', 'digicove'),
								'validate' => 'html_custom',
								'default' => '',
							),
							array(
								'id'       => 'service_feature_image_on',
								'title'    => esc_html__('Feature Image', 'digicove'),
								'subtitle' => esc_html__('Show feature image on single service.', 'digicove'),
								'type'     => 'switch',
								'default'  => true,
							),
						),	
						array(
							array(
								'id'             => 'service_content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Content Spacing Top/Bottom', 'digicove' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
						)
					)
				],
			]
		],
		'pxl-template' => [ //post_type
		'opt_name'            => 'pxl_hidden_template_options',
		'display_name'        => esc_html__( 'Template Settings', 'digicove' ),
		'show_options_object' => false,
		'context'  => 'advanced',
		'priority' => 'default',
		'sections'  => [
			'header' => [
				'title'  => esc_html__( 'General', 'digicove' ),
				'icon'   => 'el-icon-website',
				'fields' => array(
					array(
						'id'    => 'template_type',
						'type'  => 'select',
						'title' => esc_html__('Type', 'digicove'),
						'options' => [
							'df'       	   => esc_html__('Select Type', 'digicove'), 
							'header'       => esc_html__('Header', 'digicove'), 
							'footer'       => esc_html__('Footer', 'digicove'), 							
							'mega-menu'    => esc_html__('Mega Menu', 'digicove'), 
							'wgsidebar' => esc_html__('Widget Sidebar', 'digicove'),							
							'page-title'   => esc_html__('Page Title', 'digicove'), 
							'tab' => esc_html__('Tab', 'digicove'),
							'hidden-panel' => esc_html__('Hidden Panel', 'digicove'),
						],
						'default' => 'df',
					),
					array(
						'id'    => 'header_type',
						'type'  => 'button_set',
						'title' => esc_html__('Header Type', 'digicove'),
						'options' => [
							'px-header--default'       	   => esc_html__('Default', 'digicove'), 
							'px-header--transparent'       => esc_html__('Transparent', 'digicove'),
						],
						'default' => 'px-header--default',
						'indent' => true,
						'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'header' ),
					),
					array(
						'id'       => 'template_position',
						'type'     => 'select',
						'title'    => esc_html__('Display Position', 'digicove'),
						'options'  => [
							'left'   => esc_html__('Left Position', 'digicove'),
							'top'    => esc_html__('Top Position', 'digicove'),
							'center' => esc_html__('Center Position (popup)', 'digicove'),
							'right'  => esc_html__('Right Position', 'digicove'),
							'full'   => esc_html__('Full Screen', 'digicove'),
						],
						'default'  => 'left',
						'required' => [ 'template_type', '=', 'hidden-panel']
					),
				),

			],
		]
	],
];

$metabox->add_meta_data( $panels );
}
