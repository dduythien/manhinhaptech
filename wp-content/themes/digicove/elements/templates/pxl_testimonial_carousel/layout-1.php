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
$arrows_type = $widget->get_setting('arrows_type','false');  
$show_title = $widget->get_setting('show_title','false');  
$show_postion = $widget->get_setting('show_postion','false');
$pagination = $widget->get_setting('pagination','false');
$pagination_type = $widget->get_setting('pagination_type','bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay', '');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite','false');  
$speed = $widget->get_setting('speed', '500');
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
    'show_title'                    => $show_title,
    'show_postion'                  => $show_postion,
    'pagination'                    => $pagination,
    'pagination_type'               => $pagination_type,
    'arrows_type'               => $arrows_type,
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
if(isset($settings['testimonial']) && !empty($settings['testimonial']) && count($settings['testimonial'])): ?>
    <div class="pxl-swiper-sliders pxl-testimonial-carousel pxl-testimonial-carousel1 pxl-swiper-boxshadow pxl-swiper-arrow-show">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['testimonial'] as $key => $value):
                        $image = isset($value['image']) ? $value['image'] : '';
                        $title = isset($value['title']) ? $value['title'] : '';
                        $position = isset($value['position']) ? $value['position'] : '';
                        $desc = isset($value['desc']) ? $value['desc'] : '';
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="50" viewBox="0 0 70 50" fill="none">
                                    <g id="Vector" opacity="0.4">
                                        <path id="Vector_2" d="M28.4103 0H2.05079C0.918048 0 0 0.913827 0 2.04136V28.2797C0 29.4073 0.918048 30.3211 2.05079 30.3211H13.1795V47.9586C13.1795 49.0856 14.0976 50 15.2303 50H21.8206C22.7034 50 23.4868 49.4376 23.7656 48.604L30.3554 28.9251C30.4253 28.7172 30.4611 28.4993 30.4611 28.2797V2.04136C30.4611 0.913827 29.5431 0 28.4103 0Z" fill="url(#paint0_linear_14_8635)"/>
                                        <path id="Vector_3" d="M67.9489 0H41.5894C40.4566 0 39.5386 0.913827 39.5386 2.04136V28.2797C39.5386 29.4073 40.4566 30.3211 41.5894 30.3211H52.7186V47.9586C52.7186 49.0856 53.6367 50 54.7694 50H61.3592C62.242 50 63.0254 49.4376 63.3047 48.604L69.8945 28.9251C69.9639 28.7172 69.9997 28.4993 69.9997 28.2797V2.04136C69.9997 0.913827 69.0817 0 67.9489 0Z" fill="url(#paint1_linear_14_8635)"/>
                                    </g>
                                    <defs>
                                        <linearGradient id="paint0_linear_14_8635" x1="0" y1="0" x2="30.4611" y2="0" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FF7369"/>
                                            <stop offset="1" stop-color="#FFB06D"/>
                                        </linearGradient>
                                        <linearGradient id="paint1_linear_14_8635" x1="39.5386" y1="0" x2="69.9997" y2="0" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FF7369"/>
                                            <stop offset="1" stop-color="#FFB06D"/>
                                        </linearGradient>
                                    </defs>
                                </svg>
                                <div class="pxl-item--desc el-empty"><?php echo pxl_print_html($desc); ?></div>
                                <div class="pxl-item-body">
                                    <?php if(!empty($image['id'])) { 
                                        $img = pxl_get_image_by_size( array(
                                            'attach_id'  => $image['id'],
                                            'thumb_size' => '564x664',
                                            'class' => 'no-lazyload',
                                        ));
                                        $thumbnail = $img['thumbnail'];?>
                                        <div class="pxl-item--image wow skewIn" data-wow-delay="900ms">
                                            <?php echo wp_kses_post($thumbnail); ?>
                                        </div>
                                    <?php } ?>
                                    <?php if($show_title !== 'false') { ?>
                                        <h4 class="pxl-item--title el-empty"><?php echo pxl_print_html($title); ?></h4>
                                    <?php } ?>
                                    <?php if($show_postion !== 'false') { ?>
                                        <div class="pxl-item--position el-empty"><?php echo pxl_print_html($position); ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php if($arrows !== 'false'): ?>
                <div class="wp-arrow">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev <?php echo esc_attr($cursor_arrow_cls.'-prev') ?>"></div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next <?php echo esc_attr($cursor_arrow_cls.'-next') ?>"></div>                    
                </div>
            <?php endif; ?>
            <?php if($pagination !== 'false'): ?>
                <div class="pxl-swiper-dots"></div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
