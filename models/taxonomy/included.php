<?php

if ( ! function_exists( 'included_taxonomy' ) ) {

    // Register Custom Taxonomy
    function included_taxonomy() {

        $labels = array(
            'name'                       => _x( 'Included', 'Taxonomy General Name', 'sage' ),
            'singular_name'              => _x( 'Included', 'Taxonomy Singular Name', 'sage' ),
            'menu_name'                  => __( 'Included', 'sage' ),
            'all_items'                  => __( 'All Included', 'sage' ),
            'parent_item'                => __( 'Parent Included', 'sage' ),
            'parent_item_colon'          => __( 'Parent Included:', 'sage' ),
            'new_item_name'              => __( 'New Included Name', 'sage' ),
            'add_new_item'               => __( 'Add New Included', 'sage' ),
            'edit_item'                  => __( 'Edit Included', 'sage' ),
            'update_item'                => __( 'Update Included', 'sage' ),
            'view_item'                  => __( 'View Included', 'sage' ),
            'separate_items_with_commas' => __( 'Separate Included with commas', 'sage' ),
            'add_or_remove_items'        => __( 'Add or remove Included', 'sage' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'sage' ),
            'popular_items'              => __( 'Popular Included', 'sage' ),
            'search_items'               => __( 'Search Included', 'sage' ),
            'not_found'                  => __( 'Not Found', 'sage' ),
            'items_list'                 => __( 'Included list', 'sage' ),
            'items_list_navigation'      => __( 'Included list navigation', 'sage' ),
        );
        $rewrite = array(
            'slug'                       => 'included',
            'with_front'                 => true,
            'hierarchical'               => false,
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'rewrite'                    => $rewrite,
        );
        register_taxonomy( 'included', array( 'post', ' product', ' trip' ), $args );

    }
    add_action( 'init', 'included_taxonomy', 0 );

}

?>
