<?php
/**
 * Template Name: News Template
 */
use Experiensa\Modules\QueryBuilder;
use Experiensa\Modules\Post;

$query = QueryBuilder::getPostByPostType('post');
if(!isset($background)){
    $background['style'] = '';
    $background['class'] = '';
    $background['type'] = 'none';
}
if(!isset($name)){
    $name = 'section_news';
}
if ($query && $query->have_posts()) :?>
<section id="<?=$name;?>" class="ui <?=$background['class'];?> vertical segment" style="<?=$background['style'];?>">
    <br>
    <div class="ui container vertical segment">
        <div class="ui center aligned header" style="color:#FFFFFF;">
            <div class="page-header">
                <h1><?= __('News','sage');?></h1>
            </div>
        </div>
        <div class="ui divided items" style="color: #FFFFFF;">
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
        get_template_part('templates/single','new');
    endwhile;
?>
        </div>
    </div>
    <br>
</section>
<?php
endif;