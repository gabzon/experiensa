<?php

if ( ! function_exists('facility_post_type') ) {

    function facility_post_type($post_types){
        $labels = array(
            'name'                  => _x( 'Facility', 'Post Type General Name', 'sage'),
            'singular_name'         => _x( 'Facility', 'Post Type Singular Name', 'sage'),
            'menu_name'             => __( 'Facilities', 'sage'),
            'name_admin_bar'        => __( 'Facilities', 'sage' ),
            'parent_item_colon'     => __( 'Parent Facility:', 'sage'),
            'all_items'             => __( 'All Facilities', 'sage'),
            'add_new_item'          => __( 'Add New Facility', 'sage'),
            'add_new'               => __( 'Add New', 'sage'),
            'new_item'              => __( 'New Facility', 'sage' ),
            'edit_item'             => __( 'Edit Facility', 'sage'),
            'update_item'           => __( 'Update Facility', 'sage'),
            'view_item'             => __( 'View Facility', 'sage'),
            'search_items'          => __( 'Search Facility', 'sage'),
            'not_found'             => __( 'Not found', 'sage'),
            'not_found_in_trash'    => __( 'Not found in Trash', 'sage'),
            'items_list'            => __( 'Facility list', 'sage' ),
            'items_list_navigation' => __( 'Facility list navigation', 'sage' ),
            'filter_items_list'     => __( 'Filter Facility list', 'sage' ),
        );
        $rewrite = array(
            'slug'                  => 'facility',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );

        $post_types['facility'] = array(
            'label'                 => __( 'Facilities', 'sage' ),
            'description'           => __( 'List of facilities in the establishment', 'sage' ),
            'labels'                => $labels,
            'supports'              => array('title', 'thumbnail','editor', 'excerpt', 'revisions'),
            'taxonomies'            => array( 'facility-type', 'category', 'post_tag'),
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
    add_filter('piklist_post_types', 'facility_post_type');
}

/* Flush rewrite rules for custom post types. */
add_action( 'after_switch_theme', 'flush_rewrite_rules' );

?>
