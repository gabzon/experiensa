<?php
$agency_options = get_option('agency_settings');
$logo = Helpers::getWebsiteLogo();
$margin = Header::get_row_topmargin(true);
?>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('.right.menu.open').on("click",function(e){
            e.preventDefault();
            jQuery('.ui.vertical.menu').toggle();
        });

        jQuery('.ui.dropdown').dropdown();
    });
</script>
<!-- Brigid Layout -->
<div id="header-nav" class="ui grid">
    <div class="computer tablet only row">
        <div class="ui <?= Header::get_menu_style(); ?> menu navbar grid borderless header-menu">
            <a class="item" href="<?= esc_url(home_url('/')); ?>">
                <?php if ($logo): ?>
                    <img class="ui tiny image logo" src="<?= wp_get_attachment_url($logo); ?>"  />
                <?php else: ?>
                    <?= Header::get_blog_name(); ?>
                <?php endif; ?>
            </a>
            <?= Header::get_website_name_tagline(); ?>
        </div>
    </div>
    <div class="computer tablet only row">
        <div class="ui <?= Header::get_menu_style(); ?> menu navbar grid borderless header-menu" style="margin-top: <?=$margin;?>px">
            <?php
            echo Header::get_phone_item('item');
            echo Header::get_quote_item('item');
            Menu::get_menu($page_id);
            echo Header::get_language_item('item');
            ?>
        </div>
    </div>
    <?php get_template_part('templates/partials/header/mobile'); ?>
</div>