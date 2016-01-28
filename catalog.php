<?php
/**
* Template Name: Catalog
*/
?>

<br><br>
<div class="ui container">
    <br>
    <?php
    while (have_posts()) {
            the_post();
            get_template_part('templates/page', 'header');
            get_template_part('templates/content', 'page');
    }

    $agency_options = get_option('experiensa_design_settings');
    $catalog_template = $agency_options['agency_catalog_template'];

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
