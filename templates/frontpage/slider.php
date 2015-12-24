<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

$args = array (
'post_type'              => array( 'product' ),
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
                    <div class="ui container">
                        <div class="ui grid">
                            <div class="twelve wide column" id="slider-text">
                                <h1 class="fitText" style="text-transform:uppercase"><?= the_title(); ?></h1>
                                <h4><?= the_excerpt(); ?></h4>
                                <h5><?= get_post_meta($post->ID,'product_price',true) . ' ' . get_post_meta($post->ID,'product_currency',true); ?></h5>
                                <a href="<?php the_permalink(); ?>" class="ui basic inverted button">
                                    <?php _e('See more','sage'); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>

            <?php endwhile; ?>
        </ul>
    </div>
<?php endif; ?>

<?php wp_reset_postdata(); ?>
