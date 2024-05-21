<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_particle',
        'title' => esc_html__('Pxl Particle', 'digicove' ),
        'icon' => 'eicon-barcode',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'digicove-particle',
            'digicove-parallax',
        ],
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
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'controls' => array(
                                array(
                                    'name' => 'particle',
                                    'label' => esc_html__( 'Particle', 'digicove' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'type_position',
                                    'label' => esc_html__('Position', 'digicove' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'top-left' => 'Top Left',
                                        'top-right' => 'Top Right',
                                        'bottom-left' => 'Bottom Left',
                                        'bottom-right' => 'Bottom Right',
                                    ],
                                    'default' => 'top-left',
                                ),
                                array(
                                    'name' => 'top_positioon',
                                    'label' => esc_html__('Top Position', 'digicove' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px', '%' ],
                                    'control_type' => 'responsive',
                                    'default' => [
                                        'size' => 0,
                                        'unit' => '%',
                                    ],
                                    'range' => [
                                        '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                        ],
                                    ],
                                    'selectors' => [
                                        'body:not(.elementor-editor-active) {{WRAPPER}} .pxl-particle {{CURRENT_ITEM}}' => 'top: {{SIZE}}{{UNIT}};',
                                    ],
                                    'condition' => [
                                        'type_position' => ['top-left', 'top-right'],
                                    ],
                                ),
                                array(
                                    'name' => 'left_positioon',
                                    'label' => esc_html__('Left Position', 'digicove' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px', '%' ],
                                    'control_type' => 'responsive',
                                    'default' => [
                                        'size' => 0,
                                        'unit' => '%',
                                    ],
                                    'range' => [
                                        '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                        ],
                                    ],
                                    'selectors' => [
                                        'body:not(.elementor-editor-active) {{WRAPPER}} .pxl-particle {{CURRENT_ITEM}}' => 'left: {{SIZE}}{{UNIT}};',
                                    ],
                                    'condition' => [
                                        'type_position' => ['top-left','bottom-left'],
                                    ],
                                ),
                                array(
                                    'name' => 'bottom_positioon',
                                    'label' => esc_html__('Bottom Position', 'digicove' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px', '%' ],
                                    'control_type' => 'responsive',
                                    'default' => [
                                        'size' => 0,
                                        'unit' => '%',
                                    ],
                                    'range' => [
                                        '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                        ],
                                    ],
                                    'selectors' => [
                                        'body:not(.elementor-editor-active) {{WRAPPER}} .pxl-particle {{CURRENT_ITEM}}' => 'bottom: {{SIZE}}{{UNIT}};',
                                    ],
                                    'condition' => [
                                        'type_position' => ['bottom-right','bottom-left'],
                                    ],
                                ),
                                array(
                                    'name' => 'right_positioon',
                                    'label' => esc_html__('Right Position', 'digicove' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px', '%' ],
                                    'control_type' => 'responsive',
                                    'default' => [
                                        'size' => 0,
                                        'unit' => '%',
                                    ],
                                    'range' => [
                                        '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                        ],
                                    ],
                                    'selectors' => [
                                        'body:not(.elementor-editor-active) {{WRAPPER}} .pxl-particle {{CURRENT_ITEM}}' => 'right: {{SIZE}}{{UNIT}};',
                                    ],
                                    'condition' => [
                                        'type_position' => ['top-right', 'bottom-right'],
                                    ],
                                ),
                                array(
                                    'name' => 'particle_effect',
                                    'label' => esc_html__('Effect', 'digicove' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '',
                                    'options' => [
                                        '' => 'None',
                                        'move-parallax' => 'Parallax',
                                        'slide-bottom-to-top' => 'Slide Bottom To Top',
                                        'slide-top-to-bottom' => 'Slide Top To Bottom',
                                        'slide-left-to-right' => 'Slide Left To Right',
                                        'slide-right-to-left' => 'Slide Right To Left',
                                        'pxl-spin' => 'Rotate',
                                        'slide-effect1' => 'Effect 1',
                                        'slide-effect2' => 'Effect 2',
                                    ],
                                ),
                                array(
                                    'name' => 'parallax_speed',
                                    'label' => esc_html__('Parallax Speed', 'digicove' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'condition' => [
                                        'particle_effect' => 'move-parallax',
                                    ],
                                    'default' => '6',
                                ),
                                array(
                                    'name' => 'parallax_move',
                                    'label' => esc_html__('Parallax Move', 'digicove' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'condition' => [
                                        'particle_effect' => 'move-parallax',
                                    ],
                                    'default' => '60',
                                ),
                                array(
                                    'name' => 'pxl_animate',
                                    'label' => esc_html__('Animate', 'digicove' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => digicove_widget_animate(),
                                    'default' => '',
                                ),
                                array(
                                    'name' => 'pxl_animate_delay',
                                    'label' => esc_html__('Animate Delay', 'digicove' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'default' => '0',
                                    'description' => 'Enter number. Default 0ms',
                                ),
                            ),
                        ),
                        array(
                            'name' => 'image_visible',
                            'label' => esc_html__('Image Visible', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'img-below-content' => 'Below Content',
                                'img-above-content' => 'Above Content',
                            ],
                            'default' => 'img-below-content',
                        ),
                    ),
                ),
            ),
        ),
    ),
    digicove_get_class_widget_path()
);