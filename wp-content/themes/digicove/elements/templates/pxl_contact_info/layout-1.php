<?php 
extract($settings);
$cursor_cls = (!empty($map_img['id']) || !empty($map_iframe))? 'cursor-map-target' : '';
$show_popup_cls = $show_popup == 'true' ? 'show-popup' : '';
$is_new = \Elementor\Icons_Manager::is_migration_allowed();

?>
<div class="pxl-ci-wrap layout-1 relative <?php echo esc_attr($cursor_cls) ?> <?php echo esc_attr($show_popup_cls) ?>">
	<div class="ci-content-wrap">
		<div class="ci-content <?php echo esc_attr($settings['style']) ?>">
			<div class="ci-icon">
				<?php foreach ($settings['icons'] as $key => $value):
					$icon_type = isset($value['icon_type']) ? $value['icon_type'] : '';
					$icon_image = isset($value['icon_image']) ? $value['icon_image'] : '';
					$icon_key = $widget->get_repeater_setting_key( 'pxl_icon', 'icons', $key );
					$widget->add_render_attribute( $icon_key, [
						'class' => $value['pxl_icon'],
						'aria-hidden' => 'true',
					] );
					$link_key = $widget->get_repeater_setting_key( 'icon_link', 'value', $key );
					if ( ! empty( $value['icon_link']['url'] ) ) {
						$widget->add_render_attribute( $link_key, 'href', $value['icon_link']['url'] );

						if ( $value['icon_link']['is_external'] ) {
							$widget->add_render_attribute( $link_key, 'target', '_blank' );
						}

						if ( $value['icon_link']['nofollow'] ) {
							$widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
						}
					}
					$link_attributes = $widget->get_render_attribute_string( $link_key ); ?>
					<?php if ( $icon_type == 'icon' && ! empty( $value['pxl_icon'] ) ) : ?>
						<?php if ( $is_new ):
							\Elementor\Icons_Manager::render_icon( $value['pxl_icon'], [ 'aria-hidden' => 'true' ] );
						elseif(!empty($value['pxl_icon'])): ?>
							<i class="<?php echo esc_attr( $value['pxl_icon'] ); ?>" aria-hidden="true"></i>
						<?php endif; ?>
					<?php endif; ?>
					<?php if ( $icon_type == 'image' && !empty($icon_image['id']) ) : 
						$img_icon  = pxl_get_image_by_size( array(
							'attach_id'  => $icon_image['id'],
							'thumb_size' => 'full',
						) );
						$thumbnail_icon    = $img_icon['thumbnail']; ?>
						<a <?php echo implode( ' ', [ $link_attributes ] ); ?>>
							<?php echo pxl_print_html($thumbnail_icon); ?>
						</a>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
			<div class="ci-content-right">
				<?php if(!empty($heading_text)): ?>
					<h4 class="ci-title"><?php pxl_print_html($heading_text); ?></h4> 
				<?php endif; ?>
				<?php if(!empty($desc)): ?>
					<div class="ci-desc"><?php pxl_print_html(nl2br($desc)); ?></div> 
				<?php endif; ?>				
			</div>
		</div>
	</div>
	<?php if(!empty($map_iframe) || !empty($map_img['id'])): ?>
	<div class="pxl-map-wrap">
		<div class="pxl-map-content overflow-hidden">
			<?php if(!empty($map_iframe)): ?>
				<?php pxl_print_html($map_iframe); ?>
			<?php elseif(!empty($map_img['id'])): ?>
				<img src="<?php echo esc_url($map_img['url'])?>" class="pxl-map-img w-100 h-100 img-cover-center"/>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>
</div>