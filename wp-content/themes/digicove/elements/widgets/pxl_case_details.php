<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_case_details',
        'title' => esc_html__('Case Details BR', 'digicove'),
        'icon' => 'eicon-library-upload',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'digicove'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => 'Project Information',
                        ),
                        array(
                            'name' => 'items',
                            'label' => esc_html__('Content', 'digicove'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'label',
                                    'label' => esc_html__('Label', 'digicove' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'content',
                                    'label' => esc_html__('Content', 'digicove' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ label }}}',
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
                            '{{WRAPPER}} .pxl-project-detail1 .pxl--item' => 'text-align: {{VALUE}};',
                        ],
                    ),
                        array(
                            'name' => 'bottom_spacer',
                            'label' => esc_html__( 'Bottom Spacer', 'digicove' ),
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
                                '{{WRAPPER}} .pxl-project-detail1 .pxl--item + .pxl--item' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
),
array(
    'name' => 'section_style',
    'label' => esc_html__('Style', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'title_color',
            'label' => esc_html__('Title Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} h3' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_typography',
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} h3',
        ),
        array(
            'name' => 'sub_color',
            'label' => esc_html__('Sub Title Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl--item label' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'sub_typography',
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl--item label',
        ),
        array(
            'name' => 'sub_spacer_bottom',
            'label' => esc_html__('Sub Title Spacer Bottom', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl--item label' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'content_color',
            'label' => esc_html__('Content Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl--item span' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'content_typography',
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl--item span',
        ),
        array(
            'name' => 'border_color',
            'label' => esc_html__('Border Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl--item + .pxl--item' => 'border-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'border_spacer',
            'label' => esc_html__('Border Spacer', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl--item + .pxl--item' => 'margin-top: {{SIZE}}{{UNIT}}; padding-top: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'box_bg_color',
            'label' => esc_html__('Box Background Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-project-detail1' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'box_padding',
            'label' => esc_html__('Box Padding', 'digicove' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-project-detail1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'control_type' => 'responsive',
        ),
        array(
            'name' => 'box_border_radius',
            'label' => esc_html__('Box Border Radius', 'digicove' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-project-detail1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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