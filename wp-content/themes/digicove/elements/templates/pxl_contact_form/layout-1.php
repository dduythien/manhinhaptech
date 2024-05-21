<?php
if(class_exists('WPCF7') && !empty($settings['form_id'])) : ?>
    <div class="pxl-contact-form pxl-contact-form1 <?php if ($settings['btn-w-auto'] == false) {
        echo printf('btn-w-auto');
    } ?> <?php echo esc_attr( $settings['pxl_animate'] ); ?> <?php echo esc_attr($settings['style']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl--el-title">
        <?php if ($settings['show_title'] == 'title-on') :?>
            <h3 class="pxl-item--title">
                <?php echo esc_attr($settings['title']); ?>
            </h3>
        <?php endif; ?>
        <?php if ($settings['show_sub_title'] == 'sub-title-on') :?>
            <h3 class="pxl-item--sub-title">
                <?php echo esc_attr($settings['sub_title']); ?>
            </h3>
        <?php endif; ?>        
    </div>
    <?php echo do_shortcode('[contact-form-7 id="'.esc_attr( $settings['form_id'] ).'"]'); ?>
</div>
<?php endif; ?>