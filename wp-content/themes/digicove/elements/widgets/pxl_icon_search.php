<?php
// Register Button Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_icon_search',
        'title' => esc_html__('Search PXL', 'digicove' ),
        'icon' => 'eicon-search',
        'categories' => array( 'pxltheme-core' ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source Settings', 'digicove' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'style1',
                            'options' => [
                                'style1' => esc_html__('Style 1 (Popup)', 'digicove' ),
                                'style2' => esc_html__('Style 2 (Form)', 'digicove' ),
                                'style3' => esc_html__('Style 3 (Form)', 'digicove' ),
                            ],
                        ),
                        array(
                            'name' => 'text_placeholder',
                            'label' => esc_html__('Text Placeholder', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'style' => ['style2', 'style3'],
                            ],
                        ),
                        array(
                            'name' => 'text_button',
                            'label' => esc_html__('Text Button', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'style' => 'style3',
                            ],
                        ),
                        array(
                            'name' => 'quick_search',
                            'label' => esc_html__('Quick Search', 'digicove'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'content',
                                    'label' => esc_html__('Content', 'digicove'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ content }}}',
                            'condition' => [
                                'style' => 'style3',
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-search-popup-button i' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_color_hover',
                            'label' => esc_html__('Icon Color Hover', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-search-popup-button:hover i' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'post_type',
                            'label' => esc_html__('Search Post Type', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '',
                            'options' => [
                                '' => esc_html__('All', 'digicove' ),
                                'page' => esc_html__('Page', 'digicove' ),
                                'post' => esc_html__('Post', 'digicove' ),
                                'lp_course' => esc_html__('Course', 'digicove' ),
                                'portfolio' => esc_html__('Portfolio', 'digicove' ),
                                'product' => esc_html__('Product', 'digicove' ),
                            ],
                        ),
                    ),
),
),
),
),
digicove_get_class_widget_path()
);