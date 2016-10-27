<?php
//http://stackoverflow.com/questions/19902952/currency-converter-api
function convertCurrency($amount, $from, $to){
    if ($from === $to) {
        return ceil($amount);
    }
    $url  = "https://www.google.com/finance/converter?a=$amount&from=$from&to=$to";
    $data = file_get_contents($url);
    preg_match("/<span class=bld>(.*)<\/span>/",$data, $converted);
    $converted = preg_replace("/[^0-9.]/", "", $converted[1]);
    return ceil(round($converted, 3));
}

function get_the_color($color,$inverted){
    if ($color === 'website') {
        $website_color = get_theme_mod('website_color');
        $the_color = (!empty($website_color)?$website_color:'');
    }else{
        $the_color = $color;
    }
    if ($inverted === 'inverted') { $the_color .= ' ' . $inverted; }
    return $the_color;
}

function get_the_aligment($align){

    switch($align){
        case 'center':
            $text_align = "center aligned";
            break;
        case 'left':
            $text_align = "left aligned";
            break;
        case 'right':
            $text_align = "right aligned";
            break;
        default:
            $text_align = "justified";
            break;
    }
    return $text_align;
}
function getUrlHeader($url){
    $headers = array();
    if (function_exists('curl_version')) {
        $curl = curl_init();
        curl_setopt_array( $curl, array(
            CURLOPT_HEADER => true,
            CURLOPT_NOBODY => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $url ) );
        $headers = explode( "\n", curl_exec( $curl ) );
        curl_close( $curl );
    }else{
        $headers = @get_headers($url);
    }
    return $headers;
}

function get_headers_from_curl_response($response)
{
    $headers = array();

    $header_text = substr($response, 0, strpos($response, "\r\n\r\n"));

    foreach (explode("\r\n", $header_text) as $i => $line)
        if ($i === 0)
            $headers['http_code'] = $line;
        else
        {
            list ($key, $value) = explode(': ', $line);

            $headers[$key] = $value;
        }

    return $headers;
}

