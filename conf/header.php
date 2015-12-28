<?php
$design_options = get_option('experiensa_design_settings');

function get_menu_style(){
    global $design_options;
    $options = $design_options['header_menu_options'];
    $opts = '';
    if ($options) {
        if (is_array($options)) { foreach ($options as $key) { $opts .= $key . ' '; } }
        else { echo $opts = $options . ' '; }
    }
    return $design_options['header_menu_style'] . ' ' . $design_options['header_color_fill'] . ' ' . $design_options['website_color'] . ' ' . $opts;
}

function scroll_menu(){
    $classes = get_body_class();
    if (in_array('home',$classes)) {
        return 'white-font';
    }
}

function get_button_style(){
    $design_options = get_option('experiensa_design_settings');
    $button_styles = $design_options['header_button_styles'];
    $button_style = '';

    if (count($button_styles) == 0) { $button_style = ''; }
    else if (count($button_styles) == 1) { $button_style = $button_styles; }
    else {
        foreach ($button_styles as $k) { $button_style = $button_style . $k . ' '; }
    }
    return $button_style;
}

function get_phone_button(){
    global $design_options;
    $phone_options  = $design_options['group_phone_options'];
    $agency_options = get_option('agency_settings');
    $phone = $agency_options['agency_phone'];
    if ($phone_options['header_display_phone_number'][0]  === 'TRUE'){
        if ($phone) {
            echo '<a href="tel:' . $phone . '" class="item menu-link '. scroll_menu() . ' ">';
            echo '<i class="call icon"></i>';
            echo $phone;
            echo '</a>';
        }
    }
}

function get_quote_button(){
    global $design_options;
    $quote_options = $design_options['group_quote'];
    if ($quote_options['header_quote_display'][0] === 'TRUE'){
        echo '<div class="item">';
        echo '<a id="request-button" href="#" class="ui ' . $quote_options['header_quote_button_color'][0] . ' ' . get_button_style() . ' button">';
        echo '<i class="edit icon"></i> ' . __('Request a Trip','sage');
        echo '</a>';
        echo '</div>';
    }
}

function get_language_button(){
    global $design_options;
    $language_options = $design_options['group_language'];
    if ($language_options['header_language_display'][0] === 'TRUE'){
        echo '<div class="item">';
        display_languages_button($language_options,get_button_style());
        echo '</div>';
    }
}
