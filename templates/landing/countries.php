<?php
$design_options = get_option('experiensa_design_settings');
$display_country_images = $design_options['setting_display_country_images'];
$section = $design_options['promotion_color_group'];
$color = $section['promotion_section_color'][0];
$inverted = $section['promotion_section_inverted'][0];

$taxonomies = array('country');
$args = array(
    'orderby'           => 'name',
    'order'             => 'ASC',
    'hide_empty'        => true
);
$countries = get_terms($taxonomies, $args);
?>

<div class="ui <?= get_the_color($color, $inverted[0]); ?> basic vertical segment center aligned">
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
                    <?php $country_link = get_term_link( $country ); //inverted?>
                    <a class="ui basic button" href="<?php echo $country_link; ?>" style="font-weight:bold;">
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
