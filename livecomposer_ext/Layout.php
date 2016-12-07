<?php namespace Experiensa\LiveComposer\Options;


class Layout
{
    public static function container($id = 'container')
    {
        return array(
            'label'   => __('Container Type', 'sage'),
            'id'      => $id,
            'std'     => '',
            'type'    => 'select',
            'choices' => array(
                array(
                    'label' => __('Full width','sage'),
                    'value' => 'eight'
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
}