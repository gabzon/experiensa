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

<?php $fiesta = file_get_contents('http://fiestatravel.ch/wp-json/wp/v2/posts?type=product'); ?>
<?php $colombia = file_get_contents('http://discovering.experiensa.com/wp-json/wp/v2/voyage'); ?>
<?php $own = file_get_contents('http://localhost/fiesta-travel/wp-json/wp/v2/voyage'); ?>
<?php $fiesta = json_decode($fiesta); ?>
<?php $colombia = json_decode($colombia); ?>
<?php $own = json_decode($own); ?>
<?php $voyages = array(); ?>

    <?php foreach ($fiesta as $key => $value): ?>
        <?php array_push($voyages, $value); ?>
    <?php endforeach; ?>
    <?php foreach ($colombia as $key => $value): ?>
        <?php array_push($voyages, $value); ?>
    <?php endforeach; ?>
    <?php foreach ($own as $key => $value): ?>
        <?php array_push($voyages, $value); ?>
    <?php endforeach; ?>
    <br>
    <div class="ui four column grid stackable">
        <?php foreach ($voyages as $key => $value): ?>
            <div class="column">
                <div class="ui card">
                    <div class="image">
                        <img src="<?= $value->cover_image; ?>" alt="" />
                    </div>
                    <div class="content">
                        <div class="right floated">
                            <?php if ($value->voyage_price): ?>
                                <?php echo $value->voyage_price . ' ' . $value->voyage_currency; ?>
                            <?php endif; ?>
                        </div>
                        <div class="header">
                            <?php echo $value->title->rendered; ?>
                        </div>
                        <div class="meta">
                            <?php echo $value->excerpt->rendered; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php Piklist::pre($voyages); ?>
</div>
