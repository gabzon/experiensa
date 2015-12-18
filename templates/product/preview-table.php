<?php
$location_list  = wp_get_post_terms(get_the_ID(), 'location', array("fields" => "names"));
$theme_list     = wp_get_post_terms(get_the_ID(), 'theme', array("fields" => "names"));
$country_list   = wp_get_post_terms(get_the_ID(), 'country', array("fields" => "names"));

$product_hosting = get_post_meta(get_the_ID(), 'product_hosting', true);
$product_flights = get_post_meta(get_the_ID(), 'product_flights', true);
$product_included = get_post_meta(get_the_ID(), 'product_included', true);
$product_not_included = get_post_meta(get_the_ID(), 'product_not_included', true);
$product_cancelation = get_post_meta(get_the_ID(), 'product_cancelation', true);
$product_payment = get_post_meta(get_the_ID(), 'product_payment', true);
$gallery = get_post_meta(get_the_ID(), 'product_gallery', false);
$is_tour = get_post_meta(get_the_ID(), 'product_is_tour_operator', false);
?>
<br>
<table class="ui table basic" style="color:white;">
    <tr>
        <td><strong>CHF <?php _e('Price','sage'); ?> </strong></td>
        <td>
            <?php get_the_price(get_the_ID(), $is_tour[0][0]); ?>
        </td>
    </tr>
    <tr>
        <td><i class="calendar icon"></i><strong><?php _e('Duration'); ?></strong></td>
        <td><?php $number_days = get_post_meta(get_the_ID(), 'product_number_days', true); ?>
            <?php echo $number_days['product_days'][0].' '.__('Days', 'sage'); ?>
            /
            <?php echo $number_days['product_nights'][0].' '.__('Nights', 'sage'); ?>
        </td>
    </tr>
    <tr>
        <td><i class="world icon"></i><strong><?php _e('Country','sage'); ?></strong></td>
        <td><?php echo join(', ', $location_list); ?></td>
    </tr>
    <tr>
        <td><i class="map marker icon"></i><strong><?php _e('Location','sage'); ?></strong></td>
        <td><?php echo join(', ', $country_list); ?></td>
    </tr>
    <tr>
        <td><i class="flag icon"></i><strong>Theme</strong></td>
        <td><?php echo join(', ', $theme_list); ?></td>
    </tr>
    <tr>
        <th colspan="2">
            <a href="#product-contact" class="fluid ui blue button">
                <i class="shop icon"></i>
                <?php _e('Contact us','sage'); ?>
            </a>
        </th>
    </tr>
</table>
