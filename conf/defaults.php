<?php

//------------------------------------------------------------------------------
/**
*   Allow upload SVG files 
*   @param $mimes
*   @return @mimes array
*/
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');
/*
function wp_svg_style() {
  echo '<style>
               svg, img[src*=".svg"] {
                   width: 120px;
                   height: 120px;
               }
             </style>';
}
add_action("admin_head", "wp_svg_style");
*/
/**
 * Check if admin bar is showing and add customs body class
 * @param $classes
 * @return array
 */
function add_custom_body_class($classes){
    if(is_admin_bar_showing()){
        $classes[] = 'displayed-admin-bar';
    } else{
        $classes[] = 'not-displayed-admin-bar';
    }
    return $classes;
}
add_filter('body_class', 'add_custom_body_class');

/**
 * Set Default user color schema when create new users
 * @param $user_id
 */
function set_default_admin_color_schema($user_id) {
    if(!WP_DEBUG){
        $args = array(
            'ID' => $user_id,
            'admin_color' => 'sunrise'
        );
    }else{
        $args = array(
            'ID' => $user_id,
            'admin_color' => 'blue'
        );
    }

    wp_update_user( $args );
}
add_action('user_register', 'set_default_admin_color_schema');

/**
* Function hide_custom_post_types
*
* Hide custom post types from admin menu
*/
function hide_custom_post_types(){
    $agency_options = get_option('agency_settings');
    if(isset($agency_options)) {
        $website_use = (isset($agency_options['website_use'])?$agency_options['website_use']:null);
        $all_posttypes = [ "brochure", "partner", "feedback", "service", "host", "voyage", "estimate", "facility" ];
        $to_hide = array();
        if (isset($website_use)) {
            $posttypes = array();
            switch ($website_use) {
                case 'travel':
                    $posttypes = $agency_options['travel_agency_posttypes'];
                    break;
                case 'hotel':
                    $posttypes = $agency_options['hotel_posttypes'];
                    break;
                default:
                    $posttypes = $agency_options['tourist_office_posttypes'];
                    break;
            }
            $to_hide = array_diff($all_posttypes, $posttypes);
        }
        foreach ($to_hide as $value) {
            if (post_type_exists($value))
                remove_menu_page('edit.php?post_type=' . $value);
        }
    }
}

add_action( 'admin_menu', 'hide_custom_post_types' );

//function change_meta_box_titles() {
//    global $wp_meta_boxes; // array of defined meta boxes
//    // cycle through the array, change the titles you want
//    $wp_meta_boxes['voyage']['normal']['core']['postexcerpt']['title'] = __('Description','sage');
//    $wp_meta_boxes['partner']['normal']['core']['postexcerpt']['title'] = __('Description','sage');
//    $wp_meta_boxes['host']['normal']['core']['postexcerpt']['title'] = __('Description','sage');
//    $wp_meta_boxes['service']['normal']['core']['postexcerpt']['title'] = __('Description','sage');
//}
//add_action('add_meta_boxes', 'change_meta_box_titles');

/**
 * @param $vars
 * @return array
 */
function add_query_vars_filter( $vars ){
    $vars[] = "cpt";
    $vars[] = "term";
    $vars[] = "tax";
    return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );

/**
 * Filter function to hide Hotel Settings tab on Options page
 * @param $part_data
 * @param $folder
 */
function hide_hotel_settings_tab($part_data, $folder){
    if(isset($part_data['data']['flow']) && $part_data['data']['flow'][0] == 'options' && $part_data['data']['title'] == 'Hotel Settings') {
        $website_use = Helpers::getWebsiteUse();
        if ($website_use == 'hotel')
            return $part_data;
        return;
    }else {
        return $part_data;
    }
}
add_filter('piklist_part_process_callback','hide_hotel_settings_tab', 10, 2);

/**
 * Ajax/JSON response to get Hotel reservation unable dates
 */
function get_reservation_unable_dates(){
    $error = true;
    $unable_dates = Helpers::getUnableDates();
    if(!empty($unable_dates))
        $error = false;
    header('Content-Type: application/json');
    echo json_encode(['error'=>$error,"dates"=>$unable_dates]);
    die();
}
add_action('wp_ajax_get_reservation_unable_dates', 'get_reservation_unable_dates');
add_action('wp_ajax_nopriv_get_reservation_unable_dates', 'get_reservation_unable_dates');

function addExperiensaCustomImageSizes(){
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'standard-size', 1280, 720, true );
}
add_action('init', 'addExperiensaCustomImageSizes');

function experiensa_image_sizes_names($sizes) {
    return array_merge( $sizes, array(
        'standard-size' => __( 'Standard size', 'sage' )
    ) );
}
add_filter('image_size_names_choose', 'experiensa_image_sizes_names');

/**
 * Change email sender name to blog name
 * @param $email
 * @return mixed
 */
function ec_mail_name( $email ){
    $blog_name = get_bloginfo('name');
    return $blog_name; // new email name from sender.
}
add_filter( 'wp_mail_from_name', 'ec_mail_name' );

/* @author Brad Dalton
@example http://wpsites.net/ @copyright 2014 WP Sites
 */
function wpsites_custom_tiled_gallery_width($width){
    $tiled_gallery_content_width = $width;
    $width = 1200;
    return $width;
}
add_filter( 'tiled_gallery_content_width', 'wpsites_custom_tiled_gallery_width' );

function babelType($tag,$handle,$src){
    if($handle !== 'react-main'){
        return $tag;
    }
    return '<script src="'. $src .'" type="text/babel"></script>'. "\n";
}
add_filter('script_loader_tag','babelType',10,3);

/**
 * Enqueue LiveComposer dependencies on Editor
 * @param $hook
 */
function load_custom_wp_admin_style($hook) {
    if($hook != 'toplevel_page_livecomposer_editor') {
        return;
    }
    wp_enqueue_style('lc-experiensa-plugins-style',get_template_directory_uri() . '/dist/styles/lc-plugins.css');
    wp_enqueue_script( 'lc-experiensa-plugins', get_template_directory_uri() . '/dist/scripts/lc-plugins.js' );
    wp_enqueue_script( 'lc-experiensa-plugins-init', get_template_directory_uri() . '/dist/scripts/lc-plugins-init.js',['lc-experiensa-plugins'] );
//    wp_enqueue_script( 'react-catalog', get_template_directory_uri().'/dist/scripts/catalog.js', [], null, true);
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );
/**
 * Enqueue Stripe api on estimate posts
 * @param $hook_suffix
 */
function wpse_cpt_enqueue_estimate( $hook_suffix ){
    $cpt = 'estimate';
    if(is_single() && get_post_type() == $cpt && \Helpers::check_internet_connection()){
        wp_enqueue_script('stripe/js', 'https://js.stripe.com/v2/');
    }
}

add_action( 'wp_enqueue_scripts', 'wpse_cpt_enqueue_estimate');

function enqueue_gplace_autocomplete_place($hook){
    $lang = Helpers::getSiteLanguageCode();
    $localized_array = array(
        'ajaxurl'=>admin_url('admin-ajax.php'),
        'siteurl'=>get_bloginfo('url'),
        'stylesheet_directory_uri'=>get_stylesheet_directory_uri()
    );
    global $pagenow;
    $cpt = (isset($_GET['post_type'])?$_GET['post_type']:'');
    $api_key = Helpers::getGoogleMapsAPIKey();
    if($pagenow == 'post-new.php' && $cpt == 'place'){
        wp_enqueue_script('gplace_autocomplete/js', get_template_directory_uri() . '/dist/scripts/gplace_autocomplete.js');
        wp_enqueue_script('gplace_api/js', 'https://maps.googleapis.com/maps/api/js?libraries=places&key='.$api_key.'&language='.$lang);
        wp_localize_script('gplace_autocomplete/js','sage_vars',$localized_array);
    }else{
        $cpt = (isset($_GET['post'])?get_post_type($_GET['post']):'');
        $action = (isset($_GET['action'])?$_GET['action']:'');
        if($pagenow == 'post.php' && $cpt == 'place' && $action == 'edit'){
            wp_enqueue_script('gplace_autocomplete/js', get_template_directory_uri() . '/dist/scripts/gplace_autocomplete.js');
            wp_enqueue_script('gplace_api/js', 'https://maps.googleapis.com/maps/api/js?libraries=places&key='.$api_key.'&language='.$lang);
            wp_localize_script('gplace_autocomplete/js','sage_vars',$localized_array);
        }
    }
}
add_action( 'admin_enqueue_scripts', 'enqueue_gplace_autocomplete_place');

/**
 * Enqueue Scripts and Styles by Template
 */
//function Load_ScriptsStyles_By_Template(){
//    if ( is_page_template('templates/flight-offers-form.php') ) {
//        $localized_array = array(
//            'ajaxurl'=>admin_url('admin-ajax.php'),
//            'siteurl'=>get_site_url(),
//            'stylesheet_directory_uri'=>get_stylesheet_directory_uri()
//        );
//        wp_localize_script('sage/js','sage_vars',$localized_array);
//        wp_enqueue_script('offers', get_template_directory_uri().'/dist/scripts/offers.js', [], null, true);
//    }
//}
//add_action('wp_enqueue_scripts','Load_ScriptsStyles_By_Template');

function loadLiveComposerHeaderFooterFunctionality(){
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    if(is_plugin_active('live-composer-page-builder/ds-live-composer.php')){
        define( 'DS_LIVE_COMPOSER_HF', true );
        define( 'DS_LIVE_COMPOSER_HF_AUTO', false );
    }
}
loadLiveComposerHeaderFooterFunctionality();
add_filter( 'dslc_tutorials', '__return_true' );
