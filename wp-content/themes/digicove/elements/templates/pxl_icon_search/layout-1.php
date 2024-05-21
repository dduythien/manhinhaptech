<?php 
$default_settings = [
    'style' => '',
    'text_placeholder' => '',
    'text_button' => '',
    'post_type' => '',
    'quick_search' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
?>
<?php if($style == 'style1') : ?>
	<div class="pxl-search-popup-button pxl-anchor side-panel" data-target=".pxl-side-search"><i class="fal fa-search"></i><span class="pxl-search-text">search</span></div>
<?php endif; ?>

<?php if($style == 'style2') : ?>
	<div class="pxl-header-search-form pxl-search-form2">
		<form role="search" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
			<input type="text" placeholder="<?php if(!empty($text_placeholder)) { echo esc_attr( $text_placeholder ); } else { esc_attr_e('Search', 'digicove'); } ?>" name="s" class="search-field" />
		    <button type="submit" class="search-submit"><i class="fal fa-search"></i></button>
		</form>
	</div>
<?php endif; ?>

<?php if($style == 'style3') : ?>
	<div class="pxl-search-form3">
		<form role="search" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
			<i class="fal fa-search"></i>
			<input type="text" placeholder="<?php if(!empty($text_placeholder)) { echo esc_attr( $text_placeholder ); } else { esc_attr_e('Search Coach', 'digicove'); } ?>" name="s" class="search-field" />
		    <button type="submit" class="search-submit btn btn-primary">
		    	<?php if(!empty($text_button)) { echo esc_attr($text_button); } else { echo esc_html__('Search Now', 'digicove'); } ?>
		    	<i class="bravisicon-angle-arrow-right"></i>
		    </button>
		    <?php if(!empty($post_type)) : ?>
		    	<input type="hidden" name="post_type" value="<?php echo esc_attr($post_type); ?>">
		    <?php endif; ?>
		</form>
		<?php if(isset($quick_search) && !empty($quick_search) && count($quick_search)): ?>
		    <div class="pxl-search-list">
		        <?php
		        	foreach ($quick_search as $key => $ct_list): ?>
		            <a href="<?php echo esc_url(home_url( '/' )); ?>?s=<?php echo ct_print_html($ct_list['content'])?>&post_type=<?php echo esc_attr($post_type); ?>">
		            	<span></span>
		            	<?php echo ct_print_html($ct_list['content'])?>
		            </a>
		        <?php endforeach; ?>
		    </div>
		<?php endif; ?>
	</div>
<?php endif; 
add_action( 'pxl_anchor_target', 'digicove_hook_anchor_search'); ?>