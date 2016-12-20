<?php namespace Experiensa\LiveComposer\Options;


class Background
{
    public static function type($id='background_type'){
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
    public static function color($id='background_color'){
        return array(
            'label'   => __('Color', 'sage'),
            'id'      => $id,
            'std'     => '',
            'type'    => 'select',
            'choices' => array(
                array('label' => __('No color', 'sage'), 'value' => ''),
                array('label' => __('Red', 'sage'), 'value' => 'red'),
                array('label' => __('Orange', 'sage'), 'value' => 'orange'),
                array('label' => __('Yellow', 'sage'), 'value' => 'yellow'),
                array('label' => __('Olive', 'sage'), 'value' => 'olive'),
                array('label' => __('Green', 'sage'), 'value' => 'green'),
                array('label' => __('Teal', 'sage'), 'value' => 'teal'),
                array('label' => __('Blue', 'sage'), 'value' => 'blue'),
                array('label' => __('Violet', 'sage'), 'value' => 'violet'),
                array('label' => __('Purple', 'sage'), 'value' => 'purple'),
                array('label' => __('Pink', 'sage'), 'value' => 'pink'),
                array('label' => __('Brown', 'sage'), 'value' => 'brown'),
                array('label' => __('Grey', 'sage'), 'value' => 'grey'),
                array('label' => __('Black', 'sage'), 'value' => 'black'),
                array('label' => __('Default website', 'sage'), 'value' => 'website'),
            ),
            'section' => 'styling',
            'tab' => __('Background','sage')
        );
    }
    public static function colorInverted($id='color_inverted'){
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
    public static function setBackgroundOption($options = []){
        $type = $options['background_type'];
//        $background['type'] = $options['background_type'];
        $background['style'] = '';
        $background['class'] = '';
        $background['size'] = '';
        $background['type'] = $type;
        if($type == 'color'){
            $background['color'] = get_the_color($options['background_color'], $options['color_inverted']);
        }
        return $background;
    }
}