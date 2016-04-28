<?php
$design_options = get_option('experiensa_design_settings');

$section = $design_options['destination_options'];
$component = $section['display_destination_component'][0];
//echo "mi component es ".$component;
$color = $section['destination_section_color'][0];
$inverted = $section['destination_section_inverted'][0];

$terms = get_terms('country', 'orderby=none&hide_empty');
$args = array (
'posts_per_page' => -1,
'post_type'     => array( 'attachment' ),
'post_status'   => array( 'publish', 'inherit' ),
'tax_query' => array(
        array(
            'taxonomy' => 'country',
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
                    $terms = get_the_terms($post->ID,'country');
                    $term = $terms[0];
                    $title = $term->name;
                    $subtitle = get_post_field('post_content', $post->ID);
                    $country['title']=$title;
                    $country['subtitle'] = $subtitle;
                    $country['post_link'] = get_permalink();
                    $country['image_url'] = $post->guid;
                    $country['thumbnail_image'] = wp_get_attachment_image($post->ID,'thumbnail');
                    $country['thumbnail_url'] = wp_get_attachment_thumb_url($post->ID);
                    $countries[] = $country;
                endwhile;
                /*echo "<pre>";
                print_r($countries);
                echo "</pre>";*/
                switch ($component) {
                    case 'carousel':
                        Carousel::display_carousel($countries);
                        break;
                    case 'grid':
                        Grid::display_grid($countries);
                        break;
                    case 'card':
                        echo 'Display cards';
                        break;
                    case 'button':
                        echo 'Display buttons';
                        break;
                    case 'masonry':
                        Masonry::display_masonry($countries);
                        break;
                    case 'flex-layout':
                        Freewall::display_flex_layout($countries);
                        break;
                    case 'windows':
                        Freewall::display_win8_layout($countries);
                        break;
                    case 'img-layout':
                        Freewall::display_image_layout($countries);
                        break;
                    case 'pinterest':
                        Freewall::display_pinterest_layout($countries);
                        break;
                    default:
                        Grid::display_grid($countries);
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
