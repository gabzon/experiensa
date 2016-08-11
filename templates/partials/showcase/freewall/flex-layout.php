<?php
if(!empty($data)):
?>
<!-- Freewall Flex Layout Component -->
<div id="freewall" class="free-wall freewall-flex">
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
        <div class="brick" style="width:<?= $width; ?>px;">
            <?php $textimage_option->displayTextimage();?>
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
