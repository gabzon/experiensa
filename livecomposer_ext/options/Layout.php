<?php namespace Experiensa\LiveComposer\Options;


class Layout
{
    public static function container($id = 'container')
    {
        return array(
            'label'   => __('Container Type', 'sage'),
            'id'      => $id,
            'std'     => 'full',
            'type'    => 'select',
            'choices' => array(
                array(
                    'label' => __('Full width','sage'),
                    'value' => 'full'
                ),
                array(
                    'label' => __('Container','sage'),
                    'value' => 'container'
                )
            ),
            'section' => 'styling',
            'tab' => __('Layout','sage')
        );
    }
    public static function title($id='segment_title'){
        return array(
            'label' => __('Title', 'sage'),
            'id'    => $id,
            'std'   => '',
            'type'  => 'text',
            'section' => 'styling',
            'tab' => __('Layout','sage')
        );
    }
    public static function showTitle($id='showTitle'){
        return array(
            'label'   => __('Show Title', 'sage'),
            'id'      => $id,
            'std'     => 'true',
            'type'    => 'select',
            'choices' => array(
                array(
                    'label' => __('Yes','sage'),
                    'value' => 'true'
                ),
                array(
                    'label' => __('No','sage'),
                    'value' => 'false'
                )
            ),
            'section' => 'styling',
            'tab' => __('Layout','sage')
        );
    }
    public static function subtitle($id='segment_subtitle'){
        return array(
            'label' => __('Subtitle', 'sage'),
            'id'    => $id,
            'std'   => '',
            'type'  => 'text',
            'section' => 'styling',
            'tab' => __('Layout','sage')
        );
    }
    public static function showSubtitle($id='showSubtitle'){
        return array(
            'label'   => __('Show Subtitle', 'sage'),
            'id'      => $id,
            'std'     => 'false',
            'type'    => 'select',
            'choices' => array(
                array(
                    'label' => __('Yes','sage'),
                    'value' => 'true'
                ),
                array(
                    'label' => __('No','sage'),
                    'value' => 'false'
                )
            ),
            'section' => 'styling',
            'tab' => __('Layout','sage')
        );
    }
    public static function titleAlignment($id='title_alignment'){
        return array(
            'label'   => __('Title & Tagline Alignment', 'sage'),
            'id'      => $id,
            'std'     => 'center',
            'type'    => 'select',
            'choices' => array(
                array(
                    'label' => __('Center','sage'),
                    'value' => 'center'
                ),
                array(
                    'label' => __('Left','sage'),
                    'value' => 'left'
                ),
                array(
                    'label' => __('Right','sage'),
                    'value' => 'right'
                )
            ),
            'section' => 'styling',
            'tab' => __('Layout','sage')
        );
    }
    public static function setLayoutOptions($options = [],$category = 'all'){
        $layout['container_class'] = 'full';
        $layout['container_style'] = 'padding: 0px 15px 0 15px;';
        $layout['content_color'] = 'color:'.$options['content_color'].';';
        $layout['title_color'] = 'color:'.$options['title_color'].';';
        $layout['title_alignment'] = 'center aligned';
        $layout['title'] = ucwords(str_replace('_',' ',$category));
        $layout['subtitle'] = '';
        
        if ($options['container'] == 'container') {
            $layout['container_class'] = 'container';
            $layout['container_style'] = 'pepe:#asdsad;';
        }
        if(!empty($options['title_alignment'] ))
            $layout['title_alignment'] = get_the_aligment($options['title_alignment']);
        if(!empty($options['segment_title']))
            $layout['title'] = $options['segment_title'];
        if(!empty($options['segment_subtitle']))
            $layout['subtitle'] = $options['segment_subtitle'];
        if($options['showTitle'] == 'false')
            $layout['title'] = '';
        if($options['showSubtitle'] == 'false')
            $layout['subtitle'] = '';
        return $layout;
    }
}