<?php
/**
* The Digicove_Admin_Dashboard base class
*/

if( !defined( 'ABSPATH' ) )
	exit; 

class Digicove_Admin_Dashboard extends Digicove_Admin_Page {
	protected $page_title = null;
	protected $menu_title = null;
	public $position = null;
	public function __construct() {
		$this->id = 'pxlart';
		$this->page_title = digicove()->get_name();
		$this->menu_title = digicove()->get_name();
		$this->position = '50';

		parent::__construct();
	}

	public function display() {
		include_once( get_template_directory() . '/inc/admin/views/admin-dashboard.php' );
	}
	
	public function save() {

	}
}
new Digicove_Admin_Dashboard;
