<?php
/**
* Template Name: Landing page
*/

$design_options = get_option('experiensa_design_settings');

$order = $design_options['landing_order'];
get_template_part('templates/landing/slider');

foreach ($order as $key) {
    switch ($key) {
        case 'destination':
            get_template_part('templates/landing/destinations');
            break;
        case 'promotion':
            get_template_part('templates/landing/promotions');
            break;
        case 'theme':
            get_template_part('templates/landing/themes');
            break;
        case 'country':
            get_template_part('templates/landing/countries');
            break;
        case 'content':
            while (have_posts()) {
                the_post();
                get_template_part('templates/content', 'page');
            }
            break;
        default:
        while (have_posts()) {
            the_post();
            get_template_part('templates/content', 'page');
        }
        break;
    }
}




?>
