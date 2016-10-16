<?php
/**
* Template Name: Landing page
*/
$design_settings = get_option('experiensa_design_settings');
$page_object = get_queried_object();
$page_id     = get_queried_object_id();
//echo "<br><br><br>";
//echo "<pre>";
//print_r($design_settings['landing_section_options']);
//echo "</pre>";
$section_obj = new Experiensa\Component\Section($page_id,$design_settings,'landing_section_options');
if($section_obj->checkExistSections()):
    $sections = $section_obj->getSections();
    foreach($sections as $section):
//        echo "<pre>";
//        print_r($section);
//        echo "</pre>";
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
get_template_part('templates/landing/partners');
?>

