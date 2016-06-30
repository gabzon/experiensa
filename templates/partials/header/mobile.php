<?php
$agency_options = get_option('agency_settings');
$logo = $agency_options['agency_logo'];
?>
<div class="mobile only row">
    <div class="ui <?= Header::get_menu_style(); ?> inverted navbar menu borderless header-menu">
        <a class="item" href="<?= esc_url(home_url('/')); ?>">
            <?php if ($logo): ?>
                <img class="ui tiny image logo" src="<?= wp_get_attachment_url($logo); ?>"  />
            <?php else: ?>
                <?= get_blog_name(); ?>
            <?php endif; ?>
        </a>
        <div class="right menu open">
            <a href="" class="menu item" style="font-weight:bold">
                <i class="content icon"></i>
            </a>
        </div>
    </div>
    <!--mobile nav bar menu -->
    <div class="ui vertical inverted navbar fixed menu">
        <?php Menu::display_all_menus($page_id,'left',false); ?>
    </div>
</div>
