<?php
$widget->add_render_attribute( 'wrapper', 'class', 'pxl-button' );
$widget->add_render_attribute( 'button', 'class', 'btn '.$settings['btn_custom_font_family'].' '.$settings['btn_style'].' '.$settings['pxl_animate'].' pxl-icon--'.$settings['icon_align'].'' );
if ( ! empty( $settings['link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['link']['url'] );

    if ( $settings['link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }    
} ?>
<div <?php pxl_print_html($widget->get_render_attribute_string( 'wrapper' )); ?>>
    <a <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?> data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php if($settings['btn_icon']['value']) { ?>        
            <span class="button-arrow-hover <?php if ($settings['style_icon'] == 'style2') {
                echo esc_attr($settings['style_icon']);
            } ?>">
            <?php if(!empty($settings['btn_icon'])) {
                \Elementor\Icons_Manager::render_icon( $settings['btn_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' );
                \Elementor\Icons_Manager::render_icon( $settings['btn_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' );
            } ?>
        </span>
    <?php } ?>
    <span class="pxl--btn-text <?php if($settings['button_effect'] != '') { echo 'pxl-wobble'; } ?>" data-animation="<?php echo esc_attr($settings['button_effect']); ?>">
        <?php if(!empty($settings['text'])) {
            $btn_text = $settings['text'];
        } else {
            $btn_text = pxl_print_html('Click Here', 'digicove');
        }
        $chars = str_split($btn_text);
        foreach ($chars as $value) {
            if ($value == " ") {
                $value = "&nbsp;";
            }
            echo '<span>'.$value.'</span>';
        }
        ?>
    </span>
</a>
</div>