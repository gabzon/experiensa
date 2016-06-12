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
    }
}
