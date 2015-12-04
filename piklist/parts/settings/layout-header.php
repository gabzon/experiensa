<?php

/*
Title: Header Settings
Setting: layout_settings
Tab: Header
*/

piklist('field', array(
    'type'      => 'select',
    'field'     => 'setting_header_phone',
    'label'     => __('Display Phone number','sage'),
    'value'     => 'yes',
    'columns'   => 2,
    'choices'   => array(
        'yes'   => __('Yes','sage'),
        'no'    => __('No','sage')
    ),
));

piklist('field', array(
    'type'      => 'select',
    'field'     => 'setting_header_request',
    'label'     => __('Display Resquest button','sage'),
    'value'     => 'yes',
    'columns'   => 2,
    'choices'   => array(
        'yes'   => __('Yes','sage'),
        'no'    => __('No','sage')
    ),
));

piklist('field', array(
    'type'      => 'select',
    'field'     => 'setting_header_language',
    'label'     => __('Display multilanguage','sage'),
    'value'     => 'yes',
    'columns'   => 2,
    'choices'   => array(
        'yes'   => __('Yes','sage'),
        'no'    => __('No','sage')
    ),
));


?>
