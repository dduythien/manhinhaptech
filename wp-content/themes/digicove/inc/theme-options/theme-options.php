<?php
if (!class_exists('ReduxFramework')) {
    return;
}
if (class_exists('ReduxFrameworkPlugin')) {
    remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
}

$opt_name = digicove()->get_option_name();
$version = digicove()->get_version();

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => '', //$theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version'      => $version,
    // Version that appears at the top of your panel
    'menu_type'            => 'submenu', //class_exists('Pxltheme_Core') ? 'submenu' : '',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__('Theme Options', 'digicove'),
    'page_title'           => esc_html__('Theme Options', 'digicove'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => false,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-admin-generic',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => true,
    // Show the time the page took to load, etc
    'update_notice'        => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
    'show_options_object' => false,
    // OPTIONAL -> Give you extra features
    'page_priority'        => 80,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'pxlart', //class_exists('Digicove_Admin_Page') ? 'case' : '',
    // For a full list of options, visit: //codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'pxlart-theme-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    ),
);

Redux::SetArgs($opt_name, $args);

/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('General', 'digicove'),
    'icon'   => 'el-icon-home',
    'fields' => array(
        array(
            'id'       => 'favicon',
            'type'     => 'media',
            'title'    => esc_html__('Favicon', 'digicove'),
            'default'  => '',
            'url'      => false
        ),
        array(
            'id'       => 'enable_cursor',
            'type'     => 'button_set',
            'title'    => esc_html__('Enable Cursor', 'digicove'),
            'options'  => [
                '1'  => esc_html__('Yes','digicove'),
                '0'  => esc_html__('No','digicove'),
            ],
            'default'  => '0',
        ),
        array(
            'id'       => 'hide_cursor_follower',
            'type'     => 'switch',
            'title'    => esc_html__('Hide Outer Follower circle cursor', 'digicove'),
            'default'  => false,
        ), 
        array(
            'id'       => 'enable_loader',
            'type'     => 'button_set',
            'title'    => esc_html__('Enable Loader', 'digicove'),
            'options'  => [
                '1'  => esc_html__('Yes','digicove'),
                '0'  => esc_html__('No','digicove'),
            ],
            'default'  => '0',
        ),
        array(
            'id'       => 'loader_style',
            'type'     => 'select',
            'title'    => esc_html__('Loader Style', 'digicove'),
            'options'  => [
                'style-text'           => esc_html__('Text', 'digicove'),                
            ],
            'default'  => '',
            'indent'   => true,
            'required' => array( 0 => 'enable_loader', 1 => 'equals', 2 => true ),
        ),
        array(
            'id'      => 'loader_text',
            'type'    => 'text',
            'title'   => esc_html__('Loader Text', 'digicove'),
            'default' => '',
            'required' => array( 0 => 'enable_loader', 1 => 'equals', 2 => '1' ),
        ),      
    )
));

/*--------------------------------------------------------------
# Colors
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Colors', 'digicove'),
    'icon'   => 'el-icon-file-edit',
    'fields' => array(
        array(
            'id'          => 'primary_color',
            'type'        => 'color',
            'title'       => esc_html__('Primary Color', 'digicove'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'secondary_color',
            'type'        => 'color',
            'title'       => esc_html__('Scondary Color', 'digicove'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'third_color',
            'type'        => 'color',
            'title'       => esc_html__('Thrid Color', 'digicove'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'four_color',
            'type'        => 'color',
            'title'       => esc_html__('Four Color', 'digicove'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'      => 'link_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Link Colors', 'digicove'),
            'default' => array(
                'regular' => '',
                'hover'   => '',
                'active'  => ''
            ),
            'output'  => array('a')
        ),
        array(
            'id'          => 'cursor_circle_bg',
            'type'        => 'color_rgba',
            'title'       => esc_html__('Cursor Circle Background', 'digicove'),
            'default'   => array(
                'rgba'     => '#FF7268',
                'alpha'     => 1
            ),
        ), 
        array(
            'id'          => 'cursor_follower_circle_bg',
            'type'        => 'color_rgba',
            'title'       => esc_html__('Cursor Follower Circle Background', 'digicove'),
            'default'   => array(
                'rgba'     => '#FF7268',
                'alpha'     => 1
            ),
        ), 
        array(
            'id'          => 'cursor_follower_active_bg',
            'type'        => 'color_rgba',
            'title'       => esc_html__('Active Background', 'digicove'),
            'default'   => array(
                'rgba'     => '#FF7268',
                'alpha'     => 1
            ),
        ), 
        array(
            'id'          => 'cursor_active_text_color',
            'type'        => 'color',
            'title'       => esc_html__('Active Text Color', 'digicove'),
            'default'   => '#fff',
            'transparent' => false,
        ),      
    )
));

/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Header', 'digicove'),
    'icon'   => 'el el-indent-left',
    'fields' => array_merge(
        digicove_header_opts(),
        array(
            array(
                'id'       => 'sticky_scroll',
                'type'     => 'button_set',
                'title'    => esc_html__('Sticky Scroll', 'digicove'),
                'options'  => array(
                    'pxl-sticky-stt' => esc_html__('Scroll To Top', 'digicove'),
                    'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'digicove'),
                ),
                'default'  => 'pxl-sticky-stb',
            ),
        )
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Mobile', 'digicove'),
    'icon'       => 'el el-picture',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'logo_m',
            'type'     => 'media',
            'title'    => esc_html__('Select Logo', 'digicove'),
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/img/logo.png'
            ),
            'url'      => false
        ),
        array(
            'id'       => 'logo_height',
            'type'     => 'dimensions',
            'title'    => esc_html__('Logo Height', 'digicove'),
            'width'    => false,
            'unit'     => 'px',
            'output'    => array('#pxl-header-default .pxl-header-branding img, #pxl-header-default #pxl-header-mobile .pxl-header-branding img, #pxl-header-elementor #pxl-header-mobile .pxl-header-branding img, .pxl-logo-mobile img'),
        ),
        array(
            'id'       => 'search_mobile',
            'type'     => 'switch',
            'title'    => esc_html__('Search Form', 'digicove'),
            'default'  => true
        )
    )
));

/*--------------------------------------------------------------
# Page Title area
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Page Title', 'digicove'),
    'icon'   => 'el-icon-map-marker',
    'fields' => array_merge(
        digicove_page_title_opts() ,
        array(
            array(
                'id'       => 'page_title_background_image',
                'type'     => 'media',
                'title'    => esc_html__('Page Title Background Image', 'digicove'),
                'url'      => false
            )
        ),
        array (
            array(
                'id'       => 'opt-color-gradient',
                'type'      => 'color_rgba',
                'title'       => esc_html__('Page Title Background Overlay', 'digicove'),
                'output' => array(
                    'background' => '#pxl-page-title-default'
                )
            ) 
        )
    )
));


/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Footer', 'digicove'),
    'icon'   => 'el el-website',
    'fields' => array_merge(
        digicove_footer_opts(),
        array(
            array(
                'id'       => 'back_totop_on',
                'type'     => 'switch',
                'title'    => esc_html__('Button Back to Top', 'digicove'),
                'default'  => false,
            ),
            array(
                'id'       => 'footer_fixed',
                'type'     => 'switch',
                'title'    => esc_html__('Footer Fixed', 'digicove'),
                'default'  => false,
            )
        ) 
    )
    
));

/*--------------------------------------------------------------
# WordPress default content
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title' => esc_html__('Blog Archive', 'digicove'),
    'icon'  => 'el-icon-pencil',
    'fields'     => array_merge(
        array(
            array(
                'id'       => 'archive_date',
                'title'    => esc_html__('Date', 'digicove'),
                'subtitle' => esc_html__('Display the Date for each blog post.', 'digicove'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'      => 'archive_excerpt_length',
                'type'    => 'text',
                'title'   => esc_html__('Excerpt Length', 'digicove'),
                'default' => '',
                'subtitle' => esc_html__('Default: 50', 'digicove'),
            ),
            array(
                'id'      => 'archive_readmore_text',
                'type'    => 'text',
                'title'   => esc_html__('Read More Text', 'digicove'),
                'default' => '',
                'subtitle' => esc_html__('Default: Read more', 'digicove'),
            )
        )
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Single Post', 'digicove'),
    'icon'       => 'el-icon-file-edit',
    'subsection' => true,
    'fields'     => array_merge(
        array(
            array(
                'id'       => 'post_date',
                'title'    => esc_html__('Date', 'digicove'),
                'subtitle' => esc_html__('Display the Date for blog post.', 'digicove'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_author',
                'title'    => esc_html__('Author', 'digicove'),
                'subtitle' => esc_html__('Display the Author for blog post.', 'digicove'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_author_box_info',
                'title'    => esc_html__('Author Box Info', 'digicove'),
                'subtitle' => esc_html__('Show author box info on single post.', 'digicove'),
                'type'     => 'switch',
                'default'  => false,
            ),
            array(
                'title' => esc_html__('Social', 'digicove'),
                'type'  => 'section',
                'id' => 'social_section',
                'indent' => true,
            ),
            array(
                'id'       => 'post_social_share',
                'title'    => esc_html__('Social', 'digicove'),
                'subtitle' => esc_html__('Display the Social Share for blog post.', 'digicove'),
                'type'     => 'switch',
                'default'  => false,
            ),
            array(
                'id'       => 'social_facebook',
                'title'    => esc_html__('Facebook', 'digicove'),
                'type'     => 'switch',
                'default'  => true,
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'social_twitter',
                'title'    => esc_html__('Twitter', 'digicove'),
                'type'     => 'switch',
                'default'  => true,
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'social_pinterest',
                'title'    => esc_html__('Pinterest', 'digicove'),
                'type'     => 'switch',
                'default'  => true,
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'social_google',
                'title'    => esc_html__('Google', 'digicove'),
                'type'     => 'switch',
                'default'  => true,
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'social_linkedin',
                'title'    => esc_html__('LinkedIn', 'digicove'),
                'type'     => 'switch',
                'default'  => true,
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
        )
    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Service Archive', 'digicove'),
    'icon'  => 'el-icon-pencil',
    'fields'     => array_merge(
        array(
            array(
                'id'      => 'archive_readmore_text_service',
                'type'    => 'text',
                'title'   => esc_html__('Read Article Text', 'digicove'),
                'default' => '',
                'subtitle' => esc_html__('Default: Read Article', 'digicove'),
            )
        )
    )
));

/*--------------------------------------------------------------
# Woocommerce
--------------------------------------------------------------*/
if(class_exists('Woocommerce')) {
    Redux::setSection($opt_name, array(
        'title' => esc_html__('Woocommerce', 'digicove'),
        'icon'  => 'el el-shopping-cart',
        'fields'     => array_merge(
            digicove_sidebar_pos_opts([ 'prefix' => 'shop_']),
            array(
                array(
                    'title'         => esc_html__('Products displayed per row', 'digicove'),
                    'id'            => 'products_columns',
                    'type'          => 'slider',
                    'subtitle'      => esc_html__('Number product to show per row', 'digicove'),
                    'default'       => 3,
                    'min'           => 2,
                    'step'          => 1,
                    'max'           => 6,
                    'display_value' => 'text'
                ),
                array(
                    'title'         => esc_html__('Products displayed per page', 'digicove'),
                    'id'            => 'product_per_page',
                    'type'          => 'slider',
                    'subtitle'      => esc_html__('Number product to show', 'digicove'),
                    'default'       => 9,
                    'min'           => 3,
                    'step'          => 1,
                    'max'           => 50,
                    'display_value' => 'text'
                ),
                array(
                    'id'       => 'shop_layout',
                    'type'     => 'button_set',
                    'title'    => esc_html('Layout', 'digicove'),
                    'options'  => array(
                        'grid'  => esc_html('Grid Three', 'digicove'),
                        'list'  => esc_html('List', 'digicove'),                        
                    ),
                    'default'  => 'grid'
                ),
            )
        )
    ));

    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Single Product', 'digicove'),
        'icon'       => 'el el-shopping-cart',
        'subsection' => true,
        'fields'     => array_merge(
            digicove_sidebar_pos_opts([ 'prefix' => 'product_']),
            array(
                array(
                    'id'       => 'product_related',
                    'title'    => esc_html__('Product Related', 'digicove'),
                    'subtitle' => esc_html__('Show/Hide related product', 'digicove'),
                    'type'     => 'switch',
                    'default'  => '1',
                ),    
                array(
                    'id'       => 'product_title',
                    'type'     => 'switch',
                    'title'    => esc_html__('Product Title', 'digicove'),
                    'default'  => false
                ),
                array(
                    'id'       => 'product_social_share',
                    'type'     => 'switch',
                    'title'    => esc_html__('Social Share', 'digicove'),
                    'default'  => false
                ),
                array(
                    'id'       => 'product_variation_style',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Product Variation Style', 'digicove'),
                    'subtitle' => esc_html__('Dropdown or selected list', 'digicove'),
                    'options' => array(
                        'dropdown'  => esc_html__('Dropdown', 'digicove'),
                        'list' => esc_html__('List', 'digicove')
                    ), 
                    'default' => 'dropdown'
                ),

            )
        )
    ));
}

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Extra Post Type', 'digicove'),
    'icon'       => 'el el-briefcase',
    'fields'     => array(
        array(
            'title' => esc_html__('Portfolio', 'digicove'),
            'type'  => 'section',
            'id' => 'post_portfolio',
            'indent' => true,
        ),
        array(
            'id'       => 'portfolio_display',
            'type'     => 'switch',
            'title'    => esc_html__('Portfolio', 'digicove'),
            'default'  => true
        ),
        array(
            'id'      => 'portfolio_slug',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Slug', 'digicove'),
            'default' => '',
            'desc'     => 'Default: portfolio',
            'required' => array( 0 => 'portfolio_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'id'      => 'portfolio_name',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Name', 'digicove'),
            'default' => '',
            'desc'     => 'Default: Portfolio',
            'required' => array( 0 => 'portfolio_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'id'    => 'archive_portfolio_link',
            'type'  => 'select',
            'title' => esc_html__( 'Custom Archive Page Link', 'digicove' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
            'required' => array( 0 => 'portfolio_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'id'       => 'case_content_top_on',
            'type'     => 'switch',
            'title'    => esc_html__('Show Content Top', 'digicove'),
            'default'  => false,
            'required' => array( 0 => 'portfolio_display', 1 => 'equals', 2 => 'true' ),
        ),
        array(
            'title' => esc_html__('Service', 'digicove'),
            'type'  => 'section',
            'id' => 'post_service',
            'indent' => true,
        ),
        array(
            'id'       => 'service_display',
            'type'     => 'switch',
            'title'    => esc_html__('Service', 'digicove'),
            'default'  => true
        ),
        array(
            'id'      => 'service_slug',
            'type'    => 'text',
            'title'   => esc_html__('Service Slug', 'digicove'),
            'default' => '',
            'desc'     => 'Default: service',
            'required' => array( 0 => 'service_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'id'      => 'service_name',
            'type'    => 'text',
            'title'   => esc_html__('Service Name', 'digicove'),
            'default' => '',
            'desc'     => 'Default: Services',
            'required' => array( 0 => 'service_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'id'    => 'archive_service_link',
            'type'  => 'select',
            'title' => esc_html__( 'Custom Archive Page Link', 'digicove' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
            'required' => array( 0 => 'service_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
    )
));

/*--------------------------------------------------------------
# Typography
--------------------------------------------------------------*/
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Typography', 'digicove'),
    'icon'   => 'el-icon-text-width',
    'fields' => array(
        array(
            'id'          => 'font_body',
            'type'        => 'typography',
            'title'       => esc_html__('Body', 'digicove'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'line-height'  => true,
            'font-size'  => true,
            'text-align'  => false,
            'output'      => array('body'),
            'units'       => 'px',
        ),
        array(
            'id'          => 'font_h1',
            'type'        => 'typography',
            'title'       => esc_html__('Heading 1', 'digicove'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h1'),
            'units'       => 'px',
        ),
        array(
            'id'          => 'font_h2',
            'type'        => 'typography',
            'title'       => esc_html__('Heading 2', 'digicove'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h2'),
            'units'       => 'px',
        ),
        array(
            'id'          => 'font_h3',
            'type'        => 'typography',
            'title'       => esc_html__('Heading 3', 'digicove'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h3'),
            'units'       => 'px',
        ),
        array(
            'id'          => 'font_h4',
            'type'        => 'typography',
            'title'       => esc_html__('Heading 4', 'digicove'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h4'),
            'units'       => 'px',
        ),
        array(
            'id'          => 'font_h5',
            'type'        => 'typography',
            'title'       => esc_html__('Heading 5', 'digicove'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h5'),
            'units'       => 'px',
        ),
        array(
            'id'          => 'font_h6',
            'type'        => 'typography',
            'title'       => esc_html__('Heading 6', 'digicove'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h6'),
            'units'       => 'px',
        ),
    )
));