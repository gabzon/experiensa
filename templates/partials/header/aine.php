<?php
$margin = Header::get_row_topmargin(true);
?>
<header class="ui grid">
    <?= Header::get_mobile_header();?>
    <div class="computer tablet only row">
        <div class="ui <?= Header::get_menu_style();?> menu centered grid header-menu">
            <?= Header::get_logo_header('');?>
        </div>
    </div>
    <?php
    if(Header::check_display_company_name()):
    ?>
    <div class="computer tablet only row">
        <div class="ui <?= Header::get_menu_style();?> menu centered grid header-menu" style="margin-top: <?=$margin;?>px">
            <?= Header::get_website_name_tagline();?>
            <?php
            if(Header::check_display_company_tagline())
                $margin += 69;
            else
                $margin += 42;
            ?>
        </div>
    </div>
    <?php
    endif;
    ?>
    <div class="computer tablet only row">
        <div class="ui <?= Header::get_menu_style();?> menu centered grid header-menu" style="margin-top: <?=$margin;?>px">
            <?php
            echo Header::get_phone_item('item');
            echo Header::get_quote_item('item');
            Menu::display_all_menus($page_id,'left',false);
            echo Header::get_language_item('item');
            ?>
        </div>
    </div>
</header>