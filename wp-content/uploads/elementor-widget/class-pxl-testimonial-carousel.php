<?php

class PxlTestimonialCarousel_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_testimonial_carousel';
    protected $title = 'Testimonial Carousel Pxl';
    protected $icon = 'eicon-testimonial';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"section_layout","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost\/manhinhaptech\/wp-content\/themes\/digicove\/elements\/templates\/pxl_testimonial_carousel\/img-layout\/layout1.jpg"},"2":{"label":"Layout 2","image":"http:\/\/localhost\/manhinhaptech\/wp-content\/themes\/digicove\/elements\/templates\/pxl_testimonial_carousel\/img-layout\/layout2.jpg"},"3":{"label":"Layout 3","image":"http:\/\/localhost\/manhinhaptech\/wp-content\/themes\/digicove\/elements\/templates\/pxl_testimonial_carousel\/img-layout\/layout3.jpg"},"4":{"label":"Layout 4","image":"http:\/\/localhost\/manhinhaptech\/wp-content\/themes\/digicove\/elements\/templates\/pxl_testimonial_carousel\/img-layout\/layout4.jpg"},"5":{"label":"Layout 5","image":"http:\/\/localhost\/manhinhaptech\/wp-content\/themes\/digicove\/elements\/templates\/pxl_testimonial_carousel\/img-layout\/layout5.jpg"}}}]},{"name":"section_content","label":"Content","tab":"content","controls":[{"name":"testimonial","label":"Testimonial","type":"repeater","condition":{"layout":["1","2","3","4","5"]},"controls":[{"name":"image","label":"Image","type":"media"},{"name":"title","label":"Title","type":"text","label_block":true},{"name":"position","label":"Position","type":"text"},{"name":"desc","label":"Description","type":"textarea","rows":10,"show_label":false},{"name":"show_star","label":"Show Star","type":"switcher","default":"true"},{"name":"star","label":"Star","type":"select","options":{"one-star":"1 Star","two-star":"2 Star","three-star":"3 Star","four-star":"4 Star","five-star":"5 Star"},"default":"five-star"}],"title_field":"{{{ title }}}"}]},{"name":"section_style_box","label":"Box Active","tab":"style","controls":[{"name":"box_padding","label":"Padding Box","type":"dimensions","size_units":["px"],"selectors":{"{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner":"padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"},"control_type":"responsive"},{"name":"box_background","label":"Background Color","type":"color","selectors":{"{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner":"background: {{VALUE}};"}},{"name":"divider_border","label":"Divider Border Color","type":"color","selectors":{"{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner .pxl-item-body":"border-color: {{VALUE}};"}},{"name":"box_gradient","label":"Background Type","type":"background","control_type":"group","types":["gradient"],"selector":"{{WRAPPER}} .pxl-testimonial-carousel .pxl-swiper-slide.swiper-slide-active .pxl-item--inner"},{"name":"title_color_active","label":"Title Color Active","type":"color","selectors":{"{{WRAPPER}} .pxl-testimonial-carousel .pxl-swiper-slide.swiper-slide-active .pxl-item--title":"color: {{VALUE}};"}},{"name":"position_color_active","label":"Position Color Active","type":"color","selectors":{"{{WRAPPER}} .pxl-testimonial-carousel .pxl-swiper-slide.swiper-slide-active .pxl-item--position":"color: {{VALUE}};"}},{"name":"desc_color_active","label":"Description Color Active","type":"color","selectors":{"{{WRAPPER}} .pxl-testimonial-carousel .pxl-swiper-slide.swiper-slide-active .pxl-item--desc":"color: {{VALUE}};"}}]},{"name":"section_style_image","label":"Image","tab":"style","controls":[{"name":"image_position","label":"Image Bottom","type":"slider","control_type":"responsive","size_units":["px","%"],"range":{"px":{"min":0,"max":3000}},"selectors":{"{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner .pxl-item-body":"bottom: {{SIZE}}{{UNIT}};"}},{"name":"image_width","label":"Image Width","type":"slider","control_type":"responsive","size_units":["px","%"],"range":{"px":{"min":0,"max":3000}},"selectors":{"{{WRAPPER}} .pxl-testimonial-carousel .pxl-item-body .pxl-item--image":"max-width: {{SIZE}}{{UNIT}};"}}]},{"name":"section_style_title","label":"Title","tab":"style","controls":[{"name":"title_color","label":"Color","type":"color","selectors":{"{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--title":"color: {{VALUE}};"}},{"name":"title_typography","label":"Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--title"},{"name":"show_title","label":"Show Title","type":"switcher","condition":{"layout":["1","3","4","5"]}}]},{"name":"section_style_icon","label":"Icon","tab":"style","controls":[{"name":"icon_width","label":"Icon width","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":300}},"selectors":{"{{WRAPPER}} .pxl-testimonial-carousel svg":"width: {{SIZE}}{{UNIT}};"}},{"name":"icon_height","label":"Icon height","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":300}},"selectors":{"{{WRAPPER}} .pxl-testimonial-carousel svg":"height: {{SIZE}}{{UNIT}};"}},{"name":"icon_bottom_spacer","label":"Icon Bottom Spacer","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":300}},"selectors":{"{{WRAPPER}} .pxl-testimonial-carousel svg":"margin-bottom: {{SIZE}}{{UNIT}} !important;"}},{"name":"icon_color","label":"Color","type":"color","selectors":{"{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--icon svg path":"fill: {{VALUE}};","{{WRAPPER}} .pxl-testimonial-carousel svg path":"fill: {{VALUE}};"}},{"name":"icon_background","label":"Background","type":"color","selectors":{"{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--icon:after":"background: {{VALUE}};"}},{"name":"icon_background_image","label":"Background Image","type":"color","selectors":{"{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--image":"background: {{VALUE}};"}},{"name":"icon_background_image_active","label":"Background Image Active","type":"color","selectors":{"{{WRAPPER}} .pxl-testimonial-carousel .swiper-slide-active .pxl-item--image":"background: {{VALUE}};"}}]},{"name":"section_style_position","label":"Position","tab":"style","controls":[{"name":"position_color","label":"Color","type":"color","selectors":{"{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--position":"color: {{VALUE}};"}},{"name":"position_typography","label":"Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--position"},{"name":"show_postion","label":"Show Position","type":"switcher","condition":{"layout":["1","3","4","5"]}}]},{"name":"section_style_desc","label":"Description","tab":"style","controls":[{"name":"desc_color","label":"Color","type":"color","selectors":{"{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--desc":"color: {{VALUE}};"}},{"name":"desc_typography","label":"Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--desc"},{"name":"desc_width","label":"Max Width","type":"slider","control_type":"responsive","size_units":["px","%"],"range":{"px":{"min":0,"max":3000}},"selectors":{"{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--desc":"max-width: {{SIZE}}{{UNIT}};"}}]},{"name":"section_settings_carousel","label":"Settings","tab":"settings","controls":[{"name":"item_padding","label":"Item Padding","type":"dimensions","size_units":["px"],"selectors":{"{{WRAPPER}} .pxl-swiper-slide":"padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"},"control_type":"responsive"},{"name":"col_xs","label":"Columns XS Devices","type":"select","default":"1","options":{"auto":"Auto","1":"1","2":"2","3":"3","4":"4","6":"6"}},{"name":"col_sm","label":"Columns SM Devices","type":"select","default":"2","options":{"auto":"Auto","1":"1","2":"2","3":"3","4":"4","6":"6"}},{"name":"col_md","label":"Columns MD Devices","type":"select","default":"3","options":{"auto":"Auto","1":"1","2":"2","3":"3","4":"4","6":"6"}},{"name":"col_lg","label":"Columns LG Devices","type":"select","default":"3","options":{"auto":"Auto","1":"1","2":"2","3":"3","4":"4","6":"6"}},{"name":"col_xl","label":"Columns XL Devices","type":"select","default":"3","options":{"auto":"Auto","1":"1","2":"2","3":"3","4":"4","5":"5","6":"6"}},{"name":"col_xxl","label":"Columns XXL Devices","type":"select","default":"inherit","options":{"1":"1","2":"2","3":"3","4":"4","5":"5","6":"6","inherit":"Inherit"}},{"name":"slides_to_scroll","label":"Slides to scroll","type":"select","default":"1","options":{"1":"1","2":"2","3":"3","4":"4","5":"5","6":"6"}},{"name":"arrows","label":"Show Arrows","type":"switcher"},{"name":"arrows_type","label":"Arrows Type","type":"select","default":"style1","options":{"style1":"Default","style2":"Style2"},"condition":{"arrows":"true"}},{"name":"pagination","label":"Show Pagination","type":"switcher","default":"false"},{"name":"pagination_type","label":"Pagination Type","type":"select","default":"bullets","options":{"bullets":"Bullets","fraction":"Fraction"},"condition":{"pagination":"true"}},{"name":"bullets_color","label":"Bullets Color","type":"color","selectors":{"{{WRAPPER}} .pxl-swiper-dots .pxl-swiper-pagination-bullet":"background-color: {{VALUE}};"},"condition":{"pagination_type":"bullets","pagination":"true"}},{"name":"active_bullets_color","label":"Bullets Color Active","type":"color","selectors":{"{{WRAPPER}} .pxl-swiper-dots .swiper-pagination-bullet-active":"background-color: {{VALUE}};"},"condition":{"pagination_type":"bullets","pagination":"true"}},{"name":"center","label":"Center","type":"switcher","default":"false"},{"name":"pause_on_hover","label":"Pause on Hover","type":"switcher"},{"name":"autoplay","label":"Autoplay","type":"switcher"},{"name":"autoplay_speed","label":"Autoplay Speed","type":"number","default":5000,"condition":{"autoplay":"true"}},{"name":"infinite","label":"Infinite Loop","type":"switcher"},{"name":"speed","label":"Animation Speed","type":"number","default":500}]},{"name":"section_animation","label":"Animation","tab":"style","condition":[],"controls":[{"name":"pxl_animate","label":"Case Animate","type":"select","options":{"":"None","wow bounce":"bounce","wow flash":"flash","wow pulse":"pulse","wow rubberBand":"rubberBand","wow shake":"shake","wow swing":"swing","wow tada":"tada","wow wobble":"wobble","wow bounceIn":"bounceIn","wow bounceInDown":"bounceInDown","wow bounceInLeft":"bounceInLeft","wow bounceInRight":"bounceInRight","wow bounceInUp":"bounceInUp","wow bounceOut":"bounceOut","wow bounceOutDown":"bounceOutDown","wow bounceOutLeft":"bounceOutLeft","wow bounceOutRight":"bounceOutRight","wow bounceOutUp":"bounceOutUp","wow fadeIn":"fadeIn","wow fadeInDown":"fadeInDown","wow fadeInDownBig":"fadeInDownBig","wow fadeInLeft":"fadeInLeft","wow fadeInLeftBig":"fadeInLeftBig","wow fadeInRight":"fadeInRight","wow fadeInRightBig":"fadeInRightBig","wow fadeInUp":"fadeInUp","wow fadeInUpBig":"fadeInUpBig","wow fadeOut":"fadeOut","wow fadeOutDown":"fadeOutDown","wow fadeOutDownBig":"fadeOutDownBig","wow fadeOutLeft":"fadeOutLeft","wow fadeOutLeftBig":"fadeOutLeftBig","wow fadeOutRight":"fadeOutRight","wow fadeOutRightBig":"fadeOutRightBig","wow fadeOutUp":"fadeOutUp","wow fadeOutUpBig":"fadeOutUpBig","wow flip":"flip","wow flipInX":"flipInX","wow flipInY":"flipInY","wow flipOutX":"flipOutX","wow flipOutY":"flipOutY","wow lightSpeedIn":"lightSpeedIn","wow lightSpeedOut":"lightSpeedOut","wow rotateIn":"rotateIn","wow rotateInDownLeft":"rotateInDownLeft","wow rotateInDownRight":"rotateInDownRight","wow rotateInUpLeft":"rotateInUpLeft","wow rotateInUpRight":"rotateInUpRight","wow rotateOut":"rotateOut","wow rotateOutDownLeft":"rotateOutDownLeft","wow rotateOutDownRight":"rotateOutDownRight","wow rotateOutUpLeft":"rotateOutUpLeft","wow rotateOutUpRight":"rotateOutUpRight","wow hinge":"hinge","wow rollIn":"rollIn","wow rollOut":"rollOut","wow zoomIn":"zoomIn","wow zoomInDown":"zoomInDown","wow zoomInLeft":"zoomInLeft","wow zoomInRight":"zoomInRight","wow zoomInUp":"zoomInUp","wow zoomOut":"zoomOut","wow zoomOutDown":"zoomOutDown","wow zoomOutLeft":"zoomOutLeft","wow zoomOutRight":"zoomOutRight","wow zoomOutUp":"zoomOutUp"},"default":""},{"name":"pxl_animate_delay","label":"Animate Delay","type":"text","default":"0","description":"Enter number. Default 0ms"}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'swiper','pxl-swiper' );
}