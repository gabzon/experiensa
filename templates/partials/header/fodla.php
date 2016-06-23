<?php
$agency_options = get_option('agency_settings');
$logo = $agency_options['agency_logo'];
?>
<header class="ui grid">
    <?php //echo Header::get_mobile_header();?>
    <div class="mobile only row">
        <div class="ui <?= Header::get_menu_style(); ?> menu grid borderless header-menu">
            <a class="item" href="<?= esc_url(home_url('/')); ?>">
                <?php if ($logo): ?>
                    <img class="ui tiny image logo" src="<?= wp_get_attachment_url($logo); ?>"  />';
                <?php else: ?>
                    get_blog_name();
                <?php endif; ?>
            </a>
            <div class="menu right mobile-menu">
                <!-- <a class="launch icon item">
                    <i class='sidebar icon'></i>
                </a> -->
                <div class='item'>
                    <button class=\"ui inverted button launch icon mobile-menu\" style='z-index: 1000;'>
                        MENU
                        <i class='content link icon' style='margin: auto !important;'></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="computer tablet only row">
        <div class="ui <?= Header::get_menu_style();?> menu grid header-menu">
            <?php
            echo Header::get_logo_header('');
            echo Header::get_website_name_tagline();
            ?>
            <div class="right menu">
                <?php
                echo Header::get_phone_item('item');
                echo Header::get_quote_item('item');
                Menu::display_all_menus($page_id,'left',false);
                echo Header::get_language_item('item');
                ?>
            </div>
        </div>
    </div>
</header>
