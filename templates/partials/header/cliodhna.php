<?php
$margin = Header::get_row_topmargin(true);
?>
<header class="ui grid">
    <?= Header::get_mobile_header();?>
    <div class="computer tablet only row">
        <div class="ui <?= Header::get_menu_style();?> menu grid header-menu">
            <div class="right menu">
                <?= Header::get_logo_header('');?>
                <?= Header::get_website_name_tagline();?>
            </div>
        </div>
    </div>
    <div class="computer tablet only row">
        <div class="ui <?= Header::get_menu_style();?> menu grid second-grid header-menu" style="margin-top: <?=$margin;?>px">
            <?php
            echo Header::get_phone_item('item');
            echo Header::get_quote_item('item');
            Menu::display_all_menus($page_id,'left',false);
            ?>
            <div class="right menu">
                <?= Header::get_language_item('item');?>
            </div>
        </div>
    </div>
</header>
