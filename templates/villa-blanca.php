<?php
/**
* Template Name: Villa Blanca Template
*/

use Experiensa\Modules\QueryBuilder;
$design_settings = get_option('experiensa_design_settings');
$page_object = get_queried_object();
$page_id     = get_queried_object_id();
$section_obj = new Experiensa\Component\Section($page_id,$design_settings,'landing_section_options');
if($section_obj->checkExistSections()):
    $sections = $section_obj->getSections();
    foreach($sections as $section):
        $section_obj->showSection($section);
    endforeach;
endif;
?>
<?php
    get_template_part('templates/villa_blanca/pricing');
    get_template_part('templates/villa_blanca/reservations');
    //get_template_part('templates/villa_blanca/references');
?>
