<?php while (have_posts()) : the_post(); ?>
    <?php $gallery = get_post_meta($post->ID, 'voyage_gallery', false); ?>
    <?php if ($gallery): ?>
        <?php $overlay = get_stylesheet_directory_uri() .  '/bower_components/vegas/dist/overlays/07.png';?>
        <script type="text/javascript">
        jQuery(function() {
            jQuery('.voyage-slider').vegas({
                overlay: '<?= $overlay ?>',
                slides: [
                    <?php foreach ($gallery as $image): ?>
                    { src: '<?= wp_get_attachment_url( $image ); ?>' },
                    <?php endforeach ?>
                ]
            });
        });
        </script>
    <?php endif; ?>

    <div class="voyage-slider" style="height:95vh;">
        <div class="ui container">
            <br><br>
            <?php get_template_part('templates/voyage/preview'); ?>
        </div>
    </div>

    <div class="ui container">
        <article <?php post_class(); ?>>
            <br>
            <?php get_template_part('templates/voyage/flights'); ?>
            <br>
            <?php get_template_part('templates/voyage/accommodation'); ?>
            <br>
            <?php get_template_part('templates/voyage/itinerary'); ?>
            <br>
            <?php get_template_part('templates/voyage/contact'); ?>
        </article>
    </div>
<?php endwhile; ?>
