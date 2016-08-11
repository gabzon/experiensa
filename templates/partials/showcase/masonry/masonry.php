<?php
if(!empty($data)):
?>
    <!-- Masonry Component -->
    <div class="grid-masonry">
        <div class="grid-sizer"></div>
        <?php
        foreach($data as $value):
            $textimage_option->setInfo($value['title'], $value['subtitle']);
        ?>
            <div class="grid-item">
                <a href="<?=$value['post_link'];?>">
                    <div class="ui image">
                        <img src="<?=$value['image_url'];?>">
                        <?php $textimage_option->displayTextimage();?>
<!--                    <div class="grid-item-overlay">
                        <div class="grid-item-overlay-background"></div>
                        <div class="grid-item-title">
                            <h4><?/*=ucwords($value['title']);*/?></h4>
                            <span><?/*=ucwords($value['subtitle']);*/?></span>
                        </div>
                    </div>-->
                    </div>
                </a>
            </div>
        <?php
        endforeach;
        ?>
    </div>
<?php
endif;