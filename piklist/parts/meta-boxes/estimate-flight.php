<?php
/*
Title: Estimate Flights
Post Type: estimate
order: 2
*/

/*******************************************************************************
** Flight Section
*******************************************************************************/
?>
<h3 class="demo-highlight">
  <?php _e('Each flight is part of a trip.','sage');?>
</h3>
<?php
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
    'options'   => array( 'dateFormat' => 'dd/mm/yy' ),
);

$flight_departure_time= array(
    'type'      => 'time',
    'field'     => 'estimate_flight_departure_time',
    'columns'   => 3,
    'label'     => __('Departure time','sage')
);

$flight_arrival_date = array(
    'type'      => 'datepicker',
    'field'     => 'estimate_flight_arrival_date',
    'columns'   => 3,
    'label'     => __('Arrival date','sage'),
    'options'   => array('dateFormat' => 'dd/mm/yy'),
);

$flight_arrival_time = array(
    'type'      => 'time',
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

piklist('field', array(
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
));
