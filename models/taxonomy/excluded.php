<?php
if ( ! function_exists( 'excluded_taxonomy' ) ) {

// Register Custom Taxonomy
function excluded_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Excluded', 'Taxonomy General Name', 'sage' ),
		'singular_name'              => _x( 'Excluded', 'Taxonomy Singular Name', 'sage' ),
		'menu_name'                  => __( 'Excluded', 'sage' ),
		'all_items'                  => __( 'All Excluded', 'sage' ),
		'parent_item'                => __( 'Parent Excluded', 'sage' ),
		'parent_item_colon'          => __( 'Parent Excluded:', 'sage' ),
		'new_item_name'              => __( 'New Excluded Name', 'sage' ),
		'add_new_item'               => __( 'Add New Excluded', 'sage' ),
		'edit_item'                  => __( 'Edit Excluded', 'sage' ),
		'update_item'                => __( 'Update Excluded', 'sage' ),
		'view_item'                  => __( 'View Excluded', 'sage' ),
		'separate_items_with_commas' => __( 'Separate Excluded with commas', 'sage' ),
		'add_or_remove_items'        => __( 'Add or remove Excluded', 'sage' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'sage' ),
		'popular_items'              => __( 'Popular Excluded', 'sage' ),
		'search_items'               => __( 'Search Excluded', 'sage' ),
		'not_found'                  => __( 'Not Found', 'sage' ),
		'items_list'                 => __( 'Excluded list', 'sage' ),
		'items_list_navigation'      => __( 'Excluded list navigation', 'sage' ),
	);
	$rewrite = array(
		'slug'                       => 'excluded',
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
	register_taxonomy( 'excluded', array( 'post', ' product', ' trip' ), $args );

}
add_action( 'init', 'excluded_taxonomy', 0 );

}

?>
