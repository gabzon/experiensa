<?php
if(!empty($data)):
?>
    <!-- Freewall Image Layout Component -->
    <div id="freewall-image" class="free-wall freewall-image">
        <?php
        foreach($data as $value):
            $textimage_option->setInfo($value['title'], $value['subtitle'], $value['image_url']);
            $width = rand(250,500);
            if(isset($value['post_link'])):?>
                <a href="<?=$value['post_link'];?>">
            <?php endif; ?>
            <div class="freewall-cell" style="width:<?= $width; ?>px;height: 160px;">
                <?php $textimage_option->displayTextimage();?>
            </div>
            <?php if(isset($value['post_link'])):?></a><?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php
endif;
