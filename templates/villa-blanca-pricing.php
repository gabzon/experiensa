<?php
/**
 * Template Name: Villa Blanca Pricing
 */
use Experiensa\Modules\QueryBuilder;
use Experiensa\Modules\Post;

$query = QueryBuilder::getPostByPostType('post');
if(!isset($background)){
    $bg_url = get_stylesheet_directory_uri().'/assets/images/comedor.jpg';
    $background['style'] = "background:url('".$bg_url."') no-repeat center center fixed; background-size: cover; height:100vh;";
    $background['class'] = 'inverted';
    $background['type'] = 'none';
}
if(!isset($name)){
    $name = 'villa_blanca_pricing';
}
?>
<section id="villa_blanca_pricing" class="ui segment vertical custom-section" style="<?= $background['size'];?>">
    <div class="section-background <?= $background['class'];?>" style="<?= $background['style'];?>"></div>
    <br>
    <br>
    <br>
    <h1 class="text-center" style="color: #FFFFFF;"><?= __('Pricing','sage');?></h1>
    <br>
    <div class="ui grid centered">
    <?php
        get_template_part('templates/villa_blanca/high','season');
        get_template_part('templates/villa_blanca/low','season');
    ?>
    </div>
    <br>
</section>