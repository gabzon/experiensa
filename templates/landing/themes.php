<?php
$design_options = get_option('experiensa_design_settings');

$section = $design_options['theme_options'];
$component = $section['display_themes_component'][0];
$color = $section['theme_section_color'][0];
$inverted = $section['theme_section_inverted'][0];


$terms = get_terms('theme', 'orderby=none&hide_empty');
$args = array (
    'posts_per_page' => -1,
    'post_type'     => array( 'attachment' ),
    'post_status'   => array( 'publish', 'inherit' ),
    'tax_query' => array(
        array(
            'taxonomy' => 'theme',
            'field' => 'slug',
            'terms' => wp_list_pluck($terms,'slug')//Pluck a certain field out of each object in a list
        )
    )
);
$query = new WP_Query($args);
$terms = "";
/*echo "<pre>";
print_r($themes);
echo "</pre>";*/
if ($design_options['display_themes'] == 'TRUE'):?>
<section id="themes" class="ui basic <?= get_the_color($color, $inverted[0]); ?> vertical segment center aligned">
    <br>
    <br>
    <div class="ui container">
        <h1><?php _e('Themes','sage'); ?></h1>
        <br>
        <div id="landing-themes" class="landing-themes">
            <?php
            if($query->have_posts()):
                while ( $query->have_posts() ) :
                    $query->the_post();
                    $description = $query->post_content;
                    $post_url = get_permalink($post->ID);
                    $terms = get_the_terms($post->ID,'theme');
                    $term = $terms[0];

                    $theme['title'] = $term->name;
                    $theme['subtitle'] = '';
                    $theme['post_link'] = $post_url;

                    $theme['image_url'] = wp_get_attachment_url($post->ID);
                    $theme['thumbnail_image'] = wp_get_attachment_image($post->ID,'thumbnail');
                    $theme['thumbnail_url'] = wp_get_attachment_thumb_url( $post->ID );
                    $themes[] = $theme;
                endwhile;
                /*echo "<pre>";
                print_r($themes);
                echo "</pre>";*/
                switch ($component) {
                    case 'carousel':
                        Carousel::display_carousel($themes);
                        break;
                    case 'grid':
                        Grid::display_grid($themes);
                        break;
                    case 'card':
                        Card::display_card_simple($themes);
                        break;
                    case 'button':
                        Button::display_buttons($themes);
                        break;
                    case 'masonry':
                        Masonry::display_masonry($themes);
                        break;
                    case 'flex-layout':
                        Freewall::display_flex_layout($themes);
                        break;
                    case 'windows':
                        Freewall::display_win8_layout($themes);
                        break;
                    case 'img-layout':
                        Freewall::display_image_layout($themes);
                        break;
                    case 'pinterest':
                        Freewall::display_pinterest_layout($themes);
                        break;
                    default:
                        Grid::display_grid($themes);
                        break;
                }
            else:?>
                <h3><?php _e('Sorry! Currently there are no themes','sage'); ?></h3>
                <?php
            endif;
            ?>
            <br>
            <br>
        </div>
    </div>
    <br>
    <br>
    <br>
</section>
<?php endif; ?>