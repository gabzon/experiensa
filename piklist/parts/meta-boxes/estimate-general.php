<?php
/*
Title: Estimate Voyages
Post Type: estimate
Meta box: true
order:1
*/

/**
 * Estimate Voyage General Information
 */
$title = array(
    'type'          => 'text',
    'field'         => 'estimate_title',
    'label'         => __('Title','sage'),
    'columns'       => 8
);

$people = array(
    'type'  => 'text',
    'field' => 'estimate_people',
    'label' => __('Number of people','sage'),
    'validate'      => [ ['type' => 'number'] ],
    'columns' => 2,
);

$number_days = array(
    'type'          => 'number',
    'field'         => 'estimate_days',
    'label'         => __('Days','sage'),
    'columns'       => 1,
    'validate'      => [ ['type' => 'number'] ]
);

$number_nights = array(
    'type'          => 'number',
    'field'         => 'estimate_nights',
    'label'         => __('Nights','sage'),
    'columns'       => 1,
    'validate'      => array( array( 'type' => 'number' ) )
);

$price = array(
    'type'          => 'number',
    'field'         => 'estimate_price',
    'label'         => __('Price','sage'),
    'attributes'    => array( 'step' => 'any' ),
    'columns'       => 3
);

$currency = array(
    'type'      => 'select',
    'field'     => 'estimate_currency',
    'label'     => __('Currency','sage'),
    'value'     => Common::get_settled_currency(),
    'choices'   => Common::currency_name_description_list(),
    'columns'   => 5
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
 ** Voyage Flight Section
 *******************************************************************************/

$flight_airline = array(
    'type'  => 'text',
    'field' => 'flight_airline',
    'columns'   => 4,
    'label' => __('Airline','sage')
);

$flight_number = array(
    'type'  => 'text',
    'field' => 'flight_number',
    'columns'   => 4,
    'label' => __('Flight number','sage')
);

$flight_class = array(
    'type'      => 'select',
    'field'     => 'flight_class',
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
    'field'     => 'flight_departure_city',
    'columns'   => 6,
    'label'     => __('Departure city','sage')
);

$flight_arrival_city = array(
    'type'      => 'text',
    'field'     => 'flight_arrival_city',
    'columns'   => 6,
    'label'     => __('Arrival city','sage')
);

$flight_departure_date = array(
    'type'      => 'datepicker',
    'field'     => 'flight_departure_date',
    'columns'   => 3,
    'label'     => __('Departure date','sage'),
    'options'   => array( 'dateFormat' => 'dd/mm/yy' ),
);

$flight_departure_time= array(
    'type'      => 'time',
    'field'     => 'flight_departure_time',
    'columns'   => 3,
    'label'     => __('Departure time','sage')
);

$flight_arrival_date = array(
    'type'      => 'datepicker',
    'field'     => 'flight_arrival_date',
    'columns'   => 3,
    'label'     => __('Arrival date','sage'),
    'options'   => array('dateFormat' => 'dd/mm/yy'),
);

$flight_arrival_time = array(
    'type'      => 'time',
    'field'     => 'flight_arrival_time',
    'columns'   => 3,
    'label'     => __('Arrival time','sage')
);

$flight_comments = [
    'type'          => 'text',
    'field'         => 'flight_comments',
    'label'         => __('Comments','sage'),
    'attributes'    => ['placeholder' => __('Comments','sage')],
    'columns'       => 12
];

$flights = array(
    'type' => 'group',
    'field' => 'flights_group',
    'label' => __('Flights','sage'),
    'add_more' => true,
    'fields' => array(
        $flight_airline,
        $flight_number,
        $flight_class,
        $flight_departure_city,
        $flight_arrival_city,
        $flight_departure_date,
        $flight_departure_time,
        $flight_arrival_date,
        $flight_arrival_time,
        $flight_comments
    )
);
/*******************************************************************************
 ** Voyage Accommodation Section
 *******************************************************************************/
$host_name = [
    'type'      => 'text',
    'field'     => 'establishment_name',
    'label'     => __('Establishment name','sage'),
    'columns'   => 6
];

$host_type = [
    'type'      => 'select',
    'field'     => 'establishment_type',
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

$host_rating = array(
    'type'      => 'select',
    'field'     => 'establishment_rating',
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

$host_checkin_date = array(
    'type'      => 'datepicker',
    'field'     => 'establishment_checkin_date',
    'label'     => __('Check-in date','sage'),
    'columns'   => 3,
    'options'   => array('dateFormat' => 'd/m/yy'),
);

$host_checkin_time = array(
    'type'      => 'time',
    'field'     => 'establishment_checkin_time',
    'label'     => __('Check-in time','sage'),
    'columns'   => 3
);

$host_checkout_date = array(
    'type'      => 'datepicker',
    'field'     => 'establishment_checkout_date',
    'label'     => __('Check-out date','sage'),
    'columns'   => 3,
    'options'   => array('dateFormat' => 'd/m/yy'),
);

$host_checkout_time = array(
    'type'      => 'time',
    'field'     => 'establishment_checkout_time',
    'label'     => __('Check-out time','sage'),
    'columns'   => 3
);
$host_gallery = [
    'type'      => 'file',
    'field'     => 'establishment_gallery',
    'label'     => __('Photo Gallery','sage'),
];

$host_comments = array(
    'type'      => 'textarea',
    'field'     => 'establishment_comments',
    'label'     => __('Comments & Description','sage'),
    'columns'   => 12
);


$accomodations = array(
    'type' => 'group',
    'field' => 'accomodations_group',
    'label' => __('Accomodations','sage'),
    'add_more' => true,
    'fields' => array(
        $host_name,
        $host_type,
        $host_rating,
        $host_checkin_date,
        $host_checkin_time,
        $host_checkout_date,
        $host_checkout_time,
        $host_gallery,
        $host_comments
    )
);
/**
 * Estimate Group
 */
piklist('field', array(
    'type'      => 'group',
    'field'     => 'estimate_voyages',
    'template'  => 'field',
    'label'     => __('Voyages','sage'),
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
        $flights,
        $accomodations
    )
));
