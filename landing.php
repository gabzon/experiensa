<?php
/**
* Template Name: Landing page
*/

get_template_part('templates/landing/slider');

get_template_part('templates/landing/destinations');

while (have_posts()) {
    the_post();
    get_template_part('templates/content', 'page');
}

get_template_part('templates/landing/promotions');

?>
