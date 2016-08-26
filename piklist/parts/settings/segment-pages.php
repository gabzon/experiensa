<?php
/*
Title: Pages
Setting: experiensa-segment-settings
Tab: Pages Segment
Flow: Segment
*/

$template_names = Helpers::getPageTemplateNames();

$segment_page_templates = array(
    'type'      => 'select',
    'field'     => 'templates',
    'label'     => __('Page Template','sage'),
    'columns'   => 4,
    'choices'   => $template_names
);

$segment_page_container = array(
    'type'      => 'select',
    'label' => __('Container','sage'),
    'help'  => __('The content can be set in a container or not','sage'),
    'field'     => 'container',
    'columns'   => 2,
    'value'     => '',
    'choices'   => array(
        ''              => __('Full width','sage'),
        'container'           => __('Container','sage'),
    )
);

$segment_page_title_alignment = array(
    'type'      => 'select',
    'label' => __('Title & Tagline Alignment','sage'),
    'field'     => 'title_alignment',
    'columns'   => 3,
    'value'     => 'center',
    'choices'   => array(
        'center'              => __('Center','sage'),
        'left'           => __('Left','sage'),
        'right'        => __('Right','sage')
    ),
);

$segment_page_background_type = array(
    'type'      => 'select',
    'label' => __('Background Type','sage'),
    'help'  => __('Background customization types','sage'),
    'field'     => 'background_type',
    'columns'   => 3,
    'value'     => 'color',
    'choices'   => array(
        'color'              => __('Color','sage'),
        'texture'           => __('Texture','sage'),
        'image'        => __('Image','sage')
    )
);

$segment_page_color = array(
    'type'      => 'select',
    'label' => __('Color','sage'),
    'help'  => __('Only the top border will be colored, check inverse color if you want to color the background instead','sage'),
    'field'     => 'background_color',
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
    ),
    'conditions' => array(
        array(
            'field' => 'segment_options:background_type',
            'value' => 'color'
        )
    )
);

$segment_page_inverted = array(
    'type' => 'select',
    'label' => __('Background','sage'),
    'help'  => __('If inverted color is checked, this section background will be colored instead','sage'),
    'field' => 'color_inverted',
    'columns' => 3,
    'value' => '',
    'choices' => array(
        '' => __('Simple','sage'),
        'inverted' => __('Inverted color','sage')
    ),
    'conditions' => array(
        array(
            'field' => 'segment_options:background_type',
            'value' => 'color'
        )
    )
);

$segment_page_texture = array(
    'type'      => 'file',
    'field'     => 'bg_texture',
    //'scope'     => 'post_meta',
    'label'     => __('Texture image','sage'),
    'options'   => array(
        'modal_title'   => __('Add Texture','sage'),
        'button'        => __('Add Texture','sage')
    ),
    'validate' => array(
        array(
            'type' => 'limit',
            'options' => array(
                'min' => 0,
                'max' => 1
            )
        )
    ),
    'conditions' => array(
        array(
            'field' => 'segment_options:background_type',
            'value' => 'texture'
        )
    )
);

$segment_page_bg_image = array(
    'type'      => 'file',
    'field'     => 'bg_image',
    'label'     => __('Background image','sage'),
    'options'   => array(
        'modal_title'   => __('Add Image','sage'),
        'button'        => __('Add Image','sage')
    ),
    'validate' => array(
        array(
            'type' => 'limit',
            'options' => array(
                'min' => 0,
                'max' => 1
            )
        )
    ),
    'conditions' => array(
        array(
            'field' => 'segment_options:background_type',
            'value' => 'image'
        )
    )
);

piklist('field',array(
    'type' => 'group',
    'field' => 'segment_options',
    'label' => __('Segment page options','sage'),
    'help'      => __('You can set the style of custom pages'),
    'add_more' => true,
    'fields' => array(
        $segment_page_templates,
        $segment_page_container,
        $segment_page_title_alignment,
        $segment_page_background_type,
        $segment_page_color,
        $segment_page_inverted,
        $segment_page_texture,
        $segment_page_bg_image
    )
));
