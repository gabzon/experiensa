<?php
/*
Title: Section Settings
Setting: experiensa_design_settings
Tab: Sections
Flow: Design
*/

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
$ti_html_title = array(
    'type'      => 'html',
    'template'  => 'field',
    'field'     => 'ti_html_title', // 'field' is only required for a settings page.
    'value'     => '<h4>'.__('Textimage Options','sage').'</h4><hr>',
);
$showcase_textimage_settings = array(
    'type' => 'group',
    'field' => 'textimage_options',
    'fields' => array(
        $ti_html_title,
        $ti_font_size,
        $ti_text_color,
        $ti_text_transformation,
        $ti_text_order,
        $ti_text_position,
        $ti_display_title,
        $ti_display_subtitle,
        $ti_display_overlay
    ),
    'conditions' => array(
        array(
            'field' => 'section_options:segment_options:content_source_options:source_type',
            'value' => 'showcase'
        )
    )
);

/**
 *  Showcase Options
 */
//$showcase_title_html = array(
//    'type'      => 'html',
//    'template'  => 'field',
//    'field'     => 'showcase_title_html', // 'field' is only required for a settings page.
//    'value'     => '<h4>'.__('Showcase Options','sage').'</h4><hr>'
//);

$cpt = get_post_types();
$cpt['none'] = __('None','sage');

$showcase_posttype = array(
    'type'      => 'select',
    'field'     => 'posttype',
    'value'     => 'none',
    'label'     => __('Post Type to Show','sage'),
    'columns'   => 3,
    'choices'   => $cpt
);

$showcase_categories = array(
    'type'      => 'select',
    'field'     => 'category',
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
    'field'     => 'component',
    'value'     => 'carousel',
    'label'     => __('Component','sage'),
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
$showcase_html_title = array(
    'type'      => 'html',
    'template'  => 'field',
    'field'     => 'showcase_html_title', // 'field' is only required for a settings page.
    'value'     => '<h4>'.__('Showcase Options','sage').'</h4><hr>',
);
//
//  Showcase Options Group Field
//
$showcase_options = array(
    'type' => 'group',
    'field' => 'showcase_options',
    'fields' => array(
        $showcase_html_title,
        $showcase_posttype,
        $showcase_categories,
        $showcase_component,
        $showcase_textimage_settings
    ),
    'conditions' => array(
        array(
            'field' => 'section_options:segment_options:content_source_options:source_type',
            'value' => 'showcase'
        )
    )
);

/**
 *  Segment Options
 */
$segment_container = array(
    'type'      => 'select',
    'label' => __('Container','sage'),
    'help'  => __('The content can be set in a container or not','sage'),
    'field'     => 'container',
    'columns'   => 3,
    'value'     => '',
    'choices'   => array(
        ''              => __('Full width','sage'),
        'container'           => __('Container','sage'),
    )
);

$segment_title_alignment = array(
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
/**
 *  Segment Background Options
 */
$segment_background_type = array(
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

$segment_bg_color = array(
    'type'      => 'select',
    'label' => __('Color','sage'),
    'help'  => __('Only the top border will be colored, check inverse color if you want to color the background instead','sage'),
    'field'     => 'background_color',
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
    'conditions' => array(
        array(
            'field' => 'section_options:segment_options:background_type',
            'value' => 'color'
        )
    )
);

$segment_color_inverted = array(
    'type' => 'select',
    'label' => __('Background style','sage'),
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
            'field' => 'section_options:segment_options:background_type',
            'value' => 'color'
        )
    )
);

$segment_bg_texture = array(
    'type'      => 'file',
    'field'     => 'bg_texture',
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
            'field' => 'section_options:segment_options:background_type',
            'value' => 'texture'
        )
    )
);

$segment_bg_image = array(
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
            'field' => 'section_options:segment_options:background_type',
            'value' => 'image'
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
    'columns'   => 3,
    'choices'   => Helpers::getPagesFromCurrentLanguage(),
    'conditions' => array(
        array(
            'field' => 'section_options:segment_options:content_source_options:source_type',
            'value' => 'page'
        )
    )
);
/**
 *  Slider Options
 */
$slider_post = array(
    'type'      => 'select',
    'label' => __('Post to show','sage'),
    'field'     => 'post_type',
    'columns'   => 3,
    'choices'   => \Experiensa\Modules\QueryBuilder::getPostTypes(),
    'conditions' => array(
        array(
            'field' => 'section_options:segment_options:content_source_options:source_type',
            'value' => 'slider'
        ),
        array(
            'field' => 'section_options:segment_options:content_source_options:slider_options:slider_type',
            'value' => 'posts'
        )
    )
);
$slider_category = array(
    'type'      => 'select',
    'label' => __('Categories to show','sage'),
    'field'     => 'taxonomy',
    'columns'   => 3,
    'choices'   => \Experiensa\Modules\QueryBuilder::getTaxonomies(),
    'conditions' => array(
        array(
            'field' => 'section_options:segment_options:content_source_options:source_type',
            'value' => 'slider'
        ),
    )
);
$slider_terms = array(
    'type' => 'text',
    'field' => 'terms',
    'label' => __('Categories to search','sage'),
    'columns'   => 6,
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('You can enter here the categories separated by commas','sage')
    ),
    'conditions' => array(
        array(
            'field' => 'section_options:segment_options:content_source_options:source_type',
            'value' => 'slider'
        )
    )
);
$slider_message = array(
    'type' => 'text',
    'field' => 'message',
    'label' => __('Slider Message','sage'),
    'columns'   => 5,
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('Enter your message here','sage')
    ),
    'conditions' => array(
        array(
            'field' => 'section_options:segment_options:content_source_options:source_type',
            'value' => 'slider'
        ),
        array(
            'field' => 'section_options:segment_options:content_source_options:slider_options:slider_type',
            'value' => 'message'
        )
    )
);
$slider_type = array(
    'type'      => 'select',
    'label' => __('Slider type to show','sage'),
    'field'     => 'slider_type',
    'columns'   => 5,
    'choices'   => array(
        'message'   =>  __('Message and categorized images','sage'),
        'posts'     =>  __('Posts','sage')
    ),
);

$slider_options = array(
    'type' => 'group',
    'field' => 'slider_options',
    'fields' => array(
        $slider_type,
        $slider_message,
        $slider_post,
        $slider_category,
        $slider_terms
    ),
    'conditions' => array(
        array(
            'field' => 'section_options:segment_options:content_source_options:source_type',
            'value' => 'slider'
        )
    )
);
$source_type = array(
    'type'      => 'select',
    'label' => __('Content Source Type','sage'),
    'help'  => __('Here you can select what type of content displayed in the segment','sage'),
    'field'     => 'source_type',
    'columns'   => 3,
    'value'     => 'page',
    'choices'   => array(
        'page'              => __('Page','sage'),
        'showcase'           => __('Showcase','sage'),
        'slider'    => __('Slider','sage')
    )
);

$segment_content_source = array(
    'type' => 'group',
    'field' => 'content_source_options',
    'fields' => array(
        $source_type,
        $pages,
        $showcase_options,
        $slider_options
    )
);
$segment_html_title = array(
    'type'      => 'html',
    'template'  => 'field',
    'field'     => 'segment_html_title', // 'field' is only required for a settings page.
    'value'     => '<h4>'.__('Segment Options','sage').'</h4><hr>',
);
//
//  Segment Options Group Field
//
$segment_options = array(
    'type' => 'group',
    'field' => 'segment_options',
    'add_more' => true,
    'fields' => array(
//        $segment_html_title,
        $segment_container,
        $segment_title_alignment,
        $segment_title,
        $segment_subtitle,
        $segment_background_type,
        $segment_content_source,
        $segment_bg_color,
        $segment_color_inverted,
        $segment_bg_texture,
        $segment_bg_image
    )
);

//
//  Segment Template Field
//
$pages_template = Helpers::getPagesByTemplate('section.php');
//$template_names = Helpers::getPageTemplateNames();
$pages = array(
    'type'      => 'select',
    'field'     => 'pages',
    'label'     => __('Page Name','sage'),
    'help'      => __('You can select the page to which you will add segments','sage'),
    'columns'   => 4,
    'choices'   => $pages_template
);

/**
 *  Main Section Option Field Group
 */
piklist('field',array(
    'type' => 'group',
    'field' => 'section_options',
    'label' => __('Section options','sage'),
    'help'      => __('You can set the style to your custom template','sage'),
    'add_more' => true,
    'fields' => array(
        $pages,
        $segment_options
    )
));