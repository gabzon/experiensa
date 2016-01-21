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

                    <div class="image">
                        <img src="<?= $value['cover_image']; ?>" alt="" />
                    </div>
                    <div class="content">
                        <div class="right floated">
                            <?php $default_currency = get_post_meta(224,'voyage_currency',true); ?>
                            <?php if ($value['voyage_price']): ?>
                                <?php echo $value['voyage_price'] . ' ' . $value['voyage_currency']; ?>
                            <?php endif; ?>
                        </div>
                        <div class="header">
                            <?php echo $value['title']; ?>
                        </div>
                        <div class="meta">
                            <?php echo $value['excerpt']; ?>
                        </div>
                        <div class="content">
                            <?= convertCurrency($value['voyage_price'], $value['voyage_currency'], $default_currency) . ' ' . $default_currency; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <br>
</div>
