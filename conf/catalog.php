<?php

class Catalog{
  public static function get_catalog(){
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
            $partner = [
                'ID' => get_the_ID(),
                'post_title' => get_the_title(),
                'website' => get_post_meta(get_the_ID(),'partner_website',true),
            ];
            $partners[] = $partner;
        }
//        return $partners;
    }else
        return array();
    if ( function_exists('icl_object_id') ) { //Check if WPML is installed
      $active_lang = ICL_LANGUAGE_CODE;//Active WPML language code
      $lang_req = '?lang='.$active_lang;
    }else{
      $lang_req = "";
    }

    $partner_api = [];
    if(!empty($partners) && Helpers::check_internet_connection()){
      for ($i=0; $i < count($partners); $i++) {
          // Check if  $partners[$i]['website'] dont have '/' on last char
          $api_url=$partners[$i]['website'];
          if(substr($partners[$i]['website'], -1)!='/') {
            $api_url .= '/';
          }
          $api_url .= 'wp-json/wp/v2/voyage';
          //Check if $api_url is a valid url
          if (!(filter_var($api_url, FILTER_VALIDATE_URL) === FALSE)){
            $file_headers = @get_headers($api_url);
            //check if url have response HTTP/1.1 200 OK
            if(!empty($file_headers) && strpos($file_headers[0],'OK')!==FALSE) {
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
                    curl_setopt($ch, CURLOPT_URL,$real_url);
                    // Execute
                    $api_content=curl_exec($ch);
                    //echo "<br>".$api_content." - ".$real_url;
                    if(!$api_content){
                        curl_setopt($ch, CURLOPT_URL,$api_url);
                        $api_content=curl_exec($ch);
                    }
                    // Closing
                    curl_close($ch);
                }else{
                    if(ini_get('allow_url_fopen')) {
                        $api_content = @file_get_contents($api_url . $lang_req);
                        if(!$api_content)
                            $api_content = @file_get_contents($api_url);
                    }else
                        $api_content = "";
                }
                $api_content = json_decode($api_content);
                $partner_api[$i] = $api_content;

            }
          }
      }
    }
//    $partner_api = array();
      $agency_api = get_site_url() . '/wp-json/wp/v2/voyage';
      if (function_exists('curl_version')){//Using Curl
          //  Initiate curl
          $ch = curl_init();
          // Disable SSL verification
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          // Will return the response, if false it print the response
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          // Set the url
          curl_setopt($ch, CURLOPT_URL,$agency_api);
          // Execute
          $agency_content=curl_exec($ch);
          // Closing
          curl_close($ch);
      }else{
          if(ini_get('allow_url_fopen'))
            $agency_content = @file_get_contents($agency_api);
          else
              $agency_content = "";
      }
    $agency_content = json_decode($agency_content);
    $partner_api[] =$agency_content;

    $voyages = array();

    for ($i=0; $i < count($partner_api); $i++) {
        for ($j = 0; isset($partner_api[$i]) && $j < count($partner_api[$i]); $j++) {
            $product = $partner_api[$i][$j];
            $tab = [
                'id'                => $product->id,
                'title'             => $product->title->rendered,
                'excerpt'           => $product->excerpt->rendered,
                'cover_image'       => $product->cover_image,
                'currency'          => $product->currency,
                'price'             => $product->price,
                'itinerary'         => $product->itinerary,
                'duration'          => $product->duration,
                'country'           => (isset($product->country)?$product->country:""),
                'location'          => (isset($product->location)?$product->location:""),
                'theme'             => (isset($product->theme)?$product->theme:""),
                'api_link'          => $product->link,
                'website'           => $product->website,
                'website_name'      => $product->website_name,
            ];
            $voyages[] = $tab;
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
        $display .=         "<div class=\"ui two column grid\">";
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
        if(isset($trip['cover_image'][0]) && !empty($trip['cover_image'][0])) {
            $display .=         "<div class=\"ten wide column\">";
            $display .=             "<img src=\"".$trip['cover_image'][0]."\" alt=\"\" class=\"ui image\" />";
            $display .=         "</div>";
        }
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
        $display.=  "<div class=\"ui black deny button\">Nope</div>";
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
