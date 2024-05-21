<?php 
/**
 * Actions Hook for the theme
 *
 * @package Bravisthemes
 */
add_action('after_setup_theme', 'digicove_setup');
function digicove_setup(){

    //Set the content width in pixels, based on the theme's design and stylesheet.
    $GLOBALS['content_width'] = apply_filters( 'digicove_content_width', 1200 );

    // Make theme available for translation.
    load_theme_textdomain( 'digicove', get_template_directory() . '/languages' );

    // Custom Header
    add_theme_support( 'custom-header' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    set_post_thumbnail_size( 1620, 930 );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary', 'digicove' ),
    ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for core custom logo.
    add_theme_support( 'custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ) );
    add_theme_support( 'post-formats', array (
        '',
    ) );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');
    add_image_size( 'digicove-thumb-small', 150, 176, true );
    add_image_size( 'digicove-thumb-xs', 120, 104, true );
    add_image_size( 'digicove-lager', 1620, 930, true );
    add_theme_support( 'woocommerce' );

    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
    remove_theme_support('widgets-block-editor');

}

/**
 * Register Widgets Position.
 */
add_action( 'widgets_init', 'digicove_widgets_position' );
function digicove_widgets_position() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'digicove' ),
		'id'            => 'sidebar-blog',
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

    if (class_exists('ReduxFramework')) {
        register_sidebar( array(
            'name'          => esc_html__( 'Case Sidebar', 'digicove' ),
            'id'            => 'sidebar-case',
            'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
            'after_widget'  => '</div></section>',
            'before_title'  => '<h2 class="widget-title"><span>',
            'after_title'   => '</span></h2>',
        ) );
    }

    if (class_exists('ReduxFramework')) {
        register_sidebar( array(
            'name'          => esc_html__( 'Service Sidebar', 'digicove' ),
            'id'            => 'sidebar-service',
            'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
            'after_widget'  => '</div></section>',
            'before_title'  => '<h2 class="widget-title"><span>',
            'after_title'   => '</span></h2>',
        ) );
    }

    if (class_exists('ReduxFramework')) {
      register_sidebar( array(
       'name'          => esc_html__( 'Page Sidebar', 'digicove' ),
       'id'            => 'sidebar-page',
       'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
       'after_widget'  => '</div></section>',
       'before_title'  => '<h2 class="widget-title"><span>',
       'after_title'   => '</span></h2>',
   ) );
  }

  if ( class_exists( 'Woocommerce' ) ) {
    register_sidebar( array(
        'name'          => esc_html__( 'Shop Sidebar', 'digicove' ),
        'id'            => 'sidebar-shop',
        'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
        'after_widget'  => '</div></section>',
        'before_title'  => '<h2 class="widget-title"><span>',
        'after_title'   => '</span></h2>',
    ) );
}
}

/**
 * Enqueue Styles Scripts : Front-End
 */
add_action( 'wp_enqueue_scripts', 'digicove_scripts' );
function digicove_scripts() {  
    $enable_cursor = digicove()->get_opt('enable_cursor', '0');
    /* Icons Lib - CSS */
    wp_enqueue_style('flaticon', get_template_directory_uri() . '/assets/fonts/flaticon/css/flaticon.css' , array(), '1.0.0' );

    /* Popup Libs */
    wp_enqueue_style( 'twentytwenty', get_template_directory_uri() . '/assets/css/twentytwenty.css', array(), '1.0.0' );
    wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/assets/css/jquery-ui.css', array(), '1.0.0' );
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/css/libs/magnific-popup.css', array(), '1.1.0');
    wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/libs/magnific-popup.min.js', array( 'jquery' ), '1.1.0', true );
    wp_enqueue_script( 'nice-select', get_template_directory_uri() . '/assets/js/libs/nice-select.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_style('wow-animate', get_template_directory_uri() . '/assets/css/libs/animate.min.css', array(), '1.1.0');
    wp_enqueue_script( 'wow-animate', get_template_directory_uri() . '/assets/js/libs/wow.min.js', array( 'jquery' ), '1.0.0', true );
    wp_register_script( 'pxl-counter-slide', get_template_directory_uri() . '/assets/js/libs/counter-slide.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'curtains-lib', get_template_directory_uri() . '/assets/js/libs/curtains.umd.min.js', array( 'jquery' ), '1.0.0', true );

    wp_enqueue_script( 'jquery-ui-slider' );

    /* Parallax Image */
    wp_register_script( 'tilt', get_template_directory_uri() . '/assets/js/libs/tilt.min.js', array( 'jquery' ), '1.0.0', true );

    /* Parallax Libs */
    if( $enable_cursor == '1')
        wp_enqueue_script( 'digicove-cursor', get_template_directory_uri() . '/assets/js/libs/cursor.js', array( 'jquery' ), digicove()->get_version(), true );

    /* Icons Lib - CSS */

    // Image Before After
    wp_register_script( 'event-move', get_template_directory_uri() . '/assets/js/libs/event.move.js', array( 'jquery' ), '1.0.0', true );
    wp_register_script( 'twentytwenty', get_template_directory_uri() . '/assets/js/libs/twentytwenty.js', array( 'jquery' ), '1.0.0', true );
    wp_register_script( 'pxl-twentytwenty', get_template_directory_uri() . '/elements/widgets/js/pxl-twentytwenty.js', array( 'jquery' ), '1.0.0', true );

    $digicove_version = wp_get_theme( get_template() );
    wp_enqueue_style( 'pxl-caseicon', get_template_directory_uri() . '/assets/css/caseicon.css', array(), $digicove_version->get( 'Version' ) );
    wp_enqueue_style( 'pxl-grid', get_template_directory_uri() . '/assets/css/grid.css', array(), $digicove_version->get( 'Version' ) );
    wp_enqueue_style( 'pxl-style', get_template_directory_uri() . '/assets/css/style.css', array(), $digicove_version->get( 'Version' ) );
    wp_add_inline_style( 'pxl-style', digicove_inline_styles() );
    wp_enqueue_style( 'pxl-base', get_template_directory_uri() . '/style.css', array(), $digicove_version->get( 'Version' ) );
    wp_enqueue_style( 'pxl-google-fonts', digicove_fonts_url(), array(), null );
    wp_enqueue_script( 'pxl-main', get_template_directory_uri() . '/assets/js/theme.js', array( 'jquery' ), $digicove_version->get( 'Version' ), true );
    wp_enqueue_script( 'pxl-woocommerce', get_template_directory_uri() . '/woocommerce/woocommerce.js', array( 'jquery' ), $digicove_version->get( 'Version' ), true );    
    wp_localize_script( 'pxl-main', 'main_data', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    do_action( 'digicove_scripts');
}


add_action( 'pxl_anchor_target', 'digicove_cursor_render');
function digicove_cursor_render(){  

    $enable_cursor          = digicove()->get_opt('enable_cursor', '0');
    $hide_cursor_follower   = digicove()->get_theme_opt('hide_cursor_follower', '0');
    $none_follower = $hide_cursor_follower == '1' ? 'none-follower' : 'has-follower' ;
    if($enable_cursor == '0') return;
    ?>
    <div class="pxl-cursor pos-fix <?php echo esc_attr($none_follower) ?>"></div>
    <?php if($hide_cursor_follower != '1'): ?>
        <div class="pxl-cursor-follower pos-fix"></div>
    <?php endif; ?>
    <div class="pxl-cursor-arrow-prev pos-fix <?php echo esc_attr($none_follower) ?>"><span class="icon far fa-angle-right rotate-180"></span><span class="text"><?php echo esc_html__( 'Prev', 'digicove' ) ?></span></div>
    <div class="pxl-cursor-arrow-next pos-fix <?php echo esc_attr($none_follower) ?>"><span class="text"><?php echo esc_html__( 'Next', 'digicove' ) ?></span><span class="icon far fa-angle-right"></span></div>
    <div class="pxl-cursor-drag pos-fix <?php echo esc_attr($none_follower) ?>">
        <span class="pxl-overlay"></span>
        <span class="icon icon-left far fa-angle-right rotate-180"></span>
        <span class="text"><?php echo esc_html__( 'Drag', 'digicove' ) ?></span>
        <span class="icon icon-right far fa-angle-right"></span>
    </div>
    <div class="pxl-cursor-map pos-fix <?php echo esc_attr($none_follower) ?>"><?php echo esc_html__( 'Map', 'digicove' ) ?></div>
    <div class="pxl-cursor-text pos-fix <?php echo esc_attr($none_follower) ?>"></div>
    <div class="pxl-cursor-icon pos-fix <?php echo esc_attr($none_follower) ?>"></div>
    <?php 
}

/**
 * Enqueue Styles Scripts : Back-End
 */
add_action('admin_enqueue_scripts', 'digicove_admin_style');
function digicove_admin_style() {
    $theme = wp_get_theme( get_template() );
    wp_enqueue_style( 'digicove-admin-style', get_template_directory_uri() . '/assets/css/admin.css', array(), $theme->get( 'Version' ) );
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/fonts/fontawesome/css/awesome.css');
    wp_enqueue_style('flaticon', get_template_directory_uri() . '/assets/fonts/flaticon/css/flaticon.css');
}

add_action( 'elementor/editor/before_enqueue_scripts', function() {
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/fonts/fontawesome/css/awesome.css');
    wp_enqueue_style( 'elementor-flaticon', get_template_directory_uri() . '/assets/fonts/flaticon/css/flaticon.css');
    wp_enqueue_style( 'digicove-admin-style', get_template_directory_uri() . '/assets/css/admin.css');
} );

/* Favicon */
add_action('wp_head', 'digicove_site_favicon');
function digicove_site_favicon(){
    $favicon = digicove()->get_theme_opt( 'favicon' );
    if(!empty($favicon['url']))
        echo '<link rel="icon" type="image/png" href="'.esc_url($favicon['url']).'"/>';
}

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
add_action( 'wp_head', 'digicove_pingback_header' );
function digicove_pingback_header() {
    if ( is_singular() && pings_open() )
    {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}

add_action( 'elementor/preview/enqueue_styles', 'digicove_add_editor_preview_style' );
function digicove_add_editor_preview_style() {
    wp_add_inline_style( 'editor-preview', digicove_editor_preview_inline_styles() );
}
function digicove_editor_preview_inline_styles(){
    $theme_colors = digicove_configs('theme_colors');
    ob_start();
    echo '.elementor-edit-area-active{';
    foreach ($theme_colors as $color => $value) {
        printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
    }
    echo '}';
    return ob_get_clean();
}

add_action( 'pxl_anchor_target', 'digicove_hook_anchor_templates_hidden_panel');
function digicove_hook_anchor_templates_hidden_panel(){

    $hidden_templates = digicove_get_templates_slug('hidden-panel');
    if(empty($hidden_templates)) return;

    foreach ($hidden_templates as $slug => $values){
        $args = [
            'slug' => $slug,
            'post_id' => $values['post_id'],
            'position' => !empty($values['position']) ? $values['position'] : 'custom-pos'
        ];
        if( did_action('pxl_anchor_target_hidden_panel_'.$values['post_id']) <= 0){  
            //can be assign from here: do_action( 'pxl_anchor_target_hidden_panel_'.$slug);
            do_action( 'pxl_anchor_target_hidden_panel_'.$values['post_id'], $args );  
        }
    } 
} 

function digicove_hook_anchor_hidden_panel($args){  
    ?>
    <div class="pxl-hidden-template pxl-hidden-template-<?php echo esc_attr($args['post_id'])?> pos-<?php echo esc_attr($args['position']) ?>">
        <div class="pxl-widget-template-overlay"></div>
        <div class="pxl-hidden-template-wrap">
            <span class="pxl-close" title="<?php echo esc_attr__( 'Close', 'digicove' ) ?>"></span>
            <div class="pxl-panel-content custom_scroll">
               <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( (int)$args['post_id']); ?>
           </div>
       </div>
   </div> 
   <?php    
}

function digicove_hook_anchor_custom(){
    return;
}

/* Search Popup */
if(!function_exists('digicove_hook_anchor_search')){
    function digicove_hook_anchor_search(){ ?>
        <div id="pxl-search-popup" class="pxl-hidden-template pxl-side-search">
            <div class="pxl-item--overlay"></div>
            <div class="pxl-item--logo">
                <?php
                $logo_m = digicove()->get_theme_opt( 'logo_m', ['url' => get_template_directory_uri().'/assets/img/logo.png', 'id' => '' ] );
                if ($logo_m['url']) {
                    printf(
                        '<a href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="%2$s"/></a>',
                        esc_url( home_url( '/' ) ),
                        esc_attr( get_bloginfo( 'name' ) ),
                        esc_url( $logo_m['url'] )
                    );
                }
                ?>
            </div>
            <div class="pxl-item--conent">
                <div class="pxl-item--close pxl-close"></div>
                <form role="search" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
                    <input type="text" placeholder="<?php esc_attr_e('Type Your Search Words...', 'digicove'); ?>" name="s" class="search-field" />
                    <button type="submit" class="search-submit rm-style-default"><i class="caseicon-search"></i></button>
                    <div class="pxl--search-divider"></div>
                </form>
            </div>
        </div>
    <?php }
}       

