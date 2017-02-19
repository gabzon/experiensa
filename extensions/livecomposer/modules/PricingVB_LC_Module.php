<?php

use \Experiensa\LiveComposer\Options\VillaBlanca;

if ( defined( 'DS_LIVE_COMPOSER_URL' ) ) {
    class PricingVB_LC_Module extends DSLC_Module
    {
        var $module_id = 'PricingVB_LC_Module';
        var $module_title = 'Pricing';
        var $module_icon = 'dollar';
        var $module_category = 'Villa Blanca';

        // Module Options
        function options()
        {
            // The options array
            $options = array(
                VillaBlanca::mainTitle('main_title','Title','Pricing'),
                VillaBlanca::mainTitle('box_title','Box Title','Starting at'),
                VillaBlanca::mainTitle('price','Price','1100'),
                VillaBlanca::mainTitle('price_desc','Price Description','PER NIGHT UP TO 24 PEOPLE'),
                VillaBlanca::mainTitle('high_season_desc','High Season Description','Minimum one week'),
                VillaBlanca::mainTitle('low_season_desc','Low Season Description','Minimum 3 nights'),
                VillaBlanca::mainTitle('button','Button Label','Get It!'),
            );
            // Return the array
            return apply_filters('dslc_module_options', $options, $this->module_id);
        }

        // Module Output
        function output($options)
        {
            $title = (!empty($options['main_title'])?$options['main_title']:'Pricing');
            $box_title = (!empty($options['box_title'])?$options['box_title']:'Starting at');
            $price = (!empty($options['price'])?$options['price']:"1'100");
            $price_desc = (!empty($options['price_desc'])?$options['price_desc']:'PER NIGHT UP TO 24 PEOPLE');
            $high_desc = (!empty($options['high_season_desc'])?$options['high_season_desc']:'Minimum one week');
            $low_desc = (!empty($options['low_season_desc'])?$options['low_season_desc']:'Minimum 3 nights');
            $button = (!empty($options['button'])?$options['button']:'Get It!');

            set_query_var('title',$title);
            set_query_var('box_title',$box_title);
            set_query_var('price',$price);
            set_query_var('price_desc',$price_desc);
            set_query_var('high_desc',$high_desc);
            set_query_var('low_desc',$low_desc);
            set_query_var('button',$button);

            ob_start();
            get_template_part("templates/villa_blanca/pricing");
            $html = ob_get_clean();
            $this->module_start( $options );
            echo $html;
            // REQUIRED
            $this->module_end( $options );
        }
    }
    // Register Module
    add_action('dslc_hook_register_modules',
        create_function('', 'return dslc_register_module( "PricingVB_LC_Module" );')
    );
}