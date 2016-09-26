<?php
/*
Title: About Settings
Setting: experiensa_design_settings
Tab: About
Flow: Layout
*/

/**
 * TextImages settings
 */
$show_textimage = array(
    'type'      => 'select',
    'label' => __('Showcase TextImage','sage'),
    'field'     => 'show_textimage',
    'columns'   => 12,
    'value'     => 'FALSE',
    'choices'   => array(
        'FALSE'          => __('No TextImage','sage'),
        'TRUE'           => __('Show TextImage Options','sage')
    ),
    'conditions' => array(
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        )
    )
);

$ti_html_title = array(
    'type'      => 'html',
    'template'  => 'field',
    'columns'   => 12,
    'field'     => 'ti_html_title', // 'field' is only required for a settings page.
    'value'     => '<h4>'.__('Textimage Options','sage').'</h4><hr>',
    'conditions' => array(
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'about_section_options:content_settings:show_textimage',
            'value' => 'TRUE'
        )
    )
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
    ),
    'conditions' => array(
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'about_section_options:content_settings:show_textimage',
            'value' => 'TRUE'
        )
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
    ),
    'conditions' => array(
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'about_section_options:content_settings:show_textimage',
            'value' => 'TRUE'
        )
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
    ),
    'conditions' => array(
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'about_section_options:content_settings:show_textimage',
            'value' => 'TRUE'
        )
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
    ),
    'conditions' => array(
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'about_section_options:content_settings:show_textimage',
            'value' => 'TRUE'
        )
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
    ),
    'conditions' => array(
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'about_section_options:content_settings:show_textimage',
            'value' => 'TRUE'
        )
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
    ),
    'conditions' => array(
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'about_section_options:content_settings:show_textimage',
            'value' => 'TRUE'
        )
    )
);

$ti_font_size = array(
    'type'      => 'text',
    'label' => __('Text Size','sage'),
    'help'  => __('em font size type','sage'),
    'field'     => 'font_size',
    'columns'   => 3,
    'value'     => '1',
    'conditions' => array(
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'about_section_options:content_settings:show_textimage',
            'value' => 'TRUE'
        )
    )
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
    ),
    'conditions' => array(
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'about_section_options:content_settings:show_textimage',
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
    'conditions' => array(
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        )
    )
);

$showcase_posttype = array(
    'type'      => 'select',
    'field'     => 'posttype',
    'value'     => 'none',
    'label'     => __('Post Type to Show','sage'),
    'columns'   => 4,
    'choices'   => \Experiensa\Modules\QueryBuilder::getPostTypes(),
    'conditions' => array(
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        )
    )
//    'conditions' => array(
//        'relation'  => 'or',
//        array(
//            'field' => 'about_section_options:content_options:showcase_options:component',
//            'value' => Helpers::getComponentList()
//        ),
//        array(
//            'field' => 'about_section_options:content_options:showcase_options:slider_options:slider_type',
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
    'conditions' => array(
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        )
    )
);

$showcase_component = array(
    'type'      => 'select',
    'field'     => 'component',
    'label'     => __('Component','sage'),
    'columns'   => 4,
    'choices'   => Helpers::getComponentList(),
    'value'     => 'carousel',
    'conditions' => array(
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        )
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
    'conditions' => array(
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'about_section_options:content_settings:component',
            'value' => 'slider'
        )
    )
);

$slider_type = array(
    'type'      => 'select',
    'label'     => __('Slider type','sage'),
    'field'     => 'slider_type',
    'columns'   => 4,
    'choices'   => array(
        'message'   =>  __('Message and categorized images','sage'),
        'posts'     =>  __('Posts','sage')
    ),
    'value'     => 'posts',
    'conditions' => array(
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'about_section_options:content_settings:component',
            'value' => 'slider'
        )
    )
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
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'about_section_options:content_settings:component',
            'value' => 'slider'
        ),
        array(
            'field' => 'about_section_options:content_settings:slider_type',
            'value' => 'message'
        )
    )
//    'conditions' => array(
//        array(
//            'field' => 'about_section_options:content_settings:showcase_options:slider_options:slider_type',
//            'value' => 'message'
//        )
//    )
);
$showcase_terms = array(
    'type' => 'text',
    'field' => 'terms',
    'label' => __('Categories','sage'),
    'columns'   => 7,
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('You can enter here the categories separated by commas','sage')
    ),
    'conditions' => array(
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'about_section_options:content_settings:component',
            'value' => 'slider'
        ),
        array(
            'field' => 'about_section_options:content_settings:slider_type',
            'value' => 'posts'
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
    'conditions' => array(
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'about_section_options:content_settings:show_layout',
            'value' => 'TRUE'
        )
    )
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
    ),
    'conditions' => array(
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'about_section_options:content_settings:show_layout',
            'value' => 'TRUE'
        )
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
    ),
    'conditions' => array(
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'about_section_options:content_settings:show_layout',
            'value' => 'TRUE'
        )
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
    'conditions' => array(
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'about_section_options:content_settings:show_layout',
            'value' => 'TRUE'
        )
    )
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
    ),
    'conditions' => array(
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'about_section_options:content_settings:show_layout',
            'value' => 'TRUE'
        )
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
    ),
    'conditions' => array(
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'about_section_options:content_settings:show_layout',
            'value' => 'TRUE'
        )
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
    ),
    'conditions' => array(
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'about_section_options:content_settings:show_layout',
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
    ),
    'conditions' => array(
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        ),
    )
);


/**
 *  Content Source Options
 */

$source_type = array(
    'type'      => 'select',
    'label' => __('Source Content Type','sage'),
    'help'  => __('Here you can select what type of content displayed in the segment','sage'),
    'field'     => 'source_type',
    'columns'   => 6,
    'value'     => 'page',
    'choices'   => array(
        'page'              => __('Page','sage'),
        'showcase'           => __('Showcase','sage')
    )
);
$pages = array(
    'type'      => 'select',
    'label' => __('Page to show','sage'),
    'field'     => 'pages',
    'columns'   => 6,
    'choices'   => Helpers::getPagesFromCurrentLanguage(),
    'conditions' => array(
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'page'
        )
    )
);

/**
 * Background Options
 */
$bg_html_line = $bg_html_title = array(
    'type'      => 'html',
    'template'  => 'field',
    'columns'   => 12,
    'field'     => 'bg_html_line', // 'field' is only required for a settings page.
    'value'     => '<hr>',
);
$bg_html_title = array(
    'type'      => 'html',
    'template'  => 'field',
    'columns'   => 12,
    'field'     => 'bg_html_title', // 'field' is only required for a settings page.
    'value'     => '<h4>'.__('Background Options','sage').'</h4><hr>',
    'conditions' => array(
        array(
            'field' => 'about_section_options:background_settings:show_background',
            'value' => 'TRUE'
        )
    )
);

$background_type_showcase = array(
    'type'      => 'select',
    'label' => __('Background Type','sage'),
    'help'  => __('Background customization types','sage'),
    'field'     => 'background_type_showcase',
    'columns'   => 12,
    'value'     => 'color',
    'choices'   => array(
        'color'              => __('Color','sage'),
        'texture'           => __('Texture','sage'),
        'image'        => __('Image','sage')
    ),
    'conditions' => array(
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'about_section_options:background_settings:show_background',
            'value' => 'TRUE'
        )
    )
);

$background_type_page = array(
    'type'      => 'select',
    'label' => __('Background Type','sage'),
    'help'  => __('Background customization types','sage'),
    'field'     => 'background_type_page',
    'columns'   => 12,
    'value'     => 'color',
    'choices'   => array(
        'color'              => __('Color','sage'),
        'texture'           => __('Texture','sage'),
        'image'        => __('Image','sage'),
        'slider'        => __('Photo Slider','sage')
    ),
    'conditions' => array(
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'page'
        ),
        array(
            'field' => 'about_section_options:background_settings:show_background',
            'value' => 'TRUE'
        )
    )
);

$bg_color_page = array(
    'type'      => 'select',
    'label' => __('Color','sage'),
    'help'  => __('Only the top border will be colored, check inverse color if you want to color the background instead','sage'),
    'field'     => 'background_color_page',
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
            'field' => 'about_section_options:background_settings:show_background',
            'value' => 'TRUE'
        ),
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'page'
        ),
        array(
            'field' => 'about_section_options:background_settings:background_type_page',
            'value' => 'color'
        )
    )
);
$bg_color_showcase = array(
    'type'      => 'select',
    'label' => __('Color','sage'),
    'help'  => __('Only the top border will be colored, check inverse color if you want to color the background instead','sage'),
    'field'     => 'background_color_showcase',
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
            'field' => 'about_section_options:background_settings:show_background',
            'value' => 'TRUE'
        ),
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'about_section_options:background_settings:background_type_showcase',
            'value' => 'color'
        )
    )
);

$bg_color_inverted_page = array(
    'type' => 'select',
    'label' => __('Background style','sage'),
    'help'  => __('If inverted color is checked, this section background will be colored instead','sage'),
    'field' => 'color_inverted_page',
    'columns' => 6,
    'value' => '',
    'choices' => array(
        '' => __('Simple','sage'),
        'inverted' => __('Inverted color','sage')
    ),
    'conditions' => array(
        array(
            'field' => 'about_section_options:background_settings:show_background',
            'value' => 'TRUE'
        ),
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'page'
        ),
        array(
            'field' => 'about_section_options:background_settings:background_type_page',
            'value' => 'color'
        )
    )
);

$bg_color_inverted_showcase = array(
    'type' => 'select',
    'label' => __('Background style','sage'),
    'help'  => __('If inverted color is checked, this section background will be colored instead','sage'),
    'field' => 'color_inverted_showcase',
    'columns' => 6,
    'value' => '',
    'choices' => array(
        '' => __('Simple','sage'),
        'inverted' => __('Inverted color','sage')
    ),
    'conditions' => array(
        array(
            'field' => 'about_section_options:background_settings:show_background',
            'value' => 'TRUE'
        ),
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'about_section_options:background_settings:background_type_showcase',
            'value' => 'color'
        )
    )
);

$bg_texture_page = array(
    'type'      => 'file',
    'field'     => 'bg_texture_page',
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
            'field' => 'about_section_options:background_settings:show_background',
            'value' => 'TRUE'
        ),
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'page'
        ),
        array(
            'field' => 'about_section_options:background_settings:background_type_page',
            'value' => 'texture'
        )
    )
);
$bg_texture_showcase = array(
    'type'      => 'file',
    'field'     => 'bg_texture_showcase',
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
            'field' => 'about_section_options:background_settings:show_background',
            'value' => 'TRUE'
        ),
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'about_section_options:background_settings:background_type_showcase',
            'value' => 'texture'
        )
    )
);

$bg_image_page = array(
    'type'      => 'file',
    'field'     => 'bg_image_page',
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
            'field' => 'about_section_options:background_settings:show_background',
            'value' => 'TRUE'
        ),
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'page'
        ),
        array(
            'field' => 'about_section_options:background_settings:background_type_page',
            'value' => 'image'
        )
    )
);
$bg_image_size_page = array(
    'type'      => 'radio',
    'field'     => 'bg_image_size_page',
    'label'     => __('Background size','sage'),
    'columns' => 6,
    'list' => false,
    'value' => 'content',
    'choices'   => array(
        'full'   => __('Full size','sage'),
        'content'        => __('Fit to content','sage')
    ),
    'conditions' => array(
        array(
            'field' => 'about_section_options:background_settings:show_background',
            'value' => 'TRUE'
        ),
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'page'
        ),
        array(
            'field' => 'about_section_options:background_settings:background_type_page',
            'value' => 'image'
        )
    )
);
$bg_image_showcase = array(
    'type'      => 'file',
    'field'     => 'bg_image_showcase',
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
            'field' => 'about_section_options:background_settings:show_background',
            'value' => 'TRUE'
        ),
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'about_section_options:background_settings:background_type_showcase',
            'value' => 'image'
        )
    )
);
$bg_image_size_showcase = array(
    'type'      => 'radio',
    'field'     => 'bg_image_size_showcase',
    'label'     => __('Background size','sage'),
    'columns' => 6,
    'list' => false,
    'value' => 'content',
    'choices'   => array(
        'full'   => __('Full size','sage'),
        'content'        => __('Fit to content','sage')
    ),
    'conditions' => array(
        array(
            'field' => 'about_section_options:background_settings:show_background',
            'value' => 'TRUE'
        ),
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'about_section_options:background_settings:background_type_showcase',
            'value' => 'image'
        )
    )
);
$bg_category = array(
    'type' => 'select',
    'label' => __('Image Media Category','sage'),
//    'help'  => __('If inverted color is checked, this section background will be colored instead','sage'),
    'field' => 'media_category',
    'columns' => 6,
    'value' => '',
    'choices' => \Experiensa\Modules\QueryBuilder::getTermsSlugByPTAndTaxonomy(['attachment'],['media_category']),
    'conditions' => array(
        array(
            'field' => 'about_section_options:background_settings:show_background',
            'value' => 'TRUE'
        ),
        array(
            'field' => 'about_section_options:content_settings:source_type',
            'value' => 'page'
        ),
        array(
            'field' => 'about_section_options:background_settings:background_type_page',
            'value' => 'slider'
        )
    )
//    'conditions' => array(
//        array(
//            'field' => 'about_section_options:background_settings:background_options:background_type',
//            'value' => 'slider'
//        )
//    )
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


/**
 *  Main Section Option Field Group
 */
$content_settings = array(
    'type' => 'group',
    'field' => 'content_settings',
    'fields' => array(
        $source_type,
        $pages,
        //Showcase Options
        $showcase_html_title,
        $showcase_component,
        $showcase_posttype,
        $showcase_categories,
        //Slider Options
        $slider_html_title,
        $slider_type,
        $slider_message,
        $showcase_terms,
        //TextImage Options
        $show_textimage,
        $ti_html_title,
        $ti_display_title,
        $ti_display_subtitle,
        $ti_display_overlay,
        $ti_text_order,
        $ti_text_position,
        $ti_text_transformation,
        $ti_font_size,
        $ti_text_color,
        //Layout Options
        $show_layout,
        $layout_html_title,
        $segment_container,
        $segment_content_color,
        $segment_title_alignment,
        $segment_title_color,
        $segment_title,
        $segment_subtitle,
    )
);

$background_settings = array(
    'type' => 'group',
    'field' => 'background_settings',
    'fields' => array(
        $bg_html_line,
        $show_background,
        $bg_html_title,
        $background_type_page,
        $background_type_showcase,
        $bg_color_page,
        $bg_color_inverted_page,
        $bg_color_showcase,
        $bg_color_inverted_showcase,
        $bg_texture_page,
        $bg_texture_showcase,
        $bg_image_page,
        $bg_image_size_page,
        $bg_image_showcase,
        $bg_image_size_showcase,
        $bg_category
    )
);

$dummy_field =array(
    'type'=>'hidden',
    'field'=>'dummy_field',
    'value' => 'dummy'
);


piklist('field',array(
    'type' => 'group',
    'field' => 'about_section_options',
    'label' => __('Section options','sage'),
    'add_more' => true,
    'help'      => __('You can set the style to your custom template','sage'),
    'fields' => array(
        $dummy_field,
        $content_settings,
        $background_settings
    )
));
