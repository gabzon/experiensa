<style>
    figure:hover{
        background-color: <?= $textimage->getAnimationColor();?>;
    }
</style>
<div class="ui image">
    <figure class="<?= $textimage->getAnimation();?>">
        <div class="content" style="text-align: center !important; padding: 5px;background-color: rgba(0, 0, 0, 0) !important; position: absolute; height: 100%; width: 100%;z-index: 1;padding-top: 25%;">
            <div class="center">
                <div class="header" style="font-size: 1em;color: #FFFFFF;font-weight: bold;"><?= $textimage->getTitle();?></div>
            </div>
        </div>
        <img src="<?=$textimage->getImage();?>">
        <figcaption style="background-color: <?= $textimage->getAnimationColor();?>;">
            <div class="content" style="<?= $textimage->getHorizontalAlignment();?>">
                <div class="center">
                    <div class="header" style="<?= $textimage->getTextStyle();?>"><?= "";//$textimage->getTitle();?></div>
                    <br>
                    <div class="description"><?= $textimage->getSubtitle();?></div>
                </div>
            </div>
        </figcaption>
        <a href="<?=$textimage->getPostLink();?>"></a>
    </figure>
</div>

