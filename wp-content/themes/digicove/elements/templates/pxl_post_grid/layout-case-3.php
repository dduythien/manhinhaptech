<?php
$html_id = pxl_get_element_id($settings);
$tax = array();
$select_post_by = $widget->get_setting('select_post_by', '');
$source = $post_ids = [];
if($select_post_by === 'post_selected'){
    $post_ids = $widget->get_setting('source_'.$settings['post_type'].'_post_ids', '');
}else{
    $source  = $widget->get_setting('source_'.$settings['post_type'], '');
}
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
extract(pxl_get_posts_of_grid(
    'case',
    ['source' => $source, 'orderby' => $orderby, 'order' => $order, 'limit' => $limit, 'post_ids' => $post_ids],
    ['case-category']
));
$filter_default_title = $widget->get_setting('filter_default_title', 'Show All');
if($settings['col_xl'] == '5') {
    $col_xl = 'pxl5';
} else {
    $col_xl = 12 / intval($widget->get_setting('col_xl', 4));
}

$col_xxl = 12 / intval($widget->get_setting('col_xxl', 4));
$col_lg = 12 / intval($widget->get_setting('col_lg', 4));
$col_md = 12 / intval($widget->get_setting('col_md', 3));
$col_sm = 12 / intval($widget->get_setting('col_sm', 2));
$col_xs = 12 / intval($widget->get_setting('col_xs', 1));
$grid_sizer = "col-xxl-{$col_xxl} col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";

$grid_class = '';
$grid_class = 'pxl-grid-inner pxl-grid-masonry row';

$filter = $widget->get_setting('filter', 'false');
$filter_alignment = $widget->get_setting('filter_alignment', 'center');
$pagination_type = $widget->get_setting('pagination_type', 'pagination');
$loadmore_style = $widget->get_setting('loadmore_style');
$post_type = $widget->get_setting('post_type', 'case');
$layout = $widget->get_setting('layout_'.$post_type, 'case-3');
$show_category = $widget->get_setting('show_category');
$img_size = $widget->get_setting('img_size');
$grid_masonry = $widget->get_setting('grid_masonry');
$pxl_animate = $widget->get_setting('pxl_animate');

$load_more = array(
    'post_type'       => $post_type,
    'layout'          => $layout,
    'startPage'       => $paged,
    'maxPages'        => $max,
    'total'           => $total,
    'perpage'         => $limit,
    'nextLink'        => $next_link,
    'source'          => $source,
    'orderby'         => $orderby,
    'order'           => $order,
    'limit'           => $limit,
    'post_ids'        => $post_ids,
    'col_xl'          => $col_xl,
    'col_xxl'          => $col_xxl,
    'col_lg'          => $col_lg,
    'col_md'          => $col_md,
    'col_sm'          => $col_sm,
    'col_xs'          => $col_xs,
    'pagination_type' => $pagination_type,
    'show_category'     => $show_category,
    'img_size'        => $img_size,
    'grid_masonry'    => $grid_masonry,
    'pxl_animate'    => $pxl_animate,
);
?>

<div id="<?php echo esc_attr($html_id) ?>" class="pxl-grid pxl-case-grid layout3 <?php echo esc_attr($settings['style'])?>" data-layout="masonry" data-start-page="<?php echo esc_attr($paged); ?>" data-max-pages="<?php echo esc_attr($max); ?>" data-total="<?php echo esc_attr($total); ?>" data-perpage="<?php echo esc_attr($limit); ?>" data-next-link="<?php echo esc_attr($next_link); ?>">
    <?php if ($select_post_by == 'term_selected' && $filter == "true"): ?>
        <div class="container-custom">
            <div class="pxl-grid-filter pxl-grid-filter1">
                <div class="pxl--filter-inner">
                    <span class="filter-item active" data-filter="*"><?php echo esc_html($filter_default_title); ?></span>
                    <?php foreach ($categories as $category): ?>
                        <?php $category_arr = explode('|', $category); ?>
                        <?php $tax[] = $category_arr[1]; ?>
                        <?php $term = get_term_by('slug',$category_arr[0], $category_arr[1]); ?>

                        <span class="filter-item" data-filter="<?php echo esc_attr('.' . $term->slug); ?>">
                            <?php echo esc_html($term->name); ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="<?php echo esc_attr($grid_class); ?>" data-gutter="15">
        <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        <?php $load_more['tax'] = $tax; digicove_get_post_grid($posts, $load_more); ?>
    </div>
    <?php

    if ($pagination_type == 'pagination') { ?>
        <div class="pxl-grid-pagination" data-loadmore="<?php echo esc_attr(json_encode($load_more)); ?>" data-query="<?php echo esc_attr(json_encode($args)); ?>">
            <?php digicove()->page->get_pagination($query, true); ?>
        </div>
    <?php } ?>
    <?php if (!empty($next_link) && $pagination_type == 'loadmore') { ?>
        <div class="pxl-load-more <?php echo esc_attr($loadmore_style); ?>" data-loadmore="<?php echo esc_attr(json_encode($load_more)); ?>">
            <span class="btn">
                <?php echo esc_html__('See All Our Works', 'digicove') ?>
                <span class="button-arrow-hover">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M11.0224 0.112104L3.7102 -0.000354929C3.51661 3.25587e-05 3.33325 0.0764821 3.19962 0.212529C3.06599 0.348576 2.99278 0.533334 2.99576 0.72701C2.99874 0.920687 3.07767 1.10778 3.21555 1.24801C3.35342 1.38823 3.53922 1.47036 3.73292 1.4767L9.26196 1.56174L0.218105 10.6056C0.0817139 10.742 0.00678252 10.9287 0.0097954 11.1246C0.0128083 11.3205 0.0935186 11.5095 0.234171 11.6502C0.374823 11.7908 0.563896 11.8715 0.759795 11.8746C0.955695 11.8776 1.14237 11.8026 1.27877 11.6663L10.3226 2.6224L10.4077 8.15144C10.4075 8.24947 10.4268 8.34717 10.4646 8.43883C10.5023 8.53048 10.5577 8.61426 10.6275 8.68527C10.6974 8.75628 10.7802 8.8131 10.8712 8.85242C10.9623 8.89173 11.0597 8.91276 11.1577 8.91427C11.2558 8.91578 11.3526 8.89774 11.4425 8.8612C11.5324 8.82467 11.6135 8.77037 11.6812 8.70147C11.7488 8.63258 11.8017 8.55047 11.8366 8.45993C11.8716 8.36939 11.8879 8.27224 11.8847 8.17415L11.7723 0.861991C11.7692 0.666129 11.6885 0.477103 11.5479 0.336478C11.4073 0.195854 11.2182 0.115146 11.0224 0.112104Z" fill="#FDFDFD"></path></svg>            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M11.0224 0.112104L3.7102 -0.000354929C3.51661 3.25587e-05 3.33325 0.0764821 3.19962 0.212529C3.06599 0.348576 2.99278 0.533334 2.99576 0.72701C2.99874 0.920687 3.07767 1.10778 3.21555 1.24801C3.35342 1.38823 3.53922 1.47036 3.73292 1.4767L9.26196 1.56174L0.218105 10.6056C0.0817139 10.742 0.00678252 10.9287 0.0097954 11.1246C0.0128083 11.3205 0.0935186 11.5095 0.234171 11.6502C0.374823 11.7908 0.563896 11.8715 0.759795 11.8746C0.955695 11.8776 1.14237 11.8026 1.27877 11.6663L10.3226 2.6224L10.4077 8.15144C10.4075 8.24947 10.4268 8.34717 10.4646 8.43883C10.5023 8.53048 10.5577 8.61426 10.6275 8.68527C10.6974 8.75628 10.7802 8.8131 10.8712 8.85242C10.9623 8.89173 11.0597 8.91276 11.1577 8.91427C11.2558 8.91578 11.3526 8.89774 11.4425 8.8612C11.5324 8.82467 11.6135 8.77037 11.6812 8.70147C11.7488 8.63258 11.8017 8.55047 11.8366 8.45993C11.8716 8.36939 11.8879 8.27224 11.8847 8.17415L11.7723 0.861991C11.7692 0.666129 11.6885 0.477103 11.5479 0.336478C11.4073 0.195854 11.2182 0.115146 11.0224 0.112104Z" fill="#FDFDFD"></path></svg>        </span>
                    <span class="pxl-load-icon"><i class="fas fa-spinner"></i></span>                    
                </span>
            </div>
        <?php } ?>
    </div>