<?php
/**
* Template Name: Landing page
*/

get_template_part('templates/frontpage/slider');
askldfjéalskdjf

get_template_part('templates/frontpage/destinations');

while (have_posts()) {
    the_post();
    get_template_part('templates/content', 'page');
}

get_template_part('templates/frontpage/promotions');

?>
