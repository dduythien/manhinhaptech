<?php 
use Elementor\Embed;
$small_heading_attrs = ['class' => '', 'data-settings' => ''];
if( !empty( $settings['small_heading_animation'])){
	$small_heading_attrs = [
		'class' => 'pxl-animate pxl-invisible',
		'data-settings' => json_encode([
			'animation'      => $settings['small_heading_animation'],
			'animation_delay' =>$settings['small_heading_animation_delay']
		])
	];
}
if( !empty($settings['small_heading_custom_cls'])){
	$small_heading_attrs['class'] = $small_heading_attrs['class'].' '.$settings['small_heading_custom_cls'];
}

$large_heading_attrs = ['class' => '', 'data-settings' => ''];
if( !empty( $settings['large_heading_animation'])){
	$large_heading_attrs = [
		'class' => 'pxl-animate pxl-invisible',
		'data-settings' => json_encode([
			'animation'      => $settings['large_heading_animation'],
			'animation_delay' =>$settings['large_heading_animation_delay']
		])
	];
}
$desc_attrs = ['class' => '', 'data-settings' => ''];
if( !empty( $settings['desc_animation'])){
	$desc_attrs = [
		'class' => 'pxl-animate pxl-invisible',
		'data-settings' => json_encode([
			'animation'      => $settings['desc_animation'],
			'animation_delay' =>$settings['desc_animation_delay']
		])
	];
}
$btn1_attrs = ['class' => '', 'data-settings' => ''];
if( !empty( $settings['btn1_animation'])){
	$btn1_attrs = [
		'class' => 'pxl-animate pxl-invisible',
		'data-settings' => json_encode([
			'animation'      => $settings['btn1_animation'],
			'animation_delay' =>$settings['btn1_animation_delay']
		])
	];
}
$btn2_attrs = ['class' => '', 'data-settings' => ''];
if( !empty( $settings['btn2_animation'])){
	$btn2_attrs = [
		'class' => 'pxl-animate pxl-invisible',
		'data-settings' => json_encode([
			'animation'      => $settings['btn2_animation'],
			'animation_delay' =>$settings['btn2_animation_delay']
		])
	];
}
$image_attrs = ['class' => '', 'data-settings' => ''];
if( !empty( $settings['slider_img_animation'])){
	$image_attrs = [
		'class' => 'pxl-animate pxl-invisible',
		'data-settings' => json_encode([
			'animation'      => $settings['slider_img_animation'],
			'animation_delay' =>$settings['slider_img_animation_delay']
		])
	];
}

if ( ! empty( $settings['btn1_link']['url'] ) ) {
	$widget->add_render_attribute( 'button1', 'href', $settings['btn1_link']['url'] );

	if ( $settings['btn1_link']['is_external'] ) {
		$widget->add_render_attribute( 'button1', 'target', '_blank' );
	}

	if ( $settings['btn1_link']['nofollow'] ) {
		$widget->add_render_attribute( 'button1', 'rel', 'nofollow' );
	}
}

$widget->add_render_attribute( 'button1', 'class', 'btn pxl-btn '.' icon-ps-'.$settings['btn1_icon_align'].' '.$btn1_attrs['class'] );
$widget->add_render_attribute( 'button1', 'data-settings', $btn1_attrs['data-settings'] );

$btn1_text = !empty( $settings['btn1_text'] ) ? $settings['btn1_text'] : esc_html__( 'About us', 'digicove' );

$overlay_attrs = ['class' => '', 'style' => '', 'data-settings' => ''];
if( !empty( $settings['overlay_bg_animation'])){
	$overlay_attrs = [
		'class' => 'pxl-animate pxl-invisible',
		'data-settings' => json_encode([
			'animation'      => $settings['overlay_bg_animation'],
			'animation_delay' =>$settings['overlay_bg_animation_delay']
		])
	];
}
if( !empty($settings['overlay_bg_image']['url']) )
	$overlay_attrs['style'] = 'style="background-image: url('. esc_url($settings['overlay_bg_image']['url']).');"';

$cten_img = !empty($settings['bg_image']['url']) ? 'style="background-image: url('. esc_url($settings['bg_image']['url']).');"' : '';

$ken_burns           = $widget->get_setting('ken_burns', '');  
$ken_burns_direction = $widget->get_setting('ken_burns_direction', 'in');  
$let_it_snow        = $widget->get_setting('let_it_snow', 'default');

$ken_burns_cls = $ken_burns == 'true' ? 'pxl-ken-burns pxl-ken-burns--'.$ken_burns_direction : '';

$slide_bg_clss = [
	'pxl-slide-bg',
	'pxl-overlay',
	$ken_burns_cls
];

$slide_bg_clss2 = [
	'pxl-slide-bg-right '
];

?>
<div class="pxl-slide-item-wrap relative layout-<?php echo esc_attr($settings['layout']) ?>">
	<?php if(!empty($settings['bg_image']['url'])): ?>
		<div class="<?php echo esc_attr(implode(' ', $slide_bg_clss)) ?>" style="background-image: url('<?php echo esc_url($settings['bg_image']['url']) ?>');">
			<div class="pxl-overlay overlay-color <?php echo esc_attr($overlay_attrs['class']);?>" <?php if (!empty($settings['overlay_bg_image']['url'])): ?>style="background-image: url('<?php echo esc_url($settings['overlay_bg_image']['url']); ?>');" <?php endif; ?>data-settings="<?php echo esc_attr($overlay_attrs['data-settings']);?>" ></div>
			<?php if ($let_it_snow == 'let-it-snow') :?>
				<div class="let-it-snow"></div>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<div class="container relative">
		<div class="slide-content-wrap d-flex-wrap align-items-center <?php echo esc_attr($settings['slider_type']); ?>">
			<div class="sl-content relative">
				<div class="sl-content-inner relative">
					<?php if(!empty($settings['small_heading'])): ?>
						<div class="small-heading <?php echo esc_attr($small_heading_attrs['class']);?>" data-settings="<?php echo esc_attr($small_heading_attrs['data-settings']);?>">
							<?php pxl_print_html(nl2br($settings['small_heading']));?>
						</div>
					<?php endif; ?>
					<?php if(!empty($settings['large_heading'])): ?>
						<h2 class="large-heading <?php echo esc_attr($large_heading_attrs['class']);?>" data-settings="<?php echo esc_attr($large_heading_attrs['data-settings']);?>"><?php pxl_print_html( nl2br($settings['large_heading']));?></h2>
					<?php endif; ?>
					<?php if(!empty($settings['desc'])): ?>
						<div class="desc <?php echo esc_attr($desc_attrs['class']);?>" data-settings="<?php echo esc_attr($desc_attrs['data-settings']);?>"><?php 
						pxl_print_html($settings['desc']);
					?></div>
				<?php endif; ?>
				<div class="pxl-inner-box">
					<?php if ( !empty( $settings['btn1_link']['url']  ) ) { ?>
						<a <?php pxl_print_html($widget->get_render_attribute_string( 'button1' )); ?>>							
							<span class="pxl-button-text <?php if($settings['button_effect'] != '') { echo 'pxl-wobble'; } ?>" data-animation="<?php echo esc_attr($settings['button_effect']); ?>">
								<?php if(!empty($settings['btn1_text'])) {
									$btn_text = $settings['btn1_text'];
								} else {
									$btn_text = pxl_print_html('Click Here', 'digicove');
								}
								$chars = preg_split('//u', $btn_text, null, PREG_SPLIT_NO_EMPTY);
								foreach ($chars as $value) {
									if ($value == " ") {
										echo '&nbsp;';
									}
									echo '<span>' . htmlspecialchars($value) . '</span>';
								}
								?>
							</span>
							<?php if($settings['btn1_icon']['value']) { ?>        
								<span class="button-arrow-hover">
									<?php 
									if ( $settings['btn1_icon'] ) 
										\Elementor\Icons_Manager::render_icon( $settings['btn1_icon'], [ 'aria-hidden' => 'true', 'class' => 'pxl-button-icon pxl-icon' ], 'span' ); 
									\Elementor\Icons_Manager::render_icon( $settings['btn1_icon'], [ 'aria-hidden' => 'true', 'class' => 'pxl-button-icon pxl-icon' ], 'span' ); 
									?>
								</span>
							<?php } ?>
						</a>
					<?php } ?>
					<?php 
					if(!empty($settings['video_link']['url'])): 
						$lightbox_id = isset($settings['_id']) ? $settings['_id'] : $settings['element_id'];
						$video_atts = $embed_options = [];
						$classes = ['btn-video-wrap pxl-video-lightbox'];
						if( $settings['video_position'] === 'absolute') $classes[] = $settings['video_position'];
						$classes[] = isset($settings['play_icon_animation_duration']) ? 'animated-' . $settings['play_icon_animation_duration'] : '';
						if (!empty($settings['play_icon_animation'])) {
							$classes[] = 'pxl-animate pxl-invisible';
							$anm_delay = !empty($settings['play_icon_animation_delay']) ? $settings['play_icon_animation_delay'] : '300';
							$video_atts[] = 'data-settings=' . json_encode([
								'animation' => $settings['play_icon_animation'],
								'animation_delay' => $anm_delay
							]);
						}
						$embed_params = [
							'loop' => '0',
							'controls' => '1',
							'mute' => '0',
							'rel' => '0',
							'modestbranding' => '0'
						];

						$video_atts[] = 'class="' . implode(' ', $classes) . '"';
						$video_atts[] = 'data-elementor-open-lightbox="yes"';
						$video_atts[] = 'data-elementor-lightbox=' . json_encode([
							'type' => 'video',
							'videoType' => 'youtube',
							'url' => Embed::get_embed_url($settings['video_link']['url'], $embed_params, $embed_options),
							'modalOptions' => [
								'id' => 'pxl-lightbox-' . $lightbox_id,
								'entranceAnimation' => 'fadeInUp',
								'entranceAnimation_tablet' => '',
								'entranceAnimation_mobile' => '',
								'videoAspectRatio' => '169'
							]
						]);
						?>
						<div <?php echo implode(' ', $video_atts); ?>>
							<div class="pxl-video-btn text-center">
								<span class="pxl-icon caseicon-play1"></span>
							</div>
							<span class="video-text"><?php echo esc_attr($settings['video_text']); ?></span>
						</div>
					<?php endif; ?>	
				</div>
			</div>
			<?php if(!empty($settings['bg_image_slider']['url'])): ?>
				<div class="<?php echo esc_attr(implode(' ', $slide_bg_clss2)) ?><?php echo esc_attr($image_attrs['class']);?>" data-settings="<?php echo esc_attr($image_attrs['data-settings']);?>" style="background-image: url('<?php echo esc_url($settings['bg_image_slider']['url']) ?>');">
					<?php if(!empty($settings['bg_image_slider_after']['url'])): ?>
						<div class="bg-image-slider-after" style="background-image: url('<?php echo esc_url($settings['bg_image_slider_after']['url']) ?>');">
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div> 

</div> 
