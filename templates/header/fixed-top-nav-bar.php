<?php
$logo_url = Header::get_header_logo_url();
$logo_size = Header::get_header_logo_size();
?>
<header class="ui grid">
    <div class="computer tablet only row">
        <div class="ui <?= Header::get_menu_style(); ?> fixed menu navbar">
            <a href="" class="brand item menu-link borderless <?= Header::scroll_menu_class(); ?>" href="<?= bloginfo('url'); ?>">
                <img class="ui image <?= $logo_size; ?> logo" src="<?= $logo_url; ?>" style='display: block;margin-left: auto;margin-right: auto;'>
            </a>
            <div class="right menu">
                <?= Menu::get_menu($page_id); ?>
            </div>
        </div>
    </div>
    <div class="mobile only row">
        <?php get_template_part('templates/header/mobile'); ?>
    </div>
</header>
