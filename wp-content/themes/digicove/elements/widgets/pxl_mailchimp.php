<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_mailchimp',
        'title' => esc_html__('PXL Mailchimp', 'digicove'),
        'icon' => 'eicon-email-field',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'digicove'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'form_id',
                            'label' => esc_html__('Form ID', 'digicove' ),
                            'type' => 'text',
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-default' => esc_html__('Default', 'digicove' ),

                            ],
                            'default' => 'style-default',
                        ),
                        array(
                            'name' => 'input_color',
                            'label' => esc_html__('Color Input', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp.style-default [type="email"]' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'input_background',
                            'label' => esc_html__('Background Input', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp.style-default [type="email"]' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'input_color_button',
                            'label' => esc_html__('Color Button', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp.style-default [type="submit"]' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-mailchimp.style-default svg path' => 'fill: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name'         => 'btn_gradient',
                            'label' => esc_html__( 'background type', 'digicove' ),
                            'type'         => \elementor\group_control_background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'gradient' ],
                            'selector'     => '{{WRAPPER}} .pxl-mailchimp.style-default .btn',
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
                                '{{WRAPPER}} .pxl-mailchimp.style-default [type="email"]' => 'border-style: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'border_width',
                            'label' => esc_html__( 'Border Width', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp.style-default [type="email"]' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                                '{{WRAPPER}} .pxl-mailchimp.style-default [type="email"]' => 'border-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                        ),
                        array(
                            'name'  => 'max_width',
                            'label' => esc_html__( 'Max Width', 'digicove' ),
                            'type'  => 'slider',
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 100,
                                    'max' => 1920,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp > div' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name'  => 'min_width',
                            'label' => esc_html__( 'Min Width', 'digicove' ),
                            'type'  => 'slider',
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 100,
                                    'max' => 1920,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp > div' => 'min-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'content_align',
                            'label' => esc_html__('Content Alignment', 'digicove' ),
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
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp' => 'justify-content: {{VALUE}};',
                            ],
                        ),
                    ),
),
),
),
),
digicove_get_class_widget_path()
);