<?php
class Voyage{

    public static function price($id){
        $settings       = get_option('agency_settings');
        $reseller       = get_post_meta($id, 'resell', false);
        $display_from   = get_post_meta($id, 'display_from', false);
        $price          = get_post_meta($id, 'price', true);
        $agency_currency = $settings['agency_currency'];
        $currency = ($agency_currency) ? ' ' . $agency_currency : '';
        $from = (!empty($display_from[0]) && $display_from[0] === 'TRUE') ? __('From','sage') . ' ' : '';

        if ( !empty($reseller[0]) && $reseller[0] === 'TRUE' ) {
            $margin     = get_post_meta($id,'tour_operator_margin',true);
            return $from . ceil($price + (($margin * $price)/100)) . $currency;
        } else {
            return $from . get_post_meta($id,'price',true) . $currency;
        }
    }

    public static function host_rating_stars($host_rating){
      $stars = '<span style="margin:0;padding:0;">';
      for ($i=0; $i < $host_rating; $i++) {
        $stars .= '<i class="star icon"></i>';
      }
      $stars .= '</span>';
      return $stars;
    }
    public static function display_detail_table( $trip = ['price' =>'']){

    }
    public static function get_voyage_images_list($postID){
        $images = array();
        $gallery = get_post_meta($postID, 'gallery', false);
        //Post Gallery
        if(!empty($gallery) && !empty($gallery[0])){
            foreach($gallery as $image){
                $images[] = wp_get_attachment_url($image);
            }
        }else{
            //Feature Image
            $feat_image = wp_get_attachment_url( get_post_thumbnail_id($postID) );
            if(!empty($feat_image)){
                $images[] = $feat_image;
            }else{
                //Guanaima Gallery
                $id = Common::get_original_post_id($postID,'voyage');
                $terms = Common::get_media_terms($id,'voyage');
                $gallery = RequestMedia::get_media_request_api('media',$terms);
                if(!empty($gallery)){
                    foreach($gallery as $image){
                        $images[] = $image['full_size'];
                    }
                }else{
                    //Default Image
                    $images[] = get_stylesheet_directory_uri() . '/assets/images/mauritius.jpg';
                }
            }
        }
        return $images;
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
