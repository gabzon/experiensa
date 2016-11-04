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
        $agency_logo = $agency_options['agency_logo'];
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
            'imghvr-fade'              => __('Fade','sage'),
            'imghvr-push-up'           => __('Push up','sage'),
            'imghvr-push-down'           => __('Push down','sage'),
            'imghvr-push-left'           => __('Push Left','sage'),
            'imghvr-push-right'           => __('Push Right','sage'),
            'imghvr-slide-up'           => __('Slide up','sage'),
            'imghvr-slide-down'           => __('Slide down','sage'),
            'imghvr-slide-left'           => __('Slide left','sage'),
            'imghvr-slide-right'           => __('Slide right','sage'),
            'imghvr-reveal-up'           => __('Reveal up','sage'),
            'imghvr-reveal-down'           => __('Reveral down','sage'),
            'imghvr-reveal-left'           => __('Reveal left','sage'),
            'imghvr-reveal-right'           => __('Reveal right','sage'),
            'imghvr-hinge-up'           => __('Hinge up','sage'),
            'imghvr-hinge-left'           => __('Hinge left','sage'),
            'imghvr-hinge-right'           => __('Hinge right','sage'),
            'imghvr-flip-horiz'           => __('Flip horizontal','sage'),
            'imghvr-flip-vert'           => __('Flip vertical','sage'),
            'imghvr-flip-diag-1'           => __('Flip 1','sage'),
            'imghvr-flip-diag-2'           => __('Flip 2','sage'),
            'imghvr-shutter-out-horiz'           => __('Shutter out horizontal','sage'),
            'imghvr-shutter-out-vert'           => __('Shutter out vertical','sage'),
            'imghvr-shutter-out-diag-1'           => __('Shutter out 1','sage'),
            'imghvr-shutter-out-diag-2'           => __('Shutter out 2','sage'),
            'imghvr-shutter-in-horiz'           => __('Shutter in horizontal','sage'),
            'imghvr-shutter-in-vert'              => __('Shutter in vertical','sage'),
            'imghvr-shutter-in-out-horiz'           => __('Shutter in out horizontal','sage'),
            'imghvr-shutter-in-out-vert'           => __('Shutter in out vertical','sage'),
            'imghvr-shutter-in-out-diag-1'           => __('Shutter in out 1','sage'),
            'imghvr-shutter-in-out-diag-2'           => __('Shutter in out 2','sage'),
            'imghvr-fold-up'           => __('Fold up','sage'),
            'imghvr-fold-down'           => __('Fold down','sage'),
            'imghvr-fold-left'           => __('Fold left','sage'),
            'imghvr-fold-right'           => __('Fold right','sage'),
            'imghvr-zoom-in'           => __('Zoom in','sage'),
            'imghvr-zoom-out'           => __('Zoom out','sage'),
            'imghvr-zoom-out-up'           => __('Zoom out up','sage'),
            'imghvr-zoom-out-down'           => __('Zoom out down','sage'),
            'imghvr-zoom-out-left'           => __('Zoom out left','sage'),
            'imghvr-zoom-out-right'           => __('Zoom out right','sage'),
            'imghvr-zoom-out-flip-horiz'           => __('Zoom out flip horizontal','sage'),
            'imghvr-zoom-out-flip-vert'           => __('Zoom out flip vertical','sage'),
            'imghvr-blur'           => __('No','Blur')
        );
        return $effecfts;
    }
}
