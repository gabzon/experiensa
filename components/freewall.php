<?php

/**
 * Class Freewall
 */
class Freewall{
    /**
     * @param $args
     */
    public static function display_flex_layout($args){
        $freewall="";
        if(empty($args)){
            echo $freewall;
        }else {
            $freewall .= "<div id=\"freewall\" class=\"free-wall\">";
            $images = "";
            foreach($args as $value){
                $image ="<div class='brick' style='width:{width}px;'><img src='".$value['image_url']."' width='100%'></div>";
                $px = rand(250,500);
                $images .= str_replace("{width}",$px,$image);
            }
            $freewall .= $images."</div>";
            echo $freewall;
        }
    }
}
