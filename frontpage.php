<?php
/**
* Template Name: Front page
*/

$layout_options = get_option('layout_settings');
$slider = $layout_options['setting_header_phone'];


get_template_part('templates/frontpage/slider');
get_template_part('templates/frontpage/destinations');

while (have_posts()) {
    the_post();
    get_template_part('templates/content', 'page');
}

get_template_part('templates/frontpage/promotions');

?>
