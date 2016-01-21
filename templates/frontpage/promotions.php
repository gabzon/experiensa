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
        <?php if ( $query->have_posts() ) : ?>
            <div id="promotions-carousel">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="item promotion-item">
                        <a href="<?php the_permalink(); ?>">
                            <div class="overlay"></div>
                            <?php the_post_thumbnail('agency-promotion'); ?>
                            <div class="promotion-content">
                                <h2 class="title"><?php the_title(); ?></h2>
                                <span class="price"><?= Voyage::price($post->ID); ?></span>
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


<!-- 'destination_section_color'

'promotion_section_inverted'

'promotion_color'

'theme_section_color'

'theme_section_inverted'

'theme_color_group' -->
