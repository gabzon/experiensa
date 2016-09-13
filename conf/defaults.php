<?php

//------------------------------------------------------------------------------
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

function add_custom_body_class($classes){
    if(is_admin_bar_showing()){
        $classes[] = 'displayed-admin-bar';
    } else{
        $classes[] = 'not-displayed-admin-bar';
    }
    return $classes;
}
add_filter('body_class', 'add_custom_body_class');


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
        $all_posttypes = [ "brochure", "partner", "feedback", "service", "host", "voyage", "estimate", "room" ];
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

/*function create_custom_landing_page(){
    $pages = get_pages(
        array(
            'meta_key' => '_wp_page_template',
            'meta_value' => 'landing.php'
        )
    );
    if(empty($pages)):
        //create a new page and automatically assign the page template
        $post = array(
            'post_title' => "Home",
            'post_content' => "",
            'post_status' => "publish",
            'post_type' => 'page',
        );
        $postID = wp_insert_post($post);
        update_post_meta($postID, "_wp_page_template", "landing.php");
    endif;
}
add_action('admin_menu', 'create_custom_landing_page');

function create_custom_request_page(){
    $pages = get_pages(
        array(
            'meta_key' => '_wp_page_template',
            'meta_value' => 'request-form.php'
        )
    );
    if(empty($pages)):
        //create a new page and automatically assign the page template
        $post = array(
            'post_title' => "Request",
            'post_content' => "",
            'post_status' => "publish",
            'post_type' => 'page',
        );
        $postID = wp_insert_post($post);
        update_post_meta($postID, "_wp_page_template", "request-form.php");
    endif;
}
add_action('admin_menu', 'create_custom_request_page');

function create_custom_catalog_page(){
    $pages = get_pages(
        array(
            'meta_key' => '_wp_page_template',
            'meta_value' => 'catalog.php'
        )
    );
    if(empty($pages)):
        //create a new page and automatically assign the page template
        $post = array(
            'post_title' => "Catalog",
            'post_content' => "",
            'post_status' => "publish",
            'post_type' => 'page',
        );
        $postID = wp_insert_post($post);
        update_post_meta($postID, "_wp_page_template", "catalog.php");
    endif;
}
add_action('admin_menu', 'create_custom_catalog_page');

function create_custom_search_result_page(){
    $pages = get_pages(
        array(
            'meta_key' => '_wp_page_template',
            'meta_value' => 'postlist-result.php'
        )
    );
    if(empty($pages)):
        //create a new page and automatically assign the page template
        $post = array(
            'post_title' => "Search Post By Term",
            'post_content' => "",
            'post_status' => "publish",
            'post_type' => 'page',
        );
        $postID = wp_insert_post($post);
        update_post_meta($postID, "_wp_page_template", "postlist-result.php");
    endif;
}
add_action('admin_menu', 'create_custom_search_result_page');*/
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

function bg_options_field_template($templates){
    $templates['bg_options'] = array(
        'name' => __('Post Meta Custom', 'piklist'),
        'description' => __('My template for Post Meta', 'piklist'),
        'template' =>   '[field_wrapper]
                            <div class="%1$s my-custom-css-class">
                                <h3>'.__('Background Options','sage').'</h3>
                                <hr>
                                <div class="piklist-field">[field]</div>
                            </div>
                         [/field_wrapper]'
    );
    return $templates;
}
add_filter('piklist_field_templates', 'bg_options_field_template');