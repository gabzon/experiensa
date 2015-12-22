<?php
$location_list  = wp_get_post_terms(get_the_ID(), 'location', array("fields" => "names"));
$theme_list     = wp_get_post_terms(get_the_ID(), 'theme', array("fields" => "names"));
$country_list   = wp_get_post_terms(get_the_ID(), 'country', array("fields" => "names"));

$voyage_hosting = get_post_meta(get_the_ID(), 'voyage_hosting', true);
$voyage_flights = get_post_meta(get_the_ID(), 'voyage_flights', true);
$voyage_included = get_post_meta(get_the_ID(), 'voyage_included', true);
$voyage_not_included = get_post_meta(get_the_ID(), 'voyage_not_included', true);
$voyage_cancelation = get_post_meta(get_the_ID(), 'voyage_cancelation', true);
$voyage_payment = get_post_meta(get_the_ID(), 'voyage_payment', true);
$gallery = get_post_meta(get_the_ID(), 'voyage_gallery', false);
$is_tour = get_post_meta(get_the_ID(), 'voyage_is_tour_operator', false);
?>
<br>
<table class="ui table basic" style="color:white;">
    <tr>
        <td><i class="money icon"></i><strong><?php _e('Price','sage'); ?> </strong></td>
        <td>
            <?php get_the_price(get_the_ID(), $is_tour[0][0]);  
                echo ' ' . get_post_meta(get_the_ID(), 'voyage_currency', true);
            ?>
        </td>
    </tr>
    <tr>
        <td><i class="calendar icon"></i><strong><?php _e('Duration'); ?></strong></td>
        <td>
            <?php
            $number_days      = get_post_meta(get_the_ID(), 'voyage_days', true);
            $number_nights    = get_post_meta(get_the_ID(), 'voyage_nights', true);
            if($number_days){
                echo $number_days .' '.__('Days', 'sage');
            }
            if($number_nights){
                echo ' / ' . $number_nights . ' ' . __('Nights', 'sage');
            }
            ?>                        
        </td>
    </tr>
    <tr>
        <td><i class="world icon"></i><strong><?php _e('Country','sage'); ?></strong></td>
        <td><?php echo join(', ', $country_list); ?></td>
    </tr>
    <tr>
        <td><i class="map marker icon"></i><strong><?php _e('Location','sage'); ?></strong></td>
        <td><?php echo join(', ', $location_list); ?></td>
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
