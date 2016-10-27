<?php
/**
* Template Name: Catalog
*/
?>

<br><br>
<div class="ui container" style="margin-top:40px">
    <br>
    <?php
    while (have_posts()) {
            the_post();
            get_template_part('templates/page', 'header');
            get_template_part('templates/content', 'page');
    }
    $catalog_template = get_theme_mod('agency_catalog_template');
    $catalog_template = (!empty($catalog_template)?$catalog_template:'simple-grid');
    
    switch ($catalog_template) {
        case 'isotope-grid':
            get_template_part('templates/catalog/isotop-top');
            break;
        case 'partners-api':
            get_template_part('templates/catalog/partner-api');
            break;
        default:
            get_template_part('templates/catalog/list');
            break;
    }
    ?>
    <br><br>
</div>
