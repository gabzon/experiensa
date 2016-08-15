<?php

if ( ! function_exists('room_post_type') ) {

    function room_post_type($post_types){
        $labels = array(
            'name'                  => _x( 'Room', 'Post Type General Name', 'sage'),
            'singular_name'         => _x( 'Room', 'Post Type Singular Name', 'sage'),
            'menu_name'             => __( 'Rooms', 'sage'),
            'name_admin_bar'        => __( 'Rooms', 'sage' ),
            'parent_item_colon'     => __( 'Parent Room:', 'sage'),
            'all_items'             => __( 'All Rooms', 'sage'),
            'add_new_item'          => __( 'Add New Room', 'sage'),
            'add_new'               => __( 'Add New', 'sage'),
            'new_item'              => __( 'New Room', 'sage' ),
            'edit_item'             => __( 'Edit Room', 'sage'),
            'update_item'           => __( 'Update Room', 'sage'),
            'view_item'             => __( 'View Room', 'sage'),
            'search_items'          => __( 'Search Room', 'sage'),
            'not_found'             => __( 'Not found', 'sage'),
            'not_found_in_trash'    => __( 'Not found in Trash', 'sage'),
            'items_list'            => __( 'Room list', 'sage' ),
            'items_list_navigation' => __( 'Room list navigation', 'sage' ),
            'filter_items_list'     => __( 'Filter Room list', 'sage' ),
        );
        $rewrite = array(
            'slug'                  => 'room',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );

        $post_types['room'] = array(
            'label'                 => __( 'Rooms', 'sage' ),
            'description'           => __( 'List of rooms in the establishment', 'sage' ),
            'labels'                => $labels,
            'supports'              => array('title', 'thumbnail', 'excerpt', 'revisions'),
            'taxonomies'            => array( 'category', 'post_tag' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 7,
            'menu_icon'             => 'dashicons-welcome-view-site',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'show_in_rest'          => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'page',
        );
        return $post_types;
    }
    add_filter('piklist_post_types', 'room_post_type');
}

/* Flush rewrite rules for custom post types. */
add_action( 'after_switch_theme', 'flush_rewrite_rules' );

?>
