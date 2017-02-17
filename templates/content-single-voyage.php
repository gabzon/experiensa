<?php
$agency_options = get_option('agency_settings');
$timezone = $agency_options['agency_timezone'];
date_default_timezone_set($timezone);
?>
<?php while (have_posts()) : the_post(); ?>
    <?php $voyage_expiry_date = get_post_meta($post->ID, 'expiry_date', true);?>
    <?php
        if($voyage_expiry_date)
            $voyage_expiry_date_formatted = DateTime::createFromFormat('d/m/Y', $voyage_expiry_date)->format('Y-m-d');
        else
            $voyage_expiry_date = false;
    ?>
    <?php $post_status = get_post_status( $post->ID );?>
    <?php $countries = get_the_terms($post->ID ,'country');?>
    <?php $locations = get_the_terms($post->ID ,'location');?>
    <?php if ($voyage_expiry_date && $voyage_expiry_date_formatted >= date("Y-m-d")): ?>
        <?php $gallery = Voyage::get_voyage_images_list($post->ID);?>
        <?php $overlay = get_stylesheet_directory_uri() .  '/bower_components/vegas/dist/overlays/07.png';?>
        <script type="text/javascript">
            jQuery(function() {
                jQuery('.voyage-slider').vegas({
                    overlay: '<?= $overlay ?>',
                    slides: [
                        <?php foreach ($gallery as $image): ?>
                        { src: '<?= $image; ?>' },
                        <?php endforeach; ?>
                    ]
                });
            });
        </script>
        <div class="voyage-slider" style="height:100vh;">
            <div class="ui container">
                <br><br>
                <?php get_template_part('templates/voyage/preview'); ?>
            </div>
        </div>

        <div class="ui container">
            <article <?php post_class(); ?>>
                <br>
                <br>
                <?php
                $content = get_the_content();
                echo $content;
                ?>
                <br>
                <?php get_template_part('templates/voyage/flights'); ?>
                <?php get_template_part('templates/voyage/accommodation'); ?>
                <?php get_template_part('templates/voyage/itinerary'); ?>
                <?php get_template_part('templates/voyage/conditions'); ?>
                <?php //get_template_part('templates/voyage/contact'); ?>
            </article>
        </div>
    <?php else: ?>
        <br>
        <br>
        <br>
        <div class="ui container">
            <div class="ui red message">
                <?php _e('Sorry for the inconvenience. This offer is not longer available','sage'); ?>
                <?php if($post_status=='publish'):?>
                    <?php
                    $my_post = array();
                    $my_post['ID'] = $post->ID;
                    $my_post['post_status'] = 'draft';
                    // Update the post into the database
                    wp_update_post( $my_post );
                    ?>
                <?php endif; ?>
            </div>
        </div>
        <br>
        <br>
    <?php endif; ?>

<?php endwhile; ?>
