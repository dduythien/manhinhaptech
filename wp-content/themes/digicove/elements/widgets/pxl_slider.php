<?php
$templates = digicove_get_slider_option() ;

pxl_add_custom_widget(
    array(
        'name'       => 'pxl_slider',
        'title'      => esc_html__( 'PXL Slider', 'digicove' ),
        'icon'       => 'eicon-slides',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'digicove-swiper-slider',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source', 'digicove' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'slider_source',
                            'label' => esc_html__('Select Source', 'digicove'),
                            'description'        => sprintf(esc_html__('Please create your layout before choosing. %sClick Here%s','digicove'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '">','</a>'),
                            'type' => 'select2',
                            'multiple' => true,
                            'options' => $templates,
                            'default' => [],
                            'label_block' => true
                        ),
                        array(
                            'name'         => 'slide_effect',
                            'label'        => esc_html__('Transition', 'digicove'),
                            'type'         => 'select',
                            'options'      => [
                                'slide'     => esc_html__('Slide', 'digicove'),
                                'fade'      => esc_html__('Fade','digicove'),
                                'cube'      => esc_html__('Cube','digicove'),
                                'coverflow' => esc_html__('Coverflow','digicove'),
                                'flip'      => esc_html__('Flip','digicove'),
                                'creative'  => esc_html__('Creative','digicove'),
                                'cards'     => esc_html__('Cards','digicove'),
                            ], 
                            'default'      => 'slide', 
                        ),
                        array(
                            'name'         => 'fit_to_screen',
                            'label'        => esc_html__('Fit To Screen', 'digicove'),
                            'type'         => 'select',
                            'options'      => [
                                'default'     => esc_html__('Default', 'digicove'),
                                'slider-fit-to-screen'      => esc_html__('Fit To Screen','digicove'),
                            ], 
                            'default'      => 'default', 
                        ),
                    )
                ),
                array(
                    'name' => 'section_arrows_settings',
                    'label' => esc_html__('Arrows Settings', 'digicove'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'         => 'arrows',
                                'label'        => esc_html__('Show Arrows', 'digicove'),
                                'type'         => 'select',
                                'options'      => [
                                    'true'  => esc_html__('Yes', 'digicove'),
                                    'false' => esc_html__('No','digicove')
                                ], 
                                'default'      => 'false', 
                                'control_type' => 'responsive',
                                'prefix_class' => 'pxl-swiper-arrows%s-',
                            ),
                            array(
                                'name'         => 'arrows_style',
                                'label'        => esc_html__('Arrows Style', 'digicove'),
                                'type'         => 'select',
                                'options'      => [
                                    'text'  => esc_html__('Text', 'digicove'),
                                    'icon'  => esc_html__('Icon','digicove'),
                                ], 
                                'default'      => 'text', 
                            ),
                            array(
                                'name'         => 'arrows_layout',
                                'label'        => esc_html__('Arrows Layout', 'digicove'),
                                'type'         => 'select',
                                'options'      => [
                                    'square-df'  => esc_html__('Square Default', 'digicove'),
                                    'square-thums'  => esc_html__('Square Thumbnail','digicove'),
                                    'thums-title'  => esc_html__('Thumbnail & Title','digicove'),
                                    'thums-title-dark'  => esc_html__('Thumbnail & Title Dark','digicove'),
                                ], 
                                'default'      => 'square-df', 
                            ),
                            array(
                                'name'         => 'arrows_layout_color',
                                'label'        => esc_html__('Arrows Layout Color', 'digicove'),
                                'type'         => 'select',
                                'options'      => [
                                    ''  => esc_html__('Default', 'digicove'),
                                    'dark'  => esc_html__('Dark','digicove'),
                                ], 
                                'default'      => '', 
                                'condition' => ['arrows_layout' => 'thums-title']
                            ),
                            array(
                                'name' => 'divider_line_color',
                                'label' => esc_html__('Divider Line Color', 'digicove' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .layout-thums-title .thums-title-wrap:before' => 'background-color: {{VALUE}};',
                                ],
                                'condition' => ['arrows_layout' => 'thums-title']
                            ),
                            array(
                                'name'        => 'arrow_prev_text',
                                'label'       => esc_html__('Previous Text','digicove'),
                                'type'        => 'text',
                                'condition' => [
                                    'arrows_style' => 'text'
                                ]
                            ),
                            array(
                                'name'        => 'arrow_prev_icon',
                                'label'       => esc_html__('Previous Icon','digicove'),
                                'type'        => 'icons',
                                'label_block' => true,
                                'condition' => [
                                    'arrows_style' => 'icon'
                                ]
                            ),
                            array(
                                'name'        => 'arrow_next_text',
                                'label'       => esc_html__('Next Text','digicove'),
                                'type'        => 'text',
                                'condition' => [
                                    'arrows_style' => 'text'
                                ]
                            ),
                            array(
                                'name'        => 'arrow_next_icon',
                                'label'       => esc_html__('Next Icon','digicove'),
                                'type'        => 'icons',
                                'label_block' => true,
                                'condition' => [
                                    'arrows_style' => 'icon'
                                ],
                                'separator' => 'after'
                            ),
                            array(
                                'name' => 'arrow_prev_color',
                                'label' => esc_html__('Previous Color', 'digicove' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'control_type' => 'responsive',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-slider-arrow-prev' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'arrow_prev_color_hover',
                                'label' => esc_html__('Previous Color Hover', 'digicove' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'control_type' => 'responsive',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-slider-arrow-prev:hover' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'arrow_next_color',
                                'label' => esc_html__('Next Color', 'digicove' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'control_type' => 'responsive',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-slider-arrow-next' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'arrow_next_color_hover',
                                'label' => esc_html__('Next Color Hover', 'digicove' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'control_type' => 'responsive',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-slider-arrow-next:hover' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'arrow_prev_bg',
                                'label' => esc_html__('Previous Background', 'digicove' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'control_type' => 'responsive',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-slider-arrow-prev:hover' => 'background-color: {{VALUE}};',
                                ],
                                'condition' => ['arrows_style' => 'icon'],
                            ),
                            array(
                                'name' => 'arrow_next_bg',
                                'label' => esc_html__('Next Background', 'digicove' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'control_type' => 'responsive',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-slider-arrow-next:hover' => 'background-color: {{VALUE}};',
                                ],
                                'condition' => ['arrows_style' => 'icon'],
                            ),
                            array(
                                'name' => 'arrow_prev_margin',
                                'label' => esc_html__('Previous Margin(px)', 'digicove' ),
                                'type' => 'dimensions',
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-slider-arrow-prev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'arrow_next_margin',
                                'label' => esc_html__('Next Margin(px)', 'digicove' ),
                                'type' => 'dimensions',
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-slider-arrow-next' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name'         => 'nav_position_wrap',
                                'label'        => esc_html__('Navigation Position For', 'digicove'),
                                'type'         => 'select',
                                'options'      => [
                                    'wrap'          => esc_html__('Wrap', 'digicove'),
                                    'separate'         => esc_html__('Separate','digicove'),
                                ], 
                                'default'      => 'wrap', 
                            ),
                        ),
digicove_position_option([
    'prefix' => 'arrow_',
    'selectors_class' => '.pxl-slider-arrow-wrap',
    'condition' => ['nav_position_wrap' => 'wrap']
]),
digicove_position_option([
    'prefix' => 'arrow_prev_',
    'selectors_class' => '.pxl-slider-arrow-prev',
    'condition' => ['nav_position_wrap' => 'separate']
]),
digicove_position_option([
    'prefix' => 'arrow_next_',
    'selectors_class' => '.pxl-slider-arrow-next',
    'condition' => ['nav_position_wrap' => 'separate']
]),
array(
    array(
        'name'         => 'arrow_direction',
        'label'        => esc_html__('Arrow Direction', 'digicove'),
        'type'         => 'select',
        'options'      => [
            ''  => esc_html__('Default', 'digicove'),
            'row'  => esc_html__('Row', 'digicove'),
            'column'  => esc_html__('Columns','digicove'),
        ], 
        'default'      => '', 
        'control_type' => 'responsive',
        'prefix_class' => 'pxl-swiper-arrows-direction%s-',
        'separator' => 'before',
        'selectors' => [
            '{{WRAPPER}} .pxl-slider-arrow-wrap' => 'flex-direction: {{VALUE}};',
        ],
        'condition' => ['nav_position_wrap' => 'wrap']
    )
),
digicove_transform_option([
    'prefix' => 'arrow_',
    'selectors_class' => '.pxl-slider-arrow-wrap.wrap.pxl-transforms',
    'condition' => ['nav_position_wrap' => 'wrap']
]),
array(
    array(
        'name'         => 'arrow_container',
        'label'        => esc_html__('Arrow in Container', 'digicove'),
        'type'         => 'select',
        'options'      => [
            ''  => esc_html__('Default', 'digicove'),
            'in-container'  => esc_html__('In Container', 'digicove'),
        ], 
        'default'      => '', 
        'separator' => 'before',
    )
),
digicove_elementor_animation_opts([
    'name'   => 'arrow',
    'label'  => '',
])
),
),
array(
    'name' => 'section_dots_settings',
    'label' => esc_html__('Dots Settings', 'digicove'),
    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
    'controls' => array_merge(
        array(
            array(
                'name'         => 'dots',
                'label'        => esc_html__('Show dots', 'digicove'),
                'type'         => 'select',
                'options'      => [
                    'true'  => esc_html__('Yes', 'digicove'),
                    'false' => esc_html__('No','digicove')
                ], 
                'default'      => 'false', 
                'control_type' => 'responsive',
                'prefix_class' => 'pxl-swiper-dots%s-'
            ),

            array(
                'name'         => 'dot_fraction',
                'label'        => esc_html__('Show Fraction', 'digicove'),
                'type'         => 'select',
                'options'      => [
                    'true'  => esc_html__('Yes', 'digicove'),
                    'false' => esc_html__('No','digicove')
                ], 
                'default'      => 'false', 
                'control_type' => 'responsive',
            ),
            array(
                'name'         => 'play_slider',
                'label'        => esc_html__('Show Play/Pause', 'digicove'),
                'type'         => 'select',
                'options'      => [
                    'true'  => esc_html__('Yes', 'digicove'),
                    'false' => esc_html__('No','digicove')
                ], 
                'default'      => 'false', 
                'control_type' => 'responsive',
            ),

            array(
                'name'         => 'dots_style',
                'label'        => esc_html__('Dots Style', 'digicove'),
                'type'         => 'select',
                'options'      => [
                    'bullets'  => esc_html__('Bullets', 'digicove'),
                    'squared'  => esc_html__('Squared','digicove'),
                    'fraction'  => esc_html__('Fraction', 'digicove'),
                ], 
                'default'      => 'squared', 
            ),  
        ),
        digicove_position_option([
            'prefix' => 'dots_',
            'selectors_class' => '.pxl-slider-dots',
        ]),
        array(
            array(
                'name'         => 'dots_direction',
                'label'        => esc_html__('Dots Direction', 'digicove'),
                'type'         => 'select',
                'options'      => [
                    ''  => esc_html__('Default', 'digicove'),
                    'row'  => esc_html__('Row', 'digicove'),
                    'column'  => esc_html__('Columns','digicove'),
                ], 
                'default'      => '', 
                'control_type' => 'responsive',
                'prefix_class' => 'pxl-slider-dots-direction%s-',
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .pxl-slider-dots' => 'flex-direction: {{VALUE}};',
                ],
            ),
            array(
                'name' => 'dot_items_margin',
                'label' => esc_html__('Dot Items Margin(px)', 'digicove' ),
                'type' => 'dimensions',
                'control_type' => 'responsive',
                'size_units' => [ 'px' ],
                'selectors' => [
                    '{{WRAPPER}} .pxl-slider-pagination-bullet' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => ['dots_style' => ['bullets', 'squared']]
            ),
            array(
                'name' => 'dot_bg',
                'label' => esc_html__('Dots Background', 'digicove' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-slider-dots .pxl-slider-pagination-bullet:after' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .pxl-slider-dots .pxl-slider-pagination-bullet:hover:before, {{WRAPPER}} .pxl-slider-dots .pxl-slider-pagination-bullet.swiper-pagination-bullet-active:before' => 'border-color: {{VALUE}};',
                ],
                'condition' => ['dots_style' => ['bullets', 'squared']]
            ),
            array(
                'name' => 'dot_bg_hover',
                'label' => esc_html__('Dots Background Hover', 'digicove' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-slider-dots .pxl-slider-pagination-bullet:hover:after' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .pxl-slider-dots .pxl-slider-pagination-bullet.swiper-pagination-bullet-active:after' => 'background-color: {{VALUE}};',
                ],
                'condition' => ['dots_style' => ['bullets', 'squared']]
            ),
            array(
                'name' => 'slider_number_color',
                'label' => esc_html__('Slider Number Color', 'digicove' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'control_type' => 'responsive',
                'selectors' => [
                    '{{WRAPPER}} .pxl-slider-pagination-fraction' => 'color: {{VALUE}};'
                ],
                'condition' => ['dots_style' => 'fraction']
            ),
            array(
                'name' => 'slider_number_divider_bg',
                'label' => esc_html__('Divider Background', 'digicove' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'control_type' => 'responsive',
                'selectors' => [
                    '{{WRAPPER}} .pxl-slider-pagination-fraction .divider' => 'background-color: {{VALUE}};'
                ],
                'condition' => ['dots_style' => 'fraction']
            ),
        ),
        digicove_transform_option([
            'prefix' => 'dots_',
            'selectors_class' => '.pxl-slider-dots.pxl-transforms',
        ]),
        array(
            array(
                'name' => 'dots_vertical_line',
                'label' => esc_html__('Dots Vertical Line', 'digicove' ),
                'type'      => \Elementor\Controls_Manager::SWITCHER,
                'control_type' => 'responsive',
                'separator' => 'before',
                'condition' => ['dots_direction' => 'column']
            ),
        ),
        digicove_elementor_animation_opts([
            'name'   => 'dots',
            'label'  => '',
        ])
    ),
),

array(
    'name' => 'section_carousel_settings',
    'label' => esc_html__('Carousel Settings', 'digicove'),
    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
    'controls' => array_merge(
        array( 
            array(
                'name' => 'pause_on_hover',
                'label' => esc_html__('Pause on Hover', 'digicove'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
            ),
            array(
                'name' => 'autoplay',
                'label' => esc_html__('Autoplay', 'digicove'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
            ),
            array(
                'name' => 'autoplay_speed',
                'label' => esc_html__('Autoplay Speed', 'digicove'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 5000,
                'condition' => [
                    'autoplay' => 'true'
                ]
            ),
            array(
                'name' => 'infinite',
                'label' => esc_html__('Infinite Loop', 'digicove'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
            ),
            array(
                'name' => 'speed',
                'label' => esc_html__('Animation Speed', 'digicove'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 500,
            ),
            array(
                'name' => 'center_mode',
                'label' => esc_html__('Center Mode', 'digicove'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => false
            ),
        )
    ),
),
)
)
),
digicove_get_class_widget_path()
);

