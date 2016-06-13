<?php $logo = get_agency_logo(); ?>
<header class="ui grid">
    <div class="computer tablet only row">
        <div class="ui <?= get_menu_style(); ?> fixed menu navbar">
            <a href="" class="brand item menu-link borderless <?= scroll_menu(); ?>" href="<?= bloginfo('url'); ?>">
                <img class="ui image <?= $logo['size']; ?> logo" src="<?= $logo['url']; ?>" style='display: block;margin-left: auto;margin-right: auto;'>
            </a>
            <div class="right menu">
                <?= Menu::display_all_menus($page_id,'left',true); ?>
            </div>
        </div>
    </div>
    <div class="mobile only row">
        <?php get_template_part('templates/header/mobile'); ?>
    </div>
</header>
