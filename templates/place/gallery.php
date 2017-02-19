<div class="sixteen wide column">
    <div class="grid-masonry">
        <div class="grid-sizer"></div>
        <?php foreach ($photos as $photo):?>
            <a href="#" class="place-photo">
                <div class="grid-item">
                    <div class="ui image">
                        <div class="ui dimmer" style="padding: 5px 5px 5px 5px;"></div>
                        <img src="<?=$photo?>" width="100%" alt="<?= $name;?>">
                    </div>
                </div>
            </a>
            <div class="ui basic modal place-photo-modal">
                <div class="content">
                    <div class="ui image">
                        <img src="<?=$photo?>" width="100%" alt="<?= $name;?>">
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>