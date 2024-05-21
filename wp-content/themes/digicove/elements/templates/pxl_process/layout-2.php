<div class="pxl-process pxl-process2 <?php echo esc_attr($settings['style']) ?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <?php if(!empty($settings['pxl_icon']['value']) || !empty( $settings['image']['url'] )) : 
        ?>
        <div class="pxl-item--image">
            <?php if(!empty($settings['image']['url'])) : 
                $image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
                $img  = pxl_get_image_by_size( array(
                    'attach_id'  => $settings['image']['id'],
                    'thumb_size' => $image_size,
                    'class' => 'no-lazyload'
                ) );
                $thumbnail = $img['thumbnail'];
                ?>            
                <?php echo wp_kses_post($thumbnail); ?>
                <span class="image-elip"></span>            
            <?php endif; ?>
            <?php if(!empty($settings['pxl_icon']['value'])) : ?>        
                <div class="pxl-item--icon">
                    <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                </div>
            <?php endif; ?>        
            <?php if(!empty($settings['step'] && $settings['style'] == 'default')) : ?>
                <div class="pxl-item--step">
                    <?php echo esc_attr($settings['step']); ?>
                </div>
            <?php endif; ?>

        </div>
    <?php endif; ?>
    <div class="pxl-item--meta">
     <<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--title el-empty"><?php echo pxl_print_html($settings['title']); ?></<?php echo esc_attr($settings['title_tag']); ?>>
     <div class="pxl-item--description el-empty"><?php echo pxl_print_html($settings['desc']); ?></div>
 </div>    
</div>
</div>