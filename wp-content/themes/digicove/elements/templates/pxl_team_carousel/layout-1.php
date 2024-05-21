<?php
use Elementor\Icons_Manager;
Icons_Manager::enqueue_shim();

extract($settings);

$img_size = !empty( $img_size ) ? $img_size : '780x959'; 

$arrows = $widget->get_setting('arrows','false');  
$dots = $widget->get_setting('dots','false');

$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => '1', 
    'slide_mode'                    => 'slide', 
    'slides_to_show_xxl'            => $widget->get_setting('col_xxl', '3'), 
    'slides_to_show'                => $widget->get_setting('col_xl', '3'), 
    'slides_to_show_lg'             => $widget->get_setting('col_lg', '3'), 
    'slides_to_show_md'             => $widget->get_setting('col_md', '2'), 
    'slides_to_show_sm'             => $widget->get_setting('col_sm', '1'), 
    'slides_to_show_xs'             => $widget->get_setting('col_xs', '1'), 
    'slides_to_scroll'              => $widget->get_setting('slides_to_scroll', '1'), 
    'slides_gutter'                 => (int)$widget->get_setting('gutter', '45'), 
    'slides_gutter_lg'              => 10, 
    'arrow'                         => $arrows,
    'dots'                          => $dots,
    'dots_style'                    => 'bullets',
    'autoplay'                      => $widget->get_setting('autoplay', 'false'),
    'pause_on_hover'                => $widget->get_setting('pause_on_hover', 'true'),
    'pause_on_interaction'          => 'true',
    'delay'                         => $widget->get_setting('autoplay_speed', '5000'),
    'loop'                          => $widget->get_setting('infinite','false'),
    'speed'                         => $widget->get_setting('speed', '500')
];

$data_settings = $item_anm_cls = '';
if ( !empty( $item_animation) ) {
    $item_anm_cls= ' pxl-animate pxl-invisible animated-'.$item_animation_duration;
    $item_animation_delay = !empty($item_animation_delay) ? $item_animation_delay : '150';
    $data_animations = [
        'animation' => $item_animation,
        'animation_delay' => (float)$item_animation_delay
    ];
} 

$cursor_arrow = $widget->get_setting('cursor_arrow','false');   
$cursor_drag = $widget->get_setting('cursor_drag','false');   

$cursor_arrow_cls = $cursor_arrow == 'true' ? 'cursor-arrow' : '';
$cursor_drag_cls = $cursor_drag == 'true' ? 'cursor-drag' : 'none-drag';

$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container '.$cursor_drag_cls.'-area',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);

$arrows_on_hover_cls = $arrows_on_hover == 'true' ? 'arrow-on-hover' : ''; 

?>
<?php if(isset($content_list) && !empty($content_list) && count($content_list)): ?>
<div class="pxl-swiper-slider pxl-team pxl-team-carousel pxl-swiper-boxshadow layout-<?php echo esc_attr($settings['layout'])?> <?php echo esc_attr($settings['style']); ?>">
    <div class="pxl-swiper-slider-wrap pxl-carousel-inner overflow-hidden">
        <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
            <div class="pxl-swiper-wrapper swiper-wrapper">
                <?php 
                $i = 0;
                foreach ($content_list as $key => $value):
                    $i = $i + 50;  
                    $title    = isset($value['title']) ? $value['title'] : '';
                    $position = isset($value['position']) ? $value['position'] : '';
                    $desc     = isset($value['desc']) ? $value['desc'] : '';
                    $image    = isset($value['image']) ? $value['image'] : [];
                    $link     = isset($value['link']) ? $value['link'] : '';  
                    $thumbnail = '';
                    if(!empty($image)) {
                        $img = pxl_get_image_by_size( array(
                            'attach_id'  => $image['id'],
                            'thumb_size' => $img_size,
                            'class' => 'no-lazyload',
                        ));
                        $thumbnail = $img['thumbnail'];
                    }

                    $social = isset($value['social']) ? $value['social'] : '';
                    $link_key = $widget->get_repeater_setting_key( 'link', 'content_list', $key );
                    if ( ! empty( $link['url'] ) ) {
                        $widget->add_render_attribute( $link_key, 'href', $link['url'] );

                        if ( $link['is_external'] ) {
                            $widget->add_render_attribute( $link_key, 'target', '_blank' );
                        }

                        if ( $link['nofollow'] ) {
                            $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                        }
                    }
                    $link_attributes = $widget->get_render_attribute_string( $link_key );

                    $data_animations['animation_delay'] = ((float)$item_animation_delay + $i);
                    $data_animation =  json_encode($data_animations);
                    $data_settings = 'data-settings="'.esc_attr($data_animation).'"';

                    ?>
                    <div class="pxl-swiper-slide swiper-slide">
                        <div class="pxl-item--inner">
                            <div class="pxl-item--meta">
                                <a class="item--meta-plus" <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                                        <path d="M9.49989 19C8.78679 19 8.20898 18.4222 8.20898 17.7091V1.2909C8.20898 0.577807 8.78679 0 9.49989 0C10.213 0 10.7908 0.577807 10.7908 1.2909V17.7091C10.7908 18.4222 10.213 19 9.49989 19Z" fill="#FDFDFD"/>
                                        <path d="M17.7091 10.7908H1.2909C0.577807 10.7908 0 10.213 0 9.49989C0 8.78679 0.577807 8.20898 1.2909 8.20898H17.7091C18.4222 8.20898 19 8.78679 19 9.49989C19 10.213 18.4222 10.7908 17.7091 10.7908Z" fill="#FDFDFD"/>
                                    </svg>
                                </a>
                                <?php if (!empty($title)) : ?>
                                    <h4 class="pxl-item--title el-empty">
                                        <?php if ( ! empty( $link['url'] ) ) { ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php } ?>
                                        <?php echo pxl_print_html($title); ?>
                                        <?php if ( ! empty( $link['url'] ) ) { ?></a><?php } ?>
                                    </h4>
                                <?php endif; ?>
                                <?php if (!empty($position)) : ?>
                                    <div class="pxl-item--position el-empty"><?php echo pxl_print_html($position); ?></div>
                                <?php endif; ?>
                                <?php if(!empty($social)): ?>
                                    <div class="pxl-item--social">
                                        <?php $team_social = json_decode($social, true);
                                        foreach ($team_social as $value): ?>
                                            <a href="<?php echo esc_url($value['url']); ?>" target="_blank">
                                                <span></span>
                                                <i class="<?php echo esc_attr($value['icon']); ?>"></i>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php if(!empty($image['id'])) {
                                $img = pxl_get_image_by_size( array(
                                    'attach_id'  => $image['id'],
                                    'thumb_size' => $img_size,
                                    'class' => 'no-lazyload',
                                ));
                                $thumbnail = $img['thumbnail'];?>
                                <div class="pxl-item--image">
                                    <?php echo wp_kses_post($thumbnail); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>    
        </div>
        <?php if($arrows !== 'false'): ?>
            <div class="wp-arrow <?php echo esc_attr($arrows_on_hover_cls) ?>">
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev <?php echo esc_attr($cursor_arrow_cls.'-prev') ?>"></div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next <?php echo esc_attr($cursor_arrow_cls.'-next') ?>"></div>
            </div>
        <?php endif; ?>
        <?php if($dots !== 'false'): ?>
            <div class="pxl-swiper-dots"></div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>
