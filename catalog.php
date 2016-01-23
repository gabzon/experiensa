<?php
/**
* Template Name: Catalog
*/
?>

<!-- 1. Load libraries -->
<!-- IE required polyfills (from CDN), in this exact order -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.33.3/es6-shim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/systemjs/0.19.16/system-polyfills.js"></script>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/node_modules/angular2/bundles/angular2-polyfills.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/node_modules/systemjs/dist/system.src.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/node_modules/rxjs/bundles/Rx.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/node_modules/angular2/bundles/angular2.dev.js"></script>

<!-- 2. Configure SystemJS -->
<script>
System.config({
    packages: {
        app: { format: 'register', defaultExtension: 'js' }
    }
});
System.import('<?php echo get_stylesheet_directory_uri(); ?>/assets/app/boot.js').then(null, console.error.bind(console));
</script>

<br><br>
<div class="ui container">

    <my-app>Loading...</my-app>

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
                            <div class="ui blue ribbon label">
                                <?= convertCurrency($value['voyage_price'], $value['voyage_currency'], Helpers::get_currency() ) . ' ' . Helpers::get_currency(); ?>
                            </div>
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
