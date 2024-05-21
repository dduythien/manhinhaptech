<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_history',
        'title' => esc_html__('Pxl History', 'digicove'),
        'icon' => 'eicon-editor-link',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_layout',
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_history/img-layout/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'digicove' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_history/img-layout/layout2.jpg'
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
                            'name' => 'history',
                            'label' => esc_html__('History', 'digicove'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [                                
                                'layout' => '1',
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'time',
                                    'label' => esc_html__('Time', 'digicove'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'text',
                                    'label' => esc_html__('Text', 'digicove'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'decs',
                                    'label' => esc_html__('Description', 'digicove'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'color_item',
                                    'label' => esc_html__( 'Background Color', 'digicove' ),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                    'default' => '',
                                    'selectors' => [
                                        '{{WRAPPER}} {{CURRENT_ITEM}} .time' => 'background: {{VALUE}} !important;',
                                    ],
                                ),
                                array(
                                    'name' => 'color_item_shadow',
                                    'label' => esc_html__( 'Color Shadow', 'digicove' ),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                    'default' => '',
                                    'selectors' => [
                                        '{{WRAPPER}} {{CURRENT_ITEM}} .time:after' => 'background: {{VALUE}} !important;',
                                    ],
                                ),
                                array(
                                    'name' => 'space_bottom',
                                    'label' => esc_html__('Space Top', 'digicove' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'control_type' => 'responsive',
                                    'size_units' => [ 'px', '%' ],
                                    'range' => [
                                        'px' => [
                                            'min' => -100,
                                            'max' => 100,
                                        ],
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} {{CURRENT_ITEM}} ' => 'margin-bottom: {{SIZE}}{{UNIT}} !importaint;',
                                    ],
                                ),
                            ),
                            'title_field' => '{{{ text }}}',
                        ),
                        array(
                            'name' => 'history2',
                            'label' => esc_html__('History', 'digicove'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [                                
                                'layout' => '2',
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon', 'digicove' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'text2',
                                    'label' => esc_html__('Text', 'digicove'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'decs2',
                                    'label' => esc_html__('Description', 'digicove'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'space_bottom2',
                                    'label' => esc_html__('Space Top', 'digicove' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'control_type' => 'responsive',
                                    'size_units' => [ 'px', '%' ],
                                    'range' => [
                                        'px' => [
                                            'min' => -100,
                                            'max' => 100,
                                        ],
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} {{CURRENT_ITEM}} ' => 'margin-top: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                            ),
                            'title_field' => '{{{ text2 }}}',
                        ),
                    ),
),
array(
    'name' => 'section_style_link',
    'label' => esc_html__('Style', 'digicove'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
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
            'name' => 'height_line',
            'label' => esc_html__('Height Procces', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px', '%' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-history:before ' => 'height: {{SIZE}}{{UNIT}};',
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
            '{{WRAPPER}} .pxl-history .corner-box' => 'text-align: {{VALUE}};',
        ],
    ),
        array(
            'name' => 'time_color',
            'label' => esc_html__('Time Color ', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-history .wrap-content .time' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'time_typography',
            'label' => esc_html__('Time Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-history .wrap-content .time',
        ),  
        array(
            'name' => 'title_color',
            'label' => esc_html__('Title Color ', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-history .wrap-content  .title' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_typography',
            'label' => esc_html__('Title Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-history .wrap-content .title',
        ),
        array(
            'name' => 'desc_color',
            'label' => esc_html__('Description Color ', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-history .wrap-content .desc' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'desc_typography',
            'label' => esc_html__('Description Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-history .wrap-content .desc',
        ),
        array(
            'name' => 'line_color',
            'label' => esc_html__('Line Color ', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-history .line ' => 'background-color: {{VALUE}};',
                '{{WRAPPER}} .pxl-history:before ' => 'border-left-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'bottom_spacer',
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
                '{{WRAPPER}} .pxl-history li, {{WRAPPER}} .pxl-history .corner-box' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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