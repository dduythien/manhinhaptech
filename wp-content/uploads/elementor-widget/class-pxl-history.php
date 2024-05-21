<?php

class PxlHistory_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_history';
    protected $title = 'Pxl History';
    protected $icon = 'eicon-editor-link';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"tab_layout","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"https:\/\/demo.bravisthemes.com\/digicove\/wp-content\/themes\/digicove\/elements\/templates\/pxl_history\/img-layout\/layout1.jpg"},"2":{"label":"Layout 2","image":"https:\/\/demo.bravisthemes.com\/digicove\/wp-content\/themes\/digicove\/elements\/templates\/pxl_history\/img-layout\/layout2.jpg"}}}]},{"name":"section_content","label":"Content","tab":"content","controls":[{"name":"history","label":"History","type":"repeater","condition":{"layout":"1"},"controls":[{"name":"time","label":"Time","type":"text","label_block":true},{"name":"text","label":"Text","type":"text","label_block":true},{"name":"decs","label":"Description","type":"textarea","label_block":true},{"name":"color_item","label":"Background Color","type":"color","default":"","selectors":{"{{WRAPPER}} {{CURRENT_ITEM}} .time":"background: {{VALUE}} !important;"}},{"name":"color_item_shadow","label":"Color Shadow","type":"color","default":"","selectors":{"{{WRAPPER}} {{CURRENT_ITEM}} .time:after":"background: {{VALUE}} !important;"}},{"name":"space_bottom","label":"Space Top","type":"slider","control_type":"responsive","size_units":["px","%"],"range":{"px":{"min":-100,"max":100}},"selectors":{"{{WRAPPER}} {{CURRENT_ITEM}} ":"margin-bottom: {{SIZE}}{{UNIT}} !importaint;"}}],"title_field":"{{{ text }}}"},{"name":"history2","label":"History","type":"repeater","condition":{"layout":"2"},"controls":[{"name":"pxl_icon","label":"Icon","type":"icons","fa4compatibility":"icon"},{"name":"text2","label":"Text","type":"text","label_block":true},{"name":"decs2","label":"Description","type":"textarea","label_block":true},{"name":"space_bottom2","label":"Space Top","type":"slider","control_type":"responsive","size_units":["px","%"],"range":{"px":{"min":-100,"max":100}},"selectors":{"{{WRAPPER}} {{CURRENT_ITEM}} ":"margin-top: {{SIZE}}{{UNIT}};"}}],"title_field":"{{{ text2 }}}"}]},{"name":"section_style_link","label":"Style","tab":"style","controls":[{"name":"style","label":"Style","type":"select","default":"default","options":{"default":"Default","style2":"Style2","style3":"Style3"}},{"name":"height_line","label":"Height Procces","type":"slider","control_type":"responsive","size_units":["px","%"],"range":{"px":{"min":0,"max":100}},"selectors":{"{{WRAPPER}} .pxl-history:before ":"height: {{SIZE}}{{UNIT}};"}},{"name":"align","label":"Alignment","type":"choose","control_type":"responsive","options":{"left":{"title":"Left","icon":"eicon-text-align-left"},"center":{"title":"Center","icon":"eicon-text-align-center"},"right":{"title":"Right","icon":"eicon-text-align-right"},"justify":{"title":"Justified","icon":"eicon-text-align-justify"}},"selectors":{"{{WRAPPER}} .pxl-history .corner-box":"text-align: {{VALUE}};"}},{"name":"time_color","label":"Time Color ","type":"color","selectors":{"{{WRAPPER}} .pxl-history .wrap-content .time":"color: {{VALUE}};"}},{"name":"time_typography","label":"Time Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-history .wrap-content .time"},{"name":"title_color","label":"Title Color ","type":"color","selectors":{"{{WRAPPER}} .pxl-history .wrap-content  .title":"color: {{VALUE}};"}},{"name":"title_typography","label":"Title Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-history .wrap-content .title"},{"name":"desc_color","label":"Description Color ","type":"color","selectors":{"{{WRAPPER}} .pxl-history .wrap-content .desc":"color: {{VALUE}};"}},{"name":"desc_typography","label":"Description Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-history .wrap-content .desc"},{"name":"line_color","label":"Line Color ","type":"color","selectors":{"{{WRAPPER}} .pxl-history .line ":"background-color: {{VALUE}};","{{WRAPPER}} .pxl-history:before ":"border-left-color: {{VALUE}};"}},{"name":"bottom_spacer","label":"Bottom Spacer","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":300}},"selectors":{"{{WRAPPER}} .pxl-history li, {{WRAPPER}} .pxl-history .corner-box":"margin-bottom: {{SIZE}}{{UNIT}};"}}]},{"name":"section_animation","label":"Animation","tab":"style","condition":[],"controls":[{"name":"pxl_animate","label":"Case Animate","type":"select","options":{"":"None","wow bounce":"bounce","wow flash":"flash","wow pulse":"pulse","wow rubberBand":"rubberBand","wow shake":"shake","wow swing":"swing","wow tada":"tada","wow wobble":"wobble","wow bounceIn":"bounceIn","wow bounceInDown":"bounceInDown","wow bounceInLeft":"bounceInLeft","wow bounceInRight":"bounceInRight","wow bounceInUp":"bounceInUp","wow bounceOut":"bounceOut","wow bounceOutDown":"bounceOutDown","wow bounceOutLeft":"bounceOutLeft","wow bounceOutRight":"bounceOutRight","wow bounceOutUp":"bounceOutUp","wow fadeIn":"fadeIn","wow fadeInDown":"fadeInDown","wow fadeInDownBig":"fadeInDownBig","wow fadeInLeft":"fadeInLeft","wow fadeInLeftBig":"fadeInLeftBig","wow fadeInRight":"fadeInRight","wow fadeInRightBig":"fadeInRightBig","wow fadeInUp":"fadeInUp","wow fadeInUpBig":"fadeInUpBig","wow fadeOut":"fadeOut","wow fadeOutDown":"fadeOutDown","wow fadeOutDownBig":"fadeOutDownBig","wow fadeOutLeft":"fadeOutLeft","wow fadeOutLeftBig":"fadeOutLeftBig","wow fadeOutRight":"fadeOutRight","wow fadeOutRightBig":"fadeOutRightBig","wow fadeOutUp":"fadeOutUp","wow fadeOutUpBig":"fadeOutUpBig","wow flip":"flip","wow flipInX":"flipInX","wow flipInY":"flipInY","wow flipOutX":"flipOutX","wow flipOutY":"flipOutY","wow lightSpeedIn":"lightSpeedIn","wow lightSpeedOut":"lightSpeedOut","wow rotateIn":"rotateIn","wow rotateInDownLeft":"rotateInDownLeft","wow rotateInDownRight":"rotateInDownRight","wow rotateInUpLeft":"rotateInUpLeft","wow rotateInUpRight":"rotateInUpRight","wow rotateOut":"rotateOut","wow rotateOutDownLeft":"rotateOutDownLeft","wow rotateOutDownRight":"rotateOutDownRight","wow rotateOutUpLeft":"rotateOutUpLeft","wow rotateOutUpRight":"rotateOutUpRight","wow hinge":"hinge","wow rollIn":"rollIn","wow rollOut":"rollOut","wow zoomIn":"zoomIn","wow zoomInDown":"zoomInDown","wow zoomInLeft":"zoomInLeft","wow zoomInRight":"zoomInRight","wow zoomInUp":"zoomInUp","wow zoomOut":"zoomOut","wow zoomOutDown":"zoomOutDown","wow zoomOutLeft":"zoomOutLeft","wow zoomOutRight":"zoomOutRight","wow zoomOutUp":"zoomOutUp"},"default":""},{"name":"pxl_animate_delay","label":"Animate Delay","type":"text","default":"0","description":"Enter number. Default 0ms"}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}