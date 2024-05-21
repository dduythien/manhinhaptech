<div class="pxl-process pxl-process1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <?php if(!empty($settings['step'])) : ?>
            <div class="pxl-item--step pxl-mr-26">
                <?php echo esc_attr($settings['step']); ?>
            </div>
        <?php endif; ?>
        <div class="pxl-item--meta">
	        <<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--title el-empty"><?php echo pxl_print_html($settings['title']); ?></<?php echo esc_attr($settings['title_tag']); ?>>
	        <div class="pxl-item--description el-empty"><?php echo pxl_print_html($settings['desc']); ?></div>
		</div>    
    </div>
</div>