<?php
/*
Title: Voyage Itinerary
Post Type: voyage
Meta box: true
Order: 4
*/

/*******************************************************************************
** Itenirary Section
*******************************************************************************/
$voyage_itinerary_day = array(
    'type'      => 'text',
    'field'     => 'itinerary_day',
    'label'     => __('Day','sage'),
    'columns'   => 2
);

$voyage_itinerary_title = array(
    'type'      => 'text',
    'field'     => 'itinerary_title',
    'label'     => __('Title','sage'),
    'columns'   => 4
);

$voyage_itinerary_subtitle = array(
    'type'      => 'text',
    'field'     => 'itinerary_subtitle',
    'label'     => __('Sub title','sage'),
    'columns'   => 6
);

$voyage_itinerary_description = array(
    'type'      => 'textarea',
    'field'     => 'itinerary_description',
    'label'     => __('Description','sage'),
    'columns'   => 12
);

$voyage_itinerary_gallery = array(
    'type'      => 'file',
    'field'     => 'itinerary_gallery',
    'label'     => __('Gallery','sage'),
);

piklist('field', array(
    'type'      => 'group',
    'template'  => 'field',
    'add_more'  => true,
    'fields'    => array(
        $voyage_itinerary_day,
        $voyage_itinerary_title,
        $voyage_itinerary_subtitle,
        $voyage_itinerary_description,
        $voyage_itinerary_gallery
    )
));
