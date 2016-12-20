<?php
if(!empty($data)):
?>
<!-- Freewall Image Layout Component -->
<section id="<?= $name;?>" class="ui vertical segment custom-section <?= $background['color'];?>" style="<?= $background['size'];?>">
    <div class="section-background <?= $background['class'];?>" style="<?= $background['style'];?>"></div>
    <div class="ui <?= $layout['container_class'];?> vertical segment section-content" style="<?= $layout['content_color'];?>">
        <div class="ui <?= $layout['title_alignment']?> header" style="<?= $layout['title_color'];?>">
            <div class="page-header">
                <h1><?= $layout['title'];?></h1>
                <?= (!empty($layout['subtitle'])?"<h3>".$layout['subtitle']."</h3><br>":"");?>
            </div>
        </div>
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
    </div>
</section>
<?php
endif;
