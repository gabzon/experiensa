<?php
$taxonomies = array('location');

$args = array(
    'orderby'           => 'name',
    'order'             => 'ASC',
    'hide_empty'        => true
);
$cities = get_terms($taxonomies, $args);

?>
<section id="landing" class="ui basic segment fullheight">
    <div class="ui page grid">
        <div class="column">
            <div class="ui one column grid stackable">
                <div class="column center aligned inverted">
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
            <div class="ui one column grid center aligned">
                <h2 class="ui inverted icon header">
                    <i class="circular suitcase icon"></i>
                    <div class="content">
                        <?php _e('Travel with 2 luggages','sage'); ?>
                        <div class="sub header">
                            (*) <?php _e('According to the flights','sage'); ?>
                        </div>
                    </div>
                </h2>
            </div>
        </div>
    </div>
</section>
