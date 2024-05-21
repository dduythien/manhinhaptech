<?php
$html_id = pxl_get_element_id($settings);
$select_post_by = $widget->get_setting('select_post_by', '');
$source = $post_ids = [];
if($select_post_by === 'post_selected'){
    $post_ids = $widget->get_setting('source_'.$settings['post_type'].'_post_ids', '');
}else{
    $source  = $widget->get_setting('source_'.$settings['post_type'], '');
}
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$settings['layout']    = $settings['layout_'.$settings['post_type']];
extract(pxl_get_posts_of_grid('service', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
]));

$pxl_animate = $widget->get_setting('pxl_animate', '');
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$col_xxl = $widget->get_setting('col_xxl', '');
if($col_xxl == 'inherit') {
    $col_xxl = $col_xl;
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');

$arrows = $widget->get_setting('arrows','false');
$pagination = $widget->get_setting('pagination','false');
$pagination_type = $widget->get_setting('pagination_type','bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite');
$speed = $widget->get_setting('speed', '500');
$center = $widget->get_setting('center', 'false');

$img_size = $widget->get_setting('img_size');
$show_list = $widget->get_setting('show_list');
$show_excerpt = $widget->get_setting('show_excerpt');
$num_words = $widget->get_setting('num_words');
$text_line = $widget->get_setting('text_line');
$show_button = $widget->get_setting('show_button');
$button_text = $widget->get_setting('button_text');
$gradient_color = digicove()->get_opt( 'gradient_color' );

$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => '1',
    'slide_percolumnfill'           => '1',
    'slide_mode'                    => 'slide',
    'slides_to_show'                => $col_xl,
    'slides_to_show_xxl'             => $col_xxl,
    'slides_to_show_lg'             => $col_lg,
    'slides_to_show_md'             => $col_md,
    'slides_to_show_sm'             => $col_sm,
    'slides_to_show_xs'             => $col_xs,
    'slides_to_scroll'              => $slides_to_scroll,
    'slides_gutter'                 => 30,
    'arrow'                         => $arrows,
    'pagination'                    => $pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => $autoplay,
    'pause_on_hover'                => $pause_on_hover,
    'pause_on_interaction'          => 'true',
    'delay'                         => $autoplay_speed,
    'loop'                          => $infinite,
    'speed'                         => $speed,
    'center'                         => $center,
];

$cursor_arrow = $widget->get_setting('cursor_arrow','false');   
$cursor_drag = $widget->get_setting('cursor_drag','false');   
$cursor_arrow_cls = $cursor_arrow == 'true' ? 'cursor-arrow' : 'none-cursor';
$cursor_drag_cls = $cursor_drag == 'true' ? 'cursor-drag' : 'none-drag';

$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container ' .$cursor_drag_cls.'-area',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)    
]); 
?>

<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-sliders pxl-service-carousel pxl-service-carousel3 pxl-parent-transition <?php if($center == 'true') { echo 'pxl--swiper-center'; } ?> <?php if($arrows == true) { echo 'pxl-arrows-active'; } ?>">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php
                    foreach ($posts as $post):
                        $service_excerpt =  $post->post_excerpt;
                        $service_subtitle = get_post_meta($post->ID, 'service_subtitle', true);
                        $service_external_link = get_post_meta($post->ID, 'service_external_link', true);                        
                        $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
                        $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
                        $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);                     
                        ?>
                        <div class="pxl-swiper-slide">
                            <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                            $image_size = !empty($img_size) ? $img_size : 'full';
                            $img_id       = get_post_thumbnail_id( $post->ID );
                            $img          = digicove_get_image_by_size( array(
                                'attach_id'  => $img_id,
                                'thumb_size' => $image_size
                            ) );
                            $thumbnail    = $img['thumbnail']; ?>
                        <?php endif; ?>
                        <div class="pxl-item--inner pxl-not-active <?php echo esc_attr($pxl_animate); ?><?php echo esc_attr($settings['after_service_mix']); ?>" data-wow-duration="1.2s">    
                            <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                            <div class="item--featured">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </div>
                            <div class="pxl-item--holder">
                            <?php endif; ?>
                            <?php if(!empty($service_subtitle)): ?>
                                <div class="pxl-item--subtitle">
                                    <?php echo esc_attr($service_subtitle); ?>
                                </div>
                            <?php endif; ?>
                            <h3 class="pxl-item--title">
                                <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                            </h3>
                        </div>
                        <?php if($show_button == 'true') : ?>
                            <div class="item-readmore">
                                <a class="btn-link" href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="27" viewBox="0 0 34 27" fill="none">
                                        <path d="M33.5475 12.2862L22.7292 0.473702C22.4377 0.16631 22.0474 -0.00378104 21.6421 6.37917e-05C21.2369 0.00390862 20.8493 0.181382 20.5628 0.494258C20.2762 0.807134 20.1137 1.23038 20.1102 1.67284C20.1066 2.11529 20.2624 2.54156 20.5439 2.85983L28.7241 11.7918L1.54547 11.7918C1.13559 11.7918 0.742489 11.9696 0.452657 12.286C0.162826 12.6025 0 13.0317 0 13.4793C0 13.9268 0.162826 14.356 0.452657 14.6725C0.742489 14.989 1.13559 15.1668 1.54547 15.1668L28.7241 15.1668L20.5439 24.0987C20.3963 24.2544 20.2786 24.4406 20.1976 24.6465C20.1166 24.8523 20.074 25.0738 20.0722 25.2978C20.0704 25.5219 20.1095 25.7441 20.1872 25.9515C20.2649 26.1589 20.3797 26.3473 20.5248 26.5057C20.6699 26.6642 20.8424 26.7895 21.0324 26.8743C21.2223 26.9592 21.4258 27.0019 21.631 26.9999C21.8362 26.998 22.039 26.9514 22.2276 26.863C22.4161 26.7746 22.5867 26.646 22.7292 26.4848L33.5475 14.6723C33.8372 14.3559 34 13.9267 34 13.4793C34 13.0318 33.8372 12.6027 33.5475 12.2862Z" fill="#F87D6C"/>
                                    </svg>
                                </a>
                            </div>
                        <?php endif; ?>                         
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php if($arrows == 'true'): ?>
        <div class="col-sm-4 col-12">
            <div class="wp-arrow style1" data-cursor="-hidden">
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev">
                </div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next">
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if($pagination !== 'false'): ?>
        <div class="pxl-swiper-dots"></div>
    <?php endif; ?>
</div>
</div>
<?php endif; ?>