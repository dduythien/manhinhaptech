<?php
$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
$pxl_menus = array(
    '' => esc_html__('Default', 'digicove')
);
if ( is_array( $menus ) && ! empty( $menus ) ) {
    foreach ( $menus as $value ) {
        if ( is_object( $value ) && isset( $value->name, $value->slug ) ) {
            $pxl_menus[ $value->slug ] = $value->name;
        }
    }
} else {
    $pxl_menus = '';
}
pxl_add_custom_widget(
    array(
        'name' => 'pxl_menu',
        'title' => esc_html__('Nav Menu Pxl', 'digicove'),
        'icon' => 'eicon-nav-menu',
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_menu/img-layout/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'digicove' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_menu/img-layout/layout2.jpg'
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
                            'name' => 'menu',
                            'label' => esc_html__('Select Menu', 'digicove'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => $pxl_menus,
                        ),
                        array(
                            'name' => 'align',
                            'label' => esc_html__('Alignment', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'left' => [
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
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary' => 'text-align: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li' => 'float: none;',
                                '{{WRAPPER}} .pxl-nav-menu2 .pxl-menu-primary' => 'text-align: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu2 .pxl-menu-primary > li' => 'float: none;',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_first_level',
                    'label' => esc_html__('First Level', 'digicove'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Color', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Default',
                                'gradient' => 'Gradient',
                            ],
                            'default' => 'style1',
                        ),
                        array(
                            'name'         => 'line_gradient',
                            'label' => esc_html__( 'Background Type', 'digicove' ),
                            'type'         => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'gradient' ],
                            'selector'     => '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a span:after, {{WRAPPER}} .pxl-nav-menu2 .pxl-menu-primary > li > a span:after',
                            'condition' => [
                                'style' => 'gradient',
                            ],
                        ),
                        array(
                            'name' => 'title_color_gradient',
                            'label' => esc_html__( 'Title Color Gradient', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a:hover span, {{WRAPPER}} .pxl-nav-menu2 .pxl-menu-primary > li > a:hover' => 'background: -webkit-linear-gradient(90deg, var(--primary-color) 0%, {{VALUE}} 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;',
                            ],
                            'condition' => [
                                'style' => 'gradient',
                            ],
                        ),
                        array(
                            'name' => 'title_color_gradient_active',
                            'label' => esc_html__( 'Title Color Gradient Actvie', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current-menu-parent > a, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current-menu-parent > a span, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current_page_item > a' => 'background: -webkit-linear-gradient(90deg, var(--primary-color) 0%, {{VALUE}} 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;',
                            ],
                            'condition' => [
                                'style' => 'gradient',
                            ],
                        ),
                        array(
                            'name' => 'bar_color',
                            'label' => esc_html__('Line Color', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a span:after' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu2 .pxl-menu-primary > li > a span:after' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'style' => 'style1',
                            ],
                        ),
                        array(
                            'name' => 'color',
                            'label' => esc_html__('Color', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu2 .pxl-menu-primary2 > li > a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_hover',
                            'label' => esc_html__('Color Hover', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a:hover' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu2 .pxl-menu-primary2 > li > a:hover' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'style' => 'style1',
                            ],
                        ),
                        array(
                            'name' => 'color_active',
                            'label' => esc_html__('Color Active', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current-menu-parent > a, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current_page_item > a' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu2 .pxl-menu-primary2 > li.current-menu-parent > a, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary2 > li.current_page_item > a' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'style' => 'style1',
                            ],
                        ),
                        array(
                            'name' => 'typography',
                            'label' => esc_html__('Typography', 'digicove' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a, {{WRAPPER}} .pxl-nav-menu2 .pxl-menu-primary2 > li > a',                            
                        ),
                        array(
                            'name' => 'item_space',
                            'label' => esc_html__('Item Spacer', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%', 'rem' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-nav-menu2 .pxl-menu-primary2 > li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',                            
                        ),
                    ),
),
array(
    'name' => 'section_style_sub_level',
    'label' => esc_html__('Sub Level', 'digicove'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'sub_color',
            'label' => esc_html__('Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-nav-menu li.pxl-megamenu, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li > a' => 'color: {{VALUE}};',
                '{{WRAPPER}} .pxl-nav-menu2 li.pxl-megamenu, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary2 li .sub-menu li > a' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'sub_color_bg',
            'label' => esc_html__('Background Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu' => 'background: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'sub_color_hover',
            'label' => esc_html__('Color Hover/Actvie', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li:hover > a, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current_page_item > a, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current-menu-item > a, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current_page_ancestor > a, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current-menu-ancestor > a' => 'color: {{VALUE}};',
                '{{WRAPPER}} .pxl-nav-menu2 .pxl-menu-primary2 li .sub-menu li:hover > a, {{WRAPPER}} .pxl-nav-menu2 .pxl-menu-primary2 li .sub-menu li.current_page_item > a, {{WRAPPER}} .pxl-nav-menu2 .pxl-menu-primary2 li .sub-menu li.current-menu-item > a, {{WRAPPER}} .pxl-nav-menu2 .pxl-menu-primary2 li .sub-menu li.current_page_ancestor > a, {{WRAPPER}} .pxl-nav-menu2 .pxl-menu-primary2 li .sub-menu li.current-menu-ancestor > a' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'sub_typography',
            'label' => esc_html__('Typography', 'digicove' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu a, {{WRAPPER}} .pxl-heading .pxl-item--title, {{WRAPPER}} .pxl-nav-menu2 .pxl-menu-primary2 li .sub-menu a',
        ),
        array(
            'name' => 'sub_item_space',
            'label' => esc_html__('Item Spacer', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
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
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}} .pxl-menu-primary .sub-menu li + li' => 'margin-top: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .pxl-menu-primary2 .sub-menu li + li' => 'margin-top: {{SIZE}}{{UNIT}};',
            ],
        ),
    ),
),
),
),
),
digicove_get_class_widget_path()
);