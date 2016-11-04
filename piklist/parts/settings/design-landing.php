<?php
/*
Title: Landing Page Settings
Setting: experiensa_design_settings
Tab: Landing
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
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:component',
            'value' => 'slider',
            'compare' => '!='
        ),
    )
);

$ti_html_title = array(
    'type'      => 'html',
    'template'  => 'field',
    'columns'   => 12,
    'field'     => 'ti_html_title',
    'value'     => '<h4>'.__('Textimage Options','sage').'</h4><hr>',
    'conditions' => array(
        array(
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:show_textimage',
            'value' => 'TRUE'
        )
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
    ),
    'conditions' => array(
        array(
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:show_textimage',
            'value' => 'TRUE'
        )
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
    ),
    'conditions' => array(
        array(
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:show_textimage',
            'value' => 'TRUE'
        )
    )
);
$ti_display_overlay = array(
    'type'      => 'select',
    'label' => __('Display Overlay?','sage'),
    'field'     => 'display_overlay',
    'columns'   => 3,
    'value'     => 'yes',
    'choices'   => array(
        'yes'           => __('Yes','sage'),
        'no'           => __('No','sage'),
    ),
    'conditions' => array(
        array(
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:show_textimage',
            'value' => 'TRUE'
        )
    )
);
$ti_hover_animation = array(
    'type'      => 'select',
    'label' => __('Hover Animation','sage'),
    'field'     => 'hover_animation',
    'columns'   => 3,
    'value'     => 'yes',
    'choices'   => Helpers::getHoverEffectList(),
    'conditions' => array(
        array(
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:show_textimage',
            'value' => 'TRUE'
        ),
        array(
            'field' => 'landing_section:display_overlay',
            'value' => 'yes'
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
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:show_textimage',
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
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:show_textimage',
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
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:show_textimage',
            'value' => 'TRUE'
        )
    )
);

$ti_font_size = array(
    'type'      => 'number',
    'label' => __('Text Size','sage'),
    'help'  => __('em font size type','sage'),
    'field'     => 'font_size',
    'columns'   => 3,
    'default'     => 0.3,
    'attributes' => array(
        'step' => 0.1,
        'min'  => 0.1,
        'max'  => 3
    ),
    'conditions' => array(
        array(
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:show_textimage',
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
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:show_textimage',
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
            'field' => 'landing_section:source_type',
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
            'field' => 'landing_section:source_type',
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
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        )
    )
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
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        )
    )
);
$showcase_terms = array(
    'type' => 'text',
    'field' => 'terms',
    'label' => __('Categories','sage'),
    'columns'   => 10,
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('You can enter here the categories separated by commas','sage')
    ),
    'conditions' => array(
        array(
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:category',
            'value' => array('all','news'),
            'compare' => '!='
        )
    )
);
$showcase_max_post = array(
    'type' => 'number',
    'field' => 'max',
    'label' => __('Max post #','sage'),
    'columns'   => 2,
    'value' => '2',
    'attributes' => array(
        'min'  => -1
    ),
    'conditions' => array(
        array(
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        )
    )
);
$showcase_column = array(
    'type'      => 'select',
    'field'     => 'columns',
    'value'     => 'four',
    'label'     => __('Column #','sage'),
    'columns'   => 3,
    'choices'   => array(
        'eight'     => '2',
        'five'     => '3',
        'four'     => '4',
        'three'     => '5',
        'two'     => '8',
    ),
    'conditions' => array(
        array(
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:component',
            'value' => 'grid'
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
    'field'     => 'slider_html_title',
    'value'     => '<h4>'.__('Photo Slider Options','sage').'</h4><hr>',
    'conditions' => array(
        array(
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:component',
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
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:component',
            'value' => 'slider'
        )
    )
);
$slider_title = array(
    'type' => 'text',
    'field' => 'slider_title',
    'label' => __('Slider Title','sage'),
    'columns'   => 4,
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('Enter your title here','sage')
    ),
    'conditions' => array(
        array(
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:component',
            'value' => 'slider'
        ),
        array(
            'field' => 'landing_section:slider_type',
            'value' => 'message'
        )
    )
);
$slider_subtitle = array(
    'type' => 'text',
    'field' => 'slider_subtitle',
    'label' => __('Slider Subtitle','sage'),
    'columns'   => 4,
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('Enter your subtitle here','sage')
    ),
    'conditions' => array(
        array(
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:component',
            'value' => 'slider'
        ),
        array(
            'field' => 'landing_section:slider_type',
            'value' => 'message'
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
    'field'     => 'layout_html_title',
    'value'     => '<h4>'.__('Layout Options','sage').'</h4><hr>',
    'conditions' => array(
        array(
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:show_layout',
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
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:show_layout',
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
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:show_layout',
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
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:show_layout',
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
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:show_layout',
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
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:show_layout',
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
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:show_layout',
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
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:component',
            'value' => 'slider',
            'compare' => '!='
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
    'columns'   => 4,
    'value'     => 'page',
    'choices'   => array(
        'page'              => __('Page','sage'),
        'showcase'           => __('Showcase','sage'),
        'template'           => __('Template','sage')
    )
);
$pages = array(
    'type'      => 'select',
    'label' => __('Page to show','sage'),
    'field'     => 'pages',
    'columns'   => 4,
    'choices'   => Helpers::getPagesFromCurrentLanguage(),
    'conditions' => array(
        array(
            'field' => 'landing_section:source_type',
            'value' => 'page'
        )
    )
);
$show_template = array(
    'type'      => 'select',
    'label' => __('Show Template','sage'),
    'field'     => 'show_template',
    'columns'   => 4,
    'value'     => 'FALSE',
    'choices'   => array(
        'FALSE'          => __('No template','sage'),
        'TRUE'           => __('Show','sage')
    ),
    'conditions' => array(
        array(
            'field' => 'landing_section:source_type',
            'value' => 'page'
        )
    )
);
$templates = array(
    'type'      => 'select',
    'label' => __('Templates','sage'),
    'field'     => 'template',
    'columns'   => 4,
    'choices'   => array(
        Helpers::getPageTemplateNames()
    ),
    'conditions' => array(
        array(
            'field' => 'landing_section:source_type',
            'value' => 'template'
        )
    )
);
/**
 * Background Options
 */
$bg_html_line = array(
    'type'      => 'html',
    'template'  => 'field',
    'columns'   => 12,
    'field'     => 'bg_html_line',
    'value'     => '<hr>',
);
$bg_html_title = array(
    'type'      => 'html',
    'template'  => 'field',
    'columns'   => 12,
    'field'     => 'bg_html_title',
    'value'     => '<h4>'.__('Background Options','sage').'</h4><hr>',
    'conditions' => array(
        array(
            'field' => 'landing_section:background_settings:show_background',
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
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:show_background',
            'value' => 'TRUE'
        )
    )
);
$bg_html_title = array(
    'type'      => 'html',
    'template'  => 'field',
    'columns'   => 12,
    'field'     => 'bg_html_title', // 'field' is only required for a settings page.
    'value'     => '<h4>'.__('Background Options','sage').'</h4><hr>',
    'conditions' => array(
        array(
            'field' => 'landing_section:show_background',
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
            'field' => 'landing_section:source_type',
            'value' => 'page'
        ),
        array(
            'field' => 'landing_section:show_background',
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
            'field' => 'landing_section:show_background',
            'value' => 'TRUE'
        ),
        array(
            'field' => 'landing_section:source_type',
            'value' => 'page'
        ),
        array(
            'field' => 'landing_section:background_type_page',
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
            'field' => 'landing_section:show_background',
            'value' => 'TRUE'
        ),
        array(
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:background_type_showcase',
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
            'field' => 'landing_section:show_background',
            'value' => 'TRUE'
        ),
        array(
            'field' => 'landing_section:source_type',
            'value' => 'page'
        ),
        array(
            'field' => 'landing_section:background_type_page',
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
            'field' => 'landing_section:show_background',
            'value' => 'TRUE'
        ),
        array(
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:background_type_showcase',
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
            'field' => 'landing_section:show_background',
            'value' => 'TRUE'
        ),
        array(
            'field' => 'landing_section:source_type',
            'value' => 'page'
        ),
        array(
            'field' => 'landing_section:background_type_page',
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
            'field' => 'landing_section:show_background',
            'value' => 'TRUE'
        ),
        array(
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:background_type_showcase',
            'value' => 'texture'
        )
    )
);

$bg_image_page = array(
    'type'      => 'file',
    'field'     => 'bg_image_page',
    'label'     => __('Background image','sage'),
    'columns' => 3,
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
            'field' => 'landing_section:show_background',
            'value' => 'TRUE'
        ),
        array(
            'field' => 'landing_section:source_type',
            'value' => 'page'
        ),
        array(
            'field' => 'landing_section:background_type_page',
            'value' => 'image'
        )
    )
);
$bg_image_size_page = array(
    'type'      => 'radio',
    'field'     => 'bg_image_size_page',
    'label'     => __('Background size','sage'),
    'columns' => 4,
    'list' => false,
    'value' => 'content',
    'choices'   => array(
        'full'   => __('Full size','sage'),
        'content'        => __('Fit to content','sage')
    ),
    'conditions' => array(
        array(
            'field' => 'landing_section:show_background',
            'value' => 'TRUE'
        ),
        array(
            'field' => 'landing_section:source_type',
            'value' => 'page'
        ),
        array(
            'field' => 'landing_section:background_type_page',
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
            'field' => 'landing_section:show_background',
            'value' => 'TRUE'
        ),
        array(
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:background_type_showcase',
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
            'field' => 'landing_section:show_background',
            'value' => 'TRUE'
        ),
        array(
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:background_type_showcase',
            'value' => 'image'
        )
    )
);
$bg_opacity_page = array(
    'type'      => 'number',
    'label' => __('Opacity','sage'),
    'field'     => 'opacity_page',
    'columns'   => 1,
    'default'     => 0.01,
    'attributes' => array(
        'step' => 0.01,
        'min'  => 0.01,
        'max'  => 1
    ),
    'conditions' => array(
        array(
            'field' => 'landing_section:show_background',
            'value' => 'TRUE'
        ),
        array(
            'field' => 'landing_section:source_type',
            'value' => 'page'
        ),
        array(
            'field' => 'landing_section:background_type_page',
            'value' => 'image'
        )
    )
);
$bg_opacity_showcase = array(
    'type'      => 'number',
    'label' => __('Opacity','sage'),
    'field'     => 'opacity_showcase',
    'columns'   => 1,
    'default'     => 0.01,
    'attributes' => array(
        'step' => 0.01,
        'min'  => 0.01,
        'max'  => 1
    ),
    'conditions' => array(
        array(
            'field' => 'landing_section:show_background',
            'value' => 'TRUE'
        ),
        array(
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:background_type_showcase',
            'value' => 'image'
        )
    )
);
$bg_opacity_color_page = array(
    'type' => 'colorpicker',
    'field' => 'opacity_color_page',
    'label' => __('Opacity Color', 'sage'),
    'default' => '#FFFFFF',
    'columns'   => 3,
    'attributes' => array(
        'class' => 'small-text'
    ),
    'conditions' => array(
        array(
            'field' => 'landing_section:show_background',
            'value' => 'TRUE'
        ),
        array(
            'field' => 'landing_section:source_type',
            'value' => 'page'
        ),
        array(
            'field' => 'landing_section:background_type_page',
            'value' => 'image'
        )
    )
);
$bg_opacity_color_showcase = array(
    'type' => 'colorpicker',
    'field' => 'opacity_color_showcase',
    'label' => __('Opacity Color', 'sage'),
    'default' => '#FFFFFF',
    'columns'   => 3,
    'attributes' => array(
        'class' => 'small-text'
    ),
    'conditions' => array(
        array(
            'field' => 'landing_section:show_background',
            'value' => 'TRUE'
        ),
        array(
            'field' => 'landing_section:source_type',
            'value' => 'showcase'
        ),
        array(
            'field' => 'landing_section:background_type_showcase',
            'value' => 'image'
        )
    )
);
$bg_category = array(
    'type' => 'select',
    'label' => __('Image Media Category','sage'),
    'field' => 'media_category',
    'columns' => 6,
    'value' => '',
    'choices' => \Experiensa\Modules\QueryBuilder::getTermsSlugByPTAndTaxonomy(['attachment'],['media_category']),
    'conditions' => array(
        array(
            'field' => 'landing_section:show_background',
            'value' => 'TRUE'
        ),
        array(
            'field' => 'landing_section:source_type',
            'value' => 'page'
        ),
        array(
            'field' => 'landing_section:background_type_page',
            'value' => 'slider'
        )
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
    ),
    'conditions' => array(
        array(
            'field' => 'landing_section:component',
            'value' => 'slider',
            'compare' => '!='
        ),
        /*array(
            'field' => 'landing_section:source_type',
            'value' => 'template',
            'compare' => '!='
        ),*/
    )
);

$dummy_field =array(
    'type'=>'hidden',
    'field'=>'dummy_field',
    'value' => 'dummy'
);

piklist('field',array(
    'type' => 'group',
    'field' => 'landing_section',
    'label' => __('Section options','sage'),
    'add_more' => true,
    'help'      => __('You can set the style to your custom template','sage'),
    'fields' => array(
        $dummy_field,
        $source_type,
        $pages,
        $show_template,
        $templates,
        /**
         * Content Settings
         */
        //Showcase Options
        $showcase_html_title,
        $showcase_component,
        $showcase_posttype,
        $showcase_categories,
        $showcase_terms,
        $showcase_max_post,
        $showcase_column,
        //Slider Options
        $slider_html_title,
        $slider_type,
        $slider_title,
        $slider_subtitle,
//        //TextImage Options
        $show_textimage,
        $ti_html_title,
        $ti_display_title,
        $ti_display_subtitle,
        $ti_display_overlay,
        $ti_hover_animation,
        $ti_text_order,
        $ti_text_position,
        $ti_text_transformation,
        $ti_font_size,
        $ti_text_color,
//        //Layout Options
        $show_layout,
        $layout_html_title,
        $segment_container,
        $segment_content_color,
        $segment_title_alignment,
        $segment_title_color,
        $segment_title,
        $segment_subtitle,
        /**
         * Background Settings
         */
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
        $bg_opacity_page,
        $bg_opacity_color_page,
        $bg_opacity_showcase,
        $bg_opacity_color_showcase,
        $bg_category
    )
));