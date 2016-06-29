<?php
foreach($menu_items as $item):
    if($item_id == $item->menu_item_parent):
        if(!Menu::check_children_menu($menu_items,$item->ID)):?>
            <a class="item" href="<?=$item->url;?>">
                <?=$item->title;?>
            </a>
        <?php
        endif;
    endif;
endforeach;