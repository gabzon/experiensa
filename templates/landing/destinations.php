<?php
$design_options = get_option('experiensa_design_settings');

$section = $design_options['destination_options'];
$component = $section['display_destination_component'][0];
//echo "mi component es ".$component;
$color = $section['destination_section_color'][0];
$inverted = $section['destination_section_inverted'][0];

$terms = get_terms('location', 'orderby=none&hide_empty');

$args = array (
'posts_per_page' => -1,
'post_type'     => array( 'voyage' ),
'post_status'   => array( 'publish', 'inherit' ),
'tax_query' => array(
        array(
            'taxonomy' => 'location',
            'field' => 'slug',
            'terms' => wp_list_pluck($terms,'slug')//Pluck a certain field out of each object in a list
        )
    )
);
$query = new WP_Query($args);
$terms = "";
?>

<?php if ($design_options['display_destinations'] == 'TRUE'): ?>
    <section id="destinations" class="ui basic <?= get_the_color($color, $inverted[0]); ?> vertical segment center aligned">
        <br>
        <br>
        <div class="ui container">
             <h1><?php _e('Destinations','sage'); ?></h1><br>
            <?php
            if($query->have_posts()):
                while ( $query->have_posts() ) :

                    $query->the_post();
                    $description = $query->post_content;
                    $terms = get_the_terms($post->ID,'location');
                    $term = $terms[0];

                    $title = $term->name;
                    $subtitle = get_post_field('post_content', $post->ID);
                    $location['title']=$title;
                    $location['subtitle'] = '';
                    $location['post_link'] = get_permalink();   
                    if(has_post_thumbnail()) {
                        $image_id = get_post_thumbnail_id($post->ID);
                        $location['image_url'] =  wp_get_attachment_url( $image_id );
                        $location['thumbnail_image'] = wp_get_attachment_image($image_id,'thumbnail');
                        $location['thumbnail_url'] = wp_get_attachment_thumb_url($image_id);
                        $locations[] = $location;
                    }else {
                        $search = str_replace(' ', '-', $title);
                        $gallery = RequestMedia::get_media_request_api('media',[['taxonomy'=>'location','term'=>$search]]);
                        if(!empty($gallery)){
                            $location['image_url'] =  $gallery[0]['full_size'];
                            $location['thumbnail_image'] = '<img src="'.$gallery[0]['thumbnail_size'].'">';
                            $location['thumbnail_url'] = $gallery[0]['thumbnail_size'];
                            $locations[] = $location;
                        }/*else{

                        }*/
                        /*echo "<pre>";
                        print_r($location);
                        echo "</pre>";*/
                    }
                    
                endwhile;
                switch ($component) {
                    case 'carousel':
                        Carousel::display_carousel($locations);
                        break;
                    case 'grid':
                        Grid::display_grid($locations);
                        break;
                    case 'card':
                        Card::display_card_simple($locations);
                        break;
                    case 'button':
                        Button::display_buttons($locations);
                        break;
                    case 'masonry':
                        Masonry::display_masonry($locations);
                        break;
                    case 'flex-layout':
                        Freewall::display_flex_layout($locations);
                        break;
                    case 'windows':
                        Freewall::display_win8_layout($locations);
                        break;
                    case 'img-layout':
                        Freewall::display_image_layout($locations);
                        break;
                    case 'pinterest':
                        Freewall::display_pinterest_layout($locations);
                        break;
                    default:
                        Grid::display_grid($locations);
                        break;
                }
            else:?>
                <h3><?php _e('Sorry! Currently there are no destinations','sage'); ?></h3>
                <?php
        endif;
        ?>
        </div>
        <br>
        <br>
        <br>
    </section>
<?php endif; ?>
