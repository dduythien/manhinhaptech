<?php

class PxlFancyBox_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_fancy_box';
    protected $title = 'Pxl Fancy Box';
    protected $icon = 'eicon-image';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"section_layout","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"https:\/\/demo.bravisthemes.com\/digicove\/wp-content\/themes\/digicove\/elements\/templates\/pxl_fancy_box\/layout-image\/layout1.jpg"},"2":{"label":"Layout 2","image":"https:\/\/demo.bravisthemes.com\/digicove\/wp-content\/themes\/digicove\/elements\/templates\/pxl_fancy_box\/layout-image\/layout2.jpg"},"3":{"label":"Layout 3","image":"https:\/\/demo.bravisthemes.com\/digicove\/wp-content\/themes\/digicove\/elements\/templates\/pxl_fancy_box\/layout-image\/layout3.jpg"}}}]},{"name":"section_content","label":"Content","tab":"content","controls":[{"name":"style","label":"Style","type":"select","default":"default","condition":{"layout":["1"]},"options":{"default":"Default","style2":"Style2","style3":"Style3","style4":"Style4"}},{"name":"style_hover","label":"Style Hover","type":"select","default":"","condition":{"layout":"2"},"options":{"style-hover-1":"style1(default)"}},{"name":"selected_icon","label":"Icon","type":"icons","default":{"library":"flaticon","value":"flaticon-calling"},"condition":{"layout":["1","2","3"]}},{"name":"title","label":"Title","type":"text","label_block":true},{"name":"desc","label":"Description","type":"textarea","default":"Mauris dignissim lacus purus, sed rhoncus risus facilisis eu. Phasellus ullamcorper","condition":{"layout":["1","2"]}},{"name":"btn_link","label":"Box Link","type":"url","condition":{"layout":["1","2","3","5"]}},{"name":"show_button","label":"Show Button","type":"switcher","default":"false","condition":{"layout":["2","1"]}},{"name":"btn_text","label":"Button Text","type":"text","label_block":true,"condition":{"show_button":"true"}},{"name":"item_active","label":"Item Active","type":"select","options":{"pxl--item-deactive":"No","pxl--item-active":"Yes"},"default":"pxl--item-deactive","condition":{"layout":["1"]}},{"name":"fancy_padding","label":"Padding","type":"dimensions","size_units":["px"],"selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner":"padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"},"control_type":"responsive"},{"name":"wg_max_width","label":"Widget Max Width","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":3000}},"selectors":{"{{WRAPPER}} .pxl-fancy-box":"max-width: {{SIZE}}{{UNIT}};"}}]},{"name":"section_style_title","label":"Title","tab":"style","controls":[{"name":"title_color","label":"Title Color","type":"color","selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner .pxl-item--holder .pxl-item--title":"color: {{VALUE}};","{{WRAPPER}} .pxl-fancy-box .pxl-item--inner .pxl-item--holder .pxl-item--title span":"color: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;"}},{"name":"title_color_hover","label":"Title Color Hover","type":"color","selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner:hover .pxl-item--holder .pxl-item--title":"color: {{VALUE}};","{{WRAPPER}} .pxl-fancy-box .pxl-item--inner:hover .pxl-item--holder .pxl-item--title span":"color: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;"}},{"name":"title_typography","label":"Title Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner .pxl-item--holder .pxl-item--title"},{"name":"title_top_spacer","label":"Title Top Spacer","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":3000}},"selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-item--title":"margin-top: {{SIZE}}{{UNIT}} !important;"}},{"name":"title_bottom_spacer","label":"Title Bottom Spacer","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":300}},"selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-item--title":"margin-bottom: {{SIZE}}{{UNIT}} !important;"}}]},{"name":"section_style_desc","label":"Description","tab":"style","controls":[{"name":"desc_color","label":"Color","type":"color","selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner .pxl-item--holder .pxl-item--desc":"color: {{VALUE}};"}},{"name":"desc_color_hover","label":"Color Hover","type":"color","selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner:hover .pxl-item--holder .pxl-item--desc":"color: {{VALUE}};"}},{"name":"desc_typography","label":"Description Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner .pxl-item--holder .pxl-item--desc"},{"name":"desc_bottom_spacer","label":"Desc Bottom Spacer","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":300}},"selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner .pxl-item--holder .pxl-item--desc":"margin-bottom: {{SIZE}}{{UNIT}} !important;"}}]},{"name":"section_style_btn","label":"Button","tab":"style","controls":[{"name":"btnn_color","label":"Color","type":"color","selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner .pxl-item--holder .btn-arrow":"color: {{VALUE}};"}},{"name":"btnn_color_hover","label":"Color Hover","type":"color","selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner:hover .pxl-item--holder .btn-arrow":"color: {{VALUE}};"}},{"name":"btnn_typography","label":"Description Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner .pxl-item--holder .btn-arrow"},{"name":"btnn_color_icon","label":"Icon Color","type":"color","selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner .pxl-item--holder .btn-arrow svg path":"stroke: {{VALUE}};"}},{"name":"btnn_color_icon_hover","label":"Icon Color Hover","type":"color","selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner:hover .pxl-item--holder .btn-arrow svg path":"stroke: {{VALUE}};"}},{"name":"icon_width_height","label":"Icon width height","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":300}},"selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner .pxl-item--holder .btn-arrow svg":"width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};"}}]},{"name":"section_style_background","label":"Background","tab":"style","controls":[{"name":"background_box_color","label":"Background Box","type":"color","selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner":"background-color: {{VALUE}};"}},{"name":"bg1_gradient","label":"Background Type","type":"background","control_type":"group","types":["gradient"],"condition":{"layout":["1"]},"selector":"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner::before"},{"name":"bg_icon_gradient","label":"Background Type","type":"background","control_type":"group","types":["gradient"],"condition":{"layout":["1"]},"selector":"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner .pxl-fancy-icon::after"},{"name":"bg_box_gradient","label":"Background Type","type":"background","control_type":"group","types":["gradient"],"condition":{"style":["style3"],"layout":["1"]},"selector":"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner::after"},{"name":"fancy_box_icon_shadow","label":"Hover Box Shadow","type":"box-shadow","control_type":"group","condition":{"style":["style3","style4"],"layout":["1"]},"selector":"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner .pxl-fancy-icon::after"},{"name":"background_color","label":"Background Color","type":"color","selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner":"background-color: {{VALUE}};"},"condition":{"layout":["2","3"]}},{"name":"background_color_after","label":"Background Color After","type":"color","selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner:after":"border-color: {{VALUE}};"},"condition":{"layout":["3"]}},{"name":"border_type","label":"Border Type","type":"select","options":{"":"None","solid":"Solid","double":"Double","dotted":"Dotted","dashed":"Dashed","groove":"Groove"},"condition":{"layout":["2"]},"selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner":"border-style: {{VALUE}} !important;"}},{"name":"border_width","label":"Border Width","type":"dimensions","selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner":"border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;"},"condition":{"border_type!":"","layout":["2"]},"responsive":true},{"name":"border_color","label":"Border Color","type":"color","selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner":"border-color: {{VALUE}} !important;"},"condition":{"border_type!":"","layout":["2"]}},{"name":"btn_color","label":"Button Color","type":"color","selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner .btn-arrow svg path":"stroke: {{VALUE}};"},"condition":{"layout":["2"]}},{"name":"btn_color_hover","label":"Button Color Hover","type":"color","selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner:hover .btn-arrow svg path":"stroke: {{VALUE}};"},"condition":{"layout":["2"]}}]},{"name":"section_style_icon","label":"Icon","tab":"style","controls":[{"name":"icon_size","label":"Icon Size","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":300}},"selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner .pxl-fancy-icon i":"font-size: {{SIZE}}{{UNIT}};"}},{"name":"svg_size","label":"Svg Size","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":300}},"selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner .pxl-fancy-icon svg":"width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};"}},{"name":"icon_color","label":"Icon Color","type":"color","selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-item--icon i":"color: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;"},"condition":{"icon_type":"icon"}},{"name":"bg_icon_color","label":"Background Icon Color","type":"color","selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-item--icon ":"background-color: {{VALUE}};"},"condition":{"icon_type":"icon"}},{"name":"icon_color_svg","label":"Icon Color","type":"color","selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-fancy-icon svg path":"fill: {{VALUE}};"},"condition":{"layout":["1","2","3"]}},{"name":"icon_color_svg_hover","label":"Icon Color Hover","type":"color","selectors":{"{{WRAPPER}} .pxl-fancy-box:hover .pxl-fancy-icon svg path":"fill: {{VALUE}};"},"condition":{"layout":["1","2","3"]}},{"name":"icon_color_svg_bg","label":"Icon Color Background Hover","type":"color","selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner:hover .pxl-fancy-icon::after":"background: {{VALUE}};"},"condition":{"layout":["1"]}},{"name":"icon_color_svg-eclip","label":"Icon Color Eclip","type":"color","selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-fancy-icon::after, {{WRAPPER}} .pxl-fancy-box .pxl-fancy-icon::before":"background-color: {{VALUE}};"},"condition":{"layout":["1"]}},{"name":"icon_color_svg-eclip_hover","label":"Icon Color Eclip Hover","type":"color","selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner:hover .pxl-fancy-icon::before":"background-color: {{VALUE}};"},"condition":{"layout":["1"]}},{"name":"bg_icon_color_svg","label":"Background Icon Color","type":"color","selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-fancy-icon":"background-color: {{VALUE}};"},"condition":{"layout":["3"]}},{"name":"icon_img_max_height_icon","label":"Icon Image Max Height","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":300}},"selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-fancy-icon":"min-width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};"},"condition":{"layout":["3"]}},{"name":"icon_font_size","label":"Icon Font Size","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":300}},"selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-item--icon i":"font-size: {{SIZE}}{{UNIT}};"},"condition":{"icon_type":"icon"}},{"name":"icon_img_max_height","label":"Icon Image Max Height","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":300}},"selectors":{"{{WRAPPER}} .pxl-fancy-box .pxl-item--icon img":"max-height: {{SIZE}}{{UNIT}};"},"condition":{"icon_type":"image"}},{"name":"icon_bottom_spacer","label":"Icon Bottom Spacer","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":300}},"condition":{"layout":"2"},"selectors":{"{{WRAPPER}} .pxl-fancy-box2 .pxl-item--inner .pxl-fancy-icon":"margin-bottom: {{SIZE}}{{UNIT}};"}},{"name":"fancy_box_hover_shadow","label":"Hover Box Shadow","type":"box-shadow","control_type":"group","selector":"{{WRAPPER}} .pxl-fancy-box .pxl-item--inner:hover"}]},{"name":"section_animation","label":"Animation","tab":"style","condition":[],"controls":[{"name":"pxl_animate","label":"Case Animate","type":"select","options":{"":"None","wow bounce":"bounce","wow flash":"flash","wow pulse":"pulse","wow rubberBand":"rubberBand","wow shake":"shake","wow swing":"swing","wow tada":"tada","wow wobble":"wobble","wow bounceIn":"bounceIn","wow bounceInDown":"bounceInDown","wow bounceInLeft":"bounceInLeft","wow bounceInRight":"bounceInRight","wow bounceInUp":"bounceInUp","wow bounceOut":"bounceOut","wow bounceOutDown":"bounceOutDown","wow bounceOutLeft":"bounceOutLeft","wow bounceOutRight":"bounceOutRight","wow bounceOutUp":"bounceOutUp","wow fadeIn":"fadeIn","wow fadeInDown":"fadeInDown","wow fadeInDownBig":"fadeInDownBig","wow fadeInLeft":"fadeInLeft","wow fadeInLeftBig":"fadeInLeftBig","wow fadeInRight":"fadeInRight","wow fadeInRightBig":"fadeInRightBig","wow fadeInUp":"fadeInUp","wow fadeInUpBig":"fadeInUpBig","wow fadeOut":"fadeOut","wow fadeOutDown":"fadeOutDown","wow fadeOutDownBig":"fadeOutDownBig","wow fadeOutLeft":"fadeOutLeft","wow fadeOutLeftBig":"fadeOutLeftBig","wow fadeOutRight":"fadeOutRight","wow fadeOutRightBig":"fadeOutRightBig","wow fadeOutUp":"fadeOutUp","wow fadeOutUpBig":"fadeOutUpBig","wow flip":"flip","wow flipInX":"flipInX","wow flipInY":"flipInY","wow flipOutX":"flipOutX","wow flipOutY":"flipOutY","wow lightSpeedIn":"lightSpeedIn","wow lightSpeedOut":"lightSpeedOut","wow rotateIn":"rotateIn","wow rotateInDownLeft":"rotateInDownLeft","wow rotateInDownRight":"rotateInDownRight","wow rotateInUpLeft":"rotateInUpLeft","wow rotateInUpRight":"rotateInUpRight","wow rotateOut":"rotateOut","wow rotateOutDownLeft":"rotateOutDownLeft","wow rotateOutDownRight":"rotateOutDownRight","wow rotateOutUpLeft":"rotateOutUpLeft","wow rotateOutUpRight":"rotateOutUpRight","wow hinge":"hinge","wow rollIn":"rollIn","wow rollOut":"rollOut","wow zoomIn":"zoomIn","wow zoomInDown":"zoomInDown","wow zoomInLeft":"zoomInLeft","wow zoomInRight":"zoomInRight","wow zoomInUp":"zoomInUp","wow zoomOut":"zoomOut","wow zoomOutDown":"zoomOutDown","wow zoomOutLeft":"zoomOutLeft","wow zoomOutRight":"zoomOutRight","wow zoomOutUp":"zoomOutUp"},"default":""},{"name":"pxl_animate_delay","label":"Animate Delay","type":"text","default":"0","description":"Enter number. Default 0ms"}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}