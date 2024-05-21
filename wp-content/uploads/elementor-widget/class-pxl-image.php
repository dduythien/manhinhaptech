<?php

class PxlImage_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_image';
    protected $title = 'Image Pxl';
    protected $icon = 'eicon-image';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"tab_content","label":"Content","tab":"content","controls":[{"name":"image","label":"Choose Image","type":"media"},{"name":"image_link","label":"Link","type":"url"},{"name":"image_type","label":"Image Type","type":"select","options":{"img":"Image","bg":"Background"},"default":"img"},{"name":"img_size","label":"Image Size","type":"text","description":"Enter image size (Example: &quot;thumbnail&quot;, &quot;medium&quot;, &quot;large&quot;, &quot;full&quot; or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).","condition":{"image_type":"img"}},{"name":"image_align","label":"Image Alignment","type":"choose","control_type":"responsive","options":{"left":{"title":"Left","icon":"fa fa-align-left"},"center":{"title":"Center","icon":"fa fa-align-center"},"right":{"title":"Right","icon":"fa fa-align-right"}},"selectors":{"{{WRAPPER}} .pxl-image-single":"text-align: {{VALUE}};"}}]},{"name":"tab_style_img","label":"Image","tab":"style","controls":[{"name":"image_max_height","label":"Image Height","type":"slider","description":"Enter number.","condition":{"image_type":"img"},"range":{"px":{"min":0,"max":3000}},"control_type":"responsive","selectors":{"{{WRAPPER}} .pxl-image-single img":"max-height: {{SIZE}}{{UNIT}};"}},{"name":"image_height","label":"Image Height","type":"slider","description":"Enter number.","condition":{"image_type":"bg"},"range":{"px":{"min":0,"max":3000}},"control_type":"responsive","selectors":{"{{WRAPPER}} .pxl-image-single .pxl-image-bg":"height: {{SIZE}}{{UNIT}};"}},{"name":"image_width","label":"Image Width","type":"choose","control_type":"responsive","options":{"100%":{"title":"100%","icon":"eicon-text-align-justify"},"auto":{"title":"Auto","icon":"eicon-h-align-stretch"}},"selectors":{"{{WRAPPER}} .pxl-image-single img, {{WRAPPER}} .pxl-image-single .pxl-item--inner":"width: {{VALUE}};"}},{"name":"img_effect","label":"Image Effect","type":"select","options":{"":"None","pxl-image-effect1":"Zigzag","pxl-image-tilt":"Tilt","wow skewIn":"SkewIn","slide-top-to-bottom":"Slide Top To Bottom ","pxl-image-effect2":"Slide Bottom To Top ","slide-right-to-left":"Slide Right To Left ","slide-left-to-right":"Slide Left To Right "},"default":"","condition":{"image_type":"img"}}]},{"name":"section_animation","label":"Animation","tab":"style","condition":[],"controls":[{"name":"pxl_animate","label":"Case Animate","type":"select","options":{"":"None","wow bounce":"bounce","wow flash":"flash","wow pulse":"pulse","wow rubberBand":"rubberBand","wow shake":"shake","wow swing":"swing","wow tada":"tada","wow wobble":"wobble","wow bounceIn":"bounceIn","wow bounceInDown":"bounceInDown","wow bounceInLeft":"bounceInLeft","wow bounceInRight":"bounceInRight","wow bounceInUp":"bounceInUp","wow bounceOut":"bounceOut","wow bounceOutDown":"bounceOutDown","wow bounceOutLeft":"bounceOutLeft","wow bounceOutRight":"bounceOutRight","wow bounceOutUp":"bounceOutUp","wow fadeIn":"fadeIn","wow fadeInDown":"fadeInDown","wow fadeInDownBig":"fadeInDownBig","wow fadeInLeft":"fadeInLeft","wow fadeInLeftBig":"fadeInLeftBig","wow fadeInRight":"fadeInRight","wow fadeInRightBig":"fadeInRightBig","wow fadeInUp":"fadeInUp","wow fadeInUpBig":"fadeInUpBig","wow fadeOut":"fadeOut","wow fadeOutDown":"fadeOutDown","wow fadeOutDownBig":"fadeOutDownBig","wow fadeOutLeft":"fadeOutLeft","wow fadeOutLeftBig":"fadeOutLeftBig","wow fadeOutRight":"fadeOutRight","wow fadeOutRightBig":"fadeOutRightBig","wow fadeOutUp":"fadeOutUp","wow fadeOutUpBig":"fadeOutUpBig","wow flip":"flip","wow flipInX":"flipInX","wow flipInY":"flipInY","wow flipOutX":"flipOutX","wow flipOutY":"flipOutY","wow lightSpeedIn":"lightSpeedIn","wow lightSpeedOut":"lightSpeedOut","wow rotateIn":"rotateIn","wow rotateInDownLeft":"rotateInDownLeft","wow rotateInDownRight":"rotateInDownRight","wow rotateInUpLeft":"rotateInUpLeft","wow rotateInUpRight":"rotateInUpRight","wow rotateOut":"rotateOut","wow rotateOutDownLeft":"rotateOutDownLeft","wow rotateOutDownRight":"rotateOutDownRight","wow rotateOutUpLeft":"rotateOutUpLeft","wow rotateOutUpRight":"rotateOutUpRight","wow hinge":"hinge","wow rollIn":"rollIn","wow rollOut":"rollOut","wow zoomIn":"zoomIn","wow zoomInDown":"zoomInDown","wow zoomInLeft":"zoomInLeft","wow zoomInRight":"zoomInRight","wow zoomInUp":"zoomInUp","wow zoomOut":"zoomOut","wow zoomOutDown":"zoomOutDown","wow zoomOutLeft":"zoomOutLeft","wow zoomOutRight":"zoomOutRight","wow zoomOutUp":"zoomOutUp"},"default":""},{"name":"pxl_animate_delay","label":"Animate Delay","type":"text","default":"0","description":"Enter number. Default 0ms"}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'tilt' );
}