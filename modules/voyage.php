<?php
class Voyage{

    public static function price($id){
        $settings       = get_option('agency_settings');
        $reseller       = get_post_meta($id, 'resell', false);
        $display_from   = get_post_meta($id, 'display_from', false);
        $price          = get_post_meta($id, 'price', true);
        //piklist::pre($display_from);
        $currency = ($settings['agency_currency']) ? ' ' . $settings['agency_currency'] : '';
        $from = ($display_from[0][0] === 'TRUE') ? __('From','sage') . ' ' : '';

        if ( $reseller[0][0] === 'TRUE' ) {
            $margin     = get_post_meta($id,'tour_operator_margin',true);
            return $from . ceil($price + (($margin * $price)/100)) . $currency;
        } else {
            return $from . get_post_meta($id,'price',true) . $currency;
        }
    }

    public static function display_detail_table( $trip = ['price' =>'']){

    }

    public static function get_voyage_images($postID){
        $images = array();
        $gallery = get_post_meta($postID, 'gallery');
        //Get images from Gallery meta field
        if(!empty($gallery) && !empty($gallery[0])){
            $images['image_url'] = wp_get_attachment_url($gallery[0]);
            $images['thumbnail_url'] = wp_get_attachment_thumb_url( $gallery[0] );
            $images['thumbnail_image'] = wp_get_attachment_image($gallery[0],'thumbnail');
            return $images;
        }else{
            //Get images from Post Feature Image
            $feature_image_id = get_post_thumbnail_id($postID);
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

            }else{
                //Get images from Guanaima API
                $terms = get_the_terms($postID,'location');
                if(!empty($terms)){
                    $location = array();
                    foreach($terms as $term){
                        $row['taxonomy'] = 'location';
                        $row['term'] = $term->name;
                        $location[] = $row;
                    }
                    $response = RequestMedia::get_media_request_api('media',$location);
                    if(!empty($response)){
                        foreach($response as $image){
                            if(strpos($image['full_size'],'http')===0
                            && strpos($image['thumbnail_size'],'http')===0){
                                $images['image_url'] = $image['full_size'];
                                $images['thumbnail_url'] = $image['thumbnail_size'];
                                $images['thumbnail_image'] = "<img width=\"150\" height=\"150\" src=\"".$image['thumbnail_size']."\" class=\"attachment-thumbnail size-thumbnail\">";
                                break;
                            }
                        }
                    }
                }
            }
            return $images;
        }
    }
}
?>
