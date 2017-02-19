<?php
/**
 * Template Name: Container Page
 */
?>
<!-- Container Page -->
<div class="ui container">
    <?php while (have_posts()) : the_post(); ?>
        <?php
            $content = get_the_content();
            echo $content;
        ?>
    <?php endwhile; ?>
</div>
