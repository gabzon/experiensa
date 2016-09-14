<?php
//
//if ( ! function_exists('team_post_type') ) {
//
//    function team_post_type($post_types){
//        $labels = array(
//            'name'                  => _x( 'Team', 'Post Type General Name', 'sage'),
//            'singular_name'         => _x( 'Team Member', 'Post Type Singular Name', 'sage'),
//            'menu_name'             => __( 'Team', 'sage'),
//            'name_admin_bar'        => __( 'Team', 'sage' ),
//            'parent_item_colon'     => __( 'Parent Team:', 'sage'),
//            'all_items'             => __( 'All Team Members', 'sage'),
//            'add_new_item'          => __( 'Add New Team Member', 'sage'),
//            'add_new'               => __( 'Add New', 'sage'),
//            'new_item'              => __( 'New Member', 'sage' ),
//            'edit_item'             => __( 'Edit Member', 'sage'),
//            'update_item'           => __( 'Update Member', 'sage'),
//            'view_item'             => __( 'View Member', 'sage'),
//            'search_items'          => __( 'Search Member', 'sage'),
//            'not_found'             => __( 'Not found', 'sage'),
//            'not_found_in_trash'    => __( 'Not found in Trash', 'sage'),
//            'items_list'            => __( 'Team Member list', 'sage' ),
//            'items_list_navigation' => __( 'Team Member list navigation', 'sage' ),
//            'filter_items_list'     => __( 'Filter Team Member list', 'sage' ),
//        );
//        $rewrite = array(
//            'slug'                  => 'team',
//            'with_front'            => true,
//            'pages'                 => true,
//            'feeds'                 => true,
//        );
//
//        $post_types['team'] = array(
//            'label'                 => __( 'Team', 'sage' ),
//            'description'           => __( 'List of Team Members', 'sage' ),
//            'labels'                => $labels,
//            'supports'              => array('title', 'thumbnail', 'editor','excerpt'),
//            'taxonomies'            => array( 'category', 'post_tag', 'country'),
//            'hierarchical'          => false,
//            'public'                => true,
//            'show_ui'               => true,
//            'show_in_menu'          => true,
//            'menu_position'         => 7,
//            'menu_icon'             => 'dashicons-groups',
//            'show_in_admin_bar'     => true,
//            'show_in_nav_menus'     => true,
//            'show_in_rest'          => true,
//            'can_export'            => true,
//            'has_archive'           => true,
//            'exclude_from_search'   => false,
//            'publicly_queryable'    => true,
//            'rewrite'               => $rewrite,
//            'capability_type'       => 'post',
//        );
//        return $post_types;
//    }
//    add_filter('piklist_post_types', 'team_post_type');
//}
//
///* Flush rewrite rules for custom post types. */
//add_action( 'after_switch_theme', 'flush_rewrite_rules' );

?>
