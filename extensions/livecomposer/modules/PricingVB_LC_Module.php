<?php

use \Experiensa\LiveComposer\Options\Query;
use \Experiensa\LiveComposer\Options\Layout;
use \Experiensa\LiveComposer\Options\Color;
use \Experiensa\LiveComposer\Options\TextImage;

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
            $options = array();
            // Return the array
            return apply_filters('dslc_module_options', $options, $this->module_id);
        }

        // Module Output
        function output($options)
        {
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