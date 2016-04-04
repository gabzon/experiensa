<?php

$design_options = get_option('experiensa_design_settings');
/*echo('<pre>');
print_r($design_options);
echo('</pre>');*/
$section = $design_options['promotion_options'];
$display_promotions = $design_options['display_promotions'];
$color = $section['promotion_section_color'][0];
$inverted = $section['promotion_section_inverted'][0];
$args = array(
          'posts_per_page' => -1,
          'post_type'     => array( 'voyage' ),
          'post_status'   => array( 'publish', 'inherit' ),
          'category_name' => 'brochures'
        );
$query = new WP_Query($args);

if ($design_options['display_promotions'] == 'TRUE'): ?>
    <!-- Start Promotions section -->
    <section id="promotion" class="ui basic <?= get_the_color($color, $inverted[0]); ?> vertical segment center aligned">
        <br>
        <br>
        <div class="ui container">
            <h1><?php _e('Promotions'); ?></h1><br>
            <!-- Set up your HTML -->
            <?php
            //echo $query->request;
            if($query->have_posts()):
                while ( $query->have_posts() ) :
                    $query->the_post();
                    $description = $query->post_content;
                    $subtitle = get_post_field('post_content', $post->ID);
                    $images = get_post_meta($post->ID,'brochures');
                    foreach ($images as $img) {

                        $country['title']= __('View','sage');
                        $country['subtitle'] = '';
                        $country['post_link'] = wp_get_attachment_url($img);
                        $country['image_url'] = wp_get_attachment_url($img);
                        $country['thumbnail_image'] = wp_get_attachment_image($post->ID,'thumbnail');
                        $countries[] = $country;
                    }
                endwhile;
                Carousel::display_carousel($countries);
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
