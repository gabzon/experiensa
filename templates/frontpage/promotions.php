<?php $query = new WP_Query(array('post_type' => 'product')); ?>

<section id="promotion" class="ui basic green inverted vertical segment">
    <br>
    <br>
    <div class="ui container">
        <h2 class="ui center aligned header inverted uppercase"><?php _e('Promotions'); ?></h2>
        <?php if ( $query->have_posts() ) : ?>
            <div id="promotions-carousel">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="item promotion-item">
                        <a href="<?php the_permalink(); ?>">
                            <div class="overlay"></div>
                            <?php the_post_thumbnail('agency-promotion'); ?>
                            <div class="promotion-content">
                                <h2 class="title"><?php the_title(); ?></h2>
                                <span class="price"><?php echo get_post_meta(get_the_ID(), 'product_price', true); ?></span>
                            </div>
                        </a>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>
    </div>
    <br>
    <br>
</section>
