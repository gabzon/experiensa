<?php
/*
Title: Voyage
Post Type: voyage
Meta box: true
*/

$price = array(
    'type'  => 'number',
    'field' => 'price',
    'label' => __('Price','sage'),
    'attributes'    => array( 'step' => 'any' ),
    'columns'   => 4
);

$expiry_date = array(
    'type'      => 'datepicker',
    'field'     => 'expiry_date',
    'label'     => __('Expiry date','sage'),
    'options'   => array( 'dateFormat' => 'dd/mm/yy'),
    'columns'   => 4
);

$from = array(
    'type'      => 'checkbox',
    'field'     => 'display_from',
    'label'     => __('Display from','sage'),
    'choices'   => array( 'TRUE'  => 'Yes' ),
    'columns'   => 4
);

$slogan = array(
    'type'      => 'text',
    'field'     => 'slogan',
    'columns'   => 12,
    'label'     => __('Voyage slogan','sage')
);

piklist('field', array(
    'type'      => 'group',
    'label'     => __('General info','sage'),
    'fields'    => array(
        $price,
        $expiry_date,
        $from,
        $slogan
    )
));

piklist('field', array(
    'type' => 'group',
    'scope' => 'post_meta',
    'label' => __('Number of Days'),
    'fields' => array(
        array(
            'type'          => 'text',
            'field'         => 'days',
            'columns'       => 2,
            'attributes'    => array( 'placeholder' => __('Days','sage')),
            'validate'      => array( array( 'type' => 'number' ))
        ),
        array(
            'type'          => 'text',
            'field'         => 'nights',
            'columns'       => 2,
            'attributes' => array( 'placeholder' => __('Nights')),
            'validate' => array( array( 'type' => 'number' ) )
        ),
    ),
));

piklist('field', array(
    'type'          => 'checkbox',
    'field'         => 'conditions',
    'label'         => __('Conditions','sage'),
    'choices'       => array(
        'refundable'    => __('Refundable','sage'),
        'flexible'      => __('Flexible','sage')
    ),
));

piklist('field', array(
    'type'      => 'group',
    'label'     => __('Resell to other agencies?','sage'),
    'fields'    => array(
        array(
            'type'      => 'checkbox',
            'field'     => 'resell',
            'label'     => __('Resell','sage'),
            'columns'   => 6,
            'choices'   => array( 'TRUE'  => 'Yes' )
        ),
        array(
            'type'          => 'number',
            'field'         => 'tour_operator_margin',
            'columns'       => 6,
            'label'         => __('Margin (%)','sage'),
            'attributes'    => array( 'step' => 'any' ),
            'conditions'    => array(
                array(
                    'field' => 'resell',
                    'value' => 'TRUE'
                ),
            ),
        ),
    ),
));

piklist('field', array(
    'type'  => 'editor',
    'field' => 'information_conditions',
    'label' => __('Additional information & Conditions','sage')
));

piklist('field', array(
    'type'          => 'file',
    'field'         => 'gallery',
    'description'   => __('Photos should be 1920x1080 pixels','sage'),
    'label'         => __('Photo Gallery','sage')
));
