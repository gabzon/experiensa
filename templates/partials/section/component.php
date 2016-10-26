<section id="<?= $name;?>" class="ui vertical segment custom-section" style="<?= $background['size'];?> overflow: hidden;">
    <div class="section-background <?= $background['class'];?>" style="<?= $background['style'];?> overflow-y: scroll;-webkit-overflow-scrolling:touch;"></div>
    <div class="ui <?= $layout['container_class'];?> vertical segment" style="<?= $layout['container_style'].$layout['content_color'];?>">
        <div class="ui <?= $layout['title_alignment']?> header" style="<?= $layout['title_color'];?>">
            <div class="page-header">
                <h1><?= $layout['title'];?></h1>
                <?= (!empty($layout['subtitle'])?"<h3>".$layout['subtitle']."</h3><br>":"");?>
            </div>
        </div>
        <?php \Showcase::displayComponent($component,$showcase_data,$textimage_obj,$column_number);?>
        <br>
        <br>
        <br>
    </div>
</section>