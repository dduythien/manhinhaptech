<?php

class PxlImageParallax_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_image_parallax';
    protected $title = 'PXL Image Parallax';
    protected $icon = 'eicon-image';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"content_section","label":"Image","tab":"content","controls":[{"name":"source_type","label":"Source Type","type":"select","options":{"s_img":"Select Image","f_img":"Featured Image"},"default":"s_img"},{"name":"img_size","label":"Image Size","type":"text","description":"Enter image size (Example: \"thumbnail\", \"medium\", \"large\", \"full\" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).","condition":{"source_type":["f_img"]}},{"name":"image","label":"Choose Image","type":"media","dynamic":{"active":true},"condition":{"source_type":["s_img"]},"default":{"url":"http:\/\/localhost\/manhinhaptech\/wp-content\/plugins\/elementor\/assets\/images\/placeholder.png"}},{"name":"image","label":"Image Size","type":"image-size","control_type":"group","default":"full","condition":{"source_type":["s_img"]}},{"name":"align","label":"Alignment","type":"choose","options":{"left":{"title":"Left","icon":"eicon-text-align-left"},"center":{"title":"Center","icon":"eicon-text-align-center"},"right":{"title":"Right","icon":"eicon-text-align-right"}},"control_type":"responsive","selectors":{"{{WRAPPER}}":"text-align: {{VALUE}};"}},{"name":"link_to","label":"Link","type":"select","default":"none","options":{"none":"None","file":"Media File","custom":"Custom URL"}},{"name":"link","label":"Link","type":"url","dynamic":{"active":true},"placeholder":"https:\/\/your-link.com","condition":{"link_to":"custom"},"show_label":false},{"name":"open_lightbox","label":"Lightbox","type":"select","default":"default","options":{"default":"Default","yes":"Yes","no":"No"},"condition":{"link_to":"file"}}]},{"name":"parallax_section","label":"Parallax Settings","tab":"content","controls":[{"name":"pxl_parallax","label":"Parallax Type","type":"select","options":{"":"None","x":"Transform X","y":"Transform Y","z":"Transform Z","rotateX":"RotateX","rotateY":"RotateY","rotateZ":"RotateZ","scaleX":"ScaleX","scaleY":"ScaleY","scaleZ":"ScaleZ","scale":"Scale"}},{"name":"parallax_value","label":"Value","type":"text","default":"","condition":{"pxl_parallax!":""}},{"name":"pxl_parallax_two","label":"Parallax Two Type","type":"select","options":{"":"None","x":"Transform X","y":"Transform Y","z":"Transform Z","rotateX":"RotateX","rotateY":"RotateY","rotateZ":"RotateZ","scaleX":"ScaleX","scaleY":"ScaleY","scaleZ":"ScaleZ","scale":"Scale"}},{"name":"parallax_value_two","label":"Value","type":"text","default":"","condition":{"pxl_parallax!":""}}]},{"name":"bg_parallax_section","label":"Background Parallax","tab":"content","controls":[{"name":"pxl_bg_parallax","label":"Background Parallax Type","type":"select","options":{"":"None","basic":"Basic","rotate":"Rotate","mouse-move":"Mouse Move","mouse-move-rotate":"Mouse Move Rotate"}},{"name":"bg_parallax_width","label":"Background Width","type":"slider","control_type":"responsive","default":{"unit":"%"},"tablet_default":{"unit":"%"},"mobile_default":{"unit":"%"},"size_units":["%","px","vw"],"range":{"%":{"min":1,"max":100},"px":{"min":1,"max":1920},"vw":{"min":1,"max":100}},"selectors":{"{{WRAPPER}} .pxl-image-wg":"width: {{SIZE}}{{UNIT}};"},"condition":{"pxl_bg_parallax!":""}},{"name":"bg_parallax_height","label":"Background Height","type":"slider","control_type":"responsive","default":{"unit":"px"},"tablet_default":{"unit":"px"},"mobile_default":{"unit":"px"},"size_units":["px","vh"],"range":{"px":{"min":1,"max":1000},"vh":{"min":1,"max":100}},"selectors":{"{{WRAPPER}} .pxl-image-wg":"height: {{SIZE}}{{UNIT}};"},"condition":{"pxl_bg_parallax!":""}}]},{"name":"style_section","label":"Style","tab":"style","controls":[{"name":"overflow_check","label":"Overflow","type":"switcher","default":"true"},{"name":"width","label":"Width","type":"slider","control_type":"responsive","default":{"unit":"%"},"tablet_default":{"unit":"%"},"mobile_default":{"unit":"%"},"size_units":["%","px","vw"],"range":{"%":{"min":1,"max":100},"px":{"min":1,"max":1000},"vw":{"min":1,"max":100}},"selectors":{"{{WRAPPER}} .pxl-image--inner":"width: {{SIZE}}{{UNIT}};"}},{"name":"space","label":"Max Width","type":"slider","control_type":"responsive","default":{"unit":"%"},"tablet_default":{"unit":"%"},"mobile_default":{"unit":"%"},"size_units":["%","px","vw"],"range":{"%":{"min":1,"max":100},"px":{"min":1,"max":1000},"vw":{"min":1,"max":100}},"selectors":{"{{WRAPPER}} .pxl-image--inner":"max-width: {{SIZE}}{{UNIT}};"}},{"name":"height","label":"Height","type":"slider","control_type":"responsive","default":{"unit":"px"},"tablet_default":{"unit":"px"},"mobile_default":{"unit":"px"},"size_units":["px","vh"],"range":{"px":{"min":1,"max":1000},"vh":{"min":1,"max":100}},"selectors":{"{{WRAPPER}} .pxl-image--inner":"height: {{SIZE}}{{UNIT}};"}},{"name":"max-height","label":"Height Img","type":"slider","control_type":"responsive","default":{"unit":"%"},"tablet_default":{"unit":"%"},"mobile_default":{"unit":"%"},"size_units":["%","px","vh"],"range":{"%":{"min":1,"max":100},"px":{"min":1,"max":1000},"vh":{"min":1,"max":100}},"selectors":{"{{WRAPPER}} .pxl-image--inner .pxl-image-wg":"height: {{SIZE}}{{UNIT}};"}},{"name":"maxx-height","label":"Max Height","type":"slider","control_type":"responsive","default":{"unit":"%"},"tablet_default":{"unit":"%"},"mobile_default":{"unit":"%"},"size_units":["%","px","vh"],"range":{"%":{"min":1,"max":100},"px":{"min":1,"max":1000},"vh":{"min":1,"max":100}},"selectors":{"{{WRAPPER}} .pxl-image--inner .pxl-image-wg img":"max-height: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};"}},{"name":"object-fit","label":"Object Fit","type":"select","control_type":"responsive","condition":{"height[size]!":""},"options":{"":"Default","fill":"Fill","cover":"Cover","contain":"Contain"},"default":"","selectors":{"{{WRAPPER}} img":"object-fit: {{VALUE}};"}},{"name":"separator_panel_style","type":"divider","style":"thick"},{"name":"image_effects","control_type":"tab","tabs":[{"name":"normal","label":"Normal","type":"tab","controls":[{"name":"opacity","label":"Opacity","type":"slider","range":{"px":{"max":1,"min":0.1000000000000000055511151231257827021181583404541015625,"step":0.01000000000000000020816681711721685132943093776702880859375}},"selectors":{"{{WRAPPER}} img":"opacity: {{SIZE}};"}},{"name":"css_filters","label":"CSS Filters","type":"css-filter","control_type":"group","selector":"{{WRAPPER}} img"}]},{"name":"hover","label":"Hover","type":"tab","controls":[{"name":"opacity_hover","label":"Opacity Hover","type":"slider","range":{"px":{"max":1,"min":0.1000000000000000055511151231257827021181583404541015625,"step":0.01000000000000000020816681711721685132943093776702880859375}},"selectors":{"{{WRAPPER}}:hover img":"opacity: {{SIZE}};"}},{"name":"css_filters_hover","label":"CSS Filters Hover","type":"css-filter","control_type":"group","selector":"{{WRAPPER}}:hover img"},{"name":"background_hover_transition","label":"Transition Duration","type":"slider","range":{"px":{"max":3,"step":0.1000000000000000055511151231257827021181583404541015625}},"selectors":{"{{WRAPPER}} img":"transition-duration: {{SIZE}}s"}},{"name":"hover_animation","label":"Hover Animation","type":"hover_animation"}]}]},{"name":"image_border","type":"border","control_type":"group","selector":"{{WRAPPER}} img, {{WRAPPER}} .pxl-bg-parallax","separator":"before"},{"name":"image_border_radius","label":"Border Radius","type":"dimensions","control_type":"responsive","size_units":["px","%"],"selectors":{"{{WRAPPER}} img, {{WRAPPER}} .pxl-image--inner":"border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};","{{WRAPPER}} .pxl-bg-parallax":"border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"}},{"name":"image_box_shadow","label":"Box Shadow","type":"box-shadow","control_type":"group","exclude":["box_shadow_position"],"selector":"{{WRAPPER}} img"}]},{"name":"custom_style_section","label":"Custom Style","tab":"style","controls":[{"name":"custom_style","label":"Style","type":"select","options":{"":"None","pxl-image-effect1":"Zigzag","pxl-image-tilt":"Tilt","slide-top-to-bottom":"Slide Top To Bottom ","pxl-image-effect2":"Slide Bottom To Top ","slide-right-to-left":"Slide Right To Left ","slide-left-to-right":"Slide Left To Right ","skew-in":"Skew In"}},{"name":"parallax_valuee","label":"Parallax Value","type":"text","condition":{"custom_style":"pxl-image-parallax"},"default":"40","description":"Enter number."},{"name":"max_tilt","label":"Max Tilt","type":"text","condition":{"custom_style":"pxl-image-tilt"},"default":"10","description":"Enter number."},{"name":"speed_tilt","label":"Speed Tilt","type":"text","condition":{"custom_style":"pxl-image-tilt"},"default":"400","description":"Enter number."},{"name":"perspective_tilt","label":"Perspective Tilt","type":"text","condition":{"custom_style":"pxl-image-tilt"},"default":"1000","description":"Enter number."},{"name":"speed_effect","label":"Speed","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":100000}},"selectors":{"{{WRAPPER}} .pxl-image-single":"animation-duration: {{SIZE}}ms;"},"condition":{"custom_style!":["pxl-image-tilt","pxl-hover1"]},"description":"Enter number, unit is ms."}]},{"name":"section_animation","label":"Animation","tab":"style","condition":[],"controls":[{"name":"pxl_animate","label":"Case Animate","type":"select","options":{"":"None","wow bounce":"bounce","wow flash":"flash","wow pulse":"pulse","wow rubberBand":"rubberBand","wow shake":"shake","wow swing":"swing","wow tada":"tada","wow wobble":"wobble","wow bounceIn":"bounceIn","wow bounceInDown":"bounceInDown","wow bounceInLeft":"bounceInLeft","wow bounceInRight":"bounceInRight","wow bounceInUp":"bounceInUp","wow bounceOut":"bounceOut","wow bounceOutDown":"bounceOutDown","wow bounceOutLeft":"bounceOutLeft","wow bounceOutRight":"bounceOutRight","wow bounceOutUp":"bounceOutUp","wow fadeIn":"fadeIn","wow fadeInDown":"fadeInDown","wow fadeInDownBig":"fadeInDownBig","wow fadeInLeft":"fadeInLeft","wow fadeInLeftBig":"fadeInLeftBig","wow fadeInRight":"fadeInRight","wow fadeInRightBig":"fadeInRightBig","wow fadeInUp":"fadeInUp","wow fadeInUpBig":"fadeInUpBig","wow fadeOut":"fadeOut","wow fadeOutDown":"fadeOutDown","wow fadeOutDownBig":"fadeOutDownBig","wow fadeOutLeft":"fadeOutLeft","wow fadeOutLeftBig":"fadeOutLeftBig","wow fadeOutRight":"fadeOutRight","wow fadeOutRightBig":"fadeOutRightBig","wow fadeOutUp":"fadeOutUp","wow fadeOutUpBig":"fadeOutUpBig","wow flip":"flip","wow flipInX":"flipInX","wow flipInY":"flipInY","wow flipOutX":"flipOutX","wow flipOutY":"flipOutY","wow lightSpeedIn":"lightSpeedIn","wow lightSpeedOut":"lightSpeedOut","wow rotateIn":"rotateIn","wow rotateInDownLeft":"rotateInDownLeft","wow rotateInDownRight":"rotateInDownRight","wow rotateInUpLeft":"rotateInUpLeft","wow rotateInUpRight":"rotateInUpRight","wow rotateOut":"rotateOut","wow rotateOutDownLeft":"rotateOutDownLeft","wow rotateOutDownRight":"rotateOutDownRight","wow rotateOutUpLeft":"rotateOutUpLeft","wow rotateOutUpRight":"rotateOutUpRight","wow hinge":"hinge","wow rollIn":"rollIn","wow rollOut":"rollOut","wow zoomIn":"zoomIn","wow zoomInDown":"zoomInDown","wow zoomInLeft":"zoomInLeft","wow zoomInRight":"zoomInRight","wow zoomInUp":"zoomInUp","wow zoomOut":"zoomOut","wow zoomOutDown":"zoomOutDown","wow zoomOutLeft":"zoomOutLeft","wow zoomOutRight":"zoomOutRight","wow zoomOutUp":"zoomOutUp"},"default":""},{"name":"pxl_animate_delay","label":"Animate Delay","type":"text","default":"0","description":"Enter number. Default 0ms"}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'tilt','pxl-tweenmax' );
}