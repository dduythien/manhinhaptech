<?php
/**
 * Filters hook for the theme
 *
 * @package Bravisthemes
 */

add_filter( 'pxl_server_info', 'digicove_add_server_info');
function digicove_add_server_info($infos){
  $infos = [
    'api_url' => 'https://api.bravisthemes.com/',
    'docs_url' => 'https://doc.bravisthemes.com/digicove/',
    'plugin_url' => 'https://api.bravisthemes.com/plugins/',
    'demo_url' => 'https://demo.bravisthemes.com/digicove/',
    'support_url' => 'https://bravisthemes.ticksy.com/',
    'help_url' => 'https://doc.bravisthemes.com/',
    'email_support' => '',
    'video_url' => '#'
];

return $infos;
}

/* Custom Classs - Body */
function digicove_body_classes( $classes ) {   
    $enable_cursor          = digicove()->get_opt('enable_cursor', '0');
    $cursor_style           = digicove()->get_opt('cursor_style', 'df');

    if (class_exists('ReduxFramework')) {
        $classes[] = ' pxl-redux-page';
    }
    if($enable_cursor == '1'){
        $classes[] = 'enable-cursor';
    }
    if($cursor_style != 'df'){
        $classes[] = 'cursor-'.$cursor_style;
    }
    $footer_fixed = digicove()->get_theme_opt('footer_fixed');
    if(isset($footer_fixed) && $footer_fixed) {
        $classes[] = ' pxl-footer-fixed';
    }

    return $classes;
}
add_filter( 'body_class', 'digicove_body_classes' );

/* Post Type Support Elementor*/
add_filter( 'pxl_add_cpt_support', 'digicove_add_cpt_support' );
function digicove_add_cpt_support($cpt_support) { 
	$cpt_support[] = 'service';
	$cpt_support[] = 'pxl-slider';
    return $cpt_support;
}

add_filter( 'pxl_support_default_cpt', 'digicove_support_default_cpt' );
function digicove_support_default_cpt($postypes){
	return $postypes; // pxl-template
}

add_filter( 'pxl_extra_post_types', 'digicove_add_posttype' );
function digicove_add_posttype( $postypes ) {
    $portfolio_display = digicove()->get_theme_opt('portfolio_display', true);
    $portfolio_slug = digicove()->get_theme_opt('portfolio_slug', 'case');
    $portfolio_name = digicove()->get_theme_opt('portfolio_name', 'Portfolio');
    $service_display = digicove()->get_theme_opt('service_display', true);
    $service_slug = digicove()->get_theme_opt('service_slug', 'service');
    $service_name = digicove()->get_theme_opt('service_name', 'Services');
    if($portfolio_display) {
        $portfolio_status = true;
    } else {
        $portfolio_status = false;
    }
    if($service_display) {
        $service_status = true;
    } else {
        $service_status = false;
    }
    
    $postypes['case'] = array(
        'status' => $portfolio_status,
        'item_name'  => $portfolio_name,
        'items_name' => $portfolio_name,
        'args'       => array(
            'rewrite'             => array(
                'slug'       => $portfolio_slug,
            ),
        ),
    );

    $postypes['service'] = array(
        'status' => $service_status,
        'item_name'  => $service_name,
        'items_name' => $service_name,
        'args'       => array(
            'rewrite'             => array(
                'slug'       => $service_slug,
            ),
        ),
    );

    $postypes['pxl-slider'] = [
        'status'     => true,
        'item_name'  => esc_html__('Slider Builder', 'digicove'),
        'items_name' => esc_html__('Slider Builder', 'digicove'),
        'args'       => array(
            'supports'           => array(
                'title',
                'editor',
            ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_in_nav_menus'   => false
        ),
        'labels'     => array()
    ]; 
    return $postypes;
}

add_filter( 'pxl_extra_taxonomies', 'digicove_add_tax' );
function digicove_add_tax( $taxonomies ) {
	$taxonomies['case-category'] = array(
		'status'     => true,
		'post_type'  => array( 'case' ),
		'taxonomy'   => 'Case Categories',
		'taxonomies' => 'Case Categories',
		'args'       => array(
			'rewrite'             => array(
                'slug'       => 'case-category'
            ),
		),
		'labels'     => array()
	);
	
	$taxonomies['service-category'] = array(
		'status'     => true,
		'post_type'  => array( 'service' ),
		'taxonomy'   => 'Service Categories',
		'taxonomies' => 'Service Categories',
		'args'       => array(
			'rewrite'             => array(
                'slug'       => 'service-category'
            ),
		),
		'labels'     => array()
	);
	
	return $taxonomies;
}

add_filter( 'pxl_theme_builder_post_types', 'digicove_theme_builder_post_type' );
function digicove_theme_builder_post_type($postypes){
	//default are header, footer, mega-menu
	$postypes[] = 'pxl-slider';
	return $postypes;
}

add_filter( 'pxl_theme_builder_layout_ids', 'digicove_theme_builder_layout_id' );
function digicove_theme_builder_layout_id($layout_ids){
	//default [], 
	$header_layout        = (int)digicove()->get_opt('header_layout');
	$header_sticky_layout = (int)digicove()->get_opt('header_sticky_layout');
    $footer_layout        = (int)digicove()->get_opt('footer_layout');
    $ptitle_layout        = (int)digicove()->get_opt('ptitle_layout');
    if( $header_layout > 0) 
      $layout_ids[] = $header_layout;
  if( $header_sticky_layout > 0) 
      $layout_ids[] = $header_sticky_layout;
  if( $footer_layout > 0) 
      $layout_ids[] = $footer_layout;
  if( $ptitle_layout > 0) 
      $layout_ids[] = $ptitle_layout;

  return $layout_ids;
}

add_filter( 'pxl_wg_get_source_id_builder', 'digicove_wg_get_source_builder' );
function digicove_wg_get_source_builder($wg_datas){
  $wg_datas['tabs'] = ['control_name' => 'tabs', 'source_name' => 'content_template'];
  return $wg_datas;
}

/* Custom Archive Post Type Link */
function digicove_custom_archive_service_link() {
    if( is_post_type_archive( 'service' ) ) {
        $archive_service_link = digicove()->get_theme_opt('archive_service_link');
        wp_redirect( get_permalink($archive_service_link), 301 );
        exit();
    }
}
add_action( 'template_redirect', 'digicove_custom_archive_service_link' );

function digicove_custom_archive_portfolio_link() {
    if( is_post_type_archive( 'case' ) ) {
        $archive_portfolio_link = digicove()->get_theme_opt('archive_portfolio_link');
        wp_redirect( get_permalink($archive_portfolio_link), 301 );
        exit();
    }
}
add_action( 'template_redirect', 'digicove_custom_archive_portfolio_link' );

add_filter( 'pxl_template_type_support', 'digicove_template_type_support' );
function digicove_template_type_support($type){
	//default ['header','footer','mega-menu']
	$extra_type = [
        'page-title'   => esc_html__('Page Title', 'digicove'), 
        'hidden-panel' => esc_html__('Hidden Panel', 'digicove'), 
        'tab'          => esc_html__('Tab', 'digicove'), 
    ];
    $template_type = array_merge($type,$extra_type); 
    return $template_type;
}


add_filter( 'get_the_archive_title', 'digicove_archive_title_remove_label' );
function digicove_archive_title_remove_label( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = get_the_author();
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	} elseif ( is_home() ) {
		$title = single_post_title( '', false );
	}

	return $title;
}

add_filter( 'comment_reply_link', 'digicove_comment_reply_text' );
function digicove_comment_reply_text( $link ) {
	$link = str_replace( 'Reply', ''.esc_attr__('Reply', 'digicove').'', $link );
	return $link;
}

add_filter( 'pxl_enable_megamenu', 'digicove_enable_megamenu' );
function digicove_enable_megamenu() {
	return true;
}
add_filter( 'pxl_enable_onepage', 'digicove_enable_onepage' );
function digicove_enable_onepage() {
	return true;
}

add_filter( 'pxl_support_awesome_pro', 'digicove_support_awesome_pro' );
function digicove_support_awesome_pro() {
	return true;
}

add_filter( 'redux_pxl_iconpicker_field/get_icons', 'digicove_add_icons_to_pxl_iconpicker_field' );
function digicove_add_icons_to_pxl_iconpicker_field($icons){
	$custom_icons = []; //'Flaticon' => array(array('flaticon-marker' => 'flaticon-marker')),
	$icons = array_merge($custom_icons, $icons);
	return $icons;
}


add_filter("pxl_mega_menu/get_icons", "digicove_add_icons_to_megamenu");
function digicove_add_icons_to_megamenu($icons){
	$custom_icons = []; //'Flaticon' => array(array('flaticon-marker' => 'flaticon-marker')),
	$icons = array_merge($custom_icons, $icons);
	return $icons;
}


/**
 * Move comment field to bottom
 */
add_filter( 'comment_form_fields', 'digicove_comment_field_to_bottom' );
function digicove_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}


/* ------Disable Lazy loading---- */
add_filter( 'wp_lazy_loading_enabled', '__return_false' );

/**
 * User custom fields.
 */
add_action( 'show_user_profile', 'digicove_user_fields' );
add_action( 'edit_user_profile', 'digicove_user_fields' );
function digicove_user_fields($user){

    $user_facebook = get_user_meta($user->ID, 'user_facebook', true);
    $user_whatsapp = get_user_meta($user->ID, 'user_whatsapp', true);
    $user_twitter = get_user_meta($user->ID, 'user_twitter', true);
    $user_linkedin = get_user_meta($user->ID, 'user_linkedin', true);
    $user_skype = get_user_meta($user->ID, 'user_skype', true);
    $user_youtube = get_user_meta($user->ID, 'user_youtube', true);
    $user_vimeo = get_user_meta($user->ID, 'user_vimeo', true);
    $user_tumblr = get_user_meta($user->ID, 'user_tumblr', true);
    $user_pinterest = get_user_meta($user->ID, 'user_pinterest', true);
    $user_instagram = get_user_meta($user->ID, 'user_instagram', true);
    $user_yelp = get_user_meta($user->ID, 'user_yelp', true);

    ?>
    <h3><?php esc_html_e('Social', 'digicove'); ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="user_facebook"><?php esc_html_e('Facebook', 'digicove'); ?></label></th>
            <td>
                <input id="user_facebook" name="user_facebook" type="text" value="<?php echo esc_attr(isset($user_facebook) ? $user_facebook : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_twitter"><?php esc_html_e('Twitter', 'digicove'); ?></label></th>
            <td>
                <input id="user_twitter" name="user_twitter" type="text" value="<?php echo esc_attr(isset($user_twitter) ? $user_twitter : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_whatsapp"><?php esc_html_e('Whatsapp', 'digicove'); ?></label></th>
            <td>
                <input id="user_whatsapp" name="user_whatsapp" type="text" value="<?php echo esc_attr(isset($user_whatsapp) ? $user_whatsapp : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_linkedin"><?php esc_html_e('Linkedin', 'digicove'); ?></label></th>
            <td>
                <input id="user_linkedin" name="user_linkedin" type="text" value="<?php echo esc_attr(isset($user_linkedin) ? $user_linkedin : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_skype"><?php esc_html_e('Skype', 'digicove'); ?></label></th>
            <td>
                <input id="user_skype" name="user_skype" type="text" value="<?php echo esc_attr(isset($user_skype) ? $user_skype : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_youtube"><?php esc_html_e('Youtube', 'digicove'); ?></label></th>
            <td>
                <input id="user_youtube" name="user_youtube" type="text" value="<?php echo esc_attr(isset($user_youtube) ? $user_youtube : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_vimeo"><?php esc_html_e('Vimeo', 'digicove'); ?></label></th>
            <td>
                <input id="user_vimeo" name="user_vimeo" type="text" value="<?php echo esc_attr(isset($user_vimeo) ? $user_vimeo : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_tumblr"><?php esc_html_e('Tumblr', 'digicove'); ?></label></th>
            <td>
                <input id="user_tumblr" name="user_tumblr" type="text" value="<?php echo esc_attr(isset($user_tumblr) ? $user_tumblr : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_pinterest"><?php esc_html_e('Pinterest', 'digicove'); ?></label></th>
            <td>
                <input id="user_pinterest" name="user_pinterest" type="text" value="<?php echo esc_attr(isset($user_pinterest) ? $user_pinterest : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_instagram"><?php esc_html_e('Instagram', 'digicove'); ?></label></th>
            <td>
                <input id="user_instagram" name="user_instagram" type="text" value="<?php echo esc_attr(isset($user_instagram) ? $user_instagram : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_yelp"><?php esc_html_e('Yelp', 'digicove'); ?></label></th>
            <td>
                <input id="user_yelp" name="user_yelp" type="text" value="<?php echo esc_attr(isset($user_yelp) ? $user_yelp : ''); ?>" />
            </td>
        </tr>
    </table>
    <?php
}
