<?php
// Register Fancy Box Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_fancy_box',
        'title' => esc_html__('Pxl Fancy Box', 'digicove' ),
        'icon' => 'eicon-image',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_layout',
                    'label' => esc_html__('Layout', 'digicove' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'digicove' ),
                            'type' => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'digicove' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_fancy_box/layout-image/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'digicove' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_fancy_box/layout-image/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'digicove' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_fancy_box/layout-image/layout3.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'digicove' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'    => 'style',
                            'label'   => esc_html__( 'Style', 'digicove' ),
                            'type'    => 'select',
                            'default' => 'default',
                            'condition' => [
                                'layout'    => ['1']                            
                            ],
                            'options' => [
                                'default'        => esc_html__( 'Default', 'digicove' ),
                                'style2'  => esc_html__( 'Style2', 'digicove' ),
                                'style3'  => esc_html__( 'Style3', 'digicove' ),
                                'style4'  => esc_html__( 'Style4', 'digicove' ),
                            ]
                        ),
                        array(
                            'name' => 'style_hover',
                            'label' => esc_html__('Style Hover', 'digicove' ),
                            'type'    => 'select',                            
                            'default' => '',
                            'condition' => [
                                'layout' => '2',                                
                            ],
                            'options' => [
                                'style-hover-1' => esc_html__('style1(default)', 'digicove' ),
                            ],
                        ),
                        array(
                            'name'             => 'selected_icon',
                            'label'            => esc_html__( 'Icon', 'digicove' ),
                            'type'             => 'icons',
                            'default'          => [
                                'library' => 'flaticon',
                                'value'   => 'flaticon-calling'  
                            ],
                            'condition' => [
                                'layout'    => ['1','2','3']                            
                            ],
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name'     => 'desc',
                            'label'    => esc_html__('Description', 'digicove'),
                            'type'     => 'textarea',
                            'default'  => esc_html__('Mauris dignissim lacus purus, sed rhoncus risus facilisis eu. Phasellus ullamcorper', 'digicove'),
                            'condition' => [
                                'layout'    => ['1','2']                            
                            ],
                        ),
                        array(
                            'name' => 'btn_link',
                            'label' => esc_html__('Box Link', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'condition' => [
                                'layout' => ['1','2','3','5'],
                            ],
                        ),
                        array(
                            'name' => 'show_button',
                            'label' => esc_html__('Show Button', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                            'condition' => [
                                'layout' => ['2','1'],
                            ],
                        ),
                        array(
                            'name' => 'btn_text',
                            'label' => esc_html__('Button Text', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'show_button' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'item_active',
                            'label' => esc_html__('Item Active', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'pxl--item-deactive' => 'No',
                                'pxl--item-active' => 'Yes',
                            ],
                            'default' => 'pxl--item-deactive',
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'fancy_padding',
                            'label' => esc_html__('Padding', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'wg_max_width',
                            'label' => esc_html__('Widget Max Width', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-fancy-box' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
),
array(
    'name' => 'section_style_title',
    'label' => esc_html__('Title', 'digicove'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'title_color',
            'label' => esc_html__('Title Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner .pxl-item--holder .pxl-item--title' => 'color: {{VALUE}};',
                '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner .pxl-item--holder .pxl-item--title span' => 'color: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;',
            ],
        ),
        array(
            'name' => 'title_color_hover',
            'label' => esc_html__('Title Color Hover', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner:hover .pxl-item--holder .pxl-item--title' => 'color: {{VALUE}};',
                '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner:hover .pxl-item--holder .pxl-item--title span' => 'color: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;',
            ],
        ),
        array(
            'name' => 'title_typography',
            'label' => esc_html__('Title Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner .pxl-item--holder .pxl-item--title',
        ),
        array(
            'name' => 'title_top_spacer',
            'label' => esc_html__('Title Top Spacer', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-item--title' => 'margin-top: {{SIZE}}{{UNIT}} !important;',
            ],
        ),
        array(
            'name' => 'title_bottom_spacer',
            'label' => esc_html__('Title Bottom Spacer', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-item--title' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
            ],
        ),
    ),
),
array(
    'name' => 'section_style_desc',
    'label' => esc_html__('Description', 'digicove'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'desc_color',
            'label' => esc_html__('Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner .pxl-item--holder .pxl-item--desc' => 'color: {{VALUE}};',                
            ],
        ),
        array(
            'name' => 'desc_color_hover',
            'label' => esc_html__('Color Hover', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner:hover .pxl-item--holder .pxl-item--desc' => 'color: {{VALUE}};',                
            ],
        ),
        array(
            'name' => 'desc_typography',
            'label' => esc_html__('Description Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner .pxl-item--holder .pxl-item--desc',            
        ),
        array(
            'name' => 'desc_bottom_spacer',
            'label' => esc_html__('Desc Bottom Spacer', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner .pxl-item--holder .pxl-item--desc' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
            ],
        ),
    ),
),
array(
    'name' => 'section_style_btn',
    'label' => esc_html__('Button', 'digicove'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'btnn_color',
            'label' => esc_html__('Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner .pxl-item--holder .btn-arrow' => 'color: {{VALUE}};',                
            ],
        ),
        array(
            'name' => 'btnn_color_hover',
            'label' => esc_html__('Color Hover', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner:hover .pxl-item--holder .btn-arrow' => 'color: {{VALUE}};',                
            ],
        ),
        array(
            'name' => 'btnn_typography',
            'label' => esc_html__('Description Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner .pxl-item--holder .btn-arrow',            
        ),
        array(
            'name' => 'btnn_color_icon',
            'label' => esc_html__('Icon Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner .pxl-item--holder .btn-arrow svg path' => 'stroke: {{VALUE}};',                
            ],
        ), 
        array(
            'name' => 'btnn_color_icon_hover',
            'label' => esc_html__('Icon Color Hover', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner:hover .pxl-item--holder .btn-arrow svg path' => 'stroke: {{VALUE}};',                
            ],
        ),
        array(
            'name' => 'icon_width_height',
            'label' => esc_html__('Icon width height', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner .pxl-item--holder .btn-arrow svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
            ],
        ),
    ),
),
array(
    'name' => 'section_style_background',
    'label' => esc_html__('Background', 'digicove'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'background_box_color',
            'label' => esc_html__('Background Box', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner' => 'background-color: {{VALUE}};',                
            ],
        ),
        array(
            'name'         => 'bg1_gradient',
            'label' => esc_html__( 'Background Type', 'digicove' ),
            'type'         => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types' => [ 'gradient' ],
            'condition' => [                
                'layout' => ['1'],                
            ],
            'selector'     => '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner::before',
        ),
        array(
            'name'         => 'bg_icon_gradient',
            'label' => esc_html__( 'Background Type', 'digicove' ),
            'type'         => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types' => [ 'gradient' ],
            'condition' => [                
                'layout' => ['1'],                
            ],
            'selector'     => '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner .pxl-fancy-icon::after',
        ),
        array(
            'name'         => 'bg_box_gradient',
            'label' => esc_html__( 'Background Type', 'digicove' ),
            'type'         => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types' => [ 'gradient' ],
            'condition' => [
                'style' => ['style3'],
                'layout' => ['1'],                
            ],
            'selector'     => '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner::after',
        ),
        array(
            'name'         => 'fancy_box_icon_shadow',
            'label' => esc_html__( 'Hover Box Shadow', 'digicove' ),
            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
            'control_type' => 'group',
            'condition' => [
                'style' => ['style3','style4'],
                'layout' => ['1'],                
            ],
            'selector'     => '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner .pxl-fancy-icon::after',
        ),
        array(
            'name' => 'background_color',
            'label' => esc_html__('Background Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'layout' => ['2','3'],
            ],
        ),
        array(
            'name' => 'background_color_after',
            'label' => esc_html__('Background Color After', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner:after' => 'border-color: {{VALUE}};',
            ],
            'condition' => [
                'layout' => ['3'],
            ],
        ),
        array(
            'name' => 'border_type',
            'label' => esc_html__( 'Border Type', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                '' => esc_html__( 'None', 'digicove' ),
                'solid' => esc_html__( 'Solid', 'digicove' ),
                'double' => esc_html__( 'Double', 'digicove' ),
                'dotted' => esc_html__( 'Dotted', 'digicove' ),
                'dashed' => esc_html__( 'Dashed', 'digicove' ),
                'groove' => esc_html__( 'Groove', 'digicove' ),
            ],            
            'condition' => [
                'layout' => ['2'],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner' => 'border-style: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'border_width',
            'label' => esc_html__( 'Border Width', 'digicove' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
            'condition' => [
                'border_type!' => '',
                'layout' => ['2'],
            ],
            'responsive' => true,
        ),
        array(
            'name' => 'border_color',
            'label' => esc_html__( 'Border Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner' => 'border-color: {{VALUE}} !important;',
            ],
            'condition' => [
                'border_type!' => '',
                'layout' => ['2'],
            ],
        ),
        array(
            'name' => 'btn_color',
            'label' => esc_html__('Button Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner .btn-arrow svg path' => 'stroke: {{VALUE}};',
            ],
            'condition' => [
                'layout' => ['2'],
            ],
        ),
        array(
            'name' => 'btn_color_hover',
            'label' => esc_html__('Button Color Hover', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner:hover .btn-arrow svg path' => 'stroke: {{VALUE}};',
            ],
            'condition' => [
                'layout' => ['2'],
            ],
        ),
    ),
),
array(
    'name' => 'section_style_icon',
    'label' => esc_html__('Icon', 'digicove'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'icon_size',
            'label' => esc_html__('Icon Size', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner .pxl-fancy-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'svg_size',
            'label' => esc_html__('Svg Size', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner .pxl-fancy-icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'icon_color',
            'label' => esc_html__('Icon Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-item--icon i' => 'color: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;',
            ],
            'condition' => [
                'icon_type' => 'icon',
            ],
        ),
        array(
            'name' => 'bg_icon_color',
            'label' => esc_html__('Background Icon Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-item--icon ' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'icon_type' => 'icon',
            ],
        ),
        array(
            'name' => 'icon_color_svg',
            'label' => esc_html__('Icon Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-fancy-icon svg path' => 'fill: {{VALUE}};',
            ],
            'condition' => [
                'layout' => ['1','2','3'],
            ],
        ), 
        array(
            'name' => 'icon_color_svg_hover',
            'label' => esc_html__('Icon Color Hover', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box:hover .pxl-fancy-icon svg path' => 'fill: {{VALUE}};',
            ],
            'condition' => [
                'layout' => ['1','2','3'],
            ],
        ),
        array(
            'name' => 'icon_color_svg_bg',
            'label' => esc_html__('Icon Color Background Hover', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner:hover .pxl-fancy-icon::after' => 'background: {{VALUE}};',
            ],
            'condition' => [
                'layout' => ['1'],
            ],
        ),
        array(
            'name' => 'icon_color_svg-eclip',
            'label' => esc_html__('Icon Color Eclip', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-fancy-icon::after, {{WRAPPER}} .pxl-fancy-box .pxl-fancy-icon::before' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'layout' => ['1'],
            ],
        ),
        array(
            'name' => 'icon_color_svg-eclip_hover',
            'label' => esc_html__('Icon Color Eclip Hover', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner:hover .pxl-fancy-icon::before' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'layout' => ['1'],
            ],
        ),
        array(
            'name' => 'bg_icon_color_svg',
            'label' => esc_html__('Background Icon Color', 'digicove' ),    
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-fancy-icon' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'layout' => ['3'],
            ],
        ),
        array(
            'name' => 'icon_img_max_height_icon',
            'label' => esc_html__('Icon Image Max Height', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-fancy-icon' => 'min-width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'layout' => ['3'],
            ],
        ),
        array(
            'name' => 'icon_font_size',
            'label' => esc_html__('Icon Font Size', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-item--icon i' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'icon_type' => 'icon',
            ],
        ),
        array(
            'name' => 'icon_img_max_height',
            'label' => esc_html__('Icon Image Max Height', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box .pxl-item--icon img' => 'max-height: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'icon_type' => 'image',
            ],
        ),
        array(
            'name' => 'icon_bottom_spacer',
            'label' => esc_html__('Icon Bottom Spacer', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'condition' => [
                'layout' => '2',
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-fancy-box2 .pxl-item--inner .pxl-fancy-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name'         => 'fancy_box_hover_shadow',
            'label' => esc_html__( 'Hover Box Shadow', 'digicove' ),
            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
            'control_type' => 'group',
            'selector'     => '{{WRAPPER}} .pxl-fancy-box .pxl-item--inner:hover',
        ),
    ),
),
digicove_widget_animation_settings(),
),
),
),
digicove_get_class_widget_path()
);