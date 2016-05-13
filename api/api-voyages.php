<?php

add_action( 'rest_api_init', 'slug_register_voyage_price' );
function slug_register_voyage_price() {
    register_rest_field( 'voyage', 'price',
        array(
            'get_callback'    => 'slug_get_voyage_price',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

add_action( 'rest_api_init', 'slug_register_voyage_cover_image' );
function slug_register_voyage_cover_image() {
    register_rest_field( 'voyage', 'cover_image',
        array(
            'get_callback'    => 'slug_get_voyage_cover_image',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

add_action( 'rest_api_init', 'slug_register_voyage_currency' );
function slug_register_voyage_currency() {
    register_rest_field( 'voyage', 'currency',
        array(
            'get_callback'    => 'slug_get_voyage_currency',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}
add_action( 'rest_api_init', 'slug_register_voyage_website' );
function slug_register_voyage_website() {
    register_rest_field( 'voyage', 'website',
        array(
            'get_callback'    => 'slug_get_voyage_website',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}
add_action( 'rest_api_init', 'slug_register_voyage_website_name' );
function slug_register_voyage_website_name() {
    register_rest_field( 'voyage', 'website_name',
        array(
            'get_callback'    => 'slug_get_voyage_website_name',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}
add_action( 'rest_api_init', 'slug_register_voyage_itinerary' );
function slug_register_voyage_itinerary() {
    register_rest_field( 'voyage', 'itinerary',
        array(
            'get_callback'    => 'slug_get_voyage_itinerary',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}
add_action( 'rest_api_init', 'slug_register_voyage_duration' );
function slug_register_voyage_duration() {
    register_rest_field( 'voyage', 'duration',
        array(
            'get_callback'    => 'slug_get_voyage_duration',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}
/*
add_action( 'rest_api_init', 'slug_register_voyage_country' );
function slug_register_voyage_country() {
    register_rest_field( 'voyage', 'country',
        array(
            'get_callback'    => 'slug_get_voyage_country',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}*/
/*
add_action( 'rest_api_init', 'slug_register_voyage_location' );
function slug_register_voyage_location() {
    register_rest_field( 'voyage', 'location',
        array(
            'get_callback'    => 'slug_get_voyage_location',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}*/
/*
add_action( 'rest_api_init', 'slug_register_voyage_theme' );
function slug_register_voyage_theme() {
    register_rest_field( 'voyage', 'theme',
        array(
            'get_callback'    => 'slug_get_voyage_theme',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}*/
/**
 * Get the value of the "starship" field
 *
 * @param array $object Details of current post.
 * @param string $field_name Name of field.
 * @param WP_REST_Request $request Current request
 *
 * @return mixed
 */
function slug_get_voyage_price( $object, $field_name, $request ) {
    return get_post_meta( $object[ 'id' ], $field_name, true );
}

function slug_get_voyage_cover_image( $object, $field_name, $request ) {
    $images = array();
    $images_list = get_post_meta($object['id'],'gallery');
    if(!empty($images_list[0])){
        foreach($images_list as $img_id){
            $img_url = wp_get_attachment_image_src($img_id,'full')[0];
            $images[] = $img_url;
        }
    }else{
        $cover_image = wp_get_attachment_image_src( get_post_thumbnail_id($object['id']), 'full' )[0];
        if(!empty($cover_image))
            $images[] = $cover_image;
        else{
            $terms = get_the_terms($object['id'],'location');
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
                        $images[] = $image['full_size'];
                    }
                }
            }
        }
    }

    return $images;
}

function slug_get_voyage_currency( $object, $field_name, $request ) {
    $agency_options = get_option('agency_settings');
    return $agency_options['agency_currency'];
}
function slug_get_voyage_website( $object, $field_name, $request ) {
    return get_site_url();
}
function slug_get_voyage_website_name( $object, $field_name, $request ) {
    return get_bloginfo('name');
}
function slug_get_voyage_itinerary( $object, $field_name, $request ) {
    $itinerary = "";
    $day            = get_post_meta($object[ 'id' ],'itinerary_day');
    $title          = get_post_meta($object[ 'id' ],'itinerary_title');
    $subtitle       = get_post_meta($object[ 'id' ],'itinerary_subtitle');
    $description    = get_post_meta($object[ 'id' ],'itinerary_description');
    if(!empty($day) && !empty($title) && !empty($subtitle)){
        $count = count($day);
        for($i=0;$i<$count;$i++){
            if(isset($title[$i])){
              $itinerary .= "<strong>".$day[$i]." - ".$title[$i]."</strong>";
            }else{
                $itinerary .= "<strong>".$day[$i]."</strong>";
            }
            if(isset($subtitle[$i]) && !empty($subtitle[$i])){
                $itinerary .= ": ".$subtitle[$i];
            }
            if(isset($description[$i])){
                $itinerary .= "<br><p>".$description[$i]."</p>";
            }
        }
    }
    return $itinerary;
}

function slug_get_voyage_duration( $object, $field_name, $request ) {
    $duration = "";
    $days            = get_post_meta($object[ 'id' ],'days');
    $nights          = get_post_meta($object[ 'id' ],'nights');
    if($days){
        $duration.= implode($days) .' '.__('Days', 'sage');
    }
    if($nights){
        $duration.= ' / ' . implode($nights) . ' ' . __('Nights', 'sage');
    }
    return $duration;
}
/*
function slug_get_voyage_country( $object, $field_name, $request ) {
	$terms = get_the_terms($object[ 'id' ],'country');
    	$country = $terms[0]->name;
	return $country;
}
*/
/*
function slug_get_voyage_location( $object, $field_name, $request ) {
	$terms = get_the_terms($object[ 'id' ],'location');
        $location = $terms[0]->name;
	return $location;
}
*/
/*
function slug_get_voyage_theme( $object, $field_name, $request ) {
	$terms = get_the_terms($object[ 'id' ],'theme');
    	$theme = $terms[0]->name;
	return $theme;
}*/
?>
