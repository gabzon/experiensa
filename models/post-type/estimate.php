<?php

if ( ! function_exists('estimate_post_type') ) {

    function estimate_post_type($post_types){
        $labels = array(
            'name'                  => _x( 'Estimates', 'Post Type General Name', 'sage' ),
            'singular_name'         => _x( 'Estimate', 'Post Type Singular Name', 'sage' ),
            'menu_name'             => __( 'Estimates', 'sage' ),
            'name_admin_bar'        => __( 'Estimates', 'sage' ),
            'parent_item_colon'     => __( 'Parent Estimate:', 'sage' ),
            'all_items'             => __( 'All Estimate', 'sage' ),
            'add_new_item'          => __( 'Add New Estimate', 'sage' ),
            'add_new'               => __( 'Add New', 'sage' ),
            'new_item'              => __( 'New Estimate', 'sage' ),
            'edit_item'             => __( 'Edit Estimate', 'sage' ),
            'update_item'           => __( 'Update Estimate', 'sage' ),
            'view_item'             => __( 'View Estimate', 'sage' ),
            'search_items'          => __( 'Search Estimate', 'sage' ),
            'not_found'             => __( 'Not found', 'sage' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'sage' ),
            'items_list'            => __( 'Estimates list', 'sage' ),
            'items_list_navigation' => __( 'Estimates list navigation', 'sage' ),
            'filter_items_list'     => __( 'Filter Estimates list', 'sage' ),
        );
        $rewrite = array(
            'slug'                  => 'estimate',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );

        $post_types['estimate'] = array(
            'label'                 => __( 'Estimate', 'sage' ),
            'description'           => __( 'List of Estimate (quotes)', 'sage' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'author', 'comments', 'revisions', ),
            'taxonomies'            => array( 'category', 'post_tag', 'included', 'excluded' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 6,
            'menu_icon'             => 'dashicons-analytics',
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
    add_filter('piklist_post_types', 'estimate_post_type');
}

/* Flush rewrite rules for custom post types. */
add_action( 'after_switch_theme', 'flush_rewrite_rules' );

?>
