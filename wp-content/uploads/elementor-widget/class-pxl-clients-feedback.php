<?php

class PxlClientsFeedback_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_clients_feedback';
    protected $title = 'Clients Feedback BR';
    protected $icon = 'eicon-library-upload';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"section_content","label":"Content","tab":"content","controls":[{"name":"image","label":"Image","type":"media"},{"name":"title","label":"Title","type":"text"},{"name":"position","label":"Position","type":"text"},{"name":"content","label":"Content","type":"textarea"},{"name":"show_star","label":"Show Star","type":"switcher","default":"true"},{"name":"star","label":"Star","type":"select","options":{"one-star":"1 Star","two-star":"2 Star","three-star":"3 Star","four-star":"4 Star","five-star":"5 Star"},"default":"five-star"},{"name":"align","label":"Alignment","type":"choose","control_type":"responsive","options":{"left":{"title":"Left","icon":"eicon-text-align-left"},"center":{"title":"Center","icon":"eicon-text-align-center"},"right":{"title":"Right","icon":"eicon-text-align-right"},"justify":{"title":"Justified","icon":"eicon-text-align-justify"}},"selectors":{"{{WRAPPER}} .pxl-project-detail1":"text-align: {{VALUE}};"}}]},{"name":"section_style","label":"Style","tab":"style","controls":[{"name":"title_color","label":"Title Color","type":"color","selectors":{"{{WRAPPER}} .pxl-item--title":"color: {{VALUE}};"}},{"name":"title_typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-item--title"},{"name":"sub_color","label":"Position Color","type":"color","selectors":{"{{WRAPPER}} .pxl-item--position":"color: {{VALUE}};"}},{"name":"sub_typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-item--position"},{"name":"sub_spacer_bottom","label":"Position Spacer Bottom","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":3000}},"selectors":{"{{WRAPPER}} .pxl-item--position":"margin-bottom: {{SIZE}}{{UNIT}};"}},{"name":"content_color","label":"Content Color","type":"color","selectors":{"{{WRAPPER}} .pxl-item-content":"color: {{VALUE}};"}},{"name":"content_typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-item-content"},{"name":"box_bg_color","label":"Box Background Color","type":"color","selectors":{"{{WRAPPER}} .pxl-clients-feedback1":"background-color: {{VALUE}};"}},{"name":"box_padding","label":"Box Padding","type":"dimensions","size_units":["px"],"selectors":{"{{WRAPPER}} .pxl-clients-feedback1":"padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"},"control_type":"responsive"},{"name":"box_border_radius","label":"Box Border Radius","type":"dimensions","size_units":["px"],"selectors":{"{{WRAPPER}} .pxl-clients-feedback1":"border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"}}]},{"name":"section_animation","label":"Animation","tab":"style","condition":[],"controls":[{"name":"pxl_animate","label":"Case Animate","type":"select","options":{"":"None","wow bounce":"bounce","wow flash":"flash","wow pulse":"pulse","wow rubberBand":"rubberBand","wow shake":"shake","wow swing":"swing","wow tada":"tada","wow wobble":"wobble","wow bounceIn":"bounceIn","wow bounceInDown":"bounceInDown","wow bounceInLeft":"bounceInLeft","wow bounceInRight":"bounceInRight","wow bounceInUp":"bounceInUp","wow bounceOut":"bounceOut","wow bounceOutDown":"bounceOutDown","wow bounceOutLeft":"bounceOutLeft","wow bounceOutRight":"bounceOutRight","wow bounceOutUp":"bounceOutUp","wow fadeIn":"fadeIn","wow fadeInDown":"fadeInDown","wow fadeInDownBig":"fadeInDownBig","wow fadeInLeft":"fadeInLeft","wow fadeInLeftBig":"fadeInLeftBig","wow fadeInRight":"fadeInRight","wow fadeInRightBig":"fadeInRightBig","wow fadeInUp":"fadeInUp","wow fadeInUpBig":"fadeInUpBig","wow fadeOut":"fadeOut","wow fadeOutDown":"fadeOutDown","wow fadeOutDownBig":"fadeOutDownBig","wow fadeOutLeft":"fadeOutLeft","wow fadeOutLeftBig":"fadeOutLeftBig","wow fadeOutRight":"fadeOutRight","wow fadeOutRightBig":"fadeOutRightBig","wow fadeOutUp":"fadeOutUp","wow fadeOutUpBig":"fadeOutUpBig","wow flip":"flip","wow flipInX":"flipInX","wow flipInY":"flipInY","wow flipOutX":"flipOutX","wow flipOutY":"flipOutY","wow lightSpeedIn":"lightSpeedIn","wow lightSpeedOut":"lightSpeedOut","wow rotateIn":"rotateIn","wow rotateInDownLeft":"rotateInDownLeft","wow rotateInDownRight":"rotateInDownRight","wow rotateInUpLeft":"rotateInUpLeft","wow rotateInUpRight":"rotateInUpRight","wow rotateOut":"rotateOut","wow rotateOutDownLeft":"rotateOutDownLeft","wow rotateOutDownRight":"rotateOutDownRight","wow rotateOutUpLeft":"rotateOutUpLeft","wow rotateOutUpRight":"rotateOutUpRight","wow hinge":"hinge","wow rollIn":"rollIn","wow rollOut":"rollOut","wow zoomIn":"zoomIn","wow zoomInDown":"zoomInDown","wow zoomInLeft":"zoomInLeft","wow zoomInRight":"zoomInRight","wow zoomInUp":"zoomInUp","wow zoomOut":"zoomOut","wow zoomOutDown":"zoomOutDown","wow zoomOutLeft":"zoomOutLeft","wow zoomOutRight":"zoomOutRight","wow zoomOutUp":"zoomOutUp"},"default":""},{"name":"pxl_animate_delay","label":"Animate Delay","type":"text","default":"0","description":"Enter number. Default 0ms"}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}