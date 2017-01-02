<?php namespace Experiensa\Component;


class Background
{
    public static function  getBackgroundImageURL($images){
        $bg_img = false;
        foreach($images as $img){
            if(isset($img)){
                $bg_img = wp_get_attachment_url($img);
                break;
            }
        }
        return $bg_img;
    }
    public static function getBackgroundSize($size){
        $nsize = "background-size: cover;";
        if($size==='full')
            $nsize .= 'height:100vh;';
        return $nsize;
    }
    public static function getBackgroundOpacity($opacity,$color){
        $style = "";
        if($opacity !== '0.01'){
            $rgb = \Helpers::hex2rgb($color);
            $style = "linear-gradient(rgba(".$rgb.",". $opacity."),rgba(".$rgb.",". $opacity.")),";
        }
        return $style;
    }
    public static function getBgTexture($texture_image){
        $texture_image = (is_array($texture_image)?self::getBackgroundImageURL($texture_image):$texture_image);
        return ($texture_image ? "background-image: url(" . $texture_image . "); background-repeat:repeat;" : "");
    }
    public static function getBackgroundImage($image,$size,$opacity_value,$opacity_color){
        $image = (is_array($image)?self::getBackgroundImageURL($image):$image);
        $size = self::getBackgroundSize($size);
        $opacity_style = self::getBackgroundOpacity($opacity_value,$opacity_color);
        return ($image ? "background:".$opacity_style."url('" . $image . "') no-repeat center center fixed;".$size : "");
    }
}