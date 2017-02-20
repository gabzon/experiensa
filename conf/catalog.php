<?php

class Catalog{
    public static function get_catalog(){
        $code = Helpers::getActiveLanguageCode();
        if(!$code){
            $lang_req = "?per_page=100";
        }else{
            $lang_req = '?lang='.$code.'&per_page=100';
        }
        $api_response = [];
        //Agency Catalog
        $agency_api_url = get_bloginfo('url') . '/wp-json/wp/v2/voyage';        
//        echo " el agency api url es ".$agency_api_url;
        if (function_exists('curl_version')){//Using Curl
            //  Initiate curl
            $ch = curl_init();
            // Disable SSL verification
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            // Will return the response, if false it print the response
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // Set the url
            $real_url = $agency_api_url.$lang_req;
            //echo "el real url propio es ".$real_url;
            curl_setopt($ch, CURLOPT_URL,$real_url);
            // Execute
            $agency_response=curl_exec($ch);
            if(!$agency_response){
                curl_setopt($ch, CURLOPT_URL,$agency_api_url);
                $agency_response=curl_exec($ch);
            }
            // Closing
            curl_close($ch);
        }else{
            if(ini_get('allow_url_fopen')) {
                $agency_response = @file_get_contents($agency_api_url . $lang_req);
                if(!$agency_response)
                    $agency_response = @file_get_contents($agency_api_url);
            }else
                $agency_response = "";
        }
//        echo "<br>Datos de la agencia";
//        echo "<pre>";
//        var_dump($agency_response);
//        echo "</pre>";
        $agency_response = json_decode($agency_response);
        $api_response[] =$agency_response;

        //Partners Catalog
        $partners = Partners::partnerApiList();
//        echo "<pre>";
//        var_dump($partners);
//        echo "</pre>";
        if(!empty($partners) && Helpers::check_internet_connection()){
//            echo " entro a partners";
            for ($i=0; $i < count($partners); $i++) {
                // Check if  $partners[$i]['website'] dont have '/' on last char
                $api_url=$partners[$i]['website'];
                if(substr($partners[$i]['website'], -1)!='/') {
                    $api_url .= '/';
                }
                $api_url .= 'wp-json/wp/v2/voyage';
//                echo "<br>entro a un partner ".$api_url;
                //Check if $api_url is a valid url
                if (!(filter_var($api_url, FILTER_VALIDATE_URL) === FALSE)){
//                    echo "<br>entro aqui ".$api_url;
                    $file_headers = @get_headers($api_url);
//                    echo "<br>los header de ".$api_url;
//                    echo"<br><strong>Datos del header</strong>";
//                    echo "<pre>";
//                    var_dump($file_headers);
//                    echo "</pre>";
                    //check if url have response HTTP/1.1 200 OK
                    if($file_headers && !empty($file_headers) && strpos($file_headers[0],'OK')!==FALSE) {
                        //Using Curl
                        if (function_exists('curl_version')){
                            //  Initiate curl
                            $ch = curl_init();
                            // Disable SSL verification
                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                            // Will return the response, if false it print the response
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            // Set the url
                            $real_url = $api_url.$lang_req;
                            //echo "<br> real url ".$real_url;
                            curl_setopt($ch, CURLOPT_URL,$real_url);
                            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,0);
                            curl_setopt($ch, CURLOPT_TIMEOUT, 400); //timeout in seconds
//                            set_time_limit(0);
                            // Execute
                            $partner_response=curl_exec($ch);
                            echo"<br>qqqq";
                            echo "<pre>";
                            var_dump($partner_response);
                            echo "</pre>";
                            if(!$partner_response){
                                //echo "<br> api url ".$api_url;
                                curl_setopt($ch, CURLOPT_URL,$api_url);
                                $partner_response=curl_exec($ch);
                            }
                            echo"<br>xxxxx";
                            echo "<pre>";
                            var_dump($partner_response);
                            echo "</pre>";
                            // Closing
                            curl_close($ch);
                        }else{
                            if(ini_get('allow_url_fopen')) {
                                $partner_response = @file_get_contents($api_url . $lang_req);
                                if(!$partner_response)
                                    $partner_response = @file_get_contents($api_url);
                            }else
                                $partner_response = "";
                        }
                        $partner_response = json_decode($partner_response);
//                        echo"<br>respuesta del partner";
//                        echo"<pre>";
//                        var_dump($partner_response);
//                        echo "</pre>";
                        $api_response[] = $partner_response;
                    }
                }
            }
        }
//        echo" <br> all responses";
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
