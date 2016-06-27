<?php
$design_options = get_option('experiensa_design_settings');
$agency_options = get_option('agency_settings');

function get_agency_logo($display = false){
    global $design_options;
    global $agency_options;
    $rlogo = array();
    $logo   = $agency_options['agency_logo'];
    if($logo) {
        $rlogo['url'] = wp_get_attachment_url($logo);
        $rlogo['size'] =    (!empty(get_theme_mod('header_logo_size'))?get_theme_mod('header_logo_size'):"tiny");
    }
    if(!$display)
        return $rlogo;
    echo $rlogo;
}

function get_blog_name($display = false){
    $name = get_bloginfo('name');
    if(!$display)
        return $name;
    echo $name;
}
function get_blog_tagline($display = false){
    $tagline = get_bloginfo('description');
    if(!$display)
        return $tagline;
    echo $tagline;
}
function get_experiencia_url($display = false){
    $url = esc_url(home_url('/'));
    if(!$display)
        return $url;
    echo $url;
}

function get_sidebar_button($position='right',$display = false){
    $button =   "<div class=\"menu $position\">";
    $button .=      "<a id=\"mobile-menu\" class=\"item mobile-menu ui button\">";
    $button .=          "<i class=\"sidebar icon\"></i>";
    $button .=      "</a>";
    $button .=  "</div>";
    if(!$display)
        return $button;
    echo $button;
}

function get_menu_style(){
    global $design_options;
    $options = get_theme_mod('header_menu_options');
    $opts = '';
    if ($options) {
            if (is_array($options)) {
                foreach ($options as $key) {
                    $opts .= $key . ' ';
                }
            }else {
                $opts = $options . ' ';
            }
        }
    $classes = get_body_class();
    $display_slider = $design_options['setting_landing_slider'];
    $secondary = '';
    if (in_array('home', $classes) && ($display_slider == 'TRUE')) {
        $secondary = 'secondary';
    }
    if (in_array('single-voyage', $classes)) {
        $secondary = 'secondary';
    }
    return $secondary .' '. $design_options['header_menu_style'] . ' ' . $design_options['header_color_fill'] . ' ' . $design_options['website_color'] . ' ' . $opts;
}

function scroll_menu(){
    $classes = get_body_class();
    $design_options = get_option('experiensa_design_settings');
    $display_slider = $design_options['setting_landing_slider'];
    if (in_array('home', $classes) && ($display_slider == 'TRUE')) {
        return 'white-font';
    }
    if (in_array('single-voyage', $classes)) {
        return 'white-font';
    }
    return "";
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

function get_phone_button($display = false){
    global $design_options;
    $phone_options  = $design_options['group_phone_options'];
    $agency_options = get_option('agency_settings');
    $phone = $agency_options['agency_phone'];
    $phone_button = "";
    if ($phone_options['header_display_phone_number'][0]  === 'TRUE'){
        if ($phone) {
            $phone_button .= '<a href="tel:' . $phone . '" class="item menu-link '. scroll_menu() . ' ">';
            $phone_button .= '<i class="call icon"></i>';
            $phone_button .= $phone;
            $phone_button .= '</a>';
        }
    }
    if(!$display)
        return $phone_button;
    echo $phone_button;
}

function get_quote_button($icon_size="",$display = false){
    global $design_options;
    $quote_options = $design_options['group_quote'];
    $color = $quote_options['header_quote_button_color'][0];
    $background = (!$color || $color==''?'inverted':$color);
    $quote_button = "";
    if ($quote_options['header_quote_display'][0] === 'TRUE'){
        //header_quote_button_color
        $quote_button .=        '<a id="request-button" href="#" class="'.$icon_size.' ui ' . $background . ' ' . get_button_style() . ' button">';
        $quote_button .=            '<i class="edit icon"></i> ' . __('Request a Trip','sage');
        $quote_button .=        '</a>';
    }
    if(!$display)
        return $quote_button;
    echo $quote_button;
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

function get_language_menu($display = false){
    global $design_options;
    $language_options = $design_options['group_language'];
    $language_menu = "";
    if ($language_options['header_language_display'][0] === 'TRUE'){
        $color = $language_options['header_language_button_color'][0];
        $language_menu = display_language_menu($color);
    }
    if(!$display)
        return $language_menu;
    echo $language_menu;
}

function get_language_menu_accordion(){
    global $design_options;
    $language_options = $design_options['group_language'];
    if ($language_options['header_language_display'][0] === 'TRUE'){
        echo '<div class="ui inverted segment">';
        display_language_menu_accordion();
        echo '</div>';
    }
}
