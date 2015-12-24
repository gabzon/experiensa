<?php

/*
Title: Landing Page Settings
Setting: experiensa_design_settings
Tab: Landing Page
Tab Order: 20
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

// TODO: Order of apperance Slider, destinations (countries), popular cities, etc, promotions
// TODO: Colors for different sections
// TODO: Appears or not

?>
