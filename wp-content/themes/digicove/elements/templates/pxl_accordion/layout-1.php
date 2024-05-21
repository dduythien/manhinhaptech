<?php
$html_id = pxl_get_element_id($settings);
$active = intval($settings['active']);
$accordion = $widget->get_settings('accordion');
if(!empty($accordion)) : ?>
    <div class="pxl-accordion pxl-accordion1 <?php echo esc_attr($settings['style'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php foreach ($accordion as $key => $value):
            $is_active = ($key + 1) == $active;
            $pxl_id = isset($value['_id']) ? $value['_id'] : '';
            $title = isset($value['title']) ? $value['title'] : '';
            $desc = isset($value['desc']) ? $value['desc'] : '';
            ?>
            <div class="pxl--item <?php echo esc_attr($is_active ? 'active' : ''); ?>">
                <<?php pxl_print_html($settings['title_tag']); ?> class="pxl-item-accordion" data-target="<?php echo esc_attr('#pxl-accordion-'.$pxl_id.$html_id); ?>">
                <i class="fa fa-angle-down"></i>
                <?php if ($settings['style'] == 'style3') : ?>
                    <span class="plus"></span>
                <?php endif; ?>
                <?php if ($settings['style'] == 'style4') : ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                        <path d="M0.0385742 12.5054C0.0385742 11.6887 0.738571 11.1054 1.43857 11.1054H11.1219V1.42204C11.1219 0.605371 11.7052 0.0220947 12.5219 0.0220947C13.3386 0.0220947 13.9219 0.605371 13.9219 1.42204V12.5054C13.9219 12.8554 13.8052 13.2053 13.4552 13.5553C13.2219 13.7886 12.8719 14.0221 12.4052 14.0221H1.32191C0.738581 13.9054 0.0385742 13.322 0.0385742 12.5054Z" fill="white"/>
                        <path d="M0.388672 1.77222C0.388672 1.42222 0.505331 1.07205 0.855331 0.722046C1.43866 0.138713 2.37201 0.138713 2.83868 0.722046L12.2887 10.1722C12.872 10.7555 12.872 11.6888 12.2887 12.1554C11.7053 12.7388 10.772 12.7388 10.3053 12.1554L0.855331 2.70532C0.621998 2.47199 0.388672 2.12222 0.388672 1.77222Z" fill="white"/>
                    </svg>
                <?php endif; ?>
                <span><?php echo wp_kses_post($title); ?></span>
                
                </<?php pxl_print_html($settings['title_tag']); ?>>
                <div id="<?php echo esc_attr('pxl-accordion-'.$pxl_id.$html_id); ?>" class="pxl-item--content" <?php if($is_active){ ?>style="display: block;"<?php } ?>><?php echo wp_kses_post(nl2br($desc)); ?></div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>