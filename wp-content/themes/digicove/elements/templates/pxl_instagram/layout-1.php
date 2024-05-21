<?php 
    $images_size = !empty($settings['img_size']) ? $settings['img_size'] : '300x300'; 
    if ( ! empty( $settings['ins_link']['url'] ) ) {
        $widget->add_render_attribute( 'link', 'href', $settings['ins_link']['url'] );

        if ( $settings['ins_link']['is_external'] ) {
            $widget->add_render_attribute( 'link', 'target', '_blank' );
        }

        if ( $settings['ins_link']['nofollow'] ) {
            $widget->add_render_attribute( 'link', 'rel', 'nofollow' );
        }
    }
?>
<?php if(isset($settings['images']) && !empty($settings['images']) && count($settings['images'])): ?>
    <div class="pxl-instagram pxl-instagram1">
        <?php foreach ($settings['images'] as $key => $value): 
            $img = pxl_get_image_by_size( array(
                'attach_id'  => $value['id'],
                'thumb_size' => $images_size,
            ));
            $thumbnail = $img['thumbnail']; ?>
            <div class="pxl--item <?php if($settings['item_active'] == $key + 1) { echo 'active'; } ?>">
                <?php echo wp_kses_post($thumbnail); ?>
                <a <?php pxl_print_html($widget->get_render_attribute_string( 'link' )); ?>><i class="caseicon-instagram"></i></a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
