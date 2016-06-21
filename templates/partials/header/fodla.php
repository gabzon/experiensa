<header class="ui grid">
    <?php echo Header::get_mobile_header();?>
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
