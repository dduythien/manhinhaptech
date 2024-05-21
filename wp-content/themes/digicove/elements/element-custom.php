<?php 
/* Page Setting */
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
add_action( 'elementor/documents/register_controls', 'digicove_elementor_page_settings_controls');
function digicove_elementor_page_settings_controls($document){
    $document->start_controls_section(
        'document_settings_pxl',
        [
            'label' => esc_html__( 'digicove Settings', 'digicove' ),
            'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
        ]
    );
    $document->add_responsive_control(
        'pxl_page_content_width',
        [
            'label' => esc_html__( 'Content Width (px)', 'digicove' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 320,
                    'max' => 1920
                ]
            ],
            'selectors' => [
                '.elementor-section.elementor-section-boxed > .elementor-container, {{WRAPPER}} .container, {{WRAPPER}} .container-xl' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $document->end_controls_section();
}

/* Section Params */
add_action( 'elementor/element/section/section_structure/after_section_end', 'digicove_add_custom_section_controls' ); 

function digicove_add_custom_section_controls( \Elementor\Element_Base $element) {

	$element->start_controls_section(
		'section_pxl',
		[
			'label' => esc_html__( 'Digicove Settings', 'digicove' ),
			'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
		]
	);
    if ( get_post_type( get_the_ID()) === 'pxl-template' && get_post_meta( get_the_ID(), 'template_type', true ) === 'header') {

        $element->add_control(
            'pxl_header_type',
            [
                'label' => esc_html__( 'Header Type', 'digicove' ),
                'type'  => \Elementor\Controls_Manager::SELECT,
                'hide_in_inner' => true,
                'options'      => array(
                    ''          => esc_html__( 'Select Type', 'digicove' ),
                    'main-sticky'       => esc_html__( 'Header Main & Sticky', 'digicove' ),
                    'sticky'      => esc_html__( 'Header Sticky', 'digicove' ),
                    'transparent' => esc_html__( 'Header Transparent', 'digicove' ),
                ),
                'default'      => '',
            ]
        );
    }
    if ( get_post_type( get_the_ID()) === 'pxl-template' && get_post_meta( get_the_ID(), 'template_type', true ) === 'header-mobile') {
        $element->add_control(
            'pxl_header_mobile_type',
            [
                'label' => esc_html__( 'Header Type', 'digicove' ),
                'type'  => \Elementor\Controls_Manager::SELECT,
                'hide_in_inner' => true,
                'options'      => array(
                    ''          => esc_html__( 'Select Type', 'digicove' ),
                    'main-sticky'       => esc_html__( 'Main & Sticky', 'digicove' ),
                    'sticky'      => esc_html__( 'Sticky', 'digicove' ),
                    'transparent' => esc_html__( 'Transparent', 'digicove' ),
                ),
                'default'      => '',
            ]
        );

    }

    $element->add_control(
      'pxl_section_offset',
      [
         'label' => esc_html__( 'Section Offset', 'digicove' ),
         'type'         => \Elementor\Controls_Manager::SELECT,
         'prefix_class' => 'pxl-section-offset-',
         'hide_in_inner' => true,
         'options'      => array(
            'none'    => esc_html__( 'None', 'digicove' ),
            'left'   => esc_html__( 'Left', 'digicove' ),
            'right'     => esc_html__( 'Right', 'digicove' ),
        ),
         'default'      => 'none',
         'condition' => [
            'layout' => 'full_width'
        ]
    ]
);

    $element->add_control(
        'pxl_container_width',
        [
            'label' => esc_html__( 'Container Width', 'digicove' ),
            'type'         => \Elementor\Controls_Manager::SELECT,
            'prefix_class' => 'pxl-container-width-',
            'hide_in_inner' => true,
            'options'      => array(
                'df'    => esc_html__( 'Default', 'digicove' ),                
                'container-1620'    => esc_html__( '1620px', 'digicove' ),
                'container-1320'    => esc_html__( '1300px', 'digicove' ),
                'container-1345'    => esc_html__( '1345px', 'digicove' ),
            ),
            'default'      => '',
        ]
    );

    $element->add_control(
        'pxl_bg_img',
        [
            'label' => esc_html__( 'Background Image', 'digicove' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'hide_in_inner' => true,
            'condition' => [
                'pxl_mask_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_mask_bg_img',
        [
            'label' => esc_html__( 'Mask Background Image', 'digicove' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'hide_in_inner' => true,
            'selectors' => [
                '{{WRAPPER}} .pxl-mask-bg-parallax' => '-webkit-mask-image: url( {{URL}} );',
            ],
        ]
    );

    $element->add_responsive_control(
        'pxl_mask_bg_size',
        [
            'label' => esc_html__( 'Background Size', 'digicove' ),
            'type'         => \Elementor\Controls_Manager::SELECT,
            'hide_in_inner' => true,
            'options'      => array(
                ''              => esc_html__( 'Default', 'digicove' ),
                'auto' => esc_html__( 'Auto', 'digicove' ),
                'cover'   => esc_html__( 'Cover', 'digicove' ),
                'contain'  => esc_html__( 'Contain', 'digicove' ),
                'initial'    => esc_html__( 'Custom', 'digicove' ),
            ),
            'default'      => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-mask-bg-parallax' => '-webkit-mask-size: {{VALUE}};',
            ],
            'condition' => [
                'pxl_mask_bg_img[url]!' => ''
            ]        
        ]
    );
    $element->add_responsive_control(
        'pxl_mask_bg_position',
        [
            'label' => esc_html__( 'Background Position', 'digicove' ),
            'type'         => \Elementor\Controls_Manager::SELECT,
            'hide_in_inner' => true,
            'options'      => array(
                ''              => esc_html__( 'Default', 'digicove' ),
                'center center' => esc_html__( 'Center Center', 'digicove' ),
                'center left'   => esc_html__( 'Center Left', 'digicove' ),
                'center right'  => esc_html__( 'Center Right', 'digicove' ),
                'top center'    => esc_html__( 'Top Center', 'digicove' ),
                'top left'      => esc_html__( 'Top Left', 'digicove' ),
                'top right'     => esc_html__( 'Top Right', 'digicove' ),
                'bottom center' => esc_html__( 'Bottom Center', 'digicove' ),
                'bottom left'   => esc_html__( 'Bottom Left', 'digicove' ),
                'bottom right'  => esc_html__( 'Bottom Right', 'digicove' ),
                'initial'       =>  esc_html__( 'Custom', 'digicove' ),
            ),
            'default'      => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-mask-bg-parallax' => '-webkit-mask-position: {{VALUE}};',
            ],
            'condition' => [
                'pxl_mask_bg_img[url]!' => ''
            ]        
        ]
    );

    $element->add_control(
        'pxl_mask_bg_color_one',
        [
            'label' => esc_html__('Background Linear One', 'digicove'),
            'type' => \Elementor\Controls_Manager::COLOR,
        ]
    );

    $element->add_control(
        'pxl_mask_bg_color_two',
        [
            'label' => esc_html__('Background Linear Two', 'digicove'),
            'type' => \Elementor\Controls_Manager::COLOR,
        ]
    );

    $element->add_control(
        'pxl_mask_bg_color_three',
        [
            'label' => esc_html__('Angle', 'digicove'),
            'type' => \Elementor\Controls_Manager::TEXT,            
            'description'=> 'Direction',
        ]
    );


    $element->add_control(
        'pxl_mask_bg_color',
        [
            'label' => esc_html__( 'Background Color', 'digicove' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'condition' => [
                'pxl_mask_bg_img[url]!' => ''
            ]             ,
            'selectors' => [
                '{{WRAPPER}} .pxl-mask-bg-parallax' => 'background: {{VALUE}};',
            ],
        ]
    );

    $element->add_control(
        'pxl_section_overflow_hidden',
        [
            'label' => esc_html__('Overflow Hidden', 'digicove'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'digicove' ),
            'label_off' => esc_html__( 'No', 'digicove' ),
            'return_value' => 'yes',
            'default' => 'no',
            'separator' => 'after',
            'prefix_class' => 'pxl-section-overflow-hidden-'
        ]
    );

    $element->end_controls_section();
};

/* Columns Params*/
add_action( 'elementor/element/column/layout/after_section_end', 'digicove_add_custom_columns_controls' ); 
function digicove_add_custom_columns_controls( \Elementor\Element_Base $element) {
	$element->start_controls_section(
		'columns_pxl',
		[
			'label' => esc_html__( 'digicove Settings', 'digicove' ),
			'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
		]
	);
    $element->add_control(
        'col_offset',
        [
            'label'   => esc_html__( 'Column Offset', 'digicove' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'none'           => esc_html__( 'No', 'digicove' ),
                'left' => esc_html__( 'Left', 'digicove' ),
                'left-1300px' => esc_html__( 'Left 1300px', 'digicove' ),
                'right' => esc_html__( 'Right', 'digicove' ),
                'right-1300px' => esc_html__( 'Right 1300px', 'digicove' ),
            ),
            'default' => 'none',
            'prefix_class' => 'col-offset-'
        ]
    );
    $element->add_responsive_control(
      'pxl_col_auto',
      [
        'label'   => esc_html__( 'Element Auto Width', 'digicove' ),
        'type'    => \Elementor\Controls_Manager::SELECT,
        'options' => array(
            'default'           => esc_html__( 'Default', 'digicove' ),
            'auto'   => esc_html__( 'Auto', 'digicove' ),
            'grow'   => esc_html__( 'Grow', 'digicove' ),
            'full'   => esc_html__( 'Full', 'digicove' ),
        ),
        'control_type' => 'responsive',
        'label_block'  => true, 
        'default'      => 'default',
        'prefix_class' => 'pxl-column-element%s-'
    ]
);
    $element->add_control(
        'pxl_column_overflow_hidden',
        [
            'label' => esc_html__('Overflow Hidden', 'digicove'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'digicove' ),
            'label_off' => esc_html__( 'No', 'digicove' ),
            'return_value' => 'yes',
            'default' => 'no',
            'separator' => 'after',
            'prefix_class' => 'pxl-column-overflow-hidden-'
        ]
    );
    $element->end_controls_section();
}


add_action( 'elementor/element/after_add_attributes', 'digicove_custom_el_attributes', 10, 1 );
function digicove_custom_el_attributes($el){

    $settings = $el->get_settings();
    
    if( 'section' == $el->get_name() ) {
        if ( isset( $settings['pxl_header_type'] ) && !empty($settings['pxl_header_type'] ) ) {
            $el->add_render_attribute( '_wrapper', 'class', 'pxl-header-'.$settings['pxl_header_type']);
        }
        if ( isset( $settings['pxl_header_mobile_type'] ) && !empty($settings['pxl_header_mobile_type'] ) ) {
            $el->add_render_attribute( '_wrapper', 'class', 'pxl-header-mobile-'.$settings['pxl_header_mobile_type']);
        }
        if ( isset( $settings['pxl_section_border_animated'] ) && $settings['pxl_section_border_animated'] == 'yes'  ) {
            $el->add_render_attribute( '_wrapper', 'class', 'pxl-border-section-anm');
        }
        if ( isset( $settings['pxl_section_offset'] ) && $settings['pxl_section_offset'] !='none' ) {
            if( $settings['gap'] === 'no' )
                $el->add_render_attribute( '_wrapper', 'class', 'pxl-section-gap-no');
        }
    }
    if( 'image' == $el->get_name() ) {
        if (strpos($settings['_css_classes'], 'parallax-') !== false) {
            $parl_arg = explode('--', $settings['_css_classes']); //parallax--y_50 , parallax--x_-50
            
            $parl_arg1 = explode('_', $parl_arg[1]);  

            $data_parallax = json_encode([
                $parl_arg1[0] => $parl_arg1[1]
            ]); 
            $el->add_render_attribute( '_wrapper', 'data-parallax', esc_attr($data_parallax));
        } 
    }

    $_animation = ! empty( $settings['_animation'] );
    $animation = ! empty( $settings['animation'] );
    $has_animation = $_animation && 'none' !== $settings['_animation'] || $animation && 'none' !== $settings['animation'];

    if ( $has_animation ) {
        $is_static_render_mode = \Elementor\Plugin::$instance->frontend->is_static_render_mode();

        if ( ! $is_static_render_mode ) {
            $el->add_render_attribute( '_wrapper', 'class', 'pxl-elementor-animate' );
        }
    }

}

add_filter( 'pxl_section_start_render', 'digicove_custom_section_start_render', 10, 3 );
function digicove_custom_section_start_render($html, $settings, $el){  
    if(!empty($settings['pxl_mask_bg_img']['url'])) {
        $effects_color = [];
        if(!empty($settings['pxl_mask_bg_color_one'])){
            $effects_color['x'] = $settings['pxl_mask_bg_color_one'];
        }
        if(!empty($settings['pxl_mask_bg_color_two'])){
            $effects_color['y'] = $settings['pxl_mask_bg_color_two'];
        }
        if(!empty($settings['pxl_mask_bg_color_three'])){
            $effects_color['z'] = (int)$settings['pxl_mask_bg_color_three'];
        }
        $data_color = json_encode($effects_color);
        
        if (empty($settings['pxl_bg_img']['url'])) {
            $html .= '<div class="pxl-mask-bg-parallax" data-color="'.esc_attr($data_color).'"></div>';
        } else {
            $html .= '<div class="pxl-mask-bg-parallax" data-color="'.esc_attr($data_color).'"><img data-parallax=\'{"y": -120}\' src="'.$settings['pxl_bg_img']['url'].'" alt="background"></div>';
        }

    }
    return $html;
}

//widget render
add_action('elementor/widget/before_render_content','digicove_custom_widget_el_before_render', 10, 1 );
function digicove_custom_widget_el_before_render($el){  

}




