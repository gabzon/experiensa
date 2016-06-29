<?php
use Roots\Sage\Nav;
$menu_name = 'primary_navigation';//ui left vertical floating very wide active sidebar menu inverted teal unselectabl
?>

<div id="main-menu" class="ui sidebar floating inverted vertical menu">
    <br>
    <?php Header::get_phone_item('item'); ?>
    <?php Header::get_quote_item('item'); ?>
    <?php Menu::display_all_menus_mobile();?>
    <?php Menu::get_language_menu_accordion(); ?>
</div>
