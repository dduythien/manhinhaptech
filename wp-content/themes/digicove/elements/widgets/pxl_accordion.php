<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_accordion',
        'title' => esc_html__('Pxl Accordion', 'digicove' ),
        'icon' => 'eicon-accordion',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'digicove-accordion',
            'pxl-accordion',
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
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                                'style3' => 'Style 3',
                                'style4' => 'Style 4',
                            ],
                            'default' => 'style1',
                        ),
                        array(
                            'name' => 'active',
                            'label' => esc_html__('Active', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'separator' => 'after',
                            'default' => '1',
                        ),
                        array(
                            'name' => 'accordion',
                            'label' => esc_html__('Accordion', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'digicove' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'desc',
                                    'label' => esc_html__('Content', 'digicove' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                            'separator' => 'after',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_box',
                    'label' => esc_html__('Box', 'digicove' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                       array(
                        'name' => 'item_space_bottom',
                        'label' => esc_html__('Item Spacer Bottom', 'digicove' ),
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
                            '{{WRAPPER}} .pxl-accordion .pxl--item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                        ],
                    ),
                       array(
                        'name' => 'box_color',
                        'label' => esc_html__('Background', 'digicove' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .pxl-accordion .pxl--item' => 'background-color: {{VALUE}};',
                        ],
                    ),
                       array(
                        'name'         => 'box_shadow',
                        'label' => esc_html__( 'Box Shadow Active', 'digicove' ),
                        'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                        'control_type' => 'group',
                        'selector'     => '{{WRAPPER}} .pxl-accordion .pxl--item.active'
                    ),
                       array(
                        'name' => 'border_type',
                        'label' => esc_html__( 'Border Type Active', 'digicove' ),
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
                            '{{WRAPPER}} .pxl-accordion .pxl--item.active' => 'border-style: {{VALUE}} !important;',
                        ],
                    ),
                       array(
                        'name' => 'border_width',
                        'label' => esc_html__( 'Border Width Active', 'digicove' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'selectors' => [
                            '{{WRAPPER}} .pxl-accordion .pxl--item.active' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                        ],
                        'condition' => [
                            'border_type!' => '',
                        ],
                        'responsive' => true,
                    ),
                       array(
                        'name' => 'border_color',
                        'label' => esc_html__( 'Border Color Active', 'digicove' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .pxl-accordion .pxl--item.active' => 'border-color: {{VALUE}} !important;',
                        ],
                        'condition' => [
                            'border_type!' => '',
                        ],
                    ),
                   ),
                ),
array(
    'name' => 'section_style_title',
    'label' => esc_html__('Title', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'title_color',
            'label' => esc_html__('Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-accordion .pxl-item-accordion' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_color_active',
            'label' => esc_html__('Color Active', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-accordion .pxl--item.active .pxl-item-accordion' => 'color: {{VALUE}};',
                '{{WRAPPER}} .pxl-accordion .pxl--item.active .pxl-item-accordion svg path' => 'fill: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_box_color',
            'label' => esc_html__('Background', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-accordion .pxl--item .pxl-item-accordion' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_box_color_active',
            'label' => esc_html__('Background Active', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-accordion .pxl--item.active .pxl-item-accordion' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_typography',
            'label' => esc_html__('Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-accordion .pxl-item-accordion',
        ),
        array(
            'name' => 'title_padding',
            'label' => esc_html__('Padding', 'digicove' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-accordion .pxl--item .pxl-item-accordion' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'control_type' => 'responsive',
        ),
        array(
            'name' => 'title_tag',
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
            'default' => 'h3',
        ),
        array(
            'name' => 'border_title_type',
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
                '{{WRAPPER}} .pxl-accordion .pxl--item .pxl-item-accordion' => 'border-style: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'border_title_width',
            'label' => esc_html__( 'Border Width', 'digicove' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'selectors' => [
                '{{WRAPPER}} .pxl-accordion .pxl--item .pxl-item-accordion' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
            'condition' => [
                'border_title_type!' => '',
            ],
            'responsive' => true,
        ),
        array(
            'name' => 'border_title_color',
            'label' => esc_html__( 'Border Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-accordion .pxl--item .pxl-item-accordion' => 'border-color: {{VALUE}} !important;',
            ],
            'condition' => [
                'border_title_type!' => '',
            ],
        ),
        array(
            'name' => 'icon_title_color',
            'label' => esc_html__( 'Icon Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-accordion .pxl--item.active .pxl-item-accordion i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .pxl-accordion .pxl--item.active .pxl-item-accordion span:after,{{WRAPPER}} .pxl-accordion .pxl--item.active .pxl-item-accordion span:before' => 'background-color: {{VALUE}};',

            ],
        ),
        array(
            'name' => 'icon_title_color_active',
            'label' => esc_html__( 'Icon Color Active', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-accordion .pxl--item .pxl-item-accordion i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .pxl-accordion .pxl--item .pxl-item-accordion span:after,{{WRAPPER}} .pxl-accordion .pxl--item .pxl-item-accordion span:before' => 'background-color: {{VALUE}};',

            ],
        ),
        array(
            'name'         => 'icon_gradient',
            'label' => esc_html__( 'Background Type', 'digicove' ),
            'type'         => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types' => [ 'gradient' ],
            'selector'     => '{{WRAPPER}} .pxl-accordion1 .pxl--item .pxl-item-accordion .plus',
        ),
    ),
),
array(
    'name' => 'section_style_content',
    'label' => esc_html__('Content', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'content_color',
            'label' => esc_html__('Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-accordion .pxl-item--content' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'h_width',
            'label' => esc_html__( 'Max Width', 'digicove' ),
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
                '{{WRAPPER}} .pxl-accordion .pxl-item--content' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'btn_padding',
            'label' => esc_html__('Padding', 'digicove' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-accordion .pxl--item .pxl-item--content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'control_type' => 'responsive',
        ),
        array(
            'name' => 'desc_typography',
            'label' => esc_html__('Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-accordion .pxl-item--content',
        ),
    ),
),
digicove_widget_animation_settings(),
),
),
),
digicove_get_class_widget_path()
);