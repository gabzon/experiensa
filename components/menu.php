<?php
//Semantic UI Menu
Class Menu {
    /**
     * Get menu template for big screens like PC
     * @param null $page_id
     */
    public static function get_menu($page_id=null){
        get_template_part('templates/partials/menu/menu');
    }

    /**
     * Get submenu template when a menu item have children items
     * @param $menu_items
     * @param $item_id
     */
    public static function get_submenu($menu_items,$item_id){
        include(locate_template('templates/partials/menu/submenu.php'));
    }

    /**
     * Get menu template for small screens like cellphones
     * @param null $page_id
     */
    public static function get_menu_mobile($page_id=null){
        get_template_part('templates/partials/menu/mobile');
    }

    /**
     * Get submenu template when a menu item have children items, It's shown only on small screens
     * @param $menu_items
     * @param $item_id
     */
    public static function get_submenu_mobile($menu_items,$item_id){
        include(locate_template('templates/partials/menu/mobile-submenu.php'));
    }
    /**
     * Get all no empty and unique menus created on wp-admin
     * @return mixed
     */
    public static function get_all_menus_list(){
        $footer_menu = self::get_footer_menu();
        if(!empty($footer_menu)){
            $footer_menu_id = $footer_menu[0]->term_id;
            $menu =  array_unique(get_terms( 'nav_menu', array( 'hide_empty' => true, 'exclude' => $footer_menu_id ) ),SORT_REGULAR);
        }else
            $menu =  array_unique(get_terms( 'nav_menu', array( 'hide_empty' => true, 'exclude' => $footer_menu['term_id'] ) ),SORT_REGULAR);
//        $menu_name = 'primary_navigation';
//        $locations = get_nav_menu_locations();
//        $menu_id = $locations[ $menu_name ] ;
//        $menuxxx = wp_get_nav_menu_object($menu_id);
//        echo "<pre>";
//        print_r($menuxxx);
//        echo "</pre>";
        return $menu;
    }

    /**
     * Check if a menu item have children items from $menu_items list
     * @param $menu_items
     * @param $item_id
     * @return bool
     */
    public static function check_children_menu($menu_items,$item_id){
        foreach($menu_items as $item){
            if($item_id == $item->menu_item_parent){
                return true;
            }
        }
        return false;
    }
    public static function get_language_menu_accordion(){
        global $design_options;
        $language_options = $design_options['group_language'];
        if ($language_options['header_language_display'][0] === 'TRUE'){
            echo '<div class="ui inverted segment">';
            display_language_menu_accordion();
            echo '</div>';
        }
    }
    public static function get_footer_menu(){
        $footer_menu = get_terms( 'nav_menu', array( 'hide_empty' => true, 'slug' => 'footer' ));
        return $footer_menu;
    }
}
