<<<<<<< HEAD
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('.right.menu.open').on("click",function(e){
            e.preventDefault();
            jQuery('.ui.vertical.menu').toggle();
        });
        jQuery('.ui.dropdown').dropdown();
    });
</script>
<!-- Fodla Layout -->
<div id="header-nav" class="ui grid">
    <div class="computer tablet only row">
        <div class="ui <?= Header::get_menu_style(); ?> menu navbar grid borderless header-menu">
            <?= Header::header_logo_item();?>
            <?= Header::get_website_name_tagline(); ?>
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
    <?php get_template_part('templates/partials/header/mobile'); ?>
</div>
=======
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('.right.menu.open').on("click",function(e){
            e.preventDefault();
            jQuery('.ui.vertical.menu').toggle();
        });

        jQuery('.ui.dropdown').dropdown();
    });
</script>
<!-- Fodla Layout -->
<div id="header-nav" class="ui grid">
    <div class="computer tablet only row">
        <div class="ui <?= Header::get_menu_style(); ?> menu navbar grid borderless header-menu">
            <?= Header::header_logo_item();?>
            <?= Header::get_website_name_tagline(); ?>
            <div class="right menu">
                <?php
                echo Header::get_phone_item('item');
                echo Header::get_quote_item('item');
                Menu::get_menu($page_id);
                echo Header::get_language_item('item');
                ?>
            </div>
        </div>
    </div>
    <?php get_template_part('templates/partials/header/mobile'); ?>
</div>
>>>>>>> be556f9ca4d4d310fdab5e1e04fc0701e81690b7