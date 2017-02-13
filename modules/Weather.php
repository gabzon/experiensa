<?php namespace Experiensa\Modules;

use \Experiensa\Modules\CurlRequest;

class Weather
{
    public static function wunderground_forecast_request($name = false, $lat = false, $lon = false){
        $base_url = 'http://api.wunderground.com/api/';
        $api_key = '2a059b0ae2ccbb57';
        $response = [];
        if(!$name){
            $url = $base_url.$api_key.'/forecast/q/'.$lat.','.$lon.'.json';
//            echo "<h1>$url</h1>";
            $response = CurlRequest::getApiResponse($url);
        }else{
            $url = $base_url.$api_key.'/forecast/q/'.$name.'.json';
//            echo "<h1>$url</h1>";
            $response = CurlRequest::getApiResponse($url);
        }
        return $response;
    }
    public static function yahoo_request($name = false, $lat = false, $lon = false){
        $BASE_URL = "http://query.yahooapis.com/v1/public/yql";
        $data = [];
        if($name) {
            $yql_query = 'select * from weather.forecast where woeid in (select woeid from geo.places(1) where text="' . $name . '")';
            $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";
//            echo "<h1>$yql_query_url</h1>";
            $response = CurlRequest::getApiResponse($yql_query_url);
            if($response->query->count > 0){
                $data = $response;
            }else{
                $yql_query = 'select * from weather.forecast where woeid in (SELECT woeid FROM geo.places WHERE text="('.$lat.','.$lon.')")';
                $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";
                $data = CurlRequest::getApiResponse($yql_query_url);
            }
        }
        return $data;
    }
}