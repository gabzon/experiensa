<?php

$design_options = get_option('experiensa_design_settings');

//piklist::pre($design_options);

$section = $design_options['promotion_options'];
$display_promotions = $design_options['display_promotions'];
$color = $section['promotion_section_color'][0];
$inverted = $section['promotion_section_inverted'][0];
if ($design_options['promotion_type'] == 'brochure') {
    $image_source = 'brochures';
    $args = array(
        'posts_per_page' => -1,
        'post_type'     => array( 'voyage' ),
        'post_status'   => array( 'publish', 'inherit' ),
        'category_name' => 'brochures',
    );
}else{
    $args = array(
        'posts_per_page' => -1,
        'post_type'     => array( 'voyage' ),
        'post_status'   => array( 'publish', 'inherit' ),
        'category_name' => 'promotions',
    );
    $image_source = 'voyage_gallery';
}

$query = new WP_Query($args);

if ($design_options['display_promotions'] == 'TRUE'): ?>
<!-- Start Promotions section -->
<section id="promotion" class="ui basic <?= get_the_color($color, $inverted[0]); ?> vertical segment center aligned">
    <br>
    <br>
    <div class="ui container">
        <h1><?php _e('Promotions','sage'); ?></h1><br>
        <!-- Set up your HTML -->
        <?php
        //echo $query->request;
        if($query->have_posts()):
            while ( $query->have_posts() ) :
                $query->the_post();
                $description = $query->post_content;
                $subtitle = get_post_field('post_content', $post->ID);
                $images = get_post_meta($post->ID, 'voyage_gallery');
                $brochures = get_post_meta($post->ID, 'brochures');
                for ($i = 0; $i < count($images); $i++) {
                    $country['title']= __('More info','sage');
                    $country['subtitle'] = '';
                    $country['post_link'] = wp_get_attachment_url($images[$i]);
                    $country['image_url'] = wp_get_attachment_url($images[$i]);
                    $country['thumbnail_image'] = wp_get_attachment_image($images[$i],'thumbnail');
                    $country['thumbnail_url'] = wp_get_attachment_thumb_url( $images[$i] );
                    $countries[] = $country;
                }
            endwhile;
            $component = $design_options['display_promotion_component'];

            switch ($component) {
                case 'carousel':
                    Carousel::display_carousel($countries);
                break;
                case 'grid':
                    echo 'Display grid';
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
                    echo 'Display grid';
                break;
            }
            ?>
        </div>
    <?php else: ?>
        <h3><?php _e('Sorry! Currently there are no promotions','sage'); ?></h3>
    <?php endif; ?>
</div>
<br>
<br>
<br>
</section>
<!-- End Promotions section -->
<?php endif; ?>
