<?php

if ( ! function_exists( 'facility_type_taxonomy' ) ) {

    // Register Custom Taxonomy
    function facility_type_taxonomy() {

        $labels = array(
            'name'                       => _x( 'Facility Types', 'Taxonomy General Name', 'sage' ),
            'singular_name'              => _x( 'Facility Type', 'Taxonomy Singular Name', 'sage' ),
            'menu_name'                  => __( 'Facility Types', 'sage' ),
            'all_items'                  => __( 'All Facility Types', 'sage' ),
            'parent_item'                => __( 'Parent Facility Type', 'sage' ),
            'parent_item_colon'          => __( 'Parent Facility Type:', 'sage' ),
            'new_item_name'              => __( 'New Facility Type Name', 'sage' ),
            'add_new_item'               => __( 'Add New Facility Type', 'sage' ),
            'edit_item'                  => __( 'Edit Facility Type', 'sage' ),
            'update_item'                => __( 'Update Facility Type', 'sage' ),
            'view_item'                  => __( 'View Facility Type', 'sage' ),
            'separate_items_with_commas' => __( 'Separate facility types with commas', 'sage' ),
            'add_or_remove_items'        => __( 'Add or remove facility types', 'sage' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'sage' ),
            'popular_items'              => __( 'Popular facility types', 'sage' ),
            'search_items'               => __( 'Search Facility Types', 'sage' ),
            'not_found'                  => __( 'Not Found', 'sage' ),
            'items_list'                 => __( 'Facility Types list', 'sage' ),
            'items_list_navigation'      => __( 'Facility Types list navigation', 'sage' ),
        );
        $rewrite = array(
            'slug'                       => 'facility-type',
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
        register_taxonomy( 'facility_type', array( 'post', 'facility' ), $args );

    }
    add_action( 'init', 'facility_type_taxonomy', 0 );
}

?>
