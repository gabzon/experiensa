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
                    <div class="container">
                        <?php get_template_part('templates/frontpage/landing'); ?>
                    </div>
                </li>

            <?php endwhile; ?>
        </ul>
    </div>
<?php endif; ?>

<?php wp_reset_postdata(); ?>
