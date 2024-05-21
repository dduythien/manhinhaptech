<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_pricing',
        'title' => esc_html__('Pricing BR', 'digicove'),
        'icon' => 'eicon-settings',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_layout',
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_pricing/img-layout/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'digicove' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_pricing/img-layout/layout2.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'digicove'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'    => 'style',
                            'label'   => esc_html__( 'Style', 'digicove' ),
                            'type'    => 'select',
                            'default' => 'default',
                            'condition' => [
                                'layout' => ['1'],
                            ],
                            'options' => [
                                'default'        => esc_html__( 'Default', 'digicove' ),
                                'style2'  => esc_html__( 'Style2', 'digicove' ),
                            ]
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'sub_title',
                            'label' => esc_html__('Sub Title', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'layout' => ['2'],
                            ],
                        ),
                        array(
                            'name' => 'price',
                            'label' => esc_html__('Price', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'pric_after',
                            'label' => esc_html__('Price After', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'pric_day',
                            'label' => esc_html__('Price Day', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'currency',
                            'label' => esc_html__('Currency unit', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'feature',
                            'label' => esc_html__('Feature', 'digicove'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'feature_text',
                                    'label' => esc_html__('Text', 'digicove'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'active',
                                    'label' => esc_html__('Active', 'digicove' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'non-active' => 'No',
                                        'is-active' => 'Yes',
                                    ],
                                    'default' => 'is-active',
                                ),
                            ),
                            'title_field' => '{{{ feature_text }}}',
                        ),
                        array(
                            'name' => 'box_active',
                            'label' => esc_html__('Active', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'no-active' => 'No',
                                'is-active' => 'Yes',
                            ],
                            'default' => 'no-active',
                        ),
                        array(
                            'name' => 'btn_text',
                            'label' => esc_html__('Button Text', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'default' => 'Get started',
                        ),
                        array(
                            'name' => 'btn_link',
                            'label' => esc_html__('Button Link', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                    ),
),
array(
    'name' => 'section_garena_style',
    'label' => esc_html__('Garena Style', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
     array(
        'name' => 'box-height',
        'label' => esc_html__('Box Height', 'digicove' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'control_type' => 'responsive',
        'size_units' => [ 'px' ],
        'range' => [
            'px' => [
                'min' => 0,
                'max' => 1000,
            ],
        ],
        'selectors' => [
            '{{WRAPPER}} .pxl-pricing' => 'min-height: {{SIZE}}{{UNIT}};',
        ],
    ),
     array(
        'name' => 'box_padding',
        'label' => esc_html__('Box Padding', 'digicove' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px' ],
        'selectors' => [
            '{{WRAPPER}} .pxl-pricing' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'control_type' => 'responsive',
    ),
     array(
        'name' => 'box_border_radius',
        'label' => esc_html__('Border Radius', 'digicove' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px' ],
        'selectors' => [
            '{{WRAPPER}} .pxl-pricing' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
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
            '{{WRAPPER}} .pxl-pricing1.style2.is-active,{{WRAPPER}} .pxl-pricing1.style2.no-active' => 'border-style: {{VALUE}} !important;',
        ],
    ),
     array(
        'name' => 'border_width',
        'label' => esc_html__( 'Border Width', 'digicove' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'selectors' => [
            '{{WRAPPER}} .pxl-pricing1.style2.is-active,{{WRAPPER}} .pxl-pricing1.style2.no-active' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
            '{{WRAPPER}} .pxl-pricing1.style2.is-active,{{WRAPPER}} .pxl-pricing1.style2.no-active' => 'border-color: {{VALUE}} !important;',
        ],
        'condition' => [
            'border_type!' => '',
        ],
    ),
     array(
        'name'         => 'box_gradient',
        'label' => esc_html__( 'Background Type', 'digicove' ),
        'type'         => \Elementor\Group_Control_Background::get_type(),
        'control_type' => 'group',
        'types' => [ 'gradient' ],
        'selector'     => '{{WRAPPER}} .pxl-pricing1.style2.is-active,{{WRAPPER}} .pxl-pricing1.style2.no-active',
    ),
 ),
),
array(
    'name' => 'section_title_style',
    'label' => esc_html__('Title Style', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'title_color',
            'label' => esc_html__('Title Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-title, {{WRAPPER}} .pxl-pricing .pxl-title span' => 'color: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;',
            ],
        ),
        array(
            'name' => 'title_typography',
            'label' => esc_html__('Title Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-title',
        ),
        array(
            'name'         => 'bg_gradient',
            'label' => esc_html__( 'Background Type', 'digicove' ),
            'type'         => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types' => [ 'gradient' ],
            'selector'     => '{{WRAPPER}} .pxl-title::after',
        ),
    ),
),

array(
    'name' => 'section_feature_style',
    'label' => esc_html__('List Infor Style', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'feature_color',
            'label' => esc_html__('Feature Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-feature div' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'feature_typography',
            'label' => esc_html__('Feature Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-feature div',
        ),
        array(
            'name' => 'icon_color',
            'label' => esc_html__('Icon Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-feature div::before' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_number_color',
            'label' => esc_html__('Price After Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-meta .pxl-after' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'price_after_typography',
            'label' => esc_html__('Price After Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-meta .pxl-after',
        ),
        array(
            'name'         => 'icon_gradient',
            'label' => esc_html__( 'Background Type', 'digicove' ),
            'type'         => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types' => [ 'gradient' ],
            'selector'     => '{{WRAPPER}} .pxl-pricing .pxl-feature div::before',
        ),
    ),
),
array(
    'name' => 'section_price_style',
    'label' => esc_html__('Price Style', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'currency_color',
            'label' => esc_html__('Currency Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-currency' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'currency_typography',
            'label' => esc_html__('Currency Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-currency',
        ),
        array(
            'name' => 'value_color',
            'label' => esc_html__('Value Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-value' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'value_typography',
            'label' => esc_html__('Value Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-value',
        ),
        array(
            'name' => 'suffix_color',
            'label' => esc_html__('Suffix Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-suffix' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'suffix_typography',
            'label' => esc_html__('Suffix Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-suffix',
        ),
        array(
            'name' => 'value_color_mark',
            'label' => esc_html__('value Mark color', 'digicove' ),
            'type' => \elementor\controls_manager::COLOR,
            'selectors' => [
                '{{wrapper}} .pxl-pricing .pxl-dup-value' => 'color: {{value}};',
            ],
        ),
        array(
            'name' => 'value_mask_typography',
            'label' => esc_html__('value mask typography', 'digicove' ),
            'type' => \elementor\group_control_typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{wrapper}} .pxl-pricing .pxl-dup-value',
        ),
        array(
            'name'         => 'price_gradient',
            'label' => esc_html__( 'background type', 'digicove' ),
            'type'         => \elementor\group_control_background::get_type(),
            'control_type' => 'group',
            'types' => [ 'gradient' ],
            'selector'     => '{{wrapper}} .pxl-pricing.pxl-pricing2 .pxl-meta .pxl-price span',
        ),
    ),
),
array(
    'name' => 'section_button_style',
    'label' => esc_html__('Button Style', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
     array(
        'name' => 'btn_space_left',
        'label' => esc_html__('Button Spacer Left', 'digicove' ),
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
            '{{WRAPPER}} .pxl-pricing .btn' => 'left: {{SIZE}}{{UNIT}};',
        ],
    ),
     array(
        'name'         => 'btn_gradient',
        'label' => esc_html__( 'Background Type', 'digicove' ),
        'type'         => \Elementor\Group_Control_Background::get_type(),
        'control_type' => 'group',
        'types' => [ 'gradient' ],
        'selector'     => '{{WRAPPER}} .pxl-pricing .btn',
    ),
 ),
),
digicove_widget_animation_settings()
),
),
),
digicove_get_class_widget_path()
);