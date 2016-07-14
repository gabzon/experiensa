<article <?php post_class(); ?>>
    <div class="ui grid stackable">
        <div class="four wide column">
            <?php if ( has_post_thumbnail() ):  ?>
                <img src="<?php the_post_thumbnail_url('full'); ?>" alt="" class="ui image"/>
            <?php endif ?>
        </div>
        <div class="twelve wide column">
            <header>
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php get_template_part('templates/entry-meta'); ?>
            </header>
            <div class="entry-summary">
                <?php the_excerpt(); ?>
            </div>
        </div>
    </div>
</article>
