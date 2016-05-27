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
?>
