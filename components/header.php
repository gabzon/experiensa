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
        $header =   "<header class=\"ui ".get_menu_style()." eight column menu centered grid\">";
        $header .=  self::get_mobile_header();
        $header .=      "<div class=\"computer only only eight column row\">";
        $header .=          "<div class=\"column\">";
        $header .=              self::get_logo_header('borderless');
        $header .=          "</div>";
        if(self::check_display_company_name()){
            $header .=      "<div class='left aligned three wide column' style='text-align: left;'>";
            $header .=          "<div class='borderless item'>";
            $header .=              "<div class=\"content\">";
            $header .=                  "<h5 class=\"header\">".get_blog_name()."</h5>";
            if(self::check_display_company_tagline()){
                $header .=              "<div class=\"meta\">";
                $header .=                  "<span>".get_blog_tagline()."</span>";
                $header .=              "</div>";
            }
            $header .=              "</div>";
            $header .=          "</div>";
            $header .=      "</div>";
        }
        $header .=      "</div>";
        $header .=      "<div class='computer only only eight column row'>";
        $header .=          self::get_phone_item('three wide column');
        $header .=          self::get_quote_item('three wide column');
        $header .=          Menu::display_all_menus($page_id,'left',true);
        $header .=          self::get_language_item();
        $header .=      "</div>";
        $header .=  "</header>";
        return $header;
    }

    public static function get_all_vertical($page_id){
        $header =   "<header class=\"ui ".get_menu_style()." eight column menu centered grid\">";
        $header .=  self::get_mobile_header();
        $header .=      "<div class=\"computer only eight column row\">";
        $header .=          "<div class=\"column\">";
        $header .=              self::get_logo_header('');
        $header .=          "</div>";
        $header .=      "</div>";
        $header .=      "<div class='computer only row'>";
        if(self::check_display_company_name()){
            $header .=      "<div class='left aligned three wide column' style='text-align: left;'>";
            $header .=          "<div class='borderless item '>";
            $header .=              "<div class=\"ui center aligned content\" style='text-align:center;'>";
            $header .=                  "<h5 class=\"header\">".get_blog_name()."</h5>";
            if(self::check_display_company_tagline()){
                $header .=              "<div class=\"meta\">";
                $header .=                  "<span>".get_blog_tagline()."</span>";
                $header .=              "</div>";
            }
            $header .=              "</div>";
            $header .=          "</div>";
            $header .=      "</div>";
        }
        $header .=      "</div>";
        $header .=      "<div class='computer only eight column row'>";
        $header .=          self::get_phone_item('three wide column');
        $header .=          self::get_quote_item('three wide column');
        $header .=          Menu::display_all_menus($page_id,'left',true);
        $header .=          self::get_language_item();
        $header .=      "</div>";
        $header .=  "</header>";
        return $header;
    }
    public static function get_left_logo_menu_icon(){
        $header =   "<header class=\"ui ".get_menu_style()." menu grid\">";
        $header .=  self::get_mobile_header();
        $header .=      "<div class=\"computer only only row\">";
        $header .=          self::get_logo_header();
        if(self::check_display_company_name()){
            $header .=      "<div class='item'>";
            $header .=          "<div class=\"content\">";
            $header .=              "<h5 class=\"header\">".get_blog_name()."</h5>";
            if(self::check_display_company_tagline()){
                $header .=              "<div class=\"meta\">";
                $header .=                  "<span>".get_blog_tagline()."</span>";
                $header .=              "</div>";
            }
            $header .=          "</div>";
            $header .=      "</div>";
        }
        $header .=          get_sidebar_button();
        $header .=      "</div>";
        $header .=  "</header>";
        return $header;
    }

    public static function right_logo_menu_icon(){
        $header =   "<header class=\"ui ".get_menu_style()." menu grid\">";
        $header .=  self::get_mobile_header();
        $header .=      "<div class=\"computer only only row\">";
        $header .=          get_sidebar_button('left');
        if(self::check_display_company_name()){
            $header .=      "<div class='item'>";
            $header .=          "<div class=\"content\">";
            $header .=              "<h5 class=\"header\">".get_blog_name()."</h5>";
            if(self::check_display_company_tagline()){
                $header .=              "<div class=\"meta\">";
                $header .=                  "<span>".get_blog_tagline()."</span>";
                $header .=              "</div>";
            }
            $header .=          "</div>";
            $header .=      "</div>";
        }
        $header .=          self::get_logo_header();
        $header .=      "</div>";
        $header .=  "</header>";
        return $header;
    }

    public static function get_logo_above_right_menu_below($page_id){
        $header =   "<header class=\"ui ".get_menu_style()." eight column menu grid\">";
        $header .=  self::get_mobile_header();
        $header .=      "<div class=\"computer only row\">";
        $header .=          "<div class='column'></div>";
        $header .=          "<div class='column'></div>";
        $header .=          "<div class='column'></div>";
        $header .=          "<div class='column'></div>";
        $header .=          "<div class='column'></div>";
        $header .=          "<div class='column'></div>";
        $header .=          "<div class='right aligned column'>";
        if(self::check_display_company_name()){
            $header .=      "<div class='borderless item'>";
            $header .=          "<div class=\"content\">";
            $header .=              "<h5 class=\"header\">".get_blog_name()."</h5>";
            if(self::check_display_company_tagline()){
                $header .=              "<div class=\"meta\">";
                $header .=                  "<span>".get_blog_tagline()."</span>";
                $header .=              "</div>";
            }
            $header .=          "</div>";
            $header .=      "</div>";
        }
        $header .=          "</div>";
        $header .=          "<div class='right aligned column'>";
        $header .=              self::get_logo_header('');
        $header .=          "</div>";
        $header .=      "</div>";
        $header .=      "<div class=\"computer only centered row\">";
        $header .=          self::get_language_item();
        $header .=          self::get_phone_item('three wide column');
        $header .=          self::get_quote_item('three wide column');
        $header .=          Menu::display_all_menus($page_id,'left',true);
        $header .=      "</div>";
        $header .=  "</header>";
        return $header;
    }

    public static function get_logo_above_left_menu_below($page_id){
        $header =   "<header class=\"ui ".get_menu_style()." eight column menu grid\">";
        $header .=  self::get_mobile_header();
        $header .=      "<div class=\"computer only row\">";
        $header .=          "<div class='left aligned column'>";
        $header .=              self::get_logo_header('');
        $header .=          "</div>";
        $header .=          "<div class='left aligned column'>";
        if(self::check_display_company_name()){
            $header .=          "<div class='borderless item'>";
            $header .=              "<div class=\"content\">";
            $header .=                  "<h5 class=\"header\">".get_blog_name()."</h5>";
            if(self::check_display_company_tagline()){
                $header .=                  "<div class=\"meta\">";
                $header .=                      "<span>".get_blog_tagline()."</span>";
                $header .=                  "</div>";
            }
            $header .=              "</div>";
            $header .=          "</div>";
        }
        $header .=          "</div>";
        $header .=      "</div>";
        $header .=      "<div class=\"computer only centered row\">";
        $header .=          self::get_phone_item('three wide column');
        $header .=          self::get_quote_item('three wide column');
        $header .=          Menu::display_all_menus($page_id,'left',true);
        $header .=          self::get_language_item();
        $header .=      "</div>";
        $header .=  "</header>";
        return $header;
    }
    public static function get_right_logo_menu_left($page_id){
        $header =   "<header class=\"ui ".get_menu_style()." eight column menu grid\">";
        $header .=  self::get_mobile_header();
        $header .=      "<div class=\"computer only row\">";
        $header .= self::get_language_item('middle aligned column');
        $header .= self::get_phone_item('middle aligned three wide column');
        $header .= self::get_quote_item('middle aligned two wide column','tiny');
        $header .=              Menu::display_all_menus($page_id,'left',true);
        if(self::check_display_company_name()){
            $header .=          "<div class='borderless item'>";
            $header .=              "<div class=\"content\">";
            $header .=                  "<h5 class=\"header\">".get_blog_name()."</h5>";
            if(self::check_display_company_tagline()){
                $header .=                  "<div class=\"meta\">";
                $header .=                      "<span>".get_blog_tagline()."</span>";
                $header .=                  "</div>";
            }
            $header .=              "</div>";
            $header .=              "<div class='ui image'>";
            $header .=                  self::get_logo_header('');
            $header .=              "</div>";
            $header .=          "</div>";
        }
        $header .=          "</div>";
        $header .=          "</div>";
        $header .=      "</div>";
        $header .=  "</header>";
        return $header;
    }

    public static function get_left_logo_menu_right($page_id){
        $header =   "<header class=\"ui ".get_menu_style()." eight column menu grid\">";
        $header .=  self::get_mobile_header();
        $header .=      "<div class=\"computer only row\">";
        $header .=          "<div class='left aligned column'>";
        $header .=              self::get_logo_header('');
        $header .=          "</div>";
        if(self::check_display_company_name()){
            $header .=      "<div class='left aligned column'>";
            $header .=          "<div class='borderless item'>";
            $header .=              "<div class=\"content\">";
            $header .=                  "<h5 class=\"header\">".get_blog_name()."</h5>";
            if(self::check_display_company_tagline()){
                $header .=                  "<div class=\"meta\">";
                $header .=                      "<span>".get_blog_tagline()."</span>";
                $header .=                  "</div>";
            }
            $header .=              "</div>";
            $header .=          "</div>";
            $header .=      "</div>";
        }
        $header .=          self::get_phone_item('middle aligned three wide column');
        $header .=          self::get_quote_item('middle aligned two wide column','tiny');
        $header .=              Menu::display_all_menus($page_id,'left',true);
        $header .=          self::get_language_item('middle aligned column');
        $header .=      "</div>";
        $header .=  "</header>";
        return $header;
    }
    public static function get_logo_header($border=''){
        $logo = get_agency_logo();
        if(!empty($logo)){
            $logo_header = "<a class=\"".$border."item menu-link". scroll_menu() ."\" href=\"".get_experiencia_url()."\">";
            $logo_header .= "<img class=\"ui image ".$logo['size']." logo\" src=\"".$logo['url']."\" style='display: block;margin-left: auto;margin-right: auto;'> &nbsp;";
            $logo_header .= "</a>";
        }

        return $logo_header;
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
        $mobile = "<div class=\"mobile only four column row\">";
        $mobile .= "<div class=\"left floated column\">";
        $mobile .=      "<a class=\"item\" href=\"".$url."\">";
        if ($logo):
            $mobile .=      '<img class="ui mini image logo" src="' . wp_get_attachment_url($logo) . '"  />';
        else:
            $mobile .= get_blog_name();
        endif;
        $mobile .=      "</a>";
        $mobile .=      "</div>";
        $mobile .= "<div class=\"column\">";
        $mobile .=      "</div>";
        $mobile .= "<div class=\"column\">";
        $mobile .=      "</div>";
        $mobile .=      "<div id=\"mobile-menu\" class=\"left floated middle aligned column\">";
        $mobile .=          "<a class=\"mobile-menu item ui button\">";
        $mobile .=              "<i class=\"sidebar icon\"></i>";
        $mobile .=          "</a>";
        $mobile .=      "</div>";
        $mobile .= "</div>";
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
}
