<?php
if(!empty($data)):
?>
    <!-- Freewall Pinterest Layout Component -->
    <div id="freewall-pinterest" class="free-wall">
        <?php
        foreach($data as $value):
            $textimage_option->setInfo($value['title'], $value['subtitle'],$value['image_url']);
            $width = rand(250,500);
            if(isset($value['post_link'])):
        ?>
                <a href="<?=$value['post_link'];?>">
            <?php
            endif;
            ?>
            <div class="brick-pinterest">
                    <?php $textimage_option->displayTextimage();?>
                <div class="info-pinterest">
                    <h5><?= $value['title']; ?></h5>
                    <h7><?= $value['subtitle']; ?></h7>
                </div>
            </div>
            <?php
            if(isset($value['post_link'])):
            ?>
                </a>
            <?php
            endif;
            ?>
        <?php
        endforeach;
        ?>
    </div>
<?php
endif;
