<?php

class PxlArrowCarousel_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_arrow_carousel';
    protected $title = 'Pxl Nav Carousel';
    protected $icon = 'eicon-animation';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"content_alignment_section","label":"Content Alignment","tab":"content","controls":[{"name":"style","label":"Style","type":"select","options":{"style1":"Style 1"},"default":"style1"}]},{"name":"section_style_icon","label":"Icon","tab":"style","controls":[{"name":"icon_color","label":"Color","type":"color","selectors":{"{{WRAPPER}} .pxl-navigation-carousel .pxl-navigation-arrow svg path":"fill: {{VALUE}};"}},{"name":"icon_background","label":"Background","type":"color","selectors":{"{{WRAPPER}} .pxl-navigation-carousel .pxl-navigation-arrow":"background-color: {{VALUE}};"}},{"name":"icon_color_hover","label":"Color Hover","type":"color","selectors":{"{{WRAPPER}} .pxl-navigation-carousel .pxl-navigation-arrow:hover svg path":"fill: {{VALUE}};"}},{"name":"icon_background_hover","label":"Background Hover","type":"color","selectors":{"{{WRAPPER}} .pxl-navigation-carousel .pxl-navigation-arrow:hover":"background-color: {{VALUE}};"}},{"name":"btn_box_shadow","label":"Box Shadow","type":"box-shadow","control_type":"group","selector":"{{WRAPPER}} .pxl-navigation-carousel .pxl-navigation-arrow:hover"},{"name":"border_type","label":"Border Type","type":"select","options":{"":"None","solid":"Solid","double":"Double","dotted":"Dotted","dashed":"Dashed","groove":"Groove"},"selectors":{"{{WRAPPER}} .pxl-navigation-carousel .pxl-navigation-arrow":"border-style: {{VALUE}} !important;"}},{"name":"border_width","label":"Border Width","type":"dimensions","selectors":{"{{WRAPPER}} .pxl-navigation-carousel .pxl-navigation-arrow":"border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;"},"condition":{"border_type!":""},"responsive":true},{"name":"border_color","label":"Border Color","type":"color","selectors":{"{{WRAPPER}} .pxl-navigation-carousel .pxl-navigation-arrow":"border-color: {{VALUE}} !important;"},"condition":{"border_type!":""}},{"name":"icon_size","label":"Icon width\/height","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":300}},"selectors":{"{{WRAPPER}} .pxl-navigation-carousel .pxl-navigation-arrow":"width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};"}},{"name":"icon_font_size","label":"Font Size","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":300}},"selectors":{"{{WRAPPER}} .pxl-navigation-carousel .pxl-navigation-arrow svg":"width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};"}},{"name":"icon_space_left","label":"Icon Spacer","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":300}},"default":{"size":10},"selectors":{"{{WRAPPER}} .pxl-navigation-carousel .pxl-navigation-arrow-prev":"margin-right: {{SIZE}}{{UNIT}};"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}