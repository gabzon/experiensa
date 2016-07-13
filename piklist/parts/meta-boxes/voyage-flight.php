<?php
/*
Title: Voyage Flights
Post Type: voyage
Order: 2
*/

/*******************************************************************************
** Flight Section
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
    'options'   => array( 'dateFormat' => 'd/m/yy' ),
);

$flight_departure_time= array(
    'type'  => 'time',
    'field' => 'flight_departure_time',
    'columns'   => 3,
    'label' => __('Departure time','sage')
);

$flight_arrival_date = array(
    'type'      => 'datepicker',
    'field'     => 'flight_arrival_date',
    'columns'   => 3,
    'label'     => __('Arrival date','sage'),
    'options'   => array('dateFormat' => 'd/m/yy'),
);

$flight_arrival_time = array(
    'type'      => 'time',
    'field'     => 'flight_arrival_time',
    'columns'   => 3,
    'label'     => __('Arrival time','sage')
);

piklist('field', array(
    'type'      => 'group',
    'field'     => 'flight_options',
    'template'  => 'field',
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
        $flight_arrival_time
    )
));
