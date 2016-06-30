<!-- Main Menu -->
<?php
$menu_list = Menu::get_all_menus_list();
if(!empty($menu_list)):
    foreach($menu_list as $menu):
        $menu_items = wp_get_nav_menu_items($menu->term_id);
        foreach($menu_items as $item):
            if($item->menu_item_parent == 0):
                if (Menu::check_children_menu($menu_items, $item->ID)):
                    if ($page_id && $page_id == $item->object_id) :
                    ?>
                        <div class="ui dropdown item active landing-menu">
                    <?php
                    else:
                    ?>
                        <div class="ui dropdown item landing-menu">

                    <?php
                    endif;
                    ?>
                            <!-- sub-menu -->
                            <?=$item->title;?><i class="dropdown icon"></i>
                            <?php
                                Menu::get_submenu($menu_items,$item->ID);
                            ?>
                        </div>
                <?php
                else:
                    if ($item->menu_item_parent == 0):
                        if ($page_id && $page_id == $item->object_id) :?>
                            <a class="item active" href="<?= $item->url;?>"><?=$item->title;?></a>
                        <?php
                        else:
                        ?>
                            <a class="item" href="<?=$item->url;?>"><?= $item->title;?></a>
                        <?php
                        endif;
                    endif;
                endif;
            endif;
        endforeach;
    endforeach;
endif;