<?php
    $footer_menu = Menu::get_footer_menu();
if(!empty($footer_menu)):
    foreach($footer_menu as $menu):
        $menu_items = wp_get_nav_menu_items($menu->term_id);?>
        <div class="ui secondary stackable inverted menu">
        <?php
        foreach($menu_items as $item):?>
            <a class="item" href="<?= $item->url;?>"><?=$item->title;?></a>
        <?php
        endforeach;?>
         </div>
    <?php
    endforeach;
endif;
