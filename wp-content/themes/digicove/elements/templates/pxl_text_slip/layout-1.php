<?php if(!empty($settings['text'])) : ?>
	<div class="pxl-text-slip pxl-text-slip1 <?php echo esc_attr($settings['text_effect'].' '.$settings['pxl_animate']); if($settings['white_shadow'] == 'yes') { echo ' pxl-text-white-shadow'; }  ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
		<div class="pxl-item--inner">
			<<?php echo esc_attr($settings['text_tag']); ?> class="pxl-item--text">
				<span class="pxl-text-front"><?php echo pxl_print_html($settings['text']); ?></span>
				<span class="pxl-text-backdrop" <?php if(!empty($settings['effect_speed'])) { ?>style="animation-duration:<?php echo esc_attr($settings['effect_speed']); ?>ms"<?php } ?>><?php echo pxl_print_html($settings['text']); ?></span>
			</<?php echo esc_attr($settings['text_tag']); ?>>
		</div>
	</div>
<?php endif; ?>