<?php $query = new WP_Query( array('post_type' => 'voyage','category_name' => 'promotions')); ?>
<?php $design_options = get_option('experiensa_design_settings');
$section = $design_options['promotion_color_group'];
$color = $section['promotion_section_color'][0];
$inverted = $section['promotion_section_inverted'][0];
?>
<section id="promotion" class="ui basic <?= get_the_color($color, $inverted[0]); ?> vertical segment center aligned">
    <br>
    <br>
    <div class="ui container">
        <h1><?php _e('Promotions'); ?></h1><br>
        <!-- Set up your HTML -->
        <?php if ( $query->have_posts() ) : ?>
            <div class="owl-carousel">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="item promotion-item">
                        <a href="<?php the_permalink(); ?>">
                            <div class="overlay"></div>
                            <div class="ui image">
                                <div class="ui dimmer">
                                    <div class="content">
                                        <div class="center">
                                            <h2 class="ui inverted header">
                                                <?php the_title(); ?>
                                                <div class="sub header"><?= Voyage::price($post->ID); ?></div>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php $feature_image = wp_get_attachment_image_src( get_post_thumbnail_id( $query->ID ),'full' ); ?>
                                    <img src="<?= $feature_image[0]; ?>" alt=""/>
                                <?php endif; ?>
                            </div>
                            <div class="promotion-content center">
                                <h2 class="title ui inverted header"><?php the_title(); ?></h2>
                            </div>
                        </a>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php else: ?>
            <h3><?php _e('Sorry! Currently there are no promotions','sage'); ?></h3>
        <?php endif; ?>
    </div>
    <br>
    <br>
    <br>
</section>
