<?php 
if(!empty($settings['title'])) : 
	$widget->add_render_attribute( 'wrap-title-ef', 'class', ['pxl-title-effect', $settings['text_effect'], 'pxl-type-'.$settings['color_type']]);
	$widget->add_render_attribute( 'item-title', 'class', ['pxl-item-title']);
	if($settings['text_effect'] == 'scroll-parallax'){
		$parallax_settings = json_encode([
	        'y' => $settings['text_offset_left']['size']
	    ]);
		$widget->add_render_attribute( 'item-title', 'data-parallax', $parallax_settings);
	}
?>
	<div <?php pxl_print_html($widget->get_render_attribute_string('wrap-title-ef'));?>>
		<div class="pxl-title-inner">
			<div <?php pxl_print_html($widget->get_render_attribute_string( 'item-title' )); ?>><?php echo pxl_print_html($settings['title']); ?></div>
			<?php if($settings['text_effect'] != 'scroll-parallax'): ?>
				<span class="pxl-item-title-backdrop"><?php echo pxl_print_html($settings['title']); ?></span>
			<?php endif; ?>
		</div>
	</div> 
<?php endif; ?>
