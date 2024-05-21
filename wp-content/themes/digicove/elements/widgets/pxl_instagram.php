<?php pxl_add_custom_widget(
    array(
        'name' => 'pxl_instagram',
        'title' => esc_html__('Instagram Pxl', 'digicove'),
        'icon' => 'eicon-instagram-gallery',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(        
                array(
                    'name' => 'tab_content',
                    'label' => esc_html__('Content', 'digicove'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'images',
                            'label' => esc_html__('Images', 'digicove'),
                            'type' => \Elementor\Controls_Manager::GALLERY,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).',
                        ),
                        array(
                            'name' => 'item_active',
                            'label' => esc_html__('Item Active', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                        ),
                        array(
                            'name' => 'ins_link',
                            'label' => esc_html__('Account Link', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                        array(
                            'name' => 'bg_overlay_active',
                            'label' => esc_html__( 'Background Active Color', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-instagram1 .pxl--item a' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_color_active',
                            'label' => esc_html__( 'Icon Active Color', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-instagram1 .pxl--item a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'item_width',
                            'label' => esc_html__('Item Width', 'digicove' ),
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
                                '{{WRAPPER}} .pxl-instagram1 .pxl--item' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-default' => 'Style 1(Defualt)',
                                'style-2' => 'Style 2',
                            ],
                            'default' => 'style-default',
                        ),
                    ),
                ),
            ),
        ),
    ),
    digicove_get_class_widget_path()
);