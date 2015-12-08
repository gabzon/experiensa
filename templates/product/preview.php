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
?>
<div id="preview">
    <div class="ui two column grid stackable">
        <div class="ten wide column">
            <div class="font-white">
                <h1><?php the_title(); ?></h1>
                <p>
                    <?php the_excerpt(); ?>
                </p>
            </div>
            <br>
            <?php if ( ($post->post_content == "") || $product_hosting || $product_flights || $product_included || $product_not_included || $product_cancelation || $product_payment ): ?>
                <a href="#details" class="ui basic inverted white button">
                    <?php _e('Details','sage'); ?>&nbsp;
                    <i class="file text icon"></i>
                </a>
            <?php endif; ?>
        </div>
        <div class="one wide column"></div>
        <div class="four wide column">
            <table class="ui table">
                <tbody>
                    <tr>
                        <td><strong>CHF <?php _e('Price','sage'); ?> </strong></td>
                        <td><?php echo get_post_meta(get_the_ID(), 'product_price', true); ?></td>
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
                            <a href="#product-form" class="fluid ui blue button">
                                <i class="shop icon"></i>
                                <?php _e('Customize','sage'); ?>
                            </a>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
