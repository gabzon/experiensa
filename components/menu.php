<?php
//Semantic UI manu
Class Menu {
    public static function display_menu_items($menu_id){
        $menu = "";
        $menu_items = wp_get_nav_menu_items($menu_id);

        if(!empty($menu_items)) {
            for ($i = 0; $i < count($menu_items); $i++) {
                for ($j = $i + 1; $j < count($menu_items) - 1; $j++) {
                    if ($menu_items[$j]->menu_order < $menu_items[$i]->menu_order) {
                        $aux = $menu_items[$i];
                        $menu_items[$i] = $menu_items[$j];
                        $menu_items[$j] = $aux;
                    }
                }
            }
            $submenu = array();
            for($i = 0; $i < count($menu_items); $i++){
                if($menu_items[$i]->menu_item_parent != 0){
                    $submenu[] = $menu_items[$i];
                    unset($menu_items[$i]);
                }
            }
            $menu .= "<div class=\"menu\">";
            foreach($menu_items as $value){
                $url = $value->url;
                $title = $value->title;
                $id = $value->ID;
                $is_parent = false;
                $childs = "";
                for($i=0;$i<count($submenu);$i++){
                    if($id == $submenu[$i]->menu_item_parent){
                        $is_parent = true;
                        $childs .= "<a class=\"item\" href='".$submenu[$i]->url."'>";
                        $childs .= $submenu[$i]->title;
                        $childs .= "</a>";
                    }
                }
                if(!$is_parent) {
                    $menu .= "<a class=\"item\" href='" . $url . "'>";
                    $menu .= $title;
                    $menu .= "</a>";
                }else{
                    $menu .= "<div class=\"item\">";
                    $menu .=    "<i class=\"dropdown icon\"></i>";
                    $menu .=    "<span class=\"text\">".$title."</span>";
                    $menu .=    "<div class=\"menu\">";
                    $menu .=        $childs;
                    $menu .=    "</div>";
                    $menu .= "</div>";
                }
            }
            $menu .="</div>";
        }
        return $menu;
    }
    public static function display_all_menus($return=false){
        $menus = Helpers::get_all_menus_list();
        $all_menus = "";
        if(!empty($menus)) {
            $all_menus .= "<div class=\"right menu\">";
            foreach ($menus as $menu) {
                $all_menus .= "<div id=\"landing-menu\" class=\"ui dropdown item\">";
                $all_menus .= $menu->name."<i class=\"dropdown icon\"></i>";
                $submenus = self::display_menu_items($menu->term_id);
                $all_menus .= $submenus;
                $all_menus .= "</div>";
            }
            $all_menus .= "</div>";
        }
        if($return)
            return $all_menus;
        else{
            echo $all_menus;
        }
    }
}
