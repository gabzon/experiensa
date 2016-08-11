<?php

/*
Title: Landing Page Settings
Setting: experiensa_design_settings
Tab: Landing
Flow: Design
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
$cpt['none'] = __('None','sage');
$showcase_posttype = array(
    'type'      => 'select',
    'field'     => 'showcase_posttype',
    'value'     => 'none',
    'label'     => __('Post Type to Show','sage'),
    'columns'   => 3,
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
    'columns' => 2,
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
/**
 * TextImages settings
 */
$ti_font_size = array(
    'type'      => 'number',
    'label' => __('Text Size','sage'),
    'help'  => __('em font size type','sage'),
    'field'     => 'font_size',
    'columns'   => 2,
    'value'     => '1'
);
$ti_text_color = array(
    'type' => 'colorpicker',
    'field' => 'text_color',
    'label' => __('Text Color', 'sage'),
    'help'  => __('Default font color is white','sage'),
    'default' => '#FFFFFF',
    'columns'   => 3,
    'attributes' => array(
        'class' => 'small-text'
    )
);
$ti_text_transformation = array(
    'type'      => 'select',
    'label' => __('Text Transtransform','sage'),
    'field'     => 'text_transform',
    'columns'   => 3,
    'value'     => 'capitalize',
    'choices'   => array(
        'uppercase'              => __('Uppercase','sage'),
        'lowercase'           => __('Lowercase','sage'),
        'capitalize'        => __('Capitalize','sage')
    )
);
$ti_text_order = array(
    'type'      => 'select',
    'label' => __('Text Order','sage'),
    'field'     => 'text_order',
    'columns'   => 3,
    'value'     => 'title_first',
    'choices'   => array(
        'title_first'              => __('Title First','sage'),
        'subtitle_first'           => __('Subtitle First','sage')
    )
);
$ti_text_position = array(
    'type'      => 'select',
    'label' => __('Text Position','sage'),
    'field'     => 'text_position',
    'columns'   => 4,
    'value'     => 'center_middle',
    'choices'   => array(
        'top_left'           => __('Top & Left','sage'),
        'center_left'           => __('Center & Left','sage'),
        'bottom_left'           => __('Bottom & Left','sage'),
        'top_middle'              => __('Top & Middle','sage'),
        'center_middle'           => __('Center & Middle','sage'),
        'bottom_middle'           => __('Bottom & Middle','sage'),
        'top_right'           => __('Top & Right','sage'),
        'center_right'           => __('Center & Right','sage'),
        'bottom_right'           => __('Bottom & Right','sage')
    )
);
$ti_display_title = array(
    'type'      => 'select',
    'label' => __('Display Title?','sage'),
    'field'     => 'display_title',
    'columns'   => 3,
    'value'     => 'yes',
    'choices'   => array(
        'yes'           => __('Yes','sage'),
        'no'           => __('No','sage'),
    )
);
$ti_display_subtitle = array(
    'type'      => 'select',
    'label' => __('Display Subtitle?','sage'),
    'field'     => 'display_subtitle',
    'columns'   => 3,
    'value'     => 'yes',
    'choices'   => array(
        'yes'           => __('Yes','sage'),
        'no'           => __('No','sage'),
    )
);
$ti_display_overlay = array(
    'type'      => 'select',
    'label' => __('Display Overlay?','sage'),
    'field'     => 'display_overlay',
    'columns'   => 2,
    'value'     => 'yes',
    'choices'   => array(
        'yes'           => __('Yes','sage'),
        'no'           => __('No','sage'),
    )
);
$showcase_textimage_settings = array(
    'type' => 'group',
    'field' => 'textimage_options',
    'label' => __('Textimage options','sage'),
    'fields' => array(
        $ti_font_size,
        $ti_text_color,
        $ti_text_transformation,
        $ti_text_order,
        $ti_text_position,
        $ti_display_title,
        $ti_display_subtitle,
        $ti_display_overlay
    )
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
        $showcase_title_alignment,
        $showcase_textimage_settings
    ),
    'conditions' => array(
        array(
            'field' => 'display_showcase',
            'value' => 'TRUE'
        )
    )
));

