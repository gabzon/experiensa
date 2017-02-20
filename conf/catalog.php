<?php

use Experiensa\Modules\CurlRequest;

class Catalog{
    public static function get_catalog(){
        $api_response = [];
        //Agency Catalog
        $agency_api_url = get_bloginfo('url') . '/wp-json/wp/v2/voyage';
        $agency_response = CurlRequest::getApiResponse($agency_api_url.'?&per_page=100',true);
        if(!$agency_response){
            $agency_response = CurlRequest::getApiResponse($agency_api_url.'?&per_page=100');
        }
//        echo "<pre>";
//        var_dump($agency_response);
//        echo "</pre>";
        if(!empty($agency_response) && !isset($agency_response->status) && $agency_response != NULL) {
//            echo "<h3>por aqui fue</h3>";
            $api_response[] = $agency_response;
        }

        //Partners Catalog
        $partners = Partners::partnerApiList();
//        echo "<br><h2></h2>Partners</h2><br><pre>";
//        var_dump($partners);
//        echo "</pre>";
        if(!empty($partners) && Helpers::check_internet_connection()){
//            echo " entro a partners";
            for ($i=0; $i < count($partners); $i++) {
                // Check if  $partners[$i]['website'] dont have '/' on last char
                $api_url = $partners[$i]['website'];
                if(substr($partners[$i]['website'], -1)!='/') {
                    $api_url .= '/';
                }
                $api_url .= 'wp-json/wp/v2/voyage';
//                echo "<br>entro a un partner ".$api_url;
                //Check if $api_url is a valid url
                if (!(filter_var($api_url, FILTER_VALIDATE_URL) === FALSE)){
                    echo "<br>FILTER_VALIDATE_URL ";
//                    $file_headers = @get_headers($api_url);
//                    echo "<br>los header de ".$api_url;
//                    echo"<br><h2>Datos del header1</h2>";
//                    echo "<pre>";
//                    var_dump(CurlRequest::getHeaders($api_url));
//                    echo "</pre>";
//                    echo"<br><h2>Datos del header2</h2>";
//                    echo "<pre>";
//                    var_dump($file_headers);
//                    echo "</pre>";
                    $file_headers = CurlRequest::getHeaders($api_url);
                    //check if url have response HTTP/1.1 200 OK
                    if($file_headers && !empty($file_headers) && strpos($file_headers[0],'OK')!==FALSE) {
                        //Using Curl
                        $partner_response = CurlRequest::getApiResponse($api_url.'?&per_page=100',true);
                        if(!$partner_response){
                            $partner_response = CurlRequest::getApiResponse($api_url.'?&per_page=100');
                        }
                        if(!empty($partner_response) && !isset($partner_response->status) && $partner_response != NULL) {
                            $api_response[] = $partner_response;
                        }
                    }
                }
            }
        }
//        echo" <br><h2> all responses</h2>";
//        echo "<pre>";
//        var_dump($api_response);
//        echo "</pre>";
        $voyages = array();
        $index = 0;
        for ($i=0; $i < count($api_response); $i++) {
            for ($j = 0; isset($api_response[$i]) && $j < count($api_response[$i]); $j++) {
                $voyage = $api_response[$i][$j];
                $tab = [
                    'index'             => $index,
                    'id'                => $voyage->id,
                    'title'             => $voyage->title->rendered,
                    'excerpt'           => $voyage->excerpt->rendered,
                    'cover_image'       => $voyage->cover_image,
                    'currency'          => $voyage->currency,
                    'price'             => $voyage->price,
                    'itinerary'         => $voyage->itinerary,
                    'duration'          => $voyage->duration,
                    'country'           => (isset($voyage->country)?$voyage->country:""),
                    'location'          => (isset($voyage->location)?$voyage->location:""),
                    'theme'             => (isset($voyage->theme)?$voyage->theme:""),
                    'category'          => $voyage->category,
                    'included'          => $voyage->included,
                    'excluded'          => $voyage->excluded,
                    'api_link'          => $voyage->link,
                    'website'           => $voyage->website,
                    'website_name'      => $voyage->website_name,
                ];
                $voyages[] = $tab;
                $index++;
            }
        }
        return $voyages;
        // Restore original Post Data
        wp_reset_postdata();
}


    public static function display_trip_detail($trip,$mail,$return=false){
        $display = "<div class=\"ui modal\">";
        $display .=     "<div class=\"header\">";
        $display .=         "<h2>".$trip['title']."</h2>";
        $display .=     "</div>";
        $display .=     "<div class=\"content\">";
        $display .=         "<div class=\"ui two column grid stackable\">";
        $display .=             "<div class=\"six wide column\">";
        if(!empty($trip['price']))
            $display .=            "<b>". __('Price','sage').":</b> ".$trip['price']. ' ' . Helpers::get_currency()."<br>";
        if(!empty($trip['duration']))
            $display .=            "<b>". __('Duration','sage') .":</b> ".$trip['duration']."<br>";
        if(!empty($trip['country']))
            $display .=            "<b>". __('Country','sage') .":</b> ".$trip['country']."<br>";
        if(!empty($trip['location']))
            $display .=            "<b>". __('Location','sage') .":</b> ".$trip['location']."<br>";
        if(!empty($trip['theme']))
            $display .=            "<b>". __('Theme','sage') .":</b> ".$trip['theme']."<br>";
        $display .=                 "<p>". $trip['excerpt'] ."</p>";
        $display .=             "</div>";
        $display .=             "<div class=\"ten wide column ui image\">";
        if(!$trip['cover_image']->feature_image && empty($trip['cover_image']->gallery)){
            $display .=             "<img src=\"".get_stylesheet_directory_uri().'/assets/images/travel-no-image.jpg'."\" alt=\"\" />";
        }else{
            if($trip['cover_image']->feature_image){
                $display .=         "<img src=\"".$trip['cover_image']->feature_image."\" alt=\"\" />";
            }else{
                $display .=         "<img src=\"".$trip['cover_image']->gallery[0]."\" alt=\"\" />";
            }
        }
        $display .=             "</div>";
        $display .=         "</div>";
        $display .=     "</div>";
        $display .=     "<div class=\"content\">";
        $display .=         "<div class=\"description\">";
        $display .=         "</div>";
        $display .=     "</div>";
        if(!empty($trip['itinerary'])) {
            $display .= "<div class=\"content\">";
            $display .=     "<h3>".__("Itinerary","sage")."</h3>";
            $display .=     "<div class=\"description\">". $trip['itinerary'] ."</div>";
            $display .= "</div>";
        }
        $display.="<div class=\"actions\">";
        $display.=  "<div class=\"ui black deny button\">";
        $display .= __('Close','sage');
        $display.=  "</div>";
        $display.=  "<a class=\"ui positive right labeled icon button\" href='".$mail."'>";
        $display.=      __("Contact us","sage");
        $display.=      "<i class=\"checkmark icon\"></i>";
        $display.=  "</a>";
        $display.="</div>";
        //End Modal
        $display.="</div>";
        if(!$return)
            echo $display;
        else
            return $display;
    }
}
