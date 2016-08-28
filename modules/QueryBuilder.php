<?php namespace Experiensa\Modules;


class QueryBuilder
{
    public static function getTaxonomiesByCustomPostType($post_type){
        $taxonomies = array();
        return $taxonomies;
    }
    public static function getPostByPostTypeAndCategoryName($post_type,$category)
    {
        $args = array(
            'post_type' => $post_type,
            'category_name' => $category,
            'order' => 'DESC',
        );
        $query = new WP_Query($args);
        return $query;
    }

}