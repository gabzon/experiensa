<?php

$textimage_option = (!isset($textimage_option)? new \Experiensa\Component\Textimage($textimage_data):$textimage_option);
if(!empty($data)):
?>
<!-- Grid Component -->
<section id="<?= $name;?>" class="ui vertical segment custom-section <?= $background['color'];?>" style="<?= $background['size'];?>">
    <div class="section-background <?= $background['class'];?>" style="<?= $background['style'];?>"></div>
    <div class="ui <?= $layout['container_class'];?> vertical segment section-content" style="<?= $layout['content_color'];?>">
        <div class="ui <?= $layout['title_alignment']?> header" style="<?= $layout['title_color'];?>">
            <div class="page-header">
                <h1><?= $layout['title'];?></h1>
                <?= (!empty($layout['subtitle'])?"<h3>".$layout['subtitle']."</h3><br>":"");?>
            </div>
        </div>
        <div class="ui stackable grid centered">
            <?php
            foreach($data as $value):
                $textimage_option->setInfo($value['title'], $value['subtitle'],$value['image_url'],$value['post_link']);
                ?>
                <div class="<?= $column_number.' wide';?> column">
                    <div class="ui raised segments">
                        <?php
                        //Check if will use TextImage
                        if($textimage_option->getDisplayTextImage()):?>
                            <div class="ui secondary segment" style="padding: 0;background-color: transparent;">
                                <?php $textimage_option->displayTextimage();?>
                            </div>
                            <?php
                        else:
                            ?>
                            <div class="ui secondary segment" style="padding: 0;background-color: transparent;">
                                <a href="<?=$value['post_link'];?>" class="image" target="_blank">
                                    <div class="ui image">
                                        <div class="content" style="text-align: center !important; padding: 5px;background-color: rgba(0, 0, 0, 0) !important; position: absolute; height: 100%; width: 100%;z-index: 1;padding-top: 25%;">
                                            <div class="center">
                                                <div class="header" style="font-size: 1em;color: #FFFFFF;"><?= $value['title'];?></div>
                                                <?php
                                                if (!empty($value['subtitle'])):
                                                    ?>
                                                    <br>
                                                    <div class="description" style="font-size: 1em;color: #FFFFFF;"><?= $value['subtitle'];?></div>
                                                    <?php
                                                endif;
                                                ?>
                                            </div>
                                        </div>
                                        <img src="<?=$value['image_url'];?>" width="100%">
                                    </div>
                                </a>
                            </div>
                            <?php
                        endif;
                        ?>
                    </div>
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
else:?>
    <h3><?=__("Empty data","sage");?></h3>
<?php
endif;