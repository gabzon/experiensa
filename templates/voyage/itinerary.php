<?php
$itinerary_options =  get_post_meta($post->ID,'itinerary_options',true);
?>
<br>
<?php if (isset($itinerary_options[0]) && !empty($itinerary_options[0]) && !empty($itinerary_options[0]['itinerary_day'])): ?>
    <br>
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
                    <?php foreach($itinerary_options as $option):?>
                    <?php if(!empty($option['itinerary_day']) && !empty($option['itinerary_description'])):?>
                    <div class="two wide column">
                        <h4 class="ui header"><?= $option['itinerary_day']; ?></h4>
                    </div>
                    <div class="fourteen wide column">
                        <h1 class="ui header">
                            <?= $option['itinerary_title']; ?>
                            <div class="sub header">
                                <?= $option['itinerary_subtitle']; ?>
                            </div>
                        </h1>
                        <p><?= $option['itinerary_description']; ?></p>
                    </div>
                    <?php endif;?>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
