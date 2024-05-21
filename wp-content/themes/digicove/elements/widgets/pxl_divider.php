<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_divider',
        'title' => esc_html__('PXL Divider', 'digicove'),
        'icon' => 'eicon-divider',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_list',
                    'label' => esc_html__('Content', 'digicove'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'horizontal' => esc_html__('Horizontal', 'digicove' ),
                                'vertical' => esc_html__('Vertical', 'digicove' ),
                            ],
                            'default' => 'horizontal',
                        ),
                        
                        array(
                            'name' => 'width',
                            'label' => esc_html__('Width', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px','%' ],
                            'default' => [
                                'size' => '100',
                                'unit' => '%'
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 10,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-divider.horizontal .pxl-divider-separator' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => ['style' => 'horizontal']
                        ),
                        array(
                            'name' => 'height',
                            'label' => esc_html__('Height', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px','%' ],
                            'default' => [
                                'size' => '29',
                                'unit' => 'px'
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 10,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-divider.vertical .pxl-divider-separator' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => ['style' => 'vertical']
                        ),
                        array(
                            'name' => 'color',
                            'label' => esc_html__('Color', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-divider .pxl-divider-separator' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'weight',
                            'label' => esc_html__('Weight', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 10,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-divider .pxl-divider-separator' => 'border-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'gap',
                            'label' => esc_html__('Gap (px)', 'digicove' ),
                            'type' => 'dimensions',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-divider' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'content_align',
                            'label' => esc_html__('Alignment', 'digicove' ),
                            'type' => 'choose',
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
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-divider' => 'justify-content: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'div_animated',
                            'label' => esc_html__('Animated', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__('None', 'digicove' ),
                                'animated' => esc_html__('Animated', 'digicove' ),
                                'animated reversal' => esc_html__('Animated Reversal', 'digicove' ),
                            ],
                            'default' => '',
                        ), 
                        array(
                            'name'    => 'div_animation_duration', 
                            'label'   => esc_html__( 'Animation Duration', 'digicove' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'default' => 'normal',
                            'options' => [
                                'slow'   => esc_html__( 'Slow', 'digicove' ),
                                'normal' => esc_html__( 'Normal', 'digicove' ),
                                'fast'   => esc_html__( 'Fast', 'digicove' ),
                            ],
                            'condition'   => ['div_animated!' => '' ],
                        ),
                        array(
                            'name' => 'div_rotate',
                            'label' => esc_html__('Rotate (deg)', 'digicove'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'min' => 0,
                            'step' => 360,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-divider .pxl-divider-separator' => 'transform: rotate({{VALUE}}deg);',
                            ],
                        )
                    ),
                ),
            ),
        ),
    ),
    digicove_get_class_widget_path()
);