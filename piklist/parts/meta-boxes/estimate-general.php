<?php
/*
Title: Voyage
Post Type: estimate
Meta box: true
order:1
*/

$title = array(
    'type'          => 'text',
    'field'         => 'estimate_title',
    'label'         => __('Title','sage'),
    'columns'       => 9
);

$people = array(
    'type'  => 'text',
    'field' => 'estimate_people',
    'label' => __('Number of people','sage'),
    'validate'      => [ ['type' => 'number'] ],
    'columns' => 1,
);

$number_days = array(
    'type'          => 'text',
    'field'         => 'estimate_days',
    'label'         => __('Days','sage'),
    'columns'       => 1,
    'attributes'    => array( 'placeholder' => __('Days','sage')),
    'validate'      => [ ['type' => 'number'] ]
);

$number_nights = array(
    'type'          => 'text',
    'field'         => 'estimate_nights',
    'label'         => __('Nights','sage'),
    'columns'       => 1,
    'attributes'    => ['placeholder' => __('Nights')],
    'validate'      => array( array( 'type' => 'number' ) )
);

$price = array(
    'type'          => 'number',
    'field'         => 'estimate_price',
    'label'         => __('Price','sage'),
    'attributes'    => array( 'step' => 'any' ),
    'columns'       => 4
);

$currency = array(
    'type'      => 'select',
    'field'     => 'estimate_currency',
    'label'     => __('Currency','sage'),
    'choices'   => array(
        'CHF'   =>  'CHF',
        'USD'   =>  'USD',
        'EUR'   =>  'EUR',
    ),
    'columns'   => 4
);

$expiry_date = array(
    'type'      => 'datepicker',
    'field'     => 'estimate_expiry_date',
    'label'     => __('Expiry date','sage'),
    'columns'   => 4
);

$slogan = array(
    'type'      => 'text',
    'field'     => 'estimate_slogan',
    'columns'   => 12,
    'label'     => __('Voyage slogan','sage')
);

$conditions = array(
    'type'      => 'textarea',
    'field'     => 'estimate_information_conditions',
    'label'     => __('Additional information & Conditions','sage'),
    'columns'   => 12
);

$photos = array(
    'type'  => 'file',
    'field' => 'estimate_gallery',
    'label' => __('Photo Gallery','sage')
);

/*******************************************************************************
** Flight Section
*******************************************************************************/

$flight_airline = array(
    'type'  => 'text',
    'field' => 'estimate_flight_airline',
    'columns'   => 4,
    'label' => __('Airline','sage')
);

$flight_number = array(
    'type'  => 'text',
    'field' => 'estimate_flight_number',
    'columns'   => 4,
    'label' => __('Flight number','sage')
);

$flight_class = array(
    'type'      => 'select',
    'field'     => 'estimate_flight_class',
    'label'     => __('Flight Class','sage'),
    'columns'   => 4,
    'value'     => 'economy',
    'choices'   => array(
        'economy'   => __('Economy','sage'),
        'business'  => __('Business','sage'),
        'first'     => __('First','sage'),
    ),
);

$flight_departure_city = array(
    'type'      => 'text',
    'field'     => 'estimate_flight_departure_city',
    'columns'   => 6,
    'label'     => __('Departure city','sage')
);

$flight_arrival_city = array(
    'type'      => 'text',
    'field'     => 'estimate_flight_arrival_city',
    'columns'   => 6,
    'label'     => __('Arrival city','sage')
);

$flight_departure_date = array(
    'type'      => 'datepicker',
    'field'     => 'estimate_flight_departure_date',
    'columns'   => 3,
    'label'     => __('Departure date','sage'),
    'options'   => array( 'dateFormat' => 'd/m/yy' ),
);

$flight_departure_time= array(
    'type'  => 'text',
    'field' => 'estimate_flight_departure_time',
    'columns'   => 3,
    'label' => __('Departure time','sage')
);

$flight_arrival_date = array(
    'type'      => 'datepicker',
    'field'     => 'estimate_flight_arrival_date',
    'columns'   => 3,
    'label'     => __('Arrival date','sage'),
    'options'   => array('dateFormat' => 'd/m/yy'),
);

$flight_arrival_time = array(
    'type'      => 'text',
    'field'     => 'estimate_flight_arrival_time',
    'columns'   => 3,
    'label'     => __('Arrival time','sage')
);

$comments = [
    'type'          => 'text',
    'field'         => 'estimate_flight_comments',
    'label'         => __('Comments','sage'),
    'attributes'    => ['placeholder' => __('Comments','sage')],
    'columns'       => 12
];

$flight = array(
    'type'      => 'group',
    'template'  => 'field',
    'label'     => __('Flight Options','sage'),
    'field'     => 'estimate_flight_group',
    'add_more'  => true,
    'fields'    => array(
        $flight_airline,
        $flight_number,
        $flight_class,
        $flight_departure_city,
        $flight_arrival_city,
        $flight_departure_date,
        $flight_departure_time,
        $flight_arrival_date,
        $flight_arrival_time,
        $comments
    )
);

/*******************************************************************************
** Accommodation Section
*******************************************************************************/

$estimate_host_name = [
    'type'      => 'text',
    'field'     => 'estimate_establishment_name',
    'label'     => __('Establishment name','sage'),
    'columns'   => 6
];

$estimate_host_type = [
    'type'      => 'select',
    'field'     => 'estimate_establishment_type',
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
];

$estimate_host_rating = array(
    'type'      => 'select',
    'field'     => 'estimate_establishment_rating',
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
    'field'     => 'estimate_establishment_checkin_date',
    'label'     => __('Check-in date','sage'),
    'columns'   => 3,
    'options'   => array('dateFormat' => 'd/m/yy'),
);

$estimate_host_checkin_time = array(
    'type'      => 'text',
    'field'     => 'estimate_establishment_checkin_time',
    'label'     => __('Check-in time','sage'),
    'columns'   => 3
);

$estimate_host_checkout_date = array(
    'type'      => 'datepicker',
    'field'     => 'estimate_establishment_checkout_date',
    'label'     => __('Check-out date','sage'),
    'columns'   => 3,
    'options'   => array('dateFormat' => 'd/m/yy'),
);

$estimate_host_checkout_time = array(
    'type'      => 'text',
    'field'     => 'estimate_establishment_checkout_time',
    'label'     => __('Check-out time','sage'),
    'columns'   => 3
);

$estimate_host_comments = array(
    'type'      => 'textarea',
    'field'     => 'estimate_establishment_comments',
    'label'     => __('Comments & Description','sage'),
    'columns'   => 12
);

$estimate_host_gallery = [
    'type'      => 'file',
    'field'     => 'estimate_establishment_gallery',
    'label'     => __('Photo Gallery','sage'),
];

$comments = [
    'type'      => 'text',
    'field'     => 'estimate_accommodation_comments',
    'label'     => __('Comments','sage'),
    'columns'   => 12
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
        $estimate_host_gallery,
        $comments,
    )
);

piklist('field', array(
    'type'      => 'group',
    'template'  => 'field',
    'label'     => __('Options','sage'),
    'add_more'  => true,
    'fields'    => array(
        $title,
        $people,
        $number_days,
        $number_nights,
        $price,
        $currency,
        $expiry_date,
        $slogan,
        $conditions,
        $photos,
        $flight,
        $accommodation_group
    )
));
