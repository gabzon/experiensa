<?php
$agency_options = get_option('agency_settings');
$logo = $agency_options['agency_logo'];
$logo_size = Header::get_header_logo_size();
?>
<div class="mobile only row">
<<<<<<< HEAD
    <div class="ui <?= Header::get_menu_style(); ?> inverted navbar menu borderless header-menu">
=======
    <div class="ui <?= Header::get_menu_style(); ?> navbar menu borderless header-menu mobile">
>>>>>>> be556f9ca4d4d310fdab5e1e04fc0701e81690b7
        <a class="item" href="<?= esc_url(home_url('/')); ?>">
            <?php
            if ($logo):?>
                <img class="ui <?= $logo_size;?> image logo" src="<?= wp_get_attachment_url($logo); ?>"  />
            <?php else: ?>
                <?= Header::get_blog_name(); ?>
            <?php endif; ?>
        </a>
        <div class="right menu open">
            <a href="" class="menu item" style="font-weight:bold">
                <i class="content icon"></i>
            </a>
        </div>
    </div>
    <!--mobile nav bar menu -->
    <div class="ui vertical inverted navbar fixed menu mobile">
        <?php Menu::get_menu_mobile($page_id); ?>
        <?php display_language_menu_accordion()?>
    </div>
</div>
