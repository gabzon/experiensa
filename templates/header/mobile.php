<?php $logo = get_agency_logo(); ?>
<div class="ui container">
    <div class="ui fixed menu borderless navbar">
        <a href="" class="brand item menu-link borderless <?= scroll_menu(); ?>" href="<?= bloginfo('url'); ?>">
            <img class="ui image <?= $logo['size']; ?> logo" src="<?= $logo['url']; ?>" style='display: block;margin-left: auto;margin-right: auto;'>
        </a>
        <div class="right menu">
            <a href="#" class="item mobile-menu ui button green">
                <i class="sidebar icon"></i>
            </a>
        </div>
    </div>
</div>
