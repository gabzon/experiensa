<?php
$args = array (
'post_type' => 'product',
'numberposts'   => -1,
);

// The Query
$products = new WP_Query( $args );

?>

<div id="list-catalog" class="ui page grid">
    <div class="column">
        <div class="ui three column grid stackable dimmable-image">
            <?php if ( $products->have_posts() ):  ?>
                <?php while ( $products->have_posts() ): ?>
                    <?php $products->the_post(); ?>
                    <?php if (has_post_thumbnail( $post->ID ) ): ?>
                        <div class="column">
                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
                            <div class="ui card">
                                <div class="dimmable image">
                                    <div class="ui dimmer">
                                        <div class="content">
                                            <div class="center">
                                                <a href="<?php echo get_the_permalink(); ?>" class="ui inverted button">
                                                    <?php _e('More info','sage'); ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <img class="ui image" src="<?php echo $image[0]; ?>" alt="" />
                                </div>
                                <div class="content">
                                    <span>
                                        <?php the_title(); ?>
                                    </span>
                                    <span class="right floated">
                                        <?php echo "From CHF " . get_post_meta($post->ID,'product_price',true); ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata();?>
        </div>
    </div>
</div>
