<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_image_text',
        'title' => esc_html__('PXL Image Text', 'digicove' ),
        'icon' => 'eicon-image',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'content_section',
                    'label' => esc_html__('Content', 'digicove' ),
                    'tab' => 'content',
                    'controls' => array_merge(
                        array(
                            array(
                                'name'    => 'img_border',
                                'label'   => esc_html__( 'Border Image', 'digicove' ),
                                'type'    => 'select',
                                'default' => 'off',
                                'options' => [
                                    'off'        => esc_html__( 'Off', 'digicove' ),
                                    'on'  => esc_html__( 'On', 'digicove' ),                                    
                                ]
                            ),
                            array(
                                'name' => 'image',
                                'label' => esc_html__('Image', 'digicove' ),
                                'type' => 'media',
                            ),
                            array(
                                'name' => 'img_size',
                                'label' => esc_html__('Image Size', 'digicove' ),
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'description' =>  esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).', 'digicove')
                            ),
                            array(
                                'name' => 'img_offset_left',
                                'label' => esc_html__('Image Offset Bottom', 'digicove' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => -1000,
                                        'max' => 1000,
                                    ],
                                ],
                                'default' => [
                                    'size' => 50,
                                ],
                            ),
                            array(
                                'name' => 'text_offset_left',
                                'label' => esc_html__('Text Offset Bottom', 'digicove' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => -1000,
                                        'max' => 1000,
                                    ],
                                ],
                                'default' => [
                                    'size' => 50,
                                ],
                            ),
                            array(
                                'name' => 'img_max_width',
                                'label' => esc_html__('Image Max Width', 'digicove' ),
                                'type' => 'slider',
                                'description' => esc_html__('Enter number.', 'digicove' ),
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 1000,
                                    ],
                                ],
                                'control_type' => 'responsive',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-img-text img' => 'max-width: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'align_img',
                                'label' => esc_html__('Alignment Image', 'digicove' ),
                                'type' => \Elementor\Controls_Manager::CHOOSE,
                                'control_type' => 'responsive',
                                'options' => [
                                    'left'    => [
                                        'title' => esc_html__('Left', 'digicove' ),
                                        'icon' => 'fa fa-align-left',
                                    ],
                                    'center' => [
                                        'title' => esc_html__('Center', 'digicove' ),
                                        'icon' => 'fa fa-align-center',
                                    ],
                                    'right' => [
                                        'title' => esc_html__('Right', 'digicove' ),
                                        'icon' => 'fa fa-align-right',
                                    ],
                                ],
                                'prefix_class' => 'elementor-align-',
                                'default' => '',
                                'selectors'         => [
                                    '{{WRAPPER}} .pxl-img-text' => 'justify-content: {{VALUE}}',
                                ],
                            ),
                            array(
                                'name' => 'text_max_width',
                                'label' => esc_html__('Text Max Width', 'digicove' ),
                                'type' => 'slider',
                                'description' => esc_html__('Enter number.', 'digicove' ),
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 1500,
                                    ],
                                ],
                                'control_type' => 'responsive',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-img-text .title-outer,{{WRAPPER}} .pxl-img-text .title-inner' => 'max-width: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name'         => 'img_align',
                                'label'        => esc_html__( 'Alignment', 'digicove' ),
                                'type'         => 'choose',
                                'control_type' => 'responsive',
                                'options' => [
                                    'start' => [
                                        'title' => esc_html__( 'Start', 'digicove' ),
                                        'icon' => 'eicon-text-align-left',
                                    ],
                                    'center' => [
                                        'title' => esc_html__( 'Center', 'digicove' ),
                                        'icon' => 'eicon-text-align-center',
                                    ],
                                    'end' => [
                                        'title' => esc_html__( 'End', 'digicove' ),
                                        'icon' => 'eicon-text-align-right',
                                    ]
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-img-text' => 'justify-content: {{VALUE}};',
                                    '{{WRAPPER}} .pxl-img-text' => 'text-align: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'title',
                                'label' => esc_html__('Title', 'digicove' ),
                                'type' => 'textarea',
                            ) 
                        ),  
digicove_position_option([
    'prefix' => 'text_',
    'selectors_class' => '.pxl-img-text .title-outer, {{WRAPPER}} .pxl-img-text .title-inner',
])
),  
),
array(
    'name' => 'style_section',
    'label' => esc_html__('Style', 'digicove' ),
    'tab' => 'style',
    'controls' => array(
        array(
            'name' => 'title_outer_color',
            'label' => esc_html__('Title Outer Color', 'digicove' ),
            'type' => 'color',
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}} .pxl-img-text .title-outer' => 'color: {{VALUE}};',
            ]
        ),
        array(
            'name' => 'title_inner_color',
            'label' => esc_html__('Title Inner Color', 'digicove' ),
            'type' => 'color',
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}} .pxl-img-text .title-inner' => 'color: {{VALUE}};',
            ]
        ),
        array(
            'name' => 'title_outer_color_typography',
            'label' => esc_html__('Title Outer Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-img-text .title-outer,{{WRAPPER}} .pxl-img-text .title-inner',
        ),


    ),
),
),
),
),
digicove_get_class_widget_path()
);