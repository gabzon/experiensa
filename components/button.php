<?php

/**
 * Created by PhpStorm.
 * User: victor
 * Date: 02-05-2016
 * Time: 07:13 PM
 */
class Button{
    public static function display_buttons($args,$return=false){
        $buttons = "";
        if(!empty($args)){
            $buttons .= "<div class=\"ui centered grid\">";
            foreach($args as $value){
                if(!isset($value['post_link']))
                    $buttons .= "<button id=\"".$value['filter-class']."\" class=\"ui basic button\" data-filter=\"".$value['filter-data']."\" style=\"font-weight:bold\">";
                else
                    $buttons .= "<a class=\"ui basic button\" href=\"".$value['post_link']."\" style=\"font-weight:bold\">";
                $buttons .=     $value['title'];
                if(!isset($value['post_link']))
                    $buttons .= "</button>";
                else
                    $buttons .= "</a>";
            }
            $buttons .= "</div>";
        }
        if(!$return)
            echo $buttons;
        else
            return $buttons;
    }
}