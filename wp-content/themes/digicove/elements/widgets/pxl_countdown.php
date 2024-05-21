<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_countdown',
        'title' => esc_html__('Countdown BR', 'digicove' ),
        'icon' => 'eicon-countdown',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'digicove-countdown',
        ),
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_countdown/img-layout/layout1.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'countdown_section',
                    'label' => esc_html__('Content', 'digicove' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'date',
                            'label' => esc_html__('Date', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('2040/10/10', 'digicove'),
                            'placeholder' => esc_html__( 'yy/mm/dd', 'digicove' ),
                            'label_block' => true,
                            'description' => esc_html__('Set date count down (Date format: yy/mm/dd)', 'digicove'),
                        ),
                        array(
                            'name' => 'day',
                            'label' => esc_html__('Days Text', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__( 'Days', 'digicove' ),
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'hour',
                            'label' => esc_html__('Hours Text', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__( 'Hours', 'digicove' ),
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'minute',
                            'label' => esc_html__('Minutes Text', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__( 'Minutes', 'digicove' ),
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'second',
                            'label' => esc_html__('Seconds Text', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__( 'Seconds', 'digicove' ),
                            'label_block' => true,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Title', 'digicove'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout' => ['2'],
                    ],
                    'controls' => array(
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
                            'default' => 'h5',
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__( 'Title Color', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-countdown2 .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_title_color',
                            'label' => esc_html__( 'Title Color (Dark Mode)', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-countdown2 .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'highlight_color',
                            'label' => esc_html__( 'Highlight Color', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-countdown2 .pxl-item--title .pxl-title--highlight' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_highlight_color',
                            'label' => esc_html__( 'Highlight Color (Dark Mode)', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-countdown2 .pxl-item--title .pxl-title--highlight' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'digicove' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-countdown2 .pxl-item--title',
                        ),
                        array(
                            'name' => 'title_margin',
                            'label' => esc_html__('Margin (px)', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-countdown2 .pxl-item--title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'pxl_animate_title',
                            'label' => esc_html__('Case Animate', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => digicove_widget_animate_v2(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'pxl_animate_delay_title',
                            'label' => esc_html__('Animate Delay', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                            'description' => esc_html__( 'Enter number. Default 0ms', 'digicove'),
                        ),
                        array(
                            'name' => 'pxl_animate_duration_title',
                            'label' => esc_html__('Animation Duration', 'digicove'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'min' => 0,
                            'step' => 0.1,
                            'default' => 1.2,
                            'description' => 'Default 1.2s',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_countdown',
                    'label' => esc_html__('Countdown', 'digicove'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'show_svg',
                            'label' => esc_html__('Pipe', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'svg-on' => esc_html__('Show', 'digicove' ),
                                'svg-off'  => esc_html__('Hidden', 'digicove' ),
                            ],
                            'default' => 'svg-off',
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'countdown_color',
                            'label' => esc_html__('Number Color', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .countdown-item .countdown-amount' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_countdown_color',
                            'label' => esc_html__('Number Color (Dark Mode)', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .countdown-item .countdown-amount' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'number_typography',
                            'label' => esc_html__('Number Typography', 'digicove' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .countdown-item .countdown-amount',
                        ),
                        array(
                            'name' => 'period_color',
                            'label' => esc_html__('Period Color', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .countdown-item .countdown-period' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_period_color',
                            'label' => esc_html__('Period Color (Dark Mode)', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .countdown-item .countdown-period' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'period_typography',
                            'label' => esc_html__('Period Typography', 'digicove' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .countdown-item .countdown-period',
                        ),
                        array(
                            'name' => 'dot_color',
                            'label' => esc_html__('Dot Color', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .countdown-item:after' => 'color: {{VALUE}};',
                            ],
                            'condition' => ['show_svg' => 'svg-off'],
                        ),
                        array(
                            'name' => 'darkmode_dot_color',
                            'label' => esc_html__('Dot Color (Dark Mode)', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .countdown-item:after' => 'color: {{VALUE}};',
                            ],
                            'condition' => ['show_svg' => 'svg-off'],
                        ),
                        array(
                            'name'  => 'dot_size',
                            'label' => esc_html__( 'Dot Size (px)', 'digicove' ),
                            'type'  => 'slider',
                            'range' => [
                                'px' => [
                                    'min' => 15,
                                    'max' => 300,
                                ],
                            ],
                            'condition' => ['show_svg' => 'svg-off'],
                            'selectors' => [
                                '{{WRAPPER}} .countdown-item:after' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'svg_color',
                            'label' => esc_html__('SVG Color', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .countdown-item-inner svg' => 'fill: {{VALUE}};',
                            ],
                            'condition' => ['show_svg' => 'svg-on'],
                        ),
                        array(
                            'name' => 'darkmode_svg_color',
                            'label' => esc_html__('SVG Color (Dark Mode)', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .countdown-item-inner svg' => 'fill: {{VALUE}};',
                            ],
                            'condition' => ['show_svg' => 'svg-on'],
                        ),
                        array(
                            'name' => 'svg_size',
                            'label' => esc_html__( 'SVG Size', 'digicove' ),
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
                                '{{WRAPPER}} .countdown-item-inner' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}}; border-radius: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => ['show_svg' => 'svg-on'],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'countdown_bg_color',
                            'label' => esc_html__( 'Countdown Background Color', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-countdown' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_countdown_bg_color',
                            'label' => esc_html__('Countdown Background Color (Dark Mode)', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-countdown' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'countdown_padding',
                            'label' => esc_html__('Countdown Padding', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'default' => [
                                'unit' => 'px',
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-countdown' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'c_width',
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
                                '{{WRAPPER}} .pxl-countdown-wrap .pxl-countdown' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'pxl_animate',
                            'label' => esc_html__('Case Animate', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => digicove_widget_animate_v2(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'pxl_animate_delay',
                            'label' => esc_html__('Animate Delay', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                            'description' => esc_html__( 'Enter number. Default 0ms', 'digicove'),
                        ),
                        array(
                            'name' => 'pxl_animate_duration',
                            'label' => esc_html__('Animation Duration', 'digicove'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'min' => 0,
                            'step' => 0.1,
                            'default' => 1.2,
                            'description' => 'Default 1.2s',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_box',
                    'label' => esc_html__('Box', 'digicove'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__('Border Color', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-countdown-wrap' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_border_color',
                            'label' => esc_html__('Border Color (Dark Mode)', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-countdown-wrap' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_padding',
                            'label' => esc_html__('Box Padding', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'default' => [
                                'unit' => 'px',
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-countdown-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    digicove_get_class_widget_path()
);