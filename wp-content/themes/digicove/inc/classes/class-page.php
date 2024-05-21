<?php

if (!class_exists('Digicove_Page')) {

    class Digicove_Page
    {
        public function get_site_loader(){

            $loader_text = digicove()->get_theme_opt( 'loader_text' );
            $loader_style = digicove()->get_theme_opt( 'loader_style', 'style-text' );            
            $enable_loader = digicove()->get_opt('enable_loader', '0');
            if($enable_loader == '1') { ?>
                <div id="pxl-loadding" class="pxl-loader <?php echo esc_attr($loader_style); ?>">
                    <div class="pxl-loader-inner">                    
                        <?php switch ($loader_style) {
                            case 'style-text': ?>
                            <div class="preloader-inner">
                                <div class="spinner"></div>
                                <?php if(!empty($loader_text)) { ?>
                                    <div class="loading-text">
                                     <?php $characters = mb_str_split($loader_text);
                                     foreach ($characters as $character) {
                                        $encoded_character = htmlspecialchars($character, ENT_COMPAT, 'UTF-8', false);
                                        echo '<span data-text="' . $encoded_character . '">' . $encoded_character . '</span>';
                                    }
                                    ?>
                                </div>
                            <?php } ?>
                        </div>
                        <?php break;

                        default: ?>
                        <div id="preloader">
                            <div class="load-svg"></div>
                            <div class="load-text"><?php echo esc_attr($loader_text); ?></div>
                        </div>
                        <?php break;
                    } ?>
                </div>
            </div>
        <?php }
    }

    public function get_link_pages() {
        wp_link_pages( array(
            'before'      => '<div class="page-links">',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
        ) ); 
    }

    public function get_page_title(){
        $pt_mode = digicove()->get_opt('pt_mode');
        if( $pt_mode == 'none' ) return;
        $ptitle_layout = (int)digicove()->get_opt('ptitle_layout');
        $titles = $this->get_title();
        $body_background_image = digicove()->get_theme_opt( 'page_title_background_image', ['url' => get_template_directory_uri().'', 'id' => '' ]);
        if ($pt_mode == 'bd' && $ptitle_layout > 0 && class_exists('Pxltheme_Core') && is_callable( 'Elementor\Plugin::instance' )) {
            ?>
            <div id="pxl-page-title-elementor">
                <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $ptitle_layout);?>
            </div>
            <?php 
        } else {
            $ptitle_breadcrumb_on = digicove()->get_opt( 'ptitle_breadcrumb_on', '1' ); 
            $post_title_on = digicove()->get_page_opt( 'post_title_on', 'true' ); 
            $post_title_post_on = digicove()->get_page_opt( 'post_title_post_on', 'true' ); 
            $post_title_product_on = digicove()->get_page_opt( 'post_title_product_on', 'true' ); 
            wp_enqueue_script('stellar-parallax'); ?>
            <div id="pxl-page-title-default" >
                <div class="pxl-page-title-default-bg" style="background-image:url(<?php echo esc_attr($body_background_image['url']); ?>)"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <?php if ($post_title_on == true && $post_title_post_on == true && $post_title_product_on == true) : ?>
                                <h1 class="pxl-page-title"><?php echo digicove_html($titles['title']) ?></h1>
                            <?php endif; ?>
                            <?php if($ptitle_breadcrumb_on == '1') : ?>
                                <?php $this->get_breadcrumb(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="1920" height="99" viewBox="0 0 1920 99" fill="none">
                    <path class="svg-bg" d="M0 304.964V0.5L13 3.5L36.5 8.5L56 12.5L75 16.5L93 20L112 23.5L173.5 34L233 43.5L261.5 47.5L290.5 51.5L303 53.5L316 55L344.5 58.5L373 62L403 65.5L432 69L461.5 72L502.5 76L542.5 79.5L584.5 83L625 86L657 88L699 90.5L712 91.5L724.5 92L745.5 93L764.5 94L795.5 95L827 96.5L857.5 97L888.5 98L920.5 98.5L952.5 99H981H995.5H1010.5H1025.5H1040H1048.5L1064.5 98.5H1073.5L1095.5 98H1098.5L1130 97.5L1189 95.5L1250 92.5L1315.5 88.5L1348 86.5L1381 84L1458.5 77L1497 72.5L1536 68L1636 55L1686 47.5L1711 43L1735.5 38.5L1828 21L1920 0.5V304.964C1167.84 475.273 326.598 375.926 0 304.964Z" fill="#ffffff"/>
                    <path d="M0 0.388855V-289H1920V0.388855C1167.84 178.983 326.598 74.8031 0 0.388855Z" fill="transparent"/>
                </svg>
            </div>
        <?php } 
    } 

    public function get_title() {
        $title = '';
            // Default titles
        if ( ! is_archive() ) {
                // Posts page view
            if ( is_home() ) {
                    // Only available if posts page is set.
                if ( ! is_front_page() && $page_for_posts = get_option( 'page_for_posts' ) ) {
                    $title = get_post_meta( $page_for_posts, 'custom_title', true );
                    if ( empty( $title ) ) {
                        $title = get_the_title( $page_for_posts );
                    }
                }
                if ( is_front_page() ) {
                    $title = esc_html__( 'Blog', 'digicove' );
                }
                } // Single page view
                elseif ( is_page() ) {
                    $title = get_post_meta( get_the_ID(), 'custom_title', true );
                    if ( ! $title ) {
                        $title = get_the_title();
                    }
                } elseif ( is_404() ) {
                    $title = esc_html__( '404', 'digicove' );
                } elseif ( is_search() ) {
                    $title = esc_html__( 'Search results', 'digicove' );
                } elseif ( is_singular('lp_course') ) {
                    $title = esc_html__( 'Course', 'digicove' );
                } else {
                    $title = get_post_meta( get_the_ID(), 'custom_title', true );
                    if ( ! $title ) {
                        $title = get_the_title();
                    }
                }
            } else {
                $title = get_the_archive_title();
                if( (class_exists( 'WooCommerce' ) && is_shop()) ) {
                    $title = get_post_meta( wc_get_page_id('shop'), 'custom_title', true );
                    if(!$title) {
                        $title = get_the_title( get_option( 'woocommerce_shop_page_id' ) );
                    }
                }
            }

            return array(
                'title' => $title,
            );
        }

        public function get_breadcrumb(){

            if ( ! class_exists( 'Digicove_Breadcrumb' ) )
            {
                return;
            }

            $breadcrumb = new Digicove_Breadcrumb();
            $entries = $breadcrumb->get_entries();

            if ( empty( $entries ) )
            {
                return;
            }

            ob_start();

            foreach ( $entries as $entry )
            {
                $entry = wp_parse_args( $entry, array(
                    'label' => '',
                    'url'   => ''
                ) );

                if ( empty( $entry['label'] ) )
                {
                    continue;
                }

                echo '<li>';

                if ( ! empty( $entry['url'] ) )
                {
                    printf(
                        '<a class="breadcrumb-entry" href="%1$s">%2$s</a>',
                        esc_url( $entry['url'] ),
                        esc_attr( $entry['label'] )
                    );
                }
                else
                {
                    printf( '<span class="breadcrumb-entry" >%s</span>', esc_html( $entry['label'] ) );
                }

                echo '</li>';
            }

            $output = ob_get_clean();

            if ( $output )
            {
                printf( '<ul class="pxl-breadcrumb">%s</ul>', wp_kses_post($output));
            }
        }

        public function get_pagination( $query = null, $ajax = false ){

            if($ajax){
                add_filter('paginate_links', 'digicove_ajax_paginate_links');
            }

            $classes = array();

            if ( empty( $query ) )
            {
                $query = $GLOBALS['wp_query'];
            }

            if ( empty( $query->max_num_pages ) || ! is_numeric( $query->max_num_pages ) || $query->max_num_pages < 2 )
            {
                return;
            }

            $paged = $query->get( 'paged', '' );

            if ( ! $paged && is_front_page() && ! is_home() )
            {
                $paged = $query->get( 'page', '' );
            }

            $paged = $paged ? intval( $paged ) : 1;

            $pagenum_link = html_entity_decode( get_pagenum_link() );
            $query_args   = array();
            $url_parts    = explode( '?', $pagenum_link );

            if ( isset( $url_parts[1] ) )
            {
                wp_parse_str( $url_parts[1], $query_args );
            }

            $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
            $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
            $paginate_links_args = array(
                'base'     => $pagenum_link,
                'total'    => $query->max_num_pages,
                'current'  => $paged,
                'mid_size' => 1,
                'add_args' => array_map( 'urlencode', $query_args ),
                'prev_text' => '',
                'next_text' => '',
            );
            if($ajax){
                $paginate_links_args['format'] = '?page=%#%';
            }
            $links = paginate_links( $paginate_links_args );
            if ( $links ):
                ?>
                <nav class="pxl-pagination-wrap <?php echo esc_attr($ajax?'ajax':''); ?>">
                    <div class="pxl-pagination-links">
                        <?php
                        printf($links);
                        ?>
                    </div>
                </nav>
                <?php
            endif;
        }
    }
}
