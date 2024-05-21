<?php
// make some configs
if(!function_exists('digicove_configs')){
    function digicove_configs($value){

        $configs = [
            'theme_colors' => [
                'primary'   => [
                    'title' => esc_html__('Primary', 'digicove').' ('.digicove()->get_opt('primary_color', '#FF7268').')', 
                    'value' => digicove()->get_opt('primary_color', '#FF7268')
                ],
                'secondary'   => [
                    'title' => esc_html__('Secondary', 'digicove').' ('.digicove()->get_opt('secondary_color', '#7360F2').')', 
                    'value' => digicove()->get_opt('secondary_color', '#7360F2')
                ],
                'third'   => [
                    'title' => esc_html__('Third', 'digicove').' ('.digicove()->get_opt('third_color', '#636363').')', 
                    'value' => digicove()->get_opt('third_color', '#636363')
                ],   
                'four'   => [
                    'title' => esc_html__('four', 'digicove').' ('.digicove()->get_opt('four_color', '#303142').')', 
                    'value' => digicove()->get_opt('four_color', '#303142')
                ]          
            ],
            'link' => [
                'color' => digicove()->get_opt('link_color', ['regular' => '#303142'])['regular'],
                'color-hover'   => digicove()->get_opt('link_color', ['hover' => '#FF7268'])['hover'],
                'color-active'  => digicove()->get_opt('link_color', ['active' => '#FF7268'])['active'],
            ],
            'gradient' => [
                'color-from' => digicove()->get_opt('gradient_color', ['from' => '#FF7369'])['from'],
                'color-to' => digicove()->get_opt('gradient_color', ['to' => '#FFB06D'])['to'],
            ],
            'cursor' => [
                'circle_bg'          => digicove()->get_opt('cursor_circle_bg', ['rgba'=>'var(--primary-color)'], 'rgba'),
                'follower_circle_bg' => digicove()->get_opt('cursor_follower_circle_bg', ['rgba'=>'rgba(var(--primary-color-rgb),0.2)'], 'rgba'),
                'follower_active_bg' => digicove()->get_opt('cursor_follower_active_bg', ['rgba'=>'rgba(255,255,255,0.6)'], 'rgba'),
                'active_text_color'  => digicove()->get_opt('cursor_active_text_color', '#fff'),
            ]
        ];
        return $configs[$value];
    }
}
if(!function_exists('digicove_inline_styles')) {
    function digicove_inline_styles() {  

        $theme_colors      = digicove_configs('theme_colors');
        $link_color        = digicove_configs('link');
        $gradient_color        = digicove_configs('gradient');

        ob_start();
        echo ':root{';

        foreach ($theme_colors as $color => $value) {
            printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
        }
        foreach ($theme_colors as $color => $value) {
            printf('--%1$s-color-rgb: %2$s;', str_replace('#', '',$color),  digicove_hex_rgb($value['value']));
        }
        foreach ($link_color as $color => $value) {
            printf('--link-%1$s: %2$s;', $color, $value);
        } 
        foreach ($gradient_color as $color => $value) {
            printf('--gradient-%1$s: %2$s;', $color, $value);
        } 
        echo '}';

        return ob_get_clean();

    }
}
