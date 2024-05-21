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
    <div class="pxl-swiper-sliders pxl-testimonial-carousel pxl-testimonial-carousel3 pxl-swiper-boxshadow pxl-swiper-arrow-show">
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
                                <div class="pxl-item--icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="52" height="38" viewBox="0 0 52 38" fill="none">
                                        <path d="M20.9977 0H1.51571C0.678517 0 0 0.678517 0 1.51571V20.9977C0 21.8349 0.678517 22.5134 1.51571 22.5134H9.7408V35.6093C9.7408 36.4461 10.4193 37.125 11.2565 37.125H16.1273C16.7798 37.125 17.3588 36.7074 17.5649 36.0885L22.4353 21.4769C22.487 21.3226 22.5134 21.1607 22.5134 20.9977V1.51571C22.5134 0.678517 21.8349 0 20.9977 0Z" fill="#FDFDFD"/>
                                        <path d="M50.2204 0H30.7384C29.9012 0 29.2227 0.678517 29.2227 1.51571V20.9977C29.2227 21.8349 29.9012 22.5134 30.7384 22.5134H38.9638V35.6093C38.9638 36.4461 39.6424 37.125 40.4796 37.125H45.35C46.0024 37.125 46.5815 36.7074 46.7879 36.0885L51.6583 21.4769C51.7096 21.3226 51.7361 21.1607 51.7361 20.9977V1.51571C51.7361 0.678517 51.0575 0 50.2204 0Z" fill="#FDFDFD"/>
                                    </svg>                                  
                                </div>
                                <div class="pxl-item--desc el-empty"><?php echo pxl_print_html($desc); ?></div>
                                <div class="pxl-item-body">
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
