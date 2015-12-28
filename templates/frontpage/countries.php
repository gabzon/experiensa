<?php
$design_options = get_option('design_settings');

$taxonomies = array('country');
$args = array(
    'orderby'           => 'name',
    'order'             => 'ASC',
    'hide_empty'        => true
);
$countries = get_terms($taxonomies, $args);
?>

<div class="ui <?= $design_options['website_color']; ?> inverted basic vertical segment center aligned">
    <br>
    <br>
    <div class="ui container">
        <div class="column inverted">
            <h1 class="massive-header">
                <?php setlocale(LC_ALL, 'fr_FR'); ?>
                <!-- utf8_encode(strftime()) -->
                <?php // _e('The best prices in ','sage'); echo " "; echo strftime('%B'); ?>
                <?php _e('Discover amazing countries','sage'); ?>
            </h1>
            <br>
            <div id="landing-destinations" class="">
                <?php foreach ($countries as $country): ?>
                    <?php $country_link = get_term_link( $country ); ?>
                    <a class="ui inverted basic button" href="<?php echo $country_link; ?>" style="font-weight:bold;">
                        <?php echo $country->name; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
</div>
