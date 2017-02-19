<!-- LiveComposer Header-Footer Post-->
<br>
<br>
<br>
<div class="ui">
    <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?>>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
</div>
<br>
<br>

