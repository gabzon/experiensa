<!-- Main Mobile Menu -->
<?php
$main_menu = Menu::get_main_menu();
if(!empty($main_menu)):?>
    <div class="item">
        <div class="header">MENU</div>
        <?php
        $menu_items = wp_get_nav_menu_items($main_menu->term_id);
        foreach($menu_items as $item):
            if ($item->menu_item_parent == 0):
                if (Menu::check_children_menu($menu_items, $item->ID)):
        ?>
                    <div class="ui inverted accordion">
                        <div class="title active">
                            <i class="dropdown icon"></i>
                            <?= $item->title;?>
                        </div>
                        <div class="content active">
                            <?php Menu::get_submenu_mobile($menu_items, $item->ID);?>
                        </div>
                    </div>
        <?php
                else:
        ?>
                    <a class="item" href="<?= $item->url;?>"><?= $item->title;?></a>
        <?php
                endif;
            endif;
        endforeach;
        ?>
    </div>
<?php
endif;;
