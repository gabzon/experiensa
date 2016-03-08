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

piklist('field', array(
    'type'      => 'select',
    'field'     => 'setting_landing_slider_description',
    'label'     => __('Display Slider description','sage'),
    'columns'   => 2,
    'choices'   => array(
        'TRUE'      => __('Yes','sage'),
        'FALSE'     => __('No','sage')
    ),
));

$destination_color = array(
    'type'      => 'select',
    'field'     => 'destination_section_color',
    'columns'   => 3,
    'value'     => '',
    'choices'   => array(
        ''              => __('No Color','sage'),
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
        'website'       => __('Default website','sage'),
    ),
);

$destination_inverted = array(
    'type' => 'checkbox',
    'field' => 'promotion_section_inverted',
    'columns' => 3,
    'choices' => array(
        'inverted' => __('Inverted color','sage')
    )
);


piklist('field',array(
    'type' => 'group',
    'field' => 'destination_color_group',
    'label' => __('Destination section color','sage'),
    'help'  => __('If inverted color is checked, this section background will be colored instead','sage'),
    'fields' => array(
        $destination_color,
        $destination_inverted
    )
));

$promotion_color = array(
    'type'      => 'select',
    'field'     => 'promotion_section_color',
    'columns'   => 3,
    'value'     => '',
    'choices'   => array(
        ''              => __('No Color','sage'),
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
        'website'       => __('Default website','sage'),
    ),
);

$promotion_inverted = array(
    'type' => 'checkbox',
    'field' => 'promotion_section_inverted',
    'columns' => 3,
    'choices' => array(
        'inverted' => __('Inverted color','sage')
    )
);

piklist('field',array(
    'type' => 'group',
    'field' => 'promotion_color_group',
    'label' => __('Promotion section color','sage'),
    'help'  => __('If inverted color is checked, this section background will be colored instead','sage'),
    'fields' => array(
        $promotion_color,
        $promotion_inverted
    )
));

$theme_color = array(
    'type'      => 'select',
    'field'     => 'theme_section_color',
    'columns'   => 3,
    'value'     => '',
    'choices'   => array(
        ''              => __('No Color','sage'),
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
        'website'       => __('Default website','sage'),
    ),
);

$theme_inverted = array(
    'type' => 'checkbox',
    'field' => 'theme_section_inverted',
    'columns' => 3,
    'choices' => array(
        'inverted' => __('Inverted color','sage')
    )
);

piklist('field',array(
    'type' => 'group',
    'field' => 'theme_color_group',
    'label' => __('Theme section color','sage'),
    'help'  => __('If inverted color is checked, this section background will be colored instead','sage'),
    'fields' => array(
        $theme_color,
        $theme_inverted
    )
));

// TODO: Order of apperance Slider, destinations (countries), popular cities, etc, promotions
// TODO: Colors for different sections
// TODO: Appears or not

?>
