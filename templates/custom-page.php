<?php
/**
 * Template Name: Custom Page
 */
?>
<div style="margin-top:40px">
    <?php while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; ?>
</div>
