<?php
pxl_add_custom_widget(
    array(
        'name'       => 'pxl_horizontal_scroll',
        'title'      => esc_html__( 'PXL Horizontal Scroll', 'digicove' ),
        'icon'       => 'eicon-slider-push',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'digicove' ),
                    'tab'      => 'layout',
                    'controls' => array(
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__( 'Layout', 'digicove' ),
                            'type'    => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'digicove' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/imgs/h-scrolls-1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 2', 'digicove' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/imgs/h-scrolls-2.jpg'
                                ],
                            ],
                        ),
                    )
                ),
                array(
                    'name' => 'content_section',
                    'label' => esc_html__('Content', 'digicove' ),
                    'tab' => 'content',
                    'controls' => array(
                        array(
                            'name' => 'revesal',
                            'label' => esc_html__('Revesal Scroll', 'digicove'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'digicove' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).',
                            'condition'   => ['layout' => '1']
                        ),
                        array(
                            'name'        => 'title',
                            'label'       => esc_html__( 'Title', 'digicove' ),
                            'type'        => 'textarea',
                            'label_block' => true,
                            'condition'   => ['layout' => '2']
                        ),
                        array(
                            'name'        => 'img_gallery',
                            'label'       => esc_html__( 'Gallery', 'digicove' ),
                            'type'        => 'gallery',
                            'label_block' => true,
                            'condition'   => ['layout' => '1']
                        ),
                    ),
                ),
                   
            ),
        ),
    ),
    digicove_get_class_widget_path()
);