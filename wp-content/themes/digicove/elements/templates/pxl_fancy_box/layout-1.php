<div class="pxl-fancy-box pxl-fancy-box1 <?php echo esc_attr($settings['style']); ?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">     
        <?php if ($settings['style'] == 'default') :?>
            <div class="diviver"></div>   
        <?php endif; ?>
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
            <div class="pxl-item--desc">
                <?php echo pxl_print_html($settings['desc']); ?>                
            </div> 
            <?php if ($settings['show_button'] == 'true') :?>
                <a class="btn-arrow" <?php pxl_print_html($widget->get_render_attribute_string( 'btn_link' )); ?>>
                    <?php echo esc_attr($settings['btn_text']); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                      <path d="M1.25 14.8229L14.7917 1.28125M14.7917 1.28125V14.2812M14.7917 1.28125H1.79167" stroke="url(#paint0_linear_399_943)" stroke-width="1.5625" stroke-linecap="round" stroke-linejoin="round"/>
                      <defs>
                        <linearGradient id="paint0_linear_399_943" x1="1.25" y1="1.28125" x2="14.7917" y2="1.28125" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#FF7369"/>
                          <stop offset="1" stop-color="#FFB06D"/>
                      </linearGradient>
                  </defs>
              </svg>
          </a>
      <?php endif; ?>             
  </div>
</div>
</div>