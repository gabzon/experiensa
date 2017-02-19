<?php namespace Experiensa\LiveComposer\Options;


class Color
{
    public static function titleColor($id = 'title_color',$default='#FFF',$scope='.ui.header'){
        return array(
            'label'   => __('Title Color', 'sage'),
            'id'      => $id,
            'std'     => $default,
            'type'    => 'color',
            'refresh_on_change' => false,
            'affect_on_change_el' => $scope,
            'affect_on_change_rule' => 'color',
            'section' => 'styling',
            'tab' => __('Color','sage')
        );
    }
    public static function contentColor($id = 'content_color',$default='#000',$scope='.vertical.segment.section-content'){
        return array(
            'label'   => __('Content Color', 'sage'),
            'id'      => $id,
            'std'     => $default,
            'type'    => 'color',
            'refresh_on_change' => false,
            'affect_on_change_el' => $scope,
            'affect_on_change_rule' => 'color',
            'section' => 'styling',
            'tab' => __('Color','sage')
        );
    }
}