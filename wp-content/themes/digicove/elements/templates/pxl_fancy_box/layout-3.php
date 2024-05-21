<div class="pxl-fancy-box pxl-fancy-box3 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">     
        <?php if(! empty( $settings['selected_icon']['value'] )): ?>
            <div class="pxl-fancy-icon">
                <?php \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true', 'class' => 'pxl-icon' ], 'i' );?>
            </div>
        <?php endif; ?>
        <div class="pxl-item--holder">
            <?php 
            $widget->add_render_attribute( 'btn_link', 'href', $settings['btn_link']['url'] );

            if ( $settings['btn_link']['is_external'] ) {
                $widget->add_render_attribute( 'btn_link', 'target', '_blank' );
            }

            if ( $settings['btn_link']['nofollow'] ) {
                $widget->add_render_attribute( 'btn_link', 'rel', 'nofollow' );
            } 
            ?>            
            <a class="pxl-item--title el-empty" <?php pxl_print_html($widget->get_render_attribute_string( 'btn_link' )); ?>>
                <?php echo pxl_print_html($settings['title']); ?>
            </a>         
        </div>
    </div>
</div>