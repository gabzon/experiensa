<?php

if ( ! function_exists('trip_post_type') ) {

    function trip_post_type($post_types){
        $labels = array(
            'name'                  => _x( 'Trips', 'Post Type General Name', 'sage' ),
            'singular_name'         => _x( 'Trip', 'Post Type Singular Name', 'sage' ),
            'menu_name'             => __( 'Trips', 'sage' ),
            'name_admin_bar'        => __( 'Trips', 'sage' ),
            'parent_item_colon'     => __( 'Parent Trip:', 'sage' ),
            'all_items'             => __( 'All Trips', 'sage' ),
            'add_new_item'          => __( 'Add New Trip', 'sage' ),
            'add_new'               => __( 'Add New', 'sage' ),
            'new_item'              => __( 'New Trip', 'sage' ),
            'edit_item'             => __( 'Edit Trip', 'sage' ),
            'update_item'           => __( 'Update Trip', 'sage' ),
            'view_item'             => __( 'View Trip', 'sage' ),
            'search_items'          => __( 'Search Trip', 'sage' ),
            'not_found'             => __( 'Not found', 'sage' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'sage' ),
            'items_list'            => __( 'Trips list', 'sage' ),
            'items_list_navigation' => __( 'Trips list navigation', 'sage' ),
            'filter_items_list'     => __( 'Filter Trips list', 'sage' ),
        );
        $rewrite = array(
            'slug'                  => 'trip',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );

        $post_types['trip'] = array(
            'label'                 => __( 'Trip', 'sage' ),
            'description'           => __( 'List of trips proposals (quotes)', 'sage' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'author', 'comments', 'revisions', ),
            'taxonomies'            => array( 'category', 'post_tag' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 6,
            'menu_icon'             => 'dashicons-palmtree',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'page',
            'status' => array(
                'quoted'    => array( 'label' => __('Proposed','sage')),
                'modified'  => array( 'label' => __('Modified','sage')),
                'accepted'  => array( 'label' => __('Accepted','sage')),
                'payed'     => array( 'label' => __('Payed','sage')),
            )
        );
        return $post_types;
    }
    add_filter('piklist_post_types', 'trip_post_type');
}

/* Flush rewrite rules for custom post types. */
add_action( 'after_switch_theme', 'flush_rewrite_rules' );

?>
