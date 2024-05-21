<?php

class PxlIconHiddenPanel_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_icon_hidden_panel';
    protected $title = 'Hidden Panel Pxl';
    protected $icon = 'eicon-menu-bar';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"section_content","label":"Content","tab":"content","controls":[{"name":"content_template","label":"Select Template","type":"select","options":{"0":"None","3871":"Hidden Sidebar"},"default":"df","description":"Add new tab template: \"<a href=\"https:\/\/demo.bravisthemes.com\/digicove\/wp-admin\/edit.php?post_type=pxl-template\" target=\"_blank\">Click Here<\/a>\""},{"name":"icon_color","label":"Icon Color","type":"color","selectors":{"{{WRAPPER}} .pxl-hidden-panel-button .pxl-icon-line, {{WRAPPER}} .pxl-hidden-panel-button .pxl-icon-line":"background-color: {{VALUE}};"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}