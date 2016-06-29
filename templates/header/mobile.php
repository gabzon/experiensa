<?php
$logo_url = Header::get_header_logo_url();
$logo_size = Header::get_header_logo_size();
?>
<div class="ui container">
    <div class="ui fixed menu borderless navbar">
        <a href="" class="brand item menu-link borderless <?= Header::scroll_menu_class(); ?>" href="<?= bloginfo('url'); ?>">
            <img class="ui image <?= $logo_size; ?> logo" src="<?= $logo_url; ?>" style='display: block;margin-left: auto;margin-right: auto;'>
        </a>
        <div class="right menu">
            <a href="#" class="item mobile-menu ui button green">
                <i class="sidebar icon"></i>
            </a>
        </div>
    </div>
</div>
