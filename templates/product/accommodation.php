<?php
$host_name          = get_post_meta($post->ID,'product_etablishment_name');
$host_type          = get_post_meta($post->ID,'product_etablishment_type');
$host_rating        = get_post_meta($post->ID,'product_etablishment_rating');
$host_checkin_date  = get_post_meta($post->ID,'product_etablishment_checkin_date');
$host_checkin_time  = get_post_meta($post->ID,'product_etablishment_checkin_time');
$host_checkout_date = get_post_meta($post->ID,'product_etablishment_checkout_date');
$host_checkout_time = get_post_meta($post->ID,'product_etablishment_checkout_time');
$host_comments      = get_post_meta($post->ID,'product_etablishment_comments');
$host_gallery       = get_post_meta($post->ID,'product_etablishment_gallery');
?>
<br>

<?php
function display_rating($host_rating){
    echo '<span style="margin:0;padding:0;">';
    for ($i=0; $i < $host_rating; $i++) {
        echo '<i class="star icon"></i>';
    }
    echo '</span>';
}

?>

<?php if ($host_name): ?>
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
                <?php for ($i = 0; $i < count($host_name); $i++): ?>
                    <h3 class="ui header">
                        <?= $host_name[$i]; ?>
                        <div class="sub header">
                            <?php display_rating($host_rating[$i]); ?>
                        </div>
                    </h3>
                    <?php if ($host_gallery): ?>
                        <div id="host-gallery">
                            <?php foreach ($host_gallery[$i] as $image): ?>
                                <div>
                                    <img src="<?php echo wp_get_attachment_url($image); ?>" class="ui image" />
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <br>
                    <?= $host_comments[$i]; ?>
                    <br><br>
                    <strong><?php _e('Check-in: ','sage'); ?></strong>
                    <?= $host_checkin_date[$i] . ' (' . $host_checkin_time[$i] . ')'; ?><br>
                    <strong><?php _e('Check-in: ','sage'); ?></strong>
                    <?= $host_checkout_date[$i] . ' (' . $host_checkout_time[$i] . ')'; ?><br>
                <?php endfor; ?>
            </div>
        </div>
    </div>

<?php endif; ?>
