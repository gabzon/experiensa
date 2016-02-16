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

?>
<br>
<table class="ui table basic" style="color:white;">
    <tr>
        <td><i class="money icon"></i><strong><?php _e('Price','sage'); ?> </strong></td>
        <td>
            <strong><?= Voyage::price($post->ID) ?></strong>
        </td>
    </tr>
    <tr>
        <td><i class="calendar icon"></i><strong><?php _e('Duration'); ?></strong></td>
        <td>
            <strong>
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
            </strong>
        </td>
    </tr>
    <tr>
        <td><i class="world icon"></i><strong><?php _e('Country','sage'); ?></strong></td>
        <td><strong><?php echo join(', ', $country_list); ?></strong></td>
    </tr>
    <tr>
        <td><i class="map marker icon"></i><strong><?php _e('Location','sage'); ?></strong></td>
        <td><strong><?php echo join(', ', $location_list); ?></strong></td>
    </tr>
    <tr>
        <td><i class="flag icon"></i><strong>Theme</strong></td>
        <td><strong><?php echo join(', ', $theme_list); ?></strong></td>
    </tr>
    <tr>
        <th colspan="2">
            <?php
                $mailto = Agency::get_email();
                $mailto .= '?subject=Offre:' . get_the_title();
                $mailto .= '&body=' . __('I\'m interested in this this offert','sage');
            ?>
            <a href="mailto: <?= $mailto; ?>" class="fluid ui blue button">
                <i class="shop icon"></i>
                <?php _e('Contact us','sage'); ?>
            </a>
        </th>
    </tr>
</table>
