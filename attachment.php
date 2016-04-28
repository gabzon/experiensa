<br>
<div class="ui container" style="margin-top: 40px">
<?php while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
        <header>
            <h1 class="entry-title"><?= ucwords(get_the_title($post->ID)); ?></h1>
        </header>
        <br>
        <?php
        $is_image = wp_attachment_is_image($post->ID);
        $title = get_the_title($post->ID);
        if($is_image):
        	$is_country = has_term($title,'country',$post->ID);
        	if($is_country):
	        	get_template_part('templates/attachment/country');
    		else:
    			get_template_part('templates/attachment/image');
    		endif;
    	else:
	    	get_template_part('templates/attachment/file');
    	endif;
    	?>
    </article>
<?php endwhile; ?>
</div>
<br>