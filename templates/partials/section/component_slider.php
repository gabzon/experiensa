<?php

if($show_layout):?>
<section id="<?= $name;?>" class="ui <?= $background['class'];?> vertical segment" style="<?= $background['style'];?>">
    <div class="ui <?= $layout['container_class'];?> vertical segment" style="<?= $layout['container_style'].$layout['content_color'];?>">
        <div class="ui <?= $layout['title_alignment']?> header" style="<?= $layout['title_color'];?>">
            <br>
            <br>
            <div class="page-header">
                <h1><?= $layout['title'];?></h1>
                <?= (!empty($layout['subtitle'])?"<h3>".$layout['subtitle']."</h3><br>":"");?>
            </div>
        </div>
        <p>
        <?php $this->slider_obj->showSlider();?>
        </p>
    </div>
</section>
<?php
else:?>
    <div style="color: #FFFFFF;">
<?php
    $this->slider_obj->showSlider($name);
endif;?>
    </div>
