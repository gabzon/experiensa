<?php

/*
Title: Landing Page Settings
Setting: experiensa_design_settings
Tab: Landing Page
Tab Order: 20
*/

piklist('field',array(
    'type'      => 'select',
    'field'     => 'landing_order',
    'label'     => __('Displaying order','sage'),
    'help'      => __('Order in which the front page will be display after the slider'),
    'add_more'  => true,
    'columns'   => 4,
    'choices'   => array(
        'destination'  => __('Destination','sage'),
        'promotion' => __('Promotions','sage'),
        'theme' => __('Themes','sage'),
        'country' => __('Countries','sage'),
        'content' => __('Content','sage'),
    ),
));

/* ************************************************************************** */
/* ******************************* Slider *********************************** */
/* ************************************************************************** */

piklist('field', array(
    'type'      => 'html',
    'template'  => 'field',
    'field'     => 'slider_section', // 'field' is only required for a settings page.
    'value'     => '<h3>'.__('Slider section','sage').'</h3><hr>'
));

piklist('field',array(
    'type'          => 'select',
    'field'         => 'setting_landing_slider',
    'label'         => __('Display Slider','sage'),
    'help'   => __('Fullscreen image slider','sage'),
    'value'         => 'FALSE',
    'choices'       => array(
        'TRUE'  => __('Yes','sage'),
        'FALSE' => __('No','sage')
    ),
));

piklist('field', array(
    'type'      => 'select',
    'field'     => 'setting_landing_slider_description',
    'label'     => __('Display Slider text','sage'),
    'columns'   => 3,
    'value'     => 'TRUE',
    'choices'   => array(
        'TRUE'      => __('Yes','sage'),
        'FALSE'     => __('No','sage')
    ),
    'conditions' => array(
        array(
            'field' => 'setting_landing_slider',
            'value' => 'TRUE'
        )
    )
));

/* ************************************************************************** */
/* *************************** Destinations  ******************************** */
/* ************************************************************************** */

piklist('field', array(
    'type' => 'html',
    'template'  => 'field',
    'field' => 'destination_section', // 'field' is only required for a settings page.
    'value' => '<h3>'.__('Destination section','sage').'</h3><hr>'
));

piklist('field',array(
    'type' => 'select',
    'field' => 'display_destinations',
    'value' => 'TRUE',
    'label' => __('Display destinations','sage'),
    'choices' => array(
        'TRUE'  => __('Yes','sage'),
        'FALSE' => __('Non','sage'),
    ),
));

$destination_component = array(
    'type'      => 'select',
    'field'     => 'display_destination_component',
    'value'     => 'carousel',
    'label'     => __('How to display destinations?','sage'),
    'columns'   => 3,
    'choices'   => array(
        'carousel'  => __('Carousel','sage'),
        'grid'      => __('Grid','sage'),
        'button'    => __('Buttons','sage'),
    ),
);


$destination_color = array(
    'type'      => 'select',
    'label' => __('Color','sage'),
    'help'  => __('Only the top border will be colored, check inverse color if you want to color the background instead','sage'),
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
    'label' => __('Background','sage'),
    'help'  => __('If inverted color is checked, this section background will be colored instead','sage'),
    'field' => 'destination_section_inverted',
    'columns' => 3,
    'choices' => array(
        'inverted' => __('Inverted color','sage')
    ),
);

piklist('field',array(
    'type' => 'group',
    'field' => 'destination_options',
    'label' => __('Destination options','sage'),
    'fields' => array(
        $destination_component,
        $destination_color,
        $destination_inverted
    ),
    'conditions' => array(
        array(
            'field' => 'display_destinations',
            'value' => 'TRUE'
        )
    ),
));


/* ************************************************************************** */
/* ***************************** Promotions  ******************************** */
/* ************************************************************************** */

piklist('field', array(
    'type' => 'html',
    'template'  => 'field',
    'field' => 'promotions_section', // 'field' is only required for a settings page.
    'value' => '<h3>'.__('Promotions section','sage').'</h3><hr>'
));

piklist('field',array(
    'type' => 'select',
    'field' => 'display_promotions',
    'value' => 'TRUE',
    'label' => __('Display promotions','sage'),
    'choices' => array(
        'TRUE'  => __('Yes','sage'),
        'FALSE' => __('Non','sage'),
    ),
));

$promotion_component = array(
    'type'      => 'select',
    'field'     => 'display_promotion_component',
    'value'     => 'carousel',
    'label'     => __('How to display promotions?','sage'),
    'columns'   => 3,
    'choices'   => array(
        'carousel'  => __('Carousel','sage'),
        'grid'      => __('Grid','sage'),
        'button'    => __('Buttons','sage'),
    ),
);

$promotion_color = array(
    'type'      => 'select',
    'label' => __('Color','sage'),
    'help'  => __('Only the top border will be colored, check inverse color if you want to color the background instead','sage'),
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
    'label' => __('Background','sage'),
    'help'  => __('If inverted color is checked, this section background will be colored instead','sage'),
    'columns' => 3,
    'choices' => array(
        'inverted' => __('Inverted color','sage')
    ),
);

piklist('field',array(
    'type' => 'group',
    'field' => 'promotion_options',
    'label' => __('Promotion section color','sage'),
    'help'  => __('If inverted color is checked, this section background will be colored instead','sage'),
    'fields' => array(
        $promotion_component,
        $promotion_color,
        $promotion_inverted,
    ),
    'conditions' => array(
        array(
            'field' => 'display_promotions',
            'value' => 'TRUE'
        )
    ),
));


/* ************************************************************************** */
/* ******************************** Themes ********************************** */
/* ************************************************************************** */

piklist('field', array(
    'type'      => 'html',
    'template'  => 'field',
    'field'     => 'theme_section', // 'field' is only required for a settings page.
    'value'     => '<h3>'.__('Themes section','sage').'</h3><hr>'
));

piklist('field',array(
    'type' => 'select',
    'field' => 'display_themes',
    'value' => 'TRUE',
    'label' => __('Display Themes','sage'),
    'choices' => array(
        'TRUE'  => __('Yes','sage'),
        'FALSE' => __('Non','sage'),
    ),
));

$theme_component = array(
    'type'      => 'select',
    'field'     => 'display_themes_component',
    'value'     => 'carousel',
    'label'     => __('How to display themes?','sage'),
    'columns'   => 3,
    'choices'   => array(
        'carousel'  => __('Carousel','sage'),
        'grid'      => __('Grid','sage'),
        'button'    => __('Buttons','sage'),
    ),
);

$theme_color = array(
    'type'      => 'select',
    'label' => __('Color','sage'),
    'help'  => __('Only the top border will be colored, check inverse color if you want to color the background instead','sage'),
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
    'label' => __('Background','sage'),
    'help'  => __('If inverted color is checked, this section background will be colored instead','sage'),
    'field' => 'theme_section_inverted',
    'columns' => 3,
    'choices' => array(
        'inverted' => __('Inverted color','sage')
    )
);

piklist('field',array(
    'type' => 'group',
    'field' => 'theme_options',
    'label' => __('Theme section color','sage'),
    'help'  => __('If inverted color is checked, this section background will be colored instead','sage'),
    'fields' => array(
        $theme_component,
        $theme_color,
        $theme_inverted
    ),
    'conditions' => array(
        array(
            'field' => 'display_themes',
            'value' => 'TRUE'
        )
    )
));

?>
