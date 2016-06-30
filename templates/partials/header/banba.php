<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('.right.menu.open').on("click",function(e){
            e.preventDefault();
            jQuery('.ui.vertical.menu').toggle();
        });
        jQuery('.open-vertical-menu').on("click",function(e){
            e.preventDefault();
            jQuery('.ui.vertical.menu.pc').toggle();
        });
        jQuery('.ui.dropdown').dropdown();
    });
</script>
<!-- Banba Layout -->
<div id="header-nav" class="ui grid">
    <div class="computer tablet only row">
        <div class="ui <?= Header::get_menu_style(); ?> menu navbar grid borderless header-menu pc">
            <?= Header::header_logo_item();?>
            <?= Header::get_website_name_tagline(); ?>
            <div class="right menu open-vertical-menu">
                <a href="" class="menu item" style="font-weight:bold">
                    <i class="content icon"></i>
                </a>
            </div>
        </div>
        <!--mobile nav bar menu on pc-->
        <div class="ui vertical inverted navbar fixed menu pc">
            <?php
            Menu::get_menu_mobile($page_id);
            display_language_menu_accordion()
            ?>
        </div>
    </div>
    <?php get_template_part('templates/partials/header/mobile'); ?>
</div>