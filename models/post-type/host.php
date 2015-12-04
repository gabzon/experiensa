<?php

if ( ! function_exists('host_post_type') ) {

    function host_post_type($post_types){
        $labels = array(
            'name'                  => _x( 'Hosts', 'Post Type General Name', 'sage' ),
            'singular_name'         => _x( 'Host', 'Post Type Singular Name', 'sage' ),
            'menu_name'             => __( 'Host', 'sage' ),
            'name_admin_bar'        => __( 'Hosts', 'sage' ),
            'parent_item_colon'     => __( 'Parent Host:', 'sage' ),
            'all_items'             => __( 'All Hosts', 'sage' ),
            'add_new_item'          => __( 'Add New Host', 'sage' ),
            'add_new'               => __( 'Add New', 'sage' ),
            'new_item'              => __( 'New Host', 'sage' ),
            'edit_item'             => __( 'Edit Host', 'sage' ),
            'update_item'           => __( 'Update Host', 'sage' ),
            'view_item'             => __( 'View Host', 'sage' ),
            'search_items'          => __( 'Search Host', 'sage' ),
            'not_found'             => __( 'Not found', 'sage' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'sage' ),
            'items_list'            => __( 'Hosts list', 'sage' ),
            'items_list_navigation' => __( 'Hosts list navigation', 'sage' ),
            'filter_items_list'     => __( 'Filter Hosts list', 'sage' ),
        );
        $rewrite = array(
            'slug'                  => 'host',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );
        $post_types['host'] = array(
            'label'                 => __( 'Host', 'sage' ),
            'description'           => __( 'List of hotels, hostels, appartments, etc', 'sage' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', ),
            'taxonomies'            => array( 'category', 'post_tag' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 8,
            'menu_icon'             => 'dashicons-building',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'page',
        );
        return $post_types;
    }
    add_filter('piklist_post_types', 'host_post_type');
}

/* Flush rewrite rules for custom post types. */
add_action( 'after_switch_theme', 'flush_rewrite_rules' );

?>
