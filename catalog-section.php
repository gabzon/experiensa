<?php
/**
 * Template Name: Catalog Section Template
 */
$design_options = get_option('experiensa_design_settings');

$page_object = get_queried_object();
$page_id     = get_queried_object_id();

$sections = new Experiensa\Component\Section($page_id,$design_options,'catalog_section_options');
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