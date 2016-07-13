<?php
$host_options =  get_post_meta($post->ID,'accommodations_options',true);
?>
<br>

<?php if (isset($host_options[0]) && !empty($host_options[0]) && !empty($host_options[0]['establishment_name'])): ?>
    <br>
    <hr>
    <br>
    <div class="ui segment basic" id="product-accommodation">
        <div class="ui grid stackable">
            <div class="one wide column">
                <button class="ui circular facebook icon button huge">
                    <i class="building icon"></i>
                </button>
            </div>
            <div class="four wide column">
                <h2><?php _e('Accommodation','sage'); ?></h2>
            </div>
            <div class="eleven wide column">
            <?php foreach($host_options as $option):?>
            <?php if(!empty($option['establishment_name'])):?>
              <h3 class="ui header">
                  <?= $option['establishment_name']; ?>
                  <div class="sub header">
                      <?= Voyage::host_rating_stars($option['establishment_rating']); ?>
                  </div>
              </h3>
            <?php if (!empty($option['establishment_gallery']) && !empty($option['establishment_gallery'][0])): ?>
              <div id="host-gallery">
                <?php foreach ($option['establishment_gallery'] as $image): ?>
                <div>
                  <img src="<?php echo wp_get_attachment_url($image); ?>" class="ui image" />
                </div>
                <?php endforeach;?>
              </div>
            <?php endif;?>
              <br>
                <?= $option['establishment_comments']; ?>
              <br><br>
              <strong><?php _e('Check-in: ','sage'); ?></strong>
              <?= $option['establishment_checkin_date'] . ' (' . $option['establishment_checkin_time'] . ')'; ?><br>
              <strong><?php _e('Check-in: ','sage'); ?></strong>
              <?= $option['establishment_checkout_date'] . ' (' . $option['establishment_checkout_time'] . ')'; ?><br>
            <?php endif;?>
            <?php endforeach;?>
            </div>
        </div>
    </div>
<?php endif; ?>
