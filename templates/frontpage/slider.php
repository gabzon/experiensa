<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

$args = array (
'post_type'              => array( 'voyage' ),
'category_name'          => 'landing-slider',
'order'                  => 'DESC',
);

// The Query
$query = new WP_Query( $args );
?>

<?php if ( $query->have_posts() ) :  ?>
    <div id="slides">
        <ul class="slides-container">
            <?php while ( $query->have_posts() ): ?>
                <?php $query->the_post();  ?>
                <li>
                    <?php $feature_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                    <img src="<?php echo $feature_image; ?>" alt="" class="ui image"/>
                    <?php $design_options = get_option('experiensa_design_settings'); ?>
                    <?php if ( ($design_options['setting_landing_slider_description'] == 'TRUE') || !isset($design_options['setting_landing_slider_description']) ): ?>
                        <div class="ui container">
                            <div class="ui grid">
                                <div class="twelve wide column" id="slider-text">
                                    <h1 class="fitText" style="text-transform:uppercase"><?= the_title(); ?></h1>
                                    <h4><?= the_excerpt(); ?></h4>
                                    <br>
                                    <a href="<?php the_permalink(); ?>" class="ui huge animated fade inverted button" tabindex="0">
                                        <div class="visible content">
                                            <?= Voyage::price($post->ID); ?>
                                        </div>
                                        <div class="hidden content">
                                            <?php _e('More info','sage'); ?>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </li>

            <?php endwhile; ?>
        </ul>
    </div>
<?php endif; ?>

<?php wp_reset_postdata(); ?>
