<?php

if ( ! function_exists('product_post_type') ) {

    function product_post_type($post_types){
        $labels = array(
            'name' => __('Products', 'sage'),
            'singular_name' => __('Product', 'sage'),
            'menu_name' => __('Products', 'sage'),
            'parent_item_colon' => __('Parent Item:', 'sage'),
            'all_items' => __('All Products', 'sage'),
            'view_item' => __('View Product', 'sage'),
            'add_new_item' => __('Add New Product', 'sage'),
            'add_new' => __('Add New', 'sage'),
            'edit_item' => __('Edit Product', 'sage'),
            'update_item' => __('Update Product', 'sage'),
            'search_items' => __('Search Product', 'sage'),
            'not_found' => __('Not found', 'sage'),
            'not_found_in_trash' => __('Not found in Trash', 'sage'),
        );
        $rewrite = array(
            'slug'                  => 'product',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );
        $post_types['product'] = array(
            'label'                 => __( 'Product', 'sage' ),
            'description'           => __( 'List of products (Travel oferts and packages)', 'sage' ),
            'labels'                => $labels,
            'supports'              => array('title', 'editor', 'thumbnail', 'comments', 'excerpt', 'revisions'),
            'taxonomies'            => array( 'category', 'post_tag', 'product_type', 'country', 'theme' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'show_in_nav_menus'     => true,
            'show_in_admin_bar'     => true,
            'menu_position'         => 7,
            'menu_icon'             => 'dashicons-products',
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'page',
            'status' => array(
                'draft'         => array( 'label' => __('Draft','sage')),
                'pending'       => array( 'label' => __('Pending','sage')),
                'publish'       => array( 'label' => __('Publish','sage')),
                'future'        => array( 'label' => __('Future','sage')),
                'deactivated'   => array( 'label' => __('Deactivated','sage'))
            ),
        );
        return $post_types;
    }
    add_filter('piklist_post_types', 'product_post_type');
}

/* Flush rewrite rules for custom post types. */
add_action( 'after_switch_theme', 'flush_rewrite_rules' );

?>
