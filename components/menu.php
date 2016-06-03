<?php
//Semantic UI manu
Class Menu {

    public static function check_children_menu($menu_items,$item_id){
        foreach($menu_items as $item){
            if($item_id == $item->menu_item_parent){
                return true;
            }
        }
        return false;
    }
    public static function submenus($menu_items,$item_id){
        $submenu = "<div class=\"menu\">";
        foreach($menu_items as $item){
            if($item_id == $item->menu_item_parent){
                if(self::check_children_menu($menu_items,$item->ID)){
                    $submenu .= "<div class=\"item\">";
                    $submenu .=    "<i class=\"dropdown icon\"></i>";
                    $submenu .=    "<span class=\"text\">".$item->title."</span>";
                    $other_submenu = self::submenus($menu_items,$item->ID);
                    $submenu .= $other_submenu;
                    $submenu .=    "</div>";
                    $submenu .= "</div>";
                }else {
                    $submenu .= "<a class='item' href='" . $item->url . "'>" . $item->title . "</a>";
                }
            }
        }
        $submenu .= "</div>";
        return $submenu;
    }
    public static function display_all_menus($page_id=null,$position='right',$return=false){
        $menus_list = Helpers::get_all_menus_list();
        $menu_string = "";
        if(!empty($menus_list)){
            foreach($menus_list as $menu){
                $menu_string .= "<div class=\"$position menu\">";
                $menu_items = wp_get_nav_menu_items($menu->term_id);
                foreach($menu_items as $item){
                    if($item->menu_item_parent == 0) {
                        if (self::check_children_menu($menu_items, $item->ID)) {
                            if ($page_id && $page_id == $item->object_id) {
                                $menu_string .= "<div class=\"ui dropdown item active landing-menu\">";
                            }else{
                                $menu_string .= "<div class=\"ui dropdown item landing-menu\">";
                            }
                            $menu_string .=     $item->title . "<i class=\"dropdown icon\"></i>";
                            $submenus = self::submenus($menu_items, $item->ID);
                            $menu_string .= $submenus;
                            $menu_string .= "</div>";
                        } else {
                            if ($item->menu_item_parent == 0){
                                if ($page_id && $page_id == $item->object_id) {
                                    $menu_string .= "<a class='item active' href='" . $item->url . "'>" . $item->title . "</a>";
                                }else{
                                    $menu_string .= "<a class='item' href='" . $item->url . "'>" . $item->title . "</a>";
                                }
                            }
                        }
                    }
                }
                $menu_string .= "</div>";
            }
        }
        if($return)
            return $menu_string;
        else{
            echo $menu_string;
        }
    }

    public static function submenus_mobile($menu_items,$item_id){
        $submenus = "";
        foreach($menu_items as $item){
            if($item_id == $item->menu_item_parent){
                if(self::check_children_menu($menu_items,$item->ID)){

                }else {
                    $submenus .= "<a class='item' href='" . $item->url . "'>" . $item->title . "</a>";
                }
            }
        }
        return $submenus;
    }

    public static function display_all_menus_mobile($return=false){
        $menu_string = "";
        $menus_list = Helpers::get_all_menus_list();
        if(!empty($menus_list)){
            foreach($menus_list as $menu) {
                $menu_string = "<div class=\"item\">";
                $menu_string .=     "<div class=\"header\">MENU</div>";
                $menu_items = wp_get_nav_menu_items($menu->term_id);
                foreach($menu_items as $item){
                    if ($item->menu_item_parent == 0) {
                        if (self::check_children_menu($menu_items, $item->ID)) {
                            $menu_string .= "<div class=\"ui inverted accordion\">";
                            $menu_string .=     "<div class=\"title active\">";
                            $menu_string .=         "<i class=\"dropdown icon\"></i>";
                            $menu_string .= $item->title;
                            $menu_string .=     "</div>";
                            $menu_string .=     "<div class=\"content active\">";
                            $submenus     = self::submenus_mobile($menu_items, $item->ID);
                            $menu_string .= $submenus;
                            $menu_string .=     "</div>";
                            $menu_string .= "</div>";
                        }else{
                            $menu_string .= "<a class=\"item\" href='".$item->url."'>".$item->title."</a>";
                        }
                    }
                }
                $menu_string .= "</div>";
            }
        }
        if($return)
            return $menu_string;
        else{
            echo $menu_string;
        }
    }
}
