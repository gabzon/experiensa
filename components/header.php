<?php

Class Header{
    public static function get_header($style,$page_id,$display=false){
        $header = "";
        switch($style){
            case 'logo_above_menu_below':
                $header = self::get_logo_above_menu_below($page_id);
                break;
            case 'all_vertical':
                $header = self::get_all_vertical($page_id);
                break;
            case 'left_logo_menu_icon':
                $header = self::get_left_logo_menu_icon();
                break;
            case 'right_logo_menu_icon':
                $header = self::right_logo_menu_icon();
                break;
            case 'logo_above_right_menu_below':
                $header = self::get_logo_above_right_menu_below($page_id);
                break;
            case 'logo_above_left_menu_below':
                $header = self::get_logo_above_left_menu_below($page_id);
                break;
            case 'right_logo_menu_left':
                $header = self::get_right_logo_menu_left($page_id);
                break;
            default:
                $header = self::get_left_logo_menu_right($page_id);
                break;
        }
        if(!$display)
            return $header;
        echo $header;
    }

    public static function get_logo_above_menu_below($page_id){
        $margin = self::get_row_topmargin(true);
        $header =   "<header class=\"ui grid\">";
        $header .=       self::get_mobile_header();
        $header .=      "<div class=\"computer tablet only row\">";
        $header .=          "<div class=\"ui ".get_menu_style()." menu centered grid header-menu\">";
        $header .=              self::get_logo_header('');
        $header .=              self::get_website_name_tagline();
        $header .=          "</div>";
        $header .=      "</div>";
        $header .=      "<div class=\"computer tablet only row\">";
        $header .=          "<div class=\"ui ".get_menu_style()." menu centered grid header-menu\" style='margin-top:".$margin."px'>";
        $header .=              self::get_phone_item('item');
        $header .=              self::get_quote_item('item');
        $header .=              Menu::display_all_menus($page_id,'left',true);
        $header .=              self::get_language_item('item');
        $header .=          "</div>";
        $header .=      "</div>";
        $header .=  "</header>";
        return $header;
    }

    public static function get_all_vertical($page_id){
        $margin = self::get_row_topmargin();
        $header =   "<header class=\"ui grid\">";
        $header .=       self::get_mobile_header();
        $header .=      "<div class=\"computer tablet only row\">";
        $header .=          "<div class=\"ui ".get_menu_style()." menu centered grid header-menu\">";
        $header .=                  self::get_logo_header('');
        $header .=          "</div>";
        $header .=      "</div>";
        if(self::check_display_company_name()):
            $header .=      "<div class=\"computer tablet only row\">";
            $header .=          "<div class=\"ui ".get_menu_style()." menu centered grid header-menu\" style='margin-top:".$margin."px'>";
            $header .=              self::get_website_name_tagline();
            $header .=          "</div>";
            $header .=      "</div>";
            $margin += 69;
        endif;
        $header .=      "<div class=\"computer tablet only row\">";
        $header .=          "<div class=\"ui ".get_menu_style()." menu centered grid header-menu\" style='margin-top:".$margin."px'>";
        $header .=              self::get_phone_item('item');
        $header .=              self::get_quote_item('item');
        $header .=              Menu::display_all_menus($page_id,'left',true);
        $header .=              self::get_language_item('item');
        $header .=          "</div>";
        $header .=      "</div>";
        $header .=  "</header>";
        return $header;
    }
    public static function get_left_logo_menu_icon(){
        $header =   "<header class=\"ui grid\">";
        $header .=       self::get_mobile_header();
        $header .=      "<div class=\"computer tablet only row\">";
        $header .=          "<div class=\"ui ".get_menu_style()." menu grid header-menu\">";
        $header .=              self::get_logo_header();
        $header .=              "<div class='menu right'>";
        $header .=                  "<a href=\"#\" class=\"menu item\">";
        $header .=                      "<i class=\"sidebar icon mobile-menu\"></i>";
        $header .=                  "</a>";
        $header .=              "</div>";
        $header .=          "</div>";
        $header .=      "</div>";
        $header .=  "</header>";
        return $header;
    }

    public static function right_logo_menu_icon(){
        $header =   "<header class=\"ui grid\">";
        $header .=       self::get_mobile_header();
        $header .=      "<div class=\"computer tablet only row\">";
        $header .=          "<div class=\"ui ".get_menu_style()." menu grid header-menu\">";
        $header .=              "<a href=\"#\" class=\"menu item\">";
        $header .=                  "<i class=\"sidebar icon mobile-menu\"></i>";
        $header .=              "</a>";
        $header .=              "<div class='menu right'>";
        $header .=                  self::get_logo_header();
        $header .=              "</div>";
        $header .=          "</div>";
        $header .=      "</div>";
        $header .=  "</header>";
        return $header;
    }

    public static function get_logo_above_right_menu_below($page_id){
        $margin = self::get_row_topmargin(true);
        $header =   "<header class=\"ui grid\">";
        $header .=       self::get_mobile_header();
        $header .=      "<div class=\"computer tablet only row\">";
        $header .=          "<div class=\"ui ".get_menu_style()." menu grid header-menu\">";
        $header .=              "<div class=\"right menu\">";
        $header .=                  self::get_logo_header('');
        $header .=                  self::get_website_name_tagline();
        $header .=              "</div>";
        $header .=          "</div>";
        $header .=      "</div>";
        $header .=      "<div class=\"computer tablet only row\">";
        $header .=          "<div class=\"ui ".get_menu_style()." menu grid second-grid header-menu\" style='margin-top:".$margin."px'>";
        $header .=              self::get_phone_item('item');
        $header .=              self::get_quote_item('item');
        $header .=              Menu::display_all_menus($page_id,'left',true);
        $header .=              "<div class=\"right menu\">";
        $header .=                  self::get_language_item('item');
        $header .=              "</div>";
        $header .=          "</div>";
        $header .=      "</div>";
        $header .=  "</header>";
        return $header;
    }

    public static function get_logo_above_left_menu_below($page_id){
        $margin = self::get_row_topmargin(true);
        $header =   "<header class=\"ui grid\">";
        $header .=       self::get_mobile_header();
        $header .=      "<div class=\"computer tablet only row\">";
        $header .=          "<div class=\"ui ".get_menu_style()." menu grid header-menu\">";
        $header .=              self::get_logo_header('');
        $header .=              self::get_website_name_tagline();
        $header .=          "</div>";
        $header .=      "</div>";
        $header .=      "<div class=\"computer tablet only row\">";
        $header .=          "<div class=\"ui ".get_menu_style()." menu grid header-menu\" style='margin-top:".$margin."px'>";
        $header .=              self::get_phone_item('item');
        $header .=              self::get_quote_item('item');
        $header .=              Menu::display_all_menus($page_id,'left',true);
        $header .=              "<div class=\"right menu\">";
        $header .=                  self::get_language_item('item');
        $header .=              "</div>";
        $header .=          "</div>";
        $header .=      "</div>";
        $header .=  "</header>";
        return $header;
    }
    public static function get_right_logo_menu_left($page_id){
        $header =   "<header class=\"ui grid\">";
        $header .=       self::get_mobile_header();
        $header .=      "<div class=\"computer tablet only row\">";
        $header .=          "<div class=\"ui ".get_menu_style()." menu grid header-menu\">";
        $header .=              self::get_language_item('item');
        $header .=              self::get_phone_item('item');
        $header .=              self::get_quote_item('item');
        $header .=              Menu::display_all_menus($page_id,'left',true);
        $header .=              "<div class=\"right menu\">";
        $header .=                  self::get_logo_header('');
        $header .=                  self::get_website_name_tagline();
        $header .=              "</div>";
        $header .=          "</div>";
        $header .=      "</div>";
        $header .=  "</header>";
        return $header;
    }

    public static function get_left_logo_menu_right($page_id){
        $header =   "<header class=\"ui grid\">";
        $header .=       self::get_mobile_header();
        $header .=      "<div class=\"computer tablet only row\">";
        $header .=          "<div class=\"ui ".get_menu_style()." menu grid header-menu\">";
        $header .=              self::get_logo_header('');
        $header .=              self::get_website_name_tagline();
        $header .=              "<div class=\"right menu\">";
        $header .=                  self::get_phone_item('item');
        $header .=                  self::get_quote_item('item');
        $header .=                  Menu::display_all_menus($page_id,'left',true);
        $header .=                  self::get_language_item('item');
        $header .=              "</div>";
        $header .=          "</div>";
        $header .=      "</div>";
        $header .=  "</header>";
        return $header;
    }
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
            $name .=        "<div class=\"meta\">";
            $name .=            "<span class=\"price\">".get_blog_tagline()."</span>";
            $name .=        "</div>";
            $name .=    "</div>";
            $name .= "</a>";
        }
        return $name;
    }
    public static function get_phone_item($class='column'){
        $menu = "";
        $phone = get_phone_button();
        if(!empty($phone)){
            $menu .=          "<div class='".$class."'>";
            $menu .=              $phone;
            $menu .=          "</div>";
        }
        return $menu;
    }
    public static function get_quote_item($class='column',$icon_size=''){
        $menu = "";
        $quote = get_quote_button($icon_size);
        if(!empty($quote)){
            $menu .=          "<div class='".$class."'>";
            $menu .=              $quote;
            $menu .=          "</div>";
        }
        return $menu;
    }

    public static function get_language_item($class='column'){
        $menu = "";
        $language = get_language_menu();
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
        $mobile =   "<div class=\"mobile only row\">";
        $mobile .=      "<div class=\"ui ".get_menu_style()." menu grid\">";
        $mobile .=          "<a class=\"item\" href=\"".$url."\">";
        if ($logo):
            $mobile .=          '<img class="ui mini image logo" src="' . wp_get_attachment_url($logo) . '"  />';
        else:
            $mobile .=          get_blog_name();
        endif;
        $mobile .=          "</a>";
        $mobile .=          "<div class='menu right'>";
        $mobile .=              "<a href=\"\" class=\"menu item\">";
        $mobile .=                  "<i class=\"sidebar icon mobile-menu\"></i>";
        $mobile .=              "</a>";
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
        $tablet .=      "<div class=\"menu right\">";
        $tablet .=          "<a class=\"item mobile-menu ui button\">";
        $tablet .=              "<i class=\"sidebar icon\"></i>";
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