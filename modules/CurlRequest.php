<?php namespace Experiensa\Modules;

class CurlRequest
{
    public static function getApiResponse($apiUrl,$check_lang = false,$lang_var_name = 'lang'){
        if($check_lang){
            $code = \Helpers::getActiveLanguageCode();
            if($code){
                $apiUrl .= '&'.$lang_var_name.'='.$code;
            }
        }
        if (function_exists('curl_version')) {//Using Curl
            //  Initiate curl
            $ch = curl_init();
            // Disable SSL verification
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            // Will return the response, if false it print the response
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            // Execute
            $response = curl_exec($ch);
            // Closing
            curl_close($ch);
        }else{
            if(ini_get('allow_url_fopen')) {
                $response = @file_get_contents($apiUrl);
            }else
                $response = false;
        }
        return json_decode($response);
        wp_reset_postdata();
    }
}