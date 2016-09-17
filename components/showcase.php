<?php

use Experiensa\Modules\Users;
use \Experiensa\Modules\QueryBuilder;

class Showcase{
    public static function displayShowcase($args){
        include(locate_template('templates/partials/showcase/showcase.php'));
    }
    public static function display_showcase( $args, $return = false){
        $display = "";
        if( !empty( $args ) ) {
            $display .= "<section id=\"".$args['category']."\" class=\"ui basic ".get_the_color($args['color'], $args['inverted'])." vertical segment center aligned\">";
            $display .=     "<br><br>";
            $display .=     "<div class=\"ui container\">";
            $display .=         "<h1 class=\"ui ".get_the_aligment($args['title_alignment'])." huge header\">";
            $display .=             "<div class='content'>";
            $display .=                 (!$args['title'] ? __(ucfirst($args['category']),'sage'):$args['title']);
            $display .=                 "<div class='sub header'>".$args['subtitle']."</div>";
            $display .=             "</div>";
            $display .=         "</h1>";
            $query    = self::showcase_query( $args['posttype'] , $args['category']);

            if($query && $query->have_posts()){

                $display .=     "<div id='landing-showcase' class='landing-showcase'>";
                while ( $query->have_posts() ) :
                    $query->the_post();
                    $id = $query->post->ID;
                    $info = self::get_post_data( $args['posttype'], $args['category'], $id );
                    if ( !empty( $info ) ) {
                        $data[] = $info;
                    } else {
                        $data = array();
                    }
                endwhile;
                if(!empty($data))
                $display .= self::get_component($args['component'],$data);
                else{
                    $display .=         "<h3>".'Sorry! Currently there are no '.__(ucfirst($args['category']),'sage')."</h3>";
                }
                $display .=     "</div>";
            }else{
                $display .=         "<h3>".'Sorry! Currently there are no '.__(ucfirst($args['category']),'sage')."</h3>";
            }
            $display .=     "</div>";
            $display .=     "<br><br><br>";
            $display .= "</section>";
        }
        if(!$return){
            echo $display;
        }else{
            return $display;
        }
    }
    public static function displayComponent($component,$data,$textimage_option){
        switch($component){
            case 'carousel':
                include(locate_template('templates/partials/showcase/carousel/carousel.php'));
                break;
            case 'circular_grid':
                include(locate_template('templates/partials/showcase/grid/circular-grid.php'));
                break;
            case 'grid':
                include(locate_template('templates/partials/showcase/grid/grid.php'));
                break;
            case 'card':
                include(locate_template('templates/partials/showcase/card/card.php'));
                break;
            case 'button':
                include(locate_template('templates/partials/showcase/button/button.php'));
                break;
            case 'masonry':
                include(locate_template('templates/partials/showcase/masonry/masonry.php'));
                break;
            case 'flex-layout':
                include(locate_template('templates/partials/showcase/freewall/flex-layout.php'));
                break;
            case 'windows':
                include(locate_template('templates/partials/showcase/freewall/win8-layout.php'));
                break;
            case 'img-layout':
                include(locate_template('templates/partials/showcase/freewall/image-layout.php'));
                break;
            case 'pinterest':
                include(locate_template('templates/partials/showcase/freewall/pinterest-layout.php'));
                break;
            default:
                include(locate_template('templates/partials/showcase/carousel/carousel.php'));
                break;
        }
    }
    public static function showcase_query($posttype,$category){
        $query = null;
        switch ($category) {
            case 'promotions':
                $query = self::general_query($posttype, $category);
                break;
            case 'brochures':
                $query = self::general_query($posttype, $category);
                break;
            case 'theme':
                $query = self::by_terms_query($posttype, $category);
                break;
            case 'location':
                $query = self::by_terms_query($posttype, $category);
                break;
            case 'all':
                $query = QueryBuilder::getPostByPostType($posttype);
                break;
            default:
                $query = null;
                break;
        }
        return $query;
    }

    public static function general_query($posttype,$category){
        $args = array(
            'posts_per_page' => -1,
            'post_type'     => array( $posttype ),
            'post_status'   => array( 'publish', 'inherit' ),
            'category_name' => $category,
        );
        $query = new WP_Query($args);
        return $query;
    }

    public static function by_terms_query($posttype,$category){
        $terms = get_terms($category, 'orderby=none&hide_empty');
        $args = array (
            'posts_per_page' => -1,
            'post_type'      => array($posttype),
            'post_status'    => array('publish', 'inherit'),
            'tax_query'      => array(
                array(
                    'taxonomy' => $category,
                    'field'    => 'slug',
                    'terms'    => wp_list_pluck($terms, 'slug')
                )
            )
        );
        $query = new WP_Query($args);
        return $query;
    }
    public static function getTermByTaxonomy($category){
        $terms = get_terms( array(
            'taxonomy' => $category,
            'orderby'=> 'name',
            'hide_empty' => true,
        ) );
        return $terms;
    }
    public static function byTermsQueryLimitOneTerm($posttype,$category,$term){
        $args = array (
            'posts_per_page' => 1,
            'post_type'      => array($posttype),
            'post_status'    => array('publish', 'inherit'),
            'tax_query'      => array(
                array(
                    'taxonomy' => $category,
                    'field'    => 'slug',
                    'terms'    => $term->slug
                )
            )
        );
        $query = new WP_Query($args);
        return $query;
    }
    public static function get_post_data($posttype,$component,$id = false){
        $info = array();
        if($id !== false)
            $post_link = get_permalink($id);
        else
            $post_link = '#';
        $images = array();
        if($component=='theme'){
            $images = Voyage::get_voyage_images($id);
            $terms = get_the_terms($id,'theme');
            $term = $terms[0];
            $info['post_link'] = $post_link;
            $info['title'] = ucwords(get_the_title($id));
            $info['subtitle'] = $term->name;
            $info['image_url'] = $images['image_url'];
            $info['thumbnail_image'] = $images['thumbnail_image'];
            $info['thumbnail_url'] = $images['thumbnail_url'];
        }
        if($component=='promotions'){
            $images = Voyage::get_voyage_images($id);
            if(!empty($images)) {
                $info['post_link'] = $post_link;
                $info['title'] = ucwords(get_the_title($id));
                $info['subtitle'] = get_post_meta($id, 'slogan')[0];
                $info['image_url'] = $images['image_url'];
                $info['thumbnail_image'] = $images['thumbnail_image'];
                $info['thumbnail_url'] = $images['thumbnail_url'];
            }
        }
        if($component=='brochures'){
            $images = Voyage::get_voyage_images($id);
            if(!empty($images)) {
                $info['post_link'] = $images['image_url'];
                $info['title'] = ucwords(get_the_title($id));
                $info['subtitle'] = get_post_meta($id, 'slogan')[0];
                $info['image_url'] = $images['image_url'];
                $info['thumbnail_image'] = $images['thumbnail_image'];
                $info['thumbnail_url'] = $images['thumbnail_url'];
            }
        }
        if($component=='all' && $posttype != 'team'){
            $images = Voyage::get_voyage_images($id);
            if(!empty($images)) {
                $info['post_link'] = $post_link;
                $info['title'] = ucwords(get_the_title($id));
                $info['subtitle'] = '';
                $info['image_url'] = $images['image_url'];
                $info['thumbnail_image'] = $images['thumbnail_image'];
                $info['thumbnail_url'] = $images['thumbnail_url'];
            }
        }
        if($posttype == 'team'){
            $users = Users::getUserList(['contributor'],true);
            foreach($users as $user){
                $user_id = $user['ID'];
                $row['post_link'] = $post_link;
                $row['title'] = Users::getFullName($user_id);
                $row['image_url'] = Users::getProfilePicture($user_id);
                $row['thumbnail_image'] = Users::getProfilePicture($user_id,'thumbnail_image');
                $row['thumbnail_url'] = Users::getProfilePicture($user_id,'thumbnail_url');
                $job_title = Users::getJobTitle($user_id);
                $social = Users::getContactButtons($user);
                $subtitle = '';
                if(!empty($job_title)){
                    if(!empty($social))
                        $subtitle = $job_title.'<br><br>'.$social;
                    else
                        $subtitle = $job_title;
                }else{
                    if(!empty($social))
                        $subtitle = $social;
                }

                $row['subtitle'] = $subtitle;
                $info[] = $row;
                $row = array();
            }
        }
        if($component=='location'){
            $images = Voyage::get_voyage_images($id);
            if(!empty($images)) {
                $terms = get_the_terms($id,'location');
                $term = $terms[0];
                $info['post_link'] = $post_link;
                $info['title'] = ucwords(get_the_title($id));
                $info['subtitle'] = $term->name;
                $info['image_url'] = $images['image_url'];
                $info['thumbnail_image'] = $images['thumbnail_image'];
                $info['thumbnail_url'] = $images['thumbnail_url'];
            }
        }
        return $info;
    }
    public static function getPostdataNoPosttype($category,$id){
        $info = array();
        $page = get_page_by_title( 'Search Post By Term' );
        $img_url = wp_get_attachment_url($id);
        $thumb = wp_get_attachment_thumb_url($id);
        $thumb_image = wp_get_attachment_image($id,'thumbnail');
        if(!empty($page)) {
            $terms = get_the_terms($id, $category);
            $term = $terms[0];
            $page_link = get_permalink($page->ID).'?term='.$term->slug.'&tax='.$category;
            $info['post_link'] = $page_link;
            $info['title'] = $term->name;
            $info['subtitle'] = '';
            $info['image_url'] = $img_url;
            $info['thumbnail_image'] = $thumb_image;
            $info['thumbnail_url'] = $thumb;
        }
        return $info;
    }

    public static function get_component($component,$data){
        $display = "";
        switch($component){
            case 'carousel':
            $display .= Carousel::display_carousel($data,true);
            break;
            case 'grid':
            $display .= Grid::display_grid($data,true);
            break;
            case 'card':
            $display .= Card::display_card_simple($data,true);
            break;
            case 'button':
            $display .= Button::display_buttons($data,true);
            break;
            case 'masonry':
            $display .= Masonry::display_masonry($data,true);
            break;
            case 'flex-layout':
            $display .= Freewall::display_flex_layout($data,true);
            break;
            case 'windows':
            $display .= Freewall::display_win8_layout($data,true);
            break;
            case 'img-layout':
            $display .= Freewall::display_image_layout($data,true);
            break;
            case 'pinterest':
            $display .= Freewall::display_pinterest_layout($data,true);
            break;
            default:
            $display .= Grid::display_grid($data,true);
            break;
        }
        return $display;
    }

    public static function getData($args){
        $data = array();
        //Check if have showcase options dont have posttype
        if($args['posttype']=='none'):
            $terms = self::getTermByTaxonomy($args['category']);
            $info = array();
            foreach($terms as $term):
                $query = self::byTermsQueryLimitOneTerm('attachment',$args['category'],$term);
                if($query && $query->have_posts()):
                    while ( $query->have_posts() ) :
                        $query->the_post();
                        $id = $query->post->ID;
                        $info = self::getPostdataNoPosttype($args['category'],$id);
                        if ( !empty( $info ) )
                            $data[] = $info;
                    endwhile;
                endif;
            endforeach;
        //Showcase have any posttype
        else:
            if($args['posttype']=='team'):
                $data = self::get_post_data($args['posttype'], $args['category']);
            else:
                $query = self::showcase_query( $args['posttype'] , $args['category']);
                if($query && $query->have_posts()):
                    while ( $query->have_posts() ) :
                        $query->the_post();
                        $id = $query->post->ID;
                        //If postype is brochure
                        if($args['posttype'] == 'brochure'){
                            $brochures = Brochure::getBrochuresByPost($id);
                            foreach ($brochures as $brochure){
                                $info = Brochure::getInfo($brochure,$id);
                                if (!empty($info)):
                                    $data[] = $info;
                                endif;
                            }
                        }else {
                            $info = self::get_post_data($args['posttype'], $args['category'], $id);
                            if (!empty($info)):
                                $data[] = $info;
                            endif;
                        }
                    endwhile;
                endif;
            endif;
        endif;
        return $data;
    }
}
