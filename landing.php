<?php
/**
* Template Name: Landing page
*/

$design_options = get_option('experiensa_design_settings');
get_template_part('templates/landing/slider');
$page_object = get_queried_object();
$page_id     = get_queried_object_id();

$sections = new Experiensa\Component\Section($page_id,$design_options,'landing_section_options');
if($sections->checkExistSectionOptions()):
    $segments = $sections->getSegmentList();
    foreach ($segments as $segment):
        $segment_options = $sections->getSegmentOptions($segment);
        $segment_obj = new Experiensa\Component\Segment(['segment_options'=>$segment]);
        $segment_obj->setDataFromSegmentOptions($segment);
        $segment_container = $segment_obj->getContainer();
        $segment_align = $segment_obj->getAlignment();
        $segment_background = $segment_obj->getBackground();
        ?>
        <div class="ui <?= $segment_background['class'];?> vertical segment" style="<?= $segment_background['style'];?>">
            <div class="ui <?= $segment_container['class'];?>" style="<?=$segment_container['style'];?>">
                <div class="ui <?=$segment_align;?> header">
                    <div class="page-header">
                        <h1><?= $sections->getSegmentTitle($segment);?></h1>
                        <?= (!empty($sections->getSegmentSubtitle($segment))?"<h3>".$sections->getSegmentSubtitle($segment)."</h3>":"");?>
                    </div>
                </div>
                <?php
                $source_type = $sections->getSegmentSourceType($segment);
                if($source_type === 'page'):
                    $page_id = $sections->getSegmentPageID($segment);
                    $page_obj = get_post($page_id);
                    $content = $page_obj->post_content;?>
                    <p><?= $content;?></p>
                    <?php
                else:
                    if($source_type === 'showcase'):
                        $sections->displaySegmentShowcase($segment);
                    else:
                        $sections->displaySegmentSlider($segment);
                    endif;
                endif;
                ?>
            </div>
        </div>
        <?php
    endforeach;
    ?>
    <?php
else:?>
    <h1><?= __('There are no options for this template saved','sage'); ?></h1>
    <?php
endif;

/*$display_showcase = ( isset($design_options['display_showcase']) ? $design_options['display_showcase']:false );
if($display_showcase!==false && $display_showcase=='TRUE'){
    $showcase_options = (isset($design_options['showcase_options'])?$design_options['showcase_options']:false);
    if($showcase_options !== false && !empty($showcase_options)){
        foreach($showcase_options as $option){
            $showcase['posttype'] = $option['showcase_posttype'];
            $showcase['category'] = $option['showcase_category'];
            $showcase['component'] = $option['showcase_component'];
            $showcase['color'] = $option['showcase_color'];
            $showcase['inverted'] = $option['showcase_inverted'];
            $showcase['title'] = $option['showcase_title'];
            $showcase['subtitle'] = $option['showcase_subtitle'];
            $showcase['title_alignment'] = $option['showcase_title_alignment'];
            if(isset($option['textimage_options']) && !empty($option['textimage_options']))
                $textimage_options = $option['textimage_options'];
            else
                $textimage_options = array();
            $showcase['textimage_options'] = new Experiensa\Component\Textimage($textimage_options);
            Showcase::displayShowcase($showcase);
        }
    }
}*/

get_template_part('templates/landing/partners');
