<?php
/**
 * Template Name: Catalog
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<?php $response = file_get_contents('http://fiestatravel.ch/wp-json/posts?type=product'); ?>
<?php $response = json_decode($response); ?>
<?php Piklist::pre($response) ?>
