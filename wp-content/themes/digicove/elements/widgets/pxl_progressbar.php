<?php
// Register Progress Bar Widget
pxl_add_custom_widget(
    array(
        'name'       => 'pxl_progressbar',
        'title'      => esc_html__( 'PXL Progress Bar', 'digicove' ),
        'icon'       => 'eicon-skill-bar',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(
            'pxl-progressbar',
            'digicove-progressbar'
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_layout',
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_progressbar/img-layout/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'digicove' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_progressbar/img-layout/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'digicove' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_progressbar/img-layout/layout3.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_content',
                    'label' => esc_html__( 'Content', 'digicove' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [                                
                        'layout' => ['2','3'],
                    ],
                    'controls' => array(
                        array(
                            'name'     => 'progressbar_list',
                            'label'    => esc_html__( 'Progress Bar Lists', 'digicove' ),
                            'type'     => 'repeater',
                            'controls' => array_merge(
                                array(
                                    array(
                                        'name'        => 'title',
                                        'label'       => esc_html__( 'Title', 'digicove' ),
                                        'type'        => 'text',
                                        'placeholder' => esc_html__( 'Enter your title', 'digicove' ),
                                        'default'     => esc_html__( 'My Skill', 'digicove' ),
                                        'label_block' => true
                                    ),
                                    array(
                                        'name'    => 'percent',
                                        'label'   => esc_html__( 'Percentage', 'digicove' ),
                                        'type'    => 'slider',
                                        'default' => [
                                            'size' => 50,
                                            'unit' => '%',
                                        ],
                                        'label_block' => true
                                    ),
                                    array(
                                        'name' => 'item_bar_color',
                                        'label' => esc_html__( 'Bar Background Color', 'digicove' ),
                                        'type' => \Elementor\Controls_Manager::COLOR,
                                        'selectors' => [
                                            '{{WRAPPER}} {{CURRENT_ITEM}} .pxl-progress-bar' => 'background-color: {{VALUE}}',
                                        ],
                                    ),

                                )
                            ),
                            'title_field' => '{{title}}'
                        ),
                        array(
                            'name' => 'item_space',
                            'label' => esc_html__('Item Spacer', 'digicove' ),
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
                                '{{WRAPPER}} .pxl-progressbar .progress-item + .progress-item' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name'     => 'source_section',
                    'label'    => esc_html__( 'Source Settings', 'digicove' ),
                    'tab'      => 'content',
                    'condition' => [                                
                        'layout' => '1',
                    ],
                    'controls' => array(
                        array(
                            'name'    => 'style',
                            'label'   => esc_html__( 'Style', 'digicove' ),
                            'type'    => 'select',
                            'default' => 'default',
                            'options' => [
                                'default'        => esc_html__( 'Default', 'digicove' ),
                                'style2'  => esc_html__( 'Style2', 'digicove' ),                                
                            ]
                        ),
                        array(
                            'name' => 'circle_size',
                            'label'     => esc_html__( 'Size', 'digicove' ),
                            'type'      => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'range'     => array(
                                'px' => array(
                                    'min'  => 50,
                                    'max'  => 500,
                                    'step' => 1,
                                ),
                            ),
                            'default'   => array(
                                'size' => 174,
                            ),
                            'selectors' => array(
                                '{{WRAPPER}} .pxl-progressbar-inner' => 'width: {{SIZE}}px; height: {{SIZE}}px',
                            ),
                        ),
                        array(
                            'name' => 'circle_size_max',
                            'label'     => esc_html__( 'Max Width', 'digicove' ),
                            'type'      => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'range'     => array(
                                'px' => array(
                                    'min'  => 50,
                                    'max'  => 500,
                                    'step' => 1,
                                ),
                            ),
                            'selectors' => array(
                                '{{WRAPPER}} .pxl-progressbar-inner' => 'min-width: {{SIZE}}px;',
                            ),
                        ),
                        array(
                            'name'    => 'circle_percent',
                            'label'   => esc_html__( 'Percentage', 'digicove' ),
                            'type'    => 'slider',
                            'default' => [
                                'size' => 50,
                                'unit' => '%',
                            ],
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'circle_speed',
                            'label' => esc_html__('Speed (milliseconds)', 'digicove'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                        ),
                        array(
                            'name'        => 'circle_title',
                            'label'       => esc_html__( 'Title', 'digicove' ),
                            'type'        => 'text',
                            'placeholder' => esc_html__( 'Enter your title', 'digicove' ),
                            'default'     => esc_html__( 'On-page optimization', 'digicove' ),
                            'label_block' => true,
                        ),
                        array(
                            'name'        => 'circle_content',
                            'label'       => esc_html__( 'Content', 'digicove' ),
                            'type'        => 'text',
                            'placeholder' => esc_html__( 'Enter your Content', 'digicove' ),
                            'default'     => esc_html__( 'The ability to optimize website content, meta tags, images, and other elements to improve search engine rankings.', 'digicove' ),
                            'label_block' => true,
                            'condition' => [                                
                                'style' => 'default',
                            ],
                        ),
                        array(
                            'name' => 'circle_number',
                            'label' => esc_html__('Number Value', 'digicove'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 50,
                        ),
                        array(
                            'name' => 'prefix',
                            'label' => esc_html__('Number Prefix', 'digicove'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                        ),
                        array(
                            'name' => 'suffix',
                            'label' => esc_html__('Number Suffix', 'digicove'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                        ),
                        
                    )
),
array(
    'name' => 'section_title_2',
    'label' => esc_html__( 'Style', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'condition' => [                                
        'layout' => '1',
    ],                   
    'controls' => array_merge(
        array(
            array(
                'name' => 'title_color',
                'label' => esc_html__( 'Title Color', 'digicove' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-progressbar .progress-title' => 'color: {{VALUE}};',
                ],
            ),
            array(
                'name' => 'typography',
                'label' => esc_html__( 'Title Typography', 'digicove' ),
                'type' => \Elementor\Group_Control_Typography::get_type(),
                'control_type' => 'group',
                'selector' => '{{WRAPPER}} .pxl-progressbar .progress-title',
            ),
            array(
                'name' => 'dec_color',
                'label' => esc_html__( 'Dec Color', 'digicove' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-progressbar .progress-content' => 'color: {{VALUE}};',
                ],
            ),
            array(
                'name' => 'dec_typography',
                'label' => esc_html__( 'Dec Typography', 'digicove' ),
                'type' => \Elementor\Group_Control_Typography::get_type(),
                'control_type' => 'group',
                'selector' => '{{WRAPPER}} .pxl-progressbar .progress-content',
            ),
            array(
                'name' => 'percent_color',
                'label' => esc_html__( 'Percentage Color', 'digicove' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-progressbar .progress-percentage' => 'color: {{VALUE}};',
                ],
            ),
            array(
                'name' => 'percentage_typography',
                'label' => esc_html__( 'Percentage Typography', 'digicove' ),
                'type' => \Elementor\Group_Control_Typography::get_type(),
                'control_type' => 'group',
                'selector' => '{{WRAPPER}} .pxl-progressbar .progress-percentage',
            ),
            array(
                'name' => 'bound_color',
                'label' => esc_html__( 'Bound Background Color', 'digicove' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-progressbar .svg1 .progress-bar__progress' => 'stroke: {{VALUE}};',
                ],
            ),
            array(
                'name'         => 'box_shadow',
                'label' => esc_html__( 'Box Shadow', 'digicove' ),
                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                'control_type' => 'group',
                'selector'     => '{{WRAPPER}} .pxl-progressbar .pxl-progressbar-circle'
            ),
            array(
                'name' => 'bar_color',
                'label' => esc_html__( 'Bar Background Color', 'digicove' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-progressbar .svg2 .progress-bar__progress' => 'stroke: {{VALUE}};',
                ],
            ),
            array(
                'name' => 'bar_color_linear',
                'label' => esc_html__( 'Bar Background Linear', 'digicove' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'true',
            ),
            array(
                'name' => 'bar_color_one',
                'label' => esc_html__( 'Bar Background Color One', 'digicove' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-progressbar .stop1' => 'stop-color: {{VALUE}} !important;',
                ],
                'condition' => [
                    'bar_color_linear' => 'true'
                ]
            ),
            array(
                'name' => 'bar_color_two',
                'label' => esc_html__( 'Bar Background Color Two', 'digicove' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-progressbar .stop2' => 'stop-color: {{VALUE}} !important;',
                ],
                'condition' => [
                    'bar_color_linear' => 'true'
                ]
            ),
        ),
),
),
array(
    'name' => 'section_title',
    'label' => esc_html__( 'Style', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'condition' => [                                
        'layout' => ['2','3'],
    ],
    'controls' => array_merge(
        array(
            array(
                'name' => 'title_color2',
                'label' => esc_html__( 'Title Color', 'digicove' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-progressbar .progress-title' => 'color: {{VALUE}};',
                ],
            ),
            array(
                'name' => 'typography2',
                'label' => esc_html__( 'Title Typography', 'digicove' ),
                'type' => \Elementor\Group_Control_Typography::get_type(),
                'control_type' => 'group',
                'selector' => '{{WRAPPER}} .pxl-progressbar .progress-title',
            ),
            array(
                'name' => 'percent_color2',
                'label' => esc_html__( 'Percentage Color', 'digicove' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-progressbar .progress-percentage' => 'color: {{VALUE}};',
                ],
            ),
            array(
                'name' => 'percentage_typography2',
                'label' => esc_html__( 'Percentage Typography', 'digicove' ),
                'type' => \Elementor\Group_Control_Typography::get_type(),
                'control_type' => 'group',
                'selector' => '{{WRAPPER}} .pxl-progressbar .progress-percentage',
            ),
            array(
                'name' => 'bound_color2',
                'label' => esc_html__( 'Bound Background Color', 'digicove' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-progressbar .progress-bound' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .pxl-progressbar-circle-base' => 'border-color: {{VALUE}};',
                ],
            ),
            array(
                'name' => 'bar_color2',
                'label' => esc_html__( 'Bar Background Color', 'digicove' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-progressbar .pxl-progress-bar' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .pxl-progressbar-circle div' => 'border-color: {{VALUE}};',
                ],
            ),
            array(
                'name'         => 'item_bar_gradient',
                'label' => esc_html__( 'Background Type', 'digicove' ),
                'type'         => \Elementor\Group_Control_Background::get_type(),
                'control_type' => 'group',
                'types' => [ 'gradient' ],
                'selector'     => '{{WRAPPER}} .pxl-progress-bar,{{WRAPPER}} .progress-item .progress-percentage',
            ),
            array(
                'name'         => 'item_bar_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'digicove' ),
                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                'control_type' => 'group',
                'selector'     => '{{WRAPPER}} .pxl-progress-bar'
            ),
            array(
                'name' => 'bar_height',
                'label' => esc_html__('Bar height', 'digicove' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'control_type' => 'responsive',
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .pxl-progressbar .progress-bar-wrap .progress-bound, {{WRAPPER}} .pxl-progressbar .pxl-progress-bar' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ),
            array(
                'name' => 'item_gap',
                'label' => esc_html__('Item Spacer Between', 'digicove' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'control_type' => 'responsive',
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .pxl-progressbar .progress-item' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ),
            array(
                'name' => 'space_bottom2',
                'label' => esc_html__('Item Bottom Space (px)', 'digicove' ),
                'type' => 'slider',
                'description' => esc_html__('Enter number.', 'digicove' ),
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
                'default'    => [
                    'unit' => 'px'
                ],
                'control_type' => 'responsive',
                'selectors' => [
                    '{{WRAPPER}} .pxl-progressbar .progress-item + .progress-item' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [                                
                    'layout' => '2',
                ],
            ),
        ),
),
),

)
)
),
digicove_get_class_widget_path()
);