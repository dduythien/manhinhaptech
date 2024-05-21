<?php
/**
 * Theme functions: init, enqueue scripts and styles, include required files and widgets.
 *
 * @package Bravisthemes
 * @since Digicove 1.0
 */
if( !defined('THEME_DEV_MODE_ELEMENTS') && is_user_logged_in()){
    define('THEME_DEV_MODE_ELEMENTS', true);
}
if(!defined('DEV_MODE')){define('DEV_MODE', true);}
require_once get_template_directory() . '/inc/classes/class-main.php';

if ( is_admin() ){ 
	require_once get_template_directory() . '/inc/admin/admin-init.php'; 
}
/**
 * Theme Require
*/
digicove()->require_folder('inc');
digicove()->require_folder('inc/classes');
digicove()->require_folder('inc/theme-options');
digicove()->require_folder('template-parts/widgets');
if(class_exists('Woocommerce')){
    digicove()->require_folder('woocommerce');
}
 