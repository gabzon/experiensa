<?php
/**
 * Template Name: Custom Template
 */
$segment = new Experiensa\Component\Segment();
$segment->setData('Custom Template');
$segment_container = $segment->getContainer();
$segment_align = $segment->getAlignment();
$segment_background = $segment->getBackground();

$segment_class = $segment_container['class'].' basic '.$segment_background['class']. ' vertical segment '.$segment_align;
$segment_style = $segment_container['style'].' '.$segment_background['style'];
?>
<div class="<?= $segment_class;?>" style="<?= $segment_style;?>">
<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
</div>
