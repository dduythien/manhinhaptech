<?php

class PxlVideoPlayer_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_video_player';
    protected $title = 'Video Player Pxl';
    protected $icon = 'eicon-play';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"section_layout","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost\/manhinhaptech\/wp-content\/themes\/digicove\/elements\/templates\/pxl_video_player\/img-layout\/layout1.jpg"}}}]},{"name":"section_content","label":"Content","tab":"content","controls":[{"name":"video_link","label":"Link","type":"text","condition":{"layout":["1"]}},{"name":"image_type","label":"Image Type","type":"select","options":{"none":"None","img":"Image","bg":"Background"},"default":"none","condition":{"layout":["1"]}},{"name":"image","label":"Image","type":"media","condition":{"image_type":["img","bg"]}},{"name":"img_size","label":"Image Size","type":"text","description":"Enter image size (Example: \"thumbnail\", \"medium\", \"large\", \"full\" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).","condition":{"image_type":"img"}},{"name":"image_height","label":"Image Height","type":"slider","description":"Enter number.","condition":{"image_type":"bg"},"range":{"px":{"min":0,"max":3000}},"control_type":"responsive","selectors":{"{{WRAPPER}} .pxl-video-player .pxl-video--imagebg":"height: {{SIZE}}{{UNIT}};"}},{"name":"btn_video_style","label":"Button Video Style","type":"select","options":{"style1":"Style 1","style2":"Style 2","style3":"Style 3","style4":"Style 4","style5":"Style 5"},"default":"style1","condition":{"layout":["1"]}},{"name":"video_text","label":"Text","type":"text","condition":{"layout":["1"],"btn_video_style":["style3","style4"]}},{"name":"btn_video_position","label":"Button Video Position","type":"select","options":{"p-center":"Center","p-top-left":"Top Left","p-top-right":"Top Right","p-bottom-left":"Bottom Left","p-bottom-right":"Bottom Right"},"default":"p-center","condition":{"image_type":["img","bg"]}},{"name":"top_positioon","label":"Top Position","type":"slider","size_units":["px","%"],"control_type":"responsive","default":{"size":0,"unit":"%"},"range":{"%":{"min":0,"max":100}},"selectors":{"{{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-top-left, {{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-top-right":"top: {{SIZE}}{{UNIT}};"},"condition":{"btn_video_position":["p-top-left","p-top-right"]}},{"name":"right_positioon","label":"Right Position","type":"slider","size_units":["px","%"],"control_type":"responsive","default":{"size":0,"unit":"%"},"range":{"%":{"min":0,"max":100}},"selectors":{"{{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-top-right, {{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-bottom-right":"right: {{SIZE}}{{UNIT}};"},"condition":{"btn_video_position":["p-top-right","p-bottom-right"]}},{"name":"bottom_positioon","label":"Bottom Position","type":"slider","size_units":["px","%"],"control_type":"responsive","default":{"size":0,"unit":"%"},"range":{"%":{"min":0,"max":100}},"selectors":{"{{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-bottom-left, {{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-bottom-right":"bottom: {{SIZE}}{{UNIT}};"},"condition":{"btn_video_position":["p-bottom-left","p-bottom-right"]}},{"name":"left_positioon","label":"Left Position","type":"slider","size_units":["px","%"],"control_type":"responsive","default":{"size":0,"unit":"%"},"range":{"%":{"min":0,"max":100}},"selectors":{"{{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-top-left, {{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-bottom-left":"left: {{SIZE}}{{UNIT}};"},"condition":{"btn_video_position":["p-top-left","p-bottom-left"]}}]},{"name":"section_style_content","label":"Content","tab":"style","controls":[{"name":"text_typography","type":"typography","label":"Typography","control_type":"group","condition":{"btn_video_style":["style3"]},"selector":"{{WRAPPER}} .pxl-video-player1.pxl-video-style3 span"},{"name":"btn_video_text_color","label":"Button Video Text Color","type":"color","selectors":{"{{WRAPPER}} .pxl-video-player span":"color: {{VALUE}};"},"condition":{"layout":["1"]}},{"name":"box_icon_color","label":"Box Icon Color","type":"color","selectors":{"{{WRAPPER}} .pxl-video-player .pxl-box--icon,{{WRAPPER}} .pxl-video-player .btn-video i":"color: {{VALUE}};"},"condition":{"layout":["1"]}},{"name":"box_icon_bgcolor","label":"Box Icon Background Color","type":"color","selectors":{"{{WRAPPER}} .pxl-video-player .pxl-box--icon,{{WRAPPER}} .pxl-video-player .btn-video-wrap .btn-video":"background: {{VALUE}};"},"condition":{"layout":["1"]}},{"name":"box_bgcolor_after","label":"Box After Background Color","type":"color","selectors":{"{{WRAPPER}} .pxl-video-player.pxl-video-style5:after":"background-color: {{VALUE}};"},"condition":{"layout":["1"]}},{"name":"btn_box_shadow","label":"Box Shadow","type":"box-shadow","control_type":"group","condition":{"btn_video_style":["style3"]},"selector":"{{WRAPPER}} .pxl-video-player1 .btn-video"},{"name":"box_border_radius","label":"Box Border Radius","type":"dimensions","size_units":["px"],"selectors":{"{{WRAPPER}} .pxl-video-player .pxl-video--inner":"border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"},"condition":{"layout":["1"]}},{"name":"box_width","label":"Icon width height","type":"slider","description":"Enter number.","size_units":["px","%"],"range":{"px":{"min":0,"max":3000},"%":{"min":0,"max":3000}},"control_type":"responsive","selectors":{"{{WRAPPER}} .pxl-video-player1 .btn-video":"width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};"}},{"name":"icon_size","label":"Icon Size","type":"slider","description":"Enter number.","size_units":["px"],"range":{"px":{"min":0,"max":3000}},"control_type":"responsive","selectors":{"{{WRAPPER}} .pxl-video-player1 .btn-video i":"font-size : {{SIZE}}{{UNIT}};"}},{"name":"box_height","label":"Image Height","type":"slider","description":"Enter number.","size_units":["px","%"],"range":{"px":{"min":0,"max":3000},"%":{"min":0,"max":3000}},"control_type":"responsive","selectors":{"{{WRAPPER}} .pxl-video-player1 .pxl-video--inner":"height: {{SIZE}}{{UNIT}};"}}]},{"name":"section_animation","label":"Animation","tab":"style","condition":[],"controls":[{"name":"pxl_animate","label":"Case Animate","type":"select","options":{"":"None","wow bounce":"bounce","wow flash":"flash","wow pulse":"pulse","wow rubberBand":"rubberBand","wow shake":"shake","wow swing":"swing","wow tada":"tada","wow wobble":"wobble","wow bounceIn":"bounceIn","wow bounceInDown":"bounceInDown","wow bounceInLeft":"bounceInLeft","wow bounceInRight":"bounceInRight","wow bounceInUp":"bounceInUp","wow bounceOut":"bounceOut","wow bounceOutDown":"bounceOutDown","wow bounceOutLeft":"bounceOutLeft","wow bounceOutRight":"bounceOutRight","wow bounceOutUp":"bounceOutUp","wow fadeIn":"fadeIn","wow fadeInDown":"fadeInDown","wow fadeInDownBig":"fadeInDownBig","wow fadeInLeft":"fadeInLeft","wow fadeInLeftBig":"fadeInLeftBig","wow fadeInRight":"fadeInRight","wow fadeInRightBig":"fadeInRightBig","wow fadeInUp":"fadeInUp","wow fadeInUpBig":"fadeInUpBig","wow fadeOut":"fadeOut","wow fadeOutDown":"fadeOutDown","wow fadeOutDownBig":"fadeOutDownBig","wow fadeOutLeft":"fadeOutLeft","wow fadeOutLeftBig":"fadeOutLeftBig","wow fadeOutRight":"fadeOutRight","wow fadeOutRightBig":"fadeOutRightBig","wow fadeOutUp":"fadeOutUp","wow fadeOutUpBig":"fadeOutUpBig","wow flip":"flip","wow flipInX":"flipInX","wow flipInY":"flipInY","wow flipOutX":"flipOutX","wow flipOutY":"flipOutY","wow lightSpeedIn":"lightSpeedIn","wow lightSpeedOut":"lightSpeedOut","wow rotateIn":"rotateIn","wow rotateInDownLeft":"rotateInDownLeft","wow rotateInDownRight":"rotateInDownRight","wow rotateInUpLeft":"rotateInUpLeft","wow rotateInUpRight":"rotateInUpRight","wow rotateOut":"rotateOut","wow rotateOutDownLeft":"rotateOutDownLeft","wow rotateOutDownRight":"rotateOutDownRight","wow rotateOutUpLeft":"rotateOutUpLeft","wow rotateOutUpRight":"rotateOutUpRight","wow hinge":"hinge","wow rollIn":"rollIn","wow rollOut":"rollOut","wow zoomIn":"zoomIn","wow zoomInDown":"zoomInDown","wow zoomInLeft":"zoomInLeft","wow zoomInRight":"zoomInRight","wow zoomInUp":"zoomInUp","wow zoomOut":"zoomOut","wow zoomOutDown":"zoomOutDown","wow zoomOutLeft":"zoomOutLeft","wow zoomOutRight":"zoomOutRight","wow zoomOutUp":"zoomOutUp"},"default":""},{"name":"pxl_animate_delay","label":"Animate Delay","type":"text","default":"0","description":"Enter number. Default 0ms"}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}