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
        $brochures = get_post_meta($postID,'brochures')[0];
//        $brochures = array();
//        $titles = get_post_meta($postID,'title');
//        $expiry_date = get_post_meta($postID,'expiry_date');
//        $brochure_files = get_post_meta($postID,'brochure_file');
//        $image_galleries = get_post_meta($postID,'image_gallery');
//        for($i = 0; $i < count($titles);$i++){
//            $brochure['title'] = $titles[$i];
//            $brochure['expiry_date'] = $expiry_date[$i];
//            foreach($brochure_files[$i] as $brochure){}
//            $brochure['brochure_file'] = $brochure_files[$i];
//            $brochure['image_gallery'] = $image_galleries[$i];
//            $brochures[] = $brochure;
//        }

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
    public static  function getFiles($brochure){
        $files = array();
//        echo"<pre>";
//        print_r($brochure);
//        echo"</pre>";
        foreach ($brochure['brochure_file'] as $file){
            $files[] = wp_get_attachment_url($file);
        }
        return $files;
    }
    public static function getInfo($brochure,$postID){
//        $post_link = get_permalink($postID);
        $files_url = self::getFiles($brochure);
        $info['post_link'] = $files_url[0];
        $info['title'] = $brochure['title'];//ucwords(get_the_title($postID));
        $info['subtitle'] = '';
        $images = self::getImages($brochure);
        $info['image_url'] = $images[0]['image_url'];
        $info['thumbnail_image'] = $images[0]['thumbnail_image'];
        $info['thumbnail_url'] = $images[0]['thumbnail_url'];
        return $info;
    }
}
