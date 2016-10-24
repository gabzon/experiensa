<?php
    $footer_menu = Menu::get_footer_menu();
//echo "<pre>";
//print_r($footer_menu);
//echo "</pre>";
if(!empty($footer_menu)):
    foreach($footer_menu as $menu):
        $menu_items = wp_get_nav_menu_items($menu->term_id);?>
        <div class="ui inverted  menu navbar grid borderless">
        <?php
        foreach($menu_items as $item):?>
            <a class="item active" href="<?= $item->url;?>"><?=$item->title;?></a>
        <?php
        endforeach;?>
         </div>
    <?php
    endforeach;
endif;
