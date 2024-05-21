<?php
// Register Icon Box Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_client_review',
        'title' => esc_html__('BR Client Review', 'digicove' ),
        'icon' => 'eicon-blockquote',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'elementor-waypoints',
            'jquery-numerator',                    
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'digicove' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'style-1',
                            'options' => [
                                'style-1' => esc_html__('(Default)', 'digicove' ),
                                'style-2' => esc_html__('Style2', 'digicove' ),
                            ],
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'digicove' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-client-review1 .pxl-item--meta .pxl-item--title',
                        ),
                        array(
                            'name' => 'images',
                            'label' => esc_html__('Images', 'digicove'),
                            'type' => \Elementor\Controls_Manager::GALLERY,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'show_star',
                            'label' => esc_html__('Show Star', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',                                    
                        ),
                        array(
                            'name' => 'star',
                            'label' => esc_html__('Star', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'one-star'   => '1 Star',
                                'two-star'   => '2 Star',
                                'three-star' => '3 Star',
                                'four-star'  => '4 Star',
                                'five-star'  => '5 Star',
                            ],
                            'default' => 'five-star',                                    
                        ),
                    ),
                ),
                digicove_widget_animation_settings(),
            ),
        ),
    ),
    digicove_get_class_widget_path()
);