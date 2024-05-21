<?php
$html_id = pxl_get_element_id($settings);
$source = $widget->get_setting('source', '');
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 8);
$post_ids = $widget->get_setting('post_ids', '');
extract(pxl_get_posts_of_grid('service', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
]));
?>

<div id="<?php echo esc_attr($html_id) ?>" class="pxl-service-detail1">
    <?php     
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            ?>
            <a class="service-title" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                <span>
                    <?php echo esc_attr(get_the_title($post->ID)); ?>                    
                </span>
            </a>
        <?php endforeach;
    endif; ?>
</div>