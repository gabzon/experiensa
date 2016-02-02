<?php
/**
 * Template Name: About template
 */
?>
<br>
<br>
<br>
<div class="ui container">
    <?php while (have_posts()) : the_post(); ?>
      <?php get_template_part('templates/page', 'header'); ?>
      <?php get_template_part('templates/content', 'page'); ?>
    <?php endwhile; ?>
    <br>
    <?php get_template_part('templates/about/about'); ?>
    <br>
    <?php get_template_part('templates/about/map'); ?>
</div>
<br>
<br>
