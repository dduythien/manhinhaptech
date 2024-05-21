<?php
extract($settings);
$html_id = pxl_get_element_id($settings);
$query_type = $widget->get_setting('query_type', 'recent_product');
$post_per_page = $widget->get_setting('post_per_page', 8);
$product_ids = $widget->get_setting('product_ids', '');
$categories = $widget->get_setting('taxonomies', '');
$param_args=[];
$loop = digicove_woocommerce_query($query_type,$post_per_page,$product_ids,$categories,$param_args);
extract($loop);

$filter_default_title = $widget->get_setting('filter_default_title', 'All');
$filter = $widget->get_setting('filter', 'false');
$filter_alignment = $widget->get_setting('filter_alignment', 'center');

$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$col_xxl = $widget->get_setting('col_xxl', '');
if($col_xxl == 'inherit') {
    $col_xxl = $col_xl;
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');

$arrows = $widget->get_setting('arrows','false');  
$pagination = $widget->get_setting('pagination','false');
$pagination_type = $widget->get_setting('pagination_type','bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite');
$speed = $widget->get_setting('speed', '500');
$pagination = $widget->get_setting('pagination','false');
$pagination_type = $widget->get_setting('pagination_type','bullets');

$show_category = $widget->get_setting('show_category');
if (is_rtl()) {
    $carousel_dir = 'true';
} else {
    $carousel_dir = 'false';
}
$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => '1', 
    'slide_percolumnfill'           => '1', 
    'slide_mode'                    => 'slide', 
    'slides_to_show'                => $col_xl,
    'slides_to_show_xxl'            => $col_xxl,
    'slides_to_show_lg'             => $col_lg, 
    'slides_to_show_md'             => $col_md, 
    'slides_to_show_sm'             => $col_sm, 
    'slides_to_show_xs'             => $col_xs, 
    'slides_to_scroll'              => $slides_to_scroll,  
    'slides_gutter'                 => 30, 
    'pagination'                    => $pagination,
    'pagination_type'               => $pagination_type,
    'arrow'                         => $arrows,
    'autoplay'                      => $autoplay,
    'pause_on_hover'                => $pause_on_hover,
    'pause_on_interaction'          => 'true',
    'delay'                         => $autoplay_speed,
    'loop'                          => $infinite,
    'speed'                         => $speed
];
$cursor_arrow = $widget->get_setting('cursor_arrow','false');   
$cursor_drag = $widget->get_setting('cursor_drag','false');   
$cursor_arrow_cls = $cursor_arrow == 'true' ? 'cursor-arrow' : 'none-cursor';
$cursor_drag_cls = $cursor_drag == 'true' ? 'cursor-drag' : 'none-drag';

$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container ' .$cursor_drag_cls.'-area',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]); 

$title_tag = $widget->get_setting('title_tag', 'h3');

$thumbnail_size = $widget->get_setting('thumbnail_size', 'full');
$thumbnail_custom_dimension = $widget->get_setting('thumbnail_custom_dimension', '');

if($thumbnail_size != 'custom'){
    $img_size = $thumbnail_size;
}
elseif(!empty($thumbnail_custom_dimension['width']) && !empty($thumbnail_custom_dimension['height'])){
    $img_size = $thumbnail_custom_dimension['width'] . 'x' . $thumbnail_custom_dimension['height'];
}
else{
    $img_size = 'full';
}

?><?php if ($posts->found_posts > 0): ?>
<div id="<?php echo esc_attr($html_id) ?>" class="pxl-swiper-sliders pxl-product-carousel layout-1 pxl-arrow-middle woocommerce <?php echo esc_attr($settings['style']) ?>" >

    <?php if ($filter == "true"): ?>
        <div class="pxl-swiper-slider pxl-grid-filter2">
            <div class="swiper-filter-wrap">
                <span class="filter-item active all" data-filter-target="all">
                    <div class="pxl-filter-image">
                        <?php 
                        $img  = pxl_get_image_by_size( array( 
                            'attach_id'  => $settings['image']['id'],
                            'thumb_size' => 'full',
                        ) );
                        $thumbnail    = $img['thumbnail'];
                        echo pxl_print_html($thumbnail);
                        ?>
                    </div>
                    <span class="pxl-filter--icon"><i class=" icon-Beef-1"></i></span>
                    <span class="pxl-filter--title"><?php echo esc_html($filter_default_title); ?></span>
                </span>
                <?php foreach ($categories as $category): ?>
                    <?php  
                    $term = get_term_by('slug',$category, 'product_cat'); 
                    $product_icon = get_term_meta( $term->term_id, 'product_icon', true ); 
                    ?>
                    <span class="filter-item" data-filter-target="<?php echo esc_attr($term->slug); ?>">
                        <span class="pxl-filter--icon"><i class="<?php echo esc_attr($product_icon); ?>"></i></span>
                        <?php echo pxl_print_html($thumbnail); ?>
                        <span class="pxl-filter--title"><?php echo esc_html($category); ?></span>
                    </span>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>  

    <div class="pxl-carousel-inner">
        <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
            <div class="pxl-swiper-wrapper products"> 
                <?php
                while ($posts->have_posts()) :
                    $posts->the_post();
                    global $product;
                    $filter_class = pxl_get_term_of_post_to_class($product->get_ID(), ['product_cat']);
                    $variation_ids = $product->get_children();

                    ?>
                    <div class="pxl-swiper-slide pxl-grid-item product" data-filter="<?php echo esc_attr($filter_class) ?>">
                        <?php
                        do_action( 'woocommerce_before_shop_loop_item' );
                        do_action( 'woocommerce_before_shop_loop_item_title' );
                        do_action( 'woocommerce_shop_loop_item_title' );
                        do_action( 'woocommerce_after_shop_loop_item_title' );
                        do_action( 'woocommerce_after_shop_loop_item' );
                        ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <?php if($arrows == 'true') :?>
            <div class="pxl-swiper-arrow-wrap">
                <div class="pxl-swiper-arroww pxl-swiper-arrow-prev <?php echo esc_attr($cursor_arrow_cls.'-prev') ?>"><i class="caseicon-long-arrow-right-three"></i></div>
                <div class="pxl-swiper-arroww pxl-swiper-arrow-next <?php echo esc_attr($cursor_arrow_cls.'-next') ?>"><i class="caseicon-long-arrow-right-three"></i></div>
            </div>
        <?php endif; ?>
        <?php if($pagination !== 'false'): ?>
            <div class="pxl-swiper-dots"></div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>