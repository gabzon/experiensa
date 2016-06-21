<header class="ui grid">
    <?php echo Header::get_mobile_header();?>
    <div class="computer tablet only row">
        <div class="ui <?= Header::get_menu_style();?> menu grid header-menu">
            <?php
            echo Header::get_logo_header('');
            echo Header::get_website_name_tagline();
            ?>
            <div class='menu right'>
                <a href="#" class="menu item">
                    <i class="sidebar icon mobile-menu"></i>
                </a>
            </div>
        </div>
    </div>
</header>