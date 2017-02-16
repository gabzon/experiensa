<?php
/**
 * Template Name: Custom Page
 */
?>
<div class="ui container">
    <?php while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; ?>
</div>
