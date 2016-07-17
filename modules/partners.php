<?php


class Partners{
    public static function partnerList(){
        // WP_Query arguments
        $args = array (
            'post_type'              => array( 'partner' ),
            'orderby'                => 'rand',
            'posts_per_page'         => -1,
        );
        // The Query
        $query = new WP_Query( $args );

        $partners = [];
        // The Loop
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();
                $id = get_the_ID();
                $partner_api = get_post_meta($id,'partner_api',true);
                $api = false;
                if($partner_api === 'TRUE')
                    $api = true;
                $partner_request_form = get_post_meta($id,'partner_request_form',true);
                $request = false;
                if($partner_request_form === 'TRUE')
                    $request = true;
                $partner = [
                    'ID' => get_the_ID(),
                    'post_title' => get_the_title(),
                    'website' => get_post_meta($id,'partner_website',true),
                    'api' => $api,
                    'request_form' => $request
                ];
                $partners[] = $partner;
            }
        }
        return $partners;
    }
    public static function partnerApiList(){
        $partnerApiList = array();
        $partnerList = self::partnerList();
        if(!empty($partnerList)){
            foreach($partnerList as $partner){
                if($partner['api']){
                    $partnerApiList [] = $partner;
                }
            }
        }
        return $partnerApiList;
    }
}