<?php 
extract($settings);

$img_size = !empty( $img_size ) ? $img_size : 'full'; 
$thumbnail    = '';
 
if(!empty($image['id'])){
    $img  = pxl_get_image_by_size( array(
        'attach_id'  => $image['id'],
        'thumb_size' => $img_size,
    ) );
    $thumbnail    = $img['thumbnail'];  
}
 

if(!empty($image['id'])) : ?>
    <div class="pxl-img-text d-flex-wrap relative">
        <?php if(!empty($title)): ?> 
            <div class="title-outer absolute" data-parallax='{"x": <?php echo pxl_print_html($settings['text_offset_left']['size']); ?>}'><?php pxl_print_html($title) ?></div>
        <?php endif; ?>
        <div class="content-img relative">
            <div class="pxl-img <?php echo pxl_print_html($settings['img_border']); ?>" data-parallax='{"y": <?php echo pxl_print_html($settings['img_offset_left']['size']); ?>}'>
                <?php if ( ! empty( $image['url'] ) ) echo wp_kses_post($thumbnail); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
