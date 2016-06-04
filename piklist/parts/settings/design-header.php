<?php

/*
Title: Header Settings
Setting: experiensa_design_settings
Tab: Header Design
Tab Order: 10
*/
piklist('field', array(
    'type'      => 'select',
    'field'     => 'header_style',
    'label'     => __('Header Style','sage'),
    'columns'   => 4,
    'value'     => 'all_horizontal',
    'choices'   => array(
        'all_vertical'      => __('All Vertical','sage'),
        'all_horizontal'      => __('All Horizontal','sage'),
        'left_logo_menu_icon'     => __('Left Logo and Menu Icon','sage'),
        'right_logo_menu_icon'     => __('Right Logo and Menu Icon','sage')
    ),
));

/* ****************************************************************************/
/* Phone button ***************************************************************/
/* ****************************************************************************/

piklist('field', array(
    'type'      => 'select',
    'field'     => 'header_logo_size',
    'label'     => __('Logo size','sage'),
    'columns'   => 4,
    'value'     => 'tiny',
    'choices'   => array(
        'mini'      => __('Mini (35px)','sage'),
        'tiny'      => __('Tiny (80px)','sage'),
        'small'     => __('Small (150px)','sage')
    ),
));

piklist('field', array(
    'type'      => 'checkbox',
    'field'     => 'header_company_name',
    'label'     => __('Company name','sage'),
    'columns'   => 5,
    'value'     => 'TRUE',
    'choices'   => array(
        'TRUE'      => __('Display Company name next to the logo','sage'),
    ),
));


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
    'value'     => 'fixed',
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
