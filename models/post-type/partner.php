<?php
if ( ! function_exists('partner_post_type') ) {

    // Register Custom Post Type
    function partner_post_type($post_types) {

        $labels = array(
            'name'                  => _x( 'Partners', 'Post Type General Name', 'sage' ),
            'singular_name'         => _x( 'Partner', 'Post Type Singular Name', 'sage' ),
            'menu_name'             => __( 'Partners', 'sage' ),
            'name_admin_bar'        => __( 'Partners', 'sage' ),
            'parent_item_colon'     => __( 'Parent Partner:', 'sage' ),
            'all_items'             => __( 'All Partners', 'sage' ),
            'add_new_item'          => __( 'Add New Partner', 'sage' ),
            'add_new'               => __( 'Add New', 'sage' ),
            'new_item'              => __( 'New Partner', 'sage' ),
            'edit_item'             => __( 'Edit Partner', 'sage' ),
            'update_item'           => __( 'Update Partner', 'sage' ),
            'view_item'             => __( 'View Partner', 'sage' ),
            'search_items'          => __( 'Search Partner', 'sage' ),
            'not_found'             => __( 'Not found', 'sage' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'sage' ),
            'items_list'            => __( 'Partners list', 'sage' ),
            'items_list_navigation' => __( 'Partners list navigation', 'sage' ),
            'filter_items_list'     => __( 'Filter Partners list', 'sage' ),
        );
        $rewrite = array(
            'slug'                  => 'partner',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );
        $post_types['partner'] = array(
            'label'                 => __( 'Partner', 'sage' ),
            'description'           => __( 'List of travel agencies, tour operators and other services that belong to the listo group', 'sage' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'excerpt', 'thumbnail', ),
            'taxonomies'            => array( 'category', 'post_tag' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 8,
            'menu_icon'             => 'dashicons-businessman',
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
    add_filter('piklist_post_types', 'partner_post_type');
}

/* Flush rewrite rules for custom post types. */
add_action( 'after_switch_theme', 'flush_rewrite_rules' );
?>
