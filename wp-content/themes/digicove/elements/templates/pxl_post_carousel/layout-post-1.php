<?php

$html_id = pxl_get_element_id($settings);
$source    = $widget->get_setting('source_'.$settings['post_type']);
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$post_ids = $widget->get_setting('post_ids', '');
$settings['layout']    = $settings['layout_'.$settings['post_type']];
extract(pxl_get_posts_of_grid('post', [
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
$el_title_linear__check = $widget->get_setting('el_title_linear__check','false');  
$author_linear__check = $widget->get_setting('author_linear__check','false');  
$pagination = $widget->get_setting('pagination','false');
$pagination_type = $widget->get_setting('pagination_type','bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite');
$speed = $widget->get_setting('speed', '500');

$img_size = $widget->get_setting('img_size');
$show_category_post = $widget->get_setting('show_category_post');
$show_date = $widget->get_setting('show_date');
$show_button = $widget->get_setting('show_button');
$button_text = $widget->get_setting('button_text');

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
?>
<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-sliders pxl-post-carousel pxl-post-carousel1 pxl-swiper-boxshadow"  >
        <?php if(!empty($settings['el_title_text']) || !empty($settings['el_sub_title']) || $arrows == 'true') : ?>
        <div class="container-custom">
            <?php if($arrows == 'true') { ?>
                <div class="col-sm-8 col-12">
                <?php } else { ?>
                    <div class="col-12">
                    <?php } ?>
                    <?php if(!empty($settings['el_title_text']) || !empty($settings['el_sub_title'])) : ?>
                    <div class="wp-title">
                        <?php if(!empty($settings['el_sub_title'])) : ?>
                            <div class="el--sub-title <?php echo esc_attr($settings['el_animate_sub']); ?> <?php if ($el_title_linear__check == 'true') echo 'title-gradient'; ?>" data-wow-delay="<?php echo esc_attr($settings['el_animate_delay_sub']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['el_animate_duration_sub']); ?>s"><span><?php echo pxl_print_html($settings['el_sub_title']); ?></span></div>
                        <?php endif; ?>
                        <?php if(!empty($settings['el_title_text'])) :
                            $editor_title = $widget->get_settings_for_display( 'el_title_text' );
                            $editor_title = $widget->parse_text_editor( $editor_title );
                            ?>
                            <<?php echo esc_attr($settings['el_title_tag']); ?> class="el--title <?php if($settings['el_animate'] !== 'wow letter') { echo esc_attr($settings['el_animate']); } ?>" data-wow-delay="<?php echo esc_attr($settings['el_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['el_animate_duration']); ?>s">
                            <?php if($settings['el_animate'] == 'wow letter') {
                                $arr_str = explode(' ', $editor_title); ?>
                                <span class="pxl-item--text">
                                    <?php foreach ($arr_str as $index => $value) {
                                        $arr_str[$index] = '<span class="pxl-text--slide"><span class="'.$settings['el_animate'].'">' . $value . '</span></span>';
                                    }
                                    $str = implode(' ', $arr_str);
                                    echo wp_kses_post($str); ?>
                                </span>
                            <?php } else {
                                echo wp_kses_post($editor_title);
                            }
                            ?>
                            </<?php echo esc_attr($settings['el_title_tag']); ?>>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if($arrows == 'true'): ?>
                <div class="col-sm-4 col-12">
                    <div class="wp-arrow style1" data-cursor="-hidden">
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="27" viewBox="0 0 34 27" fill="none">
                                <path d="M0.452492 12.2862L11.2708 0.473702C11.5623 0.16631 11.9526 -0.00378104 12.3579 6.37917e-05C12.7631 0.00390862 13.1507 0.181382 13.4372 0.494258C13.7238 0.807134 13.8863 1.23038 13.8898 1.67284C13.8934 2.11529 13.7376 2.54156 13.4561 2.85983L5.2759 11.7918L32.4545 11.7918C32.8644 11.7918 33.2575 11.9696 33.5473 12.286C33.8372 12.6025 34 13.0317 34 13.4793C34 13.9268 33.8372 14.356 33.5473 14.6725C33.2575 14.989 32.8644 15.1668 32.4545 15.1668L5.2759 15.1668L13.4561 24.0987C13.6037 24.2544 13.7214 24.4406 13.8024 24.6465C13.8834 24.8523 13.926 25.0738 13.9278 25.2978C13.9296 25.5219 13.8905 25.7441 13.8128 25.9515C13.7351 26.1589 13.6203 26.3473 13.4752 26.5057C13.3301 26.6642 13.1576 26.7895 12.9676 26.8743C12.7777 26.9592 12.5742 27.0019 12.369 26.9999C12.1638 26.998 11.961 26.9514 11.7724 26.863C11.5839 26.7746 11.4133 26.646 11.2708 26.4848L0.452492 14.6723C0.162761 14.3559 0 13.9267 0 13.4793C0 13.0318 0.162761 12.6027 0.452492 12.2862Z" fill="url(#paint0_linear_14_4831)"/>
                                <defs>
                                    <linearGradient id="paint0_linear_14_4831" x1="34" y1="27" x2="0" y2="27" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#40CCFC"/>
                                        <stop offset="1" stop-color="#1AECF5"/>
                                    </linearGradient>
                                </defs>
                            </svg></div>
                            <div class="pxl-swiper-arrow pxl-swiper-arrow-next">
                                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="27" viewBox="0 0 34 27" fill="none">
                                    <path d="M0.452492 12.2862L11.2708 0.473702C11.5623 0.16631 11.9526 -0.00378104 12.3579 6.37917e-05C12.7631 0.00390862 13.1507 0.181382 13.4372 0.494258C13.7238 0.807134 13.8863 1.23038 13.8898 1.67284C13.8934 2.11529 13.7376 2.54156 13.4561 2.85983L5.2759 11.7918L32.4545 11.7918C32.8644 11.7918 33.2575 11.9696 33.5473 12.286C33.8372 12.6025 34 13.0317 34 13.4793C34 13.9268 33.8372 14.356 33.5473 14.6725C33.2575 14.989 32.8644 15.1668 32.4545 15.1668L5.2759 15.1668L13.4561 24.0987C13.6037 24.2544 13.7214 24.4406 13.8024 24.6465C13.8834 24.8523 13.926 25.0738 13.9278 25.2978C13.9296 25.5219 13.8905 25.7441 13.8128 25.9515C13.7351 26.1589 13.6203 26.3473 13.4752 26.5057C13.3301 26.6642 13.1576 26.7895 12.9676 26.8743C12.7777 26.9592 12.5742 27.0019 12.369 26.9999C12.1638 26.998 11.961 26.9514 11.7724 26.863C11.5839 26.7746 11.4133 26.646 11.2708 26.4848L0.452492 14.6723C0.162761 14.3559 0 13.9267 0 13.4793C0 13.0318 0.162761 12.6027 0.452492 12.2862Z" fill="url(#paint0_linear_14_4831)"/>
                                    <defs>
                                        <linearGradient id="paint0_linear_14_4831" x1="34" y1="27" x2="0" y2="27" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#40CCFC"/>
                                            <stop offset="1" stop-color="#1AECF5"/>
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php
                    $image_size = !empty($img_size) ? $img_size : '807x566';
                    foreach ($posts as $post):
                        $img_id       = get_post_thumbnail_id( $post->ID );
                        if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                            $img          = pxl_get_image_by_size( array(
                                'attach_id'  => $img_id,
                                'thumb_size' => $image_size
                            ) );
                        $thumbnail    = $img['thumbnail'];
                        $author = get_user_by('id', $post->post_author);                        
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                                <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                                <div class="item--featured">
                                    <?php echo wp_kses_post($thumbnail); ?>
                                </div>
                            <?php endif; ?>
                            <div class="item--holder">
                                <div class="item--holder-inner">
                                    <?php if($author != 'null') : ?>
                                        <ul class="item--meta">
                                            <li class="item--author">
                                                <label for="">By</label>
                                                <a class="<?php if ($author_linear__check == 'true') echo 'title-gradient'; ?>" href="<?php echo esc_url(get_author_posts_url($post->post_author, $author->user_nicename)); ?>"><?php echo esc_html($author->display_name); ?></a>
                                            </li>
                                        </ul>
                                    <?php endif; ?>
                                    <h3 class="item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div> 
    </div>
    <?php if($pagination !== 'false'): ?>
        <div class="pxl-swiper-dots"></div>
    <?php endif; ?>
</div>
</div>
<?php endif; ?>