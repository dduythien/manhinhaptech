<?php

if( !defined( 'ABSPATH' ) )
	exit; 

class Digicove_Admin_Templates extends Digicove_Base{

	public function __construct() {
		$this->add_action( 'admin_menu', 'register_page', 20 );
	}
 
	public function register_page() {
		add_submenu_page(
			'pxlart',
		    esc_html__( 'Templates', 'digicove' ),
		    esc_html__( 'Templates', 'digicove' ),
		    'manage_options',
		    'edit.php?post_type=pxl-template',
		    false
		);
	}
}
new Digicove_Admin_Templates;
