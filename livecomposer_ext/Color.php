<?php namespace Experiensa\LiveComposer\Options;


class Color
{
    public static function titleColor($id = 'title_color'){
        return array(
            'label'   => __('Title Color', 'sage'),
            'id'      => $id,
            'std'     => '#000000',
            'type'    => 'color',
//            'refresh_on_change' => false,
            'section' => 'styling',
            'tab' => __('Color','sage')
        );
    }
    public static function contentColor($id = 'content_color'){
        return array(
            'label'   => __('Content Color', 'sage'),
            'id'      => $id,
            'std'     => '#000000',
            'type'    => 'color',
//            'refresh_on_change' => false,
            'section' => 'styling',
            'tab' => __('Color','sage')
        );
    }
}