<?php

if ( ! function_exists('place_post_type') ) {

    function place_post_type($post_types){
        $labels = array(
            'name'                  => _x( 'Place', 'Post Type General Name', 'sage'),
            'singular_name'         => _x( 'Place', 'Post Type Singular Name', 'sage'),
            'menu_name'             => __( 'Places', 'sage'),
            'name_admin_bar'        => __( 'Places', 'sage' ),
            'parent_item_colon'     => __( 'Parent Place:', 'sage'),
            'all_items'             => __( 'All Places', 'sage'),
            'add_new_item'          => __( 'Add New Place', 'sage'),
            'add_new'               => __( 'Add New', 'sage'),
            'new_item'              => __( 'New Place', 'sage' ),
            'edit_item'             => __( 'Edit Place', 'sage'),
            'update_item'           => __( 'Update Place', 'sage'),
            'view_item'             => __( 'View Place', 'sage'),
            'search_items'          => __( 'Search Place', 'sage'),
            'not_found'             => __( 'Not found', 'sage'),
            'not_found_in_trash'    => __( 'Not found in Trash', 'sage'),
            'items_list'            => __( 'Place list', 'sage' ),
            'items_list_navigation' => __( 'Place list navigation', 'sage' ),
            'filter_items_list'     => __( 'Filter Place list', 'sage' ),
        );
        $rewrite = array(
            'slug'                  => 'place',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );

        $post_types['place'] = array(
            'label'                 => __( 'Places', 'sage' ),
            'description'           => __( 'List of places', 'sage' ),
            'labels'                => $labels,
            'supports'              => array('title', 'thumbnail', 'editor','excerpt', 'revisions'),
            'taxonomies'            => array( 'category', 'post_tag', 'country', 'location'),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 7,
            'menu_icon'             => 'dashicons-admin-site',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'show_in_rest'          => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'post',
        );
        return $post_types;
    }
    add_filter('piklist_post_types', 'place_post_type');
}

/* Flush rewrite rules for custom post types. */
add_action( 'after_switch_theme', 'flush_rewrite_rules' );
