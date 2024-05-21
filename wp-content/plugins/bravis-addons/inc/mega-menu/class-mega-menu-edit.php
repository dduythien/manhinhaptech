<?php
/**
 * @Template: class-mage-menu-edit.php
 * @since: 1.0.0
 * @author: PixelArt Team
 */
if (!defined('ABSPATH')) {
    die();
}

use Elementor\Icons_Manager;

class PXL_Mega_Menu_Edit_Walker extends Walker_Nav_Menu_Edit
{
    protected $mega_locations;

//    private $extra_menu= $extra_menu_custom;

    function __construct()
    {

        /*$this->megamenus = get_posts(array(
            'post_type' => 'mega-menu',
            'posts_per_page' => '-1'
        ));*/
        $this->megamenus = get_posts(array(
            'post_type' => 'pxl-template',
            'posts_per_page' => '-1',
            'meta_query' => array(
                array(
                    'key'       => 'template_type',
                    'value'     => 'mega-menu',
                    'compare'   => '='
                )
            )
        ));
        $this->walker_args = array(
            'depth' => 0,
            'child_of' => 0,
            'selected' => 0,
            'value_field' => 'ID'
        );
 
    }

    /**
     * Start the element output.
     *
     * @see Walker_Nav_Menu::start_el()
     */
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $item_output = '';
        parent::start_el($item_output, $item, $depth, $args, $id);

        // Adding new Fields
        $item_output = str_replace('<fieldset class="field-move', $this->get_fields($item, $depth, $args, $id) . '<fieldset class="field-move', $item_output);

        $output .= $item_output;
    }

    function get_fields($item, $depth = 0, $args = array(), $id = 0)
    {
        $enable_megamenu = apply_filters('pxl_enable_megamenu', false);
        $enable_ongpage_option = apply_filters('pxl_enable_onepage', true);
        $this->mega_locations = apply_filters('pxl_locations', array('primary'));
        $check_mega = true;
        $nav_menu_selected_id = isset($_REQUEST['menu']) ? (int)$_REQUEST['menu'] : intval(get_user_option('nav_menu_recently_edited'));
        $locations = get_registered_nav_menus();
        $menu_locations = get_nav_menu_locations();
        $key = array_search($nav_menu_selected_id, $menu_locations, true);
        if (in_array($nav_menu_selected_id, $menu_locations) && isset($locations[$key]) && in_array($key, $this->mega_locations)) {
            $check_mega = true;
        }

        ob_start();

        $item_id = esc_attr($item->ID);
        ?>

    <?php if (0 === $depth && $check_mega && $enable_megamenu === true) : ?>
        <p class="description description-wide">
            <label for="edit-menu-item-pxl-megaprofile-<?php echo esc_attr($item_id); ?>">
                <?php esc_html_e('Select Mega Menu', PXL_TEXT_DOMAIN); ?><br/>
                <select id="edit-menu-item-pxl-megaprofile-<?php echo esc_attr($item_id); ?>" class="widefat"
                        name="menu-item-pxl-megaprofile[<?php echo esc_attr($item_id); ?>]">
                    <option value="0"><?php esc_html_e('None', PXL_TEXT_DOMAIN) ?></option>
                    <?php
                    $r = $this->walker_args;
                    $r['selected'] = $item->pxl_megaprofile;
                    echo walk_page_dropdown_tree($this->megamenus, $r['depth'], $r);
                    ?>
                </select>
            </label>
        </p>
    <?php endif; ?>
    <?php //if ($check_mega): ?>
        <p class="description description-wide">
            <label for="edit-menu-item-pxl-icon-<?php echo esc_attr($item_id); ?>">
                <?php esc_html_e('Icon', PXL_TEXT_DOMAIN); ?><br/>
                <select id="edit-menu-item-pxl-icon-<?php echo esc_attr($item_id); ?>"
                        class="widefat pxl-icon-picker"
                        name="menu-item-pxl-icon[<?php echo esc_attr($item_id); ?>]">
                    <option value="" <?php selected('', esc_attr($item->pxl_icon)) ?>><?php esc_html_e('No Icons', PXL_TEXT_DOMAIN) ?></option>
                    <?php $arr = $this->pxl_iconpicker_fontawesome();
                    foreach ($arr as $group => $icons) { ?>
                        <optgroup label="<?php echo esc_attr($group); ?>">
                            <?php foreach ($icons as $key => $label) {
                                $class_key = key($label); ?>
                                <option value="<?php echo esc_attr($class_key); ?>" <?php selected($class_key, esc_attr($item->pxl_icon)) ?>><?php echo esc_html(current($label)); ?></option>
                            <?php } ?>
                        </optgroup>
                    <?php } ?>
                </select>
            </label>
        </p>
    <?php //endif; ?>

    <?php if ($enable_ongpage_option && 0 === $depth) : ?>
        <p class="description description-wide">
            <label for="menu-item-pxl-onepage-<?php echo esc_attr($item_id); ?>">
                <?php esc_html_e('One page', PXL_TEXT_DOMAIN); ?><br/>
                <select id="menu-item-pxl-onepage-<?php echo esc_attr($item_id); ?>"
                        class="widefat menu-item-pxl-onepage"
                        name="menu-item-pxl-onepage[<?php echo esc_attr($item_id); ?>]">
                    <option value="no-one-page" <?php selected(esc_attr($item->pxl_onepage), 'no-one-page') ?>><?php esc_html_e('No', PXL_TEXT_DOMAIN) ?></option>
                    <option value="is-one-page" <?php selected(esc_attr($item->pxl_onepage), 'is-one-page') ?>><?php esc_html_e('Yes', PXL_TEXT_DOMAIN) ?></option>
                </select>
            </label>
        </p>
        <p class="description description-wide">
            <label for="menu-item-pxl-onepage-offset-<?php echo esc_attr($item_id); ?>">
                <?php esc_html_e('One page offset', PXL_TEXT_DOMAIN); ?><br/>
                <input type="number" min="0" id="menu-item-pxl-onepage-offset-<?php echo esc_attr($item_id); ?>"
                        class="widefat menu-item-pxl-onepage-offset"
                        name="menu-item-pxl-onepage-offset[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr($item->pxl_onepage_offset); ?>" />
            </label>
        </p>
    <?php endif;
        global $extra_menu_custom;
        if (!empty($extra_menu_custom)) {
            foreach ($extra_menu_custom as $key => $fields) {
                $fields["allow_primary"] = isset($fields["allow_primary"]) ? $fields["allow_primary"] : true;
                if (in_array($depth, $fields['lever_support']) && (($check_mega === true && $fields["allow_primary"] === true) || $fields["allow_primary"] === false)):
                    ?>
                    <p class="description description-wide">
                        <label for="menu-item-<?php echo esc_attr($key) ?>-<?php echo esc_attr($item_id); ?>">
                            <?php echo esc_attr($fields['label']) ?><br/>
                            <select id="menu-item-<?php echo esc_attr($key) ?>-<?php echo esc_attr($item_id); ?>"
                                    class="widefat menu-item-<?php echo esc_attr($key) ?>"
                                    name="menu-item-<?php echo esc_attr($key) ?>[<?php echo esc_attr($item_id); ?>]">
                                <?php
                                foreach ($fields["options"] as $val => $text) {
                                    ?>
                                    <option value="<?php echo esc_attr($val) ?>" <?php selected(esc_attr($item->$key), $val) ?>><?php echo esc_attr($text) ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </label>
                    </p>
                <?php
                endif;
            }
        }

        ?>
        <script>
            jQuery('.pxl-icon-picker').fontIconPicker();
        </script>

        <?php
        return ob_get_clean();
    }

    function pxl_iconpicker_fontawesome()
    {
        $icons = array();
        if ( defined( 'ELEMENTOR_VERSION' ) && is_callable( 'Elementor\Plugin::instance' ) ) {
            $icons_tabs = Icons_Manager::get_icon_manager_tabs();
            foreach ($icons_tabs as $key => $value) {
                $fetchJson = $value['fetchJson'] ;
                $file_content = ''; 
                
                if(!empty($fetchJson) ){
                    $file_content = json_decode( file_get_contents($fetchJson), true);
                }
                if(empty($file_content)) continue;

                $icon_arr = [];  
                foreach ($file_content['icons'] as $ico) {
                    if(!empty($ico)){  
                        $icon_arr[] = [ $value['displayPrefix'].' '.$value['prefix'].$ico => str_replace(['-','_'], ' ', $ico)]  ;
                    }
                     
                }
                $icons[$value['label']] = $icon_arr;
            }
        }
        $icons = apply_filters("pxl_mega_menu/get_icons", $icons);

        return $icons;
    }
}