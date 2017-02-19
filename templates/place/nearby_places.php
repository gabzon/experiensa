<?php

$api_key = Helpers::getGoogleMapsAPIKey();
$types = 'airport|hospital|bank|bar|bus_station|food|health|travel_agency|train_station|shopping_mall|restaurantpharmacy|park|night_club|hospital|home_goods_store|movie_theater|store|department_store';
$nearby = \Experiensa\Modules\CurlRequest::getApiResponse('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$latitude.','.$longitude.'&types='.$types.'&radius=5000&key='.$api_key);
var_dump($nearby);
