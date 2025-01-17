<?php

if (!class_exists('Digicove_Footer')) {

    class Digicove_Footer
    {
        public function getFooter()
        {
            if(is_singular('elementor_library')) return;
            $disable_footer = digicove()->get_page_opt('disable_footer','0');
            $footer_layout = (int)digicove()->get_opt('footer_layout');
            
            if($disable_footer == '1') return;
            if ($footer_layout <= 0 || !class_exists('Pxltheme_Core') || !is_callable( 'Elementor\Plugin::instance' )) {
                get_template_part( 'template-parts/footer/default');
            } else {
                $args = [
                    'footer_layout' => $footer_layout
                ];
                get_template_part( 'template-parts/footer/elementor','', $args );
            } 

        }

    }
}
