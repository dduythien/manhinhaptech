<div class="pxl-search-box layout1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
	<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
		<div class="searchform-wrap">
	        <input type="text" placeholder="<?php if(!empty($settings['placeholder_text'])) { echo esc_attr_e($settings['placeholder_text'], 'digicove'); } else { echo esc_attr_e('Search something …', 'digicove'); } ?>" name="s" class="search-field" />
	    	<button type="submit" class="search-submit"></button>
	    </div>
	</form>
</div>