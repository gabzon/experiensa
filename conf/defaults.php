<?php

//------------------------------------------------------------------------------
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

/**
* Function hide_custom_post_types
*
* Hide custom post types from admin menu
*/
function hide_custom_post_types(){
    $post_types[] = 'host';
    $post_types[] = 'service';
    $post_types[] = 'feedback';

    foreach($post_types as $value){
        remove_menu_page( 'edit.php?post_type='.$value );
    }
}

add_action( 'admin_menu', 'hide_custom_post_types' );
?>
