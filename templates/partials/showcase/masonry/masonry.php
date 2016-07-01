<?php
if(!empty($data)):
?>
<!-- Masonry Component -->
    <div class="grid-masonry">
        <div class="grid-sizer"></div>
        <?php
        foreach($data as $value):
        ?>
            <div class="grid-item">
                <a href="<?=$value['post_link'];?>">
                    <img src="<?=$value['image_url'];?>">
                    <div class="grid-item-overlay">
                        <div class="grid-item-overlay-background"></div>
                        <div class="grid-item-title">
                            <h4><?=ucwords($value['title']);?></h4>
                            <span><?=ucwords($value['subtitle']);?></span>
                        </div>
                    </div>
                </a>
            </div>
        <?php
        endforeach;
        ?>
    </div>
<?php
endif;