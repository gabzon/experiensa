<?php
if(!empty($data)):
?>
<!-- Card Component -->
<section id="<?= $name;?>" class="ui vertical segment custom-section <?= $background['color'];?>" style="<?= $background['size'];?>">
    <div class="section-background <?= $background['class'];?>" style="<?= $background['style'];?>"></div>
    <div class="ui <?= $layout['container_class'];?> vertical segment section-content" style="<?= $layout['content_color'];?>">
        <div class="ui <?= $layout['title_alignment']?> header" style="<?= $layout['title_color'];?>">
            <div class="page-header">
                <h1><?= $layout['title'];?></h1>
                <?= (!empty($layout['subtitle'])?"<h3>".$layout['subtitle']."</h3><br>":"");?>
            </div>
        </div>
        <div class="ui four stackable cards">
        <?php
        foreach($data as $value):
        ?>
            <div class="ui card" style="margin: 0 10px 0 10px;">
                <a href="<?=$value['post_link'];?>" class="image" target="_blank">
                    <img src="<?=$value['image_url'];?>">
                </a>
                <div class="content">
                    <div class="center aligned header"><?=$value['title'];?></div>
                </div>
                <?php if(isset($value['subtitle']) && !empty($value['subtitle'])):?>
                <div class="center aligned extra content">
                    <?=$value['subtitle'];?>
                </div>
                <?php endif; ?>
              </div>
          <?php
          endforeach;
          ?>
        </div>
        <br>
    </div>
</section>
<?php
endif;
