<?php

class Gallery{
    public static function display_gallery($id, $i = NULL){
        $gallery = get_post_meta($id, 'estimate_gallery');
        //piklist::pre($gallery);
        ?>

        <?php if ( $gallery[$i] > 1 ) : ?>
            <div class="estimate-gallery" style="margin-bottom:0">
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
