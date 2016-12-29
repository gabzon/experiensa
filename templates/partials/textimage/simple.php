<div class="ui image">
    <div class="content" style="<?= $textimage->getHorizontalAlignment();?> padding: 5px;background-color: rgba(0, 0, 0, 0) !important; position: absolute; height: 100%; width: 100%;z-index: 1;<?= $textimage->getVerticalSimpleAlignment();?> ">
        <div class="center">
            <div class="header" style="<?= $textimage->getTextStyle();?> font-weight: bold;"><?= $textimage->getTitle();?></div>
            <br>
            <div class="description" style="color: #ffffff;"><?= $textimage->getSubtitle();?></div>
        </div>
    </div>
    <img src="<?=$textimage->getImage();?>" width="100%" alt="<?= $textimage->getTitle();?>">
</div>
