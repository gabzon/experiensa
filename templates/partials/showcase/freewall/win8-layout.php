<?php
if(!empty($data)):
?>
<!-- Freewall Windows 8 Layout Component -->
<section id="<?= $name;?>" class="ui vertical segment custom-section <?= $background['color'];?>" style="<?= $background['size'];?>">
    <div class="section-background <?= $background['class'];?>" style="<?= $background['style'];?>"></div>
    <div class="ui <?= $layout['container_class'];?> vertical segment section-content" style="<?= $layout['content_color'];?>">
        <div class="ui <?= $layout['title_alignment']?> header" style="<?= $layout['title_color'];?>">
            <div class="page-header">
                <h1><?= $layout['title'];?></h1>
                <?= (!empty($layout['subtitle'])?"<h3>".$layout['subtitle']."</h3><br>":"");?>
            </div>
        </div>
        <div class="win8-layout">
            <div id="win8-freewall" class="free-wall">
    <?php
        for($i=0;$i<count($data);$i++):
            if((($i+1)%2)!=0):
                if(isset($data[$i]['post_link'])):?><a href="<?=$data[$i]['post_link'];?>"><?php endif; ?>
                <!-- two columns and one row -->
                <div class="item size21 level1">
                    <div class="win8-wallpaper">
                        <?php
                        $textimage_option->setInfo($data[$i]['title'], $data[$i]['subtitle'],$data[$i]['image_url']);
                        $textimage_option->displayTextimage();
                        ?>
                    </div>
                </div>
                <?php if(isset($data[$i]['post_link'])):?></a><?php endif;?>
        <?php else:
            if($i+3<count($data)):?>
                <!-- two columns and two rows -->
                <div class="size22 level1" data-fixSize=0 data-nested=".size11" data-cellW=150 data-cellH=150 data-gutterX=10 >
                <?php
                for($j=$i;$j<=$i+3;$j++): ?>
                    <?php if(isset($data[$j]['post_link'])):?><a href="<?=$data[$j]['post_link'];?>"><?php endif; ?>
                    <div class="item size11">
                        <div class="win8-wallpaper">
                            <?php
                            $textimage_option->setInfo($data[$j]['title'], $data[$j]['subtitle'], $data[$j]['thumbnail_url']);
                            $textimage_option->displayTextimage();
                            ?>
                        </div>
                    </div>
                    <?php if(isset($data[$j]['post_link'])):?></a><?php endif;?>
                <?php endfor;?>
                </div>
                <?php $i = $j - 1;?>
            <?php else:?>
                <?php if($i+1<count($data)):?>
                <div class="size21 level1" data-fixSize=0 data-nested=".size11" data-cellW=150 data-cellH=150 data-gutterX=10 >
                    <?php for($j=$i;$j<=$i+1;$j++):?>
                    <?php if(isset($data[$j]['post_link'])):?>
                    <a href="<?=$data[$j]['post_link'];?>">
                    <?php endif; ?>
                        <div class="item size11">
                            <div class="win8-wallpaper">
                                <?php
                                $textimage_option->setInfo($data[$j]['title'], $data[$j]['subtitle'], $data[$j]['thumbnail_url']);
                                $textimage_option->displayTextimage();
                                ?>
                            </div>
                        </div>
                    <?php if(isset($data[$j]['post_link'])):?>
                        </a>
                    <?php endif; ?>
                    <?php endfor;?>
                </div>
                    <?php $i = $j - 1;?>
                <?php else:?>
                <?php if(isset($data[$i]['post_link'])):?>
                    <a href="<?=$data[$i]['post_link'];?>">
                    <?php endif; ?>
                    <div class="item size21 level1">
                        <div class="win8-wallpaper">
                            <?php
                            $textimage_option->setInfo($data[$i]['title'], $data[$i]['subtitle'], $data[$i]['image_url']);
                            $textimage_option->displayTextimage();
                            ?>
                        </div>
                    </div>
                    <?php if(isset($data[$i]['post_link'])):?>
                    </a>
                    <?php endif; ?>
                <?php endif;?>
            <?php endif;?>
    <?php
            endif;
        endfor;
    ?>
            </div>
        </div>
    </div>
</section>
<?php
endif;
