<?php
if(class_exists('WPCF7')) {
    $cf7 = get_posts('post_type="wpcf7_contact_form"&numberposts=-1');

    $contact_forms = array();
    if ($cf7) {
        foreach ($cf7 as $cform) {
            $contact_forms[$cform->ID] = $cform->post_title;
        }
    } else {
        $contact_forms[esc_html__('No contact forms found', 'digicove')] = 0;
    }

    pxl_add_custom_widget(
        array(
            'name' => 'pxl_contact_form',
            'title' => esc_html__('Contact Form Pxl', 'digicove'),
            'icon' => 'eicon-form-horizontal',
            'categories' => array('pxltheme-core'),
            'params' => array(
                'sections' => array(
                    array(
                        'name' => 'tab_content',
                        'label' => esc_html__('Content', 'digicove'),
                        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                        'controls' => array(
                            array(
                                'name' => 'style',
                                'label' => esc_html__('Style', 'digicove' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'default' => esc_html__('Default', 'digicove' ),
                                    'contact-border'  => esc_html__('Border', 'digicove' ),
                                ],
                                'default' => 'default',
                            ),
                            array(
                                'name' => 'form_id',
                                'label' => esc_html__('Select Form', 'digicove'),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => $contact_forms,
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
                                    '{{WRAPPER}} .pxl-contact-form' => 'max-width: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'text_color',
                                'label' => esc_html__('Color', 'digicove' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .wpcf7-form' => 'color: {{VALUE}};',
                                    '{{WRAPPER}} .wpcf7-form label' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'show_title',
                                'label' => esc_html__('Show Title', 'digicove' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'title-on' => esc_html__('Show', 'digicove' ),
                                    'title-off'  => esc_html__('Hidden', 'digicove' ),
                                ],
                                'default' => 'title-off',
                            ),
                            array(
                                'name' => 'title',
                                'label' => esc_html__('Title', 'digicove' ),
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'label_block' => true,
                                'condition' => ['show_title' => 'title-on'],
                            ),
                            array(
                                'name' => 'title_typography',
                                'label' => esc_html__('Typography', 'digicove' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-contact-form .pxl-item--title',
                                'condition' => ['show_title' => 'title-on'],
                            ),
                            array(
                                'name' => 'show_sub_title',
                                'label' => esc_html__('Show Sub Title', 'digicove' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'sub-title-on' => esc_html__('Show', 'digicove' ),
                                    'sub-title-off'  => esc_html__('Hidden', 'digicove' ),
                                ],
                                'default' => 'sub-title-off',
                            ),
                            array(
                                'name' => 'sub_title',
                                'label' => esc_html__('Sub Title', 'digicove' ),
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'label_block' => true,
                                'condition' => ['show_sub_title' => 'sub-title-on'],
                            ),
                            array(
                                'name' => 'sub_title_typography',
                                'label' => esc_html__('Typography', 'digicove' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-contact-form .pxl-item--sub-title',  
                                'condition' => ['show_sub_title' => 'sub-title-on'],                                                            
                            ),
                        ),
),
array(
    'name' => 'tab_style_input',
    'label' => esc_html__('Input', 'digicove'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'input_typography',
            'label' => esc_html__('Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight',
        ),
        array(
            'name' => 'input_color',
            'label' => esc_html__('Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'input_bg_color',
            'label' => esc_html__('Background Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'input_padding',
            'label' => esc_html__('Padding Input', 'digicove' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-textarea), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'control_type' => 'responsive',
        ),
        array(
            'name' => 'input_border_radius',
            'label' => esc_html__('Border Radius', 'digicove' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select .pxl-select-higthlight' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
        array(
            'name'         => 'input_box_shadow',
            'label' => esc_html__( 'Box Shadow', 'digicove' ),
            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
            'control_type' => 'group',
            'selector'     => '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select .pxl-select-higthlight'
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
                '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select .pxl-select-higthlight' => 'border-style: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'border_width',
            'label' => esc_html__( 'Border Width', 'digicove' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'selectors' => [
                '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select .pxl-select-higthlight' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select .pxl-select-higthlight' => 'border-color: {{VALUE}} !important;',
            ],
            'condition' => [
                'border_type!' => '',
            ],
        ),
        array(
            'name' => 'input_height',
            'label' => esc_html__('Input Height', 'digicove' ),
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
                '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-textarea), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'textarea_height',
            'label' => esc_html__('Textarea Height', 'digicove' ),
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
                '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control.wpcf7-textarea' => 'height: {{SIZE}}{{UNIT}} !important;',
            ],
        ),
        array(
            'name' => 'textarea_padding',
            'label' => esc_html__('Padding Textarea', 'digicove' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control.wpcf7-textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'control_type' => 'responsive',
        ),
        array(
            'name' => 'input_spacer_bottom',
            'label' => esc_html__('Spacer Bottom', 'digicove' ),
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
                '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control-wrap' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
        ),
    ),
),
array(
    'name' => 'tab_style_button',
    'label' => esc_html__('Button', 'digicove'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'btn-w-auto',
            'label' => esc_html__('Button Typography', 'digicove' ),
            'type' => 'switcher',
            'default' => 'false'
        ),
        array(
            'name' => 'button_typography',
            'label' => esc_html__('Button Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-contact-form .btn, {{WRAPPER}} .pxl-contact-form button',
        ),
        array(
            'name'         => 'btn_gradient',
            'label' => esc_html__( 'Background Type', 'digicove' ),
            'type'         => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types' => [ 'gradient' ],
            'selector'     => '{{WRAPPER}} .pxl-contact-form .btn',
        ),                        
        array(
            'name' => 'button_padding',
            'label' => esc_html__('Padding', 'digicove' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-contact-form .btn, {{WRAPPER}} .pxl-contact-form button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'control_type' => 'responsive',
        ),
        array(
            'name' => 'button_border_radius',
            'label' => esc_html__('Border Radius', 'digicove' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-contact-form .btn, {{WRAPPER}} .pxl-contact-form button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
        array(
            'name'         => 'button_box_shadow',
            'label' => esc_html__( 'Box Shadow', 'digicove' ),
            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
            'control_type' => 'group',
            'selector'     => '{{WRAPPER}} .pxl-contact-form .btn, {{WRAPPER}} .pxl-contact-form button'
        ),
    ),
),
digicove_widget_animation_settings()
),
),
),
digicove_get_class_widget_path()
);
}