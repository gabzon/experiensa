<?php namespace Experiensa\Modules;

use WP_Query;

class Post
{
    public static function getPostContent( $id ){
        return get_post_field('post_content',$id);
    }
    public static function getFeatureImageID( $id ){
        return get_post_thumbnail_id($id);
    }
    public static function getFeatureImageArray( $feature_image_id ){
        $images = array();
        if($feature_image_id) {
            $full_image = wp_get_attachment_image_src($feature_image_id,'full');
            for($i=0;$i<count($full_image);$i++){
                if(strpos($full_image[$i],'http')===0){
                    $images['image_url'] = $full_image[$i];
                    break;
                }
            }
            $thumbnail_image = wp_get_attachment_image_src($feature_image_id);
            for($i=0;$i<count($thumbnail_image);$i++){
                if(strpos($thumbnail_image[$i],'http')===0){
                    $images['thumbnail_url'] = $thumbnail_image[$i];
                    break;
                }
            }
            $images['thumbnail_image'] = wp_get_attachment_image($feature_image_id);
        }
        return $images;
    }
    public static function getImages( $id ){
        $feature_image_id = self::getFeatureImageID($id);
        return self::getFeatureImageArray($feature_image_id);
    }
}