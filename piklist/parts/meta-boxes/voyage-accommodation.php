<?php
/*
Title: Voyage Accommodation
Post Type: voyage
Tab: Accommodation
Flow: Voyage Workflow
*/

/*******************************************************************************
** Accommodation Section
*******************************************************************************/

$voyage_host_name = array(
    'type'      => 'text',
    'field'     => 'voyage_establishment_name',
    'label'     => __('Establishment name','sage'),
    'columns'   => 6
);

$voyage_host_type = array(
    'type'      => 'select',
    'field'     => 'voyage_establishment_type',
    'label'     => __('Establishment type','sage'),
    'columns'   => 4,
    'choices'   => array(
        'hotel'     => __('Hotel','sage'),
        'b&b'       => __('Bed & Breakfast','sage'),
        'residence' => __('Residence','sage'),
        'airbnb'    => __('Airbnb','sage'),
        'private'   => __('Private apartment','sage'),
        'hostel'    => __('Hostel','sage'),
    )
);

$voyage_host_rating = array(
    'type'      => 'select',
    'field'     => 'voyage_establishment_rating',
    'label'     => __('Rating','sage'),
    'columns'   => 2,
    'choices'   => array(
        '5' => __('5 Stars','sage'),
        '4' => __('4 Stars','sage'),
        '3' => __('3 Stars','sage'),
        '2' => __('2 Stars','sage'),
        '1' => __('1 Star','sage')
    )
);

$voyage_host_checkin_date = array(
    'type'      => 'datepicker',
    'field'     => 'voyage_establishment_checkin_date',
    'label'     => __('Check-in date','sage'),
    'columns'   => 3,
    'options'   => array('dateFormat' => 'd/m/yy'),
);

$voyage_host_checkin_time = array(
    'type'      => 'time',
    'field'     => 'voyage_establishment_checkin_time',
    'label'     => __('Check-in time','sage'),
    'columns'   => 3
);

$voyage_host_checkout_date = array(
    'type'      => 'datepicker',
    'field'     => 'voyage_establishment_checkout_date',
    'label'     => __('Check-out date','sage'),
    'columns'   => 3,
    'options'   => array('dateFormat' => 'd/m/yy'),
);

$voyage_host_checkout_time = array(
    'type'      => 'time',
    'field'     => 'voyage_establishment_checkout_time',
    'label'     => __('Check-out time','sage'),
    'columns'   => 3
);

$voyage_host_comments = array(
    'type'      => 'textarea',
    'field'     => 'voyage_establishment_comments',
    'label'     => __('Comments & Description','sage'),
    'columns'   => 12
);

$voyage_host_gallery = array(
    'type'      => 'file',
    'field'     => 'voyage_establishment_gallery',
    'label'     => __('Photo Gallery','sage'),
);

piklist('field', array(
    'type'      => 'group',
    'template'  => 'field',
    'add_more'  => true,
    'fields'    => array(
        $voyage_host_name,
        $voyage_host_type,
        $voyage_host_rating,
        $voyage_host_checkin_date,
        $voyage_host_checkin_time,
        $voyage_host_checkout_date,
        $voyage_host_checkout_time,
        $voyage_host_comments,
        $voyage_host_gallery
    )
));
