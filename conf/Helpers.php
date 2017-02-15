<?php

class Helpers {

    public static function get_currency(){
        $agency_options = get_option('agency_settings');
        return $agency_options['agency_currency'];
    }

    /**
     * Get agency email
     * @return mixed
     */
    public static function get_email(){
        $agency_options = get_option('agency_settings');
        return $agency_options['agency_email'];
    }

    public static function check_internet_connection(){
        $connected = @fsockopen("www.google.com", 80);
        //website, port  (try 80 or 443)
        if ($connected){
            $is_conn = true; //action when connected
            fclose($connected);
        }else{
            $is_conn = false; //action in connection failure
        }
        return $is_conn;
    }
    public static function getWebsiteLogo(){
        $agency_options = get_option('agency_settings');
        $agency_logo = (isset($agency_options['agency_logo'])?$agency_options['agency_logo']:[]);
        if(empty($agency_logo))
            return false;
        if(empty($agency_logo[0]))
            return false;
        return $agency_logo[0];
    }

    /**
     * If WPML plugin is active get active language code
     * @return bool
     */
    public static function getActiveLanguageCode(){
        $code = false;
        //Check if WPML is installed
        if ( function_exists('icl_object_id') ) {
            //Active WPML language code
            $code = ICL_LANGUAGE_CODE;
        }
        return $code;
    }

    public static function getPageTemplateNames(){
        $templates = get_page_templates();
        $templates_names = array();
        foreach ($templates as $key => $value){
            if($value !== 'landing.php' )
                $templates_names[$value] = $key;
        }
        return $templates_names;
    }
    public static function getTemplatePathByID($id){
        $template = get_post_meta( $id, '_wp_page_template', true );
        if($template == 'default')
            $template = 'index.php';
        return $template;
    }
    public static function getTemplatePath($template_name){
        $path = 'index.php';
        $templates = wp_get_theme()->get_page_templates();
        foreach ($templates as $key => $value){
            if($value == $template_name ) {
                $path = $value;
                break;
            }
        }
        return $path;
    }
    /**
     * @return array
     */
    public static function getPagesFromCurrentLanguage(){
        $page_ids=get_all_page_ids();
        $pages = array();
        foreach($page_ids as $id) {
            //Check if WPML is installed and activated
            if(function_exists('icl_object_id')) {
                //Get page id from de current language and translations
                $current_lang_page_id = icl_object_id($id, 'page', true,ICL_LANGUAGE_CODE);
                //Check if $current_lang_page_id is original page (not a tranlated page) and status publish
                if($id == $current_lang_page_id && get_post_status( $id ) == 'publish')
                    $pages[$id] = get_the_title($id);
            } else {
                $pages[$id] = get_the_title($id);
            }

        }
        return $pages;
    }

    /**
     * @param $template
     * @return array
     */
    public static function getPagesByTemplate($template){
        $pages = get_pages(array(
            'meta_key' => '_wp_page_template',
            'meta_value' => $template
        ));
        $page_list = array();
        foreach($pages as $page){
            $page_list[$page->ID] = $page->post_title;
        }
        return $page_list;
    }

    public static function getComponentList(){
        $components = [
            'button'        => __('Buttons','sage'),
            'carousel'      => __('Carousel','sage'),
            'card'          => __('Cards','sage'),
            'flex-layout'   => __('Flex Layout','sage'),
            'circular_grid' => __('Circular Grid','sage'),
            'grid'          => __('Grid','sage'),
            'img-layout'    => __('Image layout','sage'),
            'masonry'       => __('Masonry','sage'),
            'pinterest'     => __('Pinterest','sage'),
            'slider'        => __('Photo Slider'),
            'carousel-testimonial'        => __('Testimonial Carousel'),
            'windows'       => __('Windows','sage'),
        ];
        return $components;
    }

    /**
     * Return the website use: travel agency, hotel or tourism office
     * @return bool
     */
    public static function getWebsiteUse(){
        $use = false;
        $agency_options = get_option('agency_settings');
        if(isset($agency_options)) {
            $website_use = (isset($agency_options['website_use']) ? $agency_options['website_use'] : false);
            $use = $website_use;
        }
        return $use;
    }

    public static function getUnableDates(){
        $use = self::getWebsiteUse();
        $dates = array();
        if($use == 'hotel'){
            $agency_options = get_option('agency_settings');
            if(isset($agency_options['unable_dates']) && !empty($agency_options['unable_dates'])){
                $unable_dates = $agency_options['unable_dates'];
                foreach ($unable_dates as $date){
                    if(!empty($date['unable_start_date'])){
                        $row['start_date'] = $date['unable_start_date'];
                        if(!empty($date['unable_end_date'])){
                            $row['end_date'] = $date['unable_end_date'];
                        }else{
                            $row['end_date'] = $date['unable_start_date'];
                        }
                        $dates[] = $row;
                        $row = array();
                    }
                }
            }
        }
        return $dates;
    }
    public static function  hex2rgb($hex,$array=false) {
        $hex = str_replace("#", "", $hex);

        if(strlen($hex) == 3) {
            $r = hexdec(substr($hex,0,1).substr($hex,0,1));
            $g = hexdec(substr($hex,1,1).substr($hex,1,1));
            $b = hexdec(substr($hex,2,1).substr($hex,2,1));
        }else {
            $r = hexdec(substr($hex,0,2));
            $g = hexdec(substr($hex,2,2));
            $b = hexdec(substr($hex,4,2));
        }
        $rgb = array($r, $g, $b);
        if(!$array)
            return implode(",", $rgb); // returns the rgb values separated by commas
        return $rgb; // returns an array with the rgb values
    }
    public static function rgb2hex($rgb) {
        $hex = "#";
        $hex .= str_pad(dechex($rgb[0]), 2, "0", STR_PAD_LEFT);
        $hex .= str_pad(dechex($rgb[1]), 2, "0", STR_PAD_LEFT);
        $hex .= str_pad(dechex($rgb[2]), 2, "0", STR_PAD_LEFT);

        return $hex; // returns the hex value including the number sign (#)
    }
    public static function getHoverEffectList(){
        $effecfts = array(
            'imghvr-fade'                  => __('Fade', 'sage'),
            'imghvr-push-up'               => __('Push up', 'sage'),
            'imghvr-push-down'             => __('Push down', 'sage'),
            'imghvr-push-left'             => __('Push Left', 'sage'),
            'imghvr-push-right'            => __('Push Right', 'sage'),
            'imghvr-slide-up'              => __('Slide up', 'sage'),
            'imghvr-slide-down'            => __('Slide down', 'sage'),
            'imghvr-slide-left'            => __('Slide left', 'sage'),
            'imghvr-slide-right'           => __('Slide right', 'sage'),
            'imghvr-reveal-up'             => __('Reveal up', 'sage'),
            'imghvr-reveal-down'           => __('Reveral down', 'sage'),
            'imghvr-reveal-left'           => __('Reveal left', 'sage'),
            'imghvr-reveal-right'          => __('Reveal right', 'sage'),
            'imghvr-hinge-up'              => __('Hinge up', 'sage'),
            'imghvr-hinge-left'            => __('Hinge left', 'sage'),
            'imghvr-hinge-right'           => __('Hinge right', 'sage'),
            'imghvr-flip-horiz'            => __('Flip horizontal', 'sage'),
            'imghvr-flip-vert'             => __('Flip vertical', 'sage'),
            'imghvr-flip-diag-1'           => __('Flip 1', 'sage'),
            'imghvr-flip-diag-2'           => __('Flip 2', 'sage'),
            'imghvr-shutter-out-horiz'     => __('Shutter out horizontal', 'sage'),
            'imghvr-shutter-out-vert'      => __('Shutter out vertical', 'sage'),
            'imghvr-shutter-out-diag-1'    => __('Shutter out 1', 'sage'),
            'imghvr-shutter-out-diag-2'    => __('Shutter out 2', 'sage'),
            'imghvr-shutter-in-horiz'      => __('Shutter in horizontal', 'sage'),
            'imghvr-shutter-in-vert'       => __('Shutter in vertical', 'sage'),
            'imghvr-shutter-in-out-horiz'  => __('Shutter in out horizontal', 'sage'),
            'imghvr-shutter-in-out-vert'   => __('Shutter in out vertical', 'sage'),
            'imghvr-shutter-in-out-diag-1' => __('Shutter in out 1', 'sage'),
            'imghvr-shutter-in-out-diag-2' => __('Shutter in out 2', 'sage'),
            'imghvr-fold-up'               => __('Fold up', 'sage'),
            'imghvr-fold-down'             => __('Fold down', 'sage'),
            'imghvr-fold-left'             => __('Fold left', 'sage'),
            'imghvr-fold-right'            => __('Fold right', 'sage'),
            'imghvr-zoom-in'               => __('Zoom in', 'sage'),
            'imghvr-zoom-out'              => __('Zoom out', 'sage'),
            'imghvr-zoom-out-up'           => __('Zoom out up', 'sage'),
            'imghvr-zoom-out-down'         => __('Zoom out down', 'sage'),
            'imghvr-zoom-out-left'         => __('Zoom out left', 'sage'),
            'imghvr-zoom-out-right'        => __('Zoom out right', 'sage'),
            'imghvr-zoom-out-flip-horiz'   => __('Zoom out flip horizontal', 'sage'),
            'imghvr-zoom-out-flip-vert'    => __('Zoom out flip vertical', 'sage'),
            'imghvr-blur'                  => __('No', 'Blur')
        );
        return $effecfts;
    }

    /**
     * Get Recaptcha keys added on WP-ADMIN -> Appearance -> Options -> Information
     * @return mixed
     */
    public static function getRecaptchaData(){
        $agency_options = get_option('agency_settings');
        $recaptcha['site_key'] = (isset($agency_options['recaptcha_site_key'])?$agency_options['recaptcha_site_key']:'6Lfq_Q0UAAAAACUqqMQSJ-qOhT8SHS_msHRbOdB1');
        $recaptcha['secret_key'] = (isset($agency_options['recaptcha_secret_key'])?$agency_options['recaptcha_secret_key']:'6Lfq_Q0UAAAAAFZKcsbGcX89WEBvarb_wu7jzKqe');
        return $recaptcha;
    }
    public static function getGoogleMapsAPIKey(){
        $agency_options = get_option('agency_settings');
        $api_key = (isset($agency_options['gmaps_api_key'])?$agency_options['gmaps_api_key']:'AIzaSyAxU6TfM2bDMh6NR9jVksCrNIT6nY8BeNo');
        return $api_key;
    }
    public static function getActivePostTypesByUse(){
        $agency_options = get_option('agency_settings');
        $post_types = [];
        if(isset($agency_options)) {
            $website_use = (isset($agency_options['website_use'])?$agency_options['website_use']:null);
            if (isset($website_use)) {
                switch ($website_use) {
                    case 'travel':
                        $post_types = $agency_options['travel_agency_posttypes'];
                        break;
                    case 'hotel':
                        $post_types = $agency_options['hotel_posttypes'];
                        break;
                    default:
                        $post_types = $agency_options['tourist_office_posttypes'];
                        break;
                }
            }
        }
        return $post_types;
    }
    public static function getSocialMedia(){
        $agency_options = get_option('agency_settings');
        $info = array();
        $info['facebook'] = (isset($agency_options['social_facebook'])?$agency_options['social_facebook']:"");
        $info['twitter'] = (isset($agency_options['social_twitter'])?$agency_options['social_twitter']:"");
        $info['instagram'] = (isset($agency_options['social_instagram'])?$agency_options['social_instagram']:"");
        $info['linkedin'] = (isset($agency_options['social_linkedin'])?$agency_options['social_linkedin']:"");
        $info['gplus'] = (isset($agency_options['social_gplus'])?$agency_options['social_gplus']:"");
        $info['skype'] = (isset($agency_options['social_skype'])?$agency_options['social_skype']:"");
        $info['pinterest'] = (isset($agency_options['social_pinterest'])?$agency_options['social_pinterest']:"");
        return $info;
    }
    public static function getAgencyPartners(){
        $agency_options = get_option('agency_settings');
        $partners = array();
        if(isset($agency_options['agency_partners'])){
            foreach ($agency_options['agency_partners'] as $partner){
                $row['name'] = $partner['partner_name'];
                $row['url'] = $partner['partner_website'];
                $logo = (isset($partner['partner_logo'][0])?wp_get_attachment_url($partner['partner_logo'][0]):"");
                $row['logo'] = $logo;
                $partners[] = $row;
            }
        }
        return $partners;
    }
    public static function getConfigData(){
        $config_data = [];
        $settings = get_option('agency_settings');
        $config_data['currency'] = (isset($settings['currency'])?$settings['currency']:'USD');
        $config_data['timezone'] = (isset($settings['timezone'])?$settings['timezone']:'America/Caracas');
        $config_data['use'] = self::getWebsiteUse();
        $config_data['description'] = (isset($settings['description'])?$settings['description']:'');
        $config_data['address'] = (isset($settings['address'])?$settings['address']:'');
        $config_data['postal_code'] = (isset($settings['postal_code'])?$settings['postal_code']:'');
        $config_data['city'] = (isset($settings['city'])?$settings['city']:'');
        $config_data['country'] = (isset($settings['country'])?$settings['country']:'');
        $config_data['email'] = (isset($settings['email'])?$settings['email']:'');
        $config_data['phone'] = (isset($settings['phone'])?$settings['phone']:'');
        $config_data['fax'] = (isset($settings['fax'])?$settings['fax']:'');
        $config_data['schedule'] = (isset($settings['schedule'])?$settings['schedule']:'');
        $config_data['google_map'] = (isset($settings['google_map'])?$settings['google_map']:'');
        $config_data['insurance'] = (isset($settings['insurance'])?$settings['insurance']:[]);
        $config_data['captcha'] = self::getRecaptchaData();
        $logo = self::getWebsiteLogo();
        $config_data['logo'] = ($logo?wp_get_attachment_url($logo):"");
        $config_data['active_post_types'] = self::getActivePostTypesByUse();
        $config_data['website_color'] = (!get_theme_mod('website_color')?'':get_theme_mod('website_color'));
        $config_data['catalog_template'] = get_theme_mod('agency_catalog_template');
        $config_data['catalog_template'] = (!$config_data['catalog_template']?'cards':$config_data['catalog_template']);
        $config_data['social_media'] = self::getSocialMedia();
        $config_data['partners'] = self::getAgencyPartners();
        return $config_data;
    }
    public static function normalizeChars($str){
        $unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );
        return strtr( $str, $unwanted_array );
    }
}
