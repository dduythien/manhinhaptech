<?php 
$img_size = '';
if(!empty($settings['img_size'])) {
    $img_size = $settings['img_size'];
} else {
    $img_size = 'full';
}
?>
<div class="pxl-video-player pxl-video-player1 pxl-video-<?php echo esc_attr($settings['btn_video_style']); ?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-video--inner">
        <?php if( $settings['image_type'] != 'none' && !empty( $settings['image']['url'] ) ) : 
            $img  = pxl_get_image_by_size( array(
                'attach_id'  => $settings['image']['id'],
                'thumb_size' => $img_size,
            ) );
            $thumbnail    = $img['url'];
            ?>
            <div class="pxl-video--holder" <?php if ($settings['btn_video_style'] == 'style4' || $settings['btn_video_style'] == 'style5') {?>
                data-parallax='{"y": 80}'
            <?php } ?> >
                <?php if ($settings['image_type'] == 'img') { ?>
                    <?php if ( ! empty( $settings['image']['url'] ) ) { ?>
                        <img decoding="async" src="<?php echo pxl_print_html($thumbnail); ?>" class="no-lazyload attachment-full" alt="video imagebg">
                    <?php } ?>
                <?php } else { ?>
                    <div class="pxl-video--imagebg bg-image" style="background-image: url(<?php echo esc_url($settings['image']['url']); ?>);"></div>
                <?php } ?>
            </div>
        <?php endif; ?>
        <?php if(!empty($settings['video_link'])) : ?>
            <div class="btn-video-wrap <?php echo esc_attr($settings['btn_video_position']); ?>">
                <a class="btn-video <?php echo esc_attr($settings['btn_video_style']); ?>" href="<?php echo esc_url($settings['video_link']); ?>">
                    <i class="caseicon-play1"></i>
                    <span><?php if ($settings['btn_video_style'] == 'style4') {
                        echo esc_attr($settings['video_text']);
                    } ?></span>
                </a>
                <span><?php if ($settings['btn_video_style'] == 'style3') {
                    echo esc_attr($settings['video_text']);
                } ?></span>
                <span class="pxl-shadow-gradient"></span>
            </div>
        <?php endif; ?>
    </div>
</div>