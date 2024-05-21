<?php
//Register Counter Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_counter',
        'title' => esc_html__('Pxl Counter', 'digicove'),
        'icon' => 'eicon-counter-circle',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'elementor-waypoints',
            'jquery-numerator',
            'pxl-counter',
            'pxl-counter-slide',
            'digicove-counter',
        ),
        'params' => array(
            'sections' => array(
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
                            'options' => [
                                'default'        => esc_html__( 'Default', 'digicove' ),
                                'style2'  => esc_html__( 'Style2', 'digicove' ),
                                'style3'  => esc_html__( 'Style3', 'digicove' ),
                            ]
                        ),
                        array(
                            'name'    => 'vertical_align',
                            'label'   => esc_html__( 'Vertical Align', 'digicove' ),
                            'type'    => 'select',
                            'default' => 'horizontal',
                            'condition' => [
                                'style' => 'style3',
                            ],
                            'options' => [
                                'horizontal'        => esc_html__( 'Horizontal', 'digicove' ),
                                'vertical'  => esc_html__( 'Vertical', 'digicove' ),
                            ]
                        ),
                        array(
                            'name' => 'align_box',
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
                                '{{WRAPPER}} .pxl-counter1 .pxl--item-inner' => 'text-align: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'digicove'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),

                        array(
                            'name' => 'starting_number',
                            'label' => esc_html__('Starting Number', 'digicove'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 1,
                        ),
                        array(
                            'name' => 'ending_number',
                            'label' => esc_html__('Ending Number', 'digicove'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 100,
                        ),
                        array(
                            'name' => 'prefix',
                            'label' => esc_html__('Number Prefix', 'digicove'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                        ),
                        array(
                            'name' => 'suffix',
                            'label' => esc_html__('Number Suffix', 'digicove'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                        ),
                        array(
                            'name' => 'thousand_separator_char',
                            'label' => esc_html__('Number Separator', 'digicove'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => 'Default',
                                '.' => 'Dot',
                                ',' => 'Comma',
                                ' ' => 'Space',
                            ],
                            'default' => '',
                        ),
                        array(
                            'name' => 'icon_type',
                            'label' => esc_html__('Icon Type', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'icon' => 'Icon',
                                'image' => 'Image',
                            ],
                            'condition' => [
                                'style' => 'default',
                            ],
                            'default' => 'icon',
                        ),
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'icon_type' => 'icon',
                            ],
                        ),
                        array(
                            'name' => 'icon_image',
                            'label' => esc_html__( 'Icon Image', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'description' => esc_html__('Select image icon.', 'digicove'),
                            'condition' => [
                                'icon_type' => 'image',
                            ],
                        ),
                        array(
                            'name' => 'show_line',
                            'label' => esc_html__('Show Line', 'digicove'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
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
                            '{{WRAPPER}} .pxl-counter1 .pxl--item-inner' => 'text-align: {{VALUE}};',
                        ],
                        'condition' => [
                            'layout' => ['1'],
                        ],
                    ),
                    ),
),
array(
    'name' => 'section_style_general',
    'label' => esc_html__('General', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'effect',
            'label' => esc_html__('Effect', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'effect-default' => 'Default',
                'effect-slide' => 'Slide',
            ],
            'default' => 'effect-default',
        ),
        array(
            'name'         => 'box_gradient',
            'label' => esc_html__( 'Box Gradient', 'digicove' ),
            'type'         => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types' => [ 'gradient' ],
            'selector'     => '{{WRAPPER}} .pxl-counter .pxl--item-inner::after',
            'condition' => [
                'style' => 'style2',
            ],
        ),
        array(
            'name'         => 'box_box_shadow',
            'label' => esc_html__( 'Box Shadow', 'digicove' ),
            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
            'control_type' => 'group',
            'selector'     => '{{WRAPPER}} .pxl-counter .pxl--item-inner:hover'
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
                '{{WRAPPER}} .pxl-counter .pxl--item-title' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_typography',
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-counter .pxl--item-title',
        ),
        array(
            'name' => 'wg_max_width',
            'label' => esc_html__('Widget Max Width', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
            ],
            'condition' => [
                'style' => 'style3',
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl--item-title' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ),
    ),
),
array(
    'name' => 'section_style_icon',
    'label' => esc_html__('Icon', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'condition' => [
        'style' => 'default',
    ],
    'controls' => array(
        array(
            'name' => 'icon_color',
            'label' => esc_html__('Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl-item--icon i' => 'color: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;',
            ],
        ),
        array(
            'name' => 'icon_font_size',
            'label' => esc_html__('Icon Font Size', 'digicove' ),
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
                '{{WRAPPER}} .pxl-counter .pxl-item--icon i' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'icon_type' => 'icon',
            ],
        ),
        array(
            'name' => 'icon_space_top',
            'label' => esc_html__('Top Spacer', 'digicove' ),
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
                '{{WRAPPER}} .pxl-counter .pxl-item--icon' => 'padding-top: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'icon_space_bottom',
            'label' => esc_html__('Bottom Spacer', 'digicove' ),
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
                '{{WRAPPER}} .pxl-counter .pxl-item--icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
            'separator' => 'after',
        ),
    ),
),
array(
    'name' => 'section_number',
    'label' => esc_html__('Number', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name'         => 'number_gradient',
            'label' => esc_html__( 'Number Gradient', 'digicove' ),
            'type'         => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types' => [ 'gradient' ],
            'selector'     => '{{WRAPPER}} .pxl-counter .pxl--counter-number',
            'condition' => [
                'style' => ['default','style2'],
            ],
        ),
        array(
            'name' => 'number_color',
            'label' => esc_html__('Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl--counter-number' => 'color: {{VALUE}};',
                '{{WRAPPER}} .pxl-counter .pxl--counter-number' => '-webkit-text-fill-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'number_typography',
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-counter .pxl--counter-number',
        ),
        array(
            'name' => 'prefix_suffix_color',
            'label' => esc_html__('Prefix/Suffix Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl--counter-number .pxl--counter-suffix, {{WRAPPER}} .pxl-counter .pxl--counter-number .pxl--counter-prefix' => 'color: {{VALUE}};',
                '{{WRAPPER}} .pxl-counter .pxl--counter-number .pxl--counter-suffix, {{WRAPPER}} .pxl-counter .pxl--counter-number .pxl--counter-prefix' => '-webkit-text-fill-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'prefix_suffix_typography',
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-counter .pxl--counter-number .pxl--counter-suffix, {{WRAPPER}} .pxl-counter .pxl--counter-number .pxl--counter-prefix',
        ),
        array(
            'name' => 'duration',
            'label' => esc_html__('Animation Duration', 'digicove'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 2000,
            'min' => 100,
            'step' => 100,
        ),
        array(
            'name' => 'number_space_top',
            'label' => esc_html__('Top Spacer', 'digicove' ),
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
                '{{WRAPPER}} .pxl-counter .pxl--counter-number' => 'margin-top: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'number_space_bottom',
            'label' => esc_html__('Bottom Spacer', 'digicove' ),
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
                '{{WRAPPER}} .pxl-counter .pxl--counter-number' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'number_space_right',
            'label' => esc_html__('Right Spacer', 'digicove' ),
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
                '{{WRAPPER}} .pxl-counter .pxl--counter-number' => 'margin-right: {{SIZE}}{{UNIT}};',
            ],
        ),
    ),
),
digicove_widget_animation_settings(),
),
),
),
digicove_get_class_widget_path()
);