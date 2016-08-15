<?php

if ( ! function_exists( 'product_type_taxonomy' ) ) {

    // Register Custom Taxonomy
    function product_type_taxonomy() {

        $labels = array(
            'name'                       => _x( 'Product Types', 'Taxonomy General Name', 'sage' ),
            'singular_name'              => _x( 'Product Type', 'Taxonomy Singular Name', 'sage' ),
            'menu_name'                  => __( 'Product Types', 'sage' ),
            'all_items'                  => __( 'All Product Types', 'sage' ),
            'parent_item'                => __( 'Parent Product Type', 'sage' ),
            'parent_item_colon'          => __( 'Parent Product Type:', 'sage' ),
            'new_item_name'              => __( 'New Product Type Name', 'sage' ),
            'add_new_item'               => __( 'Add New Product Type', 'sage' ),
            'edit_item'                  => __( 'Edit Product Type', 'sage' ),
            'update_item'                => __( 'Update Product Type', 'sage' ),
            'view_item'                  => __( 'View Product Type', 'sage' ),
            'separate_items_with_commas' => __( 'Separate product types with commas', 'sage' ),
            'add_or_remove_items'        => __( 'Add or remove product types', 'sage' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'sage' ),
            'popular_items'              => __( 'Popular product types', 'sage' ),
            'search_items'               => __( 'Search Product Types', 'sage' ),
            'not_found'                  => __( 'Not Found', 'sage' ),
            'items_list'                 => __( 'Product Types list', 'sage' ),
            'items_list_navigation'      => __( 'Product Types list navigation', 'sage' ),
        );
        $rewrite = array(
            'slug'                       => 'product-type',
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
        register_taxonomy( 'product_type', array( 'post', ' product', ' trip' ), $args );

    }
    add_action( 'init', 'product_type_taxonomy', 0 );
}

?>
