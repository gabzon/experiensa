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
    'columns'       => 12
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

$people = array(
    'type'  => 'text',
    'field' => 'estimate_people',
    'label' => __('Number of people','sage'),
    'columns' => 4,
);

$number_days = array(
    'type'          => 'text',
    'field'         => 'estimate_days',
    'label'         => __('Days','sage'),
    'columns'       => 2,
    'attributes'    => array( 'placeholder' => __('Days','sage')),
    'validate'      => [ ['type' => 'number'] ]
);

$number_nights = array(
    'type'          => 'text',
    'field'         => 'estimate_nights',
    'label'         => __('Nights','sage'),
    'columns'       => 2,
    'attributes'    => ['placeholder' => __('Nights')],
    'validate'      => array( array( 'type' => 'number' ) )
);

piklist('field', array(
    'type'      => 'group',
    'template'  => 'field',
    'label'     => __('Options','sage'),
    'field'     => 'estimate_general_group',
    'add_more'  => true,
    'fields'    => array(
        $title,
        $price,
        $currency,
        $expiry_date,
        $slogan,
        $conditions,
        $photos,
        $people,
        $number_days,
        $number_nights
    )
));
