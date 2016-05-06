<?php
/**
 *
 **/
class RequestMedia{
  public static function get_media_api_list($website='http://guanaima.ch',$posttype, $terms=null){
    $list = array();
    //$website = 'http://guanaima.ch';
    //$row['website'] = 'guanaima.ch';
    if(substr($website, -1)!='/')
      $api = '/wp-json/wp/v2/'.$posttype;
    else
      $api = 'wp-json/wp/v2/'.$posttype;
    if($terms==null){
      $row['website'] = $website;
      $row['api'] = $api;
      $row['filter'] = '';
      $list[] = $row;
    }else{
      foreach($terms as $term){
        $row['website'] = $website;
        $row['api'] = $api;
        $filter = '?filter[taxonomy]='.$term['taxonomy'].'&filter[term]='.$term['term'];
        $row['filter'] = $filter;
        $list[] = $row;
      }
    }
    return $list;
  }

  public static function  get_media_response($apis){
    $media_content = array();
    foreach($apis as $api){
      //Check if $api_url is a valid url
      $api_url = $api['website'].$api['api'];
      if (!(filter_var($api_url, FILTER_VALIDATE_URL) === FALSE)){
        $file_headers = @get_headers($api_url);
        //check if url have response HTTP/1.1 200 OK
        if(!empty($file_headers) && strpos($file_headers[0],'OK')!==FALSE) {
          $filter = $api['filter'];
          $full_url = $api_url.$filter;
          if (function_exists('curl_version')) {//Using Curl
            //  Initiate curl
            $ch = curl_init();
            // Disable SSL verification
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            // Will return the response, if false it print the response
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // Set the url
            curl_setopt($ch, CURLOPT_URL,$full_url);
            // Execute
            $api_content=curl_exec($ch);
            // Closing
            curl_close($ch);
          }else{
            if(ini_get('allow_url_fopen'))
              $api_content = file_get_contents($full_url);
            else
              $api_content = "";
          }
          $api_content = json_decode($api_content);
          foreach ($api_content as $content) {
            $content = [
                'id' => $content->id,
                'date' => $content->date,
                'title' => $content->title->rendered,
                'link' => $content->link,
                'full_size' => $content->media_details->sizes->full->source_url,
                'medium_size' => $content->media_details->sizes->medium->source_url,
                'thumbnail_size' => $content->media_details->sizes->thumbnail->source_url,
                'api_link' => $full_url
            ];
            $media_content[] = $content;
          }
        }
      }
    }
    return $media_content;
  }

  public static function get_media_request_api($posttype = 'media', $terms = null){
    if($terms !=null){
      $apis = self::get_media_api_list('http://guanaima.ch',$posttype,$terms);
    }else{
      $apis = self::get_media_api_list('http://guanaima.ch',$posttype);
    }
    $media_content = self::get_media_response($apis);
    return $media_content;
  }

  public static function get_media_request_local($posttype = 'media', $terms = null){
    if($terms !=null){
      $apis = self::get_media_api_list(get_site_url(),$posttype,$terms);
    }else{
      $apis = self::get_media_api_list(get_site_url(),$posttype);
    }
    $media_content = self::get_media_response($apis);
    return $media_content;
  }
}
