<?php namespace Experiensa\Modules;

use WP_Query;

class QueryBuilder
{
    public static function getPostTypes(){
        $cpt_list = get_post_types();
        $post_types = array();
        foreach ($cpt_list as $cpt){
            if($cpt === 'jetpack-testimonial')
                $post_types[$cpt] = 'Testimonial';
            else
                $post_types[$cpt] = ucwords(str_replace('_',' ',$cpt));
        }
        $post_types['none'] = __('None','sage');
        $post_types['team'] = __('Team','sage');
        return $post_types;
    }
    public static function checkPostTypeExist($cpt){
        return post_type_exists($cpt);
    }
    public static function getTaxonomies($args=[],$output='names'){
        $taxonomies_list = get_taxonomies($args,$output);
        $taxonomies = array();
        foreach ($taxonomies_list as $taxonomy){
            $taxonomies[$taxonomy] = ucwords(str_replace('_',' ',$taxonomy));
        }
        $taxonomies['location'] = __('Destinations','sage');
        $taxonomies['all'] = __('All Posts','sage');
        $taxonomies['news'] = __('News','sage');
        return $taxonomies;
    }
    public static function getTermsByTaxonomy($taxonomy,$terms = array()){
        if(!empty($terms)){
            $args = array(
                'taxonomy'   => $taxonomy,
                'orderby'    => 'none',
                'slug'       => $terms,
                'hide_empty' => true,
            );

        }else {
            $args = array(
                'taxonomy'   => $taxonomy,
                'orderby'    => 'none',
                'hide_empty' => true,
            );
        }
        $terms = get_terms($args);
        return $terms;
    }
    public static function getPostByArguments($post_type,$taxonomy,$terms,$limit=-1){
//        echo "<h3>getPostByArguments </h3> pt $post_type - tax $taxonomy - limit $limit";
        if(empty($terms))
            $terms = QueryBuilder::getTermsByTaxonomy($taxonomy);
        else {
            $terms = QueryBuilder::getTermsByTaxonomy($taxonomy, $terms);
            if(empty($terms))
                $terms = QueryBuilder::getTermsByTaxonomy($taxonomy);
        }

        $args = array (
            'posts_per_page' => $limit,
            'post_type'      => array($post_type),
            'post_status'    => array('publish', 'inherit'),
            'tax_query'      => array(
                array(
                    'taxonomy' => $taxonomy,
                    'field'    => 'slug',
                    'terms'    => wp_list_pluck($terms, 'slug')
                )
            )
        );
        $query = new WP_Query($args);
        return $query;
    }
    public static function getPosts($limit = 4){
        $args = array(
            'numberposts' => $limit,
            'order'=> 'ASC',
            'orderby' => 'title'
        );
        $posts = get_posts($args);
        return $posts;
    }
    public static function getPostByPostType($post_type,$limit = -1){
        $pt = (is_array($post_type)?$post_type:array($post_type));
        $args = array(
            'posts_per_page' => $limit,
            'post_type'      => $pt,
            'post_status'    => array('publish', 'inherit'),
            'order' => 'DESC',
        );
//        file_put_contents("debug_prueba.txt", "voy a buscar es: ",FILE_APPEND);
//        file_put_contents("debug_prueba.txt", var_export($args, true),FILE_APPEND);
        $query = new WP_Query($args);
//        file_put_contents("debug_prueba.txt", var_export($query, true),FILE_APPEND);
        return $query;
    }
    public static function getPostByPostTypeAndCategoryName($post_type,$category)
    {
        $args = array(
            'post_type' => $post_type,
            'category_name' => $category,
            'order' => 'DESC',
        );
        $query = new WP_Query($args);
        return $query->get_posts();
    }

    public static function getPostByPostTypeTaxonomyAndTerm($post_type,$taxonomy,$terms,$limit = -1){
        if($taxonomy=='all'){
            $query = self::getPostByPostType($post_type,$limit);
            return $query->get_posts();
        }else {
            $args = array(
                'post_type'      => $post_type,
                'posts_per_page' => $limit,
                'post_status'    => array('publish', 'inherit'),
                'tax_query'      => array(
                    array(
                        'taxonomy' => $taxonomy,
                        'field'    => 'slug',
                        'terms'    => $terms
                    )
                )
            );
            $query = get_posts($args);
            return $query;
        }
    }
    public static function getFeatureImage($id){
        $feat_image = wp_get_attachment_url(get_post_thumbnail_id($id));
        return $feat_image;
    }
    public static function getImagesByPostType($post_type,$taxonomy,$terms,$limit=-1){
        $posts = self::getPostByPostTypeTaxonomyAndTerm($post_type,$taxonomy,$terms,$limit);
        $images = array();
//        file_put_contents("debug_prueba.txt",var_export($posts, true),FILE_APPEND);
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
    public static function getPostBasicInfo($post_type,$taxonomy,$terms,$all_content = true,$limit=-1,$get_post=false){
        if($taxonomy=='all') {
//            file_put_contents("debug_prueba.txt", "VOY A ALL!",FILE_APPEND);
//            file_put_contents("debug_prueba.txt", $post_type,FILE_APPEND);
//            file_put_contents("debug_prueba.txt", "***".$post_type[0]."***",FILE_APPEND);
//            file_put_contents("debug_prueba.txt", "***LIMIT ES ".$limit."***",FILE_APPEND);
            $posts = self::getPostByPostType($post_type[0],$limit);
            $posts = ($get_post?$posts->get_posts():$posts);
        }else {
            $posts = self::getPostByPostTypeTaxonomyAndTerm($post_type, $taxonomy, $terms);
        }
        $data = array();
        if(!empty($posts)) {
            foreach ($posts as $post) {
                $id = $post->ID;
                $image = false;
                if(in_array('voyage',$post_type)) {
//                    file_put_contents("debug_prueba.txt", " VOY por VOYAGE  ",FILE_APPEND);
                    $images = \Voyage::get_voyage_images_list($id);
                    if(!empty($images)) {
                        $image = $images[0];
                    }
                }else {
//                    file_put_contents("debug_prueba.txt", "VOY POR OTRO!",FILE_APPEND);
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
                    else {
                        if(!$all_content)
                            $excerpt = substr($excerpt, 0, 30) . '...';
                    }
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
//    public static function getTermsByTaxonomy($taxonomy){
//        return get_terms($taxonomy, 'orderby=none&hide_empty');
//    }
    public static function getTermsByPostTypeAndTaxonomy($post_types,$taxonomies){
        global $wpdb;

        $query = $wpdb->prepare(
        "SELECT 
        t.*, COUNT(*) from $wpdb->terms AS t
        INNER JOIN $wpdb->term_taxonomy AS tt ON t.term_id = tt.term_id
        INNER JOIN $wpdb->term_relationships AS r ON r.term_taxonomy_id = tt.term_taxonomy_id
        INNER JOIN $wpdb->posts AS p ON p.ID = r.object_id
        WHERE p.post_type IN('%s') AND tt.taxonomy IN('%s')
        GROUP BY t.term_id",
            join( "', '", $post_types ),
            join( "', '", $taxonomies )
        );
        $results = $wpdb->get_results( $query );
        return $results;
    }
    public static function getTermsSlugByPTAndTaxonomy($post_types,$taxonomies){
        $slug_list = self::getTermsByPostTypeAndTaxonomy($post_types,$taxonomies);
        $slugs = array();
        foreach ($slug_list as $slug){
            $slugs[$slug->slug] = ucwords(str_replace('_',' ',$slug->name));
        }
        return $slugs;
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
    public static function getUsersByRoles($roles = ['agent']){
        if(!is_array($roles)){
            $roles = [$roles];
        }
        $args = array(
            "role"      => $roles
        );
        $users = get_users($args);
        return $users;
    }
    public static function  getUserBasicInfo($user){
        $info = array();
        if(!empty($user)) {
            $info['ID'] = $user->ID;
            $info['username'] = $user->data->user_login;
            $info['name'] = $user->data->display_name;
            $info['email'] = $user->data->user_email;
            $info['registered_date'] = $user->data->user_registered;
            $info['url'] = $user->data->user_url;
        }
        return $info;
    }
}