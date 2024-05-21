<?php
$hightlight_list = $widget->get_settings('text_list');
$editor_title = $widget->get_settings_for_display( 'title' );
$editor_title = $widget->parse_text_editor( $editor_title );
$list_array = [];
if(count($hightlight_list) > 0){
    foreach ($hightlight_list as $key => $list) {
        $list_array[] = $list['highlight_text'];
    }
}
$widget->add_render_attribute( 'wrap-heading', 'class', 'pxl-heading');

$widget->add_render_attribute( 'pxl-item--title', 'class', 'pxl-item--title '.$settings['divider'].' '.$settings['pxl_animate']);
if(!empty($settings['title_split_text_anm'])){
    $widget->add_render_attribute( 'pxl-item--title', 'class', 'pxl-split-text '.$settings['title_split_text_anm']);
    $widget->add_render_attribute( 'pxl-item--title', 'data-settings', 
        json_encode([
            'animation'      => $settings['pxl_animate'],
            'animation_delay' => !empty($settings['pxl_animate_delay']) ? $settings['pxl_animate_delay'] : 300
        ])
    );
}

$widget->add_render_attribute( 'pxl-item--subtitle', 'class', 'pxl-item--subtitle '.$settings['pxl_animate']);
if(!empty($settings['subtitle_split_text_anm'])){
    $widget->add_render_attribute( 'pxl-item--subtitle', 'class', 'pxl-split-text '.$settings['subtitle_split_text_anm']);
}
?>
<div <?php pxl_print_html($widget->get_render_attribute_string( 'wrap-heading' )); ?>>
    <div class="pxl-heading--inner">
        <?php if(!empty($settings['sub_title'])): ?>
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'pxl-item--subtitle' )); ?>>
                <span><?php pxl_print_html(nl2br($settings['sub_title'])); ?></span>
            </div>
        <?php endif; ?>
        <<?php echo esc_attr($settings['title_tag']); ?> <?php pxl_print_html($widget->get_render_attribute_string( 'pxl-item--title' )); ?>>
        <?php echo wp_kses_post($editor_title); ?>
        <?php 
        if($settings['source_type'] == 'title') {
            $titles = digicove()->page->get_title();
            if(!empty($_get['blog_title'])) {
                $blog_title = $_get['blog_title'];
                $custom_title = explode('_', $blog_title);
                foreach ($custom_title as $index => $value) {
                    $arr_str_b[$index] = $value;
                }
                $str = implode(' ', $arr_str_b);
                echo wp_kses_post($str);
            } else {
                pxl_print_html($titles['title']);
            }
        }
        ?>
        </<?php echo esc_attr($settings['title_tag']); ?>>
        <?php if(!empty($settings['title_absolute'])): ?>        
            <span class="title-absolute" data-parallax='{"y": -50}'>
                <?php echo wp_kses_post(nl2br($settings['title_absolute'])); ?>                
            </span>
        <?php endif; ?>
        <?php 
        if(!empty($list_array)){
            ?>
            <span class="heading-highlight typewrite" data-period="3500" data-type="<?php echo esc_attr(json_encode($list_array)); ?>">
                <span class="wrap"></span>
            </span>      
            <span class="typed-cursor">|</span>
            <?php
        }
        ?>
    </div>
</div>

