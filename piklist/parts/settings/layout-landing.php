<?php

/*
Title: Landing Page Settings
Setting: layout_settings
Tab: Landing
*/

piklist('field', array(
    'type'      => 'select',
    'field'     => 'setting_landing_slider',
    'label'     => __('Display Promotional Slider','sage'),
    'columns'   => 2,
    'choices'   => array(
        'TRUE'      => __('Yes','sage'),
        'FALSE'     => __('No','sage')
    ),
));




?>
