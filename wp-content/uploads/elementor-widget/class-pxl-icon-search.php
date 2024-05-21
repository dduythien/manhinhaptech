<?php

class PxlIconSearch_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_icon_search';
    protected $title = 'Search PXL';
    protected $icon = 'eicon-search';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"source_section","label":"Source Settings","tab":"content","controls":[{"name":"style","label":"Style","type":"select","default":"style1","options":{"style1":"Style 1 (Popup)","style2":"Style 2 (Form)","style3":"Style 3 (Form)"}},{"name":"text_placeholder","label":"Text Placeholder","type":"text","condition":{"style":["style2","style3"]}},{"name":"text_button","label":"Text Button","type":"text","condition":{"style":"style3"}},{"name":"quick_search","label":"Quick Search","type":"repeater","controls":[{"name":"content","label":"Content","type":"text","label_block":true}],"title_field":"{{{ content }}}","condition":{"style":"style3"}},{"name":"icon_color","label":"Icon Color","type":"color","selectors":{"{{WRAPPER}} .pxl-search-popup-button i":"color: {{VALUE}};"}},{"name":"icon_color_hover","label":"Icon Color Hover","type":"color","selectors":{"{{WRAPPER}} .pxl-search-popup-button:hover i":"color: {{VALUE}};"}},{"name":"post_type","label":"Search Post Type","type":"select","default":"","options":{"":"All","page":"Page","post":"Post","lp_course":"Course","portfolio":"Portfolio","product":"Product"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}