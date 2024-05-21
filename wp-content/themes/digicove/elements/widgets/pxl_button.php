<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_button',
        'title' => esc_html__('Button Pxl', 'digicove' ),
        'icon' => 'eicon-button',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'digicove' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'text',
                            'label' => esc_html__('Text', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Click Here', 'digicove'),
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'default' => [
                                'url' => '#',
                            ],
                        ),
                        array(
                            'name' => 'align',
                            'label' => esc_html__('Alignment', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left'    => [
                                    'title' => esc_html__('Left', 'digicove' ),
                                    'icon' => 'fa fa-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'digicove' ),
                                    'icon' => 'fa fa-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__('Right', 'digicove' ),
                                    'icon' => 'fa fa-align-right',
                                ],
                                'justify' => [
                                    'title' => esc_html__('Justified', 'digicove' ),
                                    'icon' => 'fa fa-align-justify',
                                ],
                            ],
                            'prefix_class' => 'elementor-align-',
                            'default' => '',
                            'selectors'         => [
                                '{{WRAPPER}} .pxl-button' => 'text-align: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'btn_icon',
                            'label' => esc_html__('Icon', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'label_block' => true,                            
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'icon_align',
                            'label' => esc_html__('Icon Position', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'right',
                            'options' => [
                                'left' => esc_html__('Before', 'digicove' ),
                                'right' => esc_html__('After', 'digicove' ),
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_button',
                    'label' => esc_html__('Button Normal', 'digicove' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'btn_style',
                            'label' => esc_html__('Style', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'btn-default',
                            'options' => [
                                'btn-default' => esc_html__('Default', 'digicove' ),
                                'pxl-wobble' => esc_html__('Effect', 'digicove' ),
                            ],
                        ),
                        array(
                            'name' => 'button_effect',
                            'label' => esc_html__('Effect', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__('None', 'digicove' ),
                                'pxl-jump' => esc_html__('Jump', 'digicove' ),
                                'pxl-upscale' => esc_html__('Upscale', 'digicove' ),
                                'pxl-spin' => esc_html__('Spin', 'digicove' ),
                                'pxl-skew' => esc_html__('Skew', 'digicove' ),
                                'pxl-squash' => esc_html__('Squash', 'digicove' ),
                                'pxl-leap' => esc_html__('Leap', 'digicove' ),
                                'pxl-fade' => esc_html__('Fade', 'digicove' ),
                                'pxl-sheen' => esc_html__('Sheen', 'digicove' ),
                                'pxl-xspin' => esc_html__('Xspin', 'digicove' ),
                                'pxl-pop' => esc_html__('Pop', 'digicove' ),
                            ],                            
                            'default' => '',
                        ),
                        array(
                            'name' => 'btn_typography',
                            'label' => esc_html__( 'Typography', 'digicove' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-button .btn',
                        ),
                        array(
                            'name' => 'btn_custom_font_family',
                            'label' => esc_html__('Custom Font Family', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__( 'Inherit', 'digicove' ),
                                'ft-walsheim' => esc_html__( 'GT Walsheim Pro', 'digicove' ),
                            ],
                            'default' => '',
                        ),
                        array(
                            'name' => 'btn_border_radius',
                            'label' => esc_html__('Border Radius', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name'         => 'btn_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'digicove' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-button .btn'
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
                                '{{WRAPPER}} .pxl-button .btn' => 'border-style: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'border_width',
                            'label' => esc_html__( 'Border Width', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                                '{{WRAPPER}} .pxl-button .btn' => 'border-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                        ),
                        array(
                            'name' => 'btn_padding',
                            'label' => esc_html__('Padding', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'color',
                            'label' => esc_html__('Color', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color',
                            'label' => esc_html__('Background Color', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'background-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'btn_style' => ['btn-default'],
                            ],
                        ),
                        array(
                            'name'         => 'btn_gradient',
                            'label' => esc_html__( 'Background Type', 'digicove' ),
                            'type'         => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'gradient' ],
                            'selector'     => '{{WRAPPER}} .pxl-button .btn',
                        ),
                    ),
),
array(
    'name' => 'section_style_icon',
    'label' => esc_html__('Icon', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
     array(
        'name' => 'style_icon',
        'label' => esc_html__('Style', 'digicove' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
            '' => 'Default',
            'style2' => 'Style 2',
        ],
        'default' => 'style1',
    ),
     array(
        'name' => 'icon_color',
        'label' => esc_html__('Color', 'digicove' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pxl-button .btn i' => 'color: {{VALUE}};',
            '{{WRAPPER}} .pxl-button .btn svg path' => 'fill: {{VALUE}};',
        ],
    ),
     array(
        'name'         => 'icon_gradient',
        'label' => esc_html__( 'Background Type', 'digicove' ),
        'type'         => \Elementor\Group_Control_Background::get_type(),
        'control_type' => 'group',
        'types' => [ 'gradient' ],
        'condition' => [
            'style_icon' => ['style2'],
        ],
        'selector'     => '{{WRAPPER}} .pxl-button .btn .button-arrow-hover:after',
    ),
     array(
        'name' => 'icon_font_size',
        'label' => esc_html__('Font Size', 'digicove' ),
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
            '{{WRAPPER}} .pxl-button .btn i' => 'font-size: {{SIZE}}{{UNIT}};',
        ],
    ),
     array(
        'name' => 'icon_space_left',
        'label' => esc_html__('Icon Spacer', 'digicove' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'control_type' => 'responsive',
        'size_units' => [ 'px' ],
        'range' => [
            'px' => [
                'min' => 0,
                'max' => 300,
            ],
        ],
        'default' => [
            'size' => 10,
        ],
        'selectors' => [
            '{{WRAPPER}} .pxl-button .pxl-icon--left i, {{WRAPPER}} .pxl-button .pxl-icon--left .button-arrow-hover' => 'margin-right: {{SIZE}}{{UNIT}};',
        ],
        'condition' => [
            'icon_align' => ['left'],
        ],
    ),
     array(
        'name' => 'icon_space_right',
        'label' => esc_html__('Icon Spacer', 'digicove' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'control_type' => 'responsive',
        'size_units' => [ 'px' ],
        'range' => [
            'px' => [
                'min' => 0,
                'max' => 300,
            ],
        ],
        'default' => [
            'size' => 10,
        ],
        'selectors' => [
            '{{WRAPPER}} .pxl-button .pxl-icon--right i, {{WRAPPER}} .pxl-button .pxl-icon--right .button-arrow-hover' => 'margin-left: {{SIZE}}{{UNIT}};',
        ],
        'condition' => [
            'icon_align' => ['right'],
        ],
    ),
 ),
),
digicove_widget_animation_settings()
),
),
),
digicove_get_class_widget_path()
);