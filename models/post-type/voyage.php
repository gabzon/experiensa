<?php

if ( ! function_exists('voyage_post_type') ) {

    function voyage_post_type($post_types){
        $labels = array(
            'name'                  => _x( 'Voyage', 'Post Type General Name', 'sage'),
            'singular_name'         => _x( 'Voyage', 'Post Type Singular Name', 'sage'),
            'menu_name'             => __( 'Voyages', 'sage'),
            'name_admin_bar'        => __( 'Voyages', 'sage' ),
            'parent_item_colon'     => __( 'Parent Voyage:', 'sage'),
            'all_items'             => __( 'All Voyages', 'sage'),
            'add_new_item'          => __( 'Add New Voyage', 'sage'),
            'add_new'               => __( 'Add New', 'sage'),
            'new_item'              => __( 'New Voyage', 'sage' ),
            'edit_item'             => __( 'Edit Voyage', 'sage'),
            'update_item'           => __( 'Update Voyage', 'sage'),
            'view_item'             => __( 'View Voyage', 'sage'),
            'search_items'          => __( 'Search Voyage', 'sage'),
            'not_found'             => __( 'Not found', 'sage'),
            'not_found_in_trash'    => __( 'Not found in Trash', 'sage'),
            'items_list'            => __( 'Voyage list', 'sage' ),
            'items_list_navigation' => __( 'Voyage list navigation', 'sage' ),
            'filter_items_list'     => __( 'Filter Voyage list', 'sage' ),
        );
        $rewrite = array(
            'slug'                  => 'voyage',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );
        
        $post_types['voyage'] = array(
            'label'                 => __( 'Voyages', 'sage' ),
            'description'           => __( 'List of travel offers (offers and packages)', 'sage' ),
            'labels'                => $labels,
            'supports'              => array('title', 'thumbnail', 'excerpt', 'revisions'),
            'taxonomies'            => array( 'category', 'post_tag', 'voyage_type', 'country', 'theme' , 'location', 'included', 'excluded'),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 7,
            'menu_icon'             => 'dashicons-palmtree',
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
    add_filter('piklist_post_types', 'voyage_post_type');
}

/* Flush rewrite rules for custom post types. */
add_action( 'after_switch_theme', 'flush_rewrite_rules' );

?>
