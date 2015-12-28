<?php
$design_options = get_option('design_settings');

$taxonomies = array('location');
$args = array(
    'orderby'           => 'name',
    'order'             => 'ASC',
    'hide_empty'        => true
);
$cities = get_terms($taxonomies, $args);
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
                <?php _e('Discover the charm amazing cities','sage'); ?>
            </h1>
            <br>
            <div id="landing-destinations" class="">
                <?php foreach ($cities as $city): ?>
                    <?php $city_link = get_term_link( $city ); ?>
                    <a class="ui inverted basic button" href="<?php echo $city_link; ?>" style="font-weight:bold;">
                        <?php echo $city->name; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
</div>
