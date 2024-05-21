<div class="pxl-client-review pxl-client-review1 <?php echo esc_attr($settings['pxl_animate']); ?> <?php echo esc_attr( $settings['style']) ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <div class="pxl-item--images el-empty">
            <?php foreach ($settings['images'] as $key => $value): 
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $value['id'],
                    'thumb_size' => '90x90',
                ));
                $thumbnail = $img['thumbnail'];
                ?>
                <div class="pxl-item--img">
                    <?php echo wp_kses_post($thumbnail); ?>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="pxl-item--meta pxl-pr-20 pxl-pl-36">
            <div class="pxl-item--title"><?php echo pxl_print_html($settings['title']); ?></div>
            <?php if( $settings['show_star'] == 'true' ) : ?>             
                <span class="pxl-item--star <?php echo esc_attr($settings['star']); ?>">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </span>                
            <?php endif; ?>
        </div>
    </div>
</div>