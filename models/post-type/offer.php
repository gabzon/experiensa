<?php

if ( ! function_exists('offer_post_type') ) {

    function offer_post_type($post_types){
        $labels = array(
            'name' => __('Offer', 'sage'),
            'singular_name' => __('Offer', 'sage'),
            'menu_name' => __('Offers', 'sage'),
            'parent_item_colon' => __('Parent Item:', 'sage'),
            'all_items' => __('All Offers', 'sage'),
            'view_item' => __('View Offer', 'sage'),
            'add_new_item' => __('Add New Offer', 'sage'),
            'add_new' => __('Add New', 'sage'),
            'edit_item' => __('Edit Offer', 'sage'),
            'update_item' => __('Update Offer', 'sage'),
            'search_items' => __('Search Offer', 'sage'),
            'not_found' => __('Not found', 'sage'),
            'not_found_in_trash' => __('Not found in Trash', 'sage'),
        );
        $rewrite = array(
            'slug'                  => 'offer',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );
        $post_types['offer'] = array(
            'label'                 => __( 'Offer', 'sage' ),
            'description'           => __( 'List of travel offers (offers and packages)', 'sage' ),
            'labels'                => $labels,
            'supports'              => array('title', 'thumbnail', 'excerpt', 'revisions'),
            'taxonomies'            => array( 'category', 'post_tag', 'voyage_type', 'country', 'theme' , 'location', 'included', 'excluded'),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'show_in_nav_menus'     => true,
            'show_in_admin_bar'     => true,
            'show_in_rest'          => true,
            'menu_position'         => 7,
            'menu_icon'             => 'dashicons-palmtree',
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'page',
        );
        return $post_types;
    }
    add_filter('piklist_post_types', 'offer_post_type');
}

/* Flush rewrite rules for custom post types. */
add_action( 'after_switch_theme', 'flush_rewrite_rules' );

?>
