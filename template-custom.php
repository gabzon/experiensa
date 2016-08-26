<?php
/**
 * Template Name: Custom Template
 */
$settings = get_option('experiensa-segment-settings');
$segment = new Experiensa\Component\Segment($settings);
$segment->setDataFromTemplateName('Custom Template');
$segment_container = $segment->getContainer();
$segment_align = $segment->getAlignment();
$segment_background = $segment->getBackground();

?>
<div class="ui <?= $segment_background['class'];?> vertical segment" style="<?= $segment_background['style'];?>">
  <div class="ui <?= $segment_container['class'];?>" style="<?=$segment_container['style'];?>">
  <?php while (have_posts()) : the_post(); ?>
    <div class="ui <?=$segment_align;?> header">
        <?php get_template_part('templates/page', 'header'); ?>
    </div>
    <?php get_template_part('templates/content', 'page'); ?>
  <?php endwhile; ?>
  </div>
</div>
