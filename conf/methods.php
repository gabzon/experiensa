<?php
//http://stackoverflow.com/questions/19902952/currency-converter-api
function convertCurrency($amount, $from, $to){
    if ($from === $to) {
        return ceil($amount);
    }
    $url  = "https://www.google.com/finance/converter?a=$amount&from=$from&to=$to";
    if (!ini_get('allow_url_fopen')) {
        ini_set('allow_url_fopen',1);
    }
    $data = file_get_contents($url);
    preg_match("/<span class=bld>(.*)<\/span>/",$data, $converted);
    $converted = preg_replace("/[^0-9.]/", "", $converted[1]);
    return ceil(round($converted, 3));
}

function get_the_color($color,$inverted){
    $the_color = '';
    $design_options = get_option('experiensa_design_settings');

    if ($color === 'website') {
        $the_color = $design_options['website_color'];
    }else{
        $the_color = $color;
    }

    if ($inverted === 'inverted') { $the_color .= ' ' . $inverted; }

    return $the_color;
}

?>
