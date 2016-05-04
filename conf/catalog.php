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
    }
      if ( function_exists('icl_object_id') ) { //Check if WPML is installed
          $active_lang = ICL_LANGUAGE_CODE;//Active WPML language code
          $lang_req = '?lang='.$active_lang;
      }else{
          $lang_req = "";
      }

    $partner_api = [];
    if(!empty($partners)){
      for ($i=0; $i < count($partners); $i++) {
          // Check if  $partners[$i]['website'] dont have '/' on last char
          $api_url=$partners[$i]['website'];
          if(substr($partners[$i]['website'], -1)!='/')
            $api_url .= '/';

          $api_url .= 'wp-json/wp/v2/voyage';//.$lang_req;
          //Check if $api_url is a valid url
          if (!(filter_var($api_url, FILTER_VALIDATE_URL) === FALSE)){
            $file_headers = @get_headers($api_url);
            //check if url have response HTTP/1.1 200 OK
            if(!empty($file_headers) && strpos($file_headers[0],'OK')!==FALSE) {
              $api_content = file_get_contents($api_url.$lang_req);
              $api_content = json_decode($api_content);
              $partner_api[$i] = $api_content;
            }
          }
      }
    }
    $partner_api = array();
    $agency_api = get_site_url() . '/wp-json/wp/v2/voyage';
    $agency_content = file_get_contents($agency_api);
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


    public static function display_trip_detail($trip,$return=false){
        $display =
        "<div class=\"ui modal\">
            <div class=\"header\">
                <h2>".$trip['title']."</h2>
            </div>
            <div class=\"content\">
                <div class=\"ui two column grid\">
                    <div class=\"six wide column\">
                        <b>". __('Price','sage').":</b> ".convertCurrency($trip['price'], $trip['currency'], Helpers::get_currency() ) . ' ' . Helpers::get_currency()."<br>
                        <b>". __('Duration','sage') .":</b> 4/5 <br>
                        <b>". __('Country','sage') .":</b> Etat Unis <br>
                        <b>". __('Location','sage') .":</b> New York <br>
                        <b>". __('Theme','sage') .":</b> Leisure<br>
                        <p>". $trip['excerpt'] ."</p>
                    </div>
                    <div class=\"ten wide column\">
                        <img src=\"". $trip['cover_image']."\" alt=\"\" class=\"ui image\" />
                    </div>
                </div>
            </div>
            <div class=\"content\">
                <div class=\"description\">
                </div>
            </div>
            <div class=\"content\">
                <h3>Itinerary</h3>
                <div class=\"description\">
                    day 1  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                </div>
            </div>
            <div class=\"actions\">
                <div class=\"ui black deny button\">
                    Nope
                </div>
                <div class=\"ui positive right labeled icon button\">
                    Yep, that's me
                    <i class=\"checkmark icon\"></i>
                </div>
            </div>
        </div>";
        if(!$return)
            echo $display;
        else
            return $display;
    }
}
