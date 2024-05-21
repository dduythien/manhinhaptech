<div class="pxl-history pxl-history2">
  <?php
  if(isset($settings['history2']) && !empty($settings['history2']) && count($settings['history2'])): ?>
    <div class=" pxl-history-l2 " data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php
        foreach ($settings['history2'] as $key => $history): ?>
            <?php
            $item_cls = [ 'elementor-repeater-item-'.$history['_id'] ]; 
            $item_at = [ 'elementor-repeater-item-'.$history['_id'] ]; 

            ?>
            <div class="corner-box <?php echo esc_attr($settings['pxl_animate']); ?> <?php echo implode(' ', $item_cls) ?>">
                <div class="wrap-content">                    
                    <div class="icon"><?php \Elementor\Icons_Manager::render_icon( $history['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                    <div class="arrow-divider"></div>
                </div>
                <div class="wrap-content-box">
                    <div class="title"><?php echo pxl_print_html($history['text2']); ?></div>
                    <div class="desc"><?php echo pxl_print_html($history['decs2']); ?></div>                                        
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>
</div> 