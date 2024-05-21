<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_team_carousel',
        'title' => esc_html__('PXL Team Carousel', 'digicove'),
        'icon' => 'eicon-posts-carousel',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'digicove-swiper',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'layout_section',
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_team_carousel/img-layout/layout1.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_list',
                    'label' => esc_html__('Content', 'digicove'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'content_list',
                            'label' => esc_html__('Team List', 'digicove'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'digicove' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'digicove'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'position',
                                    'label' => esc_html__('Position', 'digicove'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'digicove'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'social',
                                    'label' => esc_html__( 'Social', 'digicove' ),
                                    'type' => 'pxl_icons',
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'style_section',
                    'label' => esc_html__('Style', 'digicove' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Hover Image Effect', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-circle' => 'Circle',
                                'style-overlay' => 'Overlay',
                                'none' => 'None',
                            ],
                            'default' => 'style-circle',
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_color_active',
                            'label' => esc_html__('Title Color Active', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner:hover .pxl-item--meta .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'digicove' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-team-carousel .pxl-item--title',
                        ),
                        array(
                            'name' => 'content_color',
                            'label' => esc_html__('Content Color', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--position' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'content_color_active',
                            'label' => esc_html__('Content Color Active', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner:hover .pxl-item--meta .pxl-item--position' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'content_typography',
                            'label' => esc_html__('Content Typography', 'digicove' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-team-carousel .pxl-item--position',
                        ),
                        array(
                            'name' => 'css_filters',
                            'label' => esc_html__('CSS Filters', 'digicove' ),
                            'type' => \Elementor\Group_Control_Css_Filter::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-team-carousel .item-image img',
                        ),
                        array(
                            'name'         => 'btn_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'digicove' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-team-carousel .item--meta-plus'
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team-carousel .item--meta-plus svg path' => 'fill: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_color_link',
                            'label' => esc_html__('Icon Color Link', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--social a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_color_active',
                            'label' => esc_html__('Icon Color Active', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner:hover .pxl-item--meta .item--meta-plus svg path' => 'fill: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_background',
                            'label' => esc_html__('Icon Background', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team-carousel .item--meta-plus' => 'background: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_background_active',
                            'label' => esc_html__('Icon Background Active', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner:hover .pxl-item--meta .item--meta-plus' => 'background: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_radius',
                            'label' => esc_html__('Box Radius', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--meta' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'background_active',
                            'label' => esc_html__('Box Background Active', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner:hover .pxl-item--meta' => 'background: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name'         => 'box_gradient',
                            'label' => esc_html__( 'Background Type', 'digicove' ),
                            'type'         => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'gradient' ],
                            'selector'     => '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner:hover .pxl-item--meta',
                        ),
                    ),
),
array(
    'name' => 'section_carousel_settings',
    'label' => esc_html__('Carousel Settings', 'digicove'),
    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
    'controls' => array_merge(
        array(
            array(
                'name' => 'img_size',
                'label' => esc_html__('Image Size', 'digicove' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'description' =>  esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).', 'digicove')
            ), 
            array(
                'name' => 'item_padding',
                'label' => esc_html__('Item Padding', 'digicove' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'default' => [
                    'top' => '10',
                    'right' => '10',
                    'bottom' => '10',
                    'left' => '10'
                ],
                'selectors' => [
                    '{{WRAPPER}} .pxl-swiper-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'control_type' => 'responsive',
            ),
        ), 
        digicove_carousel_column_settings(),
        array( 
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
                'name' => 'arrows',
                'label' => esc_html__('Show Arrows', 'digicove'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
            ),
            array(
                'name' => 'arrows_on_hover',
                'label' => esc_html__('Show Arrows on Hover', 'digicove'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'false',
                'condition' => [
                    'arrows' => 'true'
                ]
            ),
            array(
                'name' => 'dots',
                'label' => esc_html__('Show Dots', 'digicove'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
            ),
            array(
                'name' => 'pause_on_hover',
                'label' => esc_html__('Pause on Hover', 'digicove'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
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
                'name'         => 'gutter',
                'label'        => esc_html__('Gutter', 'digicove' ),
                'type'         => 'number'
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
        digicove_elementor_animation_opts([
            'name'   => 'item',
            'label' => esc_html__('Content', 'digicove'),
            'condition'   => ['layout' => '2'],
        ])
    ),
),
),
),
),
digicove_get_class_widget_path()
);