<?php
/*
Title: Product
Post Type: product
Meta box: true
Tab: Itinerary
Flow: Product Workflow
*/

/*******************************************************************************
** Itenirary Section
*******************************************************************************/
$product_itinerary_day = array(
    'type'      => 'text',
    'field'     => 'product_itinerary_day',
    'label'     => __('Day','sage'),
    'columns'   => 2
);

$product_itinerary_title = array(
    'type'      => 'text',
    'field'     => 'product_itinerary_title',
    'label'     => __('Title','sage'),
    'columns'   => 4
);

$product_itinerary_subtitle = array(
    'type'      => 'text',
    'field'     => 'product_itinerary_subtitle',
    'label'     => __('Sub title','sage'),
    'columns'   => 6
);

$product_itinerary_description = array(
    'type'      => 'textarea',
    'field'     => 'product_itinerary_description',
    'label'     => __('Description','sage'),
    'columns'   => 12
);

$product_itinerary_gallery = array(
    'type'      => 'file',
    'field'     => 'product_itinerary_gallery',
    'label'     => __('Gallery','sage'),
);

piklist('field', array(
    'type'      => 'group',
    'template'  => 'field',
    'add_more'  => true,
    'fields'    => array(
        $product_itinerary_day,
        $product_itinerary_title,
        $product_itinerary_subtitle,
        $product_itinerary_description,
        $product_itinerary_gallery
    )
));
