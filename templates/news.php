<?php
/**
 * Template Name: News Template
 */
use Experiensa\Modules\QueryBuilder;
use Experiensa\Modules\Post;

$query = QueryBuilder::getPostByPostType('post');

if ($query && $query->have_posts()) :?>
<section id="section_news" style="background-color: #0d3349;">
    <div class="ui relaxed divided list">
<?php
    while ($query->have_posts()) :
        $query->the_post();
        $id = $query->post->ID;
        $post_link = get_permalink($id);
        $title = ucwords(get_the_title($id));
        $images = Post::getImages($id);
        $content = Post::getPostContent($id);
        set_query_var('title',$title);
        set_query_var('content',$content);
        set_query_var('post_link',$post_link);
        set_query_var('images',$images);
        echo "$id - $title - $content - $post_link";
        get_template_part('templates/single','new');
    endwhile;
?>
    </div>
</section>
<?php
endif;