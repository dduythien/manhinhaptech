<?php
$p_menu = digicove()->get_page_opt('p_menu');
if(!empty($p_menu) && $p_menu != '-1') {
    $menu = $p_menu;
} else {
    $menu = $settings['menu'];
}
if(!empty($menu)) { ?>
    <div class="pxl-nav-menu2 pxl-nav-menu2">
        <?php wp_nav_menu(array(
            'menu_class' => 'pxl-menu-primary2 clearfix',
            'walker'     => class_exists( 'PXL_Mega_Menu_Walker' ) ? new PXL_Mega_Menu_Walker : '',
            'link_before'     => '<span>',
            'link_after'      => '</span><i class="caseicon-angle-arrow-down"></i>',
            'menu'        => wp_get_nav_menu_object($menu))
        ); ?>
    </div>
<?php } elseif( has_nav_menu( 'primary' ) ) { ?>
    <div class="pxl-nav-menu2 pxl-nav-menu2">
        <?php $attr_menu = array(
            'theme_location' => 'primary',
            'menu_class' => 'pxl-menu-primary2 clearfix',
            'link_before'     => '<span>',
            'link_after'      => '</span><i class="caseicon-angle-arrow-down"></i>',
            'walker'         => class_exists( 'PXL_Mega_Menu_Walker' ) ? new PXL_Mega_Menu_Walker : '',
        );
        wp_nav_menu( $attr_menu ); ?>
    </div>
<?php } ?>