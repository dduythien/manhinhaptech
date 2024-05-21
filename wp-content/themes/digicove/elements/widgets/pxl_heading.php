<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_heading',
        'title' => esc_html__('Heading Pxl', 'digicove' ),
        'icon' => 'eicon-heading',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__( 'Content', 'digicove' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'source_type',
                            'label' => esc_html__( 'Source Type', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'text' => 'Text',
                                'title' => 'Page Title',
                            ],
                            'default' => 'text',
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__( 'Title', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                            'description' => 'Create highlight text width shortcode: [highlight text="Text Demo"]',
                            'condition' => [
                                'source_type' => ['text'],
                            ],                            
                        ),
                        array(
                            'name' => 'highlight_color_text',
                            'label' => esc_html__( 'Highlight Color', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title .pxl-title--highlight' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'highlight_color_gradient',
                            'label' => esc_html__( 'Highlight Color Gradient', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title .pxl-title--highlight' => 'background: -webkit-linear-gradient(90deg, var(--primary-color) 0%, {{VALUE}} 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;',
                            ],
                        ),
                        array(
                            'name' => 'highlight_color_text_typography',
                            'label' => esc_html__('Highlight Typography', 'digicove' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-heading .pxl-item--title .pxl-title--highlight',
                        ),    
                        array(
                            'name' => 'title_absolute_check',
                            'label' => esc_html__('Title Number', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',            
                        ),
                        array(
                            'name' => 'title_absolute',
                            'label' => esc_html__( 'Title Number', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,                            
                            'condition' => [
                                'source_type' => ['text'],
                                'title_absolute_check' => 'true'
                            ],                            
                        ),
                        array(
                            'name' => 'sub_title',
                            'label' => esc_html__( 'Sub Title', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
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
                            '{{WRAPPER}} .pxl-heading' => 'text-align: {{VALUE}};',
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
                                '{{WRAPPER}} .pxl-heading .pxl-heading--inner' => 'max-width: {{SIZE}}{{UNIT}};',
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
            'name' => 'title_split_text_anm',
            'label' => esc_html__('Split Text Animation', 'digicove' ),
            'type' => 'select',
            'options' => [
                ''               => esc_html__( 'None', 'digicove' ),
                'split-in-fade' => esc_html__( 'In Fade', 'digicove' ),
                'split-in-right' => esc_html__( 'In Right', 'digicove' ),
                'split-in-left'  => esc_html__( 'In Left', 'digicove' ),
                'split-in-up'    => esc_html__( 'In Up', 'digicove' ),
                'split-in-down'  => esc_html__( 'In Down', 'digicove' ),
                'split-in-rotate'  => esc_html__( 'In Rotate', 'digicove' ),
                'split-in-scale'  => esc_html__( 'In Scale', 'digicove' ),
            ],
            'default' => '',
        ),
        array(
            'name' => 'title_gradient',
            'label' => esc_html__('Title Gradient', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'false',            
        ),
        array(
            'name' => 'title_color_gradient',
            'label' => esc_html__( 'Title Color Gradient', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-heading .pxl-item--title' => 'background: -webkit-linear-gradient(90deg, var(--primary-color) 0%, {{VALUE}} 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;',
            ],
            'condition' => [
                'title_gradient' => 'true',
            ],
        ),
        array(
            'name' => 'title_color',
            'label' => esc_html__( 'Title Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-heading .pxl-item--title' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_typography',
            'label' => esc_html__('Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-heading .pxl-item--title',
        ),       
        array(
            'name'         => 'title_box_shadow',
            'label' => esc_html__( 'Title Shadow', 'digicove' ),
            'type'         => \Elementor\Group_Control_Text_Shadow::get_type(),
            'control_type' => 'group',
            'selector'     => '{{WRAPPER}} .pxl-heading .pxl-item--title'
        ),
        array(
            'name' => 'title_space_bottom',
            'label' => esc_html__('Bottom Spacer', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'default' => [
                'size' => 0,
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-heading .pxl-item--title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
            'separator' => 'after',
        ),
        array(
            'name' => 'divider',
            'label' => esc_html__('Divider Position', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'divider-none' => esc_html__( 'None', 'digicove' ),
                'divider-left' => esc_html__( 'Top', 'digicove' ),
                'divider-right' => esc_html__( 'Bottom', 'digicove' ),
            ],
            'default' => 'divider-none',
        ),
        array(
          'name' => 'align_divider',
          'label' => esc_html__( 'Alignment', 'digicove' ),
          'type' => \Elementor\Controls_Manager::CHOOSE,
          'control_type' => 'responsive',
          'options' => [
            '0' => [
                'title' => esc_html__( 'Left', 'digicove' ),
                'icon' => 'eicon-text-align-left',
            ],
            '50%' => [
                'title' => esc_html__( 'Center', 'digicove' ),
                'icon' => 'eicon-text-align-center',
            ],
        ],
        'selectors' => [
            '{{WRAPPER}} .pxl-heading .pxl-item--title:after' => 'left: {{VALUE}};transform: translateX(-50%);',
        ],
    ),
        array(
            'name' => 'divider_color',
            'label' => esc_html__('Divider Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-heading .pxl-item--title:before' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'style' => ['divider-left', 'divider-right'],
            ],
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
    ),
),
array(
    'name' => 'section_style_title_sub',
    'label' => esc_html__('Sub Title', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'sub_title_color',
            'label' => esc_html__('Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'color: {{VALUE}};',
                '{{WRAPPER}} .pxl-heading .pxl-item--subtitle span' => 'color: {{VALUE}}; text-fill-color: {{VALUE}}; -webkit-text-fill-color: {{VALUE}}; background-image: none;',
            ],
        ),
        array(
            'name' => 'sub_title_bg_color',
            'label' => esc_html__('Background Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-heading .pxl-heading--inner .pxl-item--subtitle::after' => 'background: {{VALUE}};opacity: 1;',                
            ],
        ),
        array(
            'name'         => 'sub_title_bg_gradient',
            'label' => esc_html__( 'Background Type', 'digicove' ),
            'type'         => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types' => [ 'gradient' ],
            'selector'     => '{{WRAPPER}} .pxl-heading .pxl-item--subtitle::after',
        ),
        array(
            'name' => 'sub_title_space_bottom',
            'label' => esc_html__('Bottom Spacer', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'default' => [
                'size' => 0,
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-heading .pxl-item--subtitle ' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
            'separator' => 'after',
        ),
        array(
            'name' => 'sub_title_border_radius',
            'label' => esc_html__('Border Radius', 'digicove' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-heading .pxl-item--subtitle::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'sub_title_typography',
            'label' => esc_html__('Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-heading .pxl-item--subtitle span',
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
                '{{WRAPPER}} .pxl-heading .pxl-item--subtitle::after' => 'border-style: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'border_width',
            'label' => esc_html__( 'Border Width', 'digicove' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'selectors' => [
                '{{WRAPPER}} .pxl-heading .pxl-item--subtitle::after' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                '{{WRAPPER}} .pxl-heading .pxl-item--subtitle::after' => 'border-color: {{VALUE}} !important;',
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
                '{{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'control_type' => 'responsive',
        ),
        array(
            'name' => 'pxl_animate_sub',
            'label' => esc_html__( 'Case Animate', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => digicove_widget_animate(),
            'default' => '',
        ),
        array(
            'name' => 'pxl_animate_delay_sub',
            'label' => esc_html__('Animate Delay', 'digicove' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '0',
            'description' => esc_html__( 'Enter number. Default 0ms', 'digicove' ),
        ),
    ),
),
array(
    'name' => 'section_style_title_number',
    'label' => esc_html__('Title Number', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'condition' => [        
        'title_absolute_check' => 'true'
    ],    
    'controls' => array(
        array(
            'name' => 'title_gradient_number',
            'label' => esc_html__('Title Gradient', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'false',            
        ),
        array(
            'name' => 'title_color_gradient_number',
            'label' => esc_html__( 'Title Color Gradient', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-heading .title-absolute' => 'background: -webkit-linear-gradient(90deg, {{VALUE}} 0%, #FFB06D 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;',
            ],
            'condition' => [
                'title_gradient' => 'true',
            ],
        ),
        array(
            'name' => 'title_color_number',
            'label' => esc_html__( 'Title Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-heading .title-absolute' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_typography_number',
            'label' => esc_html__('Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-heading .title-absolute',
        ),        
        array(
            'name' => 'title_space_bottom_number',
            'label' => esc_html__('Bottom Spacer', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'default' => [
                'size' => 0,
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-heading .title-absolute' => 'bottom: {{SIZE}}{{UNIT}};',
            ],
            'separator' => 'after',
        ),  
        array(
            'name' => 'title_space_right_number',
            'label' => esc_html__('Right Spacer', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'default' => [
                'size' => 0,
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-heading .title-absolute' => 'right: {{SIZE}}{{UNIT}};',
            ],
            'separator' => 'after',
        ),        
    ),
),
array(
    'name' => 'highlight_section',
    'label' => esc_html__('Highlight Text', 'digicove' ),
    'tab' => 'content',
    'controls' => array_merge(
        array(
            array(
                'name' => 'text_list',
                'label' => esc_html__('Text List', 'digicove'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'controls' => array(
                    array(
                        'name' => 'highlight_text',
                        'label' => esc_html__('Text', 'digicove'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'label_block' => true,
                    ),
                ),
                'title_field' => '{{{ highlight_text }}}',
            ),
            array(
                'name' => 'highlight_color_1',
                'label' => esc_html__('Random Text Color', 'digicove' ),
                'type' => 'color',
                'selectors' => [
                    '{{WRAPPER}} .pxl-heading-wrap .heading-highlight' => 'color: {{VALUE}};',
                ],
            ),
            array(
                'name' => 'highlight_typography',
                'label' => esc_html__('Highlight Typography', 'digicove' ),
                'type' => \Elementor\Group_Control_Typography::get_type(),
                'control_type' => 'group',
                'selector' => '{{WRAPPER}} .pxl-heading .heading-highlight, {{WRAPPER}} .pxl-heading .typed-cursor, {{WRAPPER}} .pxl-heading .heading-highlight span',
            ),
        )
    ),
),
array(
    'name' => 'section_style_title_highlight',
    'label' => esc_html__('Highlight', 'digicove' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'highlight_style',
            'label' => esc_html__('Style', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'highlight-default' => 'Default',
                'highlight-text-gradient' => 'Text Gradient',
            ],
            'default' => 'highlight-default',
        ), 
        array(
            'name' => 'highlight_color',
            'label' => esc_html__('Highlight Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-heading .heading-highlight' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'highlight_style' => ['highlight-default'],
            ],
        ),
        array(
            'name' => 'highlight_bg_color',
            'label' => esc_html__('Highlight Background Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-heading .heading-highlight' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'highlight_style' => ['highlight-default'],
            ],
        ),
        array(
            'name' => 'hl_margin',
            'label' => esc_html__('Margin', 'digicove' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
             '{{WRAPPER}} .pxl-heading .heading-highlight' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
         ],
         'control_type' => 'responsive',
     ),
        array(
            'name' => 'hl_margin_curser',
            'label' => esc_html__('Margin Curser', 'digicove' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
             '{{WRAPPER}} .pxl-heading .typed-cursor' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
         ],
         'control_type' => 'responsive',
     ),
        array(
            'name' => 'hl_border_radius',
            'label' => esc_html__('Border Radius', 'digicove' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-heading .heading-highlight'  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
    ),
),
),
),
),
digicove_get_class_widget_path()
);