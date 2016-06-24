<script type="text/javascript">
<<<<<<< HEAD
jQuery(document).ready(function(){
    jQuery('.right.menu.open').on("click",function(e){
        e.preventDefault();
        jQuery('.ui.vertical.menu').toggle();
=======
    jQuery(document).ready(function(){
        jQuery('.right.menu.open').on("click",function(e){
            e.preventDefault();
            jQuery('.ui.vertical.menu').toggle();
        });

        jQuery('.ui.dropdown').dropdown();
>>>>>>> 28370283efb57b1951e7d857a7e998eb6cbc4e6f
    });
</script>
<<<<<<< HEAD

=======
<!-- Fodla Layout -->
>>>>>>> 28370283efb57b1951e7d857a7e998eb6cbc4e6f
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
