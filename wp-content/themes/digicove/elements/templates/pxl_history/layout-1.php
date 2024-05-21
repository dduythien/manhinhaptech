<div class="pxl-history <?php echo esc_attr($settings['style']); ?>">
  <?php
  if(isset($settings['history']) && !empty($settings['history']) && count($settings['history'])): ?>
    <div class=" pxl-history-l1 " data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php
        foreach ($settings['history'] as $key => $history): ?>
            <?php
             $item_cls = [ 'elementor-repeater-item-'.$history['_id'] ]; 
             $item_at = [ 'elementor-repeater-item-'.$history['_id'] ]; 
            ?>
            <div class="corner-box <?php echo esc_attr($settings['pxl_animate']); ?> <?php echo implode(' ', $item_cls) ?>">
                <div class="wrap-content">                    
                    <div class="time"><?php echo pxl_print_html($history['time']); ?></div>
                    <div class="title"><?php echo pxl_print_html($history['text']); ?></div>
                    <div class="desc"><?php echo pxl_print_html($history['decs']); ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
</div> 