<?php
if(!empty($data)):
?>
<!-- Carousel Component -->
<section id="<?= $name;?>" class="ui vertical segment custom-section <?= $background['color'];?>" style="<?= $background['size'];?>">
    <div class="section-background <?= $background['class'];?>" style="<?= $background['style'];?>"></div>
    <div class="ui <?= $layout['container_class'];?> vertical segment section-content" style="<?= $layout['content_color'];?>">
        <div class="ui <?= $layout['title_alignment']?> header" style="<?= $layout['title_color'];?>">
            <div class="page-header">
                <h1><?= $layout['title'];?></h1>
                <?= (!empty($layout['subtitle'])?"<h3>".$layout['subtitle']."</h3><br>":"");?>
            </div>
        </div>
        <div class="owl-carousel">
        <?php
        foreach($data as $value):
            $textimage_option->setInfo($value['title'], $value['subtitle'],$value['image_url']);
        ?>
            <div class="carousel-component">
                <a href="<?=$value['post_link'];?>" target="_blank">
                    <?php $textimage_option->displayTextimage();?>
                </a>
            </div>
        <?php
        endforeach;
        ?>
        </div>
        <br>
        <br>
        <br>
    </div>
</section>
<?php
endif;

