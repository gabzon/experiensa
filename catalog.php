<?php
/**
* Template Name: Catalog
*/
?>
<br><br>
<div class="ui container">
    <br>
    <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('templates/page', 'header'); ?>
        <?php get_template_part('templates/content', 'page'); ?>
    <?php endwhile; ?>

    <?php $voyages = array(); ?>
    <?php $voyages = Catalog::get_catalog(); ?>
    <br>
    <div class="ui four column grid stackable">
        <?php foreach ($voyages as $key => $value): ?>
            <div class="column">
                <div class="ui card">
                    <?php if ($value['cover_image']): ?>
                        <div class="image">
                            <img src="<?= $value['cover_image']; ?>" alt="" />
                        </div>
                    <?php endif; ?>
                    <div class="content">
                        <div class="right floated">
                            <?php if ($value['voyage_price']): ?>
                                <?= convertCurrency($value['voyage_price'], $value['voyage_currency'], Helpers::get_currency() ) . ' ' . Helpers::get_currency(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="header">
                            <?php echo $value['title']; ?>
                        </div>
                        <div class="meta">
                        </div>
                        <div class="content">
                            <?php echo $value['excerpt']; ?>
                            <br>
                        </div>
                        <div class="extra content">                            
                            <?php $mailto = 'mailto:' . Helpers::get_email() . '?subject= Offre '.$value['title']; ?>
                            <a href="<?= $mailto; ?>" class="ui button"><?php _e('Contact us','sage'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <br><br>
</div>
