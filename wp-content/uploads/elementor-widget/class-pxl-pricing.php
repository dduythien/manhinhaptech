<?php

class PxlPricing_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_pricing';
    protected $title = 'Pricing BR';
    protected $icon = 'eicon-settings';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"section_layout","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"https:\/\/demo.bravisthemes.com\/digicove\/wp-content\/themes\/digicove\/elements\/templates\/pxl_pricing\/img-layout\/layout1.jpg"},"2":{"label":"Layout 2","image":"https:\/\/demo.bravisthemes.com\/digicove\/wp-content\/themes\/digicove\/elements\/templates\/pxl_pricing\/img-layout\/layout2.jpg"}}}]},{"name":"section_content","label":"Content","tab":"content","controls":[{"name":"style","label":"Style","type":"select","default":"default","condition":{"layout":["1"]},"options":{"default":"Default","style2":"Style2"}},{"name":"title","label":"Title","type":"text","label_block":true},{"name":"sub_title","label":"Sub Title","type":"text","label_block":true,"condition":{"layout":["2"]}},{"name":"price","label":"Price","type":"text"},{"name":"pric_after","label":"Price After","type":"text"},{"name":"pric_day","label":"Price Day","type":"text"},{"name":"currency","label":"Currency unit","type":"text"},{"name":"feature","label":"Feature","type":"repeater","controls":[{"name":"feature_text","label":"Text","type":"text","label_block":true},{"name":"active","label":"Active","type":"select","options":{"non-active":"No","is-active":"Yes"},"default":"is-active"}],"title_field":"{{{ feature_text }}}"},{"name":"box_active","label":"Active","type":"select","options":{"no-active":"No","is-active":"Yes"},"default":"no-active"},{"name":"btn_text","label":"Button Text","type":"text","label_block":true,"default":"Get started"},{"name":"btn_link","label":"Button Link","type":"url"}]},{"name":"section_garena_style","label":"Garena Style","tab":"style","controls":[{"name":"box-height","label":"Box Height","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":1000}},"selectors":{"{{WRAPPER}} .pxl-pricing":"min-height: {{SIZE}}{{UNIT}};"}},{"name":"box_padding","label":"Box Padding","type":"dimensions","size_units":["px"],"selectors":{"{{WRAPPER}} .pxl-pricing":"padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"},"control_type":"responsive"},{"name":"box_border_radius","label":"Border Radius","type":"dimensions","size_units":["px"],"selectors":{"{{WRAPPER}} .pxl-pricing":"border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"}},{"name":"border_type","label":"Border Type","type":"select","options":{"":"None","solid":"Solid","double":"Double","dotted":"Dotted","dashed":"Dashed","groove":"Groove"},"selectors":{"{{WRAPPER}} .pxl-pricing1.style2.is-active,{{WRAPPER}} .pxl-pricing1.style2.no-active":"border-style: {{VALUE}} !important;"}},{"name":"border_width","label":"Border Width","type":"dimensions","selectors":{"{{WRAPPER}} .pxl-pricing1.style2.is-active,{{WRAPPER}} .pxl-pricing1.style2.no-active":"border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;"},"condition":{"border_type!":""},"responsive":true},{"name":"border_color","label":"Border Color","type":"color","selectors":{"{{WRAPPER}} .pxl-pricing1.style2.is-active,{{WRAPPER}} .pxl-pricing1.style2.no-active":"border-color: {{VALUE}} !important;"},"condition":{"border_type!":""}},{"name":"box_gradient","label":"Background Type","type":"background","control_type":"group","types":["gradient"],"selector":"{{WRAPPER}} .pxl-pricing1.style2.is-active,{{WRAPPER}} .pxl-pricing1.style2.no-active"}]},{"name":"section_title_style","label":"Title Style","tab":"style","controls":[{"name":"title_color","label":"Title Color","type":"color","selectors":{"{{WRAPPER}} .pxl-pricing .pxl-title, {{WRAPPER}} .pxl-pricing .pxl-title span":"color: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;"}},{"name":"title_typography","label":"Title Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-pricing .pxl-title"},{"name":"bg_gradient","label":"Background Type","type":"background","control_type":"group","types":["gradient"],"selector":"{{WRAPPER}} .pxl-title::after"}]},{"name":"section_feature_style","label":"List Infor Style","tab":"style","controls":[{"name":"feature_color","label":"Feature Color","type":"color","selectors":{"{{WRAPPER}} .pxl-pricing .pxl-feature div":"color: {{VALUE}};"}},{"name":"feature_typography","label":"Feature Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-pricing .pxl-feature div"},{"name":"icon_color","label":"Icon Color","type":"color","selectors":{"{{WRAPPER}} .pxl-pricing .pxl-feature div::before":"color: {{VALUE}};"}},{"name":"title_number_color","label":"Price After Color","type":"color","selectors":{"{{WRAPPER}} .pxl-pricing .pxl-meta .pxl-after":"color: {{VALUE}};"}},{"name":"price_after_typography","label":"Price After Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-pricing .pxl-meta .pxl-after"},{"name":"icon_gradient","label":"Background Type","type":"background","control_type":"group","types":["gradient"],"selector":"{{WRAPPER}} .pxl-pricing .pxl-feature div::before"}]},{"name":"section_price_style","label":"Price Style","tab":"style","controls":[{"name":"currency_color","label":"Currency Color","type":"color","selectors":{"{{WRAPPER}} .pxl-pricing .pxl-currency":"color: {{VALUE}};"}},{"name":"currency_typography","label":"Currency Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-pricing .pxl-currency"},{"name":"value_color","label":"Value Color","type":"color","selectors":{"{{WRAPPER}} .pxl-pricing .pxl-value":"color: {{VALUE}};"}},{"name":"value_typography","label":"Value Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-pricing .pxl-value"},{"name":"suffix_color","label":"Suffix Color","type":"color","selectors":{"{{WRAPPER}} .pxl-pricing .pxl-suffix":"color: {{VALUE}};"}},{"name":"suffix_typography","label":"Suffix Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-pricing .pxl-suffix"},{"name":"value_color_mark","label":"value Mark color","type":"color","selectors":{"{{wrapper}} .pxl-pricing .pxl-dup-value":"color: {{value}};"}},{"name":"value_mask_typography","label":"value mask typography","type":"typography","control_type":"group","selector":"{{wrapper}} .pxl-pricing .pxl-dup-value"},{"name":"price_gradient","label":"background type","type":"background","control_type":"group","types":["gradient"],"selector":"{{wrapper}} .pxl-pricing.pxl-pricing2 .pxl-meta .pxl-price span"}]},{"name":"section_button_style","label":"Button Style","tab":"style","controls":[{"name":"btn_space_left","label":"Button Spacer Left","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":300}},"selectors":{"{{WRAPPER}} .pxl-pricing .btn":"left: {{SIZE}}{{UNIT}};"}},{"name":"btn_gradient","label":"Background Type","type":"background","control_type":"group","types":["gradient"],"selector":"{{WRAPPER}} .pxl-pricing .btn"}]},{"name":"section_animation","label":"Animation","tab":"style","condition":[],"controls":[{"name":"pxl_animate","label":"Case Animate","type":"select","options":{"":"None","wow bounce":"bounce","wow flash":"flash","wow pulse":"pulse","wow rubberBand":"rubberBand","wow shake":"shake","wow swing":"swing","wow tada":"tada","wow wobble":"wobble","wow bounceIn":"bounceIn","wow bounceInDown":"bounceInDown","wow bounceInLeft":"bounceInLeft","wow bounceInRight":"bounceInRight","wow bounceInUp":"bounceInUp","wow bounceOut":"bounceOut","wow bounceOutDown":"bounceOutDown","wow bounceOutLeft":"bounceOutLeft","wow bounceOutRight":"bounceOutRight","wow bounceOutUp":"bounceOutUp","wow fadeIn":"fadeIn","wow fadeInDown":"fadeInDown","wow fadeInDownBig":"fadeInDownBig","wow fadeInLeft":"fadeInLeft","wow fadeInLeftBig":"fadeInLeftBig","wow fadeInRight":"fadeInRight","wow fadeInRightBig":"fadeInRightBig","wow fadeInUp":"fadeInUp","wow fadeInUpBig":"fadeInUpBig","wow fadeOut":"fadeOut","wow fadeOutDown":"fadeOutDown","wow fadeOutDownBig":"fadeOutDownBig","wow fadeOutLeft":"fadeOutLeft","wow fadeOutLeftBig":"fadeOutLeftBig","wow fadeOutRight":"fadeOutRight","wow fadeOutRightBig":"fadeOutRightBig","wow fadeOutUp":"fadeOutUp","wow fadeOutUpBig":"fadeOutUpBig","wow flip":"flip","wow flipInX":"flipInX","wow flipInY":"flipInY","wow flipOutX":"flipOutX","wow flipOutY":"flipOutY","wow lightSpeedIn":"lightSpeedIn","wow lightSpeedOut":"lightSpeedOut","wow rotateIn":"rotateIn","wow rotateInDownLeft":"rotateInDownLeft","wow rotateInDownRight":"rotateInDownRight","wow rotateInUpLeft":"rotateInUpLeft","wow rotateInUpRight":"rotateInUpRight","wow rotateOut":"rotateOut","wow rotateOutDownLeft":"rotateOutDownLeft","wow rotateOutDownRight":"rotateOutDownRight","wow rotateOutUpLeft":"rotateOutUpLeft","wow rotateOutUpRight":"rotateOutUpRight","wow hinge":"hinge","wow rollIn":"rollIn","wow rollOut":"rollOut","wow zoomIn":"zoomIn","wow zoomInDown":"zoomInDown","wow zoomInLeft":"zoomInLeft","wow zoomInRight":"zoomInRight","wow zoomInUp":"zoomInUp","wow zoomOut":"zoomOut","wow zoomOutDown":"zoomOutDown","wow zoomOutLeft":"zoomOutLeft","wow zoomOutRight":"zoomOutRight","wow zoomOutUp":"zoomOutUp"},"default":""},{"name":"pxl_animate_delay","label":"Animate Delay","type":"text","default":"0","description":"Enter number. Default 0ms"}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}