<section id="<?= $name;?>" class="ui vertical segment custom-section" style="<?= $background['size'];?> overflow: hidden;">
    <div class="section-background <?= $background['class'];?>" style="<?= $background['style'];?> overflow-y: scroll;-webkit-overflow-scrolling:touch;"></div>
    <div class="ui <?= $layout['container_class'];?> vertical segment" style="<?= $layout['container_style'].$layout['content_color'];?>">
        <br>
        <div class="ui <?= $layout['title_alignment']?> header" style="<?= $layout['title_color'];?>">
            <br>
            <br>
            <div class="page-header">
                <h1><?= $page['title'];?></h1>
            </div>
        </div>
        <br>
        <br>
        <br>
        <?= $page['content'];?>
    </div>
    <br>
    <br>    
</section>