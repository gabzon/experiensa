<?php
$taxonomies = array('location');

$args = array(
    'orderby'           => 'name',
    'order'             => 'ASC',
    'hide_empty'        => true
);
$cities = get_terms($taxonomies, $args);

?>

<div class="ui orange inverted basic vertical segment center aligned">
    <br>
    <div class="ui container">
        <div class="column inverted">
            <h1 class="massive-header">
                <?php setlocale(LC_ALL, 'fr_FR'); ?>
                <?php _e('The best prices in ','sage'); echo " "; echo strftime('%B'); ?>
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
</div>
