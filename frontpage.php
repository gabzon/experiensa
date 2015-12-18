<?php
/**
* Template Name: Front page
*/
$layout_options = get_option('layout_settings');
$slider = $layout_options['setting_header_phone'];
?>

<?php get_template_part('templates/frontpage/slider'); ?>
<?php get_template_part('templates/frontpage/destinations'); ?>
<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
<?php get_template_part('templates/frontpage/promotions'); ?>
