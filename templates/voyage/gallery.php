<?php $gallery = get_post_meta(get_the_ID(), 'product_gallery', false); ?>
<div class="sixteen wide column">
    <div class="owl-carousel owl-theme gallery">
        <?php foreach ($gallery as $image){ ?>
            <div class="item">
                <?php echo wp_get_attachment_image($image, 'full'); ?>
            </div>
        <?php } ?>
    </div>
</div>
<br>
<br>
