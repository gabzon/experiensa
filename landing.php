<?php
/**
* Template Name: Landing page
*/
$layout_options = get_option('layout_settings');
$slider = $layout_options['setting_header_phone'];
?>

<?php if ($slider): ?>
    <?php get_template_part('templates/landing/slider'); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/page', 'header'); ?>
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
