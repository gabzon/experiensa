<?php namespace Experiensa\LiveComposer\Options;

use Experiensa\Component\Background as BG;

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
            'dependent_controls' => array(
                'color' => 'background_color,color_inverted',
                'image' => 'image_size,opacity_value,opacity_color'
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
    public static function colorInverted($id='color_inverted',$default=''){
        return array(
            'label'   => __('Color inverted', 'sage'),
            'id'      => $id,
            'std'     => $default,
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
    public static function image($id='background_image'){
        return array(
            'label' => __( 'Background Image', 'sage' ),
            'id' => $id,
            'std' => '',
            'type' => 'image',
            'section' => 'styling',
            'tab' => __('Background','sage')
        );
    }
    public static function imageSize($id='image_size',$default=''){
        return array(
            'label'   => __('Color inverted', 'sage'),
            'id'      => $id,
            'std'     => $default,
            'type'    => 'select',
            'choices' => array(
                array(
                    'label' => __('Full size','sage'),
                    'value' => 'full'
                ),
                array(
                    'label' => __('Fit to content','sage'),
                    'value' => 'content'
                )
            ),
            'section' => 'styling',
            'tab' => __('Background','sage')
        );
    }
    public static function opacityValue($id='opacity_value',$default='0.05'){
        return array(
            'label'   => __('Opacity Value', 'sage'),
            'id'      => $id,
            'std'     => $default,
            'type'    => 'slider',
            'max' => 1,
            'increment' => 0.01,
            'onlypositive' => true,
            'refresh_on_change' => false,
            'section' => 'styling',
            'tab' => __('Background','sage')
        );
    }
    public static function opacityColor($id = 'opacity_color',$default='#000000'){
        return array(
            'label'   => __('Opacity Color', 'sage'),
            'id'      => $id,
            'std'     => $default,
            'type'    => 'color',
            'refresh_on_change' => false,
            'section' => 'styling',
            'tab' => __('Background','sage')
        );
    }
    public static function setBackgroundOption($options = []){
        $type = $options['background_type'];
        $background['style'] = '';
        $background['class'] = '';
        $background['size'] = '';
        $background['color'] = '';
        $background['type'] = $type;
        switch ($type){
            case 'texture':
                $background['style'] = BG::getBgTexture($options['background_image']);
                break;
            case 'image':
                $background['style'] = BG::getBackgroundImage(
                    $options['background_image'],
                    $options['image_size'],
                    $options['opacity_value'],
                    $options['opacity_color']
                );
                break;
            default:
                $background['color'] = get_the_color($options['background_color'], $options['color_inverted']);
                break;
        }
        return $background;
    }
}