<?php

if ( ! function_exists('brochure_post_type') ) {

    // Register Custom Post Type
    function brochure_post_type($post_types) {

        $labels = array(
            'name'                  => _x( 'Brochures', 'Post Type General Name', 'sage' ),
            'singular_name'         => _x( 'Brochure', 'Post Type Singular Name', 'sage' ),
            'menu_name'             => __( 'Brochures', 'sage' ),
            'name_admin_bar'        => __( 'Brochures', 'sage' ),
            'archives'              => __( 'Brochures Archives', 'sage' ),
            'parent_item_colon'     => __( 'Parent Item:', 'sage' ),
            'all_items'             => __( 'All Brochures', 'sage' ),
            'add_new_item'          => __( 'Add New Brochure', 'sage' ),
            'add_new'               => __( 'Add New', 'sage' ),
            'new_item'              => __( 'New Brochure', 'sage' ),
            'edit_item'             => __( 'Edit Brochure', 'sage' ),
            'update_item'           => __( 'Update Brochure', 'sage' ),
            'view_item'             => __( 'View Brochure', 'sage' ),
            'search_items'          => __( 'Search Brochure', 'sage' ),
            'not_found'             => __( 'Not found', 'sage' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'sage' ),
            'featured_image'        => __( 'Featured Image', 'sage' ),
            'set_featured_image'    => __( 'Set featured image', 'sage' ),
            'remove_featured_image' => __( 'Remove featured image', 'sage' ),
            'use_featured_image'    => __( 'Use as featured image', 'sage' ),
            'insert_into_item'      => __( 'Insert into brochure', 'sage' ),
            'uploaded_to_this_item' => __( 'Uploaded to this brochure', 'sage' ),
            'items_list'            => __( 'Brochure list', 'sage' ),
            'items_list_navigation' => __( 'Brochures list navigation', 'sage' ),
            'filter_items_list'     => __( 'Filter Brochures list', 'sage' ),
        );
        $rewrite = array(
            'slug'                  => 'brochure',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );
        $post_types['brochure'] = array(
            'label'                 => __( 'Brochure', 'sage' ),
            'description'           => __( 'List of Brochures', 'sage' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'thumbnail', 'revisions', ),
            'taxonomies'            => array( 'category', 'post_tag', 'country', 'theme' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 9,
            'menu_icon'             => 'dashicons-format-gallery',
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
    add_filter('piklist_post_types', 'brochure_post_type');
}
/* Flush rewrite rules for custom post types. */
add_action( 'after_switch_theme', 'flush_rewrite_rules' );
