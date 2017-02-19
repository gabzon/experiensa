<?php namespace Experiensa\Modules;

use \Experiensa\Modules\CurlRequest;

class Wikipedia
{
    public static function getLocationArticle($title){
        $title = preg_replace('/\s+/', '_', $title);
        $title = strtolower($title);
        $title = ucfirst($title);
        $title = \Helpers::normalizeChars($title);
        $base_url = 'https://en.wikipedia.org/w/api.php?format=json&action=query';
        $api_url = $base_url.'&titles='.$title.'&prop=revisions&rvprop=content&rvparse';
        $response = CurlRequest::getApiResponse($api_url);
        $article = (isset(current($response->query->pages)->revisions[0])?current($response->query->pages)->revisions[0]->{'*'}:'');
        return $article;
    }
}