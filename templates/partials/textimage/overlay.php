<style>
    figure:hover{
        background-color: <?= $textimage->getAnimationColor();?>;
    }
</style>
<div class="ui image">
    <figure class="<?= $textimage->getAnimation();?>">
        <img src="<?=$textimage->getImage();?>">
        <figcaption style="background-color: <?= $textimage->getAnimationColor();?>;">
            <div class="content" style="<?= $textimage->getHorizontalAlignment();?>">
                <div class="center">
                    <div class="header" style="<?= $textimage->getTextStyle();?>"><?= $textimage->getTitle();?></div>
                    <br>
                    <div class="description"><?= $textimage->getSubtitle();?></div>
                </div>
            </div>
        </figcaption>
        <a href="<?=$textimage->getPostLink();?>"></a>
    </figure>
</div>

