<?php namespace Experiensa\Modules;

use WP_Query;

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

    public static function getPostByPostTypeTaxonomyAndTerm($post_type,$taxonomy,$terms){
        $args = array(
            'post_type' => $post_type,
            'posts_per_page' => -1,
            'post_status'   => array( 'publish', 'inherit' ),
            'tax_query' => array(
                array(
                    'taxonomy' => $taxonomy,
                    'field' => 'slug',
                    'terms' => $terms
                )
            )
        );
        $query = get_posts($args);
        return $query;
    }
    public static function getImagesByPostType($post_type,$taxonomy,$terms){
        $posts = self::getPostByPostTypeTaxonomyAndTerm($post_type,$taxonomy,$terms);
        $images = array();
        if(!empty($posts)){
            foreach($posts as $post){
                $id = $post->ID;
                if(in_array('voyage',$post_type)) {
                    $voyage_images = \Voyage::get_voyage_images_list($id);
                    foreach ($voyage_images as $vimages) {
                        $images[] = $vimages;
                    }
                }else {
                    if(in_array('attachment',$post_type)) {
                        $feat_image = wp_get_attachment_url($id);
                        if ($feat_image)
                            $images[] = $feat_image;
                    }else {
                        $feat_image = wp_get_attachment_url(get_post_thumbnail_id($id));
                        if ($feat_image)
                            $images[] = $feat_image;
                    }
                }
            }
        }
        return $images;
    }

    public function getTermsByTaxonomy($taxonomy){
        return get_terms($taxonomy, 'orderby=none&hide_empty');
    }

}