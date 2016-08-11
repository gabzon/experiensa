<div class="ui image">
    <div class="ui dimmer" style="padding: 5px 5px 5px 5px;">
        <div class="<?= $textimage->getVerticalAlignment();?> content" style="<?= $textimage->getHorizontalAlignment();?>">
            <div class="center">
                <div class="header" style="<?= $textimage->getTextStyle();?>"><?= $textimage->getTitle();?></div>
                <br>
                <div class="description"><?= $textimage->getSubtitle();?></div>
            </div>
        </div>
    </div>
    <img src="<?=$textimage->getImage();?>" width="100%">
</div>