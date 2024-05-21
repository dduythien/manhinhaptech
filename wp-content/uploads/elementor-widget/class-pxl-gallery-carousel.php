<?php

class PxlGalleryCarousel_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_gallery_carousel';
    protected $title = 'BR Gallery Carousel';
    protected $icon = 'eicon-slider-push';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"section_layout","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"https:\/\/demo.bravisthemes.com\/digicove\/wp-content\/themes\/digicove\/elements\/templates\/pxl_gallery_carousel\/img-layout\/layout1.jpg"}}}]},{"name":"section_content","label":"Content","tab":"content","controls":[{"name":"list","label":"List","type":"repeater","default":[],"controls":[{"name":"image","label":"Image","type":"media"},{"name":"link","label":"Link","type":"url","label_block":true}]}]},{"name":"section_settings_carousel","label":"Settings","tab":"settings","controls":[{"name":"img_size","label":"Image Size","type":"text","description":"Enter image size (Example: \"thumbnail\", \"medium\", \"large\", \"full\" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height))."},{"name":"col_xs","label":"Columns XS Devices","type":"select","default":"1","options":{"auto":"Auto","1":"1","2":"2","3":"3","4":"4","6":"6"}},{"name":"col_sm","label":"Columns SM Devices","type":"select","default":"1","options":{"auto":"Auto","1":"1","2":"2","3":"3","4":"4","6":"6"}},{"name":"col_md","label":"Columns MD Devices","type":"select","default":"1","options":{"auto":"Auto","1":"1","2":"2","3":"3","4":"4","6":"6"}},{"name":"col_lg","label":"Columns LG Devices","type":"select","default":"1","options":{"auto":"Auto","1":"1","2":"2","3":"3","4":"4","6":"6"}},{"name":"col_xl","label":"Columns XL Devices","type":"select","default":"1","options":{"auto":"Auto","1":"1","2":"2","3":"3","4":"4","5":"5","6":"6"}},{"name":"col_xxl","label":"Columns XXL Devices","type":"select","default":"inherit","options":{"1":"1","2":"2","3":"3","4":"4","5":"5","6":"6","inherit":"Inherit"}},{"name":"slides_to_scroll","label":"Slides to scroll","type":"select","default":"1","options":{"1":"1","2":"2","3":"3","4":"4","5":"5","6":"6"}},{"name":"item_padding","label":"Item Padding","type":"dimensions","size_units":["px"],"default":{"top":"15","right":"15","bottom":"15","left":"15"},"selectors":{"{{WRAPPER}} .pxl-swiper-container":"margin-top: -{{TOP}}{{UNIT}}; margin-right: -{{RIGHT}}{{UNIT}}; margin-bottom: -{{BOTTOM}}{{UNIT}}; margin-left: -{{LEFT}}{{UNIT}};","{{WRAPPER}} .pxl-swiper-container .pxl-swiper-slide":"padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"},"control_type":"responsive"},{"name":"arrows","label":"Show Arrows","type":"switcher"},{"name":"arrows_style","label":"Arrows Style","type":"select","options":{"style1":"Style 1","style2":"Style 2","style3":"Style 3","style4":"Style 4"},"default":"style1","condition":{"arrows":"true"}},{"name":"pagination","label":"Show Pagination","type":"switcher","default":"false"},{"name":"pagination_type","label":"Pagination Type","type":"select","default":"bullets","options":{"bullets":"Bullets","fraction":"Fraction"},"condition":{"pagination":"true"}},{"name":"pagination_margin","label":"Pagination Margin","type":"dimensions","control_type":"responsive","size_units":["px","%","vw","vh"],"default":{"unit":"px"},"selectors":{"{{WRAPPER}} .pxl-swiper-dots":"margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"},"condition":{"pagination":"true"}},{"name":"bullets_color","label":"Bullets Color","type":"color","selectors":{"{{WRAPPER}} .pxl-swiper-dots .pxl-swiper-pagination-bullet:before":"background-color: {{VALUE}};"},"condition":{"pagination_type":"bullets","pagination":"true"}},{"name":"darkmode_bullets_color","label":"Bullets Color (Dark Mode)","type":"color","selectors":{".dark-mode {{WRAPPER}} .pxl-swiper-dots .pxl-swiper-pagination-bullet:before":"background-color: {{VALUE}};"},"condition":{"pagination_type":"bullets","pagination":"true"}},{"name":"active_bullets_color","label":"Bullets Color Active","type":"color","selectors":{"{{WRAPPER}} .pxl-swiper-dots .swiper-pagination-bullet-active:before":"background-color: {{VALUE}};"},"condition":{"pagination_type":"bullets","pagination":"true"}},{"name":"darkmode_active_bullets_color","label":"Bullets Color Active (Dark Mode)","type":"color","selectors":{".dark-mode {{WRAPPER}} .pxl-swiper-dots .swiper-pagination-bullet-active:before":"background-color: {{VALUE}};"},"condition":{"pagination_type":"bullets","pagination":"true"}},{"name":"fraction_color","label":"Fraction Color","type":"color","selectors":{"{{WRAPPER}} .pxl-swiper-dots.pxl-swiper-pagination-fraction":"color: {{VALUE}};"},"condition":{"pagination_type":"fraction","pagination":"true"}},{"name":"darkmode_fraction_color","label":"Fraction Color (Dark Mode)","type":"color","selectors":{".dark-mode {{WRAPPER}} .pxl-swiper-dots.pxl-swiper-pagination-fraction":"color: {{VALUE}};"},"condition":{"pagination_type":"fraction","pagination":"true"}},{"name":"pause_on_hover","label":"Pause on Hover","type":"switcher","separator":"before"},{"name":"autoplay","label":"Autoplay","type":"switcher"},{"name":"reverse","label":"Reverse Direction","type":"switcher","condition":{"autoplay":"true"}},{"name":"autoplay_speed","label":"Autoplay Speed","type":"number","default":5000,"condition":{"autoplay":"true"}},{"name":"infinite","label":"Infinite Loop","type":"switcher"},{"name":"speed","label":"Animation Speed","type":"number","default":500}]},{"name":"section_animation","label":"Animation","tab":"style","condition":[],"controls":[{"name":"pxl_animate","label":"Case Animate","type":"select","options":{"":"None","wow bounce":"bounce","wow flash":"flash","wow pulse":"pulse","wow rubberBand":"rubberBand","wow shake":"shake","wow swing":"swing","wow tada":"tada","wow wobble":"wobble","wow bounceIn":"bounceIn","wow bounceInDown":"bounceInDown","wow bounceInLeft":"bounceInLeft","wow bounceInRight":"bounceInRight","wow bounceInUp":"bounceInUp","wow bounceOut":"bounceOut","wow bounceOutDown":"bounceOutDown","wow bounceOutLeft":"bounceOutLeft","wow bounceOutRight":"bounceOutRight","wow bounceOutUp":"bounceOutUp","wow fadeIn":"fadeIn","wow fadeInDown":"fadeInDown","wow fadeInDownBig":"fadeInDownBig","wow fadeInLeft":"fadeInLeft","wow fadeInLeftBig":"fadeInLeftBig","wow fadeInRight":"fadeInRight","wow fadeInRightBig":"fadeInRightBig","wow fadeInUp":"fadeInUp","wow fadeInUpBig":"fadeInUpBig","wow fadeOut":"fadeOut","wow fadeOutDown":"fadeOutDown","wow fadeOutDownBig":"fadeOutDownBig","wow fadeOutLeft":"fadeOutLeft","wow fadeOutLeftBig":"fadeOutLeftBig","wow fadeOutRight":"fadeOutRight","wow fadeOutRightBig":"fadeOutRightBig","wow fadeOutUp":"fadeOutUp","wow fadeOutUpBig":"fadeOutUpBig","wow flip":"flip","wow flipInX":"flipInX","wow flipInY":"flipInY","wow flipOutX":"flipOutX","wow flipOutY":"flipOutY","wow lightSpeedIn":"lightSpeedIn","wow lightSpeedOut":"lightSpeedOut","wow rotateIn":"rotateIn","wow rotateInDownLeft":"rotateInDownLeft","wow rotateInDownRight":"rotateInDownRight","wow rotateInUpLeft":"rotateInUpLeft","wow rotateInUpRight":"rotateInUpRight","wow rotateOut":"rotateOut","wow rotateOutDownLeft":"rotateOutDownLeft","wow rotateOutDownRight":"rotateOutDownRight","wow rotateOutUpLeft":"rotateOutUpLeft","wow rotateOutUpRight":"rotateOutUpRight","wow hinge":"hinge","wow rollIn":"rollIn","wow rollOut":"rollOut","wow zoomIn":"zoomIn","wow zoomInDown":"zoomInDown","wow zoomInLeft":"zoomInLeft","wow zoomInRight":"zoomInRight","wow zoomInUp":"zoomInUp","wow zoomOut":"zoomOut","wow zoomOutDown":"zoomOutDown","wow zoomOutLeft":"zoomOutLeft","wow zoomOutRight":"zoomOutRight","wow zoomOutUp":"zoomOutUp"},"default":""},{"name":"pxl_animate_delay","label":"Animate Delay","type":"text","default":"0","description":"Enter number. Default 0ms"}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'swiper','pxl-swiper' );
}