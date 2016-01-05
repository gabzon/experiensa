<?php
/*
 Title: Agency defaults
 Setting: agency_settings
 Tab: Defaults
 Tab Order: 10
 */

piklist('field',array(
    'type'      => 'select',
    'field'     => 'agency_currency',
    'label'     => __('Currency','sage'),
    'columns'   => 3,
    'value'     => 'CHF',
    'choices'   => array(
        'CHF'   =>  'CHF',
        'USD'   =>  'USD',
        'EUR'   =>  'EUR',
    ),
));
