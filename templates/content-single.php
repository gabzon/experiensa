<!-- Content Single Post -->
<br>
<br>
<br>
<br>
<br>
<div class="ui container">
    <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?>>
            <header>
                <h1 class="entry-title"><?php the_title(); ?></h1>
<!--                --><?php //get_template_part('templates/entry-meta'); ?>
            </header>
            <br>

            <div class="entry-content">
                <?php 
                $content = get_the_content();
                echo $content;
//                echo "<h1>".get_bloginfo('url')."</h1>";
//                echo "<h1>".get_bloginfo('wpurl')."</h1>";
                Catalog::get_catalog();
                echo"<pre>";
                var_dump(Catalog::get_catalog());
                echo"</pre>";
                ?>
            </div>
            <footer>
                <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
            </footer>
            <?php
            if(comments_open()):
                comments_template('/templates/comments.php');
            endif;
            ?>
        </article>
    <?php endwhile; ?>
</div>
<br>
<br>
