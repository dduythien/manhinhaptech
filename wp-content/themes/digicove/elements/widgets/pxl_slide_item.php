<?php 
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
pxl_add_custom_widget(
    array(
        'name'       => 'pxl_slider_item',
        'title'      => esc_html__('PXL Slider Item', 'digicove'),
        'icon'       => 'eicon-slideshow',
        'categories' => array('pxltheme-core'),
        'params'     => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__('Layout', 'digicove' ),
                    'tab'      => 'layout',
                    'controls' => array(
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__('Templates', 'digicove' ),
                            'type'    => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'digicove' ),
                                    'image' => get_template_directory_uri() . '//elements/templates/pxl_slider_item/img-layout/layout1.jpg'
                                ],
                            ],
                            'prefix_class' => 'pxl-slider-item-'
                        )
                    ),
                ), 
                array(
                    'name'     => 'slide_settings',
                    'label'    => esc_html__('Slider Settings', 'digicove'),
                    'tab'      => 'settings',
                    'controls' => array(
                        array(
                            'name'    => 'slider_type',
                            'label'   => esc_html__( 'Slider Style', 'digicove' ),
                            'type'    => 'select',
                            'default' => 'default',
                            'options' => [
                                'default'        => esc_html__( 'Default', 'digicove' ),
                                'image-right'  => esc_html__( 'Image Right', 'digicove' ),
                            ]
                        ),
                        array(
                            'label'        => esc_html__('Slider Height', 'digicove'), 
                            'name'         => 'slider_height',
                            'size_units'   => [ 'px', 'vh' ],
                            'type'         => 'slider',
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' =>  270,
                                    'max' => 1600,
                                ],
                                '100vh' => [
                                    'min' =>  10,
                                    'max' =>  100,
                                ],
                            ],
                            'selectors'    => [
                                '{{WRAPPER}} .pxl-slide-item-wrap, {{WRAPPER}} .slide-content-wrap > div' => 'height:{{SIZE}}{{UNIT}}'
                            ],
                        ),
                        array(
                            'name'  => 'slider_width',
                            'label' => esc_html__( 'Slider Width', 'digicove' ),
                            'type'  => 'slider',
                            'control_type' => 'responsive',
                            'size_units'   => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' =>  270,
                                    'max' => 1600,
                                ],
                                '%' => [
                                    'min' =>  10,
                                    'max' =>  100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slide-item-wrap>.container' => 'max-width: {{SIZE}}{{UNIT}} !important;',
                            ] 
                        ),
                        array(
                          'name' => 'align_slider',
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
                            '{{WRAPPER}} .slide-content-wrap' => 'text-align: {{VALUE}};justify-content: {{VALUE}};',
                        ],
                    ),
                        array(
                            'name'         => 'let_it_snow',
                            'label'        => esc_html__('Particle Effect', 'digicove'),
                            'type'         => 'select',
                            'options'      => [
                                'default'     => esc_html__('Default', 'digicove'),
                                'let-it-snow'      => esc_html__('Let it snow','digicove'),
                            ], 
                            'default'      => 'default', 
                        ),
                        array(
                            'name'      => 'ken_burns',
                            'label'     => esc_html__( 'Ken Burns Effect', 'digicove' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'frontend_available' => true,
                        ),
                        array(
                            'name'         => 'ken_burns_direction',
                            'label'        => esc_html__('Direction', 'digicove'),
                            'type'         => 'select',
                            'default' => 'in',
                            'options' => [
                                'in' => esc_html__( 'In', 'digicove' ),
                                'out' => esc_html__( 'Out', 'digicove' ),
                            ],
                            'frontend_available' => true,
                        ),
                        array(
                            'name' => 'content_margin',
                            'label' => esc_html__('Content Margin', 'digicove' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .sl-content-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name'        => 'bg_image',
                            'label'       => esc_html__('Slide Background Image', 'digicove'),
                            'type'        => 'media',
                            'label_block' => true
                        ),
                        array(
                            'name'        => 'overlay_bg_image',
                            'label'       => esc_html__('Overlay Background Image', 'digicove'),
                            'type'        => 'media',  
                            'url'         => '',
                            'label_block' => true
                        ),
                        array(
                            'name'        => 'bg_color',
                            'label'       => esc_html__( 'Background Overlay Color', 'digicove' ),
                            'type'        => 'color',
                            'control_type' => 'responsive',
                            'selectors'  => [
                                '{{WRAPPER}} .mask-ovl, {{WRAPPER}} .overlay-color' => 'background:{{VALUE}};'
                            ]
                        ),
                        array(
                            'name'      => 'overlay_bg_animation',
                            'label'     => esc_html__( 'Overlay Motion Effect', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => digicove_widget_animate(),
                            'default' => '',
                        ),
                        array(
                            'name'      => 'overlay_bg_animation_delay',
                            'label'     => esc_html__( 'Overlay Transition Delay', 'digicove' ),
                            'type'      => 'text',
                        ),
                    )
),  
array(
    'name'     => 'slide_large_heading',
    'label'    => esc_html__('Heading', 'digicove'),
    'tab'      => 'content',
    'controls' => array(  
        array(
            'name' => 'large_heading',
            'label' => '',
            'type' => Controls_Manager::WYSIWYG,
            'default' => esc_html__( 'DigiCove SEO Services Boost Your Online Presence', 'digicove' ),
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
            '{{WRAPPER}} .large-heading' => 'text-align: {{VALUE}};justify-content: {{VALUE}};',
        ],
    ),
        array(
            'name'        => 'large_heading_color',
            'label'       => esc_html__( 'Color', 'digicove' ),
            'type'        => 'color',
            'control_type' => 'responsive',
            'selectors'  => [
                '{{WRAPPER}} .large-heading' => 'color:{{VALUE}};'
            ]
        ),
        array(
            'name'        => 'large_heading_color_link',
            'label'       => esc_html__( 'Link Color', 'digicove' ),
            'type'        => 'color',
            'control_type' => 'responsive',
            'selectors'  => [
                '{{WRAPPER}} .large-heading a' => 'color:{{VALUE}};'
            ]
        ),
        array(
            'name'        => 'large_heading_bg_color',
            'label'       => esc_html__( 'Background Color', 'digicove' ),
            'type'        => 'color',
            'control_type' => 'responsive',
            'selectors'  => [
                '{{WRAPPER}} .large-heading' => 'background-color:{{VALUE}};'
            ]
        ),
        array(
            'name'  => 'large_heading_width',
            'label' => esc_html__( 'Width', 'digicove' ),
            'type'  => 'slider',
            'control_type' => 'responsive',
            'size_units'   => [ 'px', '%' ],
            'range' => [
                'px' => [
                    'min' =>  270,
                    'max' => 1600,
                ],
                '%' => [
                    'min' =>  10,
                    'max' =>  100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .large-heading' => 'max-width: {{SIZE}}{{UNIT}};',
            ] 
        ),
        array(
            'name'         => 'large_heading_typo',
            'type'         => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector'     => '{{WRAPPER}} .large-heading'
        ),
        array(
            'name'         => 'large_heading_shadow',
            'type'         => \Elementor\Group_Control_Text_Shadow::get_type(),
            'control_type' => 'group',
            'selector'     => '{{WRAPPER}} .large-heading'
        ),
        array(
            'name' => 'large_heading_space',
            'label' => esc_html__('Heading Margin(px)', 'digicove' ),
            'type' => 'dimensions',
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .large-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'large_heading_space_padding',
            'label' => esc_html__('Heading Padding(px)', 'digicove' ),
            'type' => 'dimensions',
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .large-heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
        array(
            'name'      => 'large_heading_animation',
            'label'     => esc_html__( 'Motion Effect', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => digicove_widget_animate(),
            'default' => '',
        ),
        array(
            'name'      => 'large_heading_animation_delay',
            'label'     => esc_html__( 'Transition Delay', 'digicove' ),
            'type'      => 'text'
        ),
    ),
),   
array(
    'name'     => 'slide_small_heading',
    'label'    => esc_html__('Sub Heading', 'digicove'),
    'tab'      => 'content',
    'controls' => array(
        array(
            'name'        => 'small_heading',
            'label'       => esc_html__('Sub Heading','digicove'),
            'type'        => 'textarea',
            'placeholder' => esc_html__( 'Enter your text', 'digicove' ),
            'label_block' => true,
        ),
        array(
            'name'        => 'small_heading_color',
            'label'       => esc_html__( 'Color', 'digicove' ),
            'type'        => 'color',
            'control_type' => 'responsive',
            'selectors'  => [
                '{{WRAPPER}} .small-heading' => 'color:{{VALUE}};'
            ]
        ), 
        array(
            'name'        => 'small_heading_stroke_color',
            'label'       => esc_html__( 'Stroke Color', 'digicove' ),
            'type'        => 'color',
            'control_type' => 'responsive',
            'selectors'  => [
                '{{WRAPPER}} .small-heading' => '-webkit-text-stroke-color:{{VALUE}};'
            ]
        ), 
        array(
            'name'         => 'small_heading_typo',
            'type'         => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector'     => '{{WRAPPER}} .small-heading'
        ),
        array(
            'name' => 'small_heading_space',
            'label' => esc_html__('Sub Heading Margin(px)', 'digicove' ),
            'type' => 'dimensions',
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .small-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
        array(
            'name'        => 'small_heading_animation',
            'label'       => esc_html__( 'Motion Effect', 'digicove' ),
            'type'        => 'animation',
            'label_block' => false,
        ),
        array(
            'name'      => 'small_heading_animation_delay',
            'label'     => esc_html__( 'Transition Delay', 'digicove' ),
            'type'      => 'text'
        ),
        array(
            'name'      => 'small_heading_custom_cls',
            'label'     => esc_html__( 'Custom Class', 'digicove' ),
            'type'      => 'text'
        ),
    ),    
), 
array(
    'name'     => 'slide_desc',
    'label'    => esc_html__('Description', 'digicove'),
    'tab'      => 'content',
    'controls' => array(
        array(
            'name'        => 'desc',
            'label'       => esc_html__('Description','digicove'),
            'type'        => 'textarea',
            'placeholder' => esc_html__( 'Enter your text', 'digicove' ),
            'label_block' => true,
        ),
        array(
            'name'        => 'desc_color',
            'label'       => esc_html__( 'Color', 'digicove' ),
            'type'        => 'color',
            'control_type' => 'responsive',
            'selectors'  => [
                '{{WRAPPER}} .desc' => 'color:{{VALUE}};'
            ]
        ),
        array(
            'name'  => 'desc_width',
            'label' => esc_html__( 'Description Width', 'digicove' ),
            'type'  => 'slider',
            'control_type' => 'responsive',
            'size_units'   => [ 'px', '%' ],
            'range' => [
                'px' => [
                    'min' =>  270,
                    'max' => 1600,
                ],
                '%' => [
                    'min' =>  10,
                    'max' =>  100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .desc' => 'max-width: {{SIZE}}{{UNIT}};',
            ] 
        ),
        array(
            'name'         => 'description_typo',
            'type'         => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector'     => '{{WRAPPER}} .desc'
        ),
        array(
            'name' => 'desc_space',
            'label' => esc_html__('Description Margin(px)', 'digicove' ),
            'type' => 'dimensions',
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
        array(
            'name'      => 'desc_animation',
            'label'     => esc_html__( 'Motion Effect', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => digicove_widget_animate(),
            'default' => '',
        ),
        array(
            'name'      => 'desc_animation_delay',
            'label'     => esc_html__( 'Transition Delay', 'digicove' ),
            'type'      => 'text',
        ),
    ),
), 
array(
    'name'     => 'slide_btn1',
    'label'    => esc_html__('Button 1', 'digicove'),
    'tab'      => 'content',
    'controls' => array(
        array(
            'name'      => 'btn1_text',
            'label'     => esc_html__( 'Button text', 'digicove' ),
            'type'      => \Elementor\Controls_Manager::TEXT,
            'default'   => esc_html__('About us','digicove'),
        ),
        array(
            'name' => 'btn1_link',
            'label' => esc_html__('Button Link', 'digicove' ),
            'type' => \Elementor\Controls_Manager::URL,
            'placeholder' => esc_html__('https://your-link.com', 'digicove' ),
            'default' => [
                'url' => '',
            ],
        ),
        array(
            'name'             => 'btn1_icon',
            'label'            => esc_html__( 'Button Icon', 'digicove' ),
            'type'             => 'icons',
            'default'          => [],
        ),
        array(
            'name' => 'btn1_icon_align',
            'label' => esc_html__('Icon Position', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'right',
            'options' => [
                'right' => esc_html__('After', 'digicove' ),
                'left' => esc_html__('Before', 'digicove' ),
            ]
        ),
        array(
            'name' => 'button_slider_align',
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
                '{{WRAPPER}} .pxl-inner-box' => 'text-align: {{VALUE}};justify-content: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'btn_border_radius',
            'label' => esc_html__('Border Radius', 'digicove' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .sl-content-inner .btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'btn1_padding',
            'label' => esc_html__('Padding', 'digicove' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .sl-content-inner .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'control_type' => 'responsive',
        ),
        array(
            'name' => 'btn1_margin',
            'label' => esc_html__('Margin(px)', 'digicove' ),
            'type' => 'dimensions',
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .sl-content-inner .btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'name' => 'btn1_typography',
            'label' => esc_html__('Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .sl-content-inner .btn',
        ),
        array(
            'name' => 'btn1_color',
            'label' => esc_html__('Text Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sl-content-inner .btn' => 'color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'btn1_color_hover',
            'label' => esc_html__('Text Color Hover', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sl-content-inner .btn:hover' => 'color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'btn1_bg_color',
            'label' => esc_html__('Background Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sl-content-inner .btn' => 'background: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'btn1_bg_color_hover',
            'label' => esc_html__('Background Color Hover', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sl-content-inner .btn:hover, {{WRAPPER}} .sl-content-inner .btn:focus' => 'background: {{VALUE}} !important;',
            ],
        ),
        array(
            'name'         => 'btn_gradient',
            'label' => esc_html__( 'Background Type', 'digicove' ),
            'type'         => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types' => [ 'gradient' ],
            'selector'     => '{{WRAPPER}} .sl-content-inner .btn',
        ),
        array(
            'name'      => 'btn1_animation',
            'label'     => esc_html__( 'Motion Effect', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => digicove_widget_animate(),
            'default' => '',
        ),
        array(
            'name'      => 'btn1_animation_delay',
            'label'     => esc_html__( 'Transition Delay', 'digicove' ),
            'type'      => 'text',
        ),
    ),
),
array(
    'name'     => 'slide_image',
    'label'    => esc_html__('Image', 'digicove'),
    'tab'      => 'content',
    'condition' => ['slider_type' => 'image-right'],
    'controls' => array(
        array(
            'name'        => 'bg_image_slider',
            'label'       => esc_html__('Background Image', 'digicove'),
            'type'        => 'media',
            'default'           => '',
            'label_block' => true
        ),
        array(
            'name'        => 'bg_image_slider_after',
            'label'       => esc_html__('Background Image After', 'digicove'),
            'type'        => 'media',
            'default'           => '',
            'label_block' => true
        ),
        array(
            'label'        => esc_html__('Image Height', 'digicove'), 
            'name'         => 'image_height',
            'size_units'   => [ 'px', 'vh' ],
            'type'         => 'slider',
            'control_type' => 'responsive',
            'range' => [
                'px' => [
                    'min' =>  270,
                    'max' => 1600,
                ],
                '100vh' => [
                    'min' =>  10,
                    'max' =>  100,
                ],
            ],
            'selectors'    => [
                '{{WRAPPER}} .pxl-slide-item-wrap .pxl-slide-bg-right' => 'height:{{SIZE}}{{UNIT}}'
            ],
        ),
        array(
            'name'  => 'image_width',
            'label' => esc_html__( 'Image Width', 'digicove' ),
            'type'  => 'slider',
            'control_type' => 'responsive',
            'size_units'   => [ 'px', '%' ],
            'range' => [
                'px' => [
                    'min' =>  270,
                    'max' => 1600,
                ],
                '%' => [
                    'min' =>  10,
                    'max' =>  100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-slide-item-wrap .pxl-slide-bg-right' => 'width: {{SIZE}}{{UNIT}}',
            ] 
        ),
        array(
            'name' => 'slider_img_padding',
            'label' => esc_html__('Padding', 'digicove' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-slide-item-wrap .pxl-slide-bg-right' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'control_type' => 'responsive',
        ),
        array(
            'name' => 'slider_img_margin',
            'label' => esc_html__('Margin(px)', 'digicove' ),
            'type' => 'dimensions',
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-slide-item-wrap .pxl-slide-bg-right' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
        array(
            'name'      => 'slider_img_animation',
            'label'     => esc_html__( 'Motion Effect', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => digicove_widget_animate(),
            'default' => '',
        ),
        array(
            'name'      => 'slider_img_animation_delay',
            'label'     => esc_html__( 'Transition Delay', 'digicove' ),
            'type'      => 'text',
        ),
    ),
),
array(
    'name'     => 'video_player',
    'label'    => esc_html__('Video Player', 'digicove'),
    'tab'      => 'content',
    'controls' => array_merge(
        array(
            array(
                'name' => 'video_link',
                'label' => esc_html__('Video URL', 'digicove'),
                'description' => '(https://www.youtube.com/watch?v=r2YbkyYA9Gc)',
                'type' => 'url',
                'default' => [
                    'url' => '',
                    'is_external' => 'on'
                ]
            ), 
            array(
                'name' => 'video_text',
                'label' => esc_html__('Video Text', 'digicove'),                
                'type' => \Elementor\Controls_Manager::TEXT,
                'default'   => esc_html__('How You Work','digicove'),
            ), 
            array(
                'name' => 'video_play_bg',
                'label' => esc_html__('Video Button Background', 'digicove'),
                'type' => 'color',
                'condition' => [
                    'video_link[url]!' => ''
                ],
                'selectors' => [
                    '{{WRAPPER}} .pxl-slide-item-wrap .btn-video-wrap .pxl-video-btn' => 'background: {{VALUE}};',
                ],
            ),
            array(
                'name' => 'video_play_bg_hover',
                'label' => esc_html__('Video Button Background Hover', 'digicove'),
                'type' => 'color',
                'condition' => [
                    'video_link[url]!' => ''
                ],
                'selectors' => [
                    '{{WRAPPER}} .pxl-slide-item-wrap .btn-video-wrap .pxl-video-btn:hover' => 'background: {{VALUE}};',
                ],
            ),
            array(
                'name'  => 'video_play_width',
                'label' => esc_html__( 'Video Button Width', 'digicove' ),
                'type'  => 'slider',
                'control_type' => 'responsive',
                'size_units'   => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' =>  30,
                        'max' => 200,
                    ],
                    '%' => [
                        'min' =>  1,
                        'max' =>  100,
                    ],
                ],
                'condition' => [
                    'video_link[url]!' => ''
                ],
                'selectors' => [
                    '{{WRAPPER}} .btn-video-wrap .pxl-video-btn' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
                ] 
            ),
            array(
                'name'  => 'video_play_font_size',
                'label' => esc_html__( 'Video Font Size', 'digicove' ),
                'type'  => 'slider',
                'control_type' => 'responsive',
                'size_units'   => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' =>  10,
                        'max' => 50,
                    ],
                ],
                'condition' => [
                    'video_link[url]!' => ''
                ],
                'selectors' => [
                    '{{WRAPPER}} .pxl-video-btn' => 'font-size: {{SIZE}}{{UNIT}};',
                ] 
            ),
            array(
                'name' => 'play_icon_color',
                'label' => esc_html__('Play Icon Color', 'digicove'),
                'type' => 'color',
                'condition' => [
                    'video_link[url]!' => ''
                ],
                'selectors' => [
                    '{{WRAPPER}} .pxl-video-btn > .pxl-icon' => 'color: {{VALUE}};',
                ],
            ),
            array(
                'name' => 'play_icon_color_hover',
                'label' => esc_html__('Play Icon Color Hover', 'digicove'),
                'type' => 'color',
                'condition' => [
                    'video_link[url]!' => ''
                ],
                'selectors' => [
                    '{{WRAPPER}} .pxl-video-btn:hover > .pxl-icon' => 'color: {{VALUE}};',
                ],
            ),
            array(
                'name'      => 'play_icon_animation',
                'label'     => esc_html__( 'Motion Effect', 'digicove' ),
                'type'      => 'animation',
                'condition' => [
                    'video_link[url]!' => ''
                ],
            ),
            array(
                'name' => 'play_icon_animation_duration',
                'label' => esc_html__('Animation Duration', 'digicove'),
                'type' => 'select',
                'default' => 'normal',
                'options' => [
                    'slow' => esc_html__('Slow', 'digicove'),
                    'normal' => esc_html__('Normal', 'digicove'),
                    'fast' => esc_html__('Fast', 'digicove'),
                ],
                'condition' => [
                    'video_link[url]!' => '',
                    'play_icon_animation!' => '',
                ]
            ),
            array(
                'name'      => 'play_icon_animation_delay',
                'label'     => esc_html__( 'Transition Delay', 'digicove' ),
                'type'      => 'text',
                'condition' => [
                    'video_link[url]!' => '',
                    'play_icon_animation!' => '',
                ]
            ),
        ),
digicove_position_option([
    'prefix' => 'video_',
    'selectors_class' => '.btn-video-wrap',
    'condition' => ['video_link[url]!' => '']
])
),
),  
)
)
),
digicove_get_class_widget_path()
);