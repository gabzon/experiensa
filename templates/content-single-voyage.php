<?php 
$agency_options = get_option('agency_settings');
$timezone = $agency_options['agency_timezone'];
date_default_timezone_set($timezone); 
?>
<?php while (have_posts()) : the_post(); ?>
    <?php $voyage_expiry_date = get_post_meta($post->ID, 'voyage_expiry_date', true); ?>
    <?php $voyage_expiry_date_formatted = DateTime::createFromFormat('d/m/Y', $voyage_expiry_date)->format('Y-m-d'); ?>
    <?php $post_status = get_post_status( $post->ID );?>
    <?php $countries = get_the_terms($post->ID ,'country');?>
    <?php $locations = get_the_terms($post->ID ,'location');?>
    <?php if ($voyage_expiry_date_formatted >= date("Y-m-d")): ?>
        <?php $gallery = get_post_meta($post->ID, 'voyage_gallery', false); ?>
        <?php $overlay = get_stylesheet_directory_uri() .  '/bower_components/vegas/dist/overlays/07.png';?>
        <?php if ($gallery && !empty($gallery[0])): ?>
            <script type="text/javascript">
            jQuery(function() {
                jQuery('.voyage-slider').vegas({
                    overlay: '<?= $overlay ?>',
                    slides: [
                        <?php foreach ($gallery as $image): ?>
                        <?php if ($image): ?>
                        { src: '<?= wp_get_attachment_url( $image ); ?>' },
                        <?php else: ?>
                        { src: '<?= get_stylesheet_directory_uri() . '/assets/images/mauritius.jpg'; ?>' },
                        <?php endif; ?>
                        <?php endforeach; ?>
                    ]
                });
            });
            </script>
        <?php else:
          $terms = Common::get_media_terms($post->ID,'voyage');         
          $gallery = RequestMedia::get_media_request('media',$terms);
        ?>
          <script type="text/javascript">
            jQuery(function() {
                jQuery('.voyage-slider').vegas({
                    overlay: '<?= $overlay ?>',
                    slides: [
                      <?php if(!empty($gallery)):?>
                        <?php foreach ($gallery as $image):?>
                        { src: '<?= $image['full_size'] ; ?>' },
                        <?php endforeach; ?>
                      <?php else: ?>
                      { src: '<?= get_stylesheet_directory_uri() . '/assets/images/mauritius.jpg'; ?>' },
                      <?php endif; ?>
                    ]
                });
            });
            </script>
        <?php endif; ?>

        <div class="voyage-slider" style="height:100vh;">
            <div class="ui container">
                <br><br>
                <?php get_template_part('templates/voyage/preview'); ?>
            </div>
        </div>

        <div class="ui container">
            <article <?php post_class(); ?>>
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
<?php
  /*$mediaapi = RequestMedia::get_media_request('media','location','peru');
  echo "<pre>";
  print_r($mediaapi);
  echo "</pre>";
  echo "<pre>";
  print_r($countries);
  echo "</pre>";
  echo "<pre>";
  print_r($locations);
  echo "</pre>";*/
  /*echo "<pre>";
  print_r($gallery);
  echo "</pre>";
  print_r($terms);*/
?>
