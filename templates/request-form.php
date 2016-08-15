<?php
/**
 * Template Name: Request form
 */
?>
<br>
<br>
<br>
<div class="ui container">
    <?php while (have_posts()) : the_post(); ?>
    <?php endwhile; ?>

    <?php get_template_part('templates/components/form'); ?>
</div>
