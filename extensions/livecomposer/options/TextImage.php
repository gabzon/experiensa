<?php namespace Experiensa\LiveComposer\Options;

class TextImage
{
    public static function display($id = 'display_textimage'){
        return array(
            'label'   => __('Display TextImage?', 'sage'),
            'id'      => $id,
            'std'     => 'yes',
            'type'    => 'select',
            'choices' => array(
                array(
                    'label' => __('Yes', 'sage'),
                    'value' => 'yes'
                ),
                array(
                    'label' => __('No', 'sage'),
                    'value' => 'no'
                )
            ),
            'section' => 'styling',
            'tab' => __('TextImage','sage')
        );
    }
    public static function displayTitle($id = 'display_title'){
        return array(
            'label'   => __('Display Title?', 'sage'),
            'id'      => $id,
            'std'     => 'yes',
            'type'    => 'select',
            'choices' => array(
                array(
                    'label' => __('Yes', 'sage'),
                    'value' => 'yes'
                ),
                array(
                    'label' => __('No', 'sage'),
                    'value' => 'no'
                )
            ),
            'section' => 'styling',
            'tab' => __('TextImage','sage')
        );
    }
    public static function displaySubtitle($id = 'display_subtitle'){
        return array(
            'label'   => __('Display Subtitle?', 'sage'),
            'id'      => $id,
            'std'     => 'no',
            'type'    => 'select',
            'choices' => array(
                array(
                    'label' => __('Yes', 'sage'),
                    'value' => 'yes'
                ),
                array(
                    'label' => __('No', 'sage'),
                    'value' => 'no'
                )
            ),
            'section' => 'styling',
            'tab' => __('TextImage','sage')
        );
    }
    public static function displayOverlay($id = 'display_overlay'){
        return array(
            'label'   => __('Display Overlay?', 'sage'),
            'id'      => $id,
            'std'     => 'no',
            'type'    => 'select',
            'choices' => array(
                array(
                    'label' => __('Yes', 'sage'),
                    'value' => 'yes'
                ),
                array(
                    'label' => __('No', 'sage'),
                    'value' => 'no'
                )
            ),
            'section' => 'styling',
            'tab' => __('TextImage','sage')
        );
    }
    public static function hoverAnimation($id = 'hover_animation'){
        $animations = Helpers::getHoverEffectList();
        $ani = [];
        foreach ($animations as $key => $value){
            $ani[] = [
                'label' => $value,
                'value' => $key
            ];
        }
        return array(
            'label'   => __('Hover Animation', 'sage'),
            'id'      => $id,
            'std'     => 'imghvr-fade',
            'type'    => 'select',
            'choices' => $ani,
            'section' => 'styling',
            'tab' => __('TextImage','sage')
        );
    }
    public static function textOrder($id = 'text_order'){
        return array(
            'label'   => __('Display Title?', 'sage'),
            'id'      => $id,
            'std'     => 'title_first',
            'type'    => 'select',
            'choices' => array(
                array(
                    'label' => __('Title First', 'sage'),
                    'value' => 'title_first'
                ),
                array(
                    'label' => __('Subtitle First', 'sage'),
                    'value' => 'subtitle_first'
                )
            ),
            'section' => 'styling',
            'tab' => __('TextImage','sage')
        );
    }
    public static function fontSize($id = 'font_size'){
        return array(
            'label'   => __('Text Size', 'sage'),
            'id'      => $id,
            'std'     => '1.8',
            'type'    => 'text',
//            'refresh_on_change' => false,
//            'min' => 0.1,
//            'max' => 3,
//            'step' => 0.1,
            'section' => 'styling',
            'tab' => __('TextImage','sage')
        );
    }
    public static function textTransform($id = 'text_transform'){
        return array(
            'label'   => __('Text Transtransform', 'sage'),
            'id'      => $id,
            'std'     => 'capitalize',
            'type'    => 'select',
            'choices' => array(
                array(
                    'label' => __('Uppercase', 'sage'),
                    'value' => 'uppercase'
                ),
                array(
                    'label' => __('Lowercase', 'sage'),
                    'value' => 'lowercase'
                ),
                array(
                    'label' => __('Capitalize', 'sage'),
                    'value' => 'capitalize'
                )
            ),
            'section' => 'styling',
            'tab' => __('TextImage','sage')
        );
    }
    public static function textColor($id = 'text_color'){
        return array(
            'label'   => __('Text Color', 'sage'),
            'id'      => $id,
            'std'     => '#FFFFFF',
            'type'    => 'color',
            'refresh_on_change' => false,
            'section' => 'styling',
            'tab' => __('TextImage','sage')
        );
    }
    public static function textPosition($id = 'text_position'){
        return array(
            'label'   => __('Text Position', 'sage'),
            'id'      => $id,
            'std'     => 'center_middle',
            'type'    => 'select',
            'choices' => array(
                ['label'=>__('Top & Left','sage'),'value'=>'top_left'],
                ['label'=>__('Center & Left','sage'),'value'=>'center_left'],
                ['label'=>__('Bottom & Left','sage'),'value'=>'bottom_left'],
                ['label'=>__('Top & Middle','sage'),'value'=>'top_middle'],
                ['label'=>__('Center & Middle','sage'),'value'=>'center_middle'],
                ['label'=>__('Bottom & Middle','sage'),'value'=>'bottom_middle'],
                ['label'=>__('Top & Right','sage'),'value'=>'top_right'],
                ['label'=>__('Center & Right','sage'),'value'=>'center_right'],
                ['label'=>__('Bottom & Right','sage'),'value'=>'bottom_right'],
            ),
            'section' => 'styling',
            'tab' => __('TextImage','sage')
        );
    }
    public static function setTextImageOptions($options){
        $data['display_textimage'] = ($options['display_textimage']=='yes'?true:false);
        $data['display_title'] = $options['display_title'];
        $data['display_subtitle'] = $options['display_subtitle'];
        $data['display_overlay'] = $options['display_overlay'];
        $data['hover_animation'] = 'imghvr-fade';//$options['hover_animation'];
        $data['animation_color'] = "#000";//$options['animation_color'];
        $data['text_order'] = $options['text_order'];
        $data['text_position'] = $options['text_position'];
        $data['text_transform'] = $options['text_transform'];
        $data['font_size'] = $options['font_size'];
        $data['text_color'] = $options['text_color'];
        $textimage_obj = new \Experiensa\Component\Textimage($data);
        return $textimage_obj;
    }
    public static function setTextFontFamily($id = 'text_font', $default = 'Source Sans Pro', $tab = 'Content',$class='.catalog-title'){
        return array(
            'label' => __( 'Font Family', 'sage' ),
            'id' => $id,
            'std' => $default,//'Open Sans',
            'type' => 'font',
            'refresh_on_change' => false,
            'affect_on_change_el' => $class,
            'affect_on_change_rule' => 'font-family',
            'section' => 'styling',
            'tab' => __( $tab, 'sage' )
        );
    }
    public static function contentColor($id = 'content_color',$default='#000',$scope='.catalog-title',$section='styling',$tab='Content'){
        return array(
            'label'   => __('Content Color', 'sage'),
            'id'      => $id,
            'std'     => $default,
            'type'    => 'color',
            'refresh_on_change' => false,
            'affect_on_change_el' => $scope,
            'affect_on_change_rule' => 'color',
            'section' => $section,
            'tab' => __($tab,'sage')
        );
    }
}