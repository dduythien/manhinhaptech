<?php 
$slider_source = $widget->get_setting('slider_source', []);

if(!empty($slider_source)):

    $arrows          = $widget->get_setting('arrows','true');  
    $dot_fraction          = $widget->get_setting('dot_fraction','true');  
    $play_slider          = $widget->get_setting('play_slider','true');  
    $arrows_style    = $widget->get_setting('arrows_style','text');  
    $arrows_layout    = $widget->get_setting('arrows_layout','square-df');  
    $arrow_prev_text = $widget->get_setting('arrow_prev_text', esc_html__( 'Prev', 'digicove' ));  
    $arrow_prev_icon = $widget->get_setting('arrow_prev_icon',[]);  

    $arrow_next_text = $widget->get_setting('arrow_next_text', esc_html__( 'Next', 'digicove' ));  
    $arrow_next_icon = $widget->get_setting('arrow_next_icon',[]);  
    $nav_position_wrap = $widget->get_setting('nav_position_wrap','wrap');  
    $arrow_position = $widget->get_setting('arrow_position','df'); 

    $arrow_attrs = ['class' => '', 'data-settings' => ''];
    $arrow_attrs['class'] = isset($settings['arrow_animation_duration']) ? 'animated-' . $settings['arrow_animation_duration'] : '';
    if( !empty( $settings['arrow_animation'])){
        $anm_delay = !empty($settings['arrow_animation_delay']) ? $settings['arrow_animation_delay'] : '500';
        $arrow_attrs['class'] = 'pxl-animate pxl-invisible';
        $arrow_attrs['data-settings'] = json_encode([
            'animation'      => $settings['arrow_animation'],
            'animation_delay' => $anm_delay
        ]);
    }
    $dots               = $widget->get_setting('dots','false');
    $dots_dir           = $widget->get_setting('dots_direction','');
    $dots_pos           = $widget->get_setting('dots_position','');
    $dots_style         = $widget->get_setting('dots_style','squared');
    $dots_vertical_line = $widget->get_setting('dots_vertical_line','');

    $dots_attrs = ['class' => '', 'data-settings' => ''];
    $dots_attrs['class'] = isset($settings['dots_animation_duration']) ? 'animated-' . $settings['dots_animation_duration'] : '';
    if( !empty( $settings['dots_animation'])){
        $anm_delay = !empty($settings['dots_animation_delay']) ? $settings['dots_animation_delay'] : '500';
        $dots_attrs['class'] = 'pxl-animate pxl-invisible';
        $dots_attrs['data-settings'] = json_encode([
            'animation'      => $settings['dots_animation'],
            'animation_delay' => $anm_delay
        ]);
    }


    $slide_effect        = $widget->get_setting('slide_effect', 'fade');
    $fit_to_screen        = $widget->get_setting('fit_to_screen', 'default');
    $pause_on_hover      = $widget->get_setting('pause_on_hover');
    $autoplay            = $widget->get_setting('autoplay');
    $autoplay_speed      = $widget->get_setting('autoplay_speed', '5000');
    $infinite            = $widget->get_setting('infinite');
    $speed               = $widget->get_setting('speed', '500');
    $center_mode         = $widget->get_setting('center_mode', 'false');


    $opts = [
     'slide_direction'               => 'horizontal',
     'slide_percolumn'               => '1', 
     'slide_percolumnfill'           => '1', 
     'slide_mode'                    => $slide_effect, 
     'slides_to_show'                => '1', 
     'slides_to_scroll'              => '1', 
     'slides_gutter'                 => 0, 
     'arrow'                         => $arrows,
     'dots'                          => $dots,
     'dots_style'                    => $dots_style == 'squared' ? 'bullets' : $dots_style,
     'dots_style_custom'             => '',
     'autoplay'                      => $autoplay,
     'pause_on_hover'                => $pause_on_hover,
     'pause_on_interaction'          => 'true',
     'delay'                         => $autoplay_speed,
     'loop'                          => $infinite,
     'speed'                         => $speed,
     'center_mode'                   => $center_mode,
 ];

 $show_arrow = ($arrows == 'true' || $settings['arrows_tablet_extra'] == 'true' || $settings['arrows_tablet'] == 'true' || $settings['arrows_mobile_extra'] == 'true' || $settings['arrows_mobile'] == 'true') ? true : false;

 $show_dots = ($dots == 'true' || $settings['dots_tablet_extra'] == 'true' || $settings['dots_tablet'] == 'true' || $settings['dots_mobile_extra'] == 'true' || $settings['dots_mobile'] == 'true') ? true : false;

 $dots_style_custom    = $widget->get_setting('dots_style_custom', 'function (swiper, current, total) { return current + \' of \' + total;}');

 $widget->add_render_attribute( 'carousel', [

    'class'         => 'pxl-slider-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts),
    'data-customdot' => '' //$dots_style_custom
]);

 $count = count($slider_source); 
 ?>

 <div class="pxl-sliders-wrap <?php echo esc_attr($fit_to_screen); ?>">
    <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>

        <div class="pxl-slider-wrapper swiper-wrapper" data-count="<?php echo esc_attr($count) ?>">
            <?php 
            
            foreach ($slider_source as $key => $slide):
            	$slide = (int) $slide;  
                ?>
                <div class="pxl-slider-item swiper-slide">
                    <?php 
                    echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $slide);
                    if( $arrows_layout == 'square-thums' || $arrows_layout == 'thums-title'){
                        $img = pxl_get_image_by_size( array(
                            'post_id' => $slide,
                            'thumb_size' => '370x370',
                            'class' => 'no-lazyload',
                        ));
                        $thumbnail_url = $img['url'];
                        $sub_title = get_post_meta( $slide, 'sub_title', true );
                        $custom_title = get_post_meta( $slide, 'custom_title', true );
                        echo '<div class="item-thumb" style="display:none;"  data-thumb="'.esc_url($thumbnail_url).'" data-subtitle="'.esc_attr($sub_title).'" data-title="'.esc_attr($custom_title).'"></div>';
                    }
                    ?>

                </div>
            <?php endforeach; ?>
        </div>    

        <?php if($show_arrow): 
            $transform_cls = $nav_position_wrap == 'wrap' ? 'pxl-transforms' : '';
            $prev_style = $next_style = $prev_style_thumb = $next_style_thumb = '';
            if( $arrows_layout =='square-thums' || $arrows_layout == 'thums-title'){
                $slide_num = count($slider_source);
                $img_prev = pxl_get_image_by_size( array(
                    'post_id' => (int)$slider_source[$slide_num - 1],
                    'thumb_size' => '350x370',
                    'class' => 'no-lazyload',
                ));
                $img_next = pxl_get_image_by_size( array(
                    'post_id' => (int)$slider_source[1],
                    'thumb_size' => '370x370',
                    'class' => 'no-lazyload',
                ));
                $thumb_prev = $img_prev['url'];
                $thumb_next = $img_next['url'];
                $prev_bg = 'background-image: url('. esc_url($thumb_prev).');';
                $next_bg = 'background-image: url('. esc_url($thumb_next).');';
                
                $prev_style = !empty( $thumb_prev ) ? ' style="'.$prev_bg.'"' : '';
                $next_style = !empty( $thumb_next ) ? ' style="'.$next_bg.'"' : '';

                $sub_title_prev = get_post_meta( (int)$slider_source[$slide_num - 1], 'sub_title', true );
                $custom_title_prev = get_post_meta( (int)$slider_source[$slide_num - 1], 'custom_title', true );

                $sub_title_next = get_post_meta( (int)$slider_source[1], 'sub_title', true );
                $custom_title_next = get_post_meta( (int)$slider_source[1], 'custom_title', true );
            }
            if( $arrows_layout == 'square-thums' ){
                $prev_style_thumb = $prev_style;
                $next_style_thumb = $next_style;
            }

            $arrows_layout_color = $widget->get_setting('arrows_layout_color', '');

            $arrow_container = $widget->get_setting('arrow_container','');  
            if( $arrow_container == 'in-container') echo '<div class="container relative">';
            ?>
            <div class="pxl-slider-arrow-wrap <?php echo esc_attr($transform_cls) ?> pos-<?php echo esc_attr($arrow_position) ?> style-<?php echo esc_attr($arrows_style) ?> layout-<?php echo esc_attr($arrows_layout) ?> <?php echo esc_attr($arrows_layout_color) ?> <?php echo esc_attr($nav_position_wrap) ?> <?php echo esc_attr($arrow_attrs['class']) ?>" data-settings="<?php echo esc_attr($arrow_attrs['data-settings']) ?>">
              <div class="pxl-slider-arrow pxl-slider-arrow-prev"<?php pxl_print_html($prev_style_thumb) ?>>
                <?php if( $arrows_style == 'text' ): ?>
                    <span class="arrow-text"><?php echo esc_html($arrow_prev_text); ?></span>
                <?php endif; ?>
                <?php if( $arrows_style == 'icon') : ?>
                   <?php 
                   if( !empty($arrow_prev_icon['value'] ))
                    \Elementor\Icons_Manager::render_icon( $arrow_prev_icon, [ 'aria-hidden' => 'true', 'class' => 'pxl-icon' ], 'span' );
                else
                    echo '<span aria-hidden="true" class="pxl-icon pxli bi-chevron-left"></span>';
                ?>
            <?php endif; ?>

        </div>
        <?php if($arrows_layout == 'thums-title'): ?>
            <div class="thums-title-wrap col relative">
                <div class="thums-title-prev pxl-absoluted">
                    <div class="thums-title-inner d-flex align-items-center">
                        <div class="thums-title-img col-auto"<?php pxl_print_html($prev_style) ?>></div>
                        <div class="thums-title-title col">
                            <div class="sub-title"><?php pxl_print_html($sub_title_prev) ?></div>
                            <div class="custom-title"><?php pxl_print_html($custom_title_prev) ?></div>
                        </div>
                    </div>
                </div>
                <div class="thums-title-next pxl-absoluted">
                    <div class="thums-title-inner d-flex align-items-center">
                        <div class="thums-title-img col-auto"<?php pxl_print_html($next_style) ?>></div>
                        <div class="thums-title-title col">
                            <div class="sub-title"><?php pxl_print_html($sub_title_next) ?></div>
                            <div class="custom-title"><?php pxl_print_html($custom_title_next) ?></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="pxl-slider-arrow pxl-slider-arrow-next"<?php pxl_print_html($next_style_thumb) ?>>

            <?php if( $arrows_style == 'text' ): ?>
                <span class="arrow-text"><?php echo esc_html($arrow_next_text); ?></span>
            <?php endif; ?>
            <?php if( $arrows_style == 'icon' ): ?>
                <?php 
                if( !empty($arrow_next_icon['value'] ))
                    \Elementor\Icons_Manager::render_icon( $arrow_next_icon, [ 'aria-hidden' => 'true', 'class' => 'pxl-icon' ], 'span' );
                else
                    echo '<span aria-hidden="true" class="pxl-icon pxli bi-chevron-right"></span>';
                ?>
            <?php endif; ?>

        </div>
    </div> 
    <?php if( $arrow_container == 'in-container') echo '</div>'; ?>
<?php endif; ?>

<?php if($show_dots): 
    ?>
    <div class="pxl-slider-dots pxl-transforms <?php echo esc_attr($dots_dir.'-dir') ?> <?php echo esc_attr('vertical-line-'.$dots_vertical_line) ?> <?php echo esc_attr($dots_pos) ?> <?php echo esc_attr($dots_attrs['class']) ?> style-<?php echo esc_attr($dots_style) ?>" data-settings="<?php echo esc_attr($dots_attrs['data-settings']) ?>"></div>
<?php endif; ?>    
<?php if($play_slider == 'true' || $dot_fraction == 'true'): ?>
    <div class="pxl-slider-left">
        <?php if($play_slider == 'true'): ?>
            <div class="buttons pause">
                <button id='pause-slider'></button>
                <button id='play-slider'></button>
            </div>
        <?php endif; ?>                        
        <?php if($dot_fraction == 'true'): 
            ?>
            <div class="pxl-slider-dots1" id="style-fraction" data-settings="<?php echo esc_attr($dots_attrs['data-settings']) ?>"></div>
        <?php endif; ?>            
    </div>
<?php endif; ?>       
<div class="carousel-progress">
    <div class="swiper-hero-progress"></div>
</div>     
</div>
</div>

<?php 

endif; ?>
