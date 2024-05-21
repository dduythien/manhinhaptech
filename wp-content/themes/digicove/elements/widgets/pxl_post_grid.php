<?php
$pt_supports = ['post','case','service'];
pxl_add_custom_widget(
    array(
        'name' => 'pxl_post_grid',
        'title' => esc_html__('Post Grid Pxl', 'digicove' ),
        'icon' => 'eicon-posts-grid',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'imagesloaded',
            'isotope',
            'pxl-post-grid',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'tab_layout',
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
                        digicove_get_post_grid_layout($pt_supports)
                    ),
                ),
                array(
                    'name' => 'tab_source',
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
                            array(
                                'name' => 'style',
                                'label' => esc_html__('Style', 'digicove' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'style1' => 'Default',
                                    'style2' => 'Style 2',                                    
                                ],
                                'condition' => [
                                    'post_type' => ['case'],
                                    'layout_case' => 'case-1',
                                ],
                                'default' => 'style1',
                            ),
                        )
                    ),
                ),
                array(
                    'name' => 'tab_grid',
                    'label' => esc_html__('Grid', 'digicove' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'grid_padding',
                            'label' => esc_html__('Padding', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid .pxl-grid-inner .pxl-grid-item .pxl-item--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                        ),
                        array(
                            'name' => 'img_min_height',
                            'label' => esc_html__('Image Min Height', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 500,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-case-grid.layout3 .pxl-item--inner .item--image img' => 'min-height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                               'post_type' => ['case'],
                               'layout_case' => 'case-3',
                           ],
                       ),
                        array(
                            'name' => 'pxl_animate',
                            'label' => esc_html__('Case Animate', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => digicove_widget_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'filter',
                            'label' => esc_html__('Filter on Masonry', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'false',
                            'options' => [
                                'true' => esc_html__('Enable', 'digicove' ),
                                'false' => esc_html__('Disable', 'digicove' ),
                            ],
                            'condition' => [
                                'select_post_by' => 'term_selected',
                            ],
                        ),
                        array(
                            'name' => 'filter_default_title',
                            'label' => esc_html__('Filter Default Title', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('All', 'digicove' ),
                            'condition' => [
                                'filter' => 'true',
                                'select_post_by' => 'term_selected',
                            ],
                        ),
                        array(
                          'name' => 'filter_alignment',
                          'label' => esc_html__( 'Filter Alignment', 'digicove' ),
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
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .pxl-grid .pxl-grid-filter' => 'text-align: {{VALUE}};',
                        ],
                        'condition' => [
                            'filter' => 'true',
                            'select_post_by' => 'term_selected',
                        ],
                    ),
                        array(
                            'name' => 'pagination_type',
                            'label' => esc_html__('Pagination Type', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'false',
                            'options' => [
                                'pagination' => esc_html__('Pagination', 'digicove' ),
                                'loadmore' => esc_html__('Loadmore', 'digicove' ),
                                'false' => esc_html__('Disable', 'digicove' ),
                            ],
                        ),
                        array(
                            'name' => 'pagination_style',
                            'label' => esc_html__('Pagination Style', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'pxl-pagination-style1',
                            'options' => [
                                'pxl-pagination-style1' => 'Style 1',
                                'pxl-pagination-style2' => 'Style 2',
                            ],
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'pagination_type', 'operator' => '==', 'value' => 'pagination'],
                                        ]
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'loadmore_style',
                            'label' => esc_html__('Loadmore Style', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'pxl-loadmore-style1',
                            'options' => [
                                'pxl-loadmore-style1' => 'Style 1',
                                'pxl-loadmore-style2' => 'Style 2',
                            ],
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'case'],
                                            ['name' => 'pagination_type', 'operator' => '==', 'value' => 'loadmore'],
                                        ]
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'color',
                            'label' => esc_html__('Color', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'color: {{VALUE}};',
                            ],
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'case'],
                                            ['name' => 'pagination_type', 'operator' => '==', 'value' => 'loadmore'],
                                        ]
                                    ],
                                ],
                            ]
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
                                '{{WRAPPER}} .pxl-grid-inner' => 'margin-top: -{{TOP}}{{UNIT}}; margin-right: -{{RIGHT}}{{UNIT}}; margin-bottom: -{{BOTTOM}}{{UNIT}}; margin-left: -{{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-grid-inner .pxl-grid-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),

                        array(
                            'name'         => 'gap_extra',
                            'label'        => esc_html__( 'Item Gap Bottom', 'digicove' ),
                            'description'  => esc_html__( 'Add extra space at bottom of each items','digicove'),
                            'type'         => \Elementor\Controls_Manager::NUMBER,
                            'default'      => 0,
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid-inner .pxl-grid-item' => 'margin-bottom: {{VALUE}}px;',
                            ],
                        ),
                        array(
                            'name' => 'layout_mode',
                            'label' => esc_html__('Layout Mode', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'fitRows',
                            'options' => [
                                'fitRows' => esc_html__('Fit Rows(Default)', 'digicove' ),
                                'masonry' => esc_html__('Masonry', 'digicove' ),
                            ],
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
                            'default' => '4',
                            'options' => [
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
                            'default' => '4',
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
                            'name' => 'grid_masonry',
                            'label' => esc_html__('Grid Masonry', 'digicove'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'col_xs_m',
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
                                    'name' => 'col_sm_m',
                                    'label' => esc_html__('Columns SM Devices', 'digicove' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '2',
                                    'options' => [
                                        '1' => '1',
                                        '1.5' => '2/3',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                    ],
                                ),
                                array(
                                    'name' => 'col_md_m',
                                    'label' => esc_html__('Columns MD Devices', 'digicove' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '3',
                                    'options' => [
                                        '1' => '1',
                                        '1.5' => '2/3',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                    ],
                                ),
                                array(
                                    'name' => 'col_lg_m',
                                    'label' => esc_html__('Columns LG Devices', 'digicove' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '4',
                                    'options' => [
                                        '1' => '1',
                                        '1.5' => '2/3',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                    ],
                                ),
                                array(
                                    'name' => 'col_xl_m',
                                    'label' => esc_html__('Columns XL Devices', 'digicove' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '4',
                                    'options' => [
                                        '1' => '1',
                                        '1.5' => '2/3',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                    ],
                                ),
                                array(
                                    'name' => 'img_size_m',
                                    'label' => esc_html__( 'Image Size', 'digicove' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'description' => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).', 'digicove' ),
                                ),
                            ),
),
),
),
array(
    'name' => 'tab_display',
    'label' => esc_html__('Display', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
    'controls' => array(
        array(
            'name' => 'show_client',
            'label' => esc_html__('Show Client', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
            'condition' => [
                'post_type' => ['case'],
                'layout_case' => ['case-1','case-2'],
            ],
        ),
        array(
            'name' => 'show_year',
            'label' => esc_html__('Show Year', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
            'condition' => [
                'post_type' => ['case'],
                'layout_case' => ['case-2'],
            ],
        ),
        array(
            'name' => 'show_date',
            'label' => esc_html__('Show Date', 'digicove' ),
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
                    ]
                ],
            ]
        ),
        array(
            'name' => 'show_author',
            'label' => esc_html__('Show Author', 'digicove' ),
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
                    ]
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
            'name' => 'button_text',
            'label' => esc_html__('Button Text', 'digicove' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1','post-2','post-3']],
                            ['name' => 'show_button', 'operator' => '==', 'value' => 'true']
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['service-1']],
                            ['name' => 'show_button', 'operator' => '==', 'value' => 'true']
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
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-3']],
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1','service-2']]
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'case'],
                            ['name' => 'layout_case', 'operator' => 'in', 'value' => ['case-4']]
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
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-3']],
                            ['name' => 'show_excerpt', 'operator' => '==', 'value' => 'true']
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1','service-2']],
                            ['name' => 'show_excerpt', 'operator' => '==', 'value' => 'true']
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'case'],
                            ['name' => 'layout_case', 'operator' => 'in', 'value' => ['case-4']]
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
    'controls' => array(
        array(
            'name' => 'case_grid_padding',
            'label' => esc_html__('Padding Box', 'digicove' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-grid .pxl-grid-inner .pxl-grid-item .pxl-item--box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'control_type' => 'responsive',
            'condition' => [
                'post_type' => ['case'],
                'layout_case' => ['case-1'],
            ],
        ),
        array(
            'name' => 'h_height',
            'label' => esc_html__( 'Height Image', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px', '%' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-case-grid .pxl-item--inner .item--featured img' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'box_height',
            'label' => esc_html__( 'Height Image', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px', '%' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-case-grid .pxl-item--inner .item--holder' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'box_width',
            'label' => esc_html__( 'Width Image', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px', '%' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-case-grid .item--holder:after' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name'         => 'box_gradient',
            'label' => esc_html__( 'Background Type', 'digicove' ),
            'type'         => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types' => [ 'gradient' ],
            'selector'     => '{{WRAPPER}} .pxl-case-grid .item--holder:after, {{WRAPPER}} .pxl-case-grid .item--holder.pxl-item--front:after',
        ),
        array(
            'name'         => 'box_gradient_hover',
            'label' => esc_html__( 'Background Type', 'digicove' ),
            'type'         => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types' => [ 'gradient' ],
            'selector'     => '{{WRAPPER}} .pxl-case-grid .item--holder.pxl-item--back:after',
        ),
        array(
            'name' => 'background_box_color',
            'label' => esc_html__('Background Box Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-case-grid .pxl-item--box' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
          'name' => 'post_box_align',
          'label' => esc_html__( 'Box Alignment', 'digicove' ),
          'type' => \Elementor\Controls_Manager::CHOOSE,
          'control_type' => 'responsive',
          'default' => 'left',
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
        ],
        'selectors' => [
            '{{WRAPPER}} .pxl-blog-grid .pxl-item--inner ' => 'text-align: {{VALUE}};',
        ],
    ),
    ),
),
array(
    'name' => 'tab_style_title',
    'label' => esc_html__('Title', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'post_title_color',
            'label' => esc_html__('Title Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-blog-grid .pxl-item--inner .item--title a' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'post_type' => ['post'],
                'layout_post' => ['post-1'],
            ],
        ),
        array(
            'name' => 'post_title_typography',
            'label' => esc_html__('Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-blog-grid .pxl-item--inner .item--title',
            'condition' => [
                'post_type' => ['post'],
                'layout_post' => 'post-1',
            ],
        ),
        array(
            'name' => 'title_color',
            'label' => esc_html__('Clients Title Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-case-grid.layout1 .item--client label' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'post_type' => ['case'],
                'layout_case' => 'case-1',
            ],
        ),
        array(
            'name' => 'title_color_hover',
            'label' => esc_html__('Clients Title Color Hover', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-case-grid .pxl-item--inner:hover .item--client label' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'post_type' => ['case'],
                'layout_case' => 'case-1',
            ],
        ),
        array(
            'name' => 'title_typography',
            'label' => esc_html__('Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-case-grid.layout1 .item--client label',
            'condition' => [
                'post_type' => ['case'],
                'layout_case' => 'case-1',
            ],
        ),
        array(
            'name' => 'content_color',
            'label' => esc_html__('Clients Content Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-case-grid.layout1 .item--client .item--title' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'post_type' => ['case'],
                'layout_case' => 'case-1',
            ],
        ),
        array(
            'name' => 'content_typography',
            'label' => esc_html__('Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-case-grid.layout1 .item--client .item--title',
            'condition' => [
                'post_type' => ['case'],
                'layout_case' => 'case-1',
            ],
        ),
    ),
),
array(
    'name' => 'tab_style_category',
    'label' => esc_html__('Services', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'title_sv_color',
            'label' => esc_html__('Clients Title Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-case-grid.layout1 .item--service label' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_sv_color_hover',
            'label' => esc_html__('Clients Title Color Hover', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-case-grid .pxl-item--inner:hover .item--service label' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'category_sv_typography',
            'label' => esc_html__('Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-case-grid.layout1 .item--service label',
        ),
        array(
            'name' => 'content_sv_color',
            'label' => esc_html__('Clients Content Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-case-grid.layout1 .item--service .item--title a' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'content_sv_typography',
            'label' => esc_html__('Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-case-grid.layout1 .item--service .item--title',
        ),
    ),
    'condition' => [
        'post_type' => ['case'],
        'layout_case' => 'case-1',
    ],
),
array(
    'name' => 'tab_style_filter',
    'label' => esc_html__('Filter', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'filter_typography',
            'label' => esc_html__('Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-grid-filter .filter-item',
        ),
    ),
    'condition' => [
        'post_type' => ['case'],
        'layout_case' => 'case-1',
    ],
),
),
),
),
digicove_get_class_widget_path()
);