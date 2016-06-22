<?php

Class Header{
    /** Get selected header layout from customizer
     * @return mixed
     */
    public static function get_header_layout(){
        $header_style = get_theme_mod('header_style');
        return (empty($header_style)?'fodla':$header_style);
    }
    public static function get_header($style){
        get_template_part('templates/partials/header/'.$style);
    }
    /** Create and return menu styles classes from general and header settings
     * @return string
     */
    public static function get_menu_style(){
        global $design_options;
        $website_color = $design_options['website_color'];

        $options = get_theme_mod('header_menu_options');

        $classes = get_body_class();
        $display_slider = $design_options['setting_landing_slider'];
        $secondary = '';
        if (in_array('home', $classes) && ($display_slider == 'TRUE')) {
            $secondary = 'secondary';
        }
        if (in_array('single-voyage', $classes)) {
            $secondary = 'secondary';
        }
        $style = $secondary .' '. self::get_header_menu_style() . ' ' . self::get_header_color_fill() . ' ' . $website_color . ' ' . $options;
        return $style;
    }
    public static function get_header_menu_style(){
        $header_menu_style = get_theme_mod('header_menu_style');
        return (empty($header_menu_style)?'fixed':$header_menu_style);
    }
    public static function get_header_color_fill(){
        $header_color_fill = get_theme_mod('header_color_fill');
        return (empty($header_color_fill)?'inverted':$header_color_fill);
    }
    /*
    public static function get_header_background_color(){
        $header_background = get_theme_mod('header_background');

    }
    */
    public static function get_agency_logo_size(){
        $size = false;
        $logo = get_agency_logo();
        if(!empty($logo)){
            $size = $logo['size'];
        }
        return $size;
    }
    public static function get_logo_header($border=''){
        $logo = get_agency_logo();
        if(!empty($logo)){
            $logo_header = "<a class=\"".$border." item menu-link ". scroll_menu() ."\" href=\"".get_experiencia_url()."\">";
            $logo_header .= "<img class=\"ui image ".$logo['size']." logo\" src=\"".$logo['url']."\" style='display: block;margin-left: auto;margin-right: auto;'> &nbsp;";
            $logo_header .= "</a>";
        }

        return $logo_header;
    }
    public static function get_website_name_tagline(){
        $name = "";
        if(self::check_display_company_name()) {
            $name .= "<a href=\"".get_experiencia_url()."\" class=\"item\">";
            $name .=    "<div class=\"content\">";
            $name .=        "<h5 class=\"header\">".get_blog_name()."</h5>";
            if(self::check_display_company_tagline()) {
                $name .= "<div class=\"meta\">";
                $name .=    "<span class=\"price\">" . get_blog_tagline() . "</span>";
                $name .= "</div>";
            }
            $name .=    "</div>";
            $name .= "</a>";
        }
        return $name;
    }
    public static function get_phone_button($display = false){
        $show_phone = get_theme_mod('header_display_phone_number');
        $agency_options = get_option('agency_settings');
        $phone = $agency_options['agency_phone'];
        $phone_button = "";
        if ($show_phone  === 'TRUE'){
            $phone_class = get_theme_mod('header_button_styles');
            if(empty($phone_class))
                $phone_class = 'basic';
            $color = get_theme_mod('header_phone_color_button');
            if(empty($color))
                $color = 'white';
            $background = (!$color || $color==''?'':$color);
            if ($phone) {
                $phone_button .= '<a href="tel:' . $phone . '" class="ui '.$background.' '.$phone_class.' menu-link '. scroll_menu() . ' button">';
                $phone_button .= '<i class="call icon"></i>';
                $phone_button .= $phone;
                $phone_button .= '</a>';
            }
        }
        if(!$display)
            return $phone_button;
        echo $phone_button;
    }
    public static function get_phone_item($class=''){
        $menu = "";
        $phone = self::get_phone_button();
        if(!empty($phone)){
            $menu .=          "<div class='".$class."'>";
            $menu .=              $phone;
            $menu .=          "</div>";
        }
        return $menu;
    }
    public static function get_quote_button($icon_size="",$display = false){
        $show_quote = get_theme_mod('header_display_quote_button');
        $color = get_theme_mod('header_quote_button_color');
        $background = (!$color || $color==''?'inverted':$color);
        $quote_button = "";
        if ($show_quote === 'TRUE'){
            $quote_button .=        '<a id="request-button" href="#" class="'.$icon_size.' ui ' . $background . ' ' . get_button_style() . ' button">';
            $quote_button .=            '<i class="edit icon"></i> ' . __('Request a Trip','sage');
            $quote_button .=        '</a>';
        }
        if(!$display)
            return $quote_button;
        echo $quote_button;
    }
    public static function get_quote_item($class='column',$icon_size=''){
        $menu = "";
        $quote = self::get_quote_button($icon_size);
        if(!empty($quote)){
            $menu .=          "<div class='".$class."'>";
            $menu .=              $quote;
            $menu .=          "</div>";
        }
        return $menu;
    }
    public static function get_language_menu($display = false){
        $show_language = get_theme_mod('header_language_display');
        $language_menu = "";
        if ($show_language === 'TRUE'){
            $color = get_theme_mod('header_language_button_color');
            $language_menu = display_language_menu($color);
        }
        if(!$display)
            return $language_menu;
        echo $language_menu;
    }
    public static function get_language_item($class='column'){
        $menu = "";
        $language = self::get_language_menu();
        if(!empty($language)){
            $menu .=          "<div class='".$class."'>";
            $menu .=              $language;
            $menu .=          "</div>";
        }
        return $menu;
    }
    public static function get_mobile_header(){
        $agency_options = get_option('agency_settings');
        $logo = $agency_options['agency_logo'];
        $url = esc_url(home_url('/'));
        $menu_icon = get_stylesheet_directory_uri().'/assets/images/menuiconwhite.png';;
        $mobile =   "<div class=\"mobile only row\">";
        $mobile .=      "<div class=\"ui ".self::get_menu_style()." menu grid borderless header-menu\">";
        $mobile .=          "<a class=\"item\" href=\"".$url."\">";
        if ($logo):
            $mobile .=          '<img class="ui tiny image logo" src="' . wp_get_attachment_url($logo) . '"  />';
        else:
            $mobile .=          get_blog_name();
        endif;
        $mobile .=          "</a>";
        $mobile .=          "<div class='menu right'>";
<<<<<<< HEAD
        $mobile .=              "<a href=\"\" class=\"menu item mobile-menu ui button inverted\" style=\"padding: 0 10px\">";
        $mobile .=                  "<b><i class=\"sidebar icon\" style=\" color:white; \"></i></b>";
        $mobile .=              "</a>";
=======
        $mobile .=              "<div class='item'>";
        $mobile .=                  "<button class=\"ui inverted button mobile-menu\">";
        //$mobile .=                  "<i class='sidebar link icon mobile-menu' style='margin: auto !important;'></i>";
        $mobile .=                      "MENU";
        $mobile .=                  "</button>";
        $mobile .=              "</div>";
>>>>>>> 095df3428f1cf96a9d14678b0683ba7c4264515e
        $mobile .=          "</div>";
        $mobile .=      "</div>";
        $mobile .=  "</div>";
        return $mobile;
    }
    public static function get_tablet_header(){
        $agency_options = get_option('agency_settings');
        $logo = $agency_options['agency_logo'];
        $url = esc_url(home_url('/'));
        $tablet = "<div class=\"tablet only row\">";
        $tablet .=      "<a class=\"item\" href=\"".$url."\">";
        if ($logo):
            $tablet .=      '<img class="ui mini image logo" src="' . wp_get_attachment_url($logo) . '"  />';
        else:
            $tablet .= get_blog_name();
        endif;
        $tablet .=      "</a>";
        $tablet .=      "<div class=\"menu right mobile-menu\">";
        $tablet .=          "<a class=\"item mobile-menu ui button\">";
        $tablet .=              "<i class=\"sidebar icon mobile-menu\"></i>";
        $tablet .=          "</a>";
        $tablet .=      "</div>";
        $tablet .= "</div>";
        return $tablet;
    }
    public static function check_display_company_name(){
        $header_company_name = get_theme_mod('header_company_name');
        $check = (empty($header_company_name)?false:true);
        return $check;
    }
    public static function check_display_company_tagline(){
        $header_company_tagline = get_theme_mod('header_company_tagline');
        $check = (empty($header_company_tagline)?false:true);
        return $check;
    }
    public static function get_row_topmargin($next_name=null){
        $size = self::get_agency_logo_size();
        if($size !== false){
            switch($size){
                case 'mini':
                if($next_name)
                $margin = 69;
                else
                $margin = 55;
                break;
                case 'tiny':
                $margin = 100;
                break;
                default:
                $margin = 170;
                break;
            }
        }else{
            $margin = 0;
        }
        return $margin;
    }
}
