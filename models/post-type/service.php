<?php
if ( ! function_exists('services_post_type') ) {

    // Register Custom Post Type
    function services_post_type($post_types) {

        $labels = array(
            'name'                  => _x( 'Services', 'Post Type General Name', 'sage' ),
            'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'sage' ),
            'menu_name'             => __( 'Services', 'sage' ),
            'name_admin_bar'        => __( 'Services', 'sage' ),
            'parent_item_colon'     => __( 'Parent Service:', 'sage' ),
            'all_items'             => __( 'All Services', 'sage' ),
            'add_new_item'          => __( 'Add New Service', 'sage' ),
            'add_new'               => __( 'Add New', 'sage' ),
            'new_item'              => __( 'New Service', 'sage' ),
            'edit_item'             => __( 'Edit Service', 'sage' ),
            'update_item'           => __( 'Update Service', 'sage' ),
            'view_item'             => __( 'View Service', 'sage' ),
            'search_items'          => __( 'Search Service', 'sage' ),
            'not_found'             => __( 'Not found', 'sage' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'sage' ),
            'items_list'            => __( 'Services list', 'sage' ),
            'items_list_navigation' => __( 'Services list navigation', 'sage' ),
            'filter_items_list'     => __( 'Filter Services list', 'sage' ),
        );
        $rewrite = array(
            'slug'                  => 'service',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );
        $post_types['service'] = array(
            'label'                 => __( 'Service', 'sage' ),
            'description'           => __( 'List of services surrounding a trip', 'sage' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'excerpt', 'thumbnail', ),
            'taxonomies'            => array( 'category', 'post_tag' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 7,
            'menu_icon'             => 'dashicons-exerpt-view',
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
    add_filter('piklist_post_types', 'services_post_type');
}

/* Flush rewrite rules for custom post types. */
add_action( 'after_switch_theme', 'flush_rewrite_rules' );

?>
