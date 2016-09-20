<?php
/**
 * Template Name: Promotions Template
 */
use Experiensa\Modules\QueryBuilder;
$design_settings = get_option('experiensa_design_settings');
$page_object = get_queried_object();
$page_id     = get_queried_object_id();

$section_obj = new Experiensa\Component\Section($page_id,$design_settings,'promotions_section_options');
if($section_obj->checkExistSections()):
    $sections = $section_obj->getSections();
    foreach($sections as $section):
        $section_obj->showSection($section);
    endforeach;
else:?>
    <br>
    <br>
    <br>
    <br>
    <div class="ui container" style="margin-top:40px">
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('templates/page', 'header'); ?>
            <?php get_template_part('templates/content', 'page'); ?>
        <?php endwhile; ?>
    </div>
    <br>
    <br>
<?php
endif;