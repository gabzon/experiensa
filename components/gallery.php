<?php

class Gallery{
    public static function display_gallery($id, $gallery,$i = NULL){

        ?>
        <?php if ( $gallery[$i] > 1 ) : ?>
            <div class="owl-carousel" style="margin-bottom:0">
                <?php foreach ($gallery[$i] as $image): ?>
                    <?php if (!($image == "undefined")): ?>
                        <div>
                            <img src="<?= wp_get_attachment_url($image); ?>" class="ui image" alt="" />
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <?php $image = $gallery[$i][0]; ?>
            <?php if (!($image == "undefined")): ?>
                <div>
                    <img src="<?= wp_get_attachment_url($image); ?>" class="ui image" alt="" />
                </div>
            <?php endif; ?>
        <?php endif ?>

        <?php
    }

    // Display owl-carousel with only one image
    public static function display_slider($id, $gallery,$i = NULL){
        ?>
        <?php if ( $gallery[$i] > 1 ) : ?>
            <div class="owl-carousel owl-slider" style="margin-bottom:0">
                <?php foreach ($gallery[$i] as $image): ?>
                    <?php if (!($image == "undefined")): ?>
                        <div>
                            <img src="<?= wp_get_attachment_url($image); ?>" class="ui image" alt="" />
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <?php $image = $gallery[$i][0]; ?>
            <?php if (!($image == "undefined")): ?>
                <div>
                    <img src="<?= wp_get_attachment_url($image); ?>" class="ui image" alt="" />
                </div>
            <?php endif; ?>
        <?php endif ?>

        <?php
    }
}
