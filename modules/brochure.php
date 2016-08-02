<?php

class Brochure
{
    public static function get_brochures($postID){
        $images = [];
        $pdfs = get_post_meta($postID,'brochures');
        $gallery = get_post_meta($postID,'image_gallery');
        if ( !empty($gallery) && !empty($gallery[0]) ) {
            for ($i=0; $i < count($gallery); $i++) {
                $images['image_url'] = wp_get_attachment_url($gallery[$i]);
                $images['thumbnail_url'] = wp_get_attachment_thumb_url( $gallery[$i] );
                $images['thumbnail_image'] = wp_get_attachment_image($gallery[$i],'medium');
                return $images;
            }
        }
        return $images;
    }
    public static function getRandomBrochure($postID){
        $brochures = get_post_meta($postID, 'brochures')[0];
        $max = count($brochures)-1;
        if($max > -1 ) {
            $rindex = rand(0, $max);
            return $rindex;
        }
        return false;
    }
    public static function getBrochuresByPost($postID){
        $brochures = get_post_meta($postID, 'brochures')[0];
        return $brochures;
    }
    public static function getImages($brochure){
        $images = array();
        foreach ($brochure['image_gallery'] as $image){
            $row['image_url'] = wp_get_attachment_url($image);
            $row['thumbnail_url'] = wp_get_attachment_thumb_url($image);
            $row['thumbnail_image'] = wp_get_attachment_image($image);
            $images[] = $row;
        }
        return $images;
    }
    public static function getInfo($brochure,$postID){
        $post_link = get_permalink($postID);
        $info['post_link'] = $post_link;
        $info['title'] = ucwords(get_the_title($postID));
        $info['subtitle'] = $brochure['title'];
        $images = self::getImages($brochure);
        $info['image_url'] = $images[0]['image_url'];
        $info['thumbnail_image'] = $images[0]['thumbnail_image'];
        $info['thumbnail_url'] = $images[0]['thumbnail_url'];
        return $info;
    }
}
