<div class="ui image">
    <figure class="imghvr-reveal-down">
        <img src="<?=$textimage->getImage();?>">
        <figcaption>
            <div class="<?= $textimage->getVerticalAlignment();?> content" style="<?= $textimage->getHorizontalAlignment();?>">
                <div class="center">
                    <div class="header" style="<?= $textimage->getTextStyle();?>"><?= $textimage->getTitle();?></div>
                    <br>
                    <div class="description"><?= $textimage->getSubtitle();?></div>
                </div>
            </div>
        </figcaption>
        <a href="<?=$textimage->getPostLink;?>"></a>
    </figure>
</div>

