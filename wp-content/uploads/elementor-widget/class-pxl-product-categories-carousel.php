<?php

class PxlProductCategoriesCarousel_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_product_categories_carousel';
    protected $title = 'Pxl Product Categories Carousel';
    protected $icon = 'eicon-posts-ticker';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"title_section","label":"El Title","tab":"content","controls":[{"name":"image","label":"Image Filter","type":"media"},{"name":"title_text","label":"El Title","type":"text","placeholder":"Enter your El title","label_block":true},{"name":"el_title_color","label":"Title Color","type":"color","selectors":{"{{WRAPPER}} .wp-meta .el--title":"color: {{VALUE}};"}},{"name":"el_title_typography","label":"Title Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .wp-meta .el--title"},{"name":"date","label":"Event Date","type":"text","label_block":true,"description":"Set date count down (Date format: yy\/mm\/dd)","condition":{"layout":["3"]}},{"name":"percent","label":"Percentage","type":"slider","default":{"size":50,"unit":"%"},"label_block":true,"condition":{"layout":["2"]}}]},{"name":"source_section","label":"Source","tab":"content","controls":[{"name":"query_type","label":"Select Query Type","type":"select","default":"recent_product","options":{"recent_product":"Recent Products","best_selling":"Best Selling","featured_product":"Featured Products","top_rate":"High Rate","on_sale":"On Sale","recent_review":"Recent Review","deals":"Product Deals","separate":"Product separate"}},{"name":"taxonomies","label":"Select Term of Product","type":"select2","multiple":true,"options":[]},{"name":"product_ids","label":"Products id (123,124,135...)","type":"text","default":"","condition":{"query_type":"separate"}},{"name":"filter","label":"Filter on Carousel","type":"select","default":"false","options":{"true":"Enable","false":"Disable"}},{"name":"filter_default_title","label":"Filter Default Title","type":"text","default":"All"},{"name":"post_per_page","label":"Post per page","type":"text","default":"10"},{"name":"style","label":"Style","type":"select","options":{"style1":"Default","style2":"Available Product Numbers","style3":"Style 3","style4":"Style 4"},"default":"style1"}]},{"name":"section_carousel_settings","label":"Carousel","tab":"content","controls":[{"name":"thumbnail","type":"image-size","control_type":"group","default":"custom"},{"name":"show_category","label":"Show Category","type":"switcher","default":"true"},{"name":"col_xs","label":"Columns XS Devices","type":"select","default":"1","options":{"1":"1","2":"2","3":"3","4":"4","6":"6"}},{"name":"col_sm","label":"Columns SM Devices","type":"select","default":"2","options":{"1":"1","2":"2","3":"3","4":"4","6":"6"}},{"name":"col_md","label":"Columns MD Devices","type":"select","default":"3","options":{"1":"1","2":"2","3":"3","4":"4","6":"6"}},{"name":"col_lg","label":"Columns LG Devices","type":"select","default":"3","options":{"1":"1","2":"2","3":"3","4":"4","6":"6"}},{"name":"col_xl","label":"Columns XL Devices","type":"select","default":"3","options":{"1":"1","2":"2","3":"3","4":"4","6":"6"}},{"name":"col_xxl","label":"Columns XXL Devices","type":"select","default":"inherit","options":{"1":"1","2":"2","3":"3","4":"4","5":"5","6":"6","inherit":"Inherit"}},{"name":"slides_to_scroll","label":"Slides to scroll","type":"select","default":"1","options":{"1":"1","2":"2","3":"3","4":"4","6":"6"}},{"name":"arrows","label":"Show Arrows","type":"switcher","default":"false"},{"name":"pagination","label":"Show Pagination","type":"switcher","default":"false"},{"name":"pagination_type","label":"Pagination Type","type":"select","default":"bullets","options":{"bullets":"Bullets","fraction":"Fraction"},"condition":{"pagination":"true"}},{"name":"pause_on_hover","label":"Pause on Hover","type":"switcher","default":"true"},{"name":"autoplay","label":"Autoplay","type":"switcher","default":"false"},{"name":"autoplay_speed","label":"Autoplay Speed","type":"number","default":5000,"condition":{"autoplay":"false"}},{"name":"infinite","label":"Infinite Loop","type":"switcher","default":"true"},{"name":"speed","label":"Animation Speed","type":"number","default":500}]},{"name":"section_style_title","label":"Style Color","tab":"style","controls":[{"name":"title_color","label":"Title Color","type":"color","selectors":{"{{WRAPPER}} .pxl-product-carousel .woocommerce-product-inner .woocommerce-product-content .woocommerce-product--title a":"color: {{VALUE}} !important;","{{WRAPPER}} .pxl-product-carousel .woocommerce-product-inner .woocommerce-product-content .woocommerce-available-product--numbers .woocommerce-available-product--number":"color: {{VALUE}} !important;"}},{"name":"title_color_hover","label":"Title Color Hover","type":"color","selectors":{"{{WRAPPER}} .pxl-product-carousel .woocommerce-product-inner .woocommerce-product-content .woocommerce-product--title:hover a":"color: {{VALUE}} !important;"}},{"name":"btn_meta_bgr","label":"Btn Meta Background","type":"color","selectors":{"{{WRAPPER}} .pxl-product-carousel .woocommerce-product-inner .woocommerce-product-header .woocommerce-product-meta a":"background-color: {{VALUE}} !important;","{{WRAPPER}} .pxl-product-carousel .woocommerce-product-inner .woocommerce-product-header .woocommerce-product-meta button":"background-color: {{VALUE}} !important;"}},{"name":"btn_meta_bgr_hover","label":"Btn Meta Background Hover","type":"color","selectors":{"{{WRAPPER}} .pxl-product-carousel .woocommerce-product-inner .woocommerce-product-header .woocommerce-product-meta a:hover":"background-color: {{VALUE}} !important;","{{WRAPPER}} .pxl-product-carousel .woocommerce-product-inner .woocommerce-product-header .woocommerce-product-meta button:hover":"background-color: {{VALUE}} !important;"}},{"name":"btn_cart_bgr","label":"Btn Cart Background","type":"color","selectors":{"{{WRAPPER}} .pxl-product-carousel .woocommerce-product-inner .woocommerce-product-content .woocommerce-product-meta2 .woocommerce-add-to-cart a":"background-color: {{VALUE}} !important;"}},{"name":"btn_cart_bgr_hv","label":"Btn Cart Background Hover","type":"color","selectors":{"{{WRAPPER}} .pxl-product-carousel .woocommerce-product-inner .woocommerce-product-content .woocommerce-product-meta2 .woocommerce-add-to-cart a:hover":"background-color: {{VALUE}} !important;"}},{"name":"bgr_arrow_hover","label":"Background Arrow Hover","type":"color","selectors":{"{{WRAPPER}} .pxl-product-carousel .pxl-carousel-inner .pxl-swiper-arrow-wrap .pxl-swiper-arrow:hover":"background-color: {{VALUE}} !important;"}}]},{"name":"carousel_setting_cursor","label":"Cursor Settings","tab":"settings","controls":[{"name":"cursor_arrow","label":"Cursor Arrow","type":"switcher","condition":{"arrows":"true"}},{"name":"cursor_drag","label":"Cursor Drag","type":"switcher"}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'swiper','pxl-swiper','pxl-countdown','pxl-progressbar','digicove-progressbar' );
}