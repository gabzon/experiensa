<?php
$design_options = get_option('design_settings');
$layout_options = get_option('layout_settings');

function get_menu_style(){
    global $design_options, $layout_options;
    return $layout_options['header_menu_style'] . ' ' . $layout_options['header_color_fill'] . ' ' . $design_options['website_color'];
}

function get_button_style(){
    $layout_options = get_option('layout_settings');
    $button_styles = $layout_options['header_button_styles'];
    $button_style = '';

    if (count($button_styles) == 0) { $button_style = ''; }
    else if (count($button_styles) == 1) { $button_style = $button_styles; }
    else {
        foreach ($button_styles as $k) { $button_style = $button_style . $k . ' '; }
    }
    return $button_style;
}

function get_phone_button(){
    global $design_options, $layout_options;
    $phone_options  = $layout_options['group_phone_options'];
    $agency_options = get_option('agency_settings');
    $phone = $agency_options['agency_phone'];
    if ($phone_options['header_display_phone_number'][0]  === 'TRUE'){
        if ($phone) {
            echo '<div class="item">';
                echo '<a href="tel:' . $phone . '" class="ui ' . $phone_options['header_phone_color_button'][0] . ' ' . get_button_style() . ' button">';
                    echo '<i class="call icon"></i>';
                    echo $phone;
                echo '</a>';
            echo '</div>';
        }
    }
}

function get_quote_button(){
    global $layout_options;
    $quote_options = $layout_options['group_quote'];
    if ($quote_options['header_quote_display'][0] === 'TRUE'){
        echo '<div class="item">';
            echo '<a id="request-button" href="#" class="ui ' . $quote_options['header_quote_button_color'][0] . ' ' . get_button_style() . ' button">';
            echo '<i class="edit icon"></i> ' . __('Make a request','sage');
            echo '</a>';
        echo '</div>';
    }
}

function get_language_button(){
    global $layout_options;
    $language_options = $layout_options['group_language'];
    if ($language_options['header_language_display'][0] === 'TRUE'){
        echo '<div class="item">';
            display_languages_button($language_options,get_button_style());
        echo '</div>';
    }
}
