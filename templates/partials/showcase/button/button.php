<?php
if(!empty($data)):
?>
<!-- Button Component -->
<section id="<?= $name;?>" class="ui vertical segment custom-section <?= $background['color'];?>" style="<?= $background['size'];?>">
    <div class="section-background <?= $background['class'];?>" style="<?= $background['style'];?>"></div>
    <div class="ui <?= $layout['container_class'];?> vertical segment section-content" style="<?= $layout['content_color'];?>">
        <div class="ui <?= $layout['title_alignment']?> header" style="<?= $layout['title_color'];?>">
            <div class="page-header">
                <h1><?= $layout['title'];?></h1>
                <?= (!empty($layout['subtitle'])?"<h3>".$layout['subtitle']."</h3><br>":"");?>
            </div>
        </div>
        <div class="ui centered grid" style="padding-bottom: 25px;">
        <?php
        foreach($data as $value):
            if(!isset($value['post_link'])):
        ?>
                <button id="<?=$value['filter-class'];?>" class="ui basic button" data-filter="<?=$value['filter-data'];?>" style="font-weight:bold; margin: 5px 5px 5px 5px;">
            <?php
            else:
            ?>
                <a class="ui basic button" href="<?=$value['post_link'];?>" style="font-weight:bold">
            <?php
            endif;
            ?>
                    <?=$value['title'];?>
            <?php
            if(!isset($value['post_link'])):
            ?>
                </button>
            <?php
            else:
            ?>
                </a>
        <?php
            endif;
        endforeach;
        ?>
        </div>
    </div>
</section>
<?php
endif;