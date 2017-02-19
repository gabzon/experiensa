<?php namespace Experiensa\LiveComposer\Options;

use \Experiensa\Modules\QueryBuilder;

class Query
{
    public static function postType($id = 'posttype',$default = 'post')
    {
        $pt = QueryBuilder::getPostTypes();
        $cpt = [];
        foreach ($pt as $key => $value) {
            $cpt[] = ['label' => $value, 'value' => $key];
        }
        return array(
            'label'   => __('Post Type', 'sage'),
            'id'      => $id,
            'std'     => $default,
            'type'    => 'select',
            'choices' => $cpt,
            'tab' => __('Query','sage')
        );
    }

    public static function taxonomies($id = 'category',$default = 'all')
    {
        $taxonomies = QueryBuilder::getTaxonomies();
        $tax = [];
        foreach ($taxonomies as $key => $value) {
            $tax[] = ['label' => $value, 'value' => $key];
        }
        return array(
            'label'   => __('Category', 'sage'),
            'id'      => $id,
            'std'     => $default,
            'type'    => 'select',
            'choices' => $tax,
            'tab' => __('Query','sage')
        );
    }

    public static function terms($id = 'terms',$default='')
    {
        return array(
            'label' => __('Categories', 'sage'),
            'id'    => $id,
            'std'   => $default,
            'type'  => 'text',
            'tab' => __('Query','sage')
        );
    }

    public static function max($id = 'max',$max = '2')
    {
        return array(
            'label'               => __('Max post #', 'sage'),
            'id'                  => $id,
            'std'                 => $max,
            'type'                => 'slider',
//            'refresh_on_change'   => false,
            'affect_on_change_el' => '.element-to-affect',
            'min'                 => -1,
            'max'                 => 50,
            'tab' => __('Query','sage')
        );
    }

    public static function columnGrid($id = 'columns')
    {
        return array(
            'label'   => __('Column #', 'sage'),
            'id'      => $id,
            'std'     => 'four',
            'type'    => 'select',
            'choices' => array(
                array(
                    'label' => '2',
                    'value' => 'eight'
                ),
                array(
                    'label' => '3',
                    'value' => 'five'
                ),
                array(
                    'label' => '4',
                    'value' => 'four'
                ),
                array(
                    'label' => '5',
                    'value' => 'three'
                ),
                array(
                    'label' => '8',
                    'value' => 'two'
                )
            ),
            'tab' => __('Query','sage')
        );
    }
    public static function setSectionName($component = 'component',$category = 'all',$title){
        $end_name = (!empty($title)?$title:$category);
        $name = "section_".$component."_".str_replace(' ', '_', strtolower($end_name));
        return $name;
    }
}