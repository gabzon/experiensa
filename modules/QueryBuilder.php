<?php namespace Experiensa\Modules;

use WP_Query;

class QueryBuilder
{
    public static function getPostTypes(){
        $cpt = get_post_types();
        $cpt['none'] = __('None','sage');
        return $cpt;
    }
    public static function getTaxonomies($args=[],$output='names'){
        $taxonomies = get_taxonomies($args,$output);
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
    public static function getPostBasicInfo($post_type,$taxonomy,$terms){
        $posts = self::getPostByPostTypeTaxonomyAndTerm($post_type,$taxonomy,$terms);
        $data = array();
        if(!empty($posts)) {
            foreach ($posts as $post) {
                $id = $post->ID;
                $image = false;
                if(in_array('voyage',$post_type)) {
                    $images = \Voyage::get_voyage_images_list($id);
                    if(!empty($images)) {
                        $image = $images[0];
                    }
                }else {
                    if(in_array('attachment',$post_type)) {
                        $feat_image = wp_get_attachment_url($id);
                        if ($feat_image) {
                            $image = $feat_image;
                        }
                    }else {
                        $feat_image = wp_get_attachment_url(get_post_thumbnail_id($id));
                        if ($feat_image) {
                            $image = $feat_image;
                        }
                    }
                }

                $title = get_the_title($id);
                $excerpt = self::getPostExcerpt($id);
                $url = get_permalink($id);
                if ($excerpt === false || empty($excerpt)) {
                    $excerpt = self::getPostContent($id);
                    if ($excerpt === false || empty($excerpt))
                        $excerpt = '';
                    else
                        $excerpt = substr($excerpt, 0, 30) . '...';
                }
                $content = self::getPostContent($id);
                $row['id'] = $id;
                $row['title'] = $title;
                $row['content'] = $content;
                $row['excerpt'] = $excerpt;
                $row['url'] = $url;
                if($image && !empty($image))
                    $row['image'] = $image;
                else
                    $row['image'] = get_stylesheet_directory_uri() . '/assets/images/mauritius.jpg';
                $data[] = $row;
            }
        }
        return $data;
    }
    public static function getTermsByTaxonomy($taxonomy){
        return get_terms($taxonomy, 'orderby=none&hide_empty');
    }
    public static function checkMetaFieldExist($id,$key,$single=true){
        $meta = get_post_meta($id,$key,$single);
        if($single){
            return ($meta != '');
        }else{
            return (!empty($meta));
        }
    }
    public static function getPostExcerpt($id){
        $post = get_post($id);
        $excerpt = false;
        if(isset($post->post_excerpt))
            $excerpt = $post->post_excerpt;
        return $excerpt;
    }
    public static function getPostContent($id){
        $post = get_post($id);
        $post_content = false;
        if(isset($post->post_content))
            $post_content = $post->post_content;
        return $post_content;
    }
}