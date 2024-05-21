<?php
// Register Quick Contact Widget
pxl_add_custom_widget(
    array(
      'name'       => 'pxl_contact_info',
      'title'      => esc_html__( 'PXL Contact Info', 'digicove' ),
      'icon'       => 'eicon-mail',
      'categories' => array('pxltheme-core'),
      'scripts'    => [],
      'params'     => array(
        'sections' => array(                
            array(
             'name'     => 'content_section',
             'label'    => esc_html__( 'Content Settings', 'digicove' ),
             'tab'      => 'content',
             'controls' => array(
                array(
                    'name'        => 'heading_text',
                    'label'       => esc_html__( 'Heading', 'digicove' ),
                    'type'        => 'text',
                    'placeholder' => esc_html__( 'Enter Heading', 'digicove' ),
                    'default'     => 'Office address',    
                    'label_block' => true
                ),
                array(
                    'name'        => 'desc',
                    'label'       => esc_html__( 'Description', 'digicove' ),
                    'type'        => 'textarea',
                    'placeholder' => esc_html__( 'Enter Description', 'digicove' ),
                    'default'     => 'Level 30 130 Lonsdale Street Melbourne VIC 3000 Australia',  
                    'label_block' => true
                ),
                array(
                    'name' => 'style',
                    'label' => esc_html__('Style', 'digicove' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'style1' => 'Default',
                        'style2' => 'Style 2',
                    ],
                    'default' => 'style1',
                ),
                array(
                    'name' => 'icons',
                    'label' => esc_html__('Icons', 'digicove'),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'controls' => array(
                        array(
                            'name' => 'icon_type',
                            'label' => esc_html__('Type', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'icon' => esc_html__( 'Icon', 'digicove' ),
                                'image' => esc_html__( 'Image', 'digicove' ),
                            ],
                            'default' => 'icon',
                        ),
                        array(
                            'name' => 'icon_image',
                            'label' => esc_html__( 'Image', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'icon_type' => 'image',
                            ],
                        ),
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'icon_type' => 'icon',
                            ],
                        ),
                        array(
                            'name' => 'icon_link',
                            'label' => esc_html__('Link', 'digicove'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'label_block' => true,
                        ),
                    ),
                ),
                array(
                    'name' => 'map_img',
                    'label' => esc_html__('Map Image', 'digicove' ),
                    'type' => 'media',
                    'condition' => [
                        'style' => 'style1',
                    ],
                ),
                array(
                    'name' => 'map_iframe',
                    'label' => esc_html__('Map Iframe', 'digicove' ),
                    'type' => 'textarea',
                    'condition' => [
                        'style' => 'style1',
                    ],
                ),
                array(
                    'name'  => 'image_width',
                    'label' => esc_html__( 'Lightbox Width', 'digicove' ),
                    'type'  => 'slider',
                    'control_type' => 'responsive',
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 800,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 320,
                    ],
                    'selectors' => [
                      '{{WRAPPER}} .pxl-map-wrap' => 'width: {{SIZE}}{{UNIT}};',
                  ],
                  'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        ['name' => 'map_img[url]', 'operator' => '!=', 'value' => ''],
                        ['name' => 'map_iframe', 'operator' => '!=', 'value' => ''],
                    ],
                ],
            ),
                array(
                    'name'  => 'image_height',
                    'label' => esc_html__( 'Lightbox Height', 'digicove' ),
                    'type'  => 'slider',
                    'control_type' => 'responsive',
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 800,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 320,
                    ],
                    'selectors' => [
                      '{{WRAPPER}} .pxl-map-wrap' => 'height: {{SIZE}}{{UNIT}};',
                  ],
                  'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        ['name' => 'map_img[url]', 'operator' => '!=', 'value' => ''],
                        ['name' => 'map_iframe', 'operator' => '!=', 'value' => ''],
                    ],
                ],
            ),
                array(
                    'name'      => 'show_popup',
                    'label'     => esc_html__('Click Show Popup', 'digicove' ),
                    'type'      => \Elementor\Controls_Manager::SWITCHER,
                    'default'   => 'true',
                    'conditions' => [
                        'relation' => 'or',
                        'terms' => [
                            ['name' => 'map_img[url]', 'operator' => '!=', 'value' => ''],
                            ['name' => 'map_iframe', 'operator' => '!=', 'value' => ''],
                        ],
                    ],
                ),
                array(
                    'name' => 'css_filters',
                    'label' => esc_html__('CSS Map Filters', 'digicove' ),
                    'type' => \Elementor\Group_Control_Css_Filter::get_type(),
                    'control_type' => 'group',
                    'selector' => '{{WRAPPER}} .pxl-map-wrap',
                    'conditions' => [
                        'relation' => 'or',
                        'terms' => [
                            ['name' => 'map_img[url]', 'operator' => '!=', 'value' => ''],
                            ['name' => 'map_iframe', 'operator' => '!=', 'value' => ''],
                        ],
                    ],
                ),
            )
),
array(
    'name' => 'qc_style',
    'label' => esc_html__('Style', 'digicove'),
    'tab' => 'style',
    'controls' => array(
        array(
            'name' => 'color_item',
            'label' => esc_html__( 'Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-ci-wrap .ci-icon i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .pxl-ci-wrap .ci-icon svg path' => 'fill: {{VALUE}};',
            ],
        ),
        array(
            'name'         => 'bg_color_item',
            'label' => esc_html__( 'Background Type', 'digicove' ),
            'type'         => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types' => [ 'gradient' ],
            'selector'     => '{{WRAPPER}} .pxl-ci-wrap .ci-icon::after',
        ),
        array(
            'name'         => 'bg_icon_shadow',
            'label' => esc_html__( 'Box Shadow', 'digicove' ),
            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
            'control_type' => 'group',
            'selector'     => '{{WRAPPER}} .pxl-ci-wrap .ci-icon::after'
        ),
        array(
            'name'  => 'max_width',
            'label' => esc_html__( 'Max Width', 'digicove' ),
            'type'  => 'slider',
            'control_type' => 'responsive',
            'range' => [
                'px' => [
                    'min' => 100,
                    'max' => 800,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-ci-wrap' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name'         => 'ci_align',
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
                '{{WRAPPER}} .pxl-ci-wrap' => 'text-align: {{VALUE}};',
            ],
        ),

        array(
            'name' => 'heading_text_color',
            'label' => esc_html__('Heading Color', 'digicove' ),
            'type' => 'color',
            'selectors' => [
                '{{WRAPPER}} .ci-title' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'desc_text_color',
            'label' => esc_html__('Content item Color', 'digicove' ),
            'type' => 'color',
            'selectors' => [
                '{{WRAPPER}} .ci-desc' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ci-desc a' => 'color: {{VALUE}};',
            ],
        ), 

        array(
            'name' => 'heading_typography',
            'label' => esc_html__('Heading Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-ci-wrap .ci-content .ci-title',
        ),
        array(
            'name' => 'desc_typography',
            'label' => esc_html__('Description Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-ci-wrap .ci-content .ci-desc',
        ),

    ),
),
)
)
),
digicove_get_class_widget_path()
);