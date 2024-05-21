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
    <div class="pxl-swiper-sliders pxl-testimonial-carousel pxl-testimonial-carousel5 pxl-swiper-boxshadow pxl-swiper-arrow-show">
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
                                <div class="pxl-item--box">
                                    <div class="pxl-item--box-top">
                                        <?php if( $show_star == 'true' ) : ?>             
                                            <span class="pxl-item--star <?php echo esc_attr($star); ?>">
                                                <i class="flaticon-star"></i>
                                                <i class="flaticon-star"></i>
                                                <i class="flaticon-star"></i>
                                                <i class="flaticon-star"></i>
                                                <i class="flaticon-star"></i>
                                            </span>                
                                        <?php endif; ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="24" viewBox="0 0 28 24" fill="none">
                                          <g opacity="0.2">
                                            <path d="M9.69248 0H3.23083C2.33327 0 1.5705 0.314139 0.942173 0.942239C0.314136 1.57046 0 2.33323 0 3.23085V9.69233C0 10.5899 0.313959 11.3525 0.942173 11.9806C1.57044 12.6087 2.33345 12.9229 3.23083 12.9229H7.00005C7.44862 12.9229 7.83012 13.0801 8.14426 13.3941C8.4584 13.7079 8.6154 14.0896 8.6154 14.5385V15.0767C8.6154 16.2658 8.19465 17.2808 7.35338 18.1223C6.51205 18.9634 5.49691 19.3841 4.30761 19.3841H3.23083C2.93897 19.3841 2.68666 19.4909 2.47342 19.7039C2.26037 19.9169 2.15375 20.1694 2.15375 20.4611V22.6152C2.15375 22.9064 2.26037 23.1594 2.47342 23.3725C2.68684 23.5854 2.93891 23.6923 3.23083 23.6923H4.30767C5.47446 23.6923 6.58784 23.4648 7.64801 23.0106C8.70811 22.5564 9.62512 21.942 10.3992 21.1679C11.1731 20.3938 11.7874 19.477 12.2416 18.4168C12.6959 17.3567 12.9231 16.2433 12.9231 15.0767V3.23062C12.9231 2.333 12.6089 1.57028 11.9808 0.94218C11.3528 0.31408 10.5898 0 9.69248 0Z" fill="url(#paint0_linear_1_683)"/>
                                            <path d="M27.0574 0.942239C26.4294 0.314139 25.6666 0 24.769 0H18.3074C17.4099 0 16.6471 0.314139 16.019 0.942239C15.3909 1.57052 15.0769 2.33323 15.0769 3.23085V9.69233C15.0769 10.5899 15.3909 11.3525 16.019 11.9806C16.6471 12.6087 17.4099 12.9229 18.3074 12.9229H22.0767C22.5253 12.9229 22.9071 13.0801 23.2212 13.3941C23.535 13.7081 23.6923 14.0896 23.6923 14.5385V15.0767C23.6923 16.2658 23.2716 17.2808 22.4301 18.1223C21.5888 18.9634 20.5739 19.3841 19.3845 19.3841H18.3074C18.0158 19.3841 17.7633 19.4909 17.5503 19.7039C17.3371 19.9169 17.2303 20.1694 17.2303 20.4611V22.6152C17.2303 22.9064 17.3371 23.1594 17.5503 23.3725C17.7632 23.5854 18.0158 23.6923 18.3074 23.6923H19.3845C20.5511 23.6923 21.6645 23.4648 22.7248 23.0106C23.7847 22.5564 24.7016 21.942 25.4758 21.1679C26.2499 20.3938 26.8645 19.4767 27.3185 18.4168C27.7727 17.3569 28 16.2433 28 15.0767V3.23062C27.9998 2.333 27.686 1.57028 27.0574 0.942239Z" fill="url(#paint1_linear_1_683)"/>
                                        </g>
                                        <defs>
                                            <linearGradient id="paint0_linear_1_683" x1="0" y1="11.8462" x2="12.9231" y2="11.8462" gradientUnits="userSpaceOnUse">
                                              <stop stop-color="#38C9F7"/>
                                              <stop offset="1" stop-color="#266FF2"/>
                                          </linearGradient>
                                          <linearGradient id="paint1_linear_1_683" x1="15.0769" y1="11.8462" x2="28" y2="11.8462" gradientUnits="userSpaceOnUse">
                                              <stop stop-color="#38C9F7"/>
                                              <stop offset="1" stop-color="#266FF2"/>
                                          </linearGradient>
                                      </defs>
                                  </svg>
                              </div>
                              <div class="pxl-item--desc el-empty"><?php echo pxl_print_html($desc); ?></div>
                          </div>
                          <div class="pxl-item-body">
                            <?php if(!empty($image['id'])) { 
                                $img = pxl_get_image_by_size( array(
                                    'attach_id'  => $image['id'],
                                    'thumb_size' => '50x50',
                                    'class' => 'no-lazyload',
                                ));
                                $thumbnail = $img['thumbnail'];?>
                                <div class="pxl-item--image wow skewIn" data-wow-delay="900ms">
                                    <?php echo wp_kses_post($thumbnail); ?>
                                </div>
                            <?php } ?>
                            <?php if($show_title !== 'false' || $show_postion !== 'false') { ?>
                                <div class="pxl-item-inner">
                                    <?php if($show_title !== 'false') { ?>
                                        <h4 class="pxl-item--title el-empty"><?php echo pxl_print_html($title); ?></h4>
                                    <?php } ?>
                                    <?php if($show_postion !== 'false') { ?>
                                        <div class="pxl-item--position el-empty"><?php echo pxl_print_html($position); ?></div>
                                    <?php } ?>                                        
                                </div>
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
