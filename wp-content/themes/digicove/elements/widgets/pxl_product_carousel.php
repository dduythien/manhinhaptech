<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_product_carousel',
        'title' => esc_html__('Pxl Product Carousel', 'digicove' ),
        'icon' => 'eicon-posts-ticker',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'swiper',
            'pxl-swiper',
        ],
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_product_carousel/img-layout/layout1.jpg'
                                ],
                            ],
                            'prefix_class' => 'pxl-product-carousel-layout-'
                        ),
                    ),
                ),
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source', 'digicove' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'    => 'query_type',
                            'label'   => esc_html__( 'Select Query Type', 'digicove' ),
                            'type'    => 'select',
                            'default' => 'recent_product',
                            'options' => [
                                'recent_product'   => esc_html__( 'Recent Products', 'digicove' ),
                                'best_selling'     => esc_html__( 'Best Selling', 'digicove' ),
                                'featured_product' => esc_html__( 'Featured Products', 'digicove' ),
                                'top_rate'         => esc_html__( 'High Rate', 'digicove' ),
                                'on_sale'          => esc_html__( 'On Sale', 'digicove' ),
                                'recent_review'    => esc_html__( 'Recent Review', 'digicove' ),
                                'deals'            => esc_html__( 'Product Deals', 'digicove' ),
                                'separate'         => esc_html__( 'Product separate', 'digicove' ),
                            ]
                        ),
                        array(
                            'name'     => 'taxonomies',
                            'label'    => esc_html__( 'Select Term of Product', 'digicove' ),
                            'type'     => 'select2',
                            'multiple' => true,
                            'options'  => pxl_get_product_grid_term_options()
                        ),
                        array(
                            'name'     => 'product_ids',
                            'label'    => esc_html__( 'Products id (123,124,135...)', 'digicove' ),
                            'type'     => 'text',
                            'default'  => '',
                            'condition' => array( 'query_type' => 'separate' )
                        ),
                        array(
                            'name' => 'filter',
                            'label' => esc_html__('Filter on Carousel', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'false',
                            'options' => [
                                'true' => esc_html__('Enable', 'digicove' ),
                                'false' => esc_html__('Disable', 'digicove' ),
                            ],
                        ),
                        array(
                            'name' => 'filter_default_title',
                            'label' => esc_html__('Filter Default Title', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('All', 'digicove' ),
                        ),
                        array(
                            'name'     => 'post_per_page',
                            'label'    => esc_html__( 'Post per page', 'digicove' ),
                            'type'     => 'text',
                            'default'  => '10'
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Default',
                                'style2' => 'Style 2',
                                'style3' => 'Style 3',
                            ],
                            'default' => 'style1',
                        )
                    ),
                ),
                array(
                    'name' => 'section_carousel_settings',
                    'label' => esc_html__('Carousel', 'digicove'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'thumbnail',
                            'type' => \Elementor\Group_Control_Image_Size::get_type(),
                            'control_type' => 'group',
                            'default' => 'custom',
                        ),
                        array(
                            'name' => 'show_category',
                            'label' => esc_html__('Show Category', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
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
                                '6' => '6',
                            ],
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
    'name' => 'section_style_title',
    'label' => esc_html__('Style Color', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'title_color',
            'label' => esc_html__('Title Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-product-carousel .woocommerce-product-inner .woocommerce-product-content .woocommerce-product--title a' => 'color: {{VALUE}} !important;',
                '{{WRAPPER}} .pxl-product-carousel .woocommerce-product-inner .woocommerce-product-content .woocommerce-available-product--numbers .woocommerce-available-product--number' => 'color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'title_color_hover',
            'label' => esc_html__('Title Color Hover', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-product-carousel .woocommerce-product-inner .woocommerce-product-content .woocommerce-product--title:hover a' => 'color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'btn_meta_bgr',
            'label' => esc_html__('Btn Meta Background', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-product-carousel .woocommerce-product-inner .woocommerce-product-header .woocommerce-product-meta a' => 'background-color: {{VALUE}} !important;',
                '{{WRAPPER}} .pxl-product-carousel .woocommerce-product-inner .woocommerce-product-header .woocommerce-product-meta button' => 'background-color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'btn_meta_bgr_hover',
            'label' => esc_html__('Btn Meta Background Hover', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-product-carousel .woocommerce-product-inner .woocommerce-product-header .woocommerce-product-meta a:hover' => 'background-color: {{VALUE}} !important;',
                '{{WRAPPER}} .pxl-product-carousel .woocommerce-product-inner .woocommerce-product-header .woocommerce-product-meta button:hover' => 'background-color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'btn_cart_bgr',
            'label' => esc_html__('Btn Cart Background', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-product-carousel .woocommerce-product-inner .woocommerce-product-content .woocommerce-product-meta2 .woocommerce-add-to-cart a' => 'background-color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'btn_cart_bgr_hv',
            'label' => esc_html__('Btn Cart Background Hover', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-product-carousel .woocommerce-product-inner .woocommerce-product-content .woocommerce-product-meta2 .woocommerce-add-to-cart a:hover' => 'background-color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'bgr_arrow_hover',
            'label' => esc_html__('Background Arrow Hover', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-product-carousel .pxl-carousel-inner .pxl-swiper-arrow-wrap .pxl-swiper-arrow:hover' => 'background-color: {{VALUE}} !important;',
            ],
        ),
    ),
),
digicove_cursor_opts()
),
),
),
digicove_get_class_widget_path()
);