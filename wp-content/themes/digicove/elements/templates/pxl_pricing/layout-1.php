<div class="pxl-pricing pxl-pricing1 <?php echo esc_attr( $settings['box_active'].' '.$settings['pxl_animate'] .' '. $settings['style']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <h3 class="pxl-title"><span><?php echo esc_attr($settings['title']); ?></span></h3>
    <div class="pxl-meta">
        <span class="pxl-after"><?php echo pxl_print_html($settings['pric_after']); ?></span>
        <div class="pxl-price">
            <?php if ($settings['currency'] != ''): ?>
                <span class="pxl-currency"><?php echo pxl_print_html($settings['currency']); ?></span>
            <?php endif; ?>
            <span class="pxl-value"><?php echo pxl_print_html($settings['price']); ?></span>
            <span class="pxl-suffix"><?php echo pxl_print_html($settings['pric_day']); ?></span>
        </div>
    </div>
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
            <span class="button-arrow-hover">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M11.0224 0.112104L3.7102 -0.000354929C3.51661 3.25587e-05 3.33325 0.0764821 3.19962 0.212529C3.06599 0.348576 2.99278 0.533334 2.99576 0.72701C2.99874 0.920687 3.07767 1.10778 3.21555 1.24801C3.35342 1.38823 3.53922 1.47036 3.73292 1.4767L9.26196 1.56174L0.218105 10.6056C0.0817139 10.742 0.00678252 10.9287 0.0097954 11.1246C0.0128083 11.3205 0.0935186 11.5095 0.234171 11.6502C0.374823 11.7908 0.563896 11.8715 0.759795 11.8746C0.955695 11.8776 1.14237 11.8026 1.27877 11.6663L10.3226 2.6224L10.4077 8.15144C10.4075 8.24947 10.4268 8.34717 10.4646 8.43883C10.5023 8.53048 10.5577 8.61426 10.6275 8.68527C10.6974 8.75628 10.7802 8.8131 10.8712 8.85242C10.9623 8.89173 11.0597 8.91276 11.1577 8.91427C11.2558 8.91578 11.3526 8.89774 11.4425 8.8612C11.5324 8.82467 11.6135 8.77037 11.6812 8.70147C11.7488 8.63258 11.8017 8.55047 11.8366 8.45993C11.8716 8.36939 11.8879 8.27224 11.8847 8.17415L11.7723 0.861991C11.7692 0.666129 11.6885 0.477103 11.5479 0.336478C11.4073 0.195854 11.2182 0.115146 11.0224 0.112104Z" fill="#FDFDFD"></path></svg>            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M11.0224 0.112104L3.7102 -0.000354929C3.51661 3.25587e-05 3.33325 0.0764821 3.19962 0.212529C3.06599 0.348576 2.99278 0.533334 2.99576 0.72701C2.99874 0.920687 3.07767 1.10778 3.21555 1.24801C3.35342 1.38823 3.53922 1.47036 3.73292 1.4767L9.26196 1.56174L0.218105 10.6056C0.0817139 10.742 0.00678252 10.9287 0.0097954 11.1246C0.0128083 11.3205 0.0935186 11.5095 0.234171 11.6502C0.374823 11.7908 0.563896 11.8715 0.759795 11.8746C0.955695 11.8776 1.14237 11.8026 1.27877 11.6663L10.3226 2.6224L10.4077 8.15144C10.4075 8.24947 10.4268 8.34717 10.4646 8.43883C10.5023 8.53048 10.5577 8.61426 10.6275 8.68527C10.6974 8.75628 10.7802 8.8131 10.8712 8.85242C10.9623 8.89173 11.0597 8.91276 11.1577 8.91427C11.2558 8.91578 11.3526 8.89774 11.4425 8.8612C11.5324 8.82467 11.6135 8.77037 11.6812 8.70147C11.7488 8.63258 11.8017 8.55047 11.8366 8.45993C11.8716 8.36939 11.8879 8.27224 11.8847 8.17415L11.7723 0.861991C11.7692 0.666129 11.6885 0.477103 11.5479 0.336478C11.4073 0.195854 11.2182 0.115146 11.0224 0.112104Z" fill="#FDFDFD"></path></svg>        </span>
            </a>
        <?php } ?>
    <?php endif; ?>
</div>