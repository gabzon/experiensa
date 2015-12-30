<?php
if ( ! function_exists('feedback_post_type') ) {

    // Register Custom Post Type
    function feedback_post_type($post_types) {
        $labels = array(
            'name'                  => _x( 'Feedbacks', 'Post Type General Name', 'sage' ),
            'singular_name'         => _x( 'Feedback', 'Post Type Singular Name', 'sage' ),
            'menu_name'             => __( 'Feedback', 'sage' ),
            'name_admin_bar'        => __( 'Feedbacks', 'sage' ),
            'parent_item_colon'     => __( 'Parent Feedback:', 'sage' ),
            'all_items'             => __( 'All Feedbacks', 'sage' ),
            'add_new_item'          => __( 'Add New Feedback', 'sage' ),
            'add_new'               => __( 'Add New', 'sage' ),
            'new_item'              => __( 'New Feedback', 'sage' ),
            'edit_item'             => __( 'Edit Feedback', 'sage' ),
            'update_item'           => __( 'Update Feedback', 'sage' ),
            'view_item'             => __( 'View Feedback', 'sage' ),
            'search_items'          => __( 'Search Feedback', 'sage' ),
            'not_found'             => __( 'Not found', 'sage' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'sage' ),
            'items_list'            => __( 'Feedback list', 'sage' ),
            'items_list_navigation' => __( 'Feedback list navigation', 'sage' ),
            'filter_items_list'     => __( 'Filter Feedback list', 'sage' ),
        );
        $rewrite = array(
            'slug'                  => 'feedback',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );
        $post_types['feedback'] = array(
            'label'                 => __( 'Feedback', 'sage' ),
            'description'           => __( 'List of feedback / comments given by client regarding services', 'sage' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'excerpt', ),
            'taxonomies'            => array( 'category', 'post_tag' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 25,
            'menu_icon'             => 'dashicons-nametag',
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
    add_filter('piklist_post_types', 'feedback_post_type');
}
/* Flush rewrite rules for custom post types. */
add_action( 'after_switch_theme', 'flush_rewrite_rules' );
?>
