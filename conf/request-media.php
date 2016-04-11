<?php
/**
 *
 **/
class RequestMedia{
  public static function get_media_api_list($posttype, $terms=null){
    $list = array();
    $website = 'http://guanaima.ch';
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
  
  public static function get_media_request($posttype = 'media', $terms = null){
    if($terms !=null){
      $apis = self::get_media_api_list($posttype,$terms);
    }else{
      $apis = self::get_media_api_list($posttype);  
    }
    $media_content = array();
    foreach($apis as $api){
      //Check if $api_url is a valid url
      $api_url = $api['website'].$api['api'];
      if (!(filter_var($api_url, FILTER_VALIDATE_URL) === FALSE)){
        $file_headers = @get_headers($api_url);
        //check if url have response HTTP/1.1 200 OK
        if(!empty($file_headers) && $file_headers[0]=='HTTP/1.1 200 OK') {
          $filter = $api['filter'];
          $full_url = $api_url.$filter;
          $api_content = file_get_contents($full_url);
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
}