<div class="pxl-pricing pxl-pricing2 <?php echo esc_attr( $settings['box_active']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-meta">
        <span class="pxl-after"><?php echo pxl_print_html($settings['pric_after']); ?></span>
        <div class="pxl-price">
            <?php if ($settings['currency'] != ''): ?>
                <span class="pxl-currency"><?php echo pxl_print_html($settings['currency']); ?></span>
            <?php endif; ?> 
            <span class="pxl-value"><?php echo pxl_print_html($settings['price']); ?></span>
            <span class="pxl-dup-value"><?php echo pxl_print_html($settings['price']); ?></span>
            <span class="pxl-suffix"><?php echo pxl_print_html($settings['pric_day']); ?></span>
        </div>
    </div>
    <span class="pxl-sub-title"><?php echo esc_attr($settings['sub_title']); ?></span>
    <h3 class="pxl-title"><span><?php echo esc_attr($settings['title']); ?></span></h3>
    <?php if(isset($settings['feature']) && !empty($settings['feature']) && count($settings['feature'])): ?>
    <ul class="pxl-feature">
        <?php foreach ($settings['feature'] as $key => $value): ?>
            <div class="<?php echo esc_attr($value['active']); ?>">
                <?php if($value['active'] == 'non-active') { ?><del><?php } ?>
                <?php echo pxl_print_html($value['feature_text'])?>
                <?php if($value['active'] == 'non-active') { ?></del><?php } ?>
            </div>
        <?php endforeach; ?>
    </ul>
    <?php if ( ! empty( $settings['btn_text'] ) ) {?>
        <?php 
        $widget->add_render_attribute( 'btn_link', 'href', $settings['btn_link']['url'] );

        if ( $settings['btn_link']['is_external'] ) {
            $widget->add_render_attribute( 'btn_link', 'target', '_blank' );
        }

        if ( $settings['btn_link']['nofollow'] ) {
            $widget->add_render_attribute( 'btn_link', 'rel', 'nofollow' );
        } 
        ?>
        <a class="btn" <?php pxl_print_html($widget->get_render_attribute_string( 'btn_link' )); ?>>
            <span>
                <?php echo esc_attr($settings['btn_text']); ?>
            </span>
        </a>
    <?php } ?>
<?php endif; ?>
</div>