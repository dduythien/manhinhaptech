<?php
$pt_supports = ['post','case','service'];
pxl_add_custom_widget(
    array(
        'name' => 'pxl_post_carousel',
        'title' => esc_html__('Post Carousel Pxl', 'digicove' ),
        'icon' => 'eicon-posts-carousel',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'digicove' ),
                    'tab'      => 'layout',
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'post_type',
                                'label'    => esc_html__( 'Select Post Type', 'digicove' ),
                                'type'     => 'select',
                                'multiple' => true,
                                'options'  => digicove_get_post_type_options($pt_supports),
                                'default'  => 'post'
                            ) 
                        ),
                        digicove_get_post_carousel_layout($pt_supports)
                    ),
                ),
                array(
                    'name' => 'section_header',
                    'label' => esc_html__('Item Title', 'digicove' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'conditions' => [
                        'relation' => 'or',
                        'terms' => [
                            [
                                'terms' => [
                                    ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                    ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                                ]
                            ],
                            [
                                'terms' => [
                                    ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                    ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1']]
                                ]
                            ]
                        ],
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
                                '{{WRAPPER}} .pxl-service-carousel .container-custom .el--title, {{WRAPPER}} .pxl-post-carousel1 .container-custom .el--title' => 'max-width: {{SIZE}}{{UNIT}};',                                
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
                            '{{WRAPPER}} .pxl-service-carousel .wp-title, {{WRAPPER}} .pxl-post-carousel1 .wp-title' => 'text-align: {{VALUE}};',                            
                        ],
                    )
                    ),
),
array(
    'name' => 'section_source',
    'label' => esc_html__('Source', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
    'controls' => array_merge(
        array(
            array(
                'name'     => 'select_post_by',
                'label'    => esc_html__( 'Select posts by', 'digicove' ),
                'type'     => 'select',
                'multiple' => true,
                'options'  => [
                    'term_selected' => esc_html__( 'Terms selected', 'digicove' ),
                    'post_selected' => esc_html__( 'Posts selected ', 'digicove' ),
                ],
                'default'  => 'term_selected'
            ) 
        ),
        digicove_get_grid_term_by_posttype($pt_supports, ['custom_condition' => ['select_post_by' => 'term_selected']]),
        digicove_get_grid_ids_by_posttype($pt_supports, ['custom_condition' => ['select_post_by' => 'post_selected']]),
        array(
            array(
                'name' => 'orderby',
                'label' => esc_html__('Order By', 'digicove' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'date' => esc_html__('Date', 'digicove' ),
                    'ID' => esc_html__('ID', 'digicove' ),
                    'author' => esc_html__('Author', 'digicove' ),
                    'title' => esc_html__('Title', 'digicove' ),
                    'rand' => esc_html__('Random', 'digicove' ),
                ],
            ),
            array(
                'name' => 'order',
                'label' => esc_html__('Sort Order', 'digicove' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'desc',
                'options' => [
                    'desc' => esc_html__('Descending', 'digicove' ),
                    'asc' => esc_html__('Ascending', 'digicove' ),
                ],
            ),
            array(
                'name' => 'limit',
                'label' => esc_html__('Total items', 'digicove' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => '6',
            ),
        )
    ),
),
array(
    'name' => 'section_carousel',
    'label' => esc_html__('Carousel', 'digicove'),
    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
    'controls' => array(
        array(
            'name' => 'pxl_animate',
            'label' => esc_html__('Digicove Animate', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => digicove_widget_animate(),
            'default' => '',
        ),
        array(
            'name' => 'col_xs',
            'label' => esc_html__('Columns XS Devices', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '1',
            'options' => [
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
            'default' => '3',
            'options' => [
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
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
            ],
        ),
        array(
            'name' => 'col_xl',
            'label' => esc_html__('Columns XL Devices', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '3',
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
            'name' => 'item_padding_post',
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
            'default' => 'false',
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
            'name' => 'pause_on_hover',
            'label' => esc_html__('Pause on Hover', 'digicove'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
        ),
        array(
            'name' => 'center',
            'label' => esc_html__('Center', 'digicove'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'false',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1']]
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'autoplay',
            'label' => esc_html__('Autoplay', 'digicove'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'false',
        ),
        array(
            'name' => 'autoplay_speed',
            'label' => esc_html__('Autoplay Speed', 'digicove'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 5000,
            'condition' => [
                'autoplay' => 'false'
            ]
        ),
        array(
            'name' => 'infinite',
            'label' => esc_html__('Infinite Loop', 'digicove'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
        ),
        array(
            'name' => 'speed',
            'label' => esc_html__('Animation Speed', 'digicove'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 500,
        ),
    ),
),
array(
    'name' => 'section_display',
    'label' => esc_html__('Display', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
    'controls' => array(
        array(
            'name' => 'img_size',
            'label' => esc_html__('Image Size', 'digicove' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
        ),
        array(
            'name' => 'show_client',
            'label' => esc_html__('Show Client', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
            'condition' => [
                'post_type' => ['case'],
                'layout_case' => ['case-1'],
            ],
        ),
        array(
            'name' => 'author_linear__check',
            'label' => esc_html__('Author Gradient', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                        ]
                    ],                    
                ],
            ],
            'default' => 'false',            
        ),
        array(
            'name'         => 'author_gradient',
            'label' => esc_html__( 'Background Type', 'digicove' ),
            'type'         => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types' => [ 'gradient' ],
            'selector'     => '{{WRAPPER}} .pxl-post-carousel1 .pxl-item--inner .item--meta .item--author a',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                        ]
                    ],                    
                ],
            ]
        ),
        array(
            'name' => 'image_border_radius',
            'label' => esc_html__('Image Border Radius', 'digicove' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-post-carousel1 .pxl-item--inner .item--featured' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                        ]
                    ],                    
                ],
            ]
        ),
        array(
            'name' => 'show_button',
            'label' => esc_html__('Show Button Readmore', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1','post-2','post-3']]
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1']]
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'show_excerpt',
            'label' => esc_html__('Show Excerpt', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'case'],
                            ['name' => 'layout_case', 'operator' => 'in', 'value' => ['case-2']]                            
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1']]
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'num_words',
            'label' => esc_html__('Number of Words', 'digicove' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 25,
            'separator' => 'after',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']],
                            ['name' => 'show_excerpt', 'operator' => 'in', 'value' => ['true']]
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'case'],
                            ['name' => 'layout_case', 'operator' => 'in', 'value' => ['case-2']],
                            ['name' => 'show_excerpt', 'operator' => 'in', 'value' => ['true']]                            
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1']],
                            ['name' => 'show_excerpt', 'operator' => 'in', 'value' => ['true']]
                        ]
                    ]
                ],
            ]
        ),
    ),
),
array(
    'name' => 'tab_style_general',
    'label' => esc_html__('General', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'condition' => [
        'post_type' => ['post'],
        'layout_post' => ['post-1', 'post-2'],
    ],
    'controls' => array(
        array(
            'name' => 'post_title_color',
            'label' => esc_html__('Title Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-post-carousel .pxl-item--inner .item--title a' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'post_type' => ['post'],
                'layout_post' => ['post-1', 'post-2'],
            ],
        ),
        array(
            'name' => 'post_title_typography',
            'label' => esc_html__('Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-post-carousel .pxl-item--inner .item--title',
            'condition' => [
                'post_type' => ['post'],
                'layout_post' => ['post-1', 'post-2', 'post-3'],
            ],
        ),
        array(
            'name'         => 'box_shadow',
            'label' => esc_html__( 'Box Shadow', 'digicove' ),
            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
            'control_type' => 'group',
            'selector'     => '{{WRAPPER}} .pxl-post-carousel .pxl-item--inner .item--holder'
        ),
        array(
            'name' => 'item_padding',
            'label' => esc_html__('Item Padding', 'digicove' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-post-carousel .pxl-item--inner .item--holder' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'control_type' => 'responsive',
        ),
        array(
            'name' => 'post-author',
            'label' => esc_html__('Author Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-post-carousel .pxl-item--inner .item--author a' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'post_type' => ['post'],
                'layout_post' => ['post-1', 'post-2'],
            ],
        ),
        array(
            'name' => 'background_color',
            'label' => esc_html__('background Box', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-post-carousel .pxl-item--inner .item--holder' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'post_type' => ['post'],
                'layout_post' => ['post-1', 'post-2'],
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
            'selectors' => [
                '{{WRAPPER}} .pxl-post-carousel .pxl-item--inner .item--holder' => 'border-style: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'border_width',
            'label' => esc_html__( 'Border Width', 'digicove' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'selectors' => [
                '{{WRAPPER}} .pxl-post-carousel .pxl-item--inner .item--holder' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
            'condition' => [
                'border_type!' => '',
            ],
            'responsive' => true,
        ),
        array(
            'name' => 'border_color',
            'label' => esc_html__( 'Border Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-post-carousel .pxl-item--inner .item--holder' => 'border-color: {{VALUE}} !important;',
            ],
            'condition' => [
                'border_type!' => '',
            ],
        ),
    ),
),
array(
    'name' => 'tab_style_general_case',
    'label' => esc_html__('General', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'condition' => [
        'post_type' => ['case'],
        'layout_case' => ['case-1', 'case-2'],
    ],
    'controls' => array(
        array(
            'name'         => 'box_case_gradient',
            'label' => esc_html__( 'Background Type', 'digicove' ),
            'type'         => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types' => [ 'gradient' ],
            'selector'     => '{{WRAPPER}} .pxl-case-carousel .pxl-item--inner .item--holder',
        ),
        array(
            'name' => 'case_title_color',
            'label' => esc_html__('Title Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-case-carousel .pxl-item--inner .item--title a,{{WRAPPER}} .pxl-case-carousel .pxl-item--inner .item--title' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'post_type' => ['case'],
                'layout_case' => ['case-1', 'case-2'],
            ],
        ),
        array(
            'name' => 'case_title_typography',
            'label' => esc_html__('Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-case-carousel .pxl-item--inner .item--title',
            'condition' => [
                'post_type' => ['case'],
                'layout_case' => ['case-1', 'case-2', 'case-3'],
            ],
        ),
        array(
            'name' => 'case_sub_title_color',
            'label' => esc_html__('Sub Title Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-case-carousel .pxl-item--inner label' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'post_type' => ['case'],
                'layout_case' => ['case-1', 'case-2'],
            ],
        ),
        array(
            'name' => 'case_sub_title_typography',
            'label' => esc_html__(' SubTypography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-case-carousel .pxl-item--inner label',
            'condition' => [
                'post_type' => ['case'],
                'layout_case' => ['case-1', 'case-2', 'case-3'],
            ],
        ),
        array(
            'name' => 'case_animate',
            'label' => esc_html__('Case Animate', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => digicove_widget_animate_v2(),
            'default' => '',
        ),
        array(
            'name' => 'case_animate_delay',
            'label' => esc_html__('Animate Delay', 'digicove' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '0',
            'description' => esc_html__( 'Enter number. Default 0ms', 'digicove'),
        ),
        array(
            'name' => 'case_animate_duration',
            'label' => esc_html__('Animation Duration', 'digicove'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'min' => 0,
            'step' => 0.1,
            'default' => 1.2,
            'description' => 'Default 1.2s',
            'separator' => 'after',
        ),
    ),
),
array(
    'name' => 'tab_style_category_service',
    'label' => esc_html__('Services', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'condition' => [
        'post_type' => ['service'],
        'layout_service' => ['service-3'],
    ],
    'controls' => array(
        array(
            'name' => 'title_sv_color',
            'label' => esc_html__('Clients Title Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-service-carousel3 .pxl-item--title a' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_sv_color_hover',
            'label' => esc_html__('Clients Title Color Hover', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-service-carousel3 .pxl-item--inner:hover .pxl-item--title a' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_sv_typography',
            'label' => esc_html__('Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-service-carousel3 .pxl-item--title',
        ),
        array(
            'name' => 'content_sv_color',
            'label' => esc_html__('Sub Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-service-carousel3 .pxl-item--subtitle' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'content_sv_color_hover',
            'label' => esc_html__('Sub Hover Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-service-carousel3 .pxl-item--inner:hover .pxl-item--subtitle' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'category_sv_typography',
            'label' => esc_html__('Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-service-carousel3 .pxl-item--subtitle',
        ),
        array(
            'name' => 'button_sv_color',
            'label' => esc_html__('Background Button', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-service-carousel3 .item-readmore' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'button_sv_color_icon',
            'label' => esc_html__('Button Icon', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-service-carousel3 .item-readmore svg path' => 'fill: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'box_sv_color_after',
            'label' => esc_html__('Background After', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-service-carousel3 .pxl-item--inner::after' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name'         => 'box_gradient',
            'label' => esc_html__( 'Background Type', 'digicove' ),
            'type'         => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types' => [ 'gradient' ],
            'selector'     => '{{WRAPPER}} .pxl-service-carousel3 .pxl-item--inner::before',
        ),
    ),
),
array(
    'name' => 'tab_style_general_service',
    'label' => esc_html__('General', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'condition' => [
        'post_type' => ['service'],
    ],
    'controls' => array(
        array(
            'name' => 'after_service_mix',
            'label' => esc_html__('Mix blend mode', 'digicove' ),
            'type' => 'select',
            'default' => 'normal',
            'options' => [
                'normal' => esc_html__('normal', 'digicove' ),
                'multiply' => esc_html__('multiply', 'digicove' ),
            ],
        ),
        array(
            'name'         => 'after_service_gradient',
            'label' => esc_html__( 'Background Type', 'digicove' ),
            'type'         => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types' => [ 'gradient' ],
            'selector'     => '{{WRAPPER}} .pxl-service-carousel .pxl-item--inner::after',
            'condition' => [
                'post_type' => ['service'],
                'layout_service' => ['service-1'],
            ],
        ),
        array(
            'name'         => 'after_service2_gradient',
            'label' => esc_html__( 'Background Type', 'digicove' ),
            'type'         => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types' => [ 'gradient' ],
            'selector'     => '{{WRAPPER}} .pxl-service-carousel .pxl-item--inner .pxl-item--holder',
            'condition' => [
                'post_type' => ['service'],
                'layout_service' => ['service-2'],
            ],
        ),
        array(
            'name'         => 'image_service2_gradient',
            'label' => esc_html__( 'Background Type', 'digicove' ),
            'type'         => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types' => [ 'gradient' ],
            'selector'     => '{{WRAPPER}} .pxl-service-carousel .pxl-item--inner .pxl-item--holder .pxl--image::after',
            'condition' => [
                'post_type' => ['service'],
                'layout_service' => ['service-2'],
            ],
        ),
        array(
            'name'         => 'box_service_gradient',
            'label' => esc_html__( 'Background Type', 'digicove' ),
            'type'         => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types' => [ 'gradient' ],
            'selector'     => '{{WRAPPER}} .pxl-service-carousel .pxl-item--inner .pxl-item--title::after',
            'condition' => [
                'post_type' => ['service'],
                'layout_service' => ['service-1'],
            ],
        ),
        array(
            'name'         => 'dec_service_gradient',
            'label' => esc_html__( 'Background Type', 'digicove' ),
            'type'         => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types' => [ 'gradient' ],
            'selector'     => '{{WRAPPER}} .pxl-service-carousel .pxl-item--inner .pxl-item--description',
            'condition' => [
                'post_type' => ['service'],
                'layout_service' => ['service-1'],
            ],
        ),
        array(
            'name' => 'service_background_color_box',
            'label' => esc_html__('Background Box', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-service-carousel .pxl-item--inner .pxl-item--holder::after' => 'background: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'icon_background_color_button',
            'label' => esc_html__('Background Icon', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-service-carousel .pxl-item--inner .pxl-item--holder .pxl-item--icon' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'icon_background_color_button_hover',
            'label' => esc_html__('Background Icon Hover', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-service-carousel .pxl-item--inner .pxl-item--holder:hover .pxl-item--icon' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'icon_color_button_hover',
            'label' => esc_html__('Icon Background Hover', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-service-carousel .pxl-item--inner .pxl-item--holder:hover .pxl-item--icon' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'icon_color',
            'label' => esc_html__('Icon Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-service-carousel .pxl-item--inner .pxl-item--holder .pxl-item--icon i' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'icon_color_hover',
            'label' => esc_html__('Icon Color Hover', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-service-carousel .pxl-item--inner .pxl-item--holder:hover .pxl-item--icon i' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'service_background_color_button',
            'label' => esc_html__('Background Button', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-service-carousel .pxl-item--inner .item-readmore::after' => 'background: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'service_title_color',
            'label' => esc_html__('Title Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-service-carousel .pxl-item--inner .pxl-item--title a,{{WRAPPER}} .pxl-service-carousel .pxl-item--inner .pxl-item--title' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'post_type' => ['service'],
                'layout_service' => ['service-1', 'service-2'],
            ],
        ),
        array(
            'name' => 'service_title_color_hover',
            'label' => esc_html__('Title Color Hover', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-service-carousel .pxl-item--inner:hover .pxl-item--title a,{{WRAPPER}} .pxl-service-carousel .swiper-slide-active .pxl-item--inner .pxl-item--title a' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'post_type' => ['service'],
                'layout_service' => ['service-1', 'service-2'],
            ],
        ),
        array(
            'name' => 'service_title_typography',
            'label' => esc_html__('Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-service-carousel .pxl-item--inner .pxl-item--title',
            'condition' => [
                'post_type' => ['service'],
                'layout_service' => ['service-1', 'service-2', 'service-3'],
            ],
        ),
        array(
            'name' => 'service_sub_title_color',
            'label' => esc_html__('Sub Title Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-service-carousel .pxl-item--inner .pxl-item--description span' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'post_type' => ['service'],
                'layout_service' => ['service-1', 'service-2'],
            ],
        ),
        array(
            'name' => 'service_sub_title_typography',
            'label' => esc_html__('Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-service-carousel .pxl-item--inner .pxl-item--description',
            'condition' => [
                'post_type' => ['service'],
                'layout_service' => ['service-1', 'service-2', 'service-3'],
            ],
        ),
    ),
),
array(
    'name' => 'section_style_el_title',
    'label' => esc_html__('El Item Title', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'conditions' => [
        'relation' => 'or',
        'terms' => [
            [
                'terms' => [
                    ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                    ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                ]
            ],
            [
                'terms' => [
                    ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                    ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1']]
                ]
            ]
        ],
    ],
    'controls' => array(
        array(
            'name' => 'el_title_linear__check',
            'label' => esc_html__('Text Gradient', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'false',            
        ),
        array(
            'name'         => 'el_sub_title_text_gradient',
            'label' => esc_html__( 'Background Type', 'digicove' ),
            'type'         => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types' => [ 'gradient' ],
            'condition' => [
                'el_title_linear__check' => 'true',
            ],
            'selector'     => '{{WRAPPER}} .pxl-service-carousel .container-custom .el--sub-title span,{{WRAPPER}} .pxl-post-carousel1 .container-custom .el--sub-title span',
        ),
        array(
            'name' => 'el_sub_title_color',
            'label' => esc_html__('Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-service-carousel .container-custom .el--sub-title,{{WRAPPER}} .pxl-post-carousel1 .container-custom .el--sub-title' => 'color: {{VALUE}};',
                '{{WRAPPER}} .pxl-service-carousel .container-custom .el--sub-title span,{{WRAPPER}} .pxl-post-carousel1 .container-custom .el--sub-title span' => 'color: {{VALUE}}; text-fill-color: {{VALUE}}; -webkit-text-fill-color: {{VALUE}}; background-image: none;',
            ],
        ),
        array(
            'name' => 'el_sub_title_bg_color',
            'label' => esc_html__('Background Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-service-carousel .container-custom .el--sub-title::after,{{WRAPPER}} .pxl-post-carousel1 .container-custom .el--sub-title::after' => 'background: {{VALUE}};',                
            ],
        ),
        array(
            'name' => 'sun_padding',
            'label' => esc_html__('Item Padding', 'digicove' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-service-carousel .container-custom .el--sub-title, {{WRAPPER}} .pxl-post-carousel1 .container-custom .el--sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'control_type' => 'responsive',
        ),
        array(
            'name'         => 'el_sub_title_bg_gradient',
            'label' => esc_html__( 'Background Type', 'digicove' ),
            'type'         => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types' => [ 'gradient' ],
            'selector'     => '{{WRAPPER}} .pxl-service-carousel .container-custom .el--sub-title::after,{{WRAPPER}} .pxl-post-carousel1 .container-custom .el--sub-title::after',
        ),
        array(
            'name' => 'el_sub_title_typography',
            'label' => esc_html__('Sub Title Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-service-carousel .container-custom .el--sub-title span,{{WRAPPER}} .pxl-post-carousel1 .container-custom .el--sub-title span',
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
                '{{WRAPPER}} .pxl-service-carousel .container-custom .el--sub-title,{{WRAPPER}} .pxl-post-carousel1 .container-custom .el--sub-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
                '{{WRAPPER}} .pxl-service-carousel .container-custom .el--title,{{WRAPPER}} .pxl-post-carousel1 .container-custom .el--title' => 'color: {{VALUE}};',                
            ],
        ),
        array(
            'name' => 'el_title_typography',
            'label' => esc_html__('Title Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-service-carousel .container-custom .el--title,{{WRAPPER}} .pxl-post-carousel1 .container-custom .el--title',            
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
                '{{WRAPPER}} .pxl-service-carousel .container-custom .el--title,{{WRAPPER}} .pxl-post-carousel1 .container-custom .el--title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
            'control_type' => 'responsive',
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-service-carousel .container-custom,{{WRAPPER}} .pxl-post-carousel1 .container-custom' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),

    ),
),
array(
    'name' => 'section_style_el_title_arrow',
    'label' => esc_html__('El Item Arrows', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'conditions' => [
        'relation' => 'or',
        'terms' => [
            [
                'terms' => [
                    ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                    ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                ]
            ],
            [
                'terms' => [
                    ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                    ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1']]
                ]
            ]
        ],
    ],
    'controls' => array(
        array(
            'name' => 'arrow_width',
            'label' => esc_html__('Arrows width/height', 'digicove' ),
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
                '{{WRAPPER}} .pxl-service-carousel .container-custom .wp-arrow .pxl-swiper-arrow,{{WRAPPER}} .pxl-post-carousel .container-custom .wp-arrow .pxl-swiper-arrow' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'arrow_size',
            'label' => esc_html__('Arrows size', 'digicove' ),
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
                '{{WRAPPER}} .pxl-service-carousel .container-custom .wp-arrow .pxl-swiper-arrow svg,{{WRAPPER}} .pxl-post-carousel .container-custom .wp-arrow .pxl-swiper-arrow svg' => 'height: {{SIZE}}{{UNIT}};',                
            ],
        ),
        array(
            'name' => 'arrows_bg',
            'label' => esc_html__('Background Arrows', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-service-carousel .container-custom .wp-arrow .pxl-swiper-arrow,{{WRAPPER}} .pxl-post-carousel .container-custom .wp-arrow .pxl-swiper-arrow' => 'background-color: {{VALUE}};',                
            ],
        ),
        array(
            'name' => 'arrows_bg_hover',
            'label' => esc_html__('Background Arrows Hover', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-service-carousel .container-custom .wp-arrow .pxl-swiper-arrow:hover,{{WRAPPER}} .pxl-post-carousel .container-custom .wp-arrow .pxl-swiper-arrow:hover' => 'background: {{VALUE}};',                
            ],
        ),
        array(
            'name' => 'arrows_color',
            'label' => esc_html__('Color Arrows', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-service-carousel .container-custom .wp-arrow .pxl-swiper-arrow svg path,{{WRAPPER}} .pxl-post-carousel .container-custom .wp-arrow .pxl-swiper-arrow svg path' => 'fill: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'arrows_color_hover',
            'label' => esc_html__('Color Arrows Hover', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-service-carousel .container-custom .wp-arrow .pxl-swiper-arrow:hover svg path,{{WRAPPER}} .pxl-post-carousel .container-custom .wp-arrow .pxl-swiper-arrow:hover svg path' => 'fill: {{VALUE}};',
            ],
        ),
    ),
),
),
),
),
digicove_get_class_widget_path()
);