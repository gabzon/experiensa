<?php
if(!empty($data)):
?>
    <!-- Masonry Component -->
    <div class="grid-masonry">
        <div class="grid-sizer"></div>
        <?php
        foreach($data as $value):
            $textimage_option->setInfo($value['title'], $value['subtitle'],$value['image_url']);
        ?>
            <div class="grid-item">
                <a href="<?=$value['post_link'];?>">
                    <?php $textimage_option->displayTextimage();?>
                </a>
            </div>
        <?php
        endforeach;
        ?>
    </div>
<?php
endif;