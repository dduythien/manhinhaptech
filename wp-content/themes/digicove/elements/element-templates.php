<?php 
if(!function_exists('digicove_get_post_grid')){
    function digicove_get_post_grid($posts = [], $settings = []){ 
        if (empty($posts) || !is_array($posts) || empty($settings) || !is_array($settings)) {
            return false;
        }
        switch ($settings['layout']) {
            case 'post-1':
            digicove_get_post_grid_layout1($posts, $settings);
            break;
            case 'case-1':
            digicove_get_case_grid_layout1($posts, $settings);
            break;
            case 'case-2':
            digicove_get_case_grid_layout2($posts, $settings);
            break;
            case 'case-3':
            digicove_get_case_grid_layout3($posts, $settings);
            break;
            case 'case-4':
            digicove_get_case_grid_layout4($posts, $settings);
            break;
            case 'service-1':
            digicove_get_service_grid_layout1($posts, $settings);
            break;
            case 'service-2':
            digicove_get_service_grid_layout2($posts, $settings);
            break;
            default:
            return false;
            break;
        }
    }
}

// Start Post Grid
//--------------------------------------------------
function digicove_get_post_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    $images_size = !empty($img_size) ? $img_size : '807x566';
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            }
            $author = get_user_by('id', $post->post_author); ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                    <div class="item--featured">
                        <?php echo wp_kses_post($thumbnail); ?>
                    </div>
                <?php endif; ?>
                <div class="item--holder">
                    <div class="item--holder-inner">
                        <?php if($show_date == 'true' || $show_author == 'true' ) : ?>
                            <ul class="item--meta">
                                <?php if($show_author == 'true'): ?>
                                    <li class="item--author">
                                        <label for="">By</label>
                                        <a href="<?php echo esc_url(get_author_posts_url($post->post_author, $author->user_nicename)); ?>"><?php echo esc_html($author->display_name); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        <?php endif; ?>
                        <h3 class="item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h3>
                    </div>
                </div>
            </div>
        </div>
        <?php
    endforeach;
endif;
}
// End Post Grid
//--------------------------------------------------

// Start case Grid
//--------------------------------------------------
function digicove_get_case_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '789x962';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xxl-{$col_xxl} col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            } 
            $case_client = get_post_meta($post->ID, 'case_client', true);
            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--box">
                    <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                        <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                        <div class="item--featured">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                        </div>
                    <?php endif; ?>           
                    <div class="pxl-flip--box">
                        <div class="item--holder pxl-item--front">
                            <?php if(!empty($case_client) && $show_client == 'true') : ?>
                                <div class="item--client">
                                    <label>Client:</label>
                                    <span class="item--title">                
                                        <?php echo esc_attr($case_client); ?></span>                        
                                    </div>
                                <?php endif; ?>                                           
                                <div class="item--service">
                                    <label>Services:</label>
                                    <span class="item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></span>                        
                                </div>
                            </div>
                            <div class="item--holder pxl-item--back">
                                <?php if(!empty($case_client) && $show_client == 'true') : ?>                                
                                    <div class="item--client">
                                        <label>Client:</label>
                                        <span class="item--title">                
                                            <?php echo esc_attr($case_client); ?></span>                        
                                        </div>
                                    <?php endif; ?>                                                                               
                                    <div class="item--service">
                                        <label>Services:</label>
                                        <span class="item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></span>                        
                                    </div>
                                </div>                        
                            </div>     
                        </div>
                    </div>
                </div>
                <?php
            endforeach;
        endif;
    }

    function digicove_get_case_grid_layout2($posts = [], $settings = []){ 
        extract($settings);

        $images_size = !empty($img_size) ? $img_size : '800x500';

        if (is_array($posts)):
            foreach ($posts as $key => $post):
                $item_class = "pxl-grid-item col-xxl-{$col_xxl} col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
                if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                    $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                    $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                    $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                    $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                    $img_size_m = $grid_masonry[$key]['img_size_m'];
                    if(!empty($img_size_m)) {
                        $images_size = $img_size_m;
                    }
                } elseif (!empty($img_size)) {
                    $images_size = $img_size;
                }

                if(!empty($tax))
                    $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
                else 
                    $filter_class = '';

                $img_id = get_post_thumbnail_id($post->ID);
                if($img_id) {
                    $img = pxl_get_image_by_size( array(
                        'attach_id'  => $img_id,
                        'thumb_size' => $images_size,
                        'class' => 'no-lazyload',
                    ));
                    $thumbnail = $img['thumbnail'];
                } else {
                    $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
                } 
                $case_client = get_post_meta($post->ID, 'case_client', true);
                $case_year = get_post_meta($post->ID, 'case_year', true);
                ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">                
                    <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                        <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                        <div class="item--featured">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                        </div>
                    <?php endif; ?>           
                    <div class="item--content">
                        <div class="item--holder">
                            <?php if((!empty($case_client) && $show_client == 'true') || (!empty($case_year) && $show_year == 'true')) : ?>   
                            <div class="item--holder-left">
                                <?php if(!empty($case_client) && $show_client == 'true') : ?>
                                    <div class="item--client">                                  
                                        <label>Client</label>
                                        <span class="item--title">                
                                            <?php echo esc_attr($case_client); ?></span>                        
                                        </div>
                                    <?php endif; ?>
                                    <?php if(!empty($case_year) && $show_year == 'true') : ?>
                                        <div class="item--year">
                                            <label>Year</label>
                                            <span class="item--title">                
                                                <?php echo esc_attr($case_year); ?></span>                        
                                            </div>
                                        <?php endif; ?>                                    
                                    </div>
                                <?php endif; ?>                                                                        
                                <div class="item--service">
                                    <label>Services</label>
                                    <span class="item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></span>                        
                                </div>                                    
                            </div>
                            <div class="item-readmore">
                                <a class="btn-link" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                    <svg class="svg1" xmlns="http://www.w3.org/2000/svg" width="28" height="21" viewBox="0 0 28 21" fill="none">
                                        <path d="M26.8703 9.55593L18.4561 0.368435C18.2294 0.129352 17.9258 -0.00294081 17.6106 4.96157e-05C17.2954 0.00304004 16.9939 0.141075 16.7711 0.384423C16.5482 0.627771 16.4218 0.956962 16.4191 1.3011C16.4163 1.64523 16.5375 1.97677 16.7564 2.22431L23.1188 9.17137L1.97986 9.17137C1.66107 9.17137 1.35532 9.30965 1.1299 9.55579C0.904474 9.80194 0.777832 10.1358 0.777832 10.4839C0.777832 10.832 0.904474 11.1658 1.1299 11.4119C1.35532 11.6581 1.66107 11.7964 1.97986 11.7964L23.1188 11.7964L16.7564 18.7434C16.6416 18.8645 16.5501 19.0093 16.4871 19.1695C16.4241 19.3296 16.3909 19.5018 16.3895 19.6761C16.3881 19.8504 16.4185 20.0232 16.479 20.1845C16.5394 20.3458 16.6287 20.4923 16.7415 20.6156C16.8544 20.7388 16.9886 20.8363 17.1363 20.9023C17.2841 20.9683 17.4423 21.0015 17.602 21C17.7616 20.9984 17.9193 20.9622 18.0659 20.8934C18.2126 20.8247 18.3452 20.7247 18.4561 20.5993L26.8703 11.4118C27.0957 11.1657 27.2223 10.8319 27.2223 10.4839C27.2223 10.1358 27.0957 9.80206 26.8703 9.55593Z" fill="url(#paint0_linear_14_9294)"/>
                                        <defs>
                                            <linearGradient id="paint0_linear_14_9294" x1="0.777832" y1="10.5" x2="27.2223" y2="10.5" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#2F057B"/>
                                                <stop offset="1" stop-color="#6441C1"/>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                    <svg class="svg2" xmlns="http://www.w3.org/2000/svg" width="28" height="21" viewBox="0 0 28 21" fill="none">
                                        <path d="M26.8703 9.55593L18.4561 0.368435C18.2294 0.129352 17.9258 -0.00294081 17.6106 4.96157e-05C17.2954 0.00304004 16.9939 0.141075 16.7711 0.384423C16.5482 0.627771 16.4218 0.956962 16.4191 1.3011C16.4163 1.64523 16.5375 1.97677 16.7564 2.22431L23.1188 9.17137L1.97986 9.17137C1.66107 9.17137 1.35532 9.30965 1.1299 9.55579C0.904474 9.80194 0.777832 10.1358 0.777832 10.4839C0.777832 10.832 0.904474 11.1658 1.1299 11.4119C1.35532 11.6581 1.66107 11.7964 1.97986 11.7964L23.1188 11.7964L16.7564 18.7434C16.6416 18.8645 16.5501 19.0093 16.4871 19.1695C16.4241 19.3296 16.3909 19.5018 16.3895 19.6761C16.3881 19.8504 16.4185 20.0232 16.479 20.1845C16.5394 20.3458 16.6287 20.4923 16.7415 20.6156C16.8544 20.7388 16.9886 20.8363 17.1363 20.9023C17.2841 20.9683 17.4423 21.0015 17.602 21C17.7616 20.9984 17.9193 20.9622 18.0659 20.8934C18.2126 20.8247 18.3452 20.7247 18.4561 20.5993L26.8703 11.4118C27.0957 11.1657 27.2223 10.8319 27.2223 10.4839C27.2223 10.1358 27.0957 9.80206 26.8703 9.55593Z" fill="url(#paint0_linear_14_9326)"/>
                                        <defs>
                                            <linearGradient id="paint0_linear_14_9326" x1="0.777832" y1="0" x2="27.2223" y2="0" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FF7369"/>
                                                <stop offset="1" stop-color="#FFB06D"/>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </a>
                            </div>
                        </div>     
                    </div>
                </div>                
                <?php
            endforeach;
        endif;
    }

    function digicove_get_case_grid_layout3($posts = [], $settings = []){ 
        extract($settings);

        $images_size = !empty($img_size) ? $img_size : 'full';

        if (is_array($posts)):
            foreach ($posts as $key => $post):
                $item_class = "pxl-grid-item col-xxl-{$col_xxl} col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
                if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                    $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                    $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                    $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                    $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                    $img_size_m = $grid_masonry[$key]['img_size_m'];
                    if(!empty($img_size_m)) {
                        $images_size = $img_size_m;
                    }
                } elseif (!empty($img_size)) {
                    $images_size = $img_size;
                }

                if(!empty($tax))
                    $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
                else 
                    $filter_class = '';

                $img_id = get_post_thumbnail_id($post->ID);
                if($img_id) {
                    $img = pxl_get_image_by_size( array(
                        'attach_id'  => $img_id,
                        'thumb_size' => $images_size,
                        'class' => 'attachment-full no-lazyload image-front',
                    ));
                    $thumbnail    = $img['url'];

                    $img1 = pxl_get_image_by_size( array(
                        'attach_id'  => $img_id,
                        'thumb_size' => $images_size,
                        'class' => 'attachment-full no-lazyload image-back',
                    ));
                    $thumbnail1    = $img1['url'];
                } else {
                    $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
                } 
                $case_client = get_post_meta($post->ID, 'case_client', true);
                $case_year = get_post_meta($post->ID, 'case_year', true);
                ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">                
                    <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                        <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                        <div class="item--image">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">   
                                <?php
                                echo '<img src="' . esc_attr($thumbnail) . '" class="image-front attachment-full" alt="image front" data-sampler="texture0" crossorigin="anonymous" width="' . esc_attr(explode('x', $images_size)[0]) . '" height="' . esc_attr(explode('x', $images_size)[1]) . '">';
                                ?>
                                <?php
                                echo '<img src="' . esc_attr($thumbnail1) . '" class="image-back attachment-full" alt="image back" data-sampler="texture1" crossorigin="anonymous" width="' . esc_attr(explode('x', $images_size)[0]) . '" height="' . esc_attr(explode('x', $images_size)[1]) . '">';
                                ?>
                                <?php
                                echo '<img src="' . get_template_directory_uri().'/assets/img/image_effects.jpg' . '" class="map attachment-full" alt="image displacements" data-sampler="map" crossorigin="anonymous" width="' . esc_attr(explode('x', $images_size)[0]) . '" height="' . esc_attr(explode('x', $images_size)[1]) . '">';
                                ?>
                            </a>
                        </div>
                        <div class="canvas"></div>              
                    <?php endif; ?>           
                    <div class="item--content">                                                            
                      <span class="item--title">
                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                    </span>                                                                               
                </div>     
            </div>
        </div>                
        <?php
    endforeach;
endif;
}

function digicove_get_case_grid_layout4($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '724x1041';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xxl-{$col_xxl} col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            } 
            $case_client = get_post_meta($post->ID, 'case_client', true);
            $case_excerpt =  $post->post_excerpt;
            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">                
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                    <div class="item--featured">
                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                    </div>
                <?php endif; ?>           
                <div class="pxl-item--holder">
                    <h3 class="pxl-item--title">
                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                    </h3>                       
                    <?php if($show_excerpt == 'true' && !empty($case_excerpt)): ?>
                        <div class="pxl-item--description">
                            <span>
                                <?php echo wp_trim_words( $case_excerpt, $num_words, $more = null ); ?>
                            </span>
                        </div>
                    <?php endif; ?>                    
                    <a class="item-readmore" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                        <span class="btn-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="27" viewBox="0 0 34 27" fill="none">
                                <path d="M33.5475 12.2862L22.7292 0.473702C22.4377 0.16631 22.0474 -0.00378104 21.6421 6.37917e-05C21.2369 0.00390862 20.8493 0.181382 20.5628 0.494258C20.2762 0.807134 20.1137 1.23038 20.1102 1.67284C20.1066 2.11529 20.2624 2.54156 20.5439 2.85983L28.7241 11.7918L1.54547 11.7918C1.13559 11.7918 0.742489 11.9696 0.452657 12.286C0.162826 12.6025 0 13.0317 0 13.4793C0 13.9268 0.162826 14.356 0.452657 14.6725C0.742489 14.989 1.13559 15.1668 1.54547 15.1668L28.7241 15.1668L20.5439 24.0987C20.3963 24.2544 20.2786 24.4406 20.1976 24.6465C20.1166 24.8523 20.074 25.0738 20.0722 25.2978C20.0704 25.5219 20.1095 25.7441 20.1872 25.9515C20.2649 26.1589 20.3797 26.3473 20.5248 26.5057C20.6699 26.6642 20.8424 26.7895 21.0324 26.8743C21.2223 26.9592 21.4258 27.0019 21.631 26.9999C21.8362 26.998 22.039 26.9514 22.2276 26.863C22.4161 26.7746 22.5867 26.646 22.7292 26.4848L33.5475 14.6723C33.8372 14.3559 34 13.9267 34 13.4793C34 13.0318 33.8372 12.6027 33.5475 12.2862Z" fill="#F87D6C"/>
                            </svg>
                        </span>
                    </a>
                </div>                                                 
            </div>
        </div>
        <?php
    endforeach;
endif;
}
// End case Grid

// Start Service Grid
//--------------------------------------------------
function digicove_get_service_grid_layout1($posts = [], $settings = []){ 
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : 'full';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
            $service_subtitle = get_post_meta($post->ID, 'service_subtitle', true);
            $gradient_color = digicove()->get_opt( 'gradient_color' );
            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                $img_id       = get_post_thumbnail_id( $post->ID );
                $img          = digicove_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size
                ) );
                $thumbnail    = $img['thumbnail']; ?>
                <div class="pxl-item--inner pxl-not-active <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                    <div class="item--featured">
                        <?php echo wp_kses_post($thumbnail); ?>
                    </div>
                <?php endif; ?>
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
    <?php
endforeach;
endif;
}

function digicove_get_service_grid_layout2($posts = [], $settings = []){ 
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : 'full';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xxl-{$col_xxl} col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_xxl_m = 12 / $grid_masonry[$key]['col_xxl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xxl-{$col_xxl_m} col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $service_excerpt =  $post->post_excerpt;
            $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
            $service_subtitle = get_post_meta($post->ID, 'service_subtitle', true);
            $gradient_color = digicove()->get_opt( 'gradient_color' );            
            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                $img_id       = get_post_thumbnail_id( $post->ID );
                $img          = digicove_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size
                ) );
                $thumbnail    = $img['url']; ?>
            <?php endif; ?>
            <div class="pxl-item--inner pxl-not-active <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s"  style="background-image: url(<?php echo wp_kses_post($thumbnail); ?>);">
                <div class="pxl-item--holder">
                    <h3 class="pxl-item--title">
                        <a class="pxl-item--title-link" href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                        <?php if($show_button == 'true') : ?>
                            <div class="item-readmore">
                                <a class="btn-link" href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="27" viewBox="0 0 34 27" fill="none">
                                        <path d="M33.5475 12.2862L22.7292 0.473702C22.4377 0.16631 22.0474 -0.00378104 21.6421 6.37917e-05C21.2369 0.00390862 20.8493 0.181382 20.5628 0.494258C20.2762 0.807134 20.1137 1.23038 20.1102 1.67284C20.1066 2.11529 20.2624 2.54156 20.5439 2.85983L28.7241 11.7918L1.54547 11.7918C1.13559 11.7918 0.742489 11.9696 0.452657 12.286C0.162826 12.6025 0 13.0317 0 13.4793C0 13.9268 0.162826 14.356 0.452657 14.6725C0.742489 14.989 1.13559 15.1668 1.54547 15.1668L28.7241 15.1668L20.5439 24.0987C20.3963 24.2544 20.2786 24.4406 20.1976 24.6465C20.1166 24.8523 20.074 25.0738 20.0722 25.2978C20.0704 25.5219 20.1095 25.7441 20.1872 25.9515C20.2649 26.1589 20.3797 26.3473 20.5248 26.5057C20.6699 26.6642 20.8424 26.7895 21.0324 26.8743C21.2223 26.9592 21.4258 27.0019 21.631 26.9999C21.8362 26.998 22.039 26.9514 22.2276 26.863C22.4161 26.7746 22.5867 26.646 22.7292 26.4848L33.5475 14.6723C33.8372 14.3559 34 13.9267 34 13.4793C34 13.0318 33.8372 12.6027 33.5475 12.2862Z" fill="#F87D6C"/>
                                    </svg>
                                </a>
                            </div>
                        <?php endif; ?>
                    </h3>
                    <?php if($show_excerpt == 'true' && !empty($service_excerpt)): ?>
                        <div class="pxl-item--description">
                            <span>
                                <?php echo wp_trim_words( $service_excerpt, $num_words, $more = null ); ?>
                            </span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
    endforeach;
endif;
}
// End Service Grid
//--------------------------------------------------

add_action( 'wp_ajax_digicove_get_pagination_html', 'digicove_get_pagination_html' );
add_action( 'wp_ajax_nopriv_digicove_get_pagination_html', 'digicove_get_pagination_html' );
function digicove_get_pagination_html(){
    try{
        if(!isset($_POST['query_vars'])){
            throw new Exception(__('Something went wrong while requesting. Please try again!', 'digicove'));
        }
        $query = new WP_Query($_POST['query_vars']);
        ob_start();
        digicove()->page->get_pagination( $query,  true );
        $html = ob_get_clean();
        wp_send_json(
            array(
                'status' => true,
                'message' => esc_attr__('Load Successfully!', 'digicove'),
                'data' => array(
                    'html' => $html,
                    'query_vars' => $_POST['query_vars'],
                    'post' => $query->have_posts()
                ),
            )
        );
    }
    catch (Exception $e){
        wp_send_json(array('status' => false, 'message' => $e->getMessage()));
    }
    die;
}

add_action( 'wp_ajax_digicove_load_more_post_grid', 'digicove_load_more_post_grid' );
add_action( 'wp_ajax_nopriv_digicove_load_more_post_grid', 'digicove_load_more_post_grid' );
function digicove_load_more_post_grid(){
    try{
        if(!isset($_POST['settings'])){
            throw new Exception(__('Something went wrong while requesting. Please try again!', 'digicove'));
        }
        $settings = $_POST['settings'];
        set_query_var('paged', $settings['paged']);
        extract(pxl_get_posts_of_grid($settings['post_type'], [
            'source' => isset($settings['source'])?$settings['source']:'',
            'orderby' => isset($settings['orderby'])?$settings['orderby']:'date',
            'order' => isset($settings['order'])?$settings['order']:'desc',
            'limit' => isset($settings['limit'])?$settings['limit']:'6',
            'post_ids' => isset($settings['post_ids'])?$settings['post_ids']:[],
        ]));
        ob_start();

        digicove_get_post_grid($posts, $settings);
        $html = ob_get_clean();
        wp_send_json(
            array(
                'status' => true,
                'message' => esc_attr__('Load Successfully!', 'digicove'),
                'data' => array(
                    'html' => $html,
                    'paged' => $settings['paged'],
                    'posts' => $posts,
                    'max' => $max,
                ),
            )
        );
    }
    catch (Exception $e){
        wp_send_json(array('status' => false, 'message' => $e->getMessage()));
    }
    die;
}