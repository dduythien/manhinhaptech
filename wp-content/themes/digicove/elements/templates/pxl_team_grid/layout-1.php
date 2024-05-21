<?php
$default_settings = [
    'gallery_list' => '',
    'filter_alignment' => '',
    'layout_mode' => 'fitRows',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$img_size = '';
if(!empty($settings['img_size'])) {
    $img_size = $settings['img_size'];
} else {
    $img_size = 'full';
}
$html_id = pxl_get_element_id($settings);

$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');

$col_xl = 12 / intval($col_xl);
$col_lg = 12 / intval($col_lg);
$col_md = 12 / intval($col_md);
$col_sm = 12 / intval($col_sm);
$col_xs = 12 / intval($col_xs);

$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
?>
<?php if(isset($settings['team']) && !empty($settings['team']) && count($settings['team'])): ?>
<div class="pxl-grid pxl-team-grid pxl-team-grid1 <?php echo esc_attr($settings['style']); ?>" data-layout="<?php echo esc_attr($layout_mode); ?>">
    <div class="pxl-grid-inner pxl-grid-masonry row" data-gutter="15">
        <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        <?php foreach ($settings['team'] as $key => $value):
           $title = isset($value['title']) ? $value['title'] : '';
           $position = isset($value['position']) ? $value['position'] : '';
           $image = isset($value['image']) ? $value['image'] : '';
           $social = isset($value['social']) ? $value['social'] : '';
           $link = isset($value['link']) ? $value['link'] : '';
           $link_key = $widget->get_repeater_setting_key( 'title', 'value', $key );
           if ( ! empty( $link['url'] ) ) {
            $widget->add_render_attribute( $link_key, 'href', $link['url'] );

            if ( $link['is_external'] ) {
                $widget->add_render_attribute( $link_key, 'target', '_blank' );
            }

            if ( $link['nofollow'] ) {
                $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
            }
        }
        $link_attributes = $widget->get_render_attribute_string( $link_key );
        ?>
        <div class="<?php echo esc_attr($item_class); ?>">
            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>">
                <div class="pxl-item--meta">
                    <a class="item--meta-plus" <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                            <path d="M9.49989 19C8.78679 19 8.20898 18.4222 8.20898 17.7091V1.2909C8.20898 0.577807 8.78679 0 9.49989 0C10.213 0 10.7908 0.577807 10.7908 1.2909V17.7091C10.7908 18.4222 10.213 19 9.49989 19Z" fill="#FDFDFD"/>
                            <path d="M17.7091 10.7908H1.2909C0.577807 10.7908 0 10.213 0 9.49989C0 8.78679 0.577807 8.20898 1.2909 8.20898H17.7091C18.4222 8.20898 19 8.78679 19 9.49989C19 10.213 18.4222 10.7908 17.7091 10.7908Z" fill="#FDFDFD"/>
                        </svg>
                    </a>
                    <?php if (!empty($title)) : ?>
                        <h4 class="pxl-item--title el-empty">
                            <?php if ( ! empty( $link['url'] ) ) { ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php } ?>
                            <?php echo pxl_print_html($title); ?>
                            <?php if ( ! empty( $link['url'] ) ) { ?></a><?php } ?>
                        </h4>
                    <?php endif; ?>
                    <?php if (!empty($position)) : ?>
                        <div class="pxl-item--position el-empty"><?php echo pxl_print_html($position); ?></div>
                    <?php endif; ?>
                    <?php if(!empty($social)): ?>
                        <div class="pxl-item--social">
                            <?php $team_social = json_decode($social, true);
                            foreach ($team_social as $value): ?>
                                <a href="<?php echo esc_url($value['url']); ?>" target="_blank">
                                    <span></span>
                                    <i class="<?php echo esc_attr($value['icon']); ?>"></i>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if(!empty($image['id'])) {
                    $img = pxl_get_image_by_size( array(
                        'attach_id'  => $image['id'],
                        'thumb_size' => $img_size,
                        'class' => 'no-lazyload',
                    ));
                    $thumbnail = $img['thumbnail'];?>
                    <div class="pxl-item--image">
                        <?php echo wp_kses_post($thumbnail); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</div>
<?php endif; ?>
