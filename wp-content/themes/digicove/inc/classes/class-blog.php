<?php

if (!class_exists('Digicove_Blog')) {
    class Digicove_Blog
    {
        public function get_archive_meta() {
            $archive_category = digicove()->get_theme_opt( 'archive_category', true );
            $archive_date = digicove()->get_theme_opt( 'archive_date', true );
            if($archive_category || $archive_date) : ?>
                <ul class="pxl-item--meta">
                    <?php if($archive_date) : ?>
                        <li class="pxl-item--date"><?php echo get_the_date(); ?></li>
                    <?php endif; ?>
                    <?php if($archive_category) : ?>
                        <li class="pxl-item--category"><?php the_terms( get_the_ID(), 'category', '' ); ?></li>
                    <?php endif; ?>
                </ul>
            <?php endif; 
        }
        public function get_excerpt(){
            $archive_excerpt_length = digicove()->get_theme_opt('archive_excerpt_length', '50');
            $digicove_the_excerpt = get_the_excerpt();
            if(!empty($digicove_the_excerpt)) {
                echo wp_trim_words( $digicove_the_excerpt, $archive_excerpt_length, $more = null );
            } else {
                echo wp_kses_post($this->get_excerpt_more( $archive_excerpt_length ));
            }
        }
        public function get_excerpt_more( $post = null ) {
            $archive_excerpt_length = digicove()->get_theme_opt('archive_excerpt_length', '50');
            $post = get_post( $post );

            if ( empty( $post ) || 0 >= $archive_excerpt_length ) {
                return '';
            }

            if ( post_password_required( $post ) ) {
                return esc_html__( 'Post password required.', 'digicove' );
            }

            $content = apply_filters( 'the_content', strip_shortcodes( $post->post_content ) );
            $content = str_replace( ']]>', ']]&gt;', $content );

            $excerpt_more = apply_filters( 'digicove_excerpt_more', '&hellip;' );
            $excerpt      = wp_trim_words( $content, $archive_excerpt_length, $excerpt_more );

            return $excerpt;
        }
        public function get_post_metas(){
            $post_author = digicove()->get_theme_opt( 'post_author', true );
            $post_date = digicove()->get_theme_opt( 'post_date', true );
            if($post_author || $post_date || $post_category_on) : ?>
                <ul class="pxl-item--meta">
                    <?php if($post_date) : ?>
                        <li class="pxl-item--date"><?php echo get_the_date(); ?></li>
                    <?php endif; ?>
                    <?php if($post_author) : ?>
                        <li class="pxl-item--author"><?php echo esc_html__('by', 'digicove'); ?>&nbsp;<?php the_author_posts_link(); ?></li>
                    <?php endif; ?>
                </ul>
            <?php endif; 
        }
        public function digicove_set_post_views( $postID ) {
            $countKey = 'post_views_count';
            $count    = get_post_meta( $postID, $countKey, true );
            if ( $count == '' ) {
                $count = 0;
                delete_post_meta( $postID, $countKey );
                add_post_meta( $postID, $countKey, '0' );
            } else {
                $count ++;
                update_post_meta( $postID, $countKey, $count );
            }
        }
        public function get_tagged_in(){
            $tags_list = get_the_tag_list( '', ' ' );
            if ( $tags_list )
            {
                echo '<div class="pxl--tags">';
                printf('%2$s', '', $tags_list);
                echo '</div>';
            }
        }
        public function get_socials_share() { 
            $img_url = '';
            if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false)) {
                $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false);
            }
            $social_facebook = digicove()->get_theme_opt( 'social_facebook', true );
            $social_twitter = digicove()->get_theme_opt( 'social_twitter', true );
            $social_pinterest = digicove()->get_theme_opt( 'social_pinterest', true );
            $social_google = digicove()->get_theme_opt( 'social_google', true );
            $social_linkedin = digicove()->get_theme_opt( 'social_linkedin', true );
            ?>
            <div class="pxl--social">
                <label for="">Share:</label>
                <?php if($social_facebook) : ?>
                    <a class="fb-social" title="<?php echo esc_attr__('Facebook', 'digicove'); ?>" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
                        <span><?php echo esc_attr__('Facebook', 'digicove'); ?></span>
                    </a>
                <?php endif; ?>
                <?php if($social_twitter) : ?>
                    <a class="tw-social" title="<?php echo esc_attr__('Twitter', 'digicove'); ?>" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>%20">
                        <span><?php echo esc_attr__('Twitter', 'digicove'); ?></span>
                    </a>
                <?php endif; ?>
                <?php if($social_pinterest) : ?>
                    <a class="pin-social" title="<?php echo esc_attr__('Pinterest', 'digicove'); ?>" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url($img_url[0]); ?>&description=<?php the_title(); ?>%20">
                        <span><?php echo esc_attr__('Pinterest', 'digicove'); ?></span>
                    </a>
                <?php endif; ?>
                <?php if($social_google) : ?>
                    <a class="gg-social" title="<?php echo esc_attr__('Google', 'digicove'); ?>" target="_blank" href="http://www.google.com">
                        <span><?php echo esc_attr__('Google', 'digicove'); ?></span>
                    </a>
                <?php endif; ?>
                <?php if($social_linkedin) : ?>
                    <a class="lin-social" title="<?php echo esc_attr__('LinkedIn', 'digicove'); ?>" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>%20">
                        <span><?php echo esc_attr__('LinkedIn', 'digicove'); ?></span>
                    </a>
                <?php endif; ?>
            </div>
            <?php
        }
        public function get_socials_share_case() { 
            $img_url = '';
            if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false)) {
                $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false);
            }
            $social_facebook = digicove()->get_page_opt( 'social_facebook', true );
            $social_twitter = digicove()->get_page_opt( 'social_twitter', true );
            $social_pinterest = digicove()->get_page_opt( 'social_pinterest', true );
            $social_google = digicove()->get_page_opt( 'social_google', true );
            $social_linkedin = digicove()->get_page_opt( 'social_linkedin', true );
            ?>
            <div class="pxl--social">
                <label for="">Share:</label>
                <?php if($social_facebook) : ?>
                    <a class="fb-social" title="<?php echo esc_attr__('Facebook', 'digicove'); ?>" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
                        <i class="caseicon-facebook"></i>
                    </a>
                <?php endif; ?>
                <?php if($social_twitter) : ?>
                    <a class="tw-social" title="<?php echo esc_attr__('Twitter', 'digicove'); ?>" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>%20">
                        <i class="caseicon-twitter"></i>
                    </a>
                <?php endif; ?>
                <?php if($social_pinterest) : ?>
                    <a class="pin-social" title="<?php echo esc_attr__('Pinterest', 'digicove'); ?>" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url($img_url[0]); ?>&description=<?php the_title(); ?>%20">
                        <i class="caseicon-pinterest"></i>
                    </a>
                <?php endif; ?>
                <?php if($social_google) : ?>
                    <a class="gg-social" title="<?php echo esc_attr__('Google', 'digicove'); ?>" target="_blank" href="http://www.google.com">
                        <i class="fab fa-google"></i>
                    </a>
                <?php endif; ?>
                <?php if($social_linkedin) : ?>
                    <a class="lin-social" title="<?php echo esc_attr__('LinkedIn', 'digicove'); ?>" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>%20">
                        <i class="caseicon-linkedin"></i>
                    </a>
                <?php endif; ?>
            </div>
            <?php
        }
        public function get_post_nav() {
            global $post;
            $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
            $next     = get_adjacent_post( false, '', false );

            if ( ! $next && ! $previous )
                return;
            ?>
            <?php
            $next_post = get_next_post();
            $previous_post = get_previous_post();

            if( !empty($next_post) || !empty($previous_post) ) { 
                ?>
                <div class="pxl-post--navigation">
                    <div class="pxl--items">
                        <div class="pxl--item pxl--item-prev">
                            <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { 
                                $prev_img_id = get_post_thumbnail_id($previous_post->ID);
                                $prev_img_url = wp_get_attachment_image_src($prev_img_id, 'digicove-thumb-xs');
                                ?>
                                <a class="pxl--label" href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="14" viewBox="0 0 23 14" fill="none">
                                        <path d="M1.914 6.002L7.208 0.707L6.501 0L0 6.502L6.5 13.002L7.207 12.295L1.914 7.002H23V6.002H1.914Z" fill="#2C4C59"/>
                                    </svg></a>  
                                    <div class="pxl--holder">
                                        <?php if(!empty($prev_img_id)) : ?>
                                            <div class="pxl--img">
                                                <a  href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><img src="<?php echo wp_kses_post($prev_img_url[0]); ?>" /></a>
                                            </div>
                                        <?php endif; ?>
                                        <div class="pxl--meta">
                                            <a  href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><?php echo get_the_title( $previous_post->ID ); ?></a>
                                            <span class="pxl--meta-date"><?php echo get_the_date(); ?></span>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="pxl--item pxl--item-next">
                                <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') {
                                    $next_img_id = get_post_thumbnail_id($next_post->ID);
                                    $next_img_url = wp_get_attachment_image_src($next_img_id, 'digicove-thumb-xs');
                                    ?>
                                    <a class="pxl--label" href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="14" viewBox="0 0 23 14" fill="none">
                                            <path d="M0 6.002H21.086L15.792 0.707L16.499 0L23 6.502L16.5 13.002L15.793 12.295L21.086 7.002H0V6.002Z" fill="#2C4C59"/>
                                        </svg>
                                    </a>
                                    <div class="pxl--holder">
                                        <div class="pxl--meta">
                                            <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo get_the_title( $next_post->ID ); ?></a>
                                            <span class="pxl--meta-date"><?php echo get_the_date(); ?></span>

                                        </div>
                                        <?php if(!empty($next_img_id)) : ?>
                                            <div class="pxl--img">
                                                <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><img src="<?php echo wp_kses_post($next_img_url[0]); ?>" /></a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div><!-- .nav-links -->
                    </div>
                <?php }
            }
            public function get_post_case_nav() {
                global $post;
                $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
                $next     = get_adjacent_post( false, '', false );

                if ( ! $next && ! $previous )
                    return;
                ?>
                <?php
                $next_post = get_next_post();
                $previous_post = get_previous_post();

                if( !empty($next_post) || !empty($previous_post) ) { 
                    ?>
                    <div class="pxl-post--navigation">
                        <div class="pxl--items">
                            <div class="pxl--item pxl--item-prev">
                                <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { 
                                    $prev_img_id = get_post_thumbnail_id($previous_post->ID);
                                    $prev_img_url = wp_get_attachment_image_src($prev_img_id, 'digicove-thumb-xs');
                                    ?>
                                    <a class="pxl--label" href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="36" viewBox="0 0 35 36" fill="none">
                                            <path d="M16.4769 28.68C16.2095 28.4126 16.0695 28.0724 16.0569 27.6592C16.0443 27.246 16.1721 26.9057 16.4404 26.6383L23.5863 19.4925H7.28939C6.8762 19.4925 6.5296 19.3525 6.2496 19.0725C5.9696 18.7925 5.83009 18.4464 5.83106 18.0342C5.83106 17.621 5.97106 17.2744 6.25106 16.9944C6.53106 16.7144 6.87717 16.5749 7.28939 16.5758H23.5863L16.4404 9.43001C16.1731 9.16265 16.0452 8.82237 16.0569 8.40918C16.0686 7.99599 16.2086 7.65571 16.4769 7.38835C16.7443 7.12098 17.0845 6.9873 17.4977 6.9873C17.9109 6.9873 18.2512 7.12098 18.5186 7.38835L28.1436 17.0133C28.2894 17.1349 28.3929 17.287 28.4542 17.4698C28.5154 17.6526 28.5456 17.8407 28.5446 18.0342C28.5446 18.2286 28.5145 18.4109 28.4542 18.5811C28.3939 18.7512 28.2904 18.9092 28.1436 19.055L18.5186 28.68C18.2512 28.9474 17.9109 29.0811 17.4977 29.0811C17.0845 29.0811 16.7443 28.9474 16.4769 28.68Z" fill="black"/>
                                        </svg>
                                        <span>Previous Project</span>
                                    </a>  
                                <?php } ?>
                            </div>
                            <div class="pxl--item pxl--item-next">
                                <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') {
                                    $next_img_id = get_post_thumbnail_id($next_post->ID);
                                    $next_img_url = wp_get_attachment_image_src($next_img_id, 'digicove-thumb-xs');
                                    ?>
                                    <a class="pxl--label" href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">
                                        <span>Next Project</span>                                        
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="36" viewBox="0 0 35 36" fill="none">
                                            <path d="M16.4769 28.68C16.2095 28.4126 16.0695 28.0724 16.0569 27.6592C16.0443 27.246 16.1721 26.9057 16.4404 26.6383L23.5863 19.4925H7.28939C6.8762 19.4925 6.5296 19.3525 6.2496 19.0725C5.9696 18.7925 5.83009 18.4464 5.83106 18.0342C5.83106 17.621 5.97106 17.2744 6.25106 16.9944C6.53106 16.7144 6.87717 16.5749 7.28939 16.5758H23.5863L16.4404 9.43001C16.1731 9.16265 16.0452 8.82237 16.0569 8.40918C16.0686 7.99599 16.2086 7.65571 16.4769 7.38835C16.7443 7.12098 17.0845 6.9873 17.4977 6.9873C17.9109 6.9873 18.2512 7.12098 18.5186 7.38835L28.1436 17.0133C28.2894 17.1349 28.3929 17.287 28.4542 17.4698C28.5154 17.6526 28.5456 17.8407 28.5446 18.0342C28.5446 18.2286 28.5145 18.4109 28.4542 18.5811C28.3939 18.7512 28.2904 18.9092 28.1436 19.055L18.5186 28.68C18.2512 28.9474 17.9109 29.0811 17.4977 29.0811C17.0845 29.0811 16.7443 28.9474 16.4769 28.68Z" fill="black"/>
                                        </svg>
                                    </a>
                                <?php } ?>
                            </div>
                        </div><!-- .nav-links -->
                    </div>
                <?php }
            }
            public function get_related_post(){
                $post_related_on = digicove()->get_theme_opt( 'post_related_on', false );

                if($post_related_on) {
                    global $post;
                    $current_id = $post->ID;
                    $posttags = get_the_category($post->ID);
                    if (empty($posttags)) return;

                    $tags = array();

                    foreach ($posttags as $tag) {

                        $tags[] = $tag->term_id;
                    }
                    $post_number = '6';
                    $query_similar = new WP_Query(array('posts_per_page' => $post_number, 'post_type' => 'post', 'post_status' => 'publish', 'category__in' => $tags));
                    if (count($query_similar->posts) > 1) {
                        wp_enqueue_script( 'swiper' );
                        wp_enqueue_script( 'pxl-swiper' );
                        $opts = [
                            'slide_direction'               => 'horizontal',
                            'slide_percolumn'               => '1', 
                            'slide_mode'                    => 'slide', 
                            'slides_to_show'                => 3, 
                            'slides_to_show_lg'             => 3, 
                            'slides_to_show_md'             => 2, 
                            'slides_to_show_sm'             => 2, 
                            'slides_to_show_xs'             => 1, 
                            'slides_to_scroll'              => 1, 
                            'slides_gutter'                 => 30, 
                            'arrow'                         => false,
                            'dots'                          => true,
                            'dots_style'                    => 'bullets'
                        ];
                        $data_settings = wp_json_encode($opts);
                        $dir           = is_rtl() ? 'rtl' : 'ltr';
                        ?>
                        <div class="pxl-related-post">
                            <h4 class="widget-title"><?php echo esc_html__('Related Posts', 'digicove'); ?></h4>
                            <div class="class" data-settings="<?php echo esc_attr($data_settings) ?>" data-rtl="<?php echo esc_attr($dir) ?>">
                                <div class="pxl-related-post-inner pxl-swiper-wrapper swiper-wrapper">
                                    <?php foreach ($query_similar->posts as $post):
                                        $thumbnail_url = '';
                                        if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) :
                                            $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'pxl-blog-small', false);
                                    endif;
                                    if ($post->ID !== $current_id) : ?>
                                        <div class="pxl-swiper-slide swiper-slide grid-item">
                                            <div class="pxl-grid-item-inner">
                                                <?php if (has_post_thumbnail()) { ?>
                                                    <div class="item-featured">
                                                        <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($thumbnail_url[0]); ?>" /></a>
                                                    </div>
                                                <?php } ?>
                                                <h3 class="item-title">
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h3>
                                            </div>
                                        </div>
                                    <?php endif;
                                endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php }
            }

            wp_reset_postdata();
        }
    }
}
