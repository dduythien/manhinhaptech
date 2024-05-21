<div class="pxl-clients-feedback1">
    <?php 
    $image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
    $img_id = $settings['image']['id'];
    $img  = pxl_get_image_by_size( array(
        'attach_id'  => $img_id,
        'thumb_size' => $image_size,
        'class' => 'no-lazyload'
    ) );
    $thumbnail    = $img['thumbnail'];
    $thumbnail_url    = $img['url'];
    echo wp_kses_post($thumbnail);
    ?>
    <div class="pxl-item-holder">
        <?php if( $settings['show_star'] == 'true' ) : ?>             
            <span class="pxl-item--star <?php echo esc_attr($settings['star']); ?>">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </span>                
        <?php endif; ?>
        <div class="pxl-item-content"><?php echo esc_attr($settings['content']); ?></div>
        <div class="pxl-item-meta">
            <span class="pxl-item--title"><?php echo esc_attr($settings['title']); ?></span>
            <span class="pxl-item--position"><?php echo esc_attr($settings['position']); ?></span>            
        </div>
    </div>
</div>