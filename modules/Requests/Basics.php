<?php

function requestLanguage(){
    $language = Helpers::getSiteLanguageCode();
    header('Content-Type: application/json');
    echo json_encode(['language'=>$language]);
    die();
}
add_action('wp_ajax_requestLanguage', 'requestLanguage');
add_action('wp_ajax_nopriv_requestLanguage', 'requestLanguage');