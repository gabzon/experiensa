<div class="ui <?= $background['class'];?> vertical segment" style="<?= $background['style'];?>">
    <div class="ui <?= $layout['container_class'];?> vertical segment" style="<?= $layout['container_style'].$layout['content_color'];?>">
        <div class="ui <?= $layout['title_alignment']?> header" style="<?= $layout['title_color'];?>">
            <div class="page-header">
                <h1><?= $page['title'];?></h1>
            </div>
        </div>
        <?= $page['content'];?>
    </div>
</div>