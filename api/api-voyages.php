<?php

add_action( 'rest_api_init', 'slug_register_voyage_price' );
function slug_register_voyage_price() {
    register_rest_field( 'voyage', 'voyage_price',
        array(
            'get_callback'    => 'slug_get_voyage_price',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

add_action( 'rest_api_init', 'slug_register_voyage_cover_image' );
function slug_register_voyage_cover_image() {
    register_rest_field( 'voyage', 'cover_image',
        array(
            'get_callback'    => 'slug_get_voyage_cover_image',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

add_action( 'rest_api_init', 'slug_register_voyage_currency' );
function slug_register_voyage_currency() {
    register_rest_field( 'voyage', 'voyage_currency',
        array(
            'get_callback'    => 'slug_get_voyage_currency',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

/**
 * Get the value of the "starship" field
 *
 * @param array $object Details of current post.
 * @param string $field_name Name of field.
 * @param WP_REST_Request $request Current request
 *
 * @return mixed
 */
function slug_get_voyage_price( $object, $field_name, $request ) {
    return get_post_meta( $object[ 'id' ], $field_name, true );
}

function slug_get_voyage_cover_image( $object, $field_name, $request ) {
    $cover_image = wp_get_attachment_image_src( get_post_thumbnail_id($object['id']), 'full' );
    return $cover_image[0];
}

function slug_get_voyage_currency( $object, $field_name, $request ) {
    $agency_options = get_option('agency_settings');
    return $agency_options['agency_currency'];
}
?>
