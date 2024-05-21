<?php

class PxlHeading_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_heading';
    protected $title = 'Heading Pxl';
    protected $icon = 'eicon-heading';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"section_content","label":"Content","tab":"content","controls":[{"name":"source_type","label":"Source Type","type":"select","options":{"text":"Text","title":"Page Title"},"default":"text"},{"name":"title","label":"Title","type":"textarea","label_block":true,"description":"Create highlight text width shortcode: [highlight text=\"Text Demo\"]","condition":{"source_type":["text"]}},{"name":"highlight_color_text","label":"Highlight Color","type":"color","selectors":{"{{WRAPPER}} .pxl-heading .pxl-item--title .pxl-title--highlight":"color: {{VALUE}};"}},{"name":"highlight_color_gradient","label":"Highlight Color Gradient","type":"color","selectors":{"{{WRAPPER}} .pxl-heading .pxl-item--title .pxl-title--highlight":"background: -webkit-linear-gradient(90deg, var(--primary-color) 0%, {{VALUE}} 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;"}},{"name":"highlight_color_text_typography","label":"Highlight Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-heading .pxl-item--title .pxl-title--highlight"},{"name":"title_absolute_check","label":"Title Number","type":"switcher","default":"false"},{"name":"title_absolute","label":"Title Number","type":"textarea","label_block":true,"condition":{"source_type":["text"],"title_absolute_check":"true"}},{"name":"sub_title","label":"Sub Title","type":"textarea","label_block":true},{"name":"align","label":"Alignment","type":"choose","control_type":"responsive","options":{"left":{"title":"Left","icon":"eicon-text-align-left"},"center":{"title":"Center","icon":"eicon-text-align-center"},"right":{"title":"Right","icon":"eicon-text-align-right"},"justify":{"title":"Justified","icon":"eicon-text-align-justify"}},"selectors":{"{{WRAPPER}} .pxl-heading":"text-align: {{VALUE}};"}},{"name":"h_width","label":"Max Width","type":"slider","control_type":"responsive","size_units":["px","%"],"range":{"px":{"min":0,"max":3000}},"selectors":{"{{WRAPPER}} .pxl-heading .pxl-heading--inner":"max-width: {{SIZE}}{{UNIT}};"}}]},{"name":"section_style_title","label":"Title","tab":"style","controls":[{"name":"title_tag","label":"HTML Tag","type":"select","options":{"h1":"H1","h2":"H2","h3":"H3","h4":"H4","h5":"H5","h6":"H6","div":"div","span":"span","p":"p"},"default":"h3"},{"name":"title_split_text_anm","label":"Split Text Animation","type":"select","options":{"":"None","split-in-fade":"In Fade","split-in-right":"In Right","split-in-left":"In Left","split-in-up":"In Up","split-in-down":"In Down","split-in-rotate":"In Rotate","split-in-scale":"In Scale"},"default":""},{"name":"title_gradient","label":"Title Gradient","type":"switcher","default":"false"},{"name":"title_color_gradient","label":"Title Color Gradient","type":"color","selectors":{"{{WRAPPER}} .pxl-heading .pxl-item--title":"background: -webkit-linear-gradient(90deg, var(--primary-color) 0%, {{VALUE}} 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;"},"condition":{"title_gradient":"true"}},{"name":"title_color","label":"Title Color","type":"color","selectors":{"{{WRAPPER}} .pxl-heading .pxl-item--title":"color: {{VALUE}};"}},{"name":"title_typography","label":"Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-heading .pxl-item--title"},{"name":"title_box_shadow","label":"Title Shadow","type":"text-shadow","control_type":"group","selector":"{{WRAPPER}} .pxl-heading .pxl-item--title"},{"name":"title_space_bottom","label":"Bottom Spacer","type":"slider","control_type":"responsive","size_units":["px"],"default":{"size":0},"range":{"px":{"min":0,"max":300}},"selectors":{"{{WRAPPER}} .pxl-heading .pxl-item--title":"margin-bottom: {{SIZE}}{{UNIT}};"},"separator":"after"},{"name":"divider","label":"Divider Position","type":"select","options":{"divider-none":"None","divider-left":"Top","divider-right":"Bottom"},"default":"divider-none"},{"name":"align_divider","label":"Alignment","type":"choose","control_type":"responsive","options":{"0":{"title":"Left","icon":"eicon-text-align-left"},"50%":{"title":"Center","icon":"eicon-text-align-center"}},"selectors":{"{{WRAPPER}} .pxl-heading .pxl-item--title:after":"left: {{VALUE}};transform: translateX(-50%);"}},{"name":"divider_color","label":"Divider Color","type":"color","selectors":{"{{WRAPPER}} .pxl-heading .pxl-item--title:before":"background-color: {{VALUE}};"},"condition":{"style":["divider-left","divider-right"]}},{"name":"pxl_animate","label":"Case Animate","type":"select","options":{"":"None","wow letter":"Letter","pxl-split-text split-in-fade":"Split in fade","pxl-split-text split-in-right":"Split in right","pxl-split-text split-in-left":"Split in left","pxl-split-text split-in-up":"Split in up","pxl-split-text split-in-down":"Split in down","pxl-split-text split-in-rotate":"Split in rotate","pxl-split-text split-in-scale":"Split in scale","wow bounce":"bounce","wow flash":"flash","wow pulse":"pulse","wow rubberBand":"rubberBand","wow shake":"shake","wow swing":"swing","wow tada":"tada","wow wobble":"wobble","wow bounceIn":"bounceIn","wow bounceInDown":"bounceInDown","wow bounceInLeft":"bounceInLeft","wow bounceInRight":"bounceInRight","wow bounceInUp":"bounceInUp","wow bounceOut":"bounceOut","wow bounceOutDown":"bounceOutDown","wow bounceOutLeft":"bounceOutLeft","wow bounceOutRight":"bounceOutRight","wow bounceOutUp":"bounceOutUp","wow fadeIn":"fadeIn","wow fadeInDown":"fadeInDown","wow fadeInDownBig":"fadeInDownBig","wow fadeInLeft":"fadeInLeft","wow fadeInLeftBig":"fadeInLeftBig","wow fadeInRight":"fadeInRight","wow fadeInRightBig":"fadeInRightBig","wow fadeInUp":"fadeInUp","wow fadeInUpBig":"fadeInUpBig","wow fadeOut":"fadeOut","wow fadeOutDown":"fadeOutDown","wow fadeOutDownBig":"fadeOutDownBig","wow fadeOutLeft":"fadeOutLeft","wow fadeOutLeftBig":"fadeOutLeftBig","wow fadeOutRight":"fadeOutRight","wow fadeOutRightBig":"fadeOutRightBig","wow fadeOutUp":"fadeOutUp","wow fadeOutUpBig":"fadeOutUpBig","wow flip":"flip","wow flipInX":"flipInX","wow flipInY":"flipInY","wow flipOutX":"flipOutX","wow flipOutY":"flipOutY","wow lightSpeedIn":"lightSpeedIn","wow lightSpeedOut":"lightSpeedOut","wow rotateIn":"rotateIn","wow rotateInDownLeft":"rotateInDownLeft","wow rotateInDownRight":"rotateInDownRight","wow rotateInUpLeft":"rotateInUpLeft","wow rotateInUpRight":"rotateInUpRight","wow rotateOut":"rotateOut","wow rotateOutDownLeft":"rotateOutDownLeft","wow rotateOutDownRight":"rotateOutDownRight","wow rotateOutUpLeft":"rotateOutUpLeft","wow rotateOutUpRight":"rotateOutUpRight","wow hinge":"hinge","wow rollIn":"rollIn","wow rollOut":"rollOut","wow zoomIn":"zoomIn","wow zoomInDown":"zoomInDown","wow zoomInLeft":"zoomInLeft","wow zoomInRight":"zoomInRight","wow zoomInUp":"zoomInUp","wow zoomOut":"zoomOut","wow zoomOutDown":"zoomOutDown","wow zoomOutLeft":"zoomOutLeft","wow zoomOutRight":"zoomOutRight","wow zoomOutUp":"zoomOutUp"},"default":""},{"name":"pxl_animate_delay","label":"Animate Delay","type":"text","default":"0","description":"Enter number. Default 0ms"}]},{"name":"section_style_title_sub","label":"Sub Title","tab":"style","controls":[{"name":"sub_title_color","label":"Color","type":"color","selectors":{"{{WRAPPER}} .pxl-heading .pxl-item--subtitle":"color: {{VALUE}};","{{WRAPPER}} .pxl-heading .pxl-item--subtitle span":"color: {{VALUE}}; text-fill-color: {{VALUE}}; -webkit-text-fill-color: {{VALUE}}; background-image: none;"}},{"name":"sub_title_bg_color","label":"Background Color","type":"color","selectors":{"{{WRAPPER}} .pxl-heading .pxl-heading--inner .pxl-item--subtitle::after":"background: {{VALUE}};opacity: 1;"}},{"name":"sub_title_bg_gradient","label":"Background Type","type":"background","control_type":"group","types":["gradient"],"selector":"{{WRAPPER}} .pxl-heading .pxl-item--subtitle::after"},{"name":"sub_title_space_bottom","label":"Bottom Spacer","type":"slider","control_type":"responsive","size_units":["px"],"default":{"size":0},"range":{"px":{"min":0,"max":300}},"selectors":{"{{WRAPPER}} .pxl-heading .pxl-item--subtitle ":"margin-bottom: {{SIZE}}{{UNIT}};"},"separator":"after"},{"name":"sub_title_border_radius","label":"Border Radius","type":"dimensions","size_units":["px"],"selectors":{"{{WRAPPER}} .pxl-heading .pxl-item--subtitle::after":"border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"}},{"name":"sub_title_typography","label":"Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-heading .pxl-item--subtitle span"},{"name":"border_type","label":"Border Type","type":"select","options":{"":"None","solid":"Solid","double":"Double","dotted":"Dotted","dashed":"Dashed","groove":"Groove"},"selectors":{"{{WRAPPER}} .pxl-heading .pxl-item--subtitle::after":"border-style: {{VALUE}} !important;"}},{"name":"border_width","label":"Border Width","type":"dimensions","selectors":{"{{WRAPPER}} .pxl-heading .pxl-item--subtitle::after":"border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;"},"condition":{"border_type!":""},"responsive":true},{"name":"border_color","label":"Border Color","type":"color","selectors":{"{{WRAPPER}} .pxl-heading .pxl-item--subtitle::after":"border-color: {{VALUE}} !important;"},"condition":{"border_type!":""}},{"name":"btn_padding","label":"Padding","type":"dimensions","size_units":["px"],"selectors":{"{{WRAPPER}} .pxl-heading .pxl-item--subtitle":"padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"},"control_type":"responsive"},{"name":"pxl_animate_sub","label":"Case Animate","type":"select","options":{"":"None","wow bounce":"bounce","wow flash":"flash","wow pulse":"pulse","wow rubberBand":"rubberBand","wow shake":"shake","wow swing":"swing","wow tada":"tada","wow wobble":"wobble","wow bounceIn":"bounceIn","wow bounceInDown":"bounceInDown","wow bounceInLeft":"bounceInLeft","wow bounceInRight":"bounceInRight","wow bounceInUp":"bounceInUp","wow bounceOut":"bounceOut","wow bounceOutDown":"bounceOutDown","wow bounceOutLeft":"bounceOutLeft","wow bounceOutRight":"bounceOutRight","wow bounceOutUp":"bounceOutUp","wow fadeIn":"fadeIn","wow fadeInDown":"fadeInDown","wow fadeInDownBig":"fadeInDownBig","wow fadeInLeft":"fadeInLeft","wow fadeInLeftBig":"fadeInLeftBig","wow fadeInRight":"fadeInRight","wow fadeInRightBig":"fadeInRightBig","wow fadeInUp":"fadeInUp","wow fadeInUpBig":"fadeInUpBig","wow fadeOut":"fadeOut","wow fadeOutDown":"fadeOutDown","wow fadeOutDownBig":"fadeOutDownBig","wow fadeOutLeft":"fadeOutLeft","wow fadeOutLeftBig":"fadeOutLeftBig","wow fadeOutRight":"fadeOutRight","wow fadeOutRightBig":"fadeOutRightBig","wow fadeOutUp":"fadeOutUp","wow fadeOutUpBig":"fadeOutUpBig","wow flip":"flip","wow flipInX":"flipInX","wow flipInY":"flipInY","wow flipOutX":"flipOutX","wow flipOutY":"flipOutY","wow lightSpeedIn":"lightSpeedIn","wow lightSpeedOut":"lightSpeedOut","wow rotateIn":"rotateIn","wow rotateInDownLeft":"rotateInDownLeft","wow rotateInDownRight":"rotateInDownRight","wow rotateInUpLeft":"rotateInUpLeft","wow rotateInUpRight":"rotateInUpRight","wow rotateOut":"rotateOut","wow rotateOutDownLeft":"rotateOutDownLeft","wow rotateOutDownRight":"rotateOutDownRight","wow rotateOutUpLeft":"rotateOutUpLeft","wow rotateOutUpRight":"rotateOutUpRight","wow hinge":"hinge","wow rollIn":"rollIn","wow rollOut":"rollOut","wow zoomIn":"zoomIn","wow zoomInDown":"zoomInDown","wow zoomInLeft":"zoomInLeft","wow zoomInRight":"zoomInRight","wow zoomInUp":"zoomInUp","wow zoomOut":"zoomOut","wow zoomOutDown":"zoomOutDown","wow zoomOutLeft":"zoomOutLeft","wow zoomOutRight":"zoomOutRight","wow zoomOutUp":"zoomOutUp"},"default":""},{"name":"pxl_animate_delay_sub","label":"Animate Delay","type":"text","default":"0","description":"Enter number. Default 0ms"}]},{"name":"section_style_title_number","label":"Title Number","tab":"style","condition":{"title_absolute_check":"true"},"controls":[{"name":"title_gradient_number","label":"Title Gradient","type":"switcher","default":"false"},{"name":"title_color_gradient_number","label":"Title Color Gradient","type":"color","selectors":{"{{WRAPPER}} .pxl-heading .title-absolute":"background: -webkit-linear-gradient(90deg, {{VALUE}} 0%, #FFB06D 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;"},"condition":{"title_gradient":"true"}},{"name":"title_color_number","label":"Title Color","type":"color","selectors":{"{{WRAPPER}} .pxl-heading .title-absolute":"color: {{VALUE}};"}},{"name":"title_typography_number","label":"Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-heading .title-absolute"},{"name":"title_space_bottom_number","label":"Bottom Spacer","type":"slider","control_type":"responsive","size_units":["px"],"default":{"size":0},"range":{"px":{"min":0,"max":300}},"selectors":{"{{WRAPPER}} .pxl-heading .title-absolute":"bottom: {{SIZE}}{{UNIT}};"},"separator":"after"},{"name":"title_space_right_number","label":"Right Spacer","type":"slider","control_type":"responsive","size_units":["px"],"default":{"size":0},"range":{"px":{"min":0,"max":300}},"selectors":{"{{WRAPPER}} .pxl-heading .title-absolute":"right: {{SIZE}}{{UNIT}};"},"separator":"after"}]},{"name":"highlight_section","label":"Highlight Text","tab":"content","controls":[{"name":"text_list","label":"Text List","type":"repeater","controls":[{"name":"highlight_text","label":"Text","type":"text","label_block":true}],"title_field":"{{{ highlight_text }}}"},{"name":"highlight_color_1","label":"Random Text Color","type":"color","selectors":{"{{WRAPPER}} .pxl-heading-wrap .heading-highlight":"color: {{VALUE}};"}},{"name":"highlight_typography","label":"Highlight Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-heading .heading-highlight, {{WRAPPER}} .pxl-heading .typed-cursor, {{WRAPPER}} .pxl-heading .heading-highlight span"}]},{"name":"section_style_title_highlight","label":"Highlight","tab":"style","controls":[{"name":"highlight_style","label":"Style","type":"select","options":{"highlight-default":"Default","highlight-text-gradient":"Text Gradient"},"default":"highlight-default"},{"name":"highlight_color","label":"Highlight Color","type":"color","selectors":{"{{WRAPPER}} .pxl-heading .heading-highlight":"color: {{VALUE}};"},"condition":{"highlight_style":["highlight-default"]}},{"name":"highlight_bg_color","label":"Highlight Background Color","type":"color","selectors":{"{{WRAPPER}} .pxl-heading .heading-highlight":"background-color: {{VALUE}};"},"condition":{"highlight_style":["highlight-default"]}},{"name":"hl_margin","label":"Margin","type":"dimensions","size_units":["px"],"selectors":{"{{WRAPPER}} .pxl-heading .heading-highlight":"margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"},"control_type":"responsive"},{"name":"hl_margin_curser","label":"Margin Curser","type":"dimensions","size_units":["px"],"selectors":{"{{WRAPPER}} .pxl-heading .typed-cursor":"margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;"},"control_type":"responsive"},{"name":"hl_border_radius","label":"Border Radius","type":"dimensions","size_units":["px"],"selectors":{"{{WRAPPER}} .pxl-heading .heading-highlight":"border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}