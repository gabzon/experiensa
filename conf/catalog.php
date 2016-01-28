<?php

class Catalog{

    public static function get_catalog(){
        // WP_Query arguments
        $args = array (
        	'post_type'              => array( 'partner' ),
        	'orderby'                => 'rand',
            'posts_per_page'         => -1
        );

        // The Query
        $query = new WP_Query( $args );

        $partners = [];
        // The Loop
        if ( $query->have_posts() ) {
        	while ( $query->have_posts() ) {
        		$query->the_post();
                $partner = [
                    'ID' => get_the_ID(),
                    'post_title' => get_the_title(),
                    'website' => get_post_meta(get_the_ID(),'partner_website',true),
                ];
                $partners[] = $partner;
        	}
        } else {

        }

        $partner_api = [];
        for ($i=0; $i < count($partners); $i++) {
            /* ATTENTION!! Website should finish with a /, ex: "http://fiesta-travel.ch/" */
            $api_url = $partners[$i]['website'] .'wp-json/wp/v2/voyage';
            $api_content = file_get_contents($api_url);
            $api_content = json_decode($api_content);
            $partner_api[$i] = $api_content;
        }

        $agency_api = get_site_url() . '/wp-json/wp/v2/voyage';
        $agency_content = file_get_contents($agency_api);
        $agency_content = json_decode($agency_content);
        $partner_api[] =$agency_content;

        $voyages = array();

        for ($i=0; $i < count($partner_api); $i++) {
            for ($j = 0; $j < count($partner_api[$i]); $j++) {
                $product = $partner_api[$i][$j];
                $tab = [
                    'id'                => $product->id,
                    'title'             => $product->title->rendered,
                    'excerpt'           => $product->excerpt->rendered,
                    'cover_image'       => $product->cover_image,
                    'voyage_currency'   => $product->voyage_currency,
                    'voyage_price'      => $product->voyage_price,
                    'api_link'          => $product->link,
                ];
                $voyages[] = $tab;
                //piklist::pre($product);
            }
        }
        return $voyages;

        // Restore original Post Data
        wp_reset_postdata();
    }
}
