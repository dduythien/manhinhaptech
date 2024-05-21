<div class="pxl-case-detail1">
    <?php if(isset($settings['items']) && !empty($settings['items']) && count($settings['items'])): ?>
    <h3 class="pxl-item--title"><?php echo esc_attr($settings['title']); ?></h3>
    <div class="pxl-item-holder">
        <div class="pxl--item">        
            <label><?php pxl_print_html('Client Name', 'digicove'); ?></label>
            <span>
                <?php
                $case_client = digicove()->get_page_opt('case_client');
                echo esc_attr($case_client); ?>
            </span>
        </div>
        <?php foreach ($settings['items'] as $key => $value):
            $label = isset($value['label']) ? $value['label'] : '';
            $content = isset($value['content']) ? $value['content'] : ''; ?>
            <div class="pxl--item <?php echo esc_attr($settings['pxl_animate']);?>" >
                <?php if(!empty($label)) : ?>
                    <label><?php echo esc_attr($label); ?></label>
                <?php endif; ?>

                <?php if(!empty($content)) : ?>
                    <span><?php echo esc_attr($content); ?></span>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
        <div class="pxl--item">
            <?php if( $settings['show_star'] == 'true' ) : ?>
                <label><?php pxl_print_html('Client Rating', 'digicove') ?></label>                
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
<?php endif; ?>
</div>