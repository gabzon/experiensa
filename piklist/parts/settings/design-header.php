<?php

/*
Title: Header Settings
Setting: experiensa_design_settings
Tab: Header Design
Tab Order: 10
*/

/* ****************************************************************************/
/* Phone button ***************************************************************/
/* ****************************************************************************/

// TODO: Add small, "nothing", large menu options

$phone_display =  array(
    'type'      => 'select',
    'field'     => 'header_display_phone_number',
    'label'     => __('Display Phone number','sage'),
    'columns'   => 4,
    'choices'   => array(
        'TRUE'      => __('Yes','sage'),
        'FALSE'     => __('No','sage')
    ),
);

$phone_color =  array(
    'type'      => 'select',
    'field'     => 'header_phone_color_button',
    'label'     => __('Phone Button Color','sage'),
    'columns'   => 4,
    'value'     => '',
    'choices'   => array(
        ''              => __('Default (White)','sage'),
        'red'           => __('Red','sage'),
        'orange'        => __('Orange','sage'),
        'yellow'        => __('Yellow','sage'),
        'olive'         => __('Olive','sage'),
        'green'         => __('Green','sage'),
        'teal'          => __('Teal','sage'),
        'blue'          => __('Blue','sage'),
        'violet'        => __('Violet','sage'),
        'purple'        => __('Purple','sage'),
        'pink'          => __('Pink','sage'),
        'brown'         => __('Brown','sage'),
        'grey'          => __('Grey','sage'),
        'black'         => __('Black','sage'),
    ),
);

piklist('field', array(
    'type'      => 'group',
    'field'     => 'group_phone_options',
    'label'     => __('Phone Button','sage'),
    'fields'   => array(
        $phone_display,
        $phone_color
    ),
));

/* ****************************************************************************/
/* Request a quote button *****************************************************/
/* ****************************************************************************/


$quote_display = array(
    'type'      => 'select',
    'field'     => 'header_quote_display',
    'label'     => __('Display Resquest button','sage'),
    'columns'   => 4,
    'choices'   => array(
        'TRUE'   => __('Yes','sage'),
        'FALSE'    => __('No','sage')
    ),
);

$quote_color = array(
    'type'      => 'select',
    'field'     => 'header_quote_button_color',
    'label'     => __('Request Button Color','sage'),
    'columns'   => 4,
    'value'     => '',
    'choices'   => array(
        ''              => __('Default (White)','sage'),
        'red'           => __('Red','sage'),
        'orange'        => __('Orange','sage'),
        'yellow'        => __('Yellow','sage'),
        'olive'         => __('Olive','sage'),
        'green'         => __('Green','sage'),
        'teal'          => __('Teal','sage'),
        'blue'          => __('Blue','sage'),
        'violet'        => __('Violet','sage'),
        'purple'        => __('Purple','sage'),
        'pink'          => __('Pink','sage'),
        'brown'         => __('Brown','sage'),
        'grey'          => __('Grey','sage'),
        'black'         => __('Black','sage'),
    ),
);

piklist('field', array(
    'type'      => 'group',
    'field'     => 'group_quote',
    'label'     => __('Request Quote Button','sage'),
    'fields'   => array(
        $quote_display,
        $quote_color
    ),
));

/* ****************************************************************************/
/* Select language button *****************************************************/
/* ****************************************************************************/

$language_display = array(
    'type'      => 'select',
    'field'     => 'header_language_display',
    'label'     => __('Display multilanguage','sage'),
    'columns'   => 4,
    'choices'   => array(
        'TRUE'      => __('Yes','sage'),
        'FALSE'     => __('No','sage')
    ),
);

$language_color = array(
    'type'      => 'select',
    'field'     => 'header_language_button_color',
    'label'     => __('Language Button Color','sage'),
    'columns'   => 4,
    'value'     => '',
    'choices'   => array(
        ''              => __('Default (White)','sage'),
        'red'           => __('Red','sage'),
        'orange'        => __('Orange','sage'),
        'yellow'        => __('Yellow','sage'),
        'olive'         => __('Olive','sage'),
        'green'         => __('Green','sage'),
        'teal'          => __('Teal','sage'),
        'blue'          => __('Blue','sage'),
        'violet'        => __('Violet','sage'),
        'purple'        => __('Purple','sage'),
        'pink'          => __('Pink','sage'),
        'brown'         => __('Brown','sage'),
        'grey'          => __('Grey','sage'),
        'black'         => __('Black','sage'),
    ),
);

piklist('field', array(
    'type'      => 'group',
    'field'     => 'group_language',
    'label'     => __('Language Button','sage'),
    'fields'   => array(
        $language_display,
        $language_color
    ),
));

piklist('field', array(
    'type'      => 'checkbox',
    'field'     => 'header_button_styles',
    'label'     => __('Phone Button Style','sage'),
    'columns'   => 4,
    'choices'   => array(
        'inverted'  => __('Inverted','sage'),
        'emphasis'  => __('Emphasis','sage'),
        'basic'     => __('Basic','sage'),
    ),
));

piklist('field',array(
    'type'      => 'select',
    'field'     => 'header_menu_style',
    'label'     => __('Fixed or attached','sage'),
    'choices'   => array(
        'attached'  => __('Attached','sage'),
        'fixed'     => __('Fixed','sage'),
    ),
));

/* ****************************************************************************/
/* Header menu styles *********************************************************/
/* ****************************************************************************/

piklist('field', array(
    'type'      => 'checkbox',
    'field'     => 'header_menu_options',
    'label'     => __('Header menu Style','sage'),
    'columns'   => 4,
    'choices'   => array(
        'borderless'=> __('Borderless','sage'),
        'small'     => __('Small','sage'),
        'large'     => __('Large','sage'),
    ),
));

piklist('field', array(
    'type'      => 'select',
    'field'     => 'header_color_fill',
    'label'     => __('Menu color fill','sage'),
    'value'     => 'inverted',
    'columns'   => 4,
    'choices'   => array(
        'inverted'  => __('Background fill (inverted)','sage'),
        ''          => __('Font colors (normal)','sage')
    ),
));

?>
