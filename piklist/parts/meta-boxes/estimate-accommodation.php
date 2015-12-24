<?php
/*
Title: Estimate Accommodation
Post Type: estimate
Tab: Accommodation
Flow: Estimate Workflow
*/

/*******************************************************************************
** Accommodation Section
*******************************************************************************/

$estimate_host_name = [
    'type'      => 'text',
    'field'     => 'estimate_etablishment_name',
    'label'     => __('Etablishment name','sage'),
    'columns'   => 6
];

$estimate_host_type = [
    'type'      => 'select',
    'field'     => 'estimate_etablishment_type',
    'label'     => __('Etablishment type','sage'),
    'columns'   => 4,
    'choices'   => array(
        'hotel'     => __('Hotel','sage'),
        'b&b'       => __('Bed & Breakfast','sage'),
        'residence' => __('Residence','sage'),
        'airbnb'    => __('Airbnb','sage'),
        'private'   => __('Private apartment','sage'),
        'hostel'    => __('Hostel','sage'),
    )
];

$estimate_host_rating = array(
    'type'      => 'select',
    'field'     => 'estimate_etablishment_rating',
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

$estimate_host_checkin_date = array(
    'type'      => 'datepicker',
    'field'     => 'estimate_etablishment_checkin_date',
    'label'     => __('Check-in date','sage'),
    'columns'   => 3,
    'options'   => array('dateFormat' => 'd/m/yy'),
);

$estimate_host_checkin_time = array(
    'type'      => 'text',
    'field'     => 'estimate_etablishment_checkin_time',
    'label'     => __('Check-in time','sage'),
    'columns'   => 3
);

$estimate_host_checkout_date = array(
    'type'      => 'datepicker',
    'field'     => 'estimate_etablishment_checkout_date',
    'label'     => __('Check-out date','sage'),
    'columns'   => 3,
    'options'   => array('dateFormat' => 'd/m/yy'),
);

$estimate_host_checkout_time = array(
    'type'      => 'text',
    'field'     => 'estimate_etablishment_checkout_time',
    'label'     => __('Check-out time','sage'),
    'columns'   => 3
);

$estimate_host_comments = array(
    'type'      => 'textarea',
    'field'     => 'estimate_etablishment_comments',
    'label'     => __('Comments & Description','sage'),
    'columns'   => 12
);

$estimate_host_gallery = [
    'type'      => 'file',
    'field'     => 'estimate_etablishment_gallery',
    'label'     => __('Photo Gallery','sage'),
];

$accommodation_group = array(
    'type'      => 'group',
    'template'  => 'field',
    'field'     => 'estimate_accommodation_group',
    'add_more'  => true,
    'fields'    => array(
        $estimate_host_name,
        $estimate_host_type,
        $estimate_host_rating,
        $estimate_host_checkin_date,
        $estimate_host_checkin_time,
        $estimate_host_checkout_date,
        $estimate_host_checkout_time,
        $estimate_host_comments,
        $estimate_host_gallery
    )
);

$comments = [
    'type'      => 'text',
    'field'     => 'estimate_accommodation_comments',
    'label'     => __('Comments','sage'),
    'columns'   => 12
];

piklist('field', array(
    'type'      => 'group',
    'template'  => 'field',
    'add_more'  => true,
    'fields'    => array(
        $accommodation_group,
        $comments
    )
));
