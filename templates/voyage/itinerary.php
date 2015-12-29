<?php
$day            = get_post_meta($post->ID,'product_itinerary_day');
$title          = get_post_meta($post->ID,'product_itinerary_title');
$subtitle       = get_post_meta($post->ID,'product_itinerary_subtitle');
$description    = get_post_meta($post->ID,'product_itinerary_description');
$gallery        = get_post_meta($post->ID,'product_itinerary_gallery');
?>
<br>
<?php Piklist::pre($day) ?>
<?php if ($day): ?>
    <hr>
    <br>
    <div class="ui segment basic" id="product-accommodation">
        <div class="ui grid stackable">
            <div class="one wide column">
                <button class="ui circular facebook icon button huge">
                    <i class="list icon"></i>
                </button>
            </div>
            <div class="four wide column">
                <h2><?php _e('Itinerary','sage'); ?></h2>
            </div>
            <div class="eleven wide column">
                <div class="ui grid">
                    <?php for ($i = 0; $i < count($day); $i++): ?>
                        <div class="two wide column">
                            <h4 class="ui header"><?= $day[$i]; ?></h4>
                        </div>
                        <div class="fourteen wide column">
                            <h1 class="ui header">
                                <?= $title[$i]; ?>
                                <div class="sub header">
                                    <?= $subtitle[$i]; ?>
                                </div>
                            </h1>
                            <p><?= $description[$i]; ?></p>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
