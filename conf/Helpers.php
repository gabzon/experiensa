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
                $templates_names[$key] = $key;
        }
        return $templates_names;
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
}
