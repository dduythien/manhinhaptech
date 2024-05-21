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
$show_title = $widget->get_setting('show_title','false');  
$show_postion = $widget->get_setting('show_postion','false');
$pagination = $widget->get_setting('pagination','false');
$center = $widget->get_setting('center', 'false');
$pagination_type = $widget->get_setting('pagination_type','bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay', '');
$arrows_type = $widget->get_setting('arrows_type','style1');
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
    'autoplay'                      => $autoplay,
    'pause_on_hover'                => $pause_on_hover,
    'pause_on_interaction'          => 'true',
    'delay'                         => $autoplay_speed,
    'loop'                          => $infinite,
    'center'                         => $center,
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
    <div class="pxl-swiper-sliders pxl-testimonial-carousel pxl-testimonial-carousel2 pxl-swiper-boxshadow pxl-swiper-arrow-show <?php if($center == 'true') { echo 'pxl--swiper-center'; } ?>">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['testimonial'] as $key => $value):
                        $image = isset($value['image']) ? $value['image'] : '';
                        $title = isset($value['title']) ? $value['title'] : '';
                        $position = isset($value['position']) ? $value['position'] : '';
                        $desc = isset($value['desc']) ? $value['desc'] : '';
                        $show_star = isset($value['show_star']) ? $value['show_star'] : '';
                        $star = isset($value['star']) ? $value['star'] : '';
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">  
                                <?php if(!empty($image['id'])) { 
                                    $img = pxl_get_image_by_size( array(
                                        'attach_id'  => $image['id'],
                                        'thumb_size' => '712x846',
                                        'class' => 'no-lazyload',
                                    ));
                                    $thumbnail = $img['thumbnail'];?>                                    
                                    <?php echo wp_kses_post($thumbnail); ?>                                    
                                <?php } ?>
                                <div class="pxl-item-body">
                                    <?php if( $show_star == 'true' ) : ?>             
                                        <span class="pxl-item--star <?php echo esc_attr($star); ?>">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </span>                
                                    <?php endif; ?>
                                    <div class="pxl-item--desc el-empty"><?php echo pxl_print_html($desc); ?></div>
                                    <div class="pxl-item-meta">
                                        <?php if($show_title !== 'false') { ?>
                                            <h4 class="pxl-item--title el-empty"><?php echo pxl_print_html($title); ?></h4>
                                        <?php } ?>
                                        <?php if($show_postion !== 'false') { ?>
                                            <div class="pxl-item--position el-empty"><?php echo pxl_print_html($position); ?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php if($arrows !== 'false'): ?>
                <div class="wp-arrow <?php echo esc_attr($settings['arrows_type']); ?>">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev <?php echo esc_attr($cursor_arrow_cls.'-prev') ?>">
                        <?php if ($arrows_type == 'style2') :?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="21" viewBox="0 0 28 21" fill="none">
                                <path d="M26.8703 9.55593L18.4561 0.368435C18.2294 0.129352 17.9258 -0.00294081 17.6106 4.96157e-05C17.2954 0.00304004 16.9939 0.141075 16.7711 0.384423C16.5482 0.627771 16.4218 0.956962 16.4191 1.3011C16.4163 1.64523 16.5375 1.97677 16.7564 2.22431L23.1188 9.17137L1.97986 9.17137C1.66107 9.17137 1.35532 9.30965 1.1299 9.55579C0.904474 9.80194 0.777832 10.1358 0.777832 10.4839C0.777832 10.832 0.904474 11.1658 1.1299 11.4119C1.35532 11.6581 1.66107 11.7964 1.97986 11.7964L23.1188 11.7964L16.7564 18.7434C16.6416 18.8645 16.5501 19.0093 16.4871 19.1695C16.4241 19.3296 16.3909 19.5018 16.3895 19.6761C16.3881 19.8504 16.4185 20.0232 16.479 20.1845C16.5394 20.3458 16.6287 20.4923 16.7415 20.6156C16.8544 20.7388 16.9886 20.8363 17.1363 20.9023C17.2841 20.9683 17.4423 21.0015 17.602 21C17.7616 20.9984 17.9193 20.9622 18.0659 20.8934C18.2126 20.8247 18.3452 20.7247 18.4561 20.5993L26.8703 11.4118C27.0957 11.1657 27.2223 10.8319 27.2223 10.4839C27.2223 10.1358 27.0957 9.80206 26.8703 9.55593Z" fill="url(#paint0_linear_14_9326)"/>
                                <defs>
                                    <linearGradient id="paint0_linear_14_9326" x1="0.777832" y1="0" x2="27.2223" y2="0" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FF7369"/>
                                        <stop offset="1" stop-color="#FFB06D"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                        <?php endif; ?>
                    </div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next <?php echo esc_attr($cursor_arrow_cls.'-next') ?>">
                        <?php if ($arrows_type == 'style2') :?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="21" viewBox="0 0 28 21" fill="none">
                                <path d="M26.8703 9.55593L18.4561 0.368435C18.2294 0.129352 17.9258 -0.00294081 17.6106 4.96157e-05C17.2954 0.00304004 16.9939 0.141075 16.7711 0.384423C16.5482 0.627771 16.4218 0.956962 16.4191 1.3011C16.4163 1.64523 16.5375 1.97677 16.7564 2.22431L23.1188 9.17137L1.97986 9.17137C1.66107 9.17137 1.35532 9.30965 1.1299 9.55579C0.904474 9.80194 0.777832 10.1358 0.777832 10.4839C0.777832 10.832 0.904474 11.1658 1.1299 11.4119C1.35532 11.6581 1.66107 11.7964 1.97986 11.7964L23.1188 11.7964L16.7564 18.7434C16.6416 18.8645 16.5501 19.0093 16.4871 19.1695C16.4241 19.3296 16.3909 19.5018 16.3895 19.6761C16.3881 19.8504 16.4185 20.0232 16.479 20.1845C16.5394 20.3458 16.6287 20.4923 16.7415 20.6156C16.8544 20.7388 16.9886 20.8363 17.1363 20.9023C17.2841 20.9683 17.4423 21.0015 17.602 21C17.7616 20.9984 17.9193 20.9622 18.0659 20.8934C18.2126 20.8247 18.3452 20.7247 18.4561 20.5993L26.8703 11.4118C27.0957 11.1657 27.2223 10.8319 27.2223 10.4839C27.2223 10.1358 27.0957 9.80206 26.8703 9.55593Z" fill="url(#paint0_linear_14_9326)"/>
                                <defs>
                                    <linearGradient id="paint0_linear_14_9326" x1="0.777832" y1="0" x2="27.2223" y2="0" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FF7369"/>
                                        <stop offset="1" stop-color="#FFB06D"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                        <?php endif; ?>
                    </div>                    
                </div>
            <?php endif; ?>
            <?php if($pagination !== 'false'): ?>
                <div class="pxl-swiper-dots"></div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
