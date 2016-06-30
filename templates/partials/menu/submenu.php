<div class="menu">
<?php
foreach($menu_items as $item):
    if($item_id == $item->menu_item_parent):
        if(Menu::check_children_menu($menu_items,$item->ID)):?>
            <div class="item">
                <i class="dropdown icon"></i>
                <span class=\"text\"><?= $item->title;?></span>
                <?php Menu::get_submenu($menu_items,$item->ID);?>
            </div>
        <?php
        else:?>
            <a class="item" href="<?=$item->url;?>"><?=$item->title;?></a>
<?php
        endif;
    endif;
endforeach;
?>
</div>