<?php
/*
Title: Landing Page Settings
Setting: experiensa_design_settings
Tab: Landing
Flow: Layout
*/
/* ************************************************************************** */
/* ******************************* Slider *********************************** */
/* ************************************************************************** */

piklist('field', array(
    'type'      => 'html',
    'template'  => 'field',
    'field'     => 'slider_section', // 'field' is only required for a settings page.
    'value'     => '<h3>'.__('Landing slider options','sage').'</h3><hr>'
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

/**
 * TextImages settings
 */
$showcase_textimage_show = array(
    'type'      => 'select',
    'label' => __('Showcase TextImage','sage'),
    'field'     => 'show_textimage',
    'columns'   => 12,
    'value'     => 'FALSE',
    'choices'   => array(
        'FALSE'          => __('No TextImage','sage'),
        'TRUE'           => __('Show TextImage Options','sage')
    )
);

$ti_html_title = array(
    'type'      => 'html',
    'template'  => 'field',
    'columns'   => 12,
    'field'     => 'ti_html_title', // 'field' is only required for a settings page.
    'value'     => '<h4>'.__('Textimage Options','sage').'</h4><hr>',
);
$ti_display_title = array(
    'type'      => 'select',
    'label' => __('Display Title?','sage'),
    'field'     => 'display_title',
    'columns'   => 4,
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
    'columns'   => 4,
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
    'columns'   => 4,
    'value'     => 'yes',
    'choices'   => array(
        'yes'           => __('Yes','sage'),
        'no'           => __('No','sage'),
    )
);
$ti_text_order = array(
    'type'      => 'select',
    'label' => __('Text Order','sage'),
    'field'     => 'text_order',
    'columns'   => 4,
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
$ti_text_transformation = array(
    'type'      => 'select',
    'label' => __('Text Transtransform','sage'),
    'field'     => 'text_transform',
    'columns'   => 4,
    'value'     => 'capitalize',
    'choices'   => array(
        'uppercase'              => __('Uppercase','sage'),
        'lowercase'           => __('Lowercase','sage'),
        'capitalize'        => __('Capitalize','sage')
    )
);

$ti_font_size = array(
    'type'      => 'text',
    'label' => __('Text Size','sage'),
    'help'  => __('em font size type','sage'),
    'field'     => 'font_size',
    'columns'   => 3,
    'value'     => '1'
);
$ti_text_color = array(
    'type' => 'colorpicker',
    'field' => 'text_color',
    'label' => __('Text Color', 'sage'),
    'help'  => __('Default font color is white (#FFFFFF)','sage'),
    'default' => '#FFFFFF',
    'columns'   => 9,
    'attributes' => array(
        'class' => 'small-text'
    )
);

$showcase_textimage_options = array(
    'type' => 'group',
    'field' => 'textimage_options',
    'fields' => array(
//        $ti_html_title,
        $ti_display_title,
        $ti_display_subtitle,
        $ti_display_overlay,
        $ti_text_order,
        $ti_text_position,
        $ti_text_transformation,
        $ti_font_size,
        $ti_text_color,
    ),
    'conditions' => array(
        array(
            'field' => 'landing_section_options:content_options:showcase_options:show_textimage',
            'value' => 'TRUE'
        )
    )
);

/**
 *  Showcase Options
 */
$showcase_html_title = array(
    'type'      => 'html',
    'template'  => 'field',
    'columns'   => 12,
    'field'     => 'showcase_html_title', // 'field' is only required for a settings page.
    'value'     => '<h4>'.__('Showcase Options','sage').'</h4><hr>',
);

$showcase_posttype = array(
    'type'      => 'select',
    'field'     => 'posttype',
    'value'     => 'none',
    'label'     => __('Post Type to Show','sage'),
    'columns'   => 4,
    'choices'   => \Experiensa\Modules\QueryBuilder::getPostTypes(),
//    'conditions' => array(
//        'relation'  => 'or',
//        array(
//            'field' => 'landing_section_options:content_options:showcase_options:component',
//            'value' => Helpers::getComponentList()
//        ),
//        array(
//            'field' => 'landing_section_options:content_options:showcase_options:slider_options:slider_type',
//            'compare' => '!=',
//            'value' => 'message'
//        )
//    )
);

$showcase_categories = array(
    'type'      => 'select',
    'field'     => 'category',
    'value'     => 'location',
    'label'     => __('Category','sage'),
    'columns'   => 4,
    'choices'   => \Experiensa\Modules\QueryBuilder::getTaxonomies(),
);

$showcase_component = array(
    'type'      => 'select',
    'field'     => 'component',
    'label'     => __('Component','sage'),
    'columns'   => 4,
    'choices'   => Helpers::getComponentList(),
    'value'     => 'carousel'
);

$showcase_terms = array(
    'type' => 'text',
    'field' => 'terms',
    'label' => __('Categories','sage'),
    'columns'   => 12,
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('You can enter here the categories separated by commas','sage')
    )
);
/**
 *  Photo Slider Options
 */
$slider_html_title = array(
    'type'      => 'html',
    'template'  => 'field',
    'columns'   => 12,
    'field'     => 'slider_html_title', // 'field' is only required for a settings page.
    'value'     => '<h4>'.__('Photo Slider Options','sage').'</h4><hr>',
);

$slider_type = array(
    'type'      => 'select',
    'label'     => __('Slider type','sage'),
    'field'     => 'slider_type',
    'columns'   => 5,
    'choices'   => array(
        'message'   =>  __('Message and categorized images','sage'),
        'asd'     =>  __('Posts','sage')
    ),
    'value'     => 'asd',
//    'conditions' => array(
//        array(
//            'type' => 'update',
//            'value' => 'message',
//            'field' => 'landing_section_options:content_options:showcase_options:posttype',
//            'update' => 'none'
//        ),
//        array(
//            'type' => 'update',
//            'value' => 'posts',
//            'field' => 'landing_section_options:content_options:showcase_options:posttype',
//            'update' => 'attachment'
//        )
//    )
);
$slider_message = array(
    'type' => 'text',
    'field' => 'message',
    'label' => __('Slider Message','sage'),
    'columns'   => 7,
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('Enter your message here','sage')
    ),
    'conditions' => array(
        array(
            'field' => 'landing_section_options:content_options:showcase_options:slider_options:slider_type',
            'value' => 'message'
        )
    )
);
$showcase_slider_options = array(
    'type' => 'group',
    'field' => 'slider_options',
    'fields' => array(
//        $slider_html_title,
        $slider_type,
        $slider_message
    ),
    'conditions' => array(
        array(
            'field' => 'landing_section_options:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section_options:content_options:showcase_options:component',
            'value' => 'slider'
        )
    )
);
/**
 * Content Layout Options
 */
$layout_html_title = array(
    'type'      => 'html',
    'template'  => 'field',
    'columns'   => 12,
    'field'     => 'layout_html_title', // 'field' is only required for a settings page.
    'value'     => '<h4>'.__('Layout Options','sage').'</h4><hr>',
);
$segment_container = array(
    'type'      => 'select',
    'label' => __('Container type','sage'),
    'help'  => __('The content can be set in a container or not','sage'),
    'field'     => 'container',
    'columns'   => 3,
    'value'     => '',
    'choices'   => array(
        ''              => __('Full width','sage'),
        'container'     => __('Container','sage'),
    )
);
$segment_content_color = array(
    'type' => 'colorpicker',
    'field' => 'content_color',
    'label' => __('Content Color', 'sage'),
    'help'  => __('Default font color is white','sage'),
    'default' => '#FFFFFF',
    'columns'   => 3,
    'attributes' => array(
        'class' => 'small-text'
    )
);
$segment_title_alignment = array(
    'type'      => 'select',
    'label' => __('Title & Tagline Alignment','sage'),
    'field'     => 'title_alignment',
    'columns'   => 3,
    'value'     => 'center',
    'choices'   => array(
        'center'     => __('Center','sage'),
        'left'       => __('Left','sage'),
        'right'      => __('Right','sage')
    ),
);
$segment_title_color = array(
    'type' => 'colorpicker',
    'field' => 'title_color',
    'label' => __('Title Color', 'sage'),
    'help'  => __('Default font color is white','sage'),
    'default' => '#FFFFFF',
    'columns'   => 3,
    'attributes' => array(
        'class' => 'small-text'
    )
);
$segment_title = array(
    'type' => 'text',
    'field' => 'segment_title',
    'label' => __('Segment Title'),
    'columns'   => 12,
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('Enter your segment title','sage')
    )
);
$segment_subtitle = array(
    'type' => 'text',
    'field' => 'segment_subtitle',
    'label' => __('Segment Title'),
    'columns'   => 12,
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('Enter your segment subtitle','sage')
    )
);

$layout_options = array(
    'type' => 'group',
    'field' => 'layout_options',
    'fields' => array(
//        $layout_html_title,
        $segment_container,
        $segment_content_color,
        $segment_title_alignment,
        $segment_title_color,
        $segment_title,
        $segment_subtitle,
    ),
    'conditions' => array(
        array(
            'field' => 'landing_section_options:content_options:showcase_options:show_layout',
            'value' => 'TRUE'
        )
    )
);
$show_layout = array(
    'type'      => 'select',
    'label' => __('Content Layout','sage'),
    'field'     => 'show_layout',
    'columns'   => 12,
    'value'     => 'FALSE',
    'choices'   => array(
        'FALSE'          => __('No Layout','sage'),
        'TRUE'           => __('Show Layout Options','sage')
    )
);

//
//  Showcase Options Group Field
//
//
$showcase_options = array(
    'type' => 'group',
    'field' => 'showcase_options',
    'fields' => array(
//        $showcase_html_title,
        $showcase_component,
        $showcase_posttype,
        $showcase_categories,
        $showcase_terms,
        $showcase_slider_options,
        $showcase_textimage_show,
        $showcase_textimage_options,
        $show_layout,
        $layout_options
    ),
    'conditions' => array(
        array(
            'field' => 'landing_section_options:source_type',
            'value' => 'showcase'
        )
    )
);


/**
 *  Content Source Options
 */
$pages = array(
    'type'      => 'select',
    'label' => __('Page to show','sage'),
    'field'     => 'pages',
    'columns'   => 4,
    'choices'   => Helpers::getPagesFromCurrentLanguage(),
    'conditions' => array(
        array(
            'field' => 'landing_section_options:source_type',
            'value' => 'page'
        )
    )
);

$content_options = array(
    'type' => 'group',
    'field' => 'content_options',
    'fields' => array(
        $pages,
        $showcase_options,
//        $title_options
    )
);

/**
 * Background Options
 */

$bg_html_title = array(
    'type'      => 'html',
    'template'  => 'field',
    'columns'   => 12,
    'field'     => 'bg_html_title', // 'field' is only required for a settings page.
    'value'     => '<h4>'.__('Background Options','sage').'</h4><hr>',
);

$background_type = array(
    'type'      => 'select',
    'label' => __('Background Type','sage'),
    'help'  => __('Background customization types','sage'),
    'field'     => 'background_type',
    'columns'   => 12,
    'value'     => 'color',
    'choices'   => array(
        'color'              => __('Color','sage'),
        'texture'           => __('Texture','sage'),
        'image'        => __('Image','sage')
    )
);

$bg_color = array(
    'type'      => 'select',
    'label' => __('Color','sage'),
    'help'  => __('Only the top border will be colored, check inverse color if you want to color the background instead','sage'),
    'field'     => 'background_color',
    'columns'   => 6,
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
            'field' => 'landing_section_options:background_options:background_type',
            'value' => 'color'
        )
    )
);

$bg_color_inverted = array(
    'type' => 'select',
    'label' => __('Background style','sage'),
    'help'  => __('If inverted color is checked, this section background will be colored instead','sage'),
    'field' => 'color_inverted',
    'columns' => 6,
    'value' => '',
    'choices' => array(
        '' => __('Simple','sage'),
        'inverted' => __('Inverted color','sage')
    ),
    'conditions' => array(
        array(
            'field' => 'landing_section_options:background_options:background_type',
            'value' => 'color'
        )
    )
);

$bg_texture = array(
    'type'      => 'file',
    'field'     => 'bg_texture',
    'label'     => __('Texture image','sage'),
    'columns' => 6,
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
            'field' => 'landing_section_options:background_options:background_type',
            'value' => 'texture'
        )
    )
);

$bg_image = array(
    'type'      => 'file',
    'field'     => 'bg_image',
    'label'     => __('Background image','sage'),
    'columns' => 6,
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
            'field' => 'landing_section_options:background_options:background_type',
            'value' => 'image'
        )
    )
);

$background_options = array(
    'type' => 'group',
    'field' => 'background_options',
    'fields' => array(
//        $bg_html_title,
        $background_type,
        $bg_color,
        $bg_color_inverted,
        $bg_texture,
        $bg_image
    ),
    'conditions' => array(
        array(
            'field' => 'landing_section_options:show_background',
            'value' => 'TRUE'
        )
    )
);


/**
 *  Main Section Option Field Group
 */
$source_type = array(
    'type'      => 'select',
    'label' => __('Source Content Type','sage'),
    'help'  => __('Here you can select what type of content displayed in the segment','sage'),
    'field'     => 'source_type',
    'columns'   => 12,
    'value'     => 'page',
    'choices'   => array(
        'page'              => __('Page','sage'),
        'showcase'           => __('Showcase','sage')
    )
);
$show_background = array(
    'type'      => 'select',
    'label' => __('Background','sage'),
    'field'     => 'show_background',
    'columns'   => 12,
    'value'     => 'FALSE',
    'choices'   => array(
        'FALSE'              => __('No background','sage'),
        'TRUE'           => __('Show background','sage')
    )
);


piklist('field',array(
    'type' => 'group',
    'field' => 'landing_section_options',
    'label' => __('Section options','sage'),
    'add_more' => true,
    'help'      => __('You can set the style to your custom template','sage'),
    'fields' => array(
        $source_type,
        $content_options,
        $show_background,
        $background_options,
    )
));

