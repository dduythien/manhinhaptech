<?php
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );

pxl_add_custom_widget(
    array(
        'name' => 'pxl_meta_box_carousel',
        'title' => esc_html__('Meta Box Carousel Pxl', 'digicove'),
        'icon' => 'eicon-slider-push',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
        ),
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_meta_box_carousel/img-layout/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'digicove' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_meta_box_carousel/img-layout/layout2.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_header',
                    'label' => esc_html__('Item Title', 'digicove' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [                                
                        'layout' => '1',
                    ],
                    'controls' => array(
                        array(
                            'name' => 'el_sub_title',
                            'label' => esc_html__('Sub Title', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__('Enter your Sub title', 'digicove' ),
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'el_title_text',
                            'label' => esc_html__('Title', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'placeholder' => esc_html__('Enter your title', 'digicove' ),
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'el_title_tag',
                            'label' => esc_html__('HTML Tag', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'h1' => 'H1',
                                'h2' => 'H2',
                                'h3' => 'H3',
                                'h4' => 'H4',
                                'h5' => 'H5',
                                'h6' => 'H6',
                                'div' => 'div',
                                'span' => 'span',
                                'p' => 'p',
                            ],
                            'default' => 'h2',
                        ),
                        array(
                            'name' => 'el_title_max_width',
                            'label' => esc_html__( 'Title Max Width', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'default' => [
                                'unit' => 'px',
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-meta-box-carousel .container-custom .el--title' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                          'name' => 'el_title_align',
                          'label' => esc_html__( 'Alignment', 'digicove' ),
                          'type' => \Elementor\Controls_Manager::CHOOSE,
                          'control_type' => 'responsive',
                          'options' => [
                            'left' => [
                                'title' => esc_html__( 'Left', 'digicove' ),
                                'icon' => 'eicon-text-align-left',
                            ],
                            'center' => [
                                'title' => esc_html__( 'Center', 'digicove' ),
                                'icon' => 'eicon-text-align-center',
                            ],
                            'right' => [
                                'title' => esc_html__( 'Right', 'digicove' ),
                                'icon' => 'eicon-text-align-right',
                            ],
                            'justify' => [
                                'title' => esc_html__( 'Justified', 'digicove' ),
                                'icon' => 'eicon-text-align-justify',
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .pxl-meta-box-carousel .wp-title' => 'text-align: {{VALUE}};',
                        ],
                    ),
                    ),
),
array(
    'name' => 'section_content',
    'label' => esc_html__('Content', 'digicove'),
    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
    'controls' => array(
        array(
            'name' => 'list',
            'label' => esc_html__('List', 'digicove'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'default' => [],
            'condition' => [                                
                'layout' => '1',
            ],
            'controls' => array(
                array(
                    'name' => 'pxl_icon',
                    'label' => esc_html__('Icon', 'digicove' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                ),
                array(
                    'name' => 'title',
                    'label' => esc_html__('Title', 'digicove'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ),
                array(
                    'name' => 'content',
                    'label' => esc_html__('Content', 'digicove'),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ),
                array(
                    'name' => 'image',
                    'label' => esc_html__( 'Image', 'digicove' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ),
                array(
                    'name' => 'btn_text',
                    'label' => esc_html__('Button Text', 'digicove' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                    'placeholder' => esc_html__('Learn more', 'digicove' ),
                ),
                array(
                    'name' => 'link',
                    'label' => esc_html__('Link', 'digicove'),
                    'type' => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                ),
            ),
            'title_field' => '{{{ title }}}',
        ),
        array(
            'name' => 'list2',
            'label' => esc_html__('List', 'digicove'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'default' => [],
            'condition' => [                                
                'layout' => '2',
            ],
            'controls' => array(
                array(
                    'name' => 'image2',
                    'label' => esc_html__( 'Image', 'digicove' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ),
            ),            
        ),
    ),
),
array(
    'name' => 'section_style_icon',
    'label' => esc_html__('Style', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'condition' => [                                
        'layout' => '1',
    ],
    'controls' => array(
        array(
            'name' => 'title_color',
            'label' => esc_html__('Title Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-item--inner .pxl-item--title a' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_color_hover',
            'label' => esc_html__('Hover Title Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-item--inner .pxl-item--title a:hover' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_typography',
            'label' => esc_html__( 'Title Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-item--inner .pxl-item--title',
        ),
        array(
            'name' => 'title_margin',
            'label' => esc_html__('Title Margin (px)', 'digicove' ),
            'type' => 'dimensions',
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-item--inner .pxl-item--title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'separator' => 'after',
        ),
        array(
            'name' => 'content_color',
            'label' => esc_html__('Content Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-item--inner .pxl-item--content a' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'link_color',
            'label' => esc_html__('Link Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-item--inner .pxl-item--content a' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'link_color_hover',
            'label' => esc_html__('Hover Link Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-item--inner .pxl-item--content a:hover' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'content_typography',
            'label' => esc_html__( 'Title Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-item--inner .pxl-item--content span',
        ),
        array(
            'name' => 'content_margin',
            'label' => esc_html__('Content Margin (px)', 'digicove' ),
            'type' => 'dimensions',
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-item--inner .pxl-item--content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'separator' => 'after',
        ),
        array(
            'name' => 'icon_color',
            'label' => esc_html__('Icon Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-item--inner .pxl-item--icon svg path' => 'fill: {{VALUE}};',
            ],
        ),
        array(
            'name'         => 'icon_bg_color',
            'label' => esc_html__( 'Background Type', 'digicove' ),
            'type'         => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types' => [ 'gradient' ],
            'selector'     => '{{WRAPPER}} .pxl-item--inner .pxl-item--icon',
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
                '{{WRAPPER}} .pxl-item--inner .pxl-item--content span:before' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'icon_size',
            'label' => esc_html__('Icon Size', 'digicove' ),
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
                '{{WRAPPER}} .pxl-item--inner .pxl-item--content span:before' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'icon_space_right',
            'label' => esc_html__('Icon Spacer Right', 'digicove' ),
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
                '{{WRAPPER}} .pxl-item--inner .pxl-item--content span:before' => 'margin-right: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'img_margin',
            'label' => esc_html__('Image Margin (px)', 'digicove' ),
            'type' => 'dimensions',
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-item--inner .pxl-item--image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'separator' => 'after',
        ),
        array(
            'name' => 'bg_color',
            'label' => esc_html__('Background Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-item--inner' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name'         => 'box_gradient',
            'label' => esc_html__( 'Background Type', 'digicove' ),
            'type'         => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types' => [ 'gradient' ],
            'selector'     => '{{WRAPPER}} .pxl-item--inner .pxl-item--image::after',
        ),
        array(
            'name' => 'border_color',
            'label' => esc_html__('Border Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-item--inner' => 'border-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'hover_bg_color',
            'label' => esc_html__( 'Hover Background Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-item--inner:hover' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'box_padding',
            'label' => esc_html__('Box Padding', 'digicove' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'size_units' => [ 'px', '%' ],
            'default' => [
                'unit' => 'px',
            ],
            'range' => [
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-item--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'show_button',
            'label' => esc_html__('Show Button', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
        ),
        array(
            'name' => 'button_color',
            'label' => esc_html__('Background Button', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'condition' => [
                'show_button' => 'true'
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-item--inner .btn-readmore' => 'background: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'button_color_hover',
            'label' => esc_html__('Background Button Hover', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'condition' => [
                'show_button' => 'true'
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-item--inner:hover .btn-readmore' => 'background: {{VALUE}};',
            ],
        ),
    ),
),
array(
    'name' => 'section_style_el_title',
    'label' => esc_html__('Item Title', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'condition' => [                                
        'layout' => '1',
    ],
    'controls' => array(
        array(
            'name' => 'el_sub_title_color',
            'label' => esc_html__('Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-meta-box-carousel .container-custom .el--sub-title,{{WRAPPER}} .pxl-post-carousel1 .container-custom .el--sub-title' => 'color: {{VALUE}};',
                '{{WRAPPER}} .pxl-meta-box-carousel .container-custom .el--sub-title span,{{WRAPPER}} .pxl-post-carousel1 .container-custom .el--sub-title span' => 'color: {{VALUE}}; text-fill-color: {{VALUE}}; -webkit-text-fill-color: {{VALUE}}; background-image: none;',
            ],
        ),
        array(
            'name' => 'el_sub_title_bg_color',
            'label' => esc_html__('Background Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-meta-box-carousel .container-custom .el--sub-title::after,{{WRAPPER}} .pxl-post-carousel1 .container-custom .el--sub-title::after' => 'background: {{VALUE}};',                
            ],
        ),
        array(
            'name'         => 'el_sub_title_bg_gradient',
            'label' => esc_html__( 'Background Type', 'digicove' ),
            'type'         => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types' => [ 'gradient' ],
            'selector'     => '{{WRAPPER}} .pxl-meta-box-carousel .container-custom .el--sub-title::after,{{WRAPPER}} .pxl-post-carousel1 .container-custom .el--sub-title::after',
        ),
        array(
            'name' => 'el_sub_title_typography',
            'label' => esc_html__('Sub Title Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-meta-box-carousel .container-custom .el--sub-title span',
        ),
        array(
            'name' => 'el_sub_title_space_bottom',
            'label' => esc_html__('Sub Title Bottom Spacer', 'digicove' ),
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
                '{{WRAPPER}} .pxl-meta-box-carousel .container-custom .el--sub-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'el_animate_sub',
            'label' => esc_html__( 'Case Animate', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => digicove_widget_animate(),
            'default' => '',
        ),
        array(
            'name' => 'el_animate_delay_sub',
            'label' => esc_html__('Animate Delay', 'digicove' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '0',
            'description' => esc_html__( 'Enter number. Default 0ms', 'digicove' ),
        ),
        array(
            'name' => 'el_animate_duration_sub',
            'label' => esc_html__('Animation Duration', 'digicove'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'min' => 0,
            'step' => 0.1,
            'default' => 1.2,
            'description' => 'Default 1.2s',
            'separator' => 'after',
        ),
        array(
            'name' => 'el_title_color',
            'label' => esc_html__('Title Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-meta-box-carousel .container-custom .el--title' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'el_title_typography',
            'label' => esc_html__('Title Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-meta-box-carousel .container-custom .el--title',
        ),
        array(
            'name' => 'el_title_space_bottom',
            'label' => esc_html__('Title Bottom Spacer', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'default' => [
                'size' => 0,
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-meta-box-carousel .container-custom .el--title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'el_animate',
            'label' => esc_html__('Case Animate', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => digicove_widget_animate_v2(),
            'default' => '',
        ),
        array(
            'name' => 'el_animate_delay',
            'label' => esc_html__('Animate Delay', 'digicove' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '0',
            'description' => esc_html__( 'Enter number. Default 0ms', 'digicove'),
        ),
        array(
            'name' => 'el_animate_duration',
            'label' => esc_html__('Animation Duration', 'digicove'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'min' => 0,
            'step' => 0.1,
            'default' => 1.2,
            'description' => 'Default 1.2s',
            'separator' => 'after',
        ),
        array(
            'name' => 'contain_margin',
            'label' => esc_html__('Margin', 'digicove' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-meta-box-carousel .container-custom' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
    ),
),
array(
    'name' => 'section_style_el_title_arrow',
    'label' => esc_html__('El Item Arrows', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'condition' => [                                
        'layout' => '1',
    ],
    'controls' => array(
        array(
            'name' => 'arrows_bg',
            'label' => esc_html__('Background Arrows', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-meta-box-carousel .container-custom .wp-arrow .pxl-swiper-arrow' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'arrows_bg_hover',
            'label' => esc_html__('Background Arrows Hover', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-meta-box-carousel .container-custom .wp-arrow .pxl-swiper-arrow:hover' => 'background: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'arrows_color',
            'label' => esc_html__('Color Arrows', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-meta-box-carousel .container-custom .wp-arrow .pxl-swiper-arrow svg path' => 'fill: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'arrows_color_hover',
            'label' => esc_html__('Color Arrows Hover', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-meta-box-carousel .container-custom .wp-arrow .pxl-swiper-arrow:hover svg path' => 'fill: {{VALUE}};',
            ],
        ),
    ),
),
array(
    'name' => 'section_settings_carousel',
    'label' => esc_html__('Settings', 'digicove'),
    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
    'controls' => array(
        array(
            'name' => 'img_size',
            'label' => esc_html__('Image Size', 'digicove' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
        ),
        array(
            'name' => 'col_xs',
            'label' => esc_html__('Columns XS Devices', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '1',
            'options' => [
                'auto' => 'Auto',
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '6' => '6',
            ],
        ),
        array(
            'name' => 'col_sm',
            'label' => esc_html__('Columns SM Devices', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '2',
            'options' => [
                'auto' => 'Auto',
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '6' => '6',
            ],
        ),
        array(
            'name' => 'col_md',
            'label' => esc_html__('Columns MD Devices', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '2',
            'options' => [
                'auto' => 'Auto',
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '6' => '6',
            ],
        ),
        array(
            'name' => 'col_lg',
            'label' => esc_html__('Columns LG Devices', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '3',
            'options' => [
                'auto' => 'Auto',
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '6' => '6',
            ],
        ),
        array(
            'name' => 'col_xl',
            'label' => esc_html__('Columns XL Devices', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '4',
            'options' => [
                'auto' => 'Auto',
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
            ],
        ),
        array(
            'name' => 'col_xxl',
            'label' => esc_html__('Columns XXL Devices', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'inherit',
            'options' => [
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
                'inherit' => 'Inherit',
            ],
        ),
        array(
            'name' => 'slides_to_scroll',
            'label' => esc_html__('Slides to scroll', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '1',
            'options' => [
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
            ],
        ),
        array(
            'name' => 'item_padding',
            'label' => esc_html__('Item Padding', 'digicove' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'default' => [
                'top' => '15',
                'right' => '15',
                'bottom' => '15',
                'left' => '15'
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-container' => 'margin-top: -{{TOP}}{{UNIT}}; margin-right: -{{RIGHT}}{{UNIT}}; margin-bottom: -{{BOTTOM}}{{UNIT}}; margin-left: -{{LEFT}}{{UNIT}};',
                '{{WRAPPER}} .pxl-swiper-container .pxl-swiper-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'control_type' => 'responsive',
        ),
        array(
            'name' => 'arrows',
            'label' => esc_html__('Show Arrows', 'digicove'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
        ),
        array(
            'name' => 'pagination',
            'label' => esc_html__('Show Pagination', 'digicove'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'false',
        ),
        array(
            'name' => 'pagination_type',
            'label' => esc_html__('Pagination Type', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'bullets',
            'options' => [
                'bullets' => 'Bullets',
                'fraction' => 'Fraction',
            ],
            'condition' => [
                'pagination' => 'true'
            ]
        ),
        array(
            'name' => 'bullets_color',
            'label' => esc_html__('Bullets Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-dots .pxl-swiper-pagination-bullet:before' => 'background-color: {{VALUE}};',
                '{{WRAPPER}} .pxl-swiper-dots .pxl-swiper-pagination-bullet:after' => 'border-color: {{VALUE}};',
            ],
            'condition' => [
                'pagination_type' => 'bullets',
                'pagination' => 'true'
            ]
        ),
        array(
            'name' => 'active_bullets_color',
            'label' => esc_html__('Bullets Color Active', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-dots .swiper-pagination-bullet-active:before' => 'background-color: {{VALUE}};',
                '{{WRAPPER}} .pxl-swiper-dots .swiper-pagination-bullet-active:after' => 'border-color: {{VALUE}};',
            ],
            'condition' => [
                'pagination_type' => 'bullets',
                'pagination' => 'true'
            ]
        ),
        array(
            'name' => 'pause_on_hover',
            'label' => esc_html__('Pause on Hover', 'digicove'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
        ),
        array(
            'name' => 'center',
            'label' => esc_html__('Center', 'digicove'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'false',
            'condition' => [
                'layout' => '2',
            ]
        ),
        array(
            'name' => 'autoplay',
            'label' => esc_html__('Autoplay', 'digicove'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
        ),
        array(
            'name' => 'autoplay_speed',
            'label' => esc_html__('Autoplay Speed', 'digicove'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 5000,
            'condition' => [
                'autoplay' => 'true'
            ]
        ),
        array(
            'name' => 'infinite',
            'label' => esc_html__('Infinite Loop', 'digicove'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
        ),
        array(
            'name' => 'speed',
            'label' => esc_html__('Animation Speed', 'digicove'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 500,
        ),
    ),
),
digicove_widget_animation_settings()
),
),
),
digicove_get_class_widget_path()
);