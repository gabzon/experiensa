<?php namespace Experiensa\LiveComposer\Options;


class Background
{
    public static function type($id='background_type_showcase'){
        return array(
            'label'             => __('Background Type', 'sage'),
            'id'                => $id,
            'std'               => 'color',
            'type'              => 'select',
            'refresh_on_change' => false,
            'choices'           => array(
                array(
                    'label' => __('Color', 'sage'),
                    'value' => 'color'
                ),
                array(
                    'label' => __('Texture', 'sage'),
                    'value' => 'texture'
                ),
                array(
                    'label' => __('Image', 'sage'),
                    'value' => 'image'
                )
            ),
            'section'           => 'styling',
            'tab'               => __('Background', 'sage')
        );
    }
    public static function color($id='background_color_showcase'){
        return array(
            'label'   => __('Color', 'sage'),
            'id'      => $id,
            'std'     => '',
            'type'    => 'select',
            'choices' => array(
                array(
                    'label' => __('No color','sage'),
                    'value' => ''
                ),
                array(
                    'label' => __('Red','sage'),
                    'value' => 'red'
                ),
                array(
                    'label' => __('Orange','sage'),
                    'value' => 'orange'
                )
            ),
            'section' => 'styling',
            'tab' => __('Background','sage')
        );
    }
    public static function colorInverted($id='color_inverted_showcase'){
        return array(
            'label'   => __('Color inverted', 'sage'),
            'id'      => $id,
            'std'     => '',
            'type'    => 'select',
            'choices' => array(
                array(
                    'label' => __('Simple','sage'),
                    'value' => ''
                ),
                array(
                    'label' => __('Inverted color','sage'),
                    'value' => 'inverted'
                )
            ),
            'section' => 'styling',
            'tab' => __('Background','sage')
        );
    }
}