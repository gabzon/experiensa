<?php

/*
Title: Landing Page Settings
Setting: experiensa_design_settings
Tab: Landing Page
Tab Order: 20
*/
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
    'label'     => __('What to show in the slider?','sage'),
    'columns'   => 4,
    'value'     => 'TRUE',
    'choices'   => array(
        'TRUE'      => __('Show welcome message and selected images','sage'),
        'FALSE'     => __('Selected voyages','sage')
    ),
    'conditions' => array(
        array(
            'field' => 'setting_landing_slider',
            'value' => 'TRUE'
        )
    )
));

piklist('field', array(
    'type' => 'text',
    'field' => 'setting_landing_slider_welcome_message',
    'label' => __('Welcome Message'),
    'columns'   => 4,
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('Enter your welcome message','sage')
    ),
    'conditions' => array(
        array(
            'field' => 'setting_landing_slider_description',
            'value' => 'TRUE'
        ),
        array(
            'field' => 'setting_landing_slider',
            'value' => 'TRUE'
        )
    )
));


/* ************************************************************************** */
/* *************************** Showcase ************************************* */
/* ************************************************************************** */

piklist('field', array(
    'type' => 'html',
    'template'  => 'field',
    'field' => 'showcase_section', // 'field' is only required for a settings page.
    'value' => '<h3>'.__('Showcase Section','sage').'</h3><hr>'
));

piklist('field',array(
    'type'          => 'select',
    'field'         => 'display_showcase',
    'label'         => __('Display Showcase','sage'),
    'help'   => __('Enable or not the Showcase','sage'),
    'value'         => 'FALSE',
    'choices'       => array(
        'TRUE'  => __('Yes','sage'),
        'FALSE' => __('No','sage')
    ),
));

$cpt = get_post_types();

$showcase_posttype = array(
    'type'      => 'select',
    'field'     => 'showcase_posttype',
    'value'     => 'voyage',
    'label'     => __('Post Type to Show','sage'),
    'columns'   => 2,
    'choices'   => $cpt
);
$showcase_categories = array(
    'type'      => 'select',
    'field'     => 'showcase_category',
    'value'     => 'location',
    'label'     => __('Category','sage'),
    'columns'   => 3,
    'choices'   => array(
        'location'      => __('Destinations','sage'),
        'promotions'      => __('Promotions','sage'),
        'brochures'      => __('Brochures','sage'),
        'theme'      => __('Themes','sage'),
    ),
);
$showcase_component = array(
    'type'      => 'select',
    'field'     => 'showcase_component',
    'value'     => 'carousel',
    'label'     => __('How to display?','sage'),
    'columns'   => 2,
    'choices'   => array(
        'carousel'      => __('Carousel','sage'),
        'grid'          => __('Grid','sage'),
        'card'          => __('Cards','sage'),
        'button'        => __('Buttons','sage'),
        'masonry'       => __('Masonry','sage'),
        'flex-layout'   => __('Flex Layout','sage'),
        'windows'       => __('Windows','sage'),
        'img-layout'    => __('Image layout','sage'),
        'pinterest'     => __('Pinterest','sage'),
    ),
);
$showcase_color = array(
    'type'      => 'select',
    'label' => __('Color','sage'),
    'help'  => __('Only the top border will be colored, check inverse color if you want to color the background instead','sage'),
    'field'     => 'showcase_color',
    'columns'   => 2,
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
    )
);
$showcase_inverted = array(
    'type' => 'select',
    'label' => __('Background','sage'),
    'help'  => __('If inverted color is checked, this section background will be colored instead','sage'),
    'field' => 'showcase_inverted',
    'columns' => 3,
    'value' => '',
    'choices' => array(
        '' => __('Simple','sage'),
        'inverted' => __('Inverted color','sage')
    ),
);
$showcase_title = array(
    'type' => 'text',
    'field' => 'showcase_title',
    'label' => __('Showcase Title'),
    'columns'   => 12,
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('Enter your showcase title','sage')
    )
);
$showcase_subtitle = array(
    'type' => 'text',
    'field' => 'showcase_subtitle',
    'label' => __('Showcase Title'),
    'columns'   => 12,
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('Enter your showcase subtitle','sage')
    )
);
$showcase_title_alignment = array(
    'type'      => 'select',
    'label' => __('Title and Subtitle Alignment','sage'),
    'field'     => 'showcase_title_alignment',
    'columns'   => 3,
    'value'     => 'center',
    'choices'   => array(
        'center'              => __('Center','sage'),
        'left'           => __('Left','sage'),
        'right'        => __('Right','sage')
    ),
);
piklist('field',array(
    'type' => 'group',
    'field' => 'showcase_options',
    'label' => __('Showcase options','sage'),
    'help'      => __('You can order dragging the showcase components will be displayed'),
    'add_more' => true,
    'fields' => array(
        $showcase_posttype,
        $showcase_categories,
        $showcase_component,
        $showcase_color,
        $showcase_inverted,
        $showcase_title,
        $showcase_subtitle,
        $showcase_title_alignment
    ),
    'conditions' => array(
        array(
            'field' => 'display_showcase',
            'value' => 'TRUE'
        )
    )
));
/*
piklist('field',array(
    'type'      => 'select',
    'field'     => 'landing_order',
    'label'     => __('Displaying order','sage'),
    'help'      => __('Order in which the front page will be display after the slider'),
    'add_more'  => true,
    'columns'   => 4,
    'choices'   => array(
        'destination'   => __('Destinations','sage'),
        'promotion'     => __('Promotions','sage'),
        'theme'         => __('Themes','sage'),
        'country'       => __('Countries','sage'),
        'content'       => __('Content','sage'),
    ),
));*/
/* ************************************************************************** */
/* *************************** Destinations  ******************************** */
/* ************************************************************************** */
/*
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
        'carousel'      => __('Carousel','sage'),
        'grid'          => __('Grid','sage'),
        'card'          => __('Cards','sage'),
        'button'        => __('Buttons','sage'),
        'masonry'       => __('Masonry','sage'),
        'flex-layout'   => __('Flex Layout','sage'),
        'windows'       => __('Windows','sage'),
        'img-layout'    => __('Image layout','sage'),
        'pinterest'     => __('Pinterest','sage'),
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
/*

/* ************************************************************************** */
/* ***************************** Promotions  ******************************** */
/* ************************************************************************** */
/*
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

$promotion_type= array(
    'type'      => 'select',
    'field'     => 'promotion_type',
    'value'     => 'brochure',
    'label'     => __('What do you want to display?','sage'),
    'columns'   => 3,
    'choices'   => array(
        'brochure'      => __('Brochures','sage'),
        'promotion'     => __('Promotions','sage'),
    ),
);

$promotion_component = array(
    'type'      => 'select',
    'field'     => 'display_promotion_component',
    'value'     => 'carousel',
    'label'     => __('How to display promotions?','sage'),
    'columns'   => 3,
    'choices'   => array(
        'carousel'      => __('Carousel','sage'),
        'grid'          => __('Grid','sage'),
        'card'          => __('Cards','sage'),
        'button'        => __('Buttons','sage'),
        'masonry'       => __('Masonry','sage'),
        'flex-layout'   => __('Flex Layout','sage'),
        'windows'       => __('Windows','sage'),
        'img-layout'    => __('Image layout','sage'),
        'pinterest'     => __('Pinterest','sage'),
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
    'label' => __('Promotion section color','sage'),
    'help'  => __('If inverted color is checked, this section background will be colored instead','sage'),
    'fields' => array(
        $promotion_type,
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

*/
/* ************************************************************************** */
/* ******************************** Themes ********************************** */
/* ************************************************************************** */
/*
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
        'carousel'      => __('Carousel','sage'),
        'grid'          => __('Grid','sage'),
        'card'          => __('Cards','sage'),
        'button'        => __('Buttons','sage'),
        'masonry'       => __('Masonry','sage'),
        'flex-layout'   => __('Flex Layout','sage'),
        'windows'       => __('Windows','sage'),
        'img-layout'    => __('Image layout','sage'),
        'pinterest'     => __('Pinterest','sage'),
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
*/
?>
