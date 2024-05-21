<?php
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
$autoplay = $widget->get_setting('autoplay', '');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite','false');
$speed = $widget->get_setting('speed', '500');
$center_img = $widget->get_setting('center_img', 'false');

$show_cursor_text = $widget->get_setting('show_cursor_text');
$cursor_text = $widget->get_setting('cursor_text');

$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => '1',
    'slide_mode'                    => 'slide',
    'slides_to_show'                => $col_xl,
    'slides_to_show_xxl'             => $col_xxl,
    'slides_to_show_lg'             => $col_lg,
    'slides_to_show_md'             => $col_md,
    'slides_to_show_sm'             => $col_sm,
    'slides_to_show_xs'             => $col_xs,
    'slides_to_scroll'              => $slides_to_scroll,
    'arrow'                         => $arrows,
    'pagination'                    => $pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => $autoplay,
    'pause_on_hover'                => $pause_on_hover,
    'pause_on_interaction'          => 'true',
    'delay'                         => $autoplay_speed,
    'loop'                          => $infinite,
    'speed'                         => $speed
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

if ( ! empty( $settings['link']['url'] ) ) {
    $widget->add_render_attribute( 'link', 'href', $settings['link']['url'] );

    if ( $settings['link']['is_external'] ) {
        $widget->add_render_attribute( 'link', 'target', '_blank' );
    }
    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'link', 'rel', 'nofollow' );
    }
}

if(isset($settings['list']) && !empty($settings['list']) && count($settings['list'])): ?>
    <div class="pxl-swiper-sliders pxl-instagram-carousel pxl-instagram-carousel1 pxl-swiper-arrow-show pxl-parent-transition" data-arrow="<?php echo esc_attr($arrows); ?>">
        <?php if(!empty($settings['title'])) : ?>
            <div class="container-custom">
                <?php if ( ! empty( $settings['link']['url'] ) ) { ?><a <?php pxl_print_html($widget->get_render_attribute_string( 'link' )); ?>><?php } ?>
                <h6 class="pxl-item--title pxl-wobble">
                    <?php $chars = str_split($settings['title']);
                    foreach ($chars as $value) {
                        if ($value == " ") {
                            $value = "&nbsp;";
                        }
                        echo '<span>'.$value.'</span>';
                    } ?>
                </h6>
                <?php if ( ! empty( $settings['link']['url'] ) ) { ?></a><?php } ?>
            </div>
        <?php endif; ?>
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper pxl-transtion <?php if($center_img == 'true') { echo 'pxl-item--flexnw'; } ?>">
                    <?php foreach ($settings['list'] as $key => $value):
                        $image = isset($value['image']) ? $value['image'] : '';
                        $image_size = !empty($value['img_size']) ? $value['img_size'] : '868x960';
                        $btn_text = isset($value['btn_text']) ? $value['btn_text'] : '';
                        $btn_link = isset($value['btn_link']) ? $value['btn_link'] : '';
                        $link_key = $widget->get_repeater_setting_key( 'btn_link', 'value', $key );
                        $style = isset($value['style']) ? $value['style'] : '';
                        if ( ! empty( $btn_link['url'] ) ) {
                            $widget->add_render_attribute( $link_key, 'href', $btn_link['url'] );

                            if ( $btn_link['is_external'] ) {
                                $widget->add_render_attribute( $link_key, 'target', '_blank' );
                            }

                            if ( $btn_link['nofollow'] ) {
                                $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                            }
                        }
                        $link_attributes = $widget->get_render_attribute_string( $link_key );
                        ?>
                        <div class="pxl-swiper-slide ">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['speed']); ?>ms">
                                <?php if ( !empty($image['id']) ) :
                                    $img_icon  = pxl_get_image_by_size( array(
                                        'attach_id'  => $image['id'],
                                        'thumb_size' => $image_size,
                                    ) );
                                    $thumbnail_icon    = $img_icon['thumbnail']; ?>
                                    <?php if(!empty($btn_link['url'])) { ?> <a <?php echo implode( ' ', [ $link_attributes ] ); ?>> <?php } ?>
                                    <div class="pxl-item--image <?php echo esc_attr($style); ?>" <?php if($show_cursor_text == 'true') { echo 'data-cursor-text="'.esc_attr($data_cursor_text).'"'; } ?>>
                                        <?php echo pxl_print_html($thumbnail_icon); ?>
                                        <?php if($style == 'style2' && !empty($btn_text)) : ?>
                                            <span class="pxl-item--link pxl-wobble">
                                                <?php $chars = str_split($btn_text);
                                                foreach ($chars as $value) {
                                                    if ($value == " ") {
                                                        $value = "&nbsp;";
                                                    }
                                                    echo '<span>'.$value.'</span>';
                                                } ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <i class="caseicon-instagram"></i>                                        
                                    <?php if (!empty($btn_link['url'])) { ?></a><?php } ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php if($arrows !== 'false' || $pagination !== 'false'): ?>
            <div class="wp-arrow" data-cursor="-hidden">
                <?php if($arrows !== 'false'): ?>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="far fa-arrow-left"></i></div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="far fa-arrow-right"></i></div>
                <?php endif; ?>
                <?php if($pagination !== 'false'): ?>
                    <div class="pxl-swiper-dots"></div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
