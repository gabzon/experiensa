<?php
/*
Title: Partner information
Post Type: partner
*/

piklist('field', array(
    'type'      => 'url',
    'label'     => __('Website','sage'),
    'field'     => 'partner_website',
    'columns'   => 12
));

piklist('field', array(
    'type'      => 'email',
    'label'     => __('Email','sage'),
    'field'     => 'partner_email',
    'columns'   => 12
));

piklist('field', array(
    'type'      => 'checkbox',
    'label'     => __('Include partner API in you catalogue','sage'),
    'field'     => 'partner_api',
    'value'     => 'FALSE',
    'choices'   => array(
        'TRUE'  => __('Yes','sage')
    )
));

piklist('field', array(
    'type'      => 'checkbox',
    'label'     => __('Send them request forms','sage'),
    'field'     => 'partner_request_form',
    'value'     => 'FALSE',
    'choices'   => array(
        'TRUE'  => __('Yes','sage')
    )
));
