<br>
<br>
<br>
<!-- Single Page -->
<div class="ui" style="margin-top:40px">
    <?php while (have_posts()) : the_post(); ?>
<!--      --><?php //get_template_part('templates/page', 'header'); ?>
      <?php get_template_part('templates/content', 'page'); ?>
    <?php endwhile; ?>
</div>
<br>
<br>