<div class="ui image">
    <div class="<?= $textimage->getVerticalAlignment();?> content" style="<?= $textimage->getHorizontalAlignment();?> position: absolute; height: 100%; width: 100%;z-index: 1;<?= $textimage->getVerticalSimpleAlignment();?>">
        <div class="center">
            <div class="header" style="<?= $textimage->getTextStyle();?> font-weight: bold;"><?= $textimage->getTitle();?></div>
            <br>
            <div class="description"><?= $textimage->getSubtitle();?></div>
        </div>
    </div>
    <div class="ui dimmer" style="padding: 5px 5px 5px 5px;">

    </div>
    <img src="<?=$textimage->getImage();?>" width="100%">
</div>