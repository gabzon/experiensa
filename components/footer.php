<?php namespace Components\Footer;

class Footer
{
    public static function getFooterLayout(){
        $layout = get_theme_mod('footer_layout');
        return (!empty($layout)?$layout:'odin');
    }
    public static function displayFooter(){
        $layout = self::getFooterLayout();
        get_template_part('templates/partials/footer/layouts/'.$layout);
    }
    public static function displayLogoItem(){
        get_template_part('templates/partials/footer/logo');
    }
    public static function displayLocationItems(){
        get_template_part('templates/partials/footer/location');
    }
    public static function displayContactItems(){
        get_template_part('templates/partials/footer/contact');
    }
    public static function displayScheduleItems(){
        get_template_part('templates/partials/footer/schedule');
    }
    public static function displaySocialItems(){
        get_template_part('templates/partials/footer/social');
    }
    public static function getLogoSize(){
        $size = get_theme_mod('footer_logo_size');
        return (!empty($size)?$size:'tiny');
    }
    public static function getIfDisplayLogo(){
      $show = get_theme_mod('display_footer_logo');
      return (!empty($show)?$show:'true');
    }
    public static function getIfDisplayTagline(){
        $show = get_theme_mod('footer_company_tagline');
        return (empty($show)?false:true);
    }
    public static function getBackgroundColor(){
        $color = get_theme_mod('footer_background_color');
        return (!empty($color)?$color:'#1B1C1D');
    }
    public static function getFontColor(){
        $color = get_theme_mod('footer_font_color');
        return (!empty($color)?$color:'#ffffff');
    }
    public static function getIfDisplayCopyright(){
        $show = get_theme_mod('display_footer_copyright');
        if(!empty($show)){
            return ($show==='true'?true:false);
        }else
            return false;
    }
    public static function getIfDisplayMenu(){
        $show = get_theme_mod('display_footer_menu');
        if(!empty($show)){
            return ($show==='true'?true:false);
        }else
            return false;
    }
    public static function getContainer(){
        $container = get_theme_mod('footer_container');
        $container = (!empty($container)?$container:'container');
        $footer_container = array();
        if($container == 'container'){
            $footer_container['class'] = "ui container";
            $footer_container['style'] = "";
        }else{
            $footer_container['class'] = "";
            $footer_container['style'] = "margin: 0px 15px 0 15px;";
        }
        return $footer_container;
    }

    public static function getLocationInfo(){
        $agency_options = get_option('agency_settings');
        $info = array();
        if(!empty($agency_options['agency_address']))
            $info['address'] = $agency_options['agency_address'];
        if(!empty($agency_options['agency_postal_code']))
            $info['postal_code'] = $agency_options['agency_postal_code'];
        if(!empty($agency_options['agency_city']))
            $info['city'] = $agency_options['agency_city'];
        if(!empty($agency_options['agency_country']))
            $info['country'] = $agency_options['agency_country'];
        return $info;
    }
    public static function getContactInfo(){
        $agency_options = get_option('agency_settings');
        $info = array();
        $info['email'] = (isset($agency_options['agency_email'])?$agency_options['agency_email']:false);
        $info['phone'] = (isset($agency_options['agency_phone'])?$agency_options['agency_phone']:false);
        $info['fax'] = (isset($agency_options['agency_fax'])?$agency_options['agency_fax']:false);
        return $info;
    }
    public static function getScheduleInfo(){
        $agency_options = get_option('agency_settings');
        $schedule = (isset($agency_options['agency_schedule'])?$agency_options['agency_schedule']:false);
        return $schedule;
    }
    public static function getSocialNetwork(){
        $agency_options = get_option('agency_settings');
        $info = array();
        $info['facebook'] = (isset($agency_options['social_facebook'])?$agency_options['social_facebook']:false);
        $info['twitter'] = (isset($agency_options['social_twitter'])?$agency_options['social_twitter']:false);
        $info['instagram'] = (isset($agency_options['social_instagram'])?$agency_options['social_instagram']:false);
        $info['linkedin'] = (isset($agency_options['social_linkedin'])?$agency_options['social_linkedin']:false);
        $info['gplus'] = (isset($agency_options['social_gplus'])?$agency_options['social_gplus']:false);
        $info['skype'] = (isset($agency_options['social_skype'])?$agency_options['social_skype']:false);
        $info['pinterest'] = (isset($agency_options['social_pinterest'])?$agency_options['social_pinterest']:false);
        return $info;
    }
}
