<?php
if(!empty($data)):
?>
<style>
    .pinterest-container {
        margin:20px auto;
    }
    .pinterest-container .pinto {
        box-sizing: border-box;
        border: 1px solid;
    }
    .pinterest-container .pinto {
        margin-bottom:15px;
        color:#333;
        text-align:left;
        border-radius:5px;
        overflow:hidden;
    }
    .pinterest-container .pinto img {
        display:block;
        width:100%;
    }
    .pinterest-container .pinto .info {
        padding:10px 15px;
        background-color:#fff;
    }
    .pinterest-container .pinto .info h2 {
        margin:0;
        font-size:18px;
    }
    .pinterest-container .pinto .info p {
        margin:10px 0 0;
        font-size:14px;
    }
</style>
<!-- Pinterest Component -->
<section id="<?= $name;?>" class="ui vertical segment custom-section <?= $background['color'];?>" style="<?= $background['size'];?>">
    <div class="section-background <?= $background['class'];?>" style="<?= $background['style'];?>"></div>
    <div class="ui <?= $layout['container_class'];?> vertical segment section-content" style="<?= $layout['content_color'];?>">
        <div class="ui <?= $layout['title_alignment']?> header" style="<?= $layout['title_color'];?>">
            <div class="page-header">
                <h1><?= $layout['title'];?></h1>
                <?= (!empty($layout['subtitle'])?"<h3>".$layout['subtitle']."</h3><br>":"");?>
            </div>
        </div>
        <div class="pinterest-container">
        <?php
        foreach($data as $value):
//            if(!isset($value['post_link'])):
        ?>
            <div class="pinto">
                <a href="<?=$value['post_link'];?>" class="image" target="_blank">
                    <img src="<?=$value['image_url'];?>" alt="<?=$value['title'];?>">
                </a>
                <div class="info">
                    <h2><?=$value['title'];?></h2>
                    <br/>
                    <p><?=$value['subtitle'];?></p>
                </div>
            </div>
        <?php
//            endif;
        endforeach;
        ?>
        </div>
    </div>
</section>
    <?php
endif;