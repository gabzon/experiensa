<?php namespace Experiensa\LiveComposer\Options;


class VillaBlanca
{
    public static function mainTitle($id = 'main_title',$label='Main Title',$default='Villa Blanca'){
        return array(
            'label'   => __($label, 'sage'),
            'id'      => $id,
            'std'     => $default,
            'type'    => 'text'
        );
    }
    public static function mainSubTitle($id = 'sub_title',$default='<strong>Close your eyes. Imagine your dream holidays. </strong><strong>Open your eyes: welcome to Villa Blanca.</strong>'){
        return array(
            'label'   => __('Subtitle', 'sage'),
            'id'      => $id,
            'std'     => $default,
            'type'    => 'textarea'
        );
    }
    public static function content($id = 'main_content',$label='Content',$default=''){
        return array(
            'label'   => __($label, 'sage'),
            'id'      => $id,
            'std'     => $default,
            'type'    => 'textarea'
        );
    }
}