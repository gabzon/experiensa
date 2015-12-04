<?php

if ( ! function_exists( 'theme_taxonomy' ) ) {

    // Register Custom Taxonomy
    function theme_taxonomy() {

        $labels = array(
            'name'                       => _x( 'Themes', 'Taxonomy General Name', 'sage' ),
            'singular_name'              => _x( 'Theme', 'Taxonomy Singular Name', 'sage' ),
            'menu_name'                  => __( 'Themes', 'sage' ),
            'all_items'                  => __( 'All Themes', 'sage' ),
            'parent_item'                => __( 'Parent Theme', 'sage' ),
            'parent_item_colon'          => __( 'Parent Theme:', 'sage' ),
            'new_item_name'              => __( 'New Theme Name', 'sage' ),
            'add_new_item'               => __( 'Add New Theme', 'sage' ),
            'edit_item'                  => __( 'Edit Theme', 'sage' ),
            'update_item'                => __( 'Update Theme', 'sage' ),
            'view_item'                  => __( 'View Theme', 'sage' ),
            'separate_items_with_commas' => __( 'Separate Themes with commas', 'sage' ),
            'add_or_remove_items'        => __( 'Add or remove Themes', 'sage' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'sage' ),
            'popular_items'              => __( 'Popular Themes', 'sage' ),
            'search_items'               => __( 'Search Themes', 'sage' ),
            'not_found'                  => __( 'Not Found', 'sage' ),
            'items_list'                 => __( 'Themes list', 'sage' ),
            'items_list_navigation'      => __( 'Themes list navigation', 'sage' ),
        );
        $rewrite = array(
            'slug'                       => 'themes',
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
        register_taxonomy( 'theme', array( 'post', ' product', ' trip', ' service', ' partner', ' host' ), $args );

    }
    add_action( 'init', 'theme_taxonomy', 0 );

}

?>
