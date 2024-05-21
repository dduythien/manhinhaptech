<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_title_effect',
        'title' => esc_html__('PXL Title Effect', 'digicove' ),
        'icon' => 'eicon-heading',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'digicove' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'h_width',
                            'label' => esc_html__( 'Max Width', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ,'vw'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-title-effect .pxl-item-title' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                          'name' => 'align',
                          'label' => esc_html__( 'Alignment', 'digicove' ),
                          'type' => \Elementor\Controls_Manager::CHOOSE,
                          'control_type' => 'responsive',
                          'options' => [
                            'left' => [
                                'title' => esc_html__( 'Left', 'digicove' ),
                                'icon' => 'eicon-text-align-left',
                            ],
                            'center' => [
                                'title' => esc_html__( 'Center', 'digicove' ),
                                'icon' => 'eicon-text-align-center',
                            ],
                            'right' => [
                                'title' => esc_html__( 'Right', 'digicove' ),
                                'icon' => 'eicon-text-align-right',
                            ],
                            'justify' => [
                                'title' => esc_html__( 'Justified', 'digicove' ),
                                'icon' => 'eicon-text-align-justify',
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .pxl-title-effect' => 'text-align: {{VALUE}};',
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
                            'name' => 'color_type',
                            'label' => esc_html__('Color Type', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'color' => 'Color',
                                'gradient' => 'Gradient',
                            ],
                            'default' => 'gradient',
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-title-effect .pxl-item-title' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'color_type' => ['color'],
                            ],
                        ),
                        array(
                            'name'         => 'gradient_color',
                            'label' => esc_html__( 'Background Type', 'digicove' ),
                            'type'         => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'gradient' ],
                            'selector'     => '{{WRAPPER}} .pxl-title-effect.pxl-type-gradient .pxl-item-title',
                            'condition' => [
                                'color_type' => ['gradient'],
                            ],
                        ),
                        array(
                            'name'         => 'title_box_shadow',
                            'label' => esc_html__( 'Title Shadow', 'digicove' ),
                            'type'         => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-title-effect .pxl-item-title',
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'digicove' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-title-effect .pxl-item-title',
                        ),
                        array(
                            'name' => 'white_space',
                            'label' => esc_html__('White Space', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'normal' => 'Normal',
                                'nowrap' => 'NoWrap',
                            ],
                            'default' => 'normal',
                            'selectors' => [
                                '{{WRAPPER}} {{WRAPPER}} .pxl-title-effect .pxl-item-title' => 'white-space: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'title_opacity',
                            'label' => esc_html__('Opacity', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'default' => [
                                'size' => 1,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1,
                                    'step' => 0.1,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-title-effect .pxl-item-title' => 'opacity: {{SIZE}};',
                            ],
                        ),
                        array(
                            'name' => 'text_effect',
                            'label' => esc_html__('Text Effect', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'no-effect' => 'None',
                                'scroll-parallax' => 'Scroll Parallax',
                                'pxl-slide-to-left' => 'Slide Right To Left',
                                'pxl-slide-to-right' => 'Slide Left To Right',
                            ],
                            'default' => 'no-effect',
                        ),
                        array(
                            'name' => 'effect_speed',
                            'label' => esc_html__('Effect Speed', 'digicove'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'description' => 'Default: 10000ms - Unit: ms, or 8s',
                            'default' => '5s',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-title-effect .pxl-item-title' => 'animation-duration: {{VALUE}};',
                            ],
                            'condition' => [
                                'text_effect' => ['pxl-slide-to-left', 'pxl-slide-to-right'],
                            ],
                        ),
                        array(
                            'name' => 'text_offset_left',
                            'label' => esc_html__('Text Offset Bottom', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => -1000,
                                    'max' => 1000,
                                ],
                            ],
                            'default' => [
                                'size' => 50,
                            ],
                            'condition' => [
                                'text_effect' => ['scroll-parallax'],
                            ],
                        ),
                        array(
                            'name' => 'text_margin_left',
                            'label' => esc_html__('Text Margin Left', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => -1000,
                                    'max' => 1000,
                                ],
                            ],
                            'default' => [
                                'size' => 0,
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-title-effect .pxl-item-title' => 'margin-left: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'text_effect' => ['scroll-parallax'],
                            ],
                        ),
                    ),
),
digicove_elementor_animation_opts(),
),
),
),
digicove_get_class_widget_path()
);