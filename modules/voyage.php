<?php
class Voyage{

    public static function price($id){
        $settings       = get_option('agency_settings');
        $reseller       = get_post_meta($id, 'resell', false);
        $display_from   = get_post_meta($id, 'display_from', false);
        $price          = get_post_meta($id, 'price', true);
        //piklist::pre($display_from);
        $currency = ($settings['agency_currency']) ? ' ' . $settings['agency_currency'] : '';
        $from = ($display_from[0][0] === 'TRUE') ? __('From','sage') . ' ' : '';

        if ( $reseller[0][0] === 'TRUE' ) {
            $margin     = get_post_meta($id,'tour_operator_margin',true);
            return $from . ceil($price + (($margin * $price)/100)) . $currency;
        } else {
            return $from . get_post_meta($id,'price',true) . $currency;
        }
    }

    public static function display_detail_table( $trip = ['price' =>'']){

    }
}
?>
